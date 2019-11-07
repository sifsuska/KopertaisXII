-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2018 at 08:47 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopertais`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_ps`
--

CREATE TABLE `data_ps` (
  `id_ps` int(11) NOT NULL,
  `id_ptais` int(11) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `akreditasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ps`
--

INSERT INTO `data_ps` (`id_ps`, `id_ptais`, `program_studi`, `akreditasi`) VALUES
(18, 7, 'TES12345', 'A'),
(22, 7, 'ABC', 'A'),
(23, 7, 'SAVAGE', 'A'),
(24, 7, 'MANIAC', 'A'),
(25, 7, 'TK', 'A'),
(26, 7, 'OKAY DONE', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `data_ptais`
--

CREATE TABLE `data_ptais` (
  `id_ptais` int(11) NOT NULL,
  `nama_ptais` varchar(50) NOT NULL,
  `alamat_ptais` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `akreditasi_ptais` varchar(2) NOT NULL,
  `jenjang` varchar(2) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_ptais`
--

INSERT INTO `data_ptais` (`id_ptais`, `nama_ptais`, `alamat_ptais`, `kabupaten`, `akreditasi_ptais`, `jenjang`, `latitude`, `longitude`) VALUES
(6, 'llllllll', 'jalan bangau sakti pekanbaru', 'llll', 'A', 'D3', '0.4763865999999999', '101.37521930000003'),
(7, 'ROOTNST', 'jalan cipta karya gg bersama', 'Lebih keren kalau get data dari database, pakai aj', 'A', 'S1', '0.4510374', '101.39451459999998');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(8) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ps`
--
ALTER TABLE `data_ps`
  ADD PRIMARY KEY (`id_ps`),
  ADD KEY `id_ptais` (`id_ptais`);

--
-- Indexes for table `data_ptais`
--
ALTER TABLE `data_ptais`
  ADD PRIMARY KEY (`id_ptais`),
  ADD KEY `id_ptais` (`id_ptais`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ps`
--
ALTER TABLE `data_ps`
  MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `data_ptais`
--
ALTER TABLE `data_ptais`
  MODIFY `id_ptais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_ps`
--
ALTER TABLE `data_ps`
  ADD CONSTRAINT `data_ps_ibfk_1` FOREIGN KEY (`id_ptais`) REFERENCES `data_ptais` (`id_ptais`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
