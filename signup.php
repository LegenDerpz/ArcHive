<?php
    require_once 'config/db_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
    
        $searchQuery = "INSERT INTO users (username, email, password, firstName, lastName, userType)
                VALUES (
                '$username', 
                '$email', 
                '$password', 
                '$firstName', 
                '$lastName',
                'USER'
                );";
        $searchResult = mysqli_query($conn, $searchQuery);
    
        if($searchResult){
            echo 'Success';
            header('Location: login.php');
        }else{
            echo 'Error: '.$conn->error;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <div>
        <form action="signup.php" method="POST">
            <input type="text" id="username" name="username" placeholder="Enter username" required><br>
            <input type="email" id="email" name="email" placeholder="Enter email" required><br>
            <input type="password" id="password" name="password" placeholder="Enter password" required><br>
            <input type="text" id="firstName" name="firstName" placeholder="Enter first name" required><br>
            <input type="text" id="lastName" name="lastName" placeholder="Enter last name" required><br>
            <input type="submit" value="Sign Up">
        </form>
        <a href="login.php">Already have an account? Login here.</a>
    </div>
</body>
</html>