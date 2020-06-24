-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 06:56 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `no_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `harga`, `stok`, `no_stok`) VALUES
(17, 'tas laptoppppp', 180000, 97, 3),
(18, 'jam tangan', 100000, 188, 0),
(19, 'mouse laptop', 30000, 187, 0),
(20, 'sepatu', 12000, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `no_transaksi` int(11) NOT NULL,
  `no_barang` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `no_transaksi`, `no_barang`, `nama_barang`, `harga`, `jumlah`, `total`) VALUES
(5, 7, 9, 'cabe', 12000, 10, 120000),
(6, 10, 8, 'laptop', 12000, 1, 12000),
(7, 14, 17, 'tas laptop', 180000, 1, 180000),
(8, 14, 16, 'Buku', 6000, 2, 12000),
(9, 14, 13, 'Kipas angin', 200000, 2, 400000),
(10, 14, 15, 'pulpen', 4000, 1, 4000),
(12, 13, 16, 'Buku', 6000, 1, 6000),
(13, 13, 13, 'Kipas angin', 200000, 1, 200000),
(14, 12, 13, 'Kipas angin', 200000, 2, 400000),
(16, 16, 17, 'tas laptoppppp', 180000, 5, 900000),
(19, 17, 18, 'jam tangan', 100, 12, 1200),
(20, 17, 19, 'mouse laptop', 30000, 13, 390000),
(21, 17, 17, 'tas laptoppppp', 180000, 3, 540000),
(22, 17, 20, 'sepatu', 12000, 3, 36000);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `nama_barang` varchar(225) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `jumlah_barang` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id_stok`, `nama_barang`, `harga_barang`, `jumlah_barang`) VALUES
(3, 'tas laptop', 120000, '12'),
(4, 'Buku', 10000, '100'),
(5, 'pulpen', 12, '3000'),
(6, 'Sepatu', 120000, '3'),
(7, 'Kipas angin', 140000, '13');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kode_transaksi` varchar(225) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `jumlah_barang`, `id_barang`, `kode_transaksi`, `tgl`) VALUES
(17, 0, 0, 'nota-37243705', '2020-06-24 03:52:39'),
(18, 0, 0, 'nota-51245104', '2020-06-24 04:44:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(225) NOT NULL,
  `akses_level` varchar(225) NOT NULL,
  `tanggal_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_upload`) VALUES
(5, 'admin', 'admin@gmail.com', 'administrator', 'b3aca92c793ee0e9b1a9b0a5f5fc044e05140df3', 'Admin', '2020-04-11 14:12:08'),
(6, 'hoscloud', 'hoscloud@gmail.com', 'hoscloud', 'dfc9bfb36853d2503e1402d1e4ded32029f84747', 'Admin', '2020-06-24 04:50:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
