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
            background-color: #ffffff;
        }
        .navbar-custom .nav-link,
        .navbar-custom .navbar-brand {
            color: #54101d !important;
        }
        .btn-custom {
            background-color: #54101d;
            color: #ffffff;
            border: none;
        }
        .btn-custom:hover {
            background-color: #b18653;
        }

        .left-content {
            max-width: 45%;
            text-align: left;
            padding-right: 20px;
        }

        .left-content h1 {
            font-size: 3.5rem;
            color: #4F1A2B;
            margin-bottom: 15px;
        }

        .left-content p {
            font-size: 1.5rem;
            color: #4F1A2B;
            margin-bottom: 25px;
        }

        .right-content {
            max-width: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .right-content img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
        }

        .footer {
            background-color: #54101d;
            color: #ffffff;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
        .logo {
            width: 85px;
            height: auto;
            margin-right: 25px;
            margin-left: 25px;
        }

         .key-benefits {
            background-color: #ffffff;
            padding: 50px 0;
            text-align: center;
        }

        .key-benefits h3 {
            font-size: 2.5rem;
            color: #4F1A2B;
            margin-bottom: 40px;
        }

        .key-benefits .benefit-item {
            margin: 30px;
            text-align: center;
            display: inline-block;
            width: 30%;
            box-sizing: border-box;
        }

        .key-benefits .benefit-item h4 {
            font-size: 1.8rem;
            color: #B5885D;
        }

        .key-benefits .benefit-item p {
            font-size: 1.2rem;
            color: #4F1A2B;
        }

        .explore-categories {
            background-color: #ffffff;
            padding: 50px 0;
        }

        .category-card {
            border: 2px solid #4F1A2B;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .category-card img {
            width: 100%;
            height: auto;
            border-bottom: 2px solid #4F1A2B;
        }

        .category-title {
            font-size: 1.6rem;
            color: #4F1A2B;
            padding: 20px;
        }

    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="ArcHive.php">
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
                        <a class="nav-link" href="about_us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact_us.php">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-container">
        <div class="left-content">
            <h1>Welcome to ArcHive</h1>
            <p>Your digital gateway to a world of knowledge. Access and manage your library system seamlessly, anytime and anywhere.</p>
            <a href="login.php" class="btn btn-custom me-3">Log In</a>
            <a href="signup.php" class="btn btn-custom">Sign Up</a>
        </div>

        <div class="right-content">
            <img src="css/assets/image3.png" alt="Library Image">
        </div>
    </div>

    <section class="explore-categories">
        <div class="container text-center">
            <h3 class="my-4">Explore Our Categories</h3>

            <div id="categoryCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="category-card">
                                    <img src="css/assets/category1.png" class="img-fluid" alt="Fiction Category">
                                    <h4 class="category-title">Fiction</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="category-card">
                                    <img src="css/assets/category2.jpg" class="img-fluid" alt="Non-Fiction Category">
                                    <h4 class="category-title">Non-Fiction</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="category-card">
                                    <img src="css/assets/category3.jpg" class="img-fluid" alt="Science Fiction Category">
                                    <h4 class="category-title">Science Fiction</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="category-card">
                                    <img src="css/assets/category4.jpg" class="img-fluid" alt="Biography Category">
                                    <h4 class="category-title">Biography</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#categoryCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#categoryCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="key-benefits">
        <h3>Why Choose ArcHive?</h3>
        <div class="container">
            <div class="benefit-item">
                <h4>Vast Collection</h4>
                <p>Explore a wide range of books across multiple genres.</p>
            </div>
            <div class="benefit-item">
                <h4>Access Anytime, Anywhere</h4>
                <p>Seamlessly access your library from any device.</p>
            </div>
            <div class="benefit-item">
                <h4>Seamless Experience</h4>
                <p>Our intuitive interface ensures a smooth and enjoyable browsing experience.</p>
            </div>
        </div>
    </section>

    <footer class="footer">
        &copy; 2024 ArcHive. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
