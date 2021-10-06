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
if(isset($_SESSION['adminlogin'])){
	
	if(isset($_POST['submit'])){
	$fname=$_POST['first_name'];
	$lname=$_POST['last_name'];
	$sid=$_POST['staff_id'];
	$postal=$_POST['postal_address'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$user=$_POST['username'];
	$pas=MD5($_POST['password']);


	$sql = "SELECT * FROM manager WHERE username='$user'";
		$result = $conn->query($sql);
		
		if($result->num_rows > 0) {
			$message="<font style='color:#f6ff65;'>sorry the username entered already exists</font>";
		}else{
			$sql1="INSERT INTO manager (first_name,last_name,staff_id,postal_address,phone,email,username,password)
			VALUES('$fname','$lname','$sid','$postal','$phone','$email','$user','$pas')";
			if($conn->query($sql1) === TRUE) {
				header("location:admin_manager.php");
			}else{
					$message1="<font style='color:#f6ff65;'>Registration Failed, Try again</font>";
			}
		}
	}
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
	
	<script>
		function validateForm()
		{

		//for alphabet characters only
		var str=document.form1.first_name.value;
			var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			//comparing user input with the characters one by one
			for(i=0;i<str.length;i++)
			{
			//charAt(i) returns the position of character at specific index(i)
			//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
			if(valid.indexOf(str.charAt(i))==-1)
			{
			alert("First Name Cannot Contain Numerical Values");
			document.form1.first_name.value="";
			document.form1.first_name.focus();
			return false;
			}}
			
		if(document.form1.first_name.value=="")
		{
		alert("Name Field is Empty");
		return false;
		}

		//for alphabet characters only
		var str=document.form1.last_name.value;
			var valid="abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLMNOPQRSTUVWXYZ";
			//comparing user input with the characters one by one
			for(i=0;i<str.length;i++)
			{
			//charAt(i) returns the position of character at specific index(i)
			//indexOf returns the position of the first occurence of a specified value in a string. this method returns -1 if the value to search for never ocurs
			if(valid.indexOf(str.charAt(i))==-1)
			{
			alert("Last Name Cannot Contain Numerical Values");
			document.form1.last_name.value="";
			document.form1.last_name.focus();
			return false;
			}}
			

		if(document.form1.last_name.value=="")
		{
		alert("Name Field is Empty");
		return false;
		}

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
                            Manager <small>Pharmacy Management System</small>
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="admin.php">Home</a></li>
					  <li><a href="admin.php">Admin</a></li>
					  <li class="active">Manager</li>
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
                                <li class="active"><a href="#home" data-toggle="tab">View manager</a>
                                </li>
                                <li class=""><a href="#profile" data-toggle="tab">Add manager</a>
                                </li>
                                
                            </ul>

                            <div class="tab-content">
                                <div class="tab-pane fade active in" id="home">
                                    
									<!--    Bordered Table  -->
									<div class="panel panel-default">
										<div class="panel-heading">
											Manager view 
											
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
											<div class="table-responsive table-bordered">
												<table class="table">
													<thead>
														<tr>
															<th>First Name</th>
															<th>Last Name</th>
															<th>Username</th>
															<th>Update</th>
															<th>Delete</th>
														</tr>
													</thead>
													<tbody>
													<?php
														$sql = "select * FROM manager";
														$result = $conn->query($sql);
														if($result->num_rows > 0) {
															while($row = $result->fetch_assoc()) {
													?>
													<tr>
														<td><?php echo $row['first_name'];?></td>
														<td><?php echo $row['last_name'];?></td>
														<td><?php echo $row['username'];?></td>
														<td>
															<a href="update_manager.php?manager_id=<?php echo $row['manager_id']?>">
																<i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
															</a>
														</td>
														<td>
															<a href="delete_manager.php?manager_id=<?php echo $row['manager_id']?>">
																<i class="fa fa-trash-o fa-2x" aria-hidden="true"></i>
															</a>
														</td>
													</tr>
													<?php
															}
														}
													?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!--  End  Bordered Table  -->
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <!--    Bordered Table  -->
									<div class="panel panel-default">
										<div class="panel-heading">
											Manager Add
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
											<form role="form" name="form1" onsubmit="return validateForm(this);" action="admin_manager.php" method="post">
												<div class="form-group">
													<input type="text" class="form-control" name="first_name" placeholder="First Name" required>
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="staff_id" placeholder="Staff ID" required>
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="postal_address" placeholder="Address" required>
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="phone" placeholder="Phone" required>
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="email" placeholder="Email" required>
												</div>
												
												<div class="form-group">
													<input type="text" class="form-control" name="username" placeholder="Username" required>
												</div>
												
												<div class="form-group">
													<input type="password" class="form-control" name="password" placeholder="Password" required>
												</div>
											   
												<button type="submit" name="submit" class="btn btn-primary pull-right">Add manager</button>
											</form>
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