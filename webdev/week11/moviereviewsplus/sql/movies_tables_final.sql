--
-- Table structure for table `movie_genres`
--

CREATE TABLE `movie_genres` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_genres`
--

INSERT INTO `movie_genres` (`id`, `name`) VALUES
(1, 'comedy'),
(2, 'action'),
(3, 'sci-fi'),
(4, 'drama');

--
-- Indexes for table `movie_genres`
--
ALTER TABLE `movie_genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `movie_genres`
--
ALTER TABLE `movie_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `movie_users`
--

CREATE TABLE `movie_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie_users`
--

INSERT INTO `movie_users` (`id`, `username`) VALUES
(1, 'admin'),
(2, 'john');

--
-- Indexes for table `movie_users`
--
ALTER TABLE `movie_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `movie_users`
--
ALTER TABLE `movie_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

-- --------------------------------------------------------

--
-- Table structure for table `movie_reviews`
--

CREATE TABLE `movie_reviews` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `genre_type` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `review` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movie_reviews`
--

INSERT INTO `movie_reviews` (`id`, `user`, `genre_type`, `title`, `review`) VALUES
(12, 1, 1, 'So this is 40', 'Very funny but could relate to it.'),
(22, 2, 3, 'Cloud Atlas', 'Biggest load of crap.'),
(34, 1, 4, 'Snowden', 'Very well made movie, very well acted, and directed.'),
(41, 1, 2, 'Die Hard 5 ', 'franchise needs shut down'),
(49, 2, 4, 'Whiplash', 'This movie was far better than the trailer made it look.');


--
-- Indexes for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_type` (`genre_type`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for table `movie_reviews`
--
ALTER TABLE `movie_reviews`
  ADD CONSTRAINT `movie_reviews_ibfk_1` FOREIGN KEY (`genre_type`) REFERENCES `movie_genres` (`id`),
  ADD CONSTRAINT `movie_reviews_ibfk_2` FOREIGN KEY (`user`) REFERENCES `movie_users` (`id`);
COMMIT;

