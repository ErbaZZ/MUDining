<?php
  session_start();
  $dbServer = "localhost";
  $dbUser = "root";
  $dbPass = "";
  $dbName = "mudining";
  $metusername="false";
    $con = new mysqli($dbServer, $dbUser, $dbPass, $dbName);
    $go = false;

    $result = mysqli_query($con,"SELECT * FROM user");

    $username = $_POST['username'];
    $password = $_POST['password'];
    #echo $username;
    #echo $password;

    while($row = mysqli_fetch_array($result)){
    if($row['Username']==$username){
        $metusername = true;	
    }		
			if($row['Username']==$username && $row['Password']==$password){
				$_SESSION['id'] = $row['UserID'];	
				$go = true;
                $_SESSION['Checked'];
			}
        
    }
	if($go){header('Refresh:0;/MUDining/index.php');
	}else{
		if($metusername){
			$_SESSION['inpass'] = "Invalid password";
		}else{
			$_SESSION['inuser'] = "Your username is not recognized.  Please register to our system.";
		}	
		
	} 
	mysqli_close($con);

?>
