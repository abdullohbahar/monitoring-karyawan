-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 08:31 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idSuperadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `idKaryawan` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text,
  `email` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `nik` text,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `idAdmin`, `nama`, `alamat`, `email`, `no_hp`, `jabatan`, `nik`, `password`, `status`) VALUES
(7, 0, 'Silvia Wijayanti', 'Jr. Peta No. 750, Batam 76004, SumUt', 'silvia@gmail.com', '08429 5607 605 ', 'HR', '1234567890123456', '$2y$10$fBX/FGWVMxFRH.EwWiwQT.buZlbkmsnoxV.nFt0rJzXEazIHujhe.', 'Aktif'),
(9, 0, 'Kenes Hardiansyah', 'Dk. Dago No. 106, Kupang 84930, Jambi', 'kenes@gmail.com', '085701223722', 'Staff IT', '1241231231232123', '$2y$10$1ihcGOGCjhj3B53itqM.6uPFU1Ulo1EbC3KsJzAfiFRGgj88G8ow6', 'Aktif'),
(10, 0, 'karyawan', 'karyawan', 'karyawan@gmail.com', '123467789', 'karyawan', '123456780012311', '$2y$10$EMZ/yWCK4TLTufQuGa37aej7PK72DTB46k.nXS4WH23JQaI6SzNIS', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `idPresensi` int(11) NOT NULL,
  `idKaryawan` int(11) DEFAULT NULL,
  `keterangan` text,
  `jenis_presensi` varchar(10) NOT NULL,
  `tanggal` varchar(11) DEFAULT NULL,
  `jam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`idPresensi`, `idKaryawan`, `keterangan`, `jenis_presensi`, `tanggal`, `jam`) VALUES
(1, 10, 'Terlambat', 'Masuk', '0000-00-00', '12:27:24'),
(2, 10, 'Terlambat', 'Masuk', '16-06-2022', '12:37:39'),
(3, NULL, 'Terlambat', 'Masuk', '16-06-2022', '12:39:18'),
(4, NULL, 'Terlambat', 'Masuk', '16-06-2022', '12:40:20'),
(5, NULL, 'Terlambat', 'Masuk', '16-06-2022', '12:42:17'),
(6, NULL, 'Terlambat', 'Masuk', '16-06-2022', '12:42:58'),
(14, 10, 'Pulang', 'Pulang', '16-06-2022', '15:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `idSuperadmin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idKaryawan`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`idPresensi`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`idSuperadmin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `idPresensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `idSuperadmin` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
