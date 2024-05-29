<?php
include 'dbconnect.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $email = $_POST['lemail'];
   $pass = $_POST['lpassword'];
  

   $sql = "SELECT * FROM `user_details` WHERE `email` = '$email'";
   $result = mysqli_query($conn , $sql);
   $numRows = mysqli_num_rows($result);
   if($numRows = 1){
     $row = mysqli_fetch_assoc($result);

     if(password_verify($pass , $row['password'])){
        session_start();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['email'] = $email;
        header("location:/project 4/index.php");
     }
     else{
      $_SESSION['loggedin'] = false;
      header("location:/project 4/index.php");
     }
   }
}

?>