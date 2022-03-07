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
-- Table structure for table `BMEMBER`
--

CREATE TABLE `BMEMBER` (
  `pk_member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `fk_instrument_id` int(11) NOT NULL,
  `fk_artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BMEMBER`
--

INSERT INTO `BMEMBER` (`pk_member_id`, `member_name`, `fk_instrument_id`, `fk_artist_id`) VALUES
(848, 'Pando', 907, 680),
(856, 'Danny McConaghie', 902, 680),
(858, 'Megan O\'Kane', 904, 680),
(859, 'Grace Loughrey', 902, 680),
(860, 'Jack Steadman', 902, 672),
(861, 'Jack Steadman', 900, 672),
(862, 'Jamie MacColl', 902, 672),
(863, 'Suren de Saram', 907, 672),
(864, 'Ed Nash', 904, 672),
(865, 'Kevin Jones', 900, 677),
(866, 'Kevin Jones', 902, 677),
(867, 'Mykie Rowan', 907, 677),
(868, 'Conor Langan', 904, 677),
(869, 'Michael Woods', 900, 674),
(870, 'Michael Woods', 903, 674),
(871, 'Declan McBride', 902, 674),
(872, 'Conor Langan', 904, 674),
(873, 'Mark McDaid', 907, 674),
(874, 'Chris Savage', 900, 678),
(875, 'Chris Savage', 902, 678),
(876, 'Chuck Neely', 902, 678),
(877, 'Michael Dempsey', 907, 678),
(878, 'Anto Ashe', 904, 678),
(879, 'Stephen Faherty', 905, 678),
(880, 'Matt Rooney', 908, 678),
(881, 'Matthew McCormac', 908, 678),
(882, 'Elaine Sax', 908, 678),
(883, 'Dee Mulholland', 908, 678),
(884, 'Dylan Slocum', 900, 676),
(885, 'Dylan Slocum', 902, 676),
(886, 'Kyle McAulay', 902, 676),
(887, 'Trevor Dietrich', 904, 676),
(888, 'Ruben Duarte', 907, 676),
(889, 'Meredith Van Woert', 905, 676),
(890, 'Tom May', 902, 679),
(891, 'Tom May', 900, 679),
(892, 'Joe Godino', 904, 679),
(893, 'Gregg Barnett', 902, 679),
(894, 'Eric Keen', 907, 679),
(895, 'Elizabeth Stokes', 900, 675),
(896, 'Elizabeth Stokes', 902, 675),
(897, 'Jonathan Pearce', 902, 675),
(898, 'Benjamin Sinclair', 904, 675),
(899, 'Tristan Deck', 907, 675);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BMEMBER`
--
ALTER TABLE `BMEMBER`
  ADD PRIMARY KEY (`pk_member_id`),
  ADD KEY `member.instrument` (`fk_instrument_id`),
  ADD KEY `member.artist` (`fk_artist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BMEMBER`
--
ALTER TABLE `BMEMBER`
  MODIFY `pk_member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=901;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BMEMBER`
--
ALTER TABLE `BMEMBER`
  ADD CONSTRAINT `member.artist` FOREIGN KEY (`fk_artist_id`) REFERENCES `BARTIST` (`pk_artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member.instrument` FOREIGN KEY (`fk_instrument_id`) REFERENCES `BINSTRUMENT` (`pk_instrument_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
