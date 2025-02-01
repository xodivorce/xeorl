-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2025 at 10:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Xeorl`
--

-- --------------------------------------------------------

--
-- Table structure for table `url`
--

CREATE TABLE `url` (
  `id` int(11) NOT NULL,
  `shorten_url` varchar(200) NOT NULL,
  `full_url` varchar(1000) NOT NULL,
  `clicks` int(11) NOT NULL,
  `total_links` int(11) DEFAULT 0,
  `total_clicks` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `shorten_url`, `full_url`, `clicks`, `total_links`, `total_clicks`) VALUES
(68, 'b1f6c', 'https://chatgpt.com/', 0, 0, 0),
(69, '11bd1', 'https://xeorl.buzz/', 0, 0, 0),
(70, '6d802', 'https://xeorl.buzz/', 0, 0, 0),
(71, 'ee620', 'https://xeorl.buzz/', 0, 0, 0),
(72, '685ce', 'https://xeorl.buzz/', 0, 0, 0),
(73, '9799d', 'https://xeorl.buzz/', 0, 0, 0),
(74, '759d9', 'https://xeorl.buzz/', 0, 0, 0),
(75, 'bb44e', 'https://xeorl.buzz/', 0, 0, 0),
(76, 'f79c1', 'https://xeorl.buzz/', 0, 0, 0),
(77, '8c834', 'https://xeorl.buzz/', 0, 0, 0),
(78, 'db107', 'https://xeorl.buzz/', 0, 0, 0),
(79, '925d9', 'https://xeorl.buzz/', 0, 0, 0),
(80, 'e2a22', 'https://xeorl.buzz/', 0, 0, 0),
(81, '4c9fe', 'https://xeorl.buzz/', 0, 0, 0),
(82, 'bb5a1', 'https://xeorl.buzz/', 0, 0, 0),
(83, '62809', 'https://xeorl.buzz/', 0, 0, 0),
(84, '10676', 'https://xeorl.buzz/', 0, 0, 0),
(85, 'f719f', 'https://xeorl.buzz/', 0, 0, 0),
(86, 'a3cc2', 'https://xeorl.buzz/', 0, 0, 0),
(87, '52fe9', 'https://prourl.eu.org/rwqe', 0, 0, 0),
(88, 'd3b17', 'https://www.xodivorce.in/?i=1', 0, 0, 0),
(89, '801d2', 'http://localhost/Php-Projects/xeorl/htdocs/', 0, 0, 0),
(90, '8819b', 'http://localhost/Php-Projects/xeorl/htdocs/home.php', 0, 0, 0),
(91, 'c8ff6', 'http://localhost/Php-Projects/xeorl/htdocs/home.php', 0, 0, 0),
(92, '25418', 'http://localhost/Php-Projects/xeorl/htdocs/', 0, 0, 0),
(93, 'ec04a', 'http://localhost/Php-Projects/xeorl/htdocs/', 0, 0, 0),
(94, 'c1234', 'http://localhost/Php-Projects/xeorl/htdocs/', 0, 0, 0),
(95, 'c6a56', 'https://www.xodivorce.in/?i=1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_otp` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_name` varchar(255) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_email`, `user_pass`, `user_otp`, `created_at`, `user_name`, `user_type`) VALUES
(2, 'prasidmandal79@gmail.com', '$2y$10$qPRIk2B7EftJZUPB.y01GONHDhqMvcQKIvUVRRDnHsRUJYT.1zdQy', 835416, '2025-01-29 11:22:48', 'Prasid Mandal', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
