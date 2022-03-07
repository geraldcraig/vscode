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
-- Table structure for table `BAPPLICATION`
--

CREATE TABLE `BAPPLICATION` (
  `pk_application_id` int(11) NOT NULL,
  `apply_name` varchar(255) NOT NULL,
  `apply_email` varchar(255) NOT NULL,
  `apply_bio` text NOT NULL,
  `apply_image` varchar(500) NOT NULL,
  `apply_url` varchar(1000) NOT NULL,
  `apply_video` varchar(1000) NOT NULL,
  `fk_genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BAPPLICATION`
--

INSERT INTO `BAPPLICATION` (`pk_application_id`, `apply_name`, `apply_email`, `apply_bio`, `apply_image`, `apply_url`, `apply_video`, `fk_genre_id`) VALUES
(111, 'Turnover', 'turnover@bfestival.com', 'Turnover began in 2009. In 2012, they signed to Run for Cover Records.[6] Since then, they have released two extended plays, two splits, and four full-length albums. In December 2011 and January 2012, the band went on a winter tour with True Things.[7] In 2012, the band went on a summer tour with Citizen and Light Years.[8]\r\n\r\nSoon after their summer tour, the band went on a seven date tour in August with Young Statues and PJ Bond.[9] In June 2013, the band went on a co-headlining tour with Koji, supported by Ivy League, and Have Mercy.[10] In February 2014, the band went on an east coast tour with Turnstile, Diamond Youth, Angel Dust, and Blind Justice.[11] In March 2014, the band went on tour with I Am the Avalanche, The Swellers, and Diamond Youth. In May 2014, the band went on two UK tours. One tour was with I Am the Avalanche, Major League, and Moose Blood. The other tour was with Major League and Nai Harvest.[12] In fall of 2014, the band went on a tour with Light Years and Malfunction.[13]\r\n\r\nThe band went on a 25 date tour in March and April 2015, supporting New Found Glory.[14] In March 2015, the band announced plans to release their second studio album, titled Peripheral Vision in May via Run For Cover. The album\'s lead single, \"Cutting My Fingers Off\", came out on March 16, 2015.[15] The album was released on May 4, 2015.[1]\r\n\r\nThe band continued as a three-piece, with a fill-in lead guitarist joining them for touring commitments. The band\'s third album, Good Nature, was announced for an August 2017 release days later. The lead single, \"Super Natural,\" was released to YouTube and streaming services on the same day. The album was produced by Will Yip and released on Run for Cover.[16]', 'turnover_1583695812.png', 'https://www.turnovermusic.net/', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/Q34dZ6VmI04\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1006),
(112, 'Mojo Fury', 'mojofury@bfestival.com', 'Originally a three-piece, the band\'s singer/drummer, Michael Mormecha moved out from behind the kit in 2009 and are now a four-piece.[3] The current lineup is Michael Mormecha (lead vocals, guitars), James Lyttle (guitars, vocals, keyboards), Ciaran McGreevy (bass guitar) and Andrew Kearton (drums).\r\n\r\nAt the end of April 2010, the band released an \'early album version\' of \"Deep Fish Tank (Factory Settings)\" as a free download on their bandcamp site.[4][5] In May 2011 they released their debut album Visiting Hours of Traveling Circus.[6]', 'Mojo_Fury_1583696037.jpg', 'https://en-gb.facebook.com/mojofuryband/', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JB4uitUKdU4\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 1002);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BAPPLICATION`
--
ALTER TABLE `BAPPLICATION`
  ADD PRIMARY KEY (`pk_application_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BAPPLICATION`
--
ALTER TABLE `BAPPLICATION`
  MODIFY `pk_application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
