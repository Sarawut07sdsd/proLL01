-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 07:57 PM
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
-- Table structure for table `constant`
--

CREATE TABLE `constant` (
  `Stytem_No` int(10) NOT NULL,
  `Stytem_name` text NOT NULL,
  `Stytem_address` varchar(200) NOT NULL,
  `Stytem_tel` varchar(10) NOT NULL,
  `Stytem_radius` varchar(100) NOT NULL,
  `Stytem_periodStest` varchar(100) NOT NULL,
  `Stytem_periodEnd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `constant`
--

INSERT INTO `constant` (`Stytem_No`, `Stytem_name`, `Stytem_address`, `Stytem_tel`, `Stytem_radius`, `Stytem_periodStest`, `Stytem_periodEnd`) VALUES
(1, 'asdasdasdsa', 'ขอนแก่น', '0877218287', '16.42846215967785, 102.86346815130152', '18:45', '14:43'),
(4, 'test022', 'wqeasdas', '0887215254', '4654654654321.2465465', '21:18', '20:24'),
(7, 'd', 'fsdfsd654', '0877218287', 'asdasds', '20:38', '20:40'),
(8, 'asdsad', 'ขอนแก่น', '0877218287', '16.42846215967785, 102.86346815130152', '01:47', '01:50');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Dep_id` varchar(13) NOT NULL,
  `Dep_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Dep_id`, `Dep_name`) VALUES
('1225458965858', 'การจัดการ'),
('1254256369857', 'บัญชี');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Emp_id` varchar(13) NOT NULL,
  `Emp_name` varchar(50) NOT NULL,
  `Emp_tel` varchar(10) NOT NULL,
  `Emp_address` varchar(200) NOT NULL,
  `Dep_id` varchar(13) NOT NULL,
  `Pos_id` varchar(13) NOT NULL,
  `Emp_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Emp_id`, `Emp_name`, `Emp_tel`, `Emp_address`, `Dep_id`, `Pos_id`, `Emp_pass`) VALUES
('1111552365874', 'xxxxxxxx', '0877542185', 'xxxxxx', '1225458965858', '1111111111111', ''),
('1115263589658', 'asdasdas', '0877542185', 'ขอนแก่น', '1225458965858', '1111111111111', ''),
('1152236585456', 'lkkkkkk', '0877542185', 'ขอนแก่น', '1225458965858', '222222222222', ''),
('6666666666666', 'วันชัย  มีชัย', '0856325421', 'ขอนแก่น', '1225458965858', '3333333333333', '1234'),
('7777777777777', 'กิตติชัย  ดีใจจัง', '0877218287', 'ขอนแก่น', '1225458965858', '222222222222', '1234'),
('8888888888888', 'มานะ  ยินดี', '896525421', 'ขอนแก่น', '1254256369857', '222222222222', '1234'),
('9999999999999', 'มังกร ไฟกก', '0854215874', 'ขอนแก่น', '1225458965858', '1111111111111', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `leave_rights`
--

CREATE TABLE `leave_rights` (
  `Type_id` varchar(13) NOT NULL,
  `Pos_id` varchar(13) NOT NULL,
  `leave_maximum` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_rights`
--

INSERT INTO `leave_rights` (`Type_id`, `Pos_id`, `leave_maximum`) VALUES
('1112223334445', '1111111111111', 6),
('1254859658754', '222222222222', 10);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Pos_id` varchar(13) NOT NULL,
  `Pos_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Pos_id`, `Pos_name`) VALUES
('1111111111111', 'ผู้บริหาร'),
('222222222222', 'หัวหน้าฝ่าย (HR)'),
('3333333333333', 'พนักงานทั่วไป');

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
-- Indexes for table `constant`
--
ALTER TABLE `constant`
  ADD PRIMARY KEY (`Stytem_No`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Dep_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Emp_id`),
  ADD KEY `Dep_id` (`Dep_id`),
  ADD KEY `Pos_id` (`Pos_id`);

--
-- Indexes for table `leave_rights`
--
ALTER TABLE `leave_rights`
  ADD UNIQUE KEY `Type_id` (`Type_id`),
  ADD KEY `Pos_id` (`Pos_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Pos_id`);

--
-- Indexes for table `typeleave`
--
ALTER TABLE `typeleave`
  ADD PRIMARY KEY (`Type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `constant`
--
ALTER TABLE `constant`
  MODIFY `Stytem_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Dep_id`) REFERENCES `department` (`Dep_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`Pos_id`) REFERENCES `position` (`Pos_id`);

--
-- Constraints for table `leave_rights`
--
ALTER TABLE `leave_rights`
  ADD CONSTRAINT `leave_rights_ibfk_1` FOREIGN KEY (`Type_id`) REFERENCES `typeleave` (`Type_id`),
  ADD CONSTRAINT `leave_rights_ibfk_2` FOREIGN KEY (`Pos_id`) REFERENCES `position` (`Pos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
