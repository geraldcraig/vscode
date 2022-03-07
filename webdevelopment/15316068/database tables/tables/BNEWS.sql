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
-- Table structure for table `BNEWS`
--

CREATE TABLE `BNEWS` (
  `news_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BNEWS`
--

INSERT INTO `BNEWS` (`news_id`, `type`, `title`, `content`, `url`, `created`) VALUES
(54, 'Apply!', 'Applications are now open!', 'become part of the festival! Artists can apple through the contact us section in the footer.', 'apply.php', '2020-02-18 17:19:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BNEWS`
--
ALTER TABLE `BNEWS`
  ADD PRIMARY KEY (`news_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BNEWS`
--
ALTER TABLE `BNEWS`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
