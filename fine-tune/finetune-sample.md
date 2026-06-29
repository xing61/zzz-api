

- **data**
```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1";

# files
def files():
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    resp = openai.File.create(
        file=open("mydata.jsonl", "rb"),
        purpose='fine-tune'
    )
    print(resp)
```
- **upload train data**
```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1";

# jobs
def jobs(file_id):
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    resp = openai.FineTuningJob.create(training_file=file_id, model="gpt-3.5-turbo")  
    print(resp)
```
- **check train status**     


```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1";

# retrieve
def retrieve(ftid):
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    resp = openai.FineTuningJob.retrieve(ftid) 
    print(resp)
```
- **use fine-tuned model**



```
API_SECRET_KEY = "ztoken-api-key";
BASE_URL = "https://api.ztoken.pro/v1";

# chat
def chat_completions(query):
    openai.api_key = API_SECRET_KEY
    openai.api_base = BASE_URL
    resp = openai.ChatCompletion.create(
        model="ft:gpt-3.5-turbo-0613xxxxxxxxxxxxxxxxxxx", 
        messages=[
            {"role": "system", "content": "You are a helpful assistant."},
            {"role": "user", "content": query}
        ]
    )
    print(resp)
```

