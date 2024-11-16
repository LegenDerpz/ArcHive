<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible=IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
        }
        .navbar-custom {
            background-color: #b18653; /* Warm brown */
            color: #ffffff;
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #ffffff !important;
        }
        .btn-custom {
            background-color: #54101d; /* Dark red */
            color: #ffffff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #312229; /* Dark brown */
        }
        .left-content {
            max-width: 45%;
        }
        .right-content img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background-color: #b18653;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
        .logo {
            width: 50px;
            height: auto;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="css/assets/logo.png" alt="ArcHive Logo" class="logo"> ArcHive
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container content-container">
        <!-- Left Side: Welcome Text and Buttons -->
        <div class="left-content">
            <img src="css/assets/logo.png" alt="ArcHive Logo" class="logo">
            <h1>Welcome to ArcHive</h1>
            <p>Access and manage your library system seamlessly.</p>
            <a href="login.php" class="btn btn-custom me-3">Log In</a>
            <a href="signup.php" class="btn btn-custom">Sign Up</a>
        </div>
        
        <!-- Right Side: Image Container -->
        <div class="right-content">
            <img src="css/assets/image1.png" alt="Library Image">
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        &copy; 2024 ArcHive. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
