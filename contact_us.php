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

        /* Contact Us Section */
        .contact-us {
            background-color: #f8f9fa;
            padding: 50px 0;
        }

        .contact-us h3 {
            font-size: 2.5rem;
            color: #4F1A2B;
            margin-bottom: 40px;
        }

        .contact-us .form-control {
            border-radius: 10px;
            border: 2px solid #4F1A2B;
        }

        .contact-us .btn-custom {
            background-color: #4F1A2B;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
        }

        .contact-us .btn-custom:hover {
            background-color: #b18653;
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
    <section class="contact-us">
        <div class="container text-center">
            <h3>Contact Us</h3>
            <form action="#" method="POST" class="row justify-content-center">
                <div class="col-md-6">
                    <input type="text" class="form-control mb-3" placeholder="Your Name" name="name" required>
                    <input type="email" class="form-control mb-3" placeholder="Your Email" name="email" required>
                    <input type="text" class="form-control mb-3" placeholder="Subject" name="subject" required>
                    <textarea class="form-control mb-3" rows="5" placeholder="Your Message" name="message" required></textarea>
                    <button type="submit" class="btn btn-custom">Send Message</button>
                </div>
            </form>
        </div>
    </section>

    <footer class="footer">
        &copy; 2024 ArcHive. All Rights Reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
