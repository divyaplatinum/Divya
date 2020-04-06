-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2020 at 12:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_status` int(10) NOT NULL,
  `admin_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_status`, `admin_image`) VALUES
(1, 'divya', 'divya@gmail.com', '123456', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(10) NOT NULL,
  `emp_fname` varchar(50) NOT NULL,
  `emp_lname` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_password` varchar(50) NOT NULL,
  `emp_status` int(10) NOT NULL,
  `emp_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_fname`, `emp_lname`, `emp_email`, `emp_password`, `emp_status`, `emp_role`) VALUES
(1, 'Akul', 'K            ', 'akul@gmail.com', '123', 1, 'Staff'),
(2, 'Shubham   ', 'Jha   ', 'shubham@gmail.com', '1234', 1, 'Staff'),
(3, 'Ram', 'Verma', 'ram@gmail.com', '123', 1, 'Staff'),
(5, 'Riya', 'Wadhwa', 'riya@gmail.com', '123', 1, 'Staff'),
(10, 'Pooja  ', 'Laddha  ', 'pooja@gmail.com', 'pooja123', 1, 'Staff'),
(11, 'Priyanka', 'Sharma', 'priyanka@gmail.com', '123', 0, 'Staff'),
(16, 'Vivik', 'Karain', 'Vivik@gmail.com', '123456', 1, 'Project Manager'),
(17, 'Raja', 'K', 'Raja@gmail.com', '123456', 1, 'Project Manager');

-- --------------------------------------------------------

--
-- Table structure for table `projecttask`
--

CREATE TABLE `projecttask` (
  `taskid` int(11) NOT NULL,
  `taskname` varchar(300) NOT NULL,
  `taskdescription` varchar(300) NOT NULL,
  `taskstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projecttask`
--

INSERT INTO `projecttask` (`taskid`, `taskname`, `taskdescription`, `taskstatus`) VALUES
(7, 'Php DevelopmentProject', '<p>Test Data Codigniter Added here</p>', 0),
(8, 'Dot Net Project', '<p>Product Development</p>', 0),
(9, 'Yii frame work', '<p>System Session not work</p>', 1),
(10, 'Yii frame work', '<p>System Session not work</p>', 1),
(11, 'Ecommerce Project', '<p>Develop Ecommerce</p>', 0),
(12, 'Mango DataBase', '<p>Development DB</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `scheduletask`
--

CREATE TABLE `scheduletask` (
  `sid` int(11) NOT NULL,
  `projectid` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `empid` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `schstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduletask`
--

INSERT INTO `scheduletask` (`sid`, `projectid`, `level`, `empid`, `deadline`, `schstatus`) VALUES
(6, 7, 1, 1, '2020-04-08', 0),
(8, 8, 2, 10, '2020-04-17', 1),
(9, 11, 3, 16, '2020-04-15', 1),
(10, 12, 2, 5, '2020-04-16', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `projecttask`
--
ALTER TABLE `projecttask`
  ADD PRIMARY KEY (`taskid`);

--
-- Indexes for table `scheduletask`
--
ALTER TABLE `scheduletask`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projecttask`
--
ALTER TABLE `projecttask`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scheduletask`
--
ALTER TABLE `scheduletask`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
