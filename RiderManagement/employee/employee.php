<html>
<head>

	<title>Welcome Employee</title>

	<link href="../bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="../bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
	<link href="../bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">     
	<!-- Morris Charts CSS -->
    <!--
    <link href="font-awesome.min.css" rel="stylesheet" type="text/css"> -->
</head>

<body>
	
	<?php
	require '../required/fn.php';
	session_start();
	if(!isset($_SESSION['employee'])){
		redirect('../login.php');
	}
	$emp_code = $_SESSION['employee'];
	require '../required/employee_dashboard.php';
	include 'eheader.php'; 
	?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'esidebar.php'; ?>  

				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Welcome Employee</h1>
						<hr>
						<ol class="breadcrumb">
							<li class="active">
								<i class="fa fa-dashboard"></i> Your Statistics
							</li>
						</ol>
						<div class="row">
							<div class="col-lg-4 col-md-4" >
								<div class="panel panel-primary">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-paperclip fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $arr[0];?></div>
												<div>Queued Requests</div>
											</div>
										</div>
									</div>
									<a href="e_queuedRequests.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>

							<div class="col-lg-4 col-md-4">
								<div class="panel panel-red" >
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-clock-o fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $arr[1];?></div>
												<div>Pending Requests</div>
											</div>
										</div>
									</div>
									<a href="queuedRequests.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>


							<div class="col-lg-4 col-md-4" >
								<div class="panel panel-green">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-3">
												<i class="fa fa-check-circle fa-5x"></i>
											</div>
											<div class="col-xs-9 text-right">
												<div class="huge"><?php echo $arr[2];?></div>
												<div>Completed Requests</div>
											</div>
										</div>
									</div>
									<a href="completedRequests.php">
										<div class="panel-footer">
											<span class="pull-left">View Details</span>
											<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
											<div class="clearfix"></div>
										</div>
									</a>
								</div>
							</div>
						</div>



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