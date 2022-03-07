-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:46 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mwalsh28`
--

-- --------------------------------------------------------

--
-- Table structure for table `BINSTRUMENT`
--

CREATE TABLE `BINSTRUMENT` (
  `pk_instrument_id` int(11) NOT NULL,
  `instrument` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BINSTRUMENT`
--

INSERT INTO `BINSTRUMENT` (`pk_instrument_id`, `instrument`) VALUES
(900, 'Vocals'),
(901, 'Backing Vocals'),
(902, 'Guitar'),
(903, 'Lead Guitar'),
(904, 'Bass'),
(905, 'Piano/Keys'),
(906, 'Percussion'),
(907, 'Drums'),
(908, 'Brass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BINSTRUMENT`
--
ALTER TABLE `BINSTRUMENT`
  ADD PRIMARY KEY (`pk_instrument_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BINSTRUMENT`
--
ALTER TABLE `BINSTRUMENT`
  MODIFY `pk_instrument_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=910;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
