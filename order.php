<html>
	<head>
		<!--Java Script Validasi Form-->
		<script type="text/javascript" src="js/validasi.js" ></script>
		<title>Order</title>
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
	}
	else{header("location: user_daftar.php");}
?>
			<div id="header">
					<img src="images/header.png" link="index.php" width="100%" height="auto">
			</div>
					<div class="GarisKepala"></div>

				<div id="konten">
					<div id="kontenkiri">
							<?php
								$username = isset($_SESSION['username']);
								$password1 = isset($_SESSION['password1']);

								$q=mysql_query("select * from tb_pelanggan where username = '$username' and password = '$password1'");
							?>
										 
							<?php								
								$query="select * from tb_pelanggan where username='".$_SESSION['username']."'";
								$result=mysql_query($query);
								$row=mysql_fetch_array($result);
								#echo 'Nama:'.$row['nama_admin'];
								#echo ' <a href="logout.php" title="Logout">Logout</a>';
							?>
							
							<?php
							/*
								$sid = session_id();
								$sql = mysql_query("SELECT * FROM tb_keranjang, tb_barang WHERE id_session='$sid' 
								AND tb_keranjang.id_barang = tb_barang.id_barang");
								$hitung = mysql_num_rows($sql);
								$t=mysql_fetch_array($sql);
								if ($hitung < 1)
								{
									echo"<script>window.alert('Maaf, Keranjang Anda Masih Kosong. Silakan pilih terlebih dahulu.');
											window.location=('index.php')</script>";
								}
								//$total_harga_barang = $t[qty] * $t[harga_barang];
								*/
							?>
							
							<?php
								//$input=$_GET[input];
								//$sql = mysql_query("SELECT qty FROM tb_keranjang WHERE id_session='$sid'");
								//if($input=='harga')
								//{
								//	$t_h_b == $total_harga_barang;
								//}
								
							?>
							<?php
							/*
							$input=$_GET[input];
							$sid = session_id();
							$inputform=$_GET[inputform];
												
							if(isset($_SESSION['username']))
							{
								if($input=='add')
								{
									
									$sql = mysql_query("SELECT id_barang FROM tb_keranjang WHERE id_barang='$_GET[id_barang]' AND id_session='$sid'");
									$num = mysql_num_rows($sql);
									
										mysql_query("UPDATE tb_keranjang SET harga_barang='$_GET[harga_barang]' WHERE id_session = '$sid' AND id_barang='$_GET[id_barang]'");
									
								}
							}*/
							?>
							<?php					
								$query="select * from tb_pelanggan where username='".$_SESSION['username']."'";
								$result=mysql_query($query);
								$row=mysql_fetch_array($result);
								#echo 'Nama:'.$row['nama_admin'];
								#echo ' <a href="logout.php" title="Logout">Logout</a>';
							?>
							
						<form name="f_order" action="input.php?input=inputform&id_barang=<?php echo $data->foto_barang; ?>" method="post" onSubmit="return validasiOrder()">
							<table style="margin:3%;" border="0">
								<tr>
									<td>Nama</td>
									<td>: </td>
									<td colspan="3" ><input required class="form" readonly="readonly" type="text" value="<?php echo $row['nama_pelanggan'];?>" name="nama_pelanggan"></td>
									<td colspan="3" ><input required class="form" type="hidden" value="<?php echo $row['id_pelanggan'];?>" name="id_pelanggan"></td>
									<td colspan="3" ><input required class="form" type="hidden" value="<?php echo $row['username'];?>" name="username"></td>
									<td colspan="3" ><input required class="form" type="hidden" value="<?php echo $_SESSION['total'];?>" name="total_harga_barang"></td>
									<td colspan="3" ><input required class="form" type="hidden" value="<?php $tgl=date('H:i:s', time()+54*50*8);echo $tgl;?>" name="jam_pesan"></td>
									<td colspan="3" ><input required class="form" type="hidden" value="<?php $date=date('d-m-y');echo $date;?>" name="tanggal_pesan"></td>
								</tr>
								
								<tr>
									<td>Jenis Kelamin </td>
									<td>: </td>
									<td colspan="3" >
									<input class="form" required readonly="readonly" type="text" value="<?php echo $row['jenis_kelamin'];?>" name="jenis_kelamin">
									</td>
								</tr>
								
								<tr>
									<td >Alamat   </td>
									<td>: </td>
									<td colspan="3" ><textarea required name="alamat" maxlength="300" placeholder="Alamat lengkap " ><?php echo $row['alamat'];?></textarea></td>
								</tr>
		
								<tr>
									<td >Kota</td>
									<td>: </td>
									<td colspan="3" ><input required type="text" value="<?php echo $row['kota'];?>" name="kota" size="30%"  placeholder="Kota" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
								</tr>
		
								<tr>
									<td >Provinsi</td>
									<td>: </td>
									<td colspan="3" ><input required type="text" value="<?php echo $row['provinsi'];?>" name="provinsi" size="30%"  placeholder="Provinsi" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
								</tr>
								
								<tr>
									<td>Kode Pos</td>
									<td>: </td>
									<td colspan="3" ><input required type="text" value="<?php echo $row['kode_pos'];?>" name="kode_pos" size="30%" placeholder="Kode Pos " maxlength="5" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
								</tr>
								
								<tr>
									<td>Email </td>
									<td>: </td>
									<td colspan="3" ><input required type="text" value="<?php echo $row['email'];?>" readonly="readonly" class="inputS" name="email" value="<?php echo $row['email'];?>" size="30%" maxlength="50" placeholder="Email " /></td>
								</tr>	
								
								<tr>
									<td>No. Handphone</td>
									<td>: </td>
									<td colspan="3" ><input required type="text" value="<?php echo $row['no_hp'];?>" name="no_hp" size="30%" placeholder="No.Hp " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
								</tr>
								
								<tr>
									<td>No. KTP</td>
									<td>: </td>
									<td colspan="3" ><input required type="text" class="inputS" value="<?php echo $row['no_ktp'];?>" name="no_ktp" size="30%" maxlength="50" placeholder="Nomor KTP " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
									<input type="hidden" required name="akses" value="User" maxlength="20" /></td>
								</tr>

								<tr>
									<td>Tanggal Lahir</td>
									<td>: </td>
									<td><input type="text" required name="tanggal_lahir"  value="<?php echo $row['tanggal_lahir'];?>" readonly="readonly" size="23%" placeholder="Tanggal Lahir" maxlength="20" /></td>
									<td><a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.f_order.tanggal_lahir);return false;" ><img name="popcal" align="absmiddle" style="border:none" src="./calender/calender.jpeg" width="34" height="29" border="0" alt=""></a></td>
								</tr>
								
								<tr>
									<td>Bank</td>
									<td>: </td>
									<td colspan="3" >
										<select class="inputS" required name="bank" style="color:#999;">
											<option value="" > -Pilih- </option>
											<option value="Bank Mandiri">Bank Mandiri</option>
											<option value="Bank BRI">Bank BRI</option>
										</select>
									</td>
								</tr>
								
								<tr>
									<td>Jasa Pengiriman</td>
									<td>: </td>
									<td colspan="3" >
										<select class="inputS" required name="jasa_pengiriman" style="color:#999;">
											<option value="" > -Pilih- </option>
											<option value="JNE">JNE</option>
											<option value="TIKI">TIKI</option>
										</select>
									</td>
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
										<input  type="submit" name="submit" value="Order" class="tombol" style="width:260px;">
									</td>
									
								</tr>
							</table>
						</form>
					</div>
					<div id="kontenkanan">
							
						</div>
					</div>
<?php
	include "elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>