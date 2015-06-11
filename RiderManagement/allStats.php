<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" type="text/css" href="required/morris.css">
	
	
	<!-- Morris Charts CSS -->
	
	
</head>

<body>
	
	<?php
	require 'required/connectivity.php';
	require 'required/fn.php';
	session_start();
	if(!isset($_SESSION['manager'])&&!isset($_SESSION['admin'])){
		redirect('login.php');
	}
	if(!isset($_POST['year'])){
		die('Page Not Found!');
	}
	include 'header.html';
	$year = "%".$_POST['year']."%";
	$query = "SELECT * FROM `job_form` WHERE `submission_time` LIKE '$year'";
	$count = array();
	for ($i=0; $i < 12; $i++) { 
		$count[$i]=0;
	}
	if($result=mysql_query($query)){
		if(mysql_num_rows($result)==0){
			$flag = 0;
		}
		while ($row=mysql_fetch_assoc($result)) {
			$sub = $row['submission_time'];
			$m = date('n',strtotime($sub));
			$count[$m]++;
		}
		$d = "data: [";
		for ($i=1; $i < 13; $i++) { 
			$date=date_create_from_format('n',"$i");
			$month = date_format($date,'M');
			$j=$i-1;
			$d=$d."{ y: '$month' , a : $count[$j] }";
			if($i!=12)
				$d=$d.",";
		}
		$d = $d."]";
	}
	?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php if(isset($_SESSION['manager'])){
					include 'sidebar.php';
				}else if(isset($_SESSION['admin'])){
					include 'asidebar.php';
				} ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1>Number Of Requests in the year <?php echo $_POST['year'] ;?></h1>
						<hr>
						<div id='display'>
							
						</div>
						
						
						

					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.html'; ?>     



	<script type="text/javascript">
		function alertFunc(){
			alert("Logged out!");
		}
	</script>
	<script type="text/javascript" src='required/jquery.js'></script>
	<script type="text/javascript" src='required/raphael-min.js'></script>
	<script type="text/javascript" src='required/morris.min.js' ></script>

	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script src="scripts.js"></script>
	<script type="text/javascript">
		Morris.Bar({
			element: 'display',
			<?php echo $d; ?>,
			xkey: 'y',
			ykeys: ['a'],
			labels: ['Total Number of Requests']
		});
	</script>


</body>

</html>