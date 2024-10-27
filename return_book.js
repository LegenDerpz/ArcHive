function returnPrompt(borrowId, bookId){
    fetch('return_book.php')
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById("return-container");
            container.innerHTML = data;
            document.getElementById('bookIdInput').value = bookId;
            document.getElementById('borrowIdInput').value = borrowId;
            console.log(borrowId);
            console.log(bookId);
        
        const closeButton = document.getElementById('returnBtnCancel');
        if(closeButton){
            closeButton.addEventListener("click", () =>{
                container.innerHTML = "";
            });
        }
    })
    .catch(error => console.error(error));
}