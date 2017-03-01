<?php
	include "elemen/kepala-sa.php";	
	include "../../koneksi/koneksi_db.php";
?>
<?php
	if(isset($_SESSION['username']))
	{
		if ($_SESSION['jabatan'] == "Super Admin")
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
					<div id="kontenSAPE">
						<h3 class="h3Index">INFO SUPER ADMIN</h3>
							<?php
								
								$datapegawai=mysql_query("select * from tb_pegawai", $con_db);
								$jumlah_pegawai=mysql_num_rows($datapegawai);
								
								if(!$pilih_db)
								{
									echo"<table class='tableMenu' border=0>
											<tr>
												<td>Database</td>
												<td>:</td>
												<td><b style='color:red;>Tidak dapat diakses.</b></td>
											</tr>
											<tr>
												<td>Jumlah Pegawai</td>
												<td>:</td>
												<td><b>$jumlah_pegawai</b> Pegawai.</td>
											</tr>
											<tr>
												<td>Data Pegawai</td>
												<td>:</td>
												<td><a href='sa_data_pegawai.php' target='_new' title='Unduh Data Pegawai Lengkap'><b>Unduh</b></a></td>
											</tr>
											<tr>
												<td>Data Barang</td>
												<td>:</td>
												<td><a href='sa_data_barang.php' target='_new' title='Unduh Data Barang Lengkap'><b>Unduh</b></a></td>
											</tr>
											<tr>
												<td>Data Pelanggan</td>
												<td>:</td>
												<td><a href='sa_data_pelanggan.php' target='_new' title='Unduh Data Pelanggan Lengkap'><b>Unduh</b></a></td>
											</tr>
										</table>";
								}
								else
								{
									echo"<table class='tableMenu' border=0>
											<tr>
												<td>Database</td>
												<td>:</td>
												<td><b>Dapat diakses.</b></td>
											</tr>
											<tr>
												<td>Jumlah Pegawai</td>
												<td>:</td>
												<td><b>$jumlah_pegawai</b> Pegawai.</td>
											</tr>
											<tr>
												<td>Data Pegawai</td>
												<td>:</td>
												<td><a href='sa_data_pegawai.php' target='_new' title='Unduh Data Pegawai Lengkap'><b>Unduh</b></a></td>
											</tr>
											<tr>
												<td>Data Barang</td>
												<td>:</td>
												<td><a href='sa_data_barang.php' target='_new' title='Unduh Data Barang Lengkap'><b>Unduh</b></a></td>
											</tr>
											<tr>
												<td>Data Pelanggan</td>
												<td>:</td>
												<td><a href='sa_data_pelanggan.php' target='_new' title='Unduh Data Pelanggan Lengkap'><b>Unduh</b></a></td>
											</tr>
										</table>";
								}
							?>
							
								<?php
									error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
									//panggil file config.php untuk menghubung ke server
									include "../../koneksi/koneksi_db.php";
									 
									if (isset($_POST["username"]) && isset($_POST['pass1']) && isset($_POST['pass2']) && isset($_POST['nama_pegawai']) && isset($_POST['jenis_kelamin']) && isset($_POST['agama']) && isset($_POST['alamat']) && isset($_POST['no_hp']) && isset($_POST['tanggal_lahir']) && isset($_POST['email']) && isset($_POST['jabatan'])){
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

									}
									
									if(!empty($username) && !empty($password1) && !empty($password2) && !empty($nama_pegawai) && !empty($jenis_kelamin)&& !empty($agama) && !empty($alamat) && !empty($no_hp) && !empty($tanggal_lahir) && !empty($email) && !empty($jabatan))
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
												echo "window.location = 'sa_menu.php';";
												echo "}";
												echo "else ";
												echo "{";
												echo "window.location = 'sa_menu.php';";
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
												'$alamat', '$no_hp', '$tanggal_lahir', '$umur', '$email', '$jabatan', '$tanggal_daftar')")or die(mysql_error());
												 
												if ($query) {
													echo"<script>window.alert('Pendaftaran Pegawai Sukses.');
													window.location=('javascript:history.go(-1)')</script>";
												}
												else
												{
													echo "<script language=\"Javascript\">\n";
													echo "confirmed = window.confirm('Pendaftaran Gagal. Apakah Anda mau mengulangi?');";
													echo "if (confirmed)";
													echo "{";
													echo "window.location = 'daftar-admin.php';";
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
											  echo "window.location = 'daftar-admin.php';";
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

				<div title="Data Pegawai" style="padding:10px;">
					<div id="kontenOLTB">
						<h3 class="h3Index" style="margin-bottom:10px;">TABEL DATA PEGAWAI</h3>
						<div style='height:90%;width:100%;overflow:none;overflow-y:scroll;'>
							<table id="datatables" class="display">
								<thead>
									<th>Nama</th>
									<th>Jenis Kelamin</th>
									<th>Agama</th>
									<th>Alamat</th>
									<th>No. HP</th>
									<th>Tanggal Lahir</th>
									<th>Umur Daftar</th>
									<th>Email</th>
									<th>Jabatan</th>
									<th>Tanggal Daftar</th>
									<th>Aksi</th>
								</thead>
								<tbody>
									<?php
										$sql = mysql_query("SELECT * FROM tb_pegawai ORDER BY jabatan DESC");
										while ($r = mysql_fetch_array($sql)) {
										  echo "<tr>
												<td>$r[nama_pegawai]</td>
												<td>$r[jenis_kelamin]</td>
												<td>$r[agama]</td>
												<td>$r[alamat]</td>
												<td>$r[no_hp]</td>
												<td>$r[tanggal_lahir]</td>
												<td>$r[umur]</td>
												<td>$r[email]</td>
												<td>$r[jabatan]</td>
												<td>$r[tanggal_daftar]</td>
												<td><a href='sa_pegawai_edit.php?update=edit&id_pegawai=$r[id_pegawai]'>EDIT</a></td>
												</tr>";
										}                    
									?>
								</tbody>
							</table>
						</div>	
					</div>	
				</div>
				
				<div title="Tambah Pegawai"  style="padding:10px;">
						<div id="kontenkiriSAPE">
								<form name="formulir" action="" method="post" onSubmit="return validasiDaftar()">
									<h3 class="h3Index">FORMULIR PENDAFTARAN PEGAWAI</h3>
										<table  class='tableMenu' border="0" >
											<tr>
												<td>Username </td>
												<td>: </td>
												<td colspan="3" ><input type="text" required autofocus class="inputS" name="username" size="30%" placeholder="Username " maxlength="20" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',this)" /></td>
											</tr>
											
											<tr>
												<td>Password </td>
												<td>: </td>
												<td colspan="3" ><input type="password" required class="inputS" name="pass1" size="30%" placeholder="Password "  maxlength="8" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',this)" /></td>
											</tr>
											
											<tr>
												<td>Konfirmasi Password </td>
												<td>: </td>
												<td colspan="3" ><input type="password" required class="inputS" name="pass2" size="30%" placeholder="Konfirmasi Password " maxlength="8" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',this)" /></td>
											</tr>
											
											<tr>
												<td>Nama </td>
												<td>: </td>
												<td colspan="3" ><input type="text" required class="inputS" name="nama_pegawai" size="30%"  placeholder="Nama lengkap" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
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
												<td>Agama </td>
												<td>: </td>
												<td colspan="3" >
													<select required class="inputS" name="agama" style="color:#999;">
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
												<td colspan="3" ><textarea name="alamat" required id="alamat1" cols="28%" rows="2.5" maxlength="50" placeholder="Alamat lengkap " ></textarea></td>
											</tr>
											
											<tr>
												<td>No. Handphone</td>
												<td>: </td>
												<td colspan="3" ><input type="text" name="no_hp" required size="30%" placeholder="No.Hp " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
											</tr>

											<tr>
												<td>Tanggal Lahir</td>
												<td>: </td>
												<td><input type="text" required name="tanggal_lahir" readonly="readonly" size="23%" placeholder="Tanggal Lahir" maxlength="20" /></td>
												<td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.formulir.tanggal_lahir);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="../../calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
											</tr>
											
											<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
											<iframe width=174 height=189 name="gToday:normal:../../calender/agenda.js" id="gToday:normal:../../calender/agenda.js" src="../../calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
											</iframe>
											
											
											<tr>
												<td>Email </td>
												<td>: </td>
												<td colspan="3" ><input type="text" required class="inputS" name="email" size="30%" maxlength="50" placeholder="Email " /></td>
											</tr>	
											
											<tr>
												<td>Jabatan </td>
												<td>: </td>
												<td colspan="3" >
													<select required class="inputS" name="jabatan" style="color:#999;">
														<option value="" > -Pilih- </option>
														<option value="CS">CS</option>
														<option value="Admin">Admin</option>
													</select>
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
										</table>	
								</form>
						</div>
						
						<div id="kontenkananSAPE">
							<h3 class="h3Index">PERATURAN TAMBAH PEGAWAI</h3>
							<table class='tableMenu'>
								<tr><td>1.</td><td>Username tidak boleh sama.</td></tr>
								<tr><td>2.</td><td>Form harus di isi semua.</td></tr>
								<tr><td>3.</td><td>Isilah form dengan baik dan benar.</td></tr>
								<tr><td>4.</td><td>Periksa ulang kembali form sebelum di input.</td></tr>
							</table>
						</div>
				</div>
				
				
				<!--
				<div title="User Online" style="padding:10px;">
					<div id="kontenOLTB">
						<?php							
						session_start();
						if (empty($_SESSION[username]) AND empty($_SESSION[password]))
						{
						 header('location:index.php');
						}
						else
						{
						?>
						<style>
						th{
							color: #FFFFFF;
							font-size: 8pt;
							text-transform: uppercase;
							text-align: center;
							padding: 0.1em;
							border-width: 1px;
							border-style: solid;
							border-color: #969BA5;
							border-collapse: collapse;
							background-color: #265180;
						}
						</style>               
						<?php                 
						echo"
						<center>
						<table border=0 width='650' align=center>
						<tr><th>No</th><th>Username</th><th>Tanggal Login</th><th>Jam Login</th><th>Jam Logout</th><th>Status</th></tr>";
						   $sql = mysql_query("SELECT * FROM tb_log ORDER BY no DESC");    
						   $no=1;
						   while($d=mysql_fetch_array($sql))
							 {
							  echo "<tr><td align=center>$no</td>
										 <td align=center>$d[username]</td>
										 <td align=center>$d[tanggal_login]</td>
										 <td align=center>$d[jam_login]</td>
										 <td align=center>$d[jam_logout]</td>";
							  if($d[status_ol]=='Offline')
							  {
							  echo"<td style='background-color:red' align=center>OFFLINE</td>";
							  }      
							  else if($d[status_ol]=='Online')
							  {
							  echo"<td style='background-color:00ff00' align=center>ONLINE</td>";
							  }                            
							 echo"</tr>";
							  $no++;      
							 }
						echo "</table>";								
						?>
						<?php
						}
						?>
					</div>
				</div>-->
			</div>
		</div>
<?php
	include "../../elemen/kaki.php";
?>
		<p align=center><img src="../../images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>
