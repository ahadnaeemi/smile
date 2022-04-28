-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 10:48 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smile`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_email`
--

CREATE TABLE `auth_email` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `org_type` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth_email`
--

INSERT INTO `auth_email` (`id`, `email`, `org_type`) VALUES
(33, 'khan44169@gmail.com', 'NGO'),
(34, 'xyz@gmail.com', 'hotel'),
(35, 'hij@gmail.com', 'single'),
(36, 'cdf@gmail.com', 'NGO');

-- --------------------------------------------------------

--
-- Table structure for table `foodraised`
--

CREATE TABLE `foodraised` (
  `id` int(100) NOT NULL,
  `food_type` varchar(10) NOT NULL,
  `food_name` varchar(50) NOT NULL,
  `food_weight` int(100) NOT NULL,
  `raiser_id` int(10) NOT NULL,
  `org-type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `foodreciever`
--

CREATE TABLE `foodreciever` (
  `id` int(10) NOT NULL,
  `raiser_id` int(10) NOT NULL,
  `reciever_id` int(10) NOT NULL,
  `food_weight` int(100) NOT NULL,
  `food_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodreciever`
--

INSERT INTO `foodreciever` (`id`, `raiser_id`, `reciever_id`, `food_weight`, `food_type`) VALUES
(1, 2, 5, 50, 'veg'),
(2, 5, 2, 50, 'veg'),
(5, 8, 8, 12, 'non_veg'),
(6, 12, 3, 20, 'non_veg'),
(7, 13, 29, 30, 'veg'),
(8, 14, 34, 50, 'non_veg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(50) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `hotel_license` varchar(20) NOT NULL,
  `hotel_address` varchar(50) NOT NULL,
  `hotel_email` varchar(50) NOT NULL,
  `hotel_password` varchar(10) NOT NULL,
  `hotel_number` bigint(50) NOT NULL,
  `hotel_photo` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `hotel_name`, `hotel_license`, `hotel_address`, `hotel_email`, `hotel_password`, `hotel_number`, `hotel_photo`) VALUES
(34, 'xyz', '123456789', 'SHASTRI NAGAR', 'xyz@gmail.com', '123456', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `ngo`
--

CREATE TABLE `ngo` (
  `id` int(100) NOT NULL,
  `ngo_name` varchar(50) NOT NULL,
  `ngo_registeration` int(20) NOT NULL,
  `ngo_address` varchar(50) NOT NULL,
  `ngo_email` varchar(20) NOT NULL,
  `ngo_password` varchar(10) NOT NULL,
  `ngo_number` bigint(50) NOT NULL,
  `ngo_photo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ngo`
--

INSERT INTO `ngo` (`id`, `ngo_name`, `ngo_registeration`, `ngo_address`, `ngo_email`, `ngo_password`, `ngo_number`, `ngo_photo`) VALUES
(36, 'cdf NGO', 49841651, 'SHASTRI NAGAR', 'cdf@gmail.com', '123456', 9619122995, ''),
(33, 'abc NGO', 987654321, 'SHASTRI NAGAR', 'khan44169@gmail.com', '123456', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `singleowner`
--

CREATE TABLE `singleowner` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `adhar` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `number` bigint(50) NOT NULL,
  `photo` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `singleowner`
--

INSERT INTO `singleowner` (`id`, `name`, `adhar`, `address`, `email`, `password`, `number`, `photo`) VALUES
(35, 'hij', 0, 'SHASTRI NAGAR', 'hij@gmail.com', '123456', 96191, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_email`
--
ALTER TABLE `auth_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodraised`
--
ALTER TABLE `foodraised`
  ADD PRIMARY KEY (`id`),
  ADD KEY `raisers_forign_key` (`raiser_id`);

--
-- Indexes for table `foodreciever`
--
ALTER TABLE `foodreciever`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD UNIQUE KEY `hotel_license` (`hotel_license`,`hotel_email`,`hotel_number`);

--
-- Indexes for table `ngo`
--
ALTER TABLE `ngo`
  ADD UNIQUE KEY `ngo_registeration` (`ngo_registeration`,`ngo_email`,`ngo_number`);

--
-- Indexes for table `singleowner`
--
ALTER TABLE `singleowner`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_email`
--
ALTER TABLE `auth_email`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `foodraised`
--
ALTER TABLE `foodraised`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `foodreciever`
--
ALTER TABLE `foodreciever`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
