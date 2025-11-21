-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Nov 21, 2025 at 11:50 PM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pd475`
--

-- --------------------------------------------------------

--
-- Table structure for table `FidgetTypes`
--

CREATE TABLE IF NOT EXISTS `FidgetTypes` (
  `FidgetTypeID` int(11) NOT NULL,
  `FidgetTypeCode` varchar(255) NOT NULL,
  `FidgetTypeName` varchar(255) NOT NULL,
  `FidgetShelfNumber` int(11) NOT NULL,
  `DateTimeCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `FidgetTypes`
--

INSERT INTO `FidgetTypes` (`FidgetTypeID`, `FidgetTypeCode`, `FidgetTypeName`, `FidgetShelfNumber`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(123, 'TEST', 'Test', 9, '2025-11-21 23:27:20', '2025-11-21 23:27:20'),
(201, 'SPNR', 'Fidget Spinner', 1, '2025-10-17 04:48:02', '2025-10-17 04:48:02'),
(202, 'CUBE', 'Fidget Cube', 2, '2025-10-17 04:48:05', '2025-10-17 04:48:05'),
(203, 'BALL', 'Therapy Stress Ball', 3, '2025-10-17 04:48:07', '2025-10-17 04:49:05'),
(204, 'SLNK', 'Slinky', 4, '2025-11-01 01:25:45', '2025-11-01 01:25:45'),
(205, 'SLME', 'Slime', 5, '2025-11-01 03:07:16', '2025-11-01 03:07:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FidgetTypes`
--
ALTER TABLE `FidgetTypes`
 ADD PRIMARY KEY (`FidgetTypeID`), ADD UNIQUE KEY `FidgetTypeCode` (`FidgetTypeCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
