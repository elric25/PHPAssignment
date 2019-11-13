-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2019 at 09:46 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project`
--
CREATE DATABASE IF NOT EXISTS `Project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `Project`;

-- --------------------------------------------------------

--
-- Table structure for table `Accessibility`
--

DROP TABLE IF EXISTS `Accessibility`;
CREATE TABLE IF NOT EXISTS `Accessibility` (
  `Accessibility_Code` varchar(16) NOT NULL,
  `Description` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Album`
--

DROP TABLE IF EXISTS `Album`;
CREATE TABLE IF NOT EXISTS `Album` (
  `Album_Id` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  `Date_Updated` date NOT NULL,
  `Owner_Id` varchar(16) NOT NULL,
  `Accessibility_code` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

DROP TABLE IF EXISTS `Comment`;
CREATE TABLE IF NOT EXISTS `Comment` (
  `Comment_Id` int(11) NOT NULL,
  `Author_Id` varchar(16) NOT NULL,
  `Picture_Id` int(11) NOT NULL,
  `Comment_Text` varchar(3000) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Friendship`
--

DROP TABLE IF EXISTS `Friendship`;
CREATE TABLE IF NOT EXISTS `Friendship` (
  `Friend_RequesterId` varchar(16) NOT NULL,
  `Friend_RequesteeId` varchar(16) NOT NULL,
  `Status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `FriendshipStatus`
--

DROP TABLE IF EXISTS `FriendshipStatus`;
CREATE TABLE IF NOT EXISTS `FriendshipStatus` (
  `Status_Code` varchar(16) NOT NULL,
  `Description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Picture`
--

DROP TABLE IF EXISTS `Picture`;
CREATE TABLE IF NOT EXISTS `Picture` (
  `Picture_Id` int(11) NOT NULL,
  `Album_Id` int(11) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Description` varchar(3000) DEFAULT NULL,
  `Date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `UserId` varchar(16) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Phone` varchar(16) DEFAULT NULL,
  `Password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accessibility`
--
ALTER TABLE `Accessibility`
  ADD KEY `Accessibility_Code` (`Accessibility_Code`);

--
-- Indexes for table `Album`
--
ALTER TABLE `Album`
  ADD PRIMARY KEY (`Album_Id`),
  ADD KEY `Owner_Id` (`Owner_Id`),
  ADD KEY `Accessibility_code` (`Accessibility_code`);

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`Comment_Id`),
  ADD KEY `Picture_Id` (`Picture_Id`),
  ADD KEY `Author_Id` (`Author_Id`);

--
-- Indexes for table `Friendship`
--
ALTER TABLE `Friendship`
  ADD KEY `Friend_RequesterId` (`Friend_RequesterId`),
  ADD KEY `Friend_RequesteeId` (`Friend_RequesteeId`),
  ADD KEY `Status` (`Status`);

--
-- Indexes for table `FriendshipStatus`
--
ALTER TABLE `FriendshipStatus`
  ADD PRIMARY KEY (`Status_Code`);

--
-- Indexes for table `Picture`
--
ALTER TABLE `Picture`
  ADD PRIMARY KEY (`Picture_Id`),
  ADD KEY `Album_Id` (`Album_Id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Album`
--
ALTER TABLE `Album`
  MODIFY `Album_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `Picture`
--
ALTER TABLE `Picture`
  MODIFY `Picture_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Album`
--
ALTER TABLE `Album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`Owner_Id`) REFERENCES `User` (`UserId`),
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`Accessibility_code`) REFERENCES `Accessibility` (`Accessibility_Code`);

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Picture_Id`) REFERENCES `Picture` (`Picture_Id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`Author_Id`) REFERENCES `User` (`UserId`);

--
-- Constraints for table `Friendship`
--
ALTER TABLE `Friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`Friend_RequesterId`) REFERENCES `USER` (`UserId`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`Friend_RequesteeId`) REFERENCES `USER` (`UserId`),
  ADD CONSTRAINT `friendship_ibfk_3` FOREIGN KEY (`Status`) REFERENCES `FriendshipStatus` (`Status_Code`);

--
-- Constraints for table `Picture`
--
ALTER TABLE `Picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`Album_Id`) REFERENCES `Album` (`Album_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
