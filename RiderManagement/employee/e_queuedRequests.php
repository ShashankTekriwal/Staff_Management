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
	if(isset($_GET['del'])&&$_GET['del']=='success'){
		echo "<script> alert('Deletion Successful !'); </script>";
	}
	$emp_code=$_SESSION['employee'];
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




						$query="SELECT * from JOB_FORM WHERE status='0' AND emp_code='$emp_code' ORDER BY submission_time DESC";
						$result=mysql_query($query);
						if(mysql_num_rows($result)!=0){

							echo "<div class='table-responsive'>
							<table style:'width:100%' class='table table-hover table-bordered'>
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
									$url = "delete.php?subtim=".urlencode($row['submission_time']);
									echo "<td>" . $row['job_title'] . "</td>";
									echo "<td>" . $row['job_type'] . "</td>";
									echo "<td style='width:220px'><p style='word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:200px'>" . $row['address'] . "</p></td>";
									echo "<td style='width:115px' >" . $row['deadline'] . "</td>";
									echo "<td style='width:310px' ><p align='left' style='float:right;word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:300px'><small>" . $row['details'] . "</small></p></td>";
									echo "<td style='width:240px'><span style='min-width:225px'>" . $row['submission_time'] . "<a href = '$url'><small style='float:right' type='muted-text'>delete</small></a></span></td>";
									

									

									echo "</tr>";
								}
								echo "</table> </div>";
							}else{
								echo "<p class='muted-text'>No queued Requests</p>";
							}


							?>
							
							

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