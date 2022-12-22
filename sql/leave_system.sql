-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 12:19 PM
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
  `System_latitude` varchar(100) NOT NULL,
  `System_longitude` varchar(100) NOT NULL,
  `System_period` varchar(100) NOT NULL,
  `System_timeoff` varchar(100) NOT NULL,
  `Stytem_starttime` varchar(100) NOT NULL,
  `Stytem_endtime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `constant`
--

INSERT INTO `constant` (`Stytem_No`, `Stytem_name`, `Stytem_address`, `Stytem_tel`, `Stytem_radius`, `System_latitude`, `System_longitude`, `System_period`, `System_timeoff`, `Stytem_starttime`, `Stytem_endtime`) VALUES
(11, 'บริษัทราชมงคล จำกัด', 'ขอนแก่น', '0877218287', '4654654654321.2465465', '1243243243', '45645654', '14:33', '16:33', '19:33', '19:33');

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
('6666666666666', 'วันชัย  มีชัย', '0856325421', 'ขอนแก่น', '1225458965858', '3333333333333', '1234'),
('7777777777777', 'กิตติชัย  ดีใจจัง', '0877218287', 'ขอนแก่น', '1225458965858', '222222222222', '1234'),
('7777777777778', 'asdasdas', '0854215874', 'xxxxxx', '1225458965858', '222222222222', '3232321'),
('8888888888888', 'มานะ  ยินดี', '896525421', 'ขอนแก่น', '1254256369857', '222222222222', '1234'),
('9999999999999', 'มังกร ไฟกก', '0854215874', 'ขอนแก่น', '1254256369857', '1111111111111', '1234'),
('admin', 'test', '0877542185', 'ooooo', '1225458965858', '1111111111111', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `leave`
--

CREATE TABLE `leave` (
  `Leave_id` varchar(13) NOT NULL,
  `Leave_date` date NOT NULL,
  `Leave_start` date NOT NULL,
  `Leave_end` date NOT NULL,
  `App_date` date NOT NULL,
  `Leave_status` int(10) NOT NULL,
  `Leave_reason` text NOT NULL,
  `App_note` text NOT NULL,
  `Emp_id` varchar(13) NOT NULL,
  `Type_id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave`
--

INSERT INTO `leave` (`Leave_id`, `Leave_date`, `Leave_start`, `Leave_end`, `App_date`, `Leave_status`, `Leave_reason`, `App_note`, `Emp_id`, `Type_id`) VALUES
('1525698585463', '2022-12-09', '2022-12-10', '2022-12-15', '2022-12-10', 2, 'ไปทำธุระ', 'ได้ไปทำธุระจริง', '6666666666666', '1254859658754'),
('152598585463', '2022-12-09', '2022-12-10', '2022-12-15', '2022-12-10', 2, 'ไปนา', 'ได้ไปทำธุระจริง', '6666666666666', '1254859658754'),
('2548565856956', '2022-12-09', '2022-12-10', '2022-12-13', '0000-00-00', 1, 'ป่วยเป็นไข', '', '8888888888888', '1254859658754'),
('254856585956', '2022-12-09', '2022-12-10', '2022-12-13', '0000-00-00', 1, 'ไม่สบาย', '', '8888888888888', '1254859658754'),
('5889658547542', '2022-12-10', '2022-12-11', '2022-12-16', '2022-12-11', 3, 'อากาศหนาว', 'ไม่สมเหตุสมผล', '9999999999999', '1112223334445'),
('588968547542', '2022-12-10', '2022-12-11', '2022-12-16', '2022-12-11', 3, 'อากาศร้อน', 'ไม่สมเหตุสมผล', '9999999999999', '1112223334445');

-- --------------------------------------------------------

--
-- Table structure for table `leave_rights`
--

CREATE TABLE `leave_rights` (
  `Type_no` int(10) NOT NULL,
  `Type_id` varchar(100) NOT NULL,
  `Pos_id` varchar(100) NOT NULL,
  `leave_maximum` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_rights`
--

INSERT INTO `leave_rights` (`Type_no`, `Type_id`, `Pos_id`, `leave_maximum`) VALUES
(9, '1112223334445', '1111111111111', 8),
(13, '1254859658754', '3333333333333', 2323),
(14, '1254859658754', '222222222222', 5);

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
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `Ttb_no` int(10) NOT NULL,
  `Emp_id` varchar(13) NOT NULL,
  `Ttb_date` date NOT NULL,
  `Ttb_timein` time NOT NULL,
  `Ttb_radiusin` varchar(30) NOT NULL,
  `Ttb_statusin` int(10) NOT NULL,
  `Ttb_timeinout` time NOT NULL,
  `Ttb_radiusout` varchar(30) NOT NULL,
  `Ttb_statusout` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`Ttb_no`, `Emp_id`, `Ttb_date`, `Ttb_timein`, `Ttb_radiusin`, `Ttb_statusin`, `Ttb_timeinout`, `Ttb_radiusout`, `Ttb_statusout`) VALUES
(1, '6666666666666', '2022-12-24', '08:00:41', '456421215.22121', 1, '17:39:41', '545212.215', 1),
(2, '6666666666666', '2022-12-23', '08:30:41', '456421215.22121', 2, '15:39:41', '545212.215', 2),
(3, '9999999999999', '2022-12-22', '09:00:41', '456421215.22121', 3, '19:39:41', '545212.215', 3);

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
('1254859658754', 'ลากิจ', 'จำนวนการลากิจ จะลาได้ ปีละ 10 วัน'),
('3279598475347', 'ลาพักร้อน', 'ฟหฟหก');

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
-- Indexes for table `leave`
--
ALTER TABLE `leave`
  ADD PRIMARY KEY (`Leave_id`);

--
-- Indexes for table `leave_rights`
--
ALTER TABLE `leave_rights`
  ADD PRIMARY KEY (`Type_no`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`Pos_id`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`Ttb_no`);

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
  MODIFY `Stytem_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leave_rights`
--
ALTER TABLE `leave_rights`
  MODIFY `Type_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `Ttb_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Dep_id`) REFERENCES `department` (`Dep_id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`Pos_id`) REFERENCES `position` (`Pos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
