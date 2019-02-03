<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:home.php');
        die();
    }
    include_once("Scripts/config.php");
    $result = mysqli_query($mysqli, "SELECT * FROM users");
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
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"/> -->
    <!-- <link rel="stylesheet" href="https://cdn.rawgit.com/tarkhov/postboot/v1.0.0-beta3/dist/css/postboot.min.css""/> -->
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" type="text/css" href="style.css">

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
      <button id=btn class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#addRoomModal" type="Button">Add a User</button>
      <!-- <button id=btn class="btn btn-outline-primary my-2 my-sm-0" data-toggle="modal" data-target="#selectModal" type="button">Update a User</button> -->
      <button id=btn class="btn btn-outline-danger my-2 my-sm-0" data-toggle="modal" data-target="#deleteModal" type="button">Delete a User</button>
  </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">User ID</th>
      <th scope="col">Name</th>
      <th scope="col">Age</th>
      <th scope="col">Email</th>
      <th scope="col">Adress</th>
      <th scope="col">Telephone</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($res=mysqli_fetch_array($result))
    {
        $user_id = $res['user_id'];
        $name=$res['name'];
        $age=$res['age'];
        $email=$res['email'];
        $adress=$res['adress'];
        $telephone=$res['telephone'];

    echo "<tr>
      <th scope='row'>$user_id</th>
      <td>$name</td>
      <td>$age</td>
      <td>$email</td>
      <td>$adress</td>
      <td>$telephone</td>
    </tr>";
    };
    ?>
  </tbody>
</table>

<div class="modal body" id=addRoomModal tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <form id=addForm action="Scripts/addUser.php" method='POST'>
        <div class="form-group">
          <input type="text" class="form-control" name="username"  placeholder="User's Name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="userage" placeholder="User's Age">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="useremail" placeholder="e-Mail">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="useradress" placeholder="User's Adress">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="usertelephone"placeholder="Telephone">
        </div>
        <button type="submit" class="btn btn-primary" name="insert" value="Ιnsert">Add User</button>
      </form>
    </div>
  </div>
</div>

<div id="deleteModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form id=deleteForm action="Scripts/deleteUser.php" method='POST'>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Delete User with ID :</label>
          <select type="text" name="userid" class="form-control" id="exampleFormControlSelect1">
            <?php
            $resulted = mysqli_query($mysqli, "SELECT user_id,name FROM users");
            while ($res=mysqli_fetch_array($resulted))
            {
              $userid = $res['user_id'];
              echo"<option>$userid</option>";
            }
            ?>
          </select>
        </div>
        <button type="submit" class="btn btn-danger" name="delete" value="delete">Delete User</button>
      </form>
    </div>
  </div>
</div>


  </body>
</html>
