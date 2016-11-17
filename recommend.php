<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
  $loggedin = isset($_SESSION['Username']);
  $ID = rand() % 20;
  $res = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant where RestaurantID = '$ID' LIMIT 1"));
?>

<div id="recommend" class="modal">
  <div class="modal-content">
    <span class="close">×</span>
    <p>Lorem ipsum Restaurant</p>
  </div>
</div>
