<?php
	require_once "../elemen/functions.php"; 
	
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	// menjalankan session
	session_start();

	$username = $_POST['username'];
	$password1 = $_POST['password1'];

	include "../koneksi/koneksi_db.php";

	// mencari password terenkripsi berdasarkan username
	$query = "SELECT * FROM tb_pegawai WHERE username = '$username'";
	$hasil = mysql_query($query) or die("Error");
	$data  = mysql_fetch_array($hasil);

	$pengacak  = "NDJS3289JSKS190JISJI";

	// cek kesesuaian password terenkripsi dari form login
	// dengan password terenkripsi dari database
	#md5($pengacak.md5($password1))
	#if ($username=="" || $password1=="")
	#{
	if(!empty($username) && !empty($password1))
	{
		if(md5($pengacak.md5($password1).$pengacak) == $data['password'])
		{
			
			// jika sesuai, maka jalankan session untuk username
			$_SESSION['username'] = $username;
			$_SESSION['jabatan'] = $data['jabatan'];
			
			$jam = gmdate("h:i:s a",time()+7*3600);
			$tgl = date("Y-m-d");
			#include "connect.php";
			
			if ($_SESSION['jabatan'] == "Super Admin") {
				login_validate();
				header("location: u-super-admin/sa_menu.php");
			}
			else if ($_SESSION['jabatan'] == "Admin") {
				login_validate();
				header("location: u-admin/admin_menu.php");
			}
			else if ($_SESSION['jabatan'] == "CS") {
				login_validate();
				header("location: u-cs/cs_menu.php");}
			
			// menampilkan menu ke halaman akses
			#echo header("location: pegawai_menu.php");
		}
		else
		{
			echo "<script language=\"Javascript\">\n";
			echo "confirmed = window.confirm('Login Gagal!. Apakah Anda mau mengulangi?');";
			echo "if (confirmed)";
			echo "{";
			echo "window.location = 'pegawai_login.php';";
			echo "}";
			echo "else ";
			echo "{";
			echo "window.location = '../index.php';";
			echo "}";
			echo "</script>";
		}
	}
	else 
	{
		echo "<script language=\"Javascript\">\n";
		echo "confirmed = window.confirm('Formulir masih ada yang kosong!. Apakah Anda ingin mengulanginya?');";
		echo "if (confirmed)";
		echo "{";
		echo "window.location = 'pegawai_login.php';";
		echo "}";
		echo "else ";
		echo "{";
		echo "window.location = '../index.php';";
		echo "}";
		echo "</script>";
	}
?>