-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2020 at 12:10 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_user` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_user`, `nama`, `username`, `pass`) VALUES
('Auser001', 'Raynold', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_user` varchar(32) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`id_user`, `nama`, `username`, `pass`) VALUES
('Cuser001', 'Ray', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
('Cuser002', 'Panji', 'user2', '7e58d63b60197ceb55a1c487989a3720');

-- --------------------------------------------------------

--
-- Table structure for table `tb_film`
--

CREATE TABLE `tb_film` (
  `kd_film` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `jenis` text NOT NULL,
  `tahun_rilis` int(4) DEFAULT NULL,
  `gambar` varchar(32) NOT NULL DEFAULT '''default.jpg''',
  `durasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_film`
--

INSERT INTO `tb_film` (`kd_film`, `judul`, `jenis`, `tahun_rilis`, `gambar`, `durasi`) VALUES
(1, 'Ip Man 4', 'Action, History, China', 2019, 'ip_man_4.jpg', 105),
(2, 'Avanger: Infinity War', 'Action, Fantasy, Usa', 2018, 'avanger_infinity_war.jpg', 149),
(3, 'Your Name', 'Animation, Japan', 2016, 'your_name.jpg', 106);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `kd_jadwal` int(11) NOT NULL,
  `kd_studio` varchar(12) NOT NULL,
  `kd_film` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(32) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`kd_jadwal`, `kd_studio`, `kd_film`, `tanggal`, `jam`, `harga`) VALUES
(1, '001', 1, '2020-08-18', '21:49', 35000),
(2, '002', 1, '2020-10-13', '21:00', 35000),
(3, '001', 3, '2020-08-17', '20:30', 40000),
(4, '001', 2, '2020-08-24', '01:30', 40000),
(5, '002', 3, '2020-10-08', '20:54', 41000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_studio`
--

CREATE TABLE `tb_studio` (
  `kd_studio` varchar(12) NOT NULL,
  `studio` varchar(11) NOT NULL,
  `tempat_duduk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_studio`
--

INSERT INTO `tb_studio` (`kd_studio`, `studio`, `tempat_duduk`) VALUES
('001', 'Studio 1', 35),
('002', 'Studio 2', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `kd_tiket` int(11) NOT NULL,
  `kd_jadwal` int(11) NOT NULL,
  `id_user` varchar(32) NOT NULL,
  `jum_tiket` int(11) NOT NULL,
  `tot_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`kd_tiket`, `kd_jadwal`, `id_user`, `jum_tiket`, `tot_harga`) VALUES
(4, 2, 'Cuser001', 1, 35000),
(6, 3, 'Cuser001', 1, 40000),
(7, 4, 'Cuser001', 2, 80000),
(8, 2, 'Cuser002', 4, 140000),
(9, 3, 'Cuser002', 2, 80000),
(10, 4, 'Cuser002', 4, 160000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_film`
--
ALTER TABLE `tb_film`
  ADD PRIMARY KEY (`kd_film`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`),
  ADD KEY `kd_studio` (`kd_studio`),
  ADD KEY `kd_film` (`kd_film`);

--
-- Indexes for table `tb_studio`
--
ALTER TABLE `tb_studio`
  ADD PRIMARY KEY (`kd_studio`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`kd_tiket`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kd_jadwal` (`kd_jadwal`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD CONSTRAINT `tb_jadwal_ibfk_1` FOREIGN KEY (`kd_studio`) REFERENCES `tb_studio` (`kd_studio`),
  ADD CONSTRAINT `tb_jadwal_ibfk_2` FOREIGN KEY (`kd_film`) REFERENCES `tb_film` (`kd_film`);

--
-- Constraints for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD CONSTRAINT `tb_tiket_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tb_customer` (`id_user`),
  ADD CONSTRAINT `tb_tiket_ibfk_5` FOREIGN KEY (`kd_jadwal`) REFERENCES `tb_jadwal` (`kd_jadwal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
