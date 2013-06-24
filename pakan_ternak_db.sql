-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2012 at 12:41 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pakan_ternak_db`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `stok_alert`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `stok_alert`()
BEGIN
SELECT jp_nama,jp_stok FROM tbl_jenis_pakan WHERE jp_stok < (SELECT min_stok FROM app_config WHERE id = 1);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `app_config`
--

DROP TABLE IF EXISTS `app_config`;
CREATE TABLE IF NOT EXISTS `app_config` (
  `data_per_page` int(11) DEFAULT '5',
  `min_stok` float(15,1) DEFAULT '50.0',
  `last_activity` int(11) DEFAULT '10',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `app_config`
--

INSERT INTO `app_config` (`data_per_page`, `min_stok`, `last_activity`, `id`) VALUES
(5, 50.0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `i_widget`
--

DROP TABLE IF EXISTS `i_widget`;
CREATE TABLE IF NOT EXISTS `i_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `column_id` int(11) NOT NULL,
  `sort_no` int(11) NOT NULL,
  `collapsed` tinyint(4) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `i_widget`
--

INSERT INTO `i_widget` (`id`, `column_id`, `sort_no`, `collapsed`, `title`) VALUES
(1, 0, 0, 0, 'Akses Cepat'),
(2, 1, 0, 0, 'User Info'),
(3, 1, 1, 0, 'Aktifitas Terakhir'),
(4, 0, 1, 0, 'Peringatan');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktifitas`
--

DROP TABLE IF EXISTS `log_aktifitas`;
CREATE TABLE IF NOT EXISTS `log_aktifitas` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `log_content` varchar(255) NOT NULL,
  `log_time` varchar(32) NOT NULL,
  `log_type` int(11) NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `log_aktifitas`
--

INSERT INTO `log_aktifitas` (`log_id`, `user_id`, `log_content`, `log_time`, `log_type`) VALUES
(1, 2, 'penambahan stok pakan', '1352117466', 24),
(2, 2, 'penambahan stok pakan', '1352117496', 23),
(3, 2, 'penambahan stok pakan', '1352117564', 22),
(4, 2, 'penambahan stok pakan', '1352117591', 23),
(5, 2, 'pemakaian pakan', '1352117636', 24),
(6, 1, 'pemakaian pakan', '1352246346', 22),
(7, 1, 'pemakaian pakan', '1352344273', 22),
(8, 1, 'penambahan stok pakan', '1352891583', 23),
(9, 1, 'penambahan stok pakan', '1352891603', 24),
(10, 1, 'penambahan stok pakan', '1352891622', 22),
(11, 1, 'pemakaian pakan', '1352891654', 22),
(12, 1, 'pemakaian pakan', '1352891668', 23),
(13, 1, 'pemakaian pakan', '1352891685', 24),
(14, 1, 'penambahan stok pakan', '1353409455', 24),
(15, 1, 'pemakaian pakan', '1353409489', 24),
(16, 1, 'penambahan stok pakan', '1353501482', 15),
(17, 1, 'penambahan stok pakan', '1353546723', 15),
(18, 1, 'pemakaian pakan', '1353546747', 22),
(19, 1, 'penambahan stok pakan', '1353547506', 16),
(20, 1, 'pemakaian pakan', '1353547530', 16),
(21, 1, 'penambahan stok pakan', '1353548557', 17),
(22, 1, 'penambahan stok pakan', '1353548578', 18),
(23, 1, 'penambahan stok pakan', '1353548596', 19),
(24, 1, 'penambahan stok pakan', '1353548622', 20),
(25, 1, 'penambahan stok pakan', '1353548643', 21),
(26, 1, 'pemakaian pakan', '1353579737', 16),
(27, 1, 'pemakaian pakan', '1353674906', 15),
(28, 1, 'penambahan stok pakan', '1353674930', 16),
(29, 1, 'penambahan stok pakan', '1353723454', 21),
(30, 1, 'penambahan stok pakan', '1353723477', 19),
(31, 1, 'penambahan stok pakan', '1353723498', 16),
(32, 1, 'pemakaian pakan', '1353723574', 17),
(33, 1, 'pemakaian pakan', '1353723592', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pakan`
--

