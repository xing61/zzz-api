注意：新版本的接口已支持流式，需要按照openai接口文档修改为stream模式

- **创建一个assistant**
```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1/"; #智增增的base_url

# assistant
def create_assistant():
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    assistant = client.beta.assistants.create(
        name="Math Tutor",
        instructions="You are a personal math tutor. Write and run code to answer math questions.",
        tools=[{"type": "code_interpreter"}],
        model="gpt-4-1106-preview"
    )
    print(assistant)
```
- **创建一个thread(会话)**
```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1/"; #智增增的base_url

# thread
def create_thread():
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    thread = client.beta.threads.create()
    print(thread)
```
- **add a message**
```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1/"; #智增增的base_url

def add_message(thread_id):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    message = client.beta.threads.messages.create(
        thread_id=thread_id, # 助手的会话id要从上一步获取得到
        role="user",
        content="I need to solve the equation `3x + 11 = 14`. Can you help me?"
    )
    print(message)
```

- **run这个助手**
新版assistant支持传递参数stream=true，流式直接返回结果
```
API_SECRET_KEY = "你的智增增获取的api_key";
BASE_URL = "https://api.zhizengzeng.com/v1/"; #智增增的base_url

# run a assistant
def run(assistant_id, thread_id):
    client = OpenAI(api_key=API_SECRET_KEY, base_url=BASE_URL)
    run = client.beta.threads.runs.create(
        thread_id=thread_id,  # 助手的会话id要从上一步获取得到
        assistant_id=assistant_id, # 助手的id要从上一步获取得到
        instructions="Please address the user as Jane Doe. The user has a premium account."
    )
    print(run)
```


恭喜，助手搭建告成！！<br>
你就用指定模型和工具建立了一个自己的助手了<br>

