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
            font-family: 'Arial', sans-serif;
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
            padding: 10px 20px;
            font-size: 1rem;
        }

        .btn-custom:hover {
            background-color: #b18653;
        }

        /* Main Content */
        .content-container {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            margin-top: 50px;
        }

        .left-content {
            flex: 1;
            padding: 20px;
        }
        .left-content h1 {
            font-size: 2.5rem;
            color: #4F1A2B;
            margin-bottom: 15px;
        }

        .left-content p {
            font-size: 1.2rem;
            color: #4F1A2B;
            margin-bottom: 25px;
        }

        .right-content {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .right-content img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }
        .logo {
            width: 85px;
            height: auto;
            margin-right: 25px;
            margin-left: 25px;
        }

        /* About Us Section */
        .about-us {
            background-color: #f9f9f9;
            padding: 50px 0;
            text-align: center;
        }

        .about-us h3 {
            font-size: 2.5rem;
            color: #4F1A2B;
            margin-bottom: 40px;
        }

        .team-member {
            margin: 20px;
            text-align: center;
        }

        .team-member img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .team-member h4 {
            font-size: 1.5rem;
            color: #54101d;
        }

        .team-member p {
            font-size: 1.1rem;
            color: #4F1A2B;
        }

        /* Key Benefits Section */
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

        /* Footer */
        footer {
            background-color: #54101d;
            color: white;
            text-align: center;
            padding: 20px;
            font-size: 1rem;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .content-container {
                flex-direction: column;
                align-items: center;
            }

            .key-benefits .benefit-item {
                width: 80%;
            }

            .team-member {
                margin: 10px 0;
            }
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
                        <a class="nav-link" href="ArcHive.php">Home</a>
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
            <h1>Who We Are</h1>
            <p>At ArcHive, we are dedicated to providing the best library management experience. We understand the importance of efficient, accessible, and user-friendly systems to organize and access knowledge. ArcHive helps libraries of all sizes streamline their operations while offering a seamless and enjoyable experience to their users.</p>
            <p>With our innovative digital platform, you can easily manage, browse, and access a wide array of books and resources anytime, anywhere. Whether you are an individual looking for books or a library manager handling a large collection, ArcHive has everything you need to make library management effortless and effective.</p>
            <a href="login.php" class="btn btn-custom me-3">Log In</a>
            <a href="signup.php" class="btn btn-custom">Sign Up</a>
        </div>

        <div class="right-content">
            <img src="css/assets/image3.png" alt="Library Image">
        </div>
    </div>

    <section class="about-us">
        <h3>Meet the Team</h3>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 team-member">
                <img src="css/assets/franz.png" alt="Library Image">
                <h4>Franz Christian Dela Victoria</h4>
                    <p>Lead Programmer & Project Manager</p>
                </div>
                <div class="col-md-3 team-member">
                <img src="css/assets/angel.jpg" alt="Library Image">
                <h4>Angel Mae Gonzales</h4>
                    <p>Frontend Developer</p>
                </div>
                <div class="col-md-3 team-member">
                <img src="css/assets/kent.png" alt="Library Image">
                <h4>Kent John Jordan</h4>
                    <p>Backend Developer</p>
                </div>
                <div class="col-md-3 team-member">
                <img src="css/assets/kenji.png" alt="Library Image">
                <h4>Keane Andre Manlapao</h4>
                    <p>Frontend Developer</p>
                </div>
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

    <footer>
        &copy; 2024 ArcHive. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
 