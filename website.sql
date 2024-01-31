-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 05:15 PM
-- Server version: 10.11.2-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `No` int(11) NOT NULL,
  `ID_Barang` varchar(10) DEFAULT NULL,
  `Nama_Barang` varchar(225) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Satuan` varchar(10) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`No`, `ID_Barang`, `Nama_Barang`, `Jumlah`, `Satuan`, `Status`) VALUES
(1, 'C0001', 'CPU', 30, '500000000', 'Disetujui'),
(2, 'A0002', 'Keyboard', 55, 'pcs', 'Ditolak'),
(3, 'A0003', 'Mouse', 75, 'box', 'Pending'),
(8, 'A0004', 'Kursi Gaming', 35, 'pcs', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `barang_vendor`
--

CREATE TABLE `barang_vendor` (
  `No` int(11) NOT NULL,
  `ID_Barang` varchar(10) DEFAULT NULL,
  `Nama_Barang` varchar(225) DEFAULT NULL,
  `Jumlah` int(11) DEFAULT NULL,
  `Satuan` varchar(10) DEFAULT NULL,
  `Harga` int(225) DEFAULT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang_vendor`
--

INSERT INTO `barang_vendor` (`No`, `ID_Barang`, `Nama_Barang`, `Jumlah`, `Satuan`, `Harga`, `Status`) VALUES
(6, 'B0001', 'Laptop', 75, 'pcs', 15000000, 'Dibeli'),
(7, 'B0002', 'Smartphone Strawberry', 50, 'pcs', 6999000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `rfq`
--

CREATE TABLE `rfq` (
  `No` int(11) NOT NULL,
  `ID_Barang` varchar(20) NOT NULL,
  `Nama_Barang` varchar(225) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `Satuan` varchar(10) NOT NULL,
  `Deadline` date NOT NULL,
  `Harga` int(225) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rfq`
--

INSERT INTO `rfq` (`No`, `ID_Barang`, `Nama_Barang`, `Jumlah`, `Satuan`, `Deadline`, `Harga`, `Status`) VALUES
(1, 'C0001', 'CPU', 30, 'pcs', '2024-01-02', 10000, 'Diterima'),
(2, 'C0002', 'Iphone pro maag', 50, 'pcs', '2024-01-02', 1000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(2, 'managerpengadaan@itang.com', '$2y$10$fgX4vVx7zCpdtntrcTQFVuflctH1iq4E3sSNtjXiHsisJ.KZ9rnsm', 'managerPengadaan'),
(3, 'vendor@itang.com', '$2y$10$J9dr81C5xD2VvrOxm5evy.OE/sIbL16RhwgcehmAoZ8LTz9p9Yt8S', 'vendor'),
(4, 'managerproyek@itang.com', '$2y$10$hjxuhp.4G4Jcio5gtZCAzOrdePGDEq3iqOMeUYbimmz1BRyH2WEJW', 'managerProyek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `barang_vendor`
--
ALTER TABLE `barang_vendor`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `rfq`
--
ALTER TABLE `rfq`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang_vendor`
--
ALTER TABLE `barang_vendor`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rfq`
--
ALTER TABLE `rfq`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE rfq_penawaran AS SELECT * FROM rfq;

ALTER TABLE rfq
ADD COLUMN Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

CREATE TABLE rfq_konfirmasi AS SELECT * FROM rfq_penawaran;

ALTER TABLE rfq_penawaran
ADD COLUMN TimestampColumn TIMESTAMP DEFAULT CURRENT_TIMESTAMP;
