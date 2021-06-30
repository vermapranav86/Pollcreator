-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 20, 2021 at 11:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`uname`, `pass`) VALUES
('pollcreator', 'pollcreator123');

-- --------------------------------------------------------

--
-- Table structure for table `participate`
--

CREATE TABLE `participate` (
  `serial_no` int(11) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participate`
--

INSERT INTO `participate` (`serial_no`, `pid`) VALUES
(10, 0),
(10, 0),
(10, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `pid` int(11) NOT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `ques` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`pid`, `serial_no`, `ques`) VALUES
(0, 10, 'best actor?'),
(1, 10, 'best singer ?');

-- --------------------------------------------------------

--
-- Table structure for table `pvparticipate`
--

CREATE TABLE `pvparticipate` (
  `serial_no` int(11) DEFAULT NULL,
  `pvid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pvparticipate`
--

INSERT INTO `pvparticipate` (`serial_no`, `pvid`) VALUES
(10, 0),
(13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pvpoll`
--

CREATE TABLE `pvpoll` (
  `pvid` int(10) NOT NULL,
  `serial_no` int(11) DEFAULT NULL,
  `ques` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pvpoll`
--

INSERT INTO `pvpoll` (`pvid`, `serial_no`, `ques`) VALUES
(0, 10, 'Best Sport ?'),
(1, 15, 'Best Dish ?');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `serial_no` int(10) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Time_stamp` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `ethadd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`serial_no`, `first_name`, `last_name`, `email`, `password`, `Time_stamp`, `ethadd`) VALUES
(1, 'Pratik', '', '', 'ca6c050375af8814237310a226f2dce065403d9d', '2021-03-01 09:36:52.592588', '0x599D08Cb688E664387c0FE6467d496F0A8A88A8c'),
(10, 'Pranav', 'Verma', 'pranav@gmail.com', '06ede35dc948af7fd8e2bffb4c18aa8a485586f0', '2021-03-01 14:16:01.305797', '0x90a437f29F65c202e6f8e3a22e0bc2a71b8D6e9f'),
(13, 'Nitin', 'Pandey', 'nitin123@gmail.com', '59c1f3f7e163e6a85e80c77df0d20cd856436457', '2021-03-18 13:50:53.813273', '0xB3dC83F16A401a098815739EA2a04df8198ce212'),
(14, 'Vaishnavi', 'Verma', 'vaishnavi123@gmail.com', '13bd21fef04e9ccee8c153a80f5b320f14838e71', '2021-04-08 19:33:54.655472', NULL),
(15, 'Yogesh', 'Sharma', 'yogesh123@gmail.com', '933a7547bcd7f018892d4fd9164f42d180fdd49b', '2021-04-20 14:20:51.365882', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `participate`
--
ALTER TABLE `participate`
  ADD KEY `serial_no` (`serial_no`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `serial_no` (`serial_no`);

--
-- Indexes for table `pvparticipate`
--
ALTER TABLE `pvparticipate`
  ADD KEY `serial_no` (`serial_no`),
  ADD KEY `pvid` (`pvid`);

--
-- Indexes for table `pvpoll`
--
ALTER TABLE `pvpoll`
  ADD PRIMARY KEY (`pvid`),
  ADD KEY `serial_no` (`serial_no`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`serial_no`),
  ADD UNIQUE KEY `ethadd` (`ethadd`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `serial_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `participate`
--
ALTER TABLE `participate`
  ADD CONSTRAINT `participate_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `user_data` (`serial_no`),
  ADD CONSTRAINT `participate_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `poll` (`pid`);

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `poll_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `user_data` (`serial_no`);

--
-- Constraints for table `pvparticipate`
--
ALTER TABLE `pvparticipate`
  ADD CONSTRAINT `pvparticipate_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `user_data` (`serial_no`),
  ADD CONSTRAINT `pvparticipate_ibfk_2` FOREIGN KEY (`pvid`) REFERENCES `pvpoll` (`pvid`);

--
-- Constraints for table `pvpoll`
--
ALTER TABLE `pvpoll`
  ADD CONSTRAINT `pvpoll_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `user_data` (`serial_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
