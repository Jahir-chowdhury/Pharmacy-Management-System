<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['adminlogin'])){
	$id=$_SESSION['admin_id'];
	$user=$_SESSION['username'];
}else{
	session_destroy();
	header("location:index.php");
	exit();
}

$manager_id=$_POST['manager_id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$staff_id=$_POST['staff_id'];
$postal_address=$_POST['postal_address'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);



$sql = "update manager set 
		first_name ='$first_name',
		last_name='$last_name',
		staff_id='$staff_id',
		postal_address='$postal_address',
		phone='$phone',
		email='$email',
		username='$username',
		password='$password'
		where 
		username='$username'
		";
		
if ($conn->query($sql) === TRUE){
	
	header('Refresh: 3; url=admin_manager.php');
	$message="<font style='color:#f6ff65;'>Information Updated </font>";
}else{
	$message1="<font style='color:#f6ff65;'>Update Failed, Try again</font>";
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PMS | Admin</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
	<link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	<script src="js/function.js" type="text/javascript"></script>
	
	
	

</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin.php"><strong>PMS</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Admin</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
		<div id="sideNav" href="#"><!--<i class="fa fa-caret-right"></i>--></div>
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="active-menu" href="admin.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i> Pharmacist</a>
                    </li>
					<li>
                        <a href="admin_manager.php"><i class="fa fa-bar-chart-o"></i> Manager</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-qrcode"></i> Salesman</a>
                    </li>
					<footer>
						<p style="color:#fff;">&copy;<?php echo date('Y');?> PMS All right reserved.</p>
					</footer>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Manager <small>Pharmacy Management System</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="admin.php">Home</a></li>
					  <li><a href="admin.php">Admin</a></li>
					  <li><a href="admin_manager.php">Manager</a></li>
					  <li class="active">Update</li>
					</ol> 
									
		</div>
            
               <div class="col-md-8 col-sm-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Manager information
							
                            <?php
								if(isset($message)){
									echo "- ( ".$message." )";
								}if(isset($message1)){
									echo "- ( ".$message1." )";
								}
							?>
							
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                               
                                <li class="active"><a href="#profile" data-toggle="tab">Update manager</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">
                                
                                <div class="tab-pane fade active in" id="profile">
                                    <!--    Bordered Table  -->
									<div class="panel panel-default">
										<div class="panel-heading">
											Manager Update
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
											
											<h1 style='color:#189628;'>Information updated successfully!!!</h1>
											<h6 style='text-align:center;'>please wait while you are redirected in 3 seconds.</h6>
										</div>
									</div>
									<!--  End  Bordered Table  -->
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	 
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>

      <script>
    
      </script>

</body>


<!-- Mirrored from webthemez.com/demo/bluebox-free-bootstrap-admin-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr <?php echo date('Y');?> 10:26:29 GMT -->
</html>