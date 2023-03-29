$(document).ready(function() {
    $("#gotoNftBtn").on("click", (e)=>{
        let domain = $("#domain").val();
        var canvas = document.getElementById("myCanvas");
        var ctx = canvas.getContext("2d");
        var imgbg = document.getElementById("nftBg");
        ctx.drawImage(imgbg, 0, 0);
        var imgfrm = document.getElementById("nftFrame");
        ctx.scale(0.7, 0.7);
        ctx.drawImage(imgfrm, 85.7142, 85.7142);
        ctx.scale(1.4285, 1.4285);
        ctx.fillStyle = $(nftText).css("color");
        if($(nftText).css("text-decoration").indexOf('underline') > -1){
            underline(ctx, domain, canvas.width/2, canvas.height/2, 1, $(nftText).css("color"), 1, 2);
        }
        ctx.font = (($(nftText).css("font-style")=="normal")?"":($(nftText).css("font-style"))) + " " + $(nftText).css("font-size") + " " + $(nftText).css("font-family").split(',')[0];
        ctx.textAlign = "center";
        ctx.fillText(domain, canvas.width/2, canvas.height/2);
        const file = canvas.toDataURL("image/png");
        var formData = new FormData();
        formData.append("file", file);
        $.ajax({
            url: '../api/upload.php',
            type: 'POST',
            data: formData,
            async: false,
            cache: false,
            contentType: false,
            enctype: 'multipart/form-data',
            processData: false,
            success: function (response) {
                const res = JSON.parse(response);
                if(res.result == "ok"){
                    const url = res.url;
                    let form = document.getElementsByName("gotoNftForm")[0];
                    form.domain.value = domain;
                    form.image.value = url;
                    form.method = "POST";
                    form.action = "../airdrop/index.php";
                    form.submit();
                }else{
                   // alert(res.error);
                }
            },
            error: function (error) {
              //  alert(error);
            }
        });
    });
    $("#gotoBuyBtn").on("click", (e)=>{
        let form = document.getElementsByName("gotoBuyForm")[0];
        let domain = $("#domain").val();
        form.searchTerm.value = domain;
        form.query.value = domain;
        form.target = "_blank";
        form.method = "GET";
        if($("#where").val() == 'ud'){
            form.action = "https://unstoppabledomains.com/search";
        }else if($("#where").val() == 'si'){
            form.action = "https://space.id/search";
        }else{
            form.action = "https://unstoppabledomains.com/search";
        }
        form.submit();
    });
    $("#gotoNftBtnDownload").on("click", (e)=>{
        window.location.href = "https://nft.dominator.domains/assetcreate/6/" + $("#domain-send").val() + "/" + $("#image-send").val();
    });
});

var underline = function(ctx, text, x, y, size, color, thickness ,offset){
    var width = ctx.measureText(text).width;
    switch(ctx.textAlign){
      case "center":
      x -= (width/2); break;
      case "right":
      x -= width; break;
    }
    y += size + offset;
    ctx.beginPath();
    ctx.strokeStyle = color;
    ctx.lineWidth = thickness;
    ctx.moveTo(x,y);
    ctx.lineTo(x + width,y);
    ctx.stroke();
  
}