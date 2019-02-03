<?php
    include_once("config.php");
    if(isset($_POST['update'])){
      $roomid = $_POST['update'];
      $roomnumber = $_POST['RoomNumber'];
      $price = $_POST['RoomPrice'];
      $floor = $_POST['RoomFloor'];
      $roomtype = $_POST['RoomType'];
      $bedsnumber = $_POST['BedsNumber'];
      $bathnumber = $_POST['BathroomsNumber'];
      $roomdesc = $_POST['RoomDescription'];
      $foto = $_POST['Photo'];
      $sql = "update rooms set room_number='$roomnumber' ,price ='$price', floor='$floor', room_type ='$roomtype', beds_number = '$bedsnumber', bathrooms_number = '$bathnumber', room_description = '$roomdesc', photo = '$foto' where room_id = '$roomid'";
      $resul= $mysqli->query($sql);
      header('LOCATION:../rooms.php');
    }
?>
