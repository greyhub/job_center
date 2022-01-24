from datetime import datetime
import matplotlib.pyplot as plt
from termcolor import colored

from config import DATACENTER, TEMP_STORAGE
from workflow.utils import read_data


category_cols = ['job_attributes', 'job_formality', 'required_gender_specific',
                 'job_experience_years']

def viz_with_count(_df, _category_cols):
    
    path_to_output = TEMP_STORAGE
    
    for _, col in enumerate(_category_cols):
        fig, ax = plt.subplots( nrows=1, ncols=1 )  # create figure & 1 axis
        ax = _df[col].value_counts().sort_values(ascending=True).plot(kind="barh", title=col)
        fig.savefig('{0}{1}.png'.format(path_to_output, col))   # save the figure to file
        # plt.show()
        plt.close(fig) 
        _df[col].value_counts().sort_values(ascending=True).\
            to_json(path_or_buf='{0}{1}.json'.format(path_to_output, col), force_ascii=False, indent=4)
    
    return

def eda(_data):
    print(colored("[{} | In process]".format(datetime.now()), 'green'), "Analysing Exploratory Data")
    viz_with_count(_data, category_cols)
    return


if __name__ == '__main__':
    dataCenter = read_data(DATACENTER)
    eda(dataCenter)
