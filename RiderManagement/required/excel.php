<?php
session_start();
require 'fn.php';
require 'connectivity.php';
date_default_timezone_set("Asia/Kolkata");
if(!(isset($_SESSION['manager'])||isset($_SESSION['admin']))) {
	redirect('../login.php');
}
if(isset($_POST['emp_code'])&&isset($_POST['submit'])){
	$emp_code = $_POST['emp_code'];	
	$query="SELECT emp_code,job_title,job_type,address,deadline,details,submission_time FROM job_form WHERE emp_code='$emp_code' ORDER BY submission_time ASC";
	if($emp_code==-1){
		$query="SELECT emp_code,job_title,job_type,address,deadline,details,submission_time FROM job_form ORDER BY submission_time ASC";
		$emp_code="ALL";
	}
	$exportData = mysql_query ($query ) or die ( "Sql error : " . mysql_error( ) );
	if(isset($_POST['choose'])&&isset($_POST['to'])&&!empty($_POST['to'])&&isset($_POST['from'])&&!empty($_POST['from'])){
		$to = $_POST['to'];
		$from = $_POST['from'];
		$file = $emp_code."_".date("d:m:Y_H:i:s").".xls";
		generate_excel2($exportData,"$file",$from,$to,6);
	}else if(isset($_POST['all'])){
		$file = $emp_code."_".date("d:m:Y_H:i:s").".xls";
		generate_excel($exportData,"$file");
	}else{
		redirect('../genExcel.php?err=101');
	}
}else{
	redirect('../genExcel.php?err=202');
}
?>