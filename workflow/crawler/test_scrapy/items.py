# Define here the models for your scraped items
#
# See documentation in:
# https://docs.scrapy.org/en/latest/topics/items.html

import scrapy


class TestScrapyItem(scrapy.Item):
    url = scrapy.Field()
    img_url = scrapy.Field()
    title = scrapy.Field()
    update_time = scrapy.Field()
    sectors = scrapy.Field()
    salary = scrapy.Field()
    # job_level = scrapy.Field()
    job_experience_years = scrapy.Field()
    application_deadline = scrapy.Field()
    required_gender_specific = scrapy.Field()
    # required_age_specific = scrapy.Field()
    job_attributes = scrapy.Field()
    job_formality = scrapy.Field()
    job_descriptions = scrapy.Field()
    job_requirements = scrapy.Field()
    company_name = scrapy.Field()
    company_address = scrapy.Field()
    company_url = scrapy.Field()
    timestamp_isodate = scrapy.Field()

