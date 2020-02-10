-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 05:22 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

CREATE TABLE `exam_type` (
  `id` int(11) NOT NULL,
  `exam_name` varchar(16) NOT NULL,
  `exam_time` int(11) NOT NULL COMMENT 'In Mins',
  `subject_name` varchar(16) NOT NULL,
  `no_of_question` int(11) NOT NULL,
  `mark_add` int(11) NOT NULL,
  `mark_minus` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 => active 0 => inactive',
  `exam_type_id` int(11) NOT NULL COMMENT 'Exam Type ID',
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_type`
--

INSERT INTO `exam_type` (`id`, `exam_name`, `exam_time`, `subject_name`, `no_of_question`, `mark_add`, `mark_minus`, `is_active`, `exam_type_id`, `created_date`) VALUES
(9, 'SSC', 120, '', 0, 0, 0, 1, 0, '2020-01-23'),
(10, 'SSC', 120, 'Math', 30, 4, 1, 1, 9, '2020-01-23'),
(12, 'SSC', 120, 'English', 25, 4, 1, 1, 9, '2020-01-23'),
(13, 'Railway', 90, '', 0, 0, 0, 1, 0, '2020-01-23'),
(14, 'Railway', 90, 'Math', 10, 4, 1, 1, 13, '2020-01-23'),
(15, 'Railway', 90, 'English', 25, 4, 1, 1, 13, '2020-01-23'),
(17, 'SSC', 120, 'Computer', 25, 4, 1, 1, 9, '2020-01-24'),
(18, 'Railway', 90, 'Reasoning', 30, 4, 1, 1, 13, '2020-01-24'),
(21, 'SSC', 120, 'General', 20, 2, 1, 1, 9, '2020-01-24'),
(22, 'SSC1', 120, '', 0, 0, 0, 1, 0, '2020-01-24'),
(23, 'SSC1', 120, 'Math', 30, 4, 1, 1, 22, '2020-01-24'),
(24, 'Banking', 180, '', 0, 0, 0, 1, 0, '2020-01-26'),
(26, 'Banking', 180, 'Math', 10, 4, 1, 1, 24, '2020-02-10'),
(27, 'Banking', 180, 'English', 10, 3, 1, 1, 24, '2020-02-10'),
(28, 'Banking', 180, 'Reasoning', 10, 3, 1, 1, 24, '2020-02-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
