from datetime import datetime, timedelta

import pandas as pd
from fastapi import FastAPI, Request

import datevalueFix
import handle_predict_reporting
import prtechPredict

app = FastAPI()

current_date = datetime.now().date()


@app.get("/")
async def say_hi(request: Request):
    return {"message": "Hello, World!"}


@app.post("/api/v1/predict")
async def pred(request: Request):
    data = await request.json()

    splitting_method = None

    # print(data.keys())

    product_id = data['product_id']
    interval = data['interval']
    pred_range = data['range']
    custom_range = data['custom_range']
    sales = data['data']
    # pos_comments = data['positive']
    # neg_comments = data['negative']

    # print(product_id, interval, range, custom_range)

    print(f'Product ID: {product_id}')
    print(f'Interval: {interval}')
    print(f'Range: {pred_range}')
    print(f'Custom Range: {custom_range}')
    # print(type(sales[0]))

    prediction_range = 0

    if pred_range == 'week':
        prediction_range = 7
    elif pred_range == 'month':
        prediction_range = 30
    else:
        prediction_range = int(custom_range)

    # create a list of dictionaries with proper date format
    parase_date_1 = datevalueFix.datevalueFix(sales)

    # fill missing dates according to startiung and ending date
    parase_date_2 = datevalueFix.fill_missing_dates(parase_date_1)

    # print(parase_date_2)

    print(current_date)
    # filtered_data = []
    #
    # if(pred_range == 'week'):
    #     # Filter dates that are within the last 7 days (inclusive of today)
    #     filtered_data = [item for item in parase_date_2 if current_date - timedelta(days=7) <= datetime.strptime(item['created_at'], '%Y-%m-%d').date() <= current_date]
    #     #print(f'Filtered Data from week: {filtered_data}')
    #
    # elif(pred_range == 'month'):
    #     # Filter dates that are within the last 30 days (inclusive of today)
    #     filtered_data = [item for item in parase_date_2 if current_date - timedelta(days=30) <= datetime.strptime(item['created_at'], '%Y-%m-%d').date() <= current_date]
    #     #print(f'Filtered Data from month: {filtered_data}')
    # else:
    #     # Filter dates that are within the custom range
    #     # Calculate the date 'n' days ago
    #     past_date = current_date - timedelta(days=int(custom_range))
    #     filtered_data = [item for item in parase_date_2 if past_date <= datetime.strptime(item['created_at'], '%Y-%m-%d').date() <= current_date]
    #     #print(f'Filtered Data from custom range: {filtered_data}')

    # json_data_from_request = await request.json()

    # generate a future dates base on prediction range
    future_dates = [current_date + timedelta(days=i) for i in range(1, int(prediction_range) + 1)]

    # df lenght
    print(f'Dataframe length: {len(parase_date_2)}')

    # convert a list of dictionary to pandas dataframe
    df = pd.DataFrame(parase_date_2)

    computed_lags = 0
    best_params = {'learning_rate': 0.01, 'max_depth': 3, 'min_child_weight': 1, 'n_estimators': 2000,
                   'subsample': 1.0}

    custom_days_testing = 2

    if len(df) >= 30:
        computed_lags = 30
        custom_days_testing = 7
    elif 14 <= len(df) < 30:
        computed_lags = 14
        custom_days_testing = 4
    elif 7 <= len(df) < 14:
        computed_lags = 7
        custom_days_testing = 2
    else:
        computed_lags = len(df)

    if len(df) <= 7:
        splitting_method = 'custom'
        custom_days_testing = 2
    elif 7 < len(df) < 30:
        splitting_method = 'custom'
        custom_days_testing = 7
    elif len(df) >= 60:
        splitting_method = 'custom'
        custom_days_testing = 14
    elif len(df) >= 90:
        splitting_method = 'custom'
        custom_days_testing = 28

    if len(df) <= 30:
        best_params = {'learning_rate': 0.01, 'max_depth': 3, 'min_child_weight': 1, 'n_estimators': 2000,
                       'subsample': 1.0}

    print(f'Computed Lags: {computed_lags}')

    # SAMPLE
    # obj = PrtechPredict(sales, prediction_range=7, lag_days=30, splitting_method='custom', model_train_ratio=0.8,
    #                     remove_outliers=True, best_params=best_params, custom_days=2)

    predict = prtechPredict.PrtechPredict(data=parase_date_2, prediction_range=prediction_range, lag_days=computed_lags,
                                          splitting_method=splitting_method, model_train_ratio=0.8,
                                          remove_outliers=True, best_params=best_params,
                                          custom_days=custom_days_testing)

    predict_report = predict.send_report()

    model_report = handle_predict_reporting.handle_prediction(predict_report)

    return_data = {
        "product_id": product_id,
        "interval": interval,
        "range": pred_range,
        "custom_range": custom_range,
        "prediction_range": prediction_range,
        "future_dates": future_dates,
        "prediction_data": parase_date_2,
        **model_report
    }

    return return_data
