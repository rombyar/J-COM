<?php
	include "elemen/kepala-admin.php";
	include "../../koneksi/koneksi_db.php";
?>
				<div id="konten">
					<div id="kontenkiriProfil">
						<h3 class="h3Index">Profil <?php echo $_SESSION['username'];?></h3>
							<?php
								$username = isset($_SESSION['username']);
								$password1 = isset($_SESSION['password1']);
								$q=mysql_query("select * from tb_pegawai where username = '$username' and password = '$password1'");
							?>
										 
							<?php
								$query="select * from tb_pegawai where username='".$_SESSION['username']."'";
								$result=mysql_query($query);
								$row=mysql_fetch_array($result);
							?>
							<table border="0" style="margin-left:4%;margin-top:2%;" >
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $row['nama_pegawai'];?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td><?php echo $row['jenis_kelamin'];?></td>
								</tr>
								<tr>
									<td>Agama</td>
									<td>:</td>
									<td><?php echo $row['agama'];?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?php echo $row['alamat'];?></td>
								</tr>
								<tr>
									<td>No. Handphone</td>
									<td>:</td>
									<td><?php echo $row['no_hp'];?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?php echo $row['tanggal_lahir'];?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $row['email'];?></td>
								</tr>
								<tr>
									<td>Jabatan</td>
									<td>:</td>
									<td><?php echo $row['jabatan'];?></td>
								</tr>
							</table>
							<table style="margin-left:10px;margin-top:38%;" >
								<tr>
									<td>
										<a href="admin_menu.php"><img src="../../images/back.png" width="10%" height="10%" alt="Kembali ke Menu Admin" title="Kembali ke Menu Admin"></a>
									</td>
								</tr>
							</table>
					</div>
					
					<div id="kontenkananProfil">
					<h3 class="h3Index">Ganti Password</h3>
						<form CELLSPACING="5px" name="ganti_pass" method="post" action="admin_ganti_password.php" onSubmit="return validasiGantiPassword()">
							 <table border="0" style="margin-left:4%;margin-top:2%;">
							   <tr>
								 <td style="margin-right:5px;">Username</td>
								 <td >:</td>
								 
								 <td ><input class="input" type="text" name="username" value="<?php echo $_SESSION['username'];?>" readonly="readonly" style="width:100%;"></td>
								 <td rowspan="4"><input class="tombol" type="submit" title="submit" value="EDIT" style="padding:0px;height:90px;width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Password Lama</td>
								 <td >:</td>
								 <td >
								 <input class="input" type="password" name="passwordLama" style="width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Password Baru</td>
								 <td >:</td>
								 <td >
								 <input class="input" type="password" name="passwordBaru" style="width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Konfirmasi Password Baru</td>
								 <td >:</td>
								 <td >
								 <input class="input" type="password" name="KpasswordBaru" style="width:100%;"></td>
							   </tr>
							 </table>
						</form>
						<?php
						/*
						include('koneksi_db.php'); // Include file config.php

						if($_POST['simpan']=='SIMPAN'){  // Jike Request POST di terima

							// Query SQL untuk Update Data
							$simpan_sql = "UPDATE tb_berita SET username_peg= '".$_POST['username_peg']."',judul_berita= '".$_POST['judul_berita']."', isi_berita = '".$_POST['isi_berita']."' WHERE id_berita = ".$_POST['id_berita'];
							$simpan_que = mysql_query($simpan_sql);

							if($simpan_que){  // Jika Update Sukses maka tampilkan pesan.
								echo'UPDATE SUKSES!!!';
							}
							else{  // Jika Update Gagal maka tampilkan pesan.
								echo'GAGAL UPDATE!!';   
							}
						}*/
						?>
					</div>
				</div>	
<?php
	include "../../elemen/kaki.php";
?>
		<p align=center><img src="../../images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>