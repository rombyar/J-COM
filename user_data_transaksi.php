<?php
	session_start();
	error_reporting(0);
	
	$input=$_GET[input];
	
	if($input=='add')
	{
		$no = $_GET['no_pemesanan'];
		include "koneksi/koneksi_db.php";
		//Queri untuk Menampilkan data
		$query = "select no_pemesanan, nama_pelanggan, username, bank_tujuan, rekening_bank, total_barang, total_harga_barang, tanggal_pesan, jam_pesan
				  from tb_detail_pemesanan tk join (Select no_pemesanan, SUM(qty) as total_barang from tb_pemesanan Group by no_pemesanan) 
				  tb using (no_pemesanan) where no_pemesanan='$no' and status_pemesanan='Menunggu Pembayaran'";
		$db_query = mysql_query($query) or die(mysql_error());
		//Variabel untuk iterasi
		$i = 0;
		
		//Mengambil nilai dari query database
		
		while($data=mysql_fetch_row($db_query))
		{
			$cell[$i][0] = $data[0];
			$cell[$i][1] = $data[1];
			$cell[$i][2] = $data[2];
			$cell[$i][3] = $data[3];
			$cell[$i][4] = $data[4];
			$cell[$i][5] = $data[5];
			$cell[$i][6] = $data[6];
			$cell[$i][7] = $data[7];
			$cell[$i][8] = $data[8];
			$i++;
		}
		
		require('fpdf17/fpdf.php');

		class PDF extends FPDF
		{

			//Fungsi Untuk Membuat Header
			function Header()
			{
				
				$this->SetFont('Arial','',8.5);
				$this->Text(23.4,2.9,'Email: bill@j.com Telp: (021)84991484,','C');
				$this->Text(23.4,3.3,'Fax (021)84991484 SMS +628978596665','C');
				$this->Text(23.4,3.7,'http://www.jcom.bl.ee/','C');
				$this->SetFont('','U');
				$this->Cell(80);
				$this->SetTitle('Data Pemesanan');
				$this->Image('images/logo.png',1,2,5);
				$this->Ln(3);
			}

			//Fungsi Untuk Membuat Footer
			function Footer()
			{
				//Position at 1.5 cm from bottom
				$this->SetY(-15);
				//Arial italic 8
				$this->SetFont('Arial','I',8);
				$this->Text(1,19.3,'J-Com Division of HarCamp Main Office: Jl. Proklamasi 99 Jakarta Timur 17415.','C');
				$this->Text(1,19.6,'Ph: (021) 666585 Fax: 0274 387703 Rep. Office: Graha HarCamp, Jl. Mampang Prapatan 66 Jakarta Pusat 12733.','C');
				$this->Text(1,19.9,'Ph: (021) 77878155 Fax: 021 7912127 Email: info@j.com Facebook: http://www.facebook.com/j.com','C');
				//Page number
				#$this->Cell(0,27,'Halaman ke : '.$this->PageNo(),0,0,'C');
			}
		}

		$pdf = new PDF('L','cm','A4');
		$pdf->Open();
		
		$pdf->AddPage();
		$pdf->SetFont("Arial","B",10);
		$pdf->Cell(28,1,'Data Pemesanan Anda','LRTB',0,'C');
		$pdf->Ln();
		$pdf->Cell(1,1,'No.','LRTB',0,'C');
		$pdf->Cell(3,1,'No.Pemesanan','LRTB',0,'C');
		$pdf->Cell(3,1,'Nama','LRTB',0,'C');
		$pdf->Cell(3,1,'Username','LRTB',0,'C');
		$pdf->Cell(3,1,'Bank Tujuan','LRTB',0,'C');
		$pdf->Cell(3,1,'Rekening Bank','LRTB',0,'C');
		$pdf->Cell(3,1,'Jumlah Barang','LRTB',0,'C');
		$pdf->Cell(3,1,'Total Harga','LRTB',0,'C');
		$pdf->Cell(3,1,'Tanggal Pesan','LRTB',0,'C');
		$pdf->Cell(3,1,'Jam Pesan','LRTB',0,'C');
		$pdf->Ln();
		$pdf->SetFont('Arial','',11);
		

		$pdf->SetFont('Times','',9);
		for($j=0;$j<$i;$j++)
		{
			//menampilkan data dari hasil query database
			$pdf->Cell(1,1,$j+1,'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][0],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][1],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][2],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][3],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][4],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][5],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][6],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][7],'LBTR',0,'C');
			$pdf->Cell(3,1,$cell[$j][8],'LBTR',0,'C');
		}
		$pdf->Ln();
		$pdf->SetFont('Times','B',10);
		$pdf->Text(1,8,'Catatan:','C');
		$pdf->Ln(1);
		$pdf->SetFont('Times','',10);
		$pdf->Text(1,8.5,'Silakan transfer se-jumlah uang yang tertera diatas ke No.Rekening A.N Ahmad Romadhon','C');
		$pdf->SetFont('Times','B',10);
		$pdf->Text(1,9.5,'KONFIRMASI PEMBAYARAN','C');
		$pdf->Ln(1);
		$pdf->SetFont('Times','',10);
		$pdf->Text(1,10,'- Setelah melakukan pembayaran, silakan konfirmasi melalui akun Anda, ','C');
		$pdf->Text(1,10.5,'- Sertakan data diri anda,','C');
		$pdf->Text(1,11,'- Nama Bank Tujuan, ','C');
		$pdf->Text(1,11.5,'- Metode Pembayaran, ','C');
		$pdf->Text(1,12,'- Serta jumlah pembayaran anda.','C');

		$pdf->Text(1,10,'','C');
		
		$pdf->Output();
	}
?>