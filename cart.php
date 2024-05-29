<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'dbconnect.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css">
    <link rel="stylesheet" media="screen and (max-width: 570px)" href="nav_snamm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css" integrity="sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <style>
        /* Add your CSS styles here */
        /* Center the main container */
        .cart-container {
            /* Set height to 100% of viewport height */
            display: flex;
            /* margin-top: -100px; */
            flex-direction: column; /* Align children vertically */
            justify-content: center; /* Center children horizontally */
            align-items: center; /* Center children vertically */
            background-color: #f5f5f5;
        }

        .cart-container .navbar {
            margin-bottom: 10px;
            padding: 10px; /* Padding */
            text-align: center; /* Center text */
        }

        .cart-container .navbar h2 {
            margin: 0;
            text-align: center; 

         /* Remove default margin */
        }

        .cart-container .cart-items {
            max-width: 800px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        /* Cart item styles */
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between; /* Add space between item and button */
            border-bottom: 1px solid #ccc;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item img {
            max-width: 100px;
            margin-right: 20px;
        }

        .cart-item h5 {
            margin: 0;
        }

        .cart-item p {
            margin: 5px 0;
            color: black;
        }

        .remove-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .remove-btn:hover {
            background-color: #d32f2f;
        }

        /* Total price section */
        .total-price {
            margin-top: 20px;
            text-align: right;
            font-size: 20px;
        }
        .btn_order{
            color: white;
            background-color: blueviolet;
            border-radius: 10px;
            font-size: 1.01rem;
            border: 0px;
            padding: 8px 8px;

        }
        .btn_order:hover{
            background-color: blue;
        }

    </style>
</head>
<body>

<?php
include 'navbar.php';

$email = $_SESSION['email'];

// Fetch user ID from user_details table
$sql = "SELECT * FROM `user_details` WHERE `email` = '$email'";
$result = mysqli_query($conn, $sql);
if ($numRows = 1) {
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['id'];
}

// Fetch cart items associated with the user ID
$sql = "SELECT * FROM `cart_item` WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<div class="cart-container">
    <div class="navbar">
        <h2 >Shopping Cart</h2>
    </div>
    <div class="cart-items">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $image_path = $row['Image'];
                $name = $row['product_name'];
                $price = $row['price'];
                $quantity = $row['qantity'];
                $id = $row['id'];

                echo '
                <div class="cart-item">
                    <img src="' . $image_path . '" alt="Item">
                    <div>
                        <h5>' . $name . '</h5>
                        <p>Price: $' . $price . '</p>
                        <p>Quantity: ' . $quantity . '</p>
                    </div>
                    <form method="post">
                        <button type="submit" name="remove_item" class="remove-btn" value="' . $id. '">Remove</button>
                    </form>
                </div>';
            }
        } else {
            echo '<p>No items in the cart</p>';
        }
    echo '</div>
    <form method="post">
    <div style="margin-top: 12px;">';
    if(isset($id)){

        echo '<button name="final_order" value="' . $id.'" class=" btn_order" >Order Now</button>';
    }
    echo'</div>
    </form>';

    ?>

    <!-- Total price section -->
    <div class="total-price">
        <!-- Total price will be calculated dynamically using JavaScript -->
    </div>
</div>

<?php
if(isset($_POST['remove_item'])) {
    $item_id = $_POST['remove_item'];
    $sql = "DELETE FROM `cart_item` WHERE `id` = '$item_id'";
    if(mysqli_query($conn, $sql)) {
        echo '<script>alert("Product removed successfully");</script>';
        // Redirect to refresh the page after removal
        echo '<script>window.location.href = "cart.php";</script>';
    } else {

        echo '<script>alert("Failed to remove product");</script>';
        
    }
}

if(isset($_POST['final_order'])){
    $item_id = $_POST['final_order'];
    $sql = "UPDATE `cart_item` SET `Order_status` = '1' WHERE `id` =  '$item_id'";
    mysqli_query($conn , $sql);
    echo '<script>alert("Your Order is Sucsessfully Placed! ");</script>';
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->
<script>
    // jQuery for smooth removal animation and total price calculation
    $(document).ready(function () {
        function updateTotalPrice() {
            var totalPrice = 0;
            $('.cart-item').each(function () {
                var price = parseFloat($(this).find('p:eq(0)').text().replace('Price: $', ''));
                var quantity = parseInt($(this).find('p:eq(1)').text().replace('Quantity: ', ''));
                totalPrice += price * quantity;
            });
            $('.total-price').text('Total: $' + totalPrice.toFixed(2));
        }

        // Initial calculation
        updateTotalPrice();
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
      <p style="color:white">&copy; AVN GROUP. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
