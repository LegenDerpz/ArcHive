<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $updateTitle = $_POST['updateTitle'];
        $updateFirstName = $_POST['updateFirstName'];
        $updateLastName = $_POST['updateLastName'];
        $updateGenre = $_POST['updateGenre'];
        $updateDescription = $_POST['updateDescription'];
        $updatePublicationDate = $_POST['updatePublicationDate'];
        $updateQuantity = $_POST['updateQuantity'];

        $updateQueryStart = "UPDATE book SET ";

        $updates = [];
        $bookId = $_POST['bookId'];
        $previousBookImageFile = '';

        if($updateTitle !== ''){$updates[] = "title = '$updateTitle'";}
        if($updateDescription !== ''){$updates[] = "description = '$updateDescription'";}

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
            // $updateQuery = $updateQueryStart . implode(", ", $updates) . " WHERE id = '$bookId'";
            $newUpdateQuery = "UPDATE book SET 
                               title = '$updateTitle',
                               authorId = '$authorId',
                               genre = '$updateGenre',
                               publicationDate = '$updatePublicationDate',
                               description = '$updateDescription',
                               quantity = '$updateQuantity',
                               imageLocation = '$updateImageLocation'
                               WHERE id = '$bookId'
                               ";
            $updateResult = mysqli_query($conn, $newUpdateQuery);
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

            if(!$updateResult){
                $_SESSION['update_error'] = "Error in updating book.";
                header("Location: books.php");
                die("Error in updating book.");
            }
        }

        $_SESSION['update_success'] = "Successfully updated book.";
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
            <button class="close" id="closeButton">x</button>
            <h2 class="text-center my-4">Update Book</h2>
            <form action="update_book.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="bookId" id="bookIdInput">
                <div class="row">        
                     <div class="col-md-6">
                       <div class="form-group">
                            <label>Title</label><br>
                            <input type="text" name="updateTitle" placeholder="Title" id="updateTitle" required><br><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Genre</label><br>
                        <input type="text" name="updateGenre" placeholder="Genre" id="updateGenre"><br><br>    
                        </div>
                    </div>
                    <div class="col-md-12">
                    <h5>Author</h5>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="updateFirstName" placeholder="First Name" id="updateFirstName" required><br>
                        </div>
                    </div>

                        <div class="col-md-6">
                        <div class="form-group">
                        <input type="text" name="updateLastName" placeholder="Last Name" id="updateLastName" required><br><br>
                        </div>
                    </div>
                    </div>
                    <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                        <label>Description</label><br>
                        <textarea id="updateDescription" name="updateDescription" placeholder="Enter description" rows="3" cols="30"></textarea><br><br>
                </div>
           </div>
                <div class="col-md-6"> 
                    <div class="form-group">
                        <label>Quantity</label><br>
                        <input type="number" name="updateQuantity" min="0" placeholder="Quantity" id="updateQuantity" required><br><br>
                    </div>
                </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Publication Date</label><br>
                            <input type="date" name="updatePublicationDate" id="updatePublicationDate"><br><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Thumbnail</label><br>
                        <input type="file" id="updateBookImage" name="bookImage" accept="image/png, image/jpeg, image/jpg"><br><br>
                        </div>
                    </div>
                    <div class="col-12">
                <button type="submit" class="updateBtn btn-primary w-100">Add Book</button>
            </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>