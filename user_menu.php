<?php
	include "elemen/kepala-user.php";
	include "koneksi/koneksi_db.php";
?>
<?php
	require_once "elemen/functions.php";
	if(isset($_SESSION['username']))
	{
		if ($_SESSION['akses'] == "User")
		{
			if (!login_check()) 
			{
				header("Location: user_logout.php");
				exit(0);
			}				
		}
		else
		{
			header("location: user_login.php");
		}
		//jika tidak ada session
	}
	else
	{
		header("location: user_login.php");
	}
?>
					<div id="header">
						<img src="images/header.png" href="index.php" width="100%" height="auto">
					</div>
						<div class="GarisKepala"></div>
					<div id="PosBerita">
					    <div class="easyui-tabs" style="width:auto;height:auto;">
							<div title="Awalan" style="padding:10px;">
								<div id="konten">
									<div id="kontenkananBerita">
										<h3 class="h3Index">BERITA WEB</h3>
										<div style="height:95%;width:100%;overflow:none;overflow-y:scroll;margin-top:0%;">
											<?php
												error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
												//buat dulu koneksi kedatabase

												//buat query terlebih dahulu
												$query = mysql_query("SELECT * FROM tb_berita ORDER BY judul_berita ASC");

												//cek apakah kita sudah memposting artikel atau belum
												if (mysql_num_rows($query) == 0) 
												{
													//tampilkan pesan kalau artikel belum ada
													echo '<table id="tableBerita" border="0" >';
													echo '<tr><td><p><strong>Maaf, belum ada berita yang dipublikasikan ...</strong></p></td></tr>';
													echo '</table>';
												} 
												else 
												{
													while ($data = mysql_fetch_array($query)) 
													{
														echo '<table id="tableBerita" border="0" >';
														echo '<tr><td><p><h2>'.$data['judul_berita'].'</h2></p></td></tr>';
														echo '<tr><td><span style="text-indent:3em;line-height:1,5em;" align="justify" style="font-size:15px">'.$data['isi_berita'].'</span></td></tr>';
														echo '<tr><td><p align="justify" style="font-size:10px">oleh: '.$data['username'].' - '.date('j, F Y',strtotime($data['tgl_berita'])).'</p></td></tr>';
														echo '</table>';
													}
												}
												mysql_close();
											?>
										</div>
									</div>
								</div>
							</div>

							<div title="Ubah Profil"  style="padding:10px;">
									<div id="kontenkiriUU">
											<h3 class="h3Index">FORMULIR UBAH PROFIL (<a href="#BantuanProfil" title="Bantuan Profil" onclick="open_new3()">?</a>)</h3>
											<script>function open_new3(){var newW=window.open("","","width=820,height=10");newW.document.write
											("<u><b style='font-size:20px;'>Bantuan Profil</b></u><br>- Silakan isi identitas diri Anda dengan benar.<br>- Pada tab ini Anda dapat mengubah data diri Anda.<br>- Pengisian identitas diri dari awal akan mempermudah Anda di masa depan.");}</script>
								
											<form name="f_pelanggan" action="user_proses_update_profil.php" method="post" onSubmit="return validasiDaftarPelanggan()">
												<?php
												$username = isset($_SESSION['username']);
												$password1 = isset($_SESSION['password1']);
