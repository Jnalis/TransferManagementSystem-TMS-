-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 12:58 PM
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
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `yob` year(4) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `workPlace` varchar(255) NOT NULL,
  `role` enum('Head of institution','workers') NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='A TABLE TO STORE USER INFORMATIONS';

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `firstname`, `middlename`, `surname`, `gender`, `yob`, `email`, `phone`, `workPlace`, `role`, `password`) VALUES
(1, 'hod', 'hod', 'hod', 'Male', 1956, 'hod@gmail.com', '0757334887', 'Ubungo,dar es salaam', 'Head of institution', '123'),
(3, 'Worker', 'Worker', 'Worker', 'Male', 1960, 'worker@gmail.com', '0623512407', 'Ubungo,dar es salaam', 'workers', '123'),
(5, 'mkuu', 'mkuu', 'mkuu', 'Female', 1965, 'mkuu@gmail.com', '0712568978', 'Ilala,dar es salaam', 'Head of institution', '123'),
(8, 'Erick', 'Erick', 'Erick', 'Male', 1996, 'erick@gmail.com', '1234567890', 'Ubungo,dar es salaam', 'workers', '123'),
(10, 'User', 'User', 'User', 'Male', 1996, 'user@gmail.com', '0757334887', 'Rombo,kilimanjaro', 'workers', '1234'),
(11, 'Admin', 'Admin', 'Admin', 'Male', 1987, 'admin@gmail.com', '0623512407', 'Iyunga,mbeya', 'Head of institution', '1234'),
(13, 'Teller', 'Teller', 'Teller', 'Female', 1997, 'teller@gmail.com', '0757334887', 'Temeke,dar es salaam', 'workers', '1234'),
(14, 'Re', 'Re', 'Er', 'Female', 1996, 're@gmail.com', '0757334887', 'Ifunda,iringa', 'workers', '1234'),
(15, 'Teacher', 'Teacher', 'Teacher', 'Male', 1966, 'teacher@gmail.com', '0757334887', 'Rombo,kilimanjaro', 'workers', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_transfers`
--

CREATE TABLE `user_transfers` (
  `transfer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transfer_title` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `place_to_go` varchar(255) NOT NULL,
  `viewed` enum('NO','YES') NOT NULL DEFAULT 'NO',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_transfers`
--

INSERT INTO `user_transfers` (`transfer_id`, `user_id`, `transfer_title`, `file`, `place_to_go`, `viewed`, `created_at`) VALUES
(11, 3, 'Naomba kuhama by w1', 'LAB_30_MAY5ebe691f5e70d2.78599098.pdf', 'Ubungo,dar es salaam', 'NO', '2020-05-15 10:22:35'),
(14, 8, 'Kuhamia kwako by w3', 'Group presentation Assignment25ebf93bfc40bb1.81142716.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-16 07:18:23'),
(15, 8, 'Kuhamia kwako bby w3', 'Group presentation Assignment25ebf9417999bd8.06992896.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-16 07:19:51'),
(16, 3, 'Kuhamia kwako by w1', 'LAB_30_MAY5ebf9c21defcf3.67699492.pdf', 'Ubungo,dar es salaam', 'YES', '2020-05-16 07:54:09'),
(17, 1, 'Kuhama by HOD mkubwa mkubwa', 'LAB_30_MAY5ebf9d9bb2eef7.39940033.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-16 08:00:27'),
(18, 8, 'Transfer by erick', 'NETWORKING TRANSMISSION MEDIA5ec3c7e9dbbdb0.23368755.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-19 11:50:01'),
(19, 1, 'Kuhama by HOD', 'css_tutorial5ec507f64c61b7.93788212.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-20 10:35:34'),
(21, 1, 'Kuhama by HOD mkubwa mkubwa 5', 'css_tutorial5ec508f0087ad5.32282661.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-20 10:39:44'),
(22, 1, 'Rdytgtrd', 'html5_tutorial5ec50a71b64c86.61232994.pdf', 'Ilala,dar es salaam', 'YES', '2020-05-20 10:46:09'),
(23, 5, 'Mkuu  naomba uhamisho', 'Assignment 15ec55ba5dfcb86.11911617.pdf', 'Mwanga,kilimanjaro', 'NO', '2020-05-20 16:32:37'),
(24, 1, 'Rtyuyfftdrdff', 'DOC-20191212-WA00215ec5623548d3f9.19973721.pdf', 'Ilala,dar es salaam', 'YES', '2020-05-20 17:00:37'),
(26, 5, 'Dddddddddddddddd', 'lecture  ekotec foreseen (17)5ec5826d580083.16081268.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-20 19:18:05'),
(27, 5, 'Test', 'Lecture 1 - INTRODUCTION5ec58286194882.50249044.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-20 19:18:30'),
(28, 3, 'Naomba kuhama mimi mfanyakazi', 'Lecture 35ec5861283b3d3.65077665.pdf', 'Ubungo,dar es salaam', 'NO', '2020-05-20 19:33:38'),
(29, 3, 'Test worker worker', 'Lecture 45ec589054683a6.44334874.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-20 19:46:13'),
(30, 5, 'Ffffffffffff', 'ThyristorTriacandDiac5ec611b5e20ef8.26619368.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-21 05:29:25'),
(31, 3, 'Sdfsdadewrzsdx', 'Lecture 6 and 75ec612332611d6.28827631.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-21 05:31:31'),
(32, 3, 'Test transfer worker', 'Lecture 2-OOP and UML INTRO5ec612c67daae9.40760555.pdf', 'Ubungo,dar es salaam', 'NO', '2020-05-21 05:33:58'),
(33, 3, 'Se', 'DOC-20191212-WA00215ec613745cea36.10921353.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-21 05:36:52'),
(34, 3, 'Cxxccvxvfdvdr', 'Group Presentation-15ec613b057ca93.72827063.pdf', 'Rombo,kilimanjaro', 'NO', '2020-05-21 05:37:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- Indexes for table `user_transfers`
--
ALTER TABLE `user_transfers`
  ADD PRIMARY KEY (`transfer_id`),
  ADD KEY `user_transfers_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_transfers`
--
ALTER TABLE `user_transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_transfers`
--
ALTER TABLE `user_transfers`
  ADD CONSTRAINT `user_transfers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
