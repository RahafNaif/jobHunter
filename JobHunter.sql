-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2021 at 07:23 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `JobHunter`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_ID` int(11) NOT NULL,
  `jobSeeker_email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `applay_JID` int(11) NOT NULL,
  `statuss` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_ID`, `jobSeeker_email`, `date`, `time`, `applay_JID`, `statuss`) VALUES
(19, 'naif@gmail.com', '2021-04-07', '08:09:00', 4, 1),
(21, 'naif@gmail.com', '2021-04-09', '08:10:00', 4, 1),
(22, 'naif@gmail.com', '2021-04-09', '08:10:00', 4, 1),
(23, 'naif@gmail.com', '2021-04-12', '08:09:00', 4, 1),
(24, 'naif@gmail.com', '2021-04-12', '08:09:00', 4, 1),
(25, 'naif@gmail.com', '2021-04-12', '08:09:00', 4, 1),
(26, 'naif@gmail.com', '2021-04-04', '08:11:00', 4, 1),
(27, 'naif@gmail.com', '2021-04-04', '08:11:00', 4, 1),
(28, 'naif@gmail.com', '2021-04-04', '08:11:00', 4, 1),
(29, 'naif@gmail.com', '2021-04-04', '08:11:00', 4, 1),
(30, 'naif@gmail.com', '2021-04-13', '08:17:00', 4, 1),
(31, 'naif@gmail.com', '2021-04-13', '08:17:00', 4, 1),
(32, 'naif@gmail.com', '2021-04-13', '08:17:00', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `role` int(1) DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`name`, `email`, `password`, `phone`, `address`, `scope`, `description`, `mission`, `vision`, `role`) VALUES
('KASKT', 'KASKT@gmail.com', '12345678', '0509222864', 'Riyadh ', 'Research', 'Supporting the National Research, Development and Innovation Strategy\r\nKACST prepared a national plan for science, technology and innovation, the National ', 'We derive our values from our traditions that promote the principles of transparency, trustworthiness and respect for our employees, society and partners', 'To be a pioneer organization in science and technology by supporting innovation.\r\n', 2),
('SDAIA', 'sdaia@info.com', '12345678', '0509222864', 'Riyadh', 'Government Relations', 'SDAIA’s transformation strategy was approved in 2019. The strategy gives SDAIA a core mandate to drive and own the national data and AI agenda to help achieve ', 'Unlock the value of data as a national asset to realize Vision 2030s aspirations by setting the national data and AI strategy and overseeing its execution through harmonized data policies, data analytics and insights capabilities, and continuous data and AI innovations.', 'Positioning the Kingdom as a global leader in the elite league of economies.', 2),
('STC', 'STC@gmail.com', '12345678', '0509222864', 'Riyadh', 'Telecommunications', 'We offer variety of ICT solutions and digital services in several categories including telecommunication, IT, financial technology, digital media, cybersecurity, and other  ', 'Provide the best in class Governance model in stc by establishing a mechanism to ensure the highest level of Accountability, Transparency, Fairness & Independence to maximize Shareholders value by enhancing STC’s operational efficiency & effectiveness  effectiveness\r\n\r\n\r\n ', 'Digital and telco leader, enabling the society and economy to thrive, in KSA  ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `ID` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `jobType` varchar(10) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `skills` text NOT NULL,
  `qualifications` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `salary` int(11) NOT NULL,
  `employer_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`ID`, `city`, `major`, `position`, `jobType`, `companyName`, `title`, `description`, `skills`, `qualifications`, `gender`, `salary`, `employer_email`) VALUES
(1, 'Jeddah', 'Software Engineering ', 'Back End Developer', 'Full time', 'STC', 'Back End Developer', 'We are looking for an experienced PHP developer to join our startup company', 'PHP', 'Working with git services.', 'male', 20000, 'STC@gmail.com'),
(2, 'Alkobher', 'Software Engineering ', 'Frontend Developer', 'Full time', 'STC', 'Frontend Developer', 'web and mobile applications for the company. Using JavaScript, HTML, and CSS', 'HTML\r\nCSS\r\nJavaScript', 'Bachelors degree\r\n2 year experience', 'female', 10000, 'STC@gmail.com'),
(3, 'Jeddah', 'Software Engineering ', 'Mobile Development', 'Full time', 'STC', 'React Native Developer', 'We are looking for a React Native developer interested in building mobile apps.', 'React Native', '2 year on developing mobile apps.', 'd', 20000, 'STC@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `birthDate` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `phone` char(12) NOT NULL,
  `major` varchar(50) NOT NULL,
  `experince` text DEFAULT NULL,
  `currentJob` varchar(50) DEFAULT NULL,
  `role` int(1) DEFAULT 1,
  `Github` text DEFAULT NULL,
  `Instagram` text DEFAULT NULL,
  `Facebook` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`firstName`, `lastName`, `email`, `password`, `birthDate`, `gender`, `nationality`, `city`, `phone`, `major`, `experince`, `currentJob`, `role`, `Github`, `Instagram`, `Facebook`) VALUES
