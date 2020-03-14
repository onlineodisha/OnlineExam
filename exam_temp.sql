-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 06:31 PM
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
-- Table structure for table `exam_temp`
--

DROP TABLE IF EXISTS `exam_temp`;
CREATE TABLE `exam_temp` (
  `id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `exam_name` varchar(16) NOT NULL,
  `set_no` varchar(16) NOT NULL,
  `subject` varchar(16) NOT NULL,
  `q_no` int(11) NOT NULL,
  `temp_qtitle` longtext,
  `temp_opt1` longtext,
  `temp_opt2` longtext,
  `temp_opt3` longtext,
  `temp_opt4` longtext,
  `selected_option` int(11) DEFAULT NULL,
  `selected_btn` varchar(32) DEFAULT NULL,
  `correct_option` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_temp`
--

INSERT INTO `exam_temp` (`id`, `stu_id`, `exam_name`, `set_no`, `subject`, `q_no`, `temp_qtitle`, `temp_opt1`, `temp_opt2`, `temp_opt3`, `temp_opt4`, `selected_option`, `selected_btn`, `correct_option`, `exam_date`, `status`) VALUES
(68, 3, 'Banking', 'Banking-1', 'Math', 8, 'With reference to the Micro Finance Institutions consider the following statement.\n(i) At present Micro Finance Institutions (MFls) obtain finance from banks according to RBI guidelines.\n(ii) MFIs provide small scale credit to low income households and small informal businesses.\nWhich of these statement is/ are correct?', 'Only (i)', 'Only (ii)', 'Both (i) and (ii)', 'Neither (i) nor (ii)', NULL, NULL, 2, '2020-03-12', 1),
(67, 3, 'Banking', 'Banking-1', 'Math', 7, 'Assertion (A). Bank have control over a large part of the supply of money in circulation.\nReason (R). They cannot influence the nature and character of production in any country.', 'Both (A) and (R) are true and (R) is correct explanation of (A).', '(A) is true but (R) is false and it is not correct explanation of (A).', '(R) is true but (A) is false.', '(A) is true but (B) is false', NULL, NULL, 2, '2020-03-12', 1),
(66, 3, 'Banking', 'Banking-1', 'Math', 6, 'Assertion (A). Use of paper money is replaced by plastic money. The future will see the electronic money clearance through satellite networking.\nReason (R). RBI is encouraging e-banking.', '(A) is false, but (R) is true', '(A) is true, but (R) is false', 'Both (A) and (R) are false', 'Both (A) and (R) are true', NULL, NULL, 4, '2020-03-12', 1),
(65, 3, 'Banking', 'Banking-1', 'Math', 5, 'Assertion (A). Indent may be open or closed. Open indent does not specific the price and other details of the goods. The closed indent specific the brand, price, number, packing, shipping made, insurance etc.\nReason (R). This is required as a part of export procedures. ', 'Both (A) and (R) are correct', 'Both (A) and (R) are not correct', '(A) is true, but (R) is false', '(R) is true, but (A) is false', NULL, NULL, 3, '2020-03-12', 1),
(64, 3, 'Banking', 'Banking-1', 'Math', 4, 'Banks can avail refinance against loans made to industrial units from', 'DICGC', 'NABARD', 'ECGC', 'IDBI', NULL, NULL, 3, '2020-03-12', 1),
(63, 3, 'Banking', 'Banking-1', 'Math', 3, 'Which of the following are the objectives and functions of IDBI?', 'To provide technical and administrative assistance for promotion or expansion of industry', 'To undertake market and investment research and surveys as also technical and economic studies in connection with development of industry.', 'To act as lender of last resort and to finance projects that are in conformity with national priorities', 'All of these', NULL, NULL, 3, '2020-03-12', 1),
(62, 3, 'Banking', 'Banking-1', 'Math', 2, 'Italian money lenders were known as Banechi or Banacheri because', 'They had a lot of money', 'They had a money bank', 'They kept a special type of table to transact their business', 'All of the above', NULL, NULL, 2, '2020-03-12', 1),
(61, 3, 'Banking', 'Banking-1', 'Math', 1, 'Which one is not the part of Migration to new capital adequacy framework based on the three pillar approach namely?', 'Minimum capital requirement', 'Supervisory review', 'Market discipline', 'Book keeping', NULL, NULL, 4, '2020-03-12', 1),
(69, 3, 'Banking', 'Banking-1', 'Math', 9, 'Capital adequacy norm helps the banks\n(i) For strengthening capital base of banks\n(ii) For sanctioning more loan', 'Both (i) and (ii) are correct', 'Both (i) and (ii) are incorrect', '(i) is correct but (ii) is incorrect', '(ii) is correct but (i) is incorrect', NULL, NULL, 3, '2020-03-12', 1),
(70, 3, 'Banking', 'Banking-1', 'Math', 10, 'Main objective of CRR and SLR is to ensure\n(i)   Liquidity position of Bank\n(ii)  Financial position of Bank\n(iii) Profit pOSition of Bank', 'Only (i) is correct', 'Only (ii) is correct', 'Only (iii) is correct', '	\nAll are correct', NULL, NULL, 1, '2020-03-12', 1),
(71, 3, 'Banking', 'Banking-1', 'English', 1, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\n â€˜The lowest common denominatorâ€™ of the Indian culture today is â€“ ', 'Hema Malini', 'Songs of Vividh Barati', 'Masala Dosa', 'Synthetic fibre ', NULL, NULL, 1, '2020-03-12', 1),
(72, 3, 'Banking', 'Banking-1', 'English', 2, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe synthetic fibre has â€“', 'Always been popular in India', 'Become popular during the last twenty years', 'Never been popular the last twenty years', 'Been as popular as other kinds of fibre', NULL, NULL, 2, '2020-03-12', 1),
(73, 3, 'Banking', 'Banking-1', 'English', 3, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe latest symbol of modernity for the rural people is â€“ ', 'The bicycle', 'The wristwatch', 'The transistor', 'The synthetic cloth', NULL, NULL, 4, '2020-03-12', 1),
(74, 3, 'Banking', 'Banking-1', 'English', 4, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe tern â€˜Neo-richâ€™ means â€“ ', 'The aristocracy', 'The industrialists', 'The newly rich people ', 'The common people', NULL, NULL, 3, '2020-03-12', 1),
(75, 3, 'Banking', 'Banking-1', 'English', 5, 'Direction (1-5): What, one wonders, is the lowest common denominator of Indian culture today? The attractive Hema Malini? The songs of Vinidh Barati? The attractive Hema Malini? The sons of Vinidh Barati?\n Or the mouth-watering Masala Dosa? Delectable as these may be, each yield pride of place to that false (?) symbol of a new era-the synthetic fibre. In less than twenty years the nylon sari and the terylene shirt have swept the countryside, penetrated to the farthest corners of the land and persuaded every common man, woman and child that the key to success in the present-day world lie in artificial fibers: glass nylon, crepe nylon, tery mixes, polyesters and what have you. More than the bicycles, the wristwatch or the transistor radio, synthetic clothes have come to represent the first step away form the village square. The village lass treasures the flashy nylon sari in her trousseau most delay; the village youth gets a great kick out of his cheap terrycot shirt and trousers, the nearest he can approximate to the expensive synthetic sported by his wealthy citybred contemporaries. And the Neo-rich craze for â€˜phorenâ€™ is nowhere more apparent than in the price that people will pay for smuggled, stolen, begged borrowed second hand or thrown away synthetics. Alas, even the uniformity of nylon. \n\nThe tone of the passage is â€“ ', 'Tragic', 'Ironic', 'Sombre', 'Satiric', NULL, NULL, 3, '2020-03-12', 1),
(76, 3, 'Banking', 'Banking-1', 'English', 6, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nMany people believe that nothing can be done about the English language because â€“ ', 'Bad habits spread by imitation', 'We live in a decadent civilisation', 'There are too may bad writers', 'People are too lazy to change their bad habits', NULL, NULL, 2, '2020-03-12', 1),
(77, 3, 'Banking', 'Banking-1', 'English', 7, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nThe author believes that â€“ ', 'Itâ€™s now too late to do anything about the problem', 'Language is a natural growth and cannot be shaped for our won purpose', 'The decline in the language can be stopped', 'The process of an increasingly bad language cannot be stopped', NULL, NULL, 4, '2020-03-12', 1),
(78, 3, 'Banking', 'Banking-1', 'English', 8, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nThe author believes that the first stage towards the political regeneration of the language would be â€“ ', 'Taking the necessary trouble to avoid bad habits', 'Avoiding being frivolous about it', 'Clear thinking', 'For professional writers to help', NULL, NULL, 3, '2020-03-12', 1),
(79, 3, 'Banking', 'Banking-1', 'English', 9, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nThe author believes that â€“ ', 'English is become ugly', 'Bad language', 'Our thoughts are becoming uglier because we are making the language uglier', 'Our civilisation is decadent so nothing can be done to stop the decile of the language', NULL, NULL, 3, '2020-03-12', 1),
(80, 3, 'Banking', 'Banking-1', 'English', 10, 'Direction (6-10): Most people who bother with the matter at all would admit that the English language is in a bad way, but it is generally assumed that we cannot by conscious action do anything about it. Our civilization is decadent and our language-so the argument runs-must inevitably share in the general collapse. It follows that any struggle against the abuse of language is a sentimental archaism, like preferring candles to electric light or hansom cabs to aeroplanes. Underneath this lies the half-conscious belief that language is natural growth and not an instrument which we shape for our own purposes. \n\nNow it is clear that the decline of a language must ultimately have political and economic causes it is not due simply to the bad influence of this or that individual writer. But an effect can become a cause, reinforcing the original cause and producing the same effect in an intensified form, and so on indefinitely. A man may take to drink because he feels himself to be a failure, and then fail all the more completely because he drinks. It is rather the same thing that is happening to the English language. It becomes ugly and inaccurate because our thoughts are foolish, but the slovenliness of our language makes it easier for us to have foolish thoughts. The point is that the process is reversible. Modern English, especially written English, is full of bad habits which spread by imitation and which can be avoided if one is willing to take the necessary trouble. If one gets rid of these habits, one can think more clearly, and to think clearly is a necessary first step towards political regeneration: so that the fight against bad English is not frivolous and is not the exclusive concern of professional writers. \n\nWhat causes bad language in the end?', 'The bad influence of individual writers', 'The imitation of bad language habits', 'Political and economic causes.', 'An assumption that nothing can be done about', NULL, NULL, 3, '2020-03-12', 1),
(81, 3, 'Banking', 'Banking-1', 'Reasoning', 1, 'Here are some words translated from an artificial language. \nmorpirquat means birdhouse \nbeelmorpir means bluebird \nbeelclak means bluebell \nWhich word could mean â€œhouseguestâ€?', 'morpirhunde', 'beelmoki', 'quathunde', 'clakquat', NULL, NULL, 3, '2020-03-12', 1),
(82, 3, 'Banking', 'Banking-1', 'Reasoning', 2, 'Here are some words translated from an artificial language.\nslar means jump\nslary means jumping\nslarend means jumped\nWhich word could mean â€œplayingâ€?', 'clargslarend', 'clargy', 'ellaclarg', 'slarmont', NULL, NULL, 2, '2020-03-12', 1),
(83, 3, 'Banking', 'Banking-1', 'Reasoning', 3, 'Here are some words translated from an artificial language.\nbriftamint means militant\nuftonel means occupied\nuftonalene means occupation\nWhich word could mean â€œoccupantâ€?', 'elbrifta', 'uftonamint', 'elamint', 'briftalene', NULL, NULL, 2, '2020-03-12', 1),
(84, 3, 'Banking', 'Banking-1', 'Reasoning', 4, 'Here are some words translated from an artificial language.\nkrekinblaf means workforce\ndritakrekin means groundwork\nkrekinalti means workplace\nWhich word could mean â€œsomeplaceâ€?', 'moropalti', 'krekindrita', 'altiblaf', 'dritaalti', NULL, NULL, 1, '2020-03-12', 1),
(85, 3, 'Banking', 'Banking-1', 'Reasoning', 5, 'Here are some words translated from an artificial language.\nplekapaki means fruitcake\npakishillen means cakewalk\ntreftalan means buttercup\nWhich word could mean â€œcupcakeâ€?', 'shillenalan', 'treftpleka', 'pakitreft', 'alanpaki', NULL, NULL, 4, '2020-03-12', 1),
(86, 3, 'Banking', 'Banking-1', 'Reasoning', 6, 'Here are some words translated from an artificial language. peslligen means basketball court ligenstrisi means courtroom oltaganti means placement test Which word could mean â€œguest roomâ€?', 'peslstrisi', 'vosefstrisi', 'gantipesl', 'oltastrisi', NULL, NULL, 2, '2020-03-12', 1),
(87, 3, 'Banking', 'Banking-1', 'Reasoning', 7, 'Here are some words translated from an artificial language.\njalkamofti means happy birthday\nmoftihoze means birthday party\nmentogunn means goodness\nWhich word could mean â€œhappinessâ€?', 'jalkagunn', 'mentohoze', 'moftihoze', 'hozemento', NULL, NULL, 4, '2020-03-12', 1),
(88, 3, 'Banking', 'Banking-1', 'Reasoning', 8, 'Here are some words translated from an artificial language.\nmallonpiml means blue light\nmallontifl means blueberry\narpantifl means raspberry\nWhich word could mean â€œlighthouseâ€?', 'tiflmallon', 'pimlarpan', 'mallonarpan', 'pimldoken', NULL, NULL, 3, '2020-03-12', 1),
(89, 3, 'Banking', 'Banking-1', 'Reasoning', 9, 'Here are some words translated from an artificial language.\ngemolinea means fair warning\ngerimitu means report card\ngilageri means weather report\nWhich word could mean â€œfair weather?â€', 'gemogila', 'gerigeme', 'gemomitu', 'gerimita', NULL, NULL, 1, '2020-03-12', 1),
(90, 3, 'Banking', 'Banking-1', 'Reasoning', 10, 'Here are some words translated from an artificial language.\naptaose means first base\neptaose means second base\nlartabuk means ballpark\nWhich word could mean â€œbaseballâ€?', 'buklarta', 'oseepta', 'bukose', 'oselarta', NULL, NULL, 2, '2020-03-12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_temp`
--
ALTER TABLE `exam_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_temp`
--
ALTER TABLE `exam_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
