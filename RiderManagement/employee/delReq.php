<?php
	require '../required/fn.php';
	require '../required/connectivity.php';
	session_start();
	if (isset($_SESSION['employee'])&&isset($_GET['subtim'])) {
		$emp_code = $_SESSION['employee'];
		$sub_time = urldecode($_GET['subtim']);
		$query="DELETE FROM `job_form` WHERE `emp_code` = '$emp_code' AND `submission_time` = '$sub_time' AND `status`='0'";
		if(mysql_query($query)){
			redirect('e_queuedRequests.php?del=success',false);
		}else{
			echo "Page not found!";
		}
	}else{
		redirect('../login.php');
	}
?>