<?php
	try{
		session_start();
		require 'fn.php';
		if(!isset($_SESSION['employee'])){
			redirect('../login.php');
		}
		$emp_code = $_SESSION['employee'];
		$handler = new PDO("mysql:host = localhost:82;dbname=infinity;charset=utf8","root",'');
		date_default_timezone_set("Asia/Kolkata");
		if($_SERVER['REQUEST_METHOD']=='POST'){
			//session_start();
			//$emp_code = $_SESSION['employee'];
			$title = $_POST['title'];
			$job_type = $_POST['type_job'];
			$deadline = $_POST['deadline'];
			$address = $_POST['address'];
			$details = $_POST['details'];

			$stmt = $handler->prepare("INSERT INTO job_form (emp_code,job_title,address,job_type,deadline,details) VALUES 
				(:emp_code,:title,:address,:job_type,:deadline,:details)");
			$query = $stmt->execute(array(':emp_code'=>$emp_code,
				':title'=>$title,
				':address'=>$address,
				':job_type'=>$job_type,
				':deadline'=>$deadline,
				':details'=>$details));
			redirect('../employee/form.php?fstatus=success');
		} else {
			redirect('../employee/form.php',false); 
		}
	} catch(PDOException $e) {
		redirect('../employee/form.php?fstatus=failure',false);
	}
?>