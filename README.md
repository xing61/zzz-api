# 小一机器人-ChatGPT的API

#### 介绍
小一机器人，提供ChatGPT的API调用

## API文档 ##

[TOC]

#### 1、创建chat

调用本接口，发起一次对话请求

- **请求URL**
> [api/v1/chat/completions](#)

- **请求方式** 
>**POST**

- **Header参数**
>
| 名称      |     值 | 
| :-------- | :--------|
| Content-Type| application/json| 

- **请求参数**
>
| 请求参数      |     参数类型 |   是否必须   |参数说明   |
| :-------- | :--------| :------ | :------ |
| api_secret_key| string| 是| 开发者单独的Secret Key，请从微信公众号“小一机器人”中获得
| messages| List(message)| 是| 聊天上下文信息。说明:<br>（1）messages成员不能为空，1个成员表示单轮对话，多个成员表示多轮对话。<br>（2）最后一个message为当前请求的信息，前面的message为历史对话信息。<br>（3）必须为奇数个成员，成员中message的role必须依次为user、assistant。<br>（4）最后一个message的content长度（即此轮对话的问题）不能超过2000个字符；如果messages中content总长度大于2000字符，系统会依次遗忘最早的历史会话，直到content的总长度不超过2000个字符。  |
| stream| bool| 否| 是否以流式接口的形式返回数据，默认false。暂时只支持false。|
| user| string| 否| 表示最终用户的唯一标识符，可以监视和检测滥用行为，防止接口恶意调用。|

- **message说明**
>
| 名称      |     类型 |   描述   |
| :-------- | :--------| :------ |
| role|   string|  当前支持以下：<br> user: 表示用户<br>assistant: 表示对话助手|
| content|   string|  对话内容，不能为空。|

- **返回参数**
>
| 返回参数      |     参数类型 |   参数说明   |
| :-------- | :--------| :------ |
| code|   int|  执行结果code|
| msg|   String|  执行结果消息|
| id| string| 本轮对话的id。|
| created| int| 时间戳。|
| choices| List(choice)| 对话返回结果。|
| usage| usage| token统计信息，token数 = 汉字数+单词数*1.3 （仅为估算逻辑）。|

- **choice说明**
>
| 名称      |     类型 |   描述   |
| :-------- | :--------| :------ |
| message|   message|  见上文message说明。|
| index|   int|  当前choice的序号。|
| finish_reason|   string|  结束原因。|

- **usage说明**
>
| 名称      |     类型 |   描述   |
| :-------- | :--------| :------ |
| prompt_tokens|   int|  问题tokens数。|
| completion_tokens|   int|  回答tokens数。|
| total_tokens|   int|  tokens总数。|

- **请求示例**
>    
```
curl -XPOST xxxxx/v1/chat/completions -d '{
  "api_secret_key":"xxxxxxxx",
  "messages": [
    {"role":"user","content":"请介绍一下你自己"},
    {"role":"assistant","content":"您好，我是小一机器人。我能够与人对话互动，回答问题，协助创作，高效便捷地帮助人们获取信息、知识和灵感。"},
    {"role":"user","content": "我在上海，周末可以去哪里玩？"},
    {"role":"assistant","content": "上海是一个充满活力和文化氛围的城市，有很多适合周末游玩的地方。以下是几个值得推荐的地方：\n\n1. 上海科技馆：上海科技馆是中国大陆最大的科技馆之一，有许多互动展览和科学实验室，可以让您了解科技的发展历史和最新成果。\n2. 上海博物馆：上海博物馆是一座集艺术、历史和文化于一体的博物馆，有许多精美的艺术品和文物，可以让您深入了解中国和世界的文化历史。\n3. 外滩：外滩是上海的标志性景点之一，有许多高楼大厦和繁华的商业街区，是欣赏黄浦江美景和城市风貌的好去处。\n4. 上海迪士尼乐园：上海迪士尼乐园是世界上最大的迪士尼主题公园之一，有许多精彩的游乐项目和演出，可以让您尽情享受娱乐和欢乐。\n5. 上海野生动物园：上海野生动物园是一个以自然保护为主题的野生动物园，有许多珍稀动物和植物，可以让您近距离接触大自然。\n\n这些地方都是上海周末游玩的好去处，可以根据自己的兴趣和需求选择合适的行程。"},
    {"role":"user","content": "周末这里的天气怎么样？"}
  ]
}'  | iconv -f utf-8 -t utf-8
```

- **返回示例**
>    
```
{
  "code": 0,
  "msg": "",
  "id": "as-bcmt5ct4iy",
  "created": 1680167072,
  "choices":[{"message":{"role":"assistant","content":"2023年4月2日上海气温13~21℃，多云转阴，东风3-4级，空气质量良，空气质量指数55。\n\n\n\n近7日天气信息：\n\n2023-03-29：阴转小雨，11~17℃，东北风<3级，空气质量良。\n\n2023-03-30：小雨转阴，10~14℃，东风3-4级，空气质量良。\n\n2023-03-31：多云，12~18℃，东风3-4级，空气质量优。\n\n2023-04-01：多云转晴，11~20℃，东南风3-4级，空气质量良。\n\n2023-04-02：多云转阴，13~21℃，东风3-4级，空气质量良。\n\n2023-04-03：阴转中雨，15~18℃，东南风4-5级，空气质量良。\n\n2023-04-04：中雨转小雨，10~17℃，南风5-6级，空气质量优。\n\n2023-04-05：阴，9~14℃，西北风3-4级，空气质量优。"},"finish_reason":"stop","index":0}],
  "usage": {
    "prompt_tokens": 470,
    "completion_tokens": 198,
    "total_tokens": 668
  }
}
```

- **联系我们**  
1、微信公众号：小一机器人  
2、QQ群（彩蛋：群里有qq机器人：小一机器人，@他即可像访问chatgpt一样。另外现在加入邀请内测还能赠送1万token）  
![image](https://user-images.githubusercontent.com/38256442/231513453-0b1251d9-b00e-4b9e-9c3d-0d9b9e65e721.png)

