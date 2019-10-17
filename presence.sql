-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 04:28 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presence`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(5) NOT NULL,
  `nip` varchar(13) NOT NULL,
  `date` date NOT NULL,
  `intime` time NOT NULL,
  `locin` varchar(50) NOT NULL,
  `outtime` time NOT NULL,
  `locout` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `pic` text NOT NULL,
  `customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `nip`, `date`, `intime`, `locin`, `outtime`, `locout`, `subject`, `description`, `pic`, `customer`) VALUES
(27, 'A001', '2018-11-09', '14:32:26', '-6.2308314, 106.8474614', '16:00:00', '-6.230834, 106.8474495', 'meeting', 'tytu', 'tytytytytytytyty', 'ty'),
(31, 'A002', '2018-11-27', '15:38:08', '-6.2311476,106.8469848', '15:41:42', '-6.23103,106.8471778', 'asa', '123213', 'FUNGSI_KOMUNIKASI.png', '21'),
(32, 'A002', '2018-11-27', '15:49:29', '-6.2310338,106.84713620000001', '15:54:50', '-6.2295682,106.8497934', 'asas', 'Lol', 'panjul.PNG', '21'),
(33, 'A120', '2018-11-28', '16:05:03', '-6.2295708,106.8497891', '16:22:32', '-6.2310041,106.8472185', 'Hshs', 'azxaxax', '15433958873344512639008209424870.jpg', '21'),
(34, 'A002', '2018-11-28', '16:06:23', '-6.2297204,106.8495083', '16:23:28', '-6.2295708,106.8497891', 'Bdjdj', 'Hshaj', '15433959516639123852760353952166.jpg', '21'),
(35, 'A002', '2018-11-28', '16:56:26', '-6.2295708,106.8497891', '11:58:17', '-6.2310514,106.8471199', 'Babaha', 'sadsadsad', '15433989758297398905019162881155.jpg', '21'),
(37, 'A120', '2018-11-29', '09:10:11', '-6.2310301,106.8471691', '10:25:10', '-6.2309053,106.8473454', 'qsdqsq', 'asa', 'FUNGSI_KOMUNIKASI.png', '50th Floor Menara BCA Grand Indonesia'),
(38, 'A120', '2019-04-11', '11:02:15', '-6.230884167390978,106.84696448969993', '11:02:25', '-6.230886347254955,106.84694251431442', 'nyoba', 'ulang', '1.PNG', 'PT. ACA Pacific'),
(39, 'A120', '2019-04-11', '11:06:31', '-6.230898928049903,106.84699368767278', '11:11:44', '-6.2308195,106.846813', 'zxzx', 'aa', '1.PNG', '50th Floor Menara BCA Grand Indonesia'),
(40, 'A102', '2019-04-11', '12:33:21', '-6.230868464380272,106.84695556804986', '00:00:00', '', 'aasasas', '', '2012-09-25_234308.png', '50th Floor Menara BCA Grand Indonesia'),
(41, 'A120', '2019-04-26', '10:31:03', '-6.2308268,106.84730189999999', '13:58:49', '-6.2308666,106.84732799999999', 'eeded', 'sa', '1.PNG', '50th Floor Menara BCA Grand Indonesia'),
(42, 'A120', '2019-04-26', '13:59:05', '-6.2308666,106.84732799999999', '14:50:10', '-6.230869500000001,106.8473334', 'qqqqq', 's', 'Capture.PNG', 'APL Tower'),
(43, 'A120', '2019-04-29', '14:50:19', '-6.230869500000001,106.8473334', '09:24:44', '-6.2309519,106.84727459999999', 'sxs', 'k', 'Capture.PNG', '50th Floor Menara BCA Grand Indonesia'),
(44, 'A120', '2019-05-29', '09:24:57', '-6.2309519,106.84727459999999', '09:25:16', '-6.2309519,106.84727459999999', 'nyoba', 'aaaa', '2012-09-25_234308.png', 'Sentral Senayan 2');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(5) NOT NULL,
  `namapt` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `namapt`) VALUES
