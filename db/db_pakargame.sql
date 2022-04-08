-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 07:32 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

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
  `id_hasil` int(11) NOT NULL,
  `nim` int(12) NOT NULL,
  `nilai_akhir` float NOT NULL,
  `kategori` varchar(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `record` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_responden`
--

INSERT INTO `tbl_responden` (`id_responden`, `id_gejala`, `nim`, `r_cf`, `H`, `timestamp`, `record`) VALUES
(198, 'GJ001', 1903016065, 0.6, 0.12, '2022-02-10 21:47:29', 1),
(199, 'GJ002', 1903016065, 0.8, 0.16, '2022-02-10 21:47:29', 1),
(200, 'GJ003', 1903016065, 0.8, 0.16, '2022-02-10 21:47:29', 1),
(201, 'GJ004', 1903016065, 0.8, 0.16, '2022-02-10 21:47:29', 1),
(202, 'GJ005', 1903016065, 0.6, 0.12, '2022-02-10 21:47:29', 1),
(203, 'GJ006', 1903016065, 0, 0, '2022-02-10 21:47:29', 1),
(204, 'GJ007', 1903016065, 0, 0, '2022-02-10 21:47:29', 1),
(205, 'GJ008', 1903016065, 0, 0, '2022-02-10 21:47:29', 1),
(206, 'GJ009', 1903016065, 0, 0, '2022-02-10 21:47:29', 1),
(207, 'GJ010', 1903016065, 0.4, 0.24, '2022-02-10 21:47:29', 1),
(208, 'GJ011', 1903016065, 0.4, 0.24, '2022-02-10 21:47:29', 1),
(209, 'GJ012', 1903016065, 0, 0, '2022-02-10 21:47:29', 1),
(210, 'GJ013', 1903016065, 0.6, 0.36, '2022-02-10 21:47:29', 1),
(211, 'GJ014', 1903016065, 0.6, 0.36, '2022-02-10 21:47:29', 1),
(212, 'GJ015', 1903016065, 0.6, 0.36, '2022-02-10 21:47:29', 1),
(213, 'GJ016', 1903016065, 0.4, 0.24, '2022-02-10 21:47:29', 1),
(214, 'GJ017', 1903016065, 0.6, 0.36, '2022-02-10 21:47:29', 1),
(215, 'GJ001', 1903016065, 0.8, 0.16, '2022-02-10 21:48:51', 2),
(216, 'GJ002', 1903016065, 0.6, 0.12, '2022-02-10 21:48:51', 2),
(217, 'GJ003', 1903016065, 0.6, 0.12, '2022-02-10 21:48:51', 2),
(218, 'GJ004', 1903016065, 0.8, 0.16, '2022-02-10 21:48:51', 2),
(219, 'GJ005', 1903016065, 0.8, 0.16, '2022-02-10 21:48:51', 2),
(220, 'GJ006', 1903016065, 0.4, 0.24, '2022-02-10 21:48:51', 2),
(221, 'GJ007', 1903016065, 0.4, 0.24, '2022-02-10 21:48:51', 2),
(222, 'GJ008', 1903016065, 0.6, 0.36, '2022-02-10 21:48:51', 2),
(223, 'GJ009', 1903016065, 0, 0, '2022-02-10 21:48:51', 2),
(224, 'GJ010', 1903016065, 0, 0, '2022-02-10 21:48:51', 2),
(225, 'GJ011', 1903016065, 0, 0, '2022-02-10 21:48:51', 2),
(226, 'GJ012', 1903016065, 0, 0, '2022-02-10 21:48:51', 2),
(227, 'GJ014', 1903016065, 0.6, 0.36, '2022-02-10 21:48:51', 2),
(228, 'GJ015', 1903016065, 0, 0, '2022-02-10 21:48:51', 2),
(229, 'GJ016', 1903016065, 0.4, 0.24, '2022-02-10 21:48:51', 2),
(230, 'GJ017', 1903016065, 0.6, 0.36, '2022-02-10 21:48:51', 2),
(231, 'GJ010', 1903016065, 0.8, 0.48, '2022-02-13 06:07:06', 2),
(232, 'GJ011', 1903016065, 0.6, 0.36, '2022-02-13 06:07:06', 2),
(233, 'GJ012', 1903016065, 0.8, 0.48, '2022-02-13 06:07:06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_solusi`
--

CREATE TABLE `tbl_solusi` (
  `id_solusi` int(3) NOT NULL,
  `level_gejala` varchar(6) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_solusi`
--

INSERT INTO `tbl_solusi` (`id_solusi`, `level_gejala`, `solusi`) VALUES
(1, 'Rendah', 'Melakukan aktifitas atau kegiata positif, menjaga komunikasi, serta jaga Kesehatan fisik dan pikiran'),
(2, 'Sedang', 'Tentukan makna dan tujuan hidup, lakukan komunikasi dengan orang terdekat dan orang lain, dan imbangi dengan aktifitas positif'),
(3, 'Berat', 'Carilah orang terdekat untuk selalu mengingatkan mengurangi waktu untuk memakai gadget, fokus pada hal yang ini dicapai dan tujuan hidup, alihkan perhatian ke aktifitas positif atau mencari berkumpul dengan orang lain, banyak beribadah dan bertaqwa pada Tuhan YME. Jika saran sudah coba dilakukan tetapi belum berdampak pada penurunan kecanduan anda, silahkan datang ke psikologi untuk konsultasi secara langsung');

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
(1903016065, 'Riski', 'FT', 2019, 'Laki-laki', 23, 'hikam123', 'mahasiswa');

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
  MODIFY `id_responden` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `tbl_solusi`
--
ALTER TABLE `tbl_solusi`
  MODIFY `id_solusi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
