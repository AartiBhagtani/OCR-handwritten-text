import os,sys
import csv

with open("C://xampp//htdocs//UI//OCR_13//code/fake.csv" , 'rb+') as filehandle:
    filehandle.seek(-1, os.SEEK_END)
    filehandle.truncate()


with open("F:/AArti/xampp/htdocs/ocr13/code/fake.csv" , 'rb+') as filehandle:
    filehandle.seek(-1, os.SEEK_END)
    filehandle.truncate()
'''
with open("F:/AArti/xampp/htdocs/ocr13/code/fake.csv", 'r') as f:
    with open("F:/AArti/xampp/htdocs/ocr13/code/take.csv", 'w') as t:
        for lines in f:
            new_line = lines.replace(",","~")
            t.write(new_line)

folder = "F:/AArti/OCR"
for filename in os.listdir(folder):
       infilename = os.path.join(folder,"workfile.txt")
       if not os.path.isfile(infilename): continue
       oldbase = os.path.splitext(filename)
       newname = infilename.replace('.txt', '.csv')
       output = os.rename(infilename, newname)

with open('F:/AArti/OCR/workfile.csv', 'ab') as f:
    writer = csv.writer(f,delimiter='~')    
    writer.writerow([])       
'''