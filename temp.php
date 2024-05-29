<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'dbconnect.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Uploading Area</title>
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        /* CSS styles for the form */
        h2 {
            text-align: center;
            margin-top: 20px;
        }
      
        form {
            width: 300px;
            margin: 0 auto;
            text-align: center;
        }

        input[type="file"],
        input[type="text"],
        textarea,
        input[type="number"],
        input[type="submit"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="file"]:focus,
        input[type="text"]:focus,
        textarea:focus,
        input[type="number"]:focus {
            border-color: #007bff;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* CSS styles for the image gallery */
        .gallery {
            text-align: center;
            margin-top: 20px;
        }

        .gallery img {
            max-width: 100px;
            margin: 5px;
        }
        select {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        /* CSS styles for option items */
        select option {
            padding: 10px;
        }
    </style>    
</head>
<body>
    <h4 style="text-align:center; margin-top:20px;">Data Upload Area -- Allowed to Uthenticate Persons Only</h4>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <select name="category">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="children">Children</option>
        </select>
        <input type="file" name="image">
        <br>
        <input type="text" name="name" placeholder="Product Name" required>
        <br>
        <textarea name="description" placeholder="Product Description" required></textarea>
        <br>
        <input type="number" name="price" placeholder="Product Price" required>
        <br>
        <input type="submit" name="submit" value="Upload">
    </form>
    
    <hr>

    <h2>Msg</h2>
    <div class="gallery">
      <?php
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $category = $_POST['category'];
          $Name = $_POST['name'];
          $Description = $_POST['description'];
          $Price = $_POST['price'];

          // Image upload
          if (isset($_POST['submit'])) {
              $targetDir = "uploads/";
              $targetFile = $targetDir . basename($_FILES["image"]["name"]);
              $uploadOk = 1;
              $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

              // Check if image file is a actual image or fake image
              $check = getimagesize($_FILES["image"]["tmp_name"]);
              if ($check === false) {
                  echo "File is not an image.";
                  $uploadOk = 0;
              }

              // Check file size
              if ($_FILES["image"]["size"] > 5000000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
              }

              // Allow certain file formats
              if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
              }

              // Check if $uploadOk is set to 0 by an error
              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
              } else {
                  if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                      // Insert product details into the appropriate table based on category
                      switch ($category) {
                          case 'male':
                              $sql = "INSERT INTO `male_images` (`Name`, `Description`, `Price`, `image_path`) VALUES ('$Name', '$Description', '$Price', '$targetFile')";
                              break;
                          case 'female':
                              $sql = "INSERT INTO `female_images` (`Name`, `Description`, `Price`, `image_path`) VALUES ('$Name', '$Description', '$Price', '$targetFile')";
                              break;
                          case 'children':
                              $sql = "INSERT INTO `children_images` (`Name`, `Description`, `Price`, `image_path`) VALUES ('$Name', '$Description', '$Price', '$targetFile')";
                              break;
                          default:
                              echo "Invalid category.";
                      }

                      // Execute the SQL query
                      if ($conn->query($sql) === TRUE) {
                          echo "New record created successfully.";
                      } else {
                          echo "Error: " . $sql . "<br>" . $conn->error;
                      }
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
              }
            }
          }
            ?>
    </div>
</body>
</html>
