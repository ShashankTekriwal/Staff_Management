<html>
<head>
</head>

<body>
	<div id="top" align="center" style="background-color:#222222;" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="employee.php"> 
					<font color="#FFFFFF"><span class=" glyphicon glyphicon-send"></span> Riders & Couriers </font> 
				</a>
			</div>

			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">

					<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class=" glyphicon glyphicon-question-sign"></span>
						Help</a>
						<ul class="dropdown-menu">
							<li>
								<a href="../aboutus.php" target="_blank"><i class="fa fa-fw fa-edit"></i> About Us</a>
							</li>
							
						</ul>
					</li>
					<li><a href="../required/logout.php" ><span class="glyphicon glyphicon-off"></span> Sign out</a></li>

				</ul>

				<form class="navbar-form navbar-right" action='search.php' method='GET'>
					<input name='q' type="text" class="form-control" placeholder="Search..." required>
				</form>

			</div>
		</div>
	</div>





</body>
</html>
