<html>
<head></head>
<body>
	<?php
	require 'connectivity.php';
	function count_req($query,$var){
		if($result=mysql_query($query)){
			return mysql_fetch_assoc($result)[$var];
		}else{
			return -1;
		}
	}
	$var = 'count';
	$arr = array();
	date_default_timezone_set('Asia/Kolkata');
	$date = "%".date('Y-m-d')."%";
	for ($i=0; $i <= 2 ; $i++) {
		if($i!=2){
			$query = "SELECT COUNT(*) AS '$var' FROM `job_form` WHERE `status` = '$i' ";
			$arr[$i] = count_req($query,$var);
		}else{
			$query = "SELECT COUNT(*) AS '$var' FROM `job_form` WHERE `status` = '$i' AND `submission_time` LIKE '$date' ";
			$arr[$i] = count_req($query,$var);
		}
	}
	?>
</body>
</html>