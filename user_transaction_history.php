<!-- Imports -->
<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';
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
    <title>User History Transaction</title>
</head>
<body>
    
<?php
    $user_id = $_GET['id'];

    $userInfo = "
        SELECT * FROM users WHERE id = '$user_id';
    ";

    $transactionHistoryQuery = "
        SELECT
            T.borrowDate, T.returnDate, T.status, T.quantity, U.username, U.firstName, U.lastName
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
    <h1>Transaction History</h1>
    <?php $user = mysqli_fetch_assoc($userResult); ?>
    <h3><?=$user['firstName']. " " . $user['lastName']?></h3>
    <h5 class="">@<?=$user['username']?></h5>
    <table class="table table-bordered table-striped table-hover mt-3">
        <thead>
            <tr>
                <th>Borrow Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while ($row = mysqli_fetch_array($transactionHistoryQueryResult)):
                    $borrowDate = $row['borrowDate'];
                    $returnDate = $row['returnDate'];
                    $status = $row['status'];
                    $quantity = $row['quantity'];
                ?>
                <tr>
                    <td><?=$borrowDate?></td>
                    <td><?=$returnDate?></td>
                    <td><?=$status?></td>
                    <td><?=$quantity?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>