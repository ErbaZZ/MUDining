<?php
  session_start();
  if (isset($_SESSION['Username']))
    header("Location: index.php");
  include_once("dbconnect.php");

  if (isset( $_POST['username'])) {
    $username = $_POST['username'];
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  	$password = md5(md5($username)."UMIDINGN".md5($password));
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $gender = $_POST['sex'];
    $email = $_POST['email'];

    $con->query("CREATE TABLE IF NOT EXISTS User (UserID int NOT NULL AUTO_INCREMENT PRIMARY KEY, Username varchar(255) NOT NULL UNIQUE, Password varchar(255) NOT NULL UNIQUE, FirstName varchar(255), LastName varchar(255), Nickname varchar(255), Gender character(1), Email varchar(255));");
    if (!$con->query("INSERT INTO user(Username, Password, FirstName, LastName, Nickname, Gender, Email) VALUES ('$username','$password','$firstname','$lastname','$nickname','$gender','$email');"))
      $errormsg = "Username is already used.";
    else
      $successmsg = "Successfully Registered. Redirecting to home page.";
      $_SESSION['Username'] = $username;
      header("refresh:2;url=index.php");
    $con->close();
  }
?>
<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/register.css" />

  <div id="wrapper" class="container">

    <div id="register" class="animate form">
      <span class="head">Registration</span>
      <form name="input" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    		<table align="center">
          <tr><td class="formLabel">Username:</td><td><input type="text" name="username" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required></td></tr>
          <tr><td class="formLabel">Password:</td><td><input type="password" name="password" pattern="[A-Za-z0-9]{1,}" title="Letters or numbers only" required></td></tr>
    			<tr><td class="formLabel">First name:</td><td><input type="text" name="firstname" pattern="[A-Za-z]{1,}" title="Letters only" required></td></tr>
    			<tr><td class="formLabel">Last name:</td><td><input type="text" name="lastname" pattern="[A-Za-z]{1,}" title="Letters only" required></td></tr>
    			<tr><td class="formLabel">Nickname:</td><td><input type="text" name="nickname" pattern="[A-Za-z]{1,}" title="Letters only"></td></tr>
    			<tr><td class="formLabel">Gender:</td><td>
    										<input type="radio" name="sex" value="m" checked> Male
    										<input type="radio" name="sex" value="f"> Female
    								<br/>
    			</td></tr>
          <tr><td class="formLabel">Email:     </td><td><input type="email" name="email" required></td></tr>
    			<tr><td class="formLabel">Food Preferences:   </td><td>
    										<input type="checkbox" name="foodprefs" value="thai"> Thai
    										<input type="checkbox" name="foodprefs" value="japan"> Japan
    										<input type="checkbox" name="foodprefs" value="foo"> Foo
    										<input type="checkbox" name="foodprefs" value="foo2"> Foo2<br/>
    										<input type="checkbox" name="foodprefs" value="foo3"> Foo3
                        <br/>
    		</table>
    		<b id="regisbtn">
    			<input type="submit" value="Submit" style="font-size:24px;color:blue;">
    			<input type="reset" value="Reset" style="font-size:24px;color:red;">
    		</b>
    		<br/><br/>
    	</form>
      <span>
      <?php
        if (isset($errormsg))
          echo $errormsg;
        else if (isset($successmsg))
          echo $successmsg;
      ?>
      </span>
    </div>
  </div>
</body>
</html>
