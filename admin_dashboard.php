<?php
    require_once 'db_config.php';


    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['searchUser'])){
            $usernameSearch = $_GET['searchUser'];
        }else{
            $usernameSearch = '';
        }
        $searchQuery = "SELECT username, firstName, lastName FROM users
                WHERE username LIKE '$usernameSearch%' OR firstName LIKE '$usernameSearch%' OR lastName LIKE '$usernameSearch%';";
        
        $searchResult = mysqli_query($conn, $searchQuery);
 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="global.css">
</head>
<body>
    <div class="tab">
        <a href="admin_dashboard.php"><button class="tabLink">Home</button></a>
        <a href="manage_books.php"><button class="tabLink">Manage Books</button></a>
    </div>
    
    <div class="col-sm-6 m-3">
        <h2>Search Users</h2>
        <form action="admin_dashboard.php" method="GET">
            <input type="text" id="searchUser" name="searchUser" placeholder="Search user">
            <input type="submit" value="Search">
        </form>
        <?php 
            if($searchResult->num_rows == 0){
                echo 'No results found.';
            }
        ?>
        <br>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if(isset($searchResult)){
                        while($row = mysqli_fetch_array($searchResult)){?>
                            <tr onclick="window.location='index.php'">
                                <td><?=$row['username']?></td>
                                <td><?=$row['firstName']." ".$row['lastName']?></td>
                            </tr>
                <?php }} ?>
            </tbody>
        </table>
    </div>
</body>
</html>