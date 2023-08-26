苹果系统，object-c语言的示例代码：<br>

```
#import <Foundation/Foundation.h>

int main(int argc, const char * argv[]) {
    @autoreleasepool {
        NSString *apiKey = @"你的小一的api-key";
        NSString *urlString = @"http://flag.smarttrot.com/index.php/api/v1/chat/completions";
        
        NSDictionary *parameters = @{
            @"model": @"gpt-3.5-turbo",
            @"messages": @[
                @{@"role": @"system", @"content": @"You are a helpful assistant."},
                @{@"role": @"user", @"content": @"Tell me a joke."}
            ]
        };
        
        NSData *jsonData = [NSJSONSerialization dataWithJSONObject:parameters options:0 error:nil];
        
        NSMutableURLRequest *request = [NSMutableURLRequest requestWithURL:[NSURL URLWithString:urlString]];
        request.HTTPMethod = @"POST";
        [request setValue:@"application/json" forHTTPHeaderField:@"Content-Type"];
        [request setValue:[NSString stringWithFormat:@"Bearer %@", apiKey] forHTTPHeaderField:@"Authorization"];
        request.HTTPBody = jsonData;
        
        NSURLSession *session = [NSURLSession sharedSession];
        NSURLSessionDataTask *dataTask = [session dataTaskWithRequest:request completionHandler:^(NSData *data, NSURLResponse *response, NSError *error) {
            if (error) {
                NSLog(@"Error: %@", error);
            } else {
                NSDictionary *responseDict = [NSJSONSerialization JSONObjectWithData:data options:0 error:nil];
                NSLog(@"Response: %@", responseDict);
            }
        }];
        
        [dataTask resume];
        
        [[NSRunLoop currentRunLoop] run];
    }
    return 0;
}
```
