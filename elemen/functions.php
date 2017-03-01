<?php
	session_start();
	//Fungsi ini berfungsi untuk pengguna J-com yang tidak beraktifitas selama 3600 detik atau setara dengan 1 jam maka akun yang ia gunakan akan logout sendiri.
	function login_validate() 
	{
		$timeout = 3600;
		$_SESSION["expires_by"] = time() + $timeout;
	}

	function login_check() 
	{
		$exp_time = $_SESSION["expires_by"];
		if (time() < $exp_time) 
		{
			login_validate();
			return true;
		} 
		else 
		{
			unset($_SESSION["expires_by"]);
			return false;
		}
	}
?> 