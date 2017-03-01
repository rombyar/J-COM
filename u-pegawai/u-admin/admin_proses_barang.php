<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	// code A
	include("fungsi_koneksi.php");
	#include "../../koneksi/koneksi_db.php";
	include("fungsi_validasi_tipe_image.php");
	// end of code A
	$username = $_POST['username'];
	$kode_kategori_barang  = $_POST['kategori'];
	$nama_barang  = $_POST['nama_barang'];
	$merek_barang = $_POST['merek'];
	$harga_barang = $_POST['harga_barang'];
	$deskripsi_barang = $_POST['deskripsi_barang'];
	$stok_barang = $_POST['stok_barang'];
	
	// code B
	$lokasi_file = $_FILES['gambar']['tmp_name'];
	$tipe_file   = $_FILES['gambar']['type'];
	$nama_file   = $_FILES['gambar']['name'];
	$direktori   = "../../images/foto/$nama_file";
	// end of code B
	
	$hasil = cekTypeImageUpload($tipe_file);
	
	$koneksi = koneksi_db();
	$cekdata="select foto_barang from tb_barang where foto_barang='$nama_file'"; 
	$ada=mysql_query($cekdata,$koneksi) or die(mysql_error()); 
	if(mysql_num_rows($ada)>0) 
	{ 
		echo "Foto telah Terdaftar!. ";
		echo "Silakan klik <a href='admin_menu.php'>Kembali</a>";
	} 
	else 
	{
	  if ($hasil == 1){
		echo "<script language='javascript'>alert('Maaf, hanya menerima file gambar yang bertipe jpg/png')</script>";
		echo "<script language='javascript'>window.location = 'admin_menu.php'</script>";
		exit();
	  }
	  
	  if (!empty($lokasi_file)) 
	  {
		  move_uploaded_file($lokasi_file,$direktori);
		 
			// code C
			$koneksi = koneksi_db();
			$sql = "insert into tb_barang values ('','$kode_kategori_barang','$username','$nama_barang','$merek_barang','$harga_barang','$deskripsi_barang','$stok_barang','$nama_file')";
			$aksi = mysql_query($sql,$koneksi);
			// end of code C
		 
		  // code D
		  if (!$aksi) 
		  {
		  echo "maaf gagal memasukan gambar";
		  }
		  else
		  {
			echo "<script language='javascript'>alert('Penambahan Barang Sukses.')</script>";
			echo "<script language='javascript'>window.location = 'admin_menu.php'</script>";
			exit();
		  }
		  // end of code D
		 
	  }else{echo "terjadi kesalahan";}
	}
?>