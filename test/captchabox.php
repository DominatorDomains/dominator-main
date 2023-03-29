<div class="captcha" id="captcha">
    <div class="captcha__inner">
        <img src="<?php echo $assetsFolder; ?>/images/logo.svg" alt="" />
        <div class="cf-turnstile" data-sitekey="0x4AAAAAAADiMxLuTBnXAHly" data-callback="javascriptCallback"></div>
        <form action="#" method="POST" id="captchaForm">
            <input type="hidden" id="captchaInput" name="token">
        </form>
    </div>
</div>
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
<script>
    function javascriptCallback(token) {
        const captchaForm = document.getElementById('captchaForm');
        const captchaInput = document.getElementById('captchaInput');
        if (!token) {
            window.location.replace("https://dominator.domains/bot.php");
            return;
        }
        captchaInput.value = token;
        captchaForm.submit();
    }
</script>