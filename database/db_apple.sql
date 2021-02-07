-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 05:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apple`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id_akses` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `delete` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_akses`
--

INSERT INTO `tb_akses` (`id_akses`, `id_menu`, `id_level`, `add`, `view`, `delete`, `edit`, `id_user`, `tgl_update`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(2, 2, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(3, 3, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(4, 4, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(5, 5, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(6, 6, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(7, 13, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(8, 7, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(9, 8, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(10, 9, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(11, 10, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(12, 11, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(13, 12, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(14, 14, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(15, 15, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(16, 16, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(17, 17, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(18, 18, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(19, 19, 1, 1, 1, 1, 1, 1, '2021-02-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_varian` int(11) NOT NULL,
  `part_number` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `stokawal` int(11) NOT NULL DEFAULT 0,
  `stoksisa` int(11) NOT NULL DEFAULT 0,
  `hargajual` int(11) NOT NULL,
  `hargapokok` int(11) NOT NULL,
  `kode_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `id_brand` int(11) NOT NULL,
  `brand` varchar(100) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`id_brand`, `brand`, `tgl_update`, `id_user`) VALUES
(2, 'samsung', '2021-02-07', 1),
(3, 'apple', '2021-02-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_detailtransaksi` int(11) NOT NULL,
  `id_imei` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekspedisi`
--

CREATE TABLE `tb_ekspedisi` (
  `id_ekspedisi` int(11) NOT NULL,
  `ekspedisi` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tlp` char(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ekspedisi`
--

INSERT INTO `tb_ekspedisi` (`id_ekspedisi`, `ekspedisi`, `id_user`, `tgl_update`, `alamat`, `tlp`) VALUES
(2, '11da', 1, '2021-02-07', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_imei`
--

CREATE TABLE `tb_imei` (
  `id_imei` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `imei` varchar(50) NOT NULL,
  `stok` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`, `id_user`, `tgl_update`) VALUES
(3, 'hp', 1, '2021-02-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(20) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `level`, `tgl_update`, `id_user`) VALUES
(1, 'administrator', '2021-02-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_marketplace`
--

CREATE TABLE `tb_marketplace` (
  `id_marketplace` int(11) NOT NULL,
  `marketplace` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_marketplace`
--

INSERT INTO `tb_marketplace` (`id_marketplace`, `marketplace`, `nama`, `tgl_update`, `id_user`) VALUES
(3, 'setidak', '', '2021-02-07', 1),
(6, '1231', '', '2021-02-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `grup` enum('masterdata','kas','laporan','user','dll') NOT NULL DEFAULT 'dll'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu`, `link`, `icon`, `grup`) VALUES
(1, 'Brand', 'brand', 'fa fa-circle-o', 'masterdata'),
(2, 'Kategori', 'kategori', 'fa fa-circle-o', 'masterdata'),
(3, 'Varian', 'varian', 'fa fa-circle-o', 'masterdata'),
(4, 'Barang', 'barang', 'fa fa-circle-o', 'masterdata'),
(5, 'Marketplace', 'marketplace', 'fa fa-circle-o', 'masterdata'),
(6, 'Ekspedisi', 'ekspedisi', 'fa fa-circle-o', 'masterdata'),
(7, 'Kas Umum', 'kasumum', 'fa fa-circle-o', 'kas'),
(8, 'Kas Masuk', 'kasmasuk', 'fa fa-circle-o', 'kas'),
(9, 'Kas Keluar', 'kaskeluar', 'fa fa-circle-o', 'kas'),
(10, 'Laporan Penjualan', 'penjualan', 'fa fa-circle-o', 'laporan'),
(11, 'Kas', 'Kas', 'fa fa-circle-o', 'laporan'),
(12, 'Stok Barang', 'stokbarang', 'fa fa-circle-o', 'laporan'),
(13, 'Laba Rugi', 'labarugi', 'fa fa-circle-o', 'laporan'),
(14, 'Level User', 'level', 'fa fa-circle-o', 'user'),
(15, 'Data User', 'user', 'fa fa-circle-o', 'user'),
(16, 'Hak Akses', 'akses', 'fa fa-circle-o', 'user'),
(17, 'Transaksi Penjualan', 'penjualan', 'fa fa-book', 'dll'),
(18, 'Transaksi Refund', 'refund', 'fa fa-book', 'dll'),
(19, 'Setting', 'setting', 'fa fa-book', 'dll');

-- --------------------------------------------------------

--
-- Table structure for table `tb_setting`
--

CREATE TABLE `tb_setting` (
  `id_setting` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `kode_barang` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `telp` char(12) NOT NULL,
  `hp` char(12) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_penjualan` varchar(100) NOT NULL,
  `kode_refund` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `namac` varchar(100) NOT NULL,
  `tlpc` char(12) NOT NULL,
  `emailc` varchar(100) NOT NULL,
  `alamatc` varchar(200) NOT NULL,
  `catatanc` varchar(200) NOT NULL,
  `jenistransaksi` enum('tunai','transfer') NOT NULL,
  `id_ekspedisi` int(11) NOT NULL,
  `garansi` date NOT NULL,
  `hargatotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` char(10) NOT NULL,
  `password` text NOT NULL,
  `tgl_update` date NOT NULL,
  `levelpengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `tgl_update`, `levelpengguna`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-02-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_varian`
--

CREATE TABLE `tb_varian` (
  `id_varian` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `varian` varchar(100) NOT NULL,
  `tgl_update` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_varian`
--

INSERT INTO `tb_varian` (`id_varian`, `id_brand`, `id_kategori`, `deskripsi`, `varian`, `tgl_update`, `id_user`) VALUES
(1, 3, 3, 'asd', 'varian', 2021, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  ADD PRIMARY KEY (`id_detailtransaksi`);

--
-- Indexes for table `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  ADD PRIMARY KEY (`id_ekspedisi`);

--
-- Indexes for table `tb_imei`
--
ALTER TABLE `tb_imei`
  ADD PRIMARY KEY (`id_imei`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_marketplace`
--
ALTER TABLE `tb_marketplace`
  ADD PRIMARY KEY (`id_marketplace`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_varian`
--
ALTER TABLE `tb_varian`
  ADD PRIMARY KEY (`id_varian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  MODIFY `id_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_imei`
--
ALTER TABLE `tb_imei`
  MODIFY `id_imei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_marketplace`
--
ALTER TABLE `tb_marketplace`
  MODIFY `id_marketplace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_varian`
--
ALTER TABLE `tb_varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
