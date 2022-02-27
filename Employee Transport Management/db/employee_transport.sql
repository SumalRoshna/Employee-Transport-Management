-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2022 at 11:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `et`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driv_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `adrs` varchar(50) DEFAULT NULL,
  `car` varchar(50) DEFAULT NULL,
  `capacity` varchar(25) DEFAULT NULL,
  `reg_num` varchar(50) DEFAULT NULL,
  `lice_num` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers`
--

insert  into `drivers`(`driv_id`,`name`,`email`,`contact`,`adrs`,`car`,`capacity`,`reg_num`,`lice_num`) values 
(1,'Joe','joe@gmail.com','9999999999','Joe\r\nAdrs','Swift ZXI+','4','kL-00 AA-0007','786876786786876876'),
(2,'Abi','abi@gmail.com','9898989898','Abi\r\nAdrs','POLO','4','kL-77 AA-7777','DOC-2-1002007');

-- --------------------------------------------------------

--
-- Table structure for table `driver_points`
--

CREATE TABLE `driver_points` (
  `dp_id` int(11) NOT NULL,
  `driv_id` int(11) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `rate` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver_points`
--

INSERT INTO `driver_points` (`dp_id`, `driv_id`, `pp_id`, `rate`) VALUES
(1, 2, 1, 200),
(2, 1, 2, 250),
(3, 1, 1, 175),
(5, 1, 0, 200),
(6, 2, 6, 225);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `empid` varchar(25) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `adrs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

insert  into `employees`(`emp_id`,`name`,`email`,`phone`,`empid`,`adrs`) values 
(1,'Arun','arun@gmail.com','9090909090','345','Arun\r\nAdrs'),
(2,'Aji','aji@gmail.com','9090909090','346','Aji\r\nAdrs'),
(3,'Jerry','jerry@mail.com','8989898989','325','jerry\r\nadrs');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fbid` int(11) NOT NULL,
  `eid` int(11) DEFAULT NULL,
  `did` int(11) DEFAULT NULL,
  `feedack` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fbid`, `eid`, `did`, `feedack`) VALUES
(4, 2, 1, 'hjvh');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_type` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `user_id`, `user_name`, `password`, `user_type`, `status`) VALUES
(1,1,'joe@gmail.com','joe','driver','1'),
(2,1,'arun@gmail.com','arun','customer','1'),
(3,0,'admin@gmail.com','admin','admin','1'),
(4,2,'aji@gmail.com','aji','customer','1'),
(5,2,'abi@gmail.com','abi','driver','1'),
(6,3,'jerry@mail.com','jerry','customer','0');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_points`
--

CREATE TABLE `pickup_points` (
  `pp_id` int(11) NOT NULL,
  `ppoints` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickup_points`
--

INSERT INTO `pickup_points` (`pp_id`, `ppoints`) VALUES
(1, 'Edappally'),
(2, 'Kaloor'),
(3, 'Pathadipalam'),
(6, 'Palarivattom');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_request`
--

CREATE TABLE `vehicle_request` (
  `vr_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pp_id` int(11) NOT NULL,
  `driv_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL,
  `start_date` date NOT NULL,
  `details` varchar(100) NOT NULL,
  `dp_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_request`
--

INSERT INTO `vehicle_request` (`vr_id`, `emp_id`, `pp_id`, `driv_id`, `time`, `start_date`, `details`, `dp_id`, `status`) VALUES
(1, 1, 2, 2, '23:30', '2022-01-19', 'nn', 3, 'Approved'),
(2, 3, 6, 2, '19:17', '2022-02-01', 'jk', 3, 'Rejected'),
(3, 3, 2, 2, '15:27', '2022-02-09', 'jj', 3, 'Rejected'),
(4, 1, 1, 2, '09:01', '2022-02-22', 'ghvfcfg', 3, 'Rejected'),
(5, 1, 1, 2, '09:17', '2022-02-27', 'hggg', 3, 'Rejected'),
(6, 1, 1, 2, '09:26', '2022-02-27', 'hjvug', 0, 'Requested'),
(7, 1, 1, 2, '09:28', '2022-02-27', 'lk', 0, 'Requested'),
(8, 1, 1, 1, '09:29', '2022-02-27', 'k', 0, 'Requested'),
(9, 1, 1, 2, '10:36', '2022-02-27', 'kjbj', 3, 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driv_id`);

--
-- Indexes for table `driver_points`
--
ALTER TABLE `driver_points`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fbid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD PRIMARY KEY (`pp_id`);

--
-- Indexes for table `vehicle_request`
--
ALTER TABLE `vehicle_request`
  ADD PRIMARY KEY (`vr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver_points`
--
ALTER TABLE `driver_points`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pickup_points`
--
ALTER TABLE `pickup_points`
  MODIFY `pp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle_request`
--
ALTER TABLE `vehicle_request`
  MODIFY `vr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
