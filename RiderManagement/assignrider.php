<html>
<head>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 

</head>
<body>

	<?php  
	require 'required/fn.php';
	require 'required/connectivity.php';
	session_set_cookie_params(0);
	session_start();
	if(!isset($_SESSION['manager'])){
		redirect('login.php',false);
	}
	if(isset($_GET['emp'])&&isset($_GET['subtim'])){
		$key = urldecode($_GET['subtim']);
		$emp_mngr = urldecode($_GET['emp']);
	}else{
		echo "Page Not Found!";
		die();
	}
	$query = "SELECT * FROM `job_form` WHERE `emp_code`='$emp_mngr' AND `submission_time`='$key'";
	if($result=mysql_query($query)){
		$arr = mysql_fetch_assoc($result);
		$address = $arr['address'];
		$details = $arr['details'];
		$status =  get_status($arr['status']);
		$job_type = $arr['job_type'];
		$deadline = $arr['deadline'];
		$job_title = $arr['job_title'];
		$url = 'required/assign.php?emp='.$_GET['emp'].'&subtim='.$_GET['subtim'];
	} else {
		echo "<h2>PAGE NOT FOUND!</h2>";
		die();
	}
			//echo $_SERVER['PHP_SELF'];
	?>


	<?php include 'header.html'; ?> 
	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'sidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Assign <small> Rider </small> </h1>
						<hr>          

						<div class='table-responsive'>
							<table id='table' class='table table-hover table-bordered'>
								<tr>
									<th>Emplyee code</th>
									<th>Task name</th>
									<th>Task type</th>
									<th>Address</th>
									<th>Deadline</th>
									<th>Additional details</th>
									<th>Time of request</th>

								</tr>

								<tr>
									<td><?php echo $emp_mngr;?></td>
									<td><?php echo $job_title ;?></td>
									<td><?php echo $job_type ;?></td>
									<td><?php echo $address ;?></td>
									<td><?php echo $deadline ;?></td>
									<td><?php echo $details ;?></td>
									<td><?php echo date('Y-M-d H:i',strtotime($key)) ; ?></td>		
								</tr>
							</table>
						</div>

						<form action="<?php echo $url;  ?>" method="post">
							<table width="70%">
								<tr style="width:70%" >
									<td style="width:10%"><h4>Select Rider: </h4></td>
									<td style="width:40%"><select name='set_rider' class="form-control">
										<?php
										$query = "SELECT `Rider_code`,`Rider_name` FROM `riders` WHERE `riders`.`Rider_active`='1'";
										if($result = mysql_query($query)){}
											else echo mysql_error();
										if(mysql_num_rows($result)>0){
											while($row = mysql_fetch_assoc($result)){
												echo "<option value =".$row['Rider_code'].">".$row['Rider_name']."</option>";
											}
										}else{
											echo "<option value = '-1'>No Riders</option>";
										}
										?>
									</select>
								</td>

								<td style="width:10%; padding-top:0px; padding-left:5px"><button name = 'submit' class="btn btn-primary" role="button" type="submit">Assign</button></td>
							</tr>
						</table>
					</form>

				</div> <!-- /main -->
			</div>
		</div> <!-- /row -->
	</div> <!-- /container fluid -->
</div> <!-- /ro off canvas -->

<?php include 'footer.html'; ?> 



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
</script>

<script src="bootstrap-3.2.0-dist/js/bootstrap.js">
</script>

</body>
</html>