<?php
	require 'fn.php';
	if(isset($_POST)){
		$cdate=$_POST['date'];
		$cp=$_POST['cp'];
		$company=$_POST['company'];
		$add=$_POST['add'];
		$location=$_POST['location'];
		$mobile=$_POST['mobile'];
		$wt=$_POST['wt'];
		$sender=$_POST['sender'];
		$pod=$_POST['pod'];
		$behalf=$_POST['behalf'];
		$details=$_POST['details'];
		try{
		
			$handler = new PDO("mysql:host = localhost:82;dbname=infinity;charset=utf8","root",'');
			$stmt = $handler->prepare("INSERT INTO couriers ( cdate ,cp,company,address,location,mobile,weight,sender,behalf,pod,details)
			 VALUES (:cdate,:cp,:company,:address,:location,:mobile,:weight,:sender,:behalf,:pod,:details) ");
			$query  = $stmt->execute(array(':cdate'=>$cdate,
				':cp'=>$cp,
				':company'=>$company,
				':address'=>$add,
				':location'=>$location,
				':mobile'=>$mobile,
				':weight'=>$wt,
				':sender'=>$sender,
				':behalf'=>$behalf,
				':pod'=>$pod,
				':details'=>$details));
			$err=101;
		}catch(PDOException $e){
			//echo $e->getMessage();
			$err = 202;
		}
		redirect('../addCourier.php?err='.$err);

	}else{
		echo "Page Not Found!";
	}
?>