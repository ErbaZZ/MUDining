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

  function getrevimage($con, $rev) {
    require_once('fetch-img-review.php');
    $imgs = getimages($con, $rev['ReviewID']);
    array_push($imgs, imgurl($rev['RestaurantID']));
    return $imgs[rand() % sizeof($imgs)];
  }

  function isresopen($opentime, $closetime) {
    $currenttime = doubleval(date('H.i'));
    return $opentime <= $currenttime && $currenttime <= $closetime;
  }

?>
