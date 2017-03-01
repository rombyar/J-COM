<?php
	//memulai session
	session_start();
	require_once "../elemen/functions.php";
	$_SESSION=array();
	//cek adanya session, jika session ada maka akan di unset dan dilanjutkan dengan destroy session
	if(ISSET($_SESSION['username'])) 
	{
		UNSET($_SESSION['username']);
	}
	session_destroy();
	header("location: pegawai_login.php");
?>