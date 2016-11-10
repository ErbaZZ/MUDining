<?php
	include_once("..\dbconnect.php");
	require_once("tolist.php");

	// Get the Search
	$search_string = "";
	if (isset($_POST['query']))
		$search_string = $_POST['query'];
	$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $search_string);
	$search_string = $con->real_escape_string($search_string);

	//Insert Time Stamp
	$time = "UPDATE restaurant SET timestamp=now() WHERE Name='" .$search_string. "'";
	// Query
	echo $_POST['filter1'];
	echo $_POST['filter2'];
	$filter1 = $filter2 = "";
	if (isset($_POST['filter1']))
		$filter1 = $_POST['filter1'];
	if (isset($_POST['filter2']))
		$filter2 = $_POST['filter2'];
	$query = 'SELECT * FROM restaurant WHERE Name LIKE "%'.$search_string.'%"';
	if (isset($filter1))
		$query .= 'AND Type LIKE "%' . implode(',', $filter1) . '%"'; // (".implode(',', $filter1).")
	if (isset($filter2))
		$query .= 'AND Type LIKE "%' . implode(',', $filter2) . '%"';

	echo $query;

	//Timestamp entry of search for later display
	$time_entry = $con->query($time);
	// Do the search
	$result = $con->query($query);
	while ($results = $result->fetch_array()) {
		$result_array[] = $results;

		// Check for results
		if (isset($result_array)) {
			foreach ($result_array as $result) {
				tolist($result);
			}
		} else {

		}
	}
?>
