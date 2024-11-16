<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
     <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/search.css">
</head>

<body>
    <div class="wrapper">
    <aside id="sidebar">
    <div class="d-flex">
        <button class="toggle-btn" type="button">
            <i class="lni lni-grid-alt"></i>
        </button>
        <div class="sidebar-logo">
            <a href="#">ArcHive</a>
        </div>
    </div>

    <ul class="sidebar-nav">
        <li class="sidebar-item">
            <a href="home.php" class="sidebar-link">
                <i class="bi bi-house-door"></i> <!-- Home icon -->
                <span>Home</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="search_users.php" class="sidebar-link">
                <i class="bi bi-search"></i> <!-- Search Users icon -->
                <span>Search Users</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="books.php" class="sidebar-link">
                <i class="bi bi-book"></i> <!-- Books icon -->
                <span>Books</span>
            </a>
        </li>
        <li class="sidebar-item">
            <a href="Account.php" class="sidebar-link">
                <i class="bi bi-person"></i> <!-- Account icon -->
                <span>Account</span>
            </a>
        </li>
    </ul>
    <div class="sidebar-footer">
        <a href="logout.php" class="sidebar-link" id="logoutBtn">
            <i class="lni lni-exit"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>


    <div class="main p-3">
       <div class="welcome-section text-center mt-5">
                    <h1>Welcome to ArcHive!</h1>
                    <p class="lead">Your one-stop library for all your reading needs.</p>
                    <p>Explore our extensive collection of books and connect with fellow readers.</p>
                </div>

                <div class="features-section mt-4">
                    <h2>Features</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-bookmarks fs-2"></i>
                                    <h5 class="card-title">Browse Books</h5>
                                    <p class="card-text">Access a wide variety of books across different genres.</p>
                                    <a href="books.php" class="btn btn-primary">Browse Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-people fs-2"></i>
                                    <h5 class="card-title">Connect with Users</h5>
                                    <p class="card-text">Search and connect with other readers in the community.</p>
                                    <a href="search_users.php" class="btn btn-primary">Find Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-circle fs-2"></i>
                                    <h5 class="card-title">Manage Your Account</h5>
                                    <p class="card-text">Update your profile and view your reading history.</p>
                                    <a href="Account.php" class="btn btn-primary">Go to Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="home_sample.js"></script>
    <script src="logout.js"></script>

</body>

</html>