<html>
<head>
  <script src="js/css.js"></script>
  <script type='text/javascript' src='js/jquery.mousewheel.min.js'></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/recommend.css" />
  <?php include_once("recommend.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css" />


  <div id="wrapper" class="container text-center">
    <button class="random_eat_button"><div id="random_label">Where to eat?</div></button>
  </div>

  <div id="bottombar-wrapper" class="navbar-fixed-bottom">
    <div id="bottombar">
      <?php
        include_once("dbconnect.php");
        $result = mysqli_query($con, "select * from review order by ReviewID desc limit 5");
        while ($res = mysqli_fetch_assoc($result)) { ?>
          <div class="text">
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <img class="thumbnail" id="latest-review-img" src=<?php echo imgurl($res['RestaurantID']) ?>>
              </div>
              <div class="caption col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <h3><?php echo mysqli_fetch_assoc(mysqli_query($con, 'select * from restaurant where RestaurantID = ' . $res['RestaurantID'] . ' LIMIT 1'))['Name'] ?></h3>
                <p>By <?php echo mysqli_fetch_assoc(mysqli_query($con, 'select * from user where UserID = ' . $res['UserID'] . ' LIMIT 1'))['Username'] ?></p>
                <p><?php echo $res['ReviewDate'] ?></p>
                <a href=view-review.php?id=<?php echo $res['ReviewID'] ?> class="btn btn-default" role="button">Read</a>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>
  </div>

</body>
<script src="js/index.js"></script>
</html>
