语音合成的示例。详细参数参考openai的官网说明：     
https://platform.openai.com/docs/api-reference/audio/createSpeech    
要注意openai的python包的版本升级了。。。     

```
import os
from openai import OpenAI
import openai
import requests
import time
import json
import time

API_SECRET_KEY = "xxxx"; #智增增的key
BASE_URL = "https://flag.smarttrot.com/v1/"; #智增增的base_url

# speech
def tts(query):
    openai.api_key = API_SECRET_KEY
    openai.base_url = BASE_URL
    speech_file_path = "test.mp3";
    response = openai.audio.speech.create(
        model="tts-1",
        voice="alloy",
        input=query
    )
    response.stream_to_file(speech_file_path)

if __name__ == '__main__':
    start = time.time();
    tts("今天是星期二");
    end = time.time()
    print('本次处理时间(s): ', end - start)
```


