<?php
	ob_start();
	require_once "../../elemen/functions.php";
?>
<html>
	<head>
		<title>Menu CS</title>
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
			
			<!--Java Script Navigasi Menu
			<!--<script type="text/javascript" src="jquery-1.9.1.min.js" charset="utf-8"></script>-->
			<script language="JavaScript" type="text/JavaScript">
			function showMerek()
			 {
			 <?php

			 // membaca semua kategori
			 $query = "SELECT * FROM tb_barang_kategori";
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
				<script type="text/javascript" charset="utf-8">
				  $(document).ready(function(){
					$('#datatables2').dataTable({
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
					$('#datatables3').dataTable({
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
					$('#datatables4').dataTable({
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
			<!--Tabel JQuery-->
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
						<u><a href="cs_profil.php">
						<?php
							if(isset($_SESSION['username']))
							{
								if ($_SESSION['jabatan'] == "CS")
								{
									echo $_SESSION['username'];									
								}
								else
								{
									header("location: ../pegawai_login.php");
								}
								//jika tidak ada session
							}else{
								header("location: ../pegawai_login.php");
							}
							?>
						</a></u>|<u><a href="../pegawai_logout.php">Logout</a></u>|<u><a href="../../publik_bantuan.php">Bantuan</a></u>
					</div>
				</ul>
			</div>
					<div id="header">
						<img src="../../images/header-Pegawai.png" href="../../index.php" width="100%" height="auto">
					</div>
						<div class="GarisKepala"></div>