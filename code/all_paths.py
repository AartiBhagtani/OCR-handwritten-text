import yaml
import os
import logging
import os.path
from time import gmtime, strftime
import datetime
import sys
import csv
import logging

path_yaml = 'c:/xampp/htdocs/paperpy/code/path.yaml'

def main(path_yaml): 
    form = sys.argv[1]
    image = sys.argv[2]
    global form_type #Which form
    global image_name # Image name
    with open(path_yaml, 'r') as stream:
        path = yaml.load(stream)
        path['category'] = form
        path['image_file'] =  image
        with open(path_yaml, "w") as f:
            yaml.safe_dump(path,f, default_flow_style=False )

if __name__ == "__main__":
   main(path_yaml)

with open(path_yaml, 'r') as stream:
    path = yaml.load(stream)
    form_type = path['category'] 
    image_name = path['image_file']
    path_pwd = path['path_pwd']
    path_input = path['path_input']
    path_temp = path['path_temp']
    path_config = path['path_config']
    path_output = path['path_output']
    path_tesseract = path['path_tesseract']
    path_code = path['path_code']
    path_image = path_input + '/' + form_type + '/' +image_name
    path_config_file = path_config + '/' + form_type + '.csv'
