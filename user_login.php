<html>
	<head>
		<title>Login Pelanggan</title>
<?php
	include "elemen/kepala-user.php";
?>
			<div id="header">
					<img src="images/header.png" width="100%" height="auto">
			</div>
					<div class="GarisKepala"></div>
					<div id="topmenu" ></div>
				
					
					
				<div id="konten">
					<div id="kontenkiriSAPE2">
						
					</div>
					
					<div id="kontenkananSAPE2">
					<?php
					//memulai session
					session_start();

					//cek adanya session, jika session sudah ada maka diarahkan ke ../index.php
					/*if (isset($_SESSION['username'])){
					header("location: login_sa.php");
					}*/
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
							header("location: u-pegawai/u-admin/admin_menu.php");
						}
						if ($_SESSION['jabatan'] == "CS") {
							header("location: u-pegawai/u-cs/cs_menu.php");}
						
					}
					?>
					<h3 class="h3Login">Login Pelanggan <span style="font-size:12px;">(<a href="#BantuanLogin" title="Bantuan Login" onclick="open_new()" >?</a>)</span></h3>
						<form CELLSPACING="5px" name="login_sa" method="post" action="user_login_submit.php" onSubmit="return validasiLoginSA()">
						<script>function open_new(){var newW=window.open("","","width=820,height=10");newW.document.write
								("<u><b style='font-size:20px;'>Bantuan Login</b></u><br>- Silakan <b>Login</b> dengan baik dan benar.<br>- Pastikan password dan username yang Anda masukkan sudah benar.<br>- Jika Anda tidak melakukan aktifitas apapun selama 1 jam setelah Login, maka secara otomatis akun Anda akan Logout sendiri!.");}</script>
							 <table border="0" id="table1">
							   <tr>
							   	<td align="center" rowspan="2" >						
									<img src="images/admin_login_icon.png" width="25%" height="25%" alt="Login Pelanggan" title="Login Pelanggan">
								</td>
								 <td >Username</td>
								 <td >:</td>
								 
								 <td ><input required class="input" type="text" name="username" placeholder="Username" style="width:100%;"></td>
								 <td rowspan="2"><input class="tombol" type="submit" title="submit" value="Login" name="Login" style="padding:0px;height:45;width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Password</td>
								 <td >:</td>
								 <td ><input required class="input" type="password" name="password1" placeholder="Password" style="width:100%;"></td>
							   </tr>
							 </table>
						</form>
					
					</div>
				</div>
			<?php
				include "elemen/kaki_login.php";
			?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>