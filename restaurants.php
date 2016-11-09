<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/restaurants.css" />

  <div id="wrapper" class="container" style="width:75%;">
    <section class="col-xs-12 col-sm-6 col-md-12">
      <div class="row">
    		<div>
  				<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;" style="width:100%;">
  						<input id="searchbox" name="searchbox" type="text" class="form-control" placeholder="Search by name..." autocomplete="off"/>
  				</form>
    		</div>
    	</div>
    </section>
    <section class="col-xs-12 col-sm-6 col-md-12 populated">
      <?php
        include_once("dbconnect.php");
        $con->query("CREATE TABLE IF NOT EXISTS restaurant (
          RestaurantID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          Name varchar(255) NOT NULL UNIQUE,
          MinPrice int(11) NOT NULL,
          Location varchar(255) NOT NULL,
          Type varchar(255) NOT NULL,
          OpenTime text,
          Promotion varchar(255));
        ");
        include 'restaurants/top_search.php'
      ?>
	   </section>
     <section class="col-xs-12 col-sm-6 col-md-12">
       <div class="tablesearch">
       </div>
 	   </section>
  </div>

  <script type="text/javascript" src="js/triggers.js"></script>
</body>
</html>
