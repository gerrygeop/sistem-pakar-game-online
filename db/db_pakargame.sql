-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2022 at 09:50 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pakargame`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `id_gejala` varchar(5) NOT NULL,
  `gejala` text NOT NULL,
  `tingkatan` varchar(6) NOT NULL,
  `MB` float NOT NULL,
  `MD` float NOT NULL,
  `CF` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`id_gejala`, `gejala`, `tingkatan`, `MB`, `MD`, `CF`) VALUES
('GJ001', 'Main game berlebihan, dalam 1 hari lebih dari 3 jam', '1', 0.6, 0.4, 0.2),
('GJ002', 'Mengganggu pendidikan atau pekerjaan, serta mengganggu hubungan seseorang dengan keluarga atau lingkungan sekitar', '1', 0.6, 0.4, 0.2),
('GJ003', 'Anda memainkan permainan secara diam-diam agar orang lain tidak tahu', '1', 0.6, 0.4, 0.2),
('GJ004', 'Mainkan game untuk menghilangkan pikiran yang tidak menyenangkan', '1', 0.6, 0.4, 0.2),
('GJ005', 'Perasaan menjadi lebih nyaman saat bermain game', '1', 0.6, 0.4, 0.2),
('GJ006', 'Pernah berkonflik dengan keluarga, teman, atau pasangan karena bermain game', '2', 0.8, 0.2, 0.6),
('GJ007', 'Berlebihan dalam bermain game online', '2', 0.8, 0.2, 0.6),
('GJ008', 'Bermain game sepanjang waktu', '2', 0.8, 0.2, 0.6),
('GJ009', 'Mengutamakan bermain game ketimbang menyelesaikan pekerjaan', '2', 0.8, 0.2, 0.6),
('GJ010', 'Terus menerus bermain game walau mengetahui ada konsekuensi negative', '2', 0.8, 0.2, 0.6),
('GJ011', 'Tidak memiliki keinginan atau minat lain selain bermain game', '2', 0.8, 0.2, 0.6),
('GJ012', 'Tidak dapat mengontrol kebiasaan bermain game', '3', 0.8, 0.2, 0.6),
('GJ013', 'Gelisa saat tidak bisa mengakses game (marah, murung, stress)', '3', 0.8, 0.2, 0.6),
('GJ014', 'Berbohong dengan orang sekitar termaksud orang tua untuk bermain game online', '3', 0.8, 0.2, 0.6),
('GJ015', 'Sulit mengurangi durasi waktu bermain game', '3', 0.8, 0.2, 0.6),
('GJ016', 'Gelisah jika tidak bermain game sehari, lekas marah, gangguan perilaku seperti gangguan tidur, makan dan perawatan diri', '3', 0.8, 0.2, 0.6),
('GJ017', 'Gejala di atas berlangsung selama 12 bulan atau lebih', '3', 0.8, 0.2, 0.6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hasil`
--

