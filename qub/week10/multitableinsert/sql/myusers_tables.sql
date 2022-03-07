
CREATE TABLE IF NOT EXISTS `myusers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `myusers`
--
ALTER TABLE `myusers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- AUTO_INCREMENT for table `myusers`
--
ALTER TABLE `myusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;


CREATE TABLE IF NOT EXISTS `myuserstypes` (
  `type_id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `myuserstypes`
--
ALTER TABLE `myuserstypes`
  ADD PRIMARY KEY (`type_id`);
COMMIT;


--
-- Constraints for table `myusers`
--
ALTER TABLE `myusers`
  ADD CONSTRAINT `myusers_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `myuserstypes` (`type_id`);
COMMIT;

