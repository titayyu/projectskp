-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 01:27 PM
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
-- Database: `coba2`
--

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
(2, 'Pelayanan Maksimal', 'fa fa-star'),
(3, 'Bebas Memilih Bahan', 'fa fa-thumbs-up'),
(1, 'Banyak Diskon 10%', 'fa fa-money'),
(4, 'Dapatkan Banyak Voucher!', 'fa fa-gallery');

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
(1, 'Glamor', '1.jpg', 'Y'),
(2, 'Old but Gold', '2.jpg', 'Y'),
(3, 'Stylish', '3.jpg', 'Y'),
(4, 'Lovely', '4.jpg', 'Y');

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
  `alamat` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `facebook` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `twitter` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `twitter_widget` text COLLATE latin1_general_ci NOT NULL,
  `google_map` text COLLATE latin1_general_ci NOT NULL,
  `favicon` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_pemilik`, `judul_website`, `url`, `meta_deskripsi`, `meta_keyword`, `alamat`, `email`, `telp`, `facebook`, `twitter`, `twitter_widget`, `google_map`, `favicon`) VALUES
(3, 'TITA JAYA', 'CRM TITA JAYA', 'titajaya.co.id', 'Menjual Produk Interior', 'Menjual Produk Interior', 'Tawangsari Permai, A-20, Taman, Sidoarjo', 'titajayaa@gmail.com', '081336546637', 'Tita Jaya', '@titayyu', '', '', '');

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
(1, 1, 'manager', 'Temukan diskon terbaru!', 'temukan-diskon-terbaru', 'Temukan Diskon Tahun Baru. Temukan Diskon Tahun Baru. Temukan Diskon Tahun Baru. Temukan Diskon Tahun Baru. Temukan Diskon Tahun Baru', '2019-10-10', 'Kamis', '1094.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(15) NOT NULL,
  `nama_jadwal` varchar(100) NOT NULL,
  `alamat_jadwal` varchar(200) NOT NULL,
  `telp_jadwal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Wallpaper', 'Jual Wallpaper dengan berbagai macam model. Jual Wallpaper dengan berbagai macam model. Jual Wallpaper dengan berbagai macam model.Jual Wallpaper dengan berbagai macam model', 'fa fa-star'),
(2, 'Gorden', 'Jual gorden dengan berbagai macam model dan ukuran. Jual gorden dengan berbagai macam model dan ukuran.. Jual gorden dengan berbagai macam model dan ukuran.', 'fa fa-bug'),
(3, 'Blinds', 'Jual aneka macam blinds. Jual aneka macam blinds.. Jual aneka macam blinds.. Jual aneka macam blinds.', 'fa fa-diamond');

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
(0, 'Yosef Murya', 'yosefmurya@gmail.com', '08562555665', 'Mohon informasi PMB untuk tahun 2019 dimulai kapan ya??'),
(0, 'Tita Ayu', 'alibaba@gmail.com', '081336546637', 'halo assalamualaikum');

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
  `level` enum('admin','user') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `link`, `icon`, `main_menu`, `level`) VALUES
