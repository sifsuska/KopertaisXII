-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jul 2018 pada 05.19
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kopertais`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ps`
--

CREATE TABLE IF NOT EXISTS `data_ps` (
`id_ps` int(11) NOT NULL,
  `id_ptais` int(11) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `akreditasi` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `data_ps`
--

INSERT INTO `data_ps` (`id_ps`, `id_ptais`, `program_studi`, `akreditasi`) VALUES
(1, 7, 'Pendidikan agama islam', 'B'),
(2, 7, 'ekonomi syariah', 'B'),
(3, 7, 'Pendidikan guru raudhatul atfhal', 'B'),
(4, 8, 'ekonomi syariah', 'B'),
(5, 9, 'Pendidikan Agama Islam', 'B'),
(6, 9, 'Tadris Bahasa Inggris', 'C'),
(7, 9, 'Ekonomi Syariah', 'C'),
(8, 9, 'Pendidikan Guru Madrasa Ibtidaiyah', 'Belum terakreditasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ptais`
--

CREATE TABLE IF NOT EXISTS `data_ptais` (
`id_ptais` int(11) NOT NULL,
  `nama_ptais` varchar(50) NOT NULL,
  `alamat_ptais` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL,
  `akreditasi_ptais` varchar(2) NOT NULL,
  `jenjang` varchar(2) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `data_ptais`
--

INSERT INTO `data_ptais` (`id_ptais`, `nama_ptais`, `alamat_ptais`, `kabupaten`, `akreditasi_ptais`, `jenjang`, `latitude`, `longitude`) VALUES
(7, 'FAI UIR Pekanbaru', 'Jl. Kaharuddin Nasution No.13 Pekanbaru           ', 'Pekanbaru', 'B', 'S1', '0.4689317999999999                                ', '101.45423660000006                                '),
(8, 'STEI Iqraâ€™ Annisa Pekanbaru', 'Jl. Riau Ujung No. 73 Pekanbaru                   ', 'Pekanbaru', 'C', 'S1', '0.5351117                                         ', '101.42144359999998                                '),
(9, 'STAI Miftahul Ulum Tanjung Pinang', 'Prof.Ir.Sutami Tanjung Pinang', 'Tanjung Pinang', 'C', 'S1', '0.9112427999999998', '104.45779519999996'),
(10, 'STAI Ar-Ridho bagan siapiapi Rohil', 'rokan hilir', 'Rohil', 'Be', 'S1', '1.650344377845454', '100.80172171376955'),
(11, 'STAI Ar-Ridho bagan siapiapi Rohil', 'rokan hilir', 'Rohil', 'A', 'S1', '1.6463978', '100.80000510000002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) CHARACTER SET latin1 NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(12, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(13, 'adnil', 'cc7efb688ea0322241c48fdd35b5cab2', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_ps`
--
ALTER TABLE `data_ps`
 ADD PRIMARY KEY (`id_ps`), ADD KEY `id_ptais` (`id_ptais`);

--
-- Indexes for table `data_ptais`
--
ALTER TABLE `data_ptais`
 ADD PRIMARY KEY (`id_ptais`), ADD KEY `id_ptais` (`id_ptais`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_ps`
--
ALTER TABLE `data_ps`
MODIFY `id_ps` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_ptais`
--
ALTER TABLE `data_ptais`
MODIFY `id_ptais` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_ps`
--
ALTER TABLE `data_ps`
ADD CONSTRAINT `data_ps_ibfk_1` FOREIGN KEY (`id_ptais`) REFERENCES `data_ptais` (`id_ptais`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
