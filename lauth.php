<?php
  session_start();
  if (isset($_SESSION['Username']))
    header("Location: index.php");

  include_once("dbconnect.php");

  $result = mysqli_query($con, "SELECT * FROM user");

  $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

  $metusername = false;
  while ($row = mysqli_fetch_array($result)) {
    if ($row['Username'] == $username)
      $metusername = true;
		if ($metusername && $row['Password'] == md5(md5($username)."UMIDINGN".md5($password))) {
			$_SESSION['ID'] = $row['UserID'];
      $_SESSION['Username'] = $username;
      header("Location: index.php");
		}
  }
	if ($metusername)
		$_SESSION['inpass'] = "Invalid password";
	else
		$_SESSION['inuser'] = "Your username is not recognized.  Please register to our system.";
  // looking for better feedback of these cases
  header("Location: index.php");
  mysqli_close($con);

?>
