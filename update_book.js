function showUpdateForm(bookId){
    fetch('update_book.php')
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById("update-container");
            container.innerHTML = data;
            document.getElementById('bookIdInput').value = bookId;
        
        const closeButton = document.querySelector(".close");
        if(closeButton){
            closeButton.addEventListener("click", () =>{
                container.innerHTML = "";
            });
        }
    })
    .catch(error => console.error(error));
}