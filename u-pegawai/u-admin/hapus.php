<?php
include "../../koneksi/koneksi_db.php";

if($_GET['id_berita'] != ''){  // Jika Request ID tidak = kosong maka lakukan proses
   
    $hpus_sql = 'delete from tb_berita where id_berita='.$_GET['id_berita']; // SQL untuk hapus data berdasarkan ID
    $hpus_berita = mysql_query($hpus_sql);
    if($hpus_berita)
	{
		echo"<script>window.alert('Data berhasil dihapus!.');
			window.location=('javascript:history.go(-1)')</script>";
    }
}