<?php

session_start();

echo '
<nav class=" extra navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Shivam Yadav</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex" role="search">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="about.php">About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="contact.php">Contact</a>
                </li>';
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                    echo '<P class = "text-dark mx-4" >Welcome: '. $_SESSION['email'].' </p>
                    <a class="btn  btn-success" href="_logout.php">Logout</a>';
                  } 
                  else{
                  echo '<li> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#SignUpModal">
                    SignUp
                  </button></li>
                  <li><button type="button" class="btn btn-primary my-1 mx-3" data-bs-toggle="modal" data-bs-target="#LoginModal">
                    Login
                  </button></li>';
                  }
                echo '</ul>
        </form>
      </div>

  </nav>




<div class="modal fade" id="SignUpModal" tabindex="-1" aria-labelledby="SignUpModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">SignUp</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form  method="post" action="signuphelp.php">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">UserName</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Mobile Number</label>
                <input type="number" name="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="Cpassword" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login Here</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form method="post" action="loginhelp.php"> 
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="lemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="lpassword" class="form-control" id="exampleInputPassword1">
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
      </div>
    </div>
  </div>
</div>
';


if(isset($_GET['data']) && $_GET['data'] == "true" ){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Signup succesfull</strong> Concern Sent Succesfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

if(isset($_GET['signup']) && $_GET['signup'] == "truee" ){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Signup succesfull</strong> You had succesfully signed up..
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// passerror=Passwordsdonotmatch
elseif(isset($_GET['passerror']) && $_GET['passerror'] == "Passwordsdonotmatch" ){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Signup unsuccesfull</strong> Creadentials are invalid!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// error=Accountalreadyexists
elseif(isset($_GET['error']) && $_GET['error'] == "Accountalreadyexists" ){
echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
<strong>Signup unsuccesfull</strong>Account with this email already exists try with another email!
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

elseif(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == false){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Signup succesfull</strong> Wrong Credentials
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>