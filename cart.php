<html>
	<head>
		<title>Keranjang</title>
<?php 
	include "elemen/kepala-user.php";
	include "koneksi/koneksi_db.php";

	//session_start();
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
	}else{
	header("location: user_daftar.php");
	}
?>
	<div id="header">
		<img src="images/header.png" link="index.php" width="100%" height="auto">
	</div>
			<div class="GarisKepala"></div>
		<div id="konten">
			<div id="kontenkiriIndex">
				<h3 style="margin:2%;">Keranjang Belanja <?php echo $_SESSION['username'];?></h3>
				<div class="KetProd">
				<div style="height:80%;width:100%;overflow:none;overflow-y:scroll;">
					<table cellspacing="0" width="97%" height="10%";cellpadding="0" border="1" align="center" style="margin:2%;border-top: 1px dotted #0; border-bottom: 1px dotted #0;">
						<thead>
							<td><b>No</b></td>
							<td><b>Foto Produk</b></td>
							<td><b>Nama Produk</b></td>
							<td><b>Jumlah</b></td>
							<td><b>Harga Satuan</b></td>
							<td><b>Aksi</b></td>
						</thead>
						
						
					<?php

						$sid = session_id();
						$no = 1;
						$sql = mysql_query("SELECT * FROM tb_keranjang, tb_barang WHERE id_session='$sid'
						AND tb_keranjang.id_barang = tb_barang.id_barang");
						
						$hitung = mysql_num_rows($sql);
						
						//$sql2 = mysql_query("SELECT * FROM tb_keranjang");
						//$hitung2 = mysql_fetch_array($sql2);
						
							if ($hitung < 1)
							{
								echo"<script>window.alert('Maaf, Keranjang Anda Masih Kosong. Silakan pilih terlebih dahulu.');
										window.location=('index.php')</script>";
							}
							else 
							{
								//if($hitung2 != 1)
								//{
								//$total=0;
								error_reporting(0);
									while($t=mysql_fetch_array($sql))
									{
										$qty = $t[qty];
										$harga_barang = $t[harga_barang];
										#Hitung Total Uang
										$total_harga_barang = $qty*$harga_barang;
										$hasil = $total_harga_barang; 
										$output=$total+=$hasil;
										
										#Format Uang
										$uang1=$t[harga_barang];
										$uang=number_format($uang1,0,",",".");
										
										echo"
											<tr>
												<td>$no.</td>
												<td><img width=50 src=images/foto/$t[foto_barang]></td>
												<td>$t[nama_barang]</td>
												<td>$t[qty] Buah</td>
												<td> Rp.$uang</td>
												<td><a title='Hapus pilihan ini' href=input.php?input=delete&id_barang=$t[id_keranjang]>Hapus</a></td>
											</tr>
											
											";
											//$hb = $t['harga_barang'];
											//$j = ;
											

										$no++;
									}
									
									$total1=number_format($total,0,",",".");
									
									echo "
									<tr >
										<td colspan='4'><b>Jumlah Total Harga</b></td>
										<td colspan='2'> Rp.$total1</td>
									</tr>";
									
									$_SESSION['total']=$total;
									//echo $total;
								//}else {echo "hanya menerima 1 pemesanan";}
							}
							?>
							
						<?php
						/*
							$sql = mysql_query("SELECT * FROM tb_keranjang, tb_barang WHERE id_session='$sid'
							AND tb_keranjang.id_barang = tb_barang.id_barang");
							$t=mysql_fetch_array($sql)
						*/
						?>
						<tr>
							<td colspan="5" align="right"><a class="tombol" type="submit" title="Tambah Barang" href="index.php">Tambah</a></td>
							<td colspan="3" align="right"><a class="tombol" type="submit" title="Selesai Pilih" href="order.php">Selesai</a></td>
						</tr>
					</table>
					</div>
				</div>
			</div>
			<div class="kontenkananIndex Navigasi" style="font-size:15px;">
			<?php include "elemen/navigasi.php"; ?>
			</div>
		</div>	
<?php
	include "elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>