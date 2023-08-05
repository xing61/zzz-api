// 设置请求头
$api_secret_key = 'dd61320fddde6c6568be8a0b0004a53a'; // 你的api_secret_key
$headers = array(
    "Content-Type: application/json",
    "Authorization: Bearer ".$api_secret_key,
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
