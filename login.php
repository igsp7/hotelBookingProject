<?php
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


?>
