import pandas as pd
import re

data = pd.read_json('timviecnhanh.json', encoding='utf8')
data['company_url'] = 'https://timviecnhanh.com' + data['company_url']

with open('timviecnhanh_process.json', 'w', encoding='utf-8') as file:
    data.to_json(file, orient='records', force_ascii=False)
file.close()