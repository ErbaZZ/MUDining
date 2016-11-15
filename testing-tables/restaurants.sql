-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2016 at 03:21 PM
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
  `Promotion` varchar(255) DEFAULT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=tis620;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`RestaurantID`, `Name`, `MinPrice`, `MaxPrice`, `Location`, `Type`, `OpenTime`, `CloseTime`, `Promotion`, `Description`) VALUES
(1, 'Mai Tok Mai Taek(ไม่ตกไม่แตก)', 51, 100, 'F', '01,04,11,12', 10.3, 21, NULL, ''),
(2, 'Steak-lung-nhuad(สเต็กลุงหนวด)', 0, 100, 'F', '04,11', 17, 23.3, NULL, ''),
(3, 'J-Class Vegetarian', 51, 100, 'R', '01,03,11', 8, 20, NULL, ''),
(4, 'Phuttaraksa Restaurant(พุทธรักษา เรสเทรอง)', 251, 500, 'F', '01,03,04,11', 10, 20, NULL, ''),
(5, 'LODIHAM', 50, 100, 'F', '01,04,11,12', 10, 21, NULL, ''),
(6, 'Music Square', 101, 250, 'I', '01,04,11,12', 7.3, 20, NULL, 'Restaurant looks cute and full of nature. It is located in College of Music, Mahidol Salaya. This restaurant has both Thai food and European food with great service for lunch and dinner.'),
(7, 'Anya\'s Place(อัญญา เพลส)', 251, 500, 'F', '01,04,11', 11, 23, NULL, 'Anya?s Place is one of the restaurants in Nakornpathom. Food is high quality and very delicious with fair price. The service is very nice as they service their family.'),
(8, 'Buta Grill(บูตะกริลล์)', 251, 500, 'F', '02,04,11,12,13', 11.3, 21.3, NULL, 'It is a Grill restaurant that worth to go and it is suitable for sea food lover because of high quality. It provides great service and fresh food with tasty sauce in 199 Bath and 299 for sea food. These prices include the soft drink.'),
(9, 'Hua Seng Hong(ฮั่วเซ่งฮง)', 501, 1000, 'F', '01,03,11,12', 10, 22, NULL, 'Hua Seng Hong is located in the opposite side of Mahidol University. In front of the restaurant has outstanding red label. Parking is available at in front of the restaurant and both sides of the restaurant. Hua Seng Hong is the Chinese food restaurant that has set and single dish, but the set is cheaper. The price has from hundred to thousand.'),
(10, 'Tanantorn Noodle(ธนัญธรก๋วยเตี๋ยวไก่มะระ)', 0, 100, 'R', '01,11', 18.3, 1, NULL, 'This the most interesting restaurant for Kai Mara Noodle lover, but it opens quite late around 18.30 '),
(11, 'Koh Lanta Pizzeria', 101, 250, 'F', '04,11,12', 11, 22, NULL, 'Lanta Pizzarla?s pizza is crispy dough. You can choose topping that you want, but it already provides some topping. The price isn?t different from choosing topping by yourself. '),
(12, 'Pootee Noodle(ปู๊ตี่บะหมี่เกี๊ยวกุ้ง)', 0, 50, 'F', '03,11', 17, 23.59, NULL, 'The old restaurant which located in front of Srifa bakery sell noodle there around 10 years. The highlight is large shrimp wonton.'),
(13, 'Srithai Kha Moo(ศรีไทยขาหมู)', 0, 100, 'S', '03,11', 9, 15, NULL, 'Kao Kha Moo with 75 Baht is worth to pay if you compare with the quantity. It servers with medium-boil egg.'),
(14, 'Khrua Cartoon(ครัวการ์ตูน)', 0, 100, 'S', '01,11', 9, 21, NULL, ''),
(15, 'Sutaros(สุธารส)', 0, 50, 'F', '01,11', 7, 20, NULL, 'It is the noodle restaurant. The highkight is pork which has a good smell. The price is fair with quality and quantity.'),
(16, 'Buri Yummy', 0, 100, 'F', '01,02,04,11,12', 11, 22, NULL, 'This restaurant is for Mahidol\'s student. It has many menu for you include Thai and European food. Price isn\'t too expensive and food is delicious.'),
(17, 'D\'Eiffel', 251, 500, 'F', '04,11,12', 11, 22, NULL, 'This restaurant make you feel like rating in the luxurious classic-style European restaurant.'),
(18, 'Hong Nung Len(ห้องนั่งเล่น)', 0, 100, 'F', '01,11,12', 10, 20, NULL, 'It is a small restaurant. The high light is menu which has many set to choose with cheap price.'),
(19, 'Guo Lek(โกวเล็ก กุ้งอบวุ้นเส้น)', 51, 250, 'F', '01,03,11', 16, 22.3, NULL, 'It is street food that has long queue. You can enjoy with original taste of Hongkong Suki, Dried fish-maw soup and the other menus.'),
(20, 'Rit Wanglang(ริท วังหลัง)', 101, 250, 'F', '02,11,12', 11, 21, NULL, 'Sushi style Wanglang resturant with fair price suit for sushi lover.');

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
