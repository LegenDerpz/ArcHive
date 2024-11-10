<?php
    require_once 'config/db_config.php';

    session_start();

    if(isset($_SESSION['loggedUserType'])){
        header("Location: home.php");
    }

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
            //  echo "Invalid username or password.";
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">

</head>
<body>
    <div class="login-container">
        <a href="welcome_to_ArcHive.php"><img src="css/assets/logo.png" alt="ArcHive Logo" class="logo"></a>
        <h2 class="login-header">Welcome to ArcHive</h2>
        <form action="login.php" method="POST">
        <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group input-group">
            <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <!-- <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div> -->
        <button type="submit" class="btn btn-primary btn-block">Login</button><br>
        <a href="signup.php">Don't have an account?</a>
        </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>