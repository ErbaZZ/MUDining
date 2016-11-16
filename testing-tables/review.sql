-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2016 at 09:07 AM
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
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RestaurantID` int(11) NOT NULL,
  `ReviewDate` date NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `UserID`, `RestaurantID`, `ReviewDate`, `Title`, `Content`) VALUES
(1, 6, 1, '2016-11-16', 'ไม่ตกจะแตกหรือไม่แตกก็ได้', 'ร้านนี้จะมีเมนูพิเศษที่ชื่อว่า&nbsp;<span style="font-weight: 700;"><font size="5" face="Arial">chef choice</font></span>&nbsp;โดยที่เราจะไม่รู้เลยว่าเราได้กินอะไรจนกว่าเมนูจะมาเสริฟในราคาเพียง<span style="font-weight: 700;"><font face="Arial Black" size="5">&nbsp;60 บาท&nbsp;</font></span>เท่านั้น เย้!!!!!!'),
(2, 6, 5, '2016-11-16', 'เสต็ก!!!!!!', '<div style="text-align: left;">ร้านนี้ชื่อเฟี้ยวมากเป็นคำว่า Mahidol กลับหลัง ส่วนใหญ่จะขายเป็นเสต็กตามหัวข้อเลยครับ เมนูราคาไม่แพงมาก และสามารถสั่งเป็น</div><div style="text-align: left;"><b><font size="5" face="Arial Black">COMBO ราคา 119 บาทเท่านั้น</font></b>&nbsp;โดยภายใน COMBO จะ&nbsp;<b><font size="5" face="Impact">มีเสต็กให้ถึง 2 ชิ้น&nbsp;</font></b>สามารถเลือกได้ตามความชอบของเราเอง&nbsp;</div>'),
(3, 6, 2, '2016-11-16', 'เสต็กอีกแล้ว !!!!!!', 'ถึงจะไม่มีแอร์ ละตั้งอยู่ติดกับถนนใหญ่ แต่ด้วย รสชาติ ราคา ปริมาณ และคุณภาพอาหารทำให้คนแน่นแทบจะตลอดเวลา'),
(4, 6, 7, '2016-11-16', 'ร้านอาหารหรูหรา ชิลๆ ชิกๆ', 'ร้านที่ให้บรรยากาศแบบสบายๆ แต่มีความหรูหราในตัวเอง <font face="Arial Black"><b style="font-size: x-large;">เหมาะสำหรับการนัดเพื่อนมานั่งคุยเล่นกัน </b><font size="3">แต่ตอนเย็นๆ คนจะค่อนข้างแน่นควรโรมาจองหรือมาให้เร็วๆ ไว้ก่อน&nbsp;</font></font>'),
(5, 6, 6, '2016-11-16', 'ร้านสุดแจ่มในมหาวิทยาลัย', 'ร้านหรูหรา สำหรับคนที่ต้องการกินอาหารอย่างเพลิดเพลินไปกับธรรมชาติ เพราะรอบๆร้านจะเต็มไปด้วยต้นไม้นาๆ ชนิดและอยู่ติดบริเวณคลองทำให้สบายตา อาหารก็รสชาติดี และมีบริการอย่างยอดเยี่ยมเมื่อเที่ยบกับราคาแล้วถือว่าคุ้มค่าแก่การไปกิน!!!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
