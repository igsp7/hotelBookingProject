<?php
    include_once("config.php");
    if(isset($_POST['delete'])){
        $roomid = $_POST['Roomid'];
        $sql = "delete from rooms where room_id = '$roomid'";
        $resul= $mysqli->query($sql);
        header('LOCATION:../rooms.php');
    }
?>
