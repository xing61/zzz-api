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
        string apiSecretKey = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
        JsonData data = new JsonData();
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
        request.SetRequestHeader("Authorization", "Bearer "+apiSecretKey);
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
