<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" media="screen" href="required/default.css" />    
	<!-- Morris Charts CSS -->


	<!--<link href="font-awesome.css" rel="stylesheet" type="text/css">-->
</head>

<body>

	<?php
	session_start();
	require 'required/fn.php';
	if(isset($_SESSION['manager'])){
		$side = 'sidebar.php';
	}elseif (isset($_SESSION['admin'])) {
		$side = 'asidebar.php';
	}else{
		redirect('login.php');
	} include 'header.html'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include $side; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Add Courier </h1>
						<hr>
						<?php
						if (isset($_GET['err'])) {
							if ($_GET['err']==101) {
								echo "<p class='text-success' >Courier added successfully!</p>";
							} elseif($_GET['err']==202) {
								echo "<p class='text-danger' >Courier couldn't be added! Please see that you are filing all details..</p>";
							}

						}
						?>


						<form role="form" class="form-horizontal" method="post" action="required/newcourier.php" onsubmit="return valid()">
							<div class="form-group">
								<label for="date" class="control-label col-lg-2"><font color="#FF0000">*</font>Date :</label>
								<div class="col-lg-5">
									<input type="text" name="date" id="date" placeholder="Choose date"  class="form-control" required><p id="date_span" class="text-danger"></p>
								</div>
							</div>

							<div class="form-group">
								<label for="cp" class="control-label col-lg-2"><font color="#FF0000">*</font>Contact Person :</label>
								<div class="col-lg-5">
									<input type="text" name="cp" placeholder="Enter contact person name"  class="form-control" required> 
								</div>
							</div>

							<div class="form-group">
								<label for="company" class="control-label col-lg-2"><font color="#FF0000">*</font>Company :</label>
								<div class="col-lg-5">
									<input type="text" name="company" placeholder="Enter company name"  class="form-control" required> 
								</div>
							</div>

							<div class="form-group">
								<label for="add" class="control-label col-lg-2"> Address : </label>
								<div class="col-lg-5">
									<textarea rows="3" cols="30" name="add" class="form-control" ></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="location" class="control-label col-lg-2"><font color="#FF0000">*</font>Location :</label>
								<div class="col-lg-5">
									<input type="text" name="location" placeholder="Enter location here"  class="form-control" required> 
								</div>
							</div>

							<div class="form-group">
								<label for="mobile" class="control-label col-lg-2">Mobile no. :</label>
								<div class="col-lg-5">
									<input type="text" name="mobile" placeholder="Enter mobile no. here"  class="form-control" > 
								</div>
							</div>      

							<div class="form-group">
								<label for="wt" class="control-label col-lg-2">Approx. Weight (gm) :</label>
								<div class="col-lg-5">
									<input type="text" name="wt" placeholder="Enter weight here"  class="form-control" > 
								</div>
							</div>

							<div class="form-group">
								<label for="sender" class="control-label col-lg-2"><font color="#FF0000">*</font>Sender :</label>
								<div class="col-lg-5">
									<input type="text" name="sender" placeholder="Enter sender name here"  class="form-control" required> 
								</div>
							</div>     

							<div class="form-group">
								<label for="behalf" class="control-label col-lg-2"><font color="#FF0000">*</font>On Behalf of: </label>
								<div class="col-lg-2">
									<input type="radio" name="behalf" value="Infinity" checked> Infinity
								</div>
								<div class="col-lg-3">
									<input type="radio" name="behalf" value="R&M"> R&M 
								</div>
							</div>   

							<div class="form-group">
								<label for="pod" class="control-label col-lg-2">POD no. :</label>
								<div class="col-lg-5">
									<input type="text" name="pod" placeholder="Enter pod no. here"  class="form-control" > 
								</div>
							</div>                        


							<div class="form-group">
								<label for="texta" class="control-label col-lg-2"> Details : </label> 
								<div class="col-lg-5">
									<textarea rows="4" name="details" id="texta" cols="30" placeholder="Enter additional details here.." class="form-control"></textarea>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-5">
									<input type="submit" class="btn btn-primary" value="Submit">
									<input type="reset" class="btn btn-default" value="Clear">
								</div>
							</div>



						</form>




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

	<script type='text/javascript' src="required/jquery.js"></script>    
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
	<script type="text/javascript" src="required/moment.js"></script>
	<script type="text/javascript" src='required/zebra_datepicker.js'></script>

	<script type="text/javascript">
        //$('#date_span').html($('#date').text()+'hi');
        $(document).ready(function(){
        	$('#date').Zebra_DatePicker({

        		format:'d-M,Y'
        	});
        });
        function valid(){
            //alert('hi');
            if ($('#date').val()=='') {
              //alert('false');
              $('#date_span').html('Date is required!');
              return false;
          }else{
              //alert('true');
              return true;
          };
      }

  </script>




</body>

</html>