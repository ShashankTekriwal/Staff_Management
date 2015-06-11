<?php
require 'fn.php';
require 'connectivity.php';
error_reporting(0);
session_set_cookie_params(0);
session_start();
if(isset($_SESSION['employee'])){
			//echo "u r already logd in";
	redirect('../employee/employee.php',false);
} else if(isset($_SESSION['manager'])) {
	redirect('../manager.php',false);
} else if(isset($_SESSION['admin'])) {
	redirect('../admin.php',false);
}
if($_SERVER["REQUEST_METHOD"]=="POST" &&isset($_POST['emp_code']) && isset($_POST['password'])){
	
	$emp_code=$_POST['emp_code'];
	$pw=$_POST['password'];
	$query = "SELECT `emp_code`,`Designation`,`active` FROM `login` WHERE `emp_code`='$emp_code'  AND `password`='$pw'";
	if($query_run=mysql_query($query)){
		$rows = mysql_num_rows($query_run);
		if($rows==1){
			$query_row=mysql_fetch_assoc($query_run);
			$employee=$query_row['emp_code'];
			$desig = $query_row['Designation'];
			if($query_row['active']==1){
				session_set_cookie_params(0);
				session_start();
				session_regenerate_id();
				if($desig==0){
					$_SESSION['employee']=$employee;
					redirect('../employee/employee.php',false);
				} else if($desig==1) {
					$_SESSION['manager']=$employee;
					redirect('../manager.php',false);
				} else {
					$_SESSION['admin']=$employee;
					redirect('../admin.php',false);
				}
			}else{
				redirect('../login.php?err=deac');
			}
					// include file.
		} else {
			redirect('../login.php?err=wrong');
					//redirect.
		}
	} else{
				//echo mysql_error();
	}
	
} else {
	redirect('login.php',false);
}
?>