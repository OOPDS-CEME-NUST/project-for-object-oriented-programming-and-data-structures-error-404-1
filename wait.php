<meta http-equiv="refresh" content="10"> 
<?php

$u=$_GET['name'];
echo $u;
@$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('stylon');
$stat="off";
$query = "SELECT * FROM requests WHERE requests='$u'"; //You don't need a ; like you do in SQL
$result = mysql_query($query);
$row = mysql_fetch_array($result);
if($row['status']=="on"){
  
  	header("location: pdf.php?n='$u'");
}
else{
echo $row['status'];
	echo "wait till your request is being processed";
}
?>