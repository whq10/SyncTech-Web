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
-- Struktur dari tabel `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `StoreNum` varchar(10) NOT NULL,
  `BranchName` varchar(50) NOT NULL,
  `Province` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Postcode` varchar(10) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `MembershipStartDate` varchar(15) NOT NULL,
  `MembershipEndDate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`StoreNum`, `BranchName`, `Province`, `City`, `Address`, `Postcode`, `Telephone`, `MembershipStartDate`, `MembershipEndDate`) VALUES
('111', 'Dalhousia Dr', 'Manitoba', 'Winnipeg', '99 Dalhousia Dr', 'R3T 2P6', '1112223333', '2010-01-01', '2020-01-01'),
('222', 'Kenastone Blvd', 'Albert', 'TestAlbert', '100 Albert TestAddr', 'R3T 5X1', '2223334444', '2015-02-02', '2025-01-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`StoreNum`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
