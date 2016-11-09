<?php
	include_once("..\dbconnect.php");

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
				echo '<article class="search-result row">';
	  			echo '<div class="col-xs-12 col-sm-12 col-md-3">';
						$name = $result['Name'];
	  				echo '<a href="#" title="' . $name .'" class="thumbnail"><img src="http://lorempixel.com/250/140/food" /></a>';
	  			echo '</div>';
	  			echo '<div class="col-xs-12 col-sm-12 col-md-2">';
	  				echo '<ul class="meta-search">';
	  					echo '<li><i class="glyphicon glyphicon-time"></i> <span>' . $result['OpenTime'] . '</span></li>';
	  					echo '<li><i class="glyphicon glyphicon-tags"></i> <span>' . $result['Type'] . '</span></li>'; // TODO: Interpretation
	  				echo '</ul>';
	  			echo '</div>';
	  			echo '<div class="col-xs-12 col-sm-12 col-md-7 excerpet">';
	  				echo '<h3><a href="#" title="">' . $name . '</a></h3>';
	  				echo '<p>Description</p>';
	              echo '<span class="plus"><a href="#" title=""><i class="glyphicon glyphicon-plus"></i></a></span>';
	  			echo '</div>';
	  			echo '<span class="clearfix borda"></span>';
	  		echo '</article>';
			}
		} else {

		}
}
?>
