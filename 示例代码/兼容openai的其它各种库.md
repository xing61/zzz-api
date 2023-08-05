参考本示例代码库中的另两个示例：兼容openai的python库，兼容openai的Node.js库<br>
核心有两点：
- 1、使用小一的api_secret_key替换官方的API_KEY: sk-****** <br>
一般可以通过语言库中的接口，设置OPENAI_API_KEY环境变量为小一后台获取的Key<br>

- 2、自定义域名http://flag.smarttrot.com/index.php/api/v1替换官方的域名: https://api.openai.com/v1<br>
一般也是通过语言库的接口，设置OPENAI_API_BASE_URL环境变量为：http://flag.smarttrot.com/index.php/api/v1/chat/completions<br>
