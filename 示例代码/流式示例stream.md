直接上代码，要替换成自己在智增增的key    
```
import os
import openai
import requests
import time
import json
import time

API_SECRET_KEY = "xxxxx";  # 你在智增增的key
BASE_URL = "https://flag.smarttrot.com/v1"

def stream_chat(prompt: str):
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    for chunk in openai.ChatCompletion.create(
        model="gpt-3.5-turbo",
        messages=[{"role": "user", "content": prompt}],
        stream=True,
    ):
        content = chunk["choices"][0].get("delta", {}).get("content")
        if content is not None:
            print(content)

if __name__ == '__main__':
    stream_chat("圆周率的前10位");
```
