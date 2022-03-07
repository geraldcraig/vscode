-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:45 PM
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
-- Table structure for table `BDATE`
--

CREATE TABLE `BDATE` (
  `pk_date_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BDATE`
--

INSERT INTO `BDATE` (`pk_date_id`, `date`) VALUES
(400, '2020-06-05'),
(401, '2020-06-06'),
(402, '2020-06-07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BDATE`
--
ALTER TABLE `BDATE`
  ADD PRIMARY KEY (`pk_date_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BDATE`
--
ALTER TABLE `BDATE`
  MODIFY `pk_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
