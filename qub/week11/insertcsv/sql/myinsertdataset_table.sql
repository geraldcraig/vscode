
--
-- Table structure for table `myinsertdataset`
--

CREATE TABLE IF NOT EXISTS `myinsertdataset` (
  `id` int(11) NOT NULL,
  `kagglelink` varchar(250) NOT NULL,
  `rating` int(11) NOT NULL,
  `totalcols` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `myinsertdataset`
--
ALTER TABLE `myinsertdataset`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `myinsertdataset`
--
ALTER TABLE `myinsertdataset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;
COMMIT;

