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
  <link rel="stylesheet" type="text/css" href="assets/css/view-review.css" />
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <div id="wrapper" class="container" style="width:90%;">
    <div class="container">
      <!--Modal-->
      <div class="modal fade" id="deleteModal" role="dialog">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
              <p>Do you really want to delete your review?</p>
            </div>
            <div class="modal-footer">
              <a class="btn btn-default" href="delete-review.php?id=<?php echo $ID ?>">Delete</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
      <h1>
        <b>
          <?php
            $title = mysqli_fetch_assoc(mysqli_query($con, "select * from review where review.ReviewID = '$ID' LIMIT 1"))['Title'];
            echo $title;
          ?>
        </b>
      </h1>
      <h2>
        <small>
          <?php
          $resname = mysqli_fetch_assoc(mysqli_query($con, "select * from restaurant, review where review.ReviewID = '$ID' and restaurant.RestaurantID = review.RestaurantID LIMIT 1"))['Name'];
          echo "@".$resname;
          ?>
          by <?php
            $username = mysqli_fetch_assoc(mysqli_query($con, "select * from user, review where review.ReviewID = '$ID' and user.UserID = review.UserID LIMIT 1"))['Username'];
            echo $username;
            if (isset($_SESSION['Username'])) {
              $userID = mysqli_fetch_assoc(mysqli_query($con, 'select * from user where Username = "' . $_SESSION['Username'] . '" LIMIT 1'))['UserID'];
              $result = mysqli_query($con, "select UserID from review where UserID = '$userID' and ReviewID = '$ID'");
              if ($result->num_rows) {
                echo " - <a href=\"edit-review.php?id=$ID\">Edit</a>";
                echo " - <a href='#deleteModal' role='button' data-toggle='modal'>Delete</a>";
              }
            }
          ?>
        </small>
      </h2>
      <hr/>
      <div id="content">
        <?php echo $res['Content']; ?>
      </div>
    </div>
  </div>
</body>
</html>
