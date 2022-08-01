<?php
require_once('../asset/db/db.php');
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
<script>
$(document).ready(function () {
	$("#tblcol").dataTable(); //for data table
	$("#tblcoll").dataTable(); //for data table
	$("#tblcolle").dataTable(); //for data table
	$("#tblcollec").dataTable(); //for data table
});
</script>


    <!-- DATATABLE STYLE  -->
    <link href="../asset/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- DATATABLE SCRIPTS  -->
    <script src="../asset/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../asset/plugins/datatables/dataTables.bootstrap.js"></script>


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
		<h2 class="w3ls_head">Waste Collection Details</h2>
        <div class="table table-responsive">
						<h4>New Waste Disposal Details:</h4><br>
							<table class="table table-hover" id="tblcol">
							<thead> <tr> <th>S.No</th><th>User Name</th> <th>Upload Time</th></tr> </thead>
							<tbody>
<?php 
//taking data from database
        $query = "SELECT * FROM `waste` WHERE `employee` IS NULL AND `accepttime` IS NULL ORDER BY `uploadtime`";		
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$c=1;
		while($obj=mysqli_fetch_object($result))
		{	
			$q2=mysqli_query($con,"SELECT `name` from `user` WHERE `uid`='$obj->user'");
			$r2=mysqli_fetch_object($q2);
			echo "<tr> <td>$c</td>";
                    echo"<td>$r2->name</td>
                        <td>$obj->uploadtime</td>	
                      </tr>";
			$c++;
		}
?>
							 </tbody> </table>
						</div>
						
        <div class="table table-responsive">
						<h4>Employee Accepted Waste Disposal Details:</h4><br>
							<table class="table table-hover" id="tblcoll">
							<thead> <tr> <th>S.No</th><th>User Name</th> <th>Upload Time</th> <th>Employee Name</th> <th>Accept Time</th></tr> </thead>
							<tbody>
<?php 
//taking data from database
        $query = "SELECT * FROM `waste` WHERE `employee` IS NOT NULL AND `reporttime` IS NULL ORDER BY `uploadtime`";		
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$c=1;
		while($obj=mysqli_fetch_object($result))
		{	
			$q1=mysqli_query($con,"SELECT `name` from `user` WHERE `uid`='$obj->user'");
			$r1=mysqli_fetch_object($q1);
			$q2=mysqli_query($con,"SELECT `name` from `employee` WHERE `eid`='$obj->employee'");
			$r2=mysqli_fetch_object($q2);
			echo "<tr> <td>$c</td>";
                    echo"<td>$r1->name</td>
                        <td>$obj->uploadtime</td>	
                        <td>$r2->name</td>	
                        <td>$obj->accepttime</td>	
                      </tr>";
			$c++;
		}
?>
							 </tbody> </table>
						</div>
						
        <div class="table table-responsive">
						<h4>Ongoing Waste Disposal Details:</h4><br>
							<table class="table table-hover" id="tblcolle">
							<thead> <tr> <th>S.No</th><th>User Name</th> <th>Upload Time</th><th>Employee Name</th><th>Accept Time</th><th>Report Time</th></tr> </thead>
							<tbody>
<?php 
//taking data from database
        $query = "SELECT * FROM `waste` WHERE `employee` IS NOT NULL  AND `completiontime` IS NULL  AND `reporttime` IS NOT NULL ORDER BY `reporttime`";	
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$c=1;
		while($obj=mysqli_fetch_object($result))
		{	
			$q2=mysqli_query($con,"SELECT `name` from `user` WHERE `uid`='$obj->user'");
			$r2=mysqli_fetch_object($q2);
			$q3=mysqli_query($con,"SELECT `name` from `employee` WHERE `eid`='$obj->employee'");
			$r3=mysqli_fetch_object($q3);
			echo "<tr> <td>$c</td>";
                    echo"<td>$r2->name</td>
                        <td>$obj->uploadtime</td>
						<td>$r3->name</td>
                        <td>$obj->accepttime</td>	
                        <td>$obj->reporttime</td>	
                      </tr>";
			$c++;
		}
?>
							 </tbody> </table>
						</div>
						        <div class="table table-responsive">
						<h4>Collected Waste Disposal Details:</h4><br>
							<table class="table table-hover" id="tblcollec">
							<thead> <tr> <th>S.No</th><th>User Name</th> <th>Upload Time</th><th>Employee Name</th><th>Report Time</th><th>Completion Time</th><th>Amount</th></tr> </thead>
							<tbody>
<?php 
//taking data from database
        $query = "SELECT * FROM `waste` WHERE `employee` IS NOT NULL AND `completiontime` IS NOT NULL ORDER BY `completiontime`";		
		$result = mysqli_query($con,$query) or die(mysqli_error($con));
		$c=1;
		while($obj=mysqli_fetch_object($result))
		{	
			$q1=mysqli_query($con,"SELECT `name` from `employee` WHERE `eid`='$obj->employee'");
			$r1=mysqli_fetch_object($q1);
			$q2=mysqli_query($con,"SELECT `name` from `user` WHERE `uid`='$obj->user'");
			$r2=mysqli_fetch_object($q2);
			echo "<tr> <td>$c</td>";
                    echo"<td>$r2->name</td>
                        <td>$obj->uploadtime</td>
						<td>$r1->name</td>
                         <td>$obj->reporttime</td>
						<td>$obj->completiontime</td>	
						<td>$obj->amount</td>	
                      </tr>";
			$c++;
		}
?>
							 </tbody> </table>
						</div>
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
