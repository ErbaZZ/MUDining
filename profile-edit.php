<?php
  if (session_id() == '' || !isset($_SESSION))
    session_start();
  if (!isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");

  if (isset($_POST['firstname'])) {
    $username = $_SESSION['Username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $foodprefs = "";

    if (!empty($_POST['foodprefs'])) {
        foreach($_POST['foodprefs'] as $pref) {
          $foodprefs .= $pref . ",";
        }
    }

    if (!$con->query("UPDATE user SET
                        FirstName='$firstname',
                        LastName='$lastname',
                        Nickname='$nickname',
                        Email='$email',
                        FoodPreferences='$foodprefs'
                        WHERE Username='$username';")) {
        $_SESSION['msg'] = "Something's wrong";
      }
    else {
      $_SESSION['msg'] = "Changes saved";
    }
  }
?>
<html>
<head>
  <script src="js/css.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/profile-edit.css" />
  <link rel="stylesheet" type="text/css" href="assets/css/checkbox.css" />
</head>
<body>
  <?php
    include_once("navbar.php");
    $username = $_SESSION['Username'];
    $user = mysqli_query($con, "SELECT * FROM user WHERE Username='$username'");
    $row = mysqli_fetch_assoc($user);
  ?>
    <div id="profile">
      <div id="wrapper" class="container" style="width:45%;">
      <h1 class="text-center">Edit Profile</h1>
        <form class="form-horizontal" role="form" name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="row">
            <div class="form-group">
              <label for="username" class="col-xs-3">Username:</label>
              <div class="col-xs-9">
                <p><?php echo $row['Username']; ?></p>
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
                    echo "<p>Male</p>";
                  }
                  else {
                    echo "<p>Female</p>";
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
                    <label class="btn btn-primary <?php if (strpos("x".$row['FoodPreferences'], '01') !== false) {echo 'active';} ?>">
                        <input type="checkbox" name="foodprefs[]" value="01" <?php if (strpos("x".$row['FoodPreferences'], '01') !== false) {echo 'checked';} ?>>Thai
                    </label>
                    <label class="btn btn-default <?php if (strpos("x".$row['FoodPreferences'], '02') !== false) {echo 'active';} ?>">
                        <input type="checkbox" name="foodprefs[]" value="02 <?php if (strpos("x".$row['FoodPreferences'], '02') !== false) {echo 'checked';} ?>">Japanese
                    </label>
                    <label class="btn btn-warning <?php if (strpos("x".$row['FoodPreferences'], '03') !== false) {echo 'active';} ?>">
                        <input type="checkbox" name="foodprefs[]" value="03" <?php if (strpos("x".$row['FoodPreferences'], '03') !== false) {echo 'checked';} ?>>Chinese
                    </label>
                    <label class="btn btn-success <?php if (strpos("x".$row['FoodPreferences'], '04') !== false) {echo 'active';} ?>">
                        <input type="checkbox" name="foodprefs[]" value="04" <?php if (strpos("x".$row['FoodPreferences'], '04') !== false) {echo 'checked';} ?>>European
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="btn-group col-xs-12" data-toggle="buttons">
                    <label class="btn btn-info <?php if (strpos("x".$row['FoodPreferences'], '11') !== false) {echo 'active';} ?>">
                      <input type="checkbox" name="foodprefs[]" value="11" <?php if (strpos("x".$row['FoodPreferences'], '11') !== false) {echo 'checked';} ?>>Single Dish
                    </label>
                    <label class="btn btn-default <?php if (strpos("x".$row['FoodPreferences'], '12') !== false) {echo 'active';} ?>" style="background-color:#ddd;">
                      <input type="checkbox" name="foodprefs[]" value="12" <?php if (strpos("x".$row['FoodPreferences'], '12') !== false) {echo 'checked';} ?>>Set Menu
                    </label>
                    <label class="btn btn-danger <?php if (strpos("x".$row['FoodPreferences'], '13') !== false) {echo 'active';} ?>">
                      <input type="checkbox" name="foodprefs[]" value="13" <?php if (strpos("x".$row['FoodPreferences'], '13') !== false) {echo 'checked';} ?>>Buffet
                    </label>
                  </div>
                </div>
              </div>
            </div>
      		<div class="text-center">
      			<input type="submit" class="btn btn-default" value="Save changes">
              <a href="logout.php"><input type="button" class="btn btn-danger" value="Log out"></input></a>
              <?php
                if (isset($_SESSION['msg'])) {
                  echo "</br><label style='color: green'>".$_SESSION['msg']."</label>";
                  unset($_SESSION['msg']);
                }?>
      		</div>

      	</form>
    </div>
  </div>

</body>
</html>
