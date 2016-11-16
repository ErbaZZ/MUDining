<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (!isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");
?>
<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php
    include_once("navbar.php");
    $username = $_SESSION['Username'];
    $user = mysqli_query($con, "SELECT * FROM user WHERE Username='$username'");
    $row = mysqli_fetch_assoc($user);
  ?>
  <link rel="stylesheet" type="text/css" href="assets/css/contact.css" />
    <div id="profile">
      <link rel="stylesheet" type="text/css" href="assets/css/register.css" />
      <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />

      <div id="wrapper" class="container" style="width:45%;">

      <h1 class="text-center">Edit Profile</h1>

        <form class="form-horizontal" role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="row">
            <div class="form-group">
              <label for="username" class="col-xs-3">Username:</label>
              <div class="col-xs-9">
                <label><?php echo $row['Username']; ?></label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="password" class="col-xs-3">New Password:</label>
              <div class="col-xs-9">
                <input class="form-control" type="password" name="password" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="cpassword" class="col-xs-3">Confirm</br>New Password:</label>
              <div class="col-xs-9">
                <input class="form-control" type="password" name="cpassword" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="firstname" class="col-xs-3">First name:</label>
              <div class="col-xs-9">
          		  <input class="form-control" type="text" name="firstname" pattern="[A-Za-z]{1,}" title="Letters only" value="<?php echo $row['FirstName'];?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="lastname" class="col-xs-3">Last name:</label>
              <div class="col-xs-9">
          		  <input class="form-control" type="text" name="lastname" pattern="[A-Za-z]{1,}" title="Letters only" value="<?php echo $row['LastName'];?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="username" class="col-xs-3">Nickname:</label>
              <div class="col-xs-9">
          		  <input class="form-control" type="text" name="nickname" pattern="[A-Za-z]{1,}" title="Letters only" value="<?php echo $row['Nickname'];?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="gender" class="col-xs-3">Gender:</label>
              <div class="col-xs-9">
                <?php
                  if ($row['Gender'] == 'm') {
                    echo "<label>Male</label>";
                  }
                  else {
                    echo "<label>Female</label>";
                  }
                ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="email" class="col-xs-3">Email:</label>
              <div class="col-xs-9">
                <input class="form-control" type="email" name="email" value="<?php echo $row['Email'];?>" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="foodpref" class="col-xs-3">Food Preferences:</label>
              <div id="foodpref" class="col-xs-9">
                <div class="row">
                  <div class="btn-group col-xs-12" data-toggle="buttons">
                    </label>
                    </label>
                    </label>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="btn-group col-xs-12" data-toggle="buttons">
                    </label>
                    </label>
                    </label>
                  </div>
                </div>
              </div>
            </div>
      		<div class="text-center">
      			<input type="submit" class="btn btn-default" value="Save changes">
      		</div>
      	</form>
    </div>
  </div>

</body>
</html>
