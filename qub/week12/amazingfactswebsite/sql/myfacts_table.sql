

--
-- Table structure for table `myfacts`
--

CREATE TABLE IF NOT EXISTS `myfacts` (
  `id` int(11) NOT NULL,
  `fact` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myfacts`
--

INSERT INTO `myfacts` (`id`, `fact`) VALUES
(1, 'The 100 folds in a chef\'s toque are said to represent 100 ways to cook an egg.'),
(8, 'Some cats are allergic to humans.'),
(11, 'Volvo gave away the 1962 patent for their revolutionary three-point seat belt for free, in order to save lives.'),
(12, 'David Bowie\'s eyes are not different colours.'),
(28, 'VARCHAR shouldn\'t be more than 255 characters.');

--
-- Indexes for table `myfacts`
--
ALTER TABLE `myfacts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `myfacts`
--
ALTER TABLE `myfacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

