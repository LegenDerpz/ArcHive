<?php
    require_once 'db_config.php';

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
        }else{
            echo 'Error: '.$conn->error;
        }
    }
    
?>

<a href="signup.php">Go Back</a>