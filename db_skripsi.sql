-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2021 at 12:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `bidang_ilmu` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `name`, `foto`, `level`, `nip`, `bidang_ilmu`, `jabatan`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'admin.png', 1, '90909090911', 'teknik informatika', 'dosen'),
(2, 'tuti', '2704d9e0ccab504bc5294f9b5e3c0467', 'astuti similikiti123123', '', 1, '909090', 'teknik parawisata kemaritiman', 'tidak ada kodong'),
(5, 'tim', 'b15d47e99831ee63e3f47cf3d4478e9a', 'Tim Penilai\r\n', '', 3, '91823123123123123', 'Teknik Informatika', 'Tim Penilai\r\n'),
(6, 'ketua', '00719910bb805741e4b7f28527ecb3ad', 'Ketua Tim', '', 2, '98237', 'Teknik Informatik', 'Ketua Tim Penilai'),
(7, 'tim2', '77b6fc6736661135bfe5f07d508ac397', 'Tim Penilai 2', '', 3, '9182312312312333', 'Teknik ', 'Tim penilai'),
(8, '199011282019043001', 'fd5ab87f4ed0cfb354f98f8a3048cd94', 'Iqra\' Aswad, S.T., M.T ', '', 4, '199011282019043001', 'Teknik Informatika', 'Dosen'),
(9, 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 'Super Admin', '', 5, '1998273600192', 'Teknik', 'Dosen'),
(22, '8', 'c9f0f895fb98ab9159f51fd0297e236d', 'Dr. Latifah Rahman, M.Sc, Apt.', '', 4, '195706151984032002', '8', '8'),
(23, '197202271998022002', '38ced611f284ab7428b7682403d5d24b', 'M a k h r a n i, S.Si. M.Si', '', 4, '197202271998022002', '197202271998022002', '197202271998022002'),
(24, '199304222019032018', '0b004fa8df30f120b2ae178d98fc6cdc', 'Prof. Dr. dr. Muhammad Syafar, MS.', '', 4, '199304222019032018', 'tes', 'tes'),
(25, '195809061986011001', 'e10adc3949ba59abbe56e057f20f883e', 'Dr. Ridwan Mochtar Thaha, M.Sc.', '', 1, '195809061986011001', 'informatika 123', 'dosen 123'),
(26, '196412311990022001', 'b93939873fd4923043b9dec975811f66', 'Dr. Nurhaedar Jafar, Apt.,M.Kes.', '', 3, '196412311990022001', 'tim', 'tim'),
(27, '195501051978021001', 'd83719b67510e7a63023ab4c195ed333', 'Dr. Bualkar Abdullah, M.Eng.Sc.', '', 3, '195501051978021001', 'tes', 'tes'),
(28, '199403202021015001', 'ea351e3b0bd5c427e4c403406fe40354', 'Andi Iqra Pradipta Natsir, SE., M.Si., Ak', '', 4, '199403202021015001', '', 'Dosen'),
(29, '195112221976031001', 'a3b4b1285a03eea28396a31c71d176d6', 'Prof. Dr. Ir. Achmar Mallawa, DEA.', '', 4, '195112221976031001', '', 'Dosen'),
(30, '194812271973031001', '5cba5f8c9f3177214b7b2b1c8f623590', 'Prof. Dr. Ir. H.M. Natsir Nessa, MS.', '', 4, '194812271973031001', '', 'Dosen'),
(31, '194608211974121001', '2661c20c60127c7685f4bb656e12e1f2', 'Prof. Dr. Ir. Hammada Abbas, MS.,ME.', '', 4, '194608211974121001', '', 'Dosen'),
(32, '198707052018074001', 'b24cd0200be062ee46b72e71fb33df2b', 'Nirwana Permatasari, S.Psi., S.H., M.Pd., M.Psi ', '', 4, '198707052018074001', '', 'Dosen'),
(33, '197310101998021001', '962c68c135b606a63d6d834f27ff6c82', 'Dr. Amil Ahmad Ilham, ST.,MIT.', '', 4, '197310101998021001', '', 'Dosen'),
(34, '198701312019031007', 'a02b12b8776d41719b44ccdefa785385', 'Muhammad Iqbal Nikmatullah, S.T., M.T.', '', 4, '198701312019031007', '', 'Dosen'),
(35, '196007161987021002', '69bea4c3ecb3db341701987e7111f9fd', 'Ir.  Christoforus Yohannes, MT.', '', 4, '196007161987021002', '', 'Dosen'),
(36, '198305102014041001', '17ab30760bcf7718f1a076a450c821f7', 'A. Ais Prayogi, ST., M.Eng', '', 4, '198305102014041001', '', 'Dosen'),
(37, '196312101991031002', '45cf7a4cbaf92a8a38385bd150ffa644', 'Dr.  Moehammad Iqbal Sultan, M.Si.', '', 4, '196312101991031002', '', 'Dosen'),
(38, '198404032010121004', '0adc02f2a5165a73f24154578fa1c140', 'Dr. Eng. Zulkifli Tahir, ST., M.Sc.', '', 4, '198404032010121004', '', 'Dosen'),
(39, '199012012018074001', '67a7f76f99ad1b8c868b9c2746055a7b', 'Anugrayani Bustamin, S.T., M.T.', '', 4, '199012012018074001', '', 'Dosen'),
(40, '198202162008122001', '6a17a719986cfaa5ebfd026a3f67b727', 'Elly Warni, ST., MT.', '', 4, '198202162008122001', '', 'Dosen'),
(41, '197404262003121002', '0ae86dcaf04bc55f85df612391c4881c', 'Dr.  Adnan, ST., MT.', '', 4, '197404262003121002', '', 'Dosen'),
(42, '195001121980031003', 'f72e19610dfa2a4c0b7f5c3f42f981ac', 'Prof. Dr. Ir. Jalil Genisa, M.S.', '', 4, '195001121980031003', '', 'Dosen'),
(43, '194605231975031001', '6fd1908defa116e97744a758fa623622', 'Prof. Dr. Muhammad Dali Amiruddin, dr. Sp.KK (K), FINSDV, FAADV', '', 4, '194605231975031001', '', 'Dosen'),
(44, '194508211971081001', '23094d0aa93e840acad335c49a2d0c91', 'Prof. Dr.  Muh. Syahrul, M.Agr.,B.Sc.', '', 4, '194508211971081001', '', 'Dosen'),
(45, '195312211981031002', '104c55af5b3e5bb5197e98fc3f0fbccf', 'Prof. Dr.-Ing. Muhammad Yamin Jinca, ,MS.Tr.', '', 4, '195312211981031002', '', 'Dosen'),
(46, '194812211976021001', 'fa1f4587789d19dd3cb444150fd9f4d5', 'Prof. Dr. Ir. Ananto Yudono, M.Eng.', '', 4, '194812211976021001', '', 'Dosen'),
(47, '197205072002121001', '322951b659d1c9d41c7501dd1474d723', 'Dr Muh. Tang Abdullah, , MAP', '', 4, '197205072002121001', '', 'Dosen'),
(48, '195010231975031004', '8a3b978de05a67148d808804b7b4ba53', 'Prof. Dr. Ir. Kahar Mustari, MS.', '', 4, '195010231975031004', '', 'Dosen'),
(49, '198806212015042003', 'd6b7d0e8592468fd5345a0d3f5726933', 'Andini Dani Achmad, ST., MT', '', 4, '198806212015042003', '', 'Dosen'),
(50, '195709081983032001', '5b8bad7621982498ffa36c4a971fbcbc', 'Prof. Dr. Ir. Sylvia Sjam, MS.', '', 4, '195709081983032001', '', 'Dosen'),
(51, '196211211985032001', '113478de09ea7fc6bb16cfe2c0f2188f', 'Prof. Dr. Ir. Winarni Dien Monoarfa, MS.', '', 4, '196211211985032001', '', 'Dosen'),
(52, '194803071974112001', 'd25028947b8bb5e71242b3641dea1fb9', 'Prof. Dr. drh. Lucia Ratna Winata Muslimin, M.Sc.', '', 4, '194803071974112001', '', 'Dosen'),
(53, '195910251987111001', 'a8c5237374c16dbfd64b1c5a8c135d5b', 'Dr.Ir Dr.Ir. Ophirtus Sumule, DEA, DEA', '', 4, '195910251987111001', '', 'Dosen'),
(54, '195311111980031009', '141133a28a1bc6385c46d7af02f4d62f', 'Prof. Dr. Ir. M. Ramli Rahim, M.Eng.', '', 4, '195311111980031009', '', 'Dosen'),
(55, '194906261974122001', '016adb99c8ca20d8ba243c6f8e038a8c', 'Prof. Dr. dr. Johana Kandow, Sp.PA.', '', 4, '194906261974122001', '', 'Dosen'),
(56, '195912311986091002', 'cde4e1c3fd4229559c4aae6316fff49f', 'Prof. Dr.  Pawennari, MA.', '', 4, '195912311986091002', '', 'Dosen'),
(57, '195609301980031004', 'a26a56c0d0c61846baf9c31c3731a2c7', 'Prof. Dr. Dadang Ahmad Suriamiharja, M.Eng.', '', 4, '195609301980031004', '', 'Dosen'),
(58, '194809271973031001', 'e880947dbfe94206b588b8295ac44198', 'Prof. Dr. Ir. Djamal Sanusi', '', 4, '194809271973031001', '', 'Dosen');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `pegNamaGelar` varchar(255) NOT NULL,
  `pegNip` varchar(255) NOT NULL,
  `idkontributor` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `fakultas` varchar(255) NOT NULL,
  `posisi_id` varchar(255) NOT NULL,
  `publikasi_id` varchar(255) NOT NULL,
  `tagged_by` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `idposisi` varchar(255) NOT NULL,
  `namaposisi` varchar(255) NOT NULL,
  `minta_naik_pangkat` enum('0','1') NOT NULL DEFAULT '0',
  `aktivasi_publikasi` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `pegNamaGelar`, `pegNip`, `idkontributor`, `nidn`, `fakultas`, `posisi_id`, `publikasi_id`, `tagged_by`, `created_at`, `idposisi`, `namaposisi`, `minta_naik_pangkat`, `aktivasi_publikasi`) VALUES
