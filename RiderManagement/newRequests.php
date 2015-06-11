<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 

</head>

<body>


	<?php
	require 'required/fn.php';
	session_set_cookie_params(0);
	session_start();
	if(!isset($_SESSION['manager'])){
		redirect('login.php');
	}
	include 'header.html'; ?> 
	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'sidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> New Requests  </h1>
						<hr>          

						<?php

						
						require 'required/connectivity.php';
						



						$query="SELECT * from JOB_FORM WHERE status='0' ORDER BY `submission_time` DESC ";
						$result=mysql_query($query);
						if(mysql_num_rows($result)!=0){

							echo "<div class='table-responsive'>
							<table class='table table-hover table-bordered'>
								<tr>
									<th>Employee</th>
									<th>Task name</th>
									<th>Task type</th>
									<th>Address</th>
									<th>Deadline</th>
									<th>Additional details</th>
									<th>Time of request</th>
									<th>Assign Rider</th>

								</tr>";

								while($row = mysql_fetch_array($result))
								{
									echo "<tr>";
									echo "<td>" . $row['emp_code'] . "</td>";
									echo "<td>" . $row['job_title'] . "</td>";
									echo "<td>" . $row['job_type'] . "</td>";
									echo "<td style='width:170px'><p style='word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:160px'>" . $row['address'] . "</p></td>";
									echo "<td style='width:115px'>" . $row['deadline'] . "</td>";
									echo "<td style='width:260px;'><p align='left' style='float:right;word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:250px'><small>" . $row['details'] . "</small></p></td>";
									echo "<td style='width:180px;'>" . $row['submission_time'] . "</td>";
									$url = 'assignrider.php?subtim='.urlencode($row['submission_time']).'&emp='.urlencode($row['emp_code']);
									echo "<td style='width:85px'> <button class='btn btn-primary' data-target='#assign' data-toggle='modal'><a href='$url' style='color:#ffffff' >Assign</a> </td>";

									echo "</tr>";
								}
								echo "</table> </div>";
							}else{
								echo "<p class='text-muted' >No new Requests! </p>";
							}


							?>

						</div> <!-- /main -->
					</div>
				</div> <!-- /row -->
			</div> <!-- /container fluid -->
		</div> <!-- /ro off canvas -->

		<?php include 'footer.html'; ?> 

		<script type="text/javascript">

			function alertFunc(){
				alert("Logged out!");
			}

		</script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">
		</script>

		<script src="bootstrap-3.2.0-dist/js/bootstrap.js">
		</script>
		<script src="scripts.js"></script>

	</body>

	</html>