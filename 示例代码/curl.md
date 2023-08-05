```
curl -H "Content-Type: application/json" 
     -H "Authorization: Bearer $api_secret_key" 
     -XPOST http://flag.smarttrot.com/index.php/api/v1/chat/completions -d '{
  "messages": [
    {"role":"user","content":"请介绍一下你自己"},
    {"role":"assistant","content":"您好，我是小一机器人。我能够与人对话互动，回答问题，协助创作，高效便捷地帮助人们获取信息、知识和灵感。"},
    {"role":"user","content": "1+100="}
  ]
}'  | iconv -f utf-8 -t utf-8
```
