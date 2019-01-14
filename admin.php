<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:home.php');
        die();
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
    #loginForm{
      margin-top: 20px;
      margin-bottom: 20px;
      margin-left: 20px;
      margin-right: 20px;
    }

    #adminImg{

            width: 30%;
            margin: auto;
            margin-top: 25px;
            margin-left: 500px;

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
        <a class="nav-link" href="reservations.php">Reservations <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="rooms.php">Rooms</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="users.php">Users</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <div class="btn-toolbar">
      </div>
    </form>
    <form action="logout.php" method="POST">
      <button type="submit" class="btn btn-outline-danger my-2 my-sm-0" name="logout">Logout</button>
    </form>
  </div>

</nav>
<img id=adminImg src="admin.png" alt="admin" align="middle">



  </body>
</html>
