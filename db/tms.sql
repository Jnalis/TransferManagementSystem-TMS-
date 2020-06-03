-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 06:45 PM
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
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `pass_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`pass_id`, `code`, `email`) VALUES
(9, '15ec701a353a9e', 'erickkatikiro@gmail.com'),
(10, '15ec7020900226', 'erickkatikiro@gmail.com'),
(11, '15ec70221a7927', 'erickkatikiro@gmail.com');

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
(20, 'Juve', 'Juve', 'Juve', 'Male', 1996, 'jnalisjmson6@gmail.com', '0757334887', 'Ubungo,dar es salaam', 'Head of institution', '$2y$10$SVRJ2QqS4aLFyIyb0exqiuqEHh0KZYbqEQo5Ki8nWAE7nmOgkSaqy'),
(21, 'Admin', 'Admin', 'Admin', 'Female', 1997, 'swaijuvenalis@gmail.com', '0623512407', 'Rombo,kilimanjaro', 'Head of institution', '$2y$10$2D.pLzyKB87rGbB1.PjO1eWzlaWH43nJTJ70oSE84LlQoXqTQsOBe'),
(22, 'Erick', 'Erick', 'Erick', 'Male', 1996, 'erickkatikiro@gmail.com', '0757334887', 'Temeke,dar es salaam', 'Head of institution', '$2y$10$hnAshv4qno.dvQv2ZsNJp.Wo4MKU61S.r6N3oujfcWiG.BEusyEcm'),
(23, 'Teacher', 'Teacher', 'Teacher', 'Male', 1987, 'teacher@gmail.com', '0123456789', 'Ilala,dar es salaam', 'workers', '$2y$10$4uSFU23/nmASGy3djkzPEur4a5jlEQN9GBPc5yxxO7ANPC3vH6aF.'),
(26, 'T', 'T', 'T', 'Female', 1987, 't@gmail.com', '1234567899', 'Moshi,kilimanjaro', 'workers', '$2y$10$26yPnDTdsEV.e5VFUbgKdO1C1jPWbjKBjPgATyEwhEwHKCtPF5u3q'),
(27, 'Teach', 'Teach', 'Teach', 'Female', 1962, 'teach@gmail.com', '1236547895', 'Himo,kilimanjaro', 'workers', '$2y$10$Pri7xKzD4LIWgNBNdZF3Aer1UaOqoXJffPxZuaYYGDkCKOPy0Rty2'),
(28, 'X', 'X', 'X', 'Female', 1962, 'x@gmail.com', '3454657656', 'Mbagala,dar es salaam', 'workers', '$2y$10$ySSkxhEpq7mm.umFlsQuI.VdT9SLu8L6uXf7dJVgQ9Vpt6HYLpb6G'),
(29, 'Rety', 'Rety', 'Rety', 'Female', 1996, 'erick@gmail.com', '0757334887', 'Rombo,kilimanjaro', 'workers', '$2y$10$9UxQSvc/OWjlZENQrxsbXu8xyHsjez9VCaB6fG9BV/ZA6ijbTrQbe'),
(30, 'Y', 'Y', 'Y', 'Male', 1996, 'y@gmail.com', '0757334887', 'Rombo,kilimanjaro', 'workers', '$2y$10$shCeBttjP/sSYYGaDSGQg.zHrs4sFmIsB8nkLMnXHQBJCR3dzKy/G'),
(31, 'Yy', 'Yy', 'Yy', 'Male', 1996, 'yy@gmail.com', '0987654321', 'Temeke,dar es salaam', 'workers', '$2y$10$83PUgfJeX7I1t3ANbY1iKO5cGtVGb0tc3RZj1AZcHkfmlUM/yEB..'),
(32, 'Yyy', 'Yyy', 'Yyy', 'Male', 1996, 'yyy@gmail.com', '0987654321', 'Temeke,dar es salaam', 'workers', '$2y$10$i0uhVvVWFnONtYit6bEZFuUCxaP5YiHLzqGFhIh7tzu65E3oxjcZ.');

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
(52, 26, 'Kuhamia kwako by w', 'Lecture 45eca7f2a864e51.64250200.pdf', 'Ubungo,dar es salaam', 'NO', '2020-05-24 14:05:30'),
(60, 20, 'Rtryukj', 'html5_tutorial5eca84c9d0bf70.61368256.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-24 14:29:29'),
(61, 26, 'Rsger', '157279277479405ecbf7f5f34998.68910828.pdf', 'Ilala,dar es salaam', 'NO', '2020-05-25 16:53:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`pass_id`);

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
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_transfers`
--
ALTER TABLE `user_transfers`
  MODIFY `transfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
