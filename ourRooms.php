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
<div class="card flex-sm-row mb-gutter"><img class="card-img-top card-img-sm-left" src="room1.jpg"/>
  <div class="card-body">
    <h4 class="card-title">Basic Room</h4>
    <p class="card-text">1 Bed <br> 1 Bathroom <br> TV </p>
  </div>
</div>
</div>
  </body>
</html>
