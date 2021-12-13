import pandas as pd
import re

data = pd.read_json('topcv.json', encoding='utf8')
data = data.drop(['Số lượng tuyển '], axis=1)

data['application_deadline'] = pd.to_datetime(data['application_deadline'], format='%d/%m/%Y')

for i in range(len(data['salary'])):
    data.at[i, 'salary'] = re.sub('\n', '', data.at[i, 'salary'])

with open('topcv_process.json', 'w', encoding='utf-8') as file:
    data.to_json(file, orient='records', force_ascii=False)
file.close()




