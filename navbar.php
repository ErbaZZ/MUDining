<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  include_once("dbconnect.php");
?>
<title>MUDining</title>
<nav class="navbar navbar-default navbar-fixed-top navbar-static-top" role="navigation">
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
        <li><a href="index.php"><span>Home </span><i class="glyphicon glyphicon-home"></i></a></li>
        <li><a href="restaurants.php"><span>Restaurants </span><i class="glyphicon glyphicon-cutlery"></i></a></li>
        <li><a href="reviews.php"><span>Reviews </span><i class="glyphicon glyphicon-pencil"></i></a></li>
        <li><a href="contact.php"><span>Contact Us </span><i class="glyphicon glyphicon-envelope"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" id="usermenus">
        <?php
          if (isset($_SESSION['Username'])) { ?>
            <li><a href="profile-edit.php"><span>Welcome, <?php echo $_SESSION['Username'] ?> </span><i class="glyphicon glyphicon-user"></i></a></li>
        <?php
        } else
            include("login-panel.php");
        ?>
      </ul>
    </div>
  </div>
</nav>
