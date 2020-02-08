-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 08:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitaoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'admin@mitaoe.ac.in', '12345'),
(2, 'ad@mitaoe.ac.in', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `totalChats` int(10) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `reciver` varchar(30) NOT NULL,
  `msg` varchar(80) NOT NULL,
  `sentat` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`totalChats`, `sender`, `reciver`, `msg`, `sentat`) VALUES
(51, 'ccsonkamble', 'admin', 'hi', '13:06'),
(52, 'ccsonkamble', 'ad', 'hi', '13:14'),
(53, 'admin', 'ccsonkamble', 'hello', '20:30'),
(54, 'admin', 'asgupta', 'hello', '16:13');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(4) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'Computer'),
(2, 'IT'),
(3, 'Mechanical'),
(4, 'Civil'),
(5, 'Entc'),
(6, 'ETX'),
(7, 'Chemical');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(4) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `name`) VALUES
(1, 'FY Semester-1 2019-2020'),
(2, 'FY Semester-2 2019-2020'),
(3, 'SY Semester-3 2019-2020'),
(4, 'SY Semester-4 2019-2020'),
(5, 'TY Semester-5 2019-2020'),
(6, 'TY Semester-6 2019-2020'),
(7, 'BE Semester-7 2019-2020'),
(8, 'BE Semester-8 2019-2020'),
(9, 'FY Semester-1 2019-2020 Backlog'),
(10, 'FY Semester-2 2019-2020 Backlog'),
(11, 'TY Semester-5 2019-2020 Backlog');

-- --------------------------------------------------------

--
-- Table structure for table `exam_allocation`
--

