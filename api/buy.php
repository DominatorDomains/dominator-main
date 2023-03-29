<?php
    $assetsFolder = '../public/assets/';
    $name = 'Smash22.arb';
    $postList = "";
    if(isset($_POST['domainList'])){
        $postList = $_POST['domainList'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo $assetsFolder; ?>css/main1.css" />
    <link rel="icon" href="<?php echo $assetsFolder; ?>images/logo-icon.svg">
    <title>DOMINATOR.DOMAINS | Search Domain</title>
  </head>

  <body>
    <div class="mainContainer">
      <!-- header start -->
      <header class="headerSection">
        <div class="autoContainer">
          <div class="headerSection__inner">
            <div class="headerSection__inner-logo">
              <img src="<?php echo $assetsFolder; ?>images/logo.svg" alt="" />
            </div>
            <div class="headerSection__inner-group">
              <a href="../index.php" class="button button--primary _xlg"
                ><span>Back</span></a
              >
            </div>
          </div>
        </div>
      </header>
      <!-- header end -->
      <!-- section start -->
      <section class="createNft">
        <div class="autoContainer">
          <div class="createNft__bg">
            <span></span>
            <span></span>
            <span></span>
          </div>
          <div class="createNft__inner">
            <div class="createNft__inner-content _center">
              <h1 class="createNft__inner-content-title gradientTitle">
                <span>Confirm Your Domain Details</span>
              </h1>
              <div class="createNft__inner-content-body">
                <div class="createNft__actions">
                  <div class="createNft__actions-info">
                    <strong>Selected Domain Name: </strong>
                    <span id="selectedDomainList"></span>
                  </div>
                </div>
              </div>
              <div class="createNft__inner-content-footer">
                <button class="button button--primary _xlg" id="continueToBuy">
                  <span>Continue to Buy</span>
                </button>
                <button class="button button--primary _xlg" id="convertDomainsToNft">
                  <span>Convert Domain to NFT</span>
                </button>
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
              <img src="<?php echo $assetsFolder; ?>images/footer-bg.svg" alt="" />
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
                <img src="<?php echo $assetsFolder; ?>images/icons/git.svg" alt="git" />
              </a>
              <a href="#" class="iconButton">
                <img src="<?php echo $assetsFolder; ?>images/icons/insta.svg" alt="insta" />
              </a>
              <a href="#" class="iconButton">
                <img src="<?php echo $assetsFolder; ?>images/icons/M.svg" alt="M" />
              </a>
              <a href="#" class="iconButton">
                <img src="<?php echo $assetsFolder; ?>images/icons/reddit.svg" alt="reddit" />
              </a>
              <a href="#" class="iconButton">
                <img src="<?php echo $assetsFolder; ?>images/icons/telegram.svg" alt="telegram" />
              </a>
              <a href="#" class="iconButton">
                <img src="<?php echo $assetsFolder; ?>images/icons/twitter.svg" alt="twitter" />
              </a>
            </div>
          </div>
        </div>
      </footer>
      <div style="display:none">
        <form name="continueForm">
            <input type="hidden" name="searchTerm"/>
            <input type="hidden" name="query"/>
        </form>
        <form name="convertDomainForm">
            <input type="hidden" name="domain"/>
        </form>
        <input type="hidden" id="domainList" value='<?php echo $postList; ?>' />
      </div>
      <!-- footer end -->
      <script src="<?php echo $assetsFolder; ?>js/jquery-3.6.0.min.js"></script>
      <script src="<?php echo $assetsFolder; ?>js/script1.js"></script>
    </div>
  </body>
</html>
