<html>
	<head>
		<title>Menu Super Admin</title>
			<link rel="stylesheet" type="text/css" href="../../css/Gaya-1.css"/>
			<link href="../../images/Computer1.png" rel="SHORTCUT ICON">
			<script type="text/javascript" src="../../js/twd-menu.js" charset="utf-8"></script>
			
			<!--Java Script Validasi Form-->
			<script type="text/javascript" src="../../js/validasi.js" ></script>

	</head>
		<body>
		<div id="wraf">
				<div id="twd-menu" >
					<ul >
						<li><a href="../../index.php">Home</a></li>
						<li><a href="../../publik_tentang.php">Tentang</a></li>
						<li><a href="../../publik_berita.php">Berita</a></li>
						<li><a href="../../publik_kontak.php">Kontak</a></li>
						<div class="nvskanan">
							<?php 
								session_start();
								if(isset($_SESSION['username']))
								{
									if ($_SESSION['jabatan'] == "Super Admin") 
									{
										echo "<u><a href='sa_menu.php'>";
										echo $_SESSION['username'];
										echo "</a></u>";
									}
									else
									{
										echo "<u><a href='../pegawai_login.php'>Login</a></u>";
									}
								}
								else
								{
									echo "<u><a href='../pegawai_login.php'>Login</a></u>";
								}
							?>|<u><a href="../../bantuan.php">Bantuan</a></u>
						</div>
					</ul>
				</div>
					<div id="header">
						<img src="../../images/header-admin.png" href="../../index.php" width="100%" height="auto">
					</div>
						<div class="GarisKepala"></div>
					<div id="topmenu" ></div>
				<div id="konten">
					<div id="kontenkiriSA">
						<form name="formulir" action="sa_daftar.php" method="post" onSubmit="return validasiDaftar()">
							<h3 class="h3Index">FORMULIR PENDAFTARAN SA</h3>
							<table  class='tableMenu' border="0" >
								<tr>
									<td>Username </td>
									<td>: </td>
									<td colspan="3" ><input type="text" class="inputS" name="username" size="30%" placeholder="Username " maxlength="20" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" /></td>
								</tr>
								
								<tr>
									<td>Password </td>
									<td>: </td>
									<td colspan="3" ><input type="password" class="inputS" name="pass1" size="30%" placeholder="Password "  maxlength="8" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',this)" /></td>
								</tr>
								
								<tr>
									<td>Konfirmasi Password </td>
									<td>: </td>
									<td colspan="3" ><input type="password" class="inputS" name="pass2" size="30%" placeholder="Konfirmasi Password " maxlength="8" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',this)" /></td>
								</tr>
								
								<tr>
									<td>Nama </td>
									<td>: </td>
									<td colspan="3" ><input type="text" name="nama_pegawai" size="30%"  placeholder="Nama lengkap" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
								<tr>
								
								<tr>
									<td>Jenis Kelamin </td>
									<td>: </td>
									<td colspan="3" >
										<select class="inputS" name="jenis_kelamin" style="color:#999;">
											<option value="" > -Pilih- </option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td>Agama </td>
									<td>: </td>
									<td colspan="3" >
										<select class="inputS" name="agama" style="color:#999;">
											<option value="" > -Pilih- </option>
											<option value="Islam">Islam</option>
											<option value="Kristen">Kristen</option>
											<option value="Budha">Budha</option>
											<option value="Hindu">Hindu</option>
											<option value="Khonghucu">Khonghucu</option>
										</select>
									</td>
								</tr>
				
								<tr>
									<td >Alamat   </td>
									<td>: </td>
									<td colspan="3" ><textarea name="alamat" id="alamat1" cols="28%" rows="2.5" maxlength="50" placeholder="Alamat lengkap " ></textarea></td>
								</tr>
								
								<tr>
									<td>No. Handphone</td>
									<td>: </td>
									<td colspan="3" ><input type="text" name="no_hp" size="30%" placeholder="No.Hp " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
								</tr>

								<tr>
									<td>Tanggal Lahir</td>
									<td>: </td>
									<td><input type="date" readonly="readonly" name="tanggal_lahir"  size="23%" placeholder="Tanggal Lahir" maxlength="20" /></td>
									<td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.formulir.tanggal_lahir);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="../../calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
								</tr>
								
								<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
								<iframe width=174 height=189 name="gToday:normal:../../calender/agenda.js" id="gToday:normal:../../calender/agenda.js" src="../../calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
								</iframe>
								
								
								<tr>
									<td>Email </td>
									<td>: </td>
									<td colspan="3" ><input type="email" class="inputS" name="email" size="30%" maxlength="50" placeholder="Email " /></td>
								</tr>	
								
								<tr>
									<td>Jabatan </td>
									<td>: </td>
									<td colspan="3" >
										<input type="text" class="inputS" readonly="readonly" name="jabatan"  value="Super Admin" />
									</td>
								</tr>
								<tr>
									<td>
									</td>
									<td>
									</td>
									<td colspan="3">
										<input  type="submit" name="KIRIM" value="Kirim" class="tombol" style="width:260px;"/>
									</td>
									
								</tr>
								
								<tr>
									<td>
									</td>
									<td>
									</td>
									<td colspan="3">
									</td>
								</tr>
							</table>	
						</form>
							<?php
								error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
								//panggil file config.php untuk menghubung ke server
								include "../../koneksi/koneksi_db.php";
								 
								//tangkap data dari form
								$username  = $_POST['username'];
								$password1 = $_POST['pass1'];
								$password2 = $_POST['pass2'];
								$nama_pegawai = $_POST['nama_pegawai'];
								$jenis_kelamin = $_POST['jenis_kelamin'];
								$agama = $_POST['agama'];
								$alamat = $_POST['alamat'];
								$no_hp = $_POST['no_hp'];
								$tanggal_lahir = $_POST['tanggal_lahir'];
								$email = $_POST['email'];
								$jabatan = $_POST['jabatan'];
								
								if(!empty($username) && !empty($password1) && !empty($password2) && !empty($nama_pegawai) && !empty($jenis_kelamin)&& 
								!empty($agama) && !empty($alamat) && !empty($no_hp) && !empty($tanggal_lahir) && !empty($email) && !empty($jabatan))
								{
									if($password1 == $password2)
									{
									
										$cek_username=mysql_num_rows(mysql_query("SELECT username FROM tb_pegawai WHERE username='$_POST[username]'"));
										if ($cek_username > 0)
										{
											echo "<script language=\"Javascript\">\n";
											echo "confirmed = window.confirm('Username sudah ada. Apakah Anda mau mengulangi?');";
											echo "if (confirmed)";
											echo "{";
											echo "window.location = 'sa_daftar.php';";
											echo "}";
											echo "else ";
											echo "{";
											echo "window.location = '../../index.php';";
											echo "}";
											echo "</script>";
										}
										else
										{
											$pengacak  = "NDJS3289JSKS190JISJI";

											// mengenkripsi password dengan md5() dan pengacak
											$password1 = md5($pengacak.md5($password1).$pengacak);
											
											$tala = $tanggal_lahir;
											$tanggal_daftar=date("Y-m-d");
											
											$query = "select datediff ('$tanggal_daftar', '$tala') as selisih";
											$hasil = mysql_query($query);
											$data = mysql_fetch_array($hasil);
											
											$umur = floor($data['selisih']/365);

											//$tanggal_daftar_for_id=date("Y");
											#$lastNoUrut = substr( 8, 4);
											// nomor urut ditambah 1
											#$nextNoUrut = $lastNoUrut + 1;
											// membuat format nomor transaksi berikutnya
											#$id_pegawai = $today.sprintf('%04s', $nextNoUrut);
											
											//simpan data ke database
											$query = mysql_query("insert into tb_pegawai values('','$username', '$password1' , '$nama_pegawai', '$jenis_kelamin', '$agama', 
											'$alamat', '$no_hp', '$tanggal_lahir', '$umur', '$email', '$jabatan', '$tanggal_daftar')"); //or die(mysql_error());
											 
											if ($query) {
												echo"<script>window.alert('Tambah Super Admin Sukses!');
													window.location=('sa_daftar.php')</script>";
											}
											else
											{
												echo "<script language=\"Javascript\">\n";
												echo "confirmed = window.confirm('Pendaftaran Gagal. Apakah Anda mau mengulangi?');";
												echo "if (confirmed)";
												echo "{";
												echo "window.location = 'sa_daftar.php';";
												echo "}";
												echo "else ";
												echo "{";
												echo "window.location = '../../index.php';";
												echo "}";
												echo "</script>";
											}
										}
									}else echo "<script language=\"Javascript\">\n";
										  echo "confirmed = window.confirm('Password tidak sama. Apakah Anda mau mengulangi?');";
										  echo "if (confirmed)";
										  echo "{";
										  echo "window.location = 'sa_daftar.php';";
										  echo "}";
										  echo "else ";
										  echo "{";
										  echo "window.location = '../../index.php';";
										  echo "}";
										  echo "</script>";
								}
							?>
					</div>
				</div>	
<?php
	include "../../elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>