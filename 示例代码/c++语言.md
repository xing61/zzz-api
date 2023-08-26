c++语言的示例代码：（只需换成自己的key）
```
#include <iostream>
#include <string>
#include <curl/curl.h>
#include <json/json.h>  // You'll need to have a JSON library like jsoncpp

size_t WriteCallback(void* contents, size_t size, size_t nmemb, void* userp) {
    ((std::string*)userp)->append((char*)contents, size * nmemb);
    return size * nmemb;
}

int main() {
    CURL* curl;
    CURLcode res;
    std::string apiKey = "你在小一获取的api-key";
    std::string urlString = "http://flag.smarttrot.com/index.php/api/v1/chat/completions";
    
    // Initialize the Curl library
    curl_global_init(CURL_GLOBAL_ALL);
    curl = curl_easy_init();
    
    if (curl) {
        struct curl_slist* headers = NULL;
        headers = curl_slist_append(headers, "Content-Type: application/json");
        headers = curl_slist_append(headers, ("Authorization: Bearer " + apiKey).c_str());
        
        // Prepare request data
        Json::Value requestData;
        requestData["model"] = "gpt-3.5-turbo";
        
        Json::Value message1;
        message1["role"] = "system";
        message1["content"] = "You are a helpful assistant.";
        
        Json::Value message2;
        message2["role"] = "user";
        message2["content"] = "Tell me a joke.";
        
        requestData["messages"].append(message1);
        requestData["messages"].append(message2);
        
        Json::StreamWriterBuilder writer;
        std::string jsonString = Json::writeString(writer, requestData);
        
        curl_easy_setopt(curl, CURLOPT_HTTPHEADER, headers);
        curl_easy_setopt(curl, CURLOPT_URL, urlString.c_str());
        curl_easy_setopt(curl, CURLOPT_POST, 1L);
        curl_easy_setopt(curl, CURLOPT_POSTFIELDS, jsonString.c_str());
        curl_easy_setopt(curl, CURLOPT_POSTFIELDSIZE, jsonString.length());
        
        // Response handling
        std::string response;
        curl_easy_setopt(curl, CURLOPT_WRITEFUNCTION, WriteCallback);
        curl_easy_setopt(curl, CURLOPT_WRITEDATA, &response);
        
        // Perform the request
        res = curl_easy_perform(curl);
        
        // Check for errors
        if (res != CURLE_OK) {
            std::cerr << "Curl error: " << curl_easy_strerror(res) << std::endl;
        } else {
            std::cout << "Response: " << response << std::endl;
        }
        
        // Clean up
        curl_slist_free_all(headers);
        curl_easy_cleanup(curl);
    }
    ```
    curl_global_cleanup();
    
    return 0;
}
