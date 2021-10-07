<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>PMS LOGIN</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="pms-logo">
		<img src="logo.png" class="img-responsive img-responsive2" alt="Responsive image">
	</div>
	<div class="login">
		<h1>PMS Login</h1>
		<?php 
		if(isset($message)){
			echo $message;
		}
		?>
		<form method="post" action="index.php">
			<input type="text" name="username" placeholder="Username" required="required" />
			<input type="password" name="password" placeholder="Password" required="required" />
			<select class="form-control" name="position">
                <option selected>Select Role</option>
                <option>Admin</option>
                <option>Manager</option>
                <option>Pharmacist</option>
                <option>Salesman</option>
            </select>
			<br>
			<button type="submit" name="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
		</form>
		
		<div class="pms-footer">
			Copyright &copy; PMS <?php echo date('Y');?> <br>All right reserved. Developed by DJM
		</div>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['adminlogin'])){
	header("location:admin.php");
}
if(isset($_SESSION['managerlogin'])){
	header("location:manager.php");
}
if(isset($_SESSION['pharmacistlogin'])){
	header("location:pharmacist.php");
}
if(isset($_SESSION['salesmanlogin'])){
	header("location:salesman.php");
}
include_once 'connect_db.php';
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$position=$_POST['position'];
	switch($position){
		case 'Admin':
		$sql="SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$_SESSION['adminlogin']=true;
			$_SESSION['admin_id']=$row['admin_id'];
			$_SESSION['username']=$row['username'];
			header("location:admin.php");
		}else{
			$message="<h4 style='text-align:center;color:#FF5722;'>Invalid login Try Again</h4>";
		}
		break;

		case 'Manager':
		$sql="SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		if($result->num_rows > 0) {
			$_SESSION['managerlogin']=true;
			$_SESSION['manager_id']=$row[0];
			$_SESSION['first_name']=$row[1];
			$_SESSION['last_name']=$row[2];
			$_SESSION['staff_id']=$row[3];
			$_SESSION['username']=$row[4];
			header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/manager.php");
		}else{
		$message="<h4 style='text-align:center;color:#FF5722;'>Invalid login Try Again</h4>";
		}
		break;

		case 'Pharmacist':
		$sql="SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION['pharmacistlogin']=true;
			$_SESSION['pharmacist_id']=$row[0];
			$_SESSION['first_name']=$row[1];
			$_SESSION['last_name']=$row[2];
			$_SESSION['staff_id']=$row[3];
			$_SESSION['username']=$row[4];
			header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/pharmacist.php");
		}else{
		$message="<h4 style='text-align:center;color:#FF5722;'>Invalid login Try Again</h4>";
		}
		break;

		case 'Salesman':
		$sql="SELECT salesman_id, first_name,last_name,staff_id,username FROM salesman WHERE username='$username' AND password='$password'";
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION['salesmanlogin']=true;
			$_SESSION['salesman_id']=$row[0];
			$_SESSION['first_name']=$row[1];
			$_SESSION['last_name']=$row[2];
			$_SESSION['staff_id']=$row[3];
			$_SESSION['username']=$row[4];
			header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/salesman.php");
		}else{
		$message="<h4 style='text-align:center;color:#FF5722;'>Invalid login Try Again</h4>";
		}
		break;
	}
}
?>