('Fisal', 'Naif', 'fisal@gmail.com', '12345678', '2021-04-20', 'male', 'saudi', 'Riyadh', '0509222864', 'Computer Science ', NULL, NULL, 1, '', '', ''),
('Dalal', 'Naif', 'naif@gmail.com', '12345678', '2021-04-07', '', 'Greek', 'Jeddah', '050333444', 'Accounting', '  ', 'Finance', 1, '', '', ''),
('Rahaf', 'Naif', 'rahafnaif0@gmail.com', '12345678', '2021-04-20', 'Female', 'saudi', 'Riyadh', '0509222864', 'Software Engineering ', '2 years in web dev', 'web developer', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_apply_job`
--

CREATE TABLE `jobseeker_apply_job` (
  `applay_ID` int(11) NOT NULL,
  `JobSeeker_email` varchar(30) NOT NULL,
  `Job_ID` int(11) NOT NULL,
  `statusjob` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobseeker_apply_job`
--

INSERT INTO `jobseeker_apply_job` (`applay_ID`, `JobSeeker_email`, `Job_ID`, `statusjob`) VALUES
(2, 'rahafnaif0@gmail.com', 3, 0),
(4, 'naif@gmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `JobSeeker_email` varchar(30) NOT NULL,
  `skillName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `JobSeeker_email`, `skillName`) VALUES
(1, 'rahafnaif0@gmail.com', 'Web dev'),
(2, 'rahafnaif0@gmail.com', 'ios'),
(3, 'rahafnaif0@gmail.com', 'hgkhj'),
(4, 'fisal@gmail.com', 'Algorithms'),
(5, 'naif@gmail.com', 'Math'),
(6, 'rahafnaif0@gmail.com', 'DB'),
(7, 'rahafnaif0@gmail.com', 'mob'),
(9, 'fisal@gmail.com', 'Java'),
(10, 'naif@gmail.com', 'Finance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_ID`),
  ADD UNIQUE KEY `appointment_ID` (`appointment_ID`),
  ADD UNIQUE KEY `appointment_ID_2` (`appointment_ID`),
  ADD KEY `jobSeekerEmail` (`jobSeeker_email`),
  ADD KEY `applayID` (`applay_JID`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `companyName` (`companyName`),
  ADD KEY `employer_email` (`employer_email`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `jobseeker_apply_job`
--
ALTER TABLE `jobseeker_apply_job`
  ADD PRIMARY KEY (`applay_ID`),
  ADD KEY `JobSeeker_email` (`JobSeeker_email`),
  ADD KEY `Job_ID` (`Job_ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `JobSeeker_email` (`JobSeeker_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobseeker_apply_job`
--
ALTER TABLE `jobseeker_apply_job`
  MODIFY `applay_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `applayID` FOREIGN KEY (`applay_JID`) REFERENCES `jobseeker_apply_job` (`applay_ID`),
  ADD CONSTRAINT `jobSeekerEmail` FOREIGN KEY (`jobSeeker_email`) REFERENCES `jobseeker` (`email`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`companyName`) REFERENCES `employer` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`employer_email`) REFERENCES `employer` (`email`) ON DELETE CASCADE;

--
-- Constraints for table `jobseeker_apply_job`
--
ALTER TABLE `jobseeker_apply_job`
  ADD CONSTRAINT `jobseeker_apply_job_ibfk_1` FOREIGN KEY (`JobSeeker_email`) REFERENCES `jobseeker` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobseeker_apply_job_ibfk_2` FOREIGN KEY (`Job_ID`) REFERENCES `job` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`JobSeeker_email`) REFERENCES `jobseeker` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
