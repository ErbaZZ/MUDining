<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/reviews.css" />

  <div id="wrapper" class="container" style="width:85%;">
    <div class="page-header">
      <h1 class="text-center">Reviews</h1>
    </div>
  <p class="lead text-center">Know how people think about restaurants.</p>
  <div class="container">
    <div class="row stylish-panel">
      <?php
        include_once("dbconnect.php");

        $con->query("CREATE TABLE IF NOT EXISTS review (
          ReviewID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          UserID int NOT NULL,
          RestaurantID int NOT NULL,
          ReviewDate date NOT NULL,
          Content text NOT NULL,
          `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          );
        ");
        $result = mysqli_query($con, "SELECT * FROM review");
        while ($row = mysqli_fetch_array($result)) {
          echo "<div class=\"col-md-4\">";
          echo '<a style="text-decoration:none;color:black;" href="#">';
          echo "<div>";
          $url = "http://lorempixel.com/200/200/abstract/" . $row['ReviewID'];
          echo "<img src=" . $url . '/ class="img-circle img-thumbnail">';
          $resname = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM restaurant WHERE restaurant.RestaurantID = " . $row['RestaurantID']))['Name'];
          echo "<h2>" . $resname . "</h2>";
          $name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM user WHERE user.UserID = " . $row['UserID']))['Username'];
          echo "<p>By " . $name . "</p>";
          echo "</div>";
          echo "</a>";
          echo "</div>";
        }
        mysqli_close($con);
      ?>
    </div>
  </div>

</body>
</html>
