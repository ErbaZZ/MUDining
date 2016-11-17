<?php
	include_once("dbconnect.php");
	require_once("restaurants-tolist.php");

	$result = mysqli_query($con, "SELECT * FROM restaurant ORDER BY RestaurantID");
	while ($results = mysqli_fetch_array($result)) {
		$result_array[] = $results;
	}

	foreach ($result_array as $result) {
		tolist($result);
	}

?>
