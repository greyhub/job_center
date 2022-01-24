# Job Center

    @team:  Luong (greyhub)
            Nam (Namdv99)
            Minh (MinhPN101)
            Manh (htlmm99)
    
## Main workflow

1. [Crawling]()
2. [Matching]()
3. [EDA]()
4. [Prediction]()
5. [Ranking]()
6. [Suggesting]()

## Structure

    .
    ├── app
    │   ├── README.md
    │   └── website
    ├── database
    │   ├── data_center
    │   ├── raw_data
    │   └── temp_storage
    ├── README.md
    └── workflow
        ├── config.py
        ├── crawler
        ├── exploratory
        ├── __init__.py
        ├── matching
        ├── pipeline.py
        ├── __pycache__
        ├── README.md
        ├── requirements.txt
        ├── scrapy.cfg
        ├── test_scrapy
        ├── timer.py
        └── utils.py


## Requirements
- Conda
- Python
- Scrapy


## Guideline

[Run pipeline & more](https://github.com/greyhub/job_center/blob/main/workflow/README.md)

[Run exploratory & more](https://github.com/greyhub/job_center/blob/main/workflow/exploratory/README.md)


## Job domains
We focus on bellow domains:

[Topcv](https://www.topcv.vn/?tracking=1&source=gg&gclid=Cj0KCQiAubmPBhCyARIsAJWNpiOdx5_l7Hf_QRphlIoozljs1eBgJG5irnv1hCvQpp1xbIz4Kb4aGJ0aAsC8EALw_wcB)

[MyWork](https://mywork.com.vn/?gclid=Cj0KCQiAubmPBhCyARIsAJWNpiMs8pTPNu8biB_XFOy_2tLqt6VFfCA3aeX0_3z10dcytOg89RfCzKcaAmp5EALw_wcB)

[CareerBuilder](https://careerbuilder.vn/?gclid=Cj0KCQiAubmPBhCyARIsAJWNpiOwSX07n2_WVBCbOaSul-_8xqk2W9C7UTivyPP67rO0yM4lrRDYQgAaAtASEALw_wcB)

[TimViecNhanh](https://timviecnhanh.com/?gclid=Cj0KCQiAubmPBhCyARIsAJWNpiPCOLhez4np098_GAC7fJtdRFxMFZLd76DyJVr57EWIj-O8b4Uv1OsaAtOnEALw_wcB)

[ViecLam24h](https://vieclam24h.vn/?&utm_source=google&utm_medium=cpc&utm_campaign=NTV_Brand_MB&utm_term=All&utm_content=All&gclid=Cj0KCQiAubmPBhCyARIsAJWNpiPRxvm69OSiB-bMOeCw3dUJ7Q5VXT_9SlinK9_9phNR4UVWp3PaEJwaAlfvEALw_wcB)


## References

[Crawl with Scrapy](https://scrapy.org/)

[Schedule in python](https://schedule.readthedocs.io/en/stable/)

[Matplotlib: Visualization with Python](https://matplotlib.org/)
