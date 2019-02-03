<?php
    include_once("Scripts/config.php");
    if(isset($_POST['select'])){
              $reservationid = $_POST['reservation_id'];
              $resulted = mysqli_query($mysqli, "select reservation.reservation_id,rooms.room_number,users.name,reservation.check_in_date,reservation.check_oute_date
                                                 from reservation
                                                 inner join users on reservation.user_id = users.user_id
                                                 inner join rooms on reservation.room_id = rooms.room_id
                                                 where reservation_id=$reservationid;");
              while ($res=mysqli_fetch_array($resulted))
              {
                $reservation_id = $res['reservation_id'];
                $room_number = $res['room_number'];
                $name = $res['name'];
                $check_in_date = $res['check_in_date'];
                $check_out_date = $res['check_oute_date'];
              }

              echo"<script src='jquery-3.3.1.min.js'></script>
              <script>$(document).ready(function(){ $('#updateModal').modal('show'); });</script>
              <div id='updateModal' class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-sm'>
                  <div class='modal-content'>
                    <form id=updateForm action='Scripts/updateReservation.php' method='POST'>
                      <div class='form-group'>
                             <form id=updateReservation action='' method='POST'>
                             <label for='exampleFormControlSelect1'>Select User ID</label>
                             <select name = 'user_id'class='form-control' id='exampleFormControlSelect1'>";

                                 $resulted = mysqli_query($mysqli, "SELECT user_id FROM users");
                                 while ($res=mysqli_fetch_array($resulted))
                                 {
                                   $userId = $res['user_id'];
                                   echo"<option>$userId</option>";
                                 }

                             echo"</select>
                             <label for='exampleFormControlSelect1'>Select Room ID</label>
                             <select type='text' name='room_id' class='form-control' id='exampleFormControlSelect1'>";

                               $resulted = mysqli_query($mysqli, "SELECT room_id FROM rooms");
                               while ($res=mysqli_fetch_array($resulted))
                               {
                                 $room_id = $res['room_id'];
                                 echo"<option>$room_id</option>";
                               }

                            echo"</select>

                                <div class='form-group'>
                                  Check In Date:<input type='text' class='form-control' name='check_in_date' id='startDate' placeholder='Check In Date' value='$check_in_date'>
                                </div>
                                <div class='form-group'>
                                  Check Out Date:<input type='text' class='form-control' name='check_out_date' id='endDate' placeholder='Check Out Date' value='$check_out_date'>
                                </div>
                                <button id='updatebutton' type='submit' class='btn btn-primary' name='update' value='$reservationid'>Update the Reservation</button>
                              </form>
                      </div>
                    </form>
                  </div>
                </div>
              </div>";


    }
?>
