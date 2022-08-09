--
-- Table structure for table `mytopalbums`
--

CREATE TABLE `mytopalbums` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `year` int(10) NOT NULL,
  `artist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data for table `mytopalbums`
--

INSERT INTO `mytopalbums` (`id`, `title`, `year`, `artist_id`) VALUES
(1, 'Led Zeppelin IV', 1971, 1),
(2, 'Dark Side of the Moon', 1973, 2),
(3, 'Pet Sounds', 1966, 8),
(4, 'Graceland', 1986, 12),
(5, 'Legend', 1984, 10),
(6, 'Highway 61 Revisited', 1965, 11),
(7, 'Sgt Peppers Lonely Hearts Club Band', 1967, 4),
(8, 'Revolver', 1966, 4),
(9, 'London Calling', 1979, 6),
(10, 'Physical Graffiti', 1975, 1);

--
-- Indexes for table `mytopalbums`
--

ALTER TABLE `mytopalbums`
  ADD PRIMARY KEY (`id`);
COMMIT;

--
-- AUTO_INCREMENT for table `mytopalbums`
--

ALTER TABLE `mytopalbums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

--
-- Table structure for table `mytopartists`
--

CREATE TABLE `mytopartists` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data for table `mytopartists`
--

INSERT INTO `mytopartists` (`id`, `name`) VALUES
(1, 'Led Zeppelin'),
(2, 'Pink Floyd'),
(3, 'David Bowie'),
(4, 'The Beatles'),
(5, 'Fleetwood Mac'),
(6, 'The Clash'),
(7, 'Radiohead'),
(8, 'The Beach Boys'),
(9, 'Bruce Springsteen'),
(10, 'Bob Marley and the Wailers'),
(11, 'Bob Dylan'),
(12, 'Paul Simon'),
(13, 'The Doors'),
(14, 'The Rolling Stones');

--
-- Indexes for table `mytopartists`
--
ALTER TABLE `mytopartists`
  ADD PRIMARY KEY (`id`);
COMMIT;

--
-- AUTO_INCREMENT for table `mytopartists`
--
ALTER TABLE `mytopartists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;