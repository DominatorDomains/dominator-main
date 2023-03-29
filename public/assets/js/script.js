$(document).ready(function() {
    const filter = [
        ".arb",
        ".eth",
        ".bnb",
        ".bitcoin",
        ".polygon",
        ".crypto",
        ".blockchain",
        ".nft",
        ".dao",
        ".wallet",
    ];
    const searchDomain = (keyword, isAI = false) => {
        showLoading(true);
        $("#search-result-panel").html("");
        $("li._no-results").css("display", "none");
        if(keyword !== ""){
            $.post("api/search.php", {
                keyword: keyword,
                type:((isAI === true)?"ai":"normal"),
            },
            function(data) {
                const json = JSON.parse(data);
                const ud = json.ud;
                const si = json.si;
                let html = "";
                let items = (ud?ud:(new Array())).concat(si?si:new Array());
                items = items.filter((item)=>{
                    let exist = false;
                    filter.forEach((names)=>{
                        if(item.name.indexOf(names) >= 0){
                            exist = true;
                        }
                    });
                    return exist;
                });
                items.sort((item1, item2)=>{
                    let index1 = -1;
                    let index2 = -1;
                    filter.forEach((names, index)=>{
                        if(item1.name.indexOf(names) >= 0){
                            index1 = index;
                        }
                    });
                    filter.forEach((names, index)=>{
                        if(item2.name.indexOf(names) >= 0){
                            index2 = index;
                        }
                    });
                    console.log(index1, index2, index1 - index2);
                    return index1 - index2;
                });
                showLoading(false);
                if(items.length > 0){
                    for(let i=0; i<items.length; i++){
                        let item = items[i];
                        html += getUDItemHTML(item.name, item.price, item.where);
                    }
                    $("#search-result-panel").html(html);
                    $("li._no-results").css("display", "none");
                }else{
                    $("li._no-results").css("display", "block");
                }
                refreshCartCount();
            });
        }else{
            showLoading(false);
        }
        refreshCartCount();
        $("li._no-results").css("display", "block");
    };

    
    const showLoading = (show = false) => {
        if(show === true){
            $("#loading").css("display", "block");
        }else if(show === false){
            $("#loading").css("display", "none");
        }else{
            $("#loading").css("display", "none");
        }
    };

    const getUDItemHTML = (name = "", price = 0, where = "") => {
        if(price < 0){
            price = 0;
        }
        let html = "";
        html += '<li class="searchSection__results-item">';
        html += '<span class="_ico">';
        html += '<img src="tick2.svg" alt="✔️">';
        html += '</span>';
        html += '<div>';
        html += '<span>' + name + '</span>';
        html += '</div>';
        html += '<div>';
        html += '<span class="_hidden">Price </span>';
        html += '<span>$' + price + '</span>';
        html += '</div>';
        html += '<div class="_action">';
        html += '<button id="' + name.replace(".", "") + '" class="button button--primary" onClick="domainToggle(\'' + name + '\', \'' + where + '\')">';
        html += '<span>Select Domain</span>';
        html += '</button>';
        html += '</div>';
        // html += '<div class="_action">';
        // html += '<button class="button button--primary" onClick="convertDomainToNFT(\'' + name + '\')">';
        // html += '<span>Convert Domain to NFT</span>';
        // html += '</button>';
        // html += '</div>';
        html += '</li>';
        return html;
    };
    $("#normal-search-button").on('click', (e)=>{
        const keyword = $("#keyword-input").val();
        searchDomain(keyword, false);
    });
    $("#ai-search-button").on('click', (e)=>{
        const keyword = $("#keyword-input").val();
        searchDomain(keyword, true);
    });
    $("#continue-to-cart").on('click',(e)=>{
        if(getCartCount() <= 0){
            alert("No selected domain");
            return;
        }
        let form = document.getElementsByName("continueForm")[0];
        form.method = "POST";
        form.domain.value = getAllDomainJson()[0].name;
        form.where.value = getAllDomainJson()[0].where;
        form.action = "./convert/index.php";
        resetCart();
        form.submit();
    });
    resetCart();
    searchDomain($("#keyword-input").val());
});

const domainToggle = (name = "", where = "") => {
    let cart = getAllDomainJson();
    let idn = cart.findIndex((item)=>{
        return item.name === name;
    });
    insertDomain({name:name, where:where});
    refreshCartCount();
};

const refreshCartCount = () => {
    const name = getFirstDomain().name;
    if (name === "" || name === undefined){
        $("#cart-count-parent").html('');
        $("#cart-count-label").html('');
    }else{
        $("#cart-count-parent").html('<span class="cart-count">' + name + '</span>');
        $("#cart-count-label").html('<div class="selected-domain-label">Selected Domain</div>');
    }
};
