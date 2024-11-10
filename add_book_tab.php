<div id="addBooks" class="tabContent m-3">
    <h3>Add Books</h3>
    <form action="add_book.php" method="POST" enctype="multipart/form-data">
        <label>Title</label><br>
        <input type="text" id="inputBookTitle" name="title" placeholder="Book Title" required><br><br>
        <label>Author</label><br>
        <input type="text" id="inputAuthorFirstName" name="firstName" placeholder="First Name" required><br>
        <input type="text" id="inputAuthorLastName" name="lastName" placeholder="Last Name" required><br><br>
        <label>Genre</label><br>
        <input type="text" id="inputGenre" name="genre" placeholder="Genre"><br><br>
        <label>Quantity</label><br>
        <input type="number" id="inputQuantity" name="quantity" placeholder="Quantity"><br><br>
        <label>Publication Date</label><br>
        <input type="date" id="inputPublicationDate" name="publicationDate" placeholder="Publication Date"><br><br>
        <label>Thumbnail</label><br>
        <input type="file" id="inputBookImage" name="bookImage" accept="image/png, image/jpeg, image/jpg"><br><br>
        <input type="submit" value="Add Book">
    </form>
</div>