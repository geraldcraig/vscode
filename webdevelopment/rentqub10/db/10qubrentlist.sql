

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `10qubrentlist` (
  `id` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `town` varchar(300) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(250) NOT NULL,
  `beds` int(2) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `10qubrentlist`
--

INSERT INTO `10qubrentlist` (`id`, `address`, `type`, `town`, `description`, `image`, `beds`, `price`) VALUES
(1, '4 Shandon Parklane Road', 'Detached', 'Stranmillis', 'This this exclusive development\r\nof only three detached family\r\nhomes offers fantastic\r\naccommodation over three floors\r\nto suit most family\r\nrequirements.\r\n', '4415000.jpg', 3, 1100),
(2, '89 English Street', 'Terrace', 'Lisburn Rd', 'Accommodation comprises of a\nlarge reception, kitchen/dining,\nutility, ground floor WC, 3\nbedrooms (master en-suite) and\nfamily bathroom.\n', '7294980.jpg', 4, 1500),
(3, '208 Belfast Rd', 'Detached', 'Malone', 'We are delighted to offer this\nbeautiful detached bungalow to\nthe rental market, which is\nsituated just outside Armagh\nCity.\n', '6542715.jpg', 2, 1090),
(4, '3 Dublin Street', 'Terrace', 'Holylands', 'Terrace, in a closed Crescent,\nbuilt in the early 20th century.\nThe view is towards the Ormeau rd.\n', '1332594.jpg', 2, 650),
(5, '25 The Stand ', 'Semi-Detached', 'Lisburn Rd', 'The latest and most\nprestigious residential\ndevelopment overlooking the lively road.', '5839975.jpg', 2, 800);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `10qubrentlist`
--
ALTER TABLE `10qubrentlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `10qubrentlist`
--
ALTER TABLE `10qubrentlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;


