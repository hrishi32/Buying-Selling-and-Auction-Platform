-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 06:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `itemId` int(11) NOT NULL,
  `item` varchar(100) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `imagesrc` varchar(100) NOT NULL,
  `imagesrc1` varchar(100) DEFAULT NULL,
  `imagesrc2` varchar(100) DEFAULT NULL,
  `imagesrc3` varchar(100) DEFAULT NULL,
  `bprice` int(11) DEFAULT NULL,
  `cprice` int(11) DEFAULT NULL,
  `bnprice` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `bidder` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`itemId`, `item`, `description`, `category`, `imagesrc`, `imagesrc1`, `imagesrc2`, `imagesrc3`, `bprice`, `cprice`, `bnprice`, `start`, `end`, `user`, `status`, `bidder`) VALUES
(1, 'Samsung Phone', 'A samsung phone with some touchscreen features', 'Electronics', '1.png', '4.png', '5.png', '7.png', 4500, 4501, 5000, '2017-11-11 04:09:34', '2017-11-17 00:00:00', 1, 0, 10),
(2, 'skjdbf', 'fjd', 'Electronics', '2.png', NULL, NULL, NULL, 0, 0, 0, '2017-11-01 03:55:00', '2017-11-15 23:16:00', 1, 0, 5),
(3, 'skjdbf', 'fjd', 'Electronics', '3.png', NULL, NULL, NULL, 0, 0, 0, '2017-11-01 03:55:00', '2017-11-15 23:16:00', 1, 0, 5),
(4, 'skjdbf', 'fjd', 'Electronics', '4.png', NULL, NULL, NULL, 0, 0, 0, '2017-11-01 03:55:00', '2017-11-15 23:16:00', 1, 0, 9),
(5, 'dslnkf', 'lkdnrf', 'Electronics', '5.png', NULL, NULL, NULL, 454, 110, 4554, '2017-11-02 03:58:00', '2017-11-16 22:58:00', 1, 0, 5),
(6, 'trial', 'lets try for current time', 'Stationary', '6.png', NULL, NULL, NULL, 70, 78, 100, '2017-11-11 04:50:00', '2017-11-11 04:51:00', 1, 1, 3),
(7, 'withbidder', 'trying the sql query with bidder information', 'Stationary', '7.png', NULL, NULL, NULL, 145, 15, 5151, '2017-11-07 09:53:00', '2017-11-11 13:17:00', 1, 1, 1),
(8, 'dflgkjirlvdsfjv', 'trying the sql query with bidder information', 'Stationary', '8.png', NULL, NULL, NULL, 145, 15, 6454, '2017-11-07 09:53:00', '2017-11-11 13:44:00', 1, 1, 1),
(9, 'food', 'dfsdaivb', 'Electronics', '9.png', NULL, NULL, NULL, 25, 1000000, 100, '2017-11-10 00:59:00', '2017-11-11 17:20:00', 1, 1, 1),
(10, 'hdhd', 'dudgebs', 'Electronics', '10.png', NULL, NULL, NULL, 630, 648, 1000, '2017-11-11 13:07:00', '2017-11-11 19:07:00', 1, 1, 1),
(11, 'Longer', 'end time is longgggg', 'Electronics', '11.png', NULL, NULL, NULL, 240, 261, 500, '2017-11-11 11:07:00', '2017-11-14 23:00:00', 1, 2, 1),
(12, 'ekjsbdf', 'ewg', 'Electronics', '12.png', NULL, NULL, NULL, 1, 72, 1, '2017-11-07 00:00:00', '2017-11-24 00:00:00', 1, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `user` (`user`),
  ADD KEY `bidder` (`bidder`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `auction_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`userid`),
  ADD CONSTRAINT `auction_ibfk_2` FOREIGN KEY (`bidder`) REFERENCES `user` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
