<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['managerlogin'])){
	$id=$_SESSION['manager_id'];
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
    <title>PMS | Manager</title>
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
                <a class="navbar-brand" href="manager.php"><strong>PMS</strong></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Manager</a>
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
                        <a class="active-menu" href="manager.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="manager_pharmacist.php"><i class="fa fa-desktop"></i> Pharmacist</a>
                    </li>
					
                    <li>
                        <a href="manager_salesman.php"><i class="fa fa-qrcode"></i> Salesman</a>
                    </li>
					<li>
                        <a href="manager_report.php"><i class="fa fa-qrcode"></i> Sales report</a>
                    </li>
					<footer>
						<p style="color:#fff;">&copy;2017 PMS All right reserved.</p>
					</footer>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper">
		  <div class="header"> 
                        <h1 class="page-header">
                            Dashboard <small>Pharmacy Management System</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="manager.php">Home</a></li>
					  <li class="active">Manager</li>
					</ol> 
									
		</div>
            <div id="page-inner">

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                            <div class="panel-left pull-left blue">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
								<h3>
								
                                <?php
										
														
										$total = 0;				
										$sql = "select * FROM report ";
										$result = $conn->query($sql);
										if($result->num_rows > 0) {
											while($row = $result->fetch_assoc()) {
												$sub = $row['report_total_amount'];
												$total += $sub;	
											}
											echo $total;
										}else{
											echo '0';
										}				
														
											
									?>
								</h3>
                               <strong> Total Sales</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                              <div class="panel-left pull-left blue">
                                <i class="fa fa-users fa-5x"></i>
								</div>
                                
                            <div class="panel-right">
							<h3>
							<?php
								
								$sql = "SELECT * FROM manager";
								$result = $conn->query($sql);
								if($result->num_rows > 0) {
									echo $result->num_rows;
								}else{
									echo '0';
								}	
							?>
								
								
							
							</h3>
                               <strong> Manager</strong>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                            <div class="panel-left pull-left blue">
                                <i class="fa fa fa-users fa-5x"></i>
                               
                            </div>
                            <div class="panel-right">
							 <h3>
                             <?php
								
								$sql = "SELECT * FROM pharmacist";
								$result = $conn->query($sql);
								if($result->num_rows > 0) {
									echo $result->num_rows;
								}else{
									echo '0';
								}
							?>
							 </h3>
                               <strong> Pharmacist </strong>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 col-xs-12">
                        <div class="panel panel-primary text-center no-boder blue">
                            <div class="panel-left pull-left blue">
                                <i class="fa fa-users fa-5x"></i>
                                
                            </div>
                            <div class="panel-right">
							<h3>
							<?php
										
								$sql = "SELECT * FROM salesman";
								$result = $conn->query($sql);
								if($result->num_rows > 0) {
									echo $result->num_rows;
								}else{
									echo '0';
								}
							?>
							</h3>
                             <strong>Salesman</strong>

                            </div>
                        </div>
                    </div>
                </div>
				
				
		<div class="row">
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Manager</h4>
						<div class="easypiechart" id="">
							<span class="percent">
								<a href="manager.php">
									<img width="120px" style="margin-top:-23px;" src="images/manager_icon.png" alt="..." class="img-circle">
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Pharmacist</h4>
						<div class="easypiechart" id="">
							<span class="percent">
								<a href="manager_pharmacist.php">
									<img width="120px" style="margin-top:-23px;" src="images/pharmacist_icon.jpg" alt="..." class="img-circle">
								</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Salesman</h4>
						<div class="easypiechart" id="">
							<span class="percent">
							<a href="manager_salesman.php">
								<img width="120px" style="margin-top:-23px;" src="images/salesman_icon.jpg" alt="..." class="img-circle">
							</a>
							</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-6 col-md-3">
				<div class="panel panel-default">
					<div class="panel-body easypiechart-panel">
						<h4>Report</h4>
						<div class="easypiechart" id="">
							<span class="percent">
							<a href="manager_report.php">
								<img width="120px" style="margin-top:-23px;" src="images/Report_icon.jpg" alt="..." class="img-circle">
							</a>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

				
				<div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Out of Stock Medicines
                            </div> 
                            <div class="panel-body">
                                <div class="alert alert-danger">
                                <?php
										
										
										$sql = "SELECT * FROM medicine WHERE medicine_quantity=0";
										$result = $conn->query($sql);
										if($result->num_rows > 0) {
											 $count = $result->num_rows;
										}else{
											 $count = 0;
										}
									?>
									<h3 style="text-align:center;color:#e61717;">
										Total Out Of Stock Medicine: 
										<a href="manager_medistock.php" style="text-decoration:none;border:1px solid #E72832;border-radius: 50%;padding:5px 14px 5px 13px;background-color:#E72832;color:#fff;">
											<?php 
												echo $count;
											?>
										</a>
									</h3>
									<br>
								</div>
                            </div>
                        </div>

                    </div>
                </div>
				
				
                <!--<div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Out of Stock Medicines
                            </div> 
                            <div class="panel-body">
                                  <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="odd gradeX">
                                            <td>Piriton</td>
                                            <td>tablet</td>
                                            <td>Painkiller</td>
                                            
                                           
                                        </tr>
                                        <tr class="even gradeC">
                                            <td>Naproxen</td>
                                            <td>Tablet</td>
                                            <td>Reproductive</td>
                                            
                                            
                                        </tr>
                                        
                    
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>

                    </div>
                </div>
				-->
                <!-- /. ROW  -->
			
		
				<footer><p>&copy;2017 PMS All right reserved.</p>
				
        
				</footer>
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
    <script src="js/notify.js"></script>

      <script>
    
      </script>

</body>


<!-- Mirrored from webthemez.com/demo/bluebox-free-bootstrap-admin-template/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 23 Apr 2017 10:26:29 GMT -->
</html>