-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2023 at 08:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('raju', '123'),
('raju', '123'),
('ammu', '12345'),
('shiv', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `email`, `subject`, `message`) VALUES
('vicky', 'raju@gmail.com', 'hhhhhhhhhhhhhhhhhhhhh', 'mmmmmmmmmmmmmmmmmmmmmmmmbbbbbbbbbbbb'),
('sagar', 'rfhaih@gmail.com', 'hhhhhhhhhhhhhhhhhhhhh', 'mmmmmmmmmmmmmmmmmmmmmmmmmbbbbbbbbbbbbbbbbbbb');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `id` int(11) NOT NULL,
  `unique_code` varchar(13) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date` varchar(10) NOT NULL,
  `pickup_from` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `pickup`
--

INSERT INTO `pickup` (`id`, `unique_code`, `name`, `mobile`, `Email`, `address`, `date`, `pickup_from`, `message`, `status`) VALUES
(4, '646259200e519', 'jai', '9739048034', 'rfhaih@gmail.com', 'attur', '', 'school_college', 'n n nnknn', 'Accepted'),
(5, '64625be70328d', 'shiv', '8748783686386', 'raju@gmail.com', 'attur', '', 'apartment', 'wFWFSFDF', 'Rejected'),
(6, '6463224152d98', 'misbha', '6363906651', 'misbha@gmail.com', 'attur', '', 'school_college', 'bjbsjj', 'Pending'),
(7, '646331da45be7', 'sagar', '9739048034', 'raju@gmail.com', 'attur', '', 'school_college', 'gggg', 'Rejected'),
(8, '6465ce4fc626b', 'r4r', '9739048034', 'raju@gmail.com', 'rffffffffffff', '2023-05-20', 'apartment', 'gtvgtvtrvtrv', 'Pending'),
(9, '6465ce77c3e24', 'yadu', '9739048034', 'raju@gmail.com', 'mbjbhhhjffe', '2023-05-27', 'school_college', 'fewfbhdbhbhd', 'Pending'),
(10, '646bb1c19f81a', 'vicky', '9739048034', 'vicky@gmail.com', 'nbnvvnvnvn', '2023-05-25', 'apartment', 'mnnnbmb', 'Pending'),
(11, '646bb39f8ab10', 'vicky', '9739048034', 'vicky@gmail.com', 'nbnvvnvnvn', '2023-05-25', 'apartment', 'mnnnbmb', 'Pending'),
(12, '646bb58576c30', 'jjj', '9739048034', 'vicky@gmail.com', 'mknnnnnnnnnnnnnnnnnnnn', '2023-05-10', 'school_college', ' mmmmmmmmmmmmmmmmmmmmmmmm', 'Pending'),
(13, '646efa163c0f1', 'mohan', '9606298396', 'mohan@gmail.com', 'hebbal bridge hero', '2023-05-28', 'corporate_office', 'hi please take my scrap', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` blob DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `price`) VALUES
(6, 0x363436623938653838303163362e6a7067, 'newspaper', '18.00'),
(7, 0x363436623938666135363430652e6a7067, 'books', '24.00'),
(8, 0x363436623939363932323533322e6a7067, 'copper', '400.00'),
(9, 0x363436623939383965653231342e6a7067, 'aluminium', '100.00'),
(10, 0x363436623939396630303230632e6a7067, 'iron', '28.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
