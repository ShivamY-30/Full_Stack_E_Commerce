<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link rel="stylesheet" media="screen and (max-width: 570px)" href="smallscreen.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css"
    integrity="sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="script.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>


  <title>Men's Wear</title>

  <style>

     /* Custom styles for the button */
     .cart {
      position: fixed;
      top: 50%;
      right: 20px; /* Adjust as needed */
      transform: translateY(-50%);
      display: inline-block;
      padding: 10px 20px;
      background-color: #007bff; /* Blue */
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .cart:hover {
      background-color: #007bff; /* Darker blue on hover */
    }

    .cart:active {
      transform: translateY(1px);
    }
  </style>

</head>

<body>  

   
  
  <?php
  // if(isset($_SESSION)){

    require 'navbar.php';
  // } 
  
  if(isset($_GET['passerror']) && $_GET['passerror'] == "Passwordsdonotmatch"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Signup succesfull</strong> You had succesfully signed up..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  
  ?>


  <section id="hero">
    <div class="first">
      <h1>Men's Wear</h1>
      <h3>Let's Get This..</h3>
      <p>“It’s not fashion if no one has seen it.” — Coco Chanel</p>
      <button class="btn"> <a href="#feature">Order Now</a> </button>
    </div>
    <div class="second">
      <img src="img/front/2.webp" alt="">
    </div>


  </section>

  <h3 style="text-align: center; color:black; margin:8px;">Special Features</h3>
  <section id="feature" class="section.p1">
    <div class="box">
      <img src="img/features/f1.png" alt="">
      <h4>Free shipping</h4>
    </div>
    <div class="box">
      <img src="img/features/f2.png" alt="">
      <h4>Online Delivery</h4>
    </div>
    <div class="box">
      <img src="img/features/f5.png" alt="">
      <a href="contact.php" style="text-decoration: none;">
        <h4>Customize T-shirts</h4>
      </a>

    </div>
  </section>


  <!-- Choice  -->
  <hr style="margin-top:30px;">
  <h3 style="text-align: center; color:black; margin-top:30px;">The Category</h3>
  <section id="feature" id="tempo" class="section.p1">
    <a href="mens.php">
      <div class="box">
        <img src="img/front/men.png" alt="">
        <h4>Mens</h4>
      </div>
    </a>

    <a href="womens.php">
      <div class="box">
        <img src="img/front/women.png" alt="">
        <h4>Womens</h4>
      </div>
    </a>
    <a href="childrens.php">
      <div class="box">
        <img src="img/front/kids1.png" alt="">
        <h4>Kids</h4>
      </div>
    </a>
  </section>
  
  <a href="" class="cart" id="showCartButton">
    <i class="fa fa fa-shopping-cart" aria-hidden="true"></i>
  </a>


<script>
  document.getElementById("showCartButton").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default behavior of anchor tag
    
    // Check user authentication status
    <?php
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
       
        echo 'window.location.href = "cart.php";';
      } else {
        echo 'alert("Please login to view cart.");';
      }
    ?>
  });
</script>




 

  <footer class="footer" style="margin-top: 20px;">
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