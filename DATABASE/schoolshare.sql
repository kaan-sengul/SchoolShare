-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 27 Oca 2021, 21:19:56
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `schoolshare`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcements`
--

CREATE TABLE `announcements` (
  `announcementID` int(11) NOT NULL,
  `announcementSubject` varchar(30) NOT NULL,
  `announcementMessage` text NOT NULL,
  `announcementDate` date NOT NULL,
  `announcementOwner` varchar(50) NOT NULL,
  `announcementCourse` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `announcements`
--

INSERT INTO `announcements` (`announcementID`, `announcementSubject`, `announcementMessage`, `announcementDate`, `announcementOwner`, `announcementCourse`) VALUES
(25, 'Dosya Hakkında', 'dksd ksd kskdskdksşlsd sdlşsşl sdşklsdlsw sl dkwoad slşkdwo asdlş ksdlş aşlsd ', '2021-01-05', 'Mert Ecevit', 'MISY3871'),
(27, 'asdasd', 'asasdsadsdasadsadasd as asdasd sda ds asadadssdasd aasdasd asdasd asd asdasdasd', '2021-01-13', 'Admin', 'GERM1101');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `courses`
--

CREATE TABLE `courses` (
  `courseID` varchar(20) NOT NULL,
  `courseName` varchar(50) NOT NULL,
  `courseDescription` text NOT NULL,
  `courseInstructor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `courseDescription`, `courseInstructor`) VALUES
('MISY3870', 'Introduction to Python Programming', 'asddsasdadsadsdasasdasasdasdsdas', 'Elif Deniz Yelmenoğlu'),
('MISY3871', 'Advanced Python Programming', 'Objective of this course to introduce some of the advance topics where programming language\r\nis commonly used in real life applications. At the end of this course, you will learn to code with\r\npython topics such as socket-programming, database operations(SQL and NOSQL), web\r\nprogramming, applications of data-mining technics and some methods of machine learning( at\r\nsome points deep learning).', 'Mert Ecevit'),
('MISY4901', 'Project', 'Students will prepare a thesis.asdasd', 'Gülsüm Çiğdem Çavdaroğlu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `instructors`
--

CREATE TABLE `instructors` (
  `instructorID` int(11) NOT NULL,
  `instructorName` varchar(50) NOT NULL,
  `instructorSurname` varchar(50) NOT NULL,
  `instructorEmail` varchar(50) NOT NULL,
  `instructorPassword` varchar(20) NOT NULL,
  `instructorFullName` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `instructors`
--

INSERT INTO `instructors` (`instructorID`, `instructorName`, `instructorSurname`, `instructorEmail`, `instructorPassword`, `instructorFullName`, `status`) VALUES
(1, 'Mert', 'Ecevit', 'ecevit@gmail.com', '123', 'Mert Ecevit', 0),
(2, 'Elif', 'Yelmenoğlu', 'elif@gmail.com', '123', 'Elif Deniz Yelmenoğlu', 0),
(3, 'Çiğdem', 'Çavdaroğlu', 'cigdem@gmail.com', '123', 'Gülsüm Çiğdem Çavdaroğlu', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `registers`
--

CREATE TABLE `registers` (
  `registerID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `courseID` varchar(20) NOT NULL,
  `courseName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `registers`
--

INSERT INTO `registers` (`registerID`, `studentID`, `courseID`, `courseName`) VALUES
(2, 1, 'MISY4901', 'Project'),
(6, 1, 'MISY3870', 'Introduction to Python Programming'),
(8, 3, 'MISY4901', 'Project'),
(17, 1, 'MISY3871', 'Advanced Python Programming'),
(19, 3, 'MISY3870', 'Introduction to Python Programming'),
(21, 4, 'MISY3870', 'Introduction to Python Programming'),
(23, 3, 'MISY3871', 'Advanced Python Programming'),
(24, 4, 'MISY3871', 'Advanced Python Programming');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(30) NOT NULL,
  `studentSurname` varchar(30) NOT NULL,
  `studentEmail` varchar(150) NOT NULL,
  `studentPassword` varchar(30) NOT NULL,
  `studentFullName` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `students`
--

INSERT INTO `students` (`studentID`, `studentName`, `studentSurname`, `studentEmail`, `studentPassword`, `studentFullName`, `status`) VALUES
(1, 'Kaan', 'Şengül', 'kaan@gmail.com', '123', 'Kaan Şengül', 0),
(3, 'Furkan', 'Tetik', 'furkan@gmail.com', '123', 'Furkan Tetik', 0),
(4, 'Orhan', 'Yalçın', 'orhan@gmail.com', '123', 'Orhan Yalçın', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcementID`),
  ADD KEY `announcementOwner` (`announcementOwner`,`announcementCourse`);

--
-- Tablo için indeksler `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `courseName` (`courseName`),
  ADD KEY `courseInstructor` (`courseInstructor`);

--
-- Tablo için indeksler `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructorID`),
  ADD KEY `instructorName` (`instructorName`),
  ADD KEY `instructorSurname` (`instructorSurname`),
  ADD KEY `instructorFullName` (`instructorFullName`),
  ADD KEY `instructorFullName_2` (`instructorFullName`);

--
-- Tablo için indeksler `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`registerID`),
  ADD KEY `course` (`courseID`),
  ADD KEY `student` (`studentID`),
  ADD KEY `courseName` (`courseName`);

--
-- Tablo için indeksler `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `userEmail` (`studentEmail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcementID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `registers`
--
ALTER TABLE `registers`
  MODIFY `registerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`courseInstructor`) REFERENCES `instructors` (`instructorFullName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `registers_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registers_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registers_ibfk_3` FOREIGN KEY (`courseName`) REFERENCES `courses` (`courseName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
