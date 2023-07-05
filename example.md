注意事项！！！注意事项！！注意事项！！
============================================  
现在主要发现是有2个问题，  
1、要加一个请求头，api接口文档中有说明：curl -H "Content-Type: application/json" -XPOST http://flag.smarttrot.com/index.php/api/v1/chat/completions -d '{"api_secret_key":"xxxx","messages": [{"role":"user","content":"请介绍一下你自己"}]}'  | iconv -f utf-8 -t utf-8  
2、messages传的不对，messages是array  
============================================== 
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
