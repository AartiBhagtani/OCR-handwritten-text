#create a horizontal header file.
import csv
from time import gmtime, strftime
import sys
import yaml
import datetime


now = datetime.datetime.now()

#form_type="APP2"
form_type =  sys.argv[1]
y = now.strftime("%d_%m_%Y") +'.csv'

with open("C://xampp//htdocs//UI//OCR_13//path.yaml", 'r') as stream:
    path = yaml.load(stream)
    path_pwd = path['path_pwd']

path_pwd = 'C://xampp//htdocs//UI//OCR_13'
path_config_file = path_pwd+'//config//'+ form_type + '.csv'
path_file = path_pwd + '//output//'+ form_type + '_' + y

with open(path_config_file,'r') as csv_file:
    csv_reader = csv.reader(csv_file,delimiter='~')    
    next(csv_reader)
    list = []
    for line in csv_reader:
        temp = line[0]
        list.append(temp)

#naming output file
with open(path_file,"w") as f:
    wr = csv.writer(f,delimiter="~")
    wr.writerow(list)