<?php
	error_reporting(0);
	include "koneksi/koneksi_db.php";
?>

<html> <!--Tidak bisa Include-->
	<head>
		<title>Menu Pelanggan</title>
			<link rel="stylesheet" type="text/css" href="css/gaya-1.css"/>
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
							//memulai session
							//session_start();

							//cek adanya session
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
					<div id="header"><img src="images/header.png" href="index.php" width="100%" height="auto"></div>
					<div class="GarisKepala"></div>
				<div id="konten">
					<div id="kontenkiriProfil">
						<h3 class="h3Index">Profil <?php echo $_SESSION['username'];?></h3>
							<?php
								$username = isset($_SESSION['username']);
								$password1 = isset($_SESSION['password1']);

								$q=mysql_query("select * from tb_pegawai where username = '$username' and password = '$password1'");
							?>
										 
							<?php
								
								$query="select * from tb_pelanggan where username='".$_SESSION['username']."'";
								$result=mysql_query($query);
								$row=mysql_fetch_array($result);
							?>
							<table border="0" style="margin-left:4%;margin-top:2%;" >
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $row['nama_pelanggan'];?></td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>:</td>
									<td><?php echo $row['jenis_kelamin'];?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $row['email'];?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?php echo $row['alamat'];?></td>
								</tr>
								<tr>
									<td>Kota</td>
									<td>:</td>
									<td><?php echo $row['kota'];?></td>
								</tr>
								<tr>
									<td>Provinsi</td>
									<td>:</td>
									<td><?php echo $row['provinsi'];?></td>
								</tr>
								<tr>
									<td>Kode Pos</td>
									<td>:</td>
									<td><?php echo $row['kode_pos'];?></td>
								</tr>
								<tr>
									<td>No. Handphone</td>
									<td>:</td>
									<td><?php echo $row['no_hp'];?></td>
								</tr>
								<tr>
									<td>No. KTP</td>
									<td>:</td>
									<td><?php echo $row['no_ktp'];?></td>
								</tr>
								<tr>
									<td>Tanggal Lahir</td>
									<td>:</td>
									<td><?php echo $row['tanggal_lahir'];?></td>
								</tr>
								
								
							</table>
							<table style="margin-left:10px;margin-top:30%;" >
								<tr>
									<td>
										<a href="user_menu.php"><img src="images/back.png" width="10%" height="10%" alt="Kembali ke Menu Admin" title="Kembali ke Menu Pelanggan"></a>
									</td>
								</tr>
							</table>
					</div>
					
					<div id="kontenkananProfil">
					<h3 class="h3Index">Ganti Password</h3>
						<form CELLSPACING="5px" name="ganti_pass" method="post" action="user_ganti_password.php" onSubmit="return validasiGantiPassword()">
							 <table border="0" style="margin-left:4%;margin-top:2%;">
							   <tr>
								 <td style="margin-right:5px;">Username</td>
								 <td >:</td>
								 <td ><input class="input" required type="text" name="username" value="<?php echo $_SESSION['username'];?>" readonly="readonly" style="width:100%;"></td>
								 <td rowspan="4"><input class="tombol" type="submit" title="Ganti Password" value="EDIT" style="padding:0px;height:90px;width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Password Lama</td>
								 <td >:</td>
								 <td >
								 <input class="input" required type="password" name="passwordLama" style="width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Password Baru</td>
								 <td >:</td>
								 <td >
								 <input class="input" required type="password" name="passwordBaru" style="width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Konfirmasi Password Baru</td>
								 <td >:</td>
								 <td >
								 <input class="input" required type="password" name="KpasswordBaru" style="width:100%;"></td>
							   </tr>
							 </table>
						</form>
					</div>
				</div>	
<?php
	include "elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>