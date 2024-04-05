import json
from urllib import request
import pydantic
from fastapi import FastAPI, HTTPException, Body, Request
from pydantic import BaseModel, Field, field_validator

app = FastAPI()


class SalesData(BaseModel):
    dates: list[str] = Body(..., title="Dates")  # Required field for dates
    sales: list[float] = Body(..., title="Sales")  # Required field for sales values
    interval: str = Body(
        ..., title="Interval"
    )  # what type of date interval to use for training
    length: str = Body(..., title="Length")  # The length of time to predict


@app.post("/sales-predict")
async def record_sales(data: SalesData):
    try:
        # Process the received data here (replace with your actual logic)
        # Example: Simulate a potential processing error
        print(f"Received sales data: dates={data.dates}, sales={data.sales}")
        # print(data)

        # Replace with your actual data processing logic (e.g., database storage)
        return {"message": "Sales data received successfully!", "data": data}
    except Exception as e:
        # Handle any unexpected errors gracefully
        raise HTTPException(
            status_code=500,
            detail=f"An error occurred while processing sales data: {str(e)}",
        )


# class User(BaseModel):
#     name: str = Field(..., min_length=1, max_length=50)
#     age: int = Field(..., type=int)


@app.get("/")
async def say_hi(request: Request):
    return {"message": "Hello, World!"}

@app.post("/api/v1/predict")
async def pred(request: Request):

    data = await request.json()

    print(data)

    return await request.json()
