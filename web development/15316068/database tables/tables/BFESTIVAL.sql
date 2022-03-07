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
-- Table structure for table `BFESTIVAL`
--

CREATE TABLE `BFESTIVAL` (
  `pk_fest_id` int(11) NOT NULL,
  `fest_name` varchar(255) NOT NULL,
  `fest_location` varchar(255) NOT NULL,
  `fest_year` int(5) NOT NULL,
  `fest_pagetitle` varchar(255) NOT NULL,
  `fest_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BFESTIVAL`
--

INSERT INTO `BFESTIVAL` (`pk_fest_id`, `fest_name`, `fest_location`, `fest_year`, `fest_pagetitle`, `fest_description`) VALUES
(1, 'B Festival', 'Belfast', 2020, 'Welcome to', '<p style=\"text-align: justify;\"><strong>B Festival</strong>&nbsp;was founded in 2000 by Paddy and Stella Glasgow who developed an annual music festival (2000 &ndash; 2013) into the most award-winning festival in Ireland, celebrating and showcasing the best in new and emerging music from these shores. The festival was established from a need to support and develop homegrown artists at a time when a music industry here was barely in its infancy. Over the years we expanded throughout the creative landscape delivering a host of creative and practical projects and initiatives for the rural area of Mid Ulster.</p>\r\n<p>It&lsquo;s our aim to support and enhance the profile of new and emerging artists from Northern Ireland and beyond while making arts accessible and available to all at a local level. In November 2013 Our long time vision to open the doors to a working music and arts space in Draperstown from which to house our activities while making extra arts activities available at a grassroots level became a reality when a vacant local heritage building was made available. We aim to change lives, strengthen communities and nurture talent by using the arts to develop social, economic and creative opportunities for all members of the community. We developed a plan to bring the building into community use and have established a thriving Creative Hub delivering services tailored to meet the needs of children and their carers, young people, adults and older people and facilitate their participation in the arts, the creative industries and the digital community.</p>\r\n<p>The comprehensive programme of projects and events supports all regardless of community background, social status, age, gender, race or disability and actively targets social exclusion and promotes equality while ensuring that poverty and social status are not barriers to participation in our services.</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BFESTIVAL`
--
ALTER TABLE `BFESTIVAL`
  ADD PRIMARY KEY (`pk_fest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BFESTIVAL`
--
ALTER TABLE `BFESTIVAL`
  MODIFY `pk_fest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
