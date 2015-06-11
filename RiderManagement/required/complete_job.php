<?php
	require 'fn.php';
	require 'connectivity.php';
	session_start();
	if(!isset($_SESSION['manager'])){
		redirect('../login.php');
	}
	if(isset($_GET['subtim'])&&isset($_GET['emp'])){
		//echo "<script>alert('hihi');</script>";
		$emp_mngr = urldecode($_GET['emp']);
		$key = urldecode($_GET['subtim']);
		$query = "UPDATE `infinity`.`job_form` SET `status` = '2' WHERE `job_form`.`emp_code` = '$emp_mngr' AND `job_form`.`submission_time` = '$key'";
		if(mysql_query($query)){
			unset($_GET['subtim']);
			unset($_GET['emp']);
			redirect('../queuedRequests.php',false);
		} else {
			echo "<script>alert('hi');</script>";
		}
	}
?>