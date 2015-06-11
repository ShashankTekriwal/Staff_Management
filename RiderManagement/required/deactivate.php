

<?php
require 'connectivity.php';
require 'fn.php';
function change_status($value,$employee,$type){
	if($type==1){
		$query = "UPDATE  `infinity`.`login` SET  `active` =  '$value' WHERE  `login`.`emp_code` = '$employee'";
	}else{
		$query = "UPDATE `infinity`.`riders` SET `Rider_active`='$value' WHERE `riders`.`Rider_code`='$employee' ";
	}
	if(mysql_query($query)){
		if($value==0){
						//echo "Account $employee has been deactivated successfully!";
			redirect('../deactivateAcc.php?err=101&emp='.$employee);
		}else{
						//echo "Account $employee Activated Successfully!";
			redirect('../deactivateAcc.php?err=202&emp='.$employee);
		}
	}else{
					//echo "Operation failed! Please try again!.".mysql_error();
		redirect('../deactivateAcc.php?err=909&emp='.$employee);
	}
}
session_start();
if(isset($_SESSION['admin'])){
	if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['code']) && !empty($_POST['code']) ){
		$emp_code = $_POST['code'];
		$type = $_POST['type'];
		if($type==1){
			$query = "SELECT `active` from `login` WHERE `emp_code`='$emp_code'";
		}else{
			$query = "SELECT `Rider_active` from `riders` WHERE `Rider_code`='$emp_code'";
		}
		if($result = mysql_query($query)){
			if(mysql_num_rows($result)==1){
				$row = mysql_fetch_row($result);
				if($row[0]==1){
					if(isset($_POST['deactivate'])){
						change_status(0,$emp_code,$type);
					}else if(isset($_POST['activate'])){
									//echo "Account $emp_code is already active!";
						redirect('../deactivateAcc.php?err=303&emp='.$emp_code);
					}
				}else{
					if(isset($_POST['deactivate'])){
									//echo "Account $emp_code is already deactivated!";
						redirect('../deactivateAcc.php?err=404&emp='.$emp_code);
					}else if(isset($_POST['activate'])){
						change_status(1,$emp_code,$type);
					}
				}
			} else {
							//echo "No account with Employee Code as $emp_code ";
				redirect('../deactivateAcc.php?err=505&emp='.$emp_code);
			}
		}else{
						//echo "Operation failed! ".mysql_error();
			redirect('../deactivateAcc.php?err=909&emp='.$emp_code);
		}
	}
} else {
	redirect('../login.php',false);
}
?>


