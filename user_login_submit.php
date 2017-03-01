<?php
	require_once "elemen/functions.php"; 

	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	// menjalankan session
	session_start();

	$username = $_POST['username'];
	$password1 = $_POST['password1'];
	
	include "koneksi/koneksi_db.php";

	// mencari password terenkripsi berdasarkan username
	$query = "SELECT * FROM tb_pelanggan WHERE username = '$username'";
	$hasil = mysql_query($query) or die(mysql_error());
	$data  = mysql_fetch_array($hasil);

	$pengacak  = "NDJS3289JSKS190JISJI";
	if(!empty($_POST['username']) &&!empty($_POST['password1']))
	{
		if(md5($pengacak.md5($password1).$pengacak) == $data['password'])
		{
			$_SESSION['username'] = $username;				
			$_SESSION['akses'] = $data['akses'];
			$_SESSION['id_pelanggan'] = $id_pelanggan;
			
			if (isset($_SESSION['akses']) == "User") 
			{
				login_validate();
				header("location: user_menu.php");
			}
			else {header("location: user_login.php");}
		}
		else 
		{
			echo "<script language=\"Javascript\">\n";
			echo "confirmed = window.confirm('Login Gagal!. Apakah Anda mau mengulangi?');";
			echo "if (confirmed)";
			echo "{";
			echo "window.location = 'user_login.php';";
			echo "}";
			echo "else ";
			echo "{";
			echo "window.location = 'index.php';";
			echo "}";
			echo "</script>";
		}
	}
	else
	{
		echo "<script language=\"Javascript\">\n";
		echo "confirmed = window.confirm('Form login masih kosong!. Apakah Anda mau mengulangi?');";
		echo "if (confirmed)";
		echo "{";
		echo "window.location = 'user_login.php';";
		echo "}";
		echo "else ";
		echo "{";
		echo "window.location = 'index.php';";
		echo "}";
		echo "</script>";
	}
?> 