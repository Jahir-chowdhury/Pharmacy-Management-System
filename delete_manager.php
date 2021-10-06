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
	$id=$_GET[manager_id];
	$sql="delete from manager where manager_id='$id'";
	if ($conn->query($sql) === TRUE) {
		header("location:admin_manager.php");
	}
}
?>


