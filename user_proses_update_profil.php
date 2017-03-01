<?php
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		//panggil file config.php untuk menghubung ke server
		include('koneksi/koneksi_db.php');
		
		session_start();
		
		$id_pelanggan = $_POST['id_pelanggan'];
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$jenis_kelamin = $_POST['jenis_kelamin'];
		$alamat  = $_POST['alamat'];
		$kota = $_POST['kota'];
		$provinsi = $_POST['provinsi'];
		$kode_pos = $_POST['kode_pos'];
		$email = $_POST['email'];
		$no_hp = $_POST['no_hp'];
		$no_ktp = $_POST['no_ktp'];
		$tanggal_lahir = $_POST['tanggal_lahir'];

		$query="select * from tb_pelanggan where username='".$_SESSION['username']."'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		
		if(!empty($nama_pelanggan) && !empty($jenis_kelamin) && !empty($alamat) && !empty($kota) && !empty($provinsi) && 
			!empty($kode_pos) && !empty($no_hp)
			&& !empty($no_ktp) && !empty($tanggal_lahir))
		{
			//$cek_username=mysql_num_rows(mysql_query("SELECT username FROM tb_pelanggan WHERE username='$username'"));
			
			//update data ke database
			$query = mysql_query("UPDATE tb_pelanggan SET nama_pelanggan='$nama_pelanggan', 
			jenis_kelamin='$jenis_kelamin', alamat='$alamat', kota='$kota'
			, provinsi='$provinsi', kode_pos='$kode_pos', email='$email', no_hp='$no_hp'
			, no_ktp='$no_ktp', tanggal_lahir='$tanggal_lahir' 
			WHERE id_pelanggan='$id_pelanggan'") or die(mysql_error(0));
			 
			if ($query) {
				echo "<script language=\"Javascript\">\n";
				echo "confirmed = window.confirm('Pembaharuan profil Sukses!. Apakah Anda ingin melihat profil?');";
				echo "if (confirmed)";
				echo "{";
				echo "window.location = 'user_profil.php';";
				echo "}";
				echo "else ";
				echo "{";
				echo "window.location = 'user_menu.php';";
				echo "}";
				echo "</script>";
			}
			else
			{	
				echo "<script language=\"Javascript\">\n";
				echo "confirmed = window.confirm('Pembaharuan profil Gagal!. Apakah Anda ingin mengulangi pembaharuan?');";
				echo "if (confirmed)";
				echo "{";
				echo "window.location = 'user_menu.php';";
				echo "}";
				echo "else ";
				echo "{";
				echo "window.location = 'user_menu.php';";
				echo "}";
				echo "</script>";
			}
		}else {	echo "<script language=\"Javascript\">\n";
				echo "confirmed = window.confirm('Maaf, silahkan isi dengan benar!. Apakah Anda ingin mengulangi pembaharuan?');";
				echo "if (confirmed)";
				echo "{";
				echo "window.location = 'user_menu.php';";
				echo "}";
				echo "else ";
				echo "{";
				echo "window.location = 'user_menu.php';";
				echo "}";
				echo "</script>";}
	?>