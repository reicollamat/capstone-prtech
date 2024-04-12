import json
import pydantic
from fastapi import FastAPI, HTTPException, Body, Request
from pydantic import BaseModel, Field, field_validator
import datevalueFix
from datetime import datetime, timedelta


app = FastAPI()

current_date = datetime.now().date()

@app.get("/")
async def say_hi(request: Request):
    return {"message": "Hello, World!"}

@app.post("/api/v1/predict")
async def pred(request: Request):

    data = await request.json()

    # print(data.keys())

    product_id = data['product_id']
    interval  = data['interval']
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

    if(pred_range == 'week'):
        prediction_range = 7
    elif(pred_range == 'month'):
        prediction_range = 30
    else:
        prediction_range = int(custom_range)

    # create a list of dictionaries with proper date format
    parase_date_1 = datevalueFix.datevalueFix(sales)

    # fill missing dates according to startiung and ending date
    parase_date_2 = datevalueFix.fill_missing_dates(parase_date_1)

    # print(parase_date_2)

    print(current_date)
    filtered_data = []

    if(pred_range == 'week'):
        # Filter dates that are within the last 7 days (inclusive of today)
        filtered_data = [item for item in parase_date_2 if current_date - timedelta(days=7) <= datetime.strptime(item['created_at'], '%Y-%m-%d').date() <= current_date]
        #print(f'Filtered Data from week: {filtered_data}')

    elif(pred_range == 'month'):
        # Filter dates that are within the last 30 days (inclusive of today)
        filtered_data = [item for item in parase_date_2 if current_date - timedelta(days=30) <= datetime.strptime(item['created_at'], '%Y-%m-%d').date() <= current_date]
        #print(f'Filtered Data from month: {filtered_data}')
    else:
        # Filter dates that are within the custom range
        # Calculate the date 'n' days ago
        past_date = current_date - timedelta(days=int(custom_range))
        filtered_data = [item for item in parase_date_2 if past_date <= datetime.strptime(item['created_at'], '%Y-%m-%d').date() <= current_date]
        #print(f'Filtered Data from custom range: {filtered_data}')

    # json_data_from_request = await request.json()

    # generate a future dates base on prediction range
    future_dates = [current_date + timedelta(days=i) for i in range(1, int(prediction_range) + 1)]

    return_data = {
        "product_id": product_id,
        "interval": interval,
        "range": pred_range,
        "custom_range": custom_range,
        "prediction_range": prediction_range,
        "future_dates": future_dates,
        "data": parase_date_2,
        "filtered_data": filtered_data
    }

    return return_data
