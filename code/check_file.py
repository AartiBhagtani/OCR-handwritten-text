import os.path
import os
import datetime
import sys
import os
import yaml
from all_paths import *
import logging

logger = logging.getLogger("check_file.py")
logger.setLevel(logging.INFO)
handler = logging.FileHandler("logger.log")
formatter = logging.Formatter('%(levelname)s - %(name)s - %(asctime)s - %(message)s')
handler.setFormatter(formatter)
logger.addHandler(handler)
logger.info('start of check_file.py')
try:
    x =  form_type
    #x='APP2'
    now = datetime.datetime.now()
    y = now.strftime("%d_%m_%y");
    print(y)
    file = path_output + '/' + x + '_' + y+'.csv'
    print(file)
    if(not(os.path.isfile(file))):
        os.system('C:/Python27/python '.path_pwd.'/code/label.py')
    os.system('C:/Python27/python '$path_code'/append_csv.py')

except Exception as e:
        logger.info(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))
        print(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))

logger.info('end of check_file.py')
