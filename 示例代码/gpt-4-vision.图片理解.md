```
from openai import OpenAI

API_SECRET_KEY = "xxxxxx";
BASE_URL = "https://flag.smarttrot.com/v1/"

client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)

response = client.chat.completions.create(
    model="gpt-4-vision-preview",
    messages=[
        {
            "role": "user",
            "content": [
                {"type": "text", "text": "What’s in this image?"},
                {
                    "type": "image_url",
                    "image_url": "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Gfp-wisconsin-madison-the-nature-boardwalk.jpg/2560px-Gfp-wisconsin-madison-the-nature-boardwalk.jpg",
                },
            ],
        }
    ],
    max_tokens=300,
)

print(response)
#print(response.choices[0])
```
或者直接将下面代码中的key和url换成我们智增增的即可：    
key是你在智增增后台拿到的密钥    
url是：`https://flag.smarttrot.com/v1/chat/completions`     
![0cca24fd-30c6-4dc1-b212-3c8a03a9f9a0](https://github.com/xing61/xiaoyi-robot/assets/38256442/9f20101d-cdf3-438e-ab3f-bc2d20e8766c)

