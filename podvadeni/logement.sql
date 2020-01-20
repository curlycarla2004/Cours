-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2019 at 10:32 AM
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
(1, 'Immeuble', '25 Rue du Perdu', 'Duper', 15200, 120, 660, 'https://emploi-btp.lemoniteur.fr/mediatheque/5/0/6/000002605_article.jpg', 'location', 'T1 meublé, 44 m² en duplex dont chambre mezzanine 13 m².\r\nRez-de-chaussée sur cour intérieure calme.\r\n25 Rue du Perdu. Proche métro Croix Rousse et Croix Paquet.\r\nLoyer provision charges (20 €) comprise.'),
(30, 'Logilo', 'azetyu', 'azer', 10100, 52, 550, 'images/logilologement_30.jpg', 'logement', '');

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
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
