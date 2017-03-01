<?php
	include "elemen/kepala-cs.php";
	include "../../koneksi/koneksi_db.php";
?>
<?php
	if(isset($_SESSION['username']))
	{
		if ($_SESSION['jabatan'] == "CS")
		{
			if (!login_check()) 
			{
				header("Location: ../pegawai_logout.php");
				exit(0);
			}				
		}
		else
		{
			header("location: ../pegawai_login.php");
		}
		//jika tidak ada session
	}
	else
	{
		header("location: ../pegawai_login.php");
	}
?>
					<div id="kontenSAPE">							
					
					    <div class="easyui-tabs" style="width:auto;height:auto;">
							<div title="Awalan" style="padding:10px;">
								<div id="kontenOLTB">
									<h3 class="h3Index">INFO PEGAWAI</h3>
										<?php
											#include "cek.php";
										?>
			
										<?php
											$data=mysql_query("select * from tb_pemesanan");
											$jumlah=mysql_num_rows($data);
											
											if(!$pilih_db)
											{
												echo"<table class='tableMenu' border=0>
														<tr>
															<td>Tabel Pemesanan</td>
															<td>:</td>
															<td><b style='color:red;>Tidak dapat diakses.</b></td>
														</tr>
														<tr>
															<td>Jumlah Pemesanan</td>
															<td>:</td>
															<td><b>$jumlah</b> Pemesanan.</td>
														</tr>
														<tr>
															<td>Detail Pemesanan</td>
															<td>:</td>
															<td><a href='cs_data_detail_pemesanan.php' target='_new' title='Unduh Data Detail Pemesanan Lengkap'><b>Unduh</b></a></td>
														</tr>
														<tr>
															<td>Pembayaran</td>
															<td>:</td>
															<td><a href='cs_data_pembayaran.php' target='_new' title='Unduh Data Pembayaran Lengkap'><b>Unduh</b></a></td>
														</tr>
													</table>";
											}
											else
											{
												echo"<table class='tableMenu' border=0>
														<tr>
															<td>Tabel Pemesanan</td>
															<td>:</td>
															<td><b>Dapat diakses.</b></td>
														</tr>
														<tr>
															<td>Jumlah Pemesanan</td>
															<td>:</td>
															<td><b>$jumlah</b> Pemesanan.</td>
														</tr>
														<tr>
															<td>Detail Pemesanan</td>
															<td>:</td>
															<td><a href='cs_data_detail_pemesanan.php' target='_new' title='Unduh Data Detail Pemesanan Lengkap'><b>Unduh</b></a></td>
														</tr>
														<tr>
															<td>Pembayaran</td>
															<td>:</td>
															<td><a href='cs_data_pembayaran.php' target='_new' title='Unduh Data Pembayaran Lengkap'><b>Unduh</b></a></td>
														</tr>
													</table>";
											}
										?>
										
										
								</div>
							</div>
							
							<div title="Detail Pemesan" style="padding:10px;">
								<div id="kontenOLTB">
									<h3 class="h3Index" style="margin-bottom:10px;">TABEL DATA PEMESAN</h3> 
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables" class="display">
											<thead>
											  <th >No.</th>
											  <th >Nama</th>
											  <th >Username</th>
											  <th >Alamat</th>
											  <th >Kota</th>
											  <th >Provinsi</th>
											  <th >Kode Pos</th>
											  <th >HP</th>
											  <th >KTP</th>
											  <th >QTY</th>
											  <th >No.Barang</th>
											  <th >Tgl Pesan</th>
											</thead>
											<tbody>
												<?php
															  $sql = mysql_query("SELECT * FROM tb_pemesanan order by jam_pesan");
															  $no = 1;
													while ($r = mysql_fetch_array($sql)) {
													  echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[nama_pelanggan]</td>
															<td>$r[username]</td>
															<td>$r[alamat]</td>
															<td>$r[kota]</td>
															<td>$r[provinsi]</td>
															<td>$r[kode_pos]</td>
															<td>$r[no_hp]</td>
															<td>$r[no_ktp]</td>
															<td>$r[qty] Buah</td>
															<td>$r[id_barang]</td>
															<td>$r[tanggal_pesan]</td>
															</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>	
								</div>	
							</div>

							<div title="Menunggu Pembayaran" style="padding:10px;">
								<div id="kontenOLTB">
									<h3 class="h3Index" style="margin-bottom:10px;">TABEL MENUNGGU PEMBAYARAN</h3>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables1" class="display">
											<thead>
											  <th >No.</th>
											  <th >Username</th>
											  <th >No Rekening</th>
											  <th >Total Bayar</th>
											  <th >Tanggal Pesan</th>
											  <th >Jam Pesan</th>
											  <th >Jasa Pengiriman</th>
											  <th >Status Pemesanan</th>
											</thead>
											<tbody>
												<?php
															  $sql = mysql_query("SELECT * FROM tb_detail_pemesanan where status_pemesanan='menunggu pembayaran'");
															  $no = 1;
													while ($r = mysql_fetch_array($sql)) {
													#Format Uang
													$uang1=$r['total_harga_barang'];
													$uang=number_format($uang1,0,",",".");
													  echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[username]</td>
															<td>$r[rekening_bank]</td>
															<td>Rp.$uang</td>
															<td>$r[tanggal_pesan]</td>
															<td>$r[jam_pesan]</td>
															<td>$r[jasa_pengiriman]</td>
															<td>$r[status_pemesanan]</td>
															</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>	
								</div>	
							</div>

							<div title="Pengecekan Pembayaran" style="padding:10px;">
								<div id="kontenOLTB">
									<h3 class="h3Index" style="margin-bottom:10px;">TABEL PENGECEKAN PEMBAYARAN</h3>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables2" class="display">
											<thead>
											  <th >No.</th>
											  <th >Nama</th>
											  <th >Bank</th>
											  <th >Metode</th>
											  <th >Total  Bayar</th>
											  <th >Tanggal Pembayaran</th>
											  <th >Jam Konfirmasi</th>
											  <th >Aksi</th>
											</thead>
											<tbody>
												<?php
													$sql = mysql_query("SELECT * FROM tb_pembayaran where status_pembayaran='Menunggu Konfirmasi'");
													while ($r = mysql_fetch_array($sql)) {
													#Format Uang
													$uang1=$r['jumlah_pembayaran'];
													$uang=number_format($uang1,0,",",".");
													  echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[nama_pelanggan]</td>
															<td>$r[bank_tujuan]</td>
															<td>$r[metode_pembayaran]</td>
															<td>Rp.$uang</td>
															<td>$r[tanggal_pembayaran]</td>
															<td>$r[jam_konfirmasi]</td>
															<td><a href='../../input.php?input=konf&no_pemesanan=$r[no_pemesanan]' title='Konfirmasi Pembayaran'>Konfirmasi</a></td>
															</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>	
								</div>	
							</div>

							<div title="Pengiriman Pesanan" style="padding:10px;">
								<div id="kontenOLTB">
									<h3 class="h3Index" style="margin-bottom:10px;">TABEL PENGIRIMAN PESANAN</h3>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables3" class="display">
											<thead>
											  <th >No.Pemesanan</th>
											  <th >Nama</th>
											  <th >Total  Bayar</th>
											  <th >Tanggal Pesan</th>
											  <th >Tanggal Kirim</th>
											  <th >Jasa Pengiriman</th>
											  <th >Status</th>
											  <th >Aksi</th>
											</thead>
											<tbody>
												<?php
													$sql = mysql_query("SELECT * FROM tb_detail_pemesanan where status_pemesanan='Pengiriman Barang'");
													while ($r = mysql_fetch_array($sql)) {
													#Format Uang
													$uang1=$r['total_harga_barang'];
													$uang=number_format($uang1,0,",",".");
													  echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[nama_pelanggan]</td>
															<td>Rp.$uang</td>
															<td>$r[tanggal_pesan]</td>
															<td>$r[tanggal_kirim]</td>
															<td>$r[jasa_pengiriman]</td>
															<td>$r[status_pemesanan]</td>
															<td><a href='../../input.php?input=sukses&no_pemesanan=$r[no_pemesanan]' title='Pengiriman Sukses'>Konfirmasi</a></td>
															</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>	
								</div>	
							</div>
							
							<div title="Sejarah Data Pemesanan"  style="padding:10px;">
								<div id="kontenOLTB">
									<h3 class="h3Index" style="margin-bottom:10px;">TABEL SEJARAH PEMESANAN</h3> 
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables4" class="display" >
											<thead>
											  <th >No Pemesanan</th>
											  <th >Nama</th>
											  <th >Foto</th>
											  <th >Total Harga</th>
											  <th >Tanggal Pesan</th>
											  <th >Jumlah Barang</th>
											</thead>
											<tbody>
												<?php
															  $sql = mysql_query("select * from tb_pemesanan join tb_barang on tb_pemesanan.foto_barang = tb_barang.foto_barang where tb_pemesanan.status_pemesanan='Pengiriman Sukses'");
															  $no = 1;
													while ($r = mysql_fetch_array($sql)) {
													#Format Uang
													$uang1=$r['harga_barang'];
													$uang=number_format($uang1,0,",",".");
													  echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[nama_pelanggan]</td>
															<td><img witdh='50' height='50' src='../../images/foto/$r[foto_barang]'/></td>
															<td>Rp.$uang</td>
															<td>$r[tanggal_pesan]</td>
															<td>$r[qty] Buah</td>
															</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>	
<?php
	include "../../elemen/kaki.php";
?>
		<p align=center><img src="../../images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>