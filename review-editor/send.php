<?php
	include_once("../dbconnect.php");
	$username = $_POST['username'];
	$restaurantName = $_POST['restaurantName'];
	$data = $_POST['formData'];
	$userID = mysqli_fetch_assoc(mysqli_query($con, "SELECT UserID FROM user WHERE user.Username = '$username' LIMIT 1"))['UserID'];
	$restaurantID = mysqli_fetch_assoc(mysqli_query($con, "SELECT RestaurantID FROM restaurant WHERE restaurant.Name = '$restaurantName' LIMIT 1"))['RestaurantID'];
	$reviewDate = date("Y-m-d H:i:s");
	if (!$con->query("INSERT INTO review (UserID, RestaurantID, ReviewDate, Content) VALUES ('$userID','$restaurantID','$reviewDate','$data');"))
		$errormsg = "You already reviewed"; // ?
	else {
		header("refresh:0;url=../reviews.php");
	}

?>
