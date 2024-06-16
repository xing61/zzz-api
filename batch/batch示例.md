

- **上传batch数据**
```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1"; #智增增的base_url

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
- **创建batch**
```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1"; #智增增的base_url

def batches(file_id):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    resp = client.batches.create(input_file_id=file_id,
                                 endpoint="/v1/chat/completions",
                                 completion_window="24h")
    print(resp)
    return resp.id
```
- **检查batch是否完成**     

要注意的是：<br>
上一步提交完batch任务之后，是需要一段时间来执行结果的，时长取决于你的数据量大小、当下任务数、openai的算力是否充足等等。<br>

```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1"; #智增增的base_url

def retrieve(bid):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    resp = client.batches.retrieve(bid)
    print(resp)
    return resp.id
```
- **获取batch结果**

在上个返回batch的状态信息中，会有一个结果文件，然后通过下载这个文件来获取结果

```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1"; #智增增的base_url

def get_result(fid):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    content = client.files.content(fid)
    print(content.text);
```
