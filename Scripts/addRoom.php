<?php
  include_once("config.php");
    if(isset($_POST['insert'])){
              $roomnumber = $_POST['RoomNumber'];
              $price = $_POST['RoomPrice'];
              $floor = $_POST['RoomFloor'];
              $roomtype = $_POST['RoomType'];
              $bedsnumber = $_POST['BedsNumber'];
              $bathnumber = $_POST['BathroomsNumber'];
              $roomdesc = $_POST['RoomDescription'];
              $foto = $_POST['Photo'];
              $sql = "insert into rooms (room_number,price,floor,room_type,beds_number,bathrooms_number,room_description,photo)
                        values('$roomnumber','$price','$floor','$roomtype','$bedsnumber','$bathnumber','$roomdesc','$foto')";
              $resul= $mysqli->query($sql);
              header('LOCATION:../rooms.php');
    }
?>
