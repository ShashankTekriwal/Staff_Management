<html>
<head>

	<title>Welcome Admin</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">     
	<!-- Morris Charts CSS -->


</head>

<body>
	
	<?php
	session_start();
	require 'required/fn.php';
	require 'required/connectivity.php';
	if(!isset($_SESSION['admin'])){
		redirect('login.php');
	}
	include 'header.html'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'asidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Riders </small></h1>
						<hr>
						<form id="rider_form" name="rider_form" method='post' class="form-inline" role="form" action="required/addRider.php" onsubmit="return validate()">

							<label ><h3>Add Rider</h3> </label>
							<div class="form-group">
								<label for="name" style="margin-left:30px">Rider Name: </label>
								<input  required name='name' type="text" class="form-control" id="name" placeholder="Enter rider name">
							</div>

							<div class="form-group">
								<label for="code" style="margin-left:10px">Rider Code: </label>
								<input  required name="code" type="text" class="form-control" id="code" placeholder="Enter rider code">
							</div>

							<button type="submit" class="btn btn-primary" style="margin-left:20px">Add</button>
						</form> 
						<p class="text-danger" id="usr_name_span"></p>
						<p class="text-danger" id='name_span'></p>
						<?php if(isset($_GET['err'])){
							if($_GET['err']==101){
								echo "<p class='text-danger' >Rider Code not available..</p>";
							}else if($_GET['err']==202){
								echo "<p class='text-success' >Rider added successfully !</p>";
							}else if($_GET['err']==303){
								echo "<p class='text-danger' >Could not add rider !</p>";
							}
						} ?>
						<hr>

						<div id="place">
							<h3 class="text-primary" >Rider Accounts</h3>

							<?php




							$query="SELECT * from RIDERS";
							$result=mysql_query($query);
							if(mysql_num_rows($result)!=0){

								echo "<div class='table-responsive'>
								<table class='table table-hover table-bordered'>
									<tr>
										<th>Rider code</th>
										<th>Rider name</th>

									</tr>";

									while($row = mysql_fetch_array($result))
									{
										echo "<tr>";
										if($row['Rider_active']==1){
											echo "<td>" . $row['Rider_code'] . "</td>";
											echo "<td>" . $row['Rider_name'] . "</td>";
										}else{
											echo "<td class='text-danger'>" . $row['Rider_code'] . "</td>";
											echo "<td class='text-danger'>" . $row['Rider_name'] . "</td>";
										}


										echo "</tr>";
									}
									echo "</table> </div>";
								}else{
									echo "<p class='text-muted' >No Rider Accounts!</p>";
								}


								?>


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

		<script src="required/jquery.js"></script>
		<script type="text/javascript">
			function validate_name(){
  			//var x = $('#name').attr('value');
  			var x = document.forms["rider_form"]["code"].value;
  			var reg_name=/^[0-9-][ 0-9-]*[0-9-]$/;
  			if (x==""||x==null) {
  				$('#name_span').text('Employee Code is required.');
  				return false;
  			}else if(!reg_name.test(x)){
  				$('#name_span').text('Employee Code can contain only numbers.');
  				return false;
  			}else if(x.length!=4){
  				$('#name_span').text('Employee Code should be of 4 letters only. Eg: 9999!');
  				return false;
  			}else{
  				$('#name_span').text('');
  				return true;
  			}
  		}

  		function validate_usr_name(){
  		//var x = $('#name').attr('value');
  		var x = document.forms["rider_form"]["name"].value;
  		var reg_name=/^[a-zA-Z-][a-zA-Z\s\.]+$/;
  		if (x==""||x==null) {
  			$('#usr_name_span').text('Employee Name is required.');
  			return false;
  		}else if(!reg_name.test(x)){
  			$('#usr_name_span').text('Employee Name can contain only letters.');
  			return false;
  		}else{
  			$('#usr_name_span').text('');
  			return true;
  		}
  	}

  	function validate(){
  		if(validate_name()&validate_usr_name())
  			return true;
  		return false;
  	}
  </script>    
  <script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>



</body>

</html>