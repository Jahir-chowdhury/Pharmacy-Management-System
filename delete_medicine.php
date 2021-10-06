<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['pharmacistlogin'])){
	$id=$_SESSION['pharmacist_id'];
	$user=$_SESSION['username'];
}else{
	session_destroy();
	header("location:index.php");
	exit();
}
if(isset($_SESSION['pharmacistlogin'])){
	$id=$_GET[medicine_id];
	$sql="delete from medicine where medicine_id='$id'";
	if($conn->query($sql) === TRUE){
		//$rows=mysql_fetch_assoc($result);
		header("location:pharmacist.php");
	};
	
}
?>


