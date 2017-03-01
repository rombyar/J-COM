<ul class="top-level" style="margin:3%;">
	<?php
		include "koneksi/koneksi_db.php";
	?>
	<?php 
	#error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); 
	$kat = mysql_query("SELECT kategori, kategori.id_barang_kategori from kategori join tb_barang on tb_barang.id_barang_kategori=kategori.id_barang_kategori group by kategori")or die(mysql_error());
		while($list=mysql_fetch_array($kat)){
			echo"<li><a href='produk.php?cat=$list[id_barang_kategori]'>$list[kategori]</a></li>";
		}
	?>
	<li><a href='publik_cara_pesan.php'>CARA PESAN</a></li>
	<?php if(isset($_SESSION['username'])) {if (isset($_SESSION['akses']) == "User") {echo "<li><a href='user_menu.php'>MENU PELANGGAN</a></li>";}else{echo "";}}else{echo "";}?>
</ul>
