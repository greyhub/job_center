# import pandas as pd
# import seaborn as sns
# import matplotlib.pyplot as plt


# def get_unique(col_name, df):
#     return list(df[col_name].unique())

# def get_label_from_salary(s):
#     return s['label']

def trans_data(val, col_name, trans_dict):
    res = trans_dict[col_name][val]
    return res