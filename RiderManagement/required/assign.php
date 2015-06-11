<?php
	require 'fn.php';
	require 'connectivity.php';
	if(isset($_POST['submit']) && isset($_GET['emp']) && isset($_GET['subtim']) ){
		$emp_mngr = urldecode($_GET['emp']);
		$key = urldecode($_GET['subtim']);
		$rider = $_POST['set_rider'];
		$query = "UPDATE `infinity`.`job_form` SET `status` = '1',`rider`='$rider' WHERE `job_form`.`emp_code` = '$emp_mngr' AND `job_form`.`submission_time` = '$key'";
		if(mysql_query($query)){
			redirect('../queuedRequests.php',false);
		} else {
			echo mysql_error();
		}
	}else{
		echo "<h2>Page Not Found!</h2>";
	}

?>