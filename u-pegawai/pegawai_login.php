<html>
	<head>
		<title>Login Pegawai</title>
<?php
	include "elemen/kepala_login.php";
?>
			<div id="header">
					<img src="../images/header-Pegawai.png" width="100%" height="auto"/>
			</div>
			<div class="GarisKepala"></div>
				<div id="konten">
					<div id="kontenkiriSAPE2">
						
					</div>
					
					<div id="kontenkananSAPE2">
						<?php
						//memulai session
						session_start();
						if(isset($_SESSION['username'])){
								if ($_SESSION['jabatan'] == "Super Admin") {
										header("location: u-super-admin/sa_menu.php");
									}
									else if ($_SESSION['jabatan'] == "Admin") {
										header("location: u-admin/admin_menu.php");
									}
									else if ($_SESSION['jabatan'] == "CS") {
										header("location: u-cs/cs_menu.php");}
						}
						?>
						<h3 class="h3Login">Login Pegawai <span style="font-size:12px;">(<a href="#BantuanLogin" title="Bantuan Login" onclick="open_new()" >?</a>)</span></h3>
						<script>function open_new(){var newW=window.open("","","width=820,height=10");newW.document.write
								("<u><b style='font-size:20px;'>Bantuan Login</b></u><br>- Silakan <b>Login</b> dengan baik dan benar.<br>- Pastikan password dan username yang Anda masukkan sudah benar.<br>- Jika Anda tidak melakukan aktifitas apapun selama 1 jam setelah Login, maka secara otomatis akun Anda akan Logout sendiri!.");}</script>
							 <form CELLSPACING="5px" name="login_sa" method="post" action="pegawai_login_submit.php" onSubmit="return validasiLoginSA()">
							 <table border="0" id="table1">
							   <tr>
								<td align="center" rowspan="2" >						
									<img src="../images/admin_login_icon.png" width="25%" height="25%" alt="Login Pegawai" title="Login Pegawai">
								</td>
								 <td >Username</td>
								 <td >:</td>
								 
								 <td ><input class="input" type="text" name="username" placeholder="Username" style="width:100%;"></td>
								 <td rowspan="2"><input class="tombol" type="submit" title="submit" value="Login" name="submit" style="padding:0px;height:45;width:100%;"></td>
							   </tr>
							   <tr>
								 <td >Password</td>
								 <td >:</td>
								 <td >
								 <input class="input" type="password" name="password1" placeholder="Password" style="width:100%;"></td>
							   </tr>
							 </table>
						</form>
					</div>
				</div>
			<?php
				include "../elemen/kaki_login.php";
			?>
		<p align=center><img src="../images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>