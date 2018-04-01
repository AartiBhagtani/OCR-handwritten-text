import csv
from time import gmtime, strftime
import sys
import yaml
from all_paths import *
import datetime;

logger = logging.getLogger("label.py")
logger.setLevel(logging.INFO)
handler = logging.FileHandler("logger.log")
formatter = logging.Formatter('%(levelname)s - %(name)s - %(asctime)s - %(message)s')
handler.setFormatter(formatter)
logger.addHandler(handler)
logger.info('start of label.py')

try:
    x = form_type
    now = datetime.datetime.now()
    y = now.strftime("%d_%m_%y")+'.csv'

    path_csv = path_config+'/'+ x +'.csv'
    with open(path_csv,'r') as csv_file:
        csv_reader = csv.reader(csv_file,delimiter='~')
        next(csv_reader)
        list = []
        for line in csv_reader:
            temp = line[0]
            list.append(temp)
    #naming output file
    file = path_output+'/'+ x +'_'+y
    print(file
    )
    with open(file,"w") as f:
        wr = csv.writer(f,delimiter="~")
        wr.writerow(list)


except Exception as e:
        logger.info(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))
        print(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))

logger.info('end of label.py')
