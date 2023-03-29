<?php
$assetsFolder = '../public/assets';
$name = isset($_POST['domain']) ? $_POST['domain'] : 'Smash22.arb';
$where = isset($_POST['where']) ? $_POST['where'] : 'si';
$img1 = $assetsFolder . '/images/nft-create/backgrounds/bg-black-2.png';
$img2 = $assetsFolder . '/images/nft-create/backgrounds/bg-white.png';
$img3 = $assetsFolder . '/images/nft-create/backgrounds/bg-gold.png';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?php echo $assetsFolder; ?>/css/main.css" />
  <link rel="stylesheet" href="<?php echo $assetsFolder; ?>/css/color-picker.css" />
  <link rel="icon" href="<?php echo $assetsFolder; ?>/images/logo-icon.svg">
  <title>DOMINATOR.DOMAINS | Search Domain</title>
</head>

<body>
  <div class="mainContainer">
    <!-- header start -->
    <header class="headerSection">
      <div class="autoContainer">
        <div class="headerSection__inner">
          <div class="headerSection__inner-logo">
            <a href="./">
              <img src="<?php echo $assetsFolder; ?>/images/logo.svg" alt="" />
            </a>
          </div>
          <div class="headerSection__inner-group">
            <a href="../index.php" class="button button--primary _xlg"><span>Back</span></a>
            <button class="button button--primary _xlg" id="howMenuBtn">
              <span>How it works</span>
            </button>
            <a href="https://www.pinksale.finance/private-sale/0xb356Ffc9DFdEb0f322E8187a07b1199a0831b83a/1?chain=Arbitrum" target="_blank" class="button button--primary _xlg animated">
              <span>Buy Private Sale (15% Off)</span>
            </a>
          </div>
        </div>
      </div>
    </header>
    <!-- header end -->
    <!-- section start -->
    <section class="menuSection" id="howMenu">
      <div class="autoContainer">
        <div class="menuSection__inner">
          <div class="menuSection__inner-title">
            How to convert a Domain name to an NFT Instantly.
          </div>
          <div class="menuSection__inner-buttons" id="tabBtns">
            <button class="button button--border active" data-event="tabBtn" data-parent="#tabBtns">
              <span>Step 1</span>
            </button>
            <button class="button button--border" data-event="tabBtn" data-parent="#tabBtns">
              <span>Step 2</span>
            </button>
            <button class="button button--border" data-event="tabBtn" data-parent="#tabBtns">
              <span>Step 3</span>
            </button>
            <button class="button button--border" data-event="tabBtn" data-parent="#tabBtns">
              <span>Step 4</span>
            </button>
            <div class="menuSection__popup">
              Select the suitable background from the selection
            </div>
            <div class="menuSection__popup">
              Select the proper font, color and style from the next section
            </div>
            <div class="menuSection__popup">
              The choices and the text will appear on the right side.
            </div>
            <div class="menuSection__popup">
              If you are satisfied press "Convert Domain Name to NFT" button.
              In the next screen you will be able to mint your NFT.
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- section end -->
    <section class="createNft">
      <div class="autoContainer">
        <div class="createNft__bg">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="createNft__inner">
          <div class="createNft__inner-content">
            <h1 class="createNft__inner-content-title gradientTitle">
              <span>Convert Domain Name to NFT</span>
            </h1>
            <div class="createNft__inner-content-body">
              <div class="createNft__actions">
                <div class="createNft__actions-info">
                  <strong>Selected Domain Name: </strong>
                  <span>
                    <?php echo $name; ?>
                  </span>
                </div>
                <div class="createNft__actions-row">
                  <div class="createNft__actions-picker">
                    <h5 class="createNft__actions-title">
                      <span>Select background</span>
                    </h5>
                    <ul class="createNft__actions-picker-items">
                      <li class="active" data-event="changeBg" data-img="<?php echo $img1; ?>">
                        <div class="createNft__img ">
                          <img src="<?php echo $img1; ?>" alt="bg-1" />
                        </div>
                      </li>
                      <li data-event="changeBg" data-img="<?php echo $img2; ?>">
                        <div class="createNft__img ">
                          <img src="<?php echo $img2; ?>" alt="bg-2" />
                        </div>
                      </li>
                      <li data-event="changeBg" data-img="<?php echo $img3; ?>">
                        <div class="createNft__img ">
                          <img src="<?php echo $img3; ?>" alt="bg-3" />
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="createNft__actions-picker">
                    <h5 class="createNft__actions-title">
                      <span>Select Frame</span>
                    </h5>
                    <ul class="createNft__actions-picker-items">
                      <li class="active" data-event="changeFrame"
                        data-img="<?php echo $assetsFolder; ?>/images/nft-create/frames/circles.svg">
                        <div class="createNft__img">
                          <img src="<?php echo $assetsFolder; ?>/images/nft-create/frames/circles.svg" class="_small"
                            alt="" />
                        </div>
                      </li>
                      <li data-event="changeFrame"
                        data-img="<?php echo $assetsFolder; ?>/images/nft-create/frames/squares.svg">
                        <div class="createNft__img">
                          <img src="<?php echo $assetsFolder; ?>/images/nft-create/frames/squares.svg" class="_small"
                            alt="" />
                        </div>
                      </li>
                      <li data-event="changeFrame"
                        data-img="<?php echo $assetsFolder; ?>/images/nft-create/frames/hexagon.svg">
                        <div class="createNft__img">
                          <img src="<?php echo $assetsFolder; ?>/images/nft-create/frames/hexagon.svg" class="_small"
                            alt="" />
                        </div>
                      </li>
                    </ul>
                  </div>

                </div>
                <h5 class="createNft__actions-title _lg">
                  <span>Select Font & Styles</span>
                </h5>
                <div class="createNft__actions-buttons">
                  <button class="button button--border _icoLeft" id="increaseBtn">
                    <small class="button__ico _small">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z" />
                      </svg>
                    </small>
                    <span>Increase Font</span>
                  </button>
                  <button class="button button--border _icoLeft" id="decreaseBtn">
                    <small class="button__ico _small _flipY">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                          d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z" />
                      </svg>
                    </small>
                    <span>Decrease Font</span>
                  </button>
                  <button class="button button--border _select _icoLeft">
                    <input type="hidden" name="" id="fontFamily">
                    <small class="button__ico">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                          d="m2.244 13.081.943-2.803H6.66l.944 2.803H8.86L5.54 3.75H4.322L1 13.081h1.244zm2.7-7.923L6.34 9.314H3.51l1.4-4.156h.034zm9.146 7.027h.035v.896h1.128V8.125c0-1.51-1.114-2.345-2.646-2.345-1.736 0-2.59.916-2.666 2.174h1.108c.068-.718.595-1.19 1.517-1.19.971 0 1.518.52 1.518 1.464v.731H12.19c-1.647.007-2.522.8-2.522 2.058 0 1.319.957 2.18 2.345 2.18 1.06 0 1.716-.43 2.078-1.011zm-1.763.035c-.752 0-1.456-.397-1.456-1.244 0-.65.424-1.115 1.408-1.115h1.805v.834c0 .896-.752 1.525-1.757 1.525z" />
                      </svg>
                    </small>
                    <span class="button__selected">Select Font Family</span>
                    <ul class="button__dropdown">
                      <?php include('./fontFamilyList.php') ?>
                    </ul>
                  </button>
                  <button class="button button--border _icoLeft" id="colorBtn">
                    <small class="button__ico">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                          d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z" />
                      </svg>
                    </small>
                    <span>Select Color</span>
                  </button>
                  <button class="button button--border _icoLeft" id="underlineBtn">
                    <small class="button__ico">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                          d="M5.313 3.136h-1.23V9.54c0 2.105 1.47 3.623 3.917 3.623s3.917-1.518 3.917-3.623V3.136h-1.23v6.323c0 1.49-.978 2.57-2.687 2.57-1.709 0-2.687-1.08-2.687-2.57V3.136zM12.5 15h-9v-1h9v1z" />
                      </svg>
                    </small>
                    <span>Underline</span>
                  </button>
                  <button class="button button--border _icoLeft" id="italicBtn">
                    <small class="button__ico">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                          d="M7.991 11.674 9.53 4.455c.123-.595.246-.71 1.347-.807l.11-.52H7.211l-.11.52c1.06.096 1.128.212 1.005.807L6.57 11.674c-.123.595-.246.71-1.346.806l-.11.52h3.774l.11-.52c-1.06-.095-1.129-.211-1.006-.806z" />
                      </svg>
                    </small>
                    <span>Italic</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div class="createNft__inner-banner">
            <div class="createNft__inner-banner-img">
              <div class="createNft__img">
                <img src="<?php echo $assetsFolder; ?>/images/nft-create/backgrounds/bg-black-2.png" alt=""
                  id="nftBg" />
                <img src="<?php echo $assetsFolder; ?>/images/nft-create/frames/circles.svg" class="_small" alt=""
                  id="nftFrame" />
                <div class="createNft__img-text" id='nftText'>
                  <?php echo $name; ?>
                </div>
              </div>
            </div>
            <div class="createNft__inner-banner-buttons">
              <div class="button button--primary color--green" id="gotoNftBtn" style="width: -webkit-fill-available;">
                <span>Convert Domain Name to NFT</span>
              </div>
              <div class="button button--primary" id="gotoBuyBtn"
                style="margin-top: 20px;width: -webkit-fill-available;">
                <span>Continue to Buy</span>
              </div>
            </div>
            <canvas id="myCanvas" width="400" height="400" style="display:none;border:1px solid #000000;"></canvas>
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
            <a target="_blank" href="https://www.youtube.com/channel/UCar7eAlf_-mNxoRw0goJGQw" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/youtube.svg" alt="youtube" />
            </a>
            <a href="#" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/M.svg" alt="M" />
            </a>
            <a href="#" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/reddit.svg" alt="reddit" />
            </a>
            <a target="_blank" href="https://t.me/dominatordomains" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/telegram.svg" alt="telegram" />
            </a>
            <a target="_blank" href="https://twitter.com/DomDomDomains" class="iconButton">
              <img src="<?php echo $assetsFolder; ?>/images/icons/twitter.svg" alt="twitter" />
            </a>
          </div>
        </div>
      </div>
    </footer>
    <div style="display:none">
      <form name="gotoNftForm" enctype="multipart/form-data">
        <input name="domain" type="hidden" value="<?php echo $name ?>" />
        <input name="image" type="hidden" value="" />
      </form>
      <form name="gotoBuyForm">
        <input name="searchTerm" type="hidden" value="<?php echo $name ?>" />
        <input name="query" type="hidden" value="<?php echo $name ?>" />
      </form>
      <input id="where" type="hidden" value="<?php echo $where ?>" />
      <input id="domain" type="hidden" value="<?php echo $name ?>" />
    </div>
    <!-- footer end -->
    <script src="https://unpkg.com/vanilla-picker@2"></script>
    <script src="<?php echo $assetsFolder; ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/menu.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/editText.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/customSelect.js"></script>
    <script src="<?php echo $assetsFolder; ?>/js/script1.js"></script>
  </div>
</body>

</html>