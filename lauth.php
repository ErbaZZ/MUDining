<?php
  session_start();
  if (isset($_SESSION['ID']))
    header("Location: index.php");

  include_once("dbconnect.php");

  $result = mysqli_query($con, "SELECT * FROM user");

  $username = $_POST['username'];
  $password = $_POST['password'];

  $metusername = "false";
  if ($row = mysqli_fetch_array($result)) {
    if ($row['Username'] == $username)
      $metusername = true;
		if ($row['Username'] == $username && $row['Password'] == $password) {
			$_SESSION['ID'] = $row['UserID'];
      $_SESSION['Username'] = $username;
      header("Location: index.php");
		}
  }
	if ($metusername)
		$_SESSION['inpass'] = "Invalid password";
	else
		$_SESSION['inuser'] = "Your username is not recognized.  Please register to our system.";
	mysqli_close($con);

?>
