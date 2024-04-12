import pandas as pd
import numpy as np
from sklearn.model_selection import TimeSeriesSplit, GridSearchCV
from sklearn.metrics import mean_squared_error, mean_absolute_error, r2_score, mean_absolute_percentage_error, \
    root_mean_squared_error

import xgboost as xgb

import mydata


def check_data_from_user(data):
    # check if data is a list and convert to pandas dataframe
    if data and isinstance(data, list):
        print('Data is a list')
        try:
            # convert data to a pandas dataframe
            df = pd.DataFrame(data)
            # convert created_at to datetime value
            df['created_at'] = pd.to_datetime(df['created_at'])
            # set created_at as index
            df.index = df['created_at']
            # drop created_at column because it is now the index
            df.drop('created_at', axis=1, inplace=True)

            print('Dataframe created successfully')
            print(f'Shape of given data: {df.shape}')
            print(df.head(5))
            return df
        except KeyError:
            raise KeyError('KeyError: created_at column not found')
    else:
        raise ValueError('Data is not a list or is empty')


def generate_date_features(dataframe: pd.DataFrame):
    try:
        df_copy = dataframe.copy()  # Create a copy of the DataFrame to ensure the original remains unchanged

        df_copy['month'] = df_copy.index.month
        df_copy['day_of_month'] = df_copy.index.day
        df_copy['day_of_year'] = df_copy.index.dayofyear
        df_copy['week_of_year'] = df_copy.index.isocalendar().week
        df_copy['day_of_week'] = df_copy.index.dayofweek
        df_copy['year'] = df_copy.index.year
        df_copy["is_wknd"] = df_copy.index.weekday // 4
        df_copy['is_month_start'] = df_copy.index.is_month_start.astype(int)
        df_copy['is_month_end'] = df_copy.index.is_month_end.astype(int)

        return df_copy

    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def generate_lag_features(dataframe, lag_days: int):
    try:
        df_copy = dataframe.copy()
        # create lag features
        for i in range(lag_days + 1):
            df_copy[f'quantity_lag_{i}'] = df_copy['quantity'].shift(i)
            df_copy[f'positive_lag_{i}'] = df_copy['positive'].shift(i)
            df_copy[f'negative_lag_{i}'] = df_copy['negative'].shift(i)
            # # convert to int

        # df_copy['lag_1'] = (df.index - pd.Timedelta(days=7)).map(target_map)
        # df_copy['lag_2'] = (df.index - pd.Timedelta(days=14)).map(target_map)
        # df_copy['lag_3'] = (df.index - pd.Timedelta(days=21)).map(target_map)

        # fill rows with NaN values
        # df_copy.fillna(np.nan, inplace=True)

        return df_copy
    except KeyError:
        raise KeyError('KeyError: created_at column not found')


def time_based_split(data, split_ratio=0.8):
    """
    Splits a time series dataset into training and testing sets based on a time-based split ratio.

    Args:
        data (pd.Series or pd.DataFrame): The time series data to split.
        split_ratio (float): The proportion of data to use for training (0 to 1). Default is 0.8.

    Returns:
        tuple: A tuple containing the training and testing sets as pandas DataFrames.
    """

    total_length = len(data)
    train_size = int(total_length * split_ratio)
    # test_size = total_length - train_size

    train = data.iloc[:train_size]
    test = data.iloc[train_size:]

    return train, test


