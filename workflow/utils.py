import pandas as pd


def read_data(path_to_data):
    __df = pd.read_csv(path_to_data)

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

    return _df
