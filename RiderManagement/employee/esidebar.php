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
				<li <?php if ($current_page == "employee.php"){ echo ' class="active" '; }?> ><a href="employee.php" ><span  class="glyphicon glyphicon-home"></span> Home</a></li>
				<br>
				
				<li <?php if ($current_page == "form.php"){ echo ' class="active" '; }?> ><a href="form.php"><span  class="glyphicon glyphicon-plus"></span> New Request</a></li>
				
				<li <?php if ($current_page == "e_queuedRequests.php"){ echo ' class="active" '; }?> ><a href="e_queuedRequests.php"><span  class="glyphicon glyphicon glyphicon-paperclip"></span> Queued Request</a></li>
				
				<li <?php if ($current_page == "e_pendingRequests.php"){ echo ' class="active" '; }?> ><a href="e_pendingRequests.php"><span  class="glyphicon glyphicon-time"></span> Pending Request</a></li>
				
				<li <?php if ($current_page == "e_completedRequests.php"){ echo ' class="active" '; }?> ><a href="e_completedRequests.php"><span  class="glyphicon glyphicon-ok-circle"></span> Completed Request</a></li>
				
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
