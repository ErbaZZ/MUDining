<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
?>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">MU<strong>Dining</strong></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="diningmenus">
        <li><a href="index.php">Home</a></li>
        <li><a href="restaurants.php">Restaurants</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if (isset($_SESSION['Username'])) { ?>
            <li><a> Welcome, <?php echo $_SESSION['Username'] ?></a></li>
            <li><a href="logout.php">Log out</a></li>
        <?php
          } else
            include("login-panel.html");
        ?>
      </ul>
    </div>
  </div>
</nav>
