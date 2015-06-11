<html >
<head>
</head>

<body>
	<div id="sidebar-wrapper" class="col-xs-2">
	<div class=" sidebar-offcanvas" id="sidebar" style="float:left; height:100%; background-color:#f5f5f5; padding-right:0px">
			<ul class="nav">
				<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
			</ul>

			<?php
			$current_page = basename($_SERVER['PHP_SELF']);
			?>

			<ul class="nav nav-sidebar hidden-xs" id="lg-menu" style="background-color:#f5f5f5">
				<li <?php if ($current_page == "admin.php"){ echo ' class="active" '; }?> ><a href="admin.php" ><span  class="glyphicon glyphicon-home"></span> Overview</a></li>

				<li <?php if ($current_page == "completedRequests.php"){ echo ' class="active" '; }?> ><a href="completedRequests.php"><span  class="glyphicon glyphicon-ok-circle"></span> Rider Requests</a></li>
				<br>
				<li <?php if ($current_page == "reportStats.php"){ echo ' class="active" '; }?> ><a href="reportStats.php"><span  class="glyphicon glyphicon-pencil"></span> Generate Reports</a></li>
				<br>
				<li <?php if ($current_page == "addCourier.php"){ echo ' class="active" '; }?> ><a href="addCourier.php"><span class="glyphicon glyphicon-plus"></span> Add Couriers</a></li>
				<li <?php if ($current_page == "viewCourier.php"){ echo ' class="active" '; }?> ><a href="viewCourier.php"><span class="glyphicon glyphicon-envelope"></span> View Couriers</a></li>
				<br>
				<li <?php if ($current_page == "addAcc.php"){ echo ' class="active" '; }?> ><a href="addAcc.php"><span class="glyphicon glyphicon-user"></span> Add Users</a></li>
				<li <?php if ($current_page == "viewUsers.php"){ echo ' class="active" '; }?> ><a href="viewUsers.php"><span class="glyphicon glyphicon-eye-open"></span> View Users</a></li>
				<li <?php if ($current_page == "manageRider.php"){ echo ' class="active" '; }?> ><a href="manageRider.php"><span class="glyphicon glyphicon-road"></span> Add/View Riders</a></li>


				<br>                       

				<li <?php if ($current_page == "deactivateAcc.php"){ echo ' class="active" '; }?> ><a href="deactivateAcc.php"><span class="glyphicon glyphicon-minus-sign"></span> Manage Accounts</a></li>


			</ul>

			<ul class="nav visible-xs" id="xs-menu" style="height:100%;">
				<li><a href="admin.php" class="text-center"><span  class="glyphicon glyphicon-home"></span> </a></li>
				<li><a href="allRequests.php" class="text-center"><span  class="glyphicon glyphicon-ok-circle"></span> </a></li>
				<li><a href="reportStats2.php" class="text-center"><span  class="glyphicon glyphicon-pencil"></span> </a></li>
				<li><a href="newCourier.php" class="text-center"><span  class="glyphicon glyphicon-plus"></span></a></li>
				<li><a href="allCourier.php" class="text-center"><span  class="glyphicon glyphicon-envelope"></span></a></li>
				<li><a href="addAcc.php" class="text-center"><span class="glyphicon glyphicon-user"></span></a></li>
				<li><a href="viewUsers.php" class="text-center"><span class="glyphicon glyphicon-eye-open"></span></a></li>
				<li><a href="manageRider.php" class="text-center"><span class="glyphicon glyphicon-road"></span></a></li>
			</ul>

		</div>
	</div>
	


</body>
</html>
