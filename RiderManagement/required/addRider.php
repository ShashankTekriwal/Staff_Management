<?php
	require 'fn.php';
	require 'connectivity.php';
	if(isset($_POST['code'])&&isset($_POST['name'])){
		$code = $_POST['code'];
		$name = $_POST['name'];
		$query = "SELECT * FROM `riders` WHERE `Rider_Code`='$code' ";
		$result = mysql_query($query);
		if(mysql_num_rows($result)==0){
			$query = "INSERT INTO riders (Rider_name,Rider_code) VALUES ('$name','$code') ";
			if(mysql_query($query)){
				redirect('../manageRider.php?err=202');
			}else{
				redirect('../manageRider.php?err=303');
			}
		}else{
			redirect('../manageRider.php?err=101');
		}
	}
?>