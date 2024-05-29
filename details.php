<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'dbconnect.php';  ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link rel="stylesheet" media="screen and (max-width: 570px)" href="nav_snamm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/solid.min.css" integrity="sha512-pZlKGs7nEqF4zoG0egeK167l6yovsuL8ap30d07kA5AJUq+WysFlQ02DLXAmN3n0+H3JVz5ni8SJZnrOaYXWBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

    <title>Men's Wear</title>

    <style>
        .hello {
            display: flex;
            align-items: center;
            flex-direction: row;
            justify-content: space-evenly;
            border: 0px;
            padding: auto;
            min-height: 70vh;
            text-align: left;
        }
        .hello button{
            margin-top: 10px;
            width: 12rem;
        }
        .btn1{
            border: 0px;
            height: 2rem;
            border-radius: 12px;
        }
    </style>


</head>

<body>

    <?php include 'navbar.php';  ?>
    <?php
$id = $_GET['id'];
$idd = $_GET['idd'];


if ($idd == 3 ){
    $sql = "SELECT * FROM children_images WHERE id = $id";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
      <div class="box1 hello">
        <div class="class1">
            <img src="' . $row['image_path'] . '" width="400" height="400">
        </div>
        <div class="2">
            <p><strong>Name:</strong> ' . $row['Name'] . '</p>
            <p><strong>Description</strong> : ' . $row['Description'] . '</p>
            <p><strong>Price:</strong> $' . $row['Price'] . '</p>
              <button class="btn1" onclick="addToCart(' . $row['id'] . ')"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
        </div>
       </div>
      ';
      }
    } else {
      echo "We are Coming Soon!";
    }
   
}

if ($idd == 2 ){
    $sql = "SELECT * FROM female_images WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
      <div class="box1 hello">
        <div class="class1">
            <img src="' . $row['image_path'] . '" width="400" height="400">
        </div>
        <div class="2">
            <p><strong>Name:</strong> ' . $row['Name'] . '</p>
            <p><strong>Description</strong> : ' . $row['Description'] . '</p>
            <p><strong>Price:</strong> $' . $row['Price'] . '</p>
              <button class="btn1" onclick="addToCart(' . $row['id'] . ')"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
        </div>
            
      </div>
      ';
      }
    } else {
      echo "We are Coming Soon!";
    }
   
}

if ($idd == 1 ){
    $sql = "SELECT * FROM male_images WHERE id = $id";
    $result = $conn->query($sql);

    
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
      <div class="box1 hello">
        <div class="class1">
            <img src="' . $row['image_path'] . '" width="400" height="400">
        </div>
        <div class="2">
            <p><strong>Name:</strong> ' . $row['Name'] . '</p>
            <p><strong>Description</strong> : ' . $row['Description'] . '</p>
            <p><strong>Price:</strong> $' . $row['Price'] . '</p>
              <button class="btn1" onclick="addToCart(' . $row['id'] . ')"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
        </div>
            
      </div>
      ';
      }
    } else {
      echo "We are Coming Soon!";
    }
   
}

?>

    <section>

    </section>

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