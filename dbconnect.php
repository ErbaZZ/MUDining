<?php
  $con = mysqli_connect("localhost", "root", "", "mudining") or die("Error " . mysqli_error($con));
  mysqli_query($con, "SET NAMES 'utf8'");

  // Having some aggregated functions here
  function imgurl($id) {
    $imgname = sprintf("%04d", $id);
    $imgurl = "Picture/" . $imgname . "/" . $imgname . '-1.jpg';
    return $imgurl;
  }
?>
