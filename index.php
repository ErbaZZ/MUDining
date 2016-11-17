<html>
<head>
  <script src="js/css.js"></script>
  <script type='text/javascript' src='js/jquery.mousewheel.min.js'></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css" />

  <div id="wrapper" class="container text-center">

    <button class="random_eat_button"><div id="random_label">Where to eat?</div></button>

  </div>

  <div id="bottombar-wrapper" class="navbar-fixed-bottom">
    <div id="bottombar">
      <?php
        include_once("dbconnect.php");
        $result = mysqli_query($con, "select * from review order by ReviewID desc limit 5");
        while ($res = mysqli_fetch_assoc($result)) {
          echo '<div class="text">';
            echo '<div class="row">';
              echo '<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">';
                  echo '<img class="thumbnail" id="latest-review-img" src='. imgurl($res['RestaurantID']).'>';
              echo '</div>';
              echo '<div class="caption col-lg-6 col-md-12 col-sm-12 col-xs-12">';
                echo "<h3>" . mysqli_fetch_assoc(mysqli_query($con, 'select * from restaurant where RestaurantID = ' . $res['RestaurantID'] . ' LIMIT 1'))['Name'] . "</h3>";
                echo "<p>By " . mysqli_fetch_assoc(mysqli_query($con, 'select * from user where UserID = ' . $res['UserID'] . ' LIMIT 1'))['Username'] . "</p>";
                echo "<p>" . $res['ReviewDate'] . "</p>";
                $url = "view-review.php?id=" . $res['ReviewID'];
                echo "<a href=\"$url\" class=\"btn btn-default\" role=\"button\">Read</a>";
              echo '</div>';
            echo '</div>';
          echo '</div>';
        }?>
    </div>
  </div>

</body>
<script>
  $(document).ready(function () {
     $("#bottombar-wrapper").mousewheel(function(event, delta) {
       this.scrollLeft -= (delta * 80);
       this.scrollRight -= (delta * 80);
       event.preventDefault();
     });
  });
</script>
</html>
