<?php
    include_once("config.php");
    if(isset($_POST['insert'])){
              $username=$_POST['username'];
              $userage=$_POST['userage'];
              $useremail=$_POST['useremail'];
              $useradress=$_POST['useradress'];
              $usertelephone=$_POST['usertelephone'];

                $sql = "insert into users (name,age,email,adress,telephone)
                        values('$username','$userage','$useremail','$useradress','$usertelephone')";
                $resul= $mysqli->query($sql);
                header('LOCATION:../users.php');
    }
?>
