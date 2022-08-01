<?php
require("admin_session.php");
require_once('../asset/db/db.php');
$eid=$_GET["eid"];
$q3=mysqli_query($con,"SELECT `username` FROM `employee` WHERE `eid`='$eid'");
$r1=mysqli_fetch_object($q3);
$uname=$r1->username;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$q1=mysqli_query($con,"DELETE FROM `employee` WHERE `eid`='$eid'");
		if($q1)
		{
			$q2=mysqli_query($con,"DELETE FROM `login` WHERE `username`='$uname'");
		if($q2)
		{
			$success_message="<script>setTimeout(function(){window.location=\"view.php\";},1000);</script><strong>Success</strong>,Employee is deleted. ";
		}
		}
else{
	$error_message="Unknown database error occured. ";
		}
}
if (isset($_GET['eid']))
{	
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Waste Management System</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content=" " />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../asset/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="../asset/css/style.css" rel='stylesheet' type='text/css' />
<link href="../asset/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link href="../asset/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="../asset/js/jquery2.0.3.min.js"></script>
</head>
<body>
<?php
include("admin_header.php");
?> 
<section id="container">
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="typo-agile">
		<h3 class="w3ls_head"><i> <u>Delete Employee</u></i></h3>
 		<b>Are you sure want to delete this employee?</b><br><br>
		<?php if(!empty($success_message)) {?>
	<div class="alert alert-success">
	     <?php if (isset($success_message))echo $success_message;?>
		 <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
		 </div>	
<?php } ?>
<?php if(!empty($error_message)) {?>
	<div class="alert alert-danger">
	     <?php if (isset($error_message))echo $error_message;?>
		 <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
		 </div>	
<?php } ?>
		<form method="post" action="">
		
		<button type="submit" class="btn btn-danger">Delete</button>&nbsp;&nbsp;
		<a href="view.php"><button type="button" class="btn btn-success">No</button></a>
		</form>
		</div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2019 wastemangementsystem. All rights reserved | Design by <a href="http://w3layouts.com">subibabu</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>

<!--main content end-->
</section>
<script src="../asset/js/bootstrap.js"></script>
<script src="../asset/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="../asset/js/scripts.js"></script>
<script src="../asset/js/jquery.slimscroll.js"></script>
<script src="../asset/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="asset/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="../asset/js/jquery.scrollTo.js"></script>
</body>
</html>
<?php
}
else
{
	header('location:view.php');
	
}