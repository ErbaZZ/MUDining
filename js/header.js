/*document.write('\
<div id="banner" class="fixed-top">\
  <h1><a href="index.html">MU <strong>Dining</strong></a></h1>\
  <nav><ul>\
			<li><a href="index.html">home</a></li>\
			<li><a href="#">restaurants</a></li>\
			<li><a href="#">reviews</a></li>\
			<li><a href="contact.html">contact</a></li>\
		</ul>\
</div>\
');*/
document.write('\
<nav class="navbar navbar-default" role="navigation">\
  <div class="container-fluid">\
    <div class="navbar-header">\
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">\
        <span class="sr-only">Toggle navigation</span>\
        <span class="icon-bar"></span>\
        <span class="icon-bar"></span>\
        <span class="icon-bar"></span>\
      </button>\
      <a class="navbar-brand" href="#">MU <strong>Dining</strong></a>\
    </div>\
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">\
      <ul class="nav navbar-nav">\
        <li class="active"><a href="index.html">Home</a></li>\
        <li><a href="#">Restaurants</a></li>\
        <li><a href="#">Reviews</a></li>\
        <li><a href="contact.html">Contact Us</a></li>\
      </ul>\
      <ul class="nav navbar-nav navbar-right">\
        <li class="dropdown">\
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>\
			<ul id="login-dp" class="dropdown-menu">\
				<li>\
					 <div class="row">\
							<div class="col-md-12">\
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">\
										<div class="form-group">\
											 <label class="sr-only" for="exampleInputEmail2">Email address</label>\
											 <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email address" required>\
										</div>\
										<div class="form-group">\
											 <label class="sr-only" for="exampleInputPassword2">Password</label>\
											 <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" required>\
                                             <div class="help-block text-right"><a href="">Forget the password ?</a></div>\
										</div>\
										<div class="form-group">\
											 <button type="submit" class="btn btn-primary btn-block">Sign in</button>\
										</div>\
										<div class="checkbox">\
											 <label>\
											 <input type="checkbox"> keep me logged-in\
											 </label>\
										</div>\
								 </form>\
							</div>\
							<div class="bottom text-center">\
								New here ? <a href="register.html"><b>Register</b></a>\
							</div>\
					 </div>\
				</li>\
			</ul>\
        </li>\
      </ul>\
    </div>\
  </div>\
</nav>\
');
