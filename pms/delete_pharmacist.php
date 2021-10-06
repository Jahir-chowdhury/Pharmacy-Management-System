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
	$id=$_GET[pharmacist_id];
	$sql="delete from pharmacist where pharmacist_id='$id'";
	if ($conn->query($sql) === TRUE) {
		header("location:admin_pharmacist.php");
	}
}
?>


