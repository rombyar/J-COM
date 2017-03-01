<?php
	error_reporting(0);
	
	include "../../koneksi/koneksi_db.php";
	//Queri untuk Menampilkan data
	$query = "select id_barang,
					 id_barang_kategori,
					 username,
					 nama_barang,
					 merek_barang,
					 harga_barang,
					 stok_barang
					from tb_barang";
	$db_query = mysql_query($query) or die(mysql_error());
	//Variabel untuk iterasi
	$i = 0;
	
	//Mengambil nilai dari query database
	
	while($data=mysql_fetch_array($db_query))
	{
		$cell[$i][0] = $data[0];
		$cell[$i][1] = $data[1];
		$cell[$i][2] = $data[2];
		$cell[$i][3] = $data[3];
		$cell[$i][4] = $data[4];
		$cell[$i][5] = $data[5];
		$cell[$i][6] = $data[6];
		$i++;
	}
	
	require('../../fpdf17/fpdf.php');

	class PDF extends FPDF
	{

		//Fungsi Untuk Membuat Header
		function Header()
		{
			$this->SetFont('Arial','',8.5);
			$this->Text(6.4,2.5,'- 101 = Laptop','C');
			$this->Text(6.4,2.9,'- 102 = Komputer','C');
			$this->Text(6.4,3.3,'- 103 = Aksesoris Komputer','C');
			$this->Text(6.4,3.7,'- 104 = Komponen Komputer','C');
			$this->SetFont('Arial','',8.5);
			$this->Text(23.4,2.9,'Email: bill@j.com Telp: (021)84991484,','C');
			$this->Text(23.4,3.3,'Fax (021)84991484 SMS +628978596665','C');
			$this->Text(23.4,3.7,'http://www.jcom.bl.ee/','C');
			$this->SetFont('','U');
			$this->Cell(80);
			$this->SetTitle('Data Barang');
			$this->Image('../../images/logo.png',1,2,5);
			$this->Ln(3);
		}

		//Fungsi Untuk Membuat Footer
		function Footer()
		{
			//Position at 1.5 cm from bottom
			$this->SetY(-15);
			//Arial italic 8
			$this->SetFont('Arial','I',8);
			//Page number
			$this->Cell(0,27,'Halaman ke : '.$this->PageNo(),0,0,'C');
		}
	}

	$pdf = new PDF('L','cm','A4');
	$pdf->Open();
	
	$pdf->AddPage();
	$pdf->SetFont("Arial","B",11);
	$pdf->Cell(28,1,'DATA BARANG','LRTB',0,'C');
	$pdf->Ln();
	$pdf->Cell(1,1,'No.','LRTB',0,'C');
	$pdf->Cell(3,1,'Kode Barang','LRTB',0,'C');
	$pdf->Cell(3,1,'Kode Kategori','LRTB',0,'C');
	$pdf->Cell(2,1,'Pegawai','LRTB',0,'C');
	$pdf->Cell(8.5,1,'Nama Barang','LRTB',0,'C');
	$pdf->Cell(4,1,'Merek Barang','LRTB',0,'C');
	$pdf->Cell(4.5,1,'Harga Barang','LRTB',0,'C');
	$pdf->Cell(2,1,'Stok','LRTB',0,'C');
	$pdf->Ln();
	

	$pdf->SetFont('Times','',10);
	for($j=0;$j<$i;$j++)
	{
		//menampilkan data dari hasil query database
		$pdf->Cell(1,1,$j+1,'LBTR',0,'C');
		$pdf->Cell(3,1,$cell[$j][0],'LBTR',0,'C');
		$pdf->Cell(3,1,$cell[$j][1],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][2],'LBTR',0,'C');
		$pdf->Cell(8.5,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(4,1,$cell[$j][4],'LBTR',0,'C');
		$pdf->Cell(4.5,1,$cell[$j][5],'LBTR',0,'C');
		$pdf->Cell(2,1,$cell[$j][6],'LBTR',0,'C');
		$pdf->Ln();
	}
	$pdf->Output();
?>