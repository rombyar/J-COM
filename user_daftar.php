<?php
	include "koneksi/koneksi_db.php";
?>
<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		if ($_SESSION['akses'] == "User") 
		{
			header("location: user_menu.php");
		}
		if ($_SESSION['jabatan'] == "Super Admin") 
		{
			header("location: u-pegawai/u-super-admin/sa_menu.php");
		}
		if ($_SESSION['jabatan'] == "Admin") 
		{
			header("location:  u-pegawai/u-admin/admin_menu.php");
		}
		if ($_SESSION['jabatan'] == "CS") {
			header("location:  u-pegawai/u-cs/cs_menu.php");}
		
	}
?>

<html>
	<head>
		<title>Pendaftaran User</title>
<?php
	include "elemen/kepala-user.php";
?>
<div id="header">
	<img src="images/gambar-form.png" href="index.php" width="100%" height="auto">
</div>
	<div class="GarisKepala"></div>
	<div id="kontenSAPE">
		 <div class="easyui-tabs" style="width:auto;height:auto;">
			<div title="Pendaftaran"  style="padding:10px;">
					<div id="Daftar">
					
							<form name="f_pelanggan" action="" method="post" onSubmit="return validasiDaftarPelanggan1()">
								<h3 class="h3Login">FORMULIR PENDAFTARAN PELANGGAN</h3>
									<table  class='tableMenu' border="0" >
										<tr>
											<td>Username </td>
											<td>: </td>
											<td colspan="3" ><input required type="text" class="inputS" name="username" size="30%" placeholder="Username " maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" /></td>
											<input required type="hidden" name="akses" value="User" maxlength="20" />
										</tr>
										
										<tr>
											<td>Password </td>
											<td>: </td>
											<td colspan="3" ><input required id='restrict' type="password" class="inputS" name="pass1" size="30%" placeholder="Password "  maxlength="8" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',this)" /></td>
										</tr>
										
										<tr>
											<td>Konfirmasi Password </td>
											<td>: </td>
											<td colspan="3" ><input required type="password" class="inputS" name="pass2" size="30%" placeholder="Konfirmasi Password " maxlength="8" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',this)" /></td>
										</tr>
										
										<tr>
											<td>Nama </td>
											<td>: </td>
											<td colspan="3" ><input required type="text" name="nama_pelanggan" size="30%"  placeholder="Nama lengkap" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
										<tr>
										
										<tr>
											<td>Jenis Kelamin </td>
											<td>: </td>
											<td colspan="3" >
												<select required class="inputS" name="jenis_kelamin" style="color:#999;">
													<option value="" > -Pilih- </option>
													<option value="Pria">Pria</option>
													<option value="Wanita">Wanita</option>
												</select>
											</td>
										</tr>
										
										<tr>
											<td>Email </td>
											<td>: </td>
											<td colspan="3" ><input required type="email" class="inputS" name="email" size="30%" maxlength="50" placeholder="Email " /></td>
										</tr>	
										
										<tr>
											<td>
											</td>
											<td>
											</td>
											<td colspan="3">
												<input  type="submit" name="KIRIM"  value="Kirim" class="tombol" style="width:260px;"/>
											</td>
											
										</tr>
									</table>	
							</form>
					</div>
					
					<div id="kontenkananSAPE">
						<?php
							error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
							//panggil file config.php untuk menghubung ke server
							 
							//tangkap data dari form
							$username  = $_POST['username'];
							$password1 = $_POST['pass1'];
							$password2 = $_POST['pass2'];
							$nama_pelanggan = $_POST['nama_pelanggan'];
							$jenis_kelamin = $_POST['jenis_kelamin'];
							$email = $_POST['email'];
							$akses = $_POST['akses'];
							
							
							
							if(!empty($username) && !empty($password1) && !empty($password2) && !empty($nama_pelanggan) && !empty($jenis_kelamin)
							&& !empty($email) && !empty($akses))
							{
								if($password1 == $password2)
								{
									/*if(8 >= $password1)
									{
										echo "<script language=\"Javascript\">\n";
										echo "confirmed = window.confirm('Maaf, Karakter Password kurang dari 8. Apakah Anda ingin mengulangi?');";
										echo "if (confirmed)";
										echo "{";
										echo "window.location = 'user_daftar.php';";
										echo "}";
										echo "else ";
										echo "{";
										echo "window.location = 'index.php';";
										echo "}";
										echo "</script>";
									}
									else
									{*/
										$cek_username=mysql_num_rows(mysql_query("SELECT username FROM tb_pelanggan WHERE username='$username'"));
										if ($cek_username > 0)
										{
											echo "<script language=\"Javascript\">\n";
											echo "confirmed = window.confirm('Username sudah ada!. Apakah Anda ingin mengulangi pendaftaran?');";
											echo "if (confirmed)";
											echo "{";
											echo "window.location = 'user_daftar.php';";
											echo "}";
											echo "else ";
											echo "{";
											echo "window.location = 'index.php';";
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
											#$id_pelanggan = $today.sprintf('%04s', $nextNoUrut);
											
											//simpan data ke database
											$query = mysql_query("insert into tb_pelanggan values('', '$akses', '$username', '$password1' , '$nama_pelanggan', '$jenis_kelamin', '$email', '', '', '', '', '', '', '','$tanggal_daftar')"); //or die(mysql_error());
											 
											if ($query) {
												echo "<script language=\"Javascript\">\n";
												echo "confirmed = window.confirm('Pendaftaran Sukses. Apakah Anda ingin Login?');";
												echo "if (confirmed)";
												echo "{";
												echo "window.location = 'user_login.php';";
												echo "}";
												echo "else ";
												echo "{";
												echo "window.location = 'index.php';";
												echo "}";
												echo "</script>";
											}
											else
											{	
												echo "<script language=\"Javascript\">\n";
												echo "confirmed = window.confirm('Pendaftaran Gagal. Apakah Anda ingin mengulangi pendaftaran?');";
												echo "if (confirmed)";
												echo "{";
												echo "window.location = 'user_daftar.php';";
												echo "}";
												echo "else ";
												echo "{";
												echo "window.location = 'index.php';";
												echo "}";
												echo "</script>";
											}
										}
									#}
								}
								else
								{
									echo "<script language=\"Javascript\">\n";
									echo "confirmed = window.confirm('Maaf, password yang Anda masukkan tidak sama. Apakah Anda ingin mengulangi pendaftaran?');";
									echo "if (confirmed)";
									echo "{";
									echo "window.location = 'user_daftar.php';";
									echo "}";
									echo "else ";
									echo "{";
									echo "window.location = 'index.php';";
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