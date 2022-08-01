-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2019 at 09:59 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wastems`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` date NOT NULL,
  `username` varchar(40) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` bigint(12) NOT NULL,
  `doj` date NOT NULL,
  `location` int(4) NOT NULL,
  PRIMARY KEY (`eid`),
  UNIQUE KEY `username` (`username`),
  KEY `location` (`location`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `name`, `gender`, `dob`, `username`, `address`, `email`, `phonenumber`, `doj`, `location`) VALUES
(10, 'Abitha', 'F', '1897-05-04', 'abithas', 'abitha234', 'abitha@gmail.com', 7895648745, '2019-07-04', 1),
(14, 'Anu  Mathew', 'M', '1998-04-12', 'anu', 'Anus Home Pta', 'Anu@gmail.com', 9654783210, '2018-02-12', 2),
(25, 'Sino S', 'M', '1990-05-12', 'Sino', 'Ann Villas', 'Sino@gmail.com', 7890569009, '2019-09-02', 11),
(26, 'Ismail M', 'M', '1990-06-12', 'Ismail', 'Ismail Manzil', 'ismail@gmail.com', 9559487123, '2018-06-02', 12),
(27, 'P A ABHRAHAM', 'M', '1876-08-12', 'Abhraham', 'Rose  Villa  Konni', 'abhraham34@gmail.com', 9874561235, '2017-02-12', 7),
(28, 'Sam Thomas', 'M', '1899-08-05', 'sam', 'Kizhakupuram', 'sam@gmail.com', 7896541239, '2018-09-08', 10),
(29, 'Jogy M', 'M', '1874-03-06', 'jogy', 'kaleekal', 'jogy@gmail.com', 7894563214, '2017-02-12', 13);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `lid` int(5) NOT NULL AUTO_INCREMENT,
  `locationnm` varchar(40) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lid`, `locationnm`) VALUES
