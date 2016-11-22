-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 02:52 AM
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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Nickname` varchar(255) DEFAULT NULL,
  `Gender` char(1) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `FoodPreferences` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `FirstName`, `LastName`, `Nickname`, `Gender`, `Email`, `FoodPreferences`) VALUES
(1, 'Jack', '14b7b89cc7207bdea7fd5b9f31749a50', 'Jack', 'Johnson', 'Jack', 'm', 'Jack@jack.com', '03,04,11,12,13,'),
(2, 'Poom', 'd0cfbfd4a514b84c692645cbf695108f', 'Poom', 'Smart', 'Poom', 'm', 'poomst@hotmail.com', '01,02,04,11,12,13,'),
(3, 'Erbazz', 'c839d7d255e00c748c57a51b11c3f8c6', 'Erbazz', 'Top', 'Top', 'm', 'Erbazz@erbazz.erbazz', '01,02,03,04,11,12,13,'),
(4, 'Jeep', 'f7e212c99f0de8d6d52ce29864ba0f44', 'Jeep', 'Error', 'Jeep', 'm', 'Jeep@jeep.jeep', '03,04,11,12,'),
(5, 'Book', '7bf24da86507feac7390140c7685597d', 'Book', 'Koob', 'Book', 'm', 'Book@book.book', '01,03,04,11,12,'),
(6, 'Drive', 'f4baa7a8d0fe60be68101a7372112ce5', 'Drive', 'Drive', 'Drive', 'm', 'Drive@drive.drive', '01,02,03,11,12,13,'),
(7, 'Sophia', 'e4fd047cdcacac4f8c94f299f7ce75a1', 'Sophia', 'Sophia', 'Sophia', 'f', 'sophia@sophia.sophia', '02,03,12,');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
