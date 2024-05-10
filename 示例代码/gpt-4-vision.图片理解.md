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
