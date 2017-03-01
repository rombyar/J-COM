<html>
	<head>
		<title>Berita</title>
<?php
	include "elemen/kepala-user.php";
	include "koneksi/koneksi_db.php";
?>
			<div id="header">
					<img src="images/header.png" width="100%" height="auto">
			</div>
					<div class="GarisKepala"></div>
				<div id="konten">
					<div id="kontenkananBerita">
						<div style="height:92%;width:100%;overflow:none;overflow-y:scroll;margin-top:2%;">
							<?php
								error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

								//buat query terlebih dahulu
								$query = mysql_query("SELECT * FROM tb_berita ORDER BY judul_berita DESC");

								//cek apakah kita sudah memposting artikel atau belum
								if (mysql_num_rows($query) == 0) 
								{
									//tampilkan pesan kalau artikel belum ada
									echo '<table id="tableBerita" border="0" >';
									echo '<tr><td><p><strong>Maaf, belum ada berita yang dipublikasikan ...</strong></p></td></tr>';
									echo '</table>';
								} 
								else 
								{
									while ($data = mysql_fetch_array($query)) 
									{
										echo '<table id="tableBerita" border="0" >';
										echo '<tr><td><p><h2>'.$data['judul_berita'].'</h2></p></td></tr>';
										echo '<tr><td><span style="text-indent:3em;line-height:1,5em;" align="justify" style="font-size:15px">'.$data['isi_berita'].'</span></td></tr>';
										echo '<tr><td><p align="justify" style="font-size:10px">oleh: '.$data['username'].' - '.date('j, F Y',strtotime($data['tgl_berita'])).'</p></td></tr>';
										echo '</table>';
									}
								}
								mysql_close();
							?>
						</div>
					</div>
				</div>
			<?php
				include "elemen/kaki.php";
			?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>