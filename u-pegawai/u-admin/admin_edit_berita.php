<?php
	include "../../koneksi/koneksi_db.php";

	if(isset($_POST['posting'])=='POSTING'){  // Jike Request POST di terima

		// Query SQL untuk Update Data
		$simpan_sql = "UPDATE tb_berita SET username= '".$_POST['username']."',judul_berita= '".$_POST['judul_berita']."', isi_berita = '".$_POST['isi_berita']."' WHERE id_berita = ".$_POST['id_berita'];
		$simpan_que = mysql_query($simpan_sql);

		if($simpan_que){  // Jika Update Sukses maka tampilkan pesan.
			echo"<script>window.alert('Update Berita Sukses!');
						window.location=('admin_menu.php')</script>";
		}
		else{  // Jika Update Gagal maka tampilkan pesan.
			echo"<script>window.alert('Update Berita Gagal!');
						window.location=('admin_menu.php')</script>";
		}
	}

	if($_GET['id_berita'] !=''){ // Jika Request GET di terima
		// Nah disini sekalian sebagai fungsi untuk menampilkan data yang akan di Edit
		$edit_sql = 'select * from tb_berita where id_berita='.$_GET['id_berita'];  ////SQL QUERY untuk mengambil data berdasarkan ID
		$edit_que = mysql_query($edit_sql);
		$edit = mysql_fetch_array($edit_que);   
	}
?>


<?php
	include "elemen/kepala-admin.php";
?>
			<div id="kontenSAPE">
				<div class="easyui-tabs" style="width:auto;height:auto;">
					<div title="Edit Berita"  style="padding:10px;">
						<div id="PosBerita">
							<form CELLSPACING="5px" name="berita" action="" method="post" onSubmit="return validasiBerita()">
								<h3 class="h3Index">FORM EDIT BERITA</h3>
									<label>Judul</label>
									<input type="hidden" name="id_berita" value="<?php echo $edit['id_berita'];?>" size="30%"  placeholder="Id Berita"/>
									<input type="text" name="judul_berita" value="<?php echo $edit['judul_berita'];?>" size="30%"  placeholder="Judul Berita" maxlength="200" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ',this)"  />
									<input type="hidden" name="username" readonly="readonly" size="30%"  
									value="<?php
											if(isset($_SESSION['username'])){
											echo $_SESSION['username'];	
											}																	
											?>" />
									<label>Berita</label>
									<textarea id="editor1" name="isi_berita" rows="10" cols="100"><?php echo $edit['isi_berita'];?></textarea>
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
					</div>
				</div>
			</div>	
			<?php
				include "../../elemen/kaki.php";
			?>
		<p align=center><img src="../../images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>









