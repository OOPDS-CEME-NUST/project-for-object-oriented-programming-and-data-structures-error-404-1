<?php

session_start();
if(isset($_SESSION['username'])) {


$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'stylon');
$id=$_POST['id'];
  $usern = mysqli_real_escape_string($db, $_POST['usern']);
  $time123 = mysqli_real_escape_string($db, $_POST['new_time']);
$query = "INSERT INTO tokens (username, time123) 
  			  VALUES('$usern', '$time123')";
  	mysqli_query($db, $query);
$st1="on";
$query1 = " UPDATE requests SET status='$st1' WHERE id='$id'";
  	mysqli_query($db, $query1); 
 
  	header("location: generate.php?id='$id'&t='$time123'&name='$usern'");



}

else{


echo "<meta http-equiv='Refresh' content='0; url=login.php'>";

}

?>