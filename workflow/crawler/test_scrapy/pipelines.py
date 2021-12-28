from pymongo import MongoClient


class TestScrapyPipeline(object):
    def __init__(self, mongo_uri, mongo_database):
        self.mongo_uri = mongo_uri
        self.mongo_database = mongo_database

    @classmethod
    def from_crawler(cls, crawler):
        return cls(
            crawler.settings.get('MONGO_URI'),
            crawler.settings.get('MONGO_DATABASE')
        )

    def open_spider(self, spider):
        self.client = MongoClient(self.mongo_uri)
        self.database = self.client[self.mongo_database]

    def close_spider(self, spider):
        self.client.close()

    def process_item(self, item, spider):
        self.database[spider.settings.get('COLLECTION_NAME')].insert_one(dict(item))
        return item