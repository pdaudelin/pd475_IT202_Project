-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Oct 02, 2025 at 07:53 PM
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
-- Table structure for table `FidgetsManagers`
--

CREATE TABLE IF NOT EXISTS `FidgetsManagers` (
`FidgetsManagerID` int(11) NOT NULL,
  `emailAddress` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `pronouns` varchar(60) NOT NULL,
  `firstName` varchar(60) NOT NULL,
  `lastName` varchar(60) NOT NULL,
  `DateTimeCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `FidgetsManagers`
--

INSERT INTO `FidgetsManagers` (`FidgetsManagerID`, `emailAddress`, `password`, `pronouns`, `firstName`, `lastName`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(1, 'swaylor@fidgetstore.com', '3cdfa761361762ddedc01ea1428db10a92e327325f490f7f34f1b1b91d994f22', 'me/maw', 'Swaylor', 'Tift', '2025-10-02 18:47:58', '2025-10-02 18:47:58'),
(2, 'justin@fidgetstore.com', 'b092acddbe86ffbb0bd5ad7abd707d6cf1c0a50cdeaaae96a3b41644ac73e651', 'he/haw', 'Justin', 'Time', '2025-10-02 18:48:17', '2025-10-02 18:48:17'),
(4, 'barr@fidgetstore.com', 'b73660ce63ddded21ecad79a42a43bf6cbfabc18a08e88d22d60144cf3290f2b', 'her/she', 'Barr', 'Chocolate', '2025-10-02 19:25:50', '2025-10-02 19:25:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FidgetsManagers`
--
ALTER TABLE `FidgetsManagers`
 ADD PRIMARY KEY (`FidgetsManagerID`), ADD UNIQUE KEY `emailAddress` (`emailAddress`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `FidgetsManagers`
--
ALTER TABLE `FidgetsManagers`
MODIFY `FidgetsManagerID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
