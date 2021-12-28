import scrapy
import re
from datetime import date


class myworkspider(scrapy.Spider):
    name = 'mywork.com'
    # allowed_domains = ['mywork.com.vn']
    start_urls = [
        'https://mywork.com.vn/tuyen-dung?'
    ]
    base_url = 'https://mywork.com.vn'
    base_page = 'https://mywork.com.vn/tuyen-dung?branch=mw.all&action=search&page='
    count = 1
    custom_settings = {
        'COLLECTION_NAME': 'mywork_test'
    }

    def parse(self, response):

        jobs = response.xpath('//div[@class="jobslist-01-row-ttl"]/a')
        for job in jobs:
            job_url = self.base_url + job.xpath("@href").extract()[0]
            yield scrapy.Request(job_url, callback=self.job_parse)

        self.count += 1
        next_page = self.base_page + str(self.count)
        with open("mywork/page_mywork.txt", 'a') as f:
            f.write(next_page + "\n")
        #test
        if self.count < 75:
            yield scrapy.Request(next_page, callback=self.parse)


    def job_parse(self, response):
        # time.sleep(randint(6, 10))
        try:
            job = {'url': None, 'title': None, 'update_time': None, 'img_url': None, 'sectors': None,
                   'application_deadline': None, 'salary': None, 'job_formality': None, 'job_experience_years': None,
                   'required_gender_specific': None, 'job_attributes': None, 'job_descriptions': None,
                   'job_requirements': None, 'company_name': None, 'company_address': None, 'company_url': None}

            job['url'] = response.url
            # title
            try:
                job['title'] = response.css('.detail-01-ttl::text').extract_first()
            except:
                job['title'] = None
            # update_time
            try:
                update_time = response.css('.mt15')[-1]
                update_time = update_time.css('.mt15::text')[-1].extract()
                job['update_time'] = re.split("\s",update_time)[-1]
            except:
                job['update_time'] = None
            # image_url
            try:
                job['img_url'] = response.xpath('//img')[1].xpath('@src').get()
            except:
                job['img_url'] = None
            # Sectors
            try:
                job['sectors'] = response.css('.ex-nn>.detail-01-info>.text-main-important::text').getall()
            except:
                job['sectors'] = None
            # Salary
            try:
                job['salary'] = response.css('.ex-ml>.detail-01-info::text').get()
            except:
                job['salary'] = None
            # Job_leve
            try:
                job['job_formality'] = response.css('.ex-cb>.detail-01-info::text').get()
            except:
                job['job_formality'] = None
            # Job Experience Years
            try:
                job['job_experience_years'] = response.css('.ex-kn>.detail-01-info::text').get()
            except:
                job['job_experience_years'] = None
            # Application Deadline
            try:
                job['application_deadline'] = response.css('.ex-han-nop>.detail-01-info::text').get()
            except:
                job['application_deadline'] = None
            # Required Gender Specific
            try:
                job['required_gender_specific'] = response.css('.ex-gt>.detail-01-info::text').get()
            except:
                job['required_gender_specific'] = None
            # Job Attributes
            try:
                job['job_attributes'] = response.css('.ex-ht>.detail-01-info::text').get()
            except:
                job['job_attributes'] = None
            # Job Descriptions
            try:
                job_description = response.css('.detail-01-row-block>.detail-01-row-cnt')[0]
                job_descriptions = job_description.css('*::text').getall()
                st = ''
                for i in job_descriptions:
                    st += i + '\n'
                job['job_descriptions'] = st
            except:
                job['job_descriptions'] = None
            # Job Requirements
            try:
                job_requirements = response.css('.detail-01-row-block>.detail-01-row-cnt')[2]
                job_requirement = job_requirements.css('*::text').getall()
                st = ''
                for i in job_requirement:
                    st += i + '\n'
                job['job_requirements'] = st
            except:
                job['job_requirements'] = None
            # Company Name
            try:
                job['company_name'] = response.css('.company-01-name::text').get()
            except:
                job['company_name'] = None
            # Company Address
            try:
                job['company_address'] = response.css('.w-60-mb::text').get()
            except:
                job['company_address'] = None
            # Company Info
            try:
                job['company_url'] = self.base_url + response.css('.company-01-name::attr(href)').get()
            except:
                job['company_url'] = None
            # TimestampISODate
            job['timestampISOdate'] = date.today().strftime("%d/%m/%Y")

            yield job
        except:
            print('Job_url error: ' + response.url)



