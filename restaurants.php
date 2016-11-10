<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/restaurants.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />

  <div id="wrapper" class="container" style="width:70%;">
    <section class="col-xs-12 col-sm-6 col-md-12 page-header">
      <div class="row">
    		<div class="col-xs-6">
  				<form class="form-horizontal" name="search" role="form" method="POST" onkeypress="return event.keyCode != 13;">
  						<input id="searchbox" name="searchbox" type="text" class="form-control" placeholder="Search by name..." autocomplete="off"/>
  				</form>
    		</div>
        <div class="col-xs-6">
          <label class="btn btn-default">Thai
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
          <label class="btn btn-default">Japanese
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
          <label class="btn btn-default">Chinese
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
          <label class="btn btn-default">European
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
    		</div>
    	</div>
      <div class="row">
        <div class="col-xs-6 col-xs-offset-6">
          <label class="btn btn-primary">Single Dish
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
          <label class="btn btn-primary">À la carte
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
          <label class="btn btn-primary">Buffet
            <input type="checkbox" class="badgebox" name="foo" value="foo"><span class="badge">&check;</span>
          </label>
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
