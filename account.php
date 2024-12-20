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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex">
                <a class="toggle-btn" href="#" id="sidebar-button">
                    <i class="lni lni-grid-alt"></i>
                </a>
                <div class="sidebar-logo">
                    <a href="home.php">ArcHive</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="home.php" class="sidebar-link">
                        <i class="bi bi-house-door"></i> <!-- Home icon -->
                        <span>Home</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <?php 
                        if (isset($_SESSION['loggedUserType']) && $_SESSION['loggedUserType'] == 'ADMIN') {
                            include_once 'search_tab.php';
                        }
                    ?>
                </li>
                <li class="sidebar-item">
                    <a href="books.php" class="sidebar-link">
                        <i class="bi bi-collection"></i> <!-- Books icon -->
                        <span>Books</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" onclick="openTab(event, 'borrowedBooks', 'borrowedBooksTab', 'accountPage')" id="borrowedBooksTab">
                        <i class="bi bi-journal"></i> <!-- Borrowed Books icon -->
                        <span>Borrowed Books</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" onclick="openTab(event, 'transactions', 'transactionsTab', 'accountPage')" id="transactionsTab">
                        <i class="bi bi-cash-stack"></i> <!-- Transactions icon -->
                        <span>Transactions</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" id="logoutBtn" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>
<div class="main p-3">

    <div id="borrowedBooks" class="tabContent container ">
        <h2 class="text-center my-4">Borrowed Books</h2>
        <!-- ADD GROUP BY FILTER -->
        <div class="mb-4">
            <form action="account.php" method="GET" class="d-flex w-100">
                <input type="text" id="browseBorrowedBook" name="browseBorrowedBook" class="form-control me-2 w-100 py-2" placeholder="Search book" required>
                <input type="submit" value="Search">
            </form>
        </div>

        <div style="color: <?= isset($_SESSION['return_success']) ? 'green' : 'red' ?>;">
            <?php 
                if(isset($_SESSION['return_success'])){
                    echo $_SESSION['return_success'];
                    unset($_SESSION['return_success']);
                }else if(isset($_SESSION['return_error'])){
                    echo $_SESSION['return_error'];
                    unset($_SESSION['return_error']);
                }
            ?>
        </div>

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
                    <th>Status</th>
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

    <div id="transactions" class="tabContent m-3 container">
        <h2 class="text-center my-4">Transaction History</h2>
        <div class="mb-4">
        <form action="account.php" method="GET" class="d-flex w-100">
            <input type="text" id="transactionSearch" name="transactionSearch"  class="form-control me-2 w-100 py-2" placeholder="Search book" required>
            <button type="submit" class="btn btn-primary ms-2 py-2">
                    <i class="bi bi-search"></i> Search
            </button>
        </form>
    </div>
    
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
                                <td style="color: <?= ($row['status'] == 'BORROWED') ? 'red' : 'green'?>;"><?=$row['status']?></td>
                            </tr>
                    <?php }} ?>
            </tbody>
        </table>
    </div>

</div>
    <script src="sidebar.js"></script>
    <script src="account.js"></script>
    <script src="return_book.js"></script>
    <script src="tabs.js"></script>
    <script src="logout.js"></script>
    <script src="home_sample.js"></script>

</body>
</html>