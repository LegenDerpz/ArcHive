<?php
    require './vendor/autoload.php';
    use Dotenv\Dotenv;
    $dotenv = Dotenv::createImmutable('./');
    $dotenv->load();

    $conn = mysqli_connect(
        $_ENV['HOST'], 
        $_ENV['USER'], 
        $_ENV['PASSWORD'], 
        $_ENV['DATABASE_NAME'], 
        $_ENV['PORT']
    );

    if($conn->connect_error){
        die("Connection Failed: " . $conn->connect_error);
    }
?>