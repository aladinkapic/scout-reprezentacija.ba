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

console.log(getCookie("notification"));
setCookie("notification", "accepted", 1);


console.log(getCookie("notification"));
