-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2018 年 1 朁E27 日 05:23
-- サーバのバージョン： 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gs_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE IF NOT EXISTS `gs_an_table` (
`id` int(12) NOT NULL,
  `employ_id` int(6) NOT NULL DEFAULT '100000',
  `employ_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `employ_yomi` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employ_birthday` date NOT NULL,
  `employ_hiredate` date NOT NULL,
  `employ_Hwage` int(5) NOT NULL,
  `employ_memo` text COLLATE utf8_unicode_ci,
  `employ_updatetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `employ_id`, `employ_name`, `employ_yomi`, `employ_birthday`, `employ_hiredate`, `employ_Hwage`, `employ_memo`, `employ_updatetime`) VALUES
(1, 100001, '佐藤 翔太', 'さとう しょうた', '1976-02-06', '2014-01-01', 1400, '直接入力', '2018-01-25 00:00:00'),
(2, 100002, '山田 電機', 'ヤマダ デンキ', '1980-01-01', '2014-02-01', 1200, 'まだまだ安いんだ', '2018-01-25 22:37:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
 ADD PRIMARY KEY (`id`,`employ_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_an_table`
--
ALTER TABLE `gs_an_table`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
