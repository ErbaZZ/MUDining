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
    return _imgurl($id, 1 + (rand() % 4));
  }

  function getrevimage($con, $rev) {
    require_once('fetch-img-review.php');
    $imgs = getimages($con, $rev['ReviewID']);
    array_push($imgs, _imgurl($rev['RestaurantID'], 1));
    array_push($imgs, _imgurl($rev['RestaurantID'], 2));
    array_push($imgs, _imgurl($rev['RestaurantID'], 3));
    array_push($imgs, _imgurl($rev['RestaurantID'], 4));
    return $imgs[rand() % sizeof($imgs)];
  }

  function totime($input) {
    $minutes = $input - floor($input);
    return gmdate("H:i", $minutes * 6000 + floor($input) * 3600);
  }

  function isresopen($opentime, $closetime) {
    $currenttime = doubleval(date('H.i'));
    return $opentime <= $currenttime && $currenttime <= $closetime;
  }

?>
