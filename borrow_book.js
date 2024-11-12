function borrowPrompt(bookId){
    fetch('borrow_book.php')
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById("borrow-container");
            container.innerHTML = data;
            document.getElementById('bookIdInput').value = bookId;
            document.getElementById('currentBookId').value = bookId;
            document.getElementById('currentBookTitle').textContent = document.getElementById(bookId+"-title").value;
            document.getElementById('currentBookImage').src = document.getElementById(bookId+"-image").value;
            document.getElementById('currentBookAuthor').textContent = "Author: " + document.getElementById(bookId+"-author").value;
            document.getElementById('currentBookDescription').textContent = document.getElementById(bookId+"-description").value;
            document.getElementById('currentBookGenre').textContent = "Genre: " + document.getElementById(bookId+"-genre").value;
            document.getElementById('currentBookPubDate').textContent = "Publication Date: " + document.getElementById(bookId+"-pubDate").value;
            document.getElementById('currentBookQuantity').textContent = "Available: " + document.getElementById(bookId+"-quantity").value;

        const closeButton = document.getElementById('borrowBtnCancel');
        if(closeButton){
            closeButton.addEventListener("click", () =>{
                container.innerHTML = "";
            });
        }
    })
    .catch(error => console.error(error));
}