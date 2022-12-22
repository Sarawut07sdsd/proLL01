-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 07:28 PM
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
('DEP1359', 'บัญชี');

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
('admin', 'test', '0877542185', 'ooooo', 'DEP1359', 'POS1254', '1234');

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
('POS1254', 'ผู้บริหาร'),
('POS2991', 'พนักงานทั่วไป'),
('POS6400', 'หัวหน้าพนักงาน HR');

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
  MODIFY `Type_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
