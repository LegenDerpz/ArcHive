<?php
    require_once 'config/db_config.php';

    $target_dir = $_ENV['IMAGE_LOCATION'];
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $addTitle = $_POST['title'];
        $addAuthorFirstName = $_POST['firstName'];
        $addAuthorLastName = $_POST['lastName'];
        $addGenre = $_POST['genre'];
        $addDescription = $_POST['description'];
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

        $addBookQuery = "INSERT INTO book (title, authorId, genre, quantity, publicationDate, description)
                        VALUES ('$addTitle', '$authorId', '$addGenre', '$addQuantity', '$addPubDate', '$addDescription);";
        $addBookResult = mysqli_query($conn, $addBookQuery);

        if(!$addBookResult){
            die("Unable to insert new book.");
        }

        //Check for new genre and add if does not exist
        $genreArray = str_getcsv($addGenre);
        foreach($genreArray as $genreArrayRow){
            $genreArrayRow = trim($genreArrayRow);
            $checkGenreQuery = "SELECT * FROM genres WHERE genre = '$genreArrayRow'";
            $checkGenreResult = mysqli_query($conn, $checkGenreQuery);
            
            if($checkGenreResult->num_rows == 0){
                $addNewGenreQuery = "INSERT INTO genres(genre) VALUES ('$genreArrayRow');";
                $addNewGenreResult = mysqli_query($conn, $addNewGenreQuery);
            }
        }

        //Add Book Image
        $selectNewBookQuery = "SELECT id FROM book WHERE title = '$addTitle' && authorId = '$authorId' && genre = '$addGenre' 
                                && quantity = '$addQuantity' && publicationDate = '$addPubDate'";
        $selectNewBookResult = mysqli_query($conn, $selectNewBookQuery);

        $newBookRow = $selectNewBookResult->fetch_assoc();
        $newBookId = $newBookRow['id'];

        $newBookDir = $_ENV['IMAGE_LOCATION']."$newBookId/";
        mkdir($newBookDir);
        $imageName = basename($_FILES['bookImage']["name"]);
        $newBookImageLocation = "$newBookId/" . $imageName;

        $addNewBookImageQuery = "UPDATE book SET imageLocation = '$newBookImageLocation' WHERE id = '$newBookId';";
        $addNewBookImageResult = mysqli_query($conn, $addNewBookImageQuery);

        $target_file = $newBookDir . $imageName;

        if(move_uploaded_file($_FILES['bookImage']['tmp_name'], $target_file)){
            echo 'Success';
        }else{
            echo 'Error uploading file.';
        }

        header("Location: books.php");
    }
?>