from datetime import datetime
import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt
from termcolor import colored


def ranking(_pred, _data, _data_dir):
    
    print(colored("[{} | In process]".format(datetime.now()), 'green'), "Ranking Jobs with Overall Score")

    ranked_data = _pred.copy()

    a = 111
    b = -11
    c = -9

    ranked_data['overall_score']\
        = a*ranked_data['salary_prediction']\
        + b*ranked_data['job_experience_years']\
        + c*ranked_data['required_gender_specific']

    _data['overall_score'] = ranked_data['overall_score']
    _data = _data.sort_values(by='overall_score', ascending=False).reset_index(drop=True)

    _data.to_csv(_data_dir + "dataCenter_rank.csv", index=False)

    return
