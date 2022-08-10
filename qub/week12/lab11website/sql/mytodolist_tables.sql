

--
-- Table structure for table `mytodolist`
--

CREATE TABLE IF NOT EXISTS `mytodolist` (
  `id` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `datedue` date NOT NULL,
  `type` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `imgpath` varchar(150) NOT NULL DEFAULT 'Placeholder.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mytodolist`
--

INSERT INTO `mytodolist` (`id`, `info`, `datedue`, `type`, `details`, `imgpath`) VALUES
(1, 'Buy some flowers', '2022-01-10', 'family', 'Mum\'s birthday flowers.', 'Placeholder.png'),
(2, 'Presentation on stats', '2022-01-18', 'work', 'Intro to machine learning classifiers.', 'Placeholder.png'),
(19, 'Get car serviced', '2022-01-19', 'misc', 'Get service done prior to MOT test.', 'Placeholder.png'),
(24, 'Buy milk', '2022-01-23', 'family', '2 litres, semi-skimmed', 'glass_of_milk.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mytodolist`
--
ALTER TABLE `mytodolist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `mytodolist`
--
ALTER TABLE `mytodolist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

