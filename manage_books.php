<?php
    require_once 'db_config.php';
    require_once 'search_books.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Books</title>
    <link rel="stylesheet" href="global.css">
    <link rel="stylesheet" href="manage_books.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="tab">
        <a href="admin_dashboard.php"><button class="tabLink">Home</button></a>
        <button class="tabLink" onclick="openTab(event, 'addBooks')" id="defaultOpen">Add</button>
        <button class="tabLink" onclick="openTab(event, 'updateBooks')" id="updateTab">Manage Books</button>
    </div>

    <div id="addBooks" class="tabContent m-3">
        <h3>Add Books</h3>
        <form action="add_book.php" method="POST">
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
            <input type="submit" value="Add Book">
        </form>
    </div>

    <div id="updateBooks" class="tabContent col-sm-6 m-3">
        <h3>Manage Books</h3>
        <form action="manage_books.php" method="GET">
            <input type="text" id="searchBook" name="searchBook" placeholder="Search book">
            <input type="submit" value="Search">
        </form>
        <?php
            if($bookSearchResult->num_rows == 0){
                echo 'No results found.';
            }
        ?>
        <br>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Date</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($bookSearchResult)){
                        while($row = mysqli_fetch_array($bookSearchResult)){?>
                            <tr>
                                <td><?=$row['title']?></td>
                                <td><?=$row['firstName']." ". $row['lastName']?></td>
                                <td><?=$row['genre']?></td>
                                <td><?=$row['publicationDate']?></td>
                                <td><?=$row['quantity']?></td>
                                <td><input type="submit" value="UPDATE" onclick="showUpdateForm('<?= $row['id']; ?>')"></td>
                                <td><input type="submit" value="DELETE" onclick="deletePrompt('<?= $row['id']; ?>')"></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
        <div id="update-container"></div>
        <div id="delete-container"></div>
    </div>
    <script src="update_book.js"></script>
    <script src="delete_book.js"></script>
    <script src="manage_books.js"></script>
</body>
</html>