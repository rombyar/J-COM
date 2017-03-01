<?php
	include "../../koneksi/koneksi_db.php";
	require_once "../../elemen/functions.php";
	ob_start();
?>
<?php
	if(isset($_SESSION['username']))
	{
		if ($_SESSION['jabatan'] == "Admin")
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

<html>
	<head>
		<title>Menu Admin</title>
			<link rel="stylesheet" type="text/css" href="../../css/gaya-1.css"/>
			<link href="../../images/Computer1.png" rel="SHORTCUT ICON">
			<script type="text/javascript" src="../../js/twd-menu.js" charset="utf-8"></script>
			
			<!--Java Script Validasi Form-->
			<script type="text/javascript" src="../../js/validasi.js" ></script>
			
			<!--Java Script dan CSS Menu Tab-->
			<link rel="stylesheet" type="text/css" href="../../css/easyui.css">
			<link rel="stylesheet" type="text/css" href="../../css/icon.css">
			<script type="text/javascript" src="../../js/jquery-1.6.1.min.js"></script>
			<script type="text/javascript" src="../../js/jquery.easyui.min.js"></script>

			<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
			<link href="ckeditor/content.css" rel="stylesheet" type="text/css"/>
			
			<!--Java Script Navigasi Menu
			<!--<script type="text/javascript" src="jquery-1.9.1.min.js" charset="utf-8"></script>-->
			<script language="JavaScript" type="text/JavaScript">
			function showMerek()
			 {
			 <?php

			 // membaca semua kategori
			 $query = "SELECT * FROM kategori";
			 $hasil = mysql_query($query);
			 
			 // membuat if untuk masing-masing pilihan kategori beserta isi option untuk combobox kedua
			 while ($data = mysql_fetch_array($hasil))
			 {
			   $id_barang_kategori = $data['id_barang_kategori'];

			   // membuat IF untuk masing-masing kategori
			   echo "if (document.formulir_barang.kategori.value == \"".$id_barang_kategori."\")";
			   echo "{";

			   // membuat option merek untuk masing-masing kategori
			   $query2 = "SELECT * FROM tb_barang_merek WHERE id_barang_kategori = $id_barang_kategori";
			   $hasil2 = mysql_query($query2);
			   $content = "document.getElementById('merek').innerHTML = \"";
			   while ($data2 = mysql_fetch_array($hasil2))
			   {
				   $content .= "<option value='".$data2['nama_merek']."'>".$data2['nama_merek']."</option>";   
			   }
			   $content .= "\"";
			   echo $content;
			   echo "}\n";   
			 }

			 ?> 
			 }</script>			
			 
			 <!--Tabel JQuery-->
				<style type="text/css">
				@import "../../media/css/demo_table_jui.css";
				@import "../../media/themes/sunny/jquery-ui.css";
				</style>
				<script src="../../media/js/jquery.js"></script>
				<script src="../../media/js/jquery.dataTables.js"></script>
				<script type="text/javascript" charset="utf-8">
				  $(document).ready(function(){
					$('#datatables').dataTable({
								 "oLanguage": {
									  "sLengthMenu": "Tampilkan _MENU_ data per halaman",
									  "sSearch": "Pencarian: ", 
									  "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
									  "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
									  "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
									  "sInfoFiltered": "(di filter dari _MAX_ total data)",
									  "oPaginate": {
										  "sFirst": "<<",
										  "sLast": ">>", 
										  "sPrevious": "<", 
										  "sNext": ">"
								   }
							  },
					  "sPaginationType":"full_numbers",
					  "bJQueryUI":true
					});
				  })    
				</script>				
				<script type="text/javascript" charset="utf-8">
				  $(document).ready(function(){
					$('#datatables1').dataTable({
								 "oLanguage": {
									  "sLengthMenu": "Tampilkan _MENU_ data per halaman",
									  "sSearch": "Pencarian: ", 
									  "sZeroRecords": "Maaf, tidak ada data yang ditemukan",
									  "sInfo": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
									  "sInfoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
									  "sInfoFiltered": "(di filter dari _MAX_ total data)",
									  "oPaginate": {
										  "sFirst": "<<",
										  "sLast": ">>", 
										  "sPrevious": "<", 
										  "sNext": ">"
								   }
							  },
					  "sPaginationType":"full_numbers",
					  "bJQueryUI":true
					});
				  })    
				</script>

	</head>
		<body>
			<div id="wraf">
				<div id="twd-menu" >
					<ul >
						<li><a href="../../index.php">Home</a></li>
						<li><a href="../../publik_tentang.php">Tentang</a></li>
						<li><a href="../../publik_berita.php">Berita</a></li>
						<li><a href="../../publik_kontak.php">Kontak</a></li>
						<div class="nvskanan">
							<u><a href="admin_profil.php">
							<?php
							//memulai session


							//cek adanya session
							if(isset($_SESSION['username']))
							{
								if ($_SESSION['jabatan'] == "Admin")
								{
									echo $_SESSION['username'];									
								}
								else
								{
									header("location: ../pegawai_login.php");
								}
								//jika tidak ada session
							}else
							{
								header("location: ../pegawai_login.php");
							}
							?>
							</a></u>|<u><a href="../pegawai_logout.php">Logout</a></u>|<u><a href="../../publik_bantuan.php">Bantuan</a></u>
						</div>
					</ul>
				</div>
					<div id="header">
						<img src="../../images/header-admin.png" href="../../index.php" width="100%" height="auto">
					</div>
					<div class="GarisKepala"></div>
					<div id="kontenSAPE">							
					
					    <div class="easyui-tabs" style="width:auto;height:auto;">
							<div title="Awalan" style="padding:10px;">
								<div id="PosBerita">
									<h3 class="h3Index">INFO ADMIN</h3>
										<?php
											#include "cek.php";
										?>
			
										<?php
											$data_berita=mysql_query("select * from tb_berita");
											$jumlah_berita=mysql_num_rows($data_berita);
											
											$data_barang=mysql_query("select * from tb_barang");
											$jumlah_barang=mysql_num_rows($data_barang);
											
											if(!$pilih_db)
											{
												echo"<table class='tableMenu' border=0>
														<tr>
															<td>Database</td>
															<td>:</td>
															<td><b style='color:red;>Tidak dapat diakses.</b></td>
														</tr>
														<tr>
															<td>Jumlah Berita</td>
															<td>:</td>
															<td><b>$jumlah_berita</b> Berita.</td>
														</tr>
														<tr>
															<td>Jumlah Barang</td>
															<td>:</td>
															<td><b>$jumlah_barang</b> Barang.</td>
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
															<td>Jumlah Berita</td>
															<td>:</td>
															<td><b>$jumlah_berita</b> Berita.</td>
														</tr>
														<tr>
															<td>Jumlah Barang</td>
															<td>:</td>
															<td><b>$jumlah_barang</b> Barang.</td>
														</tr>
													</table>";
											}
										?>
										
										
								</div>
							</div>

							<div title="Buat Berita"  style="padding:10px;">
									<div id="PosBerita">
										<h3 class="h3Index">Buat Berita (<a href="#BantuanBuatBerita" title="Bantuan Buat Berita" onclick="open_new()">?</a>)</h3>
										<script>function open_new(){var newW=window.open("","","width=350px,height=130%");newW.document.write("<u><b style='font-size:20px;'>Bantuan Buat Berita</b></u><br>- Buatlah berita dengan baik dan benar.<br>- Buatlah berita dengan tulisan yang komunikatif.<br>- Buatlah berita se-kreatif mungkin.<br>- Periksa kembali ejaan tulisan sebelum di publikasikan.");}</script>
											<form name="berita" action="" method="post" onSubmit="return validasiBerita()">
												<label>Judul</label>
													<input type="text" name="judul_berita" size="30%"  placeholder="Judul Berita" maxlength="200" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"  />
													<input type="hidden" name="username" readonly="readonly" size="30%"  
													value="<?php
															if(isset($_SESSION['username'])){
															echo $_SESSION['username'];	
															}																	
															?>" />
												<label>Berita</label>
													<textarea id="editor1" name="isi_berita" rows="10" cols="100"></textarea>
													<table border="0">
														<tr>
															<td colspan="3"><input type="submit" name="posting" width="100%" value="POSTING" class="tombol"/></td>
														</tr>
													</table>
											</form>
											<script type="text/javascript">
											if ( typeof CKEDITOR == 'undefined' )
											{
												document.write(
												'CKEditor not found');
											}
											else
											{
												var editor = CKEDITOR.replace( 'editor1' );	
												CKFinder.setupCKEditor( editor, '' ) ;
											}
											</script>
									</div>
									<?php
									if(isset($_POST['posting']))
									{
										$username = $_POST['username'];
										$judul_berita = $_POST['judul_berita'];
										$isi_berita = $_POST['isi_berita'];
										
										$tgl = date('Y-m-d');
										$q=mysql_query("Insert into tb_berita VALUES ('','$username','$judul_berita','$isi_berita','$tgl')") or die(mysql_error());
										if($q)
										{
											echo "<script language=\"Javascript\">\n";
										    echo "confirmed = window.confirm('Berita berhasil dipublikasikan. Apakah Anda mau melihat beritanya?');";
											echo "if (confirmed)";
											echo "{";
									        echo "window.location = '../../publik_berita.php';";
									        echo "}";
									        echo "else ";
									        echo "{";
									        echo "window.location = 'admin_menu.php';";
									        echo "}";
									        echo "</script>";
										}
										else
										{
											echo "<script language=\"Javascript\">\n";
										    echo "confirmed = window.confirm('Berita gagal dipublikasikan. Apakah Anda ingin mengulangi?');";
											echo "if (confirmed)";
											echo "{";
									        echo "window.location = 'admin_menu.php';";
									        echo "}";
									        echo "else ";
									        echo "{";
									        echo "window.location = 'admin_menu.php';";
									        echo "}";
									        echo "</script>";
										}
									} 
									?>
							</div>
							
							<div title="Data Berita" style="padding:10px;">
								<div id="kontenSAPE">
									<h3 class="h3Index">TABEL DATA BERITA (<a href="#BantuanTabelDataBerita" title="Bantuan Tabel Data Berita" onclick="open_new1()">?</a>)</h3>
										<script>function open_new1(){var newW=window.open("","","width=390px,height=100%");newW.document.write("<u><b style='font-size:20px;'>Bantuan Tabel Data Berita</b></u><br>- Pada tabel ini Anda dapat mengubah dan menghapus berita.<br>- Gunakan hak sesuai aturan.");}</script>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables1" class="display">
											<thead>
												<th>No.Berita</th>
												<th>Judul</th>
												<th>Berita</th>
												<th>Aksi</th>
											</thead>
											<tbody>
												<?php
													$sql = mysql_query("select * from tb_berita");
													$no = 1;
													while ($r = mysql_fetch_array($sql)) {
													  echo "<tr>
															<td>$r[id_berita]</td>
															<td>$r[judul_berita]</td>
															<td>$r[isi_berita]</td>
															<td><a href='hapus.php?id_berita=$r[id_berita]'>HAPUS</a> - <a href='admin_edit_berita.php?id_berita=$r[id_berita]'>EDIT</a></td>
															</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>
								</div>	
							</div>
							
							<div title="Tambah Barang"  style="padding:10px;">
								<div id="kontenSAPE">
										<form CELLSPACING="5px" enctype="multipart/form-data" name="formulir_barang" action="admin_proses_barang.php" method="post" onSubmit="return validasiBarang()">
											<h3 class="h3Index">TAMBAH DATA BARANG (<a href="#BantuanTambahBarang" title="Bantuan Tambah Barang" onclick="open_new2()">?</a>)</h3>
									<script>function open_new2(){var newW=window.open("","","width=390px,height=140%");newW.document.write("<u><b style='font-size:20px;'>Bantuan Tambah Barang</b></u><br>- 101 = Laptop<br>- 102 = Komputer<br>- 103 = Komponen Komputer<br>- 104 = Aksesoris Komputer<br>- Gunakan hak sesuai aturan.");}</script>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
											<table style="margin-top:-0.5%;" class='tableMenu' border="0" CELLSPACING="5px">
												<tr>
													<td>Kode Kategori</td><td>:</td>
													<td colspan="3" >
														<select class="inputS" style="color:#999;" name="kategori" onchange="showMerek()">
														<option value="" > -Pilih- </option>
														<?php
															// query untuk menampilkan kategori
															$query = "SELECT * FROM kategori";
															$hasil = mysql_query($query);
															while ($data = mysql_fetch_array($hasil))
															{
																echo "<option value='".$data['id_barang_kategori']."'>".$data['id_barang_kategori']."</option>";
															}
														?>
														</select>
													</td>	  
												</tr>
												<tr><td>Merek</td><td>:</td>
													  <td colspan="3" >
													  <select  class="inputS" style="color:#999;" name="merek" id="merek">
													  <option value="" > -Pilih- </option>
													  </select>
													  </td>	   
												</tr>
												<input type="hidden" name="username" readonly="readonly" size="30%"  
													value="<?php if(isset($_SESSION['username'])){ echo $_SESSION['username'];}	?>"/>
												</tr>
												<tr>
													<td>Nama Barang </td>
													<td>: </td>
													<td colspan="3" ><input type="text" name="nama_barang" size="30%"  placeholder="Nama Barang" maxlength="100" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789- ',this)"/></td>
												</tr>
												<tr>
													<td>Harga </td>
													<td>: </td>
													<td colspan="3" ><input type="text" name="harga_barang" size="30%"  placeholder="Harga Barang" maxlength="10" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
												</tr>
												<tr>
													<td>Stok </td>
													<td>: </td>
													<td colspan="3" ><input type="text" name="stok_barang" size="30%"  placeholder="Stok Barang" maxlength="50" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
												</tr>
												<tr>
													<td>Foto</td>
													<td>:</td>
													<td colspan="3" >
													<input type="hidden" name="MAX_FILE_SIZE" value="100000">
													<input type="file" multiple accept="image/gif,image/jpeg,image/jpg,image/png" name="gambar" style="font-size:13;"/></td>
												</tr>
											</table>
											<label>Deskripsi Barang</label>
											<textarea id="editor2" name="deskripsi_barang" placeholder="Deskripsi Barang" rows="10" cols="100"></textarea>
											<input type="submit" value="Kirim" class="tombol"/>
										</form>
										<script type="text/javascript">
										if ( typeof CKEDITOR == 'undefined' )
										{
											document.write(
											'CKEditor not found');
										}
										else
										{
											var editor = CKEDITOR.replace( 'editor2' );	
											CKFinder.setupCKEditor( editor, '' ) ;
										}
										</script>
									</div>
								</div>
							</div>
							
							<div title="Data Barang" style="padding:10px;">
								<div id="kontenSAPE">
									<h3 class="h3Index">TABEL DATA BARANG (<a href="#BantuanDataBarang" title="Bantuan Data Barang" onclick="open_new3()">?</a>)</h3>
									<script>function open_new3(){var newW=window.open("","","width=390px,height=160%");newW.document.write("<u><b style='font-size:20px;'>Bantuan Tambah Barang</b></u><br>- 101 = Laptop<br>- 102 = Komputer<br>- 103 = Aksesoris Komputer<br>- 104 = Komponen Komputer<br>- Gunakan hak sesuai aturan.<br>- Anda dapat mengubah data barang jika terjadi kesalahan.");}</script>
									<div style='height:85%;width:100%;overflow:none;overflow-y:scroll;'>
										<table id="datatables" class="display">
											<thead>
												<th>Kode Kategori</th>
												<th>Nama</th>
												<th>Merek</th>
												<th>Harga</th>
												<th>Deskripsi</th>
												<th>Stok</th>
												<th>Foto</th>
												<th>Aksi</th>
											</thead>
											<tbody>
												<?php
															$sql = mysql_query("select * from tb_barang");
															$no = 1;
													while ($r = mysql_fetch_array($sql)) 
													{
														#Format Uang
														$uang1=$r['harga_barang'];
														$uang=number_format($uang1,0,",",".");
														echo "<tr>
																<td>$r[id_barang_kategori]</td>
																<td>$r[nama_barang]</td>
																<td>$r[merek_barang]</td>
																<td>Rp.$uang</td>
																<td>$r[deskripsi_barang]</td>
																<td>$r[stok_barang] Buah</td>
																<td><img  width='50' height='50' src='../../images/foto/$r[foto_barang]' border='0'/></td>
																<td><a href='admin_edit_barang.php?update=edit&id_barang=$r[id_barang]'>Edit</a></td>
																</tr>";
													}                    
												?>
											</tbody>
										</table>
									</div>
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