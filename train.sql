-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 11:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(1) NOT NULL,
  `start` varchar(100) NOT NULL,
  `stop` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `start`, `stop`) VALUES
(1, 'kollam', 'kannur');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `date` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `first_fee` float NOT NULL,
  `second_fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `time`, `first_fee`, `second_fee`) VALUES
(3, '2022-10-18', '01:11', 100, 200),
(4, '2022-10-17', '03:17', 123, 134),
(5, '2022-10-17', '03:17', 123, 134);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `log_id` int(11) NOT NULL,
  `reg_id` int(11) NOT NULL,
  `log_emailid` varchar(20) NOT NULL,
  `log_pass` varchar(300) NOT NULL,
  `log_status` int(1) NOT NULL,
  `log_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`log_id`, `reg_id`, `log_emailid`, `log_pass`, `log_status`, `log_type`) VALUES
(14, 16, 'jomolrk@gmail.com', '123', 1, 'user'),
(10001, 10000, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin'),
(10002, 10001, 'rosna@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'user'),
(10003, 10002, 'ajith@gmail.com', '9996535e07258a7bbfd8b132435c5962', 1, 'user'),
(10004, 10003, 'appu12@gmail.com', '76d1574c42e995d9203a459c8f579f4c', 1, 'user'),
(10005, 10004, 'arathy@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'user'),
(10009, 10008, 'anu2000@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'user'),
(10010, 10009, 'irin@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `reg_id` int(11) NOT NULL,
  `reg_name` varchar(100) NOT NULL,
  `reg_phone` varchar(15) NOT NULL,
  `reg_gender` varchar(20) NOT NULL,
  `reg_adhar` varchar(20) NOT NULL,
  `reg_img` varchar(500) NOT NULL,
  `reg_dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`reg_id`, `reg_name`, `reg_phone`, `reg_gender`, `reg_adhar`, `reg_img`, `reg_dob`) VALUES
(16, 'Jomol RK', '8527410963', 'female', '8520-1239-2345-9876', 'customer_image', '2022-09-01'),
(17, 'anusree', '9087654321', 'female', '1345-9876-9876-3453', '', '0000-00-00'),
(10000, 'Admin', '9048936870', 'Female', '6542-8965-7458-7654', 'Admin Image', '2000-02-16'),
(10001, 'rosna', '8976543213', 'female', '3245-3456-1234-7654', 'customer_image', '2022-08-31'),
(10002, 'ajith', '6789546279', 'male', '8757-1234-2334-5674', 'customer_image', '2022-08-28'),
(10003, 'Appu', '7418529630', 'male', '0000-0000-0000-0000', 'customer_image', '2022-10-10'),
(10004, 'arathy123', '8527410965', 'female', '1234-1234-1234-1234', 'customer_image', '2022-10-09'),
(10008, 'anu', '8765432567', 'female', '9067-8908-6789-7654', '', '1999-06-22'),
(10009, 'irin', '9076456789', 'female', '1234-1234-1534-1234', '', '2022-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `first_seat` int(11) NOT NULL,
  `second_seat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`, `first_seat`, `second_seat`) VALUES
(6, 'indian express', 120, 50),
(7, 'Rajagiri Express', 150, 130);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `reg_id` (`reg_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10010;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `tbl_register` (`reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
