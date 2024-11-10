<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $bookId = $_POST['bookId'];
        $borrowQuantity = $_POST['borrowQuantity'];

        $checkAvailabilityQuery = "SELECT quantity FROM book WHERE id = '$bookId'";
        $checkAvailabilityResult = mysqli_query($conn, $checkAvailabilityQuery);

        $availabilityAmount = mysqli_fetch_array($checkAvailabilityResult);

        if($availabilityAmount['quantity'] >= $borrowQuantity){
            //Get current user ID and timestamp
            $borrowingUserId = $_SESSION['loggedUserId'];
            $borrowDate = date("Y-m-d h:i:sa");
            
            //Update book quantity
            $borrowQuery = "UPDATE book SET quantity = ((SELECT quantity FROM book WHERE id = '$bookId')-$borrowQuantity) WHERE id = '$bookId'";
            $borrowResult = mysqli_query($conn, $borrowQuery);

            //Update user borrowed books table
            $addToBorrowedBooksQuery = "INSERT INTO borrowed_books (userId, bookId, quantity, borrowDate)
                                        VALUES ('$borrowingUserId', '$bookId', '$borrowQuantity', '$borrowDate');";
            $addToBorrowedBooksResult = mysqli_query($conn, $addToBorrowedBooksQuery);

            //Transaction Query
            $addTransactionQuery = "INSERT INTO transactions (userId, bookId, borrowDate, quantity, status)
                                    VALUES ('$borrowingUserId', '$bookId', '$borrowDate', '$borrowQuantity', 'BORROWED');";
            $addTransactionResult = mysqli_query($conn, $addTransactionQuery); 
        }else{
            //Error message: Request amount is greater then available books
        }
        header("Location: books.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Book</title>
    <link rel="stylesheet" href="css/borrow_book.css">
</head>
<body>
    <div id="borrow-background" class="borrow-background">
        <div id="borrow-container" class="borrow-container">
        <form action="borrow_book.php" method="GET">
            <input type="hidden" name="currentBookId" id="currentBookId">
        </form>
            <?php
                // echo "Book ID: " . $_POST['currentBookId'];
                // $currentBookId = isset($_GET['currentBookId']) ? $_GET['currentBookId']:null;

                // if($currentBookId){
                //     echo "Book ID: " . $currentBookId;
                // }
                // $currentBookQuery = "
                //             SELECT b.id, b.title, a.firstName, a.lastName, b.genre, b.publicationDate, b.quantity, b.imageLocation FROM book b
                //             INNER JOIN authors a ON b.authorId=a.id
                //             WHERE b.id = '$currentBookId'";

                // $currentBookResult = mysqli_query($conn, $currentBookQuery);
                // $bookRow = mysqli_fetch_assoc($currentBookResult);

                //Load Image
                // $imageLocation = $_ENV['IMAGE_LOCATION'] . $bookRow['imageLocation'];
                // $nullLocation = $bookRow['id'] . "/";
                
                //If image is null, not found/assigned, or does not exist, assign a placeholder image
                // if($bookRow['imageLocation'] == '' || $bookRow['imageLocation'] == $nullLocation || !file_exists($imageLocation)){
                //     $imageLocation = $_ENV['IMAGE_LOCATION'] . "default/placeholder_thumbnail.png";
                // }
            ?>
            <h2 class="bookTitle">TITLE</h2><br>
            <img class="bookImage" src="<?= $imageLocation ?>" alt="Book Image">
            <form action="borrow_book.php" method="POST" class="borrow-form">
                <input type="hidden" name="bookId" id="bookIdInput">
                <input type="number" name="borrowQuantity" id="borrowQuantity" min="1" placeholder="Quantity" required><br><br>
                <input type="submit" value="BORROW" class="borrow-btn" id="borrowBtnYes">
                <input type="button" value="CANCEL" class="borrow-btn" id="borrowBtnCancel">
            </form>
        </div>
    </div>
</body>
</html>