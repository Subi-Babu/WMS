<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">

    <h2><a href="index.php" class="logo">
        WMS
    </a></h2>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->


<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="images/2.png">
                <span class="username">Admin</span>
                <b class="caret"></b>
            </a>
           
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
				  <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <span>Employee</span>
                    </a>
                    <ul class="sub">
                        <li><a href="add_employee.php">Add Employee</a></li>
                        <li><a class="active" href="view.php">View Employee Details</a></li>
                    </ul>
                </li>
                <li>
                    <a href="userdetails.php">
                        <i class="fa fa-users"></i>
                        <span>User details</span>
                    </a>
                </li>
				 <li>
                    <a href="location.php">
                        <i class="fa fa-map-marker"></i>
                        <span>Location</span>
                       </a>
                </li>
				<li>
                    <a href="collection.php">
                        <i class="fa fa-clock-o"></i>
                        <span>Collection Details</span>
                       </a>
                </li><li>
                    <a href="generateqrc.php">
                        <i class="fa fa-qrcode"></i>
                        <span>Generate QR Code</span>
                       </a>
                </li>
                <li>
                    <a href="../logout.php">
                        <i class="fa fa-edit"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
