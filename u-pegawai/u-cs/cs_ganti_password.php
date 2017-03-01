<?php
	include "../../koneksi/koneksi_db.php";

	function antiinjection($data){
	  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
	  return $filter_sql;
	}
	// membaca pass lama, dan baru dari form

	$username  = antiinjection($_POST['username']);
	$passwordlama1  = antiinjection($_POST['passwordLama']);
	$passwordbaru1 = antiinjection($_POST['passwordBaru']);
	$passwordbaru2 = antiinjection($_POST['KpasswordBaru']);

	// cek benar tidaknya password yang lama

	$query = "SELECT * FROM tb_pegawai WHERE username = '$username'";
	$hasil = mysql_query($query) or die(mysql_error());
	$data  = mysql_fetch_array($hasil);

	$pengacak = "NDJS3289JSKS190JISJI";

	if(md5($pengacak.md5($passwordlama1).$pengacak) == $data['password'])
	{
		// jika password lama benar, maka cek kesesuaian password baru 1 dan 2
		if ($passwordbaru1 == $passwordbaru2)
		{
			$passwordbaruenkrip = md5($pengacak.md5($passwordbaru1).$pengacak);

			$query = "UPDATE tb_pegawai SET password = '$passwordbaruenkrip' WHERE username = '$username' ";
			$hasil = mysql_query($query);
			if ($hasil)
			{
				echo"<script>window.alert('Ganti Password Sukses!');
						window.location=('cs_profil.php')</script>";
			}
			else
			{
				echo"<script>window.alert('Ganti Password Gagal!');
						window.location=('cs_profil.php')</script>";
			}
		}
		else echo"<script>window.alert('Password baru Anda tidak sama.');
						window.location=('cs_profil.php')</script>";
	}
	else 
	{
		echo "<script language=\"Javascript\">\n";
		echo "confirmed = window.confirm('Password lama Anda salah. Apakah Anda mau mengulangi?');";
		echo "if (confirmed)";
		echo "{";
		echo "window.location = 'admin_profil.php';";
		echo "}";
		echo "else ";
		echo "{";
		echo "window.location = 'admin_menu.php';";
		echo "}";
		echo "</script>";
	}
?>