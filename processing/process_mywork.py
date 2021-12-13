import pandas as pd
import re

data = pd.read_json('mywork.json', encoding='utf8')

data['update_time'] = pd.to_datetime(data['update_time'], format='%d/%m/%Y')

data['application_deadline'] = pd.to_datetime(data['application_deadline'], format='%d-%m-%Y')


with open('mywork_process.json', 'w', encoding='utf-8') as file:
    data.to_json(file, orient='records', force_ascii=False)
file.close()