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
=============================================================================
![官方库示例-智增增](https://github.com/xing61/xiaoyi-robot/assets/38256442/c704962b-c9e1-4fa3-9211-f90f5e3b7874)

