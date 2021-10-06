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
                        <a href="admin_pharmacist.php"><i class="fa fa-desktop"></i> Pharmacist</a>
                    </li>
					<li>
                        <a href="admin_manager.php"><i class="fa fa-bar-chart-o"></i> Manager</a>
                    </li>
                    <li>
                        <a href="admin_salesman.php"><i class="fa fa-qrcode"></i> Salesman</a>
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
                            Salesman <small>Pharmacy Management System</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="admin.php">Home</a></li>
					  <li><a href="admin.php">Admin</a></li>
					  <li><a href="admin_salesman.php">Salesman</a></li>
					  <li class="active">Update</li>
					</ol> 
									
		</div>
            
               <div class="col-md-8 col-sm-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Salesman information
							
                            <?php
								if(isset($message1)){
									echo "- ( ".$message1." )";
								}
							?>
							
                        </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs">
                               
                                <li class="active"><a href="#profile" data-toggle="tab">Update salesman</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">
                                
                                <div class="tab-pane fade active in" id="profile">
                                    <!--    Bordered Table  -->
									<div class="panel panel-default">
										<div class="panel-heading">
											Salesman Update
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
										<?php
											
											if (isset($_GET['salesman_id']) && is_numeric($_GET['salesman_id']))
											 {
											 // get id value
											 $salesman_id = $_GET['salesman_id'];
											 }
											$edit = "select * from salesman where salesman_id ='$salesman_id'";
											$result = $conn->query($edit);
											if($result->num_rows > 0) {
												while($row = $result->fetch_assoc()){
										?>
											<form role="form" name="form1" action="updated_salesman.php" method="POST">
											
												
												<div class="form-group">
													<input readonly style="cursor: not-allowed;" type="text" class="form-control" name="salesman_id" required value="<?php echo $row['salesman_id'] ?>">
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="first_name" placeholder="First Name" required value="<?php echo $row['first_name'] ?>">
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="last_name" placeholder="Last Name" required value="<?php echo $row['last_name'] ?>">
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="staff_id" placeholder="Staff ID" required value="<?php echo $row['staff_id'] ?>">
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="postal_address" placeholder="Address" required value="<?php echo $row['postal_address'] ?>">
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="phone" placeholder="Phone" required value="<?php echo $row['phone'] ?>">
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="email" placeholder="Email" required value="<?php echo $row['email'] ?>">
												</div>
												
												<div class="form-group">
													<input readonly style="cursor: not-allowed;" type="text" class="form-control" name="username" placeholder="Username" required value="<?php echo $row['username'] ?>" >
												</div>
												
												<div class="form-group">
													<input type="password" class="form-control" name="password" placeholder="Enter New Password" required>
												</div>
											   
												<button type="submit" class="btn btn-primary pull-right">Update</button>
											
										
											</form>
                                            <?php
												}
											}
										?>
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