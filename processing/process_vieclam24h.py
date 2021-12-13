import pandas as pd

data = pd.read_json('vieclam24h.json', encoding='utf8')

with open('vieclam24h_process.json', 'w', encoding='utf-8') as file:
    data.to_json(file, orient='records', force_ascii=False)
file.close()