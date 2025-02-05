-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 05, 2025 at 08:28 AM
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
  `total_clicks` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `url`
--

INSERT INTO `url` (`id`, `shorten_url`, `full_url`, `clicks`, `total_links`, `total_clicks`, `user_id`) VALUES
(68, 'b1f6c', 'https://chatgpt.com/', 0, 0, 0, NULL),
(87, '52fe9', 'https://prourl.eu.org/rwqe', 0, 0, 0, NULL),
(96, 'f49aa', 'https://www.xodivorce.in/', 6, 0, 0, NULL),
(103, '67191', 'https://github.com/xodivorce', 0, 0, 0, NULL),
(105, '4dfe6', 'https://www.blackbox.ai/', 0, 0, 0, NULL),
(112, '9500b', 'https://www.google.com/search?q=int+11+max+value+%3F&sca_esv=b71b87a039ad9bf1&sxsrf=AHTn8zqi--a95yrKigfA0Sd6b_9ixbSRLQ%3A1738710375024&ei=Z52iZ9mfAcGtseMP0L-DkAQ&ved=0ahUKEwiZ75TykKuLAxXBVmwGHdDfAEIQ4dUDCBA&uact=5&oq=int+11+max+value+%3F&gs_lp=Egxnd3Mtd2l6LXNlcnAiEmludCAxMSBtYXggdmFsdWUgPzIGEAAYFhgeMgYQABgWGB4yBhAAGBYYHjIGEAAYFhgeMgsQABiABBiGAxiKBTILEAAYgAQYhgMYigUyCxAAGIAEGIYDGIoFMgUQABjvBTIIEAAYgAQYogRIiwpQlgRY2ghwAXgBkAEAmAGvAaAB1AKqAQMwLjK4AQPIAQD4AQGYAgOgAuICwgIKEAAYsAMY1gQYR5gDAIgGAZAGCJIHAzEuMqAH5Ak&sclient=gws-wiz-serp', 0, 0, 0, NULL),
(116, '1dbcc', 'https://www.blackbox.ai/', 0, 0, 0, NULL),
(117, '2f909', 'https://chatgpt.com/', 2, 0, 0, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `url`
--
ALTER TABLE `url`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
