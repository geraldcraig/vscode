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
-- Table structure for table `BRELEASE`
--

CREATE TABLE `BRELEASE` (
  `pk_release_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `release_month` varchar(255) NOT NULL,
  `release_year` varchar(255) NOT NULL,
  `img` varchar(500) NOT NULL,
  `fk_artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BRELEASE`
--

INSERT INTO `BRELEASE` (`pk_release_id`, `title`, `release_month`, `release_year`, `img`, `fk_artist_id`) VALUES
(730, 'Everything Else Has Gone Wrong', 'January', '2020', 'eehgw_1582285589.jpg', 672),
(731, 'So Long, See You Tomorrow', 'May', '2014', 'slsyt_1582285674.jpg', 672),
(732, 'A Different Kind Of Fix', 'January', '2012', 'adkof_1582285935.jpg', 672),
(733, 'Medicine/Bernadette Double A Side', 'October', '2015', 'm:b_1582286359.jpg', 677),
(734, 'From Russia With A Lack Of Love/Cabin Fever 7\"', 'August', '2014', 'frwalol_1582286503.jpg', 677),
(735, 'Medicine/Bernadette Double A Side', 'February', '2013', 'standup_1582286568.jpg', 677),
(736, 'In The City', 'February', '2019', 'inthecity_1582290933.jpg', 680),
(737, 'Strong Forever', 'June', '2016', 'strongforev_1582291000.jpg', 680),
(738, 'Have A Coffee Frank', 'August', '2016', 'hacf_1582291291.jpg', 674),
(739, 'Narrow Defeats And Bitter Victories', 'January', '2016', 'ndbv_1582291310.jpg', 674),
(740, 'Troubles Edge', 'March', '2019', 'pbte_1582291998.jpg', 678),
(741, 'My Next Last Time', 'February', '2019', 'mnlt_1582292064.jpg', 678),
(742, 'Viva El Santo', 'December', '2018', 'ves_1582292120.jpg', 678),
(743, 'Schmaltz', 'March', '2018', 'spl_1582292891.jpg', 676),
(744, 'Giant Sings The Blues', 'March', '2015', 'gstb_1582292973.jpg', 676),
(745, 'Brave Faces Everyone', 'February', '2020', 'bfe_1582293048.jpg', 676),
(746, 'Hello Exile', 'October', '2019', 'he_1582293170.jpg', 679),
(747, 'After The Party', 'February', '2017', 'atp_1582293217.jpg', 679),
(748, 'Rented World', 'April', '2014', 'rw_1582293254.jpg', 679),
(749, 'On The Impossible Past', 'April', '2012', 'otip_1582293300.jpg', 679),
(750, 'Future Me Hates Me', 'August', '2018', 'fmhm_1582294391.jpg', 675);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BRELEASE`
--
ALTER TABLE `BRELEASE`
  ADD PRIMARY KEY (`pk_release_id`),
  ADD KEY `release.artist` (`fk_artist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BRELEASE`
--
ALTER TABLE `BRELEASE`
  MODIFY `pk_release_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=751;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BRELEASE`
--
ALTER TABLE `BRELEASE`
  ADD CONSTRAINT `release.artist` FOREIGN KEY (`fk_artist_id`) REFERENCES `BARTIST` (`pk_artist_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
