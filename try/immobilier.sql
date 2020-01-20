-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2020 at 12:05 PM
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
-- Database: `immobilier`
--

-- --------------------------------------------------------

--
-- Table structure for table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(55) NOT NULL,
  `adresse` varchar(55) NOT NULL,
  `ville` varchar(25) NOT NULL,
  `cp` int(5) NOT NULL,
  `surface` int(5) NOT NULL,
  `prix` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(49, 'super place', '204 avenue de colmar', 'strasboug', 67300, 100, 10000, 'Array', 'location', 'super place'),
(50, 'It works i hope', 'the best', 'strasbourg', 67300, 1000, 99999, 'Array', 'vente', 'i hope it really works'),
(51, 'try', '204 avenue de colmar', 'strasboug', 60000, 44, 1000, 'Array', 'location', 'hello'),
(52, 'try', '204 avenue de colmar', 'strasboug', 60000, 44, 1000, 'Array', 'location', 'hello'),
(53, 'last try', 'chez moi', 'strasboug', 67300, 48, 1000, 'Array', 'location', 'hfghxffhbfg'),
(54, 'laaaaaaaaaast', 'fff', 'fff', 60000, 49, 50, 'Array', 'location', 'hhhhhhhhhhhh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
