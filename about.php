<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - AVN Groups Clothing</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="stylesheet" media="screen and (max-width: 570px)" href="nav_snamm.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css" integrity="sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    <style>
        /* CSS styles for the about us page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
        }

        .founders {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }

        .founder-box {
            width: 300px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .founder-box img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .founder-box h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .founder-box p {
            color: #666;
        }

        .industry-info {
            margin-top: 50px;
            text-align: center;
        }

        .industry-info h2 {
            color: #333;
        }

        .industry-info p {
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .industry-info .icon-box {
            display: inline-block;
            width: 120px;
            height: 120px;
            background-color: #fff;
            border-radius: 10px;
            margin: 20px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .industry-info .icon-box i {
            font-size: 36px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .industry-info .icon-box p {
            color: #333;
        }
        
    </style>
</head>
<body>
  
  
  <?php include 'navbar.php';  ?>
    <div class="container">
        <h1>About Us - AVN Groups Clothing</h1>

        <div class="founders">
            <div class="founder-box">
                <img src="img/founder/pic.png" alt="Founder 1">
                <h3>Shivam Yadav</h3>
                <p>Co-Founder</p>
            </div>

            <div class="founder-box">
                <img src="img/founder/pic.png" alt="Founder 2">
                <h3>Shivam Yadav</h3>
                <p>Co-Founder</p>
            </div>
        </div>

        <div class="industry-info">
            <h2>Our Industry</h2>
            <p>We are passionate about the fashion industry and committed to delivering high-quality clothing to our customers. Here are some key aspects of our industry:</p>

            <div class="icon-box">
                <i class="fas fa-tshirt"></i>
                <p>Trendy Designs</p>
            </div>

            <div class="icon-box">
                <i class="fas fa-users"></i>
                <p>Customer Satisfaction</p>
            </div>

            <div class="icon-box">
                <i class="fas fa-cogs"></i>
                <p>Innovative Solutions</p>
            </div>

            <div class="icon-box">
                <i class="fas fa-truck"></i>
                <p>Fast Shipping</p>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
            <p>&copy; AVN GROUP. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
