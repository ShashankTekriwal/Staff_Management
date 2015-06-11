<html>
<head>

	<title>Welcome Manager</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css">     
	<!-- Morris Charts CSS -->
	<link href="morris.css" rel="stylesheet">
	
</head>

<body>
	
	<?php include 'header.html'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'sidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" <div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Rider Status </h1>
						<hr>
						
						<form action="#" method="post">
							<table width="70%">
								<tr style="width:70%">
									<td style="width:10%"><h4>Select Rider: </h4></td>
									<td style="width:40%"><select name="rider" class="form-control">
										<?php
										require 'required/connectivity.php';
										$query = "SELECT `Rider_code`,`Rider_name` FROM `riders` WHERE `riders`.`Rider_active`='1'";
										if($result = mysql_query($query)){}
											else echo mysql_error();
										if(mysql_num_rows($result)>0){
											while($row = mysql_fetch_assoc($result)){
												echo "<option value =".$row['Rider_code'].",".$row['Rider_name'].">".$row['Rider_name']."</option>";
											}
										}else{
											echo "<option value = '-1'>No Riders</option>";
										}
										?>
									</select></td>

									
									<td style="width:10%; padding-top:8px; padding-left:5px"><p><button name='submit' type="submit" class="btn btn-primary" >Go</button></p></td>
								</tr>
							</table> 
						</form>   
						<hr>
						
						
						<div > <!-- Echo the table in this div --> 
							<?php
							$arr = array();
							if (isset($_POST['rider'])&&isset($_POST['submit'])) {
								$arr = explode(",",$_POST['rider']);
								$rider_code = $arr[0];
								$rider_name = $arr[1];
								$query = "SELECT `address`,`submission_time` FROM `job_form` WHERE `rider`= '$rider_code' AND `status` = '1' ORDER BY `submission_time` DESC";
								echo "<div class='table-responsive' id='divID'>
								<p class='text-muted' ><h3 class='text-muted'>Rider Name : $rider_name</h3></p><hr>";
								if ($result = mysql_query($query)) {
									if(mysql_num_rows($result)!=0){
										$counter=1;
										echo"
										<table class='table table-hover table-bordered' id='tableID'>
											<tr><th>S.No.</th><th>Address</th><th>Request Time</th></tr>";
											while ($row=mysql_fetch_assoc($result)) {
												echo "<tr><td>$counter</td><td>".$row['address']."</td><td>".$row['submission_time']."</td></tr>";
												$counter ++;
											}
											echo "</table></div>";
										}else{
											echo "<p class='muted-text'>No tasks assigned to the rider!</p>";
										}
									}else{
										echo "ERROR".mysql_error();
									}
								}else{
									echo "<div><p class='text-muted'>Please select a rider to view status...</p></div>";
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
			
			function replaceContentInContainer(target,source) {
				document.getElementById(target).innerHTML  = document.getElementById(source).innerHTML;
			}
			function alertFunc(){
				alert("Logged out!");
			}



		</script>

		<script src="required/jquery.js"></script>    
		<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>
		<script src="scripts.js"></script>



	</body>

	</html>