<?php
	session_start();
	include_once("../dbconnect.php");
	$username = $_POST['username'];
	$restaurantName = $_POST['restaurantName'];
	$title = $_POST['title'];
	$data = $_POST['formData'];
	$userID = mysqli_fetch_assoc(mysqli_query($con, "SELECT UserID FROM user WHERE user.Username = '$username' LIMIT 1"))['UserID'];
	$restaurantID = mysqli_fetch_assoc(mysqli_query($con, "SELECT RestaurantID FROM restaurant WHERE restaurant.Name = \"".$restaurantName."\" LIMIT 1"))["RestaurantID"];
	$dupe = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM review WHERE review.userID = '$userID' AND review.restaurantID = '$restaurantID' LIMIT 1"))['UserID'];
	if (is_null($dupe)) {
		$reviewDate = date("Y-m-d H:i:s");
		$query = "INSERT INTO review (UserID, RestaurantID, ReviewDate, Title, Content) VALUES ('$userID','$restaurantID','$reviewDate','$title','$data');";
		echo "restaurantID = ".$restaurantID."</br>";
		echo "userID = ".$userID."</br>";
		if (!$con->query($query)) {
			echo "Failed";
			echo $con->error;
		}
		else {
			header('Location: ../reviews.php');
		}
	}
	else {
		$_SESSION['errormsg'] = "You have already reviewed this restaurant.";
		echo $_SESSION['errormsg'];
		header('Location: ../review-editor.php');
	}

?>
