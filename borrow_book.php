<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $bookId = $_POST['bookId'];
        $borrowQuantity = $_POST['borrowQuantity'];

        $checkAvailabilityQuery = "SELECT quantity FROM book WHERE id = '$bookId'";
        $checkAvailabilityResult = mysqli_query($conn, $checkAvailabilityQuery);

        $availabilityAmount = $checkAvailabilityResult->fetch_assoc();

        if($availabilityAmount >= $borrowQuantity){
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
            $addTransactionQuery = "INSERT INTO transactions (userId, bookId, borrowDate, status)
                                    VALUES ('$borrowingUserId', '$bookId', '$borrowDate', 'BORROWED');";
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
            <h2 class="borrow-header">BORROW</h2><br>
            <form action="borrow_book.php" method="POST" class="borrow-form">
                <input type="hidden" name="bookId" id="bookIdInput">
                <input type="number" name="borrowQuantity" id="borrowQuantity" min="1" placeholder="Quantity" required><br><br>
                <input type="submit" value="BORROW" class="delete-btn" id="borrowBtnYes">
                <input type="button" value="CANCEL" class="delete-btn" id="borrowBtnCancel">
            </form>
        </div>
    </div>
</body>
</html>