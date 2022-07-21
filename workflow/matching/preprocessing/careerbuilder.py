import pandas as pd
from pymongo import MongoClient
import re
client = MongoClient("mongodb+srv://Do_an_THHT:Do_an_THHT@cluster0.61ftc.mongodb.net/myFirstDatabase?retryWrites=true&w=majority")
lib = pd.read_json("lib.json", encoding="utf8")

db = client["crawl"]
data = db["careerbuilder"]

# db_new = client["data_matching"]
# colection = db_new["careerbuilder"]
db_new = client["matching-test"]
colection = db_new["data_matching"]


for dt in data.find():
    # del_id
    del dt["_id"]
    # data_time
    dt["update_time"] = pd.to_datetime(dt["update_time"], format="%Y-%m-%d")
    dt["application_deadline"] = pd.to_datetime(dt["application_deadline"], format="%Y-%m-%d")
    dt["timestampISOdate"] = pd.to_datetime(dt['timestampISOdate'], format='%d/%m/%Y')

    # sectors
    for j in range(len(dt["sectors"])):
        try:
            st = dt['sectors'][j]
            str = lib['sectors'][1][st]
            dt['sectors'][j] = str
        except:
            dt['sectors'][j] = "Ngành nghề khác"
    dt['sectors'] = list(dict.fromkeys(dt['sectors']))

    # job_formality
    try:
        st = dt["job_formality"]
        dt["job_formality"] = lib['job_formality'][1][st]
    except:
        dt["job_formality"] = "Khác"

    # job_attributes
    try:
        st = dt["job_attributes"]
        dt["job_attributes"] = lib['job_attributes'][1][st]
    except:
        dt["job_attributes"] = "Khác"

    # job_experience_years
    try:
        exp = re.findall("\d+", dt["job_experience_years"])
        try:
            kn = int(exp[0])
            value = ""
            if kn < 1:
                value = "Dưới 1 năm"
            else:
                if kn < 2:
                    value = "1 năm"
                else:
                    if kn < 3:
                        value = "2 năm"
                    else:
                        if kn < 4:
                            value = "3 năm"
                        else:
                            if kn < 5:
                                value = "4 năm"
                            else:
                                if kn < 6:
                                    value = "5 năm"
                                else:
                                    value = "Trên 5 năm"
            dt["job_experience_years"] = value
        except:
            dt["job_experience_years"] = "Không yêu cầu kinh nghiệm"
    except:
        print()

    # salary
    luong = re.findall("\d+", dt['salary'])
    try:
        gt = int(luong[0])
        if gt < 1000000:
            gt = int(gt * 22000 / 1000000)
        else:
            gt = int(gt / 1000000)
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
                        abel = "15 - 20 triệu"
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
    # save_database
    colection.insert_one(dt)





