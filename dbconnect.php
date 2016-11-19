<?php
  date_default_timezone_set('Asia/Bangkok');
  $con = mysqli_connect("localhost", "root", "", "mudining") or die("Error " . mysqli_error($con));
  mysqli_query($con, "SET NAMES 'utf8'");

  // Having some aggregated functions here
  function _imgurl($id, $subid) {
    $imgname = sprintf("%04d", $id);
    $imgurl = "Picture/".$imgname.'/'.$imgname.'-'.$subid.'.jpg';
    return $imgurl;
  }

  function imgurl($id) {
    return _imgurl($id, 1 + (rand() % 3));
  }

  function isresopen($opentime, $closetime) {
    $currenttime = doubleval(date('H.i'));
    return $opentime <= $currenttime && $currenttime <= $closetime;
  }

?>
