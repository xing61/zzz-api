java语言的示例代码：（只需换成自己的key）
```
import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.HashMap;
import java.util.Map;

public class OpenAIChatExample {
    public static void main(String[] args) {
        String apiKey = "你在小一获取的api-key";
        String urlString = "http://flag.smarttrot.com/index.php/api/v1/chat/completions";
        
        Map<String, Object> requestData = new HashMap<>();
        requestData.put("model", "gpt-3.5-turbo");
        
        Map<String, String> message1 = new HashMap<>();
        message1.put("role", "system");
        message1.put("content", "You are a helpful assistant.");
        
        Map<String, String> message2 = new HashMap<>();
        message2.put("role", "user");
        message2.put("content", "Tell me a joke.");
        
        requestData.put("messages", new Object[]{message1, message2});
        
        try {
            URL url = new URL(urlString);
            HttpURLConnection connection = (HttpURLConnection) url.openConnection();
            connection.setRequestMethod("POST");
            connection.setRequestProperty("Content-Type", "application/json");
            connection.setRequestProperty("Authorization", "Bearer " + apiKey);
            connection.setDoOutput(true);
            
            DataOutputStream outputStream = new DataOutputStream(connection.getOutputStream());
            outputStream.writeBytes(JsonUtils.toJson(requestData)); // You'll need to implement JsonUtils or use a library like Gson or Jackson.
            outputStream.flush();
            outputStream.close();
            
            int responseCode = connection.getResponseCode();
            if (responseCode == HttpURLConnection.HTTP_OK) {
                BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
                String inputLine;
                StringBuffer response = new StringBuffer();
                
                while ((inputLine = in.readLine()) != null) {
                    response.append(inputLine);
                }
                in.close();
                
                System.out.println("Response: " + response.toString());
            } else {
                System.out.println("Request failed with response code: " + responseCode);
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
```
