-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2022 at 04:12 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `email`, `password`, `idSuperadmin`) VALUES
(2, 'admin@gmail.com', '$2y$10$oJ6qiIaxMEWxgHNLExeUheN0aYVO2tq7lrlyUsMo37/o6W84vecGO', 0);

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
(11, 0, 'Gatra Nashiruddin', 'Gg. Ahmad Dahlan No. 254, Yogyakarta 82879, Bali', 'karyawan@gmail.com', '0812345678', 'Karyawan', '8327818273821', '$2y$10$/BNl1mdzD/.Ne6AKRHdKwu8dBFrMtINGLbXzf.iUAm3EvKFRGRkbe', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `idPresensi` int(11) NOT NULL,
  `idKaryawan` int(11) DEFAULT NULL,
  `keterangan` text,
  `jenis_presensi` varchar(20) NOT NULL,
  `tanggal` varchar(11) DEFAULT NULL,
  `jam` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`idSuperadmin`, `email`, `password`) VALUES
(1, 'superadmin@gmail.com', '$2y$10$IY6JwNNdMrk/Rkx0pnpZsOgbinb1/wmLvoVttpQHn0OuopeoWjtjC');

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
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idKaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `idPresensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `idSuperadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
