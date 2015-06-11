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
	require 'required/fn.php';
	require 'required/connectivity.php';
	include 'header.html'; ?>    

	<div id="offcanvas" class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id="wrapper" class="row">
				<?php include 'asidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px">
						<h1> Deactivate/Activate Accounts</h1>
						<hr>
						<form id="deac" name="deac" role="form" class="form-horizontal" method="post" action="required/deactivate.php">

							<div class="form-group">
								<label for="acctype" class="control-label col-lg-3"><font color="#FF0000">*</font>Type of Account : </label>
								<div class="col-lg-5">
									<select onclick="display()" name='type' id="acctype" class="form-control">
										<option value="0">Select...</option>
										<option  value="1">Employee/Manager/Admin</option>
										<option  value="2">Rider</option>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label for="code" class="control-label col-lg-3"><font color="#FF0000">*</font>Employee/Rider Code :</label>
								<div class="col-lg-5">
									<select  id="code" name="code"  class="form-control">
										<?php
										$query = "SELECT emp_code , name FROM login";
										$query2 = "SELECT `Rider_code`,`Rider_name` FROM `riders`";
										$json_emp = json_encode(mysql_fetch_all($query));
										$json_rid = json_encode(mysql_fetch_all($query2));
										?>
									</select><span id='name_span'></span>
								</div>
							</div>


							<div class="form-group">
								<div class="col-lg-offset-3 col-lg-5">
									<input type="submit" name='deactivate' class="btn btn-default" value="Deactivate">
									<input type="submit" name="activate" class="btn btn-default" value="Activate">

								</div>
							</div>



						</form>

						<div style="position:center" align="center" >
							<?php
							if(isset($_GET['err'])&&isset($_GET['emp'])){
								$err=$_GET['err'];
								$emp=$_GET['emp'];
								if($_GET['err']==101){
									echo "<p class='text-success'>Employee Code $emp has been deactivated successfully!</p>";
								}else if ($_GET['err']==202) {
									echo "<p class='text-success'>Employee code $emp acctivated successfully!</p>";
								}else if($err==303){
									echo "<p class='text-warning'>Employee $emp is already active!</p>";
								}else if($err==404){
									echo "<p class='text-warning'>Employee $emp is already deactivated!</p>";
								}else if($err==505){
									echo "<p class='text-danger'>Employee $emp does not exist!</p>";
								}else if($err==909){
									echo "<p class='text-danger'>Operation failed!</p>";
								}
							}
							?>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include 'footer.html'; ?>     


	<script src="required/jquery.js"></script>  
	<script type="text/javascript">


		var json_emp = <?php echo $json_emp ; ?>;
		var json_rid = <?php echo $json_rid ; ?>;
		var text = "";var json;
		var fields;
		display();
		function display () {
			text="";
			if($('#acctype').val()==1){
				json=<?php echo $json_emp ; ?>;
				fields = ['emp_code','name'];
			}else if($('#acctype').val()==2){
				json = <?php echo $json_rid ; ?>;
				fields = ['Rider_code','Rider_name'];
			}else{
				$('.btn').prop('disabled',true);
				$('#code').html('');
				return;
			}
			$('.btn').prop('disabled',false);
			for (var i = 0; i < json.length; i++) {
				text+="<option value="+json[i][fields[0]]+">"+json[i][fields[1]]+"("+json[i][fields[0]]+")</option>";
			};
			$('#code').html(text);
		}

	</script>  
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>



</body>

</html>