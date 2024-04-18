from fpdf import FPDF
from fpdf.fonts import FontFace


def create_report_predict(TABLE_DATA=None, Seller_ID=None, Shop_Name=None, Product_Category=None, date_today=None, lead_time=7):

    pdf = FPDF()
    pdf.add_page()
    pdf.add_font('roboto', '', 'Roboto-Regular.ttf', uni=True)
    pdf.set_font('roboto', size=18, style='')

    shop_name_format = f"{Shop_Name} Inventory Reports"  # format it to be displayed in the PDF

    pdf.cell(text=shop_name_format, align='C', center=True) # title of the PDF
    pdf.ln(10)  # line break
    pdf.set_font('roboto', size=11)  # set font size
    pdf.cell(0, 10, text="Restock Report", align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text="Product Category: All",  align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text=f"Seller {str(Seller_ID)}",align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text=f"Today is {str(date_today)}",align='R')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text=f"Product Lead time: {str(lead_time)} days",align='R')  # write the timespan
    pdf.ln(10)  # line break
    pdf.multi_cell(w=190,text="Optimal Resupply Days or ORD: Optimal resupply days represent the ideal time frame before a product reaches its reorder point to place a new order, The aim is to ensure enough inventory arrives before the existing stock runs out, preventing stockouts and disruptions in fulfilling customer orders.", align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.multi_cell(w=190,text="Dynamic Reorder Point or DRP is a calculation method used to determine the stock level at which a new order should be triggered, How many units are expected to be sold in the lead time (time it takes to receive new stock). This can be obtained from historical sales data or forecasting models.", align='L')  # write the timespan
    pdf.ln(5)  # line break


    #TABLE
    pdf.set_font('roboto', size=5)

    blue = (0, 0, 255)
    white = (255, 255, 255)
    headings_style = FontFace(color=blue, fill_color=white)

    # create the table with the headings style and the column widths specified
    with pdf.table(col_widths=(5,10,10,5,5, 5,5,5,5, 5), headings_style=headings_style) as table:
        for data_row in TABLE_DATA:
            row = table.row()
            for datum in data_row:
                row.cell(datum)


    # pdf.output("predictexport.pdf")

    return bytes(pdf.output())

# create_report()