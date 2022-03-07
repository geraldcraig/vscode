-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:49 PM
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
-- Table structure for table `BVENUE`
--

CREATE TABLE `BVENUE` (
  `pk_venue_id` int(11) NOT NULL,
  `venue_image` varchar(255) NOT NULL,
  `venue_name` varchar(255) NOT NULL,
  `venue_title` varchar(255) NOT NULL,
  `venue_description` text NOT NULL,
  `capacity` int(11) NOT NULL,
  `fk_fest_id` int(11) NOT NULL,
  `fk_address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BVENUE`
--

INSERT INTO `BVENUE` (`pk_venue_id`, `venue_image`, `venue_name`, `venue_title`, `venue_description`, `capacity`, `fk_fest_id`, `fk_address_id`) VALUES
(100, 'theempire_1581801102.jpg', 'The Empire Music Hall', '<p>3 floors of bars and music, including blues, rock, jazz and traditional Irish acts.</p>', '<p>With it\'s classic fittings and firm place in the heart of Belfast\'s nightlife you\'d be forgiven for thinking the Empire has been around forever. Yet it\'s a practically mature 27 years old, having first opened its doors back in 1987. It would soon gain a reputation as one of the country\'s premier live music bars, thanks mostly to the spectacular Music Hall, arguably one of the country\'s finest small/medium size venues thanks to it\'s beginnings as a Victorian era church, both visually impressive and acoustically sound.</p>\r\n<p>Over the years the Music Hall would attract artists of all forms and from all over the world, from Sigur R&ouml;s who played their debut Irish date as a support band in 2000 to local heroes Snow Patrol, who played a packed out show just weeks before Run turned them into global hyperstars.&nbsp; Brian Kennedy played the opening night, setting the scene for any amount of distinguished songwriters, from Westlife\'s Bryan McFadden through to firebrand Billy Bragg, from REM\'s Peter Buck to Country and Western legend Nanci Griffith.</p>\r\n<p>It\'s had a reputation for some of the great cult bands of the last 20 years, from Death in Vegas, to Lambchop, from the Frames to Broken Social Scene. It\'s not just the international stars that have played and loved the Empire; Ash, the Divine Comedy, the Answer and Duke Special have all played here before moving on to bigger and bolder arenas.</p>\r\n<p>It\'s a tradition that continues, with the likes of General Fiasco and Two Door Cinema Club cutting their teeth at the regular GIFTED! local band showcase.&nbsp; And if music isnt your thing there\'s always the consistently popular comedy club. Best known for providing a launch-pad for the Hole in the Wall gang, laughter fans can catch the best of the touring circuit, which in the past has included Ardal O\'Hanlon Dara O\'Briain, Lee Evans and Michael McIntyre. The famed Belfast \'crack\' is on display, courtesy of your resident hosts, Colin Murphy and Jake O\'Kane. It\'s not for the faint of heart. And that\'s only half the story.&nbsp; The Empire Bar is one of Belfast\'s best loved drinking holes, with it\'s cinema style big screen for all the major sports events, well-loved pub grub menu and vintage wall displays. Traditional without being contrived, the bar attracts people from all walks of life, from lecture dodging students to the after work set, old regulars to the passing tourists, all their for a bit of local colour.</p>\r\n<p>A private outdoors area caters for the smokers, complete with heaters for the winter and widescreen TV so you don\'t have to miss a minute, while a full programme of evening entertainment is available, much of it free. Sunday night sees the legendary Ken Haddock\'s Supper Club, with complementary nibbles at Belfast\'s longest running weekly residency, while Rab McCullough brings live blues to a Thursday night. With Salsa nights, pub quizzes and week round drinks promotions, there\'s something for everyone at the Empire.</p>', 500, 1, 200),
(101, 'theulsterhall_1581801605.jpg', 'The Ulster Hall', '<p>\'Grand Dame of Bedford Street\'</p>', '<p>The Ulster Hall is a concert hall and grade A listed building in Belfast, Northern Ireland. Situated on Bedford Street in Belfast city centre, the hall hosts concerts, classical recitals, craft fairs and political party conferences.</p>\r\n<p>The iconic Ulster Hall, locally called the \'Grand Dame of Bedford Street\', has housed many famous faces, lyrics and instruments and featured readings by Charles Dickens and hit performances by Led Zeppelin.</p>\r\n<p>Since 1862, it has enriched Belfast\'s cultural scene, and due to its lively atmosphere, it continues to be the venue of choice for many tourists and residents alike.</p>', 1200, 1, 201),
(102, 'thelimelight_1581801720.jpg', 'The Limelight', '<p>This no-frills nightclub and live music venue has been staging rock &amp; indie greats since the 1980s.</p>', '<p>Limelight nightclub and adjoining Dome bar were first opened in 1987 by Patrick Lennon who had previously owned the Harp Bar based in Hill Street, Belfast.</p>\r\n<p>Growing over the years it eventually took over the adjoining building which was a premises owned by a spring and airbrake business (hence the \"Spring and Airbrake\" venue name).&nbsp;</p>\r\n<p>In 2010 then owners, CDC Leisure, went into administration.&nbsp; In late 2011, the Limelight complex was purchased by Irish live music promoters MCD &amp; Shine Productions.&nbsp;</p>\r\n<p>In late 2012 following a major refurbishment, the individual bars were rebranded, with the Spring and Airbrake being renamed to Limelight 1, Katy Daly\'s becoming Katy\'s Bar and the original Limelight venue becoming known as Limelight 2.</p>', 800, 1, 202);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BVENUE`
--
ALTER TABLE `BVENUE`
  ADD PRIMARY KEY (`pk_venue_id`),
  ADD KEY `venue.festival` (`fk_fest_id`),
  ADD KEY `venue.address` (`fk_address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BVENUE`
--
ALTER TABLE `BVENUE`
  MODIFY `pk_venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BVENUE`
--
ALTER TABLE `BVENUE`
  ADD CONSTRAINT `venue.address` FOREIGN KEY (`fk_address_id`) REFERENCES `BADDRESS` (`pk_address_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venue.festival` FOREIGN KEY (`fk_fest_id`) REFERENCES `BFESTIVAL` (`pk_fest_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