def handle_train_test_size(dataframe, splitting_method, split_ratio, custom_days=None):
    if splitting_method == 'time_based_split':
        if split_ratio > 1 or split_ratio < 0:
            raise ValueError('split_ratio must be between 0 and 1')

        train, test = time_based_split(dataframe, split_ratio)

        print(f'train shape: {train.shape}, test shape: {test.shape}')
        print(f'train min and max: {train.index.min()}, {train.index.max()}')
        print(f'test min and max: {test.index.min()}, {test.index.max()}')

        return train, test

    elif splitting_method == 'week':
        end_data = dataframe.index.max()
        # subtract 7 days from end_date
        start_data = end_data - pd.Timedelta(days=7)

        train = dataframe[dataframe.index < start_data]
        test = dataframe[dataframe.index >= start_data]

        print(f'train shape: {train.shape}, test shape: {test.shape}')
        print(f'train min and max: {train.index.min()}, {train.index.max()}')
        print(f'test min and max: {test.index.min()}, {test.index.max()}')

        return train, test

    elif splitting_method == 'month':
        end_data = dataframe.index.max()
        # subtract 30 days from end_date
        start_data = end_data - pd.Timedelta(days=30)

        train = dataframe[dataframe.index < start_data]
        test = dataframe[dataframe.index >= start_data]

        print(f'train shape: {train.shape}, test shape: {test.shape}')
        print(f'train min and max: {train.index.min()}, {train.index.max()}')
        print(f'test min and max: {test.index.min()}, {test.index.max()}')

        return train, test

    elif splitting_method == 'custom':
        end_data = dataframe.index.max()
        # subtract 30 days from end_date
        start_data = end_data - pd.Timedelta(days=custom_days)

        train = dataframe[dataframe.index < start_data]
        test = dataframe[dataframe.index >= start_data]

        print(f'train shape: {train.shape}, test shape: {test.shape}')
        print(f'train min and max: {train.index.min()}, {train.index.max()}')
        print(f'test min and max: {test.index.min()}, {test.index.max()}')

        return train, test
    else:
        raise ValueError('splitting_method must be either time_based_split, week or month')


def create_features_target(dataframe, target):
    date_features = ['month', 'day_of_month', 'day_of_year', 'week_of_year', 'day_of_week', 'year', 'is_wknd',
                     'is_month_start', 'is_month_end']
    lag_features = [col for col in dataframe.columns if
                    'quantity_lag' in col or 'positive_lag' in col or 'negative_lag' in col]
    features = date_features + lag_features

    return features, target


def create_train_data(dataframe, features, target):
    try:
        X_train = dataframe[features]
        y_train = dataframe[target]
        return X_train, y_train

    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def create_test_data(dataframe, features, target):
    try:
        X_test = dataframe[features]
        y_test = dataframe[target]
        return X_test, y_test
    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def generate_future_target_dates(last_date_of_data, pred_range: int):
    print('Generating future dates')
    # Add 1 day to max because we want to predict for the next 7 days, and we have today's sales data
    end_date = last_date_of_data + pd.Timedelta(days=1)

    # create a Datetimeindex from pass variables
    future_dates = pd.date_range(end_date, periods=pred_range, freq='D')

    # Create a single column called date
    future_dates_df = pd.DataFrame(future_dates, columns=['date'])

    # Make the date the first column the index
    future_dates_df.set_index('date', inplace=True)

    # Add quantity column
    future_dates_df['quantity'] = np.nan

    # add isFuture column
    future_dates_df['isFuture'] = True

    # # create date features
    # future_dates_df = create_date_features(future_dates_df)
    return future_dates_df


def generate_future_w_lags_dates(orignal_dataframe, future_dataframe, lag_days):
    try:
        print('Generating future dates with lag and date features')
        # create a copy of the original dataframe
        original_dataframe_copy = orignal_dataframe.copy()

        # add isFuture column and set to False
        original_dataframe_copy['isFuture'] = False

        # get the original dataframe and concat with the future dates dataframe
        future_dates_df = pd.concat([original_dataframe_copy, future_dataframe])

        future_dates_df = generate_date_features(future_dates_df)
        future_dates_df = generate_lag_features(future_dates_df, lag_days=lag_days)

        return future_dates_df
    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def generate_prediction_for_future_dates(model, future_dates_df, features):
    try:
        print('Generating prediction for future dates')
        predict_data = future_dates_df.query('isFuture == True').copy()

        predict_data['pred'] = model.predict(predict_data[features])

        prediction = predict_data[['pred']]

        return prediction
    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def optimize_gridsearch(X_train, y_train, X_test, y_test):
    """
    This function optimizes a XGBoost model using GridSearchCV.

    GridSearchCV is a library function that is a member of sklearn's model_selection package.
    It helps to loop through predefined hyperparameters and fit your estimator (model) on your training set.
    So, in the end, you can select the best parameters from the listed hyperparameters.

    Args:
        X_train (pd.DataFrame): The training dataset, containing the features for training the model.
        y_train (pd.Series): The target variable for the training dataset.
        X_test (pd.DataFrame): The testing dataset, containing the features for testing the model.
        y_test (pd.Series): The target variable for the testing dataset.

    Returns:
        dict: The best parameters found by GridSearchCV for the XGBoost model.
        These parameters can then be used to create a new XGBoost model that is optimized for the given data.
    """

    param_grid = {
        'n_estimators': [500, 1000, 2000],
        'max_depth': [3, 5, 7],
        'learning_rate': [0.0001, 0.001, 0.01, 0.1, 0.2, 0.3],
        'subsample': [0.6, 0.8, 1.0],
        'min_child_weight': [1, 3, 5]
    }

    # Initialize the XGBRegressor
    reg = xgb.XGBRegressor(
        base_score=0.5,
        booster='gbtree',
        objective='reg:squarederror',
        # objective='reg:squaredlogerror',
        early_stopping_rounds=50,
        eval_metric='mae',
        n_jobs=-1,
    )

    tscv = TimeSeriesSplit(n_splits=3)

    # Initialize the GridSearchCV
    grid_search = GridSearchCV(estimator=reg, param_grid=param_grid, cv=tscv, n_jobs=-1)

    # Fit the GridSearchCV to the data
    grid_search.fit(X_train, y_train, eval_set=[(X_train, y_train), (X_test, y_test)], verbose=0)

    # Get the best parameters
    best_params = grid_search.best_params_

    # Print the best parameters
    print(f'Best parameters: {best_params}')

    return best_params


