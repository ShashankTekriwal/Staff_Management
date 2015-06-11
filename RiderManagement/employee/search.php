<html>
<head>

	<title>Search</title>

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
		//$_POST['search']='1234';
	if(isset($_GET['q'])&&!empty($_GET['q'])){
		$search = "%".$_GET['q']."%";
	}else{
		die('Page Not Found!');
	}
	if(isset($_SESSION['employee'])){
		$flag=1;
		include 'eheader.php';
		$emp_code = $_SESSION['employee'];
		$query = "SELECT * FROM `job_form` WHERE `emp_code`='$emp_code' AND ( `job_type` LIKE '$search' OR `job_title` LIKE '$search' OR `details` LIKE '$search' OR `address` LIKE '$search' OR `submission_time` LIKE '$search' )";
		
	}else{
		redirect('../login.php');
	}
	?>

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id='container' class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'esidebar.php'; ?>  

				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Search Results </small></h1>
						<hr>
						
						
						<?php

//connect





						$result=mysql_query($query);
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
									echo "<td>" . $row['submission_time'] . "</td>";
									

									echo "</tr>";
								}
								echo "</table> </div>";
							}else{
								echo "<p class='muted-text'>No Search Requests</p>";
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
