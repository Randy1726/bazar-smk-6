-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 06:29 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bazar12`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `menu_1` varchar(100) NOT NULL,
  `menu_2` varchar(100) NOT NULL,
  `menu_3` varchar(100) NOT NULL,
  `menu_4` varchar(100) NOT NULL,
  `menu_5` varchar(100) NOT NULL,
  `menu_6` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `bayar` varchar(20) NOT NULL,
  `diterima` varchar(20) NOT NULL,
  `waktu_pemesanan` varchar(100) NOT NULL,
  `waktu_diterima` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `qty_1` int(100) NOT NULL,
  `qty_2` int(100) NOT NULL,
  `qty_3` int(100) NOT NULL,
  `qty_4` int(100) NOT NULL,
  `qty_5` int(100) NOT NULL,
  `qty_6` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
