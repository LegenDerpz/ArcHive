<?php
    require_once 'config/db_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $addTitle = $_POST['title'];
        $addAuthorFirstName = $_POST['firstName'];
        $addAuthorLastName = $_POST['lastName'];
        $addGenre = $_POST['genre'];
        $addQuantity = $_POST['quantity'];
        $addPubDate = $_POST['publicationDate'];

        $checkAuthorQuery = "SELECT * FROM authors WHERE firstName = '$addAuthorFirstName' AND lastName = '$addAuthorLastName'";
        $checkAuthorResult = mysqli_query($conn, $checkAuthorQuery);

        //Check if author already exists. If not, add new author.
        if($checkAuthorResult && $checkAuthorResult->num_rows > 0){
            $authorRow = $checkAuthorResult->fetch_assoc();
            $authorId = $authorRow['id'];
        }else{
            $addNewAuthorQuery = "INSERT INTO authors (firstName, lastName)
                                VALUES ('$addAuthorFirstName', '$addAuthorLastName');";

            $addNewAuthorResult = mysqli_query($conn, $addNewAuthorQuery);
            $checkAuthorResult = mysqli_query($conn, $checkAuthorQuery);

            $authorRow = $checkAuthorResult->fetch_assoc();
            $authorId = $authorRow['id'];
        }
        //

        $addBookQuery = "INSERT INTO book (title, authorId, genre, quantity, publicationDate)
                        VALUES ('$addTitle', '$authorId', '$addGenre', '$addQuantity', '$addPubDate');";
        
        if(!mysqli_query($conn, $addBookQuery)){
            die("Unable to insert new book.");
        }

        header("Location: books.php");
    }
?>