-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2020 at 06:32 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(64) NOT NULL,
  `is_active` tinyint(1) NOT NULL COMMENT '1 => Active , 0=> Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `is_active`) VALUES
(1, 'admin', 'Admin@123', 'admin@gmail.com', 0),
(2, 'admin', '0e7517141fb53f21ee439b355b5a1d0a', 'admin@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_timing`
--

DROP TABLE IF EXISTS `exam_timing`;
CREATE TABLE `exam_timing` (
  `id` int(11) NOT NULL,
  `name` varchar(16) NOT NULL,
  `time` time NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_type`
--

DROP TABLE IF EXISTS `exam_type`;
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

-- --------------------------------------------------------

--
-- Table structure for table `question_table`
--

DROP TABLE IF EXISTS `question_table`;
CREATE TABLE `question_table` (
  `id` int(11) NOT NULL,
  `exam_type` varchar(16) NOT NULL,
  `set_no` varchar(16) NOT NULL,
  `subject` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `q_title` longtext,
  `q_option1` longtext,
  `q_option2` longtext,
  `q_option3` longtext,
  `q_option4` longtext,
  `correct_option` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_table`
--

INSERT INTO `question_table` (`id`, `exam_type`, `set_no`, `subject`, `q_no`, `q_title`, `q_option1`, `q_option2`, `q_option3`, `q_option4`, `correct_option`, `is_active`, `created_date`) VALUES
(1, 'SSC', 'SSC-1', 10, 1, ' KBJ, LCK, MDL, NEM, _____', 'OEP', 'OEP', 'OEP', 'OEP', 2, 0, '2020-02-01'),
(2, 'SSC', 'SSC-1', 10, 2, 'A fraction which bears the same ratio to 1/27 as 3/11 bear to 5/9 is equal to â€¦â€¦â€¦.. .', '1/55', '1/55', '1/55', '1/55', 3, 0, '2020-02-02'),
(4, 'SSC', 'SSC-1', 10, 3, 'fhfhf gfdgd', 'gdfgdg', 'gdfgd', 'gdfgd', 'gfdgdg', 2, 0, '2020-02-02'),
(5, 'SSC', 'SSC-1', 12, 1, '125 gallons of a mixture contains 20% water. What amount of additional water should be added such that water content be raised to 25%?', '15/2 gallons.', '17/2 gallons.', '19/2 gallons.', '81/3 gallons.', 2, 0, '2020-02-02'),
(6, 'SSC', 'SSC-1', 12, 2, '106 × 106 – 94 × 94 = ?', ' 2004', '2400', '1904', '1906', 3, 0, '2020-02-02'),
(7, 'SSC', 'SSC-1', 17, 1, '125 gallons of a mixture contains 20% water. What amount of additional water should be added such that water content be raised to 25%?', '15/2 gallons.', '17/2 gallons.', '19/2 gallons.', '81/3 gallons.', 2, 0, '2020-02-02'),
(8, 'SSC', 'SSC-1', 17, 2, '106 × 106 – 94 × 94 = ?', ' 2004', '2400', '1904', '1906', 3, 0, '2020-02-02'),
(9, 'Banking', 'Banking-1', 26, 1, 'Which one is not the part of Migration to new capital adequacy framework based on the three pillar approach namely?', 'Minimum capital requirement', 'Supervisory review', 'Market discipline', 'Book keeping', 4, 0, '2020-02-10'),
(10, 'Banking', 'Banking-1', 26, 2, 'Italian money lenders were known as Banechi or Banacheri because', 'They had a lot of money', 'They had a money bank', 'They kept a special type of table to transact their business', 'All of the above', 2, 0, '2020-02-10'),
(11, 'Banking', 'Banking-1', 26, 3, 'Which of the following are the objectives and functions of IDBI?', 'To provide technical and administrative assistance for promotion or expansion of industry', 'To undertake market and investment research and surveys as also technical and economic studies in connection with development of industry.', 'To act as lender of last resort and to finance projects that are in conformity with national priorities', 'All of these', 3, 0, '2020-02-10'),
(12, 'Banking', 'Banking-1', 26, 4, 'Banks can avail refinance against loans made to industrial units from', 'DICGC', 'NABARD', 'ECGC', 'IDBI', 3, 0, '2020-02-10'),
(13, 'Banking', 'Banking-1', 26, 5, 'Assertion (A). Indent may be open or closed. Open indent does not specific the price and other details of the goods. The closed indent specific the brand, price, number, packing, shipping made, insurance etc.\nReason (R). This is required as a part of export procedures. ', 'Both (A) and (R) are correct', 'Both (A) and (R) are not correct', '(A) is true, but (R) is false', '(R) is true, but (A) is false', 3, 0, '2020-02-10'),
(14, 'Banking', 'Banking-1', 26, 6, 'Assertion (A). Use of paper money is replaced by plastic money. The future will see the electronic money clearance through satellite networking.\nReason (R). RBI is encouraging e-banking.', '(A) is false, but (R) is true', '(A) is true, but (R) is false', 'Both (A) and (R) are false', 'Both (A) and (R) are true', 4, 0, '2020-02-10'),
(15, 'Banking', 'Banking-1', 26, 7, 'Assertion (A). Bank have control over a large part of the supply of money in circulation.\nReason (R). They cannot influence the nature and character of production in any country.', 'Both (A) and (R) are true and (R) is correct explanation of (A).', '(A) is true but (R) is false and it is not correct explanation of (A).', '(R) is true but (A) is false.', '(A) is true but (B) is false', 2, 0, '2020-02-10'),
(16, 'Banking', 'Banking-1', 26, 8, 'With reference to the Micro Finance Institutions consider the following statement.\n(i) At present Micro Finance Institutions (MFls) obtain finance from banks according to RBI guidelines.\n(ii) MFIs provide small scale credit to low income households and small informal businesses.\nWhich of these statement is/ are correct?', 'Only (i)', 'Only (ii)', 'Both (i) and (ii)', 'Neither (i) nor (ii)', 2, 0, '2020-02-10'),
(17, 'Banking', 'Banking-1', 26, 9, 'Capital adequacy norm helps the banks\n(i) For strengthening capital base of banks\n(ii) For sanctioning more loan', 'Both (i) and (ii) are correct', 'Both (i) and (ii) are incorrect', '(i) is correct but (ii) is incorrect', '(ii) is correct but (i) is incorrect', 3, 0, '2020-02-10'),
(18, 'Banking', 'Banking-1', 26, 10, 'Main objective of CRR and SLR is to ensure\n(i)   Liquidity position of Bank\n(ii)  Financial position of Bank\n(iii) Profit pOSition of Bank', 'Only (i) is correct', 'Only (ii) is correct', 'Only (iii) is correct', '	\nAll are correct', 1, 0, '2020-02-10'),
(19, 'Banking', 'Banking-1', 27, 1, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\n â€˜The lowest common denominatorâ€™ of the Indian culture today is â€“ ', 'Hema Malini', 'Songs of Vividh Barati', 'Masala Dosa', 'Synthetic fibre ', 1, 0, '2020-02-10'),
(20, 'Banking', 'Banking-1', 27, 2, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe synthetic fibre has â€“', 'Always been popular in India', 'Become popular during the last twenty years', 'Never been popular the last twenty years', 'Been as popular as other kinds of fibre', 2, 0, '2020-02-10'),
(21, 'Banking', 'Banking-1', 27, 3, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe latest symbol of modernity for the rural people is â€“ ', 'The bicycle', 'The wristwatch', 'The transistor', 'The synthetic cloth', 4, 0, '2020-02-10'),
(22, 'Banking', 'Banking-1', 27, 4, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe tern â€˜Neo-richâ€™ means â€“ ', 'The aristocracy', 'The industrialists', 'The newly rich people ', 'The common people', 3, 0, '2020-02-10'),
(23, 'Banking', 'Banking-1', 27, 5, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe tone of the passage is â€“ ', 'Tragic', 'Ironic', 'Sombre', 'Satiric', 3, 0, '2020-02-10'),
(24, 'Banking', 'Banking-1', 27, 6, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nMany people believe that nothing can be done about the English language because â€“ ', 'Bad habits spread by imitation', 'We live in a decadent civilisation', 'There are too may bad writers', 'People are too lazy to change their bad habits', 2, 0, '2020-02-10'),
(25, 'Banking', 'Banking-1', 27, 7, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nThe author believes that â€“ ', 'Itâ€™s now too late to do anything about the problem', 'Language is a natural growth and cannot be shaped for our won purpose', 'The decline in the language can be stopped', 'The process of an increasingly bad language cannot be stopped', 4, 0, '2020-02-10'),
(26, 'Banking', 'Banking-1', 27, 8, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nThe author believes that the first stage towards the political regeneration of the language would be â€“ ', 'Taking the necessary trouble to avoid bad habits', 'Avoiding being frivolous about it', 'Clear thinking', 'For professional writers to help', 3, 0, '2020-02-10'),
(27, 'Banking', 'Banking-1', 27, 9, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nThe author believes that â€“ ', 'English is become ugly', 'Bad language', 'Our thoughts are becoming uglier because we are making the language uglier', 'Our civilisation is decadent so nothing can be done to stop the decile of the language', 3, 0, '2020-02-10'),
(28, 'Banking', 'Banking-1', 27, 10, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nWhat causes bad language in the end?', 'The bad influence of individual writers', 'The imitation of bad language habits', 'Political and economic causes.', 'An assumption that nothing can be done about', 3, 0, '2020-02-10'),
(29, 'Banking', 'Banking-1', 28, 1, 'Here are some words translated from an artificial language. \nmorpirquat means birdhouse \nbeelmorpir means bluebird \nbeelclak means bluebell \nWhich word could mean â€œhouseguestâ€?', 'morpirhunde', 'beelmoki', 'quathunde', 'clakquat', 3, 0, '2020-02-10'),
(30, 'Banking', 'Banking-1', 28, 2, 'Here are some words translated from an artificial language.\nslar means jump\nslary means jumping\nslarend means jumped\nWhich word could mean â€œplayingâ€?', 'clargslarend', 'clargy', 'ellaclarg', 'slarmont', 2, 0, '2020-02-10'),
(31, 'Banking', 'Banking-1', 28, 3, 'Here are some words translated from an artificial language.\nbriftamint means militant\nuftonel means occupied\nuftonalene means occupation\nWhich word could mean â€œoccupantâ€?', 'elbrifta', 'uftonamint', 'elamint', 'briftalene', 2, 0, '2020-02-10'),
(32, 'Banking', 'Banking-1', 28, 4, 'Here are some words translated from an artificial language.\nkrekinblaf means workforce\ndritakrekin means groundwork\nkrekinalti means workplace\nWhich word could mean â€œsomeplaceâ€?', 'moropalti', 'krekindrita', 'altiblaf', 'dritaalti', 1, 0, '2020-02-10'),
(33, 'Banking', 'Banking-1', 28, 5, 'Here are some words translated from an artificial language.\nplekapaki means fruitcake\npakishillen means cakewalk\ntreftalan means buttercup\nWhich word could mean â€œcupcakeâ€?', 'shillenalan', 'treftpleka', 'pakitreft', 'alanpaki', 4, 0, '2020-02-10'),
(34, 'Banking', 'Banking-1', 28, 6, 'Here are some words translated from an artificial language. peslligen means basketball court ligenstrisi means courtroom oltaganti means placement test Which word could mean â€œguest roomâ€?', 'peslstrisi', 'vosefstrisi', 'gantipesl', 'oltastrisi', 2, 0, '2020-02-10'),
(35, 'Banking', 'Banking-1', 28, 7, 'Here are some words translated from an artificial language.\njalkamofti means happy birthday\nmoftihoze means birthday party\nmentogunn means goodness\nWhich word could mean â€œhappinessâ€?', 'jalkagunn', 'mentohoze', 'moftihoze', 'hozemento', 4, 0, '2020-02-10'),
(36, 'Banking', 'Banking-1', 28, 8, 'Here are some words translated from an artificial language.\nmallonpiml means blue light\nmallontifl means blueberry\narpantifl means raspberry\nWhich word could mean â€œlighthouseâ€?', 'tiflmallon', 'pimlarpan', 'mallonarpan', 'pimldoken', 3, 0, '2020-02-10'),
(37, 'Banking', 'Banking-1', 28, 9, 'Here are some words translated from an artificial language.\ngemolinea means fair warning\ngerimitu means report card\ngilageri means weather report\nWhich word could mean â€œfair weather?â€', 'gemogila', 'gerigeme', 'gemomitu', 'gerimita', 1, 0, '2020-02-10'),
(38, 'Banking', 'Banking-1', 28, 10, 'Here are some words translated from an artificial language.\naptaose means first base\neptaose means second base\nlartabuk means ballpark\nWhich word could mean â€œbaseballâ€?', 'buklarta', 'oseepta', 'bukose', 'oselarta', 2, 0, '2020-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `set_assign`
--

DROP TABLE IF EXISTS `set_assign`;
CREATE TABLE `set_assign` (
  `id` int(11) NOT NULL,
  `student_name` varchar(64) NOT NULL,
  `exam_type` varchar(16) NOT NULL,
  `set_no` varchar(16) NOT NULL,
  `date` date NOT NULL,
  `student_id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL COMMENT '1 => active 0 => inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_assign`
--

INSERT INTO `set_assign` (`id`, `student_name`, `exam_type`, `set_no`, `date`, `student_id`, `is_active`) VALUES
(1, 'Santosh Ku Dwibedy', 'Banking', 'Banking-1', '2020-03-04', 2, 1),
(2, 'Niranjan Behera', 'Banking', 'Banking-1', '2020-03-04', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_details`
--

DROP TABLE IF EXISTS `student_details`;
CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `father_name` varchar(64) NOT NULL,
  `address` varchar(64) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `id_proof_no` varchar(64) DEFAULT NULL,
  `highest_degree` varchar(32) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 => active 0 => inactive',
  `created_date` datetime NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_details`
--

INSERT INTO `student_details` (`id`, `name`, `username`, `password`, `father_name`, `address`, `gender`, `dob`, `mobile_no`, `email`, `id_proof_no`, `highest_degree`, `is_active`, `created_date`, `updated_date`) VALUES
(2, 'Santosh Ku Dwibedy', 'dsad', 'dasdsad', 'Santosh', 'Raghunathpur', 'option1', '2099-11-11', 2147483647, 'santoshdwibedy@gmail.com', 'fdddsfd', 'fsdfs', 1, '2020-01-14 08:14:52', '0000-00-00 00:00:00'),
(3, 'Niranjan Behera', 'niranjan', 'niranjan', 'Father Behera', 'Patia', 'Male', '1995-06-13', 2147483647, 'niranjan@gmail.com', 'BHSAB322423', 'BCA', 1, '2020-01-19 09:22:06', '0000-00-00 00:00:00'),
(7, 'Janmejaya', 'fddsf', 'asdf', 'Janmejaya', 'Kalinga Studio Chhaka', 'Female', '1990-12-25', 2147483647, 'janmejayaray19@gmail.com', '43553453', 'dfbffdh', 1, '2020-01-26 08:09:44', '2020-01-26 00:00:00'),
(8, 'Ramakrushna', 'rama', 'rama', 'Father', 'BBSR', 'Male', '1990-12-06', 2147483647, 'rama@gmail.com', '9345893480', 'bca', 1, '2020-02-02 11:42:16', '0000-00-00 00:00:00'),
(9, 'Sonali Paikray', 'sonali', 'passwordonetwo', 'Father', 'Patia', 'Female', '0000-00-00', 2147483647, 'sonali@gmail.com', '4564646466456', 'bca', 1, '2020-02-02 11:56:20', '2020-02-02 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject_details`
--

DROP TABLE IF EXISTS `subject_details`;
CREATE TABLE `subject_details` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(32) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_details`
--

INSERT INTO `subject_details` (`id`, `subject_name`, `created_date`) VALUES
(1, 'Math', '0000-00-00'),
(2, 'English', '2020-01-22'),
(3, 'Reasoning', '2020-01-22'),
(4, 'General knowldge', '2020-01-22'),
(5, 'Computer', '2020-01-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_timing`
--
ALTER TABLE `exam_timing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_type`
--
ALTER TABLE `exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `set_assign`
--
ALTER TABLE `set_assign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_details`
--
ALTER TABLE `subject_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam_timing`
--
ALTER TABLE `exam_timing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_type`
--
ALTER TABLE `exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `question_table`
--
ALTER TABLE `question_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `set_assign`
--
ALTER TABLE `set_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subject_details`
--
ALTER TABLE `subject_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
