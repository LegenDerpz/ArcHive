<div id="addBooks" class="tabContent m-3 border border-neutral-300 p-4 rounded">
    <h3 class="mb-8 font-bold text-2xl">Add Books</h3>
    <form class="flex flex-row gap-8" action="add_book.php" method="POST" enctype="multipart/form-data">
        <div>
            <div>
                <label>Title</label><br>
                <input type="text" id="inputBookTitle" name="title" placeholder="Book Title" required><br><br>
        </div>
            <div>
                <label>Author</label><br>
                <input type="text" id="inputAuthorFirstName" name="firstName" placeholder="First Name" required><br>
                <input type="text" id="inputAuthorLastName" name="lastName" placeholder="Last Name" required><br><br>
            </div>
        <div>
            <label>Genre</label><br>
            <input type="text" id="inputGenre"  name="genre" placeholder="Genre"><br><br>
        </div>
        </div>
        <div>
            <div>
                <label>Description</label><br>
                <textarea class="border border-neutral-300" id="inputDescription" name="description" placeholder="Enter description" rows="7" cols="40"></textarea><br><br>
            </div>
            <div>
                <label>Quantity</label><br>
                <input type="number" id="inputQuantity" name="quantity" placeholder="Quantity"><br><br>
            </div>
            <div>
                <label>Publication Date</label><br>
                <input type="date" id="inputPublicationDate" name="publicationDate" placeholder="Publication Date"><br><br>
            </div>
            <div>
                <label>Thumbnail</label><br>
                <input type="file" id="inputBookImage" name="bookImage" accept="image/png, image/jpeg, image/jpg"><br><br>
            </div>
        </div>
    </form>
    <input type="submit" value="Add Book">

</div>