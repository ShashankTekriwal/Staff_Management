<html>
<head>

	<title>Welcome Employee</title>

	<link href="../bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link href="../bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">  
	<link rel="stylesheet" type="text/css" media="screen" href="../required/default.css" />   
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
	include 'eheader.php'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id='wrapper' class="row">
				<?php include 'esidebar.php'; ?>  

				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Rider Request Form</h1>
						<hr>

						<form role="form" class="form-horizontal" method="post" action="../required/form_submitted.php">
							<div class="form-group">
								<label for="title" class="control-label col-lg-2"><font color="#FF0000">*</font>Job Title :</label>
								<div class="col-lg-5">
									<input type="text" name="title" id="title" placeholder="Enter Job Title"  class="form-control" required> 
								</div>
							</div>

							<div class="form-group">
								<label for="jobtype" class="control-label col-lg-2"><font color="#FF0000">*</font>Type of Job : </label>
								<div class="col-lg-5">
									<select name='type_job' id="jobtype" class="form-control">

										<option value="Bills">Bills</option>
										<option value="Cheques">Cheques</option>
										<option value="Samples">Samples</option>
										<option value="Inputs">Inputs</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="add" class="control-label col-lg-2"><font color="#FF0000">*</font> Address : </label>
								<div class="col-lg-5">
									<textarea placeholder='Specify full address...' name="address" rows="3" cols="30" id="add" class="form-control" required></textarea>
								</div>
							</div>

							<div class="form-group" id='pick'>
								<label for="datepickerID" class="control-label col-lg-2"><font color="#FF0000">*</font> Deadline : </label> 
								<div class="col-lg-5">
									<input name="deadline" placeholder='Click to use calendar..' type="text" id="datepickerID" required  class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label for="texta" class="control-label col-lg-2"><font color="#FF0000">*</font> Details : </label> 
								<div class="col-lg-5">
									<textarea name="details" required rows="4" id="texta" cols="30" placeholder="Enter additional details here.." class="form-control"></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-5">
									<input name='submit' type="submit" class="btn btn-primary" value="Submit">
									<input type="reset" class="btn btn-default" value="Clear">
								</div>
							</div>



						</form>
						<?php
						if(isset($_GET['fstatus'])){
							if($_GET['fstatus']=='success'){
								echo "<p class='text-success'>Your request has been submitted successfully.</p>";
							}else if($_GET['fstatus']=='failure'){
								echo "<p class='text-danger'>Your request couldn't be submitted successfully. Try again.</p>";
							}
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
			alert("Request Sent!");
		}
	</script>

	<script src="../required/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#datepickerID').Zebra_DatePicker({
				direction:true,
				format:'d-M-Y'
			});
		})
	</script>
	<script src="../bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="../required/moment.js"></script>
	<script type="text/javascript" src='../required/zebra_datepicker.js'></script>

	<script src="../scripts.js"></script>


</body>

</html>