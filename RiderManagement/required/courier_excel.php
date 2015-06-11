<?php
session_start();
require 'fn.php';
require 'connectivity.php';
if(!isset($_SESSION['admin'])&&!isset($_SESSION['manager'])){
	redirect('../login.php');
}
if(isset($_POST['to'])&&isset($_POST['from'])){
	$to = $_POST['to'];
	$from = $_POST['from'];
	$query = "SELECT * from couriers ORDER BY `serial` ASC ";
	$exportData = mysql_query($query);
	date_default_timezone_set('Asia/Kolkata');
	$file = 'Couriers_'.date('Y-m-d_H:i:s').'.xls';
	generate_excel2($exportData,"$file",$from,$to,1);
}
?>