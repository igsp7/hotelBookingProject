<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:home.php');
        die();
    }
    include_once("Scripts/config.php");
    include_once("Scripts/selectRoom.php");
    $result = mysqli_query($mysqli, "SELECT * FROM rooms");
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
    <link rel="stylesheet" href="css/style.css"/>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/postboot.min.js"></script>
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
        <a class="nav-link" href="reservations.php">Reservations <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rooms.php">Rooms</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="users.php">Users</a>
      </li>
    </ul>
    <form action="Scripts/logout.php" method="POST">
      <button type="submit" class="btn btn-outline-danger my-2 my-sm-0" name="logout">Logout</button>
    </form>
  </div>

</nav>
<form id="buttonsForm" class="form-inline my-2 my-lg-0">
  <div class="btn-toolbar">
      <button id=addRoomButton class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#addRoomModal" type="Button">Add a new Room</button>
      <button id=rmvRoom class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#selectModal" type="button">Update a Room</button>
      <button id=rmvRoom class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#deleteModal" type="button">Delete a Room</button>
  </div>
</form>
  <?php
  while ($res=mysqli_fetch_array($result))
  {
    $room_id = $res['room_id'];
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
        <p class='card-text'>Room ID: $room_id<br> Room Number: $room_number<br> $room_description <br> Price : $room_price$ <br> Room Number : $room_number <br> Room Floor : $room_floor <br> Number of Beds : $beds_number <br> Number of Bathrooms : $bathrooms_number</p>
      </div>
    </div>";
  }
  ?>


  <div class="modal body" id=addRoomModal tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
      <form id=addRoom action="Scripts/addRoom.php" method='POST'>
          <div class="form-group">

            <input type="text" class="form-control" name="RoomNumber" id="room_number" placeholder="Room Number">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="RoomFloor" id="room_floor" placeholder="Room Floor">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="RoomPrice" id="room_price" placeholder="Room Price">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="RoomType" id="room_type" placeholder="Room Type">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="BedsNumber" id="beds_number" placeholder="Beds Number">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="BathroomsNumber" id="bathrooms_number" placeholder="Bathrooms Number">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="RoomDescription" id="room_description" placeholder="Room Description">
          </div>
          <div class="form-group">

            <input type="text" class="form-control" name="Photo" id="photo" placeholder="Photo">
          </div>
          <button type="submit" class="btn btn-primary" name="insert" value="Ιnsert">Add Room</button>
        </form>

      </div>
    </div>
  </div>

  <div id="deleteModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id=deleteRoom action="Scripts/deleteRoom.php" method='POST'>


          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Room to Delete</label>
            <select type="text" name="Roomid" class="form-control" id="exampleFormControlSelect1">
              <?php
              $resulted = mysqli_query($mysqli, "SELECT room_id FROM rooms");
              while ($res=mysqli_fetch_array($resulted))
              {
                $room_id = $res['room_id'];
                echo"<option>$room_id</option>";
              }
              ?>
            </select>

          </div>
          <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete Room</button>
        </form>
      </div>
    </div>
  </div>
  <div id="selectModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <form id=selectRoom action="" method='POST'>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Room to Update</label>
            <select type="text" name="Roomid" class="form-control" id="exampleFormControlSelect1">
              <?php
              $resulted = mysqli_query($mysqli, "SELECT room_id FROM rooms");
              while ($res=mysqli_fetch_array($resulted))
              {
                $room_id = $res['room_id'];
                echo"<option>$room_id</option>";
              }
              ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary" name="select" value="select">Select Room</button>
        </form>
      </div>
    </div>
  </div>
  </body>
</html>
