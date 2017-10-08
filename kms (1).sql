-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 11:21 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE IF NOT EXISTS `calendar` (
  `id` int(11) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `start`, `end`, `title`) VALUES
(3, '2017-10-02', '2017-10-04', 'This is so important');

-- --------------------------------------------------------

--
-- Table structure for table `connected_sites`
--

CREATE TABLE IF NOT EXISTS `connected_sites` (
  `id` int(11) NOT NULL,
  `sitename` text NOT NULL,
  `sitelink` text NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connected_sites`
--

INSERT INTO `connected_sites` (`id`, `sitename`, `sitelink`, `filepath`, `content_type`) VALUES
(4, 'Google', 'www.google.com', 'uploads/images/VnPrPuXdJo-WHDQ-513499247.png', 'image/png'),
(5, 'Google Play', 'http://play.google.com', 'uploads/images/7kFoCVUofD-unnamed.png', 'image/png');

-- --------------------------------------------------------

--
-- Table structure for table `gad`
--

CREATE TABLE IF NOT EXISTS `gad` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL,
  `title` text NOT NULL,
  `summary` text NOT NULL,
  `author` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gad`
--

INSERT INTO `gad` (`id`, `filename`, `filepath`, `content_type`, `title`, `summary`, `author`, `isPublished`) VALUES
(26, 'thesissssssssss.docx', 'uploads/bdaIPccWw5-thesissssssssss.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Ultimate research', 'The ultimate research of all time', 'Christopher Enriquez', 1),
(27, 'Chapter 1-5 (1).docx', 'uploads/XjtHpoop0j-Chapter 1-5 (1).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'The title', 'Dare devil skateborder', 'Kick Butouwski', 1),
(28, 'Chapter 1-5 (1).docx', 'uploads/x2JCAW2rMX-Chapter 1-5 (1).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Yugen', 'She so beauriful <3', 'Yna', 0);

-- --------------------------------------------------------

--
-- Table structure for table `linkages`
--

CREATE TABLE IF NOT EXISTS `linkages` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linkages`
--

INSERT INTO `linkages` (`id`, `title`, `description`, `isPublished`) VALUES
(3, 'asd', 'asdasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ppa`
--

CREATE TABLE IF NOT EXISTS `ppa` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppa`
--

INSERT INTO `ppa` (`id`, `title`, `description`, `category`, `isPublished`) VALUES
(3, 'adf', 'adsf', 'Program', 0),
(4, 'sssss', 'asdfasdfasdfadfasdfasdf', 'Project', 1),
(5, 'asdasdasd', 'dsafasdfasdfasdf', 'Program', 1),
(6, 'sdfasdf', 'sadfasdfasd', 'Project', 1),
(7, 'asdfasdfadf', 'sadfasdfas', 'Project', 0);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE IF NOT EXISTS `resources` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `filename` text NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `author`, `description`, `category`, `filename`, `filepath`, `content_type`, `isPublished`) VALUES
(1, 'asdf', 'asdf', 'asdf', 'Thesis', 'contemporary.docx', 'uploads/PSrNtt5cVp-contemporary.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1),
(4, 'The title', 'Christopher', 'descroption', 'Records', 'FINDINGS.docx', 'uploads/xjz20aEp7t-FINDINGS.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1),
(5, 'asdwwefwef', 'wefawefaea', 'dasdfasdfasdfsacasdfcasdasdfcasdf', 'Reports', 'Chapter 1-5 (1).docx', 'uploads/eNkhvkplSA-Chapter 1-5 (1).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1),
(6, 'asdfasdf', 'asdfasdf', 'asdfasdfasdf', 'Modules', 'Chapter 1-5 (1).docx', 'uploads/LRAnmpk4G5-Chapter 1-5 (1).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0);

-- --------------------------------------------------------

--
-- Table structure for table `token_manager`
--

CREATE TABLE IF NOT EXISTS `token_manager` (
  `id` int(11) unsigned NOT NULL,
  `token` varchar(64) NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_manager`
--

INSERT INTO `token_manager` (`id`, `token`, `user_id`) VALUES
(11, 'c686bdee2ce034dde0c00bf570900e25c2429ca2', 3),
(12, 'a3fb242a2bf4d174993ea32a71bb53805ea9a7b7', 3),
(14, '067f0fe88f5211b4d0b3f11e8f2128e002865457', 3),
(15, '555caa5edc0f1da27127abefdb252d90d0f0840d', 3),
(24, 'c568ce22290d82ddcb1880833fa6912927927e53', 3),
(25, 'f709fa6f69ec0803a14de6e72acd987b758143c8', 3),
(29, '82234b0aedd8b4501a26e8f32f9b85d55353d9d3', 3),
(30, '84734f02b01ffc82f1a6b33ae289b7f2ca7274d9', 3),
(31, 'fb437127bea200bac6ba4c3b3b369875725b3034', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(3, 'topher', 'lastname', 'username', 'email@email.com', '$2y$10$VTM3yCJVGMjFuNvL5GPAU.vd8mY4OPVTqV4ssC/UI91.pTP0GmkqG'),
(4, 'as', 'as', 'as', 'asdfasdf@email.cpm', 'as'),
(5, 'Christopher', 'Enriquez', 'topher', 'the@email.com', '$2y$10$2LHl95KTMCzWf7rqhTkSauWCCS8CgXAQ7wwJU.0VmHr8xjtK3ax6S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`) COMMENT 'aa';

--
-- Indexes for table `connected_sites`
--
ALTER TABLE `connected_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gad`
--
ALTER TABLE `gad`
  ADD PRIMARY KEY (`id`) COMMENT 'primary';

--
-- Indexes for table `linkages`
--
ALTER TABLE `linkages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ppa`
--
ALTER TABLE `ppa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token_manager`
--
ALTER TABLE `token_manager`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `connected_sites`
--
ALTER TABLE `connected_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gad`
--
ALTER TABLE `gad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `linkages`
--
ALTER TABLE `linkages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ppa`
--
ALTER TABLE `ppa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `token_manager`
--
ALTER TABLE `token_manager`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
