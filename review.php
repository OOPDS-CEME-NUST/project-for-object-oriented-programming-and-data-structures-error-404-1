<?php
session_start();
if(isset($_SESSION['username'])) {


?><!DOCTYPE html>
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
	</div><!-- Banner -->
	<?php
	
@mysql_connect('localhost','root','');
mysql_select_db('stylon');
$id=$_GET['id'];
$sql="SELECT * FROM requests WHERE id='$id'";
$records=mysql_query($sql);
$employee=mysql_fetch_assoc($records);
error_reporting(E_ALL ^ E_DEPRECATED);

$id=$employee['id'];
$usern=$employee['requests'];
    	?>
	<!-- white bg -->
	<section class="section-padding-bottom">
		<div class="container">
			<div class="row">
				<div class="tm-section-header section-margin-top">
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>
					<div class="col-lg-4 col-md-6 col-sm-6"><h2 class="tm-section-title">Generate Token</h2></div>
					<div class="col-lg-4 col-md-3 col-sm-3"><hr></div>	
				</div>				
			</div>
			<div class="row">
				<!-- contact form -->
		<center>		<form action="generate1.php" method="post" class="tm-contact-form">
					<div class="col-lg-6 col-md-6 tm-contact-form-input">
						<div class="form-group">Customer should appear at(time):
							<input type="text" id="contact_name" name="new_time" class="form-control" placeholder="Enter new time"  />
						<input type="hidden" name="usern" value="<?php echo $usern; ?>"><input type="hidden" name="id" value="<?php echo $id; ?>">
						</div> 
						</div>
						
						<div class="form-group">
							<button class="tm-submit-btn" type="submit" name="submit">Generate</button> 
						</div>               
					</div>
					
				</form>
			</div>			
		</div>
	</section>
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