-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 02:05 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `typeleave`
--

CREATE TABLE `typeleave` (
  `Type_id` varchar(13) NOT NULL,
  `Type_name` varchar(50) NOT NULL,
  `Type_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `typeleave`
--

INSERT INTO `typeleave` (`Type_id`, `Type_name`, `Type_details`) VALUES
('1112223334445', 'ลาพักร้อน', 'การลาพักร้อนจะลาได้ 5 วัน ต่อ ปี'),
('1254859658754', 'ลากิจ', 'จำนวนการลากิจ จะลาได้ ปีละ 10 วัน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `typeleave`
--
ALTER TABLE `typeleave`
  ADD PRIMARY KEY (`Type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
