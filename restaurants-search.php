<?php
	if (session_id() == '' || !isset($_SESSION))
		session_start();
	include_once("dbconnect.php");
	require_once("restaurants-tolist.php");

	$search_string = "";
	if (isset($_POST['query']))
		$search_string = $_POST['query'];
	$search_string = preg_replace("/[^A-Za-z0-9]/", " ", $search_string);
	$search_string = $con->real_escape_string($search_string);

	if (!empty($search_string)) {
		$time = "UPDATE restaurant SET timestamp=now() WHERE Name='" . $search_string . "'";
		$time_entry = mysqli_query($con, $time);
	}
	$filter1 = $filter2 = "";
	if (!isset($_SESSION['pmin']))
		$_SESSION['pmin'] = 0;
	if (!isset($_SESSION['pmax']))
		$_SESSION['pmax'] = -1;
	if (isset($_POST['filter1']))
		$filter1 = $_POST['filter1'];
	if (isset($_POST['filter2']))
		$filter2 = $_POST['filter2'];
	if (isset($_POST['pmin']))
		$_SESSION['pmin'] = $_POST['pmin'];
	if (isset($_POST['pmax'])) {
		$_SESSION['pmax'] = $_POST['pmax'];
		if ($_SESSION['pmax'] > 500)
			$_SESSION['pmax'] = -1;
	}
	$query = 'SELECT * FROM restaurant WHERE ';
	if (!empty($search_string))
		$query .= 'Name LIKE "%'.$search_string.'%"';
	function filternorm($filter) {
		$str = "";
		foreach (explode('=', $filter) as $type)
			$str .= substr($type, 0, 2) . ',';
		return preg_replace('/fo,/', "", rtrim($str, ','), 1);
	}
	if (!empty($search_string))
		$query .= ' AND ';
	$query .= 'Type LIKE "%' . filternorm($filter1) . '%"';
	$query .= ' AND Type LIKE "%' . filternorm($filter2) . '%"';
	$query .= ' AND MinPrice >= ' . $_SESSION['pmin'];
	if ($_SESSION['pmax'] != -1)
		$query .= ' AND MaxPrice <= ' . $_SESSION['pmax'];
	$result = mysqli_query($con, $query);
	if ($result->num_rows > 0) {
		while ($results = mysqli_fetch_assoc($result))
			tolist($results);
	}
?>
