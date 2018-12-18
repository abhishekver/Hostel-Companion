-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2014 at 04:55 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hostelmanagement`
--
CREATE DATABASE IF NOT EXISTS `hostelmanagement` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hostelmanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE IF NOT EXISTS `billing` (
  `billid` int(10) NOT NULL AUTO_INCREMENT,
  `reg_id` int(10) NOT NULL,
  `bill_type` varchar(20) NOT NULL,
  `paid_amt` double(10,2) NOT NULL,
  `paid_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`billid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billid`, `reg_id`, `bill_type`, `paid_amt`, `paid_date`, `status`) VALUES
(1, 5, 'Cash', 5000.00, '2014-03-20', 'Enabled'),
(2, 4, 'Cash', 2000.00, '2014-03-20', 'Enabled'),
(3, 6, 'Cash', 4000.00, '2014-03-21', 'Enabled'),
(4, 10, 'Cash', 6000.00, '2014-03-07', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE IF NOT EXISTS `blocks` (
  `block_id` int(10) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(25) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`block_id`, `block_name`, `gender`, `description`, `status`) VALUES
(4, 'ABC', 'Male', 'TEST BLOCK', 'Enabled'),
(5, 'XYZ', 'Male', 'test ', 'Enabled'),
(6, 'Marian', 'Male', 'test ', 'Enabled'),
(7, 'Gold blocks', 'Male', 'test ', 'Enabled'),
(8, 'Gold Bells', 'Female', 'TEST BLOCK', 'Enabled'),
(9, 'Architect', 'Male', 'TEST BLOCK', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `block_allotment`
--

CREATE TABLE IF NOT EXISTS `block_allotment` (
  `allotment_id` int(10) NOT NULL AUTO_INCREMENT,
  `block_id` int(10) NOT NULL,
  `course_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`allotment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `block_allotment`
--

INSERT INTO `block_allotment` (`allotment_id`, `block_id`, `course_id`, `status`) VALUES
(57, 9, 4, 'Enabled'),
(58, 9, 1, 'Enabled'),
(59, 8, 1, 'Enabled'),
(60, 9, 5, 'Enabled'),
(61, 5, 7, 'Enabled'),
(62, 8, 8, 'Enabled'),
(63, 4, 8, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(20) NOT NULL,
  `no_of_year` int(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `no_of_year`, `status`) VALUES
(1, 'bca', 2013, 'Enabled'),
(4, 'puc', 3, 'Enabled'),
(5, 'mca', 3, 'Enabled'),
(7, 'ba', 3, 'Enabled'),
(8, 'bcom', 3, 'Enabled'),
(9, 'bbm', 3, 'Enabled'),
(11, 'bsc', 2, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(10) NOT NULL AUTO_INCREMENT,
  `block_id` int(10) NOT NULL,
  `login_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `emp_type` varchar(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `designation` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `salary` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `block_id`, `login_id`, `password`, `emp_type`, `emp_name`, `gender`, `dob`, `doj`, `designation`, `address`, `salary`, `status`) VALUES
(1, 5, 'admin', 'admin', 'Administrator', 'Rajesh', 'Male', '1986-01-15', '2014-01-01', 'Super Administrator', '3rd cross, Mangalore', 50000.00, 'Enabled'),
(3, 7, 'emp', 'emp', 'Employee', 'Peter king', 'Male', '2014-02-20', '2014-02-28', 'Warden', 'Mangalore', 50000.00, 'Enabled'),
(4, 8, 'geethanjali', 'hakki', 'Warden', 'ghee', 'Female', '2014-03-12', '2014-03-01', '', 'utiuthiyvytrdttg', 0.00, 'Enabled'),
(5, 6, 'efhjgf', '111111111', 'Select', 'dfgdfg', 'Male', '1879-03-19', '0000-00-00', '', '', 0.00, 'Select'),
(6, 9, 'aaa', '11111', 'Select', 'Peter hudson', 'Male', '2014-03-12', '0000-00-00', '', '', 0.00, 'Select'),
(7, 4, 'asd', '11', 'Warden', 'gvsd', 'Male', '1986-03-13', '2014-03-12', '', 'test', 0.00, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE IF NOT EXISTS `fees` (
  `fee_id` int(10) NOT NULL AUTO_INCREMENT,
  `reg_id` int(10) NOT NULL,
  `fee_str_id` int(10) NOT NULL,
  `total_fees` double(10,2) NOT NULL,
  `invoice_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`fee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`fee_id`, `reg_id`, `fee_str_id`, `total_fees`, `invoice_date`, `status`) VALUES
(1, 5, 12, 100.00, '2014-01-02', 'Enabled'),
(2, 4, 12, 100.00, '2014-01-02', 'Enabled'),
(7, 6, 1, 3000.00, '2014-03-02', 'Enabled'),
(8, 7, 1, 3000.00, '2014-03-06', 'Enabled'),
(9, 8, 1, 3000.00, '2014-03-06', 'Enabled'),
(10, 9, 1, 3000.00, '2014-03-06', 'Enabled'),
(11, 10, 1, 3000.00, '2014-03-07', 'Enabled'),
(12, 11, 3, 3000.00, '2014-03-07', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `fees_structure`
--

CREATE TABLE IF NOT EXISTS `fees_structure` (
  `fee_str_id` int(10) NOT NULL AUTO_INCREMENT,
  `course_id` int(10) NOT NULL,
  `fee_type` varchar(25) NOT NULL,
  `cost` float(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`fee_str_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fees_structure`
--

INSERT INTO `fees_structure` (`fee_str_id`, `course_id`, `fee_type`, `cost`, `status`) VALUES
(1, 1, 'Room rent', 3000.00, 'Enabled'),
(2, 1, 'Mess bill', 5000.00, 'Enabled'),
(3, 7, 'Establishment Fee', 3000.00, 'Enabled'),
(4, 7, 'Mess bill', 5000.00, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `messcard`
--

CREATE TABLE IF NOT EXISTS `messcard` (
  `messcardid` int(10) NOT NULL AUTO_INCREMENT,
  `reg_id` int(10) NOT NULL,
  `messcard_type` varchar(15) NOT NULL,
  `start_date` date NOT NULL,
  `enddate` date NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`messcardid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `messcard`
--

INSERT INTO `messcard` (`messcardid`, `reg_id`, `messcard_type`, `start_date`, `enddate`, `status`) VALUES
(26, 6, 'Permenent', '2014-03-21', '2014-03-26', 'Enabled'),
(27, 10, 'Temporary', '2014-03-12', '2014-03-06', 'Enabled'),
(28, 10, 'Temporary', '2014-03-27', '2014-03-03', 'Enabled'),
(29, 10, 'Temporary', '2014-03-20', '2014-03-11', 'Enabled'),
(30, 10, 'Temporary', '2014-03-20', '2014-03-27', 'Enabled'),
(31, 10, 'Temporary', '2014-03-20', '2014-03-27', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `mess_bill`
--

CREATE TABLE IF NOT EXISTS `mess_bill` (
  `mess_bill_id` int(10) NOT NULL AUTO_INCREMENT,
  `reg_id` int(10) NOT NULL,
  `fee_str_id` int(10) NOT NULL,
  `date` date NOT NULL,
  `mess_bill` double(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`mess_bill_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `mess_bill`
--

INSERT INTO `mess_bill` (`mess_bill_id`, `reg_id`, `fee_str_id`, `date`, `mess_bill`, `status`) VALUES
(1, 4, 2, '2014-03-19', 5000.00, 'Enabled'),
(2, 5, 2, '2014-03-19', 5000.00, 'Enabled'),
(6, 6, 2, '2014-03-02', 5000.00, 'Enabled'),
(7, 7, 2, '2014-03-06', 5000.00, 'Enabled'),
(8, 8, 2, '2014-03-06', 5000.00, 'Enabled'),
(9, 9, 2, '2014-03-06', 5000.00, 'Enabled'),
(10, 10, 2, '2014-03-07', 5000.00, 'Enabled'),
(11, 11, 4, '2014-03-07', 5000.00, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(10) NOT NULL AUTO_INCREMENT,
  `stid` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `stud_type` varchar(25) NOT NULL COMMENT 'hosteler, day scholar',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `food_type` varchar(25) NOT NULL,
  `beverage_type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `stid`, `room_id`, `stud_type`, `start_date`, `end_date`, `food_type`, `beverage_type`, `status`) VALUES
(4, 3, 2, 'Hosteler', '2014-02-13', '2014-03-02', 'Vegeterian', 'Milk', 'Enabled'),
(5, 3, 30, 'Hosteler', '2014-03-13', '2014-03-13', 'Non-vegeterian', 'Milk', 'Enabled'),
(6, 6, 29, 'Hosteler', '2014-03-05', '2014-03-26', 'Vegeterian', 'Milk', 'Enabled'),
(7, 9, 12, 'Hosteler', '2014-03-06', '2014-03-28', 'Vegeterian', 'Milk', 'Enabled'),
(8, 4, 10, 'Hosteler', '2014-03-19', '2014-03-28', 'Vegeterian', 'Milk', 'Enabled'),
(9, 10, 10, 'Hosteler', '2014-02-26', '2014-04-03', 'Vegeterian', 'Tea', 'Enabled'),
(10, 11, 13, 'Hosteler', '2014-03-07', '2014-11-13', 'Vegeterian', 'Coffee', 'Enabled'),
(11, 12, 29, 'Hosteler', '2014-03-14', '2014-05-05', 'Vegeterian', 'Coffee', 'Enabled'),
(12, 13, 32, 'Hosteler', '2014-03-20', '2014-03-20', 'Vegeterian', 'Coffee', 'Enabled'),
(13, 0, 0, '', '2014-03-05', '2014-02-25', '', '', 'Enabled'),
(14, 0, 0, '', '2014-03-21', '2014-03-06', '', '', 'Enabled'),
(15, 0, 0, '', '0000-00-00', '0000-00-00', '', '', 'Enabled'),
(16, 0, 0, '', '2014-03-28', '2014-03-06', '', '', 'Enabled'),
(17, 0, 0, '', '2014-03-27', '2014-03-05', '', '', 'Enabled'),
(18, 0, 0, '', '2014-03-27', '2014-03-05', '', '', 'Enabled'),
(19, 0, 0, '', '2014-03-28', '2014-03-10', '', '', 'Enabled'),
(20, 0, 0, '', '2014-03-05', '2014-03-19', '', '', 'Enabled'),
(21, 0, 0, '', '2014-03-27', '2014-03-28', '', '', 'Enabled'),
(22, 0, 0, '', '2014-03-27', '2014-03-06', '', '', 'Enabled'),
(23, 0, 0, '', '2014-03-28', '2014-03-05', '', '', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `block_id` int(10) NOT NULL,
  `room_no` int(10) NOT NULL,
  `no_of_beds` int(5) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE KEY `room_no` (`room_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `block_id`, `room_no`, `no_of_beds`, `description`, `status`) VALUES
(2, 9, 100, 3, 'in for', 'Enabled'),
(5, 5, 113, 3, 'test room', 'Enabled'),
(6, 4, 115, 3, 'sdcjgb', 'Enabled'),
(7, 4, 1111, 3, 'sdcjgb', 'Enabled'),
(8, 4, 1112, 1, 'sdcjgb', 'Enabled'),
(10, 9, 1114, 7, 'test room', 'Enabled'),
(11, 8, 1116, 2, 'sdcjgb', 'Enabled'),
(12, 9, 1115, 4, 'sdcjgb', 'Enabled'),
(13, 8, 1117, 5, 'sdcjgb', 'Enabled'),
(14, 8, 1118, 3, 'sdcjgb', 'Enabled'),
(15, 8, 1119, 2, 'sdcjgb', 'Enabled'),
(16, 8, 1152, 3, 'sdcjgb', 'Enabled'),
(17, 7, 121, 1, 'sdcjgb', 'Enabled'),
(18, 7, 122, 3, 'sdcjgb', 'Enabled'),
(19, 7, 1201, 2, 'sdcjgb', 'Enabled'),
(20, 7, 251, 3, 'sdcjgb', 'Enabled'),
(21, 7, 152, 5, 'sdcjgb', 'Enabled'),
(22, 7, 123, 5, 'sdcjgb', 'Enabled'),
(23, 7, 124, 3, 'sdcjgb', 'Enabled'),
(24, 6, 155, 2, 'sdcjgb', 'Enabled'),
(25, 6, 126, 3, 'sdcjgb', 'Enabled'),
(26, 6, 1245, 3, 'sdcjgb', 'Enabled'),
(27, 6, 4, 3, 'sdcjgb', 'Enabled'),
(28, 6, 128, 2, 'sdcjgb', 'Enabled'),
(29, 5, 1289, 4, 'sdcjgb', 'Enabled'),
(30, 5, 130, 3, 'sdcjgb', 'Enabled'),
(32, 4, 500, 1, 'this is standard room', 'Enabled'),
(33, 5, 111, 1, 'test room', 'Enabled'),
(34, 7, 125, 1, 'test', 'Enabled'),
(35, 5, 112, 1, 'test test test', 'Enabled'),
(36, 4, 501, 1, 'test room', 'Enabled'),
(40, 4, 502, 1, 'yrdy', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `stid` int(10) NOT NULL AUTO_INCREMENT,
  `courseid` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `parents_no` varchar(15) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`stid`),
  UNIQUE KEY `rollno` (`rollno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stid`, `courseid`, `name`, `rollno`, `dob`, `father_name`, `mother_name`, `gender`, `address`, `contact_no`, `parents_no`, `blood_group`, `status`) VALUES
(3, 1, 'raj', '232', '2014-01-09', 'ga', 'ew', 'Male', 'mangalore', '789456', '978784564123', 'ab', 'Enabled'),
(4, 1, 'raj', '12312', '2014-12-31', 'madhur', 'mali', 'Male', 'sk hourse', '3223423', '34543975', 'A+', 'Enabled'),
(5, 1, 'Peter king', '123466578', '1987-03-20', 'raj kiran', 'ms kiran', 'Male', 'mangalore', '9874563210', '8529637410', 'A+', 'Enabled'),
(6, 4, 'satya prasad', '444556', '1984-12-31', 'rajesh', 'preetam', 'Male', 'mangalore', '99887456321', '5896362145', 'A+', 'Enabled'),
(7, 1, 'joy marshall', '892199', '1991-12-31', 'hudshon', 'meli', 'Male', 'mangalore', '7896541230', '085241256', 'A+', 'Enabled'),
(8, 4, 'Chris john', '322423', '2014-12-31', 'joy', 'meli', 'Male', 'banalore', '7894756123', '564581452416', 'A+', 'Enabled'),
(9, 5, 'raj', '2342342', '2014-12-31', 'hudshon', 'meli', 'Male', 'mangalore', '74894561423', '9874561231', 'A+', 'Enabled'),
(10, 1, 'fffffffffff', '4444444444', '2014-03-04', 'hudshon', 'meli', 'Male', 'fgh', '4564', '456456', 'A+', 'Enabled'),
(11, 1, 'Anju', '457366', '1993-11-30', 'abc', 'xyz', 'Female', 'Mangalore', '7894561230', '82541236', 'A+', 'Enabled'),
(12, 7, 'mah', '23423', '2014-12-31', 'hudshons', 'dsfds', 'Male', 'sdf', '43234', '45654', 'A+', 'Enabled'),
(13, 8, 'ramesh', '646498798', '2005-12-31', 'rajesh', 'xyz', 'Male', 'mangalroe', '789456413', '9857654321', 'A+', 'Enabled'),
(14, 8, 'asdaklfjkaslj', '23432', '2014-12-31', 'hudshons', 'meli', 'Male', 'dkjslfjl', '9999999999', '8888888888', 'A+', 'Enabled'),
(15, 1, 'dfgfdg', '24234', '2014-03-12', 'hudshon', 'xyz', 'Male', 'dfgdfg', '7778889995', '4353556699', '', ''),
(17, 9, 'ugsdeyugdt', '454', '1950-02-02', 'tfghtgf', 'tfryr', 'Male', 'tyrtyt', '5455565656', '5644677777', 'O-', 'Enabled'),
(18, 4, 'vbsdfsdfs', '34543', '1994-03-14', 'gdfgfd', 'wrwer', 'Male', 'asdas', '9874563210', '9874568210', 'A+', 'Enabled'),
(19, 1, 'Peter hudson', '2342345', '1993-12-31', 'yg8uijkkm', 'hjujuyh', 'Male', 'vghu nt', '9878979452', '7896541323', 'O-', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE IF NOT EXISTS `visitor` (
  `visitorid` int(10) NOT NULL AUTO_INCREMENT,
  `stid` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `type` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `comments` text NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`visitorid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`visitorid`, `stid`, `name`, `type`, `username`, `password`, `contactno`, `comments`, `status`) VALUES
(4, 3, 'abc', 'Parents', 'visitor', '12345', '7894561', 'test', 'Enabled'),
(5, 3, 'abc', 'Parents', 'aaa', '111', '7894561230', 'test', 'Enabled'),
(7, 6, 'peter', 'Parents', 'peter', '123456', '9874563210', 'test visitor', 'Enabled'),
(9, 12, 'fghd', 'Parents', 'abcdtest', '45645645', 'ghfdgfd', '', 'Enabled');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
