<?php
	ob_start();
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/util/DBConnectionUtil.php';
	
	if(isset($_SESSION['userInfo2'])) {
		unset($_SESSION['userInfo2']);
		header('location:/index.php');
		die();
	}
	header('location:/');
	ob_end_flush(); 
?>