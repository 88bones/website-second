-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2024 at 01:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `bikeid` int(5) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `bname` varchar(20) NOT NULL,
  `btype` varchar(20) NOT NULL,
  `enginecc` int(5) NOT NULL,
  `price` int(10) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`bikeid`, `brand`, `bname`, `btype`, `enginecc`, `price`, `image`) VALUES
(48, 'KTM', 'RC390', 'sport', 373, 999000, 0x75706c6f6164732f72633339302e706e67),
(49, 'KTM', 'Duke 200', 'naked', 199, 574000, 0x75706c6f6164732f64756b653230302e6a706567),
(51, 'Yamaha', 'MT-15', 'naked', 155, 594000, 0x75706c6f6164732f6d742d31352e6a706567),
(52, 'Bajaj', 'Pulsar 150', 'commuter', 149, 300000, 0x75706c6f6164732f70756c7361723135302e6a7067),
(54, 'Yamaha', 'M1', 'sport', 1000, 988787, 0x75706c6f6164732f574336434a3634345442435a374f4b58424f474e4a554e5952342e6a7067),
(55, 'Yamaha', 'R15M', 'sport', 155, 630000, 0x75706c6f6164732f7231356d2e6a7067),
(56, 'Royal-Enfield', 'Hunter 350', 'cruiser', 350, 475000, 0x75706c6f6164732f48554e5445525f3335302e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewid` int(11) NOT NULL,
  `bikeid` int(11) DEFAULT NULL,
  `review_text` text NOT NULL,
  `rating` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewid`, `bikeid`, `review_text`, `rating`, `userid`) VALUES
(17, 48, 'nice fast bike', 5, 14),
(18, 55, 'super dami bike', 5, 23),
(19, 49, 'comfortable bikes', 5, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `username`, `email`, `password`, `role`) VALUES
(14, 'admin', 'admin', 'admin@gmail.com', 'admin123', 'admin'),
(15, 'user', 'user', 'user@gmail.com', 'user123', 'user\r\n'),
(17, 'Rojar Maharjan', 'rojar', 'binitmaharjan2@gmail.com', 'b123', 'admin'),
(23, 'test', 'test', 'test@gmail.com', 'test123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`bikeid`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewid`),
  ADD KEY `bikeid` (`bikeid`),
  ADD KEY `reviews_ibfk_2` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `bikeid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`bikeid`) REFERENCES `bikes` (`bikeid`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
