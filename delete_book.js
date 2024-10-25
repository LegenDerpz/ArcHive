function deletePrompt(bookId){
    fetch('delete_book.php')
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById("delete-container");
            container.innerHTML = data;
            document.getElementById('bookIdInput').value = bookId;
        
        const closeButton = document.getElementById('deleteBtnNo');
        if(closeButton){
            closeButton.addEventListener("click", () =>{
                container.innerHTML = "";
            });
        }
    })
    .catch(error => console.error(error));
}