-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 08:43 AM
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
-- Database: `bookdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `CCNumber` varchar(19) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `CVV` varchar(4) NOT NULL,
  `ExpYear` int(4) NOT NULL,
  `CCNumber2` varchar(19) NOT NULL,
  `UserID2` int(11) NOT NULL,
  `FirstName2` varchar(50) NOT NULL,
  `LastName2` varchar(50) NOT NULL,
  `CVV2` varchar(4) NOT NULL,
  `ExpYear2` int(4) NOT NULL,
  `CCNumber3` varchar(19) NOT NULL,
  `UserID3` int(11) NOT NULL,
  `FirstName3` varchar(50) NOT NULL,
  `LastName3` varchar(50) NOT NULL,
  `CVV3` varchar(4) NOT NULL,
  `ExpYear3` int(4) NOT NULL,
  `ExpMonth` int(2) NOT NULL,
  `ExpMonth2` int(2) NOT NULL,
  `ExpMonth3` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`CCNumber`,`UserID`),
  ADD KEY `UserID` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
