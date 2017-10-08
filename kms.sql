-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2017 at 08:07 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `connected_sites`
--

INSERT INTO `connected_sites` (`id`, `sitename`, `sitelink`, `filepath`, `content_type`) VALUES
(1, 'asdfasdf', 'asdfasdf', 'uploads/images/IB5BVwiLmV-2.png', 'image/png'),
(2, 'adsf', 'adsfasdf', 'uploads/images/vQlnkM90Sq-2.png', 'image/png'),
(3, 'dfadf', 'asdfasdf', 'uploads/images/aqnhXLcQRw-edited.png', 'image/png');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gad`
--

INSERT INTO `gad` (`id`, `filename`, `filepath`, `content_type`, `title`, `summary`, `author`, `isPublished`) VALUES
(21, 'contemporary 101.docx', 'uploads/RGJzsOzu8p-contemporary 101.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'asd', 'asd', 'asd', 1),
(23, 'Chapter 1-5 (1).docx', 'uploads/FBpYnNqlmq-Chapter 1-5 (1).docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'asdf', 'asdfasdfasdfasdf', 'asdfasdf', 0),
(24, 'thesissssssssss.docx', 'uploads/GDwc1s67Mb-thesissssssssss.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'Ultimate research', 'This is the brief introduction about research, it  includes almost a wide variety of issues', 'Christopher Enriquez', 0);

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
(3, 'asd', 'asdasd', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppa`
--

INSERT INTO `ppa` (`id`, `title`, `description`, `category`, `isPublished`) VALUES
(3, 'adf', 'adsf', 'Program', 0),
(4, 'sssss', 'asdfasdfasdfadfasdfasdf', 'Project', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `author`, `description`, `category`, `filename`, `filepath`, `content_type`, `isPublished`) VALUES
(1, 'asdf', 'asdf', 'asdf', 'Thesis', 'contemporary.docx', 'uploads/PSrNtt5cVp-contemporary.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 1),
(4, 'The title', 'Christopher', 'descroption', 'Records', 'FINDINGS.docx', 'uploads/xjz20aEp7t-FINDINGS.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 0);

-- --------------------------------------------------------

--
-- Table structure for table `token_manager`
--

CREATE TABLE IF NOT EXISTS `token_manager` (
  `id` int(11) unsigned NOT NULL,
  `token` varchar(64) NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_manager`
--

INSERT INTO `token_manager` (`id`, `token`, `user_id`) VALUES
(11, 'c686bdee2ce034dde0c00bf570900e25c2429ca2', 3),
(12, 'a3fb242a2bf4d174993ea32a71bb53805ea9a7b7', 3),
(14, '067f0fe88f5211b4d0b3f11e8f2128e002865457', 3),
(15, '555caa5edc0f1da27127abefdb252d90d0f0840d', 3),
(24, 'c568ce22290d82ddcb1880833fa6912927927e53', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(3, 'topher', 'lastname', 'username', 'email@email.com', '$2y$10$VTM3yCJVGMjFuNvL5GPAU.vd8mY4OPVTqV4ssC/UI91.pTP0GmkqG');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gad`
--
ALTER TABLE `gad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `linkages`
--
ALTER TABLE `linkages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ppa`
--
ALTER TABLE `ppa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `token_manager`
--
ALTER TABLE `token_manager`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
