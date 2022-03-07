-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:47 PM
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
-- Table structure for table `BPRIVILEGES`
--

CREATE TABLE `BPRIVILEGES` (
  `pk_privileges_id` int(11) NOT NULL,
  `privilege_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BPRIVILEGES`
--

INSERT INTO `BPRIVILEGES` (`pk_privileges_id`, `privilege_name`) VALUES
(1500, 'ADMIN'),
(1501, 'ARTIST'),
(1502, 'PUBLIC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BPRIVILEGES`
--
ALTER TABLE `BPRIVILEGES`
  ADD PRIMARY KEY (`pk_privileges_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BPRIVILEGES`
--
ALTER TABLE `BPRIVILEGES`
  MODIFY `pk_privileges_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1503;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
