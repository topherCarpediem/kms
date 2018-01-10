-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2018 at 01:37 PM
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
  `title` text NOT NULL,
  `timestart` text NOT NULL,
  `timeend` text NOT NULL,
  `summary` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `start`, `end`, `title`, `timestart`, `timeend`, `summary`, `isPublished`) VALUES
(1, '2018-01-03', '2018-01-03', 'dasdfgsdf', '10:56', '11:57', 'gsdfgsdfg', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gad`
--

CREATE TABLE IF NOT EXISTS `gad` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL,
  `filename` text NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL,
  `extension` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gad`
--

INSERT INTO `gad` (`id`, `title`, `author`, `description`, `category`, `isPublished`, `filename`, `filepath`, `content_type`, `extension`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', 1, 'dasd', 'asd', 'asd', 'ads');

-- --------------------------------------------------------

--
-- Table structure for table `linkages`
--

CREATE TABLE IF NOT EXISTS `linkages` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL,
  `filename` text NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL,
  `extension` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `linkages`
--

INSERT INTO `linkages` (`id`, `title`, `author`, `description`, `category`, `isPublished`, `filename`, `filepath`, `content_type`, `extension`) VALUES
(1, 'asd', 'asd', 'ad', 'ad', 1, 'asd.docx', 'uploads/asd.docx', 'application/octet-stream', 'DOCX');

-- --------------------------------------------------------

--
-- Table structure for table `ppa`
--

CREATE TABLE IF NOT EXISTS `ppa` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `isPublished` tinyint(1) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL,
  `extension` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ppa`
--

INSERT INTO `ppa` (`id`, `title`, `author`, `description`, `category`, `isPublished`, `filename`, `filepath`, `content_type`, `extension`) VALUES
(10, 'Sample pdf file', 'Topher', '  Adobe Acrobat PDF Files\nAdobeÂ® Portable Document Format (PDF) is a universal file format that preserves all\nof the fonts, formatting, colours and graphics of any source document, regardless of\n\nthe application and platform used to create it.\nAdobe PDF is an ideal format for electronic document distribution as it overcomes the\nproblems commonly encountered with electronic file sharing.\n Anyone, anywhere can open a PDF file. All you need is the free Adobe Acrobat\nReader. Recipients of other file', 'Project', 1, 'pdf-sample.pdf', 'uploads/1y3C3b8k3u-pdf-sample.pdf', 'application/pdf', 'PDF'),
(11, 'dsfa', 'asdfasdf', 'CR BU\n\nSOP No: 0001 \n\n SOP Title: Build MegaBank Setup\n\nSOP Number\n\n0001\n\n\n\nSOP Title\n\nJetson-TK1 setup\n\n\n\nNAME\n\nTITLE\n\nSIGNATURE\n\nDATE\n\nAuthor\n\nChristopher Enriquez\n\nSoftware Engineer\n\n\n\n2017-09-20\n\nReviewer\n\n\n\n\n\n\n\n\n\nAuthoriser\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\nEffective Date:\n\n\n\n\n\n\n\n\n\nREAD BY\n\nNAME \n\nTITLE\n\nSIGNATURE\n\nDATE\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n1.	PURPOSE\n\nThe message of this Standard Operating Procedure (SOP) is to provide detailed instructions on how to setup and build the MegaB', 'Plan', 1, 'SOP Build Megabank.docx', 'uploads/5bIOojg0Zh-SOP Build Megabank.docx', 'application/octet-stream', 'DOCX');

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
  `isPublished` tinyint(1) NOT NULL,
  `filename` text NOT NULL,
  `filepath` text NOT NULL,
  `content_type` text NOT NULL,
  `extension` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `author`, `description`, `category`, `isPublished`, `filename`, `filepath`, `content_type`, `extension`) VALUES
(1, 'asdasd', 'adasd', 'asd', 'asd', 1, 'asd', 'asd', 'asd', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `token_manager`
--

CREATE TABLE IF NOT EXISTS `token_manager` (
  `id` int(11) unsigned NOT NULL,
  `token` varchar(64) NOT NULL,
  `user_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `token_manager`
--

INSERT INTO `token_manager` (`id`, `token`, `user_id`) VALUES
(35, 'a37a2ff5e8e9534954cae409ce0f397ab0bf6af0', 4),
(37, '8beac473a310250bd7be1bdf82319ae20e8d44c5', 4);

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
  `password` varchar(100) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `image`) VALUES
(4, 'Christopher', 'Enriquez', 'username', 'topher@email.com', '$2y$10$ZU48xkSf1kvqShfj.yzWye9kYmFuC7zlFMdcP5FIEiWWpPhkz1YT.', 'uploads/userimage/dpTJb41Lfo-avatar.png');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `connected_sites`
--
ALTER TABLE `connected_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gad`
--
ALTER TABLE `gad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `linkages`
--
ALTER TABLE `linkages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ppa`
--
ALTER TABLE `ppa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `token_manager`
--
ALTER TABLE `token_manager`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
