from fpdf import FPDF
from fpdf.fonts import FontFace




def create_sales_report_pdf(shop_name, shop_id, timespan, revenue, total_items_sold, best_selling, TABLE_DATA, quarter_sales, product_category):
    # create a hint for the function parameters
    """
    Create a sales report in PDF format
    Args:
        shop_name (str): The name of the shop
        shop_id (int): The ID of the shop
        timespan (str): The timespan of the sales report
        revenue (string): The total revenue of the shop
        total_items_sold (int): The total items sold
        seller_id (int): The ID of the seller
        best_selling (str): The best selling product
        TABLE_DATA (tuple): The data to be displayed in the table
        quarter_sales (str): what quarter the sales report is for
    Returns:
        None
    """
    # Variables
    shop_name_format = f"{shop_name} Sales Report"  # format it to be displayed in the PDF
    timespan_format = f"Date From {timespan}"  # format it to be displayed in the PDF

    pdf = FPDF()
    pdf.add_page()
    pdf.set_font('helvetica', size=18, style='B')

    pdf.cell(text=shop_name_format, align='C', center=True) # title of the PDF
    pdf.ln(10)  # line break
    pdf.set_font('helvetica', size=12)  # set font size
    # justify right
    pdf.write(None, timespan_format)  # write the timespan
    pdf.ln(5)  # line break
    pdf.write(None, f'Quarter Sales: {quarter_sales}')  # write the timespan
    pdf.ln(5)  # line break
    pdf.write(None, f'Product Category: {product_category}')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(None, text=f'Seller # {shop_id}', align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(None, text=f"Bestselling : {best_selling}", align='L')  # total revenue

    pdf.set_font('helvetica', size=12, style='B')  # set font size
    # pdf.cell(0, 10, text=f'Average Price Per Item: {price_per_item}')  # price per item
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text=f"Total Items Sold: {total_items_sold} Items", align='R')  # total items sold
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text=f"Total Revenue: P {revenue}", align='R')  # total revenue


    #TABLE
    pdf.ln(10)
    pdf.set_font('helvetica', size=8)

    blue = (0, 0, 255)
    white = (255, 255, 255)
    headings_style = FontFace(emphasis="ITALICS", color=blue, fill_color=white)

    # create the table with the headings style and the column widths specified
    with pdf.table(col_widths=(7,5,20,10,10, 10), headings_style=headings_style) as table:
        for data_row in TABLE_DATA:
            row = table.row()
            for datum in data_row:
                row.cell(datum)


    # pdf.output("sales.pdf")
    return bytes(pdf.output())



# TABLE_DATA = (
#         ("Date", "#","Name", "# Unit Sold","# Unit Price", "Total Amount"),
#         ("2024-10-01", "4353", "Samsung 980 Pro 1TB NVMe PCIe Gen4 SSD", "10", "293", "2930"),
#     )

# create_sales_report_pdf(
#     shop_name="My Shop",
#     shop_id=143,
#     timespan="2024-10-01 - 2024-10-31",
#     revenue='134000',
#     total_items_sold=10,
#     best_selling="Samsung 980 Pro 1TB NVMe PCIe Gen4 SSD",
#     TABLE_DATA=TABLE_DATA
# )