(1, 'Patanamthitta'),
(2, 'Vadaserikara'),
(7, 'Ranny'),
(10, 'Malayalapuzha'),
(11, 'Kumplampoika'),
(12, 'Mylapra'),
(13, 'Cheenkalthadom');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `loginid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` smallint(3) NOT NULL,
  PRIMARY KEY (`loginid`),
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginid`, `username`, `password`, `type`) VALUES
(1, 'Admin', '$2y$10$id1hQbjfcwsSN6Dlu/BbAuVgNPcj6..ly65v6TRs7XnXpVYwkGHGy', 0),
(47, 'aa', '$2y$10$mLibEnIuAz3WWpRvMPkoKO7yo6I5mRfjxihFpYT0RIi2RWwvk4TL2', 2),
(72, 'ANN', '$2y$10$.DB35s9anN20RrU9zHToluA/hmDCsNo4mFT3EH75giw6GUScJL/Pa', 2),
(75, 'jo', '$2y$10$M9aLdLo0xk0dkVA3Ug4Kfuw5bY7cQw2frVoblDYyfyBrlCbk1ylK.', 2),
(76, 'jijo', '$2y$10$91obfITzXp5LE9FFhVu.kOBHkW/x4Wlzc8gIpeuqSpInf1Fcr0lSy', 2),
(77, 'joji', '$2y$10$x4fK600FxdHLg0tjnplp.eua6G0VN4gdEzjClyG7aMxMGwDSaLweq', 2),
(78, 'lijo', '$2y$10$GGfEL6Ar4v4stZKrWbAJduSy/EWSsjbiEmgBS8nitICNKwIL/BYly', 2),
(83, 'john', '$2y$10$zDba.rNCofGFCCZ4sN319..ctdWFfr01xu5IpaAVjFXfGMELHKoPq', 2),
(84, 'abithas', '$2y$10$/8C2zl5YK9EIOMRR08UbzOUa52O1Qmg4JwCg.si6ceTRYi/ltBBfK', 2),
(85, 'Mathew', '$2y$10$97usYiyOJpIeLSK/tlp9DOaTNmNgw7c8E23fINhmdP0.VYxJyQ0Kq', 2),
(89, 'wicky', '$2y$10$YHzFiC4MDmhLbjicNobFYusIVf0TVGnDGdKrD33rb8Stn8N6bc72m', 2),
(90, 'we', '$2y$10$YMS4s9JIchBsIXYRIWIY.eOy5GVIZI9fRwAZfiUmhdqniozlKKW2a', 2),
(91, 'anu', '$2y$10$6AIQwAZ4aOhIa7rlAg13heOrTZ4PFjBnmWjpIsi.Vl5ClZTvWGxEu', 2),
(92, 'salas', '$2y$10$4ckXRRZdKb25LmUVFo2q7.qJsM7lw0m0isF16xKjMDGDWVhkN78wu', 1),
(94, 'ALENS227', '$2y$10$EjjEDaVVJiCShxOC0TV9r.SQpQoNxZOGmlxR1cFAbH8RfYMVoe39y', 1),
(95, 'litty', '$2y$10$1GREUN3W.D1HFxSSTqvHVOjan4KjON7ayFACBKUeQKTtFlgwXEZDi', 1),
(100, 'ki', '$2y$10$v8e8iJOokL9ORJH0kgkIAOhjSGlWqaP3BN/pGKvFU/N01WSVmrYkG', 2),
(106, 'erty', '$2y$10$z/JBH92QGiFOln4nPrIyLOlJ9EevGOFNmHMt7BpTLwjxhLsTEh2wK', 2),
(110, 'Sino', '$2y$10$InREV.J/rI7wBzw2WuI5xufhnbE9ngQkjiVeU5aWBo3mjUJ/W0ayW', 2),
(111, 'Siji', '$2y$10$id1hQbjfcwsSN6Dlu/BbAuVgNPcj6..ly65v6TRs7XnXpVYwkGHGy', 1),
(114, 'shabu', '$2y$10$CitCKt2IX/rjYgFxSkOLuuBKfS0XSz0YVV3fZ4s9JMb/MUp9FTKOq', 1),
(115, 'vidhya', '$2y$10$qCn6a.17ufu9xD9JhLkm9.FGNR3qucn4dY86aPHQ8XSdn9wNxQfUK', 1),
(116, 'Ismail', '$2y$10$SFqBg3KIixeZHrxmPNabcOyF/2f3cnzNtqE3uMOr.1NQudRYlz8LC', 2),
(117, 'Abhraham', '$2y$10$khbO8IO.fJ9VnojIxiO45eXLWr96oVVihB/oKmmR0KVYfBJ4uM8/S', 2),
(118, 'Sera', '$2y$10$Tpv3zZXR4W3KddnOOvK7cu3Do6knq3BnbRd0aFe38YNMUWH/JeiW6', 1),
(119, 'sam', '$2y$10$qsXt8lMrhtMFkKqTFTH7q..BmQTMlwfaRUImgLdSIhqhM.uI5Inc.', 2),
(120, 'jogy', '$2y$10$USVjXv9bPSPHNa9i2Q5cHuht4LZ5LyYrBPMwCOgurY1dayHltput.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `houseno` int(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phonenumber` bigint(12) NOT NULL,
  `location` int(4) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `username_2` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phonenumber` (`phonenumber`),
  KEY `location` (`location`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `username`, `address`, `houseno`, `email`, `phonenumber`, `location`) VALUES
(27, 'Salas Antony', 'salas', 'Salas Home', 23456, 'salas@gmail.com', 9080704321, 1),
(28, 'ALEN SAJI', 'ALENS227', 'ZEUS WORLD', 68953, 'ALENS227@GMAIL.COM', 9605775297, 1),
(29, 'Litty  ', 'litty', 'Lityys', 45362, 'litty@gmail.com', 9658741234, 7),
(31, 'Siji Daniel', 'Siji', 'Parathalapady', 56789, 'siji@gmail.com', 7867330789, 10),
(34, 'Shabana M ', 'shabu', 'Edakattil building', 78956, 'shabu@gmail.com', 9496144789, 2),
(35, 'Vidhya Vijayan ', 'vidhya', 'Manikanda vilasam', 45678, 'vidhya@gmail.com', 8954712369, 2),
(36, 'Sera Siby', 'Sera', 'Cheenkalthadom', 68903, 'sera4613@gmail.com', 7025529637, 10);

-- --------------------------------------------------------

--
-- Table structure for table `waste`
--

DROP TABLE IF EXISTS `waste`;
CREATE TABLE IF NOT EXISTS `waste` (
  `wid` int(4) NOT NULL AUTO_INCREMENT,
  `user` int(4) NOT NULL,
  `employee` int(4) DEFAULT NULL,
  `uploadtime` datetime NOT NULL,
  `accepttime` datetime DEFAULT NULL,
  `reporttime` datetime DEFAULT NULL,
  `completiontime` datetime DEFAULT NULL,
  PRIMARY KEY (`wid`),
  KEY `employee` (`employee`),
  KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waste`
--

INSERT INTO `waste` (`wid`, `user`, `employee`, `uploadtime`, `accepttime`, `reporttime`, `completiontime`) VALUES
(3, 27, 26, '2019-09-13 14:50:44', '2019-09-13 14:52:29', '2019-09-13 14:55:17', NULL),
(6, 29, 27, '2019-09-13 14:56:51', '2019-10-01 12:00:00', '2019-10-01 02:32:00', NULL),
(7, 27, 26, '2019-09-20 13:53:03', '2019-09-27 13:53:03', '2019-09-27 18:00:00', '2019-09-27 20:00:00'),
(8, 28, 26, '2019-09-28 09:00:00', '2019-09-28 12:05:22', NULL, NULL),
(9, 35, 14, '2019-09-28 09:00:00', '2019-09-28 12:06:46', NULL, NULL),
(10, 31, NULL, '2019-10-04 22:07:31', NULL, NULL, NULL),
(11, 29, NULL, '2019-10-05 11:30:57', NULL, NULL, NULL),
(12, 36, 29, '2019-10-05 00:00:00', '2019-10-05 12:00:00', NULL, NULL),
(16, 36, NULL, '2019-10-05 15:27:15', NULL, NULL, NULL),
(17, 36, NULL, '2019-10-05 15:27:36', NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`username`) REFERENCES `login` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`location`) REFERENCES `location` (`lid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `waste`
--
ALTER TABLE `waste`
  ADD CONSTRAINT `waste_ibfk_1` FOREIGN KEY (`employee`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `waste_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
