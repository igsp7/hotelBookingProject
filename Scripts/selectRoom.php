<?php
  include_once("Scripts/config.php");
    if(isset($_POST['select'])){
              $roomid = $_POST['Roomid'];
              $resulted = mysqli_query($mysqli, "SELECT * FROM rooms where room_id=$roomid");
              while ($res=mysqli_fetch_array($resulted))
              {
                $room_id = $res['room_id'];
                $room_number = $res['room_number'];
                $room_floor= $res['floor'];
                $room_price= $res['price'];
                $room_type=$res['room_type'];
                $beds_number=$res['beds_number'];
                $bathrooms_number=$res['bathrooms_number'];
                $room_description = $res['room_description'];
                $photo =$res['photo'];
              }
              echo"<script src='jquery-3.3.1.min.js'></script>
              <script>$(document).ready(function(){ $('#updateModal').modal('show'); });</script>
              <div id='updateModal' class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                <div class='modal-dialog modal-sm'>
                  <div class='modal-content'>
                    <form id=updateRoom action='Scripts/updateRoom.php' method='POST'>
                      <div class='form-group'>
                        <label for='exampleFormControlSelect1'>Add new values to the room</label>


                             <form id=addRoom action='' method='POST'>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='RoomNumber' id='room_number' placeholder='Room Number' value='$room_number'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='RoomFloor' id='room_floor' placeholder='Room Floor' value='$room_floor'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='RoomPrice' id='room_price' placeholder='Room Price' value='$room_price'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='RoomType' id='room_type' placeholder='Room Type' value='$room_type'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='BedsNumber' id='beds_number' placeholder='Beds Number' value='$beds_number'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='BathroomsNumber' id='bathrooms_number' placeholder='Bathrooms Number' value='$bathrooms_number'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='RoomDescription' id='room_description' placeholder='Room Description' value='$room_description'>
                                </div>
                                <div class='form-group'>

                                  <input type='text' class='form-control' name='Photo' id='photo' placeholder='Photo' value='$photo'>
                                </div>
                                <button id='updatebutton' type='submit' class='btn btn-primary' name='update' value='$roomid'>Update the Room</button>
                              </form>
                      </div>
                    </form>
                  </div>
                </div>
              </div>";


    }
?>
