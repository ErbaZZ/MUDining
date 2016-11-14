<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/restaurants.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />

  <div id="wrapper" class="container" style="width:70%;">
    <section class="col-xs-12 col-sm-6 col-md-12 page-header">
      <div class="row">
    		<div class="col-lg-6 col-sm-12 col-xs-12">
  				<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
  						<input id="searchbox" name="searchbox" type="text" class="form-control" placeholder="Search by name..." autocomplete="off"/>
  				</form>
    		</div>
        <form id="filter1">
          <div class="btn-group col-lg-6 col-sm-12 col-xs-12" data-toggle="buttons">
            <label class="btn btn-success">
              <input type="checkbox" name="foodprefs[]" value="01">Thai
            </label>
            <label class="btn btn-success">
              <input type="checkbox" name="foodprefs[]" value="02">Japanese
            </label>
            <label class="btn btn-success">
              <input type="checkbox" name="foodprefs[]" value="03">Chinese
            </label>
            <label class="btn btn-success">
              <input type="checkbox" name="foodprefs[]" value="04">European
            </label>
      		</div>
        </form>
    	</div>
      <div class="row">
        <form id="filter2">
          <div class="btn-group col-lg-6 col-sm-12 col-xs-12 col-lg-offset-6" data-toggle="buttons">
            <label class="btn btn-primary">
              <input type="checkbox" name="foodprefs[]" value="11">Single Dish
            </label>
            <label class="btn btn-primary">
              <input type="checkbox" name="foodprefs[]" value="12">Set Menu
            </label>
            <label class="btn btn-primary">
              <input type="checkbox" name="foodprefs[]" value="13">Buffet
            </label>
          </div>
        </form>
      </div>
    </section>
    <section class="col-xs-12 col-sm-6 col-md-12 populated">
      <?php
        include_once("dbconnect.php");
        $con->query("CREATE TABLE IF NOT EXISTS restaurant (
          RestaurantID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
          Name varchar(255) NOT NULL UNIQUE,
          MinPrice int NOT NULL,
          MaxPrice int,
          Location varchar(255) NOT NULL,
          Type varchar(255) NOT NULL,
          OpenTime double NOT NULL,
          CloseTime double NOT NULL,
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
