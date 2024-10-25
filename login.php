<?php
    require_once 'db_config.php';

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $loginEmail = $_POST['email'];
        $loginPassword= $_POST['password'];
    
        $loginQuery = "SELECT email, password, userType FROM users
                        WHERE email = '$loginEmail' AND password = '$loginPassword';";
    
        $authenticateResult = mysqli_query($conn, $loginQuery);
        $row = $authenticateResult->fetch_assoc();
    
        if($authenticateResult->num_rows == 1){
            if($row['userType'] == 'ADMIN'){
                header('Location: admin_dashboard.php');
            }else if($row['userType'] == 'USER'){
                header('Location: home.php');
            }else{
                echo 'Error. Could not find userType';
            }
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
</head>
<body>
    <div>
        <form action="login.php" method="POST">
            <input type="text" id="email" name="email" placeholder="Enter email" required><br>
            <input type="password" id="password" name="password" placeholder="Enter password" required><br>
            <input type="submit" value="Login">
        </form>
        <a href="signup.php">Sign Up</a>
    </div>
</body>
</html>