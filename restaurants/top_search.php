<?php
	include_once("dbconnect.php");

	// The search
	$result = $con->query("SELECT * FROM restaurant ORDER BY RestaurantID DESC LIMIT 5");
	while ($results = $result->fetch_array()) {
		$result_array[] = $results;
	}

	foreach ($result_array as $result) {
		echo '<article class="search-result row">';
			echo '<div class="col-xs-12 col-sm-12 col-md-3">';
				$name = $result['Name'];
				echo '<a href="#" title="' . $name .'" class="thumbnail"><img src="http://lorempixel.com/250/140/food" /></a>';
			echo '</div>';
			echo '<div class="col-xs-12 col-sm-12 col-md-2">';
				echo '<ul class="meta-search">';
					echo '<li><i class="glyphicon glyphicon-time"></i> <span>' . $result['OpenTime'] . '</span></li>';
					echo '<li><i class="glyphicon glyphicon-tags"></i> <span>' . $result['FoodType'] . '</span></li>';
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

?>
