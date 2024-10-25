<?php
    require_once 'db_config.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['searchBook'])){
            $bookSearch = $_GET['searchBook'];
        }else{
            $bookSearch = '';
        }
        $bookSearchQuery = "
            SELECT b.id, b.title, a.firstName, a.lastName, b.genre, b.publicationDate, b.quantity FROM book b
            INNER JOIN authors a ON b.authorId=a.id
            WHERE b.title LIKE '$bookSearch%' or a.firstName LIKE '$bookSearch%' or a.lastName LIKE '$bookSearch%'";

        $bookSearchResult = mysqli_query($conn, $bookSearchQuery);
    }
?>