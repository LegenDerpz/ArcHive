let logoutBtn = document.getElementById("logoutBtn");

logoutBtn.addEventListener("click", function(event){
    event.preventDefault();
    fetch('logout.php', {
        method: 'POST'
    })
    .then(response => {
        window.location.href = 'login.php';
    })
});