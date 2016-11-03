<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">MU<strong>Dining</strong></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="diningmenus">
        <li><a href="index.php">Home</a></li>
        <li><a href="restaurants.php">Restaurants</a></li>
        <li><a href="reviews.php">Reviews</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>
    			<ul id="login-dp" class="dropdown-menu">
    				<li>
    					 <div class="row">
    							<div class="col-md-12">
    								 <form class="form" role="form" method="post" action="lauth.php" accept-charset="UTF-8" id="login-nav">
    										<div class="form-group">
    											 <label class="sr-only" for="usernamebox">Username</label>
    											 <input type="text" class="form-control" id="usernamebox" name="username" placeholder="Username" required>
    										</div>
    										<div class="form-group">
    											 <label class="sr-only" for="passwordbox">Password</label>
    											 <input type="password" class="form-control" id="passwordbox" name="password" placeholder="Password" required>
                                                 <div class="help-block text-right"><a href="#">Forget the password?</a></div>
    										</div>
    										<div class="form-group">
    											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>
    										</div>
    										<div class="checkbox">
    											 <label>
    											 <input type="checkbox" name="keeplogin">Keep me logged in
    											 </label>
    										</div>
    								 </form>
    							</div>
    							<div class="bottom text-center">
    								New here ? <a href="register.php"><b>Register</b></a>
    							</div>
    					 </div>
    				</li>
    			</ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
