<?php
 function cekTypeImageUpload($tipe_file){
	   $hasil = 0;  // kondisikan terlebih dahulu kalau image benar
	   $tipe  = $tipe_file;
	   if ($tipe !="image/jpeg" && $tipe !="image/jpg" && $tipe !="image/JPG" && $tipe !="image/gif" && $tipe !="image/png") {
		  $hasil = 1; // kondisi image salah
	   }
	   return $hasil;
 }
?> 