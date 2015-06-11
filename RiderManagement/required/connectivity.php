<?php
	//change the following data accordingly!
	
	$username = 'root';
	$password = 'root';
	////do not modify anything else
	$db = 'infinity';
	//$local = 'localhost:'.$port;
	if (mysql_connect('localhost',$username,$password)) {
		if (mysql_select_db($db)) {
			//alert('database found.');
		}
		else{
			//alert('db nt fnd');
		}
	}
	else{
		//alert('cannit connect');
	}
?>