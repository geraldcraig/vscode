

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";




CREATE TABLE `mylist09` (
  `id` int(11) NOT NULL,
  `info` varchar(100) NOT NULL,
  `datedue` date NOT NULL,
  `type` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `mylist09` (`id`, `info`, `datedue`, `type`, `details`) VALUES
(45, 'Happy days', '2019-07-12', 'work', 'I am completely changing this text in order to demonstrate the edit process. sdfjnmwehjrdf'),
(16, 'johns birthday', '2019-12-10', 'family', 'Need to Johns present.'),
(5, 'chrimbo presents', '2019-12-11', 'family', 'Need to buy christmas presents for family.'),
(43, 'driving test', '2020-01-30', 'misc', 'Go to test centre in boucher road.'),
(34, 'Book holiday', '2020-01-29', 'family', 'Need to book a summer holiday for 2020.'),
(10, 'Sophie off', '2019-12-19', 'family', 'Sophie is off school for Christmas holidays.');


ALTER TABLE `mylist09`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `mylist09`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;