def train_model(best_params, X_train, y_train, X_test=None, y_test=None):
    """
    Trains a model using the best parameters found by GridSearchCV.
    :param best_params: The best parameters found by GridSearchCV.
    :param X_train: The training features.
    :param y_train: The training target.
    :param X_test: The testing features.
    :param y_test: The testing target.
    :return: The trained model.
    """
    try:
        print('Training model...')

        # Initialize the XGBRegressor
        reg = xgb.XGBRegressor(
            base_score=0.5,
            booster='gbtree',
            objective='reg:squarederror',
            # objective='reg:squaredlogerror',
            early_stopping_rounds=50,
            eval_metric='mae',
            n_jobs=-1,
            **best_params
        )

        if X_test is not None and y_test is not None:
            print("X_test and y_test are not None, Running model with test data for evaluation")

            reg.fit(
                X_train, y_train,
                eval_set=[(X_train, y_train), (X_test, y_test)],
                verbose=1000
            )
        else:
            print("Either X_test or y_test or both are None, Running model without test data for future prediction")

            reg.fit(
                X_train, y_train,
                eval_set=[(X_train, y_train)],
                verbose=1000
            )

        print('Model trained successfully')
        return reg

    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def mode_evaluate(model, X_test, y_test):
    try:
        print('Evaluating model')
        y_pred_test = model.predict(X_test)

        # Calculate metrics for the test set
        mse_test = mean_squared_error(y_test, y_pred_test)
        mae_test = mean_absolute_error(y_test, y_pred_test)
        r2_test = r2_score(y_test, y_pred_test)
        mape_test = mean_absolute_percentage_error(y_test, y_pred_test)
        rmse_test = root_mean_squared_error(y_test, y_pred_test)
        nrmse = rmse_test / (y_test.max() - y_test.min())  # Calculate NRMSE

        # create a dataframe with index of X_test  and columns of y_pred_test and y_test
        test_data_w_actual_pred = pd.DataFrame({'date': X_test.index, 'actual': y_test, 'predicted': y_pred_test},
                                               index=X_test.index)

        test_data_w_actual_pred['date'] = test_data_w_actual_pred['date'].dt.strftime('%Y-%m-%d')

        print(
            f'Test set metrics: MSE={mse_test}, MAE={mae_test}, R2={r2_test}, MAPE={mape_test}, RMSE={rmse_test}, NRMSE={nrmse}')

        accuracy = {
            'mse': mse_test,
            'mae': mae_test,
            'r2': r2_test,
            'mape': mape_test,
            'rmse': rmse_test,
            'nrmse': nrmse,
            'accuracy_test': test_data_w_actual_pred.to_dict('records'),
        }
        print('Model evaluated successfully')
        return accuracy

    except Exception as e:
        print(f"An error occurred: {e}")
        return False


def generate_full_train_for_forecast(dataframe, features, target):
    complete_data = dataframe.query('isFuture == False').copy()
    FX_train = complete_data[features]
    fy_train = complete_data[target]
    return FX_train, fy_train