(3, 'Iqra\' Aswad, S.T., M.T', '199011282019043001', '', '', '', '', '', '', '', '', '', '1', '1'),
(466, 'Dr. Nurhaedar Jafar, Apt.,M.Kes.', '196412311990022001', '5535', '', '', '3', '3346', '196802261993032003', '2019-10-01 12:34:14', '3', 'Penulis Pendamping', '0', '0'),
(473, 'Bannu SSi, MSi.', '197305211998021002', '5421', '', '', '3', '3352', '195805081983122001', '2019-09-26 14:04:21', '3', 'Penulis Pendamping', '0', '0'),
(474, 'Indah Musdalifah', '-', '5422', '', '', '1', '3353', '195805081983122001', '2019-09-26 14:15:00', '1', 'Penulis Utama', '0', '0'),
(477, 'Dr. Ir. Hastang, M.Si.', '196509171990022001', '5425', '', '', '3', '3356', '197104211997022002', '2019-09-26 14:44:40', '3', 'Penulis Pendamping', '0', '0'),
(478, 'Ir. Veronica Sri Lestari, M.Ec.', '195904071984102003', '5427', '', '', '3', '3356', '197104211997022002', '2019-09-26 14:46:17', '3', 'Penulis Pendamping', '0', '0'),
(479, 'Dr. Rosmawati, S.S.,M.Si.', '197205022005012002', '5428', '', '', '3', '3356', '197104211997022002', '2019-09-26 14:48:23', '3', 'Penulis Pendamping', '0', '0'),
(480, 'Prof. dr. Irawan Yusuf, Ph.D.', '195702111986011001', '5429', '', '', '3', '3358', '196802261993032003', '2019-09-26 14:53:33', '3', 'Penulis Pendamping', '0', '0'),
(481, 'Prof. dr. Veni Hadju, Ph.D.', '196203181988031004', '5430', '', '', '3', '3358', '196802261993032003', '2019-09-26 14:55:11', '3', 'Penulis Pendamping', '0', '0'),
(484, 'Ansariadi, SKM.,M.Sc.PH.', '197201091997031004', '5436', '', '', '3', '3360', '196802261993032003', '2019-09-26 15:13:50', '3', 'Penulis Pendamping', '0', '0'),
(485, 'Dr. Syafyudin, ST., M.Si.', '196907191996031004', '10368', '', '', '1', '3004', '196907191996031004', '2020-04-04 22:14:35', '1', 'Penulis Utama', '0', '0'),
(486, 'Prof. Dr. Ir. Ambo Tuwo, DEA.', '196211181987021001', '10369', '', '', '3', '3004', '196907191996031004', '2020-04-04 22:16:46', '3', 'Penulis Pendamping', '0', '0'),
(489, 'Dr. Ir. Ikrar M. S., M.Sc.', '19570801 198503 01006', '5437', '', '', '3', '3364', '197104211997022002', '2019-09-26 15:41:40', '3', 'Penulis Pendamping', '0', '0'),
(490, 'Dr. Jamila, S.Pt.,M.Si.', '197505112003122003', '5439', '', '', '3', '3364', '197104211997022002', '2019-09-26 15:43:15', '3', 'Penulis Pendamping', '0', '0'),
(491, 'Rismayanti, SKM.,MKM.', '197009301998032002', '5440', '', '', '3', '3365', '196802261993032003', '2019-09-26 15:48:02', '3', 'Penulis Pendamping', '0', '0'),
(492, 'Andi Selvi Yusni Tasari, S.K.M., M.Kes', '199001232019032017', '5443', '', '', '1', '3366', '196802261993032003', '2019-09-26 15:58:51', '1', 'Penulis Utama', '0', '0'),
(494, 'Prof. Dr. Ir. Ahmad Ramadhan Siregar, MS.', '196202201988111001', '5442', '', '', '3', '3367', '197104211997022002', '2019-09-26 15:58:23', '3', 'Penulis Pendamping', '0', '0'),
(496, 'Prof. Dr. Mahmud Tang, MA.', '195112311984031003', '5445', '', '', '3', '3368', '197508232002121002', '2019-09-26 20:36:41', '3', 'Penulis Pendamping', '0', '0'),
(497, 'Dr. Muhammad Basir, MA.', '196206241987021001', '5446', '', '', '3', '3368', '197508232002121002', '2019-09-26 20:38:03', '3', 'Penulis Pendamping', '0', '0'),
(498, 'Prof. Dr. Ir. Joeharnani Tresnati, DEA.', '196509071989032001', '5450', '', '', '3', '3370', '197005161996032002', '2019-09-27 05:14:58', '3', 'Penulis Pendamping', '0', '0'),
(499, 'Ir. Lestiaty Fachruddin, M.Agr.', '196406171988032002', '5451', '', '', '3', '3370', '197005161996032002', '2019-09-27 05:15:42', '3', 'Penulis Pendamping', '0', '0'),
(500, 'Dr. Ir. Nadiarti, M.Sc.', '196801061991032001', '5452', '', '', '3', '3370', '197005161996032002', '2019-09-27 05:16:17', '3', 'Penulis Pendamping', '0', '0'),
(501, 'Prof. Dr. Andi Iqbal, ST., M.Fish.,Sc.', '196912151994031002', '5454', '', '', '2', '3372', '197005161996032002', '2019-09-27 05:40:26', '2', 'Penulis Korespondensi', '0', '0'),
(503, 'Dr. Irmawati, S.Pi., M.Si.', '197005161996032002', '5455', '', '', '3', '3374', '197005161996032002', '2019-09-27 06:02:48', '3', 'Penulis Pendamping', '0', '0'),
(504, 'Dr. Sitti Nurani Sirajuddin, S.Pt.,M.Si.', '197104211997022002', '5456', '', '', '3', '3375', '195904071984102003', '2019-09-27 06:18:46', '3', 'Penulis Pendamping', '0', '0'),
(505, 'Dr. Ir. Ikrar M. S., M.Sc.', '195708011985031006', '5457', '', '', '3', '3375', '195904071984102003', '2019-09-27 06:19:20', '3', 'Penulis Pendamping', '0', '0'),
(506, 'drh. Kusumandari Indah Prahesti', '198402152009122002', '5458', '', '', '3', '3375', '195904071984102003', '2019-09-27 06:19:58', '3', 'Penulis Pendamping', '0', '0'),
(508, 'M. Fadhlirrahman Latief, S.Pt., M.Si', '199205292019031018', '5465', '', '', '1', '3378', '199205292019031018', '2019-09-27 14:37:06', '1', 'Penulis Utama', '0', '0'),
(511, 'Sri Dewi Astuty, S.Si.,MT.', '197505131999032001', '5502', '', '', '3', '3403', '197509072000031006', '2019-09-30 14:53:22', '3', 'Penulis Pendamping', '0', '0'),
(514, 'Dr. Paulus Lobo Gareso, M.Sc.', '196503051991031008', '5505', '', '', '3', '3406', '197509072000031006', '2019-09-30 15:11:29', '3', 'Penulis Pendamping', '0', '0'),
(515, 'Eko Juarlin, S.Si.,M.Si.', '199304222019032018', '5508', '', '', '3', '3407', '197509072000031006', '2019-09-30 15:45:41', '3', 'Penulis Pendamping', '0', '0'),
(517, 'Dra. Bidayatul Arminah, MT.', '196308301989032001', '5507', '', '', '3', '3408', '197509072000031006', '2019-09-30 15:41:42', '3', 'Penulis Pendamping', '0', '0'),
(518, 'Dr. Bualkar Abdullah, M.Eng.Sc.', '195501051978021001', '5509', '', '', '3', '3409', '197509072000031006', '2019-09-30 15:49:46', '3', 'Penulis Pendamping', '0', '0'),
(519, 'Dr. Sri Suryani, DEA.', '195805081983122001', '5510', '', '', '3', '3409', '197509072000031006', '2019-09-30 15:50:40', '3', 'Penulis Pendamping', '0', '0'),
(520, 'Dr. Syarifuddin, M.Soc.Sc.Ak.', '196302101990021001', '5511', '', '', '3', '3411', '196703191992032003', '2019-09-30 16:45:21', '3', 'Penulis Pendamping', '0', '0'),
(522, 'Dr. drg. Muh. Harun Achmad, SKG., Sp. KGA, M. Kes', '197105232002121002', '5547', '', '', '3', '3414', '197110121999032001', '2019-10-01 12:46:32', '3', 'Penulis Pendamping', '0', '0'),
(523, 'Prof. Dr. Akbar Tahir, M.Sc', '196107181988101001', '5514', '', '', '1', '3415', '196107181988101001', '2019-09-30 17:43:16', '1', 'Penulis Utama', '0', '0'),
(524, 'Dr. Ir. Shinta Werorilangi, M.Sc', '196708261991032001', '5515', '', '', '3', '3415', '196107181988101001', '2019-09-30 17:44:39', '3', 'Penulis Pendamping', '0', '0'),
(525, 'Dr. Ir. Arniati, M.Si.', '196606141991031002', '5516', '', '', '3', '3415', '196107181988101001', '2019-09-30 17:45:37', '3', 'Penulis Pendamping', '0', '0'),
(526, 'Dr. Ahmad Faizal, ST., M.Si.', '197507272001121003', '5517', '', '', '3', '3415', '196107181988101001', '2019-09-30 17:47:05', '3', 'Penulis Pendamping', '0', '0'),
(537, 'Prof. Dr. Nurhayati Rahman, MS.', '195712291984032001', '5530', '', '', '1', '3431', '195712291984032001', '2019-10-01 09:36:39', '1', 'Penulis Utama', '0', '0'),
(549, 'Dr. dr. Haerani Rasyid, M.Kes.', '196805301996032001', '5559', '', '', '3', '3441', '197008211999031001', '2019-10-01 20:05:58', '3', 'Penulis Pendamping', '0', '0'),
(550, 'dr.  Aminuddin,  Diet., Ph. D', '197607042002121003', '5560', '', '', '3', '3441', '197008211999031001', '2019-10-01 20:06:28', '3', 'Penulis Pendamping', '0', '0'),
(552, 'Dr. Andi Detty Yunianti, S.Hut., MP.', '197006061995122001', '5562', '', '', '1', '3444', '197605312008012007', '2019-10-02 09:22:20', '1', 'Penulis Utama', '0', '0'),
(555, 'Prof. Dr. Ir. Musrizal Muin, M.Sc.', '196508141990031004', '5565', '', '', '3', '3444', '197605312008012007', '2019-10-02 09:26:04', '3', 'Penulis Pendamping', '0', '0'),
(558, 'Agussalim, S.Hut., M.Si', '198308192015041004', '5572', '', '', '3', '3447', '197605312008012007', '2019-10-02 09:40:27', '3', 'Penulis Pendamping', '0', '0'),
(559, 'Dr. Suhasman, S.Hut., M.Si.', '196904022000031001', '5573', '', '', '3', '3447', '197605312008012007', '2019-10-02 09:41:02', '3', 'Penulis Pendamping', '0', '0'),
(560, 'Dr. Ir. Baharuddin, MP.', '196511051989031002', '5574', '', '', '3', '3447', '197605312008012007', '2019-10-02 09:41:37', '3', 'Penulis Pendamping', '0', '0'),
(561, 'dr. Agussalim Bukhari, M.Clin.Med., Ph. D., Sp. GK', '197008211999031001', '5580', '', '', '1', '3449', '197008211999031001', '2019-10-02 10:04:35', '1', 'Penulis Utama', '0', '0'),
(562, 'Prof. Dr. dr. Nurpudji Astuti Daud, MPH.', '195610201985032001', '5583', '', '', '3', '3449', '197008211999031001', '2019-10-02 10:05:37', '3', 'Penulis Pendamping', '0', '0'),
(565, 'Dr. Muhammad Irfan Said, S.Pt.,MP.', '197412052006041001', '5590', '', '', '1', '3453', '197412052006041001', '2019-10-02 21:06:20', '1', 'Penulis Utama', '0', '0'),
(566, 'Prof. Dr. Ir. M.S. Effendi Abustan, M.Sc.', '195206061976021001', '5589', '', '', '3', '3453', '197412052006041001', '2019-10-02 21:05:53', '3', 'Penulis Pendamping', '0', '0'),
(567, 'Dr. Ir. Wempie, M.Sc.', '196405031990031002', '5591', '', '', '3', '3453', '197412052006041001', '2019-10-02 21:06:56', '3', 'Penulis Pendamping', '0', '0'),
(568, 'Ir. Muhammad Zain Mide. MS.', '195303091985031001', '5592', '', '', '3', '3453', '197412052006041001', '2019-10-02 21:07:49', '3', 'Penulis Pendamping', '0', '0'),
(569, 'Dr. Sri Suro Adhawati, SE., M.Si.', '196404171991032002', '5593', '', '', '1', '3454', '196404171991032002', '2019-10-02 21:21:20', '1', 'Penulis Utama', '0', '0'),
(572, 'Dr. Ir.  D a n i e l Useng, M.Eng.Sc.', '196202011990021002', '5596', '', '', '3', '3463', '197812252002121001', '2019-10-03 09:32:19', '3', 'Penulis Pendamping', '0', '0'),
(573, 'Prof. Dr. drg. Burhanuddin Daeng Pasiga, M.Kes. ', '195512141986031001', '3466', '', '', '3', '2101', '196512291995031001', '2019-07-02 13:53:38', '3', 'Penulis Pendamping', '0', '0'),
(574, 'Prof. Dr. drg. Rasmidar Samad, MS.', '195704221986032001', '3467', '', '', '3', '2101', '196512291995031001', '2019-07-02 13:53:53', '3', 'Penulis Pendamping', '0', '0'),
(581, 'Ir. Machfud Palo, MP.', '196003121986011002', '5609', '', '', '1', '3472', '196003121986011002', '2019-10-03 11:24:08', '1', 'Penulis Utama', '0', '0'),
(582, 'Prof. Dr. Ir. Nadjamuddin, M.Sc.', '196007011986011001', '5610', '', '', '3', '3472', '196003121986011002', '2019-10-03 11:25:33', '3', 'Penulis Pendamping', '0', '0'),
(583, 'Dr. Mukti Zainuddin, S.Pi., M.Si.', '197107031997021002', '5612', '', '', '3', '3472', '196003121986011002', '2019-10-03 11:27:44', '3', 'Penulis Pendamping', '0', '0'),
(584, 'Dr. Ir. St. Aisjah Farhum, M.Si.', '196906051993032002', '5613', '', '', '3', '3472', '196003121986011002', '2019-10-03 11:28:27', '3', 'Penulis Pendamping', '0', '0'),
(585, 'Prof. Dr. Aswanto, SH., MS., DFM.', '196412311988111001', '5614', '', '', '2', '3474', '196310241989031002', '2019-10-03 12:52:12', '2', 'Penulis Korespondensi', '0', '0'),
(586, 'Prof. Dr. Muhadar, SH., MS.', '195903171987031002', '5615', '', '', '2', '3474', '196310241989031002', '2019-10-03 12:59:03', '2', 'Penulis Korespondensi', '0', '0'),
(588, 'Prof. Dr. Andi Sofyan, SH., MH.', '196201051986011001', '5617', '', '', '2', '3475', '196310241989031002', '2019-10-03 13:04:48', '2', 'Penulis Korespondensi', '0', '0'),
(589, 'Prof. Dr. Muhammad Said Karim, SH., MH.', '196207111987031001', '5618', '', '', '2', '3476', '196310241989031002', '2019-10-03 13:06:43', '2', 'Penulis Korespondensi', '0', '0'),
(590, 'Prof. Dr. M. Syukri Akub, SH., MH.', '195311241979121001', '5619', '', '', '2', '3476', '196310241989031002', '2019-10-03 13:07:14', '2', 'Penulis Korespondensi', '0', '0'),
(591, 'Prof. Dr. Syamsuddin Muhammad Noor, SH., MH.', '195507021988101001', '5620', '', '', '1', '3478', '196310241989031002', '2019-10-03 13:09:05', '1', 'Penulis Utama', '0', '0'),
(592, 'Prof. Dr. Achmad Ruslan, SH., MH.', '195701011986011001', '5621', '', '', '2', '3478', '196310241989031002', '2019-10-03 13:10:05', '2', 'Penulis Korespondensi', '0', '0'),
(593, 'Dr. Marcel Hendrapati Yaparno., SH., MH.', '195010271980031002', '5622', '', '', '2', '3478', '196310241989031002', '2019-10-03 13:11:24', '2', 'Penulis Korespondensi', '0', '0'),
(594, 'Dr. dr. Muhammad Ilyas, Sp.PD K-P, Sp.P', '196409031986011001', '5880', '', '', '1', '3479', '197406292008121001', '2019-10-18 07:39:48', '1', 'Penulis Utama', '0', '0'),
(596, 'dr. Agussalim Bukhari, M.Clin.Med., Ph. D., Sp. GK', '197008211999031000', '5875', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:33:58', '3', 'Penulis Pendamping', '0', '0'),
(597, 'Prof. dr. Muh. Nasrum Massi, Ph.D.', '196709101996031001', '5876', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:34:46', '3', 'Penulis Pendamping', '0', '0'),
(598, 'Prof. Dr. dr. Syakib Bakri, Sp.PD, KGH', '195103181978031001', '5877', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:35:33', '3', 'Penulis Pendamping', '0', '0'),
(599, 'Prof. Dr. dr. Suryani As\'ad, M.Sc.', '196005041986012002', '5878', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:36:19', '3', 'Penulis Pendamping', '0', '0'),
(600, 'Prof. dr. Mansyur Arif, Ph.D., Sp.PK.(K)', '196411041990021001', '5879', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:37:09', '3', 'Penulis Pendamping', '0', '0'),
(601, 'Dr. dr. Burhanuddin Bahar, MSC', '19610220 1987021001', '5881', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:41:39', '3', 'Penulis Pendamping', '0', '0'),
(602, 'Dr. dr. Arifin Seweng MPH', '1958120121987031001', '5882', '', '', '3', '3479', '197406292008121001', '2019-10-18 07:44:10', '3', 'Penulis Pendamping', '0', '0'),
(606, 'Dr. Indah Raya, M.Si.', '196411251990022001', '5629', '', '', '3', '3483', '197406292008121001', '2019-10-03 13:43:28', '3', 'Penulis Pendamping', '0', '0'),
(609, 'Prof. Dr. Chairuddin Rasjad, Ph.D, Sp.B, Sp.OT (K)', '130222253', '5632', '', '', '3', '3484', '197406292008121001', '2019-10-03 14:04:36', '3', 'Penulis Pendamping', '0', '0'),
(610, 'dr. Prihantono, S.Pb', '197406292008121001', '5633', '', '', '3', '3485', '197406292008121001', '2019-10-03 14:08:18', '3', 'Penulis Pendamping', '0', '0'),
(611, 'dr. M. Asykar Palinrungi, Sp.U', '197412142002121002', '5634', '', '', '3', '3485', '197406292008121001', '2019-10-03 14:09:10', '3', 'Penulis Pendamping', '0', '0'),
(612, 'Ir. Muhammad Iqbal Djawad, M.Sc., Ph.D', '196703181989031002', '', '', '', '', '', '', '', '', '', '0', '0'),
(613, 'Dr. Taufiqur Rachman, ST.,MT.', '196908021997021001', '', '', '', '', '', '', '', '', '', '0', '0'),
(614, 'Drs. Muh. Iqbal Latief, MS.i', '196510161990021002', '', '', '', '', '', '', '', '', '', '0', '0'),
(615, 'Andi Iqra Pradipta Natsir, SE., M.Si., Ak', '199403202021015001', '', '', '', '', '', '', '', '', '', '0', '0'),
(616, 'Dr. Ir. Hastang, M.Si.', '196509171999022001', '5635', '', '', '1', '3486', '197104211997022002', '2019-10-03 15:07:33', '1', 'Penulis Utama', '0', '0'),
(619, 'Irianto, S.Ft., Physio., M.Kes.', '199111232019043001', '6850', '', '', '3', '3492', '199111232019043001', '2019-11-26 00:25:10', '3', 'Penulis Pendamping', '0', '0'),
(620, 'Andi Besse Ahsaniyah A. Hafid, S.Ft., M.Kes', '199010022018032001', '6851', '', '', '3', '3492', '199111232019043001', '2019-11-26 00:26:05', '3', 'Penulis Pendamping', '0', '0'),
(621, 'Prof. Dr. Ir. Achmar Mallawa, DEA.', '195112221976031001', '', '', '', '', '', '', '', '', '', '0', '0'),
(622, 'Prof. Dr. Ir. H.M. Natsir Nessa, MS.', '194812271973031001', '', '', '', '', '', '', '', '', '', '0', '0'),
(623, 'Prof. Dr. Ir. Hammada Abbas, MS.,ME.', '194608211974121001', '', '', '', '', '', '', '', '', '', '0', '0'),
(624, 'M. Chasyim Hasani, S.Pi.', '197104121999031003', '5640', '', '', '3', '3493', '197209262006042001', '2019-10-04 06:51:49', '3', 'Penulis Pendamping', '0', '0'),
(636, 'Yayu Anugrah La Nafie, ST., M.Sc.', '197108232000032002', '5658', '', '', '3', '3504', '196901251993031002', '2019-10-06 13:55:05', '3', 'Penulis Pendamping', '0', '0'),
(637, 'Astrid W. Junaidi', 'Astrid W. Junaidi', '5659', '', '', '3', '3504', '196901251993031002', '2019-10-06 13:57:43', '3', 'Penulis Pendamping', '0', '0'),
(638, 'Dr. Daeng Paroka, ST.,MT.', '197201181998021001', '5660', '', '', '1', '3507', '197201181998021001', '2019-10-07 12:32:17', '1', 'Penulis Utama', '0', '0'),
(639, 'Andi Haris Muhammad, ST.,MT, Ph.D', '196904042000031002', '5661', '', '', '3', '3507', '197201181998021001', '2019-10-07 12:32:34', '3', 'Penulis Pendamping', '0', '0'),
(641, 'Ir. Syamsul Asri, MT.', '196503181991031003', '5664', '', '', '3', '3509', '197202051999031002', '2019-10-07 15:35:22', '3', 'Penulis Pendamping', '0', '0'),
(642, 'Nirwana Permatasari, S.Psi., S.H., M.Pd., M.Psi ', '198707052018074001', '', '', '', '', '', '', '', '', '', '0', '0'),
(643, 'Dr. Amil Ahmad Ilham, ST.,MIT.', '197310101998021001', '', '', '', '', '', '', '', '', '', '0', '0'),
(644, 'Muhammad Iqbal Nikmatullah, S.T., M.T.', '198701312019031007', '', '', '', '', '', '', '', '', '', '0', '0'),
(645, 'Ir.  Christoforus Yohannes, MT.', '196007161987021002', '', '', '', '', '', '', '', '', '', '0', '0'),
(646, 'A. Ais Prayogi, ST., M.Eng', '198305102014041001', '', '', '', '', '', '', '', '', '', '0', '0'),
(647, 'Dr.  Moehammad Iqbal Sultan, M.Si.', '196312101991031002', '', '', '', '', '', '', '', '', '', '0', '0'),
(648, 'Dr. dr. Andi Kurnia Bintang, Sp.S., M.Kes', '196405021991032001', '5666', '', '', '1', '3511', '196405021991032001', '2019-10-08 08:58:49', '1', 'Penulis Utama', '0', '0'),
(650, 'Dr. Suhardi, STP.,MP.', '197108102005011003', '5668', '', '', '3', '3516', '197812252002121001', '2019-10-08 14:50:19', '3', 'Penulis Pendamping', '0', '0'),
(651, 'Dr. Ir. Abdul Waris, MT.', '196011011989031002', '5669', '', '', '3', '3517', '197812252002121001', '2019-10-08 14:58:34', '3', 'Penulis Pendamping', '0', '0'),
(652, 'Abdul Azis S, S.TP., M.Si', '198212092012121004', '5670', '', '', '3', '3518', '197812252002121001', '2019-10-08 15:40:44', '3', 'Penulis Pendamping', '0', '0'),
(654, 'Dr. Ir. Supratomo', '195604171982031003', '5672', '', '', '3', '3519', '197812252002121001', '2019-10-08 15:47:18', '3', 'Penulis Pendamping', '0', '0'),
(657, 'Dr. Ir. M a h m u d, MP.', '197006031994031003', '5675', '', '', '3', '3521', '197812252002121001', '2019-10-08 15:56:31', '3', 'Penulis Pendamping', '0', '0'),
(658, 'Muhammad Tahir Sapsal, S.TP., M.Si', '198407162012121002', '5676', '', '', '3', '3521', '197812252002121001', '2019-10-08 15:57:38', '3', 'Penulis Pendamping', '0', '0'),
(660, 'Dr. Muh. Hamzah, S.Si.,MT.', '196912311997021002', '5682', '', '', '1', '3523', '196912311997021002', '2019-10-08 22:02:30', '1', 'Penulis Utama', '0', '0'),
(661, 'Amiruddin', '19720515 1997021002', '5678', '', '', '3', '3523', '196912311997021002', '2019-10-08 21:57:42', '3', 'Penulis Pendamping', '0', '0'),
(662, 'Prof. Dr. Halmar Halide, M.Sc.', '196303151987101001', '5679', '', '', '3', '3523', '196912311997021002', '2019-10-08 21:58:31', '3', 'Penulis Pendamping', '0', '0'),
(663, 'Sakka', '19641025 1991031002', '5680', '', '', '3', '3523', '196912311997021002', '2019-10-08 21:59:04', '3', 'Penulis Pendamping', '0', '0'),
(664, 'M a k h r a n i, S.Si. M.Si', '197202271998022002', '5681', '', '', '3', '3523', '196912311997021002', '2019-10-08 21:59:30', '3', 'Penulis Pendamping', '1', '0'),
(665, 'Dody Priosambodo, S.Si. M.Si', '197605052001121002', '5683', '', '', '1', '3524', '197010291995031001', '2019-10-09 09:56:13', '1', 'Penulis Utama', '0', '0'),
(666, 'Dr. Khairul Amri', '196907061995121002', '5684', '', '', '3', '3524', '197010291995031001', '2019-10-09 09:56:53', '3', 'Penulis Pendamping', '0', '0'),
(668, 'Muh. Fajaruddin Natsir, SKM.,M.Kes.', '198902112015041002', '5689', '', '', '1', '3527', '198902112015041002', '2019-10-09 16:37:44', '1', 'Penulis Utama', '0', '0'),
(669, 'dr. Makmur Selomo, MS.', '195611301986011001', '5687', '', '', '3', '3527', '198902112015041002', '2019-10-09 16:37:11', '3', 'Penulis Pendamping', '0', '0'),
(670, 'Sumarheni, S.Si.,Apt., M.Sc', '198110072008122001', '5694', '', '', '1', '3530', '197807162003122001', '2019-10-10 09:31:13', '1', 'Penulis Utama', '0', '0'),
(671, 'Dr. Risfah Yulianty, S.Si., M.Si., Apt.', '197807162003122001', '5693', '', '', '3', '3530', '197807162003122001', '2019-10-10 09:30:49', '3', 'Penulis Pendamping', '0', '0'),
(672, 'Andi Dirpan, STP., M.Si', '198202082006041003', '5695', '', '', '3', '3530', '197807162003122001', '2019-10-10 09:31:53', '3', 'Penulis Pendamping', '0', '0'),
(673, 'Prof. Dr. rer.nat. Marianti A. Manggau, .Apt', '196703191992032002', '5696', '', '', '3', '3530', '197807162003122001', '2019-10-10 09:33:34', '3', 'Penulis Pendamping', '0', '0'),
(674, 'Drs. Syaharuddin, M.Si, Apt', '196308011990031001', '5697', '', '', '3', '3530', '197807162003122001', '2019-10-10 09:34:18', '3', 'Penulis Pendamping', '0', '0'),
(675, 'Prof. Dr. Elly Wahyudin, M.Sc, Apt', '195601141986012001', '5698', '', '', '3', '3530', '197807162003122001', '2019-10-10 09:34:47', '3', 'Penulis Pendamping', '0', '0'),
(677, 'Prof. Dr. dr. M. Alimin Maidin, MPH.', '195504141986011001', '5704', '', '', '2', '3532', '195809061986011001', '2019-10-10 10:13:11', '2', 'Penulis Korespondensi', '0', '0'),
(678, 'Prof. Dr. drg. Andi Zulkifli, M.Kes.', '196301051990031002', '5705', '', '', '2', '3532', '195809061986011001', '2019-10-10 10:14:52', '2', 'Penulis Korespondensi', '0', '0'),
(680, 'Dr. Ridwan Mochtar Thaha, M.Sc.', '195809061986011001', '5708', '', '', '2', '3533', '195809061986011001', '2019-10-10 10:21:21', '2', 'Penulis Korespondensi', '0', '0'),
(681, 'Prof. Dr. dr. Muhammad Syafar, MS.', '195410211988121001', '5709', '', '', '2', '3533', '195809061986011001', '2019-10-10 10:22:29', '2', 'Penulis Korespondensi', '0', '0'),
(682, 'Dr. Nurlaela Rauf, M.Sc.', '196006241986012001', '3378', '', '', '1', '2055', '196006241986012001', '2019-06-27 21:36:33', '1', 'Penulis Utama', '0', '0'),
(687, 'Dr. M a w a r d i, S.Si.,M.Si.', '197012311998021001', '5732', '', '', '1', '3552', '197012311998021001', '2019-10-10 13:14:41', '1', 'Penulis Utama', '0', '0'),
(688, 'Prof. Dr. Amir Kamal Amir, M.Sc.', '196808031992021001', '5733', '', '', '3', '3552', '197012311998021001', '2019-10-10 13:15:37', '3', 'Penulis Pendamping', '0', '0'),
(689, 'Dr. Eng. Zulkifli Tahir, ST., M.Sc.', '198404032010121004', '', '', '', '', '', '', '', '', '', '0', '0'),
(690, 'Anugrayani Bustamin, S.T., M.T.', '199012012018074001', '', '', '', '', '', '', '', '', '', '0', '0'),
(691, 'Elly Warni, ST., MT.', '198202162008122001', '', '', '', '', '', '', '', '', '', '0', '0'),
(692, 'Dr.  Adnan, ST., MT.', '197404262003121002', '', '', '', '', '', '', '', '', '', '0', '0'),
(693, 'Prof. Dr. Ir. Jalil Genisa, M.S.', '195001121980031003', '', '', '', '', '', '', '', '', '', '0', '0'),
(694, 'Prof. Dr. Muhammad Dali Amiruddin, dr. Sp.KK (K), FINSDV, FAADV', '194605231975031001', '', '', '', '', '', '', '', '', '', '0', '0'),
(695, 'Prof. Dr.  Muh. Syahrul, M.Agr.,B.Sc.', '194508211971081001', '', '', '', '', '', '', '', '', '', '0', '0'),
(696, 'Prof. Dr.-Ing. Muhammad Yamin Jinca, ,MS.Tr.', '195312211981031002', '', '', '', '', '', '', '', '', '', '0', '0'),
(697, 'Prof. Dr. Ir. Ananto Yudono, M.Eng.', '194812211976021001', '', '', '', '', '', '', '', '', '', '0', '0'),
(698, 'Dr. Mufidah, S.Si.,M.Si., Apt.', '197303091999032002', '5770', '', '', '1', '3593', '196106061988032002', '2019-10-14 15:38:18', '1', 'Penulis Utama', '0', '0'),
(699, 'Abdul Rahim, S.Si., M.Si.,Apt.', '197711112008121001', '5771', '', '', '3', '3593', '196106061988032002', '2019-10-14 15:38:40', '3', 'Penulis Pendamping', '0', '0'),
(700, 'Ismail, S.Si.,Apt.', '198508052014041001', '5772', '', '', '3', '3593', '196106061988032002', '2019-10-14 15:39:04', '3', 'Penulis Pendamping', '0', '0'),
(701, 'Yayu Mulsiani Evary, S.Si., Apt.', '198504172015042001', '5773', '', '', '3', '3593', '196106061988032002', '2019-10-14 15:39:25', '3', 'Penulis Pendamping', '0', '0'),
(702, 'Muh. Akbar Bahar, S.Si.,Apt., M.Pharm', '198605162009121005', '5774', '', '', '3', '3593', '196106061988032002', '2019-10-14 15:39:45', '3', 'Penulis Pendamping', '0', '0'),
(703, 'Dr Muh. Tang Abdullah, , MAP', '197205072002121001', '', '', '', '', '', '', '', '', '', '0', '0'),
(704, 'Prof. Dr. Ir. Kahar Mustari, MS.', '195010231975031004', '', '', '', '', '', '', '', '', '', '0', '0'),
(705, 'Andini Dani Achmad, ST., MT', '198806212015042003', '', '', '', '', '', '', '', '', '', '0', '0'),
(706, 'Prof. Dr. Ir. Sylvia Sjam, MS.', '195709081983032001', '', '', '', '', '', '', '', '', '', '0', '0'),
(707, 'Prof. Dr. Ir. Winarni Dien Monoarfa, MS.', '196211211985032001', '', '', '', '', '', '', '', '', '', '0', '0'),
(708, 'Prof. Dr. drh. Lucia Ratna Winata Muslimin, M.Sc.', '194803071974112001', '', '', '', '', '', '', '', '', '', '0', '0'),
(709, 'Dr.Ir Dr.Ir. Ophirtus Sumule, DEA, DEA', '195910251987111001', '', '', '', '', '', '', '', '', '', '0', '0'),
(710, 'Prof. Dr. Ir. M. Ramli Rahim, M.Eng.', '195311111980031009', '', '', '', '', '', '', '', '', '', '0', '0'),
(711, 'Prof. Dr. dr. Johana Kandow, Sp.PA.', '194906261974122001', '', '', '', '', '', '', '', '', '', '0', '0'),
(712, 'Prof. Dr.  Pawennari, MA.', '195912311986091002', '', '', '', '', '', '', '', '', '', '0', '0'),
(713, 'Prof. Dr. Dadang Ahmad Suriamiharja, M.Eng.', '195609301980031004', '', '', '', '', '', '', '', '', '', '0', '0'),
(714, 'Prof. Dr. Ir. Djamal Sanusi', '194809271973031001', '', '', '', '', '', '', '', '', '', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` int(11) NOT NULL,
  `keys_flags` varchar(222) DEFAULT NULL,
  `jenis_fitur` varchar(100) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`id`, `keys_flags`, `jenis_fitur`, `keterangan`, `status`) VALUES
(1, 'aktivasi_pak', 'aktivasi pak', 'filter karya ilmiah hanya yang status PAK saja', '1'),
(2, 'hapus_ki_turnitin', 'hapus karya ilmiah turnitin', 'aktivasi hapus karya ilmiah', '1');

-- --------------------------------------------------------

--
-- Table structure for table `karya_ilmiah`
--

CREATE TABLE `karya_ilmiah` (
  `id` int(100) NOT NULL,
  `idpublikasi` varchar(255) DEFAULT NULL,
  `judulpublikasi` varchar(255) DEFAULT NULL,
  `tjnperikNama` varchar(255) DEFAULT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `departemen` varchar(50) NOT NULL,
  `fileasli` varchar(255) DEFAULT NULL,
  `filehasil` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `anggota` varchar(255) DEFAULT NULL,
  `verifikasi` int(12) NOT NULL DEFAULT 0,
  `id_penilai` varchar(255) DEFAULT NULL,
  `id_pengaju` varchar(255) DEFAULT NULL,
  `penerimaan_admin` enum('0','1','2') NOT NULL DEFAULT '0',
  `kategori_karya_ilmiah` enum('3','1','2') DEFAULT NULL,
  `nama_penulis_jurnal` varchar(255) NOT NULL,
  `nama_artikel_jurnal` text DEFAULT NULL,
  `nama_jurnal` varchar(100) NOT NULL,
  `nomor_jurnal` varchar(100) NOT NULL,
  `edisi_jurnal` varchar(100) NOT NULL,
  `penerbit_jurnal` varchar(100) NOT NULL,
  `jumlah_halaman_jurnal` varchar(255) NOT NULL,
  `kategori_jurnal` enum('0','1','2','3','4') NOT NULL,
  `indikasi_jurnal` varchar(255) NOT NULL,
  `linearitas_jurnal` varchar(255) NOT NULL,
  `sudah_dinilai` enum('0','1','2','3','4','5','6','7','8','9','10') NOT NULL DEFAULT '0',
  `judul_karya_prosiding` varchar(255) NOT NULL,
  `jumlah_penulis_prosiding` varchar(255) NOT NULL,
  `status_pengusul_prosiding` varchar(255) NOT NULL,
  `nama_penilai_prosiding` varchar(255) NOT NULL,
  `nip_penilai_prosiding` varchar(255) NOT NULL,
  `unit_penilai_prosiding` varchar(255) NOT NULL,
  `judul_prosiding` varchar(255) NOT NULL,
  `isbn_prosiding` varchar(255) NOT NULL,
  `tahun_prosiding` varchar(255) NOT NULL,
  `penerbit_prosiding` varchar(255) NOT NULL,
  `alamat_web_prosiding` varchar(255) NOT NULL,
  `jumlah_halaman_prosiding` varchar(255) NOT NULL,
  `kategori_prosiding` varchar(13) DEFAULT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `jumlah_penulis_buku` varchar(255) NOT NULL,
  `status_pengusul_buku` varchar(255) NOT NULL,
  `nama_penilai_buku` varchar(255) NOT NULL,
  `nip_penilai_buku` varchar(255) NOT NULL,
  `unit_penilai_buku` varchar(255) NOT NULL,
  `isbn_buku` varchar(255) NOT NULL,
  `edisi_buku` varchar(255) NOT NULL,
  `tahun_buku` varchar(255) NOT NULL,
  `penerbit_buku` varchar(255) DEFAULT NULL,
  `jumlah_halaman_buku` varchar(255) NOT NULL,
  `kategori_buku` varchar(255) DEFAULT NULL,
  `kategori_forum_buku` varchar(50) DEFAULT NULL,
  `nama_diajukan` varchar(255) DEFAULT NULL,
  `nip_diajukan` varchar(255) DEFAULT NULL,
  `lokal_turnitin` varchar(11) NOT NULL,
  `tanggal_pengajuan` date DEFAULT NULL,
  `deadline_ketua` date DEFAULT NULL,
  `hapus_sementara` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karya_ilmiah`
--

INSERT INTO `karya_ilmiah` (`id`, `idpublikasi`, `judulpublikasi`, `tjnperikNama`, `fakultas`, `departemen`, `fileasli`, `filehasil`, `status`, `flag`, `notes`, `anggota`, `verifikasi`, `id_penilai`, `id_pengaju`, `penerimaan_admin`, `kategori_karya_ilmiah`, `nama_penulis_jurnal`, `nama_artikel_jurnal`, `nama_jurnal`, `nomor_jurnal`, `edisi_jurnal`, `penerbit_jurnal`, `jumlah_halaman_jurnal`, `kategori_jurnal`, `indikasi_jurnal`, `linearitas_jurnal`, `sudah_dinilai`, `judul_karya_prosiding`, `jumlah_penulis_prosiding`, `status_pengusul_prosiding`, `nama_penilai_prosiding`, `nip_penilai_prosiding`, `unit_penilai_prosiding`, `judul_prosiding`, `isbn_prosiding`, `tahun_prosiding`, `penerbit_prosiding`, `alamat_web_prosiding`, `jumlah_halaman_prosiding`, `kategori_prosiding`, `judul_buku`, `jumlah_penulis_buku`, `status_pengusul_buku`, `nama_penilai_buku`, `nip_penilai_buku`, `unit_penilai_buku`, `isbn_buku`, `edisi_buku`, `tahun_buku`, `penerbit_buku`, `jumlah_halaman_buku`, `kategori_buku`, `kategori_forum_buku`, `nama_diajukan`, `nip_diajukan`, `lokal_turnitin`, `tanggal_pengajuan`, `deadline_ketua`, `hapus_sementara`) VALUES
(217, '3550', 'Convolution and Correlation Theorems For Quaternion Fourier Transformation Based on the Orthogonal Planes Split', 'Pengusulan Reward Publikasi Ilmiah', 'H', '', 'fileasli/ICWAPR-2019P11.pdf', NULL, 'Tidak dapat diperiksa', '3', 'Double submit', '197012311998021001, 196808031992021001', 0, NULL, NULL, '0', NULL, '', NULL, '', '', '', '', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, NULL, '0'),
(218, '3551', 'Relationships Among Three definitions of Quaternion Fourier Transforms and Inversion Formula', 'Pengusulan Reward Publikasi Ilmiah', 'H', '', 'fileasli/ICWAPR-09P21.pdf', 'filehasil/Relationships_Among_Three_definitions_of_Quaternion_Fourier_Transforms_and_Inversion_Formula.pdf', 'Selesai', '2', NULL, '197012311998021001', 0, NULL, NULL, '0', NULL, '', NULL, '', '', '', '', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, NULL, '0'),
(235, '3590', 'Performance Testing of a Modified Centrifugal Fan with Serrated Blade Impeller', 'Penilaian Angka Kredit (PAK)', 'G', '', 'fileasli/2017_Supratomo_Centrifugal-Fan-With-Serrated-Blade-Impeller,_Vol_6,_Issue_10,_Oct_20171.pdf', NULL, 'Belum finalisasi', NULL, NULL, '', 0, NULL, NULL, '0', NULL, '', NULL, '', '', '', '', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, NULL, '0'),
(238, '3593', 'Physicochemical Properties of Indonesian Pigmented Rice (Oryza sativa Linn.)Varieties from South Sulawesi', 'Penilaian Angka Kredit (PAK)', 'N', '', 'fileasli/Physicochemical_Properties_of_Indonesian_Pigmented_Rice_(Oryza_sativa_Linn.)_.pdf', 'filehasil/TurnitinPhysicochemical_Properties_of_Indonesian_Pigmented_Rice_(Oryza_sativa_Linn.)_Varieties_from_South_Sulawesi_.pdf', 'Selesai', '2', NULL, '197303091999032002, 197711112008121001, 198508052014041001, 198504172015042001, 198605162009121005', 0, NULL, NULL, '0', NULL, '', NULL, '', '', '', '', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, NULL, '0'),
(239, '3594', 'On Small Business Growth', 'Submit Jurnal Nasional/Internasional', 'A', '', 'fileasli/ON_SMALL_BUSINESS_GROWTH_-yunus.doc', 'filehasil/result_-_On_Small_Business_Growth.pdf', 'Selesai', '2', NULL, '', 0, NULL, NULL, '0', NULL, '', NULL, '', '', '', '', '', '0', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '0', NULL, NULL, '0'),
(253, '618be3b48728d', 'jurnal', 'Penilaian Angka Kredit (PAK)', NULL, '34', '1636557748.pdf', NULL, NULL, NULL, NULL, '199011282019043001', 1, '197202271998022002,197310101998021001,198305102014041001', '199011282019043001', '0', '1', '1', 'jurnal', '2', '3', '4', '5', '6', '0', '', '', '9', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '1', '2021-11-15', '2021-11-16', '0'),
(254, '618be3d123684', 'prosiding', 'Penilaian Angka Kredit (PAK)', NULL, '36', '1636557777.pdf', NULL, NULL, NULL, NULL, '199011282019043001', 1, '197202271998022002', '199011282019043001', '0', '2', '', NULL, '', '', '', '', '', '0', '', '', '9', 'prosiding', '1', '2', '', '', '', '3', '4', '5', '6', '7', '8', 'internasional', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '1', '2021-11-17', '2021-11-18', '0'),
(255, '618be3edcccbd', 'buku', 'Penilaian Angka Kredit (PAK)', NULL, '34', '1636557805.pdf', NULL, NULL, NULL, NULL, '199011282019043001', 1, '197202271998022002', '199011282019043001', '0', '3', '', NULL, '', '', '', '', '', '0', '', '', '9', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'buku', '1', '2', '', '', '', '3', '4', '5', '6', '7', 'referensi', NULL, NULL, NULL, '1', '2021-11-17', '2021-11-18', '0'),
(258, '61944f268887c', 'jurnal', 'Penilaian Angka Kredit (PAK)', NULL, '35', '1637109542.pdf', NULL, NULL, NULL, NULL, '199011282019043001', 1, '197202271998022002', '199011282019043001', '0', '1', '1', 'jurnal', '3', '3', '3', '3', '3', '0', '', '', '6', '', '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '1', '2021-11-17', '2021-11-18', '0'),
(259, '619a57f649ae3', 'test', 'Penilaian Angka Kredit (PAK)', NULL, '34', '1637505014.pdf', NULL, NULL, NULL, NULL, '199011282019043001', 1, '197202271998022002,194809271973031001', '199011282019043001', '0', '2', '', NULL, '', '', '', '', '', '0', '', '', '9', 'test', 't', 't', '', '', '', 't', 't', 't', 't', 't', '100', 'internasional', '', '', '', '', '', '', '', '', '', NULL, '', NULL, NULL, NULL, NULL, '1', '2021-11-21', '2021-11-23', '0'),
(260, '619a59f0e300b', 'TEST2', 'Penilaian Angka Kredit (PAK)', NULL, '35', '1637505520.pdf', NULL, NULL, NULL, NULL, '199011282019043001', 1, '197202271998022002,198305102014041001', '199011282019043001', '0', '3', '', NULL, '', '', '', '', '', '0', '', '', '9', '', '', '', '', '', '', '', '', '', '', '', '', NULL, 'TEST2', 'i', 'i', '', '', '', 'i', 'i', 'i', 'i', '100', 'referensi', NULL, NULL, NULL, '1', '2021-11-21', '2021-11-23', '0');

-- --------------------------------------------------------

--
-- Table structure for table `level_user`
--

CREATE TABLE `level_user` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level_user`
--

INSERT INTO `level_user` (`id_level`, `nama_level`) VALUES
(1, 'Admin'),
(2, 'Ketua Tim Penilai'),
(3, 'Tim Penilai\r\n'),
(4, 'Dosen\r\n'),
(5, 'Super Admin\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `list_kata_karya_ilmiah`
--

CREATE TABLE `list_kata_karya_ilmiah` (
  `id` int(11) NOT NULL,
  `kata` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `list_kata_karya_ilmiah`
--

INSERT INTO `list_kata_karya_ilmiah` (`id`, `kata`) VALUES
(1, 'Genetic'),
(2, 'and'),
(3, 'morphological'),
(4, 'evidence\nfor'),
(5, 'a'),
(6, 'new'),
(7, 'species'),
(8, 'of'),
(9, 'the'),
(10, 'Maculatus'),
(11, 'Group\nof'),
(12, 'Anopheles'),
(13, 'subgenus'),
(14, 'Cellia'),
(15, 'Diptera'),
(16, 'Culicidae\nin'),
(17, 'Java'),
(18, 'Indonesia'),
(19, 'Negligible'),
(20, 'Impact'),
(21, 'Mass'),
(22, 'Screening'),
(23, 'Treatment'),
(24, 'on\nMesoendemic'),
(25, 'Malaria'),
(26, 'Transmission'),
(27, 'at'),
(28, 'West'),
(29, 'Timor'),
(30, 'in\nEastern'),
(31, 'A'),
(32, 'ClusterRandomized'),
(33, 'Trial'),
(34, 'The'),
(35, 'Influence'),
(36, 'Depth'),
(37, 'Sargassum'),
(38, 'Weight'),
(39, 'on'),
(40, 'Growth'),
(41, 'Kappaphycus'),
(42, 'alvarezii'),
(43, 'Gain'),
(44, 'Carrageenan'),
(45, 'Content'),
(46, 'Rhodophyta'),
(47, 'Solierisceae'),
(48, 'Polycultured'),
(49, 'with'),
(50, 'polycystum'),
(51, 'Paeophyta'),
(52, 'Sargassaceae'),
(53, 'Genomic'),
(54, 'analysis'),
(55, 'growth'),
(56, 'characteristic'),
(57, 'dengue'),
(58, 'viruses'),
(59, 'from'),
(60, 'Makassar'),
(61, 'POPULASI'),
(62, 'AEDES'),
(63, 'SP'),
(64, 'DAN'),
(65, 'KARAKTERISTIK'),
(66, 'BREEDING'),
(67, 'SITE'),
(68, 'PADA'),
(69, 'DAERAH'),
(70, 'ENDEMIK'),
(71, 'DI'),
(72, 'KEC'),
(73, 'BANTIMURUNG'),
(74, 'KAB'),
(75, 'MAROS'),
(76, 'DENGAN'),
(77, 'APLIKASI'),
(78, 'SIG'),
(79, 'ANALISIS'),
(80, 'KEPADATAN'),
(81, 'VEKTOR'),
(82, 'MALARIA'),
(83, 'LINGKUNGAN\nPENDERITA'),
(84, 'PUSKESMAS'),
(85, 'BAMBU'),
(86, 'MAMUJU'),
(87, '2008'),
(88, 'Dengue'),
(89, 'antiviral'),
(90, 'activity'),
(91, 'polar'),
(92, 'extract'),
(93, 'Melochia\numbellata'),
(94, 'Houtt'),
(95, 'Stapf'),
(96, 'var'),
(97, 'Visenia'),
(98, 'Effect'),
(99, 'Artesunate'),
(100, 'Peripheral'),
(101, 'Parasitaemia'),
(102, 'in'),
(103, 'Pregnant'),
(104, 'Women\nwith'),
(105, 'Plasmodium'),
(106, 'Falciparum'),
(107, 'Infection'),
(108, 'Antibacterial'),
(109, 'Antioxidant'),
(110, 'Activities'),
(111, 'Cemba'),
(112, 'Albizia'),
(113, 'lebbeckoides'),
(114, 'DC'),
(115, 'Benth'),
(116, 'Leaf'),
(117, 'Extracts'),
(118, 'Enrekang'),
(119, 'District'),
(120, 'South'),
(121, 'Sulawesi'),
(122, 'Changing'),
(123, 'Temperature'),
(124, 'Critical'),
(125, 'Thermal'),
(126, 'Maximum'),
(127, 'and\nMetabolic'),
(128, 'Rate'),
(129, 'Uca'),
(130, 'perplexa'),
(131, 'crassipes'),
(132, 'Studies'),
(133, 'Microplastics'),
(134, 'Morphology\nCharacteristics'),
(135, 'Coastal'),
(136, 'Water'),
(137, 'of\nMakassar'),
(138, 'City'),
(139, 'THE'),
(140, 'RELATIONSHIP'),
(141, 'OF'),
(142, 'ENVIRONMENTAL'),
(143, 'FACTORS'),
(144, 'TO'),
(145, 'THE\nLEVEL'),
(146, 'DENGUE'),
(147, 'ENDEMICITY'),
(148, 'IN'),
(149, 'CITY'),
(150, 'MAKASSAR'),
(151, 'Distance'),
(152, 'to'),
(153, 'sundaicus'),
(154, 'larval\nhabitats'),
(155, 'dominant'),
(156, 'among'),
(157, 'risk'),
(158, 'factors'),
(159, 'for\nparasitemia'),
(160, 'mesoendemic'),
(161, 'Southwest\nSumba'),
(162, 'Hypopharynx'),
(163, 'Male'),
(164, 'Female'),
(165, 'Mosquitoes'),
(166, 'ENTOMOLOGY'),
(167, 'CONFIRMATION'),
(168, 'CASES'),
(169, 'TEN'),
(170, 'REGIONAL\nHEALTH'),
(171, 'CENTER'),
(172, 'BULUKUMBA'),
(173, 'DISTRICT'),
(174, 'prevalence'),
(175, 'Nias'),
(176, 'North'),
(177, 'Sumatra'),
(178, 'Province\nIndonesia'),
(179, 'MOUTHPARTS'),
(180, 'MALE'),
(181, 'STEGOMYIA'),
(182, 'MOSQUITOES'),
(183, 'spp'),
(184, 'villages'),
(185, 'Salubarana'),
(186, 'Kadaila'),
(187, 'Mamuju'),
(188, 'Province'),
(189, 'Spatial'),
(190, 'Repellent'),
(191, 'Incidence'),
(192, 'Two'),
(193, 'Villages'),
(194, 'Sumba'),
(195, 'XXIII'),
(196, 'Italian'),
(197, 'Association'),
(198, 'Primatology'),
(199, 'Congress'),
(200, 'Trento'),
(201, 'Italy'),
(202, 'September'),
(203, '1416'),
(204, '2017'),
(205, 'Abstracts'),
(206, 'Habitat'),
(207, 'Complexity'),
(208, 'Its'),
(209, 'Use'),
(210, 'Correlate'),
(211, 'SoilTransmitted\nHelminthiasis'),
(212, 'Social'),
(213, 'Groups'),
(214, 'Macaca'),
(215, 'maura'),
(216, 'HR'),
(217, 'Schinz\n1825'),
(218, 'Endangered'),
(219, 'Primates'),
(220, ''),
(221, 'Identification'),
(222, 'Virulence'),
(223, 'Bacillus'),
(224, 'anthracis'),
(225, 'Soil\nby'),
(226, 'Multiplex'),
(227, 'PCR'),
(228, 'Technique'),
(229, 'Sulawesi\nProvince'),
(230, 'Evaluation'),
(231, 'Molecular'),
(232, 'Techniques'),
(233, 'Reverse\nTranscription'),
(234, 'LoopMediated'),
(235, 'Isothermal'),
(236, 'Amplification\nRTLAMP'),
(237, 'Reverse'),
(238, 'Transcription'),
(239, 'Polymerase'),
(240, 'Chain\nReaction'),
(241, 'RTPCR'),
(242, 'Their'),
(243, 'Diagnostic'),
(244, 'Results'),
(245, 'on\nMinIONTM'),
(246, 'Nanopore'),
(247, 'Sequencer'),
(248, 'for'),
(249, 'Detection'),
(250, 'of\nDe'),
(251, 'Towards'),
(252, 'eradication'),
(253, 'three'),
(254, 'years'),
(255, 'after'),
(256, 'tsunami'),
(257, '2004'),
(258, 'has\nmalaria'),
(259, 'transmission'),
(260, 'been'),
(261, 'eliminated'),
(262, 'island'),
(263, 'Simeulue'),
(264, 'Maxillae'),
(265, 'Mandibles'),
(266, 'Autogenous\nMosquitoes'),
(267, 'Culicidae'),
(268, 'Mosquito'),
(269, 'faunas'),
(270, 'MarnujuSouth\nSulawesiIndonesia'),
(271, 'Mouthpart'),
(272, 'morphology'),
(273, 'male'),
(274, 'Aedes'),
(275, 'mosquitoes'),
(276, 'review'),
(277, 'hardseedness'),
(278, 'breaking'),
(279, 'dormancy'),
(280, 'tropical'),
(281, 'forage'),
(282, 'legumes'),
(283, 'Analysis'),
(284, 'Factors'),
(285, 'Affecting'),
(286, 'Expenditure'),
(287, 'Poor'),
(288, 'Households'),
(289, 'Luwu'),
(290, 'BREADFRUIT'),
(291, 'LEAF'),
(292, 'Artocarpus'),
(293, 'altilis'),
(294, 'EXTRACT'),
(295, 'REDUCES'),
(296, 'HEPATIC'),
(297, 'AND'),
(298, 'RENAL'),
(299, 'DAMAGES'),
(300, 'ALLOXANINDUCED'),
(301, 'DIABETIC'),
(302, 'RATS'),
(303, 'Comparative'),
(304, 'field'),
(305, 'evaluation'),
(306, 'kelambu\ntraps'),
(307, 'barrier'),
(308, 'screens'),
(309, 'screens\nwith'),
(310, 'eaves'),
(311, 'longitudinal'),
(312, 'surveillance'),
(313, 'adult\nAnopheles'),
(314, 'identification'),
(315, 'maculatus'),
(316, 'group'),
(317, 'of\nsubgenus'),
(318, 'Indonesian'),
(319, 'Archipelago'),
(320, 'Sylvopastoral'),
(321, 'system'),
(322, 'using'),
(323, 'Leucaena'),
(324, 'leucocephala'),
(325, 'sustainable'),
(326, 'animal'),
(327, 'production'),
(328, '123'),
(329, 'program'),
(330, 'tes'),
(331, '123123123'),
(332, 'An'),
(333, 'Aquarium'),
(334, 'Trade'),
(335, 'Dendrochirotid'),
(336, 'Holothurian'),
(337, 'Pseudocolochirus'),
(338, 'sp'),
(339, 'processed'),
(340, 'into'),
(341, 'tripang'),
(342, 'in'),
(343, 'Sulawesi'),
(344, 'Indonesia'),
(345, 'Efek'),
(346, 'Samping'),
(347, 'Obat'),
(348, 'terhadap'),
(349, 'Kepatuhan'),
(350, 'Pengobatan'),
(351, 'Antiretroviral'),
(352, 'Orang'),
(353, 'dengan'),
(354, 'HIVAIDS'),
(355, 'Perception'),
(356, 'of'),
(357, 'Beef'),
(358, 'Cattle'),
(359, 'Breeders'),
(360, 'on'),
(361, 'Utilization'),
(362, 'Banana'),
(363, 'Stems'),
(364, 'as'),
(365, 'Creature'),
(366, 'Nourish'),
(367, 'Marioriawa'),
(368, 'Area'),
(369, 'Soppeng'),
(370, 'Regency'),
(371, 'DETERMINAN'),
(372, 'SOSIAL'),
(373, 'DAN'),
(374, 'KETERATURAN'),
(375, 'BEROBAT'),
(376, 'TERHADAP'),
(377, 'PERUBAHAN'),
(378, 'KONVERSI'),
(379, 'PASIEN'),
(380, 'TUBERKULOSIS'),
(381, 'PARU'),
(382, 'KOMORBIDITAS'),
(383, 'DIABETES'),
(384, 'MELLITUS'),
(385, 'MANIFESTASI'),
(386, 'KLINIK'),
(387, 'KUALITAS'),
(388, 'HIDUP'),
(389, 'PADA'),
(390, 'PENDERITA');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id`, `nama`, `nip`, `jabatan`) VALUES
(1, 'Prof Abcd', '123123', 'Prof'),
(2, 'kepala fakultas', '123123', 'Kepala'),
(3, 'Pengaju 123', '89798798798', 'Prof');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_karya_ilmiah`
--

CREATE TABLE `penilaian_karya_ilmiah` (
  `id` int(12) NOT NULL,
  `id_tim_penilai` varchar(255) NOT NULL,
  `idpublikasi` varchar(255) NOT NULL,
  `nama_dosen` varchar(255) DEFAULT NULL,
  `nip_dosen` varchar(255) DEFAULT NULL,
  `indikasi_jurnal` varchar(255) DEFAULT NULL,
  `linearitas_jurnal` varchar(255) DEFAULT NULL,
  `penilaian_ruang_lingkup_jurnal` varchar(255) DEFAULT NULL,
  `penilaian_kelengkapan_jurnal` varchar(255) DEFAULT NULL,
  `penilaian_kecukupan_jurnal` varchar(255) DEFAULT NULL,
  `penilaian_kualitas_penerbit_jurnal` varchar(255) DEFAULT NULL,
  `penilaian_akhir_ruang_lingkup_jurnal` varchar(255) NOT NULL,
  `penilaian_akhir_kelengkapan_jurnal` varchar(255) NOT NULL,
  `penilaian_akhir_kecukupan_jurnal` varchar(255) NOT NULL,
  `penilaian_akhir_kualitas_penerbit_jurnal` varchar(255) NOT NULL,
  `penilaian_total_jurnal` varchar(255) NOT NULL,
  `penilaian_total_akhir_jurnal` varchar(255) NOT NULL,
  `komentar_kelengkapan_jurnal` varchar(255) DEFAULT NULL,
  `komentar_ruang_lingkup_jurnal` varchar(255) DEFAULT NULL,
  `komentar_kecukupan_jurnal` varchar(255) DEFAULT NULL,
  `komentar_kualitas_penerbit_jurnal` varchar(255) DEFAULT NULL,
  `penilaian_kelengkapan_prosiding` varchar(255) DEFAULT NULL,
  `penilaian_ruang_lingkup_prosiding` varchar(255) DEFAULT NULL,
  `penilaian_kecukupan_prosiding` varchar(255) DEFAULT NULL,
  `penilaian_kualitas_penerbit_prosiding` varchar(255) DEFAULT NULL,
  `penilaian_akhir_kelengkapan_prosiding` varchar(255) NOT NULL,
  `penilaian_akhir_ruang_lingkup_prosiding` varchar(255) NOT NULL,
  `penilaian_akhir_kecukupan_prosiding` varchar(255) NOT NULL,
  `penilaian_akhir_kualitas_penerbit_prosiding` varchar(255) NOT NULL,
  `penilaian_total_prosiding` varchar(255) NOT NULL,
  `penilaian_total_akhir_prosiding` varchar(255) NOT NULL,
  `catatan_prosiding` varchar(255) DEFAULT NULL,
  `penilaian_kelengkapan_buku` varchar(255) DEFAULT NULL,
  `penilaian_ruang_lingkup_buku` varchar(255) DEFAULT NULL,
  `penilaian_kecukupan_buku` varchar(255) DEFAULT NULL,
  `penilaian_kualitas_penerbit_buku` varchar(255) DEFAULT NULL,
  `penilaian_akhir_kelengkapan_buku` varchar(255) NOT NULL,
  `penilaian_akhir_ruang_lingkup_buku` varchar(255) NOT NULL,
  `penilaian_akhir_kecukupan_buku` varchar(255) NOT NULL,
  `penilaian_akhir_kualitas_penerbit_buku` varchar(255) NOT NULL,
  `penilaian_total_buku` varchar(255) NOT NULL,
  `penilaian_total_akhir_buku` varchar(255) NOT NULL,
  `catatan_buku` varchar(255) DEFAULT NULL,
  `sudah_diperiksa` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian_karya_ilmiah`
--

INSERT INTO `penilaian_karya_ilmiah` (`id`, `id_tim_penilai`, `idpublikasi`, `nama_dosen`, `nip_dosen`, `indikasi_jurnal`, `linearitas_jurnal`, `penilaian_ruang_lingkup_jurnal`, `penilaian_kelengkapan_jurnal`, `penilaian_kecukupan_jurnal`, `penilaian_kualitas_penerbit_jurnal`, `penilaian_akhir_ruang_lingkup_jurnal`, `penilaian_akhir_kelengkapan_jurnal`, `penilaian_akhir_kecukupan_jurnal`, `penilaian_akhir_kualitas_penerbit_jurnal`, `penilaian_total_jurnal`, `penilaian_total_akhir_jurnal`, `komentar_kelengkapan_jurnal`, `komentar_ruang_lingkup_jurnal`, `komentar_kecukupan_jurnal`, `komentar_kualitas_penerbit_jurnal`, `penilaian_kelengkapan_prosiding`, `penilaian_ruang_lingkup_prosiding`, `penilaian_kecukupan_prosiding`, `penilaian_kualitas_penerbit_prosiding`, `penilaian_akhir_kelengkapan_prosiding`, `penilaian_akhir_ruang_lingkup_prosiding`, `penilaian_akhir_kecukupan_prosiding`, `penilaian_akhir_kualitas_penerbit_prosiding`, `penilaian_total_prosiding`, `penilaian_total_akhir_prosiding`, `catatan_prosiding`, `penilaian_kelengkapan_buku`, `penilaian_ruang_lingkup_buku`, `penilaian_kecukupan_buku`, `penilaian_kualitas_penerbit_buku`, `penilaian_akhir_kelengkapan_buku`, `penilaian_akhir_ruang_lingkup_buku`, `penilaian_akhir_kecukupan_buku`, `penilaian_akhir_kualitas_penerbit_buku`, `penilaian_total_buku`, `penilaian_total_akhir_buku`, `catatan_buku`, `sudah_diperiksa`) VALUES
(212, '197202271998022002', '618be3b48728d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(213, '197310101998021001', '618be3b48728d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(214, '198305102014041001', '618be3b48728d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(215, '197202271998022002', '618be3d123684', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(216, '197202271998022002', '618be3edcccbd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(217, '197202271998022002', '61944f268887c', NULL, NULL, NULL, NULL, '9', '9', '9', '9', '', '', '', '', '9', '', '', '', '', '', NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '6'),
(218, '197202271998022002', '619a57f649ae3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(219, '194809271973031001', '619a57f649ae3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9'),
(220, '197202271998022002', '619a59f0e300b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '90', '91', '92', '93', '', '', '', '', '94', '', '100', '6'),
(221, '198305102014041001', '619a59f0e300b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', NULL, '9');

-- --------------------------------------------------------

--
-- Table structure for table `tim_penilai`
--

CREATE TABLE `tim_penilai` (
  `id` int(11) NOT NULL,
  `id_penilai` varchar(100) NOT NULL,
  `id_publikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim_penilai`
--

INSERT INTO `tim_penilai` (`id`, `id_penilai`, `id_publikasi`) VALUES
(3, '197202271998022002', '619a59f0e300b'),
(4, '198305102014041001', '619a59f0e300b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karya_ilmiah`
--
ALTER TABLE `karya_ilmiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_user`
--
ALTER TABLE `level_user`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `list_kata_karya_ilmiah`
--
ALTER TABLE `list_kata_karya_ilmiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_karya_ilmiah`
--
ALTER TABLE `penilaian_karya_ilmiah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim_penilai`
--
ALTER TABLE `tim_penilai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karya_ilmiah`
--
ALTER TABLE `karya_ilmiah`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT for table `level_user`
--
ALTER TABLE `level_user`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_kata_karya_ilmiah`
--
ALTER TABLE `list_kata_karya_ilmiah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penilaian_karya_ilmiah`
--
ALTER TABLE `penilaian_karya_ilmiah`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `tim_penilai`
--
ALTER TABLE `tim_penilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
