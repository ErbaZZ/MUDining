<?php
  $dbServer = "localhost";
  $dbUser = "root";
  $dbPass = "";
  $dbName = "mudining";
  $db = new mysqli($dbServer, $dbUser, $dbPass, $dbName);

  // check connection
  if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
  }

  if(!isset($_POST['username'])) {
    header("LOCATION: register.php");
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $nickname = $_POST['nickname'];
  $gender = $_POST['sex'];
  $email = $_POST['email'];
  // Testing MySQLi queries
  $db->query("CREATE TABLE IF NOT EXISTS User (UserID int NOT NULL AUTO_INCREMENT PRIMARY KEY, Username varchar(255) NOT NULL UNIQUE, Password varchar(255) NOT NULL UNIQUE, FirstName varchar(255), LastName varchar(255), Nickname varchar(255), Gender character(1), Email varchar(255));");
//  $fn = array("John","John","Tim","James");
//  $ln = array("Smith","Ba","Beagle","Bond");
//  $nn = array("JS","JB","TB","JB");
//  for ($i=0; $i<sizeof($fn); $i++) {
//    // ***Problematic*** table name has to be in *lower case*, variables in VALUES have to be 'quoted'
    if(!$db->query("INSERT INTO user(Username, Password, FirstName, LastName, Nickname, Gender, Email) VALUES ('$username','$password','$firstname','$lastname','$nickname','$gender','$email');")) {
      header("LOCATION: register.php");
    }
//  }
  $data = $db->query("SELECT * FROM user;");
  while($row = $data->fetch_assoc())
  {
    echo $row['UserID'] . " " . $row['Username'] . " " . $row['Password'];
    echo "<br />";
  }
  $db->close();
?>
