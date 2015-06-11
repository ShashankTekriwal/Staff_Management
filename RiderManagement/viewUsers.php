<html>
<head>

	<title>Welcome Admin</title>

	<link href="bootstrap-3.2.0-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 

	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	<link href="bootstrap-3.2.0-dist/css/dashboard.css" rel="stylesheet" type="text/css"> 
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
					<div id="main" <div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> All Users </h1>
						<hr>
						
						
						<?php

//connect


						for($x=0;$x<=2;$x++){
							$query="SELECT * from `LOGIN` WHERE `Designation` = '$x'";
							$result=mysql_query($query);
							if(mysql_num_rows($result)==0){
								continue;
							}else if($x==0){
								echo "<h3 class='text-primary'>Employee Accounts</h3>";
							}else if($x==1){
								echo "<h3 class='text-primary'>Manager Accounts</h3>";
							}else{
								echo "<h3 class='text-primary'>Admin Accounts</h3>";
							}

							echo "<div class='table-responsive container' >
							<table class='table table-hover table-bordered'>
								<tr>
									<th>Employee code</th>
									<th>Employee Name</th>
									<th>Department</th>
									<th>Email</th>

									

								</tr>";

								while($row = mysql_fetch_array($result))
								{
									echo "<tr>";
									if($row['active']==1){
										
										echo "<td class=''>" . $row['emp_code'] . "</td>";
										echo "<td class=''>" . $row['name'] . "</td>";
										echo "<td class=''>" . $row['department'] . "</td>";
										echo "<td class=''>" . $row['email'] . "</td>";


										
									}else{
										echo "<td class='text-danger'>" . $row['emp_code'] . "</td>";
										echo "<td class='text-danger'>" . $row['name'] . "</td>";
										echo "<td class='text-danger'>" . $row['department'] . "</td>";
										echo "<td class='text-danger'>" . $row['email'] . "</td>";
									}
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




		<script type="text/javascript">

			function alertFunc(){
				alert("Logged out!");
			}

		</script>

		<script src="required/jquery.js">
		</script>

		<script src="bootstrap-3.2.0-dist/js/bootstrap.js">
		</script>


	</body>

	</html>