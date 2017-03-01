<html>
	<head>
		<title>Beranda</title>
<?php 
	include "elemen/kepala-user.php";
	include "koneksi/koneksi_db.php";
?>
			<div id="header">
				<img src="images/header.png" link="index.php" width="100%" height="auto">
			</div>
					<div class="GarisKepala"></div>
				<div id="konten">
					<div id="kontenkiriIndexU">
						<!-- Accordion Featured Post Slider @TipsTrikBlogging.com -->
						<div id="tbi_slider">
						<ul>
						<li>
						<div id="tbi_title">
						<a href="POST LINK">TITLE</a>
						</div>
						<a href="POST LINK">
						<img src="images/example/001.jpg" height="100%"/>
						</a>
						</li>
						<li>
						<div id="tbi_title">
						<a href="POST LINK">TITLE</a>
						</div>
						<a href="POST LINK">
						<img src="images/example/002.jpg" height="100%"/>
						</a>
						</li>
						<li>
						<div id="tbi_title">
						<a href="POST LINK">TITLE</a>
						</div>
						<a href="POST LINK">
						<img src="images/example/003.jpg" height="100%"/>
						</a>
						</li>
						<li>
						<div id="tbi_title">
						<a href="POST LINK">TITLE</a>
						</div>
						<a href="POST LINK">
						<img src="images/example/004.jpg" height="100%"/>
						</a>
						</li>
						<li>
						<div id="tbi_title">
						<a href="POST LINK">TITLE</a>
						</div>
						<a href="POST LINK">
						<img src="images/example/001.jpg" height="100%"/>
						</a>
						</li>
						</ul>
						</div>
						<!-- Accordion Featured Post Slider @TipsTrikBlogging.com --> 
					</div>
					<div class="kontenkananIndexU Navigasi" style="font-size:15px;">
						<?php include "elemen/navigasi.php";?>
					</div>
				</div>
				
				
					<div class="kontenIndex2">
						<h3 class="h3Index" style="color:#333333;">Pilihan Produk</h3>
						<div style="height:50%;width:100%;overflow:none;overflow-y:scroll;">
							<?php
							$q=mysql_query("SELECT * FROM tb_barang ORDER BY id_barang DESC")or die(mysql_error());
							?>
							
							<table style="margin-left:2%"  border="0px" >
								<tr>
								<?php
									$jml_colom=8;
									$cnt = 0;
									while($data=mysql_fetch_object($q))
									{
										if ($cnt >= $jml_colom) 
										{
											  echo "</tr><tr>";
											  $cnt = 0;
										}
										$cnt++;
								?>
									 <td align=center style="margin-right:2%;" >
										<div class="row">
											<div class="col-md-11">
												<ul class="hoverbox" >
													<li>
														<h3 style="font-size:14px;" ><?php echo $data->nama_barang; ?></h3>
															<a href="produk.php?id_barang=<?php echo $data->id_barang; ?>">
																<img title="<?php echo $data->nama_barang; ?>" class="FotoProduk" src="images/foto/<?php echo $data->foto_barang; ?>" alt="Produk Laptop, Komputer dan Aksesoris Komputer"/>
															</a>
															
															<p><?php #echo $data->deskripsi_barang; ?></p>
															<p ><a class="pesanprod btn btn-primary" role="button" href="input.php?input=add&id_barang=<?php echo $data->id_barang; ?>&foto_barang=<?php echo $data->foto_barang; ?>">Pesan</a>
															<a class="detprod btn btn btn-default" role="button" href="produk.php?id_barang=<?php echo $data->id_barang; ?>">Detail</a></p>
													</li>
												</ul>
											</div>
										</div>
									 </td>
								<?php
								}
								?>
								</tr>
							</table>
						</div>
						<div>
							<p style="color:white;">.</P>
						</div>
					</div>
<?php
	include "elemen/kaki.php";
?>
		<p align=center><img src="images/g.gif" align="center"  alt="Smile" title="Smile"></p>	
	</body>
</html>