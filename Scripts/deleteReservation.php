<?php
    include_once("config.php");
    if(isset($_POST['delete'])){
              $reservationid = $_POST['reservation_id'];
              $sql = "delete from reservation where reservation_id = '$reservationid'";
              $resul= $mysqli->query($sql);
              header('LOCATION:../reservations.php');
    }
?>
