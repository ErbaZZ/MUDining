<?php
	include_once("..\dbconnect.php");
	require_once("tolist.php");

	// Get the Search
	$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $_POST['query']);
	$search_string = $con->real_escape_string($search_string);

	// Check if length is more than 1 character
	if (strlen($search_string) >= 1 && $search_string !== ' ') {
		//Insert Time Stamp
		$time = "UPDATE restaurant SET timestamp=now() WHERE Name='" .$search_string. "'";
		// Query
		$query = 'SELECT * FROM restaurant WHERE Name LIKE "%'.$search_string.'%"';

		//Timestamp entry of search for later display
		$time_entry = $con->query($time);
		// Do the search
		$result = $con->query($query);
		while ($results = $result->fetch_array()) {
			$result_array[] = $results;
		}

		// Check for results
		if (isset($result_array)) {
			foreach ($result_array as $result) {
				tolist($result);
			}
		} else {

		}
}
?>
