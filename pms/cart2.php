<?php
session_start();


include_once('connect_db.php');
//if(isset($_POST['update_stock'])){
	$medicine_id=$_POST['medicine_id'];
	$p_medicine=$_POST['p_medicine'];

	$sql1="SELECT * FROM medicine WHERE medicine_id='$medicine_id'";

	$data = $conn->query($sql1);
	
	if($data->num_rows > 0) {
		$result = $data->fetch_assoc();
		$updated_value = $result['medicine_quantity']-$p_medicine;
		
	$sql="
		update 	medicine set 
		medicine_quantity = '$updated_value'
		where medicine_id = '$medicine_id'
	";

		
	if($conn->query($sql) === TRUE)
	{
		header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/salesman.php");
		}else{
				$message1="<font style='color:#f6ff65;'>Update Failed, Try again</font>";
		}
	}
//}