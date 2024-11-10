<?php
    require_once 'config/db_config.php';

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
        $previousBookImageFile = '';

        if($updateTitle !== ''){$updates[] = "title = '$updateTitle'";}

        if($updateGenre !== ''){
            $updates[] = "genre = '$updateGenre'";

            //Check for new genre and add if does not exist
            $genreArray = str_getcsv($updateGenre);
            foreach($genreArray as $genreArrayRow){
                $genreArrayRow = trim($genreArrayRow);
                $checkGenreQuery = "SELECT * FROM genres WHERE genre = '$genreArrayRow'";
                $checkGenreResult = mysqli_query($conn, $checkGenreQuery);
                
                if($checkGenreResult->num_rows == 0){
                    $addNewGenreQuery = "INSERT INTO genres(genre) VALUES ('$genreArrayRow');";
                    $addNewGenreResult = mysqli_query($conn, $addNewGenreQuery);
                }
            }
        }

        if($updatePublicationDate !== ''){$updates[] = "publicationDate = '$updatePublicationDate'";}

        if($updateQuantity !== ''){$updates[] = "quantity = '$updateQuantity'";}
        
        if($_FILES['bookImage']["name"] !== ''){
            $updateImageLocation = $bookId. '/' . $_FILES['bookImage']["name"];
            $updates[] = "imageLocation = '$updateImageLocation'";

            //Query Old Image File
            $imageQuery = "SELECT imageLocation FROM book WHERE id = '$bookId'";
            $imageResult = mysqli_query($conn, $imageQuery);

            if($imageResult){
                $imageRow = mysqli_fetch_assoc($imageResult);
                $previousBookImageFile = $imageRow['imageLocation'];
            }
        }
        
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
            if($_FILES['bookImage']["name"] !== ''){
                $updateImageFile = $_ENV['IMAGE_LOCATION']."$bookId/" . $_FILES['bookImage']["name"];
                $previousBookImageDir = $_ENV['IMAGE_LOCATION']."$bookId/" . $previousBookImageFile;
                
                //Delete old image || DOESN'T WORK - FIX LATER
                if(file_exists($previousBookImageDir)){
                    unlink($previousBookImageDir);
                }

                $checkDirLoc = $_ENV['IMAGE_LOCATION']."$bookId/";
                if(!file_exists($checkDirLoc)){
                    mkdir($checkDirLoc);
                }

                //Upload file to specified directory
                if(move_uploaded_file($_FILES['bookImage']['tmp_name'], $updateImageFile)){
                    echo 'Successfully updated image file.';
                }else{
                    echo 'Error updating file.';
                }
            }
        }

        header("Location: books.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
    <link rel="stylesheet" href="css/update_book.css">
</head>
<body>
    <div id="update-background" class="update-background">
        <div id="update-container" class="update-container">
            <button class="close">x</button>
            <h2 class="update-header">Update Book</h2><br><br>
            <form action="update_book.php" method="POST" enctype="multipart/form-data">
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
                <label>Thumbnail</label><br>
                <input type="file" id="updateBookImage" name="bookImage" accept="image/png, image/jpeg, image/jpg"><br><br>
                <input type="submit" class="updateBtn" value="Update">
            </form>
        </div>
    </div>
</body>
</html>