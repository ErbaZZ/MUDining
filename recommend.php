<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
  $loggedin = isset($_SESSION['Username']);
  $range = 5;
  $ids = array();
  if (!$loggedin) {
    // A simple algorithm to predict desire restaurant just from ratings
    $revs = mysqli_query($con, "select RestaurantID, avg(Rating) as avr from rating group by RestaurantID order by avr desc limit ".$range);
    while ($rev = mysqli_fetch_assoc($revs))
      array_push($ids, $rev['RestaurantID']);
  } else {
    // An (advanced) algorithm to match your needs
    $selecty = mysqli_query($con, "select r.RestaurantID, r.Rating, u.FoodPreferences, res.Type, res.OpenTime, res.CloseTime, res.MinPrice, res.MaxPrice, res.Location from rating as r, user as u, restaurant as res where r.UserID = ".$_SESSION['ID']." and u.UserID = r.UserID and r.RestaurantID = res.RestaurantID order by Rating desc limit ".$range);
    while ($myres = mysqli_fetch_assoc($selecty)) {
      if (!isresopen($myres['OpenTime'], $myres['CloseTime']))
        continue;
      array_push($ids, $myres['RestaurantID']);
    }
  }
  $rsize = sizeof($ids);
  $ID = $rsize != 0 ? $ids[rand() % min($range, $rsize)] : -1;
  $res = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant where RestaurantID = '$ID' limit 1"));
?>

<link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
<style>.btn-group>.btn { width:inherit; }</style>
<div class="modal-content">
  <span class="close">×</span>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <img class="thumbnail" id="latest-review-img" src=<?php echo imgurl($res['RestaurantID']) ?>>
    </div>
    <div id="restaurant-name" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <a href=view-restaurant.php?id=<?php echo $ID ?>>
        <h1><?php echo $res['Name'] ?>
          <b><small> is your choice</small></b>
        </h1>
      </a>
    </div>
    <div class="col-lg-6 col-md-6 hidden-sm hidden-xs">
      <p><?php echo $res['Description'] ?></p>
    </div>
    <div class="col-lg-6 col-md-6">
      <?php $combine = 1; include('food-type.php'); ?>
    </div>
    <div class="col-lg-6 col-md-6">
      <?php
        $opentime = totime($res['OpenTime']);
        $closetime = totime($res['CloseTime']);
        $minprice = $res['MinPrice'].' THB';
        $maxprice = $res['MaxPrice'].' THB';
      ?>
      <ul class="pager">
        <li><i class="glyphicon glyphicon-time"></i> <span><?php echo $opentime . ' - ' . $closetime ?></span></li>
        <li><i class="glyphicon glyphicon-usd"></i> <span><?php echo $minprice . ' - ' . $maxprice ?></span></li>
      </ul>
    </div>
  </div>
</div>
