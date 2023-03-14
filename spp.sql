-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 01:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'XII RPL-1'),
(2, 'XII RPL-2');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_bayar` varchar(255) NOT NULL,
  `id_spp` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_users`, `tgl_bayar`, `bulan_bayar`, `id_spp`, `jumlah_bayar`) VALUES
(18, 24, '2023-03-12', 'Januari', 2, 350000),
(19, 24, '2023-03-13', 'Februari', 2, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`id_spp`, `tahun`, `nominal`) VALUES
(1, '2022', 350000),
(2, '2023', 350000),
(5, '2024', 350000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `order_id` varchar(255) NOT NULL,
  `id_users` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `transaction_time` varchar(255) NOT NULL,
  `transaction_status` varchar(50) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `va_number` varchar(255) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `bulan_bayar` varchar(255) NOT NULL,
  `pdf_url` text NOT NULL,
  `finish_redirect_url` text NOT NULL,
  `status_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`order_id`, `id_users`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `bank`, `va_number`, `id_spp`, `bulan_bayar`, `pdf_url`, `finish_redirect_url`, `status_code`) VALUES
('433350049', 24, 350000, 'bank_transfer', '2023-03-13 16:09:28', 'settlement', 'bca', '40380113472', 2, 'Februari', 'https://app.sandbox.midtrans.com/snap/v1/transactions/c0fd91b9-bd9c-4384-83ac-f7fa91811e15/pdf', 'http://example.com?order_id=433350049&status_code=200&transaction_status=settlement', '200');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nisn` varchar(10) DEFAULT NULL,
  `nis` varchar(8) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `level` enum('Admin','Murid','Petugas') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `id_spp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nisn`, `nis`, `email`, `password`, `no_telp`, `level`, `photo`, `id_kelas`, `id_spp`) VALUES
(21, 'admin', '', '', 'mimin@gmail.com', '$2y$10$mbXUDwExVZdjt2ST4.ljw.u/mdDE6XOwvYoXa13jx9dH4myuNhFvC', '089638729422', 'Admin', 'default.png', NULL, NULL),
(22, 'Juned', NULL, NULL, 'juned@gmail.com', '$2y$10$dUOjkhQVpizoPOCnnlazOOnoAae0lq6WOnkLIlHdh1ppDb4xY9MPq', NULL, 'Petugas', 'default.png', NULL, NULL),
(23, 'Pahpud', NULL, NULL, 'pahpud@gmail.com', '$2y$10$2qrPjJeogdrhlM4NrUVKw.pem.A.C3f2Axebhx3XkoOJDN8nhw0fy', NULL, 'Petugas', 'default.png', NULL, NULL),
(24, 'Ariel Audhia Putra', '12345', '12345', 'arielaudhiaputra1225@gmail.com', '$2y$10$TZFjyXFcRMKmwFLhSu8.dOZnFe.zr2iG1nls1iQTQ53Lko90Auxsm', NULL, 'Murid', 'default.png', 2, NULL),
(25, 'Rizal', '12345', '12345', 'rizal@gmail.com', '$2y$10$f7D7hU3Sz2kgpD19l5KW1edC7A.AJOs2aDvuy5O3n6oQaaNEwL/3u', '089638729422', 'Murid', 'default.png', NULL, NULL),
(26, 'Reksa', '123456', '123456', 'reksa@gmail.com', '$2y$10$rr617IKQfyubboO/c7uiMeLw3v/ctppJD16qUDcpUfEMK75KwdpEa', NULL, 'Murid', 'default.png', 2, NULL),
(27, 'Dzul', '12345', '12345', 'dzul@gmail.com', '$2y$10$Lv4t7qX8TzysBGpxEINFwu9vmP2RxbxmRhHHWMGgDwG5A.PXSGSLm', NULL, 'Murid', 'default.png', 2, NULL),
(28, 'Akbar', '123456', '123456', 'akbar@gmail.com', '$2y$10$MkGLsVsapVer6XWHoFeXWeGNNe2xVa9ZRKWHv76EJWD.GBlUjOYje', NULL, 'Murid', 'default.png', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_spp` (`id_spp`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_spp` (`id_spp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_spp`) REFERENCES `spp` (`id_spp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
