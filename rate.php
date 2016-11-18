<?php
  include_once("dbconnect.php");
  $uid = $_GET['uid'];
  $rid = $_GET['rid'];
  $rate = $_GET['rate'];
  if(!mysqli_query($con, "INSERT INTO rating (UserID, RestaurantID, Rating) VALUES ('$uid', '$rid','$rate')")) {
    mysqli_query($con, "UPDATE rating SET Rating = '$rate' WHERE RestaurantID = '$rid' AND UserID = '$uid'");
  }
