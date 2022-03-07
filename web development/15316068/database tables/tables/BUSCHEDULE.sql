-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:48 PM
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
-- Table structure for table `BUSCHEDULE`
--

CREATE TABLE `BUSCHEDULE` (
  `pk_user_schedule_id` int(11) NOT NULL,
  `fk_account_id` int(11) NOT NULL,
  `fk_performance_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BUSCHEDULE`
--

INSERT INTO `BUSCHEDULE` (`pk_user_schedule_id`, `fk_account_id`, `fk_performance_id`) VALUES
(37, 2113, 311),
(38, 2113, 344),
(39, 2113, 308),
(40, 2113, 392),
(41, 2113, 349),
(42, 2113, 404),
(43, 2113, 367),
(221, 2158, 311),
(222, 2158, 347),
(223, 2158, 349),
(224, 2158, 359),
(225, 2158, 323),
(226, 2158, 316),
(227, 2158, 405),
(228, 2158, 367),
(275, 2107, 311),
(276, 2107, 347),
(277, 2107, 318),
(278, 2107, 349),
(279, 2107, 359),
(280, 2107, 323),
(281, 2107, 316),
(282, 2107, 367),
(283, 2165, 311),
(284, 2165, 347),
(285, 2165, 349),
(286, 2165, 323),
(287, 2165, 316),
(288, 2165, 367),
(297, 2145, 311),
(298, 2145, 347),
(299, 2145, 318),
(300, 2145, 349),
(301, 2145, 359),
(302, 2145, 323),
(303, 2145, 316),
(304, 2145, 367),
(305, 2168, 311),
(306, 2168, 347),
(307, 2168, 318),
(308, 2168, 349),
(309, 2168, 359),
(310, 2168, 323),
(311, 2168, 316),
(312, 2168, 367),
(313, 2168, 371);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BUSCHEDULE`
--
ALTER TABLE `BUSCHEDULE`
  ADD PRIMARY KEY (`pk_user_schedule_id`),
  ADD KEY `userschedule.performance` (`fk_performance_id`),
  ADD KEY `userschedule.account` (`fk_account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BUSCHEDULE`
--
ALTER TABLE `BUSCHEDULE`
  MODIFY `pk_user_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BUSCHEDULE`
--
ALTER TABLE `BUSCHEDULE`
  ADD CONSTRAINT `userschedule.account` FOREIGN KEY (`fk_account_id`) REFERENCES `BACCOUNT` (`pk_account_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userschedule.performance` FOREIGN KEY (`fk_performance_id`) REFERENCES `BPERFORMANCE` (`pk_performance_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
