<?php
  include_once('dbconnect.php');
  if (!isset($_GET['id']))
    header('Location: index.php');
  $ID = $_GET['id'];
  $res = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant where RestaurantID = '$ID' LIMIT 1")) or header('Location: index.php');
?>
<html>
<head>
  <script src="js/css.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/view-restaurant.css" />
</head>
<body>
  <?php include_once("navbar.php"); ?>

  <div id="wrapper" class="container" style="width:85%;">
    <div class="container">
      <h1>
        <?php echo $res['Name']; ?>
      <br/>
          <small>
            test
         </small>
      </h1>
      <hr/>
      <div>
        <div id="carousel" class="carousel slide" data-ride="carousel" style="width:50%;display:block;margin:auto;">
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
      <div class="page-header"></div>

        <?php echo $res['Description']; ?>
      </div>
    </div>
  </div>
</body>
</html>
