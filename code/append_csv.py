import csv
import os
from time import gmtime, strftime
import sys
import subprocess
import yaml
from all_paths import *
import datetime

logger = logging.getLogger("append_csv.py")
logger.setLevel(logging.INFO)
handler = logging.FileHandler("logger.log")
formatter = logging.Formatter('%(levelname)s - %(name)s - %(asctime)s - %(message)s')
handler.setFormatter(formatter)
logger.addHandler(handler)
logger.info('start of append_csv.py')

try:
    #print(datetime.datetime.now())
    x = form_type
    now = datetime.datetime.now()
    y = now.strftime("%d_%m_%y")+'.csv'

    #pwd = 'C://xampp//htdocs//UI//OCR_13'
    path_csv = path_temp + '/file.csv'
    file = path_output+'/' + x + '_' + y
    #open("append_file.txt",'w')
    print(file)
    with open(path_csv,'r') as csv_file:
        csv_reader = csv.reader(csv_file,delimiter=',')

        with open(file, 'a') as f:
            writer = csv.writer(f,delimiter='~')
            for line in csv_reader:
                writer.writerow(line)
                writer.strip()

except Exception as e:
        logger.info(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))
        print(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))

logger.info('end of append_csv.py')