DROP TABLE IF EXISTS `tbl_jenis_pakan`;
CREATE TABLE IF NOT EXISTS `tbl_jenis_pakan` (
  `jp_id` int(11) NOT NULL AUTO_INCREMENT,
  `jp_nama` varchar(40) DEFAULT NULL,
  `jp_keterangan` tinytext,
  `user_id` int(11) DEFAULT NULL,
  `jp_stok` float(15,1) NOT NULL,
  PRIMARY KEY (`jp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_jenis_pakan`
--

INSERT INTO `tbl_jenis_pakan` (`jp_id`, `jp_nama`, `jp_keterangan`, `user_id`, `jp_stok`) VALUES
(15, 'katul', '<p>dari lumajang</p>', 2, 0.0),
(16, 'jagung', '<p>dari mojosari</p>', 2, 0.0),
(17, 'konsentrat layer', '<p>produksi comfeed</p>', 2, 0.0),
(18, 'konsentrat layer khusus', '<p>produksi comfeed</p>', 2, 0.0),
(19, 'GCLS', '<p>dari wonokoyo</p>', 2, 0.0),
(20, 'KLW36', '<p>dari wonokoyo</p>', 2, 0.0),
(21, 'K204', '<p>dari mana........</p>', 2, 0.0),
(22, 'for-test', '<p>cuman buwat ngetest ok</p>', 2, 400.0),
(23, 'testing2', '<p>coba buat ngetes yang lain.</p>', 2, 800.0),
(24, 'testOK', '<p>just other test ok</p>', 2, 150.0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pakai_pakan`
--

DROP TABLE IF EXISTS `tbl_pakai_pakan`;
CREATE TABLE IF NOT EXISTS `tbl_pakai_pakan` (
  `pp_id` int(11) NOT NULL AUTO_INCREMENT,
  `jp_id` int(11) DEFAULT NULL,
  `pp_tgl` date DEFAULT NULL,
  `pp_jam` time DEFAULT NULL,
  `pp_jumlah_pakai` double(15,1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pp_time` varchar(32) NOT NULL,
  PRIMARY KEY (`pp_id`),
  KEY `jp_id` (`jp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- RELATIONS FOR TABLE `tbl_pakai_pakan`:
--   `jp_id`
--       `tbl_jenis_pakan` -> `jp_id`
--

--
-- Dumping data for table `tbl_pakai_pakan`
--

INSERT INTO `tbl_pakai_pakan` (`pp_id`, `jp_id`, `pp_tgl`, `pp_jam`, `pp_jumlah_pakai`, `user_id`, `pp_time`) VALUES
(13, 24, '2012-11-05', '13:13:00', 50.0, 2, '1352117636'),
(14, 22, '2012-11-07', '00:52:00', 50.0, 1, '1352246346'),
(15, 22, '2012-11-08', '04:11:00', 50.0, 1, '1352344273');

--
-- Triggers `tbl_pakai_pakan`
--
DROP TRIGGER IF EXISTS `pp_log_del`;
DELIMITER //
CREATE TRIGGER `pp_log_del` BEFORE DELETE ON `tbl_pakai_pakan`
 FOR EACH ROW BEGIN
DELETE FROM log_aktifitas WHERE log_time = OLD.pp_time;
UPDATE `tbl_jenis_pakan` SET `tbl_jenis_pakan`.jp_stok = `tbl_jenis_pakan`.jp_stok + OLD.pp_jumlah_pakai WHERE tbl_jenis_pakan.jp_id = OLD.jp_id; 
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `pp_log_in`;
DELIMITER //
CREATE TRIGGER `pp_log_in` AFTER INSERT ON `tbl_pakai_pakan`
 FOR EACH ROW BEGIN
INSERT INTO log_aktifitas(user_id,log_content,log_time,log_type) VALUES(NEW.user_id,'pemakaian pakan',NEW.pp_time,NEW.jp_id);
UPDATE tbl_jenis_pakan SET tbl_jenis_pakan.jp_stok = tbl_jenis_pakan.jp_stok - NEW.pp_jumlah_pakai WHERE tbl_jenis_pakan.jp_id = NEW.jp_id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stok_pakan`
--

DROP TABLE IF EXISTS `tbl_stok_pakan`;
CREATE TABLE IF NOT EXISTS `tbl_stok_pakan` (
  `sp_id` int(11) NOT NULL AUTO_INCREMENT,
  `sp_tgl` date DEFAULT NULL,
  `sp_no_bukti` varchar(30) DEFAULT NULL,
  `sp_keterangan` tinytext,
  `sp_jumlah_masuk` double(15,1) DEFAULT NULL,
  `jp_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sp_time` varchar(32) NOT NULL,
  PRIMARY KEY (`sp_id`),
  KEY `jp_id` (`jp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- RELATIONS FOR TABLE `tbl_stok_pakan`:
--   `jp_id`
--       `tbl_jenis_pakan` -> `jp_id`
--

--
-- Dumping data for table `tbl_stok_pakan`
--

INSERT INTO `tbl_stok_pakan` (`sp_id`, `sp_tgl`, `sp_no_bukti`, `sp_keterangan`, `sp_jumlah_masuk`, `jp_id`, `user_id`, `sp_time`) VALUES
(12, '2012-11-05', 'svvv54dt', '<p>test fo other test</p>', 200.0, 24, 2, '1352117466'),
(13, '2012-11-05', 'dxv646', '<p>testting</p>', 500.0, 23, 2, '1352117496'),
(14, '2012-11-05', 'dt4534', '<p>testing</p>', 500.0, 22, 2, '1352117564'),
(15, '2012-11-05', '3241xt', '<p>for test</p>', 300.0, 23, 2, '1352117591');

--
-- Triggers `tbl_stok_pakan`
--
DROP TRIGGER IF EXISTS `sp_log_del`;
DELIMITER //
CREATE TRIGGER `sp_log_del` BEFORE DELETE ON `tbl_stok_pakan`
 FOR EACH ROW BEGIN
DELETE FROM log_aktifitas WHERE log_time = OLD.sp_time;
UPDATE tbl_jenis_pakan SET tbl_jenis_pakan.jp_stok = tbl_jenis_pakan.jp_stok - OLD.sp_jumlah_masuk WHERE tbl_jenis_pakan.jp_id = OLD.jp_id;
END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `sp_log_in`;
DELIMITER //
CREATE TRIGGER `sp_log_in` AFTER INSERT ON `tbl_stok_pakan`
 FOR EACH ROW BEGIN
INSERT INTO log_aktifitas(user_id,log_content,log_time,log_type) VALUES(NEW.user_id,'penambahan stok pakan',NEW.sp_time,NEW.jp_id);
UPDATE tbl_jenis_pakan SET tbl_jenis_pakan.jp_stok = tbl_jenis_pakan.jp_stok + NEW.sp_jumlah_masuk WHERE tbl_jenis_pakan.jp_id = NEW.jp_id; 
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_member`
--

DROP TABLE IF EXISTS `user_member`;
CREATE TABLE IF NOT EXISTS `user_member` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(20) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_tema` varchar(20) DEFAULT 'default',
  `user_level` enum('user','admin') NOT NULL DEFAULT 'user',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_nama` (`user_nama`),
  UNIQUE KEY `user_nama_2` (`user_nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_member`
--

INSERT INTO `user_member` (`user_id`, `user_nama`, `user_password`, `user_tema`, `user_level`) VALUES
(1, 'developer', '7a63c8e06cccf93b5b5959b2b20d363a05b525c9', 'black', 'admin'),
(2, 'tester', '2db933d188e6e90acddec9a4004dc74aec84cdcd', 'default', 'user'),
(5, 'admin', '223e44076abcffc4d686d04fddfd8a675e2d5e08', 'default', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jenis_pakan`
--
DROP VIEW IF EXISTS `view_jenis_pakan`;
CREATE TABLE IF NOT EXISTS `view_jenis_pakan` (
`jp_id` int(11)
,`jp_nama` varchar(40)
,`jp_keterangan` tinytext
,`user_nama` varchar(20)
,`jp_stok` float(15,1)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_log`
--
DROP VIEW IF EXISTS `view_log`;
CREATE TABLE IF NOT EXISTS `view_log` (
`user_nama` varchar(20)
,`log_content` varchar(255)
,`log_time` varchar(32)
,`jp_nama` varchar(40)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pakai_pakan`
--
DROP VIEW IF EXISTS `view_pakai_pakan`;
CREATE TABLE IF NOT EXISTS `view_pakai_pakan` (
`pp_id` int(11)
,`jp_nama` varchar(40)
,`pp_tgl` date
,`pp_jam` time
,`pp_jumlah_pakai` double(15,1)
,`user_nama` varchar(20)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stok_pakan`
--
DROP VIEW IF EXISTS `view_stok_pakan`;
CREATE TABLE IF NOT EXISTS `view_stok_pakan` (
`sp_id` int(11)
,`sp_tgl` date
,`sp_no_bukti` varchar(30)
,`sp_keterangan` tinytext
,`sp_jumlah_masuk` double(15,1)
,`jp_nama` varchar(40)
,`user_nama` varchar(20)
);
-- --------------------------------------------------------

--
-- Structure for view `view_jenis_pakan`
--
DROP TABLE IF EXISTS `view_jenis_pakan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jenis_pakan` AS select `tbl_jenis_pakan`.`jp_id` AS `jp_id`,`tbl_jenis_pakan`.`jp_nama` AS `jp_nama`,`tbl_jenis_pakan`.`jp_keterangan` AS `jp_keterangan`,`user_member`.`user_nama` AS `user_nama`,`tbl_jenis_pakan`.`jp_stok` AS `jp_stok` from (`tbl_jenis_pakan` join `user_member`) where (`tbl_jenis_pakan`.`user_id` = `user_member`.`user_id`);

-- --------------------------------------------------------

--
-- Structure for view `view_log`
--
DROP TABLE IF EXISTS `view_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_log` AS select `user_member`.`user_nama` AS `user_nama`,`log_aktifitas`.`log_content` AS `log_content`,`log_aktifitas`.`log_time` AS `log_time`,`tbl_jenis_pakan`.`jp_nama` AS `jp_nama` from ((`user_member` join `log_aktifitas`) join `tbl_jenis_pakan`) where ((`log_aktifitas`.`user_id` = `user_member`.`user_id`) and (`log_aktifitas`.`log_type` = `tbl_jenis_pakan`.`jp_id`));

-- --------------------------------------------------------

--
-- Structure for view `view_pakai_pakan`
--
DROP TABLE IF EXISTS `view_pakai_pakan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pakai_pakan` AS select `tbl_pakai_pakan`.`pp_id` AS `pp_id`,`tbl_jenis_pakan`.`jp_nama` AS `jp_nama`,`tbl_pakai_pakan`.`pp_tgl` AS `pp_tgl`,`tbl_pakai_pakan`.`pp_jam` AS `pp_jam`,`tbl_pakai_pakan`.`pp_jumlah_pakai` AS `pp_jumlah_pakai`,`user_member`.`user_nama` AS `user_nama` from ((`tbl_pakai_pakan` join `tbl_jenis_pakan`) join `user_member`) where ((`tbl_pakai_pakan`.`jp_id` = `tbl_jenis_pakan`.`jp_id`) and (`tbl_pakai_pakan`.`user_id` = `user_member`.`user_id`));

-- --------------------------------------------------------

--
-- Structure for view `view_stok_pakan`
--
DROP TABLE IF EXISTS `view_stok_pakan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stok_pakan` AS select `tbl_stok_pakan`.`sp_id` AS `sp_id`,`tbl_stok_pakan`.`sp_tgl` AS `sp_tgl`,`tbl_stok_pakan`.`sp_no_bukti` AS `sp_no_bukti`,`tbl_stok_pakan`.`sp_keterangan` AS `sp_keterangan`,`tbl_stok_pakan`.`sp_jumlah_masuk` AS `sp_jumlah_masuk`,`tbl_jenis_pakan`.`jp_nama` AS `jp_nama`,`user_member`.`user_nama` AS `user_nama` from ((`tbl_stok_pakan` join `tbl_jenis_pakan`) join `user_member`) where ((`tbl_stok_pakan`.`jp_id` = `tbl_jenis_pakan`.`jp_id`) and (`tbl_stok_pakan`.`user_id` = `user_member`.`user_id`));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_pakai_pakan`
--
ALTER TABLE `tbl_pakai_pakan`
  ADD CONSTRAINT `fk_pakai_pakan` FOREIGN KEY (`jp_id`) REFERENCES `tbl_jenis_pakan` (`jp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_stok_pakan`
--
ALTER TABLE `tbl_stok_pakan`
  ADD CONSTRAINT `fk_stok_pakan` FOREIGN KEY (`jp_id`) REFERENCES `tbl_jenis_pakan` (`jp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
