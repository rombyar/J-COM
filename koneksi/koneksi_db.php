<?php
	
/*
    error_reporting(0);
    $koneksi = mysql_connect("localhost","Super_Admin","19941996") or die("Koneksi Gagal !" . mysql_error());
    if($koneksi) echo "Koneksi Berhasil<br>";
    $db = mysql_select_db("db_data_web_jcom") or die("Database tidak ada !<br>" . mysql_error());
    echo "<br />";
    if($db) echo "Database db_data_web_jcom berhasil dibuka !";
    mysql_close($koneksi);
	*/
	
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$my_db 	 = "db_j_com";
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con_db	 = mysql_connect($host_db, $user_db, $pass_db);
	$pilih_db= mysql_select_db($my_db, $con_db);
	/*
	if(!$pilih_db)
	{
		echo"<h3>Database tidak dapat diakses</h3>";
	}
	else
	{
		echo"<h3>Database dapat diakses</h3>";
	}
	
	
	
	$host = "localhost";
	$user = "super_admin";
	$pass = "13731019941996";
	$dbnm = "db_j_com";

	$conn = mysql_connect ($host, $user, $pass);
	if ($conn) {
		$buka = mysql_select_db ($dbnm);
		if (!$buka) {
			die ("Database tidak dapat dibuka");	
		}
	} else {
		die ("Server MySQL tidak terhubung");	
	}
	*/

?>
