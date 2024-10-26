<?php
    require_once 'config/db_config.php';

    session_start();

    // if(isset($_SESSION['loggedUserType'])){
    //     header("Location: home.php");
    // }
    // Uncomment when logout button exists

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $loginEmail = $_POST['email'];
        $loginPassword= $_POST['password'];
    
        $loginQuery = "SELECT id, email, password, userType FROM users
                        WHERE email = '$loginEmail' AND password = '$loginPassword';";
    
        $authenticateResult = mysqli_query($conn, $loginQuery);
        $row = $authenticateResult->fetch_assoc();
    
        if($authenticateResult->num_rows == 1){
            if($row['userType'] == 'ADMIN'){
                $_SESSION['loggedUserType'] = 'ADMIN';
            }else{
                $_SESSION['loggedUserType'] = 'USER';
            }
            $_SESSION['loggedUserId'] = $row['id'];
            header('Location: home.php');
        }else if($authenticateResult->num_rows == 0 || $authenticateResult->num_rows > 1){
            echo "Invalid username or password.";
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
    <title>Login</title>
    <link rel="stylesheet" href="global.css">
</head>
<body>
    <div>
        <form action="login.php" method="POST">
            <input type="email" id="email" name="email" placeholder="Enter email" required><br>
            <input type="password" id="password" name="password" placeholder="Enter password" required><br>
            <input type="submit" value="Login">
        </form>
        <a href="signup.php">Sign Up</a>
    </div>
</body>
</html>