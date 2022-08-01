<?php
require("session.php");
require_once("asset/db/db.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	foreach($_POST as $key=>$value)
	{
	if(empty($_POST[$key]))
	{
		$error_message="All fields are required";
		break;
	}
	}
	if(!isset($error_message)) {
	$uname=$_POST["username"];
	$pass=$_POST["password"];
	$query="SELECT * FROM `login` WHERE `username`='$uname'";
	$result=mysqli_query($con,$query);
	if(mysqli_num_rows($result)==1)
	{
		$obj=mysqli_fetch_object($result);
		$dbpass=$obj->password;
		if (password_verify($pass,$dbpass))
		{
			$_SESSION["username"]=$uname;
			$type=$obj->type;
			$_SESSION["type"]=$type;
			unset($_POST);
		$success_message="<script>setTimeout(function(){
		window.location=\"\";},1000);</script><img src=\"asset/images/loading.gif\">
		<strong>Welcome</strong>,you are being logged in..";
	}
		else
		{
			$error_message ="Wrong password";
		}
	}
		else
		{
				$error_message ="Invalid user";
         }
}		 
}		 
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Login :: Waste Management System </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="asset/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="asset/css/style.css" rel='stylesheet' type='text/css' />
<link href="asset/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="asset/css/font.css" type="text/css"/>
<link href="asset/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="asset/js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
<h2>sign In Now</h2>
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
		<form action="" method="post">
			<input type="text" autocomplete="off" class="ggg" name="username" placeholder="USERNAME" required="" value="<?php if(isset($_POST['username']))echo $_POST['username'];?>"/>
			<input type="password" class="ggg" name="password" placeholder="PASSWORD" required="">
               				<div class="clearfix"></div>
				<input type="submit" value="Sign In" name="login">
		</form>
		<p>Don't Have an Account ?<a href="registration.php">Create an account</a></p>
		<p><a href="index.php">Back to home</a></p>
</div>
</div>
<script src="asset/js/bootstrap.js"></script>
<script src="asset/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="asset/js/scripts.js"></script>
<script src="asset/js/jquery.slimscroll.js"></script>
<script src="asset/js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="asset/js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="asset/js/jquery.scrollTo.js"></script>
</body>
</html>
