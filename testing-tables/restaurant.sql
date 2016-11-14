-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2016 at 05:08 PM
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
  `MaxPrice` int(11) DEFAULT NULL,
  `Location` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `OpenTime` double NOT NULL,
  `CloseTime` double NOT NULL,
  `Promotion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantID`, `Name`, `MinPrice`, `MaxPrice`, `Location`, `Type`, `OpenTime`, `CloseTime`, `Promotion`) VALUES
(1, 'Mai Tok Mai Taek', 0, 100, 'F', '01,11,12', 10.3, 21, NULL),
(2, 'Steak Lung Nhuad', 0, 100, 'F', '04,11', 17, 23.3, NULL),
(3, 'J-Class Vegetarian', 0, 100, 'R', '01,03,11', 8, 20, NULL),
(4, 'พุทธรักษา เรสเทรอง', 251, 500, 'F', '01,11', 10, 20, NULL),
(5, 'LODIHAM', 0, 100, 'F', '01,04,11,12', 10, 21, NULL),
(6, 'Music Square', 101, 250, 'I', '01,04,11,12', 7.3, 20, NULL),
(7, 'Anya''s Place', 251, 500, '?', '01,11', 11, 23, NULL),
(8, 'Buta Grill', 251, 500, 'F', '02,04,11,12,13', 11.3, 21.3, NULL),
(9, 'Hua Seng Hong', 500, 1000, 'F', '01,03,11,12', 10, 22, NULL),
(10, 'Kai Mara Noodle Tanantorn', 0, 100, 'R', '01,11', 18.3, 1, NULL),
(11, 'Koh Lanta Pizzaria', 101, 250, 'F', '04,11', 11, 22, NULL),
(12, 'ปู๊ตี่บะหมี่เกี๊ยวกุ้ง', 0, 100, 'F', '01,11', 17, 23.59, NULL),
(13, 'ศรีไทยขาหมู', 0, 100, '?', '04,11', 9, 15, NULL),
(14, 'Khrua Cartoon', 0, 100, '?', '01,11', 9, 21, NULL),
(15, 'Sutaros', 0, 100, '?', '01,11', 7, 20, NULL),
(16, 'Buri Yummy', 0, 100, 'F', '01,02,04,11', 11, 22, NULL),
(17, 'D''Eiffel', 251, 500, 'F', '04,11', 11, 22, NULL),
(18, 'Hong Nung Len', 0, 100, 'F', '01,11', 10, 20, NULL),
(19, 'กวเล็ก กุ้งอบวุ้นเส้น', 101, 250, 'F', '01,03,11', 16, 22.3, NULL),
(20, 'Rit วังหลัง', 101, 250, '?', '02,11', 11, 21, NULL);

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
  MODIFY `RestaurantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
