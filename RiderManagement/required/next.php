<?php
	require "connectivity.php";
	require 'fn.php';
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if(isset($_POST["email"])&&isset($_POST["password"])){
			$emp_code = mysql_real_escape_string($_POST["name"]);
			$name = mysql_real_escape_string($_POST["usr_name"]);
			$email = mysql_real_escape_string($_POST["email"]);
			$dept = mysql_real_escape_string($_POST["department"]);
			$passwd =mysql_real_escape_string($_POST["password"]);
			$acc_type=mysql_real_escape_string($_POST['acc_type']);
			$query = "SELECT `emp_code` FROM `login` WHERE `emp_code`= '$emp_code' OR `email`='$email'";
			if($query_run = mysql_query($query)){
				$rows = mysql_num_rows($query_run);
				if ($rows==0) {
					try{
						$handler = new PDO("mysql:host = localhost:82;dbname=infinity;charset=utf8","root",'');
						$stmt = $handler->prepare(" INSERT INTO login (emp_code,name,password,department,email,Designation)
						VALUES (:emp_code,:name,:password,:department,:email,:designation) ");
						$query = $stmt->execute(array(':emp_code'=>$emp_code,
							':name'=>$name,
							':password'=>$passwd,
							':department'=>$dept,
							':email'=>$email,
							':designation'=>$acc_type));
						//echo "Signup successful!";
						$err = md5('202');
						redirect('../addAcc.php?err='.$err,false);
					} catch (PDOException $e) {
						//echo $e->getMessage()."<br>Accout Not Created!";
						$err=md5('403');
						redirect('../addAcc.php?err='.$err,false);
					}
				} else {
					//Employee code already in use.
					//echo "<b>Employee Code OR Email already in use!! Please try again!</b>";
					$err=md5('403');
					redirect('../addAcc.php?err='.$err,false);
				}
			}else{
				//echo "cannot run query!!";
			}
		}else{
			//echo "check your javascript you dumbass!!";
		}
	}else{
		//echo "Were you trying to act smart chimp!! Fly back to the login panel..";
	}	
?>