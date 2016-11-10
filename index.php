<html>
<head>
  <script src="js/css.js"></script>
  <script type='text/javascript' src='js/jquery.mousewheel.min.js'></script>
</head>
<body>
  <?php include_once("navbar.php"); ?>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css" />

  <div id="wrapper" class="container">

    <button class="random_eat_button"><div id="random_label">Where to eat?</div></button>

  </div>

  <div id="bottombar-wrapper" class="navbar-fixed-bottom">
    <div id="bottombar">
        <div class="text">a</div>
        <div class="text">s</div>
        <div class="text">d</div>
        <div class="text">f</div>
        <div class="text">g</div>
    </div>
  </div>

</body>
<script>
  $(document).ready(function () {
     $("#bottombar-wrapper").mousewheel(function(event, delta) {
       this.scrollLeft -= (delta * 80);
       this.scrollRight -= (delta * 80);
       event.preventDefault();
     });
  });
</script>
</html>
