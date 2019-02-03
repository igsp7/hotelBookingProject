<?php
    include_once("config.php");
    if(isset($_POST['bookNow'])){
      $user_name=$_POST['name'];
      $user_age=$_POST['age'];
      $user_email=$_POST['email'];
      $user_adress=$_POST['address'];
      $user_telephone=$_POST['phone'];
      $room_number = $_POST['room_number'];
      $check_in_date = $_POST['check_in_date'];
      $check_out_date = $_POST['check_out_date'];

      $userResult =mysqli_query($mysqli, "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1");
      $row=mysqli_fetch_row($userResult);
      $user_id = $row[0] + 1;

      $roomResult =mysqli_query($mysqli, "SELECT room_id FROM rooms where room_number =$room_number ");
      $row1=mysqli_fetch_row($roomResult);
      $room_id = $row1[0];


      $sql = "insert into users (name,age,adress,email,telephone)
                        values('$user_name','$user_age','$user_adress','$user_email','$user_telephone')";
      $resul= $mysqli->query($sql);
                $sql1 = "insert into reservation (user_id,room_id,check_in_date,check_oute_date)
                        values('$user_id','$room_id','$check_in_date','$check_out_date')";
                          $resul1= $mysqli->query($sql1);

                echo"<script src='jquery-3.3.1.min.js'></script>
                <script>$(document).ready(function(){ $('#successModal').modal('show'); });</script>
                <div id='successModal' class='modal' tabindex=''-1' role='dialog'>
                      <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                          <div class='modal-header'>
                            <h5 class='modal-title'>Successfull Booking</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                              <span aria-hidden='true'>&times;</span>
                            </button>
                          </div>
                          <div class='modal-body'>
                            <p>Your room is waiting for you.</p>
                          </div>
                          <div class='modal-footer'>
                            <button type='button' class='btn btn-success' data-dismiss='modal'>OK</button>
                          </div>
                        </div>
                      </div>
                    </div>";
    }
?>
