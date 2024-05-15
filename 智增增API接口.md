# 智增增API接口

#### 说明
1、智增增自有的接口，区别于openai的接口，一般用来操作和查询智增增账户相关，比如查询余额等 <br>

- **注意事项**   
注意事项！！ 
``` 
现在主要发现是有3个问题，  
1、要加一个请求头，api接口文档中有说明：
curl -H "Content-Type: application/json" -H "Authorization: Bearer $api_secret_key" -XPOST https://api.zhizengzeng.com/v1/chat/completions -d '{"messages": [{"role":"user","content":"请介绍一下你自己"}]}'  | iconv -f utf-8 -t utf-8  
2、messages传的不对，messages是array
3、api_secret_key传的不对，不能再传openai的key了，你要传你从智增增拿到的key（不需要有openai的key）       
```
注：<br>
1、以下所有接口的base_url: `https://api.zhizengzeng.com/` （支持https）<br>
2、API通过HTTP请求调用。每次请求，需要在HTTP头中携带用户的api_secret_key，用于认证。 开发者单独的api_secret_key，请从智增增管理后台获得。 
请求头形如：  
```
Content-Type: application/json
Authorization: Bearer $api_secret_key
```

#### 1、账户相关     

获取账户相关信息：余额等。    

#### 1.1、查询余额       
获取账户余额      

- **请求URL**
> `v1/dashboard/billing/credit_grants`

- **请求方式** 
>**POST**

- **Header参数**
>
| 名称      |     值 | 
| :-------- | :--------|
| Content-Type| application/json| 
| Authorization| Bearer $api_secret_key|  

- **请求参数**
>
| 请求参数      |     参数类型 |   是否必须   |参数说明   |
| :-------- | :--------| :------ | :------ |   


- **请求示例**
>    
```
BASE_URL = "https://api.zhizengzeng.com/v1"

# credit_grants
def credit_grants(query):
    api_secret_key = API_SECRET_KEY;  # 智增增的secret_key
    url = BASE_URL+'/dashboard/billing/credit_grants'; # 余额查询url
    headers = {'Content-Type': 'application/json', 'Accept':'application/json',
               'Authorization': "Bearer "+api_secret_key}
    resp = requests.post(url, headers=headers)
    resp = resp.json();
    json_str = json.dumps(resp, ensure_ascii=False)
    print(json_str)

```

- **返回示例**
>    
```
{
    "code": 0,
    "msg": "ok",
    "object": "credit_summary",
    "grants": {
        "available_amount": "111.8658"
    }
}

```