class PrtechPredict:
    # create an empty dataframe
    df = pd.DataFrame()
    future_df = pd.DataFrame()

    # # User defined variables
    user_prediction_range = 7
    user_prediction_frequency = 'D'
    user_prediction_start_date = '2021-01-01'
    user_prediction_end_date = '2021-01-31',
    user_splitting_method = 'week'
    user_lag_days = 7
    user_best_params = {}

    # # Prediction Information
    data_start_date = ''
    data_end_date = ''
    remove_outliers = True

    # Model Features and Target
    FEATURES = []
    TARGET = 'quantity'
    X_train, y_train = pd.DataFrame(), pd.DataFrame()
    X_test, y_test = pd.DataFrame(), pd.DataFrame()

    # # MODEL
    model: xgb.XGBRegressor = None

    # # Model Parameters
    model_train_ratio = 0.8
    train = pd.DataFrame()
    test = pd.DataFrame()
    best_params = {'learning_rate': 0.01, 'max_depth': 3, 'min_child_weight': 1, 'n_estimators': 2000, 'subsample': 1.0}

    # To send back to api
    accuracy = {}
    prediction = []

    def __init__(self, data, prediction_range, lag_days, model_train_ratio, remove_outliers, splitting_method,
                 best_params=None):
        self.user_prediction_range = prediction_range
        self.user_lag_days = lag_days
        self.model_train_ratio = model_train_ratio
        self.remove_outliers = remove_outliers
        self.user_splitting_method = splitting_method
        self.user_best_params = best_params

        # # Check data from user
        self.df = check_data_from_user(data)

        # # Apply transformations
        self.df = self.apply_dataframe_transformations()

        # # Generate features
        self.generate_features()

        # # Apply splitting method
        self.set_minmax_date()

        # # Set features and target
        self.FEATURES, self.TARGET = create_features_target(self.df, self.TARGET)

        # # Split data
        self.train, self.test = self.apply_splitting_method()

        # # Create train and test data
        self.X_train, self.y_train = create_train_data(self.train, self.FEATURES, self.TARGET)
        self.X_test, self.y_test = create_test_data(self.test, self.FEATURES, self.TARGET)

        # # Optimize model
        # self.best_params = self.optimize_model()

        # # Train model
        self.model = self.start_train_model()

        # # Evaluate model
        self.accuracy = self.evaluate_model()

        # # generate a new model for forecasting with all the data as training data

        # # Start prediction
        self.start_prediction()

        # # Send report
        self.send_report()

    def data_minmax(self):
        print(f'Minimum date: {self.df.index.min()} Maximum date: {self.df.index.max()}')
        return True

    def set_minmax_date(self):
        self.data_start_date = self.df.index.min()
        self.data_end_date = self.df.index.max()
        print(f'Prediction start date: {self.data_start_date} Prediction end date: {self.data_end_date}')
        return True

    def print_date_range(self):
        # Print the number of days in dataframe
        print(f'Number of days in dataframe: {self.df.shape[0]}')
        return True

    def print_data(self):
        # # Print data, dataframe columns
        # print(self.df)
        print(f'Shape: {self.df.shape}')
        print(f'Index: {self.df.index}')
        print(f'Predicted range: {self.user_prediction_range}')
        print(f'Predicted frequency: {self.user_prediction_frequency}')
        print(f'Columns: {self.df.columns}')
        print(self.df.head())
        # print(self.user_prediction_start_date)

    def apply_dataframe_transformations(self):
        try:
            print('Applying transformations')
            df_copy = self.df.copy()

            if self.remove_outliers:
                # Remove outliers
                df_copy.fillna(np.nan, inplace=True)
                df_copy.dropna(inplace=True)

            # # Fix data types
            df_copy['quantity'] = df_copy['quantity'].astype(float)
            df_copy['positive'] = df_copy['positive'].astype(float)
            df_copy['negative'] = df_copy['negative'].astype(float)

            # # Sane check
            print(f'df zero value count: {df_copy.isnull().sum()}')
            print('Transformations applied successfully')

            return df_copy
        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def generate_features(self):
        try:
            print('Generating features')
            # Generate date features
            self.df = generate_date_features(self.df)
            # Generate lag features
            self.df = generate_lag_features(self.df, self.user_lag_days)
            print('Features generated successfully')
            print(f'Shape after generating features: {self.df.shape}')
            return True

        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def apply_splitting_method(self):
        try:
            print('Applying splitting method')
            train, test = handle_train_test_size(self.df, self.user_splitting_method, self.model_train_ratio)
            print('Splitting method applied successfully')
            return train, test
        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def train_test_shape(self):
        print(f'Train shape: {self.train.shape}')
        print(f'Test shape: {self.test.shape}')
        return True

    # def print_features_target(self):
    #     # features, target = create_features_target(self.train, self.TARGET)
    #     print(f'Features: {features}, Target: {target}')
    #     return True

    def print_df_features_target(self):
        print(f'Features: {self.FEATURES}')
        print(f'Target: {self.TARGET}')
        return True

    def print_X_train_y_train(self):
        print(f'X_train shape: {self.X_train.shape}')
        print(f'y_train shape: {self.y_train.shape}')
        return True

    def print_X_test_y_test(self):
        print(f'X_test shape: {self.X_test.shape}')
        print(f'y_test shape: {self.y_test.shape}')
        return True

    def optimize_model(self):
        try:
            if self.user_best_params:
                print('User best params provided')
                return self.user_best_params
            else:
                print('Optimizing model, no user best params provided')
                best_params = optimize_gridsearch(self.X_train, self.y_train, self.X_test, self.y_test)
                print('Model optimized successfully')
                return best_params
        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def start_train_model(self):
        try:
            print('Training model')
            model = train_model(self.best_params, self.X_train, self.y_train, self.X_test, self.y_test)
            print('Model trained successfully')
            return model
        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def evaluate_model(self):
        try:
            print('Evaluating model')
            accuracy = mode_evaluate(self.model, self.X_test, self.y_test)
            print('Model evaluated successfully')
            return accuracy
        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def start_prediction(self):
        try:
            print('Starting prediction')
            # # Generate future dates
            future_dates_df = generate_future_target_dates(self.data_end_date, self.user_prediction_range)

            print(future_dates_df.shape)
            print(self.df.shape)

            # # Generate future dates with lag features
            future_df = generate_future_w_lags_dates(self.df, future_dates_df, self.user_lag_days)


            # print(self.df.shape)
            print(future_df.shape)

            # # generate a new model with all the data as training data for forecasting
            FX_train, fy_train = generate_full_train_for_forecast(future_df, self.FEATURES, self.TARGET)

            print(f'FX_train shape: {FX_train.shape}, fy_train shape: {fy_train.shape}')

            # # Train model for forecasting
            model_forecast: xgb.XGBRegressor = train_model(self.best_params, FX_train, fy_train)

            # Generate prediction for future dates
            prediction = generate_prediction_for_future_dates(model_forecast, future_df, self.FEATURES)
            print('Prediction completed successfully')

            try:
                # create a dataframe with index of X_test  and columns of y_pred_test and y_test
                prediction = pd.DataFrame({'date': prediction.index, 'predicted': prediction['pred']},
                                          index=prediction.index)

                prediction['date'] = prediction['date'].dt.strftime('%Y-%m-%d')

                # output = output.set_index('date')

                prediction = prediction[['date', 'predicted']]

                # prediction.to_dict('records')

                self.prediction = prediction.to_dict('records')

                return True

            except Exception as e:
                print(f"An error occurred: {e}")
                return False

        except Exception as e:
            print(f"An error occurred: {e}")
            return False

    def send_report(self):
        return {
            # 'data': self.df.to_dict('records'),
            # 'future_data': self.future_df.to_dict('records'),
            'accuracy': self.accuracy,
            'prediction': self.prediction
        }


sales = mydata.get_data()

best_params = {'learning_rate': 0.01, 'max_depth': 3, 'min_child_weight': 1, 'n_estimators': 2000, 'subsample': 1.0}

obj = PrtechPredict(sales, prediction_range=7, lag_days=7, splitting_method='week', model_train_ratio=0.8,
                    remove_outliers=True, best_params=best_params)

print(obj.send_report())

# obj.print_df_features_target()
# obj.train_test_shape()
# obj.print_X_train_y_train()
# obj.print_X_test_y_test()
# obj.optimize_model()
