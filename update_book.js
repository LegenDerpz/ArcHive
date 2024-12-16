function showUpdateForm(bookId){
    fetch('update_book.php')
        .then(response => response.text())
        .then(data => {
            const container = document.getElementById("update-container");
            container.innerHTML = data;
            
        setTimeout(() => {
            document.getElementById('bookIdInput').value = bookId;
            document.getElementById('updateTitle').value = document.getElementById(bookId+"-title-update").value;
            document.getElementById('updateFirstName').value = document.getElementById(bookId+"-firstName-update").value;
            document.getElementById('updateLastName').value = document.getElementById(bookId+"-lastName-update").value;
            document.getElementById('updateGenre').value = document.getElementById(bookId+"-genre-update").value;
            document.getElementById('updateDescription').value = document.getElementById(bookId+"-description-update").value;
            document.getElementById('updatePublicationDate').value = document.getElementById(bookId+"-publicationDate-update").value;
            document.getElementById('updateQuantity').value = document.getElementById(bookId+"-quantity-update").value;
        
        }, 100);

        const closeButton = document.getElementById("closeButton");
            
        if(closeButton){
            closeButton.addEventListener("click", () =>{
                container.innerHTML = "";
            });
        }
    })
    .catch(error => console.error(error));
}