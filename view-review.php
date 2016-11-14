<?php
  include_once('dbconnect.php');
  if (!isset($_GET['id']))
    header('Location: index.php');
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  $ID = $_GET['id'];
  $res = mysqli_fetch_assoc(mysqli_query($con, "select * from review where ReviewID = '$ID' LIMIT 1")) or header('Location: index.php');
?>
<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>

  <div id="wrapper" class="container" style="width:90%;">
    <div class="container">
      <h1>
        <?php
          $resname = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant, review where review.ReviewID = '$ID' and restaurant.RestaurantID = review.RestaurantID LIMIT 1"))['Name'];
          echo $resname;
        ?>
      <br/>
            <?php
              if (isset($_SESSION['Username'])) {
                $userID = mysqli_fetch_assoc(mysqli_query($con, 'select * from user where Username = "' . $_SESSION['Username'] . '" LIMIT 1'))['UserID'];
                $result = mysqli_query($con, "select UserID from review where UserID = '$userID' and ReviewID = '$ID'");
                if ($result->num_rows) {
                  echo "<small><a href=\"delete-review.php\">Delete</a></small>";
                }
              }
            ?>
      </h1>
      <hr/>
      <div>
        <?php echo $res['Content']; ?>
      </div>
    </div>
  </div>

</body>
</html>
