<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $bookId = $_POST['bookId'];
        $borrowId = $_POST['borrowId'];
        $returningUserId = $_SESSION['loggedUserId'];
        $returnQuantity = $_POST['returnQuantity'];

        $checkAvailabilityQuery = "SELECT bb.quantity as returnQuantity FROM borrowed_books bb 
                                    INNER JOIN book b ON bb.bookId=b.id
                                    WHERE userId = '$returningUserId' AND bookId='$bookId'";
        $checkAvailabilityResult = mysqli_query($conn, $checkAvailabilityQuery);

        $quantityRow = mysqli_fetch_assoc($checkAvailabilityResult);
        $availabilityAmount = $quantityRow['returnQuantity'];

        if($availabilityAmount >= $returnQuantity){
            //Get timestamp
            $returnDate = date("Y-m-d h:i:sa");
            
            //Update borrowed book quantity
            $returnQuery = "UPDATE borrowed_books SET quantity = ((SELECT quantity FROM borrowed_books WHERE id = '$borrowId')-$returnQuantity)
                            WHERE id = '$borrowId'";
            $returnResult = mysqli_query($conn, $returnQuery);

            //If quantity is 0, remove row
            $checkQuantityQuery = "SELECT id, quantity FROM borrowed_books bb
                                    WHERE id = '$borrowId'";
            $checkQuantityResult = mysqli_query($conn, $checkQuantityQuery);
            $quantityRow = mysqli_fetch_array($checkQuantityResult);

            if($quantityRow['quantity'] <= 0){
                $removeRowQuery = "DELETE FROM borrowed_books WHERE quantity <= 0";
                $removeRowResult = mysqli_query($conn, $removeRowQuery);
            }

            //Update books table
            $returnToBooksQuery = "UPDATE book SET quantity = ((SELECT quantity FROM book WHERE id = '$bookId')+$returnQuantity) WHERE id = '$bookId';";
            $returnToBooksResult = mysqli_query($conn, $returnToBooksQuery); 

            //Transaction Query
            $addTransactionQuery = "INSERT INTO transactions (userId, bookId, returnDate, quantity, status)
                                    VALUES ('$returningUserId', '$bookId', '$returnDate', '$returnQuantity', 'RETURNED');";
            $addTransactionResult = mysqli_query($conn, $addTransactionQuery); 
        }else{
            // Error message to form
            $_SESSION['return_error'] = "Error returning book. Return amount is greater than borrowed books.";
            header("Location: account.php");
            die("Error returning book.");
        }
        $_SESSION['return_success'] = "Successfully returned book.";
        header("Location: account.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Book</title>
    <link rel="stylesheet" href="css/return_book.css">
</head>
<body>
    <div id="return-background" class="return-background">
        <div id="return-container" class="return-container">
            <h2 class="return-header">RETURN</h2><br>
            <form action="return_book.php" method="POST" class="return-form">
                <input type="hidden" name="bookId" id="bookIdInput">
                <input type="hidden" name="borrowId" id="borrowIdInput">
                <input type="number" name="returnQuantity" id="returnQuantity" min="1" placeholder="Quantity" required><br><br>
                <input type="submit" value="RETURN" class="return-btn" id="returnBtnYes">
                <input type="submit" value="CANCEL" class="return-btn" id="returnBtnCancel">
            </form>
        </div>
    </div>
</body>
</html>