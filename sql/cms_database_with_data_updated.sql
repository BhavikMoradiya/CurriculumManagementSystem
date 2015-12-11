-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 07:44 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_code` char(35) NOT NULL,
  `course_name` char(50) NOT NULL,
  `credits` int(10) NOT NULL,
  `course_desc` text,
  `semester_ava` int(10) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_code`, `course_name`, `credits`, `course_desc`, `semester_ava`) VALUES
(1, 'GCIS 514', 'Requirements and Project Management', 3, NULL, 2),
(2, 'GCIS 516', 'Data-Centric Concepts and Methods', 3, NULL, 2),
(3, 'GCIS 605', 'Scholarship Seminar', 3, NULL, 2),
(4, 'GCIS 523', 'Statistical Computing', 3, NULL, 2),
(5, 'GCIS 544', 'Data Mining Concepts and Techniqus', 3, NULL, 1),
(6, 'GCIS 644', 'Knowledge-Based Systems', 3, NULL, 1),
(7, 'GCIS 646', 'Architecting Enterprise Information Systems', 3, NULL, 0),
(8, 'GCIS 505', 'obj.-ori. Prob. Solv .In C++', 3, NULL, 0),
(10, 'GCIS 508', 'Database Management Systems', 3, NULL, 1),
(11, 'GCIS 509', 'SYSTEM ANALYSIS AND DESIGN', 3, NULL, 0),
(12, 'GCIS 510', 'Software Engineering in UML', 3, NULL, 0),
(13, 'GCIS 500', 'Applied Statistics', 3, NULL, 2),
(15, 'GCIS ELE', 'GCIS Elective', 3, NULL, 2),
(16, 'GCIS 799-1', 'Thesis-1', 3, NULL, 2),
(17, 'GCIS 799-2', 'Thesis-2', 3, NULL, 2),
(18, 'GCIS 799', 'Thesis', 6, NULL, 2),
(19, 'GCIS 698', 'Field Study', 3, NULL, 2),
(20, 'GCIS ELE2', 'Elective 2', 3, NULL, 2),
(21, 'GCIS 521', 'ADVANCED PROGRAMMING IOS', 3, NULL, 0),
(22, 'GCIS 522', 'ADVANCED PROGRAMMING: Android', 3, NULL, 1),
(23, 'GCIS 533', 'Software Patterns and Architecture', 3, NULL, 1),
(24, 'GCIS 634', 'Software Maintenance', 3, NULL, 1),
(25, 'GCIS 639', 'Interactive Software Development', 3, NULL, 0),
(26, 'GCIS 507', 'Data Structures', 3, NULL, 1),
(27, 'GCIS 511', 'Advanced Database Management System', 3, NULL, 2),
(28, 'GCIS 501', 'Advanced Programming', 3, NULL, 0),
(29, 'GCIS 506', 'Personal Software Process', 3, NULL, 1),
(30, 'GCIS 555', 'Dynamic Web Development', 3, NULL, 0),
(31, 'GCIS 563', 'Object-Oriented Programming in Java', 3, NULL, 1),
(32, 'GCIS 562', 'Object-Oriented Problem Solving in C++', 3, NULL, 0),
(33, 'GCIS 565', 'Database Management Systems', 3, NULL, 1),
(34, 'GCIS 504', 'Requirements Engineering', 3, NULL, 2),
(35, 'GCIS 512', 'Object-Oriented Modeling', 3, NULL, 1),
(40, 'GCIS 601', 'Professional Quality Module:Communication', 1, NULL, 2),
(41, 'GCIS 602', 'Professional Quality Module:Research', 1, NULL, 2),
(42, 'GCIS 603', 'Professional Quality Module:Professional', 1, NULL, 2),
(43, 'GCIS 546', 'Managing Information Oreganizations', 3, NULL, 0),
(44, 'GCIS 566', 'Systems Analysis and Design', 3, NULL, 0),
(45, 'GCIS 567', 'Software Engineering in UML', 3, NULL, 0),
(46, 'GCIS 611', 'Software Project Management', 3, NULL, 1),
(47, 'GCIS 612', 'Integrated Information Systems', 3, NULL, 0),
(48, 'GCIS 502', 'Advanced Web Design', 3, NULL, 1),
(49, 'GCIS 503', 'Artistic Web Desgin', 3, NULL, 0),
(50, 'GCIS 584', 'Administration of Internet Services', 3, NULL, 0),
(51, 'GCIS 622', 'Advanced Web Programming', 3, NULL, 1),
(52, 'GCIS 561', 'Computer Networking', 3, NULL, 0),
(53, 'GCIS 532', 'Digital Imaging and Applications', 3, NULL, 0),
(54, 'GCIS 645', 'Intelligent Systems Technologies', 3, NULL, 1),
(55, 'GCIS 515', 'SOFTWARE TESTING AND QUALITY ASSURANCE', 3, NULL, 0),
(56, 'GCIS 635', 'Computer Vision', 3, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `curriculum_id` int(50) NOT NULL AUTO_INCREMENT,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `major_code` int(50) NOT NULL,
  `grad_under` char(50) NOT NULL,
  PRIMARY KEY (`curriculum_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`curriculum_id`, `startdate`, `enddate`, `major_code`, `grad_under`) VALUES
(1, '2014-08-27', '2060-08-27', 773, '1'),
(4, '2014-08-27', '2060-08-27', 774, '1'),
(5, '2013-08-27', '2060-08-27', 879, '1'),
(59, '2013-08-27', '2060-08-27', 875, '1'),
(60, '2013-08-27', '2060-08-27', 883, '1');

-- --------------------------------------------------------

--
-- Table structure for table `curriculumcourses`
--

CREATE TABLE IF NOT EXISTS `curriculumcourses` (
  `course_id` int(11) NOT NULL,
  `curriculum_id` int(10) NOT NULL,
  `set_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `curriculumcourses`
--

INSERT INTO `curriculumcourses` (`course_id`, `curriculum_id`, `set_number`) VALUES
(1, 1, 0),
(2, 1, 0),
(4, 1, 0),
(5, 1, 0),
(3, 1, 0),
(6, 1, 0),
(7, 1, 0),
(14, 3, 0),
(1, 4, 0),
(2, 4, 0),
(21, 4, 1),
(22, 4, 1),
(23, 4, 0),
(3, 4, 0),
(24, 4, 0),
(25, 4, 0),
(19, 4, 2),
(18, 4, 2),
(16, 4, 2),
(19, 1, 1),
(18, 1, 1),
(16, 1, 1),
(15, 1, 0),
(17, 1, 2),
(20, 1, 2),
(17, 4, 3),
(15, 4, 0),
(20, 4, 3),
(34, 59, 0),
(27, 59, 0),
(35, 59, 0),
(43, 59, 0),
(46, 59, 0),
(47, 59, 0),
(6, 59, 0),
(40, 59, 1),
(41, 59, 1),
(42, 59, 1),
(19, 59, 2),
(18, 59, 2),
(16, 59, 2),
(17, 59, 3),
(15, 59, 3),
(48, 60, 0),
(49, 60, 0),
(34, 60, 0),
(30, 60, 0),
(50, 60, 0),
(46, 60, 0),
(51, 60, 0),
(19, 60, 1),
(18, 60, 1),
(16, 60, 1),
(17, 60, 2),
(20, 60, 2),
(28, 5, 1),
(34, 5, 2),
(29, 5, 1),
(27, 5, 0),
(35, 5, 2),
(55, 5, 3),
(53, 5, 0),
(30, 5, 1),
(46, 5, 3),
(56, 5, 0),
(54, 5, 0),
(19, 5, 4),
(18, 5, 4),
(16, 5, 4),
(17, 5, 5),
(20, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE IF NOT EXISTS `majors` (
  `major_code` int(11) NOT NULL,
  `major_name` char(50) NOT NULL,
  `grad_undergrad` int(11) NOT NULL,
  PRIMARY KEY (`major_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `majors`
--

INSERT INTO `majors` (`major_code`, `major_name`, `grad_undergrad`) VALUES
(773, ' Information Analytics', 1),
(774, '  Software Engineering', 1),
(875, '  Information Systems', 1),
(879, 'Applied Computer Science', 1),
(883, ' Web Development', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE IF NOT EXISTS `prerequisites` (
  `course_id` int(20) NOT NULL,
  `prereq_id` int(20) NOT NULL,
  `set` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`course_id`, `prereq_id`, `set`) VALUES
(1, 11, 2),
(1, 12, 0),
(5, 2, 0),
(5, 4, 3),
(6, 2, 0),
(6, 4, 3),
(7, 11, 0),
(7, 1, 3),
(17, 16, 1),
(20, 16, 2),
(20, 19, 0),
(21, 8, 0),
(21, 12, 3),
(23, 9, 2),
(23, 21, 2),
(23, 22, 2),
(23, 26, 0),
(23, 12, 3),
(24, 21, 2),
(24, 22, 0),
(25, 21, 2),
(25, 22, 0),
(28, 31, 1),
(30, 32, 2),
(30, 31, 0),
(30, 33, 3),
(27, 33, 1),
(43, 44, 2),
(43, 45, 0),
(48, 32, 2),
(48, 31, 2),
(48, 28, 0),
(49, 32, 2),
(49, 31, 2),
(49, 28, 0),
(50, 52, 1),
(51, 48, 1),
(35, 32, 2),
(35, 31, 0),
(35, 34, 3),
(35, 44, 2),
(35, 45, 0),
(54, 27, 1),
(11, 8, 2),
(11, 29, 0),
(12, 8, 2),
(12, 29, 0),
(2, 8, 2),
(2, 29, 0),
(2, 10, 3),
(22, 12, 2),
(22, 29, 0),
(4, 8, 2),
(4, 29, 0),
(4, 13, 3),
(55, 8, 2),
(55, 29, 2),
(55, 21, 2),
(55, 22, 0),
(55, 12, 3),
(56, 53, 1),
(26, 8, 2),
(26, 29, 0),
(44, 32, 2),
(44, 31, 0),
(45, 32, 2),
(45, 31, 0),
(47, 34, 2),
(47, 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'tang002@gannon.edu', 'ac86cabae707c1d7b2b9a5749607a3d9'),
(2, 'abc@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710');
-- password for abc@gmail.com is "12"


--
-- Table structure for table `course_description`
--

CREATE TABLE IF NOT EXISTS `course_description` (                       
                     `id` int(100) NOT NULL AUTO_INCREMENT,                  
                     `course_id` int(100) NOT NULL,                          
                     `curriculum_id` int(100) NOT NULL,                      
                     `description` text,                                     
                     PRIMARY KEY (`id`)                                      
                   ) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

