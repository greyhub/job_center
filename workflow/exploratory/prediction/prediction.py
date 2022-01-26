from datetime import datetime
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score
from termcolor import colored

from exploratory.prediction.utils import trans_data
from config import TEMP_STORAGE


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
    return trans_dict

def preprocessing(_df, _trans_dict):
    category_cols = ['salary_label', 'job_attributes', 'job_formality', 
                     'required_gender_specific',
                     'job_experience_years']

    _encoded_data = _df[category_cols]
    for col in _encoded_data.columns:
        try:
            _encoded_data[col] = _encoded_data[col].apply(lambda x: trans_data(x,col,_trans_dict))
        except:
            print(col)

    # features = ['job_attributes', 'job_formality', 
    #             'required_gender_specific',
    #             'job_experience_years']

    # for f in features:
    #     encoded_data[f] = encoded_data[f] / encoded_data[f].max()    
    return _encoded_data

def train(_encoded_data):
    _pred = _encoded_data[_encoded_data['salary_label'] == 0]
    _train = _encoded_data[_encoded_data['salary_label'] != 0]

    # train-test split evaluation random forest

    X = _train.drop(columns=['salary_label'])
    y = _train['salary_label']

    # print('Shape:',X.shape, y.shape)
    # split into train test sets
    X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.3, random_state=6)
    # print('Shape:',X_train.shape, X_test.shape, y_train.shape, y_test.shape)
    # fit the model
    _model = RandomForestClassifier(random_state=1)
    _model.fit(X_train, y_train)
    # make predictions
    yhat = _model.predict(X_test)
    # evaluate predictions
    acc = accuracy_score(y_test, yhat)
    # print('Accuracy: %.3f' % acc)
    return _model, _pred

def predict(_model, _pred, _encoded_data):
    X_pred = _pred.drop(columns=['salary_label'])
    X_pred['salary_label'] = _model.predict(X_pred)

    # pred_data = _encoded_data.copy()
    # pred_data['salary_prediction'] = pred_data['salary_label']
    # for i in X_pred.index:
    #     pred_data.loc[i]['salary_prediction'] = X_pred.loc[i]['salary_label']
    # pred_data

    _pred_data = _encoded_data.copy()
    _pred_data['salary_prediction'] = 0
    for i in X_pred.index:
        _pred_data.loc[i]['salary_prediction'] = X_pred.loc[i]['salary_label']
    _pred_data.to_csv(TEMP_STORAGE + "pred_data.csv", index=False)
    return _pred_data

def fill_db(_trans_dict, _df, _pred_data, data_dir):
    _trans_dict['inverse_salary_label'] = {
        0:'Không',
        1:'Dưới 5 triệu',
        2:'5 - 10 triệu', 
        3:'10 - 15 triệu', 
        4:'15 - 20 triệu', 
        5:'20 - 25 triệu', 
        6:'25 - 30 triệu', 
        7:'Trên 30 triệu'
    }

    _df['salary_prediction'] = _pred_data['salary_prediction']
    _df['salary_prediction'] = _df['salary_prediction'].replace(_trans_dict['inverse_salary_label'])
    _df.to_csv(data_dir+'dataCenter_pred.csv', index=False)
    return

def prediction(_data, _data_dir):
    print(colored("[{} | In process]".format(datetime.now()), 'green'), "Predicting Wage Agreement")
    trans_dict = setup()
    encoded_data = preprocessing(_data, trans_dict)
    model, pred = train(encoded_data)
    pred_data = predict(model, pred, encoded_data)
    fill_db(trans_dict, _data, pred_data, _data_dir)    
    return pred_data

if __name__ == '__main__':
    pass
