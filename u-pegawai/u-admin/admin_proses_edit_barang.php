<?php 
	include '../../koneksi/koneksi_db.php'; 
	if (isset($_POST['simpan'])) 
	{ 
		$id = $_POST['id_barang'];
		$nama_barang  = $_POST['nama_barang'];
		$harga_barang = $_POST['harga_barang'];
		$deskripsi_barang = $_POST['deskripsi_barang'];
		$stok_barang = $_POST['stok_barang'];
		 
		//query untuk update data di database 
		 $query = "UPDATE tb_barang SET nama_barang = '$nama_barang', harga_barang = '$harga_barang', deskripsi_barang = '$deskripsi_barang', stok_barang = '$stok_barang' WHERE id_barang = '$id'" ; 
		 $hasil = mysql_query($query)or die(mysql_error()); 
		 //hasil 
		if ($hasil) 
		{
			echo"<script>window.alert('Update Barang Sukses!');
						window.location=('admin_menu.php')</script>";
		}
		else 
		{
			echo"<script>window.alert('Update Barang Gagal!');
						window.location=('admin_menu.php')</script>";
		}  
	}
?>