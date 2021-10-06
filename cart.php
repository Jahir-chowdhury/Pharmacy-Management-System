
<?php
session_start();
include_once('connect_db.php');
/*
if(isset($_POST['update_stock'])){
	$medicine_id=$_POST['medicine_id'];
	$value=$_POST['value'];
	$sql1=mysql_query("SELECT * FROM medicine WHERE medicine_id='$medicine_id'")or die(mysql_error());
	$result=mysql_fetch_array($sql1);
	if($result>0){
		$updated_value = $result['medicine_quantity']-$value;
	$sql=mysql_query("
		update 	medicine set 
		medicine_quantity = '$updated_value'
		where medicine_id = '$medicine_id'
	");
		if($sql>0) {header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/salesman.php");
		}else{
				$message1="<font style='color:#f6ff65;'>Update Failed, Try again</font>";
		}
	}
}
*/	
$page = 'salesman.php';
if (isset($_GET['add']))
{	

	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pms";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 


	
	

	// Perform queries 
	$sql ="SELECT * FROM medicine WHERE medicine_id= ".(int)$_GET['add'];
	
	$result = $conn->query($sql);

	
	while($row2 = $row = $result->fetch_assoc()){
		
		
		if($row2['medicine_quantity'] != $_SESSION['cart_'.(int)$_GET['add']]){

			
			$_SESSION['cart_'.(int)$_GET['add']] += 1;
		}
	}
	header('Location: '.$page);
}

if (isset($_GET['remove']))
{	
	$_SESSION['cart_'.(int)$_GET['remove']]--;
	header('Location: '.$page);
}

if (isset($_GET['delete']))
{	
	$_SESSION['cart_'.(int)$_GET['delete']]='0';
	header('Location: '.$page);
}

function s_unset(){
	
	foreach($_SESSION as $name => $value){
		if($value>0){
			if(substr($name, 0, 5)=='cart_'){
				$id = substr($name, 5, (strlen($name)-5));
				unset($_SESSION["cart_".$id]);
			}
		}
	}
}

if(isset($_POST["submit"])) { 
	$report_total_amount=$_POST['report_total_amount'];
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pms";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql="INSERT INTO report(report_total_amount,date)
	VALUES('$report_total_amount',NOW())";
	if($conn->query($sql) === TRUE) {
		s_unset();
		header('Location: '.$page);
	}
	
}

function products(){
	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
	$sql = "SELECT * FROM medicine WHERE medicine_quantity>0";
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		while($get_row = $result->fetch_assoc()) {

	echo "
	<tr class='odd gradeX'>
		<td>".$get_row['medicine_name']."</td>
		<td>".$get_row['medicine_generic']."</td>
		<td>".$get_row['medicine_type']."</td>
		<td>".number_format($get_row['medicine_price'],2)."</td>
		<td>".$get_row['medicine_quantity']."</td>
		<td>";
?>
			<a href="cart.php?add=<?php echo $get_row['medicine_id'];?>">
				ADD
			</a>
		</td>
										
	</tr>
<?php			
		}
		
	}
}



function item_info(){
	$num = 0;
	foreach($_SESSION as $name => $value){
		if($value!=0){
				if(substr($name, 0, 5)=='cart_'){
					$id = substr($name, 5, (strlen($name)-5));

					$id = (int)$id;
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "pms";
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					
					// Check connection
					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					} 

					$get = "SELECT * FROM medicine WHERE medicine_id='$id'";
					$result = $conn->query($get);
					while($get_row = $result->fetch_assoc()){
						$num++;
						echo "<input type='hidden' name='item_".$num."' value='".$id."'>";
						echo "<input type='hidden' name='item__name".$num."' value='".$get_row['medicine_name']."'>";
						echo "<input type='hidden' name='amount_".$num."' value='".$get_row['medicine_price']."'>";
						echo "<input type='hidden' name='quantity_".$num."' value='".$value."'>";
						
						
?>
					
<?php
					}
					
					
				
			}
		}
	}
}
?>
 
