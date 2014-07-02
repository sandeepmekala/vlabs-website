-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2014 at 03:23 PM
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
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('sandeepmekala', 'sandeepmekala1@gmail.com', '', 'what  is the main purpose of this site.'),
('sandeepmekala', 'sandeepmekala1@gmail.com', 'upload_experiment', 'please tell me how can I upload content from another website.'),
('sandeep', 'sandeepmekala1@gmail.com', 'suggestions', 'you can still improve site.'),
('sandeepmekala', 'sandeepmekala1@gmail.com', '', 'what  is the main purpose of this site.'),
('sandeepmekala', 'sandeepmekala1@gmail.com', 'upload_experiment', 'please tell me how can I upload content from another website.'),
('sandeep', 'sandeepmekala1@gmail.com', 'suggestions', 'you can still improve site.');

-- --------------------------------------------------------

--
-- Table structure for table `contributor`
--

CREATE TABLE IF NOT EXISTS `contributor` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `specialized_subject` varchar(20) NOT NULL,
  `validation_doc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contributor`
--

INSERT INTO `contributor` (`Username`, `Password`, `first_name`, `last_name`, `email`, `contact`, `picture`, `specialized_subject`, `validation_doc`) VALUES
('sandeep mekala', 'sandeep', 'sandeep', 'mekala', 'sandeepmekala1@gmail.com', 9573828046, 'assets/img/user_pictures/akash3.png', 'chemistry', 'assets/img/user_docs/AEC LAB3.pdf'),
('sandeep', 'mekala', 'sandeep', 'mekala', 'sandeepmekala1@gmail.com', 9573828046, 'assets/img/user_pictures/akash3.png', 'mathematics', 'assets/img/user_docs/AEC LAB3.pdf'),
('sandy', 'sandeep', 'saneep', 'mekala', 'sandeepmekala1@gmail.com', 9573828046, 'assets/img/user_pictures/akash3.png', 'physics', 'assets/img/user_docs/AEC LAB3.pdf'),
('mahipal', '123', 'mahipal', 'myada', 'mahipal.myada@gmail.com', 9542258247, 'assets/img/user_pictures/Photo0073.jpg', 'mathematics', 'assets/img/user_docs/Twelfth Night Or What You Will.pdf');

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
(9, 'physics', 5, 'test1', 'des', 'assets/theory/test1.html', 'assets/proc/test1.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-06-30-1404140024.csv', 'GIFT.txt', 'assets/resource/test1.html', 'sandy', '1978', '1', 'sam', '2014-06-30', 'akash3.png'),
(9, 'physics', 4, 'Verification of Archimedes Principle', 'To establish the relationship between the loss in weight of a solid and weight of water displaced when the solid is fully immersed in the following solutions:\n\n    Tap water\n    Strong salty water\n\nThis can be done by using at least two different solids in the experiment. ', 'assets/theory/Verification of Archimedes Principle.html', 'assets/proc/Verification of Archimedes Principle.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http:www.rgukt.in', 'GIFT.txt', 'assets/resource/Verification of Archimedes Principle.html', 'sandy', '1980', '0', '', '0000-00-00', 'Verification-of-Archimedes-Principle.png'),
(9, 'physics', 3, 'Force required to move a wooden block', 'To establish relationship between weight of a rectangular wooden block lying on a horizontal table and the minimum force required to just move it using a spring balance.', 'assets/theory/Force required to move a wooden block.html', 'assets/proc/Force required to move a wooden block.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http://www.rgukt.in@@@media2014-06-30-1404133214.csv', 'GIFT.txt', 'assets/resource/Force required to move a wooden block.html', 'sandy', '1980', '1', 'sam', '2014-06-28', 'Force-Required-to-Move-a-Wooden-Block-on-a-Horizontal-Table.png'),
(9, 'physics', 2, 'Verification of Newtons Second Law', 'Newtons Second Law  of motion states that the rate of change of momentum of an object is proportional to the applied unbalanced force in the direction of the force. ', 'assets/theory/Verification of Newtons Second Law.html', 'assets/proc/Verification of Newtons Second Law.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http:www.rgukt.in', 'GIFT.txt', 'assets/resource/Verification of Newtons Second Law.html', 'sandy', '1980', '1', 'sam', '2014-06-28', 'Newtons-Second-Law.png'),
(9, 'physics', 1, 'Bell Jar Experiment', 'To demonstrate that sound needs a material medium for its propagation. ', 'assets/theory/Bell Jar Experiment.html', 'assets/proc/Bell Jar Experiment.html', 'http://www.youtube.com/embed/pqfT_PWIiQU@@@http://www.youtube.com/embed/pqfT_PWIiQU@@@', 'http:www.rgukt.in', 'GIFT.txt', 'assets/resource/Bell Jar Experiment.html', 'sandy', '1980', '1', 'sam', '2014-06-28', 'Bell-Jar-Experiment.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE IF NOT EXISTS `reviewer` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(15) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `specialized_subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`Username`, `Password`, `first_name`, `last_name`, `email`, `contact`, `picture`, `specialized_subject`) VALUES
('sandeep mekala', 'saand', 'sandeep', 'mekala', 'sandeepmekala1@gmail.com', 9573828046, 'assets/img/users/akash3.png', 'mathematics'),
('sam', 'sandeep', 'fsdf', 'sdfsd', 'sandeepmekala1@gmail.com', 9573828046, 'assets/img/user_pictures/AEC LAB2.pdf', 'physics'),
('sandeep', 'dgdsassd', 'dfgdffadf', 'sdfsdfsdf', 'san@gmail.com', 9573828046, 'assets/img/user_pictures/akash3.png', 'biology'),
('mahipal', 'mahi', 'mahipal', 'myada', 'myada@gmail.com', 9223923232, 'assets/img/user_pictures/akash3.png', 'biology');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(50) NOT NULL,
  `specification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `specification`) VALUES
('sandy', 'contributor'),
('sam', 'reviewer');
