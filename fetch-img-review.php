<?php
  require_once('html-dom.php');
  function getimages($con, $revid) {
    $rev = mysqli_query($con, "select * from review where ReviewID = ".$revid);
    $content = mysqli_fetch_assoc($rev)['Content'];
    $html = str_get_html($content);
    $ret = $html->find('img');
    $images = array();
    foreach ($ret as $element)
       array_push($images, $element->src);
    return $images;
  }

?>
