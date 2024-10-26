<?php
    session_start();

    if(!isset($_SESSION['loggedUserType'])){
        header("Location: login.php");
    }

    $sessionTimeout = 60 * 10;

    if(isset($_SESSION['LAST_ACTIVITY'])){
        $lastActivity = $_SESSION['LAST_ACTIVITY'];
        $currentTime = time();
        $timeSinceLastActivity = $currentTime - $lastActivity;
    
        if($timeSinceLastActivity > $sessionTimeout){
            session_unset();
            session_destroy();
        }else{
            $_SESSION['LAST_ACTIVITY'] = $currentTime;
        }
    }else{
        $_SESSION['LAST_ACTIVITY'] = time();
    }
?>