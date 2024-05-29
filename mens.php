<!DOCTYPE html>
<html lang="en">

<head>
  <?php include 'dbconnect.php'; 
   if(isset($_SESSION)){

    session_start();
  }
   ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
     /* Responsive styles for the product container */
     .new_store {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
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

    /* Styles for the individual product */
    .container1 {
      flex: 0 1 calc(33.33% - 20px);
      max-width: calc(33.33% - 20px);
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px; /* Add margin bottom for spacing */
      text-align: center; /* Center align content */
      border: 2px solid red;
    }

    .inner-container {
      min-width: 800px; /* Ensure inner container doesn't overflow */
    }

    .inner-container img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .side_by_side {
      display: flex;
      justify-content: space-between;
      margin-top: 10px;
    }

    .btn1 {
      padding: 10px 31px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .extra_btn{
      padding: 10px 31px;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    .btn1:hover {
      background-color: #0056b3;
    }
    .extra_btn:hover {
      background-color: #0056b3;
    }
.box1{
  padding: 25px 15px;
  box-shadow: 12px 12px 25px rgb(201, 201, 236);
  border: 1px solid rgb(220, 210, 210);
  border-radius: 10px;
  cursor: pointer;
  margin:20px , 2px;
}

    /* Responsive styles for the product container */

  </style>
</head>

<body>


<?php include 'navbar.php';  ?>


  <section id="feature" class="section.p1"> 
  <?php
    // Display products
    $sql = "SELECT * FROM male_images";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $id =  $row['id'];
        echo '
        <div class="box1">
            <form action="" class="form" method="post">
                <img src="' . $row['image_path'] . '" width="200" height="200">
                <p name="product_name"><strong>Name:</strong> ' . $row['Name'] . '</p>
                <p><strong>Price:</strong> $' . $row['Price'] . '</p>
                <div class="side_by_side" style="margin-bottom: 12px;">
                <input class="number" style="min-width: 65px; margin-right:12px;" type="number" min="1" name="product_quantity" value="1">
                <input type="hidden" name="product_image" value="' . $row['image_path'] . '">
                <input type="hidden" name="product_name" value="' . $row['Name'] . '">
                <input type="hidden" name="product_price" value="' . $row['Price'] . '">
                <input type="submit" value="add to cart" name="add_to_cart" class="extra_btn">
            </div>
                <div>
                <a class="extra_btn" href="details.php?id='.$id.'& idd=1"> <i class="fa fa-eye" aria-hidden="true"></i>  </a>
                </div>
            </form>
        </div>
    ';
      
 
      }
    } else {
      echo "We are Coming Soon!";
    }
    ?>



    


<?php
        if (!isset($_SESSION['email'])) {
            echo '<script>
                document.querySelectorAll(".extra_btn").forEach(btn => {
                    btn.addEventListener("click", function(event) {
                        event.preventDefault();
                        alert("Please log in first!");
                    });
                });
            </script>';
        } else {
            $email = $_SESSION['email'];

            $sql = "SELECT * FROM `user_details` WHERE `email` = '$email'";
            $result = mysqli_query($conn, $sql);
            if ($numRows = 1) {
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['id'];

                if (isset($_POST['add_to_cart'])) {
                    $product_image = $_POST['product_image'];
                    $product_name = $_POST['product_name'];
                    $product_price = $_POST['product_price'];
                    $product_quantity = $_POST['product_quantity'];

                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart_item` WHERE product_name = '$product_name'AND user_id = '$user_id'") or die('Something is wrong will fix soon');

                    if (mysqli_num_rows($select_cart) > 0) {
                        $msg = "Product Already Added!";
                    } else {
                        mysqli_query($conn, "INSERT INTO `cart_item` (product_name , user_id , email , price,Image, qantity) VALUES ('$product_name', '$user_id','$email','$product_price','$product_image','$product_quantity')") or die("Something is wrong will fix soon");
                        $msg = "Product Added!";
                    }
                    echo '<script>alert("' . $msg . '");</script>';
                }
            }
        }
        ?>
  </section>

  <a href="" class="cart" id="showCartButton">
    <i class="fa fa fa-shopping-cart" aria-hidden="true"></i>
  </a>


<script>
  document.getElementById("showCartButton").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default behavior of anchor tag

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
