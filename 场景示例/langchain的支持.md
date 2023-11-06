langchain目前还使用的是旧版的openai的接口，需要注意    
示例代码，使用LLM进行预测   
核心其实在于key和url的设置    
方法有：    
```
1、使用环境变量来设置   
2、使用变量来传入   
3、使用手动设置环境变量   
```
```
import os
import requests
import time
import json
import time
from langchain.llms import OpenAI

API_SECRET_KEY = "你在智增增的key";
BASE_URL = "https://flag.smarttrot.com/v1"; #智增增的base-url

os.environ["OPENAI_API_KEY"] = API_SECRET_KEY
os.environ["OPENAI_API_BASE"] = BASE_URL

def text():
    llm = OpenAI(temperature=0.9)
    text = "What would be a good company name for a company that makes colorful socks?"
    print(llm(text))

if __name__ == '__main__':
    text();
```
运行后可以看到返回：    
```
Lively Socks.
```
可以从后台看到langchain是怎么调用智增增接口的：    
![langchain使用量结果](https://github.com/xing61/xiaoyi-robot/assets/38256442/723bbab0-9fb9-49cb-b0b4-5c2d40bb4f37)
