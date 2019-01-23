 
<?php
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'stylon');
 $today  = date("D M d, Y G:i");
$st="off";
  $usern = mysqli_real_escape_string($db, $_POST['name123']);
$query = "INSERT INTO requests (requests,time1,status) 
  			  VALUES('$usern','$today','$st')";
  	mysqli_query($db, $query);


echo "<meta http-equiv='Refresh' content='0; url=customer_wait.php?name=$usern'>";

?>