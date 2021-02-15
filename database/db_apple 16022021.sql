-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2021 at 06:24 PM
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
(16, 16, 1, 0, 0, 0, 0, 1, '2021-02-01'),
(17, 17, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(18, 18, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(19, 19, 1, 1, 1, 1, 1, 1, '2021-02-01'),
(77, 20, 1, 1, 1, 1, 1, 1, '2021-02-14');

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

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id_barang`, `id_user`, `tgl_update`, `id_varian`, `part_number`, `nama_barang`, `stokawal`, `stoksisa`, `hargajual`, `hargapokok`, `kode_barang`) VALUES
(3, 1, '2021-02-09', 1, '123123', 'hp', 10, 8, 2000000, 1500000, ''),
(4, 1, '2021-02-09', 1, '1231231', 'samssung', 122, 10, 2500000, 1500000, ''),
(5, 1, '2021-02-09', 1, '111', 'accessoris', 3, 9, 100000, 50000, '');

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
-- Table structure for table `tb_detailsementara`
--

CREATE TABLE `tb_detailsementara` (
  `id_detailsementara` int(11) NOT NULL,
  `id_imei` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `qtt` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailtransaksi`
--

CREATE TABLE `tb_detailtransaksi` (
  `id_detailtransaksi` int(11) NOT NULL,
  `id_imei` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `qtt` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detailtransaksi`
--

INSERT INTO `tb_detailtransaksi` (`id_detailtransaksi`, `id_imei`, `id_barang`, `harga`, `diskon`, `qtt`, `kode_transaksi`) VALUES
(1, 20, 4, 2500000, 0, 1, '1'),
(2, 20, 4, 2500000, 0, 1, '1'),
(3, 11, 3, 2000000, 0, 1, '10-02-2021.asd.1'),
(4, 10, 3, 2000000, 0, 1, '10-02-2021.asd.1'),
(5, 10, 3, 2000000, 0, 1, '10-02-2021.asd.1'),
(6, 11, 3, 2000000, 0, 1, '10-02-2021.asd.1'),
(7, 10, 3, 2000000, 0, 1, '10-02-2021.asd.1'),
(8, 10, 3, 2000000, 0, 1, '10-02-2021.asd.1'),
(9, 22, 4, 2500000, 0, 1, '10-02-2021.asd.1'),
(10, 22, 4, 2500000, 0, 1, '10-02-2021.asd.1'),
(11, 20, 4, 2500000, 0, 1, '11-02-2021.asd.0'),
(12, 0, 5, 100000, 0, 1, '11-02-2021.asd.2'),
(13, 0, 5, 100000, 0, 1, '11-02-2021.asd.3'),
(14, 0, 5, 100000, 0, 1, '11-02-2021.asd.4'),
(15, 13, 3, 2000000, 0, 1, '14-02-2021.asd.5'),
(16, 0, 4, 2500000, 0, 1, '14-02-2021.asd.9'),
(17, 10, 3, 2000000, 0, 1, '14-02-2021.asd.10'),
(18, 0, 3, 2000000, 0, 1, '14-02-2021.asd.11'),
(19, 0, 3, 2000000, 0, 1, '14-02-2021.asd.11'),
(20, 0, 3, 2000000, 0, 1, '14-02-2021.asd.12');

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
(3, 'cod', 1, '2021-02-10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_historystok`
--

CREATE TABLE `tb_historystok` (
  `id_historystok` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kodetransaksi` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `stokawal` int(11) NOT NULL,
  `stokberubah` int(11) NOT NULL,
  `stoksisa` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_historystok`
--

INSERT INTO `tb_historystok` (`id_historystok`, `id_barang`, `kodetransaksi`, `keterangan`, `stokawal`, `stokberubah`, `stoksisa`, `tgl_update`, `id_user`) VALUES
(2, 3, '14-02-2021.asd.10', 'Transaksi Penjualan', 8, 0, 8, '2021-02-14', 1),
(3, 3, '14-02-2021.asd.11', 'Transaksi Penjualan', 0, 0, 6, '2021-02-14', 1),
(4, 3, '14-02-2021.asd.12', 'Transaksi Penjualan', 0, 1, 5, '2021-02-14', 1),
(5, 4, '1-ref-1', 'Pengembalian Stok Transaksi Refund', 0, 1, 9, '2021-02-15', 1),
(6, 4, '1-ref-1', 'Pengembalian Stok Transaksi Refund', 0, 1, 9, '2021-02-15', 1),
(7, 4, '1-ref-1', 'Transaksi Refund', 0, 1, 10, '2021-02-15', 1),
(8, 4, '2-ref-2', 'Transaksi Refund', 0, 1, 10, '2021-02-15', 1),
(9, 4, '2-ref-2', 'Pengembalian Stok Transaksi Refund', 0, 1, 9, '2021-02-15', 1),
(10, 4, '3-ref-3', 'Transaksi Refund', 0, 1, 10, '2021-02-15', 1),
(11, 4, '3-ref-3', 'Pengembalian Stok Transaksi Refund', 0, 1, 9, '2021-02-15', 1),
(12, 4, '4-ref-4', 'Transaksi Refund', 0, 1, 10, '2021-02-15', 1),
(13, 3, '-', 'Stok Opname', 0, 1, 7, '2021-02-15', 1),
(14, 3, '-', 'Stok Opname', 0, 1, 8, '2021-02-15', 1),
(15, 5, '-', 'Stok Opname', 0, 3, 9, '2021-02-15', 1);

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

--
-- Dumping data for table `tb_imei`
--

INSERT INTO `tb_imei` (`id_imei`, `id_barang`, `imei`, `stok`) VALUES
(9, 3, '1', '1'),
(10, 3, '2', '1'),
(11, 3, '3', '0'),
(12, 3, '4', '0'),
(13, 3, '5', '1'),
(14, 3, '6', '1'),
(15, 3, '7', '1'),
(16, 3, '8', '1'),
(17, 3, '9', '1'),
(18, 3, '10', '1'),
(19, 4, '11', '1'),
(20, 4, '12', '0'),
(21, 4, '13', '1'),
(22, 4, '14', '1'),
(23, 4, '15', '1'),
(24, 4, '16', '1'),
(25, 4, '17', '1'),
(26, 4, '18', '1'),
(27, 4, '19', '1'),
(28, 4, '20', '1');

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
-- Table structure for table `tb_kas`
--

CREATE TABLE `tb_kas` (
  `id_kas` int(11) NOT NULL,
  `jeniskas` char(10) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `keterangan` varchar(200) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kas`
--

INSERT INTO `tb_kas` (`id_kas`, `jeniskas`, `kode`, `keterangan`, `nominal`, `tgl_update`, `id_user`) VALUES
(4, '', NULL, 'MODAL BAHAN BAJU SISWA, UNTUK SISWA', 100000, '2021-02-12', 1),
(6, '', NULL, 'MODAL BAHAN BAJU SISWA, UNTUK SISWA', 200, '2021-02-12', 1),
(7, 'masuk', NULL, 'a', 10000, '2021-02-12', 1),
(10, 'keluar', NULL, 'kd', 300, '2021-02-12', 1),
(11, 'keluar', NULL, 'cc', 200000, '2021-02-12', 1),
(12, 'masuk', '14-02-2021.asd.5', 'Transaksi Penjualan', 2000000, '2021-02-14', 1),
(13, 'masuk', '14-02-2021.asd.9', 'Transaksi Penjualan', 2500000, '2021-02-14', 1),
(14, 'masuk', '14-02-2021.asd.10', 'Transaksi Penjualan', 2000000, '2021-02-14', 1),
(15, 'masuk', '14-02-2021.asd.11', 'Transaksi Penjualan', 2000000, '2021-02-14', 1),
(16, 'masuk', '14-02-2021.asd.12', 'Transaksi Penjualan', 2000000, '2021-02-14', 1),
(17, 'keluar', '4-ref-4', 'Transaksi Refund', 0, '2021-02-15', 1);

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
(13, 'Laba Rugi', 'labarugi', 'fa fa-circle-o', 'laporan'),
(14, 'Level User', 'level', 'fa fa-circle-o', 'user'),
(15, 'Data User', 'user', 'fa fa-circle-o', 'user'),
(17, 'Transaksi Penjualan', 'transaksi', 'fa fa-book', 'dll'),
(18, 'Transaksi Refund', 'refund', 'fa fa-book', 'dll'),
(19, 'Setting', 'setting', 'fa fa-book', 'dll'),
(20, 'Stok Opname', 'stok', 'fa fa-book', 'dll');

-- --------------------------------------------------------

--
-- Table structure for table `tb_refund`
--

CREATE TABLE `tb_refund` (
  `id_refund` int(11) NOT NULL,
  `kode_refund` varchar(50) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `jenisrefund` enum('uang','barang') NOT NULL,
  `nominal` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_refund`
--

INSERT INTO `tb_refund` (`id_refund`, `kode_refund`, `kode_transaksi`, `jenisrefund`, `nominal`, `tgl_update`, `id_user`) VALUES
(1, '1', '11', 'barang', 100000, '0000-00-00', 1),
(2, '1', '11', 'barang', 100000, '0000-00-00', 1),
(3, '1-ref-1', '11-02-2021.asd.0', '', 2500000, '0000-00-00', 1),
(4, '1-ref-1', '11-02-2021.asd.3', 'barang', 100000, '0000-00-00', 1),
(5, '1-ref-1', '11-02-2021.asd.3', 'uang', 0, '0000-00-00', 1),
(6, '1-ref-1', '11-02-2021.asd.3', 'uang', 0, '0000-00-00', 1),
(7, '1-ref-1', '10-02-2021.asd.1', 'uang', 0, '0000-00-00', 1),
(8, '1-ref-1', '14-02-2021.asd.9', 'barang', 2500000, '2021-02-15', 1),
(9, '2-ref-2', '11-02-2021.asd.0', 'barang', 2500000, '2021-02-15', 1),
(10, '3-ref-3', '11-02-2021.asd.0', 'barang', 2500000, '2021-02-15', 1),
(11, '4-ref-4', '14-02-2021.asd.9', 'uang', 0, '2021-02-15', 1);

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

--
-- Dumping data for table `tb_setting`
--

INSERT INTO `tb_setting` (`id_setting`, `nama_toko`, `kode_barang`, `alamat`, `email`, `website`, `telp`, `hp`, `instagram`, `logo`, `tgl_update`, `id_user`, `kode_penjualan`, `kode_refund`) VALUES
(1, 'apple', '', 'sads', 'asd@asd', 'asd.2ad', '123456789012', 'asd', 'asd', 'happy_ied_mubarak_alief.jpg', '2021-02-09', 1, 'tanggal.asd.no', 'no-ref-no');

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
  `hargatotal` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode_transaksi`, `namac`, `tlpc`, `emailc`, `alamatc`, `catatanc`, `jenistransaksi`, `id_ekspedisi`, `garansi`, `hargatotal`, `tgl_update`, `id_user`) VALUES
(1, '1', 'asd', 'asd', 'asd@asd', 'asd', '', 'tunai', 3, '0000-00-00', 4500000, '2021-02-14', 1),
(2, '1', 'asd', '08123205171', 'alief.febrina@gmail.com', '123', '', 'tunai', 3, '0000-00-00', 2700000, '2021-02-10', 0),
(3, '10-02-2021.asd.1', 'alef', '123456789012', 'asd@asdas', 'asd', 'asd', 'tunai', 3, '2021-02-13', 2500000, '2021-02-02', 0),
(4, '11-02-2021.asd.0', '1', '08121760289', 'alief.febrina@gmail.com', 'sad', 'sad', '', 3, '2021-02-26', 2500000, '2021-02-11', 1),
(5, '11-02-2021.asd.2', '1', '08121760289', 'alief.febrina@gmail.com', 'asd', 'asd', '', 3, '2021-02-23', 100000, '2021-02-11', 1),
(6, '11-02-2021.asd.3', 'asd', '123456789012', '123@DWQE', '213', '213', 'tunai', 3, '2021-03-04', 100000, '2021-02-11', 1),
(7, '11-02-2021.asd.4', '1', '08121760289', 'alief.febrina@gmail.com', 'ASD', 'ASD', '', 3, '2021-02-14', 100000, '2021-02-11', 1),
(8, '14-02-2021.asd.5', 'riski', '08121760289', 'asd@asd', 'ad', 'ad', '', 3, '2021-02-17', 2000000, '2021-02-14', 0),
(9, '14-02-2021.asd.9', 'riski', '08121760289', 'asd@asd', '', '', 'tunai', 3, '2021-02-08', 2500000, '2021-02-14', 1),
(10, '14-02-2021.asd.10', '1', '21', '123@DWQE', '123', '123', '', 3, '2021-03-05', 2000000, '2021-02-14', 1),
(11, '14-02-2021.asd.11', '1', '08121760289', 'alief.febrina@gmail.com', '123', '123', '', 3, '2021-02-23', 2000000, '2021-02-14', 1),
(12, '14-02-2021.asd.12', '1', '08121760289', 'alief.febrina@gmail.com', '', '', 'tunai', 3, '2021-02-25', 2000000, '2021-02-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksisementara`
--

CREATE TABLE `tb_transaksisementara` (
  `id_transaksisementara` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `namac` varchar(100) NOT NULL,
  `tlpc` char(12) NOT NULL,
  `emailc` varchar(100) NOT NULL,
  `alamatc` varchar(200) NOT NULL,
  `catatanc` varchar(200) NOT NULL,
  `jenistransaksi` enum('tunai','transaksi') NOT NULL,
  `id_ekspedisi` int(11) NOT NULL,
  `garansi` date NOT NULL,
  `hargatotal` int(11) NOT NULL,
  `tgl_update` date NOT NULL,
  `id_user` int(11) NOT NULL
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
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-02-08', 1);

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
-- Indexes for table `tb_detailsementara`
--
ALTER TABLE `tb_detailsementara`
  ADD PRIMARY KEY (`id_detailsementara`);

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
-- Indexes for table `tb_historystok`
--
ALTER TABLE `tb_historystok`
  ADD PRIMARY KEY (`id_historystok`);

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
-- Indexes for table `tb_kas`
--
ALTER TABLE `tb_kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id_level`);

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
-- Indexes for table `tb_refund`
--
ALTER TABLE `tb_refund`
  ADD PRIMARY KEY (`id_refund`);

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
-- Indexes for table `tb_transaksisementara`
--
ALTER TABLE `tb_transaksisementara`
  ADD PRIMARY KEY (`id_transaksisementara`);

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
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_detailsementara`
--
ALTER TABLE `tb_detailsementara`
  MODIFY `id_detailsementara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_detailtransaksi`
--
ALTER TABLE `tb_detailtransaksi`
  MODIFY `id_detailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_ekspedisi`
--
ALTER TABLE `tb_ekspedisi`
  MODIFY `id_ekspedisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_historystok`
--
ALTER TABLE `tb_historystok`
  MODIFY `id_historystok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_imei`
--
ALTER TABLE `tb_imei`
  MODIFY `id_imei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_kas`
--
ALTER TABLE `tb_kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_marketplace`
--
ALTER TABLE `tb_marketplace`
  MODIFY `id_marketplace` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_refund`
--
ALTER TABLE `tb_refund`
  MODIFY `id_refund` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_transaksisementara`
--
ALTER TABLE `tb_transaksisementara`
  MODIFY `id_transaksisementara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_varian`
--
ALTER TABLE `tb_varian`
  MODIFY `id_varian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
