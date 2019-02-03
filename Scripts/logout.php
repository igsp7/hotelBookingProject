<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
    {
        logout();
    }

    function logout()
    {
      session_start();
      unset($_SESSION["username"]);
      unset($_SESSION['login']);



      header('Refresh: 2; URL = ../home.php');
    }
?>
