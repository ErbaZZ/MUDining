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
          RestaurantID int NOT NULL,
          ReviewDate date NOT NULL,
          Depiction text NOT NULL,
          Rating int
          );
        ");
        $result = mysqli_query($con, "SELECT * FROM review");
        while ($row = mysqli_fetch_array($result)) {
          echo "<div class=\"col-md-4\">";
          echo "<div>";
          $url = "http://lorempixel.com/200/200/abstract/" . $row['ReviewID'];
          echo "<img src=" . $url . '/ class="img-circle img-thumbnail">';
          $name = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM restaurant WHERE restaurant.RestaurantID = " . $row['RestaurantID']))['Name'];
          echo "<h2>" . $name . "</h2>";
          echo "<p>" . $row['Depiction'] . "</p>";
          echo "<a href=\"#\" class=\"btn btn-primary\" title=\"Read more\">Read more</a>";
          echo "</div>";
          echo "</div>";
        }
        mysqli_close($con);
      ?>
    </div>
  </div>

</body>
</html>
