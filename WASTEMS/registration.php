<?php
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
	
	$name=$_POST["Name"];
	$add=$_POST["Address"];
	$houseno=$_POST["HouseNo"];
	$em=$_POST["Email"];
	$phn=$_POST["Phone"];
	$user=$_POST["username"];
	$location=$_POST["location"];
	$pass=$_POST["Password"];
	$conf=$_POST["CPassword"];
/*Name validation*/
if (!isset($error_message)) {
	if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
$error_message="Invalid name";
	}
}
/*house number validation*/
if (!isset($error_message)) {
	if(!is_nan($houseno) && strlen($houseno) != 5){
	$error_message="invalid house number";
}
}
	
/*Email  validation */
if (!isset($error_message)) {
	if(!filter_var($em,FILTER_VALIDATE_EMAIL)) {
$error_message="Invalid Email Address";
	}
}	
/*phone number  validation */
if (!isset($error_message)) {
	if(!preg_match("/^[6-9][0-9]{9}$/",$phn)) {
$error_message="Invalid phone number";
	}
}
/*user name validation*/
$dbuser=mysqli_query($con,"SELECT `username` from `login` WHERE `username`='$user'");
if(mysqli_num_rows($dbuser) == 1)
{
	$error_message="this username is already in used";
}
/*email in db validation*/
$dbemail=mysqli_query($con,"SELECT `email` from `user` WHERE `email`='$em'");
if(mysqli_num_rows($dbemail) == 1)
{
	$error_message="this email is already in used";
}
/*phone number in db validation*/
$dbph=mysqli_query($con,"SELECT `phonenumber` from `user` WHERE `phonenumber`='$phn'");
if(mysqli_num_rows($dbph) == 1)
{
	$error_message="this phonenumber is already in used";
}
/*house number in db validation*/
$dbhno=mysqli_query($con,"SELECT `houseno` from `user` WHERE `houseno`='$houseno'");
if(mysqli_num_rows($dbhno) == 1)
{
	$error_message="this houseno is already in used";
}
/*Password Matching Validation*/
if($pass != $conf) {
	$error_message='password should be same<br>';
}
	if(!isset($error_message)) {
		$epass=password_hash($pass,PASSWORD_BCRYPT);
	
   $q1 = mysqli_query($con,"INSERT INTO `login`(username,password,type)VALUES('$user','$epass',1)");
   if($q1){
   $q2 = mysqli_query($con,"INSERT INTO `user`(name,username,address,houseno,email,phonenumber,location)VALUES('$name','$user','$add',$houseno,'$em',$phn,'$location')"); 
   if($q2)
   {
	   unset($_POST);
	   $success_message="<strong>Success</strong>, You are successfully registred.<br> <a href=\"login.php\">Login Now</a>";
   }
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
<title>Waste Mangement System : Registration</title>
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
<div class="reg-w3">
<div class="w3layouts-main">
	<h2>Register Now</h2>
	<?php if(!empty($success_message)) {?>
	<div class="alert alert-success">
	     <?php if (isset($success_message))echo $success_message;?>
		 <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
		 </div>	
<?php } ?>
<?php if(!empty($error_message)) {?>
	<div class="alert alert-danger">
		 <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
	     <?php if (isset($error_message))echo $error_message;?>
		 </div>	
<?php } ?>
		<form action="" method="post">
			<input type="text" autocomplete="off" class="ggg" name="Name" placeholder="NAME" required="" value="<?php if(isset($_POST['Name']))echo $_POST['Name'];?>">
			<input type="text" autocomplete="off" class="ggg" name="Address" placeholder="ADDRESS" required="" value="<?php if(isset($_POST['Address']))echo $_POST['Address'];?>">
			<input type="number" autocomplete="off" class="ggg" name="HouseNo" placeholder="HOUSENO" required="" value="<?php if(isset($_POST['HouseNo']))echo $_POST['HouseNo'];?>">
			<input type="email"  autocomplete="off" class="ggg" name="Email" placeholder="E-MAIL" required="" value="<?php if(isset($_POST['Email']))echo $_POST['Email'];?>">
			<input type="number" autocomplete="off" class="ggg" name="Phone" placeholder="PHONE" required="" value="<?php if(isset($_POST['Phone']))echo $_POST['Phone'];?>">
			<input type="text" autocomplete="off" class="ggg" name="username" placeholder="USERNAME" required="" value="<?php if(isset($_POST['username']))echo $_POST['username'];?>">
			
										<div class="form-group">
													<select name="location" required class="ggg">
														<option value="">SELECT LOCATION</option>
<?php
        $query = "SELECT * FROM `location` ORDER BY `locationnm`";
		$result = mysqli_query($con,$query) or die(mysqli_error());
		while($obj=mysqli_fetch_object($result))
		{
			echo "<option value=\"$obj->lid\"";
			if(isset($_POST['location']) && $obj->lid == $_POST['location']){
				echo "selected=\"selected\"";
			}
			echo ">$obj->locationnm</option>";
			
		}
?>
													</select>
												</div>
        	<input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="">
			<input type="password" class="ggg" name="CPassword" placeholder="CONFIRM PASSWORD" required="">
			<h4><input type="checkbox" />I agree to the Terms of Service and Privacy Policy</h4>
			<div class="clearfix"></div>
				<input type="submit" value="submit" name="register">
		</form>
			
		<p>Already Registered.<a href="login.php">Login</a></p>
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
