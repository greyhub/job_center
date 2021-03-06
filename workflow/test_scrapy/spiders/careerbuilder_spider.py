import scrapy
import re
import json
from datetime import date
import time
from random import randint


class careerspider(scrapy.Spider):
    name = 'careerbuilder'

    # allowed_domains = ['careerbuilder.vn']
    start_urls = [
        'https://careerbuilder.vn/viec-lam/tat-ca-viec-lam-vi.html'
    ]

    custom_settings = {
        'COLLECTION_NAME': 'careerbuilder'
    }
    count = 0

    def parse(self, response):
        try:
            jobs = response.xpath('//a[@class="job_link"]')
            for job in jobs:
                job_url = job.xpath("@href").extract()
                time.sleep(randint(1, 3))
                yield scrapy.Request(job_url[0], callback=self.job_parse)
        except:
            # with open("careerbuilder/error_url.txt", 'a') as f:
            #     f.write("url_job_error: " + response.url + "\n")
            # f.close()
            print()
        try:
            next_page = response.css('.next-page>a::attr(href)').get()
            # time.sleep(randint(3, 10))
            # with open("careerbuilder/page_url.txt", 'a') as f:
            #     f.write(next_page + "\n")
            # f.close()
            # self.count += 1
            # if self.count < 2:
            yield response.follow(next_page, callback=self.parse)
        except:
            # with open("careerbuilder/error_url.txt", 'a') as f:
            #     f.write("url_page_error: " + response.url + "\n")
            # f.close()
            print()
        # time.sleep(randint(10, 15))

    def job_parse(self, response):

        try:
            data = response.xpath(
                '//script[@type="application/ld+json"]/text()').extract()[1]
            data = re.sub("&nbsp;", "", data)
            data = re.sub("<[^>]*>", "", data)
            data = re.sub("\r|\n|\t", "", data)
            data = json.loads(data)

            job = {'url': None, 'title': None, 'update_time': None, 'img_url': None, 'sectors': None,
                   'application_deadline': None, 'salary': None, 'job_formality': None, 'job_experience_years': None,
                   'required_gender_specific': None, 'job_attributes': None, 'job_descriptions': None,
                   'job_requirements': None, 'company_name': None, 'company_address': None, 'company_url': None}

            job['url'] = response.url

            try:
                job['title'] = data['title']
            except:
                job['title'] = None
            try:
                job['img_url'] = data['hiringOrganization']['logo']
            except:
                job['img_url'] = None
            try:
                job['update_time'] = data['datePosted']
            except:
                job['update_time'] = None

            try:
                sector = data['industry']
                sectors = re.split(", ", sector)
                job['sectors'] = sectors
            except:
                job['sectors'] = None

            try:
                job['salary'] = data['baseSalary']['value']['value']
            except:
                try:
                    job['salary'] = data['baseSalary']['value']['minValue'] + ' - ' + data['baseSalary']['value']['maxValue'] + data['baseSalary']['currency']
                except:
                    job['salary'] = None

            try:
                job['job_formality'] = data['occupationalCategory']
            except:
                job['job_formality'] = None

            try:
                job['application_deadline'] = data['validThrough']
            except:
                job['application_deadline'] = None

            try:
                job['job_attributes'] = data['employmentType'][0]
            except:
                job['job_attributes'] = None

            try:
                job_descriptions = data['description']
                # job_descriptions = re.sub("-", "", job_descriptions)
                job['job_descriptions'] = job_descriptions
            except:
                job['job_descriptions'] = None

            try:
                job_requirements = data['experienceRequirements']['description']
                # job_requirements = re.sub("-", "", job_requirements)
                job['job_requirements'] = job_requirements
            except:
                try:
                    req = response.xpath('//*[@id="tab-1"]/section/div[4]/ul[1]')
                    job_req = req.css('*::text').extract()
                    job_requirements = ""
                    for s in job_req:
                        job_requirements += s
                    job['job_requirements'] = job_requirements
                except:
                    job['job_requirements'] = None

            try:
                job['company_name'] = data['identifier']['name']
            except:
                job['company_name'] = None

            try:
                job['company_address'] = data['jobLocation']['address']['streetAddress']
            except:
                job['company_address'] = None

            job['timestampISOdate'] = date.today().strftime("%d/%m/%Y")
            try:
                job['company_url'] = data['hiringOrganization']['sameAs']
            except:
                job['company_url'] = None

            yield job

        except:
            print()

