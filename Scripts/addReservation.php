<?php
    include_once("config.php");
    if(isset($_POST['insert'])){
              $userId = $_POST['user_id'];
              $roomId = $_POST['room_id'];
              $check_in_date = $_POST['check_in_date'];
              $check_out_date = $_POST['check_out_date'];
              $sql = "insert into reservation (user_id,room_id,check_in_date,check_oute_date)
                                        values('$userId','$roomId','$check_in_date','$check_out_date')";
              $resul= $mysqli->query($sql);
              header('LOCATION:../reservations.php');
    }
?>
