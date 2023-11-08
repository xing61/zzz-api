使用openai的官方包（新版）：
import os
from openai import OpenAI
import openai
import requests
import time
import json
import time

API_SECRET_KEY = "xxxxxx";
BASE_URL = "https://flag.smarttrot.com/v1/"

# chat
def chat_completions3(query):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    resp = client.chat.completions.create(
        model="gpt-3.5-turbo",
        messages=[
            {"role": "system", "content": "You are a helpful assistant."},
            {"role": "user", "content": query}
        ]
    )
    print(resp)
    print(resp.choices[0].message.content)


使用openai的官方包（旧版）：
import os
from openai import OpenAI
import openai
import requests
import time
import json
import time

API_SECRET_KEY = "xxxxxx";
BASE_URL = "https://flag.smarttrot.com/v1/"
# chat
def chat_completions2(query):
    openai.api_key = API_SECRET_KEY
    openai.base_url = BASE_URL
    resp = openai.chat.completions.create(
        model="gpt-3.5-turbo",
        messages=[
            {"role": "system", "content": "You are a helpful assistant."},
            {"role": "user", "content": query}
        ]
    )
    print(resp)
    print(resp.choices[0].message.content)

if __name__ == '__main__':
    chat_completions2("圆周率的前10位");


使用http请求：
import os
import requests
import time
import json

def chat_completions():
    url="https://flag.smarttrot.com/v1/chat/completions"
    api_secret_key = 'xxxxxxxxx';  # 你的api_secret_key
    headers = {'Content-Type': 'application/json', 'Accept':'application/json',
               'Authorization': "Bearer "+api_secret_key}
    params = {'user':'张三',
              'messages':[{'role':'user', 'content':'1+100='}]};
    r = requests.post(url, json.dumps(params), headers=headers)
    print(r.json())

if __name__ == '__main__':
    chat_completions();

