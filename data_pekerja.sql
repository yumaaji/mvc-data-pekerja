-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 05:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_kita`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pekerja`
--

CREATE TABLE `data_pekerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_pekerja`
--

INSERT INTO `data_pekerja` (`id`, `nama`, `jabatan`, `alamat`, `telepon`, `gender`) VALUES
(33, 'AGUS SETIAWAN', 'Project Manager', 'BANDUNG, JAWA BARAT', '089676767676', 'PRIA'),
(34, 'PUTRI HALIMAH NURAIDAH', 'UI/UX Designer', 'BOGOR, JAWA BARAT', '0895454545445', 'WANITA'),
(35, 'JOKI SIGIT', 'Frontend', 'MALANG, JAWATIMUR', '089676535353', 'PRIA'),
(36, 'BUNGA AYU KUSUMA SANJAYA', 'Frontend', 'RIAU, SUMATRA TENGAH', '078525252525', 'WANITA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pekerja`
--
ALTER TABLE `data_pekerja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pekerja`
--
ALTER TABLE `data_pekerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
