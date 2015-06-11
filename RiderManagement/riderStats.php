<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
	
	<!-- Morris Charts CSS -->
	<link rel="stylesheet" type="text/css" href="required/morris.css">
	
</head>

<body>
	
	<?php
	require 'required/fn.php';
	require 'required/connectivity.php';
	session_start();
	if(!isset($_SESSION['manager'])&&!isset($_SESSION['admin'])){
		redirect('login.php');
	}
	if(!isset($_POST['year'])){
		echo "<h2>Page Not Found!</h2>";
		die();
	}
	include 'header.html';
	$year = $_POST['year'];
	require 'required/riderswork.php';
	?>    

	<div id='offcanvas' class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php 
				if(isset($_SESSION['manager'])){
					include 'sidebar.php';
				}else if(isset($_SESSION['admin'])){
					include 'asidebar.php';
				}
				?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" <div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Rider Statistics for the year <?php echo $year;?></h1>
						<hr>
						<div id='display' ></div>




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
	<script type="text/javascript"src='required/jquery.js'></script>
	<script type="text/javascript" src='required/raphael-min.js'></script>
	<script type="text/javascript" src='required/morris.min.js'></script> 
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script type="text/javascript">
		new Morris.Bar({
			element : "display",
			<?php echo $text ; ?>,
			xkey : 'y',
			ykeys : <?php echo $ykeys ; ?>,
			labels : <?php echo $labels ; ?>,
			xLabels : "month",
			parseTime:false            
		});
	</script>


</body>

</html>