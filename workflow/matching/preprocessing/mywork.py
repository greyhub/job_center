import pandas as pd
from pymongo import MongoClient
import re
client = MongoClient("mongodb+srv://Do_an_THHT:Do_an_THHT@cluster0.61ftc.mongodb.net/myFirstDatabase?retryWrites=true&w=majority")
lib = pd.read_json("lib.json", encoding="utf8")

db = client["crawl"]
data = db["mywork"]

# db_new = client["data_matching"]
# colection = db_new["mywork"]
db_new = client["matching-test"]
colection = db_new["data_matching"]

for dt in data.find():
    # del_id
    del dt["_id"]
    # processing
    dt['update_time'] = pd.to_datetime(dt['update_time'], format='%d/%m/%Y')
    dt['application_deadline'] = pd.to_datetime(dt['application_deadline'], format='%d-%m-%Y')

    # matching_data
    # job_attributes
    try:
        st = dt["job_attributes"]
        dt["job_attributes"] = lib['job_attributes'][0][st]
    except:
        dt["job_attributes"] = "Khác"

    # job_formality
    try:
        st = dt["job_formality"]
        dt["job_formality"] = lib['job_formality'][0][st]
    except:
        dt["job_formality"] = "Khác"

    # job_experience_years
    try:
        st = dt["job_experience_years"]
        dt["job_experience_years"] = lib['job_experience_years'][0][st]
    except:
        continue

    # sectors
    for j in range(len(dt["sectors"])):
        try:
            st = dt['sectors'][j]
            str = lib['sectors'][0][st]
            dt['sectors'][j] = str
        except:
            dt['sectors'][j] = "Ngành nghề khác"
    dt['sectors'] = list(dict.fromkeys(dt['sectors']))

    # salary
    salary = re.findall("\d+", dt['salary'])
    try:
        gt = int(salary[0])
        label = ""
        if gt < 5:
            label = "Dưới 5 triệu"
        else:
            if gt < 10:
                label = "5 - 10 triệu"
            else :
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
    #     dt['salary'] = {"label": label, "salary": dt['salary']}
    # except:
    #     dt['salary'] = {"label": "Thỏa thuận", "salary": dt['salary']}
        dt["salary_label"] = label
    except:
        dt['salary_label'] = "Thỏa thuận"

    # timestampISOdate
    dt['timestampISOdate'] = pd.to_datetime(dt['timestampISOdate'], format='%d/%m/%Y')

    # save database
    colection.insert_one(dt)
