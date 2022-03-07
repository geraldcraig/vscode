CREATE TABLE IF NOT EXISTS `myoscars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `winner` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9;

INSERT INTO `myoscars` (`id`, `movie`, `year`, `winner`) VALUES
(3, 'The Shape of Winter', 2018, 0),
(5, 'Black Panther', 2019, 0),
(8, 'The Posting', 2018, 0),
(9, 'Phantom Thread', 2018, 0),
(10, 'Get Out', 2018, 0),
(11, 'The Favourite', 2019, 0),
(13, 'Blackkklansman', 2019, 0),
(16, 'Green Book', 2019, 0),
(19, 'Bohemian Rhapsody', 2019, 0),
(20, 'Darkest Hour', 2018, 0),
(21, 'Call me by your name', 2018, 0),
(24, 'Lady Bird', 2018, 0);


