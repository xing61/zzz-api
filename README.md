# 小一机器人-提供ChatGPT的API

#### 介绍
小一机器人，提供ChatGPT的API调用，支持openai的API接口，支持：gpt-4，gpt-3.5。  
要买openai的账号？  
要科学上网？  
要美元的银行卡？  
通通不用的，直接调用就行，简单粗暴，关键好用！！ 
- **项目地址** 
1、微信公众号：小一机器人，开发者单独的Secret Key、余额查询、示例代码等请从微信公众号“小一机器人”，点击菜单“Chat的API”查看  
 ![小一机器人-公众号二维码-small](https://github.com/xing61/xiaoyi-robot/assets/38256442/c3a00169-d51b-48f7-b969-2303e9916886)  
2、微信交流群（如果你也对本项目感兴趣，欢迎加入群聊参与讨论交流）：    
![api接口加入群聊二维码](https://github.com/xing61/xiaoyi-robot/assets/38256442/969ab523-a915-47f2-9f5b-c3dfd358bd62)
3、QQ群（彩蛋：群里有qq机器人：小一机器人，@他即可像访问chatgpt一样。另外现在加入邀请内测还能赠送免费token）  
![image](https://user-images.githubusercontent.com/38256442/231513453-0b1251d9-b00e-4b9e-9c3d-0d9b9e65e721.png)  

## API文档 ##

注意事项！！ 
``` 
现在主要发现是有2个问题，  
1、要加一个请求头，api接口文档中有说明：curl -H "Content-Type: application/json" -XPOST http://flag.smarttrot.com/index.php/api/v1/chat/completions -d '{"api_secret_key":"xxxx","messages": [{"role":"user","content":"请介绍一下你自己"}]}'  | iconv -f utf-8 -t utf-8  
2、messages传的不对，messages是array  
``` 
注：以下所有接口的base_url: http://flag.smarttrot.com/index.php/
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
| api_secret_key| string| 是| 开发者单独的Secret Key，也包括请求的base_url，请从微信公众号“小一机器人”，点击“大模型合作”菜单中的“Chat的API”获得
| model| string| 否| 大模型的类别，目前支持：gpt-4，gpt-3.5。默认gpt-3.5|
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
curl -H "Content-Type: application/json" -XPOST xxxxx/v1/chat/completions -d '{
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
```
php示例代码：  
$arr = array();
$arr['api_secret_key'] = 'dd61320fddde6c6568be8a0b0004a53a';
$arr['user'] = '张三';
{
    $one = ["role" => 'user', "content" => "1+100="];
    $messages = array(); $messages[] = $one;
    $arr['messages'] = $messages;
}
// 调用吧
$cburl = 'http://flag.smarttrot.com/index.php/api/v1/chat/completions';
$chatgpt_back = Tool::_request('post', $cburl, $arr);
$data = json_decode($chatgpt_back, true);
```
```
python示例代码：
import os
import requests
import time
import json

def chat_completions():
    url="http://flag.smarttrot.com/index.php/api/v1/chat/completions"
    headers = {'Content-Type': 'application/json', 'Accept':'application/json'}
    params = {'api_secret_key':'dd61320f306e6c6568be8a0b0004a53d','user':'张三',
              'messages':[{'role':'user', 'content':'1+100='}]};
    r = requests.post(url, json.dumps(params), headers=headers)
    print(r.json())

if __name__ == '__main__':
    chat_completions();
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
#### 2、Completions

Given a prompt, the model will return one or more predicted completions, and can also return the probabilities of alternative tokens at each position.

#### 2.1、Create completion
Creates a completion for the provided prompt and parameters.

- **请求URL**
> [api/v1/completions](#)

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
| api_secret_key| string| 是| 开发者单独的Secret Key，请从微信公众号“小一机器人”中获得|
| model| string| 是| ID of the model to use. You can use the List models API to see all of your available models, <br>or see our Model overview for descriptions of them.|
| prompt| string or array| 否| The prompt(s) to generate completions for, encoded as a string, array of strings,<br> array of tokens, or array of token arrays.<br>Note that <|endoftext|> is the document separator that the model sees during training, <br>so if a prompt is not specified the model will generate as if from the beginning of a new document. <br>Defaults to <|endoftext|>|
| suffix| string | 否| The suffix that comes after a completion of inserted text.Defaults to null|
| max_tokens| int| 否| The maximum number of tokens to generate in the completion.<br>The token count of your prompt plus max_tokens cannot exceed the model's context length. <br>Example Python code for counting tokens.Defaults to 16|
| temperature| number| 否| What sampling temperature to use, between 0 and 2. <br>Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic.<br>We generally recommend altering this or top_p but not both.Defaults to 1|
| top_p| number| 否| An alternative to sampling with temperature, called nucleus sampling, <br>where the model considers the results of the tokens with top_p probability mass. <br>So 0.1 means only the tokens comprising the top 10% probability mass are considered.<br>We generally recommend altering this or temperature but not both.Defaults to 1|
| n| number| 否| How many completions to generate for each prompt.<br>Note: Because this parameter generates many completions, <br>it can quickly consume your token quota. Use carefully and ensure that you have reasonable settings for max_tokens and stop.Defaults to 1|
| stream| bool| 否| Whether to stream back partial progress. <br>If set, tokens will be sent as data-only server-sent events as they become available, <br>with the stream terminated by a data: [DONE] message. Example Python code.Defaults to false|
| logprobs| int| 否| Include the log probabilities on the logprobs most likely tokens, <br>as well the chosen tokens. For example, if logprobs is 5, the API will return a list of the 5 most likely tokens. <br>The API will always return the logprob of the sampled token, so there may be up to logprobs+1 elements in the response.<br>The maximum value for logprobs is 5. If you need more than this, <br>please contact us through our Help center and describe your use case.Defaults to null|
| echo| bool| 否| Echo back the prompt in addition to the completion。Defaults to false|
| stop| int| 是| Up to 4 sequences where the API will stop generating further tokens. <br>The returned text will not contain the stop sequence.Defaults to null  |Number between -2.0 and 2.0. <br>Positive values penalize new tokens based on whether they appear in the text so far, increasing the model's likelihood to talk about new topics.<br>See more information about frequency and presence penalties.Defaults to 0|
| presence_penalty| int| 否| Number between -2.0 and 2.0. Positive values penalize new tokens <br>based on whether they appear in the text so far, <br>increasing the model's likelihood to talk about new topics.<br>See more information about frequency and presence penalties.Defaults to 0|
| frequency_penalty| int| 否| Number between -2.0 and 2.0. <br>Positive values penalize new tokens based on their existing frequency in the text so far,<br> decreasing the model's likelihood to repeat the same line verbatim.<br>See more information about frequency and presence penalties.Defaults to 0|
| best_of| int| 否| Generates best_of completions server-side and returns the "best" (the one with the highest log probability per token). <br>Results cannot be streamed.<br>When used with n, best_of controls the number of candidate completions and n specifies how many to return – <br>best_of must be greater than n.<br>Note: Because this parameter generates many completions, it can quickly consume your token quota. <br>Use carefully and ensure that you have reasonable settings for max_tokens and stop.Defaults to 1|
| logit_bias| map| 否| Modify the likelihood of specified tokens appearing in the completion.<br>Accepts a json object that maps tokens (specified by their token ID in the GPT tokenizer) to an associated bias value from -100 to 100.<br> You can use this tokenizer tool (which works for both GPT-2 and GPT-3) to convert text to token IDs.<br> Mathematically, the bias is added to the logits generated by the model prior to sampling. The exact effect will vary per model, <br>but values between -1 and 1 should decrease or increase likelihood of <br>selection; values like -100 or 100 should result in a ban or exclusive selection of the relevant token.<br>As an example, you can pass {"50256": -100} to prevent the <|endoftext|> <br>token from being generated.Defaults to null|
| user| string| 否| 表示最终用户的唯一标识符，可以监视和检测滥用行为，防止接口恶意调用。|

- **返回参数**
>
| 返回参数      |     参数类型 |   参数说明   |
| :-------- | :--------| :------ |
| code|   int|  执行结果code|
| msg|   String|  执行结果消息|
| id| string| 本轮对话的id。|
| object| string| text_completion|
| created| int| 时间戳。|
| model| string| 本次调用的模型|
| choices| List(choice)| 对话返回结果。|
| usage| usage| token统计信息，token数 = 汉字数+单词数*1.3 （仅为估算逻辑）。|

- **choice说明**
>
| 名称      |     类型 |   描述   |
| :-------- | :--------| :------ |
| text|   string|  返回的文本|
| index|   int|  当前choice的序号。|
| logprobs|   int|  当前choice的logprobs。|
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
curl -H "Content-Type: application/json" -XPOST xxxxx/v1/chat/completions -d '{
  "api_secret_key":"xxxxxxxx",
  "messages": [
    {"role":"user","content":"请介绍一下你自己"}
  ]
}'  | iconv -f utf-8 -t utf-8
```

- **返回示例**
>    
```
{
  "code": 0,
  "msg": "",
  "id": "cmpl-uqkvlQyYK7bGYrRHQ0eXlWi7",
  "object": "text_completion",
  "created": 1589478378,
  "model": "text-davinci-003",
  "choices": [
    {
      "text": "\n\nThis is indeed a test",
      "index": 0,
      "logprobs": null,
      "finish_reason": "length"
    }
  ],
  "usage": {
    "prompt_tokens": 5,
    "completion_tokens": 7,
    "total_tokens": 12
  }
}
```

#### 3、图片-创建图片

Given a prompt and/or an input image, the model will generate a new image. 

- **请求URL**
> [api/v1/images/generations](#)

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
| prompt| string| 是| A text description of the desired image(s). The maximum length is 1000 characters.  |
| n| int| 否| The number of images to generate. Must be between 1 and 10. Defaults to 1|
| size| string| 否| The size of the generated images. Must be one of 256x256, 512x512, or 1024x1024. Defaults to 1024x1024|
| response_format| string| 否| The format in which the generated images are returned. Must be one of url or b64_json. Defaults to url|
| user| string| 否| 表示最终用户的唯一标识符，可以监视和检测滥用行为，防止接口恶意调用。|

- **返回参数**
>
| 返回参数      |     参数类型 |   参数说明   |
| :-------- | :--------| :------ |
| code|   int|  执行结果code|
| msg|   String|  执行结果消息|
| created| int| 时间戳。|
| data| List(img)| 对话返回结果。|

- **img说明**
>
| 名称      |     类型 |   描述   |
| :-------- | :--------| :------ |
| url|   string|  当前图片的地址url|

- **请求示例**
>    
```
curl -H "Content-Type: application/json" -XPOST xxxxx/v1/images/generations -d '{
  "api_secret_key":"xxxxxxxx",
  "prompt": "A cute baby sea otter",
}'  | iconv -f utf-8 -t utf-8
```

- **返回示例**
>    
```
{
  "code": 0,
  "msg": "",
  "created": 1680167072,
  "data": [
    {
      "url": "https://..."
    },
    {
      "url": "https://..."
    }
  ]
}
```
