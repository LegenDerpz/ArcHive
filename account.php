<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';
    require_once 'non_views/borrowed_books.php';
    require_once 'non_views/transactions.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="tab">
        <a href="home.php"><button class="tabLink">Home</button></a>
        <a href="books.php"><button class="tabLink">Books</button></a>
        <button class="tabLink" onclick="openTab(event, 'borrowedBooks')" id="defaultOpen">Borrowed Books</button>
        <button class="tabLink" onclick="openTab(event, 'transactions')" id="transactionsTab">Transactions</button>
        <button id="logoutBtn" class="tabLink">LOGOUT</button>
    </div>
    
    <div id="borrowedBooks" class="tabContent col-sm-8 m-3">
        <h2>Borrowed Books</h2>
        <!-- ADD GROUP BY FILTER -->
        <form action="account.php" method="GET">
            <input type="text" id="browseBorrowedBook" name="browseBorrowedBook" placeholder="Search book">
            <input type="submit" value="Search">
        </form>
        <?php
            if($browseBorrowedBookResult->num_rows == 0){
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
                    <th>Borrow Date</th>
                    <th>Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($browseBorrowedBookResult)){
                        while($row = mysqli_fetch_array($browseBorrowedBookResult)){?>
                            <tr>
                                <td style="text-align: left;"><?=$row['title']?></td>
                                <td><?=$row['firstName']." ". $row['lastName']?></td>
                                <td><?=$row['genre']?></td>
                                <td><?=$row['publicationDate']?></td>
                                <td><?=$row['borrowDate']?></td>
                                <td><?=$row['quantity']?></td>
                                <td><input type="submit" value="RETURN" onclick="returnPrompt('<?= $row['borrowId']; ?>', '<?= $row['book_id'];?>')"></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
        <div id="return-container"></div>
    </div>

    <div id="transactions" class="tabContent col-sm-11 m-3">
        <h2>Transaction History</h2>
        <form action="account.php" method="GET">
            <input type="text" id="transactionSearch" name="transactionSearch" placeholder="Search">
            <input type="submit" value="Search">
        </form>
        <?php
            if($transactionSearchResult->num_rows == 0){
                echo 'No results found.';
            }
        ?>
        <br>
        <table class="table table-bordered table-striped table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Borrow Date</th>
                    <th>Return Date</th>
                    <th>Quantity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($transactionSearchResult)){
                        while($row = mysqli_fetch_array($transactionSearchResult)){?>
                            <tr>
                                <td style="text-align: left;"><?=$row['transactionId']?></td>
                                <td style="text-align: left;"><?=$row['bookId']?></td>
                                <td style="text-align: left;"><?=$row['title']?></td>
                                <td><?=$row['authorFirstName']." ". $row['authorLastName']?></td>
                                <td><?=$row['borrowDate']?></td>
                                <td><?=$row['returnDate']?></td>
                                <td><?=$row['transactionQuantity']?></td>
                                <td><?=$row['status']?></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
    </div>
    <script src="return_book.js"></script>
    <script src="tabs.js"></script>
    <script src="logout.js"></script>
</body>
</html>