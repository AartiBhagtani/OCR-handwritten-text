import re
import cv2
import numpy as np
from PIL import Image
import csv
from all_paths import *

#including logger file
logger = logging.getLogger("main.py")
logger.setLevel(logging.INFO)
handler = logging.FileHandler("logger.log")
formatter = logging.Formatter('%(levelname)s - %(name)s - %(asctime)s - %(message)s')
handler.setFormatter(formatter)
logger.addHandler(handler)
logger.info('start of main.py')

def preprocess():
    img = cv2.imread(path_image)
    denoise = cv2.fastNlMeansDenoisingColored(img,None,10,10,7,21)
    gray = cv2.cvtColor(denoise,cv2.COLOR_BGR2GRAY)
    blur = cv2.blur(gray,(3,3))
    ret,thresh = cv2.threshold(blur,200,255,cv2.THRESH_BINARY)
    cv2.imwrite(path_image, thresh)

def make_block(line):
    line = line.replace('-','')
    line = line.replace('_','')
    line = line[:-1] # to remo
    line = line.upper()
    line = line.replace('0','O')
    line = line.replace('2','Z')
    line = line.replace('5','S')
    line = line.replace('8','B')
    line = line.replace('|','I')
    line = line.replace('1','I')
    line = line.replace('4','H')
    return line

def make_digit(line):
    line = line.replace('-','')
    line = line.replace('_','')
    line = line[:-1]
    line = line.upper()
    line = line.replace('O','0')
    line = line.replace('Z','2')
    line = line.replace('S','5')
    line = line.replace('B','8')
    line = line.replace('|','1')
    line = line.replace('I','1')
    line = line.replace('H','4')

    return line

def recognize():
    img = Image.open(path_image)
    with open(path_config_file, 'r') as f:
        mycsv = csv.reader(f, delimiter="~")
        mycsv = list(mycsv)
        row = len(mycsv)
        for line_number in range(1,row):
            area = (mycsv[line_number][1] , mycsv[line_number][4] , mycsv[line_number][3],mycsv[line_number][2])
            img_cropped = img.crop([int(y) for y in area])
            img_cropped.save(path_temp+'/img_cropped.png')
            image_path = path_temp+'/img_cropped.png'
            os.chdir(path_tesseract)
            os.system('tesseract ' + image_path +' '+ path_temp + '/out -l eng --oem 0 -psm 6')
            f = open(path_temp+'/out.txt','r')
            lines = f.read()
            lines = re.sub('[^a-zA-Z0-9 \n\.]', '', lines)

            if(mycsv[line_number][5] == "digits"):
                line = make_digit(lines)
            else:
                line = make_block(lines)
            fs = open(path_temp + '/value.csv', 'a')
            fs.write(line.rstrip('\n') + '~')
            fs.close()

def remove_tilda():
    with open(path_temp + '/value.csv' , 'rb+') as f:
        f.seek(-1, os.SEEK_END)
        f.truncate()

if __name__ == "__main__":

    try:
        preprocess()                        # denoise, gray scale, blur, threshold,
        recognize()

    except Exception as e:
        logger.info(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))
        print(str(e)+('Error on line {}'.format(sys.exc_info()[-1].tb_lineno)))

logger.info('end of main.py')