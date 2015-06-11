<html >
<head>
</head>

<body>
	<div id="sidebar-wrapper" class="col-xs-2">
	<div class="sidebar-offcanvas" id="sidebar" style="float:left; height:100%; background-color:#f5f5f5; padding-right:0px">
			<ul class="nav">
				<li><a href="#" data-toggle="offcanvas" class="visible-xs text-center"><i class="glyphicon glyphicon-chevron-right"></i></a></li>
			</ul>

			<?php
			$current_page = basename($_SERVER['PHP_SELF']);
			?>

			<ul class="nav nav-sidebar hidden-xs" id="lg-menu" style="background-color:#f5f5f5">
				<li <?php if ($current_page == "manager.php"){ echo ' class="active" '; }?> ><a href="manager.php" ><span  class="glyphicon glyphicon-home"></span> Overview</a></li>
				<br>

				<li <?php if ($current_page == "newRequests.php"){ echo ' class="active" '; }?> ><a href="newRequests.php"><span  class="glyphicon glyphicon-comment"></span> New Requests</a></li>

				<li <?php if ($current_page == "queuedRequests.php"){ echo ' class="active" '; }?> ><a href="queuedRequests.php"><span  class="glyphicon glyphicon-time"></span> Pending Requests</a></li>
				<li <?php if ($current_page == "completedRequests.php"){ echo ' class="active" '; }?> ><a href="completedRequests.php"><span  class="glyphicon glyphicon-ok-circle"></span> Completed Requests</a></li>
				<br>
				<li <?php if ($current_page == "riderStatus.php"){ echo ' class="active" '; }?> ><a href="riderStatus.php"><span  class="glyphicon glyphicon-eye-open"></span> Rider Status</a></li>
				<li <?php if ($current_page == "reportStats.php"){ echo ' class="active" '; }?> ><a href="reportStats.php"><span  class="glyphicon glyphicon-pencil"></span> Generate Reports</a></li>
				<br>
				<li <?php if ($current_page == "addCourier.php"){ echo ' class="active" '; }?> ><a href="addCourier.php"><span class="glyphicon glyphicon-plus"></span> Add Couriers</a></li>
				<li <?php if ($current_page == "viewCourier.php"){ echo ' class="active" '; }?> ><a href="viewCourier.php"><span class="glyphicon glyphicon-envelope"></span> View Couriers</a></li>
			</ul>

			<ul class="nav visible-xs" id="xs-menu" style="height:100%;">
				<li><a href="#" class="text-center"><span  class="glyphicon glyphicon-home"></span> </a></li>
				<li><a href="#" class="text-center"><span  class="glyphicon glyphicon-comment"></span> </a></li>
				<li><a href="#" class="text-center"><span  class="glyphicon glyphicon-time"></span> </a></li>
				<li><a href="#" class="text-center"><span  class="glyphicon glyphicon-ok-circle"></span></a></li>
				<li><a href="#" class="text-center"><span  class="glyphicon glyphicon-eye-open"></span></a></li>
				<li><a href="#" class="text-center"><span class="glyphicon glyphicon-header"></span></a></li>
			</ul>

		</div>
	</div>



</body>
</html>
