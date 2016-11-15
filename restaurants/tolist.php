<?php
  function totime($input) {
    $minutes = $input - floor($input);
    return gmdate("H:i", $minutes * 6000 + floor($input) * 3600);
  }
  function tolist($result) {
    echo '<article class="search-result row">';
      echo '<div class="col-xs-12 col-sm-12 col-md-3" id="search-row">';
        $name = $result['Name'];
        $url = "view-restaurant.php?id=" . $result['RestaurantID'];
        echo '<a style="width:100%;" href="'.$url.'" title="'.$name .'" class="thumbnail"><img id="restaurant-img" src="' .imgurl($result['RestaurantID']).'" /></a>';
      echo '</div>';
      echo '<div class="col-xs-12 col-sm-12 col-md-2">';
        echo '<ul class="meta-search">';
          $opentime = totime($result['OpenTime']);
          $closetime = totime($result['CloseTime']);
          echo '<li><i class="glyphicon glyphicon-time"></i> <span>' . $opentime . ' - ' . $closetime . '</span></li>';
          $foodtypes = $dishtypes = "";
          foreach (explode(",", $result['Type']) as $subtype) {
            switch ($subtype) {
              case "01":
                $foodtypes .= "Thai, "; break;
              case "02":
                $foodtypes .= "Japanese, "; break;
              case "03":
                $foodtypes .= "Chinese, "; break;
              case "04":
                $foodtypes .= "European, "; break;
              case "11":
                $dishtypes .= "Single Dish, "; break;
              case "12":
                $dishtypes .= "Set Menu, "; break;
              case "13":
                $dishtypes .= "Buffet, "; break;
            }
          }
          $foodtypes = rtrim($foodtypes, ", ");
          $dishtypes = rtrim($dishtypes, ", ");
          echo '<li><i class="glyphicon glyphicon-tags"></i> <span>' . $foodtypes . '</span></li>';
          echo '<li><i class="glyphicon glyphicon-modal-window"></i> <span>' . $dishtypes . '</span></li>';
        echo '</ul>';
      echo '</div>';
      echo '<div class="col-xs-12 col-sm-12 col-md-7 excerpet">';
        echo '<h3><a href="' . $url . '" title="">' . $name . '</a></h3>';
        echo '<p>Description</p>';
        $reviewURL = "review-editor.php?id=" . $result['RestaurantID'];
            echo '<span class="plus"><a style="border-radius:25%;" href="' .$reviewURL. '" title="Review this restaurant"><i class="glyphicon glyphicon-plus"></i></a></span>';
      echo '</div>';
      echo '<span class="clearfix borda"></span>';
    echo '</article>';
  }
?>
