<?php
	include_once("../dbconnect.php");
	//header ( 'Content-type: text/plain');\
	$username = $_POST['username'];
	$restaurantName = $_POST['restaurantName'];
	$data = $_POST['formData'];
	foreach ($_POST as $key => $value) {
		echo "Key: ".$key."</br>";
		echo "    Value: ".$value."</br>";
	}
	$userID = mysqli_fetch_assoc(mysqli_query($con, "SELECT UserID FROM user WHERE user.Username = '$username' LIMIT 1"))['UserID'];
	$restaurantID = mysqli_fetch_assoc(mysqli_query($con, "SELECT RestaurantID FROM restaurant WHERE restaurant.Name = '$restaurantName' LIMIT 1"))['RestaurantID'];
	$reviewDate = date("Y-m-d H:i:s");
	//$result = mysqli_query($con, "SELECT * FROM restaurant WHERE restaurant.Name = " . $restaurantName. "LIMIT 1");
	if (!$con->query("INSERT INTO review (UserID, RestaurantID, ReviewDate, Content) VALUES ('$userID','$restaurantID','$reviewDate','$data');"))
		$errormsg = "You already reviewed"; // ?
	else {
		//header("refresh:3;url=../index.php");
	}

?>
