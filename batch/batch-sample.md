

- **upload batch data**
```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1"; 

# files
def files():
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    resp = client.files.create(
        file=open("test.jsonl", "rb"),
        purpose='batch'
    )
    print(resp)
    return resp.id
```
- **create batch**
```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1"; 

def batches(file_id):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    resp = client.batches.create(input_file_id=file_id,
                                 endpoint="/v1/chat/completions",
                                 completion_window="24h")
    print(resp)
    return resp.id
```
- **check batch finished or not**     

```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1"; 

def retrieve(bid):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    resp = client.batches.retrieve(bid)
    print(resp)
    return resp.id
```
- **get batch result**



```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1"; 

def get_result(fid):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    content = client.files.content(fid)
    print(content.text);
```
