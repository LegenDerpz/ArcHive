window.onload = function(){
    if(getActiveTab() == null || getActiveTab() == ''){
        document.getElementById("borrowedBooks").click();
    }else{
        document.getElementById(getActiveTab()).click();
    }
};
function openAccountTab(){
    
}
function setActiveTab(cookieName, cookieValue){
    document.cookie = cookieName + "=" + cookieValue + ";"
}
function getActiveTab(){
    let name = "activeAccountTab=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(";");
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}