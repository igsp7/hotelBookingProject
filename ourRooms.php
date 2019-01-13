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

  include_once("config.php");
  $result = mysqli_query($mysqli, "SELECT * FROM rooms");


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
    #roomPhoto{
      margin: auto;
      margin-left: 10px;
      height: 230px;
      width: 330px;
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
          <button id=bookbtn class="btn btn-outline-success my-2 my-sm-0" type="submit">Book Now</button>
          <button class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#loginModal" type="button">Login As Admin</button>
      </div>
    </form>
  </div>

</nav>

<div class='card flex-sm-row mb-gutter'><img id="roomPhoto" class="card-img-top card-img-sm-left" src="room1.jpg"/>
  <div class="card-body">
    <h4 class="card-title">Basic Room</h4>
    <p class="card-text">1 Bed <br> 1 Bathroom <br> TV </p>
  </div>
</div>
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
<?php
    while ($res=mysqli_fetch_array($result))
    {
      $room_number = $res['room_number'];
      $room_floor= $res['floor'];
      $room_price= $res['price'];
      $room_type=$res['room_type'];
      $beds_number=$res['beds_number'];
      $bathrooms_number=$res['bathrooms_number'];
      $room_description = $res['room_description'];
      $photo =$res['photo'];


      echo "<div class='card flex-sm-row mb-gutter'><img id=roomPhoto class='card-img-top card-img-sm-left' src='$photo'/>
        <div class='card-body'>
          <h4 class='card-title'>$room_type Room</h4>
          <p class='card-text'>Room Number: $room_number<br> $room_description <br> Price : $room_price$ <br> Room Number : $room_number <br> Room Floor : $room_floor <br> Number of Beds : $beds_number <br> Number of Bathrooms : $bathrooms_number</p>
        </div>
      </div>";
}
?>

  </body>
</html>
