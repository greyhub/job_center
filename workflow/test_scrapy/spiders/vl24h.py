
import scrapy
from datetime import date
import time


from test_scrapy.items import TestScrapyItem

class JobSpider(scrapy.Spider):
    name = 'vieclam24h'
    allowed_domains = ['vieclam24h.vn']
    custom_settings = {
        'COLLECTION_NAME': 'vieclam24h'
    }
    # base_url = 'https://vieclam24h.vn'
    start_urls = ['https://vieclam24h.vn/xay-dung/vinhomes-nhan-vien-ban-giao-quan-9-hcm-c117p122id100152044.html?svs=vl24h.jobbox.trangchu_tuyengap']
    # def start_request(self, response):
    #     short_urls = response.xpath('//*[@id="__next"]/main/div[1]/div[2]/div[2]/div[5]/div/div/div/div/span[1]/a[1]/@href').extract()
    #     urls = ['https://vieclam24h.vn' + url for url in short_urls]
    #     for url in urls:
    #         yield scrapy.Request(url=url, callback=self.parse)
    def parse(self, response):
        item = TestScrapyItem()
        item['url'] = response.url
        item['img_url'] = response.xpath('//*[@id="__next"]/div/main/div/div[2]/div[1]/div[1]/div[1]/div[1]/img/@src').extract_first()
        item['title'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div:nth-child(3) > div.w-full.md\:w-4\/5 > h3::text').extract_first()
        item['update_time'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div:nth-child(3) > div.w-full.md\:w-4\/5 > div.flex.items-center.justify-between.md\:justify-start.py-3 > div.flex.flex-col.md\:flex-row > div:nth-child(3) > span::text').extract_first()[11:]
        item['sectors'] = response.xpath('//*[@id="__next"]/div/main/div/div[2]/div[1]/div[1]/div[4]/div[1]/div[1]/div[2]/a/text()').extract()
        item['salary'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.grid.grid-cols-2.md\:grid-cols-4.gap-4 > div:nth-child(2) > div.text-14.font-semibold::text').extract_first()
        # item['job_level'] = response.css('#__next > main > div.wrapper > div.main-content > div.center-content.main-body-content > div.box_chi_tiet_cong_viec.mt-3 > div.row.job_detail > div:nth-child(1) > div:nth-child(3) > span.job_value::text').extract_first()
        item['job_experience_years'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.grid.grid-cols-2.md\:grid-cols-4.gap-4 > div:nth-child(1) > div.text-14.font-semibold::text').extract_first()
        item['application_deadline'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.grid.grid-cols-1.md\:grid-cols-2.md\:gap-6 > div:nth-child(2) > div:nth-child(4) > div.w-1\/2.md\:w-3\/5.text-14.font-semibold::text').extract_first()
        item['required_gender_specific'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.grid.grid-cols-1.md\:grid-cols-2.md\:gap-6 > div:nth-child(2) > div:nth-child(2) > div.w-1\/2.md\:w-3\/5.text-14.font-semibold::text').extract_first()
        item['job_attributes'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.grid.grid-cols-2.md\:grid-cols-4.gap-4 > div:nth-child(4) > div.text-14.font-semibold::text').extract_first()
        item['job_formality'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.grid.grid-cols-2.md\:grid-cols-4.gap-4 > div:nth-child(3) > div.text-14.font-semibold::text').extract_first()
        item['job_descriptions'] = ' '.join(response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div.JobInfo_jobInfoContainer__3WzDU.px-4.md\:px-10.py-4.bg-white.shadow-sd-12.rounded-sm.mt-4 > div:nth-child(1) > div::text').extract())
        item['job_requirements'] = ' '.join(response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div.JobInfo_jobInfoContainer__3WzDU.px-4.md\:px-10.py-4.bg-white.shadow-sd-12.rounded-sm.mt-4 > div:nth-child(2) > div:nth-child(2)::text').extract())
        item['company_name'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.flex.items-center.w-full > div.ml-5 > a > h3::text').extract_first()
        item['company_address'] = response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div.jsx-3480227626.px-4.md\:px-10.py-4.bg-white.shadow-sd-12.rounded-sm.mt-4 > div.jsx-3480227626.text-12.text-se-neutral-100-n.py-1::text').extract_first()
        item['company_url'] = 'https://vieclam24h.vn' + response.css('#__next > div > main > div > div.flex.flex-col.md\:flex-row > div.w-full.md\:w-3\/4.pb-4 > div:nth-child(1) > div.flex.items-center.w-full > div.ml-5 > a::attr("href")').extract_first()
        item['timestamp_isodate'] = date.today().strftime("%d/%m/%Y")
        yield item
        # next_page = response.css('#__next > main > div.wrapper > div.main-content > div.center-content.main-body-content > div.my-3.box-similar.box-similar-job-detail > div > div.box-cnt-white.mt-1.mt-md-3 > div > ul > li:nth-child(1) > div > div > div.job-cnt > div.job-ttl.truncate-ellipsis > a::attr("href")').extract_first()
        # if next_page is not None:
        #     yield response.follow(next_page, callback = self.parse)
        # for next_page in response.css('.kbw-content a::attr(href)').extract():
        #     yield response.follow(next_page, self.parse)
        for next_page in response.xpath('//*[@id="__next"]/div/main/div/div[2]/div[2]/div/div[2]/div/a/@href').extract():
            yield response.follow(next_page, self.parse)
            time.sleep(0.1)
            
            
        

            