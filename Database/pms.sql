-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2017 at 01:13 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `admin` (
  `admin_id` tinyint(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `manager_id` tinyint(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`manager_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`) VALUES
(3, 'Mithun', 'Mallik', 'manager/1', 'Mohammadpur,Dhaka', '22222222222', 'mithun@mail.com', 'mithun', 'db413d6fbb1d9d0ced3e178e8adbcd97'),
(5, 'Mintu', 'Mohanto', 'manager/2', 'Mohammadpur', '22222222222', 'mintu@mail.com', 'mintu', '5151d92e23889564623a29b431f66e24');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `medicine_id` int(50) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `medicine_generic` varchar(200) NOT NULL,
  `medicine_type` varchar(50) NOT NULL,
  `medicine_company` varchar(255) NOT NULL,
  `medicine_quantity` int(10) NOT NULL,
  `medicine_price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `medicine_name`, `medicine_generic`, `medicine_type`, `medicine_company`, `medicine_quantity`, `medicine_price`) VALUES
(1, 'Demo', 'Demo', 'Demo', 'Demo', 34, 200),
(3, 'Demo2', 'Demo2', 'Demo2', 'Demo2', 0, 12.5),
(450, 'demo3', 'demo3', 'demo3', 'demo3', 0, 12.5);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `pharmacist_id` tinyint(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`pharmacist_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Mintu', 'Mahanta', 'pharmacist/1', 'Mohammadpur,Dhaka', '333333333333', 'mintu@mail.com', 'mintu', '5151d92e23889564623a29b431f66e24');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(10) NOT NULL,
  `report_total_amount` float NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(7, 1025, '2017-06-02 14:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `salesman_id` tinyint(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `staff_id` varchar(20) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`salesman_id`, `first_name`, `last_name`, `staff_id`, `postal_address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'Humayun', 'Ahmed', 'salesman/1', 'Mohammadpur,Dhaka', '333333333333', 'humayun@mail.com', 'humayun', '83eac2cc009fc2b23a5536b6c8885d74');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`medicine_id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`salesman_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `medicine_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;
--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `pharmacist_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `salesman`
--
ALTER TABLE `salesman`
  MODIFY `salesman_id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
