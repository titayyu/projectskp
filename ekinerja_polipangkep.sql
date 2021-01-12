-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2021 at 02:15 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekinerja_polipangkep`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `id_detail_transaksi` char(36) NOT NULL,
  `id_produk` varchar(10) NOT NULL,
  `deskripsi_transaksi` varchar(250) NOT NULL,
  `quantity` varchar(15) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_detail_transaksi`, `id_produk`, `deskripsi_transaksi`, `quantity`, `ukuran`, `harga`, `total`) VALUES
(1, '1', 'W0001', 'putih', '5', '12', '5000', '25000'),
(4, '13', 'B0001', 'allahuma', '6', '7 m', '60000', '360000'),
(5, '14', 'B0003', 'HAHA', '50', '25', '2300000', '115000000'),
(6, '15', 'B0003', 'bismillah', '5', '2 pcs', '17000', '85000'),
(7, '16', 'B0001', 'CKCK', '90', '25', '15000', '1350000'),
(8, '19e09750-192b-4502-9374-289ea833d11c', 'B0002', 'Ulala', '2', '3 m', '6000', '12000'),
(11, '1bc47604-9799-4802-bc9f-a8a278cb9a0c', 'G0008', 'SEVENTEEN 25-19', '2.4', 'T144 L45', '85000', '204000'),
(2, '2', 'W0002', 'Benteng Kuat', '5', '12', '25000', '125000'),
(10, '27a8bcea-4675-4e08-81cb-4983336a8101', 'G0004', 'RUANG KEPALA', '1', 'T200 L260', '3640000', '3640000'),
(2, '3', 'W0002', 'Benteng Kuat', '5', '12', '5000', '25000'),
(2, '4', 'W0001', 'OIAJSOIJ', '5', '12', '60000', '300000'),
(2, '5', 'W0001', 'bismillah', '23', '2', '3000', '69000'),
(7, '53974458-19d5-4cfb-86ed-5ebe112c39ca', 'W0002', 'jheehe', '5', '2', '60000', '300000'),
(2, '6', 'W0001', 'hehe', '5', '5', '12000', '60000'),
(13, '629d8040-08dc-4ea3-979e-71a61eb0bec3', 'G0007', 'KAIN PUTIH ', '2', 'T=150 L=220 x2 , T=160 L=220 x2', '150000', '300000'),
(11, '768c985e-df9f-4ac1-84ef-971499aa4ef2', 'G0010', '', '1', '0', '55000', '55000'),
(8, '7dbe3166-4075-4b27-8e98-0d7b8d89d4f3', 'G0002', 'Bismillah yaAllah', '5', '6 m', '200000', '1000000'),
(7, '8312d736-1ef8-4757-a91e-ad191a237755', 'B0002', 'nannaa', '6', '6', '30000', '180000'),
(4, '9', 'B0003', 'bismillah', '5', '12 m', '50000', '250000'),
(12, 'a3a62805-20e3-4858-b099-e99924ff6a43', 'G0009', 'GOLD', '10', '', '2000', '20000'),
(9, 'a697545d-ae56-4f35-a2ba-c06bc604d8c4', 'W0001', 'PUTIH', '5', '3 m ', '50000', '250000'),
(11, 'bdc172a8-0334-4ba7-8431-9a6d47b27fdc', 'G0009', '', '24', '0', '3500', '84000'),
(10, 'dd707e84-a5d9-4ff7-9374-199cd08063f4', 'G0006', 'PERTEMUAN II', '1', 'T190 L400', '1043000', '1043000'),
(11, 'dd95aaf3-4c78-4f0b-895b-49d9865e94b1', 'G0007', 'SEVENTEEN 25-10', '2.8', 'T190 L95', '85000', '238000'),
(7, 'e05c306c-ee99-4abc-817d-cf719d16da3e', 'B0002', 'ababbaa', '7', '6 pcs', '9000', '63000'),
(10, 'e1482cf0-c5ab-4858-85d8-8d574af9909a', 'G0005', 'RUANG PERTEMUAN', '1', 'T200 L200 3 SET', '4410000', '4410000'),
(12, 'f0f69cd0-ba7b-4c3b-9dae-a82d5135c6e4', 'G0010', 'BUNGA', '2', 'sedang', '50000', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(15) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `icon_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `icon_fasilitas`) VALUES
(1, 'Banyak Diskon 10%', 'fa fa-money'),
(2, 'Pelayanan Maksimal', 'fa fa-star'),
(3, 'Bebas Memilih Bahan', 'fa fa-thumbs-up'),
(4, 'Dapatkan Banyak Voucher', 'fa fa-diamond');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(15) NOT NULL,
  `judul_gallery` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `judul_gallery`, `gambar`, `aktif`) VALUES
(1, 'Smokring', '1.jpg', 'Y'),
(2, 'Wallpaper', '2.jpg', 'Y'),
(3, 'Contoh Gorden Rumah Sakit', '3.jpg', 'Y'),
(4, 'Gorden Masjid', '4.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_pemilik` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `judul_website` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `meta_keyword` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `alamat_website` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email_website` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telp_website` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `favicon` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_pemilik`, `judul_website`, `url`, `meta_deskripsi`, `meta_keyword`, `alamat_website`, `email_website`, `telp_website`, `facebook`, `twitter`, `favicon`) VALUES
(3, 'TITA JAYA', 'CRM TITA JAYA', 'titajaya.co.id', 'Menjual Produk Interior', 'Menjual Produk Interior', 'Tawangsari Permai, A-20, Taman, Sidoarjo', 'titajayaa@gmail.com', '081336546637', 'Tita Jaya', '@titayyu', '');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(15) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul_informasi` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_informasi` text NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `id_kategori`, `username`, `judul_informasi`, `judul_seo`, `isi_informasi`, `tanggal`, `hari`, `gambar`, `aktif`) VALUES
(1, 1, 'manager', 'Temukan diskon terbaru!', 'temukan-diskon-terbaru', 'DISKON TAHUN BARU!!!!\r\n\r\nJangan lewatkan meriahnya tahun baru dengan mempercantik interior rumah anda dengan gorden baru. Dapatkan diskon 20% pada periode 29-30 Desember 2019', '2019-10-10', 'Kamis', '1094.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` char(36) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_jadwal` varchar(100) NOT NULL,
  `alamat_jadwal` varchar(200) NOT NULL,
  `telp_jadwal` varchar(30) NOT NULL,
  `tanggal_jadwal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `username`, `nama_jadwal`, `alamat_jadwal`, `telp_jadwal`, `tanggal_jadwal`) VALUES
