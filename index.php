<?php
  // Allow from any origin
  if(isset($_SERVER["HTTP_ORIGIN"]))
  {
      // You can decide if the origin in $_SERVER['HTTP_ORIGIN'] is something you want to allow, or as we do here, just allow all
      header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
  }
  else
  {
      //No HTTP_ORIGIN set, so we allow any. You can disallow if needed here
      header("Access-Control-Allow-Origin: *");
  }

  header("Access-Control-Allow-Credentials: true");
  header("Access-Control-Max-Age: 600");    // cache for 10 minutes

  if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
  {
      if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
          header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT"); //Make sure you remove those you do not want to support

      if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
          header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

      //Just exit with 200 OK with the above headers for OPTIONS method
      exit(0);
  }
  $assetsFolder = './public/assets/';
  $keyword = "";
  if(isset($_GET['keyword'])){
    $keyword = $_GET['keyword'];
  }else if(isset($_GET['image'])){
    $filename = $_GET['image'];
    $filepath = "./public/upload/" . $filename;
    $fp = fopen($filepath, "r");
    $fcontent = fread($fp, filesize($filepath));
    echo $fcontent;
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="<?php echo $assetsFolder; ?>images/logo-icon.svg">
  <link rel="stylesheet" href="<?php echo $assetsFolder; ?>css/main.css" />
  <link rel="stylesheet" href="<?php echo $assetsFolder; ?>css/custom.css" />
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
              <img src="<?php echo $assetsFolder; ?>images/logo.svg" alt="" id="logo" />
            </a>
          </div>
          <div class="headerSection__inner-group">
            <a href="https://www.pinksale.finance/private-sale/0xb356Ffc9DFdEb0f322E8187a07b1199a0831b83a/1?chain=Arbitrum" target="_blank" class="button button--primary _xlg animated">
              <span>Buy Private Sale (15% Off)</span>
            </a>
          </div>
        </div>
      </div>
    </header>
    <!-- header end -->
    <!-- section start -->
    <section class="searchSection">
      <div class="autoContainer">
        <div class="searchSection__bg">
          <span></span>
          <span></span>
          <span></span>
          <div class="searchSection__bg-img">
            <img src="<?php echo $assetsFolder; ?>images/earth.png" alt="" />
          </div>
        </div>
        <div class="searchSection__search">
          <div class="input">
            <input type="text" id="keyword-input" value="<?php echo $keyword; ?>"
              placeholder="Type your desired domain" />
            <span class="input__shadow"></span>
            <div class="input__helper">
              <a href="#" class="textLink">.arb</a>
              <span>/</span>
              <a href="#" class="textLink">.eth</a>
              <span>/</span>
              <a href="#" class="textLink">.bnb</a>
              <span>/</span>
              <a href="#" class="textLink">.bitcoin</a>
              <span>/</span>
              <a href="#" class="textLink">.polygon</a>
              <span>/</span>
              <a href="#" class="textLink">.crypto</a>
              <span>/</span>
              <a href="#" class="textLink">.blockchain</a>
              <span>/</span>
              <a href="#" class="textLink">.nft</a>
              <span>/</span>
              <a href="#" class="textLink">.dao</a>
              <span>/</span>
              <a href="#" class="textLink">.wallet</a>
            </div>
          </div>
          <button id="normal-search-button" class="button button--primary button--shadow _lg">
            <span>Search Domain</span>
          </button>
          <button id="ai-search-button" class="button button--primary button--shadow _lg">
            <span>AI Suggested Search</span>
          </button>
        </div>
        <div class="searchSection__search" style="padding-bottom: 10px;margin-bottom: 10px;align-items: baseline;">
          <div class="input" style="margin-bottom: 0px;" id="cart-count-label">

          </div>
          <button id="cart-count-parent" class="button button--primary button--shadow _lg selected-domain-name">

          </button>
          <button id="continue-to-cart" class="button button--primary button--shadow _lg">
            <span>
              Continue to Buy
            </span>
          </button>
        </div>
        <div class="searchSection__results">
          <ul>
            <li class="searchSection__results-item _header">
              <span class="_ico">
                <img src="tick2.svg" alt="✔️" />
              </span>
              <div>Suggested Names</div>
              <div>Price</div>
              <div class="_action">Buy Now</div>
              <!-- <div class="_action">NFT Conversion</div> -->
            </li>
            <div id="search-result-panel">

            </div>
            <div id="loading" class="searchSection__results-item _no-results">
              <svg width="32" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="animate-spin">
                <path opacity="0.5"
                  d="M10 0C8.02219 0 6.08879 0.58649 4.4443 1.6853C2.79981 2.78412 1.51809 4.3459 0.761209 6.17316C0.00433284 8.00042 -0.1937 10.0111 0.192152 11.9509C0.578004 13.8907 1.53041 15.6725 2.92894 17.0711C4.32746 18.4696 6.10929 19.422 8.0491 19.8078C9.98891 20.1937 11.9996 19.9957 13.8268 19.2388C15.6541 18.4819 17.2159 17.2002 18.3147 15.5557C19.4135 13.9112 20 11.9778 20 10C20 8.68678 19.7413 7.38642 19.2388 6.17316C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761204C12.6136 0.258658 11.3132 0 10 0V0ZM10 18C8.41775 18 6.87103 17.5308 5.55544 16.6518C4.23985 15.7727 3.21447 14.5233 2.60897 13.0615C2.00347 11.5997 1.84504 9.99112 2.15372 8.43928C2.4624 6.88743 3.22433 5.46196 4.34315 4.34314C5.46197 3.22432 6.88743 2.4624 8.43928 2.15372C9.99113 1.84504 11.5997 2.00346 13.0615 2.60896C14.5233 3.21446 15.7727 4.23984 16.6518 5.55544C17.5308 6.87103 18 8.41775 18 10C18 12.1217 17.1571 14.1566 15.6569 15.6568C14.1566 17.1571 12.1217 18 10 18V18Z"
                  fill="#7E9195"></path>
                <path
                  d="M18 10H20C20 8.68678 19.7413 7.38642 19.2388 6.17317C18.7362 4.95991 17.9997 3.85752 17.0711 2.92893C16.1425 2.00035 15.0401 1.26375 13.8268 0.761205C12.6136 0.258658 11.3132 0 10 0V2C12.1217 2 14.1566 2.84285 15.6569 4.34315C17.1571 5.84344 18 7.87827 18 10Z"
                  fill="currentColor"></path>
              </svg>
            </div>
            <li class="searchSection__results-item _no-results">
              <span class="title">
                No Results
              </span>
            </li>
          </ul>
        </div>
      </div>
    </section>
    <!-- section end -->
    <!-- section start -->
    <section class="faqSection">
      <div class="autoContainer">
        <div class="faqSection__bg">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="faqSection__inner">
          <div class="faqSection__inner-title">
            <h3><span>Frequent Questions</span></h3>
          </div>
          <div class="faqSection__inner-tabs">
            <ul class="faqSection__inner-tabs-column">
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  How do I buy DomDom?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  DomDom is listed in a couple of centralized exchanges.
                  Will announce the details soon. DomDom is also listed
                  on Uniswap on Arbitrum. Link to the pair is :
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Is DomDom audited?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  Yes, DomDom contract is audited by AuditAce a PinkSale approved Audit company. DomDom passed Audit
                  with 100% pass. Please visit the link here
                  https://github.com/Audit-Ace/Audits-Smart-Contracts/blob/main/Dominator%20Domain%20Audit%20Report.pdf
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Whats the IDO Market Cap of DomDom?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  $500,000 or 500 thousand dollars
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Whats the Fully Diluted Market Cap of DomDom?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  $1 MIllion
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  How do I get ETH Rewards?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  DomDom distributes ETH rewards from the NFT Marketplace revenue to all DomDom holders in Ether.
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Does DomDom has a fixed token supply?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  Yes DomDom has a fixed supply of 500 Million DomDom. No more tokens can be minted. Or no mint function
                  in the contract.
                </div>
              </li>
            </ul>
            <ul class="faqSection__inner-tabs-column">
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Is there an expiry date for registered domains?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  For some blockchains, there are expiry dates. Ether and Arbitrum has expiry dates. Polygon chain dont
                  have expiry dates.
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  What is the circulating supply of DomDom?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  75% of the tokens are in circulation, which is 375 Million DomDom
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Are team tokens vested?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  Yes team tokens are vested for 1 to 2 years. One year cliff and liner vesting for next 12 months
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  If i convert my Domain name to NFT does the NFT expires?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  No NFT never expires. You can resell them as well.
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Are mobile Apps Live? Can I use them?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  Yes Mobile Apps are live. You can download it from Google Play store. IOS version is still under
                  approval.
                </div>
              </li>
              <li class="faqSection__tab">
                <div class="faqSection__tab-header tabEvent">
                  Is there a buy or sell Tax for DomDom?
                  <span class="_ico"></span>
                </div>
                <div class="faqSection__tab-body">
                  There is no Buy Tax. Sell Tax is Max 2.99%
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- section end -->
    <!-- footer end -->
    <footer class="footerSection">
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
    <div style="display:none">
      <form name="continueForm">
        <input type="hidden" name="domain" />
        <input type="hidden" name="where" />
      </form>
    </div>
    <!-- footer end -->
    <script src="<?php echo $assetsFolder; ?>js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $assetsFolder; ?>js/menu.js"></script>
    <script src="<?php echo $assetsFolder; ?>js/tabs.js"></script>
    <script src="<?php echo $assetsFolder; ?>js/storage.js"></script>
    <script src="<?php echo $assetsFolder; ?>js/script.js"></script>
  </div>
</body>

</html>