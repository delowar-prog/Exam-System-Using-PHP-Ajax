-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 09:08 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(32) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'bscdelowar', '123'),
(2, 'milton', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `ansId` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`ansId`, `quesNo`, `rightAns`, `ans`) VALUES
(26, 1, 0, 'Beatifull'),
(27, 1, 0, 'Harmfull'),
(28, 1, 1, 'Danger'),
(29, 1, 0, 'Blood'),
(34, 2, 0, 'Baiging'),
(35, 2, 1, 'Colombo'),
(36, 2, 0, 'Korachi'),
(37, 2, 0, 'Kathmundo'),
(38, 3, 0, 'Rayhan'),
(39, 3, 0, 'Rana'),
(40, 3, 1, 'Razu'),
(41, 3, 0, 'Ripon'),
(50, 4, 0, '8'),
(51, 4, 1, '11'),
(52, 4, 0, '1'),
(53, 4, 0, '9'),
(54, 5, 0, 'Barma'),
(55, 5, 0, 'India'),
(56, 5, 0, 'Pakisthan'),
(57, 5, 1, 'Bangladesh'),
(58, 6, 1, 'Imran Khan'),
(59, 6, 0, 'Donal Tramp'),
(61, 6, 0, 'Sheikh Hasina'),
(94, 6, 0, 'Noren. Mudi'),
(95, 7, 0, '21'),
(96, 7, 0, '25'),
(97, 7, 0, '53'),
(98, 7, 1, '24'),
(99, 8, 0, 'Islamabad'),
(100, 8, 0, 'Colombo'),
(101, 8, 0, 'Korachi'),
(102, 8, 1, 'Riad'),
(103, 9, 1, 'PHP'),
(104, 9, 0, 'C'),
(105, 9, 0, 'C++'),
(106, 9, 0, 'C#'),
(107, 10, 0, 'Hiper Text Preprocessor'),
(108, 10, 0, 'Cass Cadding Style Sheet'),
(109, 10, 1, 'Hiper text Markup Language'),
(110, 10, 0, 'None of Them');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `quesId` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`quesId`, `quesNo`, `ques`) VALUES
(14, 1, 'Red is the sign of what?'),
(16, 2, 'Which is the city of Crilanka?'),
(17, 3, 'What is the name of Minas Brother?'),
(20, 4, '5+6=?'),
(21, 5, 'Dhaka is the Capital City of.............?'),
(22, 6, 'Which is the Primeminister of Pakisthan?'),
(31, 7, '8 * 3= ?'),
(32, 8, 'What is the Capital of Saudi Arabian?'),
(33, 9, 'Which is the web technologys?'),
(34, 10, 'Which is the full mining of HTML?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `useremail`, `userpass`, `status`) VALUES
(3, 'Delowar', 'Delowar', 'delowar@gmail.com', '123', 0),
(4, 'Md. Delowar Hossain Milton', 'bscdelowar', 'bscdelowar@yahoo.com', '123', 0),
(5, 'Juiel Khan', 'juiel', 'juiel@gmail.com', '123456', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`ansId`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`quesId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `ansId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `quesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
