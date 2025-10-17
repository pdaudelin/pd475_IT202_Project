-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: sql1.njit.edu
-- Generation Time: Oct 17, 2025 at 01:51 PM
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
-- Table structure for table `Fidgets`
--

CREATE TABLE IF NOT EXISTS `Fidgets` (
  `FidgetID` int(11) NOT NULL,
  `FidgetCode` varchar(10) NOT NULL,
  `FidgetName` varchar(255) NOT NULL,
  `FidgetDescription` text NOT NULL,
  `FidgetMaterial` varchar(255) NOT NULL,
  `FidgetColor` varchar(255) NOT NULL,
  `FidgetTypeID` int(11) NOT NULL,
  `FidgetWholesalePrice` decimal(10,2) NOT NULL,
  `FidgetListPrice` decimal(10,2) NOT NULL,
  `DateTimeCreated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DateTimeUpdated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Fidgets`
--

INSERT INTO `Fidgets` (`FidgetID`, `FidgetCode`, `FidgetName`, `FidgetDescription`, `FidgetMaterial`, `FidgetColor`, `FidgetTypeID`, `FidgetWholesalePrice`, `FidgetListPrice`, `DateTimeCreated`, `DateTimeUpdated`) VALUES
(1, 'SP001', 'Galaxy Spinner', 'A lightweight spinner with a mesmerizing galaxy design. Spins smoothly for up to three minutes and provides great stress relief.', 'Aluminum Alloy', 'Purple-Blue', 201, 4.50, 8.99, '2025-10-17 04:49:13', '2025-10-17 04:49:13'),
(2, 'SP002', 'Glow Spinner', 'This spinner glows brightly in the dark. It’s perfect for night use and helps increase focus and relaxation.', 'Plastic', 'Green', 201, 3.00, 6.99, '2025-10-17 04:49:17', '2025-10-17 04:49:17'),
(3, 'SP003', 'Metal Infinity Spinner', 'Made with stainless steel for durability. Its balanced weight gives it a smooth and stable spin for long periods.', 'Stainless Steel', 'Silver', 201, 5.50, 11.99, '2025-10-17 04:49:19', '2025-10-17 04:49:19'),
(4, 'SP004', 'Rainbow Spinner', 'Colorful rainbow coating with a silent bearing. Great for reducing anxiety during work or study sessions.', 'Zinc Alloy', 'Rainbow', 201, 4.75, 9.50, '2025-10-17 04:49:21', '2025-10-17 04:49:21'),
(5, 'SP005', 'Classic Spinner', 'A simple and durable design with smooth edges. Ideal for everyday stress relief and focus improvement.', 'ABS Plastic', 'Black', 201, 2.75, 5.99, '2025-10-17 05:03:58', '2025-10-17 05:03:58'),
(6, 'FC001', 'Classic Fidget Cube', 'Features six sides with buttons, switches, and rollers for sensory stimulation. Helps reduce anxiety and increase focus.', 'Plastic', 'Gray', 202, 4.00, 8.99, '2025-10-17 05:04:02', '2025-10-17 05:04:02'),
(7, 'FC002', 'Retro Fidget Cube', 'Inspired by classic designs, this cube includes tactile surfaces for endless play. Excellent for relieving tension during work.', 'ABS Plastic', 'Blue', 202, 4.25, 9.50, '2025-10-17 05:04:07', '2025-10-17 05:04:07'),
(8, 'FC003', 'Mini Travel Cube', 'Compact and portable for on-the-go use. It fits easily in your pocket and keeps your hands busy while reducing stress.', 'Plastic', 'White', 202, 3.50, 7.99, '2025-10-17 05:04:10', '2025-10-17 05:04:10'),
(9, 'FC004', 'Pro Gamer Cube', 'Designed for gamers with tactile buttons and smooth triggers. Improves focus and coordination during long gaming sessions.', 'Plastic', 'Black-Red', 202, 5.00, 10.99, '2025-10-17 05:04:12', '2025-10-17 05:04:12'),
(10, 'FC005', 'Color Shift Cube', 'Changes color with heat and light exposure. Provides a unique sensory experience that keeps your hands and mind engaged.', 'Silicone', 'Color-Changing', 202, 5.25, 11.50, '2025-10-17 05:04:24', '2025-10-17 05:04:24'),
(11, 'SB001', 'Gel Stress Ball', 'Filled with soft gel for a satisfying squeeze. Strengthens hand muscles and relieves tension instantly.', 'Gel Rubber', 'Blue', 203, 2.00, 4.99, '2025-10-17 05:04:28', '2025-10-17 05:04:28'),
(12, 'SB002', 'Aromatherapy Ball', 'Infused with lavender scent for calming effects. Ideal for relieving stress and promoting relaxation at home or work.', 'Silicone', 'Purple', 203, 3.50, 7.99, '2025-10-17 05:04:30', '2025-10-17 05:04:30'),
(13, 'SB003', 'Spiky Stress Ball', 'Features soft spikes that gently massage the hand. Improves blood circulation and helps reduce anxiety.', 'Rubber', 'Yellow', 203, 2.50, 5.99, '2025-10-17 05:04:32', '2025-10-17 05:04:32'),
(14, 'SB004', 'Marble Mesh Ball', 'A unique stress ball with a marble inside a mesh exterior. Encourages rhythmic squeezing to enhance focus and calmness.', 'Mesh Rubber', 'Green', 203, 3.25, 6.99, '2025-10-17 05:04:34', '2025-10-17 05:04:34'),
(15, 'SB005', 'Heavy-Duty Stress Ball', 'Built for long-lasting use with durable silicone material. Provides firm resistance for muscle training and relaxation.', 'Silicone', 'Red', 203, 4.00, 8.99, '2025-10-17 05:04:36', '2025-10-17 05:04:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Fidgets`
--
ALTER TABLE `Fidgets`
 ADD PRIMARY KEY (`FidgetID`), ADD UNIQUE KEY `FidgetCode` (`FidgetCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
