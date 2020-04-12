-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 08 Jan 2014 pada 02.05
-- Versi Server: 5.5.32
-- Versi PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_j_com`
--
CREATE DATABASE IF NOT EXISTS `db_j_com` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_j_com`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_barang_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_barang_kategori`, `kategori`) VALUES
(101, 'LAPTOP'),
(102, 'KOMPUTER'),
(103, 'KOMPONEN KOMPUTER'),
(104, 'AKSESORIS KOMPUTER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE IF NOT EXISTS `tb_barang` (
  `id_barang` int(100) NOT NULL AUTO_INCREMENT,
  `id_barang_kategori` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merek_barang` varchar(100) NOT NULL,
  `harga_barang` decimal(65,0) NOT NULL,
  `deskripsi_barang` mediumtext NOT NULL,
  `stok_barang` varchar(100) NOT NULL,
  `foto_barang` varchar(225) NOT NULL,
  PRIMARY KEY (`id_barang`),
  KEY `id_barang_kategori` (`id_barang_kategori`),
  KEY `id_pegawai` (`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_barang_kategori`, `username`, `nama_barang`, `merek_barang`, `harga_barang`, `deskripsi_barang`, `stok_barang`, `foto_barang`) VALUES
(1, 101, 'Admin', 'Aspire E1-471', 'Acer', '4500000', '<p><strong>Prosesor</strong> : Intel&reg; Core&trade; i3-2328M Processor (2.20 GHz, 3MB Cache)<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB)<br />\r\n<strong>VGA</strong> : Intel&reg; HD Graphics<br />\r\n<strong>Harddisk</strong> : 5000 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '99', 'acer3.jpg'),
(2, 101, 'Admin', 'Aspire E1-421', 'Acer', '3400000', '<p><strong>Prosesor</strong> : AMD Dual-Core Processor E-300 (1.65 GHz, L2 Cache 1 MB)<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA : AMD Radeon&trade;HD 6310<br />\r\n<strong>Harddisk</strong> : 320 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'acer2.jpg'),
(3, 101, 'Admin', 'Aspire E1-431', 'Acer', '3000000', '<p><strong>Prosesor</strong> : Intel&reg;Celeron&reg; Processor B830 (1.70 GHz, 2MB Cache)<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB)<br />\r\n<strong>VGA</strong> : Intel&reg; HD Graphics<br />\r\n<strong>Hardisk</strong> : 320 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'acer1.jpg'),
(4, 101, 'Admin', 'Aspire V5 471', 'Acer', '5300000', '<p><strong>Prosesor</strong> : Core i3-3217M&ndash; up to 2,3<br />\r\n<strong>Memori</strong> : 4 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Harddisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'acer.jpg'),
(5, 101, 'Admin', 'Aspire V5 471G', 'Acer', '6400000', '<p><strong>Prosesor</strong> : Core i5-3317U&ndash; up to 2,3<br />\r\n<strong>Memori </strong>: 4 GB DDR3 (max 8GB) VGA :GeForce GT 620M 1GB<br />\r\n<strong>Harddisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'acer4.jpg'),
(6, 101, 'Admin', 'Aspire V3-471G', 'Acer', '9700000', '<p><strong>Prosesor</strong> : Core i7-3610QM &ndash; up to 3,3<br />\r\n<strong>Memori</strong> : 4 GB DDR3 (max 8GB) VGA :GeForce GT 640M 2GB<br />\r\n<strong>Harddisk</strong> : 1TB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'acer5.jpg'),
(7, 101, 'Admin', 'X44H - VX281D', 'Asus', '3500000', '<p><strong>Prosesor</strong> : Intel Celeron DualCore B830-1.8 Ghz<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA : INTEL HD<br />\r\n<strong>Hardisk</strong> : 320 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'asus.gif'),
(8, 101, 'Admin', 'X401U - W011', 'Asus', '3400000', '<p><strong>Prosesor</strong> : AMD Dual-core Processor C-60(1.0 GHz)<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 4GB) VGA :AMD&reg; Radeon HD 6290<br />\r\n<strong>Hardisk</strong> : 320 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai </strong>: Rechargeable Lithium-ion Battery</p>\r\n', '99', 'asus1.jpg'),
(9, 101, 'Admin', 'A43E - VX1070D', 'Asus', '3900000', '<p><strong>Prosesor</strong> : Intel Pentium Dual Core B950<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Hardisk</strong> : 500GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai </strong>: Rechargeable Lithium-ion Battery</p>\r\n', '100', 'asus2.jpg'),
(10, 101, 'Admin', 'A45VD - VX247', 'Asus', '4700000', '<p><strong>Prosesor</strong> : Intel B980<br />\r\n<strong>Memori</strong> : 4 GB DDR3 (max 8GB) VGA :GeForce GT 610M 2 GB<br />\r\n<strong>Hardisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'asus3.jpg'),
(11, 101, 'Admin', 'A43E - VX1078D', 'Asus', '4800000', '<p><strong>Prosesor</strong> : Core i3-2328M<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Hardisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '98', 'asus4.gif'),
(12, 101, 'Admin', 'A45A - VX168 / 169', 'Asus', '4800000', '<p><strong>Prosesor</strong> :Core i3-2350M<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Hardisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai </strong>: Rechargeable Lithium-ion Battery</p>\r\n', '100', 'asus5.jpg'),
(13, 101, 'Admin', 'A43SD - VX701D', 'Asus', '5300000', '<p><strong>Prosesor </strong>: Intel Core i3-2330M<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :GeForce GT 610M 2GB<br />\r\n<strong>Hardisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'asus6.jpg'),
(14, 101, 'Admin', 'HP 431', 'HP', '4600000', '<p><strong>Prosesor </strong>: Core i3-2328M<br />\r\n<strong>Memori </strong>: 2 GB DDR3 (max 8GB) VGA :1 GB RADEON<br />\r\n<strong>Hardisk</strong> : 640 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'hp.jpg'),
(15, 101, 'Admin', 'HP 1000 - 1109TU', 'HP', '3500000', '<p><strong>Prosesor</strong> : Intel Dual Core B820 - 1.70 GHz<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Hardisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'hp2.jpg'),
(16, 101, 'Admin', 'CQ43-304AU', 'HP', '3300000', '<p><strong>Prosesor </strong>: AMD Dual Core E300 - 1.30 GHz<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Hardisk</strong> : 500 GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai</strong> : Rechargeable Lithium-ion Battery</p>\r\n', '100', 'hp3.jpg'),
(17, 101, 'Admin', 'CQ43-414TU', 'HP', '3300000', '<p><strong>Prosesor</strong> : Intel&reg; Celeron Dual-Core B815 - 1.60 GHz<br />\r\n<strong>Memori</strong> : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\n<strong>Hardisk</strong> : 320GB Serial ATA 5400 RPM<br />\r\n<strong>Optical Drive</strong> : DVD&plusmn;RW<br />\r\n<strong>Baterai </strong>: Rechargeable Lithium-ion Battery</p>\r\n', '100', 'hp4.jpg'),
(18, 101, 'Admin', 'Satellite L735', 'Toshiba', '5200000', '<p>Prosesor : Core i3-2350M&ndash;2,3<br />\r\nMemori : 2 GB DDR3 (max 8GB) VGA :Intel HD<br />\r\nHardisk : 640 GB Serial ATA 5400 RPM<br />\r\nOptical Drive : DVD&plusmn;RW<br />\r\nBaterai : Rechargeable Lithium-ion Battery</p>\r\n', '99', 'tosiba3.jpg'),
(20, 104, 'Admin', 'Tshb Flashdisk-16GB', 'Toshiba', '139900', '<table class="prd-attributes ui-grid ui-gridFull">\r\n	<tbody>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>\r\n			<div id="pdtsku">TO939ELABYGVANID-104555</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Ukuran (L x W x H cm)</th>\r\n			<td>0.85x0.25x1</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Berat (kg)</th>\r\n			<td>0.2</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Warna</th>\r\n			<td>Putih</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '198', 'flashdisk_toshiba.jpg'),
(21, 104, 'Admin', 'M187 Nirkabel', 'Logitech', '120000', '<table class="prd-attributes ui-grid ui-gridFull">\r\n	<tbody>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>\r\n			<div id="pdtsku">LO651EL83HJWANID-62336</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align: left;">Ukuran (L x W x H cm)</th>\r\n			<td>20 x 13 x 8 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align: left;">Berat (kg)</th>\r\n			<td>0.5</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align: left;">Warna</th>\r\n			<td>Hitam</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '197', 'logitech_mouse.jpg'),
(22, 103, 'Admin', 'Intel Processor Core I5', 'Sony', '199190', '<table class="prd-attributes ui-grid ui-gridFull">\r\n	<tbody>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>\r\n			<div id="pdtsku">IN513ELABCA7ANID-68241</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align: left;">Berat (kg)</th>\r\n			<td>1</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align: left;">Tipe Processor</th>\r\n			<td>Intel</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align: left;">Kecepatan Processor</th>\r\n			<td>3GHz</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '199', 'intel-i5.jpg'),
(23, 102, 'Admin', 'Asus eeeTOP ET2013IUKI', 'Asus', '6000000', '<table class="prd-attributes ui-grid ui-gridFull">\r\n	<tbody>\r\n		<tr>\r\n			<td>SKU</td>\r\n			<td>\r\n			<div id="pdtsku">AS100ELABCFFANID-68429</div>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Ukuran (L x W x H cm)</th>\r\n			<td>49.6 x 37.1 x 2.2-5.6 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Berat (kg)</th>\r\n			<td>6.5 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Warna</th>\r\n			<td>Hitam</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Tipe</th>\r\n			<td>Asus eeeTOP ET2013IUKI-B026M</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Ukuran Layar (in)</th>\r\n			<td>20.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">RAM</th>\r\n			<td>4</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Kapasitas Penyimpanan</th>\r\n			<td>500</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Kecepatan CPU</th>\r\n			<td>2.90</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Megapiksel</th>\r\n			<td>2.0</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Sistem Operasi</th>\r\n			<td>Free DOS&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<th style="text-align:left">Fitur Tampilan</th>\r\n			<td>HD</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '199', 'asus-pc.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_merek`
--

CREATE TABLE IF NOT EXISTS `tb_barang_merek` (
  `id_barang_merek` int(100) NOT NULL,
  `id_barang_kategori` int(50) NOT NULL,
  `nama_merek` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang_merek`),
  KEY `id_barang_merek` (`id_barang_merek`),
  KEY `id_barang_kategori` (`id_barang_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang_merek`
--

INSERT INTO `tb_barang_merek` (`id_barang_merek`, `id_barang_kategori`, `nama_merek`) VALUES
(1, 101, 'Acer'),
(2, 101, 'Apple'),
(3, 101, 'Asus'),
(4, 101, 'Dell'),
(5, 101, 'HP'),
(6, 101, 'Lenovo'),
(7, 101, 'Toshiba'),
(8, 102, 'Apple'),
(9, 102, 'Asus'),
(10, 102, 'Dell'),
(11, 103, 'Logitech'),
(12, 103, 'Apple'),
(13, 103, 'Philips'),
(14, 103, 'Sony'),
(15, 104, 'Asus'),
(16, 104, 'Genius'),
(17, 103, 'Intel'),
(18, 104, 'Kingston'),
(19, 104, 'Lenovo'),
(20, 104, 'Sandisk'),
(21, 104, 'Toshiba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE IF NOT EXISTS `tb_berita` (
  `id_berita` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `tgl_berita` datetime NOT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `username`, `judul_berita`, `isi_berita`, `tgl_berita`) VALUES
(1, 'admin', 'Chromebook Samsung dengan Prosesor Exynos 5 Octa 5420 bakal Dirilis pada Tahun ini', '<p style="text-align:justify"><a href="http://www.beritateknologi.com/wp-content/uploads/2014/01/chromebook-samsung.jpg"><img alt="" class="aligncenter size-full wp-image-61068" src="http://www.beritateknologi.com/wp-content/uploads/2014/01/chromebook-samsung.jpg" style="float:left; height:187px; width:202px" /></a>Tak hanya smartphone Android canggih yang diperkirakan bakal diluncurkan oleh Samsung pada tahun ini. Perusahaan asal Korea Selatan tersebut juga dikabarkan bakal memperkenalkan Chromebook baru pada tahun 2014 ini.</p>\r\n\r\n<p style="text-align:justify">Menurut rumor yang dikabarkan oleh BUsinessKorea, Samsung siap meluncurkan sebuah Chromebook baru yang dilengkapi dengan prosesor Exynos 5 Octa 5420. Kinerja Chromebook ini pun kian canggih karena dilengkapi dengan RAM berkapasitas 3GB.Selain itu, Chromebook ini dikatakan bakal mempunyai layar berukuran 12 inci dengan resolusi 2560 x 1600 piksel. Selanjutnya, Chromebook ini juga bakal dilengkapi dengan opsi memori internal 16GB dan 32GB.</p>\r\n\r\n<p style="text-align:justify">Terdapat pula port USB 3.0 pada Chromebook tersebut.Namun tak ada informasi mengenai kapan peluncuran Chromebook ini akan dilakukan oleh Samsung. Dan jika Chromebook ini diwujudkan, tentunya akan sangat menarik melihat persaingan di segmen ini. Terlebih saat ini para produsen notebook mulai tertarik untuk memproduksi Chromebook.</p>\r\n', '2014-01-05 00:00:00'),
(2, 'admin', 'Dongle USB TransferJet dari Toshiba Tawarkan Kecepatan Transfer Data hingga 375 Mbps', '<p><a href="http://www.beritateknologi.com/wp-content/uploads/2013/12/dongle-usb-transferjet-toshiba.jpg" target="_blank"><img alt="Transfer" class="aligncenter size-full wp-image-60715" src="http://www.beritateknologi.com/wp-content/uploads/2013/12/dongle-usb-transferjet-toshiba.jpg" style="float:left; height:173px; width:231px" /></a>Saat ini konektivitas berupa WiFi dan Bluetooth memang bisa digunakan sebagai sarana untuk mengirim data. Namun keduanya tak menawarkan kecepatan yang bagus. Ada sebuah solusi yang ditawarkan oleh Toshiba dengan dongle USB 2.0 terbarunya yang bernama Toshiba TG-UA00A TransferJet.</p>\r\n\r\n<p>Dongle ini bisa digunakan pada berbagai jenis komputer dan memungkinkannya untuk mengirim data secara wireless ke tablet atau smartphone dengan kecepatan data hingga 375 Mbps. Dongle ini terdiri dari dua bagian, satu bagian konektor USB dan bagian lainnya adalah konektor micro USB.</p>\r\n\r\n<p>Sayangnya, meskipun memiliki kecepatan transfer data yang tinggi, dongle USB ini tak bisa dipakai dalam jarak yang jauh. Dongle ini hanya bisa dipakai pada jarak sekitar satu atau dua inci. Selain itu, perangkat ini juga hanya mendukung OS Windows 7 atau 8 serta perangkat Android 4.0 atau 4.2.Dongle USB TransferJet ini pun sudah mulai ditawarkan oleh Toshiba di Jepang dengan harga setara dengan 38 USD.</p>\r\n', '2014-01-05 00:00:00'),
(3, 'admin', 'Berisiko Terbakar, Google dan HP Tarik Seluruh Charger Chromebook 11', '<p style="text-align: justify;"><a href="http://www.beritateknologi.com/wp-content/uploads/2013/12/hp-chromebook-11.jpg"><img alt="" class="aligncenter size-full wp-image-60607" src="http://www.beritateknologi.com/wp-content/uploads/2013/12/hp-chromebook-11.jpg" style="float:right; height:118px; width:236px" /></a>Google dan HP baru saja memutuskan untuk menarik seluruh charger Chromebook 11 yang saat ini ada di pasaran. Selain itu, mereka pun mengimbau kepada para pemilik HP Chromebook 11 untuk segera menukarkan charger miliknya secara cuma-cuma.</p>\r\n\r\n<p style="text-align: justify;">Kebijakan itu dilakukan setelah terjadi hal yang tak mengenakkan terkait charger tersebut. Bahkan menurut data Consumer Product Safety Comission, sudah ada sembilan orang yang melaporkan kepada perusahaan kalau charger miliknya overheating pada saat dipakai. Sembilan orang tersebut pun melaporkan kalau chargernya bahkan meleleh akibat panas yang ditimbulkan.</p>\r\n\r\n<p style="text-align: justify;">Menurut kabar yang dilansir dari PC World, seorang pengguna Chromebook 11 dilaporkan mengalami luka bakar akibat kejadian tersebut. Tak hanya itu, charger Chromebook 11 itu juga dilaporkan telah merusak bantal milik salah seorang pemiliknya lainnya.Charger yang bermasalah tersebut terdapat pada Chromebook 11 yang dibeli sebelum tanggal 1 Desember. Sebelumnya pada pertengahan November, Google dan HP telah menghentikan penjualan Chromebook di pasaran karena adanya permasalahan ini.</p>\r\n\r\n<p style="text-align: justify;">Untuk memperoleh charger pengganti, pemilik Chromebook 11 bisa memilih formulir yang disediakan Google secara online. Dan untuk sementara waktu, Google menyarankan kepada para pemilik Chromebook 11 untuk memakai charger micro USB yang biasa digunakan pada tablet ataupun smartphone.Dalam data yang diungkapkan Consumer Product Safety Comission juga terungkap angka penjualan Chromebook 11. Data tersebut mengungkapkan bahwa Google dan HP akan menarik sebanyak 145 ribu unit charger Chromebook 11 yang ada di tangan para pemiliknya. Untuk sebuah perusahaan sebesar HP dan Google, angka 145 ribu tersebut tentunya bukan angka yang besar.</p>\r\n', '2014-01-05 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_detail_pemesanan` (
  `id_detail_pemesanan` int(100) NOT NULL AUTO_INCREMENT,
  `no_pemesanan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `total_harga_barang` decimal(10,0) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `rekening_bank` varchar(100) NOT NULL,
  `bank_tujuan` varchar(100) NOT NULL,
  `jasa_pengiriman` varchar(100) NOT NULL,
  `ongkir` varchar(100) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `jam_pesan` varchar(100) NOT NULL,
  `tanggal_kirim` varchar(100) NOT NULL,
  `status_pemesanan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_detail_pemesanan`),
  KEY `no_pemesanan` (`no_pemesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tb_detail_pemesanan`
--

INSERT INTO `tb_detail_pemesanan` (`id_detail_pemesanan`, `no_pemesanan`, `nama_pelanggan`, `username`, `total_harga_barang`, `foto_barang`, `rekening_bank`, `bank_tujuan`, `jasa_pengiriman`, `ongkir`, `tanggal_pesan`, `jam_pesan`, `tanggal_kirim`, `status_pemesanan`) VALUES
(1, 'TR0001', 'Ahmad Romadhon', 'romadhonbyar', '4820000', 'asus4.gif', '900-00-0871869-5', 'Bank Mandiri', 'JNE', '20000', '2014-01-07', '23:07:19', 'Belum dikirim', 'Pengecekan Pembayaran'),
(2, 'TR0002', 'Ahmad Romadhon', 'romadhonbyar', '11220000', 'asus1.jpg', '900-00-0871869-5', 'Bank Mandiri', 'JNE', '20000', '2014-01-07', '05:56:22', 'Belum dikirim', 'Menunggu Pembayaran'),
(3, 'TR0003', 'Ahmad Romadhon', 'romadhonbyar', '4520000', 'acer3.jpg', '900-00-0871869-5', 'Bank Mandiri', 'JNE', '20000', '2014-01-08', '06:12:21', '2014-01-08', 'Pengiriman Sukses'),
(4, 'TR0004', 'Ahmad Romadhon', 'romadhonbyar', '9800800', 'flashdisk_toshiba.jpg', '900-00-0871869-5', 'Bank Mandiri', 'TIKI', '21000', '2014-01-08', '06:26:56', '2014-01-08', 'Pengiriman Barang'),
(5, 'TR0005', 'Ahmad Romadhon', 'romadhonbyar', '6020000', 'asus-pc.jpg', '900-00-0871869-5', 'Bank Mandiri', 'JNE', '20000', '2014-01-08', '07:52:58', 'Belum dikirim', 'Menunggu Pembayaran'),
(6, 'TR0006', 'User Coba', 'User', '220190', 'intel-i5.jpg', '900-00-0871869-5', 'Bank Mandiri', 'TIKI', '21000', '2014-01-08', '07:56:00', 'Belum dikirim', 'Menunggu Pembayaran'),
(7, 'TR0007', 'User Coba', 'User', '19521000', 'asus4.gif', '900-00-0871869-5', 'Bank Mandiri', 'TIKI', '21000', '2014-01-08', '07:58:19', '2014-01-08', 'Pengiriman Sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_keranjang`
--

CREATE TABLE IF NOT EXISTS `tb_keranjang` (
  `id_keranjang` int(100) NOT NULL AUTO_INCREMENT,
  `id_barang` int(100) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto_barang` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_keranjang` date NOT NULL,
  `qty` varchar(4) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_keranjang`),
  UNIQUE KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE IF NOT EXISTS `tb_pegawai` (
  `id_pegawai` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `umur` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jabatan` enum('Super Admin','Admin','CS') NOT NULL,
  `tanggal_daftar` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`id_pegawai`, `username`, `password`, `nama_pegawai`, `jenis_kelamin`, `agama`, `alamat`, `no_hp`, `tanggal_lahir`, `umur`, `email`, `jabatan`, `tanggal_daftar`) VALUES
(1, 'SA', '82c531a250b94cf3cc2eb956cc04e353', 'Ahmad Romadhon', 'Pria', 'Islam', 'Jl.Raya Pasar Kecapi RT/4 RW/3', '08958786665', '1994-03-10', '19', 'user@gmail.com', 'Super Admin', '2013-12-11'),
(2, 'Admin', '82c531a250b94cf3cc2eb956cc04e353', 'Hanna Zulia Rahma', 'Wanita', 'Islam', 'Jl.Apa Saja', '08933333365', '1994-03-10', '19', 'hanna@gmail.com', 'Admin', '2013-12-11'),
(3, 'CS', '82c531a250b94cf3cc2eb956cc04e353', 'Rahma Sina', 'Wanita', 'Islam', 'Jl.Raya Apa', '08958446665', '1994-01-31', '19', 'rara@gmail.com', 'CS', '2013-12-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE IF NOT EXISTS `tb_pelanggan` (
  `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT,
  `akses` enum('User') NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `kota` varchar(20) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kode_pos` varchar(10) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(50) NOT NULL,
  `tanggal_daftar` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pelanggan`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`id_pelanggan`, `akses`, `username`, `password`, `nama_pelanggan`, `jenis_kelamin`, `email`, `alamat`, `kota`, `provinsi`, `kode_pos`, `no_hp`, `no_ktp`, `tanggal_lahir`, `tanggal_daftar`) VALUES
(1, 'User', 'Hanna', '82c531a250b94cf3cc2eb956cc04e353', 'Hanna', 'Wanita', 'hanna@gmail.com', '', '', '', '', '', '', '', '2013-12-29'),
(2, 'User', 'romadhonbyar', '82c531a250b94cf3cc2eb956cc04e353', 'Ahmad Romadhon', 'Pria', 'user@gmail.com', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', '0897000000', '1098329128391289', '1994-03-10', '2013-12-29'),
(3, 'User', 'Nur', '82c531a250b94cf3cc2eb956cc04e353', 'Nur Rahmad', 'Pria', 'nu@g.com', '', '', '', '', '', '', '', '2014-01-05'),
(4, 'User', 'User', '4814da5ded83a814d55b3eca6438ad62', 'User Coba', 'Pria', 'user@gmail.com', 'Jl.Raya Kerja Bakti', 'Solo', 'Jawa Tengah', '19023', '02910903940394', '0219834993498237', '1991-01-24', '2014-01-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id_pembayaran` int(100) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(100) NOT NULL,
  `no_pemesanan` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jumlah_pembayaran` varchar(50) NOT NULL,
  `tanggal_pembayaran` varchar(50) NOT NULL,
  `bank_tujuan` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `jam_konfirmasi` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pembayaran`),
  UNIQUE KEY `no_pemesanan` (`no_pemesanan`),
  KEY `id_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_pelanggan`, `no_pemesanan`, `nama_pelanggan`, `email`, `jumlah_pembayaran`, `tanggal_pembayaran`, `bank_tujuan`, `metode_pembayaran`, `jam_konfirmasi`, `status_pembayaran`) VALUES
(1, 2, 'TR0001', 'Ahmad Romadhon', 'user@gmail.com', '4820000', '2014-01-08', 'Bank Mandiri', 'Setoran Tunai', '06:11:18', 'Menunggu Konfirmasi'),
(2, 2, 'TR0004', 'Ahmad Romadhon', 'user@gmail.com', '9800800', '2014-01-08', 'Bank Mandiri', 'Setoran Tunai', '06:27:28', 'Pembayaran Sukses'),
(3, 2, 'TR0003', 'Ahmad Romadhon', 'user@gmail.com', '4520000', '2014-01-08', 'Bank Mandiri', 'Mobile Banking', '06:28:41', 'Pembayaran Sukses'),
(4, 4, 'TR0007', 'User Coba', 'user@gmail.com', '19521000', '2014-01-08', 'Bank Mandiri', 'Setoran Tunai', '07:59:01', 'Pembayaran Sukses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemesanan`
--

CREATE TABLE IF NOT EXISTS `tb_pemesanan` (
  `id_pemesanan` int(100) NOT NULL AUTO_INCREMENT,
  `id_barang` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `no_pemesanan` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `jam_pesan` varchar(100) NOT NULL,
  `tanggal_pesan` varchar(100) NOT NULL,
  `status_pemesanan` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kode_pos` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `no_ktp` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_barang` (`id_barang`),
  KEY `username` (`username`),
  KEY `no_pemesanan` (`no_pemesanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `id_barang`, `id_pelanggan`, `no_pemesanan`, `qty`, `foto_barang`, `jam_pesan`, `tanggal_pesan`, `status_pemesanan`, `username`, `nama_pelanggan`, `jenis_kelamin`, `alamat`, `kota`, `provinsi`, `kode_pos`, `email`, `no_hp`, `no_ktp`, `tanggal_lahir`) VALUES
(1, 11, 2, 'TR0001', '1', 'asus4.gif', '23:07:19', '07-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(2, 9, 2, 'TR0002', '2', 'asus2.jpg', '05:56:22', '07-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(3, 8, 2, 'TR0002', '1', 'asus1.jpg', '05:56:22', '07-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(4, 1, 2, 'TR0003', '1', 'acer3.jpg', '06:12:21', '08-01-14', 'Pengiriman Sukses', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(5, 23, 2, 'TR0004', '1', 'asus-pc.jpg', '06:26:56', '08-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(6, 7, 2, 'TR0004', '1', 'asus.gif', '06:26:56', '08-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(7, 20, 2, 'TR0004', '2', 'flashdisk_toshiba.jpg', '06:26:56', '08-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(8, 23, 2, 'TR0005', '1', 'asus-pc.jpg', '07:52:58', '08-01-14', '-', 'romadhonbyar', 'Ahmad Romadhon', 'Pria', 'Jl.Raya Pasar Kecapi', 'Bekasi', 'Jawa Barat', '17415', 'user@gmail.com', '0897000000', '1098329128391289', '1994-03-10'),
(9, 22, 4, 'TR0006', '1', 'intel-i5.jpg', '07:56:00', '08-01-14', '-', 'User', 'User Coba', 'Pria', 'Jl.', 'B', 'J', '12345', 'user@gmail.com', '0129109201', '902380192839012', '1993-01-15'),
(10, 17, 4, 'TR0007', '2', 'hp4.jpg', '07:58:19', '08-01-14', 'Pengiriman Sukses', 'User', 'User Coba', 'Pria', 'Jl.Raya Kerja Bakti', 'Solo', 'Jawa Tengah', '19023', 'user@gmail.com', '02910903940394', '0219834993498237', '1991-01-24'),
(11, 10, 4, 'TR0007', '1', 'asus3.jpg', '07:58:19', '08-01-14', 'Pengiriman Sukses', 'User', 'User Coba', 'Pria', 'Jl.Raya Kerja Bakti', 'Solo', 'Jawa Tengah', '19023', 'user@gmail.com', '02910903940394', '0219834993498237', '1991-01-24'),
(12, 2, 4, 'TR0007', '1', 'acer2.jpg', '07:58:19', '08-01-14', 'Pengiriman Sukses', 'User', 'User Coba', 'Pria', 'Jl.Raya Kerja Bakti', 'Solo', 'Jawa Tengah', '19023', 'user@gmail.com', '02910903940394', '0219834993498237', '1991-01-24'),
(13, 11, 4, 'TR0007', '1', 'asus4.gif', '07:58:19', '08-01-14', 'Pengiriman Sukses', 'User', 'User Coba', 'Pria', 'Jl.Raya Kerja Bakti', 'Solo', 'Jawa Tengah', '19023', 'user@gmail.com', '02910903940394', '0219834993498237', '1991-01-24');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_pegawai` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD CONSTRAINT `tb_berita_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_pegawai` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_detail_pemesanan`
--
ALTER TABLE `tb_detail_pemesanan`
  ADD CONSTRAINT `tb_detail_pemesanan_ibfk_1` FOREIGN KEY (`no_pemesanan`) REFERENCES `tb_pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_4` FOREIGN KEY (`no_pemesanan`) REFERENCES `tb_pemesanan` (`no_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pembayaran_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `tb_pemesanan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `tb_pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pemesanan_ibfk_4` FOREIGN KEY (`id_barang`) REFERENCES `tb_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
