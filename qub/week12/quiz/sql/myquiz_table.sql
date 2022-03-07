

--
-- Table structure for table `myquiz`
--

CREATE TABLE `myquiz` (
  `id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myquiz`
--

INSERT INTO `myquiz` (`id`, `content`, `answer`, `mark`) VALUES
(1, 'Who was the first man to fly around the earth?', 'Gargarin', 1),
(2, 'On which hemisphere were most dinosaur skeletons found?', 'Northern', 1),
(3, 'What colour is cobalt?', 'Blue', 1),
(4, 'Which device do we use to look at the stars?', 'Telescope', 1),
(5, 'Which unit indicates light intensity?', 'Candela', 2),
(6, 'What is the lightest existing metal?', 'Aluminium', 2),
(7, 'What did Alexander Fleming discover?', 'Penicillin', 2),
(8, 'Which planet is nearest the sun?', 'Mercury', 3),
(9, 'In what year was Google launched on the web?', '1998', 3),
(10, 'How many stars are on the American flag?', '50', 3),
(11, 'How long in miles is the Great Wall of China?', '4000', 3);


--
-- Indexes for table `myquiz`
--
ALTER TABLE `myquiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `myquiz`
--
ALTER TABLE `myquiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

