<html>
<head>

	<title>Welcome Employee</title>

	<link href="../bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	
	<link href="../bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">     
	<!-- Morris Charts CSS -->
	
    <!--
    <link href="font-awesome.min.css" rel="stylesheet" type="text/css"> -->
</head>

<body>
	
	<?php
	require '../required/fn.php';
	require '../required/connectivity.php';
	session_start();
	if(!isset($_SESSION['employee'])){
		redirect('../login.php');
	}
	if (isset($_GET['subtim'])) {
		$subtim = $_GET['subtim'];
		$key = urldecode($subtim);
	}else{
		echo "Page Not Found!";
		die();
	}
	$emp_code=$_SESSION['employee'];
	$query="SELECT * from JOB_FORM WHERE submission_time='$key' AND emp_code='$emp_code'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)==0){
		echo "Page Not Found!";
		die();
	}
	include 'eheader.php'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'esidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Queued Requests </small></h1>
						<hr>
						
						
						<?php

//connect





						if(mysql_num_rows($result)!=0){

							echo "<div class='table-responsive'>
							<table class='table table-hover table-bordered'>
								<tr>
									
									<th>Task name</th>
									<th>Task type</th>
									<th>Address</th>
									<th>Deadline</th>
									<th>Additional details</th>
									<th>Time of request</th>
									

								</tr>";

								while($row = mysql_fetch_assoc($result))
								{
									echo "<tr>";
									echo "<td>" . $row['job_title'] . "</td>";
									echo "<td>" . $row['job_type'] . "</td>";
									echo "<td>" . $row['address'] . "</td>";
									echo "<td>" . $row['deadline'] . "</td>";
									echo "<td>" . $row['details'] . "</td>";
									echo "<td>" . $row['submission_time'] ."</td>";
									echo "</tr>";
								}
								echo "</table> </div>";
								$url = "delReq.php?subtim=".urlencode($subtim);
							}


							?>
							<p>Are you sure you want to delete this request?</p>
							<a href=<?php echo $url; ?> ><button class='btn btn-primary' >Yes</button></a>
							<a href = "e_queuedRequests.php" ><button class='btn btn-default' >No</button></a>                       
							

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include '../footer.html'; ?>     

		<script type="text/javascript">
			function alertFunc(){
				alert("Logged out!");
			}
		</script>

		<script src="../required/jquery.js"></script>    
		<script src="../bootstrap-3.2.0-dist/js/bootstrap.js"></script>
		<script src="scripts.js"></script>
		

	</body>

	</html>