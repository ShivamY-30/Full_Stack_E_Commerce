<?php

include 'dbconnect.php';
$showError = "false";
$exists = false;
$succ = false;
$fail = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $UserName = $_POST['name'];
    $Email = $_POST['email'];
    $number = $_POST['number'];
    $passd = $_POST['password'];
    $cpassword = $_POST['Cpassword'];


    // Checking the validity of email that a user do not have more than one account for same email
    $sql = "SELECT * FROM `user_details` WHERE `email` = '$Email'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($res);

    if ($row > 0) {
        $showerror = "Account already exists";
        header("location:/project 4/index.php?error=Accountalreadyexists");
    } else {
        // Unique email of each users
        if (($passd == $cpassword)) {
            $hash = password_hash($passd, PASSWORD_DEFAULT);
            $data = "INSERT INTO user_details ( username, email, password, mobile) VALUES ('$UserName', '$Email', '$hash', '$number')";
            $result = mysqli_query($conn, $data);

            if ($result) {
                $showAlert = true;
                header("location:/project 4/index.php?signup=truee");
                exit();
            }
        }
        else{
            $showpassError = "Passwords do not match";
            header("location:/project 4/index.php?passerror=Passwordsdonotmatch");
           }
    }
}


?>