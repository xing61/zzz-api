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
