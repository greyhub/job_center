import pandas as pd
import os

path_to_temp_storage = 'database/raw_data/mywork_process.csv'

if os.path.exists(path_to_temp_storage):
    myworkDB = pd.read_csv(path_to_temp_storage)
else:
    myworkDB = pd.read_json("database/raw_data/mywork_process.json")
    myworkDB.to_csv("database/temp_storage/mywork_process.csv", index=False)

print(myworkDB.columns)
