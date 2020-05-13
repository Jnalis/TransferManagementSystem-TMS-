-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2020 at 11:06 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_info`
--

CREATE TABLE `user_contact_info` (
  `CONTACT_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `CONTACT_NUMBER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `USER_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(50) NOT NULL,
  `MIDDLENAME` varchar(50) NOT NULL,
  `SURNAME` varchar(50) NOT NULL,
  `GENDER` enum('Male','Female') NOT NULL,
  `YOB` year(4) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `CURRENT_WORK_PLACE` varchar(255) NOT NULL,
  `ROLE` enum('Head of institution','workers') NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='A TABLE TO STORE USER INFORMATIONS';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`USER_ID`, `FIRSTNAME`, `MIDDLENAME`, `SURNAME`, `GENDER`, `YOB`, `EMAIL`, `CURRENT_WORK_PLACE`, `ROLE`, `PASSWORD`) VALUES
(1, 'hod', 'hod', 'hod', 'Male', 1956, 'hod@gmail.com', 'mbezi primary school', 'Head of institution', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_transfers`
--

CREATE TABLE `user_transfers` (
  `TRANSFER_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TRANSFER_TITLE` varchar(255) NOT NULL,
  `FILE` varchar(255) NOT NULL,
  `PLACE_TO_GO` varchar(255) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_transfers`
--

INSERT INTO `user_transfers` (`TRANSFER_ID`, `USER_ID`, `TRANSFER_TITLE`, `FILE`, `PLACE_TO_GO`, `CREATED_AT`) VALUES
(1, 1, 'Naomba kuhama', '5eba6280435472.85348787.pdf', 'Dsm', '2020-05-12 12:21:45'),
(2, 1, 'Naomba kuhama', '5eba6cd1719997.62692912.pdf', 'Dsm', '2020-05-12 12:21:45'),
(3, 1, 'Naomba kuhama', '5eba6d19d28898.80263821.pdf', 'Dsm', '2020-05-12 12:21:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_contact_info`
--
ALTER TABLE `user_contact_info`
  ADD PRIMARY KEY (`CONTACT_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `user_transfers`
--
ALTER TABLE `user_transfers`
  ADD PRIMARY KEY (`TRANSFER_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_contact_info`
--
ALTER TABLE `user_contact_info`
  MODIFY `CONTACT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_transfers`
--
ALTER TABLE `user_transfers`
  MODIFY `TRANSFER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_contact_info`
--
ALTER TABLE `user_contact_info`
  ADD CONSTRAINT `user_contact_info_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_info` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_transfers`
--
ALTER TABLE `user_transfers`
  ADD CONSTRAINT `user_transfers_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user_info` (`USER_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
