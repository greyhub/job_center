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

    def parse(self, response):
        try:
            jobs = response.xpath('//a[@class="job_link"]')
            for job in jobs:
                job_url = job.xpath("@href").extract()
                time.sleep(randint(5, 15))
                yield scrapy.Request(job_url[0], callback=self.job_parse)
        except:
            with open("careerbuilder/error_url.txt", 'a') as f:
                f.write("url_job_error: " + response.url + "\n")
            f.close()
        try:
            next_page = response.css('.next-page>a::attr(href)').get()
            time.sleep(randint(3, 10))
            with open("careerbuilder/page_url.txt", 'a') as f:
                f.write(next_page + "\n")
            f.close()
            yield response.follow(next_page, callback=self.parse)
        except:
            with open("careerbuilder/error_url.txt", 'a') as f:
                f.write("url_page_error: " + response.url + "\n")
            f.close()
        time.sleep(randint(10, 15))

    def job_parse(self, response):
        # time.sleep(randint(3, 7))
        try:
            data = response.xpath(
                '//script[@type="application/ld+json"]/text()').extract()[1]
            data = re.sub("&nbsp;", "", data)
            data = re.sub("<[^>]*>", "", data)
            data = re.sub("\r|\n|\t", "", data)
            data = json.loads(data)

            job = {}
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
                job['sectors'] = data['industry']
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
                job_descriptions = re.sub("-", "", job_descriptions)
                job['job_descriptions'] = job_descriptions
            except:
                job['job_descriptions'] = None

            try:
                job_requirements = data['experienceRequirements']['description']
                job_requirements = re.sub("-", "", job_requirements)
                job['job_requirements '] = job_requirements
            except:
                job['job_requirements '] = None

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
            with open("careerbuilder/error_url.txt", 'a') as f:
                f.write(response.url + "\n")
            f.close()

