安装openai的python库
``` 
pip install openai  
```
运行以下代码
``` 
import os
import openai

openai.api_key = "您的api_secret_key"
openai.api_base = "http://flag.smarttrot.com/index.php/api/v1"

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
![官方库支持示例](https://github.com/xing61/xiaoyi-robot/assets/38256442/df09923e-4b75-492c-a3cd-99c2b3db5abf)
