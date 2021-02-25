-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 06:48 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebcs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `firstname`, `lastname`, `email`, `mobilenumber`, `password`, `token`, `is_active`, `date_time`) VALUES
(6, 'admin', 'admin', 'ikmalshahzan@yahoo.com', '0123456789', '$2y$10$E5WUxBMGFGKFPYdt/feg.eZPsdhIybESAlTT6CicpBWeVHNMSxfp2', '83f1fd781900652eedab99ec5e06666e', '1', '2021-02-23'),
(7, 'Aidiel', 'Daniel', 'aidiel@yahoo.com', '0123456789', '$2y$10$SFwQCKHlbBchkz5G0lYFH.4Ah/hauUzIKZ5qO56VA2uOYtDMnTnM2', '83f1fd781900652eedab99ec5e06666e', '1', '2021-02-23');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kenderaan`
--

CREATE TABLE `jenis_kenderaan` (
  `id` int(11) NOT NULL,
  `nama_kenderaan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_kenderaan`
--

INSERT INTO `jenis_kenderaan` (`id`, `nama_kenderaan`) VALUES
(1, 'Proton Saga 1985-1992'),
(2, 'Proton Saga Iswara 1992-2003'),
(3, 'Proton Saga LMST 2003-2008'),
(4, 'Proton Saga 2008-2010'),
(5, 'Proton Saga FL 2010-2011'),
(6, 'Proton Saga FLX 2011'),
(7, 'Proton Wira 1993-2000'),
(8, 'Proton Wira 2000-2007'),
(9, 'Proton Perdana 1994-1997'),
(10, 'Proton Perdana V6 1997-2000'),
(11, 'Proton Perdana V6 2000-2010'),
(12, 'Proton Perdana PRM 2010-2015'),
(13, 'Proton Satria 1994-1997'),
(14, 'Proton Satria GTi 1997-2000'),
(15, 'Proton Satria GTi 2000-2006'),
(16, 'Proton Satria Neo 2006-2011'),
(17, 'Proton Satria Neo CPS 2011-2013'),
(18, 'Proton Satria Neo R3 2013-kini'),
(19, 'Proton Tiara'),
(20, 'Proton Putra'),
(21, 'Proton Juara'),
(22, 'Proton Waja'),
(23, 'Proton Gen-2'),
(24, 'Proton Savvy'),
(25, 'Perodua Kancil 1994–2009'),
(26, 'Perodua Rusa 1996–2003'),
(27, 'Perodua Kembara 1998–2008'),
(28, 'Perodua Kenari 2000–2008'),
(29, 'Perodua Kelisa 2001–2007'),
(30, 'Perodua MyVi 2005'),
(31, 'Perodua Viva 2007–2014'),
(32, 'Perodua Nautica 2008–2010'),
(33, 'Perodua Alza 2009–kini'),
(34, 'Perodua Axia 2014–kini'),
(35, 'Perodua Bezza 2016–kini'),
(36, 'Perodua Aruz 2019–kini');

-- --------------------------------------------------------

--
-- Table structure for table `masalah_kenderaan`
--

CREATE TABLE `masalah_kenderaan` (
  `id` int(11) NOT NULL,
  `jenis_masalah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masalah_kenderaan`
--

INSERT INTO `masalah_kenderaan` (`id`, `jenis_masalah`) VALUES
(1, 'Enjin rosak'),
(2, 'Brek pad haus/habis'),
(3, 'Starter tak berfungsi'),
(4, 'Temperature kereta tinggi'),
(5, 'Balancing kereta lari'),
(6, 'Servis air cond'),
(7, 'Clutch lining habis'),
(8, 'Kerosakan pada gearbox'),
(9, 'Tukar minyak hitam'),
(10, 'Lampu sisi ( signal ) depan belakang tidak berfungsi'),
(11, 'Timing belt enjin habis / putus'),
(12, 'Timing belt air cond habis / putus'),
(13, 'Power stereng keras'),
(14, 'Drive shaft berbunyi'),
(15, 'Masalah ignition coil'),
(16, 'Timing belt putus'),
(17, 'Masalah alternor'),
(18, 'Masalah bateri'),
(19, 'Masalah aircond');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'Menunggu semakan'),
(2, 'Terima'),
(3, 'Selesai'),
(4, 'Dibatalkan'),
(5, 'Untuk Dibayar');

-- --------------------------------------------------------

--
-- Table structure for table `tempahan_servis`
--

CREATE TABLE `tempahan_servis` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ic` varchar(255) NOT NULL,
  `no_telefon` varchar(255) NOT NULL,
  `no_kenderaan` varchar(255) NOT NULL,
  `jenis_kenderaan` varchar(255) NOT NULL,
  `jenis_masalah` varchar(255) NOT NULL,
  `tarikh_masa_tempahan` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempahan_servis`
--

INSERT INTO `tempahan_servis` (`id`, `id_user`, `nama`, `ic`, `no_telefon`, `no_kenderaan`, `jenis_kenderaan`, `jenis_masalah`, `tarikh_masa_tempahan`, `status`) VALUES
(2, 7, 'Aidiel Daniel Bin Dermawan', '970313145057', '0182449921', 'RAG3640', '2', '3', '2021-02-26 12:00', '1'),
(4, 7, 'Aidiel Daniel', '970313145057', '0182449921', 'RAG36402323', '1', '6', '2021-02-28 12:00', '4'),
(5, 7, 'Aidiel Daniel', '970313145057', '0182449921', 'RAG36402323', '10', '3', '2021-02-25 12:00', '2'),
(6, 7, 'Aidiel Daniel', '970313145057', '0182449921', 'RAG3640', '1', '9', '2021-02-25 12:00', '4'),
(7, 7, 'Aidiel Daniel', '970313145057', '0182449921', 'RAG3640', '2', '3', '2021-02-26 12:00', '1'),
(8, 7, 'Aidiel Daniel', '970313145057', '0123456789', 'RAG36402323', '2', '2', '2021-02-27 12:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobilenumber` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `date_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobilenumber`, `password`, `token`, `is_active`, `date_time`) VALUES
(6, 'admin', 'admin', 'ikmalshahzan@yahoo.com', '0123456789', '$2y$10$E5WUxBMGFGKFPYdt/feg.eZPsdhIybESAlTT6CicpBWeVHNMSxfp2', '83f1fd781900652eedab99ec5e06666e', '1', '2021-02-23'),
(7, 'Aidiel', 'Daniel', 'aidiel@yahoo.com', '0123456789', '$2y$10$SFwQCKHlbBchkz5G0lYFH.4Ah/hauUzIKZ5qO56VA2uOYtDMnTnM2', '83f1fd781900652eedab99ec5e06666e', '1', '2021-02-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kenderaan`
--
ALTER TABLE `jenis_kenderaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masalah_kenderaan`
--
ALTER TABLE `masalah_kenderaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempahan_servis`
--
ALTER TABLE `tempahan_servis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_kenderaan`
--
ALTER TABLE `jenis_kenderaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `masalah_kenderaan`
--
ALTER TABLE `masalah_kenderaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tempahan_servis`
--
ALTER TABLE `tempahan_servis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
