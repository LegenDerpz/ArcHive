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
            <div>
                <img class="bookImage" src="<?= $imageLocation ?>" id="currentBookImage" alt="Book Image" style="float: left;">
                <h2 class="bookTitle" id="currentBookTitle">TITLE</h2><br>
                <p id="currentBookAuthor">Author</p>
                <p id="currentBookDescription">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam in turpis non ante semper interdum sit amet porttitor lacus. 
                    In ligula turpis, auctor eget molestie ut, pretium sed erat. Mauris finibus, erat et blandit sagittis, felis dolor pulvinar orci, 
                    quis commodo nisi ex sit amet arcu.
                </p>
                <p id="currentBookGenre">Genre</p>
                <p id="currentBookPubDate">Publication Date</p>
                <p id="currentBookQuantity">Quantity</p>
            </div>
            
            <form action="borrow_book.php" method="POST" class="borrow-form">
                <input type="hidden" name="bookId" id="bookIdInput">
                <input type="number" name="borrowQuantity" id="borrowQuantity" min="1" placeholder="Enter borrow quantity" required><br><br>
                <input type="submit" value="BORROW" class="borrow-btn" id="borrowBtnYes">
                <input type="button" value="CANCEL" class="borrow-btn" id="borrowBtnCancel">
            </form>
        </div>
    </div>
</body>
</html>