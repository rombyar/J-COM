<?php
	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$subjek=$_POST['subjek'];
	$pesan=$_POST['pesan'];$to="romadhon1byar@gmail.com";
	$header="From: $email";@mail($to, $subjek, $pesan, $header);
	echo"<script>window.alert('Terima Kasih, kami akan secepatnya menjawab pertanyaan Anda.');
		window.location=('publik_kontak.php')</script>";
?>