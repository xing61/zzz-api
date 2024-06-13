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
    private string postUrl = "https://api.zhizengzeng.com/v1/chat/completions";
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
```

.net的c#示例
```
using System;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;
using Newtonsoft.Json.Linq;

class ChatGPT
{
    private static readonly string postUrl = "https://api.zhizengzeng.com/v1/chat/completions";
    private const string user = "user";
    private const string messages = "messages";

    static async Task Main(string[] args)
    {
        await PostAsync();
    }

    static async Task PostAsync()
    {
        // 配置数据
        string apiSecretKey = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
        var data = new JObject();
        data[user] = "测试者";

        // messages
        var messageDatas = new JArray();

        // 单个 message
        var messageData = new JObject
        {
            ["role"] = "user",
            ["content"] = "请介绍一下你自己"
        };

        // 存入 message
        messageDatas.Add(messageData);

        // 配置内容
        data[messages] = messageDatas;

        // 编码 JSON
        var jsonData = data.ToString();
        var dataBytes = Encoding.UTF8.GetBytes(jsonData);

        using (HttpClient client = new HttpClient())
        {
            var requestContent = new ByteArrayContent(dataBytes);
            requestContent.Headers.ContentType = new System.Net.Http.Headers.MediaTypeHeaderValue("application/json");
            client.DefaultRequestHeaders.Authorization = new System.Net.Http.Headers.AuthenticationHeaderValue("Bearer", apiSecretKey);

            HttpResponseMessage response = await client.PostAsync(postUrl, requestContent);

            if (response.IsSuccessStatusCode)
            {
                string receiveContent = await response.Content.ReadAsStringAsync();
                ExtractContent(receiveContent);
            }
            else
            {
                Console.WriteLine($"Error: {response.StatusCode}, {response.ReasonPhrase}");
            }
        }
    }

    static void ExtractContent(string jsonResponse)
    {
        JObject json = JObject.Parse(jsonResponse);
        string content = json["choices"][0]["message"]["content"].ToString();
        Console.WriteLine("Content: " + content);
    }
}
```

