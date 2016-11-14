<?php
	include_once("dbconnect.php");
  if (isset($_GET['id'])) {
    if (session_id() == '' || !isset($_SESSION))
      session_start();
    $ID = $_GET['id'];
    if (isset($_SESSION['Username'])) {
      $userID = mysqli_fetch_assoc(mysqli_query($con, 'select * from user where Username = "' . $_SESSION['Username'] . '" LIMIT 1'))['UserID'];
      $result = mysqli_query($con, "select UserID from review where UserID = '$userID' and ReviewID = '$ID'");
      if ($result->num_rows) {
        $result = mysqli_query($con, "delete from review where ReviewID = '$ID'");
      }
      unset($result);
    }
  }
  header("Location: reviews.php");
?>
