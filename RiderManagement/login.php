<html>
<head>
	<title>Login</title>
	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	require 'required/fn.php';
	session_start();
	if(isset($_SESSION['employee'])){
			//echo "u r already logd in";
		redirect('employee/employee.php',false);
	} else if(isset($_SESSION['manager'])) {
		redirect('manager.php',false);
	} else if(isset($_SESSION['admin'])) {
		redirect('admin.php',false);
	}
	?>
	<div align = 'center' style="position:center" >
		<img src="glyphicons_free/logo1.png" align="center" style="height:180px;width:160px">
	</div>
	<hr size="1px">
	<h2 align="center"> Login.. </h2>
	<form action="required/user.php" method="post">

		<table style="width:320px" align="center">
			<tr>
				<td> Employee code : </td>
				<td><input type="text" class="form-control" name="emp_code" id="empcode" placeholder="Enter code" ></td>
				
			</tr>
			<tr>
				<td> Password : </td>
				<td><input type="password" name="password" class="form-control" id="pass" placeholder="Password"></td>
				
			</tr>
			<tr>
				<td>
					<br>
				</td>
			</tr>
			<tr>
				<td align="center"> <input type="submit" class="btn btn-primary" value="Submit"></td>
				<td align="center"> <input type="reset" class="btn btn-default" value="Clear"></td>
			</tr>
			
		</table>



	</form>  
	<p align="center" class="muted-text">
		<?php
		if(isset($_GET['err'])){
			if($_GET['err']=='wrong'){
				echo "<font color=#FF0000>Wrong Employee Code and Password Combination!</font>";
			}else if($_GET['err']=='deac'){
				echo "<font color=#FF0000>Your account has been deactivated by the admin!</font>";
			}
		}
		?>
	</p>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>


</body>
</html>