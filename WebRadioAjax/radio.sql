-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2020 at 04:02 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webradioajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `radio`
--

CREATE TABLE `radio` (
  `id` int(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `horaire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `radio`
--

INSERT INTO `radio` (`id`, `titre`, `artist`, `horaire`) VALUES
(1, 'With you', 'Chris Brown', '03:00'),
(2, 'Unwritten', 'Natasha Bedingfield', '03:30'),
(3, 'Wing$', 'Macklemore&Ryan Lewis', '02:55'),
(4, 'Lucky', 'Jason Mraz', '03:15'),
(5, 'Circles', 'Post Malone', '03:22'),
(6, 'So Good', 'B.O.B.', '03:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `radio`
--
ALTER TABLE `radio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `radio`
--
ALTER TABLE `radio`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
