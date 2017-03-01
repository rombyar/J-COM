<?php
	include "../../koneksi/koneksi_db.php";
	if(isset($_POST['edit'])=='EDIT'){  // Jike Request POST di terima

		// Query SQL untuk Update Data
		$simpan_sql = "UPDATE tb_pegawai SET 
						alamat= '".$_POST['alamat']."',
						no_hp= '".$_POST['no_hp']."', 
						email = '".$_POST['email']."' 
						WHERE id_pegawai = ".$_POST['id_pegawai'];
		$simpan_que = mysql_query($simpan_sql);

		if($simpan_que){  // Jika Update Sukses maka tampilkan pesan.
			echo"<script>window.alert('Edit data Pegawai Sukses!');
						window.location=('sa_menu.php')</script>";
		}
		else{  // Jika Update Gagal maka tampilkan pesan.
			echo"<script>window.alert('Edit data Pegawai Gagal!');
						window.location=('sa_menu.php')</script>";
		}
	}
?>

<?php
	include "elemen/kepala-sa.php";
?>
	<div id="kontenSAPE">
	    <div class="easyui-tabs" style="width:auto;height:auto;">
			<div title="Edit Pegawai"  style="padding:10px;">
					<div id="kontenkiriSAPE">
						<form name="formulir" action="" method="post" onSubmit="return validasiDaftar()">
							<h3 class="h3Index">EDIT DATA PEGAWAI</h3>
								<table  class='tableMenu' border="0" >
								<?php
									include "../../koneksi/koneksi_db.php";
									error_reporting(0);
									$update=$_GET[update];
									if($update=='edit')
									{
										$query="select * from tb_pegawai where id_pegawai='$_GET[id_pegawai]'";
										$result=mysql_query($query);
										$row=mysql_fetch_array($result);
									}
								?>	
									<input name="id_pegawai" type="hidden" readonly="readonly" value="<?php echo $_GET['id_pegawai'];?>"/>
									<tr>
										<td>Nama </td>
										<td>: </td>
										<td colspan="3" ><input type="text" readonly="readonly" required class="inputS" value="<?php echo $row['nama_pegawai'];?>" name="nama_pegawai" size="30%"  placeholder="Nama lengkap" maxlength="50" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)" /></td>
									<tr>
									
									<tr>
										<td>Jenis Kelamin </td>
										<td>: </td>
										<td colspan="3" >
											<input required class="inputS" readonly="readonly" value="<?php echo $row['jenis_kelamin'];?>" name="jenis_kelamin" placeholder="Jenis Kelamin"/>
										</td>
									</tr>
									
									<tr>
										<td>Agama </td>
										<td>: </td>
										<td colspan="3" >
											<input required class="inputS" readonly="readonly" name="agama"  value="<?php echo $row['agama'];?>" placeholder="Agama"/>
										</td>
									</tr>
						
									<tr>
										<td >Alamat   </td>
										<td>: </td>
										<td colspan="3" ><textarea name="alamat" required id="alamat1" cols="28%" rows="2.5" maxlength="50" placeholder="Alamat lengkap " ><?php echo $row['alamat'];?></textarea></td>
									</tr>
									
									<tr>
										<td>No. Handphone</td>
										<td>: </td>
										<td colspan="3" ><input type="text" value="<?php echo $row['no_hp'];?>" name="no_hp" required size="30%" placeholder="No.Hp " maxlength="20" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
									</tr>
						
									<tr>
										<td>Tanggal Lahir</td>
										<td>: </td>
										<td><input type="text" required readonly="readonly" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'];?>" readonly="readonly" size="23%" placeholder="Tanggal Lahir" maxlength="20" /></td>
									</tr>
									
									<!--  PopCalendar(tag name and id must match) Tags should not be enclosed in tags other than the html body tag. -->
									<iframe width=174 height=189 name="gToday:normal:./calender/agenda.js" id="gToday:normal:./calender/agenda.js" src="./calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
									</iframe>
									
									
									<tr>
										<td>Email </td>
										<td>: </td>
										<td colspan="3" ><input type="email" required class="inputS" value="<?php echo $row['email'];?>" name="email" size="30%" maxlength="50" placeholder="Email " /></td>
									</tr>	
									
									<tr>
										<td>Jabatan </td>
										<td>: </td>
										<td colspan="3" >
											<input required class="inputS" readonly="readonly" placeholder="Jabatan" value="<?php echo $row['jabatan'];?>" name="jabatan"/>
										</td>
									</tr>
									<tr>
										<td>
										</td>
										<td>
										</td>
										<td colspan="3">
											<input  type="submit" name="edit" value="EDIT" class="tombol" style="width:260px;"/>
										</td>
									</tr>
								</table>	
						</form>
						<table style="margin-left:10px;margin-top:40%;" >
							<tr>
								<td>
									<a href="sa_menu.php"><img src="../../images/back.png" width="10%" height="10%" alt="Kembali ke Menu Super Admin" title="Kembali ke Menu Super Admin"></a>
								</td>
							</tr>
						</table>
					</div>
					<div id="kontenkananSAPE">
						<h3 class="h3Index">PERATURAN EDIT PEGAWAI</h3>
						<table class='tableMenu'>
							<tr><td>1.</td><td>Form harus di isi semua (EDIT).</td></tr>
							<tr><td>2.</td><td>Isilah form dengan baik dan benar.</td></tr>
							<tr><td>3.</td><td>Periksa ulang kembali form sebelum di input.</td></tr>
						</table>
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