<?php
    include_once("config.php");

    if(isset($_POST['delete'])){
        $roomid = $_POST['userid'];
        $sql = "delete from users where user_id = '$roomid'";
        $resul= $mysqli->query($sql);
        header('LOCATION:../users.php');
    }
?>
