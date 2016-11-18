-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 08:42 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RestaurantID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

INSERT INTO `rating` (`RestaurantID`, `UserID`, `Rating`) VALUES
(5, 2, 2),
(7, 1, 4),
(9, 2, 1),
(15, 3, 3),
(4, 8, 4),
(19, 1, 4),
(7, 5, 5),
(14, 6, 3),
(12, 8, 3),
(8, 1, 3),
(18, 2, 2),
(16, 7, 3),
(13, 7, 2),
(20, 8, 4),
(2, 7, 3),
(19, 7, 3),
(16, 1, 4),
(20, 7, 1),
(4, 1, 2),
(9, 3, 2),
(18, 1, 2),
(5, 5, 2),
(1, 6, 4),
(1, 3, 4),
(15, 8, 5),
(17, 6, 4),
(18, 5, 5),
(1, 7, 5),
(7, 8, 1),
(11, 3, 3),
(1, 8, 4),
(4, 2, 3),
(15, 1, 5),
(4, 5, 5),
(9, 1, 3),
(10, 4, 3),
(7, 2, 3),
(14, 3, 1),
(2, 1, 1),
(14, 2, 4),
(12, 1, 5),
(4, 3, 1),
(17, 7, 3),
(20, 3, 2),
(6, 3, 3),
(15, 4, 2),
(6, 5, 1),
(10, 1, 3),
(13, 8, 1),
(2, 8, 2),
(6, 1, 3),
(1, 2, 4),
(4, 6, 2),
(4, 7, 1),
(14, 5, 2),
(15, 6, 1),
(13, 6, 1),
(7, 3, 5),
(13, 5, 2),
(15, 2, 5),
(6, 8, 4),
(8, 3, 5),
(2, 6, 3),
(5, 6, 4),
(7, 7, 4),
(17, 8, 5),
(19, 6, 2),
(10, 5, 3),
(15, 5, 4),
(16, 8, 3),
(3, 5, 1),
(18, 4, 2),
(6, 2, 3),
(15, 7, 3),
(2, 5, 3),
(17, 5, 2),
(9, 8, 2),
(2, 4, 2),
(3, 3, 3),
(5, 3, 4),
(13, 2, 1),
(10, 6, 2),
(18, 6, 5),
(13, 1, 1),
(9, 5, 2),
(8, 6, 2),
(1, 5, 4),
(5, 7, 4),
(14, 4, 2),
(14, 1, 3),
(6, 7, 3),
(10, 2, 4),
(8, 5, 5),
(19, 2, 4),
(5, 1, 5),
(18, 3, 4),
(17, 2, 3),
(18, 8, 2),
(12, 5, 4),
(3, 2, 2);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RestaurantID`,`UserID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
