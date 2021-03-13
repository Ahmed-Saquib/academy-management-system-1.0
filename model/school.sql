-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2020 at 07:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(100) NOT NULL,
  `studentid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `studentpass` varchar(50) NOT NULL,
  `phonenum` varchar(100) NOT NULL,
  `usertype` bit(1) NOT NULL DEFAULT b'1' COMMENT '1=user 2=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `studentid`, `username`, `studentpass`, `phonenum`, `usertype`) VALUES
(87, '123', 'abc', 'abc', '123', b'1'),
(89, '111', 'aaa', 'aaa', '111', b'1'),
(90, '000', 'admin', 'admin', '', b'0'),
(91, '222', 'bbb', 'bbb', '222', b'1'),
(92, '333', 'ccc', 'ccc', '333', b'1'),
(93, '444', 'ddd', 'ddd', '444', b'1'),
(94, '555', 'eee', 'eee', '555', b'1'),
(95, '666', 'fff', 'fff', '666', b'1'),
(96, '777', 'ggg', 'ggg', '777', b'1'),
(97, '888', 'hhh', 'hhh', '888', b'1'),
(98, '999', 'iii', 'iii', '999', b'1'),
(99, '100', 'jjj', 'jjj', '100', b'1'),
(100, '200', 'kkk', 'kkk', '200', b'1'),
(101, '300', 'lll', 'lll', '300', b'1'),
(102, '400', 'mmm', 'mmm', '400', b'1'),
(103, '500', 'nnn', 'nnn', '500', b'1'),
(104, '600', 'ooo', 'ooo', '600', b'1'),
(105, '700', 'ppp', 'ppp', '700', b'1'),
(106, '800', 'qqq', 'qqq', '800', b'1'),
(107, '900', 'rrr', 'rrr', '900', b'1'),
(108, '1000', 'sss', 'sss', '1000', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(100) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `credit` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `gpoint` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `studentid`, `username`, `semester`, `credit`, `grade`, `gpoint`) VALUES
(1, '111', 'aaa', 'spring-19', '3', 'A', '4'),
(16, '500', 'nnn', 'spring-19', '4', 'a', '4'),
(17, '555', 'eee', 'spring-19', '3', 'A', '4'),
(18, '555', 'eee', 'spring-19', '3', 'A', '4'),
(19, '200', 'kkk', 'spring-19', '4', 'A', '3.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
