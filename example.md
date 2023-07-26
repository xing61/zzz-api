注意事项！！
``` 
现在主要发现是有2个问题，  
1、要加一个请求头，api接口文档中有说明：curl -H "Content-Type: application/json" -XPOST http://flag.smarttrot.com/index.php/api/v1/chat/completions -d '{"api_secret_key":"xxxx","messages": [{"role":"user","content":"请介绍一下你自己"}]}'  | iconv -f utf-8 -t utf-8  
2、messages传的不对，messages是array  
```
php示例代码：（只需换成自己的key）
```
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
$chatgpt_back = Tool::_request('post', $cburl, $arr); // 注意这里post请求要自己添加请求头Content-Type: application/json
$data = json_decode($chatgpt_back, true);
```
python示例代码：（只需换成自己的key）
```
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
js示例代码：（只需换成自己的key）
```
// chatgpt.js文件
// 请求接口
import axios from "axios";

export const chatgpt = params => {
  return axios ({
    method: 'post',
    url: 'http://flag.smarttrot.com/index.php/api/v1/chat/completions',
    data: params,
    headers: {
      'Content-Type': 'application/json'
    }
  }).then(res => res.data)
}
// test.js文件
import {chatgpt} from "./chatgpt.js";

// 调用chatgpt接口
chatgpt({
    "api_secret_key":'xxxx',
    "messages": [
      {"role": "user", "content": "1+100="}
    ]
}).then(res => {console.log(res)})
```
Unity的c#示例代码：（只需换成自己的key）
```
using System;
using System.Collections;
using System.Text;
using UnityEngine;
using UnityEngine.Networking;
using LitJson; //这个需要百度下载一个LitJson库然后放入Assets目录下

public class ChatGPTScripts : MonoBehaviour
{
    private string postUrl = "http://flag.smarttrot.com/index.php/api/v1/chat/completions";
    private const string apiSecretKey = "api_secret_key";
    private const string user = "user";
    private const string messages = "messages";

    private void Start()
    {
        StartCoroutine(Post());
    }
    IEnumerator Post()
    {/**//**/
        WWWForm form = new WWWForm();/**/
        
        // 配置数据
        JsonData data = new JsonData();
        data[apiSecretKey] = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
        data[user] = "测试者";
        
        // messages
        JsonData messageDatas = new JsonData();
        messageDatas.SetJsonType(JsonType.Array);
        
        // 单个 message
        JsonData messageData = new JsonData();
        messageData["role"] = "user";
        messageData["content"] = "请介绍一下你自己";
        
        // 存入 message
        messageDatas.Add(messageData);
        
        // 配置内容
        data[messages] = messageDatas;
        
        // 编码 JSON
        var dataBytes = Encoding.Default.GetBytes(data.ToJson());
        UnityWebRequest request = UnityWebRequest.Post(postUrl, form);
        request.uploadHandler = new UploadHandlerRaw(dataBytes);

        // 发送 https
        request.SetRequestHeader("Content-Type", "application/json");
        yield return request.SendWebRequest();
        if(request.isHttpError || request.isNetworkError)
        {
            Debug.LogError(request.error);
        }
        else
        {
            string receiveContent = request.downloadHandler.text;
            Debug.Log(receiveContent);
        }
    }
}
```
