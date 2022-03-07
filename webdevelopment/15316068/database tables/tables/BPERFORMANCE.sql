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
-- Table structure for table `BPERFORMANCE`
--

CREATE TABLE `BPERFORMANCE` (
  `pk_performance_id` int(11) NOT NULL,
  `fk_venue_id` int(11) NOT NULL,
  `fk_time_id` int(11) NOT NULL,
  `fk_date_id` int(11) NOT NULL,
  `is_taken` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BPERFORMANCE`
--

INSERT INTO `BPERFORMANCE` (`pk_performance_id`, `fk_venue_id`, `fk_time_id`, `fk_date_id`, `is_taken`) VALUES
(300, 100, 500, 400, 0),
(301, 100, 501, 400, 0),
(302, 100, 502, 400, 0),
(303, 100, 503, 400, 0),
(304, 100, 504, 400, 0),
(305, 100, 505, 400, 0),
(306, 100, 506, 400, 0),
(307, 100, 507, 400, 0),
(308, 100, 508, 400, 0),
(309, 100, 509, 400, 0),
(310, 100, 510, 400, 0),
(311, 100, 511, 400, 1),
(312, 100, 500, 401, 0),
(313, 100, 501, 401, 0),
(314, 100, 502, 401, 0),
(315, 100, 503, 401, 0),
(316, 100, 504, 401, 1),
(317, 100, 505, 401, 0),
(318, 100, 506, 401, 1),
(319, 100, 507, 401, 0),
(320, 100, 508, 401, 0),
(321, 100, 509, 401, 0),
(322, 100, 510, 401, 0),
(323, 100, 511, 401, 1),
(324, 100, 500, 402, 0),
(325, 100, 501, 402, 0),
(326, 100, 502, 402, 0),
(327, 100, 503, 402, 0),
(328, 100, 504, 402, 0),
(329, 100, 505, 402, 0),
(330, 100, 506, 402, 0),
(331, 100, 507, 402, 0),
(332, 100, 508, 402, 0),
(333, 100, 509, 402, 0),
(334, 100, 510, 402, 0),
(335, 100, 511, 402, 0),
(336, 101, 512, 400, 0),
(337, 101, 513, 400, 0),
(338, 101, 514, 400, 0),
(339, 101, 515, 400, 0),
(340, 101, 516, 400, 0),
(341, 101, 517, 400, 0),
(342, 101, 518, 400, 0),
(343, 101, 519, 400, 0),
(344, 101, 520, 400, 0),
(345, 101, 521, 400, 0),
(346, 101, 522, 400, 0),
(347, 101, 523, 400, 1),
(348, 101, 512, 401, 0),
(349, 101, 513, 401, 1),
(350, 101, 514, 401, 0),
(351, 101, 515, 401, 0),
(352, 101, 516, 401, 0),
(353, 101, 517, 401, 0),
(354, 101, 518, 401, 0),
(355, 101, 519, 401, 0),
(356, 101, 520, 401, 0),
(357, 101, 521, 401, 0),
(358, 101, 522, 401, 0),
(359, 101, 523, 401, 1),
(360, 101, 512, 402, 0),
(361, 101, 513, 402, 0),
(362, 101, 514, 402, 0),
(363, 101, 515, 402, 0),
(364, 101, 516, 402, 0),
(365, 101, 517, 402, 0),
(366, 101, 518, 402, 0),
(367, 101, 519, 402, 1),
(368, 101, 520, 402, 0),
(369, 101, 521, 402, 0),
(370, 101, 522, 402, 0),
(371, 101, 523, 402, 1),
(372, 102, 524, 400, 0),
(373, 102, 525, 400, 0),
(374, 102, 526, 400, 0),
(375, 102, 527, 400, 0),
(376, 102, 528, 400, 0),
(377, 102, 529, 400, 0),
(378, 102, 530, 400, 0),
(379, 102, 531, 400, 0),
(380, 102, 532, 400, 0),
(381, 102, 533, 400, 0),
(382, 102, 534, 400, 0),
(383, 102, 535, 400, 0),
(384, 102, 524, 401, 0),
(385, 102, 525, 401, 0),
(386, 102, 526, 401, 0),
(387, 102, 527, 401, 0),
(388, 102, 528, 401, 0),
(389, 102, 529, 401, 0),
(390, 102, 530, 401, 0),
(391, 102, 531, 401, 0),
(392, 102, 532, 401, 0),
(393, 102, 533, 401, 0),
(394, 102, 534, 401, 0),
(395, 102, 535, 401, 0),
(396, 102, 524, 402, 0),
(397, 102, 525, 402, 0),
(398, 102, 526, 402, 0),
(399, 102, 527, 402, 0),
(400, 102, 528, 402, 0),
(401, 102, 529, 402, 0),
(402, 102, 530, 402, 0),
(403, 102, 531, 402, 0),
(404, 102, 532, 402, 0),
(405, 102, 533, 402, 0),
(406, 102, 534, 402, 0),
(407, 102, 535, 402, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BPERFORMANCE`
--
ALTER TABLE `BPERFORMANCE`
  ADD PRIMARY KEY (`pk_performance_id`),
  ADD KEY `performance.venue` (`fk_venue_id`),
  ADD KEY `performance.date` (`fk_date_id`),
  ADD KEY `performance.time` (`fk_time_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BPERFORMANCE`
--
ALTER TABLE `BPERFORMANCE`
  MODIFY `pk_performance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BPERFORMANCE`
--
ALTER TABLE `BPERFORMANCE`
  ADD CONSTRAINT `performance.date` FOREIGN KEY (`fk_date_id`) REFERENCES `BDATE` (`pk_date_id`),
  ADD CONSTRAINT `performance.time` FOREIGN KEY (`fk_time_id`) REFERENCES `BTIME` (`pk_time_id`),
  ADD CONSTRAINT `performance.venue` FOREIGN KEY (`fk_venue_id`) REFERENCES `BVENUE` (`pk_venue_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
