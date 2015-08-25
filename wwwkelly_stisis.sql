-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 28, 2014 at 06:15 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wwwkelly_stisis`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_details`
--

CREATE TABLE IF NOT EXISTS `appointment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `visitschedule` bigint(20) NOT NULL,
  `visitpurpose` text NOT NULL,
  `officer` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `appointment_details`
--

INSERT INTO `appointment_details` (`id`, `studentid`, `visitschedule`, `visitpurpose`, `officer`, `datetime`) VALUES
(1, 1, -3600, '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `enrollment_details`
--

CREATE TABLE IF NOT EXISTS `enrollment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `status` text NOT NULL,
  `program` text NOT NULL,
  `schedule` text NOT NULL,
  `payment` text NOT NULL,
  `studentcontactnumber` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `enrollment_details`
--

INSERT INTO `enrollment_details` (`id`, `studentid`, `status`, `program`, `schedule`, `payment`, `studentcontactnumber`, `datetime`) VALUES
(1, 1, '1', '1', '1', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE IF NOT EXISTS `inquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `tuition` text NOT NULL,
  `program` text NOT NULL,
  `others` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `studentid`, `tuition`, `program`, `others`, `datetime`) VALUES
(1, 1, '', '1', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_informations`
--

CREATE TABLE IF NOT EXISTS `personal_informations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `middlename` text NOT NULL,
  `address` text NOT NULL,
  `father` text NOT NULL,
  `mother` text NOT NULL,
  `guardian` text NOT NULL,
  `gender` text NOT NULL,
  `civilstatus` text NOT NULL,
  `citizenship` text NOT NULL,
  `birthday` bigint(20) NOT NULL,
  `email` text NOT NULL,
  `contactnumber1` text NOT NULL,
  `contactnumber2` text NOT NULL,
  `contactnumber3` text NOT NULL,
  `emergencycontactperson` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `personal_informations`
--

INSERT INTO `personal_informations` (`id`, `studentid`, `firstname`, `lastname`, `middlename`, `address`, `father`, `mother`, `guardian`, `gender`, `civilstatus`, `citizenship`, `birthday`, `email`, `contactnumber1`, `contactnumber2`, `contactnumber3`, `emergencycontactperson`, `datetime`) VALUES
(1, 1, 'xxxxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', 'xxxxxxxxx', '1', '1', 'xxxxxxxxx', 1393887600, 'xxxxxxxxx@gma.com', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools_considered`
--

CREATE TABLE IF NOT EXISTS `schools_considered` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `first` text NOT NULL,
  `second` text NOT NULL,
  `third` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schools_considered`
--

INSERT INTO `schools_considered` (`id`, `studentid`, `first`, `second`, `third`, `datetime`) VALUES
(1, 1, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schools_last_attended`
--

CREATE TABLE IF NOT EXISTS `schools_last_attended` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `school` text NOT NULL,
  `schoolyear` text NOT NULL,
  `program` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `schools_last_attended`
--

INSERT INTO `schools_last_attended` (`id`, `studentid`, `school`, `schoolyear`, `program`, `datetime`) VALUES
(1, 1, 'xxxxxxxxx', 'xxxxxxxxx', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sti_discoveries`
--

CREATE TABLE IF NOT EXISTS `sti_discoveries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `tv` int(11) NOT NULL,
  `radio` int(11) NOT NULL,
  `print` int(11) NOT NULL,
  `website` int(11) NOT NULL,
  `seminar` int(11) NOT NULL,
  `careerfactor` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `flyers` int(11) NOT NULL,
  `billboards` int(11) NOT NULL,
  `posters` int(11) NOT NULL,
  `stimuli` int(11) NOT NULL,
  `referrals` text NOT NULL,
  `others` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sti_discoveries`
--

INSERT INTO `sti_discoveries` (`id`, `studentid`, `tv`, `radio`, `print`, `website`, `seminar`, `careerfactor`, `event`, `flyers`, `billboards`, `posters`, `stimuli`, `referrals`, `others`, `datetime`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` text NOT NULL,
  `personal_information_id` int(11) NOT NULL,
  `school_last_attended_id` int(11) NOT NULL,
  `inquiry_id` int(11) NOT NULL,
  `school_considered_id` int(11) NOT NULL,
  `sti_discovery_id` int(11) NOT NULL,
  `enrollment_detail_id` int(11) NOT NULL,
  `appointment_detail_id` int(11) NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studentid`, `personal_information_id`, `school_last_attended_id`, `inquiry_id`, `school_considered_id`, `sti_discovery_id`, `enrollment_detail_id`, `appointment_detail_id`, `datetime`) VALUES
(1, 'xxxxxxxxx', 1, 1, 1, 1, 1, 1, 1, 1395376440);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `datetime` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `level`, `name`, `username`, `password`, `datetime`) VALUES
(2, 0, 'Nemory Oliver Martinez', 'nemory', 'nemory', 1395373199);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
