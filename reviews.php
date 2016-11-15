<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/reviews.css" />

  <div id="wrapper" class="container" style="width:85%;">
  <div class="container">
    <div class="row stylish-panel">
      <?php
        include_once("dbconnect.php");

        $con->query("CREATE TABLE IF NOT EXISTS review (
          ReviewID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          UserID int NOT NULL,
          RestaurantID int NOT NULL,
          ReviewDate date NOT NULL,
          Title varchar(64) NOT NULL,
          Content text NOT NULL,
          `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
          );
        ");
        $result = mysqli_query($con, "SELECT * FROM review");
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
          if ($count == 0 || ($count > 1 && $count % 3 == 0))
            echo "<div class=\"row\">";
          echo "<div class=\"col-md-4 col-xs-4\">";
          echo "<a style='text-decoration:none;color:black;' href='view-review.php?id=" . $row["ReviewID"] . "'>";
          echo "<div>";
          $url = "http://lorempixel.com/200/200/abstract/" . $row['ReviewID']%11;
          echo "<img src=" . $url . '/ class="img-thumbnail">';
          $revtitle = $row['Title'];
          echo "<h3>" . $revtitle . "</h3>";
          $resname = mysqli_fetch_assoc(mysqli_query($con, "SELECT Name FROM restaurant WHERE restaurant.RestaurantID = " . $row['RestaurantID'] . " LIMIT 1"))['Name'];
          $name = mysqli_fetch_assoc(mysqli_query($con, "SELECT Username FROM user WHERE user.UserID = " . $row['UserID'] . " LIMIT 1"))['Username'];
          echo "<p>@" . $resname . " By " . $name . "</p>";
          echo "</div>";
          echo "</a>";
          echo "</div>";
          if (++$count % 3 == 0)
            echo "</div>";
        }
        mysqli_close($con);
      ?>
      <?php
        if (isset($_SESSION['Username'])) {
          if ($count % 3 == 0) { ?>
          <div class="row">
            <?php } ?>
            <div class="col-md-4 col-xs-4">
              <a style="text-decoration:none;color:blue;" href="review-editor.php">
                <div>
                  <img src="http://lorempixel.com/200/200/abstract/10/" class="img-thumbnail">
                  <h2>New review</h2>
                  <p>Create your own review here</p>
                </div>
              </a>
            </div>
            <?php
            if (++$count % 3 == 0) { ?>
              </div>
            <?php } ?>
          </div>
      <?php
     } else; ?>
    </div>
  </div>

</body>
</html>
