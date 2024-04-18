from fpdf import FPDF
from fpdf.fonts import FontFace


def create_report(TABLE_DATA=None, Seller_ID=None, Shop_Name=None, Product_Category=None):

    pdf = FPDF()
    pdf.add_page()
    pdf.add_font('roboto', '', 'Roboto-Regular.ttf', uni=True)
    pdf.set_font('roboto', size=18, style='')

    shop_name_format = f"{Shop_Name} Inventory Reports"  # format it to be displayed in the PDF

    pdf.cell(text=shop_name_format, align='C', center=True) # title of the PDF
    pdf.ln(10)  # line break
    pdf.set_font('roboto', size=12)  # set font size
    pdf.cell(0, 10, text="Inventory Report", align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text="Product Category: All",  align='L')  # write the timespan
    pdf.ln(5)  # line break
    pdf.cell(0, 10, text=f"Seller {str(Seller_ID)}",align='L')  # write the timespan
    pdf.ln(5)  # line break

    #TABLE
    pdf.ln(0)
    pdf.set_font('roboto', size=8)

    #TABLE
    pdf.set_font('roboto', size=5)

    blue = (0, 0, 255)
    white = (255, 255, 255)
    headings_style = FontFace(color=blue, fill_color=white)

    # create the table with the headings style and the column widths specified
    with pdf.table(col_widths=(5,10,10,5,5, 5,5,5,5), headings_style=headings_style) as table:
        for data_row in TABLE_DATA:
            row = table.row()
            for datum in data_row:
                row.cell(datum)


    # pdf.output("inventory.pdf")

    return bytes(pdf.output())

# create_report()