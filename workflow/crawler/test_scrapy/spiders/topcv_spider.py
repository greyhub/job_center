import scrapy
import re
from datetime import date
import time
from scrapy.http import FormRequest

class topcvspider(scrapy.Spider):
    name = 'topcv'
    start_urls = [
        'https://www.topcv.vn/login'
    ]
    count = 0
    dem = 0
    custom_settings = {
        'COLLECTION_NAME': 'topcv'
    }

    def parse(self, response):
        token = response.xpath('//*[@id="form-login"]/input/@value').extract_first()
        return FormRequest.from_response(response, formdata={
            'csrf_token': token,
            'email': 'Hackernoname2022@gmail.com',
            'password': 'Topcv@21'
        }, callback=self.list_parse)

    def list_parse(self, response):
        page = 'https://www.topcv.vn/tim-viec-lam-moi-nhat'
        yield scrapy.Request(page, callback=self.url_parse)

    def url_parse(self, response):
        urls_job = response.css('.result-job-hover')
        for url in urls_job:
            url_job = url.css('.underline-box-job::attr(href)').get()
            self.count += 1
            if self.count == 200:
                time.sleep(10)
                self.count = 0
            # time.sleep(randint(4, 8))
            try:
                yield scrapy.Request(url_job, callback=self.job_parse)
            except:
                print("error")

        # time.sleep(randint(5, 10))
        try:
            next_page = response.css('a[rel="next"]::attr(href)').get()
            with open("topcv/page_topcv.txt", 'a') as f:
                f.write(next_page + "\n")
            yield scrapy.Request(next_page, callback=self.url_parse)
        except:
            print("Page error: " + response.url)


    def job_parse(self, response):
        try:
            job = {'url': None, 'title': None, 'update_time': None, 'img_url': None, 'sectors': None,
                   'application_deadline': None, 'salary': None, 'job_formality': None, 'job_experience_years': None,
                   'required_gender_specific': None, 'job_attributes': None, 'job_descriptions': None,
                   'job_requirements': None, 'company_name': None, 'company_address': None, 'company_url': None}
            job_tt = {
                'Mức lương ': 'salary',
                'Cấp bậc ': 'job_formality',
                'Kinh nghiệm ': 'job_experience_years',
                'Giới tính ': 'required_gender_specific',
                'Hình thức làm việc ': 'job_attributes',
            }
            job['url'] = response.url
            #title, img_url,
            info_title = response.css('.box-white.box-detail-job')

            title = info_title.css('.box-info-job>h1')
            title = title.css('*::text').getall()
            if len(title) > 1:
                str = ""
                for st in title:
                    str += st.strip()
                job['title'] = str
            else:
                job['title'] = title[0]

            job['img_url'] = info_title.css('.box-company-logo>img::attr(src)').get()

            # sectors
            job['sectors'] = response.css('.keyword>span>a::text').getall()

            #application_deadline
            deadline = info_title.css('.job-deadline::text')[-1].get()
            deadline = re.findall("\d{2}/\d{2}/\d{4}",deadline)[0]
            job['application_deadline'] = deadline

            # Muc luong, so luong, cap bac
            data = response.css('.box-main>.box-item')
            for dt in data:
                try:
                    job[job_tt[dt.css('strong::text').get()]] = dt.css('span::text').get()
                except:
                    print()

            # job_descriptions
            descriptions = response.xpath('//*[@id="tab-info"]/div/div/div[1]/div[3]/div[1]')
            descriptions = descriptions.css('*::text').getall()
            if len(descriptions) > 1:
                str = ""
                for st in descriptions:
                    str += st
                job['job_descriptions'] = str
            else:
                job['job_descriptions'] = descriptions

            # job_requirements
            requirements = response.xpath('//*[@id="tab-info"]/div/div/div[1]/div[3]/div[2]')
            requirements = requirements.css('*::text').getall()
            if len(requirements) > 1:
                str = ""
                for st in requirements:
                    str += st
                job['job_requirements'] = str
            else:
                job['job_requirements'] = requirements

            # company_name
            job['company_name'] = info_title.css('.company-title>a::text').get()

            # company_address
            job['company_address'] = response.xpath('//*[@id="tab-info-company"]/div'
                                                    '/div[2]/div[3]/div/span/text()').get()

            # company_info
            job['company_url'] = response.xpath('.//*[@id="tab-info-company"]/div/div[1]/a/@href').get()

            # timestampISOdate
            job['timestampISOdate'] = date.today().strftime("%d/%m/%Y")

            yield job
        except:
            with open("topcv/error_topcv.txt", 'a') as f:
                f.write(response.url + "\n")





