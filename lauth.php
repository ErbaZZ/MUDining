<?php
  session_start();
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
    header("LOCATION: index.php");
  }

  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $db->close();
?>
