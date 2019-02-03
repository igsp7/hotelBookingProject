<?php
    include_once("config.php");
    if(isset($_POST['update'])){
      $reservationid = $_POST['update'];
      $userId = $_POST['user_id'];
      $roomId = $_POST['room_id'];
      $check_in_date = $_POST['check_in_date'];
      $check_out_date = $_POST['check_out_date'];

      $sql = "update reservation set user_id='$userId' ,room_id ='$roomId', check_in_date='$check_in_date', check_oute_date='$check_out_date' where reservation_id = '$reservationid'";
      $resul= $mysqli->query($sql);
      header('LOCATION:../reservations.php');
    }
?>