(4, 'Menara Palma 8th Floor'),
(3, 'PT. ACA Pacific'),
(5, 'PT. Khalifa Mitra Berkah'),
(6, 'Wisma BNI 46'),
(7, 'PT Central Data Technology'),
(8, '959 Skyway Road Suite 300'),
(9, 'Menara Standard Chartered'),
(10, 'Prudential Centre Kota Kasablanka'),
(11, 'BRI II Building'),
(12, 'Alamanda Tower Level 21'),
(13, 'Prince Center Building 110 Floor'),
(14, 'Wisma Nugra Santana 9th Floor Suite 909'),
(15, 'Juke Solutions'),
(16, 'Menlo Security'),
(17, 'Microsoft'),
(18, 'Sentral Senayan II'),
(19, 'Oracle'),
(20, 'Soekarno-Hatta International Airport Building'),
(21, '50th Floor Menara BCA Grand Indonesia'),
(22, 'MD Place'),
(23, 'Kawasan MM 2100'),
(24, 'Gandaria 8 Office Tower '),
(25, 'Ventura Building 71h FIooC'),
(26, 'APL Tower'),
(27, 'Wisma BSG'),
(28, 'Sentral Senayan 2'),
(29, 'Atos Collaboration Solutions'),
(30, 'VM Ware'),
(35, 'tambahinlagi');

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `intime` time NOT NULL,
  `locin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outtime` time NOT NULL,
  `locout` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily`
--

INSERT INTO `daily` (`id`, `nip`, `date`, `intime`, `locin`, `outtime`, `locout`, `note`) VALUES
(35, 'A120', '2018-11-26', '07:10:52', '-6.2310801,106.84713029999999', '14:57:27', '-6.2309944,106.8472168', ''),
(36, 'A120', '2018-11-26', '07:18:15', '-6.2310974,106.8470755', '14:54:00', '-6.2310842,106.84710299999999', ''),
(37, 'A120', '2018-11-26', '07:19:40', '-6.2310974,106.8470755', '14:54:00', '-6.2310842,106.84710299999999', ''),
(38, 'A120', '2018-11-26', '14:28:23', '-6.231008699999999,106.84715469999999', '14:59:29', '-6.2310256,106.8471254', ''),
(39, 'A002', '2018-11-26', '15:04:30', '-6.2310693,106.84714', '15:05:24', '-6.2310693,106.84714', ''),
(40, 'A120', '2018-11-26', '15:05:01', '-6.2310693,106.84714', '11:30:21', '-6.2310853,106.84716429999999', ''),
(41, 'A120', '2018-11-27', '11:49:21', '-6.2310647,106.8471634', '11:49:31', '-6.2310444,106.84718629999999', ''),
(42, 'A120', '2018-11-27', '11:59:45', '-6.231027699999999,106.84723009999999', '11:59:49', '-6.231027699999999,106.84723009999999', ''),
(43, 'A002', '2018-11-27', '15:51:05', '-6.230963399999999,106.8472743', '16:41:12', 'User denied the request for Geolocation.', ''),
(44, 'A002', '2018-11-28', '15:42:49', '-6.230828,106.8474152', '15:42:55', '-6.2308484,106.8474052', ''),
(45, 'A002', '2018-12-06', '11:57:59', '-6.2310514,106.8471199', '11:58:05', '-6.2310514,106.8471199', ''),
(46, 'A120', '2019-04-11', '10:56:42', '-6.230800666666666,106.84685233333331', '11:00:02', '-6.23088058338667,106.84696635828993', ''),
(47, 'A102', '2019-04-11', '12:09:23', '-6.230859487285629,106.84702638054406', '00:00:00', '', ''),
(48, 'A120', '2019-04-26', '10:29:47', '-6.2308240999999995,106.84730499999999', '10:46:39', '-6.230882299999999,106.84731649999999', ''),
(49, 'A120', '2019-04-29', '10:46:43', '-6.230882299999999,106.84731649999999', '10:46:46', '-6.230882299999999,106.84731649999999', ''),
(50, 'A120', '2019-04-29', '10:46:49', '-6.230882299999999,106.84731649999999', '10:53:08', '-6.230882299999999,106.84731649999999', ''),
(51, 'A120', '2019-05-17', '13:01:00', '-6.3240102,106.7672881', '13:02:13', '-6.3240102,106.7672881', ''),
(52, 'A120', '2019-05-29', '09:24:27', '-6.2309519,106.84727459999999', '09:24:32', '-6.2309519,106.84727459999999', '');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `kd` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`kd`, `jabatan`, `created_at`, `updated_at`) VALUES
('D001', 'Direksi', NULL, NULL),
('O001', 'Operational', NULL, NULL),
('S001', 'Sales and Marketing', NULL, NULL),
('T001', 'Technical', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `subject`, `email`, `status`, `description`, `created_at`, `updated_at`) VALUES
(26, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', 'readed', '', NULL, NULL),
(27, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', 'readed', '', NULL, NULL),
(28, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', 'readed', '', NULL, NULL),
(29, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', 'readed', '', NULL, NULL),
(30, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', 'readed', '', NULL, NULL),
(31, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', '', '', NULL, NULL),
(32, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', '', '', NULL, NULL),
(33, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', '', '', NULL, NULL),
(34, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', '', '', NULL, NULL),
(35, 'Im forgot my password', 'hasby.ash@ib-synergy.co.id', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `nip` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hakakses` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`nip`, `nama`, `gender`, `email`, `kd`, `password`, `hakakses`, `created_at`, `updated_at`) VALUES
('A000', 'Anyun', 'Perempuan', 'op@gmail.com', 'T001', '161ebd7d45089b3446ee4e0d86dbcf92', 'super user', NULL, NULL),
('A001', 'Ardiann', 'Laki-laki', 'ardian@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'super user', NULL, NULL),
('A002', 'Ahmad', 'Laki-laki', 'ahmad@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'super user', NULL, NULL),
('A003', 'Riza Azhari', 'Laki-laki', 'riza.azhari@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'super user', NULL, NULL),
('A102', 'Anggitrizaka Subagyo', 'Laki-laki', 'kar@gmail.com', 'S001', '161ebd7d45089b3446ee4e0d86dbcf92', 'karyawan', NULL, NULL),
('A103', 'Anggreyni Frisilia Kordak', 'Perempuan', 'anggreyni.frisilia@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'admin', NULL, NULL),
('A104', 'Chairul Ichsan', 'Laki-laki', 'chairul.ichsan@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A105', 'Wahyu Wijaya Kusuma', 'Laki-laki', 'wahyu.wijayakusuma@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A106', 'David Armansyah', 'Laki-laki', 'david.armansyah@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A107', 'Dian Ratnadewi', 'Perempuan', 'dian@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A108', 'Diana Aulia', 'Perempuan', 'diana.aulia@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'admin', NULL, NULL),
('A109', 'Eduardus Rumyaan', 'Laki-laki', 'eduardus.rumyaan@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A110', 'Eko Susilo', 'Laki-laki', 'eko.susilo@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A111', 'Fajar Wibawa', 'Laki-laki', 'fajar.wibawa@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A112', 'Farid Zamzami', 'Laki-laki', 'farid.zamzami@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A113', 'Franky Jonly', 'Laki-laki', 'franky@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A114', 'Hanifah Mega Putri', 'Perempuan', 'hanifah.megaputri@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A115', 'Hardani Kusuma', 'Laki-laki', 'hardani.praja@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A116', 'Irsyad Prima Yunanto', 'Laki-laki', 'irsyad.prima@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A117', 'Mardiana', 'Perempuan', 'mardiana@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'admin', NULL, NULL),
('A118', 'Mariana Murniasih', 'Perempuan', 'mari', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A119', 'Michael Juniardi Yusuf', 'Laki-laki', 'michael.juniardi@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A120', 'Muhammad Hasby Ash Shieddieqy', 'Laki-laki', 'hasby.ash@ib-synergy.co.id', 'O001', '9116cb602ca5ecc60c54efc7360b4c64', 'admin', NULL, NULL),
('A121', 'Muhammad Rizal', 'Laki-laki', 'muhammad.rizal@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A122', 'Nova Budiman', 'Laki-laki', 'nova.budiman@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A123', 'Nuke Reinati Diso', 'Perempuan', 'nuke.diso@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A124', 'Nurcholis Hifna', 'Laki-laki', 'nrhifna@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A125', 'Nuriyah Syakiela', 'Perempuan', 'nuriyah.syakiela@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A126', 'Pambudi Indro Pratomo', 'Laki-laki', 'pambudi.ip@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'admin', NULL, NULL),
('A127', 'Raditya Arief Hidayat', 'Laki-laki', 'raditya.arief@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A128', 'Rangga Pramono', 'Laki-laki', 'rangga.pramono@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A129', 'Sapto Prasetyo', 'Laki-laki', 'sapto.prasetyo@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A130', 'Selvi Apriyanti', 'Perempuan', 'selvi.apriyanti@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A131', 'Stenly Purba', 'Laki-laki', 'stenly.simamora@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A132', 'Susilowati', 'Perempuan', 'susilowati@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A133', 'Wildan Abdat', 'Laki-laki', 'wildan.abdat@ib-synergy.co.id', 'S001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A134', 'Yan Permana', 'Laki-laki', 'yan.permana@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A135', 'Yerry Tualena', 'Laki-laki', 'yerry.tualena@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A136', 'Yoga Prakoso', 'Laki-laki', 'yoga.prakoso@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A137', 'Yustinus Mamik Julianto', 'Laki-laki', 'yustinus@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A138', 'Asa', 'Laki-laki', 'asa@ib-synergy.co.id', 'O001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL),
('A139', 'Asep Afrizal', 'Laki-laki', 'asep.afrizal@ib-synergy.co.id', 'T001', '620ce6b4b89568046a3cffd48ad45b88', 'karyawan', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`kd`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
