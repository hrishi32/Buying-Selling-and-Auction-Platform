-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2017 at 12:31 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) DEFAULT NULL,
  `base_price` float DEFAULT NULL,
  `curr_price` float DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `base_price`, `curr_price`, `end_date`) VALUES
(10, 88320, 88320, '0000-00-00'),
(5, 1540, 1540, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `buy`
--

CREATE TABLE `buy` (
  `id` int(11) DEFAULT NULL,
  `base_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy`
--

INSERT INTO `buy` (`id`, `base_price`) VALUES
(1, 12999),
(2, 99),
(3, 40),
(4, 540),
(5, 1540),
(6, 20),
(7, 220),
(8, 120),
(9, 1320),
(10, 88320);

-- --------------------------------------------------------

--
-- Table structure for table `lend`
--

CREATE TABLE `lend` (
  `id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `fare` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lend`
--

INSERT INTO `lend` (`id`, `start_date`, `end_date`, `fare`) VALUES
(1, '0000-00-00', '0000-00-00', 500),
(2, '0000-00-00', '0000-00-00', 10),
(5, '0000-00-00', '0000-00-00', 400),
(10, '0000-00-00', '0000-00-00', 500);

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE `object` (
  `id` int(11) DEFAULT NULL,
  `user` varchar(40) DEFAULT NULL,
  `tag1` varchar(40) DEFAULT NULL,
  `tag2` varchar(40) DEFAULT NULL,
  `tag3` varchar(40) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `object`
--

INSERT INTO `object` (`id`, `user`, `tag1`, `tag2`, `tag3`, `description`, `price`, `available`) VALUES
(1, 'hoomanlovescat@gmail.com', 'bike', 'MTB', 'cycle', 'a beautiful mtb with front suspensions and 27 speed system', 12999, 1),
(2, 'hoomanlovesdog@gmail.com', 'pendrive', 'usb', '16gb', 'toshiba', 99, 1),
(3, 'ritwiksaha@hotmail.com', 'gulabjamuns', 'sweets', 'food', 'Home made gulab jamuns ', 40, 0),
(4, 'wuahjiwuah@hotmail.com', 'game controller', 'pc controller', 'xbox controller', 'Amazing controller with vibrations and good hand grip ', 540, 0),
(5, 'aruyani@ymail.com', 'love necklace', 'pendant', 'piece', 'Silver jewel', 1540, 1),
(6, 'pandai@ymail.com', 'lays', 'chips', 'food', 'lays', 20, 0),
(7, 'tigerzindahai@yolo.com', 'gun', 'pistol', 'toy', 'plastic gun with bb bullets', 220, 1),
(8, 'shera@pnb.com', 'ladoo', 'mithai', 'food', 'moti chur ke ladoo', 120, 1),
(9, 'lovelysingh@pnb.com', 'shoes', 'basketball', 'high ankle', 'soft mesh 10 size UK', 1320, 1),
(10, 'jogi@qatar.com', 'iphone x', 'mobile', 'apple', 'the newly releasd iphone x', 88320, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(40) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `userid`, `password`) VALUES
('hoomanlovescat@gmail.com', 1, 'pass@iit'),
('hoomanlovesdog@gmail.com', 2, 'pass@iit'),
('ritwiksaha@hotmail.com', 3, 'pass@iit'),
('wuahjiwuah@hotmail.com', 4, 'pass@iit'),
('aruyani@ymail.com', 5, 'pass@iit'),
('panda@ymail.com', 6, 'pass@iit'),
('tigerzindahai@yolo.com', 7, 'pass@iit'),
('lovelysingh@pnb.com', 8, 'pass@iit'),
('shera@pnb.com', 9, 'pass@iit'),
('jogi@qatar.com', 10, 'pass@iit');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`user_id`, `item_id`) VALUES
(0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
