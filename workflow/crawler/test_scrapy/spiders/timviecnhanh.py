
import scrapy
from datetime import date
from test_scrapy.items import TestScrapyItem
import time
class JobSpider(scrapy.Spider):
    name = 'tvn'
    custom_settings = {
        'COLLECTION_NAME': 'timviecnhanh'
    }
    allowed_domains = ['timviecnhanh.com']
    start_urls = ['https://timviecnhanh.com/tuyen-nhan-vien-ban-tai-chinh-ke-toan-tp-hcm-100153001.html?svs=tvn.jobbox.trangchu_vieclammoi']
    def parse(self, response):
        item = TestScrapyItem()
        item['url'] = response.url
        item['img_url'] = response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-4 > div.block-sidebar.d-none.d-md-block > div:nth-child(1) > div > div.text-center > img::attr("src")').extract_first()
        item['title'] = response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-8 > div > div.header-job-info.bg-white > h1 > span::text').extract_first()
        item['update_time'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[1]/div/text()[1]').extract_first()[10:]
        item['sectors'] = response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-8 > div > article > div.jsx-1425348829.row.mt-2 > div:nth-child(1) > ul > li:nth-child(5)>a::text').extract()
        item['salary'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[3]/div[1]/ul/li[1]/text()').extract_first()
        # item['job_level'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[3]/div[1]/ul/li[3]/text()').extract_first()
        item['job_experience_years'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[3]/div[1]/ul/li[2]/text()').extract_first()
        item['application_deadline'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/table/tbody/tr[4]/td[2]/b/text()').extract_first()
        item['required_gender_specific'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[3]/div[2]/ul/li[2]/text()').extract_first()
        #item['required_age_specific'] = ''
        item['job_attributes'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[3]/div[2]/ul/li[3]/text()').extract_first()
        item['job_formality'] = response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[3]/div[2]/ul/li[4]/text()').extract_first()
        item['job_descriptions'] = ''.join(response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-8 > div > article > table > tbody > tr:nth-child(1) > td:nth-child(2) > p::text').extract())
        item['job_requirements'] = ''.join(response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-8 > div > article > table > tbody > tr:nth-child(2) > td:nth-child(2) > p::text').extract())
        item['company_name'] = response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-8 > div > article > div.jsx-1425348829.company-job-info.bg-white > div.jsx-1425348829.company-job-address > h3 > a::text').extract_first()
        item['company_address'] = response.css('#__next > main > div > div.content > div:nth-child(5) > div > div > div.jsx-466345931.col-md-8 > div > article > div.jsx-1425348829.company-job-info.bg-white > div.jsx-1425348829.company-job-address > span::text').extract_first()[8:]
        item['company_url'] = 'https://timviecnhanh.com' + response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/article/div[2]/div[1]/h3/a/@href').extract_first()
        item['timestamp_isodate'] = date.today().strftime("%d/%m/%Y")
        yield item
        # next_page = response.css('#__next > main > div.wrapper > div.main-content > div.center-content.main-body-content > div.my-3.box-similar.box-similar-job-detail > div > div.box-cnt-white.mt-1.mt-md-3 > div > ul > li:nth-child(1) > div > div > div.job-cnt > div.job-ttl.truncate-ellipsis > a::attr("href")').extract_first()
        # if next_page is not None:
        #     yield response.follow(next_page, callback = self.parse)
        # for next_page in response.css('.kbw-content a::attr(href)').extract():
        #     yield response.follow(next_page, self.parse)
        for next_page in response.xpath('//*[@id="__next"]/main/div/div[3]/div[5]/div/div/div[1]/div/div[2]/div/div/div[1]/table/tbody/tr/td[1]/a[1]/@href').extract():
            yield response.follow(next_page, self.parse)
            time.sleep(0.1)
        

            