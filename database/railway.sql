-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 12:53 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `admininfo`
--

CREATE TABLE `admininfo` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `adminId` varchar(30) NOT NULL,
  `adminPassword` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admininfo`
--

INSERT INTO `admininfo` (`id`, `name`, `adminId`, `adminPassword`) VALUES
(1, 'Vishnu Sahani', 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `employeeinfo`
--

CREATE TABLE `employeeinfo` (
  `id` int(11) NOT NULL,
  `sectionName` varchar(30) NOT NULL,
  `stationName` varchar(50) NOT NULL,
  `emplyeeId` varchar(50) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `createdDate` varchar(100) NOT NULL,
  `updatedDate` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rmb_pmb_info`
--

CREATE TABLE `rmb_pmb_info` (
  `id` int(11) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `stationName` varchar(50) NOT NULL,
  `emplyeeId` varchar(50) NOT NULL,
  `employeeName` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `pmbDate` varchar(50) NOT NULL,
  `pmbRefector` varchar(50) NOT NULL,
  `createdDate` varchar(50) NOT NULL,
  `updatedDate` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sectioninfo`
--

CREATE TABLE `sectioninfo` (
  `id` int(11) NOT NULL,
  `sectionName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `id` int(11) NOT NULL,
  `sectionId` varchar(30) NOT NULL,
  `sectionName` varchar(50) NOT NULL,
  `stationName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admininfo`
--
ALTER TABLE `admininfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmb_pmb_info`
--
ALTER TABLE `rmb_pmb_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectioninfo`
--
ALTER TABLE `sectioninfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admininfo`
--
ALTER TABLE `admininfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeeinfo`
--
ALTER TABLE `employeeinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rmb_pmb_info`
--
ALTER TABLE `rmb_pmb_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectioninfo`
--
ALTER TABLE `sectioninfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `station`
--
ALTER TABLE `station`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
