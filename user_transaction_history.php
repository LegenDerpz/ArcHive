<!-- Imports -->
<?php
    require_once 'config/db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/browse_books.css">
    <link rel="stylesheet" href="css/global_scrollbar.css">
    <link rel="stylesheet" href="css/user_trans.css">
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
                <?php 
                    if (isset($_SESSION['loggedUserType']) && $_SESSION['loggedUserType'] == 'ADMIN') {
                        include_once 'admin_tabs.php';
                    }
                ?>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link" onclick="openTab(event, 'browseBooks', 'browseTab', 'booksPage')" id="browseTab">
                        <i class="bi bi-collection"></i> <!-- Books icon -->
                        <span>Browse Books</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="account.php" class="sidebar-link">
                        <i class="bi bi-person"></i> <!-- Account icon -->
                        <span>Account</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
                <a href="#" id="logoutBtn" class="sidebar-link">
                    <i class="lni lni-exit"></i>
                    <span>Logout</span>
                </a>
            </div>
        </aside>    <div class="main p-3">

        <?php
            $user_id = $_GET['id'];

            $userInfo = "
                SELECT * FROM users WHERE id = '$user_id';
            ";

            $transactionHistoryQuery = "
                SELECT
                    T.id, T.bookId ,T.borrowDate, T.returnDate, T.status, T.quantity, U.username, U.firstName, U.lastName
                FROM 
                    transactions AS T
                INNER JOIN 
                    users AS U
                WHERE
                    U.id = '$user_id';
            ";

            $userResult = mysqli_query($conn, $userInfo);
            $transactionHistoryQueryResult = mysqli_query($conn, $transactionHistoryQuery);
        ?>
        
            <h2 class="text-center mb-4">Transaction History</h2>
            <div class="text-center my-4">

            <?php $user = mysqli_fetch_assoc($userResult); ?>
            <h3><?=$user['firstName']. " " . $user['lastName']?></h3>
            <h5 class="">@<?=$user['username']?></h5>
                    </div>

            <table class="table table-bordered table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Book ID</th>
                        <th>Borrow Date</th>
                        <th>Return Date</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = mysqli_fetch_array($transactionHistoryQueryResult)):
                            $transacId = $row['id'];
                            $transacBookId = $row['bookId'];
                            $borrowDate = $row['borrowDate'];
                            $returnDate = $row['returnDate'];
                            $status = $row['status'];
                            $quantity = $row['quantity'];
                        ?>
                        <tr>
                            <td><?=$transacId?></td>
                            <td><?=$transacBookId?></td>
                            <td><?=$borrowDate?></td>
                            <td><?=$returnDate?></td>
                            <td><?=$quantity?></td>
                            <td style="color: <?= ($row['status'] == 'BORROWED') ? 'red' : 'green'?>;"><?=$row['status']?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="home_sample.js"></script>
    <script src="logout.js"></script>
    <script src="sidebar.js"></script>
</body>
</html>