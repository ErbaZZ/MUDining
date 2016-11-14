<?php
	include_once("dbconnect.php");
	require_once("tolist.php");

	// The search
	$result = $con->query("SELECT * FROM restaurant ORDER BY RestaurantID DESC");
	while ($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	foreach ($result_array as $result) {
		tolist($result);
	}

?>
