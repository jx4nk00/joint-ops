<?php 
	session_start();

	if(!$_SESSION['login']){
		header('location:index.php');
	}else{
		session_destroy();
		header('location:index.php');
	}
?>