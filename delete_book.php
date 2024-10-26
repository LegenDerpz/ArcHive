<?php
    require_once 'config/db_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $bookId = $_POST['bookId'];

        $deleteQuery = "DELETE FROM book WHERE id = '$bookId'";
        $deleteResult = mysqli_query($conn, $deleteQuery); 

        header("Location: books.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Book</title>
    <link rel="stylesheet" href="css/delete_book.css">
</head>
<body>
    <div id="delete-background" class="delete-background">
        <div id="delete-container" class="delete-container">
            <h2 class="delete-header">DELETE</h2><br>
            <p>Are you sure you want to delete this book?</p><br>
            <form action="delete_book.php" method="POST" class="delete-form">
                <input type="hidden" name="bookId" id="bookIdInput">
                <input type="submit" value="YES" class="delete-btn" id="deleteBtnYes">
                <input type="button" value="NO" class="delete-btn" id="deleteBtnNo">
            </form>
        </div>
    </div>
</body>
</html>