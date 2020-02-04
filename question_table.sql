-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2020 at 05:46 PM
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
-- Table structure for table `question_table`
--

CREATE TABLE `question_table` (
  `id` int(11) NOT NULL,
  `exam_type` varchar(16) NOT NULL,
  `set_no` varchar(16) NOT NULL,
  `subject` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `q_title` varchar(512) DEFAULT NULL,
  `q_option1` varchar(512) DEFAULT NULL,
  `q_option2` varchar(512) DEFAULT NULL,
  `q_option3` varchar(512) DEFAULT NULL,
  `q_option4` varchar(512) DEFAULT NULL,
  `correct_option` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`id`, `exam_type`, `set_no`, `subject`, `q_no`, `q_title`, `q_option1`, `q_option2`, `q_option3`, `q_option4`, `correct_option`, `is_active`, `created_date`) VALUES
(1, 'SSC', 'set-1', 10, 1, ' KBJ, LCK, MDL, NEM, _____', 'OEP', 'OEP', 'OEP', 'OEP', 2, 0, '2020-02-01'),
(2, 'SSC', 'set-1', 10, 2, 'A fraction which bears the same ratio to 1/27 as 3/11 bear to 5/9 is equal to â€¦â€¦â€¦.. .', '1/55', '1/55', '1/55', '1/55', 3, 0, '2020-02-02'),
(4, 'SSC', 'set-1', 10, 3, 'fhfhf gfdgd', 'gdfgdg', 'gdfgd', 'gdfgd', 'gfdgdg', 2, 0, '2020-02-02'),
(5, 'SSC', 'set-1', 12, 1, '125 gallons of a mixture contains 20% water. What amount of additional water should be added such that water content be raised to 25%?', '15/2 gallons.', '17/2 gallons.', '19/2 gallons.', '81/3 gallons.', 2, 0, '2020-02-02'),
(6, 'SSC', 'set-1', 12, 2, '106 × 106 – 94 × 94 = ?', ' 2004', '2400', '1904', '1906', 3, 0, '2020-02-02'),
(7, 'SSC', 'set-1', 17, 1, '125 gallons of a mixture contains 20% water. What amount of additional water should be added such that water content be raised to 25%?', '15/2 gallons.', '17/2 gallons.', '19/2 gallons.', '81/3 gallons.', 2, 0, '2020-02-02'),
(8, 'SSC', 'set-1', 17, 2, '106 × 106 – 94 × 94 = ?', ' 2004', '2400', '1904', '1906', 3, 0, '2020-02-02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
