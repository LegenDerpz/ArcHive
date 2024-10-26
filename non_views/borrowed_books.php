<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['browseBorrowedBook'])){
            $browseBorrowedBook = $_GET['browseBorrowedBook'];
        }else{
            $browseBorrowedBook = '';
        }

        $currentUserId = $_SESSION['loggedUserId'];

        $browseBorrowedBookQuery = "
            SELECT b.id, b.title, a.firstName, a.lastName, b.genre, b.publicationDate, bb.quantity, bb.borrowDate, u.id FROM book b
            INNER JOIN authors a ON b.authorId=a.id
            INNER JOIN borrowed_books bb ON b.id=bb.bookId
            INNER JOIN users u ON bb.userId='$currentUserId'
            WHERE u.id='$currentUserId' AND (b.title LIKE '$browseBorrowedBook%' OR a.firstName LIKE '$browseBorrowedBook%' OR a.lastName LIKE '$browseBorrowedBook%')";

        $browseBorrowedBookResult = mysqli_query($conn, $browseBorrowedBookQuery);
    }
?>