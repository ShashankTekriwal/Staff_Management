<html>
<head>

	<title>Reports</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
	<link rel="stylesheet" type="text/css" href="required/default.css">

	<script type="text/javascript" src="required/jquery.js"></script>

</head>

<body>

	<?php
	session_start();
	require 'required/fn.php';
	if(isset($_SESSION['manager'])){
		include 'header.html';
	}else if(isset($_SESSION['admin'])){
		include 'header.html';
	}else{
		redirect('login.php');
	} ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
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
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Reports & Stats </h1>
						<hr>

						<div class="row">

							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
									<img data-src="holder.js/300x300" alt="">
									<div class="caption">
										<h3>Export data</h3>
										<p>Click to export all requests data to an excel file</p>


										<p><a href="genExcel.php" class="btn btn-primary" role="button" style="allign:center">Go</a></p>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
									<img data-src="holder.js/300x300" alt="">
									<div class="caption">
										<h3>Rider work</h3>
										<p>Click to view number of tasks completed by each rider per month</p>
										<form action='riderStats.php' method='POST' >
											Select Year : 
											<select name='year' class="form-contol" style="width:30%" >
												<?php
												show_year_options();
												?>
											</select><p></p>
											<p><button type = 'submit' class="btn btn-primary" role="button">Go</button></p>
										</form>
									</div>
								</div>
							</div>

							<div class="col-sm-6 col-md-4">
								<div class="thumbnail">
									<img data-src="holder.js/300x300" alt="">
									<div class="caption">
										<h3>All requests</h3>
										<p>Click to view number of requests received each month</p>
										<form action='allStats.php' method='POST' >
											Select Year : <select name='year' class="form-contol" style="width:30%" >
											<?php
											show_year_options();
											?>
										</select><p></p>
										<p><button class="btn btn-primary" role="button" type="submit">Go</button></p>
									</form>
								</div>
							</div>
						</div>

						<div class="col-sm-6 col-md-4">
							<div class="thumbnail">
								<img data-src="holder.js/300x300" alt="">
								<div class="caption">
									<h3>Courier Records</h3>
									<p>Click to export all requests data to an excel file</p>
									<form role='form' class="form-horizontal" action="required/courier_excel.php" method='POST' onsubmit="return valid()" >
										<div class="form group" >
											<label for="from" >From: </label>
											<input  required name='from' type="text" class="form-control" id="from" placeholder="Choose Start Date">
										</div>
										<div class="form group" >
											<label for="to">To:</label>
											<input  required name='to' type="text" class="form-control" id="to" placeholder="Choose End Date">
										</div><p></p>
										<p id="date_span" class="text-danger"></p>
										<button type="submit" class="btn btn-primary" >Export</button>
									</form>



								</div>
							</div>
						</div>


					</div>


				</div>
			</div>
		</div>
	</div>
</div>

<?php include 'footer.html'; ?>     




<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
<script type="text/javascript" src='required/zebra_datepicker.js' ></script>
<script type="text/javascript">
	$('#from').Zebra_DatePicker({
		pair:$('#to')
	});
	$('#to').Zebra_DatePicker({
		direction:1
	});
	function valid () {
		if($('#to').val()==''||$('#from').val()==''){
			$('#date_span').html('Enter the required dates!');
			return false;
		}
		return true;
	}
</script>
<script src="scripts.js"></script>


</body>

</html>