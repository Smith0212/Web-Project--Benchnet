-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 12:23 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehsas_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` varchar(25) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_password`, `admin_name`) VALUES
('admin_main', 'admin@123', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exam_table`
--

CREATE TABLE `exam_table` (
  `exam_id` varchar(25) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam_table`
--

INSERT INTO `exam_table` (`exam_id`, `exam_date`, `exam_time`, `subject_name`, `subject_code`) VALUES
('test_mid_2021', '2020-11-11', '12:30:00', 'Python', 1321);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_table`
--

CREATE TABLE `faculty_table` (
  `faculty_id` varchar(25) NOT NULL,
  `faculty_name` varchar(40) NOT NULL,
  `faculty_password` varchar(40) NOT NULL,
  `subject_name` varchar(30) NOT NULL,
  `mobile_no` bigint(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_table`
--

INSERT INTO `faculty_table` (`faculty_id`, `faculty_name`, `faculty_password`, `subject_name`, `mobile_no`, `email`) VALUES
('gpg_admin_05', 'admin', 'admin05', 'none', 9998887775, 'admin05@gmail.com'),
('gpg_admin_06', 'admin_2', 'admin06', 'none', 9998887776, 'admin06@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `removed_allocation`
--

CREATE TABLE `removed_allocation` (
  `faculty_id` varchar(25) NOT NULL,
  `exam_id` varchar(25) NOT NULL,
  `enrollment_no` bigint(12) NOT NULL,
  `class_no` varchar(10) NOT NULL,
  `bench_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `removed_allocation`
--

INSERT INTO `removed_allocation` (`faculty_id`, `exam_id`, `enrollment_no`, `class_no`, `bench_no`) VALUES
('gpg_admin_05', 'ajava_gtu_win_2021', 186230307043, '555B', 55);

-- --------------------------------------------------------

--
-- Table structure for table `removed_exam`
--

CREATE TABLE `removed_exam` (
  `faculty_id` varchar(25) NOT NULL,
  `exam_id` varchar(25) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time` time NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_code` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `removed_exam`
--

INSERT INTO `removed_exam` (`faculty_id`, `exam_id`, `exam_date`, `exam_time`, `subject_name`, `subject_code`) VALUES
('gpg_admin_05', 'ajava_gtu_win_2021', '2021-04-15', '09:00:00', 'Advance Java', 3360701);

-- --------------------------------------------------------

--
-- Table structure for table `removed_students`
--

CREATE TABLE `removed_students` (
  `enrollment_no` bigint(12) NOT NULL,
  `faculty_id` varchar(25) NOT NULL,
  `reason` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `removed_students`
--

INSERT INTO `removed_students` (`enrollment_no`, `faculty_id`, `reason`) VALUES
(186230307001, 'gpg_admin_05', 'Testing Removing Students'),
(186230307002, 'gpg_admin_05', 'Testing Removing Students');

-- --------------------------------------------------------

--
-- Table structure for table `seat_allocation`
--

CREATE TABLE `seat_allocation` (
  `exam_id` varchar(25) NOT NULL,
  `enrollment_no` bigint(12) NOT NULL,
  `class_no` varchar(10) NOT NULL,
  `bench_no` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat_allocation`
--

INSERT INTO `seat_allocation` (`exam_id`, `enrollment_no`, `class_no`, `bench_no`) VALUES
('test_mid_2021', 186230307043, '132B', 5),
('test_mid_2021', 186230307029, '100B', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `enrollment_no` bigint(12) NOT NULL,
  `student_name` varchar(40) NOT NULL,
  `student_password` varchar(25) NOT NULL,
  `date_of_birth` date NOT NULL,
  `mobile_no` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`enrollment_no`, `student_name`, `student_password`, `date_of_birth`, `mobile_no`) VALUES
(186230307029, 'Jaimin', 'jaimin@123', '2000-12-05', 9999888829),
(186230307043, 'Mayur', 'mayur@123', '2002-12-24', 9999888843);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_table`
--
ALTER TABLE `exam_table`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `faculty_table`
--
ALTER TABLE `faculty_table`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`enrollment_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
