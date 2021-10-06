
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

