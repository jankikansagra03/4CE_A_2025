-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2025 at 03:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2025_4ce_a`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `state` char(50) NOT NULL,
  `mobile` bigint NOT NULL,
  `gender` char(10) NOT NULL,
  `hobbies` char(200) NOT NULL,
  `address` varchar(100) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `state`, `mobile`, `gender`, `hobbies`, `address`, `photo`) VALUES
(1, 'qwer', 'qwerty123@gmail.co', ' 1234567', 'rajasthan', 123456789, 'Female', 'Reading,Writing,Playing', 'syul sdfghjkl yuio', '67c51fcf3381c13.jpg'),
(2, 'qwer', 'qwerty@gmail.co', ' 1234567', 'rajasthan', 123456789, 'Female', 'Reading,Writing,Playing', 'syul sdfghjkl yuio', '67c52233e17c613.jpg'),
(3, 'qsd', 'sfdghj@gmail.com', ' qwerty', 'punjab,rajasthan,gujarat', 12345678, 'Female', 'Playing,Singing,Dancing', 'qwedfghjnkm,', '67c522524ab0417.jpg'),
(4, 'xcvbn', 'zxcvbnm@gmail.com', ' sdfl', 'punjab', 234567890, 'Male', 'Reading,Writing,Playing', 'asdfcgvbnm,', '67c522b9188e216.jpg'),
(7, 'janki', 'kansagrajanki@gmail.com', ' JAnki@1234', 'gujarat,maharashtra,rajasthan,punjab', 4785478412, 'Female', 'Reading,Writing,Playing,Singing,Dancing', 'rajkot', '67d79a006bf182502021102590.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
