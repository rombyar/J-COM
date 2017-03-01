<html>
	<head>
		<title>Kontak</title>
<?php
	include "elemen/kepala-user.php";
?>
			<div id="header">
					<img src="images/header.png" link="index.php" width="100%" height="auto">
			</div>
					<div class="GarisKepala"></div>
				<div id="konten">
					<div id="kontenkiri">
						<table border="0"  style="margin-left:300px;">
								<tr>
									<td>
										<h3 style="margin:3%;">Kontak Kami</h3>
									</td>
								</tr>
						</table>
						
						<form action='proses_pesan.php' method='post'>
							<table style="margin:3%;" border=0 cellpadding=10 cellspacing=10>
								<tr><td>Nama</td><td>:</td><td><input type='text' size="40%" name='nama'></td></tr>
								<tr><td>Email</td><td>:</td><td><input type='text' name='email'></td></tr>
								<tr><td>Subjek</td><td>:</td><td><input type='text' name='subjek'></td></tr>
								<tr><td>Pesan</td><td>:</td><td><textarea name='pesan' cols='10' rows='50'></textarea></td></tr>
								<tr><td></td><td></td><td colspan=3><input type='submit' value='KIRIM'></td></tr>
								
							</table>
						</form>
						
						<table border="0" class="yahoo">
								<tr>
									<td>
										<a href="ymsgr:sendIM?romadhon.byar"> <img src="http://opi.yahoo.com/online?u=romadhon.byar&amp;m=g&amp;t=1&amp;l=us"/>
									</td>
									<td>
										 Ahmad Romadhon
									</td>
								</tr>
								
								<tr>
									<td>
										<a href="ymsgr:sendIM?hanna"> <img src="http://opi.yahoo.com/online?u=hanna&amp;m=g&amp;t=1&amp;l=us"/>
									</td>
									<td>
										 Hanna Zulia Rahma
									</td>
								</tr>
						</table>
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