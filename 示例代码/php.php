// 设置请求头
$api_secret_key = 'dd61320fddde6c6568be8a0b0004a53a'; // 你的api_secret_key
$headers = array(
    "Content-Type: application/json",
    "Authorization: Bearer ".$api_secret_key
);
// 设置请求参数
$params = array();
$params['user'] = '张三';
{
    $one = ["role" => 'user', "content" => "1+100="];
    $messages = array(); $messages[] = $one;
    $params['messages'] = $messages;
}
// 调用请求
$cburl = 'http://flag.smarttrot.com/index.php/api/v1/chat/completions';
$chatgpt_resp = Tool::_request('post', $cburl, $params, $headers);
$data = json_decode($chatgpt_resp, true);

其中发送请求的Tool
方法如下：
/**
     * 发送请求，包括请求头的
     * @param  string $method 'get'|'post' 请求的方式
     * @param  string $url URL
     * @param  array|json $data post请求需要发送的数据
     * @param  bool $ssl
     */
    public static function _request($method='get',$url,$data=array(),$headerArray=array(),$ssl=false){
        //初始化一个curl资源
        $curl = curl_init();
        //设置curl选项
        curl_setopt($curl,CURLOPT_URL,$url);//url
        //请求的代理信息
        $user_agent = isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']: 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0 FirePHP/0.7.4';
        curl_setopt($curl,CURLOPT_USERAGENT,$user_agent);
        curl_setopt($curl,CURLOPT_HTTPHEADER, $headerArray);
        //referer头，请求来源
        curl_setopt($curl,CURLOPT_AUTOREFERER,true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 300);//设置超时时间
        //SSL相关
        if($ssl){
            //禁用后，curl将终止从服务端进行验证;
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
            //检查服务器SSL证书是否存在一个公用名
            curl_setopt($curl,CURLOPT_SSL_VERIFYHOST,2);
        }
        //判断请求方式post还是get
        if(strtolower($method)=='post') {
            /**************处理post相关选项******************/
            //是否为post请求 ,处理请求数据
            curl_setopt($curl,CURLOPT_POST,true);
            curl_setopt($curl,CURLOPT_POSTFIELDS,is_array($data)?http_build_query($data):$data);
        }
        //是否处理响应头
        curl_setopt($curl,CURLOPT_HEADER,false);
        //是否返回响应结果
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);

        //发出请求
        $response = curl_exec($curl);
        if (false === $response) {
            echo '<br>', curl_error($curl), '<br>';
            return false;
        }
        //关闭curl
        curl_close($curl);
        return $response;
    }
