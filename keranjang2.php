<?php
	session_start();
	include "koneksi/koneksi_db.php";
	$sid = session_id();
	$sql = mysql_query("SELECT * FROM tb_keranjang where id_session='$sid'");
	$row = mysql_num_rows($sql);
	#$jml = mysql_fetch_array($sql);
	
	echo "<span>Keranjang ($row)</span>";
	//echo "<span>Keranjang </span>";
?>