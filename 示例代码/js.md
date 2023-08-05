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
