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
-- Table structure for table `BTIME`
--

CREATE TABLE `BTIME` (
  `pk_time_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `isheadline` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BTIME`
--

INSERT INTO `BTIME` (`pk_time_id`, `start_time`, `end_time`, `isheadline`) VALUES
(500, '12:00:00', '12:45:00', 0),
(501, '13:00:00', '13:45:00', 0),
(502, '14:00:00', '14:45:00', 0),
(503, '15:00:00', '15:45:00', 0),
(504, '16:00:00', '16:45:00', 0),
(505, '17:00:00', '17:45:00', 0),
(506, '18:00:00', '18:45:00', 0),
(507, '19:00:00', '19:45:00', 0),
(508, '20:00:00', '20:45:00', 0),
(509, '21:00:00', '21:45:00', 0),
(510, '22:00:00', '22:45:00', 0),
(511, '23:00:00', '23:45:00', 1),
(512, '12:15:00', '13:00:00', 0),
(513, '13:15:00', '14:00:00', 0),
(514, '14:15:00', '15:00:00', 0),
(515, '15:15:00', '16:00:00', 0),
(516, '16:15:00', '17:00:00', 0),
(517, '17:15:00', '18:00:00', 0),
(518, '18:15:00', '19:00:00', 0),
(519, '19:15:00', '20:00:00', 0),
(520, '20:15:00', '21:00:00', 0),
(521, '21:15:00', '22:00:00', 0),
(522, '22:15:00', '23:00:00', 0),
(523, '23:15:00', '00:00:00', 1),
(524, '12:30:00', '13:15:00', 0),
(525, '13:30:00', '14:15:00', 0),
(526, '14:30:00', '15:15:00', 0),
(527, '15:30:00', '16:15:00', 0),
(528, '16:30:00', '17:15:00', 0),
(529, '17:30:00', '18:15:00', 0),
(530, '18:30:00', '19:15:00', 0),
(531, '19:30:00', '20:15:00', 0),
(532, '20:30:00', '21:15:00', 0),
(533, '21:30:00', '22:15:00', 0),
(534, '22:30:00', '23:15:00', 0),
(535, '23:30:00', '00:15:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BTIME`
--
ALTER TABLE `BTIME`
  ADD PRIMARY KEY (`pk_time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BTIME`
--
ALTER TABLE `BTIME`
  MODIFY `pk_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=536;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
