<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
  $loggedin = isset($_SESSION['Username']);
  if (!$loggedin) {
    // A simple algorithm to predict desire restaurant just from ratings
    $range = 5;
    $revs = mysqli_query($con, "select RestaurantID, avg(Rating) as avr from rating group by RestaurantID order by avr desc limit ".$range);
    $ids = array();
    while ($rev = mysqli_fetch_assoc($revs))
      array_push($ids, $rev['RestaurantID']);
    $ID = $ids[rand() % $range];
  } else {
    $ID = rand() % 20;
  }
  $res = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant where RestaurantID = '$ID' limit 1"));
?>

<link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
<style>.btn-group>.btn { width:inherit; }</style>
<div id="recommend" class="modal">
  <div class="modal-content">
    <span class="close">×</span>
    <div class="row">
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <img class="thumbnail" id="latest-review-img" src=<?php echo imgurl($res['RestaurantID']) ?>>
      </div>
      <div id="restaurant-name" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <h1><?php echo $res['Name'] ?><b><small> is your choice</small></b></h1>
      </div>
      <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
        <p><?php echo $res['Description'] ?></p>
      </div>
      <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
        <?php $combine = 1; include('food-type.php'); ?>
      </div>
    </div>
  </div>
</div>
