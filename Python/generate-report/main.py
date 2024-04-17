from datetime import datetime, timedelta

import pandas as pd
from fastapi import FastAPI, Request


app = FastAPI()

current_date = datetime.now().date()


@app.get("/")
def read_root():
    return {"Hello": "World"}
