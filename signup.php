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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
</head>
<body>
    <div class="signup-container">
        <a href="ArcHive.php"><img src="css/assets/logo.png" alt="ArcHive Logo" class="logo"></a>
        <h2 class="signup-header">Welcome to ArcHive</h2>
        
        <form action="signup.php" method="POST">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
            </div>
            
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
            </div>
            
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
            </div>
            
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                </div>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name" required>
            </div>
            
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                </div>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign Up</button>
        </form>
        
       
        <p class="text-center mt-3"><a href="login.php" class="login-link">Already have an account?</a></p>

    </div>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>