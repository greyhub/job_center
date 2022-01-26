from datetime import datetime
import sys
import schedule
import time 
import os
from termcolor import colored

from timer import autoCrawl
from config import DATA_DIR, DATACENTER, TIME_PER_PIPELINE
from exploratory.EDA.eda import eda
from exploratory.prediction.prediction import prediction
from utils import read_data
from exploratory.ranking.ranking import ranking

import warnings
warnings.filterwarnings("ignore")


def pipeline():
    autoCrawl()
    dataCenter = read_data(DATACENTER)
    eda(dataCenter)
    pred_data = prediction(dataCenter, DATA_DIR)
    ranking(pred_data, dataCenter, DATA_DIR)
    return


if __name__ == "__main__":
    try:
        pipeline()  # The first time
        schedule.every(TIME_PER_PIPELINE).seconds.do(pipeline)  # Every week
        while 1:
            schedule.run_pending()
            time.sleep(1)
    except KeyboardInterrupt:
        print(colored("[{}]".format(datetime.now()), 'red'), 'Stopped')
        try:
            sys.exit(0)
        except SystemExit:
            os._exit(0)
