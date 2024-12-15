window.onload = function(){
    setTimeout(() => {
        document.getElementById('sidebar-button').click();
    }, 300);

    if((getActiveTab("activeTab") == null || getActiveTab("activeTab") == '') && (getActiveTab("activeAccountTab") == null || getActiveTab("activeAccountTab") == '')){
        setActiveTab("activeTab", "browseTab");
        setActiveTab("activeAccountTab", "borrowedBooksTab");

        if(document.getElementById("browseTab")){
            setActiveTab("activeTab", "browseTab");
            document.getElementById("browseTab").click();
        }else{
            setActiveTab("activeAccountTab", "borrowedBooksTab");
            document.getElementById("borrowedBooksTab").click();
        }
    }else if(getActiveTab("activeTab") == null || getActiveTab("activeTab") == ''){
        setActiveTab("activeTab", "browseTab");
        document.getElementById("browseTab").click();
    }else if(getActiveTab("activeAccountTab") == null || getActiveTab("activeAccountTab") == ''){
        setActiveTab("activeTab", "browseTab");
        document.getElementById("borrowedBooksTab").click();
    }else{
        if(document.getElementById("browseTab")){
            document.getElementById(getActiveTab("activeTab")).click();
        }else{
            document.getElementById(getActiveTab("activeAccountTab")).click();
        }
    }
};

function openTab(evt, tabName, tabId, pageName){
    var i, tabContent, tabLink;

    tabContent = document.getElementsByClassName("tabContent");
    for(i = 0; i < tabContent.length; i++){
        tabContent[i].style.display = "none";
    }

    tabLink = document.getElementsByClassName("tabLink");
    for(i = 0; i < tabLink.length; i++){
        tabLink[i].className = tabLink[i].className.replace(" active", "");
    }

    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";

    if(pageName == 'booksPage'){
        setActiveTab("activeTab", tabId);
    }else if(pageName == 'accountPage'){
        setActiveTab("activeAccountTab", tabId);
    }else{
        setActiveTab("activeTab", tabId);
    }
}

function setActiveTab(cookieName, cookieValue){
    document.cookie = cookieName + "=" + cookieValue + ";"
}

function getActiveTab(cookieName){
    let name = cookieName + "=";
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