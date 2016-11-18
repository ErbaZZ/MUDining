<?php
  function totime($input) {
    $minutes = $input - floor($input);
    return gmdate("H:i", $minutes * 6000 + floor($input) * 3600);
  }
  function tolist($result) { ?>
    <article class="search-result row">
      <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" id="search-row">
        <?php $name = $result['Name'];
        $url = "view-restaurant.php?id=" . $result['RestaurantID']; ?>
        <a href=<?php echo $url ?> title=<?php echo $name ?> class="thumbnail">
          <img id="restaurant-img" src=<?php echo imgurl($result['RestaurantID']) ?> />
        </a>
      </div>
      <div class="col-xs-6 col-lg-3 col-sm-6 col-md-3">
        <ul class="meta-search"> <?php
          $opentime = totime($result['OpenTime']);
          $closetime = totime($result['CloseTime']); ?>
          <li><i class="glyphicon glyphicon-time"></i> <span><?php echo $opentime . ' - ' . $closetime ?></span></li> <?php
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
          $dishtypes = rtrim($dishtypes, ", "); ?>
          <li><i class="glyphicon glyphicon-tags"></i> <span><?php echo $foodtypes ?></span></li>
          <li><i class="glyphicon glyphicon-modal-window"></i><span><?php echo $dishtypes ?></span></li>
        </ul>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <h3><a href=<?php echo $url ?> title=""><?php echo $name ?></a>
          <span class="plus">
            <a href=review-editor.php?id=<?php echo $result['RestaurantID'] ?> title="Review this restaurant">
              <i class="glyphicon glyphicon-plus"></i>
            </a>
          </span>
        </h3>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 excerpet">
        <p><?php echo $result['Description'] ?></p>
      </div>
      <span class="clearfix borda"></span>
    </article>
  <?php }
?>
