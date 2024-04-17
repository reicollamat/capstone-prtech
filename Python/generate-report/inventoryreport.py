# from fpdf import FPDF

# pdf = FPDF()
# pdf.add_page()
# pdf.set_font('helvetica', size=18, style='B')

# shop_name = "My Shop"  # get from database
# shop_name_format = f"{shop_name} Inventory Report"  # format it to be displayed in the PDF

# pdf.cell(text=shop_name_format, align='C', center=True) # title of the PDF
# pdf.ln(10)  # line break
# pdf.set_font('helvetica', size=14)  # set font size

# pdf.output("inventory.pdf")
font_path = r'./fonts/NotoSans-VariableFont_wdth,wght.ttf'

print(font_path)