('10', '', 'Inul', 'Jakarta', '08566671828', '2018-02-05'),
('40', '', 'Merry', 'Kedungturi', '081563372281', '2020-01-15'),
('eb3841f9-e780-4c14-a595-77f8eb25e63c', '', 'Maimunahh', 'Jambangan', '081336546637', '2018-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(10) NOT NULL,
  `kode_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`) VALUES
(1, 'MAS', 'Masjid'),
(2, 'RS', 'Rumah Sakit'),
(3, 'INS', 'Instansi Pemerintahan'),
(4, 'PR', 'Perorangan'),
(5, 'PUS', 'Puskesmas'),
(6, 'PR', 'Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(15) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi_kategori` varchar(255) NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi_kategori`, `icon`) VALUES
(1, 'TUGAS LUAR', 'Wallpaper merupakan hiasan interior masa kini. Wallpaper dapat menjadi alternatif jika anda bosan dengan warna cat yang begitu-begitu saja.', 'fa fa-star'),
(2, 'CUTI TAHUNAN', 'Jual gorden dengan berbahan lokal dan import. Jangan khawatirkan kwalitas, karena pelanggan akan mendapatkan bergaransi selama 7 hari', 'fa fa-bug'),
(3, 'KEPERLUAN KELUARGA', 'Blinds dapat menjadi opsi jika anda tidak ingin menggunakan gorden. Blinds sangat cocok untuk ruang kantor, dan ruang yang sempit sehingga cocok dipasang yang simple', 'fa fa-diamond'),
(4, 'IZIN SAKIT', '', ''),
(5, 'WORK FROM HOME', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama`, `email`, `telp`, `pesan`) VALUES
(0, 'Annisa', 'annisa@gmail.com', '087657458867', 'Halo, mau tanya. apakah jual gorden plastik?'),
(0, 'Ilham Gusti', 'ilhamgst@gmail.com', '081775446697', 'Bisa credit gak ya min?'),
(0, 'Ashadu', 'asha@gmail.com', '0882527817623', 'Min saya mau order gorden lokal yang murah tapi bagus apakah ada? namun untuk acara dekat-dekat ini. kalau boleh tau lama pengerjaan berapa lama ya?'),
(0, 'tita', 'titaa@gmail.com', '67767', 'halo ada orang?');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `main_menu` varchar(11) NOT NULL,
  `level` enum('admin','manager') NOT NULL DEFAULT 'manager'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `link`, `icon`, `main_menu`, `level`) VALUES
(4, 'SKP', 'skp', 'fa fa-users', '12', 'admin'),
(10, 'User', 'users', 'fa fa-user', '52', 'manager'),
(11, 'Menu', 'menu', 'fa fa-eye', '52', 'manager'),
(12, 'SKP', '#', 'fa fa-star-o', '0', 'admin'),
(14, 'LKP', '#', 'fa fa-info-circle', '0', 'admin'),
(16, 'LKP', 'Lkp', 'fa fa-server', '14', 'admin'),
(17, 'Persetujuan LKP', 'persetujuanlkp', 'fa fa-newspaper-o', '14', 'admin'),
(18, 'Persetujuan SKP', 'persetujuanskp', 'fa fa-tags', '12', 'admin'),
(27, 'SKP', '#', 'fa fa-users', '0', 'manager'),
(28, 'SKP', 'skp', 'fa fa-users', '27', 'manager'),
(29, 'Persetujuan SKP', 'persetujuanskp', 'fa fa-pie-chart', '27', 'manager'),
(33, 'LKP', '#', 'fa fa-info-circle', '0', 'manager'),
(34, 'LKP', 'Lkp', 'fa fa-server', '33', 'manager'),
(35, 'Persetujuan LKP', 'persetujuanlkp', 'fa fa-newspaper-o', '33', 'manager'),
(37, 'Fasilitas', 'fasilitas', 'fa fa-suitcase', '37', 'manager'),
(41, 'Kehadiran', '#', 'fa fa-tags', '0', 'admin'),
(43, 'Izin Kehadiran', 'produk', 'fa fa-diamond', '41', 'admin'),
(45, 'Kehadiran', '#', 'fa fa-tags', '0', 'manager'),
(46, 'Rekapitulasi SKP', '#', 'fa fa-newspaper-o', '0', 'manager'),
(47, 'Data Rekap SKP', 'rekap', 'fa fa-pencil-square-o', '46', 'manager'),
(48, 'Izin Kehadiran', 'produk', 'fa fa-newspaper-o', '45', 'manager'),
(49, 'Kategori Izin Pegawai', 'kategori', 'fa fa-pencil-square-o', '45', 'manager'),
(50, 'Kategori Izin Pegawai', 'kategori', 'fa fa-pencil-square-o', '41', 'admin'),
(51, 'Approve Surat Permohonan', 'kontak', 'fa fa-volume-control-phone', '46', 'manager'),
(52, 'SETTING', '#', 'fa fa-gear', '0', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `model`
--

CREATE TABLE `model` (
  `id_model` int(15) NOT NULL,
  `nama_model` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `model`
--

INSERT INTO `model` (`id_model`, `nama_model`, `photo`) VALUES
(1, 'Smokring', '1.jpg'),
(2, 'Poni', '2.jpg'),
(3, 'Blackout', '3.jpg'),
(4, 'Poni Lurus Sekali', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` char(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telp`) VALUES
('10001', 'Puskesmas porong (Dr.Esty)', 'Mindi, Porong', '08123573776'),
('10002', 'Pawan', 'Griyo kebraon utara AH/22', '08121644854'),
('10003', 'Prayit', 'Griya permata gedangan Q4/8', '08121606077'),
('10004', 'Paul', 'Bougenville', '081234568312'),
('10005', 'Puskesmas Mbarengkrajan', 'Mbarengkrajan', '0318970408'),
('10006', 'Pipit', 'Kalibader', '081993690416'),
('10007', 'Prapti', 'Ds. Panjer plosoklaten', '085755854396'),
('10008', 'Widya Pabrik petis', 'Tawangsari barat 5, sebelah pdam', '03170760988'),
('10009', 'Pemerintah daerah sidoarjo (Indah)', 'Pendopo, Pemda Sidoarjo', '081332335345'),
('10010', 'Nasir', 'Pondok maritim B5-15 karangklumprik', '03192265566'),
('10011', 'Nurul', 'Jl. Albatros 168 Sidoarjo', '081330772492'),
('10012', 'Dokter Nina', 'Bougenville P-19 No.38', '08123490030'),
('10013', 'Nugroho', 'Perum taman A', '0316012469'),
('10014', 'Nugroho', 'Perum taman sidorejo B/17', '081515181717'),
('10015', 'Nanang', 'Bougenville ZA 30/15', '087850666677'),
('10016', 'Nurhayati', 'Ds Ngasem Kediri', '081335963549'),
('10017', 'No', 'Tanggulangin (Bakso)', '081557934469'),
('10018', 'Nita', 'Tiara regency cluster green B/10, Sidoarjo', '082141555407'),
('10019', 'Neny', 'Mutiara citra garden, sidoarjo', '085336914262'),
('10020', 'Neny', 'Puri Indah BC/19', '081331527577'),
('10021', 'Nila', 'Perum tawangsari permai B-82', '081233040606'),
('10022', 'Nono', 'Pondok maritim Blok A/7', '085852018849'),
('10023', 'Medy', 'Bougenville ZA 30/17', '081231551529'),
('10024', 'Madjid', 'Balong pandan RT 5/RW 2', '085732800192'),
('10025', 'Rumah Sakit Rahman Rahim (Bu. Mar)', 'Rumah sakit rahman rahim', '087881450504'),
('10026', 'Mulyaningsih kastari', 'Barengkrajan RT5/ RW2', '081331466701'),
('10027', 'Museni', 'Depan bu joni depo air gilang', '085815258276'),
('10028', 'Masjid citra garden (Bu. Win)', 'Sidoarjo', '085731390023'),
('10029', 'Maya', 'Graha pesona C1/4, modang, tulangan', '081945554336'),
('10030', 'Mul ', 'Samudra asri blok A/15', '081216844972'),
('10031', 'Mustoleh', 'Villa dharma A/12', '085645011997'),
('10032', 'Muji', 'Puscatar jatikalang', '03178048789'),
('10033', 'Mirna', 'Jade garden C2/09, Sukodono', '081915930833'),
('10034', 'Masjid Tawangsari', 'Tawangsari permai', '087521559861'),
('10035', 'Mujid', 'Pondok maritim SS/13', '03183163131'),
('10036', 'Maman', 'Samudra asri E-1 No.9', '081553829195'),
('10037', 'La Diva', 'Jl. Indragiri 35, Surabaya', '085236159262'),
('10038', 'Cik Lany', 'Apartment Educity Claster Stranford Land', '087665023482'),
('10039', 'Lany', 'Lebo agung VII No.12', '081333091999'),
('10040', 'Lis', 'Jl. perum mandiri resident F4/7', '081216603323'),
('10041', 'Lisman', 'Surya agung GI/06', '0317887560'),
('10042', 'Lika', 'Kedunganten, tanggulangin', '08755159646'),
('10043', 'Lia (Bu Rifai)', 'Kahuripan CA 28', '03181207776'),
('10044', 'Liliek (Pak sidik)', 'Daleman 3 No16, Jl.Raden patah', '081332984848'),
('10045', 'Lisa', 'Griyo taman asri CB No.8', '087851639681'),
('10046', 'Bu Lurah Gilang', 'Gilang', '081331977729'),
('10047', 'Lilik', 'Jl. Sunandar P.S Gang VII No.9, Larangan', '081332894947'),
('10048', 'Lina', 'Taman pondok jati', '03172129009'),
('10049', 'Lika', 'Asem jajar, surabaya', '08972526829'),
('10050', 'Lisa', 'Graha asri blok AA-4, Sukodono', '081330218880'),
('10051', 'Luluk', 'Ds Mejengan, Mijen, Krian', '03171747323'),
('10052', 'Lisa', 'Mutiara citra permai No.8', '081331000756'),
('10053', 'Kharim', 'Pondok maritim TT/1', '0317674174'),
('10054', 'Kusni', 'MbarengkrajanRT1/RW1', '082131007471'),
('10055', 'Kristin', 'Ds. Panjer plosoklaten', '087256481123'),
('10056', 'Nanang Karumkit', 'PCP 2, Jl. Mawar Blok 3 No.15', '081354392152'),
('10057', 'Khasiran', 'Gilang', '0317885829'),
('10058', 'Khotimah', 'Jl. Kyai H. Mawardi RT.2 RW.1, Krian', '081231019814'),
('10059', 'Khusnul', 'Kedunganten, tanggulangin', '03156485252'),
('10060', 'Kasdi', 'Pondok maritim SS/7', '03160150144'),
('10061', 'Joni', 'Tawangsari B-105, Taman', '081357035001'),
('10062', 'Joni', 'Bougenville', '081332007355'),
('10063', 'Jati', 'Permata sukodono C2/36', '03181032875'),
('10064', 'Kantor Kecamatan Krembung (Bu. Lis)', 'Krembung', '085733242591'),
('10065', 'Jhohan', 'Jl. Sultan Agung, Malang', '085765923152'),
('10066', 'Jhohan', 'Kahuripan, Sidoarjo', '0315254152'),
('10067', 'Ita', 'Citra garden D-5 No.6', '087212581521'),
('10068', 'Ika', 'Klanderan, kediri', '0319821423'),
('10069', 'Iin', 'Perum pondok maritim DD-9, Karangklumprik', '0317664302'),
('10070', 'Isnaini', 'Ds. Tempel', '082245904589'),
('10071', 'Iis', 'Mandiri resident', '081242562120'),
('10072', 'Umik Indah', 'Mandiri resident, belakang bu Lis', '085021214634'),
('10073', 'Ida', 'Sidokare asri QQ/9', '0318924925'),
('10074', 'Indar', 'Perum Krian Indah', '081235903072'),
('10075', 'Ita', 'Perum bagus A2/10A, Krian', '082232183383'),
('10076', 'Indah', 'Pondok maritim', '081332277977'),
('10077', 'Harun', 'Pondok maritim indah EE-20', '082230006868'),
('10078', 'Pak Harno', 'Taman sidorejo C-23', '03170694156'),
('10079', 'Bu Harno', 'Villa Dharma L/6', '081332394817'),
('10080', 'Bu Hari', 'Perum jenggolo P.S Sunandar', '031896698'),
('10081', 'Harseh', 'Graha permata gedangan L4 No.23', '085852270596'),
('10082', 'Heni', 'Sidokare asri QQ/7', '031754581'),
('10083', 'Herlambang', 'Samudra asri E6/15', '08175106844'),
('10084', 'Haruno', 'Siwalan kerto selatan 2 No.611', '081332090788'),
('10085', 'Hendro', 'Surabaya', '03178694610'),
('10086', 'Haryono', 'Perum graha asri Jl. Papaya A6, Sukodono', '081357153769'),
('10087', 'Hendrik', 'Jl. Kyai Mojo No.40, Jeruk gemping, krian', '089525456522'),
('10088', 'Bu Heri', 'Samudra asri A5, No.12', '085645044340'),
('10089', 'Bu Hendro', 'Perum tawangsari No.159', '081332325295'),
('10090', 'Gutyani', 'Bukit wisma dani X No.14', '08223575599'),
('10091', 'Guntur', 'Perum Tawangsari permai A.156', '081216459751'),
('10092', 'Genta', 'Perum surya resident cluster emerald blok IG-8', '087850502393'),
('10093', 'Gita', 'Griyo taman asri CB/14', '03192002528'),
('10094', 'Gita', 'Perum forest mansion B-12', '03170737073'),
('10095', 'Gatot', 'Tawangsari permai blok A', '08135536625'),
('10096', 'Gianti adikku', 'Tangerang', '087612326922'),
('10097', 'Fuah', 'Samudra asri F2 No.16', '085745209489'),
('10098', 'Fuad', 'Warnet gilang, depan', '03170230599'),
('10099', 'Fitri', 'Samudra asri E1 No.7', '085731363215'),
('10100', 'Firman', 'Perum Gunungsari LL-4', '081664259948'),
('10101', 'Ela', 'Depan UGD Japalis Krian', '0318124552'),
('10102', 'Elly', 'Mutiara citra asri blok 03 No.10, keramean', '082139896988'),
('10103', 'Eko', 'Kletek', '0317860769'),
('10104', 'Elly properti', 'Perum wahyu taman sarirogo AF 27-28', '031340339940'),
('10105', 'Endang', 'Kavling gilang', '089224351176'),
('10106', 'Eny', 'Bougenville BLOK P/30, pondok maritim', '082161774565'),
('10107', 'Erlita', 'Delta raya utara No.44', '081230886990'),
('10108', 'Diah batu bara', 'tawangsari permai DD-8', '082244583990'),
('10109', 'Dian SMP', 'sidokare asri', '087923568965'),
('10110', 'Darmoko jati', 'Griyo taman asri CB/14', '082546625658'),
('10111', 'Dispenda sidoarjo (Bu.Siska)', 'Jl. Pahlawan No.56, sidoarjo', '082115685555'),
('10112', 'Kantor Departemen Pengerjaan Umum (DPU)', 'Gayung Kebonsari No.04', '08121674252'),
('10113', 'Didit', 'Taman sidorejo C-23', '082140727119'),
('10114', 'Diknas pendidikan', 'Jl. Pahlawan', '081330304135'),
('10115', 'Dina', 'Jl. Gajah mada mojokerto', '0811325857'),
('10116', 'David ', 'Simo jamur IV/1060, surabaya', '0812350360'),
('10117', 'Dewi', 'Kahuripan Blok AC No.15', '03181111925'),
('10118', 'Dhofir', 'Kahuripan B Raya', '087581252282'),
('10119', 'Dewo', 'Pondok maritim No.69, karangklumprik', '081703214981'),
('10120', 'Catrin', 'Kutisari indah selatan 1/23', '081282286847'),
('10121', 'Corry', 'Kahuripan CA 28 No.12', '08563399173'),
('10122', 'Choiri', 'Kedungturi permai Jl. Beliton 14-24', '0317877962'),
('10123', 'Chodim', 'Graha permata blok A-12', '03177066082'),
('10124', 'Badriyah', 'Tawangsari permai', '08755212525'),
('10125', 'Balai desa gilang', 'Gilang', '081230618177'),
('10126', 'Rumah sakit Bhayangkara', 'Jl. Ahmad yani surabaya', '081332865165'),
('10127', 'BPBD sidoarjo', 'Sidoarjo', '081330170243'),
('10128', 'Budi', 'Graha asri M1', '087853265011'),
('10129', 'Binarti', 'SMAN Jumundo Taman', '081357023282'),
('10130', 'Bandi', 'Bougenville Y29 balasklumprik', '03191325095'),
('10131', 'Barokah', 'Kletek', '0315425152'),
('10132', 'Budi Florencia', 'Florencia', '03160441737'),
('10133', 'Budi Bea Cukai', 'Pondok maritim UU 8284', '0317664531'),
('10134', 'Budi', 'Kavling gilang', '0315524252'),
('10135', 'Balai desa sidorejo', 'Sidorejo', '0318985638'),
('10136', 'Asri', 'Perum villa dherma ', '085645011997'),
('10137', 'Amin', 'Tawangsari permai B43', '085121845451'),
('10138', 'Adi', 'Counter tawangsari', '085645009964'),
('10139', 'Acil', 'Tawangsari permai A-24', '03171871220'),
('10140', 'Agus', 'Bougenville Y-29 No.12, pondok maritim', '081330709523'),
('10141', 'Agus', 'Magersari RT.18, sidoarjo', '081703046905'),
('10142', 'Agus', 'Graha asri sukodono blok M No/11', '081330709523'),
('10143', 'Amat', 'Griyo taman asri', '081938821316'),
('10144', 'Cik Ahong', 'Wisata bukit mas E8/16', '081330615588'),
('10145', 'Ani (Bu suroto)', 'Tawangsari permai ', '081231150618'),
('10146', 'Anita', 'Jl. Indrokilo Dsn. Ngujung, pandanrejo', '082141555407'),
('10147', 'Aseh', 'Griyo taman asri EB-18', '03145224555'),
('10148', 'Rumah sakit pusdik porong (Bu Asih)', 'Porong', '081331466701'),
('10149', 'Ana', 'Barata jaya G.1 No.23A', '082230328819'),
('10150', 'Adip', 'Jl. lilium barat 19, kraton resident, krian', '081231601212'),
('10151', 'Anik', 'Graha mutiara asri, candi', '03171426669'),
('10152', 'Ari', 'Villa dherma F-7', '082140973446'),
('10153', 'Ari', 'Graha mutiara sukodono', '03124545212'),
('10154', 'Ainuk', 'Tanjungsari, tanjung anom RT.5 RW.3', '03172472330'),
('10155', 'Anggoro', 'Perum taman I blok A16', '08977265688'),
('10156', 'Ayu', 'Griyo taman asri EC-23', '03178456989'),
('10157', 'Klinik barengkrajan (Bu Ayu)', 'Mbarengkrajan', '081554094006'),
('10158', 'Ayu', 'Kebonsari elveka kavling 18', '08123033346'),
('10159', 'Andik', 'Jl. lilium barat No.20, Perum kraton resident', '081330974447'),
('10160', 'Aris', 'Florencia', '081331426000'),
('10161', 'Asma', 'Ngelom', '03102564582'),
('10162', 'Amin flurida', 'Graha asri sukodono', '03125457585'),
('10163', 'Astri', 'Griyo taman asri DD', '08123094507'),
('10164', 'Arista', 'Safira blue resort A-9', '081336938416'),
('10165', 'Anis', 'Jl. panden boro RT.11 RW3', '081703612368'),
('10166', 'Samara', 'Wisma permai', '081331378065'),
('10167', 'Yayuk', 'kedondong RT6 RW20, tulangan', '08123988855'),
('10168', 'Ita', 'Mbrangkrajan, krian', '082116515868'),
('10169', 'Nensi', 'Gresik, menganti', '085230818141'),
('10170', 'Puslatdisarmil', 'Jl. Juanda', '03135612422'),
('10171', 'Wiwit', 'Pondoh mutiara Cluster 31', '08179300095'),
('10172', 'Asri', 'Binangun Indah NO 18 Candi', '087545458545'),
('10173', 'Sugianto', 'Taman royal 3 Blok A4 No.27', '081524542811'),
('10174', 'Ulfa', 'Kedondong, sidoarjo', '03154258152'),
('10175', 'Nugroho', 'Perum sidodadi, krian', '085124554158'),
('10176', 'Rudy', 'Kavling gilang', '03155444582'),
('10177', 'Eka', 'Pesona sari Blok F No.12A', '081358100877'),
('10178', 'Enik', 'Perumahan permata alam permai', '081357587725'),
('10179', 'Anggra', 'Kebonsari RT 7 RW 01, candi', '085895629940'),
('10180', 'Yudi', 'Pesona sari blok A/2, candi', '03151214262'),
('10181', 'Doddy', 'Galaxy bumi permai blok ii No 10', '03154558484'),
('10182', 'Ida SMKN ', 'Sidoarjo', '0872121545526'),
('10183', 'Nanik', 'Alam pesona', '0892541541145'),
('10184', 'Rosi', 'Florensia G.16, sidoarjo', '081357099565'),
('10185', 'Eny', 'Permata gedangan C4/12', '089255484518'),
('10186', 'Ulfah', 'Kavling gilang', '081703887012'),
('10187', 'Eka', 'Candi. sidoarjo', '082143992011'),
('10188', 'Vita', 'Japanan, sidoarjo', '089221548452'),
('10189', 'Umar', 'Perum taman sidorejo B/17', '088254545458'),
('10190', 'Levina', 'Apartment surabaya', '08121658881'),
('10191', 'SMAN 1 TAMAN', 'Taman', '089454875155'),
('10192', 'Siska', 'Kedondong, tulangan', '082115685555'),
('10193', 'Susi', 'Tawangsari', '081234208080'),
('10194', 'Umii', 'Gajah magersari RT16 RW5', '085731451822'),
('10195', 'Romsiyah', 'Waru', '03183883838');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `id_kategori` int(15) NOT NULL,
  `nama_produk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`) VALUES
('1967052220', 3, 'Istri Melahirkan'),
('1968080519', 1, 'Meeting dengan DIKTI'),
('1977080519', 2, 'Cuti tahunan'),
('1983080220', 5, 'Pandemi Covid-19'),
('1988080920', 4, 'Sakit Demam');

-- --------------------------------------------------------

--
-- Table structure for table `salestrend`
--

CREATE TABLE `salestrend` (
  `tanggal` varchar(20) NOT NULL,
  `jumlah_transaksi` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salestrend`
--

INSERT INTO `salestrend` (`tanggal`, `jumlah_transaksi`) VALUES
('2011', 1025000),
('2011', 1202500),
('2011', 1158750),
('2011', 1640700),
('2011', 925000),
('2010', 7032650),
('2018', 1502000),
('2018', 5459500),
('2018', 7779000),
('2018', 3350000),
('2018', 6712000),
('2018', 4940000),
('2018', 2961950),
('2018', 1556000),
('2018', 6800000),
('2018', 356750),
('2018', 5870000),
('2018', 2231750),
('2018', 3113750),
('2018', 14028000),
('2018', 2003250),
('2018', 1455000),
('2018', 1345250),
('2018', 9939000),
('2018', 3070250),
('2018', 1625000),
('2017', 4317500),
('2017', 5090000),
('2017', 2418750),
('2017', 4199000),
('2017', 5950000),
('2017', 3775000),
('2017', 8436000),
('2017', 3540000),
('2017', 15000000),
('2017', 5910000),
('2017', 1104000),
('2017', 4400000),
('2017', 5702000),
('2017', 5678000),
('2017', 11742000),
('2017', 14142305),
('2017', 1700000),
('2017', 3455000),
('2017', 2247500),
('2017', 3540000),
('2017', 10351175),
('2017', 6358000),
('2017', 8474000),
('2017', 5964750),
('2017', 1293750),
('2017', 7352687),
('2017', 3540750),
('2017', 1500000),
('2017', 4014750),
('2017', 3372350),
('2017', 1032920),
('2017', 1710000),
('2017', 3785600),
('2017', 6147750),
('2017', 3289000),
('2017', 4564250),
('2017', 8223000),
('2017', 4564250),
('2017', 1806000),
('2017', 1925000),
('2017', 2422000),
('2017', 1770000),
('2017', 1771000),
('2016', 975000),
('2016', 4425000),
('2016', 200000),
('2016', 729430),
('2016', 3984000),
('2016', 3062500),
('2016', 3466500),
('2016', 4360000),
('2016', 216250),
('2016', 5941000),
('2016', 2000000),
('2016', 3850000),
('2016', 3717800),
('2016', 3146000),
('2016', 2266675),
('2016', 991000),
('2016', 1637000),
('2016', 3730000),
('2016', 2675000),
('2016', 919000),
('2016', 78723250),
('2016', 810500),
('2016', 988500),
('2016', 4052700),
('2016', 3665350),
('2016', 216250),
('2016', 3640000),
('2016', 6129500),
('2016', 2642000),
('2016', 2049000),
('2016', 9551000),
('2016', 3701593),
('2016', 1033000),
('2016', 1123000),
('2016', 3295450),
('2015', 2595320),
('2015', 3665750),
('2015', 1850000),
('2015', 4655000),
('2015', 2388650),
('2015', 4145250),
('2015', 3690250),
('2015', 5990750),
('2015', 225000),
('2015', 12075800),
('2015', 3593000),
('2015', 8741750),
('2015', 3050000),
('2015', 8982250),
('2015', 846000),
('2015', 6432500),
('2015', 2739000),
('2015', 5400000),
('2015', 2614000),
('2015', 350000),
('2015', 4286700),
('2015', 900000),
('2015', 1101000),
('2015', 5164000),
('2015', 2617500),
('2015', 11200000),
('2014', 10025000),
('2014', 800000),
('2014', 1935000),
('2014', 6511500),
('2014', 1434750),
('2014', 600000),
('2014', 4289000),
('2014', 840000),
('2014', 5620000),
('2014', 1340000),
('2014', 7775000),
('2014', 4105750),
('2014', 5130000),
('2014', 2447000),
('2014', 6515750),
('2014', 1101250),
('2014', 890500),
('2014', 5305500),
('2014', 1778750),
('2014', 1644000),
('2014', 427500),
('2014', 5873000),
('2014', 3454500),
('2014', 6070250),
('2014', 2526500),
('2014', 7536320),
('2014', 6801500),
('2014', 9423000),
('2014', 7536320),
('2014', 1800000),
('2014', 32773758),
('2014', 1277000),
('2014', 7655365),
('2014', 2095920),
('2014', 1315600),
('2014', 16498750),
('2014', 1708705),
('2014', 2895250),
('2014', 16675000),
('2013', 33451000),
('2013', 8254000),
('2013', 984000),
('2013', 2997500),
('2013', 12185500),
('2013', 19442000),
('2013', 9868150),
('2013', 983500),
('2013', 4936500),
('2013', 2826000),
('2013', 5011750),
('2013', 2225650),
('2013', 4281000),
('2013', 4750000),
('2013', 2000000),
('2013', 2389750),
('2013', 1140112),
('2013', 3620000),
('2013', 9420250),
('2013', 2550000),
('2013', 3090500),
('2013', 4419000),
('2013', 280000),
('2013', 1200000),
('2013', 5977500),
('2013', 520000),
('2013', 1442750),
('2013', 560000),
('2013', 2176500),
('2013', 4283500),
('2013', 1808000),
('2013', 245000),
('2013', 520000),
('2013', 660000),
('2013', 3125450),
('2013', 1500000),
('2013', 5336250),
('2013', 7862625),
('2013', 2159000),
('2013', 1700000),
('2013', 1530000),
('2013', 7930000),
('2013', 7059450),
('2012', 1786410),
('2012', 2420900),
('2012', 5937500),
('2012', 15026500),
('2012', 1702000),
('2012', 4604750),
('2012', 12635810),
('2012', 2758400),
('2012', 2298500),
('2012', 616640),
('2012', 3740000),
('2012', 891950),
('2012', 920000),
('2012', 12987500),
('2012', 4253500),
('2012', 1278000),
('2012', 2541000),
('2012', 3162652),
('2012', 4551000),
('2012', 5007000),
('2012', 3494200),
('2012', 1496750),
('2012', 1655500),
('2012', 4231000),
('2012', 1519750),
('2012', 3068000),
('2012', 1438000),
('2012', 2230000),
('2012', 6009500),
('2012', 3791750),
('2012', 1000000),
('2012', 1272000),
('2012', 3895500),
('2012', 3100000),
('2012', 1103000),
('2012', 2130000),
('2012', 2313000),
('2012', 1556500),
('2012', 974000),
('2012', 4675000),
('2012', 4682500),
('2012', 1868200),
('2012', 13474850),
('2012', 2242750),
('2012', 2355750),
('2012', 3504100),
('2012', 625000),
('2012', 235000),
('2012', 1865750),
('2012', 776000),
('2012', 647250),
('2012', 3420900),
('2012', 1007500),
('2012', 4765750),
('2012', 8581250),
('2011', 515500),
('2011', 2632250),
('2011', 1512500),
('2011', 3080000),
('2011', 2199000),
('2011', 2197512),
('2011', 847250),
('2011', 868500),
('2011', 2175500),
('2011', 4511500),
('2011', 1280500),
('2011', 5635750),
('2011', 1993000),
('2011', 1526350),
('2011', 1400000),
('2011', 2015000),
('2011', 804500),
('2011', 211250),
('2011', 2247900),
('2011', 2303000),
('2011', 738500),
('2011', 950000),
('2011', 4203900),
('2011', 2256500),
('2011', 8945500),
('2011', 1947500),
('2011', 2146100),
('2011', 2643000),
('2011', 5322000),
('2011', 911250),
('2011', 15353650),
('2011', 3745000),
('2011', 3085750),
('2011', 4668000),
('2011', 1614000),
('2011', 1224650),
('2011', 1453500),
('2011', 1865000),
('2011', 903100),
('2011', 19796950),
('2011', 5152000),
('2011', 17826500),
('2011', 1434250),
('2011', 1142250),
('2011', 935000),
('2011', 1708250),
('2011', 1818750),
('2011', 3500000),
('2011', 3782000),
('2011', 2204475),
('2011', 5250000),
('2011', 1267000),
('2011', 3304000),
('2011', 1882250),
('2011', 1785000),
('2011', 6211600),
('2011', 2885500),
('2010', 3462250),
('2010', 1398150),
('2010', 3510250),
('2010', 3263250),
('2010', 2006000),
('2010', 1953400),
('2010', 2214600);

-- --------------------------------------------------------

--
-- Table structure for table `tentang`
--

CREATE TABLE `tentang` (
  `id_tentang` int(15) NOT NULL,
  `judul_tentang` varchar(100) NOT NULL,
  `isi_tentang` varchar(255) NOT NULL,
  `keterangan_tambahan` varchar(255) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentang`
--

INSERT INTO `tentang` (`id_tentang`, `judul_tentang`, `isi_tentang`, `keterangan_tambahan`, `gambar`, `aktif`) VALUES
(4, 'CV TITA JAYA DISKON', 'CV Tita Jaya merupakan perusahaan yang bergerak dibidang penjualan produk Interior. Produk dibuat berdasarkan permintaan pelanggann', 'Berlokasi di Sidoarjo dan berdiri sejak tahun 2009', '1130.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `id_pelanggan` int(15) NOT NULL,
  `tanggal` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `tanggal`) VALUES
(1, 10193, '2020-01-07'),
(2, 10190, '2020-01-09'),
(3, 10178, '2020-01-08'),
(4, 10175, '2020-01-05'),
(5, 10189, '2001-12-31'),
(6, 10180, '2020-02-02'),
(7, 10182, '2019-05-05'),
(8, 10157, '2020-01-11'),
(9, 10190, '2020-01-09'),
(10, 10001, '2014-04-03'),
(11, 10002, '2015-07-10'),
(12, 10182, '2020-12-12'),
(13, 10183, '2020-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('admin','manager') NOT NULL DEFAULT 'manager',
  `blokir` enum('N','Y') NOT NULL DEFAULT 'N',
  `id_sessions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'tita@gmail.com', 'admin', 'N', '21232f297a57a5a743894a0e4a801fc3'),
('boboboy', '21232f297a57a5a743894a0e4a801fc3', 'boboboy@gmail.com', 'admin', 'N', '21232f297a57a5a743894a0e4a801fc3'),
('direktur', '21232f297a57a5a743894a0e4a801fc3', 'direktur@staff.com', 'manager', 'N', '21232f297a57a5a743894a0e4a801fc3'),
('manager', '21232f297a57a5a743894a0e4a801fc3', 'manager@gmail.com', 'manager', 'N', 'd41d8cd98f00b204e9800998ecf8427e'),
('uhuy', '21232f297a57a5a743894a0e4a801fc3', 'uhuy@gmail.com', 'manager', 'Y', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
