
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `employer` (
  `name` varchar(50) NOT NULL UNIQUE,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(150) NOT NULL,
  `scope` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `role` int(1) DEFAULT 2,
     PRIMARY KEY(`email`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `job` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `employer_email` varchar(50) NOT NULL,
       PRIMARY KEY(`ID`),
       
       FOREIGN KEY (`companyName`)
        REFERENCES `employer` (`name`) ON DELETE CASCADE ON UPDATE CASCADE ,    
        FOREIGN KEY (`employer_email`)
        REFERENCES `employer` (`email`) ON DELETE CASCADE 
        

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


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
  `Github` text ,
  `Instagram` text ,
  `Facebook` text ,
         PRIMARY KEY(`email`)
         
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `appointment` (
  `appointment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `jobSeeker_email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `applay_JID` int(11) NOT NULL,
  `statuss` int(11) DEFAULT 1,
   PRIMARY KEY(`appointment_ID`),
      FOREIGN KEY (`applay_JID`)
        REFERENCES `job` (`ID`) ON DELETE CASCADE,

        FOREIGN KEY (`jobSeeker_email`)
        REFERENCES `jobseeker` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `jobseeker_apply_job` (
  `applay_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JobSeeker_email` varchar(30) NOT NULL,
  `Job_ID` int(11) NOT NULL,
  `statusjob` int(1) NOT NULL DEFAULT 0,
        PRIMARY KEY(`applay_ID`),
        FOREIGN KEY (`JobSeeker_email`)
        REFERENCES `jobseeker` (`email`) ON DELETE CASCADE,         
        FOREIGN KEY (`Job_ID`)
        REFERENCES `job` (`ID`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `JobSeeker_email` varchar(30) NOT NULL,
  `skillName` varchar(100) NOT NULL,
        PRIMARY KEY(`skill_id`),
        FOREIGN KEY (`JobSeeker_email`)
        REFERENCES `jobseeker` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




INSERT INTO `employer` (`name`, `email`, `password`, `phone`, `address`, `scope`, `description`, `mission`, `vision`, `role`) VALUES
('STC', 'STC@gmail.com', '12345678', '0509222864', 'Riyadh', 'Telecommunications', 'We offer variety of ICT solutions and digital services in several categories including telecommunication, IT, financial technology, digital media, cybersecurity, and other  ', 'Provide the best in class Governance model in stc by establishing a mechanism to ensure the highest level of Accountability, Transparency, Fairness & Independence to maximize Shareholders value by enhancing STC’s operational efficiency & effectiveness  effectiveness\r\n\r\n\r\n ', 'Digital and telco leader, enabling the society and economy to thrive, in KSA  ', 2),
('KASKT', 'KASKT@gmail.com', '12345678', '0509222864', 'Riyadh ', 'Research', 'Supporting the National Research, Development and Innovation Strategy\r\nKACST prepared a national plan for science, technology and innovation, the National ', 'We derive our values from our traditions that promote the principles of transparency, trustworthiness and respect for our employees, society and partners', 'To be a pioneer organization in science and technology by supporting innovation.\r\n', 2),
('SDAIA', 'sdaia@info.com', '12345678', '0509222864', 'Riyadh', 'Government Relations', 'SDAIA’s transformation strategy was approved in 2019. The strategy gives SDAIA a core mandate to drive and own the national data and AI agenda to help achieve ', 'Unlock the value of data as a national asset to realize Vision 2030\s aspirations by setting the national data and AI strategy and overseeing its execution through harmonized data policies, data analytics and insights capabilities, and continuous data and AI innovations.', 'Positioning the Kingdom as a global leader in the elite league of economies.', 2);

INSERT INTO `job` (`ID`, `city`, `major`, `position`, `jobType`, `companyName`, `title`, `description`, `skills`, `qualifications`, `gender`, `salary`, `employer_email`) VALUES
(1, 'Jeddah', 'Software Engineering ', 'Back End Developer', 'Full time', 'STC', 'Back End Developer', 'We are looking for an experienced PHP developer to join our startup company', 'PHP', 'Working with git services.', 'male', 20000, 'STC@gmail.com'),
(2, 'Alkobher', 'Software Engineering ', 'Frontend Developer', 'Full time', 'STC', 'Frontend Developer', 'web and mobile applications for the company. Using JavaScript, HTML, and CSS', 'HTML\r\nCSS\r\nJavaScript', 'Bachelor\s degree\r\n2 year experience', 'female', 10000, 'STC@gmail.com'),
(3, 'Jeddah', 'Software Engineering ', 'Mobile Development', 'Full time', 'STC', 'React Native Developer', 'We are looking for a React Native developer interested in building mobile apps.', 'React Native', '2 year on developing mobile apps.', 'd', 20000, 'STC@gmail.com');

INSERT INTO `jobseeker` ( `firstName`, `lastName`, `email`, `password`, `birthDate`, `gender`, `nationality`, `city`, `phone`, `major`, `experince`, `skills`, `currentJob`, `role`,  `Github`, `Instagram`, `Facebook`) VALUES
('Fisal', 'Naif', 'fisal@gmail.com', '12345678', '2021-04-20', 'male', 'saudi', 'Riyadh', '0509222864', 'Computer Science ', NULL, '', NULL, 1,  '', '', ''),
('Rahaf', 'Naif', 'rahafnaif0@gmail.com', '12345678', '2021-04-20', 'Female', 'saudi', 'Riyadh', '0509222864', 'Software Engineering ', '2 years in web dev', '', 'web developer', 1, '', '', ''),
('Dalal', 'Naif', 'naif@gmail.com', '12345678', '2021-04-07', '', 'Greek', 'Jeddah', '050333444', 'Accounting', '  ', '', 'Finance', 1, '', '', '');


INSERT INTO `appointment` (`appointment_ID`, `jobSeeker_email`, `date`, `time`, `applay_JID`, `statuss`) VALUES
(1, 'rahafnaif0@gmail.com', '2021-04-12', '14:25:45', 1, 1),
(5, 'rahafnaif0@gmail.com', '2021-04-12', '12:44:00', 1, 1),
(9, 'rahafnaif0@gmail.com', '2021-04-14', '08:16:00', 1, 1),
(10, 'naif@gmail.com', '2021-04-13', '22:55:00', 3, 1),
(11, 'naif@gmail.com', '2021-04-14', '23:24:00', 3, 1),
(12, 'naif@gmail.com', '2021-04-17', '23:27:00', 3, 2),
(13, 'naif@gmail.com', '2021-04-13', '23:56:00', 3, 1),
(14, 'naif@gmail.com', '2021-04-28', '23:56:00', 3, 1);




INSERT INTO `jobseeker_apply_job` (`applay_ID`, `JobSeeker_email`, `Job_ID`, `statusjob`) VALUES
(4, 'naif@gmail.com', 1, 0),
(2, 'rahafnaif0@gmail.com', 3, 0);


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



COMMIT;

