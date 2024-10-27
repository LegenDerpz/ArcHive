<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['transactionSearch'])){
            $transactionSearch = $_GET['transactionSearch'];
        }else{
            $transactionSearch = '';
        }

        $currentUserId = $_SESSION['loggedUserId'];

        //ADD ORDER BY FILTER
        //if variable = x, filter = ASC or DESC

        $transactionSearchQuery = "
            SELECT *, t.id as transactionId, t.quantity as transactionQuantity, a.firstName as authorFirstName, a.lastName as authorLastName, COALESCE(t.borrowDate, t.returnDate) as transactionDate 
            FROM transactions t
            INNER JOIN book b ON b.id=t.bookId
            INNER JOIN authors a ON b.authorId=a.id
            INNER JOIN users u ON t.userId='$currentUserId'
            WHERE u.id='$currentUserId' AND (b.title LIKE '$transactionSearch%' OR a.firstName LIKE '$transactionSearch%' OR a.lastName LIKE '$transactionSearch%')
            ORDER BY transactionDate DESC";

        $transactionSearchResult = mysqli_query($conn, $transactionSearchQuery);
    }
?>