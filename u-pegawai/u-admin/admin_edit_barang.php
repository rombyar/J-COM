<?php
	include "elemen/kepala-admin.php";
	include "../../koneksi/koneksi_db.php";
?>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<link href="../ckeditor/content.css" rel="stylesheet" type="text/css"/>
					<div id="kontenSAPE">							
					
					    <div class="easyui-tabs" style="width:auto;height:auto;">
							
							<div title="Edit Barang"  style="padding:10px;">
								<div id="PosBerita">
									<form CELLSPACING="5px" enctype="multipart/form-data" name="formulir_barang" action="admin_proses_edit_barang.php" method="post" onSubmit="return validasiBarang()">
										<h3 class="h3Index">TAMBAH DATA BARANG</h3>
											<table class='tableMenu' style="margin-top:-1%;" border="0" CELLSPACING="5px">
												<?php
													include "../../koneksi/koneksi_db.php";
													error_reporting(0);
													$update=$_GET[update];
													if($update=='edit')
													{
														$query="select * from tb_barang where id_barang='$_GET[id_barang]'";
														$result=mysql_query($query);
														$row=mysql_fetch_array($result);
													}
												?>
												<input name="id_barang" type="hidden" value="<?php echo $_GET['id_barang'];?>"/>
													
													<input type="hidden" name="username" readonly="readonly" size="30%"  
														value="<?php
																//memulai session

																//cek adanya session
																if(isset($_SESSION['username'])){
																//if (ISSET($_SESSION['username'])){
																#echo "Anda Login Sebagai ";
																echo $_SESSION['username'];	
																}																	
																?>"/>
													
													<tr>
														<td>Nama Barang </td>
														<td>: </td>
														<td colspan="3" ><input type="text" value="<?php echo $row['nama_barang'];?>" name="nama_barang" size="30%"  placeholder="Nama Barang" maxlength="100" onKeyPress="return goodchars(event,'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789- ',this)"/></td>
													</tr>
													
													<tr>
														<td>Harga </td>
														<td>: </td>
														<td colspan="3" ><input type="text" name="harga_barang" value="<?php echo $row['harga_barang'];?>" size="30%"  placeholder="Harga Barang" maxlength="8" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
													</tr>
													
													<tr>
														<td>Stok </td>
														<td>: </td>
														<td colspan="3" ><input type="text" name="stok_barang" value="<?php echo $row['stok_barang'];?>" size="30%"  placeholder="Stok Barang" maxlength="50" onKeyPress="return goodchars(event,'0123456789',this)" /></td>
													</tr>
											</table>
											<br>
										<label>Deskripsi Barang</label>
										<textarea id="editor2" name="deskripsi_barang" placeholder="Deskripsi Barang" rows="10" cols="100"><?php echo $row['deskripsi_barang'];?></textarea>
										<input type="submit" value="Simpan" name="simpan" class="tombol" width="100%"/>
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
					</div>	
<?php
	include "../../elemen/kaki.php";
?>
		<p align=center><img src="../../images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>