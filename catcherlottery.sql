-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2018-05-12 07:04:30
-- 伺服器版本: 5.7.19
-- PHP 版本： 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `catcherlottery`
--
CREATE DATABASE IF NOT EXISTS `catcherlottery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `catcherlottery`;

-- --------------------------------------------------------

--
-- 資料表結構 `rewards`
--

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL,
  `msg` varchar(256) CHARACTER SET utf8 NOT NULL,
  `img` varchar(32) CHARACTER SET utf8 NOT NULL,
  `amount` int(11) NOT NULL,
  `getRate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10016 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `sn_list`
--

DROP TABLE IF EXISTS `sn_list`;
CREATE TABLE IF NOT EXISTS `sn_list` (
  `sn` varchar(12) CHARACTER SET utf8 NOT NULL,
  `pwd` varchar(12) CHARACTER SET utf8 NOT NULL,
  `batch_id` int(11) NOT NULL,
  `reward` int(11) NOT NULL DEFAULT '0',
  `userName` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `userPhone` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `useDate` datetime DEFAULT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
