-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 07:03 PM
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
(11, 'บริษัทราชมงคล จำกัด', 'ขอนแก่น', '0877218287', '100', '16.429132371923593', '102.86360767781598', '08:10', '08:30', '17:00', '23:59');

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
('DD6989', 'ผู้บริหาร'),
('DEP1359', 'บัญชี'),
('FF3809', 'การจัดการ'),
('OE8195', 'พนักงานทั่วไป'),
('OR2003', 'ช่าง');

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
('1234567836521', 'นางสาวสุพัตรา  พาภักดี', '0966869855', '28/8 ม8 ต.เมยวดี อ.เมยวดี จ.ร้อยเอ็ด', 'FF3809', 'POS2901', '1234'),
('1409901673971', 'ลูกนก นะ', '0877542185', 'ขอนแก่น', 'DEP1359', 'POS2991', '1234'),
('1409901673972', 'วิลา', '0877542185', 'ขอนแก่น', 'OE8195', 'POS1254', '1234'),
('7777777777777', 'มังกร ไฟ', '0877542185', 'ขอนแก่น', 'DEP1359', 'POS2991', '1234'),
('admin', 'กนกวรรณ ศรีนาวัน', '0877542185', 'ขอนแก่น', 'DEP1359', 'POS2901', '1234');

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
('132081', '2023-02-24', '2023-02-24', '2023-02-24', '2023-02-24', 2, '55555', 'อนุมัติ', 'admin', 'PEL2397'),
('306517', '2023-02-24', '2023-02-24', '2023-02-28', '0000-00-00', 3, '4545', '', 'admin', 'PEL9652'),
('325915', '2023-03-03', '2023-03-06', '2023-03-08', '0000-00-00', 3, 'xxxx', 'xxxxx', 'admin', 'PEL8317'),
('445540', '2023-03-15', '2023-03-16', '2023-03-17', '2023-03-15', 2, 'xxxxxx', 'อนุมัติ', 'admin', '654654'),
('447476', '2023-02-24', '2023-02-24', '2023-02-25', '0000-00-00', 1, 'xcxcxc', '', 'admin', '654654'),
('509497', '2023-02-26', '2023-02-26', '2023-02-28', '0000-00-00', 3, '555', 'ไม่อนุมัติ', 'admin', '654654'),
('572558', '2023-03-17', '2023-03-16', '2023-03-17', '0000-00-00', 1, 'ZZZZZZZZZZZZ', '', 'admin', '654654'),
('696006', '2023-02-24', '2023-02-24', '2023-02-28', '2023-03-21', 2, 'sdsds', 'อนุมัติ', '7777777777777', 'PEL2397'),
('756237', '2023-02-24', '2023-02-24', '2023-02-25', '0000-00-00', 1, '55565', '', 'admin', 'PEL9652'),
('803037', '2023-03-09', '2023-03-09', '2023-03-10', '2023-03-15', 2, 'xxxxx', 'อนุมัติ', 'admin', 'PEL9652'),
('931746', '2023-02-26', '2023-02-26', '2023-02-26', '2023-03-17', 2, 'xxxxx', 'อนุมัติ', 'admin', 'PEL9652'),
('940065', '2023-02-24', '2023-02-24', '2023-02-25', '0000-00-00', 1, 'xxxxx', '', '7777777777777', 'PEL2397');

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
(16, '654654', 'POS1254', 45),
(19, 'PEL9652', 'POS2991', 15),
(20, 'PEL8317', 'POS1254', 7),
(22, '654654', 'POS6400', 4),
(23, 'PEL8317', 'POS6400', 50),
(24, 'PEL9652', 'POS2991', 15),
(25, 'PEL9652', 'POS2991', 15),
(26, 'PEL8317', 'POS2991', 4),
(27, '654654', 'POS2991', 10),
(32, 'PEL2397', 'POS6400', 1);

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `Pos_id` varchar(13) NOT NULL,
  `Pos_name` varchar(50) NOT NULL,
  `user_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`Pos_id`, `Pos_name`, `user_group`) VALUES
('POS1254', 'หัวหน้าฝ่ายพนักงาน HR', 1),
('POS1411', 'พนักงานบัญชี', 1),
('POS2901', 'ผู้บริหาร', 3),
('POS2991', 'พนักงานทั่วไป', 2);

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
(4, '1409901673972', '2022-12-25', '08:00:41', 'xxxxxxxxxxx', 1, '17:39:41', 'xxxxxxxxxxxx', 1),
(5, 'admin', '2023-02-25', '01:45:37', '16.4962994,102.5412873', 1, '04:18:23', '16.4303475,102.8627526', 3),
(6, 'admin', '2023-02-26', '11:31:44', '16.4339417,102.8505619', 1, '04:18:23', '16.4303475,102.8627526', 3),
(7, 'admin', '2023-03-03', '06:55:35', '16.4215002,102.8642613', 3, '04:18:23', '16.4303475,102.8627526', 3),
(8, 'admin', '2023-03-08', '09:41:24', '16.4215116,102.8642609', 1, '04:18:23', '16.4303475,102.8627526', 3),
(9, 'admin', '2023-03-07', '09:44:29', '13.7658368,100.564992', 1, '04:18:23', '16.4303475,102.8627526', 3),
(10, 'admin', '2023-03-09', '09:48:05', '16.4215137,102.8642627', 1, '04:18:23', '16.4303475,102.8627526', 3),
(11, 'admin', '2023-03-15', '04:17:46', '16.4303475,102.8627526', 3, '04:18:23', '16.4303475,102.8627526', 3);

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
('654654', 'ลาป่วย', 'ลาได้ไม่เกิน เวลาที่กำหนด'),
('PEL2397', 'ลาคลอด', 'ลาได้ไม่เกิน เวลาที่กำหนด'),
('PEL8317', 'ลาพักร้อน', 'ลาได้ไม่เกิน เวลาที่กำหนด'),
('PEL9652', 'ลากิจ', 'ลาได้ไม่เกิน เวลาที่กำหนด');

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
  MODIFY `Type_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `Ttb_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
