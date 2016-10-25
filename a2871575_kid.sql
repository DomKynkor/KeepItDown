
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2016 at 09:57 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a2871575_kid`
--

-- --------------------------------------------------------

--
-- Table structure for table `sleepInfo`
--

CREATE TABLE `sleepInfo` (
  `room` int(3) unsigned NOT NULL,
  `state` varchar(6) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sleepInfo`
--

INSERT INTO `sleepInfo` VALUES(204, 'OFF');
INSERT INTO `sleepInfo` VALUES(203, 'OFF');
INSERT INTO `sleepInfo` VALUES(206, 'OFF');
INSERT INTO `sleepInfo` VALUES(205, 'SOCIAL');
INSERT INTO `sleepInfo` VALUES(207, 'STUDY');
INSERT INTO `sleepInfo` VALUES(208, 'OFF');
INSERT INTO `sleepInfo` VALUES(210, 'STUDY');
INSERT INTO `sleepInfo` VALUES(211, 'STUDY');
INSERT INTO `sleepInfo` VALUES(213, 'OFF');
INSERT INTO `sleepInfo` VALUES(214, 'STUDY');
INSERT INTO `sleepInfo` VALUES(215, 'OFF');
INSERT INTO `sleepInfo` VALUES(216, 'OFF');
INSERT INTO `sleepInfo` VALUES(217, 'OFF');
INSERT INTO `sleepInfo` VALUES(218, 'STUDY');

-- --------------------------------------------------------

--
-- Table structure for table `sleepLog`
--

CREATE TABLE `sleepLog` (
  `time` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `sleep` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `study` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `social` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `off` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `sleepLog`
--

INSERT INTO `sleepLog` VALUES('21:41', '', '207 210 211 214 218 ', '205 ', '204 203 206 208 213 215 216 217 ');
