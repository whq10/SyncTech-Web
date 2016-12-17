-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Des 2015 pada 03.10
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `contoh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `redeem`
--

CREATE TABLE IF NOT EXISTS `redeem` (
  `RedeemId` varchar(10) NOT NULL,
  `RedeemName` varchar(50) NOT NULL,
  `RedeemCost` varchar(30) NOT NULL,
  `RedeemPoints` varchar(30) NOT NULL,
  `RedeemImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `redeem` (`RedeemId`, `RedeemName`, `RedeemCost`, `RedeemPoints`, `RedeemImage`) VALUES
('111', 'Iphone', '2.35', '100', 'test image 1'),
('222', 'tv', '4.99', '200', 'test image 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `redeem`
--
ALTER TABLE `redeem`
 ADD PRIMARY KEY (`RedeemId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