<?php
function cart(){
	$total = 0;
	foreach($_SESSION as $name => $value){

		
		if($value>0){
			if(substr($name, 0, 5)=='cart_'){
				$id = substr($name, 5, (strlen($name)-5));

				$id = (int)$id;

				$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
				$get = "SELECT * FROM medicine WHERE medicine_id='$id'";
				$result = $conn->query($get);

				while($get_row = $result->fetch_assoc()){
					$sub = $get_row['medicine_price']*$value;
?>
					<tr>
                        <td><?php echo 'item_'.$get_row['medicine_id'];?></td>
                        <td><?php echo $get_row['medicine_name'];?></td>
                        <td><?php echo $get_row['medicine_price'].' X '.$value;?></td>
                        <td><?php echo '৳ '.$sub;?></td>
                        <td>
							
							<a href="cart.php?remove=<?php echo $id?>" style="font-size:25px;text-decoration:none;">
								[<i class="fa fa-minus icon-font" aria-hidden="true"></i>]
							</a>
							<a href="cart.php?add=<?php echo $id?>" style="font-size:25px;text-decoration:none;">
								[<i class="fa fa-plus icon-font" aria-hidden="true"></i>]
							</a>
							
							<a href="cart.php?delete=<?php echo $id?>" style="font-size:25px;text-decoration:none;">
								[<i class="fa fa-times ico-remove icon-font" aria-hidden="true"></i>]
							</a>
							
							<form action="cart2.php" method="POST">
								<input type="hidden" name="medicine_id" value="<?php echo $get_row['medicine_id'];?>">
								<input type="hidden" name="p_medicine" value="<?php echo $value;?>">
								<button  type="submit" name="update_stock" style="font-size:15px;text-decoration:none;" value="">[Update Stock]</button>
							</form>
							
								
						</td>
                    </tr>

<?php					
				}
				$total += $sub;
			}
			 
		}
	}
	if($total==0){
		
?>			<tr>
                <td colspan="4"><h2 style="text-align:center;color: #e84141;">CART IS EMPTY</h2></td>
                
            </tr>
			
			
<?php	
	}else{
?>
			<tr>
                <td colspan="3">TOTAL</td>
                <td><?php echo '৳ '.$total;?></td>
            </tr>
			<tr>
                <td colspan="2"><input class="form-control" placeholder="Customer Name" type="text" onkeyUp="document.getElementById('printchatbox').innerHTML = this.value"></td>
                <td colspan="2"><input class="form-control" placeholder="Mobile Number" type="text" onkeyUp="document.getElementById('printchatbox2').innerHTML = this.value"></td>
                
            </tr>
			<tr>
                <td colspan="4">
					<input class="form-control" style="color:black;" align="center" onkeyUp="document.getElementById('printchatbox-invo-no-no').innerHTML = this.value" value="PMS-<?php echo date("d-M-Y").'-'.(rand()); ?>">
				</td>
                
                
            </tr>
			
			<tr>
                <td colspan="4">
					
                        <?php item_info();?>
                        <a onclick="printDiv('printableArea')" type="submit" class="btn btn-primary pull-right">Print Invoice</a>              
                        <form action="salesman.php" method="post">
							<input type="hidden" name="report_total_amount" value="<?php echo $total;?>">
							<input type="submit" name="submit" class="btn btn-primary" value="New invoice">             
						</form>
						<br>
						
					<!--<a href="#" class="pull-right btn btn-primary">Create MR</a>-->
				</td>
            </tr>
<?php
	}
}


?>

<?php
function cart2(){
	$total = 0;
	foreach($_SESSION as $name => $value){
		if($value>0){
			if(substr($name, 0, 5)=='cart_'){
				$id = substr($name, 5, (strlen($name)-5));
				$id = (int)$id;

				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "pms";
				
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				
				$get = "SELECT * FROM medicine WHERE medicine_id='$id'";
				$result = $conn->query($get);
				while($get_row = $result->fetch_assoc()){
					$sub = $get_row['medicine_price']*$value;
?>
					<tr>
                        <td><?php echo 'item_'.$get_row['medicine_id'];?></td>
                        <td><?php echo $get_row['medicine_name'];?></td>
                        <td><?php echo $get_row['medicine_price'].' X '.$value;?></td>
                        <td><?php echo '৳ '.$sub;?></td>
                        
                    </tr>

<?php					
				}
				$total += $sub;
			}
			 
		}
	}
	if($total==0){
		
?>			<tr>
                <td colspan="4"><h2 style="text-align:center;color: #e84141;">INVOICE IS EMPTY</h2></td>
                
            </tr>
			
			
<?php	
	}else{
?>
			<tr>
                <td colspan="3">TOTAL</td>
                <td><?php echo '৳ '.$total;?></td>
            </tr>
			
			<tr>
                <td colspan="4">
					
                        <?php item_info();?>
                        
					<!--<a href="#" class="pull-right btn btn-primary">Create MR</a>-->
				</td>
            </tr>
<?php
	}
}


?>

