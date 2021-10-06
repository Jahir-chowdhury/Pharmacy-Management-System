-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 03, 2019 at 04:44 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00'),
(2, 'demo', '5f4dcc3b5aa765d61d8327deb882cf99', '2019-05-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
CREATE TABLE IF NOT EXISTS `manager` (
  `manager_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`) VALUES
(3, 'Mithun', 'Mallik', 'manager/1', 'Mohammadpur,Dhaka', '22222222222', 'mithun@mail.com', 'mithun', 'db413d6fbb1d9d0ced3e178e8adbcd97'),
(5, 'Mintu1', 'Mohanto1', 'manager/2', 'Mohammadpur', '22222222222', 'mintu@mail.com', 'mintu', '5f4dcc3b5aa765d61d8327deb882cf99'),
(7, 'Demo', 'Manager', 'DM', 'Dhaka', '1111', 'dm@dm.com', 'demo', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` int(50) NOT NULL AUTO_INCREMENT,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_generic` varchar(200) NOT NULL,
  `medicine_type` varchar(50) NOT NULL,
  `medicine_company` varchar(255) NOT NULL,
  `medicine_quantity` int(10) NOT NULL,
  `medicine_price` float NOT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=MyISAM AUTO_INCREMENT=453 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_generic`, `medicine_type`, `medicine_company`, `medicine_quantity`, `medicine_price`) VALUES
(3, 'Demo2', 'Demo2', 'Demo2', 'Demo2', 151, 12.5),
(450, 'demo3', 'demo3', 'demo3', 'demo3', 4544, 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
CREATE TABLE IF NOT EXISTS `pharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`pharmacist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Mintu', 'Mahanta', 'pharmacist/1', 'Mohammadpur,Dhaka', '333333333333', 'mintu@mail.com', 'mintu', '5151d92e23889564623a29b431f66e24'),
(2, 'Demo', 'Pharmacist', 'DP', 'Dhaka', '111', 'dp@dp.com', 'demo', '5f4dcc3b5aa765d61d8327deb882cf99'),
(6, 'AAA', 'AAA', 'AA', 'aaa', '1111', 'a@hmail.com', 'aaaa', '74b87337454200d4d33f80c4663dc5e5'),
(7, 'A', 'AA', 'aaa', 'aa', '111', 'a@gmail.com', 'aasasas', '2f3e9eccc22ee583cf7bad86c751d865');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(10) NOT NULL AUTO_INCREMENT,
  `report_total_amount` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `report_total_amount`, `date`) VALUES
(1, 262.5, '2017-06-01 15:14:49'),
(2, 212.5, '2017-06-01 15:16:49'),
(3, 1037.5, '2017-06-02 11:56:18'),
(4, 325, '2017-06-02 11:57:20'),
(5, 12.5, '2017-06-02 11:58:11'),
(6, 1600, '2017-06-02 11:58:26'),
(7, 1025, '2017-06-02 14:04:57'),
(8, 37.5, '2019-05-03 22:31:22'),
(9, 25, '2019-05-03 22:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

DROP TABLE IF EXISTS `salesman`;
CREATE TABLE IF NOT EXISTS `salesman` (
  `salesman_id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`salesman_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`salesman_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Humayun1', 'Ahmed', 'salesman/1', 'Mohammadpur,Dhaka', '333333333333', 'humayun@mail.com', 'humayun', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Demo', 'Salesman', 'DS', 'Dhaka', '1111', 'ds@ds.com', 'demo', '5f4dcc3b5aa765d61d8327deb882cf99'),
(4, 'AA', 'AAA', 'aaa', 'aaaa', '455445', 'asas@gmail.com', 'wewewew', '1365ffade9f5af7deaa2856389c966f4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
