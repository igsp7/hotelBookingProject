<?php include_once("config.php"); ?>
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
<?php
    if(isset($_POST['bookNow'])){
      $user_name=$_POST['name'];
      $user_age=$_POST['age'];
      $user_email=$_POST['email'];
      $user_adress=$_POST['address'];
      $user_telephone=$_POST['phone'];
      $room_number = $_POST['room_number'];
      $check_in_date = $_POST['check_in_date'];
      $check_out_date = $_POST['check_out_date'];

      $userResult =mysqli_query($mysqli, "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1");
      $row=mysqli_fetch_row($userResult);
      $user_id = $row[0] + 1;

      $roomResult =mysqli_query($mysqli, "SELECT room_id FROM rooms where room_number =$room_number ");
      $row1=mysqli_fetch_row($roomResult);
      $room_id = $row1[0];


      $sql = "insert into users (name,age,adress,email,telephone)
                        values('$user_name','$user_age','$user_adress','$user_email','$user_telephone')";
      $resul= $mysqli->query($sql);
                $sql1 = "insert into reservation (user_id,room_id,check_in_date,check_oute_date)
                        values('$user_id','$room_id','$check_in_date','$check_out_date')";
                          $resul1= $mysqli->query($sql1);
                echo"<script src='jquery-3.3.1.min.js'></script>
                <script>$(document).ready(function(){ $('#successModal').modal('show'); });</script>
                <div id='successModal' class='modal' tabindex=''-1' role='dialog'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title'>Successfull Booking</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            <p>Your room is waiting for you.</p>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-success' data-dismiss='modal'>OK</button>
                          </div>
                        </div>
                      </div>
                    </div>";
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/postboot.min.css"/>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/postboot.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
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
    #loginForm,#bookNowForm{
      margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 20px;
      margin-right: 20px;
    }
    #bookNowButtonDiv{
      text-align: center;
      align-self: center;
      margin-top: 10px;
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
          <button id=bookbtn  class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#bookNowModal"type="button">Book Now</button>
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

<div class="modal body" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <form id=bookNowForm action="" method='POST'>
        <!-- <label id="booklabel">Book Your Room Now</label> -->
        <h5 align="center">Book Your Room Now</h5>
        <div class="form-group">

          <input type="text" class="form-control" name="name" id="username" placeholder="Your Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="age" id="age" placeholder="Your Age">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="email" id="email" placeholder="Your Email">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="address" id="address" placeholder="Your Address">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="phone" id="age" placeholder="Your Telephone Number">
        </div>
        <label>Select Your Room:</label>
        <select type="text" name="room_number" class="form-control" id="exampleFormControlSelect1">
          <?php
          $resulted = mysqli_query($mysqli, "SELECT room_number FROM rooms");
          while ($res=mysqli_fetch_array($resulted))
          {
            $room_number= $res['room_number'];
            echo"<option>$room_number</option>";
          }
          ?>
        </select>
            Check In Date: <input name = "check_in_date" id="startDate" width="276" />
            Check Out Date: <input name = "check_out_date" id="endDate" width="276" />
        <script>
            var today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
            $('#startDate').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
                iconsLibrary: 'fontawesome',
                minDate: today,
                maxDate: function () {
                    return $('#endDate').val();
                }
            });
            $('#endDate').datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd',
                iconsLibrary: 'fontawesome',
                minDate: function () {
                    return $('#startDate').val();
                }
            });
        </script>
        <div id="bookNowButtonDiv">
          <button id="bookNowButton" type="submit" class="btn btn-success" name="bookNow">Book Now</button>
        </div>
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
