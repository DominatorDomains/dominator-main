<?php
session_start();
unset($_SESSION['verified']);

$assetsFolder = '../public/assets';
$verifed = $_SESSION["verified"];
$captchaAccepted = $verifed ? true : false;

if (!$verifed && isset($_POST['token'])) {
  $secretKey = "0x4AAAAAAADiM9hies353IpGqsBbfIpnsnI";
  $ip = $_SERVER['REMOTE_ADDR'];

  $url_path = 'https://challenges.cloudflare.com/turnstile/v0/siteverify';
  $data = array('secret' => $secretKey, 'response' => $_POST['token'], 'remoteip' => $ip);

  $options = array(
    'http' => array(
      'method' => 'POST',
      'content' => http_build_query($data)
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
    echo '<h1>Error</h1>';
    // header("Location : https://dominator.domains/bot.php");
    // exit();
  } else {
    $captchaAccepted = true;
    $_POST = array();
    $_SESSION["verified"] = true;
  }
}

$name = isset($_POST['domain']) ? $_POST['domain'] : '';
$url = isset($_POST['image']) ? $_POST['image'] : '';
$videoLink = $assetsFolder . '/videos/airdrop-image.mp4';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo $assetsFolder; ?>/css/main.css" />
  <link rel="icon" href="<?php echo $assetsFolder; ?>/images/logo-icon.svg" />
  <title>DOMINATOR.DOMAINS | Search Domain</title>
</head>

<body>
  <div class="mainContainer">
    <?php
    if ($captchaAccepted)
      include './content.php';
    else if (!isset($_POST['token']))
      include './captchabox.php';
    ?>
    <script src="<?php echo $assetsFolder; ?>/js/menu.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/wow.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/script1.js"></script>
    <script>
      new WOW({ boxClass: "animate", animateClass: "animated" }).init();
    </script>
  </div>
</body>

</html>