<?php
  include_once("config.php");
  $result = mysqli_query($mysqli, "SELECT * FROM rooms");

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/postboot.min.css"/>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/postboot.min.js"></script>


    <title></title>
    <style media="screen">
    #bookbtn {
      margin-right: 7px;
    }
    #sitename{
      color: #2073f9;
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
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Login As Admin</button>
      </div>
    </form>
  </div>

</nav>

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

</div>
  </body>
</html>
