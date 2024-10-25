<?php
    require_once 'db_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $updateTitle = $_POST['updateTitle'];
        $updateFirstName = $_POST['updateFirstName'];
        $updateLastName = $_POST['updateLastName'];
        $updateGenre = $_POST['updateGenre'];
        $updatePublicationDate = $_POST['updatePublicationDate'];
        $updateQuantity = $_POST['updateQuantity'];

        $updateQueryStart = "UPDATE book SET ";

        $updates = [];
        $bookId = $_POST['bookId'];

        if($updateTitle !== ''){$updates[] = "title = '$updateTitle'";}
        if($updateGenre !== ''){$updates[] = "genre = '$updateGenre'";}
        if($updatePublicationDate !== ''){$updates[] = "publicationDate = '$updatePublicationDate'";}
        if($updateQuantity !== ''){$updates[] = "quantity = '$updateQuantity'";}
        
        if($updateFirstName !== '' && $updateLastName !== ''){
            $checkAuthorQuery = "SELECT * FROM authors WHERE firstName = '$updateFirstName' AND lastName = '$updateLastName'";
            $checkAuthorResult = mysqli_query($conn, $checkAuthorQuery);

            if($checkAuthorResult->num_rows > 0){
                $authorRow = $checkAuthorResult->fetch_assoc();
                $authorId = $authorRow['id'];
            }else{
                $addNewAuthorQuery = "INSERT INTO authors (firstName, lastName)
                                VALUES ('$updateFirstName', '$updateLastName');";

                $addNewAuthorResult = mysqli_query($conn, $addNewAuthorQuery);
                $checkAuthorResult = mysqli_query($conn, $checkAuthorQuery);

                $authorRow = $checkAuthorResult->fetch_assoc();
                $authorId = $authorRow['id'];
            }

            $updates[] = "authorId = '$authorId'";

        }

        if(!empty($updates)){
            $updateQuery = $updateQueryStart . implode(", ", $updates) . " WHERE id = '$bookId'";
            $updateResult = mysqli_query($conn, $updateQuery);
        }

        header("Location: manage_books.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link rel="stylesheet" href="update_book.css">
</head>
<body>
    <div id="update-background" class="update-background">
        <div id="update-container" class="update-container">
            <button class="close">x</button>
            <h2 class="update-header">Update Book</h2><br><br>
            <form action="update_book.php" method="POST">
                <input type="hidden" name="bookId" id="bookIdInput">
                <label>Title</label><br>
                <input type="text" name="updateTitle" placeholder="Title"><br><br>
                <label>Author</label><br>
                <input type="text" name="updateFirstName" placeholder="First Name"><br>
                <input type="text" name="updateLastName" placeholder="Last Name"><br><br>
                <label>Genre</label><br>
                <input type="text" name="updateGenre" placeholder="Genre"><br><br>
                <label>Quantity</label><br>
                <input type="number" name="updateQuantity" min="0" placeholder="Quantity"><br><br>
                <label>Publication Date</label><br>
                <input type="date" name="updatePublicationDate"><br><br>
                <input type="submit" class="updateBtn" value="Update">
            </form>
        </div>
    </div>
</body>
</html>