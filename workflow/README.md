# Pipeline

## Main workflow

1. Crawl
2. Matching
3. EDA
4. Prediction
5. Ranking
6. Suggesting

## Requirements
- Conda
- Python
- Scrapy

## Setup

- Install conda
- Create env

```zsh
conda create -n jobCenter python=3.6
conda activate jobCenter
```

- Install requirements

```zsh
pip install -r requirements.txt
```

## Run

[Option] Open config.py and change parameters

```zsh
python pipeline.py
```

## Config

    DATACENTER = '../database/data_center/dataCenter.csv'
    DATA_DIR = '../database/data_center/'
    TEMP_STORAGE = '../database/temp_storage/'
    TIME_PER_PIPELINE = 10  # seconds
