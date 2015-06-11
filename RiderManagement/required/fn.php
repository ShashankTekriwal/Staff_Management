<?php
	function redirect($url,$permanent=false){
		if (headers_sent()===false) {
			header('Location:'.$url , true , ($permanent === true) ? 301 : 302);
		}
		exit();
	}

	function get_status($val){
		if($val==0)
			return "Queued";
		elseif ($val==1)
			return "Rider Sent";
		else
			return "Job Completed";
	}

	function mysql_fetch_all($val){
		require 'connectivity.php';
		$arr = array();
		$count=0;
		if($result=mysql_query($val)){
			if(mysql_num_rows($result)!=0){
				while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
					$arr[$count] = $row;
					$count++;
				}
				return $arr;
			} else {
				return 0;
			}
		}
	}

	function generate_excel($exportData , $file_name ){
		$fields = mysql_num_fields ( $exportData );
		$header = '';
		$result ='';
 
		for ( $i = 0; $i < $fields; $i++ )
		{
		    $header .= mysql_field_name( $exportData , $i ) . "\t";
		}
		 
		while( $row = mysql_fetch_row( $exportData ) )
		{
			$temp = $row[6];
		    $row[6] = date('d-M-Y',strtotime($temp));
		    $line='';
		    foreach( $row as $value )
		    {                                            
		        if ( ( !isset( $value ) ) || ( $value == "" ) )
		        {
		            $value = "\t";
		        }
		        else
		        {
		            $value = str_replace( '"' , '""' , $value );
		            $value = '"' . $value . '"' . "\t";
		        }
		        $line .= $value;
		    }
		    $result .= trim( $line ) . "\n";
		}
		$result = str_replace( "\r" , "" , $result );
		 
		if ( $result == "" )
		{
		    $result = "\nNo Record(s) Found!\n";                        
		}
		 
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$result";
	}

	function generate_excel2($exportData , $file_name , $from , $to,$r){
		$fields = mysql_num_fields ( $exportData );
		$header = '';
		$result ='';
		$t1 = strtotime($from);
		$t2 = strtotime($to);
 
		for ( $i = 0; $i < $fields; $i++ )
		{
		    $header .= mysql_field_name( $exportData , $i ) . "\t";
		}
		 
		while( $row = mysql_fetch_row( $exportData ) )
		{
			$t = strtotime($row[$r]);
			if($t>=$t1&&$t<$t2){
		    	$row[$r] = date('d-M-Y',$t);
			    $line = '';
			    foreach( $row as $value )
			    {                                            
			        if ( ( !isset( $value ) ) || ( $value == "" ) )
			        {
			            $value = "\t";
			        }
			        else
			        {
			            $value = str_replace( '"' , '""' , $value );
			            $value = '"' . $value . '"' . "\t";
			        }
			        $line .= $value;
			    }
			    $result .= trim( $line ) . "\n";
			}
		}
		$result = str_replace( "\r" , "" , $result );
		 
		if ( $result == "" )
		{
		    $result = "\nNo Record(s) Found!\n";                        
		}
		 
		header("Content-type: application/octet-stream");
		header("Content-Disposition: attachment; filename=$file_name");
		header("Pragma: no-cache");
		header("Expires: 0");
		print "$header\n$result";
	}

	function check_in_range($start_date, $end_date, $date_from_user)
    {
      // Convert to timestamp
      $start_ts = strtotime($start_date);
      $end_ts = strtotime($end_date);
      $user_ts = strtotime($date_from_user);

      // Check that user date is between start & end
      return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
    }

    function donut_data($startDate,$endDate)
    {
        $counter=array();
        $query = "SELECT `emp_code`,`submission_time` FROM `job_form`";
        if($result=mysql_query($query)){
        //echo mysql_num_rows($result).'<br>';
            while ($row=mysql_fetch_assoc($result)) {
                $emp_code = $row['emp_code'];
                $time = $row['submission_time'];
                if(check_in_range($startDate,$endDate,$time)){
                    $query = "SELECT `department` FROM `login` WHERE `emp_code` = $emp_code";
                    $dept = mysql_fetch_assoc(mysql_query($query))['department'];
                    //echo $dept."<br>";
                    if(!isset($counter[$dept])){
                        $counter[$dept]=1;
                    }else{
                        $counter[$dept]++;
                    }
                }
            }
        }else{
            //echo mysql_error();
        }
        //print_r($counter);
        $data = "[";
        foreach ($counter as $key => $value) {
            $data.="{label:'$key',value:'$value'},";
        }
        $data = rtrim($data,',');
        $data.="]";
        return $data;
    }

    function show_year_options()
    {
    	date_default_timezone_set('Asia/Kolkata');
      	$default_year = 2014;
      	$current_year = date('Y');
      	while($default_year<=$current_year){
        	echo "<option value = $default_year >$default_year</option>";
        	$default_year++;
    	}
    }
?>