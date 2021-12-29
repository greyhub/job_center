import schedule
import time 
import os


def autocrawl():
    print("Autocrawl...")
    crawl(name="topcv")
    crawl(name="mywork.com")
    crawl(name="careerbuilder")
    crawl(name="tvn")
    crawl(name="vieclam24h")
    return

def crawl(name="topcv"):
    cmd = "scrapy crawl " + name
    print("In process: " + cmd)
    time.sleep(5)
    # os.system(cmd)
    return


if __name__ == "__main__":

    schedule.every(10).seconds.do(autocrawl)

    while 1:
        schedule.run_pending()
        time.sleep(1)