
CREATE TABLE IF NOT EXISTS `mysolarsystem` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `mysolarsystem` (`id`, `name`, `description`) VALUES
(5, 'Mercury', 'Mercury is the smallest planet in the Solar System and the closest to the Sun. Its orbit around the Sun takes 87.97 Earth days, the shortest of all the Suns planets.'),
(6, 'Venus', 'Venus is the second planet from the Sun. It is named after the Roman goddess of love and beauty. As the brightest natural object in Earth\'s night sky after the Moon, Venus can cast shadows and can be visible to the naked eye in broad daylight. '),
(7, 'Earth', 'This is planet Earth, also known as \"The Blue Planet\".'),
(8, 'Mars', 'Mars is the fourth planet from the Sun and the second-smallest planet in the Solar System, being larger than only Mercury. In English, Mars carries the name of the Roman god of war and is referred to as the \"Red Planet\".');


--
-- Indexes for table `mysolarsystem`
--
ALTER TABLE `mysolarsystem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `mysolarsystem`
--
ALTER TABLE `mysolarsystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


CREATE TABLE IF NOT EXISTS `mysolarusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `mysolarusers` (`id`, `username`, `userpass`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500');


--
-- Indexes for table `mysolarusers`
--
ALTER TABLE `mysolarusers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `mysolarusers`
--
ALTER TABLE `mysolarusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
