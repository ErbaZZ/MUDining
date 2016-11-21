<?php
	session_start();
	include_once("../dbconnect.php");
	if (!isset($_POST['username']) || !isset($_POST['restaurantName'])) {
		header("Location: ../index.php");
	}
	if ($_POST['restaurantName'] == '' || $_POST['title'] == '' || $_POST['formData'] == '') {
		$_SESSION['errormsg'] = "Please fill in every field";
		header("Location: ../review-editor.php");
	}
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
		if (!mysqli_query($con, $query)) {
			echo "Failed\n";
			echo $title."\n";
			echo $data."\n";
			echo $con->error;
		}
		else {
			header('Location: ../reviews.php');
		}
	}
	else {
		$query = "UPDATE review SET Content = '$data', Title = '$title' WHERE RestaurantID = '$restaurantID' AND UserID = '$userID'";
		mysqli_query($con, $query);
		header('Location: ../reviews.php');
	}
	unset($_SESSION['edit']);

?>
