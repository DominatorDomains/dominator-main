<?php
$out[] = file_get_contents('php://input');
$data = (array) json_decode($out[0]);

$captcha = $data['token'];

if (!$captcha) {
    header("Location : bot.php");
    exit();
}

$secretKey = "0x4AAAAAAADiM9hies353IpGqsBbfIpnsnI";
$ip = $_SERVER['REMOTE_ADDR'];

$url_path = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
$data = array('secret' => $secretKey, 'response' => $captcha, 'remoteip' => $ip);
$query = http_build_query($data);

$options = array(
    'http' => array(
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n" . "Content-Length: " . strlen($query) . "\r\n" . "User-Agent:MyAgent/1.0\r\n",
        'method' => 'POST',
        'content' => $query
    )
);

$stream = stream_context_create($options);

$result = file_get_contents(
    $url_path,
    false,
    $stream
);

$response = $result;
$responseKeys = json_decode($response, true);

if (intval($responseKeys["success"]) !== 1) {
    header("Location : https://dominator.domains/bot.php");
    exit();
} else {
    echo 'success';
}
?>