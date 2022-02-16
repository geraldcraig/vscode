--
-- Table structure for table `student_details`
--

CREATE TABLE `student_details` (
  `id` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `student_details`
--
ALTER TABLE `student_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sname` (`sname`);

--
-- AUTO_INCREMENT for table `student_details`
--
ALTER TABLE `student_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class_name` (`class_name`);

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

--
-- Table structure for table `student_enrolments`
--

CREATE TABLE `student_enrolments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for table `student_enrolments`
--
ALTER TABLE `student_enrolments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`);

--
-- AUTO_INCREMENT for table `student_enrolments`
--
ALTER TABLE `student_enrolments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for table `student_enrolments`
--
ALTER TABLE `student_enrolments`
  ADD CONSTRAINT `student_enrolments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_details` (`id`),
  ADD CONSTRAINT `student_enrolments_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `student_classes` (`id`);
COMMIT;




