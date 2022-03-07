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
-- Table structure for table `BGENRE`
--

CREATE TABLE `BGENRE` (
  `pk_genre_id` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BGENRE`
--

INSERT INTO `BGENRE` (`pk_genre_id`, `genre`) VALUES
(1000, 'Alternative'),
(1001, 'Punk'),
(1002, 'Rock'),
(1003, 'Indie'),
(1004, 'Electronic'),
(1005, 'Ska'),
(1006, 'Punk-Rock'),
(1007, 'Metal'),
(1008, 'Jazz'),
(1009, 'Pop'),
(1010, 'Hip-Hop'),
(1011, 'Experimental');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BGENRE`
--
ALTER TABLE `BGENRE`
  ADD PRIMARY KEY (`pk_genre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BGENRE`
--
ALTER TABLE `BGENRE`
  MODIFY `pk_genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1012;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
