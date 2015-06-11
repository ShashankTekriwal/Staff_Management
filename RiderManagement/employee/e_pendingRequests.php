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
	$emp_code = $_SESSION['employee'];
	include 'eheader.php'; ?>    

	<div id='offcanvas' class="row row-offcanvas row-offcanvas-left">
		<div id='container' class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'esidebar.php'; ?>  

				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Pending Requests</h1>
						<hr>
						<?php




						$query="SELECT * from JOB_FORM WHERE status='1' AND emp_code='$emp_code' ORDER BY submission_time DESC";
						$result=mysql_query($query);
						if(mysql_num_rows($result)==0){
							echo "<p class='muted-text'>No Pending Requests</p>";
						}else{

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
									echo "<td style='width:220px'><p style='word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:200px'>" . $row['address'] . "</p></td>";
									echo "<td style='width:115px'>" . $row['deadline'] . "</td>";
									echo "<td style='width:310px;'><p align='left' style='float:right;word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:300px'><small>" . $row['details'] . "</small></p></td>";
									echo "<td style='width:180px'>" . $row['submission_time'] . "</td>";
									

									echo "</tr>";
								}
								echo "</table> </div>";
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
		<script src="../scripts.js"></script>
		

	</body>

	</html>