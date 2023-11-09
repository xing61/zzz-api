安装openai的python库
``` 
pip install openai  
```
运行以下代码
``` 
import os
import openai

openai.api_key = "您在智增增的api_secret_key"
openai.api_base = "https://flag.smarttrot.com/v1/"  #智增增的base_url，注意加上最后的/

chat_completion = openai.ChatCompletion.create(
    model="gpt-3.5-turbo",
    messages=[{ "role": "user", "content": "Hello world" }]
)
print(chat_completion.choices[0].message.content) 
```
正常运行打印如下
``` 
Hello there! How can I assist you today ? 
```
============================================================================
![微信截图_20231109105329](https://github.com/xing61/xiaoyi-robot/assets/38256442/3dd3b3bc-8140-4129-9944-4bbbb8bc5e0b)


