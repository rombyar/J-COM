<?php
	require_once "../../elemen/functions.php";
?>

<html>
	<head>
		<title>Menu Super Admin</title>
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
							<u><a href="sa_profil.php">
							<?php
							//memulai session
							#session_start();

							//cek adanya session
							if(isset($_SESSION['username']))
							{
								if ($_SESSION['jabatan'] == "Super Admin")
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
						<img src="../../images/header-admin.png" href="../../index.php" width="100%" height="auto">
					</div>
						<div class="GarisKepala"></div>