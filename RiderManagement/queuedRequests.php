<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 

</head>

<body>


	<?php include 'header.html'; error_reporting(0); ?> 
	<div id='offcanvas' class="row row-offcanvas row-offcanvas-left">
		<div id='container' class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'sidebar.php'; ?>
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Pending </h1>
						<hr>

						<?php


						require 'required/connectivity.php';
						require 'required/fn.php';





						$query="SELECT * from JOB_FORM WHERE status='1' ORDER BY `submission_time` DESC ";
						$result=mysql_query($query);
						if(mysql_num_rows($result)==0){
							echo "<p class='text-muted'>No Pending Requests. </p>";
						}else{





							echo "<div class='table-responsive' id='divID'>
							<table class='table table-hover table-bordered' id='tableID'>
								<tr>
									<th>Emp..</th>
									<th>Task name</th>
									<th>Task type</th>
									<th>Address</th>
									<th>Deadline</th>
									<th>Additional details</th>
									<th>Request Time</th>
									<th>Rider Assigned</th>
									<th>Compl..</th>
								</tr>";

								while($row = mysql_fetch_array($result))
								{
									$url1 = "required/complete_job.php?emp=".urlencode($row['emp_code'])."&subtim=".urlencode($row['submission_time']);
									$url2 = "assignrider.php?emp=".urlencode($row['emp_code'])."&subtim=".urlencode($row['submission_time']);
									$sql = "SELECT Rider_name FROM riders WHERE Rider_code=".$row['rider'];
									$sql = mysql_fetch_assoc(mysql_query($sql))['Rider_name'];
									echo "<tr>";
									echo "<td>" . $row['emp_code'] . "</td>";
									echo "<td>" . $row['job_title'] . "</td>";
									echo "<td>" . $row['job_type'] . "</td>";
									echo "<td style='width:170px'><p style='word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:160px'>" . $row['address'] . "</p></td>";
									echo "<td style='width:115px'>" . $row['deadline'] . "</td>";
									echo "<td style='width:260px;'><p align='left' style='float:right;word-wrap: break-word;overflow:scroll;overflow-x:hidden;overflow-y:auto;max-height:100px;width:250px'><small>" . $row['details'] . "</small></p></td>";
									echo "<td style='width:130px;'>" . $row['submission_time'] . "</td>";
									echo "<td style='width:100px'><small>". $sql."<a href = '$url2' style='float:right;' >change</a></small></td>";
									echo "<td><a href = '$url1'><button type='button' class='btn btn-primary'>yes</button></a></td>";

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

		<?php include 'footer.html'; ?>


		<script src="required/jquery.js"></script>

		<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
		<script src="scripts.js"></script>
		<script src="del.js"></script>

	</body>

	</html>