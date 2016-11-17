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
  <script src="js/star-rating.min.js" type="text/javascript"></script>
  <link href="assets/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="assets/css/view-restaurant.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
</head>
<body>
  <?php include_once("navbar.php"); ?>

  <div id="wrapper" class="container" style="width:85%;">
    <div class="container" style="width:100%;">
      <h1>
        <?php echo $res['Name']; ?>
      <br/>
          <small>
            test
         </small>
      </h1>
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
      <br/>
      <div class="row text-center">
        <div class="btn-group" id="foodtype" data-toggle="buttons">
          <?php if (strpos($res['Type'], '01') !== false) { ?>
          <label class="btn btn-success active"> <?php } else { ?> <label class="btn btn-success"> <?php } ?>
            <input type="checkbox">Thai
          </label>
          <?php if (strpos($res['Type'], '02') !== false) { ?>
          <label class="btn btn-warning active"> <?php } else { ?> <label class="btn btn-warning"> <?php } ?>
            <input type="checkbox">Japanese
          </label>
          <?php if (strpos($res['Type'], '03') !== false) { ?>
          <label class="btn btn-danger active"> <?php } else { ?> <label class="btn btn-danger"> <?php } ?>
            <input type="checkbox">Chinese
          </label>
          <?php if (strpos($res['Type'], '04') !== false) { ?>
          <label class="btn btn-primary active"> <?php } else { ?> <label class="btn btn-primary"> <?php } ?>
            <input type="checkbox">European
          </label>
        </div>
      </div>
      <div class="row text-center">
        <div class="btn-group" id="dishtype" data-toggle="buttons">
          <?php if (strpos($res['Type'], '11') !== false) { ?>
          <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
            <input type="checkbox">Single Dish
          </label>
          <?php if (strpos($res['Type'], '12') !== false) { ?>
          <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
            <input type="checkbox">Set Menu
          </label>
          <?php if (strpos($res['Type'], '13') !== false) { ?>
          <label class="btn btn-default active"> <?php } else { ?> <label class="btn btn-default"> <?php } ?>
            <input type="checkbox">Buffet
          </label>
        </div>
      </div>
      <div class="row text-center page-header">
        <input id='input-7-xs' class='rating' value='0' data-min='0' data-max='5' data-step='1' data-size='xs'>
      </div>
      <div class="row" id="description">
        <?php echo $res['Description']; ?>
      </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      $('#foodtype').prop('disabled', true);
      $('#dishtype').prop('disabled', true);
    });
  </script>
</body>
</html>
