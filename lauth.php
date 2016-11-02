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
  
  try {
		$stmt = $db->prepare('SELECT user FROM WHERE Username="$username" and Password="$password" LIMIT 0,1');
		$stmt->execute();
		$resultSet = $stmt->get_result();
		$result = $resultSet->fetch_all();
		if ( count($result) ) {
			foreach($result as $row) { 
			echo 'Welcome';
			}
		} else {
		echo 'Wrong user name or password';
		exit;
		}
	} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
    }
	
  $db->close();
?>
