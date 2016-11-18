<?php
  include_once('dbconnect.php');
  if (!isset($_GET['id']))
    header('Location: index.php');
  $ID = $_GET['id'];
  $res = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant where RestaurantID = '$ID' LIMIT 1")) or header('Location: index.php');
  $av = mysqli_fetch_assoc(mysqli_query($con, "select AVG(Rating) as avr from rating where RestaurantID = '$ID'"))
?>
<html>
<head>
  <script src="js/css.js"></script>
  <script src="js/star-rating.js" type="text/javascript"></script>
  <link href="assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/css/view-restaurant.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <div id="wrapper" class="container" style="width:85%;">
    <div class="container" style="width:100%;">
      <h1>
        <?php echo $res['Name']; ?>
      </h1>
      <div class='row'><div class='col-xs-1'><label id='avrLabel'>Rating:</label></div><div class='col-xs-5'><input id="rater" name="rating" value="<?php echo $av['avr'];?>" data-size='xs' data-show-caption='true'></div></div>
      <hr/>
      <div>
        <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel" data-slide-to="0" class="active"></li>
          <li data-target="#carousel" data-slide-to="1"></li>
          <li data-target="#carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <?php
            for ($i = 1; $i <= 3; $i++) {
              echo '<div class=';
              if ($i == 1)
                echo '"item active"';
              else
                echo '"item"';
              echo '><img src='._imgurl($ID, $i).'>';
              echo '</div>';
            }
          ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="row text-center">
        <h3><small>
        <?php
          $location = "";
          switch ($res['Location']) {
            case "F":
              $location = "In front of your university"; break;
            case "R":
              $location = "At the back of your university"; break;
            case "I";
              $location = "Just inside your university"; break;
          }
          echo 'Where: '.$location;
        ?>
      </small></h3>
      </div>
      <?php include('food-type.php'); ?>
      <div class="row text-center page-header">
        <input id='rater' class='rating' value='0' data-min='0' data-max='5' data-step='1' data-size='xs'>
      </div>
      <div class="row" id="description">
        <?php echo $res['Description']; ?>
      </div>
      </div>
    </div>
  </div>
</body>
</html>
<script>
  $(document).ready(function(){
    $("#rater").rating({displayOnly: true});
  });
</script>
