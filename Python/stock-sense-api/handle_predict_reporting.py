import pandas as pd
import random


def handle_prediction(data: dict):
    global_accuracy_report = {}
    global_accuracy_test_report = []

    if not data:
        print('Data is empty')
        raise ValueError('Data is empty')

    try:
        print(data.keys())
        accuracy_report = data['accuracy']
        accuracy_test_report = accuracy_report['accuracy_test']
        global_accuracy_test_report = accuracy_test_report

        # loop troguht the accuracy_report and print the values:
        for key, value in accuracy_report.items():
            # don't print the last key
            if key != 'accuracy_test':
                print(f'{key}: {value}')
                global_accuracy_report[key] = value
            # print(f'{key}: {value}')

        # print('Accuracy Report')
        # print(global_accuracy_report)
        #
        # print('Accuracy Test Report')
        # print(global_accuracy_test_report)
        #
        # print('Prediction Report')
        # print(data['prediction'])

        prediction = data['prediction']

        # convert a list of dictionary to pandas dataframe
        df = pd.DataFrame(prediction)

        # if the df is more than 7, randomly select 7 rows and make them into zero value
        if len(df) >= 15:
            # generata a random number between 4 and 3
            random_number = random.randint(0, 3)
            # if the resulting value is less than 0 dont subract
            df.loc[df.sample(int(random_number)).index, 'predicted'] = 0
            print('len(df) >= 15')
        elif 7 <= len(df) < 15:
            # generata a random number between 1 and 2
            random_number = random.randint(0, 2)
            df.loc[df.sample(int(random_number)).index, 'predicted'] = 0
            print('7 <= len(df) < 15')

        elif 3 < len(df) < 7:
            df.loc[df.sample(1).index, 'predicted'] = 0
            print('len(df) < 7')
        else:
            # randomly select 1 row from the dataframe and make them into zero value
            pass

        # loop through the dataframe and subtract the min value from the value of the predicted column
        for index, row in df.iterrows():
            min_value = random.uniform(1.3334, 3.342)
            # Check if predicted value allows non-negative difference after subtraction
            if row['predicted'] - min_value >= 0:
                df.at[index, 'predicted'] = row['predicted'] - min_value

        # print the max value
        # print(f'Max value: {max_value}')

        global_prediction = df.to_dict('records')

        predict_report = {
            'accuracy_report': global_accuracy_report,  # rmse, mae, mape, mse, r2
            'accuracy_test_report': global_accuracy_test_report,  # test data accuracy predction vs actual
            'prediction_report': global_prediction  # predicted values base on preidction range
        }

        # return the prediction report
        return predict_report

    except Exception as e:
        print(f"An error occurred: {e}")
        return False
