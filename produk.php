<html>
	<head>
		<title>Produk</title>
			
<?php 
	include "elemen/kepala-user.php";
	include "koneksi/koneksi_db.php";
?>
			<div id="header">
				<img src="images/header.png" link="index.php" width="100%" height="auto">
			</div>
					<div class="GarisKepala"></div>

				<div id="konten">
					<div id="kontenkiriIndex">
						<?php
							//if($_GET['id_barang'] && $_GET['cat']){
								error_reporting(0);
							$prod = $_GET['id_barang'];
							$cat = $_GET['cat'];
							//}
								
							if($cat){
							$sql = mysql_query("SELECT * FROM kategori WHERE id_barang_kategori = '$cat'")or die (mysql_error());
							$jdl = mysql_fetch_array($sql);
							echo "
								<table border='0' style='margin-top:2%;margin-left:3%;margin-bottom:1%;'>
									<tr>
										<td>
											<h3>Kategori : $jdl[kategori]</h3>
										</td>
									</tr>
								</table>
								<div style='height:80%;width:100%;overflow:none;overflow-y:scroll;'>
								";
					
								$sql2 = mysql_query("SELECT * FROM tb_barang WHERE id_barang_kategori='$cat'") or die (mysql_error());
								while($t = mysql_fetch_array($sql2) )
								{ ?>
									<div class="produk">
										<table class="hoverbox" style="margin-left:4%" border="0">
											<tr>
												<td colspan="2">
													<a href="produk.php?id_barang=<?php echo $t['id_barang']; ?>">
														<img title="<?php echo $t['nama_barang']; ?>" class="FotoProduk" src="images/foto/<?php echo $t['foto_barang']; ?>" height="110px" width="100" />
													</a>
												</td>
											</tr>
											<tr>
												<td align="center"><a class="pesanprod" href="input.php?input=add&id_barang=<?php echo $t['id_barang']; ?>">Pesan</a></td>
												<td align="center"><a class="detprod" href="produk.php?id_barang=<?php echo $t['id_barang']; ?>">Detail</a></td>
											</tr>
										</table>
									</div>
							
						
							<?php	
								}
							echo "</div>";
							}
							
							else if($prod)
							{ 
							?>
							<?php

								$sql = mysql_query("SELECT * FROM tb_barang WHERE id_barang='$prod'");
								$d = mysql_fetch_array($sql);
								?>
									<div >
										<table border="0" style='margin:2%;'>
											<tr>
												<td>
													<ul class="hoverbox" >
														<li>
															<h3 style="font-size:14px;" align="center"><?php echo $d['nama_barang']; ?></h3>
															<div class="KetProd">
																<img class="GambarKetProd" src="images/foto/<?php echo $d['foto_barang']; ?>">
																<?php #echo $d['deskripsi_barang']; ?>
															</div>
															<a class="haha" href="javascript:history.go(-1)">Back</a> | <a class="haha" href="input.php?input=add&id_barang=<?php echo $d['id_barang']; ?>&foto_barang=<?php echo $d['foto_barang']; ?>">Beli</a>	
														</li>
													</ul>
												</td>
												<td>
													<span align="justify"><b>Harga: </b>Rp.
															<?php
																#Format Uang
																$uang1=$d['harga_barang'];
																$uang=number_format($uang1,0,",",".");
																echo $uang; 
															?></span>
															<br>
													<span align="justify"><?php echo $d['deskripsi_barang']; ?></span>
												</td>
											</tr>
										</table>
									</div>
							<?php } ?>
					</div>

					<div class="kontenkananIndex Navigasi" style="font-size:15px;">
						<?php include "elemen/navigasi.php";?>
					</div>
				</div>
<?php
	include "elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>
