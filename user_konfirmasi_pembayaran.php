<?php
	include "koneksi/koneksi_db.php";
	ob_start();
?>

<html> <!--Tidak bisa Include-->
	<head>
		<title>Menu Pelanggan</title>
			<link rel="stylesheet" type="text/css" href="css/Gaya-1.css"/>
			<link href="images/Computer1.png" rel="SHORTCUT ICON">
			<script type="text/javascript" src="js/twd-menu.js" charset="utf-8"></script>
			
			<!--Java Script Validasi Form-->
			<script type="text/javascript" src="js/validasi.js" ></script>
			
			<!--Java Script dan CSS Menu Tab-->
			<link rel="stylesheet" type="text/css" href="css/easyui.css">
			<link rel="stylesheet" type="text/css" href="css/icon.css">
			<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
			<script type="text/javascript" src="js/jquery.easyui.min.js"></script>		
		
			<!--Java Script Navigasi Menu
			<!--<script type="text/javascript" src="jquery-1.9.1.min.js" charset="utf-8"></script>-->
	</head>
		<body>
		<div id="wraf">
				<div id="twd-menu" >
					<ul >
						<li><a href="index.php">Home</a></li>
						<li><a href="publik_tentang.php">Tentang</a></li>
						<li><a href="publik_berita.php">Berita</a></li>
						<li><a href="publik_kontak.php">Kontak</a></li>
						<div class="nvskanan">
							<a href="cart.php"><?php include "keranjang2.php"; ?></a>|<u><a href="user_profil.php">
							<?php
							if(isset($_SESSION['username'])){
							//if (ISSET($_SESSION['username'])){
							#echo "Anda Login Sebagai ";
							echo $_SESSION['username'];									

							//jika tidak ada session
							}else{
							header("location: user_logout.php");
							}
							?>
							
							</a></u>|<u><a href="user_logout.php">Logout</a></u>|<u><a href="publik_bantuan.php">Bantuan</a></u>
						</div>
					</ul>
				</div>
					<div id="header">
						<img src="images/header.png" href="index.php" width="100%" height="auto">
					</div>
						<div class="GarisKepala"></div>
							<div id="kontenSAPE">							
					
					    <div class="easyui-tabs" style="width:auto;height:auto;">
							
							<div title="Konfirmasi Pembayaran" style="padding:10px;">
								<div id="kontenkiriUU">
									<h3 class="h3Index">KONFIRMASI PEMBAYARAN</h3>
										<?php
											$q=mysql_query("SELECT * FROM tb_pelanggan where username='".$_SESSION['username']."'");
											#$result=mysql_query($q);
											$row=mysql_fetch_array($q);
										?>
										
											<form name="pembayaran" action="" method="post" onSubmit="return validasiPembayaran()">
													<table  class='tableMenu' border="0" >
													<?php
														error_reporting(0);
														$input=$_GET['input'];
														if($input=='add')
														{
															#if ((isset($_POST['submit'])) AND ($_POST['no_pemesanan'] <> "")) 
															#{
																#$no_pemesanan = isset($_POST['no_pemesanan']);
																$sql = mysql_query("SELECT * FROM tb_detail_pemesanan WHERE no_pemesanan LIKE '$_GET[no_pemesanan]' ") or die(mysql_error());
																//menampilkan jumlah hasil pencarian
																$jumlah = mysql_num_rows($sql);
																if ($jumlah > 0) 
																{
																	#echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';
		
																	while ($res=mysql_fetch_array($sql)) 
																	{
													?>
																	<tr>
																		<td>No. Pemesanan</td>
																		<td>: </td>
																		<td colspan="3" ><input required type="text"  name="no_pemesanan" value="<?php echo $_GET['no_pemesanan'];?>" class="inputS" size="30%" placeholder="Nomor Pemesanan" maxlength="20" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',this)" /></td>
																		<input required type="hidden"  name="id_pelanggan" value="<?php echo $row['id_pelanggan'];?>" class="inputS" size="30%" placeholder="Id Pelanggan " maxlength="20" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',this)" />
																		<input required class="form" type="hidden" value="<?php $tgl=date('H:i:s', time()+54*50*8);echo $tgl;?>" name="jam_pembayaran">
																	</tr>
																	
																	<tr>
																		<td>Nama</td>
																		<td>: </td>
																		<td colspan="3" ><input required type="text"  name="nama_pelanggan" value="<?php echo $row['nama_pelanggan'];?>" class="inputS" size="30%" placeholder="Nama Pelanggan" maxlength="20" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" /></td>
																	</tr>
								
																	<tr>
																		<td>Email </td>
																		<td>: </td>
																		<td colspan="3" ><input required type="email" class="inputS" name="email" size="30%" maxlength="50" placeholder="Email " /></td>
																	</tr>	
																	
																	<tr>
																		<td>Jumlah Pembayaran</td>
																		<td>: </td>
																		<td colspan="3" ><input required type="text"  name="jumlah_pembayaran" class="inputS" size="30%" placeholder="Jumlah Pembayaran " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
																	</tr>

																	<tr>
																		<td>Tanggal Pembayaran</td>
																		<td>: </td>
																		<td><input type="text" required name="tanggal_pembayaran" readonly="readonly" size="23%" placeholder="Tanggal Pembayaran" maxlength="20" /></td>
																		<td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.pembayaran.tanggal_pembayaran);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="./calender2/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
																	</tr>
																	
																	<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
																	<iframe width=174 height=189 name="gToday:normal:./calender2/agenda.js" id="gToday:normal:./calender2/agenda.js" src="./calender2/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
																	</iframe>
																	
																	<tr>
																		<td>Bank Tujuan</td>
																		<td>: </td>
																		<td colspan="3" >
																			<select class="inputS" required name="bank_tujuan" style="color:#999;">
																				<option value="" > -Pilih- </option>
																				<option value="Bank Mandiri">Bank Mandiri</option>
																				<option value="Bank BRI">Bank BRI</option>
																			</select>
																		</td>
																	</tr>
																	
																	<tr>
																		<td>Metode Pembayaran</td>
																		<td>: </td>
																		<td colspan="3" >
																			<select class="inputS" required name="metode_pembayaran" style="color:#999;">
																				<option value="" > -Pilih- </option>
																				<option value="Internet Banking">Internet Banking</option>
																				<option value="Mobile Banking">Mobile Banking</option>
																				<option value="ATM">ATM</option>
																				<option value="Setoran Tunai">Setoran Tunai</option>
																				<option value="Transfer Antar Bank">Transfer Antar Bank</option>
																			</select>
																		</td>
																	</tr>
																	
																	<tr>
																		<td>
																		</td>
																		<td>
																		</td>
																		<td colspan="3">
																			<input  type="submit" name="submit" value="Kirim" id="submit" class="tombol" style="width:260px;"/>
																		</td>
																		
																	</tr>
														<?php
																		#$nomor++; echo $nomor.'. ';
																		#echo $res['no_pemesanan'].'<br>';
																	}
																}
																else 
																{
																	echo '<p style="margin-left:2%;">Maaf, data yang cari tidak ditemukan.</p>';
																	echo '<p style="margin-left:2%;">Silakan periksa ulang!</p>';
																}
															#}
															#else { echo 'Masukkan dulu kata kuncinya';}
														}
														?>
													</table>	
											</form>
											
											<?php
												error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
												//panggil file config.php untuk menghubung ke server
												 
												//tangkap data dari form
												$id_pelanggan  = $_POST['id_pelanggan'];
												$no_pemesanan  = $_POST['no_pemesanan'];
												$nama_pelanggan = $_POST['nama_pelanggan'];
												$email = $_POST['email'];
												$jumlah_pembayaran = $_POST['jumlah_pembayaran'];
												$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
												$bank_tujuan = $_POST['bank_tujuan'];
												$metode_pembayaran = $_POST['metode_pembayaran'];
												$jam_pembayaran = $_POST['jam_pembayaran'];
												
												
												
												if(!empty($no_pemesanan) && !empty($id_pelanggan) && !empty($nama_pelanggan) && !empty($email) && !empty($jumlah_pembayaran) && !empty($tanggal_pembayaran) && 
												   !empty($bank_tujuan) && !empty($metode_pembayaran) && !empty($jam_pembayaran))
												{
													$query = mysql_query("INSERT INTO tb_pembayaran VALUES 
															('', 
															'$id_pelanggan', 
															'$no_pemesanan', 
															'$nama_pelanggan', 
															'$email',
															'$jumlah_pembayaran', 
															'$tanggal_pembayaran', 
															'$bank_tujuan', 
															'$metode_pembayaran', 
															'$jam_pembayaran',
															'Menunggu Konfirmasi')")or die(mysql_error());
															
													mysql_query("update tb_detail_pemesanan set status_pemesanan='Pengecekan Pembayaran' where no_pemesanan='$no_pemesanan'");#or die(mysql_error());
													 
													if ($query) 
													{
														echo "<script>window.alert('Konfirmasi Sukses!. Kami akan segera melakukan pengecekan terhadap konfirmasi pembayaran Anda.');
															  window.location=('user_menu.php')</script>";
													}
													else
													{	
														echo "<script language=\"Javascript\">\n";
														echo "confirmed = window.confirm('Konfirmasi Gagal!. Apakah Anda ingin mengulangi konfirmasi?');";
														echo "if (confirmed)";
														echo "{";
														echo "window.location = 'user_konfirmasi_pembayaran.php';";
														echo "}";
														echo "else ";
														echo "{";
														echo "window.location = 'user_menu.php';";
														echo "}";
														echo "</script>";
													}
												}
											?>
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