error_reporting(0);
												$q=mysql_query("select * from tb_pelanggan where username = '$username' and password = '$password1'");
												?>
														 
												<?php
													include "koneksi/koneksi_db.php";
													$query="select * from tb_pelanggan where username='".$_SESSION['username']."'";
													$result=mysql_query($query);
													$row=mysql_fetch_array($result);
												?>
													

													<table  class='tableMenu' border="0" >
														
														<tr>
															<td>Nama </td>
															<td>: </td>
															<td colspan="3" ><input required type="text" readonly="readonly" value="<?php echo $row['nama_pelanggan'];?>" name="nama_pelanggan" size="30%"  placeholder="Nama lengkap" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
															<td colspan="3" ><input required type="hidden" value="<?php echo $row['id_pelanggan'];?>" name="id_pelanggan" /></td>
														<tr>
														
														<tr>
															<td>Jenis Kelamin </td>
															<td>: </td>
															<td colspan="3" ><input required type="text" readonly="readonly" value="<?php echo $row['jenis_kelamin'];?>" name="jenis_kelamin" size="30%"  placeholder="Jenis Kelamin" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
														</tr>
				
														<tr>
															<td >Alamat   </td>
															<td>: </td>
															<td colspan="3" ><textarea required name="alamat" maxlength="500" placeholder="Alamat lengkap " ><?php echo $row['alamat'];?></textarea></td>
														</tr>
				
														<tr>
															<td >Kota</td>
															<td>: </td>
															<td colspan="3" ><input required type="text" name="kota" value="<?php echo $row['kota'];?>" size="30%"  placeholder="Kota" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
														</tr>
				
														<tr>
															<td >Provinsi</td>
															<td>: </td>
															<td colspan="3" ><input required type="text" name="provinsi" value="<?php echo $row['provinsi'];?>" size="30%"  placeholder="Provinsi" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
														</tr>
														
														<tr>
															<td>Kode Pos</td>
															<td>: </td>
															<td colspan="3" ><input required type="text" name="kode_pos" value="<?php echo $row['kode_pos'];?>" size="30%" placeholder="Kode Pos " maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
														</tr>
														
														<tr>
															<td>Email </td>
															<td>: </td>
															<td colspan="3" ><input required type="text" class="inputS" value="<?php echo $row['email'];?>" name="email" size="30%" maxlength="50" placeholder="Email " /></td>
														</tr>	
														
														<tr>
															<td>No. Handphone</td>
															<td>: </td>
															<td colspan="3" ><input required type="text" name="no_hp" value="<?php echo $row['no_hp'];?>" size="30%" placeholder="No.Hp " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
														</tr>
														
														<tr>
															<td>No. KTP</td>
															<td>: </td>
															<td colspan="3" ><input required type="text" class="inputS" name="no_ktp" value="<?php echo $row['no_ktp'];?>" size="30%" maxlength="16" placeholder="Nomor KTP " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
														</tr>

														<tr>
															<td>Tanggal Lahir</td>
															<td>: </td>
															<td><input type="text" required readonly="readonly" name="tanggal_lahir"  value="<?php echo $row['tanggal_lahir'];?>" size="23%" placeholder="Tanggal Lahir" maxlength="20" /></td>
															<td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.f_pelanggan.tanggal_lahir);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="./calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
														</tr>
														
														<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
														<iframe width=174 height=189 name="gToday:normal:./calender/agenda.js" id="gToday:normal:./calender/agenda.js" src="./calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
														</iframe>
														
														<tr>
															<td>
															</td>
															<td>
															</td>
															<td colspan="3">
																<input  type="submit" name="KIRIM" value="EDIT" class="tombol" style="width:260px;"/>
															</td>
															
														</tr>
													</table>	
											</form>
									</div>
							</div>
							
							<div title="Konfirmasi Pesanan"  style="padding:10px;">
								<div id="kontenkiriUU">
								<h3 class="h3Index">TABLE KONFIRMASI PESANAN (<a href="#BantuanKonfirmasi" title="Bantuan Konfirmasi" onclick="open_new()">?</a>)</h3>
								<script>function open_new(){var newW=window.open("","","width=820,height=10");newW.document.write
								("<u><b style='font-size:20px;'>Bantuan Konfirmasi</b></u><br>- Silakan <b>Cetak</b> Transaksi Anda.<br>- Jika sudah melakukan pembayaran silakan klik <b>Konfirmasi</b> agar kami dapat langsung melakukan pengecekan pembayaran Anda.");}</script>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables" class="display" >
											<thead>
											  <th >No.Pemesanan</th>
											  <th >No.Rekening Tujuan</th>
											  <th >Bank Tujuan</th>
											  <th >Jasa Pengiriman</th>
											  <th >Ongkir</th>
											  <th >Total Harga</th>
											  <th >Jumlah Barang</th>
											  <th >Tanggal Pesan</th>
											  <th >Aksi</th>
											</thead>
											<tbody>
												<?php
													include "koneksi/koneksi_db.php";
															$sql = mysql_query("select * from tb_detail_pemesanan tk join (Select no_pemesanan, SUM(qty) as total_barang from tb_pemesanan Group by no_pemesanan) 
																	tb using (no_pemesanan) where username='".$_SESSION['username']."' and status_pemesanan='Menunggu Pembayaran'");
															$no = 1;
															
error_reporting(0);
													while ($r = mysql_fetch_array($sql)){
														$uang1 = $r[total_harga_barang];
														$uang = number_format($uang1,0,",",".");
														
														$uang2 = $r[ongkir];
														$uangOngkir = number_format($uang2,0,",",".");
														echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[rekening_bank]</td>
															<td>$r[bank_tujuan]</td>
															<td>$r[jasa_pengiriman]</td>
															<td>Rp.$uangOngkir</td>
															<td>Rp.$uang</td>
															<td>$r[total_barang] Buah</td>
															<td>$r[tanggal_pesan]</td>
															<td><a href='user_konfirmasi_pembayaran.php?input=add&no_pemesanan=$r[no_pemesanan]' title='Konfirmasi Pembayaran'>Konfirmasi</a> | <a href='user_data_transaksi.php?input=add&no_pemesanan=$r[no_pemesanan]' target='_new' title='Cetak data Transaksi Anda'><b>Cetak</b></a></td>
															</tr>";
													}
													#Format Uang
																										
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							
							<div title="Status Pesanan"  style="padding:10px;">
								<div id="kontenkiriUU">
								<h3 class="h3Index">TABLE STATUS PESANAN (<a href="#BantuanStatusPesanan" title="Bantuan Status Pesanan" onclick="open_new1()">?</a>)</h3>
								<script>function open_new1(){var newW=window.open("","","width=820,height=10");newW.document.write
								("<u><b style='font-size:20px;'>Bantuan Status Pesanan</b></u> <br>Pada tab Status Pesanan ini, Anda akan disuguhkan oleh Tabel Status Pesanan yang dapat memberikan informasi (status pesanan) barang yang Anda pesan.");}</script>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables1" class="display" >
											<thead>
											  <th >No.Pemesanan</th>
											  <th >Jumlah Barang</th>
											  <th >Total Harga</th>
											  <th >Tanggal Pesan</th>
											  <th >Jasa Pengiriman</th>
											  <th >Status</th>
											</thead>
											<tbody>
												<?php
													$sql = mysql_query("select * from tb_detail_pemesanan tk join (Select no_pemesanan, SUM(qty) as total_barang from tb_pemesanan Group by no_pemesanan) 
																tb using (no_pemesanan) where status_pemesanan NOT IN ('Pengiriman Sukses') and username='".$_SESSION['username']."'");
													$no = 1;
													while ($r = mysql_fetch_array($sql)) {
														$uang1 = $r[total_harga_barang];
														$uang = number_format($uang1,0,",",".");
														echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td>$r[total_barang] Buah</td>
															<td>Rp.$uang</td>
															<td>$r[tanggal_pesan]</td>
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
							
							
							<div title="Sejarah Pesanan"  style="padding:10px;">
								<div id="kontenkiriUU">	
								<h3 class="h3Index">TABLE SEJARAH PESANAN (<a href="#BantuanSejarahPesanan" title="Bantuan Sejarah Pesanan" onclick="open_new2()">?</a>)</h3>
								<script>function open_new2(){var newW=window.open("","","width=820,height=10");newW.document.write
								("<u><b style='font-size:20px;'>Bantuan Sejarah Pesanan</b></u> <br>Pada tab Sejarah Pesanan ini, Anda akan disuguhkan oleh Tabel Sejarah Pesanan yang pernah Anda pesan pada masa - masa terdahulu.");}</script>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables2" class="display" >
											<thead>
											  <th >No Pemesanan</th>
											  <th >Foto</th>
											  <th >Total Harga</th>
											  <th >Jumlah Barang</th>
											  <th >Tanggal Pesan</th>
											</thead>
											<tbody>
												<?php
													$sql = mysql_query("select * from tb_pemesanan join tb_barang on tb_pemesanan.foto_barang = tb_barang.foto_barang where tb_pemesanan.username='".$_SESSION['username']."' and tb_pemesanan.status_pemesanan='Pengiriman Sukses'");
													$no = 1;
													while ($r = mysql_fetch_array($sql)) {
														$uang1 = $r[harga_barang];
														$uang = number_format($uang1,0,",",".");
														echo "<tr>
															<td>$r[no_pemesanan]</td>
															<td><img witdh='50' height='50' src='images/foto/$r[foto_barang]'/></td>
															<td>Rp.$uang</td>
															<td>$r[qty] Buah</td>
															<td>$r[tanggal_pesan]</td>
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
	include "elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>