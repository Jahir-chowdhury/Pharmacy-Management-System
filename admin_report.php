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
    <title>PMS | Report</title>
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
	
	<script type="text/javascript">
		function printDiv(divName) {
			 var printContents = document.getElementById(divName).innerHTML;
			 var originalContents = document.body.innerHTML;

			 document.body.innerHTML = printContents;

			 window.print();

			 document.body.innerHTML = originalContents;
		}
	</script>

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
					<li>
                        <a href="admin_report.php"><i class="fa fa-qrcode"></i> Sales report</a>
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
                            Report <small>Pharmacy Management System</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="admin.php">Home</a></li>
					  <li><a href="admin.php">Admin</a></li>
					  <li class="active">Report</li>
					</ol> 
									
		</div>
            
               <div class="col-md-8 col-sm-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Generate report
							
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
                                
                                <li class="active"><a href="#profile" data-toggle="tab">Generate report</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">
                                
                                <div class="tab-pane fade active in" id="profile">
                                    <!--    Bordered Table  -->
									<div class="panel panel-default">
										<div class="panel-heading">
											 Generate report
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
											<form role="form" name="form1" onsubmit="return validateForm(this);" action="admin_report.php" method="post">
												
												<div class="form-group">
													<label class="control-label">Select Date</label>
													<select name="date_from" class="form-control" id="sel1">
														<?php
														$sql = "select * FROM report";
														$result = $conn->query($sql);
														if($result->num_rows > 0) {
															while($row = $result->fetch_assoc()) {
																echo "<option value='" .$row['date']. "'>".ucfirst($row['date']). "</option>";
															}
														}
														?>
													</select>
												</div>
												<br>
												<label class="control-label">TO</label>
												<br>
												<br>
												
												<div class="form-group">
													<label class="control-label">Select Date</label>
													<select name="date_to" class="form-control" id="sel1">
														<?php
														$sql = "select * FROM report";
														$result = $conn->query($sql);
														if($result->num_rows > 0) {
															while($row = $result->fetch_assoc()) {
																echo "<option value='" .$row['date']. "'>".ucfirst($row['date']). "</option>";
															}
														}
														?>
													</select>
												</div>
												
												<a onclick="printDiv('printableArea')" type="submit" class="btn btn-primary">Print report</a> 
												<button type="submit" name="submit" class="btn btn-primary pull-right">generate report</button>
											</form>
										</div>
									</div>
									<!--  End  Bordered Table  -->
								</div>
                            </div>
                        </div>
                    </div>
                </div>
				
				
				<div class="col-md-8 col-sm-8 col-md-offset-2">
				
                    <div class="panel panel-default" id="printableArea">
                        <div class="panel-heading">
						<?php
							$date_fromm=$_POST['date_from'] ?? '';
							$date_too=$_POST['date_to'] ?? '';
						?>
                            
							<div class="pms-logo"> <img style=" margin: 0 auto;" src="logo.png" class="img-responsive img-responsive2" alt="Responsive image"> </div>
							<center>Sales Report (<?php echo $date_fromm?> to <?php echo $date_too?>)</center>
								<?php
									if(isset($message)){
										echo "- ( ".$message." )";
									}if(isset($message1)){
										echo "- ( ".$message1." )";
									}
								?>
							
                        </div>
                        <div class="panel-body">
                            
                            <div class="table-responsive table-bordered">
												<table class="table">
													<thead>
														<tr>
															<th>#</th>
															<th>Date</th>
															<th>Amount</th>
															
														</tr>
													</thead>
													<tbody>
													<?php
													if(isset($_POST['submit'])){
														$total = 0;
														$date_from=$_POST['date_from'];
														$date_to=$_POST['date_to'];
														// get results from database
														$sql = "select * FROM report where date between '$date_from' and '$date_to'";
														$result = $conn->query($sql);
														if($result->num_rows > 0) {
															while($row = $result->fetch_assoc()) {
																$sub = $row['report_total_amount'];
													?>
													<tr>
														<td><?php echo $row['report_id'];?></td>
														<td><?php echo $row['date'];?></td>
														<td><?php echo $row['report_total_amount'];?></td>
													</tr>
													<?php
																$total += $sub;
															}
														}
													?>
													
													
													<tr>
															<td colspan="2">Total</td>
															<td><?php echo '৳ '.$total.' /=';?>
															<br><br><br><br><br><br>
																
															</td>
													</tr>
												
													
													<?php
													}
													?>
													</tbody>
													
												</table>
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