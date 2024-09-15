function setCookie(key, value, expiry) {
    let expires = new Date();
    expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
    document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
    let keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
}

function eraseCookie(key) {
    let keyValue = getCookie(key);
    setCookie(key, keyValue, '-1');
}

$(document).ready(function (){

    let pn__wrapper = $(".public__notifications");
    if(pn__wrapper.length){
        if(getCookie("pn__") === null){
            pn__wrapper.removeClass('d-none');
        }

        $(".pn__visited").click(function (){
            setCookie('pn__',' visited', 3);
            pn__wrapper.addClass('d-none');
        });
        $(".pn__closed").click(function (){
            setCookie('pn__',' closed', 3);
            pn__wrapper.addClass('d-none');
        });
    }
});



// setCookie("notification", "accepted", 1);


// console.log(getCookie("notification"));
