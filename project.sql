-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2022 at 06:25 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `img_path` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `address`, `phone`, `email`, `password`, `first_name`, `last_name`, `img_path`) VALUES
(1, 'admin1', 'cairo', '01028689567', 'admin@tabib.com', '123456789', 'admin', 'The First', 'd39b18e4-1043-4409-a9ef-078c5797fcb3.jfif'),
(2, 'admin2', 'masr', '01004688839', 'asdasdlasd@gmail.com', '123456789', 'ahmed', 'taha', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int UNSIGNED NOT NULL,
  `doctor_id` int UNSIGNED NOT NULL,
  `cause` enum('check up','consultation') NOT NULL,
  `time_appointment` time NOT NULL,
  `time_reservation` datetime DEFAULT CURRENT_TIMESTAMP,
  `day_appointment` date DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `patient_id` (`patient_id`,`doctor_id`),
  KEY `patient_id_2` (`patient_id`,`doctor_id`),
  KEY `time_appointment` (`time_appointment`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `patient_id`, `doctor_id`, `cause`, `time_appointment`, `time_reservation`, `day_appointment`) VALUES
(14, 1, 3, 'check up', '10:00:00', '2021-09-30 02:21:46', NULL),
(16, 2, 3, 'check up', '10:00:00', '2021-09-30 07:57:00', '2021-10-02'),
(17, 1, 3, 'check up', '10:00:00', '2021-10-03 12:27:24', '2000-09-30'),
(18, 1, 3, 'check up', '10:00:00', '2021-10-03 12:27:24', '2000-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `address` varchar(70) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `time_of_presense` time NOT NULL,
  `stay_time` tinyint NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `img_path` varchar(50) DEFAULT NULL,
  `subscribe` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `time_of_presense` (`time_of_presense`),
  UNIQUE KEY `username` (`username`),
  KEY `time_of_presense_2` (`time_of_presense`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `username`, `address`, `phone`, `email`, `password`, `specialization`, `time_of_presense`, `stay_time`, `first_name`, `last_name`, `img_path`, `subscribe`) VALUES
(3, 'Ahmed Elsayegh', 'Cairo', '010255663', 'amgen@gmail.com', '123456789', 'pharmciest', '10:00:00', 4, 'ahmed', 'hesham', NULL, 0),
(8, 'Mohamed123', 'Cairo ', '0102868956765', 'mohamed@gmail.com', 'Mohamed123456789', 'surgery', '10:30:00', 3, 'Mohamed', 'Elsayed', 'index.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int UNSIGNED NOT NULL,
  `doctor_id` int UNSIGNED NOT NULL,
  `patient_message` text NOT NULL,
  `doctor_reply` text,
  `_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `patient_id`, `doctor_id`, `patient_message`, `doctor_reply`, `_datetime`) VALUES
(12, 1, 3, 'my throat hurts me', 'Take asprin', '2021-09-30 02:22:47'),
(13, 2, 8, 'How can I avoid anxiety ? ', 'By Meditation and relaxation', '2021-09-30 02:45:41'),
(14, 1, 8, 'aaaaaaaaaaaaa', 'qqqqqqqqqqq', '2021-10-03 12:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `age` tinyint NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `country` varchar(50) DEFAULT '',
  `dob` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `img_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `username`, `age`, `password`, `phone`, `email`, `gender`, `country`, `dob`, `address`, `first_name`, `last_name`, `img_path`) VALUES
(1, 'omar_1789', 21, 'Omar01004688837', '01028689567', 'mrmr14934@gmail.com', 'male', 'egypt', '2000-09-30', 'Mansoura', 'omar', 'ahmed', ''),
(2, 'taha123', 20, 'Ahmed123456789', '1025632533', 'ahmed@gmail.com', 'male', 'egypt', '2000-07-21', 'cairo', 'ahmed', 'taha', 'taha.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `subscribtion`
--

DROP TABLE IF EXISTS `subscribtion`;
CREATE TABLE IF NOT EXISTS `subscribtion` (
  `doctor_id` int UNSIGNED NOT NULL,
  `patient_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`doctor_id`,`patient_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `patient_id` int UNSIGNED NOT NULL,
  `content` varchar(500) NOT NULL,
  `_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `patient_id` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `patient_id`, `content`, `_datetime`) VALUES
(13, 1, 'What a good clinic ♥ ', '2021-09-30 02:24:51'),
(17, 2, 'Here , you will find your comfort  ', '2021-09-30 02:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

DROP TABLE IF EXISTS `tips`;
CREATE TABLE IF NOT EXISTS `tips` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int UNSIGNED NOT NULL,
  `doctor_tip` varchar(1000) DEFAULT NULL,
  `_datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `doctor_id`, `doctor_tip`, `_datetime`) VALUES
(6, 3, 'Sports is the life of the heart ', '2021-09-30 16:29:45'),
(9, 8, 'Salad is very important to the body ', '2021-09-30 16:38:16');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subscribtion`
--
ALTER TABLE `subscribtion`
  ADD CONSTRAINT `subscribtion_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribtion_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tips`
--
ALTER TABLE `tips`
  ADD CONSTRAINT `tips_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