CREATE TABLE `tbl_hasil` (
  `id_hasil` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nim` int(12) NOT NULL,
  `nilai_akhir` double NOT NULL,
  `id_solusi` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hasil`
--

INSERT INTO `tbl_hasil` (`id_hasil`, `nim`, `nilai_akhir`, `id_solusi`, `timestamp`, `record`) VALUES
('2022-04-16 00:38:12', 1507055055, 61.196772693333, 2, '2022-04-16 00:38:12', '625a0ff3ec012'),
('2022-04-16 00:41:25', 1507055055, 65.737219413333, 2, '2022-04-16 00:41:25', '625a10b44b38f'),
('2022-04-16 00:44:24', 1715015002, 82.305092130133, 3, '2022-04-16 00:44:24', '625a116778e4b'),
('2022-04-16 17:27:48', 1715015001, 38.487466666667, 2, '2022-04-16 17:27:48', '625afc94332eb'),
('2022-04-19 18:52:06', 1715015003, 61.196772693333, 2, '2022-04-19 18:52:06', '625f04d5dec7a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_responden`
--

CREATE TABLE `tbl_responden` (
  `id_responden` int(5) NOT NULL,
  `id_gejala` varchar(5) NOT NULL,
  `nim` int(12) NOT NULL,
  `r_cf` float NOT NULL,
  `H` float NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `record` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_responden`
--

INSERT INTO `tbl_responden` (`id_responden`, `id_gejala`, `nim`, `r_cf`, `H`, `timestamp`, `record`) VALUES
(692, 'GJ001', 1507055055, 0.6, 0.12, '2022-04-16 00:38:11', '625a0ff3ec012'),
(693, 'GJ002', 1507055055, 0.8, 0.16, '2022-04-16 00:38:12', '625a0ff3ec012'),
(694, 'GJ003', 1507055055, 0.8, 0.16, '2022-04-16 00:38:12', '625a0ff3ec012'),
(695, 'GJ004', 1507055055, 0.8, 0.16, '2022-04-16 00:38:12', '625a0ff3ec012'),
(696, 'GJ005', 1507055055, 0.6, 0.12, '2022-04-16 00:38:12', '625a0ff3ec012'),
(697, 'GJ006', 1507055055, 0, 0, '2022-04-16 00:38:12', '625a0ff3ec012'),
(698, 'GJ007', 1507055055, 0, 0, '2022-04-16 00:38:12', '625a0ff3ec012'),
(699, 'GJ008', 1507055055, 0, 0, '2022-04-16 00:38:12', '625a0ff3ec012'),
(700, 'GJ009', 1507055055, 0, 0, '2022-04-16 00:38:12', '625a0ff3ec012'),
(701, 'GJ010', 1507055055, 0.4, 0.24, '2022-04-16 00:38:12', '625a0ff3ec012'),
(702, 'GJ011', 1507055055, 0.4, 0.24, '2022-04-16 00:38:12', '625a0ff3ec012'),
(703, 'GJ012', 1507055055, 0, 0, '2022-04-16 00:38:12', '625a0ff3ec012'),
(704, 'GJ013', 1507055055, 0.6, 0.36, '2022-04-16 00:38:12', '625a0ff3ec012'),
(705, 'GJ014', 1507055055, 0.6, 0.36, '2022-04-16 00:38:12', '625a0ff3ec012'),
(706, 'GJ015', 1507055055, 0.6, 0.36, '2022-04-16 00:38:12', '625a0ff3ec012'),
(707, 'GJ016', 1507055055, 0.4, 0.24, '2022-04-16 00:38:12', '625a0ff3ec012'),
(708, 'GJ017', 1507055055, 0.6, 0.36, '2022-04-16 00:38:12', '625a0ff3ec012'),
(709, 'GJ001', 1507055055, 0.8, 0.16, '2022-04-16 00:41:24', '625a10b44b38f'),
(710, 'GJ002', 1507055055, 0.6, 0.12, '2022-04-16 00:41:24', '625a10b44b38f'),
(711, 'GJ003', 1507055055, 0.6, 0.12, '2022-04-16 00:41:24', '625a10b44b38f'),
(712, 'GJ004', 1507055055, 0.8, 0.16, '2022-04-16 00:41:24', '625a10b44b38f'),
(713, 'GJ005', 1507055055, 0.8, 0.16, '2022-04-16 00:41:24', '625a10b44b38f'),
(714, 'GJ006', 1507055055, 0.4, 0.24, '2022-04-16 00:41:24', '625a10b44b38f'),
(715, 'GJ007', 1507055055, 0.4, 0.24, '2022-04-16 00:41:24', '625a10b44b38f'),
(716, 'GJ008', 1507055055, 0.6, 0.36, '2022-04-16 00:41:24', '625a10b44b38f'),
(717, 'GJ009', 1507055055, 0, 0, '2022-04-16 00:41:25', '625a10b44b38f'),
(718, 'GJ010', 1507055055, 0, 0, '2022-04-16 00:41:25', '625a10b44b38f'),
(719, 'GJ011', 1507055055, 0, 0, '2022-04-16 00:41:25', '625a10b44b38f'),
(720, 'GJ012', 1507055055, 0, 0, '2022-04-16 00:41:25', '625a10b44b38f'),
(721, 'GJ013', 1507055055, 0.6, 0.36, '2022-04-16 00:41:25', '625a10b44b38f'),
(722, 'GJ014', 1507055055, 0.6, 0.36, '2022-04-16 00:41:25', '625a10b44b38f'),
(723, 'GJ015', 1507055055, 0, 0, '2022-04-16 00:41:25', '625a10b44b38f'),
(724, 'GJ016', 1507055055, 0.4, 0.24, '2022-04-16 00:41:25', '625a10b44b38f'),
(725, 'GJ017', 1507055055, 0.6, 0.36, '2022-04-16 00:41:25', '625a10b44b38f'),
(726, 'GJ001', 1715015002, 0.8, 0.16, '2022-04-16 00:44:23', '625a116778e4b'),
(727, 'GJ002', 1715015002, 0.6, 0.12, '2022-04-16 00:44:23', '625a116778e4b'),
(728, 'GJ003', 1715015002, 0.6, 0.12, '2022-04-16 00:44:23', '625a116778e4b'),
(729, 'GJ004', 1715015002, 1, 0.2, '2022-04-16 00:44:23', '625a116778e4b'),
(730, 'GJ005', 1715015002, 0.6, 0.12, '2022-04-16 00:44:23', '625a116778e4b'),
(731, 'GJ006', 1715015002, 0.8, 0.48, '2022-04-16 00:44:23', '625a116778e4b'),
(732, 'GJ007', 1715015002, 0.8, 0.48, '2022-04-16 00:44:23', '625a116778e4b'),
(733, 'GJ008', 1715015002, 0.6, 0.36, '2022-04-16 00:44:23', '625a116778e4b'),
(734, 'GJ009', 1715015002, 0.8, 0.48, '2022-04-16 00:44:23', '625a116778e4b'),
(735, 'GJ010', 1715015002, 0.6, 0.36, '2022-04-16 00:44:23', '625a116778e4b'),
(736, 'GJ011', 1715015002, 0.8, 0.48, '2022-04-16 00:44:24', '625a116778e4b'),
(737, 'GJ012', 1715015002, 0.6, 0.36, '2022-04-16 00:44:24', '625a116778e4b'),
(738, 'GJ013', 1715015002, 0.6, 0.36, '2022-04-16 00:44:24', '625a116778e4b'),
(739, 'GJ014', 1715015002, 0.6, 0.36, '2022-04-16 00:44:24', '625a116778e4b'),
(740, 'GJ015', 1715015002, 1, 0.6, '2022-04-16 00:44:24', '625a116778e4b'),
(741, 'GJ016', 1715015002, 0.6, 0.36, '2022-04-16 00:44:24', '625a116778e4b'),
(742, 'GJ017', 1715015002, 0.6, 0.36, '2022-04-16 00:44:24', '625a116778e4b'),
(743, 'GJ001', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(744, 'GJ003', 1715015001, 0.4, 0.08, '2022-04-16 17:27:48', '625afc94332eb'),
(745, 'GJ004', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(746, 'GJ005', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(747, 'GJ006', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(748, 'GJ007', 1715015001, 0.4, 0.24, '2022-04-16 17:27:48', '625afc94332eb'),
(749, 'GJ008', 1715015001, 0.4, 0.24, '2022-04-16 17:27:48', '625afc94332eb'),
(750, 'GJ009', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(751, 'GJ010', 1715015001, 0.4, 0.24, '2022-04-16 17:27:48', '625afc94332eb'),
(752, 'GJ011', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(753, 'GJ012', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(754, 'GJ013', 1715015001, 0.6, 0.36, '2022-04-16 17:27:48', '625afc94332eb'),
(755, 'GJ014', 1715015001, 0.4, 0.24, '2022-04-16 17:27:48', '625afc94332eb'),
(756, 'GJ015', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(757, 'GJ016', 1715015001, 0, 0, '2022-04-16 17:27:48', '625afc94332eb'),
(758, 'GJ001', 1715015003, 0.6, 0.12, '2022-04-19 18:52:05', '625f04d5dec7a'),
(759, 'GJ002', 1715015003, 0.8, 0.16, '2022-04-19 18:52:06', '625f04d5dec7a'),
(760, 'GJ003', 1715015003, 0.8, 0.16, '2022-04-19 18:52:06', '625f04d5dec7a'),
(761, 'GJ004', 1715015003, 0.8, 0.16, '2022-04-19 18:52:06', '625f04d5dec7a'),
(762, 'GJ005', 1715015003, 0.6, 0.12, '2022-04-19 18:52:06', '625f04d5dec7a'),
(763, 'GJ006', 1715015003, 0, 0, '2022-04-19 18:52:06', '625f04d5dec7a'),
(764, 'GJ007', 1715015003, 0, 0, '2022-04-19 18:52:06', '625f04d5dec7a'),
(765, 'GJ008', 1715015003, 0, 0, '2022-04-19 18:52:06', '625f04d5dec7a'),
(766, 'GJ009', 1715015003, 0, 0, '2022-04-19 18:52:06', '625f04d5dec7a'),
(767, 'GJ010', 1715015003, 0.4, 0.24, '2022-04-19 18:52:06', '625f04d5dec7a'),
(768, 'GJ011', 1715015003, 0.4, 0.24, '2022-04-19 18:52:06', '625f04d5dec7a'),
(769, 'GJ012', 1715015003, 0, 0, '2022-04-19 18:52:06', '625f04d5dec7a'),
(770, 'GJ013', 1715015003, 0.6, 0.36, '2022-04-19 18:52:06', '625f04d5dec7a'),
(771, 'GJ014', 1715015003, 0.6, 0.36, '2022-04-19 18:52:06', '625f04d5dec7a'),
(772, 'GJ015', 1715015003, 0.6, 0.36, '2022-04-19 18:52:06', '625f04d5dec7a'),
(773, 'GJ016', 1715015003, 0.4, 0.24, '2022-04-19 18:52:06', '625f04d5dec7a'),
(774, 'GJ017', 1715015003, 0.6, 0.36, '2022-04-19 18:52:06', '625f04d5dec7a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_solusi`
--

CREATE TABLE `tbl_solusi` (
  `id_solusi` int(3) NOT NULL,
  `level_gejala` varchar(6) NOT NULL,
  `solusi` text NOT NULL,
  `min` double DEFAULT NULL,
  `max` double DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_solusi`
--

INSERT INTO `tbl_solusi` (`id_solusi`, `level_gejala`, `solusi`, `min`, `max`, `color`) VALUES
(1, 'Ringan', 'Melakukan aktifitas atau kegiata positif, menjaga komunikasi, serta jaga Kesehatan fisik dan pikiran.', 0, 34, 'bg-warning'),
(2, 'Sedang', 'Tentukan makna dan tujuan hidup, lakukan komunikasi dengan orang terdekat dan orang lain, dan imbangi dengan aktifitas positif', 34, 68, 'bg-orange'),
(3, 'Berat', 'Carilah orang terdekat untuk selalu mengingatkan mengurangi waktu untuk memakai gadget, fokus pada hal yang ini dicapai dan tujuan hidup, alihkan perhatian ke aktifitas positif atau mencari berkumpul dengan orang lain, banyak beribadah dan bertaqwa pada Tuhan YME. Jika saran sudah coba dilakukan tetapi belum berdampak pada penurunan kecanduan anda, silahkan datang ke psikologi untuk konsultasi secara langsung', 68, 100, 'bg-danger');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nim` int(12) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `fakultas` varchar(150) DEFAULT NULL,
  `angkatan` int(4) DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan','','') DEFAULT NULL,
  `umur` int(3) DEFAULT NULL,
  `password` varchar(12) NOT NULL,
  `level` enum('admin','mahasiswa','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nim`, `nama`, `fakultas`, `angkatan`, `jk`, `umur`, `password`, `level`) VALUES
(23521046, 'Zawil', 'FT', 2015, 'Perempuan', 24, 'admin123', 'admin'),
(1507055055, 'hikam', 'FT', 2017, 'Laki-laki', 22, 'qwer', 'mahasiswa'),
(1715015001, 'Jennie', 'Teknik Informatika', 2019, 'Perempuan', 24, 'asdasd', 'mahasiswa'),
(1715015002, 'Joko Anwar', 'Teknik Film', 2019, 'Perempuan', 23, 'qwer', 'mahasiswa'),
(1715015003, 'Roni Stepani', 'Teknik Informatika', 2019, 'Laki-laki', 23, 'asdasd', 'mahasiswa'),
(1715015145, 'Gerry', 'Teknik Ilmu Budaya', 2018, 'Laki-laki', 20, 'asdasd', 'mahasiswa'),
(1903016065, 'Resky', 'FT', 2019, 'Laki-laki', 23, 'asdasd', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `tbl_hasil`
--
ALTER TABLE `tbl_hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `tbl_responden`
--
ALTER TABLE `tbl_responden`
  ADD PRIMARY KEY (`id_responden`);

--
-- Indexes for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  ADD PRIMARY KEY (`id_solusi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_responden`
--
ALTER TABLE `tbl_responden`
  MODIFY `id_responden` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  MODIFY `id_solusi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