CREATE TABLE `exam_allocation` (
  `faculty_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `program` text NOT NULL,
  `dept_id` int(4) NOT NULL,
  `exam_id` text NOT NULL,
  `sub_id` text NOT NULL,
  `block_id` varchar(2) NOT NULL,
  `role` text NOT NULL,
  `exam_type` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_allocation`
--

INSERT INTO `exam_allocation` (`faculty_id`, `email`, `program`, `dept_id`, `exam_id`, `sub_id`, `block_id`, `role`, `exam_type`, `status`) VALUES
(3, 'cantbuttry@gmail.com', 'B.Tech', 1, '4', 'IT003', 'B4', 'External', 'Internal Assessment', '2'),
(4, 'ssshingh@mitaoe.ac.in', 'B.Tech', 2, '10', 'IT006', 'B2', 'Internal', 'Internal Assessment', '2'),
(5, 'sdsharme@mitaoe.ac.in', 'B.Tech', 4, '1', 'IT004', 'B2', 'Internal', 'External Assessment', '0'),
(6, 'sdsharme@mitaoe.ac.in', 'B.Tech', 2, '8', 'IT002', 'B2', 'Internal', 'External Assessment', '2'),
(7, 'sdsharme@mitaoe.ac.in', 'B.Tech', 6, '1', 'IT004', 'B4', 'Internal', 'External Assessment', '2'),
(8, 'sdsharme@mitaoe.ac.in', 'B.Tech', 4, '4', 'IT001', 'B2', 'Internal', 'External Assessment', '2'),
(9, 'ksoei@mitaoe.ac.in', 'B.Tech', 1, '3', 'IT004', 'B2', 'Internal', 'External Assessment', '0'),
(10, 'adsfas@mitaoe.ac.in', 'B.Tech', 6, '1', 'IT004', 'B1', 'Internal', 'External Assessment', '0'),
(11, 'lkwere@mitaoe.ac.in', 'B.Tech', 2, '11', 'IT003', 'B2', 'Internal', 'Internal Assessment', '1'),
(12, 'qiuwoos@mitaoe.ac.in', 'B.Tech', 5, '1', 'IT006', 'B2', 'Internal', 'Internal Assessment', '1'),
(13, 'ssshingh@mitaoe.ac.in', 'B.Tech', 2, '8', 'IT002', 'B2', 'Internal', 'Internal Assessment', '1'),
(14, 'asferq@mitaoe.ac.in', 'B.Tech', 4, '2', 'IT006', 'B5', 'Internal', 'Internal Assessment', '2'),
(15, 'ssshingh@mitaoe.ac.in', 'B.Tech', 2, '9', 'IT006', 'B2', 'Internal', 'Internal Assessment', '2'),
(16, 'uiwooe@mitaoe.ac.in', 'B.Tech', 5, '1', 'IT002', 'B4', 'Internal', 'Internal Assessment', '1'),
(67, 'ccsonkamble@mitaoe.ac.in', 'B.E.', 2, '2', 'IT002', 'B2', 'External', 'External Assessment', '0'),
(68, 'ccsonkamble@mitaoe.ac.in', 'B.E.', 2, '2', 'IT002', 'B2', 'External', 'External Assessment', '0'),
(69, 'ccsonkamble@mitaoe.ac.in', 'M.Tech', 3, '3', 'IT003', 'B3', 'External', 'External Assessment', '0'),
(70, 'ccsonkamble@mitaoe.ac.in', 'M.Tech', 3, '3', 'IT003', 'B3', 'External', 'External Assessment', '0'),
(71, 'skmahajan@mitaoe.ac.in', 'B.E.', 2, '2', 'IT002', 'B2', 'External', 'External Assessment', '0'),
(72, 'skmahajan@mitaoe.ac.in', 'M.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(73, 'skmahajan@mitaoe.ac.in', 'M.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(74, 'ccsonkamble@mitaoe.ac.in', 'B.E.', 2, '2', 'IT002', 'B2', 'External', 'External Assessment', '0'),
(75, 'skmahajan@mitaoe.ac.in', 'B.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(76, 'skmahajan@mitaoe.ac.in', 'B.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(77, 'skmahajan@mitaoe.ac.in', 'B.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(78, 'skmahajan@mitaoe.ac.in', 'B.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(79, 'skmahajan@mitaoe.ac.in', 'M.Tech', 3, '3', 'IT003', 'B3', 'Internal', 'Internal Assessment', '0'),
(80, 'ksoei@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(81, 'ssshingh@mitaoe.ac.in', 'B.E.', 2, '2', 'IT002', 'B2', 'External', 'External Assessment', '0'),
(82, 'uiwooe@mitaoe.ac.in', 'B.E.', 4, '4', 'IT004', 'B4', 'External', 'External Assessment', '1'),
(83, 'uiwooe@mitaoe.ac.in', 'M.Tech', 7, '1', 'IT005', 'B4', 'Internal', 'External Assessment', '1'),
(84, 'ksoei@mitaoe.ac.in', 'B.Tech', 1, '9', 'IT004', 'B4', 'External', 'External Assessment', '0'),
(85, 'sdsharme@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(86, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(87, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(88, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(89, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(90, 'ksoei@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(91, 'sdsharme@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(92, 'adsfas@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(93, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '2'),
(94, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(95, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(96, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(97, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(98, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(99, 'qiuwoos@mitaoe.ac.in', 'B.Tech', 2, '9', 'IT001', 'B3', 'External', 'External Assessment', '0'),
(100, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '2', 'IT002', 'B2', 'Internal', 'Internal Assessment', '1'),
(101, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(102, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(103, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(104, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(105, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '3', 'IT001', 'B2', 'External', 'External Assessment', '1'),
(106, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B2', 'Internal', 'Internal Assessment', '0'),
(107, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '2', 'IT002', 'B2', 'External', 'External Assessment', '1'),
(108, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(109, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 2, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(110, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(111, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(112, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(113, 'ccsonkamble@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(114, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(115, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(116, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(117, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(118, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(119, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(120, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(121, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(122, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(123, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(124, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(125, 'ssshingh@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(126, 'cantbuttry@gmail.com', 'B.Tech', 2, '2', 'IT004', 'B4', 'Internal', 'Internal Assessment', '1'),
(127, 'cantbuttry@gmail.com', 'B.Tech', 1, '3', 'IT003', 'B2', 'External', 'External Assessment', '0'),
(128, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(129, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(130, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(131, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(132, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(133, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(134, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(135, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(136, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(137, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '0'),
(138, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '4', 'IT003', 'B4', 'Internal', 'Internal Assessment', '1'),
(139, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(140, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(141, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(142, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '4', 'IT003', 'B4', 'Internal', 'Internal Assessment', '1'),
(143, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '4', 'IT003', 'B4', 'Internal', 'Internal Assessment', '1'),
(144, 'cantbuttry@gmail.com', 'B.Tech', 1, '4', 'IT003', 'B4', 'Internal', 'Internal Assessment', '1'),
(145, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(146, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '4', 'IT003', 'B4', 'Internal', 'Internal Assessment', '1'),
(147, 'cantbuttry@gmail.com', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(148, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(149, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '1', 'IT001', 'B1', 'Internal', 'Internal Assessment', '1'),
(150, 'asgupta@mitaoe.ac.in', 'B.Tech', 1, '2', 'IT003', 'B2', 'Internal', 'Internal Assessment', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fac_add`
--

CREATE TABLE `fac_add` (
  `id` int(10) NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_add`
--

INSERT INTO `fac_add` (`id`, `email`, `pass`) VALUES
(1, 'asgupta@mitaoe.ac.in', '12345'),
(180, 'asgupta@mitaoe.ac.in', 'ZDTEN'),
(181, 'cantbuttry@gmail.com', 'Pph1o'),
(182, 'asgupta@mitaoe.ac.in', 'wiWD5'),
(189, 'cantbuttry@gmail.com', 'QRIk7'),
(190, 'asgupta@mitaoe.ac.in', 'a83Tm'),
(191, 'asgupta@mitaoe.ac.in', '3njGT'),
(192, 'asgupta@mitaoe.ac.in', 'YRkQT');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `prn` int(10) NOT NULL,
  `seat_no` varchar(7) NOT NULL,
  `program` varchar(6) NOT NULL,
  `year` text NOT NULL,
  `dept_id` int(4) NOT NULL,
  `exam_id` int(4) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `semester` int(1) NOT NULL,
  `marks` int(3) NOT NULL,
  `block` varchar(2) DEFAULT NULL,
  `id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`prn`, `seat_no`, `program`, `year`, `dept_id`, `exam_id`, `subject_id`, `semester`, `marks`, `block`, `id`) VALUES
(120160001, 'T188001', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 67, 'B4', 1),
(120160002, 'T188002', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 21, 'B4', 2),
(120160003, 'T188003', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 32, 'B4', 3),
(120160004, 'T188004', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 45, 'B4', 4),
(120160005, 'T188005', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 66, 'B4', 5),
(120160006, 'T188006', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 75, 'B4', 6),
(120160007, 'T188007', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 66, 'B4', 7),
(120160008, 'T188008', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 15, 'B4', 8),
(120160009, 'T188009', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 64, 'B4', 9),
(120160010, 'T188010', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 85, 'B4', 10),
(120160011, 'T188011', 'B.Tech', '2019-2020', 1, 4, 'IT003', 4, 22, 'B4', 11);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` varchar(6) NOT NULL,
  `name` text NOT NULL,
  `program` text NOT NULL,
  `sem` int(4) NOT NULL,
  `dept_id` int(4) NOT NULL,
  `credit` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `name`, `program`, `sem`, `dept_id`, `credit`) VALUES
('IT001', 'MAD', 'TY', 6, 3, 4),
('IT002', 'CSS', 'TY', 6, 3, 4),
('IT003', 'WT', 'SY', 4, 3, 4),
('IT004', 'DSA', 'SY', 4, 3, 4),
('IT005', 'DBS', 'TY', 5, 3, 4),
('IT006', 'CN', 'SY', 3, 3, 4),
('IT007', 'M3', 'TY', 3, 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`totalChats`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_allocation`
--
ALTER TABLE `exam_allocation`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `fac_add`
--
ALTER TABLE `fac_add`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `totalChats` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_allocation`
--
ALTER TABLE `exam_allocation`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `fac_add`
--
ALTER TABLE `fac_add`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
