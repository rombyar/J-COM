<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		if (isset($_SESSION['jabatan']) == "Super Admin") 
		{
			header("location: u-pegawai/u-super-admin/sa_menu.php");
		}
		if (isset($_SESSION['jabatan']) == "Admin") 
		{
			header("location: u-pegawai/u-admin/admin_menu.php");
		}
		if (isset($_SESSION['jabatan']) == "CS") {
			header("location: u-pegawai/u-cs/cs_menu.php");}
	}
	else
	{
		header("location: user_daftar.php");
	}
	
	
	error_reporting(0);
	include "koneksi/koneksi_db.php";
	include "elemen/tanggal.php";

	$input=$_GET[input];
	$sid = session_id();
	$inputform=$_GET[inputform];
	
	if(isset($_SESSION['username']))
	{
		if($input=='add')
		{
			$queryBarang = mysql_query("SELECT * FROM tb_barang WHERE id_barang='$_GET[id_barang]'");
			$barang = mysql_fetch_object($queryBarang);
			if($barang->stok_barang < 1)
			{
				echo "Maaf, Stok Habis untuk produk $barang->nama_barang.";
			}
			else
			{
				$sql = mysql_query("SELECT id_barang FROM tb_keranjang WHERE id_barang='$_GET[id_barang]' AND id_session='$sid'");
				$num = mysql_num_rows($sql);
					if ($num==0)
					{
						mysql_query("INSERT INTO tb_keranjang(id_barang,id_session,foto_barang,tgl_keranjang,qty)
													VALUES	('$_GET[id_barang]',
															'$sid',
															'$_GET[foto_barang]',
															'$tgl_sekarang',
															'1')");
					}
						else {
							mysql_query("UPDATE tb_keranjang SET qty = qty + 1 WHERE id_session = '$sid' AND id_barang='$_GET[id_barang]'");
						}
						deletecart();
						header('location:cart.php');
			}
			//}
		}
		
		elseif ($input=='delete')
		{
			mysql_query("DELETE FROM tb_keranjang WHERE id_keranjang='$_GET[id_barang]'");
			header('location:cart.php');
		}
		
		
		elseif ($input=='inputform')
		{
			function cart_content()
			{
				$ct_content = array();
				$sid = session_id();
				$sql = mysql_query("SELECT * FROM tb_keranjang WHERE id_session='$sid'");
				
				while ($r=mysql_fetch_array($sql)) 
				{
					$ct_content[] = $r;
				}
				return $ct_content;
			}
			$ct_content = cart_content();
			$jml = count($ct_content);
			$now = date("Ymd");

				if($_POST[bank] == "Bank Mandiri")
				{
					$reg_bank = "900-00-0871869-5";
				}
				else if ($_POST[bank] == "Bank BRI")
				{
					$reg_bank = "12121212121211";
				}
				
				if($_POST[jasa_pengiriman] == "JNE")
				{
					$ongkir = "20000";
				}
				else if($_POST[jasa_pengiriman] == "TIKI")
				{
					$ongkir = "21000";
				}
				
				
				$tala = $_POST[tanggal_lahir];
				$tanggal_daftar=date("Y-m-d");
				
				$query = "select datediff ('$tanggal_daftar', '$tala') as selisih";
				$hasil = mysql_query($query);
				$data = mysql_fetch_array($hasil);
				
				$umur = floor($data['selisih']/365);
				
				
					if(!empty($_POST[id_pelanggan]) && !empty($_POST[username]) && !empty($_POST[nama_pelanggan]) && !empty($_POST[jenis_kelamin]) && 
					   !empty($_POST[alamat]) && !empty($_POST[kota])
					   && !empty($_POST[provinsi]) && !empty($_POST[kode_pos]) && !empty($_POST[email]) 
					   && !empty($_POST[no_hp])&& !empty($_POST[no_ktp])&& !empty($_POST[tanggal_lahir]))
					   #&& !empty($_POST[harga_barang]))
					{
						if(!empty($_POST[bank]))
						{
							if($umur >= 17)
							{
								#$id_pemesanan = $_POST[id_pemesanan];
								
								//$totalharga = (($ct_content[$i]['qty'])*($_POST[harga_barang]));
								
								function newID()
								{
									$query = "SELECT max(no_pemesanan) as maxID FROM tb_detail_pemesanan";
									$hasil = mysql_query($query);
									$data  = mysql_fetch_array($hasil);
									$idMax = $data['maxID'];
									$noUrut = (int) substr($idMax, 3, 5);
									$noUrut++;
									$t=date("Y");
									$id = 'TR'.sprintf("%04s", $noUrut);
									return $id;
								}
								$no_pemesanan = newID();
								
								for($i=0; $i<$jml; $i++)
								{
									$id_barang = $ct_content[$i]['id_barang'];
									$jumlah = $ct_content[$i]['qty'];
									$foto = $ct_content[$i]['foto_barang'];
									$sid = session_id();
									
									$query1 = mysql_query("INSERT INTO tb_pemesanan VALUES 
									('',
									'$id_barang',
									'$_POST[id_pelanggan]',
									'$no_pemesanan',
									'$jumlah',
									'$foto',
									'$_POST[jam_pesan]',
									'$_POST[tanggal_pesan]',
									'-',
									'$_POST[username]',
									'$_POST[nama_pelanggan]',
									'$_POST[jenis_kelamin]',
									'$_POST[alamat]',
									'$_POST[kota]',
									'$_POST[provinsi]',
									'$_POST[kode_pos]',
									'$_POST[email]',
									'$_POST[no_hp]',
									'$_POST[no_ktp]',
									'$_POST[tanggal_lahir]')")or die(mysql_error());
									
									
								}
									$totalsemua = $_POST[total_harga_barang]+$ongkir;
									$query2 = mysql_query("INSERT INTO tb_detail_pemesanan VALUES 
									('',
									'$no_pemesanan',
									'$_POST[nama_pelanggan]',
									'$_POST[username]',
									'$totalsemua',
									'$foto',
									'$reg_bank',
									'$_POST[bank]',
									'$_POST[jasa_pengiriman]',
									'$ongkir',
									'$now',
									'$_POST[jam_pesan]',
									'Belum dikirim',
									'Menunggu Pembayaran')")or die(mysql_error());
									
									mysql_query("update tb_barang set stok_barang=stok_barang-$jumlah where id_barang ='$id_barang'")or die(mysql_error());
									#$query3 = mysql_query("UPDATE tb_pelanggan SET jam_pesan='$_POST[jam_pesan]' WHERE username='$_POST[username]'")or die(mysql_error());
							}
							else 
							{
								echo "<script language=\"Javascript\">\n";
								echo "confirmed = window.confirm('Maaf, Umur Anda kurang dari 17 tahun. Apakah Anda ingin mengulanginya?');";
								echo "if (confirmed)";
								echo "{";
								echo "window.location = 'order.php';";
								echo "}";
								echo "else ";
								echo "{";
								echo "window.location = 'cart.php';";
								echo "}";
								echo "</script>";
							}
						}
						else 
						{
							echo "<script language=\"Javascript\">\n";
							echo "confirmed = window.confirm('Maaf, Pilih bank terlebih dahulu!. Apakah Anda ingin mengulanginya?');";
							echo "if (confirmed)";
							echo "{";
							echo "window.location = 'order.php';";
							echo "}";
							echo "else ";
							echo "{";
							echo "window.location = 'cart.php';";
							echo "}";
							echo "</script>";
						}
							
							for($i=0; $i<$jml; $i++)
							{
								mysql_query("DELETE FROM tb_keranjang WHERE id_keranjang = {$ct_content[$i]['id_keranjang']}");
							}
							echo "<script>window.alert('Terima Kasih Pesanan Anda Sedang Kami Proses');
								window.location=('user_menu.php')</script>";
					}
					else 
					{
						echo "<script language=\"Javascript\">\n";
						echo "confirmed = window.confirm('Formulir masih ada yang kosong!. Apakah Anda ingin mengulanginya?');";
						echo "if (confirmed)";
						echo "{";
						echo "window.location = 'order.php';";
						echo "}";
						echo "else ";
						echo "{";
						echo "window.location = 'cart.php';";
						echo "}";
						echo "</script>";
					}
		}
		elseif ($input=='konf')
		{
			$no = $_GET['no_pemesanan'];
			$now = date("Y-m-d");
			$q= mysql_query("update tb_detail_pemesanan set status_pemesanan='Pengiriman Barang', tanggal_kirim='$now' where no_pemesanan='$no'")or die(mysql_error());
				mysql_query("update tb_pembayaran set status_pembayaran='Pembayaran Sukses' where no_pemesanan='$no'")or die(mysql_error());
			if($q)
			{
				echo "<script>window.alert('Berhasil di Proses!');
							window.location=('u-pegawai/u-cs/cs_menu.php')</script>";
			}
			else
			{
				echo "<script>window.alert('Gagal di Proses!');
							window.location=('u-pegawai/u-cs/cs_menu.php')</script>";
			}
		}
		elseif ($input=='sukses')
		{
			$no = $_GET['no_pemesanan'];
			$q= mysql_query("update tb_detail_pemesanan set status_pemesanan='Pengiriman Sukses' where no_pemesanan='$no'")or die(mysql_error());
				mysql_query("update tb_pemesanan set status_pemesanan='Pengiriman Sukses' where no_pemesanan='$no'")or die(mysql_error());
			if($q)
			{
				echo "<script>window.alert('Berhasil di Proses!');
							window.location=('u-pegawai/u-cs/cs_menu.php')</script>";
			}
			else
			{
				echo "<script>window.alert('Gagal di Proses!');
							window.location=('u-pegawai/u-cs/cs_menu.php')</script>";
			}
		}
	}
	else
	{
		header("location: user_daftar.php");
	}


function deletecart()
{
	$del = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM tb_keranjang WHERE tgl_keranjang < '$del'");
}

?>