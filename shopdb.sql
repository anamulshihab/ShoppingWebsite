-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2013 at 03:54 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_brg` varchar(10) NOT NULL,
  `nama_brg` varchar(40) NOT NULL,
  `harga_brg` int(40) NOT NULL,
  `desc_brg` text NOT NULL,
  `jml_brg` int(40) NOT NULL,
  `kategori` varchar(40) NOT NULL,
  `gambar_brg` varchar(40) NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_brg`, `nama_brg`, `harga_brg`, `desc_brg`, `jml_brg`, `kategori`, `gambar_brg`) VALUES
('B01', 'Baju 1', 85000, 'Baju 1', 5, '1', '../gambar/preview-1.jpg'),
('B02', 'Baju 2', 90000, 'Baju 2', 6, '1', '../gambar/preview-2.jpg'),
('B03', 'Baju 3', 100000, 'Baju 3', 10, '1', '../gambar/preview-3.jpg'),
('B04', 'Baju 4', 65000, 'Baju 4', 7, '1', '../gambar/preview-4.jpg'),
('B05', 'Baju 5', 100000, 'Baju 5', 8, '1', '../gambar/preview-5.jpg'),
('B06', 'Baju 6', 105000, 'Baju 6', 5, '1', '../gambar/preview-6.jpg'),
('B07', 'Baju 7', 70000, 'Baju 7', 9, '1', '../gambar/preview-7.jpg'),
('B08', 'Baju 8', 89000, 'Baju 8', 6, '1', '../gambar/preview-8.jpg'),
('B09', 'Baju 9', 100000, 'Baju 9', 4, '1', '../gambar/preview-9.jpg'),
('B10', 'Baju 10', 80000, 'Baju 10', 7, '1', '../gambar/preview-10.jpg'),
('B11', 'Baju 11', 120000, 'Baju 11', 4, '1', '../gambar/preview-11.jpg'),
('B12', 'Baju 12', 67000, 'Baju 12', 5, '1', '../gambar/preview-12.jpg'),
('B13', 'Baju 13', 89000, 'Baju 13', 10, '1', '../gambar/preview-13.jpg'),
('B14', 'Baju 14', 130000, 'Baju 14', 6, '2', '../gambar/preview-14.jpg'),
('B15', 'Baju 15', 125000, 'Baju 15', 3, '3', '../gambar/preview-15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pageabout`
--

CREATE TABLE IF NOT EXISTS `pageabout` (
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageabout`
--

INSERT INTO `pageabout` (`deskripsi`) VALUES
('<p style="text-align:center"><img alt="cool" src="http://localhost/shop/admin/ckeditor/plugins/smiley/images/shades_smile.gif" style="height:20px; width:20px" title="cool" /> Kami adalah toko online yang sedang berjualan kaos <img alt="yes" src="http://localhost/shop/admin/ckeditor/plugins/smiley/images/thumbs_up.gif" style="height:20px; width:20px" title="yes" /></p>\r\n\r\n<p style="text-align:center"><img alt="" src="http://localhost/shop/gambar/preview-1.jpg" style="height:328px; width:328px" /></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pagekontak`
--

CREATE TABLE IF NOT EXISTS `pagekontak` (
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pagekontak`
--

INSERT INTO `pagekontak` (`deskripsi`) VALUES
('<p><span style="font-family:lucida sans unicode,lucida grande,sans-serif"><strong><span style="font-size:22px">Hubungi Kami</span></strong></span></p>\r\n\r\n<p>lalayeyeye : +62 857 461 7445</p>\r\n\r\n<p>Email : lalayeyey@yahoo.com</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `id_pembeli` int(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `telp` int(20) NOT NULL,
  PRIMARY KEY (`id_pembeli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=175 ;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama`, `alamat`, `email`, `telp`) VALUES
(171, 'coba3', 'coba3', 'coba3', 122222222),
(173, 'dfghjk', 'fghjk', 'ghjk', 3456),
(174, 'dfghj', 'xcvbn', 'cdvfbn', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `pengelola`
--

CREATE TABLE IF NOT EXISTS `pengelola` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pengelola`
--

INSERT INTO `pengelola` (`id`, `username`, `password`) VALUES
(8, 'admin', 'admin'),
(13, 'sapta', 'sapta');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembeli` int(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `id_brg` varchar(20) NOT NULL,
  `nama_brg` varchar(40) NOT NULL,
  `jml` int(10) NOT NULL,
  `total` int(30) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pembeli`, `nama`, `alamat`, `id_brg`, `nama_brg`, `jml`, `total`, `tanggal_pesan`) VALUES
(10, 171, 'coba3', 'coba3', 'B01', 'Baju 1', 1, 85000, '2013-11-27 11:04:22'),
(11, 171, 'coba3', 'coba3', 'B02', 'Baju 2', 1, 90000, '2013-11-27 11:04:22'),
(12, 171, 'coba3', 'coba3', 'B02', 'Baju 2', 1, 90000, '2013-11-27 11:16:07'),
(13, 171, 'coba3', 'coba3', 'B12', 'Baju 12', 3, 201000, '2013-11-27 11:17:25'),
(14, 173, 'dfghjk', 'fghjk', 'B04', 'Baju 4', 2, 130000, '2013-11-27 12:52:27'),
(15, 173, 'dfghjk', 'fghjk', 'B03', 'Baju 3', 1, 100000, '2013-11-27 12:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`) VALUES
(1, '../gambar-slide/banner-1.jpg'),
(2, '../gambar-slide/banner-2.jpg'),
(3, '../gambar-slide/banner-3.jpg'),
(4, '../gambar-slide/banner-4.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
