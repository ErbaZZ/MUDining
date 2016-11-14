<?php
  function tolist($result) {
    echo '<article class="search-result row">';
      echo '<div class="col-xs-12 col-sm-12 col-md-3">';
        $name = $result['Name'];
        $url = "view-restaurant.php?id=" . $result['RestaurantID'];
        echo '<a href="'. $url . '" title="' . $name .'" class="thumbnail"><img src="http://lorempixel.com/250/140/food" /></a>';
      echo '</div>';
      echo '<div class="col-xs-12 col-sm-12 col-md-2">';
        echo '<ul class="meta-search">';
          echo '<li><i class="glyphicon glyphicon-time"></i> <span>' . $result['OpenTime'] . '</span></li>';
          $types = "";
          foreach (explode(",", $result['Type']) as $subtype) {
            switch ($subtype) {
              case "01":
                $types .= "Thai, "; break;
              case "02":
                $types .= "Japanese, "; break;
              case "03":
                $types .= "Chinese, "; break;
              case "04":
                $types .= "European, "; break;
            }
          }
          $types = rtrim($types, ", ");
          echo '<li><i class="glyphicon glyphicon-tags"></i> <span>' . $types . '</span></li>';
        echo '</ul>';
      echo '</div>';
      echo '<div class="col-xs-12 col-sm-12 col-md-7 excerpet">';
        echo '<h3><a href="' . $url . '" title="">' . $name . '</a></h3>';
        echo '<p>Description</p>';
        $reviewURL = "review-editor.php?id=" . $result['RestaurantID'];
            echo '<span class="plus"><a href="' .$reviewURL. '" title=""><i class="glyphicon glyphicon-plus"></i></a></span>';
      echo '</div>';
      echo '<span class="clearfix borda"></span>';
    echo '</article>';
  }
?>
