<html>
<head>
  <script src="js/css.js"></script>
</head>
<body>
  <?php 
    session_start();
    
    if(isset($_SESSION['Checked'])){
    include_once("navbar.php");
    }
    else{
    include_once("navbarlog.php");
    }
    ?>
  <link rel="stylesheet" type="text/css" href="assets/css/index.css" />

  <div id="wrapper" class="container">

    <button class="random_eat_button"><div id="random_label">Where to eat?</div></button>

  </div>

</body>
</html>
