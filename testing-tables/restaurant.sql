-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2016 at 08:08 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mudining`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `RestaurantID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `MinPrice` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `OpenTime` text,
  `Promotion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantID`, `Name`, `MinPrice`, `Location`, `Type`, `OpenTime`, `Promotion`) VALUES
(1, '7-11', 30, 'Front', '01,11,', 'All day', NULL),
(2, 'Mai Tok Mai Taek', 50, 'Front', '02,11,12,', '9:00 - 18:00', NULL),
(3, 'LODIHAM', 60, 'Front', '01,13,', '9:00 - 21:00', NULL),
(4, 'Fur', 200, 'Front', '03,11,', '10:00 - 21:00', NULL),

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`RestaurantID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `RestaurantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
