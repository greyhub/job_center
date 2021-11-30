import scrapy
import re
import json
import time
from random import randint
from datetime import date

class careerlinkspider(scrapy.Spider):
    name = 'careerlink'
    allowed_domains = ['careerlink.vn']
    start_urls = [
        'https://www.careerlink.vn/vieclam/list'
    ]
    base_url = 'https://www.careerlink.vn'

    def parse(self, response):
        jobs = response.css('.job-link.clickable-outside::attr(href)').extract()
        for job in jobs:
            job_url = self.base_url + job
            time.sleep(randint(5, 15))
            yield scrapy.Request(job_url, callback=self.job_parse)
        try:
            next_page = response.css('a[rel="next"]::attr(href)').get()
            next_page = self.base_url + next_page
            time.sleep(randint(3, 10))
            with open('careerlink/page_crawl.txt', 'a') as f:
                f.write(next_page + "\n")
            f.close()
            yield scrapy.Request(next_page, self.parse)
        except:
            with open('careerlink/error_url.txt', 'a') as f:
                f.write('page_url_error: ' + response.url + "\n")
            f.close()

    def job_parse(self, response):
        # time.sleep(randint(4, 8))
        try:
            key = {
                "Loại công việc": "job_attributes",
                "Cấp bậc": "job_formality",
                "Kinh nghiệm": "job_experience_years",
                "Giới tính": "required_gender_specific",
                "Tuổi": "required_age_specific",
                "Ngành nghề": "sectors"
            }

            job = {}

            # url
            job['url'] = response.url

            # title
            try:
                title = response.css('h1::text').get()
                title = re.sub("\n", "", title)
                job['title'] = title
            except:
                job['title'] = None

            # update_time
            try:
                update_time = response.css('.mr-5>.d-none::text').get()
                update_time = re.sub("\n", "", update_time)
                job['update_time'] = update_time
            except:
                job['update_time'] = None

            # image_url
            try:
                job['image_url'] = response.css(".company-img.img-thumbnail"
                                                ".bg-white.border-0::attr(src)").extract_first()
            except:
                job['image_url'] = None

            # Job Descriptions
            try:
                descriptions = response.css(".border-bottom-mb>.raw-content")[0]
                descriptions = descriptions.css("*::text").getall()
                job_descriptions = ""
                for st in descriptions:
                    job_descriptions += st
                job['job_descriptions'] = job_descriptions
            except:
                job['job_descriptions'] = None

            # Job Requirements
            try:
                requirements = response.css(".border-bottom-mb>.raw-content")[1]
                requirements = requirements.css('*::text').getall()
                job_requirements = ""
                for st in requirements:
                    job_requirements += st
                job['job_requirements'] = job_requirements
            except:
                job['job_descriptions'] = None

            # job_attributes, job_formality, ...
            data = response.css('.row.job-summary')
            data = data.css('.d-lg-block')
            for dt in data:
                dt_name = dt.css('.summary-label::text').get()
                try:
                    if dt_name == "Ngành nghề" :
                        values = dt.css('.font-weight-bolder>a>span::text').getall()
                        for vt in range(len(values)):
                            values[vt] = re.sub("\n", "", values[vt])
                        job['sectors'] = values
                    else:
                        value = dt.css('.font-weight-bolder::text').get()
                        value = re.sub("\n", "", value)
                        job[key[dt_name]] = value
                except:
                    print("Error")

            # Salary, company_address
            try:
                sa = response.css('.job-overview')
                salary = sa.css('.mb-2')[0].css('span::text').get()
                salary = re.sub("\n", "", salary)
                job['salary'] = salary

                ad = sa.css('.mb-2')[1]
                address = ad.css('span::text').getall()
                company_ad = ""
                for vt in address:
                    company_ad += vt
                company_ad = re.sub("\n\n", "-", company_ad)
                company_ad = re.sub("\n", "", company_ad)
                job['company_address'] = company_ad
            except:
                job['company_address'] = None

            # Company Name
            try:
                company_name = response.css('.org-name.mb-2>a::attr(title)').get()
                job['company_name'] = company_name
            except:
                job['company_name'] = None

            try:
                job['company_url'] = self.base_url + response.css('.org-name.mb-2>a::attr(href)').get()
            except:
                job['company_url'] = None

            # Application Deadline
            try:
                application_deadline = response.xpath('//*[@id="section-job-description"]/'
                                                      'div[4]/div[2]/div/div[2]/text()')[1].get()
                application_deadline = re.sub("\n", "", application_deadline)
                job['application_deadline'] = application_deadline
            except:
                job['application_deadline'] = None

            # TimestampISODate
            job['timestampISOdate'] = date.today().strftime("%d/%m/%Y")

            yield job
        except:
            with open('careerlink/error_url.txt', 'a') as f:
                f.write('job_url_error: ' + response.url + "\n")
            f.close()




