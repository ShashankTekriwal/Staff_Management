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
			$date = date('Y-m-d');
			$date1 = date('Y-m-d',strtotime($date."-1 days"));
			$date2 = date('Y-m-d',strtotime($date."-2 days"));
			$date="%".$date."%";
			$date1="%".$date1."%";
			$date2="%".$date2."%";
			for ($i=0; $i <= 2 ; $i++) {
				if($i!=2){
					$query = "SELECT COUNT(*) AS '$var' FROM `job_form` WHERE `emp_code`='$emp_code' AND `status` = '$i' ";
					$arr[$i] = count_req($query,$var);
				}else{
					$query = "SELECT COUNT(*) AS '$var' FROM `job_form` WHERE `status` = '$i' AND `emp_code` = '$emp_code' AND (`submission_time` LIKE '$date' OR `submission_time` LIKE '$date1' OR `submission_time` LIKE '$date2') ";
					$arr[$i] = count_req($query,$var);
				}
			}
		?>
	</body>
</html>