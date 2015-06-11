<?php
	require 'fn.php';
	session_start();
	//session_regenerate_id();
	if(isset($_SESSION['employee']) || isset($_SESSION['manager']) || isset($_SESSION['admin'])){
		if (session_destroy()) {
			unset($_SESSION['employee']);
			unset($_SESSION['manager']);
			unset($_SESSION['admin']);
		}
	}
	redirect('../login.php');

?>