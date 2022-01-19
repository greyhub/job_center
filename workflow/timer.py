from datetime import datetime
import schedule
import time 
import os
from termcolor import colored


time_per_step = 1  # seconds

def autoCrawl():
    print(colored("[{}]".format(datetime.now()), 'yellow'), 'Starting Auto Crawler')
    crawl(name="topcv")
    crawl(name="mywork.com")
    crawl(name="careerbuilder")
    crawl(name="tvn")
    crawl(name="vieclam24h")
    return

def crawl(name="topcv"):
    time.sleep(time_per_step)
    cmd = "scrapy crawl " + name
    print(colored("[{} | In process]".format(datetime.now()), 'green'), "{}".format(cmd))
    # os.system(cmd)
    time.sleep(time_per_step)
    return


if __name__ == "__main__":
    schedule.every(10).seconds.do(autoCrawl)
    while 1:
        schedule.run_pending()
        time.sleep(time_per_step)
