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
	session_set_cookie_params(0);
	session_start();
	if(!isset($_SESSION['admin'])){
		redirect('login.php');
	}
	include 'header.html'; ?>    
	
	<div id='offcanvas' class="row row-offcanvas row-offcanvas-left">
		<div id="container" class="container-fluid">
			<div id='wrapper' class="row">
				<?php include 'asidebar.php'; ?>  
				<div id="main-wrapper" class="col-xs-10 pull-right">
					<div id="main" style="padding-top:5px; height:100%; z-index:100; margin-bottom:30px" >
						<h1> Add Users</h1>
						<hr>
						<form role="form" id="login_form" name="login_form" class="form-horizontal" onSubmit="return validate_form()" method="post" action="required/next.php">
							<div class="form-group">
								<label for="name" class="control-label col-lg-2"><font color="#FF0000">*</font>Employee Code :</label>
								<div class="col-lg-5">
									<input type="text" name="name" id="name" placeholder="Enter Employee code"  class="form-control" required> <span id = 'name_span'></span>
								</div>
							</div>

							<div class="form-group">
								<label for="usr_name" class="control-label col-lg-2"><font color="#FF0000">*</font>Name :</label>
								<div class="col-lg-5">
									<input type="text" id="usr_name" name="usr_name" placeholder="Enter Name here"  class="form-control" required><span id='usr_name_span'></span>
								</div>
							</div>

							<div class="form-group">
								<label for="email" class="control-label col-lg-2"><font color="#FF0000">*</font>Email address :</label>
								<div class="col-lg-5">
									<input id="email" type="email" name="email" placeholder=" Enter Email address here"  class="form-control" required><span id = 'email_span'></span>
								</div>
							</div>


							<div class="form-group">
								<label for="department" class="control-label col-lg-2"><font color="#FF0000">*</font>Department : </label>
								<div class="col-lg-5">
									<select name="department" id="department" class="form-control">
										<option value="Bills">Bills</option>
										<option value="Cheques">Cheques</option>
										<option value="Samples">Samples</option>
										<option value="Inputs">Inputs</option>
										<option value="Others">Others</option>
									</select>
								</div>
							</div>


							<div class="form-group">
								<label for="acctype" class="control-label col-lg-2"><font color="#FF0000">*</font>Type of Account : </label>
								<div class="col-lg-5">
									<select name="acc_type" id="acctype" class="form-control">
										<option value="0">Employee</option>
										<option value="1">Manager</option>
										<option value="2">Admin</option>
									</select>
								</div>
							</div>



							<div class="form-group">
								<label for="password" class="control-label col-lg-2"><font color="#FF0000">*</font>Password :</label>
								<div class="col-lg-5">
									<input id="password" type="password" name="password" placeholder=" Enter a password here"  class="form-control" required> <span id = 'password_span'></span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-5">
									<input type="submit" name="Submit" class="btn btn-primary" value="Sign Up">
									<input type="reset" class="btn btn-default" value="Clear" onclick="res()">
								</div>
							</div>



						</form>

						<div style="position:center" align="center" >
							<?php
							if(isset($_GET['err'])){
								if($_GET['err']==md5('403')){
									echo "<p class='text-danger'>Employee Code OR Email already in use!! Please try again!</p>";
								}elseif ($_GET['err']==md5('202')) {
									echo "<p class='text-success'>Account created successfully!</p>";

								}
							}
							?>
						</div>


					</div>
				</div>
			</div>
		</div>
	</div>

	    

	<script src="required/jquery.js"></script>

	<script type="text/javascript">
		function validate_email(){
			var x = document.forms["login_form"]["email"].value;
			var reg_email = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
			if(x==null || x==""){
				$('#email_span').text('Email is required.');
				return false;
			}else if(!reg_email.test(x)){
				$('#email_span').text('Email not valid');
				return false;
			}else{
				$('#email_span').text('');
				return true;
			}
		}

		function validate_name(){
			var x = document.forms["login_form"]["name"].value;
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
			var x = document.forms["login_form"]["usr_name"].value;
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

		function password_validate(){
			var x = document.forms["login_form"]["password"].value;
			var letter = /[a-zA-Z]/; 
			var number = /[0-9]/;
			if (x==''||x==null) {
				$('#password_span').text('Password is required.');
				return false;
			}else if(x.length<8){
				$('#password_span').text('Password should be atleast 8 characters long.');
				return false;
			}else if(!(letter.test(x)&&number.test(x))){
				$('#password_span').text('Password must contain atleast 1 letter and 1 number.');
				return false;
			}else {
				$('#password_span').text('');
				return true;
			};
		}

		function validate_form(){
			if(validate_email()&password_validate()&validate_name()&validate_usr_name()){
				return true;
			}else{
				return false;
			}
		}

		function res(){
			$('#password_span').text('');
			$('#name_span').text('');
			$('#email_span').text('');
			$('#usr_name_span').text('');

		}
	</script>  
	<script src="bootstrap-3.2.0-dist/js/bootstrap.js"></script>


</body>

</html>