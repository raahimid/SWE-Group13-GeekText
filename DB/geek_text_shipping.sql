-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 04:25 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `123`
--

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `UserID` int(11) NOT NULL,
  `Street_Address_1` varchar(50) NOT NULL,
  `Street_Address_2` varchar(50) NOT NULL,
  `Street_Address_3` varchar(50) NOT NULL,
  `Apt` decimal(4,0) NOT NULL,
  `Apt2` decimal(4,0) NOT NULL,
  `Apt3` decimal(4,0) NOT NULL,
  `City` varchar(25) NOT NULL,
  `City2` varchar(25) NOT NULL,
  `City3` varchar(25) NOT NULL,
  `State` varchar(3) NOT NULL,
  `State2` varchar(4) NOT NULL,
  `State3` varchar(4) NOT NULL,
  `ZipCode` varchar(15) NOT NULL,
  `Zipcode2` varchar(15) NOT NULL,
  `Zipcode3` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`UserID`,`Street_Address_1`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
