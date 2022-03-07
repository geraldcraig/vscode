-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:44 PM
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
-- Table structure for table `BADDRESS`
--

CREATE TABLE `BADDRESS` (
  `pk_address_id` int(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `embed_google_map` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BADDRESS`
--

INSERT INTO `BADDRESS` (`pk_address_id`, `street`, `city`, `postcode`, `embed_google_map`) VALUES
(200, '42 Botanic Avenue', 'Belfast', 'BT7 1JQ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2311.897782918027!2d-5.9348901841766954!3d54.58817518025801!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486108f084082853%3A0xc6c9faf6bdff8b5a!2sThe%20Belfast%20Empire%20Music%20Hall!5e0!3m2!1sen!2suk!4v1581633731045!5m2!1sen!2suk\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(201, '34 Bedford St', 'Belfast', 'BT2 7FF', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2311.5305784039374!2d-5.933294684237445!3d54.59464508817697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486108f842f3b99b%3A0x5c77cff6815af1c9!2sUlster%20Hall!5e0!3m2!1sen!2suk!4v1581635894275!5m2!1sen!2suk\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>'),
(202, '17 Ormeau Ave', 'Belfast', 'BT2 8HD', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2311.6328382027664!2d-5.9307367842375065!3d54.592843388314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486108f905aeaa9d%3A0x547f5298d34c6ebf!2sLimelight!5e0!3m2!1sen!2suk!4v1581635839731!5m2!1sen!2suk\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\"></iframe>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BADDRESS`
--
ALTER TABLE `BADDRESS`
  ADD PRIMARY KEY (`pk_address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BADDRESS`
--
ALTER TABLE `BADDRESS`
  MODIFY `pk_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
