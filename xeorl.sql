-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2024 at 10:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xeorl`
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
(86, 'a3cc2', 'https://xeorl.buzz/', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `url`
--
ALTER TABLE `url`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `url`
--
ALTER TABLE `url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
