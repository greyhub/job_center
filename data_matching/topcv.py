import pandas as pd
from pymongo import MongoClient
import re
client = MongoClient("mongodb://127.0.0.1:27017/")
lib = pd.read_json("lib.json", encoding="utf8")

database = client["crawl"]
data = database["topcv"]

database_new = client["data_matching"]
colection = database_new["topcv"]

for dt in data.find():
    # salary
    dt["salary"] = re.sub("\n", "", dt["salary"])
    salary = re.findall("\d+", dt['salary'])
    try:
        gt = int(salary[0])
        label = ""
        if gt < 5:
            label = "Dưới 5 triệu"
        else:
            if gt < 10:
                label = "5 - 10 triệu"
            else:
                if gt < 15:
                    label = "10 - 15 triệu"
                else:
                    if gt < 20:
                        label = "15 - 20 triệu"
                    else:
                        if gt < 25:
                            label = "20 - 25 triệu"
                        else:
                            if gt < 30:
                                label = "25 - 30 triệu"
                            else:
                                label = "Trên 30 triệu"
        dt['salary'] = {"label": label, "salary": dt['salary']}
    except:
        dt['salary'] = {"label": "Thỏa thuận", "salary": dt['salary']}

    # datatime
    dt['application_deadline'] = pd.to_datetime(dt['application_deadline'], format='%d/%m/%Y')
    dt['timestampISOdate'] = pd.to_datetime(dt['timestampISOdate'], format='%d/%m/%Y')

    # save database
    colection.insert_one(dt)