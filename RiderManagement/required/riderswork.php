<html>
	<head></head>
	<body>
		<?php
			
			
			$num = 0;
			$query = "SELECT COUNT(*) AS 'total' FROM `riders` WHERE `Rider_active` = '1' ";
			if($result=mysql_query($query)){
				$num = mysql_fetch_assoc($result)['total'];
				//echo $num;
			}else{
				echo mysql_error();
			}
			$count = array();
			$ykeys = "[";
			for ($i=0; $i <= $num-1 ; $i++) { 
				$count[$i] = $i;
				$ykeys.="'$i'";
				if($i!= $num-1){
					$ykeys.=",";
				}
			}
			$ykeys.="]";
			//$year = 2014; // set dynamic!
			$text = "data: [";
			$bool = true;
			$labels = "[";
			for($i=1;$i<=12;$i++){
				$query = "SELECT * FROM `riders` WHERE `Rider_active` = '1'";
				$date=date_create_from_format('n',"$i");
				$month = date_format($date,'M');
				$text.="{ y : '$month' , ";
				$r=0;
				if($result=mysql_query($query)){
					while($row = mysql_fetch_assoc($result)){
						$rider_code = $row['Rider_code'];
						$rider_name = $row['Rider_name'];
						$time = $year."%".$i."-%";
						$query2 = "SELECT COUNT(*) AS 'value' FROM `job_form` WHERE `rider`='$rider_code' AND `submission_time` LIKE '$time'";
						if($result2 = mysql_query($query2)){
							$jobs = mysql_fetch_assoc($result2)['value'];
							$text.= "'$count[$r]' : ".$jobs ;
							if ($bool) {
								$labels.="'$rider_name'";
							}
							if($r!= $num-1){
								$text.=",";
								if($bool){
									$labels.=",";
								}
							}
							$r++;
						} else {
							echo "ERROR ".mysql_error();
						}
					}
					$bool = false;
					$text.="}";
					if($i!=12){
						$text.=",";
					}
				} else {
					echo "ERROR ".mysql_error();
				}
			}
			$text.="]";
			$labels.="]";
		?>
		
	</body>
</html>