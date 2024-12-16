<div id="addBooks" class="tabContent m-3 border border-neutral-300 p-4 rounded">
    <h3 class="mb-8 font-bold text-2xl">Add Books</h3>
    <form class="row g-3" action="add_book.php" method="POST" enctype="multipart/form-data">
        <div style="color: <?= isset($_SESSION['add_success']) ? 'green' : 'red' ?>;">
            <?php 
                if(isset($_SESSION['add_success'])){
                    echo $_SESSION['add_success'];
                    unset($_SESSION['add_success']);
                }else if(isset($_SESSION['add_error'])){
                    echo $_SESSION['add_error'];
                    unset($_SESSION['add_error']);
                }
            ?>
        </div>
        <div class="row">        
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputBookTitle" class="form-label">Title</label>
                    <input type="text" id="inputBookTitle" name="title" class="form-control" placeholder="Book Title" required>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="inputGenre" class="form-label">Genre</label>
                    <input type="text" id="inputGenre" name="genre" class="form-control" placeholder="Genre" required>
                </div>
            </div>
            <div class="col-md-12">
                <h5>Author</h5>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="inputAuthorFirstName" name="firstName" class="form-control" placeholder="First Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="inputAuthorLastName" name="lastName" class="form-control" placeholder="Last Name" required>
                </div>
            </div>
        </div>

        <div class="row">
    </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea class="form-control" id="inputDescription" name="description" placeholder="Enter description" rows="7"></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="inputQuantity" class="form-label">Quantity</label>
                <input type="number" id="inputQuantity" name="quantity" class="form-control" placeholder="Quantity">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="inputPublicationDate" class="form-label">Publication Date</label>
                <input type="date" id="inputPublicationDate" name="publicationDate" class="form-control" placeholder="Publication Date">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="inputBookImage" class="form-label">Thumbnail</label>
                <input type="file" id="inputBookImage" name="bookImage" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">Add Book</button>
        </div>
    </form>
    </div>

