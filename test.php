<?php
    require_once 'config/db_config.php';

    $searchQuery = "SELECT * FROM users";
    $searchResult = mysqli_query($conn, $searchQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="col-sm-6">
        <h1>Users</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>User Type</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($searchResult)){?>
                    <tr>
                        <td><?=$row['username'] ?></td>
                        <td><?=$row['email'] ?></td>
                        <td><?=$row['firstName']." ".$row['lastName']?></td>
                        <td><?=$row['userType'] ?></td>
                    </tr>    
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>