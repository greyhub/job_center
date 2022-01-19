# import pandas as pd
# import seaborn as sns
# import matplotlib.pyplot as plt


# def toPercent(__data):
#     for idx in __data.index:
#         __data.loc[idx] = round(__data.loc[idx] / __data.loc[idx].sum() * 100)
#     return

# def viz_corr(col_name1, col_name2, __data):
#     _tmp = __data.groupby([col_name1, col_name2]).count().reset_index()
#     _tmp['num'] = _tmp['source']
#     _corr = _tmp[[col_name1, col_name2, 'num']].sort_values(by=[col_name1, 'num'], ascending=False)
#     _corr = _corr.pivot(col_name1, col_name2, 'num').fillna(0)
#     # _corr.loc['Bán thời gian'] = round(_corr.loc['Bán thời gian'] / _corr.loc['Bán thời gian'].sum() * 100)
#     toPercent(_corr)
#     _corr = _corr.astype('int32')
#     ax = sns.heatmap(_corr, annot=True, fmt='d', cmap="YlGnBu")
#     return

# def viz_corr_num(col_name1, col_name2, __data):
#     _tmp = __data.groupby([col_name1, col_name2]).count().reset_index()
#     _tmp['num'] = _tmp['source']
#     _corr = _tmp[[col_name1, col_name2, 'num']].sort_values(by=[col_name1, 'num'], ascending=False)
#     _corr = _corr.pivot(col_name1, col_name2, 'num').fillna(0)
#     _corr = _corr.astype('int32')
#     ax = sns.heatmap(_corr, annot=True, fmt='d', cmap="YlGnBu")
#     return

# def get_unique(col_name, df):
#     return list(df[col_name].unique())

# def get_label_from_salary(s):
#     return s['label']