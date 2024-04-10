# 优质稳定的OpenAI的API接口-For企业和开发者

#### 介绍
为企业和开发者提供优质稳定的OpenAI相关的API调用接口。          
提供ChatGPT的API调用，支持OpenAI的API接口，包括：assistant，gpt-4，gpt-4-vision, Fine-tuning，gpt-3.5等。 <br>
（同时支持google gemini、claude、百度文心一言、阿里、讯飞星火、智谱ChatGLM、ChatGPT等， 标准的OpenAI的接口格式访问所有的大模型）<br>
要买openai的账号？      
要美元的银行卡？        
通通不用的，直接调用就行，简单直接，关键稳定好用！！          

- **项目主要优势**  
  * 不限制使用，可以用微信充值和对公付款等，没有封号风险。
  * 不用买openai的账号，不用美元的银行卡。  
  * 强大的接口能力，支持openai所有接口和模型：支持assistant，gpt-4-1106，gpt-4-vision，GPT-3.5，GPT-4，Embedding，Whisper，TTS, Fine-tuning，DALL-E-3, Image等
  * 同时支持google gemini、claude、百度文心一言、阿里、讯飞星火、ChatGLM等，标准的OpenAI的接口格式访问所有的大模型      
  * 最广泛的插件支持能力:ChatGPT-Next-Web,LobeChat,GPT学术(GPT Academic),Chatbox,CodeGPT等各类大模型插件。如果不写代码，仅仅想在插件中使用，也可以使用我们这个[插件工具](https://github.com/xing61/chatgpt-plugin-key)      
  * 支持企业定制和内部本地部署，可以联系我们：【[点这里](https://github.com/xing61/xiaoyi-robot/assets/38256442/9e9156ad-1dc3-4dd4-bf1a-a200849ff4ac)
】
  * 兼容OpenAI接口格式，可以做到平替。
  * 支持assistant api，可以创建自己的助手，详见示例
  * 支持fine-tune（微调），可以使用自己的数据来微调GPT的模型，详见示例
  * 支持对Embeddings支持，可以用接口运行Langchain、向量库、AutoGPT等应用  
  * 支持对stream模式的支持，可以支持原生的各种应用   
  * 支持文字生成图片，支持最新的DALL-E-3   
  * 支持官方的Whisper模型，支持transcriptions和translations，可以做语音识别和翻译   
  * 支持函数调用(function_call)，详见示例
  * 支持官方的tts，支持tts-1模型和tts-1-hd模型，可以做语音合成，详见示例 
  * 更多特性支持，敬请期待。也可直接向我们提交需求哦  

- **项目地址**   
1、项目官方网址：http://gpt.zhizengzeng.com/#/login   
   智增增-大模型的API接口服务商，支持百度文心一言、阿里、讯飞星火、清华ChatGLM、ChatGPT等   
   开发者单独的Secret Key、调用记录、微调模型、余额查询、示例代码等可以从管理后台中获取。        
2、微信交流群（如果你也对本项目感兴趣，欢迎加入微信群交流）：    
![微信截图_20240110204135](https://github.com/xing61/xiaoyi-robot/assets/38256442/bff4db4d-9cf4-42d6-8422-a1177d2d0219)



 
- **注意事项**   
1、以下所有接口的base_url: `https://flag.smarttrot.com/` （支持https）<br>
2、API通过HTTP请求调用。每次请求，需要在HTTP头中携带用户的API_KEY，用于认证。 开发者单独的API_KEY，请从智增增管理后台获得。 
   请求头形如：  
   ```
   Content-Type: application/json
   Authorization: Bearer 你在智增增的key
   ```
- **典型用法1**    
1、在python中，使用官方的openai的包，设置api_key为：智增增后台获取的API_KEY，替换官方的API_KEY: sk-****** <br>
2、设置base_url为：`https://flag.smarttrot.com/v1/`,  替换官方的域名:  `https://api.openai.com/v1/` <br>
![微信截图_20231109105329](https://github.com/xing61/xiaoyi-robot/assets/38256442/bfb8cbb5-c600-49eb-92eb-96c014ec3e37)
- **典型用法2**    
1、在langchain中，设置OPENAI_API_KEY环境变量为：智增增后台获取的API_KEY，替换官方的API_KEY: sk-****** <br>
2、设置OPENAI_API_BASE_URL环境变量为：`https://flag.smarttrot.com/v1/`,  替换官方的域名:  `https://api.openai.com/v1/` <br>
![微信截图_20231119113128](https://github.com/xing61/xiaoyi-robot/assets/38256442/ce744bb8-a49d-4230-a07d-38235441b96a)
- **典型用法3**    
1、在任何语言中，直接发送http请求，请求头中指定key：智增增后台获取的API_KEY，替换官方的API_KEY: sk-****** <br>
2、请求的url同官方格式，只需要将base_url：`https://flag.smarttrot.com/v1/`,  替换官方的域名:  `https://api.openai.com/v1/` <br>
![微信截图_20231121104939](https://github.com/xing61/xiaoyi-robot/assets/38256442/b57cc6bc-8f76-44bb-965e-3cc99be9f3fa)


## 更详细的API说明 ## 
1、[OpenAI的API说明](https://github.com/xing61/xiaoyi-robot/blob/main/openai%E6%8E%A5%E5%8F%A3%E8%AF%B4%E6%98%8E.md)<br>

2、[智增增API接口说明](https://github.com/xing61/xiaoyi-robot/blob/main/%E6%99%BA%E5%A2%9E%E5%A2%9EAPI%E6%8E%A5%E5%8F%A3.md)<br>

