from datetime import datetime, timedelta
import locale
import pandas as pd
from fastapi import FastAPI, Request

from salesreport import create_sales_report_pdf

app = FastAPI()

current_date = datetime.now().date()

#  set local to Philippines and set currency to PHP
locale.setlocale(locale.LC_ALL, 'en_PH.UTF-8')


@app.get("/")
async def read_root():
    return {"Hello": "World"}


@app.post("/sales")
async def create_sales_report(request: Request):
    data = await request.json()

    shop_name = data.get("shop_name")
    shop_id = data.get("shop_id")

    print(shop_name, shop_id) # debug

    df = pd.DataFrame(data.get("products"))
    df['date'] = df['created_at'].apply(lambda x: pd.to_datetime(x).date().strftime("%Y-%m-%d"))

    # remove the created_at column
    df = df.drop(columns=["created_at"])

    starting_date = df['date'].min()
    ending_date = df['date'].max()

    # fix sales_day column type
    df['sales_day'] = df['sales_day'].astype(float)

    # fix the unit_price column type
    df['unit_price'] = df['unit_price'].astype(float)

    #fix the total_quantity column type
    df['total_quantity'] = df['total_quantity'].astype(int)

    #fix the column order
    df = df[["date", "product_id", "product_title", "total_quantity", "unit_price", "sales_day"]]

    # get the best selling product
    best_selling = df[df['total_quantity'] == df['total_quantity'].max()]['product_title'].values[0]

    # get the total items sold
    total_items_sold = df['total_quantity'].sum()

    # get the total revenue
    total_revenue = df['sales_day'].sum()

    # parse total_revenue to currency
    # total_revenue = locale.currency(total_revenue, grouping=True)
    #pretty format the total_revenue
    total_revenue = f"{total_revenue:,.2f}"

    print(starting_date, ending_date, best_selling, total_revenue, total_items_sold) # debug

    print(df.shape) # debug
    print(df.columns) # debug

    # print(df.head()) # debug

    # convert all columns to string
    df = df.astype(str)

    # convert df into a tuple of tuples
    TABLE_DATA2 = [tuple(row) for row in df.values]

    # convert the list of tuples into a tuple of tuples
    TABLE_DATA2 = tuple(TABLE_DATA2)

    TABLE_DATA1 = (
        ("Date", "#","Name", "# Unit Sold","# Unit Price", "Total Amount"),
    )

    TABLE_DATA = TABLE_DATA1 + TABLE_DATA2

    print(
        f'shop_name: {shop_name}\n'
        f'shop_id: {shop_id}\n'
        f'starting_date: {starting_date}\n'
        f'ending_date: {ending_date}\n'
        f'best_selling: {best_selling}\n'
        f'total_revenue: {total_revenue}\n'
        f'total_items_sold: {total_items_sold}\n'
        f'TABLE_DATA: {TABLE_DATA[:5]}\n'
    )


    # #varibales to pass in the PDF
    # # shop_name =

    # print(TABLE_DATA[:5]) # debug
    try:
        create_sales_report_pdf(
            shop_name=shop_name,
            shop_id=shop_id,
            timespan=f"{starting_date} - {ending_date}",
            revenue=str(total_revenue),
            total_items_sold=str(total_items_sold),
            best_selling=best_selling,
            TABLE_DATA=TABLE_DATA
        )
        pass
    except Exception as e:
        print(e)
        return {"status": "failed"}

    return {"status": "success"}
