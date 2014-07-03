-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 01:25 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aakashiitb`
--

-- --------------------------------------------------------

--
-- Table structure for table `experiment_details`
--

CREATE TABLE IF NOT EXISTS `experiment_details` (
  `class_no` int(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `exp_no` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `theory` varchar(300) NOT NULL,
  `proc` varchar(300) NOT NULL,
  `video` varchar(500) NOT NULL,
  `simulation` varchar(300) NOT NULL,
  `quiz` varchar(300) NOT NULL,
  `resource` varchar(300) NOT NULL,
  `contributor` varchar(50) NOT NULL,
  `uploaded_date` varchar(20) NOT NULL,
  `status` varchar(5) NOT NULL,
  `reviewer` varchar(50) NOT NULL,
  `review_date` varchar(20) NOT NULL,
  `icon` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiment_details`
--

INSERT INTO `experiment_details` (`class_no`, `subject_name`, `exp_no`, `name`, `description`, `theory`, `proc`, `video`, `simulation`, `quiz`, `resource`, `contributor`, `uploaded_date`, `status`, `reviewer`, `review_date`, `icon`) VALUES
(9, 'chemistry', 1, 'Separation of Mixtures Using Different Techniques', 'To separate the components of a mixture using the following techniques:      Separating funnel     Chromatography     Centrifugation     Simple distillation     Fractional distillation', 'assets/theory/Distinguish Between Mixture and Compound.html', 'assets/proc/Distinguish Between Mixture and Compound.html', 'http://www.youtube.com/embed/pqfT_PWIiQU', 'http://amrita.olabs.co.in/?sub=73&brch=2&sim=96&cn', 'http://amrita.olabs.co.in/?sub=73&brch=2&sim=96&cn', 'assets/resource/Distinguish Between Mixture and Compound.html', 'sandy', '', '1', 'sam', '2011-03-06', 'Chemical Reactions.png'),
(9, 'physics', 9, 'ohms Law4', 'Ohms law is a experiment which explains the proportional relation of voltage and current.', 'assets/theory/ohms Law4.html', 'assets/proc/ohms Law4.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-07-02-1404306768.csv', 'Ohms Law4.txt', 'assets/resource/ohms Law4.html', 'sandy', '2005', '0', '', '0000-00-00', 'ohms law4.png'),
(9, 'physics', 7, 'testing', 'des', 'assets/theory/testing.html', 'assets/proc/testing.html', 'url@@@', 'http://www.rgukt.in@@@media2014-07-02-1404304343.csv', 'Ohms Law2.txt', 'assets/resource/testing.html', 'sandy', '2005', '1', 'sam', '2014-07-02', 'akash5.png'),
(9, 'physics', 8, 'ohms Law3', 'description', 'assets/theory/ohms Law3.html', 'assets/proc/ohms Law3.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-07-02-1404305425.csv', 'Ohms Law3.txt', 'assets/resource/ohms Law3.html', 'sandy', '2005', '0', '', '0000-00-00', 'akash6.png'),
(9, 'physics', 5, 'test1', 'des', 'assets/theory/test1.html', 'assets/proc/test1.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-06-30-1404140024.csv', 'GIFT.txt', 'assets/resource/test1.html', 'sandy', '1978', '1', 'sam', '2014-06-30', 'akash3.png'),
(9, 'physics', 6, 'Ohms Law', 'This is the experiment which explains the proposionality relation of the voltage and current.', 'assets/theory/Ohms Law.html', 'assets/proc/Ohms Law.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-07-02-1404301665.csv', 'Ohms Law.txt', 'assets/resource/Ohms Law.html', 'sandy', '2005', '1', 'sam', '2014-07-02', 'ohms law.png'),
(9, 'physics', 4, 'Verification of Archimedes Principle', 'To establish the relationship between the loss in weight of a solid and weight of water displaced when the solid is fully immersed in the following solutions:\n\n    Tap water\n    Strong salty water\n\nThis can be done by using at least two different solids in the experiment. ', 'assets/theory/Verification of Archimedes Principle.html', 'assets/proc/Verification of Archimedes Principle.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http:www.rgukt.in', 'GIFT.txt', 'assets/resource/Verification of Archimedes Principle.html', 'sandy', '1980', '0', '', '0000-00-00', 'Verification-of-Archimedes-Principle.png'),
(9, 'physics', 3, 'Force required to move a wooden block', 'To establish relationship between weight of a rectangular wooden block lying on a horizontal table and the minimum force required to just move it using a spring balance.', 'assets/theory/Force required to move a wooden block.html', 'assets/proc/Force required to move a wooden block.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-06-30-1404133214.csv', 'GIFT.txt', 'assets/resource/Force required to move a wooden block.html', 'sandy', '1980', '1', 'sam', '2014-06-28', 'Force-Required-to-Move-a-Wooden-Block-on-a-Horizontal-Table.png'),
(9, 'physics', 2, 'Verification of Newtons Second Law', 'Newtons Second Law  of motion states that the rate of change of momentum of an object is proportional to the applied unbalanced force in the direction of the force. ', 'assets/theory/Verification of Newtons Second Law.html', 'assets/proc/Verification of Newtons Second Law.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http:www.rgukt.in', 'GIFT.txt', 'assets/resource/Verification of Newtons Second Law.html', 'sandy', '1980', '1', 'sam', '2014-06-28', 'Newtons-Second-Law.png'),
(9, 'physics', 1, 'Bell Jar Experiment', 'To demonstrate that sound needs a material medium for its propagation. ', 'assets/theory/Bell Jar Experiment.html', 'assets/proc/Bell Jar Experiment.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http:www.rgukt.in', 'GIFT.txt', 'assets/resource/Bell Jar Experiment.html', 'sandy', '1980', '1', 'sam', '2014-06-28', 'Bell-Jar-Experiment.png');
