<?php
	include_once("../dbconnect.php");
	$username = $_POST['username'];
	$restaurantName = $_POST['restaurantName'];
	$title = $_POST['title'];
	$data = $_POST['formData'];
	$userID = mysqli_fetch_assoc(mysqli_query($con, "SELECT UserID FROM user WHERE user.Username = '$username' LIMIT 1"))['UserID'];
	$restaurantID = mysqli_fetch_assoc(mysqli_query($con, "SELECT RestaurantID FROM restaurant WHERE restaurant.Name = \"".$restaurantName."\" LIMIT 1"))["RestaurantID"];
	$reviewDate = date("Y-m-d H:i:s");
	$query = "INSERT INTO review (UserID, RestaurantID, ReviewDate, Title, Content) VALUES ('$userID','$restaurantID','$reviewDate','$title','$data');";
	echo "restaurantID = ".$restaurantID."</br>";
	echo "userID = ".$userID."</br>";
	if (!$con->query($query)) {
		echo "Failed";
		echo $con->error;
		$errormsg = "You already reviewed"; // ?
	}
	else {
		header('Location: ../reviews.php');
	}

?>
