<?php
    require_once 'config/db_config.php';
    require_once 'config/session_config.php';

    if($_SERVER['REQUEST_METHOD'] === 'GET'){
        if(isset($_GET['searchUser'])){
            $usernameSearch = $_GET['searchUser'];
        }else{
            $usernameSearch = '';
        }
        $searchQuery = "SELECT id, username, firstName, lastName FROM users
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
    <link rel="stylesheet" href="css/home.css">
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
            <a href="logout.php" class="sidebar-link" id="logoutBtn" >
                <i class="lni lni-exit"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <div class="main p-3">
        <div class="search-section">
            <h2 class="text-center my-4">Search Users</h2>
            <div class="search-container mb-3">
                <form action="home.php" method="GET" class="d-flex">
                    <input type="text" id="searchUser" name="searchUser" placeholder="Search user" class="form-control me-2" required>
                    <input type="submit" value="Search" class="btn btn-primary">
                </form>
            </div>

            <?php if ($searchResult && $searchResult->num_rows == 0): ?>
                <div class="alert alert-warning" role="alert">
                    No results found.
                </div>
            <?php endif; ?>

            <table class="table table-bordered table-striped table-hover mt-3">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($searchResult)): ?>
                        <?php while ($row = mysqli_fetch_array($searchResult)): ?>
                            <tr onclick="viewTransactionHistory('<?=$row['id']?>')">
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['firstName'] . " " . $row['lastName']) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

 </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="home_sample.js"></script>
    <script src="logout.js"></script>
    <script>
        const viewTransactionHistory = (id) => {
            window.location.href = "user_transaction_history.php?id=" + id;
        }
    </script>
</body>

</html>