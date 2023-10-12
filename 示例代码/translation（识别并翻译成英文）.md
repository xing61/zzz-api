translations的示例代码：（只需换成自己的key）   <br>
介绍<br>
语音转文本API基于我们先进的开源large-v2 Whisper模型提供了两个端点，分别是“transcriptions”（转录）和“translations”（翻译）。它们可以用于：<br>

将音频转录为与音频语言相同的文本。<br>
将音频翻译并转录为英文。<br>
目前，文件上传限制为25 MB，支持以下输入文件类型：mp3、mp4、mpeg、mpga、m4a、wav和webm。<br>
```
import os
import openai
import requests
import time
import json
import time

API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://flag.smarttrot.com/v1"

# audio_transcriptions
def audio_transcriptions(file_name):
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    audio_file = open(file_name, "rb")
    resp = openai.Audio.transcribe("whisper-1", audio_file)
    json_str = json.dumps(resp, ensure_ascii=False) #打出中文来
    print(json_str)

def translation(file_name):
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    audio_file = open(file_name, "rb")
    resp = openai.Audio.translate("whisper-1", audio_file)
    json_str = json.dumps(resp, ensure_ascii=False) #打出中文来
    print(json_str)

if __name__ == '__main__':
    start = time.time();
    #audio_transcriptions("腾讯流量卡试音(1).wav");
    translation("腾讯流量卡试音(1).wav");
    end = time.time()
    print('本次处理时间(s): ', end - start)
```
