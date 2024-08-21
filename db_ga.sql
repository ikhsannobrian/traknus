-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 04:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ga`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(11, 'admin1', '$2y$10$dBUsrktF6XBAD6rG/MWkjex9AXUKlWQSH4aTtttat4h6zKuwbstZq'),
(13, 'admin3', '$2y$10$PGxu4K3JUBisXgOn8Pzs2.WVGyyNsjBn9pbAsM2kw7YnxoOdREn5i');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `departemen` varchar(255) NOT NULL,
  `cabang` varchar(255) NOT NULL,
  `kebutuhan` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `penjelasan` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `tgl_kerja` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `wkt_mulai` time DEFAULT NULL,
  `wkt_akhir` time DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `pekerja` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `updated` tinyint(1) DEFAULT 0,
  `email_sent` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama`, `email`, `departemen`, `cabang`, `kebutuhan`, `tanggal`, `penjelasan`, `lokasi`, `tgl_kerja`, `jenis`, `wkt_mulai`, `wkt_akhir`, `status`, `pekerja`, `image`, `updated`, `email_sent`) VALUES
(160, 'Ikhsan Nobrian', 'ikhsannobrian@gmail.com', 'General Affair', 'TN-HO', 'Repair', '2024-06-26', 'Meja patah', 'Kubikal GA', '', '', '00:00:00', '00:00:00', 'Belum dikerjakan', '', '', 0, 0),
(161, 'Ikhsan Nobrian', 'ikhsannobrian@gmail.com', 'General Affair', 'TN-HO', 'Repair', '2024-06-26', 'Kursi patah', 'Perpustakaan', '', '', '00:00:00', '00:00:00', 'Belum dikerjakan', '', '', 0, 0),
(162, 'Ikhsan Nobrian', 'ikhsannobrian@gmail.com', 'General Affair', 'TN-HO', 'Repair', '2024-06-26', 'Keran rusak', 'Kamar mandi GA', '', '', '00:00:00', '00:00:00', 'Belum dikerjakan', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id`, `username`, `password`) VALUES
(6, 'teknisi1', '$2y$10$AwHy7APZdYnVKihZMLItcOCHXzSe1ddmOsVZeUuAZEx9XLi7aXACy'),
(8, 'teknisi5', '$2y$10$BWCuvyJ/sZD8ccnvtyafLuxrpRqcfHnr6QPfbItJFom90BESotqLy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `teknisi`
--
ALTER TABLE `teknisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `event_laporan` ON SCHEDULE EVERY 1 YEAR STARTS '2024-06-07 09:13:48' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM laporan$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
