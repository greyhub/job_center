import pandas as pd
import re

# careerbuilder
data = pd.read_json('careerbuilder.json', encoding='utf8')
leng = len(data['salary'])

# for i in range(leng):
#     # sectors
#     sectors = re.split(',', data.at[i, 'sectors'])
#     data.at[i, 'sectors'] = sectors
#
#     # job_attributes
#     job_attributes = data.at[i, 'job_attributes']
#     if job_attributes == 'FULL_TIME':
#         job_attributes = 'Toàn thời gian'
#     if job_attributes == 'PART_TIME':
#         job_attributes = 'Bán thời gian'
#     if job_attributes == 'INTERN':
#         job_attributes = 'Thực tập'
#     if job_attributes == 'CONTRACTOR':
#         job_attributes = 'Khác'
#     data.at[i, 'job_attributes'] = job_attributes
#
#     # Salary
#     salary = data.at[i, 'salary']
#     salarys = re.findall('[0-9]+', salary)
#     num = len(salarys)
#     for j in range(num):
#         luong = int(salarys[j])
#         if luong < 1000000:
#             luong = int(luong * 22000 / 1000000)
#         else:
#             luong = int(luong / 1000000)
#         salarys[j] = luong
#     if num == 1:
#         salary = str(salarys[0]) + ' triệu'
#     if num == 2:
#         salary = str(salarys[0]) + ' - ' + str(salarys[1]) + ' triệu'
#     data.at[i, 'salary'] = salary
#
# data['update_time'] = pd.to_datetime(data['update_time'], format='%Y-%m-%d')
#
# data['application_deadline'] = pd.to_datetime(data['application_deadline'], format='%Y-%m-%d')
#
# with open('careerbuilder_process.json', 'w', encoding='utf-8') as file:
#     data.to_json(file, orient='records', force_ascii=False)
# file.close()
print(type(data['application_deadline'][0]))


