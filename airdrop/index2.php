<?php
$assetsFolder = '../public/assets';
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
  <link rel="stylesheet" href="<?php echo $assetsFolder; ?>/css/main2.css" />
  <link rel="icon" href="<?php echo $assetsFolder; ?>/images/logo-icon.svg" />
  <title>DOMINATOR.DOMAINS | Search Domain</title>
</head>

<body>
  <div class="mainContainer">
    <!-- header start -->
    <header class="headerSection">
      <div class="autoContainer">
        <div class="headerSection__inner">
          <a href="/" class="headerSection__inner-logo">
            <img src="<?php echo $assetsFolder; ?>/images/logo.svg" alt="" />
          </a>
          <div class="headerSection__inner-group">
            <a href="../convert" class="button button--primary _xlg"><span>Back</span></a>
            <a href="https://sale.dominator.domains/" class="button button--primary _xlg animated">
              <span>Buy Private Sale (15% Off)</span>
            </a>
          </div>
        </div>
      </div>
    </header>
    <!-- header end -->
    <!-- createNft section start -->
    <section class="createNft createNft--qualify">
      <div class="autoContainer">
        <div class="createNft__bg">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="createNft__inner">
          <div class="createNft__inner-content">
            <h1 class="createNft__inner-content-title _lg gradientTitle wow animate fadeInUp" wow-delay=".1s">
              <span>5 Million $DomDom Airdrop </span>
            </h1>
            <div class="createNft__inner-content-body">
              <h4 class="gradientText gradientText--secondary wow animate fadeInUp" wow-delay=".2s">
                <span>How to qualify, Please follow instructions carefully</span>
              </h4>
              <ul class="createNft__inner-content-list">
                <li class="gradientText gradientText--light wow animate fadeInUp" wow-delay=".3s">
                  <strong>1.</strong>
                  <p>
                    <span>Follow us on twitter </span>
                    <a target="_blank" href="https://twitter.com/DomDomDomains">@Domdomdomains</a>
                  </p>
                </li>
                <li class="gradientText gradientText--light wow animate fadeInUp" wow-delay=".4s">
                  <strong>2.</strong>
                  <p>
                    <span>Retweet pinned tweet and tag 3 friends</span>
                  </p>
                </li>
                <li class="gradientText gradientText--light wow animate fadeInUp" wow-delay=".5s">
                  <strong>3.</strong>
                  <p>
                    <span>
                      Download the image on the right and tweet with hashtag #DomDom $DomDom
                    </span>
                  </p>
                </li>
                <li class="gradientText gradientText--light wow animate fadeInUp" wow-delay=".6s">
                  <strong>4.</strong>
                  <p>
                    <span>Download our Mobile App - </span><a target="_blank" href="https://shorturl.at/krGS2">Click
                      here</a>
                  </p>
                </li>
                <li class="gradientText gradientText--light wow animate fadeInUp" wow-delay=".7s">
                  <strong>5.</strong>
                  <p>
                    <span> submit wallet details - </span><a target="_blank"
                      href="https://forms.gle/6B6WGkdsociTf1C8A">Click here!</a>

                  </p>
                </li>

                <li class="gradientText gradientText--light wow animate fadeInUp" wow-delay=".7s">
                  <p>&nbsp; </p>
                  <strong>Winners will be announced through Mobile App</strong>
                  <p>&nbsp; </p>
                </li>
              </ul>
            </div>
          </div>
          <div class="createNft__inner-banner">
            <div class="createNft__inner-banner-img wow animate zoomIn">
              <div class="createNft__img _video">
                <video src="<?php echo $videoLink; ?>" muted autoplay></video>
              </div>
            </div>
            <div class="createNft__inner-banner-buttons">
              <a href="<?php echo $videoLink; ?>" class="button button--primary" download="Dominator Domains.mp4"
                id="imageDownloadBtn">
                <span>Download image</span>
              </a>
              <div class="popup__outer active">
                <button type="button" class="button button--primary color--green" id="gotoNftBtnDownload">
                  <span>Convert Domain Name to NFT</span>
                </button>
                <div class="popup">Will go LIVE after token launch</div>
                <input name="domain-send" id="domain-send" type="hidden" value="<?php echo $name ?>" />
                <input name="image-send" id="image-send" type="hidden" value="<?php echo $url ?>" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section end -->

    <!-- footer end -->
    <footer class="footerSection _sm">
      <div class="autoContainer">
        <div class="footerSection__bg">
          <div class="footerSection__bg-img">
            <img src="<?php echo $assetsFolder; ?>/images/footer-bg.svg" alt="" />
          </div>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="footerSection__inner">
          <div class="footerSection__inner-title">
            <h3><span>Contact Us</span></h3>
          </div>
          <div class="footerSection__inner-links">
            <a href="#" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/git.svg" alt="git" />
            </a>
            <a href="https://www.youtube.com/channel/UCar7eAlf_-mNxoRw0goJGQw" class="iconButton" target="_blank">
              <img src="<?php echo $assetsFolder; ?>/images/icons/youtube.svg" alt="youtube" />
            </a>
            <a href="#" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/M.svg" alt="M" />
            </a>
            <a href="#" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/reddit.svg" alt="reddit" />
            </a>
            <a href="https://t.me/dominatordomains" class="iconButton" target="_blank">
              <img src="<?php echo $assetsFolder; ?>/images/icons/telegram.svg" alt="telegram" />
            </a>
            <a href="https://twitter.com/DomDomDomains" class="iconButton" target="_blank">
              <img src="<?php echo $assetsFolder; ?>/images/icons/twitter.svg" alt="twitter" />
            </a>
          </div>
        </div>
      </div>
    </footer>
    <!-- footer end -->
    <!-- captcha end -->
    <div class="captcha" id="captcha" style="position: fixed; bottom: 0; left: 0">
      <div class="captcha__inner">
        <div class="cf-turnstile" data-sitekey="0x4AAAAAAADiMxLuTBnXAHly" data-callback="javascriptCallback"></div>
      </div>
    </div>
    <!-- captcha end -->


    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
    <script>
      function javascriptCallback(token) {
        if (!token) {
          window.location.replace("https://dominator.domains/bot.php");
          return;
        }
        fetch(`/recaptcha.php`, {
          method: "POST",
          redirect: "follow",
          body: JSON.stringify({ token }),
        })
          .then((response) => {
            if (response.status === 200) {
              console.log("captcha");
              document.getElementById("captcha").style.display = "none";
            } else {
              window.location.replace("/bot.php");
              console.log("response.status", response.status);
            }
          })
          .catch((err) => {
            console.log("err");
            console.log(err);
            window.location.replace("https://dominator.domains/bot.php");
          });
      }
    </script>
    <script src="<?php echo $assetsFolder; ?>/js/menu.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/wow.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/script1.js"></script>
    <script>
      new WOW({ boxClass: "animate", animateClass: "animated" }).init();
    </script>
  </div>
</body>

</html>