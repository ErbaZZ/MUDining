<?php
  session_start();
  $auto = isset($_GET['auto']);
  if (isset($_SESSION['Username']) && !$auto)
    header("Location: index.php");

  include_once("dbconnect.php");

  $result = mysqli_query($con, "SELECT * FROM user");

  if ($auto) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
  } else {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
  }

  $metusername = false;
  while ($row = mysqli_fetch_array($result)) {
    if ($row['Username'] == $username)
      $metusername = true;
    $checkpassword = $auto ? $password : md5(md5($username)."UMIDINGN".md5($password));
		if ($metusername && $row['Password'] == $checkpassword) {
			$_SESSION['ID'] = $row['UserID'];
      $_SESSION['Username'] = $username;
      $url = "www.mudining.co.th";
      if (isset($_POST['keeplogin'])) {
          setcookie('username', $username, time()+60*60*24*365, '/account', $url);
          setcookie('password', $password, time()+60*60*24*365, '/account', $url);
      } else {
          setcookie('username', $username, false, '/account', $url);
          setcookie('password', $password, false, '/account', $url);
      }
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
