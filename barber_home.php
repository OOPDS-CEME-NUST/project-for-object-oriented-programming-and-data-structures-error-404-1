<?php
session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
  }

if(isset($_SESSION['username'])) {


?>
<meta http-equiv="refresh" content="5"> 
 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stylon</title>
<!--
Holiday Template
http://www.templatemo.com/tm-475-holiday
-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">  
	<link href="css/flexslider.css" rel="stylesheet">
	<link href="css/templatemo-style.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<!-- Header -->
	<div class="tm-header">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-4 col-sm-3 tm-site-name-container">
					<a href="#" class="tm-site-name">Stylon</a>	
				</div>
				<div class="col-lg-6 col-md-8 col-sm-9">
					<div class="mobile-menu-icon">
						<i class="fa fa-bars"></i>
					</div>
					<nav class="tm-nav">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="barber_home.php?logout='1'">Log out</a></li>
							
						</ul>
					</nav>		
				</div>				
			</div>
		</div>	  	
	</div>


	<h1>Here is list of latest requests:

<?php
@$connection = mysql_connect('localhost', 'root', ''); //The Blank string is the password
mysql_select_db('stylon');
$stat="off";
$query = "SELECT * FROM requests WHERE status='$stat' ORDER by id DESC "; //You don't need a ; like you do in SQL
$result = mysql_query($query);
 echo "<br/>";
echo "<hr>";
while($row = mysql_fetch_array($result)){   //Creates a loop to loop through results
echo  "<center><font color='red'><b>".$row['requests'] ." requested a token at " . $row['time1']."</b></font><center>" ;  //$row['index'] the index here is a field name
 echo ' <center><a href="review.php?id='.$row['id'].'">Process Request </center>';  }
 
echo "<hr>";
mysql_close(); //Make sure to close out the database connection
?>
	<!-- gray bg -->	
	</h1>

	<footer class="tm-black-bg">
		<div class="container">
			<div class="row">
				<p class="tm-copyright-text">Copyright &copy; 2018 Stylon</p>
			</div>
		</div>		
	</footer>

</body>
</html>
      <?php

}

else{


echo "<meta http-equiv='Refresh' content='0; url=login.php'>";

}
?>