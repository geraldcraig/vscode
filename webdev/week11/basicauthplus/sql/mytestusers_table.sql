--
-- Table structure for table `mytestusers`
--

CREATE TABLE `mytestusers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mytestusers`
--

INSERT INTO `mytestusers` (`id`, `username`, `userpass`) VALUES
(1, 'admin', 'admin123'),
(2, 'bob', 'bob123');

--
-- Indexes for table `mytestusers`
--
ALTER TABLE `mytestusers`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for table `mytestusers`
--
ALTER TABLE `mytestusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

