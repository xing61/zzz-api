# 优质稳定的OpenAI的API接口-For企业和开发者

#### 介绍
为企业和开发者提供优质稳定的OpenAI相关的API调用接口。    
智增增-大模型的API接口服务商，提供ChatGPT的API调用，支持openai的API接口，支持：gpt-4-vision, gpt-4，gpt-3.5。          
要买openai的账号？   
要科学上网？  
要美元的银行卡？  
通通不用的，直接调用就行，简单粗暴，关键稳定好用！！  
openai的国内代理，国内接口请求转发，api proxy        

- **项目主要优势**  
  * 不限制使用，可以用微信充值，没有封号风险。
  * 不用买openai的账号，不用美元的银行卡。 
  * 无需代理即可访问，没有任何的阻拦。  
  * 强大的接口能力，支持openai所有接口和模型（包括11.7号最新更新的模型）：支持GPT-3.5，GPT-4，Embedding，Whisper，TTS, Fine-tuning，DALL-E-3, Image等    
  * 最广泛的插件支持能力：Sidebar，沉浸式翻译，ChatHub，Chatbox，CodeGPT，ChatGPT-Next-Web等各类大模型插件。如果不想写代码，仅仅想在插件中使用，可以使用我们这个工具：https://github.com/xing61/chatgpt-plugin-key   
  * 兼容OpenAI接口格式，可以做到平替。   
  * 支持对Embeddings支持，可以用接口运行向量库、AutoGPT等应用。  
  * 支持对stream模式的支持，可以支持原生的各种应用   
  * 支持文字生成图片   
  * 支持官方的Whisper模型，支持transcriptions和translations，可以做语音识别和翻译   
  * 支持fine-tune（微调），可以使用自己的数据来微调GPT的模型，详见示例
  * 支持函数调用(function_call)，详见示例 
  * 更多特性支持，敬请期待。也可直接向我们提交需求哦  

- **项目地址**   
1、项目官方网址：http://gpt.zhizengzeng.com/#/login   
   智增增-大模型的API接口服务商   
   开发者单独的Secret Key、余额查询、示例代码等可以从管理后台中获取。        
2、微信交流群（如果你也对本项目感兴趣，欢迎加入群聊参与讨论交流）：    
![输入图片说明](https://flag.smarttrot.com/api_qunliao1.png)   
        
 
- **注意事项**   
注意事项！！ 
``` 
现在主要发现是有3个问题，  
1、要加一个请求头，api接口文档中有说明：
curl -H "Content-Type: application/json" -H "Authorization: Bearer $api_secret_key" -XPOST https://flag.smarttrot.com/v1/chat/completions -d '{"messages": [{"role":"user","content":"请介绍一下你自己"}]}'  | iconv -f utf-8 -t utf-8  
2、messages传的不对，messages是array
3、api_secret_key传的不对，亲，不能再传openai的了，你要传你从智增增拿到的key（不需要有openai的key哈）       
```
注：<br>
1、以下所有接口的base_url: `https://flag.smarttrot.com/` （支持https）<br>
2、API通过HTTP请求调用。每次请求，需要在HTTP头中携带用户的api_secret_key，用于认证。 开发者单独的api_secret_key，请从智增增管理后台获得。 
请求头形如：  
```
Content-Type: application/json
Authorization: Bearer $api_secret_key
```
- **典型用法**    
典型用法：<br>
1、设置OPENAI_API_KEY环境变量为：智增增后台获取的api_secret_key，替换官方的API_KEY: sk-****** <br>
2、设置OPENAI_API_BASE_URL环境变量为：`https://flag.smarttrot.com/v1/`,  替换官方的域名:  `https://api.openai.com/v1/` <br>
![微信截图_20231109105329](https://github.com/xing61/xiaoyi-robot/assets/38256442/bfb8cbb5-c600-49eb-92eb-96c014ec3e37)


## API文档 ## 
1、openai的API文档：https://github.com/xing61/xiaoyi-robot/blob/main/openai%E6%8E%A5%E5%8F%A3.md <br>
2、智增增API接口文档：https://github.com/xing61/xiaoyi-robot/blob/main/%E6%99%BA%E5%A2%9E%E5%A2%9EAPI%E6%8E%A5%E5%8F%A3.md <br>