(2, 'Jenis Pelanggan', 'jenis', 'fa fa-trophy', '12', 'admin'),
(3, 'Daftar Items', 'items', 'fa fa-thumbs-o-up', '12', 'admin'),
(4, 'Pelanggan', 'pelanggan', 'fa fa-users', '12', 'user'),
(6, 'Transaksi', 'transaksi', 'fa fa-pencil-square-o', '12', 'admin'),
(10, 'User', 'users', 'fa fa-user', '13', 'user'),
(11, 'Menu', 'menu', 'fa fa-eye', '13', 'admin'),
(12, 'CRM', '#', 'fa fa-star-o', '0', 'admin'),
(13, 'SETTING', '#', 'fa fa-gear', '0', 'admin'),
(14, 'INFO CV TITA JAYA', '#', 'fa fa-info-circle', '0', 'admin'),
(16, 'Kategori Produk', 'kategori', 'fa fa-server', '14', 'admin'),
(17, 'Info Terkini', 'informasi', 'fa fa-newspaper-o', '14', 'admin'),
(18, 'Model', 'model', 'fa fa-tags', '12', 'admin'),
(19, 'Tentang CV Tita Jaya', 'tentang', 'fa fa-info', '14', 'admin'),
(20, 'Fasilitas', 'fasilitas', 'fa fa-suitcase', '14', 'admin'),
(21, 'Produk', 'produk', 'fa fa-diamond', '14', 'admin'),
(22, 'Gallery', 'gallery', 'fa fa-photo', '14', 'admin'),
(23, 'Kontak', 'kontak', 'fa fa-volume-control-phone', '14', 'admin'),
(24, 'Transaksi', 'transaksi', 'fa fa-diamond', '12', 'admin'),
(25, 'Jadwal', 'jadwal', 'fa fa-diamond', '12', 'admin');

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
  `id_jenis` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_jenis`, `nama`, `alamat`, `telp`, `photo`) VALUES
('1602071895799', 6, 'Ezekiel', '6737 Aliquam Avenue', '0794665825', ''),
('1603061028199', 2, 'Myra', 'Ap #957-1759 Feugiat Av.', '0793145343', ''),
('1604051404299', 2, 'Noble', 'P.O. Box 301, 3744 Lobortis Rd.', '0738662051', ''),
('1607021008999', 6, 'Ursa', '333-4072 Bibendum St.', '0394919086', ''),
('1608071915699', 7, 'Riley', '7860 Ipsum Street', '0187871543', ''),
('1609010164999', 2, 'August', '468-8193 Ut St.', '0910152479', ''),
('1609101359099', 1, 'Asher', '411-9934 Vehicula St.', '0401437047', ''),
('1610010836699', 1, 'Armand', '2718 Tempus St.', '0385748813', ''),
('1611090234499', 7, 'Raymond', 'P.O. Box 307, 9225 Fames Rd.', '0484453672', ''),
('1612040153499', 2, 'Felicia', 'P.O. Box 156, 1388 Nullam Road', '0671262622', ''),
('1613120315199', 2, 'Ivy', '7501 Arcu. Rd.', '0603908974', ''),
('1614011027599', 1, 'Jana', 'P.O. Box 675, 9446 Sit Av.', '0153322035', ''),
('1614122471399', 2, 'Odysseus', 'Ap #236-5658 Vehicula St.', '0730989825', ''),
('1617112666999', 7, 'Blythe', '3944 Libero Av.', '0340750619', ''),
('1619051492299', 1, 'Garth', 'P.O. Box 610, 3688 Aenean Ave', '0933760209', ''),
('1619121947499', 6, 'Fuller', 'P.O. Box 267, 5265 Risus Rd.', '0263724320', ''),
('1620121737799', 2, 'Hector', '832-8289 Facilisis Rd.', '0126837507', ''),
('1622061907299', 1, 'Dominic', 'Ap #602-4027 Scelerisque Street', '0752774226', ''),
('1624071142499', 2, 'Orli', 'P.O. Box 688, 834 Natoque Rd.', '0364336684', ''),
('1625020316099', 7, 'Dylan', '644-2652 Mauris Ave', '0322927646', ''),
('1625072106299', 2, 'Randall', 'P.O. Box 153, 8611 Augue, Road', '0640274495', ''),
('1625082216599', 2, 'Ahmed', '353-4799 Orci. Rd.', '0211375748', ''),
('1627092741299', 2, 'Bruce', 'Ap #833-2153 Interdum. Avenue', '0691402153', ''),
('1628020901899', 7, 'Ann', '6679 Parturient Avenue', '0479680646', ''),
('1628032405199', 6, 'Matthew', 'P.O. Box 980, 5447 Placerat St.', '0146306254', ''),
('1629011287199', 2, 'Erasmus', 'P.O. Box 364, 9808 Ipsum. Rd.', '0929977704', ''),
('1629092014399', 2, 'Tanisha', 'P.O. Box 607, 7695 Odio St.', '0851636310', ''),
('1629111540199', 2, 'Elton', '2993 Arcu St.', '0975145423', ''),
('1630052843299', 7, 'Philip', '9333 Ut Av.', '0851650451', ''),
('1631032085299', 6, 'Zeus', '629-3112 Ipsum St.', '0524361833', ''),
('1631102061099', 1, 'Philip', '9274 Massa Street', '0219816679', ''),
('1633030971399', 1, 'Leigh', '9600 Ipsum Rd.', '0714605331', ''),
('1633091850199', 7, 'Erasmus', '423-5156 Dapibus Rd.', '0305946648', ''),
('1638060188599', 7, 'Hedda', 'P.O. Box 456, 1367 Egestas Rd.', '0680132329', ''),
('1639011900399', 1, 'Casey', 'P.O. Box 547, 7675 At, Road', '0397231022', ''),
('1639092965999', 7, 'Mufutau', '7335 Id Avenue', '0451172000', ''),
('1640082102599', 6, 'Avram', 'Ap #978-8937 Nisi. Ave', '0729477297', ''),
('1642052334499', 1, 'Hamilton', 'Ap #957-8668 Tristique Av.', '0778437564', ''),
('1642092565599', 7, 'Kendall', 'P.O. Box 748, 6912 Nec, St.', '0757706064', ''),
('1643051230699', 6, 'Laurel', '910-4759 Maecenas Av.', '0288281750', ''),
('1644072536999', 7, 'Scarlet', 'Ap #746-2827 Consequat St.', '0157137586', ''),
('1644111630099', 7, 'Calvin', '935-660 Eget, Av.', '0705527671', ''),
('1646010628099', 1, 'Veronica', 'Ap #643-3211 Dictum Road', '0537407790', ''),
('1646080577699', 2, 'Melinda', 'P.O. Box 256, 9723 Ac St.', '0104647981', ''),
('1646090197299', 2, 'Olympia', '2778 Tellus, Street', '0770363371', ''),
('1647032681699', 2, 'Allen', 'P.O. Box 670, 4834 Nullam St.', '0752189177', ''),
('1647040546499', 2, 'Chandler', '4358 Phasellus Avenue', '0302857124', ''),
('1651012165699', 1, 'Judith', 'P.O. Box 183, 1637 Iaculis Street', '0690089066', ''),
('1651021974399', 1, 'Carly', '882-4814 Cubilia Rd.', '0126451733', ''),
('1653111050199', 1, 'Danielle', '505 Risus. Street', '0543847947', ''),
('1655012064999', 7, 'Diana', 'Ap #355-1358 Diam Street', '0691859106', ''),
('1655041895299', 1, 'Stuart', '700-7027 At Street', '0113006787', ''),
('1655111211599', 2, 'Wanda', 'P.O. Box 641, 718 Gravida Rd.', '0285383795', ''),
('1658051439099', 1, 'Lacy', 'P.O. Box 505, 7730 Faucibus Road', '0323108590', ''),
('1659020998599', 7, 'McKenzie', 'Ap #795-1615 Enim. Rd.', '0555856606', ''),
('1659051646999', 2, 'Suki', 'Ap #472-924 Proin Av.', '0629637653', ''),
('1660050791899', 1, 'Chandler', 'Ap #491-6728 Dictum Rd.', '0094870088', ''),
('1660052521799', 7, 'Alana', '1130 Pharetra Av.', '0609677350', ''),
('1661072439199', 6, 'Gannon', 'P.O. Box 335, 4927 Nec Avenue', '0543437199', ''),
('1661100233799', 7, 'Nasim', 'Ap #363-5493 Lobortis Avenue', '0998491811', ''),
('1661111712299', 1, 'Adena', 'P.O. Box 447, 7968 Et Rd.', '0357699558', ''),
('1664072548399', 1, 'Raya', '9508 Interdum Street', '0322268014', ''),
('1664092375599', 7, 'Nicholas', '680-5578 Enim Rd.', '0845312485', ''),
('1665043095699', 6, 'Jade', 'Ap #469-6193 Eu St.', '0942250182', ''),
('1665082237299', 2, 'Shelby', 'P.O. Box 609, 3321 Sed St.', '0670049596', ''),
('1666011245299', 2, 'Jelani', 'P.O. Box 353, 9017 Vestibulum, St.', '0455858433', ''),
('1666072994699', 1, 'Lynn', '397 Nibh. St.', '0164164824', ''),
('1666111968399', 1, 'Yen', '8651 Sed Road', '0490603547', ''),
('1666122312899', 7, 'Sara', 'Ap #989-6206 Diam Ave', '0863787287', ''),
('1667041944399', 6, 'Kuame', '8895 Luctus Ave', '0665379605', ''),
('1669121823799', 2, 'Sigourney', 'P.O. Box 897, 5200 Enim. Avenue', '0566293671', ''),
('1670092924899', 1, 'Barry', '9407 Non, St.', '0544599078', ''),
('1671050475499', 7, 'Evangeline', 'Ap #766-3656 Dolor. Rd.', '0298644804', ''),
('1673111151099', 2, 'Lynn', 'Ap #375-6987 Mus. St.', '0701565118', ''),
('1674052472199', 1, 'Kenneth', 'Ap #752-2767 Eget Rd.', '0927223468', ''),
('1675051262699', 2, 'Baxter', 'P.O. Box 422, 3535 Amet Rd.', '0598073559', ''),
('1678030944999', 6, 'Cameron', '1902 Urna Street', '0202838098', ''),
('1678032540399', 2, 'Devin', '1670 Egestas Street', '0352562870', ''),
('1678102829399', 6, 'Sophia', '224-6569 Quisque Rd.', '0076604414', ''),
('1679120549599', 7, 'Ferdinand', '469-2974 Curabitur St.', '0439978790', ''),
('1681051902999', 7, 'Yetta', '674-9599 Fringilla. St.', '0324690066', ''),
('1682021349399', 7, 'Calvin', '275-6598 Aliquam Ave', '0384716358', ''),
('1683060553899', 1, 'Hashim', 'P.O. Box 656, 9606 Dictum Road', '0091550575', ''),
('1683062117099', 6, 'MacKensie', 'Ap #515-8192 Aliquam Av.', '0006172980', ''),
('1684022324999', 6, 'Colleen', '9562 Nullam Avenue', '0680725326', ''),
('1685020354099', 1, 'Vincent', '531-7202 Ac St.', '0608705494', ''),
('1685042604599', 6, 'Emi', '2222 Per Road', '0109680268', ''),
('1685060162499', 2, 'Sylvester', '8334 Vulputate, St.', '0924817784', ''),
('1686050393299', 6, 'Cassidy', 'P.O. Box 530, 3139 At Ave', '0767348911', ''),
('1686051228099', 6, 'Brielle', '723 Elit Road', '0927932533', ''),
('1686082133399', 2, 'Ryan', 'P.O. Box 832, 2814 Arcu. Street', '0327583636', ''),
('1687032584299', 1, 'Octavius', '727 Suspendisse Av.', '0613354910', ''),
('1690111225199', 6, 'Quamar', '304-1432 Enim. Road', '0609616027', ''),
('1691122501699', 6, 'Xantha', 'P.O. Box 110, 3432 Urna St.', '0389061257', ''),
('1692052295899', 6, 'Germaine', '4200 Quisque Street', '0343926253', ''),
('1693081090899', 1, 'Susan', '359-578 Sit Rd.', '0146543832', ''),
('1694091918699', 2, 'Justine', '5694 Lacinia Rd.', '0937978091', ''),
('1694120526999', 1, 'Timothy', '746-7146 Penatibus Street', '0578938930', ''),
('1696030402799', 1, 'Blythe', '261-7626 Urna, St.', '0926210743', ''),
('1697120652099', 1, 'Denton', 'P.O. Box 240, 1505 A Rd.', '0821191868', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `id_kategori` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `id_kategori`) VALUES
('FKB1001', 'SAVANA 001 COKLAT', 2),
('FKB3001', 'SAVANA OO2 BIRU', 1),
('FKB3002', 'SAVANA 003 KUNING', 2),
('FKB3003', 'SAVANA 004 HIJAU', 1),
('FKB4004', 'VITRAS JASY 021', 2),
('FKB4012', 'VITRAS JACY 091', 2),
('FKK1001', 'VITRAS LAHESA PUTIH SUSU', 2),
('FPB1001', 'BIAKA 91 PUTIH', 2),
('PKK1003', 'KING 019 ', 1),
('UKK1004', 'LAVENSA 211 POLOS', 1),
('UPK1002', 'LASENZA 918 PUTIH', 1),
('UPK200X', 'LASENZA 981 BIRU', 1);

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
(4, 'CV TITA JAYA', 'CV Tita Jaya merupakan perusahaan yang bergerak dibidang penjualan produk Interior. Produk dibuat berdasarkan permintaan pelanggan', 'Berlokasi di Sidoarjo dan berdiri sejak tahun 2009', '1130.jpg', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(15) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `id_pelanggan` char(15) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `deskripsi_transaksi` varchar(250) NOT NULL,
  `quantity` varchar(15) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `id_pelanggan`, `id_produk`, `deskripsi_transaksi`, `quantity`, `harga`, `total`) VALUES
(63664, '02/23/2009', '1678030944999', 3, 'in felis. Nulla tempor augue ac ipsum. Phasellus', '12', '58.380', '8.796.000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `blokir` enum('N','Y') NOT NULL DEFAULT 'N',
  `id_sessions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `level`, `blokir`, `id_sessions`) VALUES
('2017010001', 'e10adc3949ba59abbe56e057f20f883e', 'bima@gmail.com', 'user', 'N', 'e10adc3949ba59abbe56e057f20f883e'),
('admin', '21232f297a57a5a743894a0e4a801fc3', 'yosefmurya@gmail.com', 'admin', 'N', '21232f297a57a5a743894a0e4a801fc3'),
('manager', '123', 'manager@gmail.com', 'admin', 'N', ''),
('alibaba@gmail.com', '240a8254415e3c29e645fb3fb4343bc0', 'as', '', 'Y', '240a8254415e3c29e645fb3fb4343bc0'),
('alibaba@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 'titarospriciliaa@gmail.com', 'admin', 'Y', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

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
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_jenis` (`id_jenis`);

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
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_produk`),
  ADD KEY `id_pelanggan_2` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
