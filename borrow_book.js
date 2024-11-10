function borrowPrompt(bookId){
    fetch('borrow_book.php')
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById("borrow-container");
            container.innerHTML = data;
            document.getElementById('bookIdInput').value = bookId;
            document.getElementById('currentBookId').value = bookId;

        const closeButton = document.getElementById('borrowBtnCancel');
        if(closeButton){
            closeButton.addEventListener("click", () =>{
                container.innerHTML = "";
            });
        }
    })
    .catch(error => console.error(error));
}