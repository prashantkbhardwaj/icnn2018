-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 01, 2017 at 11:16 AM
-- Server version: 5.5.57-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teqniHome`
--

-- --------------------------------------------------------

--
-- Table structure for table `levelNames`
--

CREATE TABLE IF NOT EXISTS `levelNames` (
`id` int(11) NOT NULL,
  `level1` varchar(100) NOT NULL,
  `level2` varchar(100) NOT NULL,
  `level3` varchar(100) NOT NULL,
  `level1opt` varchar(200) NOT NULL,
  `level2opt` varchar(200) NOT NULL,
  `level3opt` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levelNames`
--

INSERT INTO `levelNames` (`id`, `level1`, `level2`, `level3`, `level1opt`, `level2opt`, `level3opt`) VALUES
(1, 'University', 'Branch', 'Year', 'VIT,SRM,BITS', 'CSE,ECE,Mech,Civil_Law,MCA,BCA_Bio,History,Arts', '1,2,3,4_first,second,third_hons,ug,pg_job,gre,mba/practice,higher studies_business,ceo_startup,teacher/research,doctor_professor,scientist_artist,painter,singer');

-- --------------------------------------------------------

--
-- Table structure for table `listenData`
--

CREATE TABLE IF NOT EXISTS `listenData` (
`id` int(11) NOT NULL,
  `data` varchar(400) NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `listenData`
--

INSERT INTO `listenData` (`id`, `data`, `state`) VALUES
(1, 'VIT_ECE_first_test spinner', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `hashed_password` varchar(100) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `hashed_password`, `usertype`) VALUES
(2, 'Prashant Bhardwaj', 'pkb@gmail.com', '$2y$10$YjMwNTA4NWEzZTVhN2Q4NuT9ZCZawFZXP8ZS1tSzrWZ3PzyWfb7w6', 'Super User'),
(3, 'Shashank Bhardwaj', 'skb@gmail.com', '$2y$10$YmFmYjZmOWI2MmI4OWNkZe7QHytHnCEcNTvW0HakopzelB4DSadR6', 'Teacher'),
(4, 'Abhishek Singh', 'as@gmail.com', '$2y$10$YmI3ODM2NGI0Zjg4ODM4ZOe1KPSLJcx2/Kx4YIePWmX/u1VWkA5ua', 'Student'),
(5, 'Prasang Sharma', 'ps@gmail.com', '$2y$10$N2ViNTdjZTQ4ZmI1ODk0YeMWmLdgpPJj4P9bI/LaoNopglriVwle2', 'Teacher'),
(6, 'Monu', 'mb@gmail.com', '$2y$10$NTJmNjY4NDJjY2RlMDM5N.ARTkHkPnN45kn294AsD45R.BcWfcR72', 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `volleyupload`
--

CREATE TABLE IF NOT EXISTS `volleyupload` (
`id` int(11) NOT NULL,
  `imgPath` varchar(400) NOT NULL,
  `uploader` varchar(100) NOT NULL,
  `level1` varchar(100) NOT NULL,
  `level2` varchar(100) NOT NULL,
  `level3` varchar(100) NOT NULL,
  `sessionName` varchar(100) NOT NULL,
  `timeDuration` varchar(50) NOT NULL,
  `dateUpload` varchar(100) NOT NULL,
  `qrcode` text NOT NULL,
  `pos` int(11) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volleyupload`
--

INSERT INTO `volleyupload` (`id`, `imgPath`, `uploader`, `level1`, `level2`, `level3`, `sessionName`, `timeDuration`, `dateUpload`, `qrcode`, `pos`, `description`) VALUES
(1, '', 'skb@gmail.com', 'BITS', 'History', 'professor', 'Test Session', '', '', 'https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=BITS_History_professor_Test Session', 0, 'Test session for demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levelNames`
--
ALTER TABLE `levelNames`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listenData`
--
ALTER TABLE `listenData`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volleyupload`
--
ALTER TABLE `volleyupload`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levelNames`
--
ALTER TABLE `levelNames`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `listenData`
--
ALTER TABLE `listenData`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `volleyupload`
--
ALTER TABLE `volleyupload`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
