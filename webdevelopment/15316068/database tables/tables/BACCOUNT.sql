-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 08:43 PM
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
-- Table structure for table `BACCOUNT`
--

CREATE TABLE `BACCOUNT` (
  `pk_account_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fk_privileges_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BACCOUNT`
--

INSERT INTO `BACCOUNT` (`pk_account_id`, `username`, `email`, `password`, `fk_privileges_id`) VALUES
(2098, 'mattwalsh', 'admin@bfestival.com', '$2y$10$8XS3fneYkmNnZ/7lptlw3..VHPlqaLTjPJJm2Kkf/z0S0afAokiNy', 1500),
(2101, 'bombaybicycleclub', 'bombaybicycleclub@bfestival.com', '$2y$10$bUvSGn4AeaIQaepFHyK5nOvxYHhbODRvekphVn5.XUwxKzlpjjHf6', 1501),
(2106, 'gascanruckus', 'gascanruckus@bfestival.com', '$2y$10$.oOHc93LUDIM/y3Fdm/h7.DHg0RyxiycUT1PznzV2APTeFY5ho6Ru', 1501),
(2107, 'testuser', 'testuser@bfestival.com', '$2y$10$XfsE.jUh4alwVt.A42gI0up15uiCPwTbTonFvg0AL0RCICKy3Q62S', 1502),
(2108, 'thebeths', 'thebeths@bfestival.com', '$2y$10$C1jBSVKrQYQfz5mjF1ZOfO4SgiGefXdp/lENjDcXdnKliTGfpaWAC', 1501),
(2109, 'spanishlovesongs', 'spanishlovesongs@bfestival.com', '$2y$10$Z8JLzTT5PwXcGvc9fyHzBejrWINfefwUX6myWqb/HAAS/0D297OLa', 1501),
(2110, 'emptylungs', 'emptylungs@bfestival.com', '$2y$10$jRTK6oXBdtYwDBRimh074u8u86BNYAzrhzKeXOWe.r9UV/fTP5fla', 1501),
(2111, 'pocketbilliards', 'pocketbilliards@bfestival.com', '$2y$10$sRS8t02PpOUgALaCvoJgCOC3qOAk3eONqFodwpp2.oWMem1Bv/v0q', 1501),
(2113, 'normaluser', 'normaluser@bfestival.com', '$2y$10$ogBDMSHsFYgfcGLW0yS.6eDLBVjizJ0FDRNmk4o9mkCwHlzqLWK8q', 1502),
(2116, 'themenzingers', 'themenzingers@bfestival.com', '$2y$10$Fwr9G7ilVYxvRrxLtI7SFObcDqbfaLz4tTlABf5iAUP/JSh7FqNcm', 1501),
(2117, 'badfit', 'badfit@bfestival.com', '$2y$10$Mp1fpuDrcvpKGrr9C5pDL.gNqQrmcCxHdBflmYqqY/0eW4wzD7O4e', 1501),
(2145, 'mwalsh', 'mwalsh28@qub.ac.uk', '$2y$10$OGSFNIyeu8h7zbtCDstKgupN462SwmHQZx4TdgYw5amddfS2k2XMq', 1502),
(2158, 'dummyuser', 'dummyuser@bfestival.com', '$2y$10$TGuVF8LPaG6eQWWOQjFI8.hfytW.VdHLw4nHqsNMOz4qpNoOIM39q', 1502),
(2164, 'deleteme', 'mysticrecords@hotmail.com', '$2y$10$wPCG5VPvMh./Uq/MbLbN/.vLnt3pC9oW0SnQSDiqL9LsOKmPpfUBm', 1502),
(2165, 'sarahnoir', 'sarah.breen@hotmail.com', '$2y$10$tUjYv6.HkBJXEM.Nk71xtuuGAU67FUvj/mkuxEt/1zMnKNfnx4HcG', 1502),
(2167, 'slowthai', 'mysticrecords@yahoo.com', '$2y$10$AiUl0KVd1FKT.n29I0ra.uKT3KYlKK1zTroQPuFTgFOUsHPzFhZHe', 1501),
(2168, 'percical_mmcv', 'mattmcv@icloud.com', '$2y$10$nd/2SoovlcxzfhVBgxiSi.DfDUwI0AwuTGmSJA20Arhh9sI00tA1i', 1502),
(2169, 'philkieran', 'philkieran@bfestival.com', '$2y$10$8RpKk5UKcqLHgKp7HHEEtuCyZ4gSJHypZ28OHnGLoCs84JJ7deCp2', 1501);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BACCOUNT`
--
ALTER TABLE `BACCOUNT`
  ADD PRIMARY KEY (`pk_account_id`),
  ADD KEY `account.privilege` (`fk_privileges_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BACCOUNT`
--
ALTER TABLE `BACCOUNT`
  MODIFY `pk_account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2170;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BACCOUNT`
--
ALTER TABLE `BACCOUNT`
  ADD CONSTRAINT `account.privilege` FOREIGN KEY (`fk_privileges_id`) REFERENCES `BPRIVILEGES` (`pk_privileges_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
