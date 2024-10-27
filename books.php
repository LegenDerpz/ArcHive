<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';
    require_once 'non_views/search_books.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="tab">
        <a href="home.php"><button class="tabLink">Home</button></a>
        <?php 
            if(isset($_SESSION['loggedUserType'])){
                if($_SESSION['loggedUserType'] == 'ADMIN'){
                    include_once 'admin_tabs.php';
                }
            }
        ?>
        <button class="tabLink" onclick="openTab(event, 'browseBooks')" id="browseTab">Browse Books</button>
        <a href="account.php"><button class="tabLink">Account</button></a>
        <button id="logoutBtn" class="tabLink">LOGOUT</button>
    </div>

    <?php
        if(isset($_SESSION['loggedUserType'])){
            if($_SESSION['loggedUserType'] == 'ADMIN'){
                include_once 'add_book_tab.php';
                include_once 'update_book_tab.php';
            }
        }
    ?>

    <div id="browseBooks" class="tabContent col-sm-8 m-3">
        <h2>Browse Books</h2>
        <form action="books.php" method="GET">
            <input type="text" id="browseBook" name="browseBook" placeholder="Search book">
            <input type="submit" value="Search">
        </form>
        <?php
            if($bookBrowseResult->num_rows == 0){
                echo 'No results found.';
            }
        ?>
        <br>
        <table class="table table-bordered table-striped table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Date</th>
                    <th>Available</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($bookBrowseResult)){
                        while($row = mysqli_fetch_array($bookBrowseResult)){?>
                            <tr>
                                <td style="text-align: left;"><?=$row['title']?></td>
                                <td><?=$row['firstName']." ". $row['lastName']?></td>
                                <td><?=$row['genre']?></td>
                                <td><?=$row['publicationDate']?></td>
                                <td><?=$row['quantity']?></td>
                                <td><input type="submit" value="BORROW" onclick="borrowPrompt('<?= $row['id']; ?>')"></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
        <div id="borrow-container"></div>
    </div>

    <script src="borrow_book.js"></script>
    <script src="update_book.js"></script>
    <script src="delete_book.js"></script>
    <script src="tabs.js"></script>
    <script src="logout.js"></script>
</body>
</html>