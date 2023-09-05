java语言的示例代码：（只需换成自己的key）
```
package gpt.zhizengzeng.utils;
import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.io.IOException;

public class ChatDemo
{
    public static void main(String[] args) throws Exception
    {
        String url = "http://flag.smarttrot.com/index.php/api/v1/chat/completions";
        String key = "你在智增增获取的API_SECRET_KEY";
        GPTConnectorServer(url, key);
    }

    public static void GPTConnectorServer(String paramUrl, String paramKey) throws IOException {
        // 设置 API 密钥和模型 ID
        String apiKey = paramKey;
        String modelId = "gpt-3.5-turbo";

        // 构建 API 请求 URL
        String apiUrl = paramUrl;

        // 构建请求数据
        String requestData = "{\"model\": \"" + modelId + "\", \"messages\": [{\"role\": \"system\", \"content\": \"You are a helpful assistant.\"}, {\"role\": \"user\", \"content\": \"Translate the following English text to French: 'Hello, how are you?'\"}]}";

        // 创建 URL 对象
        URL url = new URL(apiUrl);
        HttpURLConnection connection = (HttpURLConnection) url.openConnection();

        // 设置请求方法为 POST
        connection.setRequestMethod("POST");

        // 设置请求头部
        connection.setRequestProperty("Authorization", "Bearer " + apiKey);
        connection.setRequestProperty("Content-Type", "application/json");
        connection.setRequestProperty("Accept", "application/json");

        // 启用输入输出流
        connection.setDoOutput(true);

        // 将请求数据写入输出流
        try (DataOutputStream outputStream = new DataOutputStream(connection.getOutputStream())) {
            outputStream.write(requestData.getBytes());
            outputStream.flush();
        }

        // 获取响应
        int responseCode = connection.getResponseCode();
        if (responseCode == HttpURLConnection.HTTP_OK) {
            // 读取响应数据
            try (BufferedReader reader = new BufferedReader(new InputStreamReader(connection.getInputStream()))) {
                String line;
                StringBuilder response = new StringBuilder();
                while ((line = reader.readLine()) != null) {
                    response.append(line);
                }
                System.out.println("API 响应:\n" + response.toString());
            }
        } else {
            System.err.println("API 请求失败，响应码: " + responseCode);
        }
        // 关闭连接
        connection.disconnect();
    }
}


```
