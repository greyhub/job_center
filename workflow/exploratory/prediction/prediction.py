import pandas as pd
import seaborn as sns
import matplotlib.pyplot as plt


def get_unique(col_name, df):
    return list(df[col_name].unique())

def trans_data(val, col_name, trans_dict):
    res = trans_dict[col_name][val]
    return res

def get_label_from_salary(s):
    return s['label']

def setup():
    trans_dict = {}

    # job_attributes
    trans_dict['job_attributes'] = {
        'Thực tập': 1,
        'Bán thời gian': 2, 
        'Toàn thời gian': 3, 
        'Remote - Làm việc từ xa': 4,
        'Khác': 5,
    }

    # job_formality
    trans_dict['job_formality'] = {
        'Thực tập sinh': 1, 
        'Nhân viên': 2, 
        'Trưởng chi nhánh': 3,
        'Trưởng nhóm': 4, 
        'Quản lý / Giám sát': 5, 
        'Trưởng/Phó phòng': 6, 
        'Phó giám đốc': 7, 
        'Giám đốc': 8,
        'Khác': 9
    }

    # required_gender_specific
    trans_dict['required_gender_specific'] = {
        'Nữ': 1,
        'Không yêu cầu': 2,
        'Nam': 3
    }

    # job_experience_years
    trans_dict['job_experience_years'] = {
        'Dưới 1 năm': 1, 
        'Không yêu cầu kinh nghiệm': 2, 
        '1 năm': 3, 
        '2 năm': 4, 
        '3 năm': 5, 
        '4 năm': 6, 
        '5 năm': 7, 
        'Trên 5 năm': 8
    }

    trans_dict['salary_label'] = {
        'Thỏa thuận': 0, 
        'Dưới 5 triệu': 1,
        '5 - 10 triệu': 2, 
        '10 - 15 triệu': 3, 
        '15 - 20 triệu': 4, 
        '20 - 25 triệu': 5, 
        '25 - 30 triệu': 6, 
        'Trên 30 triệu': 7
    }

    trans_dict['inverse_salary_label'] = {
        0:'Không',
        1:'Dưới 5 triệu',
        2:'5 - 10 triệu', 
        3:'10 - 15 triệu', 
        4:'15 - 20 triệu', 
        5:'20 - 25 triệu', 
        6:'25 - 30 triệu', 
        7:'Trên 30 triệu'
    }    
    return

def read_data():
    data_dir = "../EDA/data/"

    __path_to_df = '../../../database/data_center/dataCenter.csv'
    __df = pd.read_csv(__path_to_df)

    __cols = ['sectors',
     'salary_label',
     'job_attributes',
     'job_formality',
     'required_gender_specific',
     'job_experience_years',
     'job_requirements',
     'company_name',
     'company_address']

    __df = __df[__cols]
    __df['source'] = 'jobCenter'

    _df = __df.copy()
    _df['salary_label'] = _df['salary_label'].fillna('Thỏa thuận')
    _df['required_gender_specific'] = _df['required_gender_specific'].fillna('Không yêu cầu')
    _df['job_experience_years'] = _df['job_experience_years'].fillna('Không yêu cầu kinh nghiệm')

    dataCenter = _df.copy()
    return

def preprocessing():
    category_cols = ['salary_label', 'job_attributes', 'job_formality', 
                     'required_gender_specific',
                     'job_experience_years']

    # for col in category_cols:
    #     print(col, "\n______", get_unique(col, dataCenter))

    __data = dataCenter.copy()

    encoded_data = __data[category_cols]
    for col in encoded_data.columns:
        try:
            encoded_data[col] = encoded_data[col].apply(lambda x: trans_data(x,col,trans_dict))
        except:
            print(col)

    # features = ['job_attributes', 'job_formality', 
    #             'required_gender_specific',
    #             'job_experience_years']

    # for f in features:
    #     encoded_data[f] = encoded_data[f] / encoded_data[f].max()    
    return

def train():
    pred = encoded_data[encoded_data['salary_label'] == 0]
    train = encoded_data[encoded_data['salary_label'] != 0]

    # train-test split evaluation random forest on the sonar dataset
    from pandas import read_csv
    from sklearn.model_selection import train_test_split
    from sklearn.ensemble import RandomForestClassifier
    from sklearn.metrics import accuracy_score

    X = train.drop(columns=['salary_label'])
    y = train['salary_label']

    print('Shape:',X.shape, y.shape)
    # split into train test sets
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=6)
    print('Shape:',X_train.shape, X_test.shape, y_train.shape, y_test.shape)
    # fit the model
    model = RandomForestClassifier(random_state=1)
    model.fit(X_train, y_train)
    # make predictions
    yhat = model.predict(X_test)
    # evaluate predictions
    acc = accuracy_score(y_test, yhat)
    print('Accuracy: %.3f' % acc)
    return

def predict():
    X_pred = pred.drop(columns=['salary_label'])
    X_pred['salary_label'] = model.predict(X_pred)

    pred_data = encoded_data.copy()
    pred_data['salary_prediction'] = pred_data['salary_label']
    for i in X_pred.index:
        pred_data.loc[i]['salary_prediction'] = X_pred.loc[i]['salary_label']
    pred_data

    __pred_data = encoded_data.copy()
    __pred_data['salary_prediction'] = 0
    for i in X_pred.index:
        __pred_data.loc[i]['salary_prediction'] = X_pred.loc[i]['salary_label']
    return

def fill_db():
    trans_dict['inverse_salary_label'] = {
        0:'Không',
        1:'Dưới 5 triệu',
        2:'5 - 10 triệu', 
        3:'10 - 15 triệu', 
        4:'15 - 20 triệu', 
        5:'20 - 25 triệu', 
        6:'25 - 30 triệu', 
        7:'Trên 30 triệu'
    }

    __data = dataCenter.copy()
    __data

    __data['salary_prediction'] = __pred_data['salary_prediction']
    __data['salary_prediction'] = __data['salary_prediction'].replace(trans_dict['inverse_salary_label'])
    pred_data.to_csv(data_dir+"pred_data.csv", index=False)
    return


if __name__ == '__main__':
    setup()
    read_data()
    preprocessing()
    train()
    predict()
    fill_db()
