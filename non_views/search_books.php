<?php
    require_once 'config/db_config.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['searchBook'])){
            $bookSearch = $_GET['searchBook'];
        }else{
            $bookSearch = '';
        }

        if(isset($_GET['browseBook'])){
            $bookBrowse = $_GET['browseBook'];
        }else{
            $bookBrowse = '';
        }

        

        // $genreCountQuery = "SELECT COUNT(genre) as genreCount FROM genres";
        // $genreCountResult = mysqli_query($conn, $genreCountQuery);
        // $genreCountValue = mysqli_fetch_assoc($genreCountResult)['genreCount'];


        $bookSearchQuery = "
            SELECT b.id, b.title, a.firstName, a.lastName, b.genre, b.publicationDate, b.quantity, b.imageLocation, b.description FROM book b
            INNER JOIN authors a ON b.authorId=a.id
            WHERE b.title LIKE '$bookSearch%' or a.firstName LIKE '$bookSearch%' or a.lastName LIKE '$bookSearch%'";

        $bookBrowseQuery = "
            SELECT b.id, b.title, a.firstName, a.lastName, b.genre, b.publicationDate, b.quantity, b.imageLocation, b.description FROM book b
            INNER JOIN authors a ON b.authorId=a.id
            WHERE b.title LIKE '$bookBrowse%' or a.firstName LIKE '$bookBrowse%' or a.lastName LIKE '$bookBrowse%'";

        $bookSearchResult = mysqli_query($conn, $bookSearchQuery);
        $bookBrowseResult = mysqli_query($conn, $bookBrowseQuery);
    }
?>