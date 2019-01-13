<?php
if(isset($_POST['SubmitButton'])){
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];
  if($username === "admin" && $password === "admin"){
    $_SESSION['login'] = true;
    header('LOCATION:admin.php');
    die();

  }else{
    echo "<div class='alert alert-danger'>Username and Password do not match.</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

    <title></title>
    <style media="screen">
    #bookbtn {
      margin-right: 7px;
    }
    #sitename{
      color: #2073f9;
    }
    #carouselExampleFade{

            width: 75%;
            margin: auto;
            margin-top: 25px;

          }
    #loginForm{
      margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 20px;
      margin-right: 20px;
    }
    </style>

  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a id=sitename class="navbar-brand" href="home.php">Empire Hotel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="ourRooms.php">Our Rooms</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="aboutUs.php">About Us</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="btn-toolbar">
          <button id=bookbtn class="btn btn-outline-success my-2 my-sm-0" type="button">Book Now</button>
          <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#loginModal" type="button">Login As Admin</button>
      </div>
    </form>
  </div>

</nav>
<div class="modal body" id=loginModal tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <form id=loginForm action="" method='POST'>
        <div class="form-group">

          <input type="text" class="form-control" name="username" id="username" placeholder="Username">
        </div>
        <div class="form-group">

          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary" name="SubmitButton">Login</button>
      </form>
    </div>
  </div>
</div>


<div id="carouselExampleFade" class="carousel slide carousel-slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="1.jpg" class="d-block w-100" alt="first pic">
    </div>
    <div class="carousel-item">
      <img src="2.jpg" class="d-block w-100" alt="second pic">
    </div>
    <div class="carousel-item">
      <img src="3.jpg" class="d-block w-100" alt="third pic">
    </div>
    <div class="carousel-item">
      <img src="4.jpg" class="d-block w-100" alt="third pic">
    </div>
    <div class="carousel-item">
      <img src="5.jpg" class="d-block w-100" alt="third pic">
    </div>
    <div class="carousel-item">
      <img src="6.jpg" class="d-block w-100" alt="third pic">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleFade" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
</div>
  </body>
</html>