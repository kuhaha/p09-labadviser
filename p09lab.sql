-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- ホスト: localhost
-- 生成時間: 2016 年 1 月 29 日 10:16
-- サーバのバージョン: 5.5.8
-- PHP のバージョン: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- データベース: `soturon`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `appoint`
--

CREATE TABLE IF NOT EXISTS `appoint` (
  `APID` int(8) NOT NULL AUTO_INCREMENT,
  `LNAME` varchar(32) NOT NULL,
  `APDAY` date NOT NULL,
  `APDAYGEN` char(1) NOT NULL,
  `APJUD` char(1) NOT NULL,
  `UNAME` varchar(32) DEFAULT NULL,
  `SYONIN` char(1) NOT NULL,
  PRIMARY KEY (`APID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- テーブルのデータをダンプしています `appoint`
--

INSERT INTO `appoint` (`APID`, `LNAME`, `APDAY`, `APDAYGEN`, `APJUD`, `UNAME`, `SYONIN`) VALUES
(30, '成', '2015-05-01', '3', '1', NULL, '2'),
(31, '成', '2015-05-01', '3', '2', '三年 生太', '1'),
(32, '成', '2015-05-01', '3', '3', NULL, '2'),
(33, '成', '2015-05-04', '2', '1', NULL, '2'),
(34, '成', '2015-05-04', '2', '2', NULL, '2'),
(35, '成', '2015-05-04', '2', '3', '三年 生太', '2'),
(36, '成', '2015-05-06', '3', '1', NULL, '2'),
(37, '成', '2015-05-06', '3', '2', '学 生', '2'),
(38, '成', '2015-05-06', '3', '3', '', '2'),
(39, '成', '2015-05-07', '4', '1', '後輩 次郎', '1'),
(40, '成', '2015-05-07', '4', '2', NULL, '2'),
(41, '成', '2015-05-07', '4', '3', NULL, '2');

-- --------------------------------------------------------

--
-- テーブルの構造 `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `FBID` int(11) NOT NULL AUTO_INCREMENT,
  `LNAME` varchar(32) NOT NULL,
  `UNUM` varchar(32) NOT NULL,
  `fbjud` varchar(1) NOT NULL,
  PRIMARY KEY (`FBID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=233 ;

--
-- テーブルのデータをダンプしています `feedback`
--

INSERT INTO `feedback` (`FBID`, `LNAME`, `UNUM`, `fbjud`) VALUES
(143, '朝廣', '13JK333', '2'),
(144, 'Apduhan', '13JK333', '2'),
(145, '安部', '13JK333', '2'),
(146, '石田健', '13JK333', '2'),
(147, '一ノ瀬', '13JK333', '2'),
(148, '合志', '13JK333', '2'),
(149, '下川', '13JK333', '2'),
(150, '成', '13JK333', '1'),
(151, '田中', '13JK333', '2'),
(152, '仲', '13JK333', '2'),
(153, '米元', '13JK333', '2'),
(154, '稲永', '13JK333', '2'),
(155, '澤田', '13JK333', '2'),
(156, '古井', '13JK333', '2'),
(157, '安武', '13JK333', '2'),
(218, '朝廣', 'gakusei', '2'),
(219, 'Apduhan', 'gakusei', '2'),
(220, '安部', 'gakusei', '2'),
(221, '石田健', 'gakusei', '2'),
(222, '一ノ瀬', 'gakusei', '2'),
(223, '合志', 'gakusei', '2'),
(224, '下川', 'gakusei', '2'),
(225, '成', 'gakusei', '1'),
(226, '田中', 'gakusei', '2'),
(227, '仲', 'gakusei', '2'),
(228, '米元', 'gakusei', '2'),
(229, '稲永', 'gakusei', '2'),
(230, '澤田', 'gakusei', '2'),
(231, '古井', 'gakusei', '2'),
(232, '安武', 'gakusei', '2');

-- --------------------------------------------------------

--
-- テーブルの構造 `lab`
--

CREATE TABLE IF NOT EXISTS `lab` (
  `LNAME` varchar(8) NOT NULL,
  `LJUD` char(8) NOT NULL,
  `IPAGE` text,
  `LID` char(8) DEFAULT NULL,
  PRIMARY KEY (`LNAME`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータをダンプしています `lab`
--

INSERT INTO `lab` (`LNAME`, `LJUD`, `IPAGE`, `LID`) VALUES
('Apduhan', '2', NULL, '1'),
('一ノ瀬', '2', NULL, '2'),
('下川', '2', NULL, '3'),
('仲', '2', NULL, '4'),
('古井', '2', NULL, '5'),
('合志', '2', NULL, '6'),
('安武', '2', '\r\n\r\nETソフトウェアデザインロボットコンテスト（通称ETロボコン）へ出場します。プログラミングだけでなくシステム設計と開発プロジェクトの知識や技術を身につけます。\r\n\r\nプログラミング言語はC、C++、C#、Java、Rubyなどを使います。システム設計にはUMLを用いモデリングシートを作成します。開発プロジェクトではプロジェクトベース設計演習で学ぶ内容を活用します。', '7'),
('安部', '2', NULL, '8'),
('成', '2', '成研究室では、人のため、社会のために、データベースおよびWeb技術を駆使して、斬新な情報サービスの提案、設計、開発を行っています。パソコンの組立てや、OSのインストール、サーバの設定、Webシステムの提案・設計・開発等の技術を取得することができます。また、成研究室では、研究室運営委員会をはじめとして、学生のヒューマンスキル向上を見据えた取り組みも実施しています。毎週の研究会では教授も学生たちと混ざり、就職活動や研究について活発な議論を交わしています ', '9'),
('朝廣', '2', NULL, '10'),
('澤田', '2', NULL, '11'),
('田中', '2', NULL, '12'),
('石田健', '2', NULL, '13'),
('稲永', '2', NULL, '14'),
('米元', '2', NULL, '15');

-- --------------------------------------------------------

--
-- テーブルの構造 `ldevent`
--

CREATE TABLE IF NOT EXISTS `ldevent` (
  `LDID` int(8) NOT NULL AUTO_INCREMENT,
  `LNAME` varchar(8) NOT NULL,
  `LDMONTH` char(8) NOT NULL,
  `LDEVENT` text,
  PRIMARY KEY (`LDID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;

--
-- テーブルのデータをダンプしています `ldevent`
--

INSERT INTO `ldevent` (`LDID`, `LNAME`, `LDMONTH`, `LDEVENT`) VALUES
(1, '成', '1', ''),
(2, '成', '2', ''),
(3, '成', '3', ''),
(4, '成', '4', '歓迎会、研究会'),
(5, '成', '5', '研究会'),
(6, '成', '6', '研究会'),
(7, '成', '7', '研究会'),
(8, '成', '8', '研究会'),
(9, '成', '9', '研究会'),
(10, '成', '10', ''),
(11, '成', '11', ''),
(12, '成', '12', ''),
(13, '古井', '1', '新年会（飲み会）'),
(14, '古井', '2', ''),
(15, '古井', '3', ''),
(16, '古井', '4', '親睦会（飲み会）、研究会'),
(17, '古井', '5', '研究会'),
(18, '古井', '6', '研究会'),
(19, '古井', '7', '研究会'),
(20, '古井', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(21, '古井', '9', '研究会'),
(22, '古井', '10', '研究会'),
(23, '古井', '11', '研究会'),
(24, '古井', '12', '忘年会（飲み会）、研究会'),
(25, '朝廣', '1', '新年会（飲み会）'),
(26, '朝廣', '2', ''),
(27, '朝廣', '3', ''),
(28, '朝廣', '4', '親睦会（飲み会）、研究会'),
(29, '朝廣', '5', '研究会'),
(30, '朝廣', '6', '研究会'),
(31, '朝廣', '7', '研究会'),
(32, '朝廣', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(33, '朝廣', '9', '研究会'),
(34, '朝廣', '10', '研究会'),
(35, '朝廣', '11', '研究会'),
(36, '朝廣', '12', '忘年会（飲み会）、研究会'),
(37, 'Apduhan', '1', '新年会（飲み会）'),
(38, 'Apduhan', '2', ''),
(39, 'Apduhan', '3', ''),
(40, 'Apduhan', '4', '親睦会（飲み会）、研究会'),
(41, 'Apduhan', '5', '研究会'),
(42, 'Apduhan', '6', '研究会'),
(43, 'Apduhan', '7', '研究会'),
(44, 'Apduhan', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(45, 'Apduhan', '9', '研究会'),
(46, 'Apduhan', '10', '研究会'),
(47, 'Apduhan', '11', '研究会'),
(48, 'Apduhan', '12', '忘年会（飲み会）、研究会'),
(49, '石田', '1', '新年会（飲み会）'),
(50, '石田', '2', ''),
(51, '石田', '3', ''),
(52, '石田', '4', '親睦会（飲み会）、研究会'),
(53, '石田', '5', '研究会'),
(54, '石田', '6', '研究会'),
(55, '石田', '7', '研究会'),
(56, '石田', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(57, '石田', '9', '研究会'),
(58, '石田', '10', '研究会'),
(59, '石田', '11', '研究会'),
(60, '石田', '12', '忘年会（飲み会）、研究会'),
(61, '一ノ瀬', '1', '新年会（飲み会）'),
(62, '一ノ瀬', '2', ''),
(63, '一ノ瀬', '3', ''),
(64, '一ノ瀬', '4', '親睦会（飲み会）、研究会'),
(65, '一ノ瀬', '5', '研究会'),
(66, '一ノ瀬', '6', '研究会'),
(67, '一ノ瀬', '7', '研究会'),
(68, '一ノ瀬', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(69, '一ノ瀬', '9', '研究会'),
(70, '一ノ瀬', '10', '研究会'),
(71, '一ノ瀬', '11', '研究会'),
(72, '一ノ瀬', '12', '忘年会（飲み会）、研究会'),
(73, '合志', '1', '新年会（飲み会）'),
(74, '合志', '2', ''),
(75, '合志', '3', ''),
(76, '合志', '4', '親睦会（飲み会）、研究会'),
(77, '合志', '5', '研究会'),
(78, '合志', '6', '研究会'),
(79, '合志', '7', '研究会'),
(80, '合志', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(81, '合志', '9', '研究会'),
(82, '合志', '10', '研究会'),
(83, '合志', '11', '研究会'),
(84, '合志', '12', '忘年会（飲み会）、研究会'),
(85, '下川', '1', '新年会（飲み会）'),
(86, '下川', '2', ''),
(87, '下川', '3', ''),
(88, '下川', '4', '親睦会（飲み会）、研究会'),
(89, '下川', '5', '研究会'),
(90, '下川', '6', '研究会'),
(91, '下川', '7', '研究会'),
(92, '下川', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(93, '下川', '9', '研究会'),
(94, '下川', '10', '研究会'),
(95, '下川', '11', '研究会'),
(96, '下川', '12', '忘年会（飲み会）、研究会'),
(109, '田中', '1', '新年会（飲み会）'),
(110, '田中', '2', ''),
(111, '田中', '3', ''),
(112, '田中', '4', '親睦会（飲み会）、研究会'),
(113, '田中', '5', '研究会'),
(114, '田中', '6', '研究会'),
(115, '田中', '7', '研究会'),
(116, '田中', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(117, '田中', '9', '研究会'),
(118, '田中', '10', '研究会'),
(119, '田中', '11', '研究会'),
(120, '田中', '12', '忘年会（飲み会）、研究会'),
(121, '仲', '1', '新年会（飲み会）'),
(122, '仲', '2', ''),
(123, '仲', '3', ''),
(124, '仲', '4', '親睦会（飲み会）、研究会'),
(125, '仲', '5', '研究会'),
(126, '仲', '6', '研究会'),
(127, '仲', '7', '研究会'),
(128, '仲', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(129, '仲', '9', '研究会'),
(130, '仲', '10', '研究会'),
(131, '仲', '11', '研究会'),
(132, '仲', '12', '忘年会（飲み会）、研究会'),
(133, '米元', '1', '新年会（飲み会）'),
(134, '米元', '2', ''),
(135, '米元', '3', ''),
(136, '米元', '4', '親睦会（飲み会）、研究会'),
(137, '米元', '5', '研究会'),
(138, '米元', '6', '研究会'),
(139, '米元', '7', '研究会'),
(140, '米元', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(141, '米元', '9', '研究会'),
(142, '米元', '10', '研究会'),
(143, '米元', '11', '研究会'),
(144, '米元', '12', '忘年会（飲み会）、研究会'),
(145, '稲永', '1', '新年会（飲み会）'),
(146, '稲永', '2', ''),
(147, '稲永', '3', ''),
(148, '稲永', '4', '親睦会（飲み会）、研究会'),
(149, '稲永', '5', '研究会'),
(150, '稲永', '6', '研究会'),
(151, '稲永', '7', '研究会'),
(152, '稲永', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(153, '稲永', '9', '研究会'),
(154, '稲永', '10', '研究会'),
(155, '稲永', '11', '研究会'),
(156, '稲永', '12', '忘年会（飲み会）、研究会'),
(157, '澤田', '1', '新年会（飲み会）'),
(158, '澤田', '2', ''),
(159, '澤田', '3', ''),
(160, '澤田', '4', '親睦会（飲み会）、研究会'),
(161, '澤田', '5', '研究会'),
(162, '澤田', '6', '研究会'),
(163, '澤田', '7', '研究会'),
(164, '澤田', '8', '前期お疲れ様会（飲み会）、お楽しみ会、研究会'),
(165, '澤田', '9', '研究会'),
(166, '澤田', '10', '研究会'),
(167, '澤田', '11', '研究会'),
(168, '澤田', '12', '忘年会（飲み会）、研究会'),
(169, '安武', '1', 'ロボコン'),
(170, '安武', '2', 'ロボコン'),
(171, '安武', '3', 'ロボコン'),
(172, '安武', '4', 'ロボコン'),
(173, '安武', '5', 'ロボコン'),
(174, '安武', '6', 'ロボコン'),
(175, '安武', '7', 'ロボコン'),
(176, '安武', '8', 'ロボコン'),
(177, '安武', '9', 'ロボコン'),
(178, '安武', '10', 'ロボコン'),
(179, '安武', '11', 'ロボコン'),
(180, '安武', '12', 'ロボコン');

-- --------------------------------------------------------

--
-- テーブルの構造 `mgsug`
--

CREATE TABLE IF NOT EXISTS `mgsug` (
  `MGSID` int(8) NOT NULL AUTO_INCREMENT,
  `UNUM` varchar(8) NOT NULL,
  `SUGNUM` varchar(32) DEFAULT NULL,
  `SUGCOMMENT` text,
  PRIMARY KEY (`MGSID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- テーブルのデータをダンプしています `mgsug`
--

INSERT INTO `mgsug` (`MGSID`, `UNUM`, `SUGNUM`, `SUGCOMMENT`) VALUES
(1, '11JK038', '4.0', '発展性がある'),
(2, '11JK001', '3', 'あああああ'),
(3, '11JK038', '2', 'd'),
(4, '11JK038', '2', 'd'),
(5, '11JK002', '1', 'すばらしい'),
(6, '11JK002', '5', ''),
(7, '11JK038', '1', 'test'),
(8, '11JK038', '5', 'ああああああ'),
(9, '11JK038', '4', 'aaaaa'),
(10, '11JK038', '2', 'よい'),
(11, '11JK002', '5', 'yoi\r\n'),
(12, '11JK038', '5', 'よい'),
(13, '11JK001', '5', 'よい');

-- --------------------------------------------------------

--
-- テーブルの構造 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UID` int(8) NOT NULL AUTO_INCREMENT,
  `PASS` varchar(32) NOT NULL,
  `JUDNUM` char(1) NOT NULL,
  `UNAME` varchar(32) NOT NULL,
  `UNUM` varchar(32) DEFAULT NULL,
  `GPA` char(8) DEFAULT NULL,
  `LNAME` varchar(32) DEFAULT NULL,
  `GRAYEAR` char(4) DEFAULT NULL,
  `MGTHEMA` varchar(32) DEFAULT NULL,
  `REWARD` varchar(8) DEFAULT NULL,
  `course` char(1) DEFAULT NULL,
  `target` text,
  `targetjud` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- テーブルのデータをダンプしています `user`
--

INSERT INTO `user` (`UID`, `PASS`, `JUDNUM`, `UNAME`, `UNUM`, `GPA`, `LNAME`, `GRAYEAR`, `MGTHEMA`, `REWARD`, `course`, `target`, `targetjud`) VALUES
(2, 'tadasi08221992', '4', '加藤忠司', '11JK038', '4.0', '成', '2016', '研究室分けにおける情報共有支援システムの開発', '学部長賞', '1', 'スマホのゲームを作りたい。', NULL),
(4, 'test', '4', 'てすとくん', '11JK001', '4.0', '成', '2016', 'テストデータの作成', '学部長賞', '1', 'webプログラミングに興味がある。', NULL),
(5, 'ksu', '4', 'てすとくん２', '11JK002', '3.0', '成', '2015', 'テストデータの作成の引き継ぎ', NULL, '2', '友達を増やしたい', NULL),
(6, 'ksu', '4', '太郎くん', '11JK003', '4.0', 'Apduhan', '2016', '卒論のための卒論', '学部長賞', '3', '難しいことにチャンレンジしたい', NULL),
(7, 'kouhai', '2', '三年 生太', '33JK333', '4.0', NULL, NULL, NULL, NULL, '', '', ''),
(8, 'lab', '3', '成', 'lab', NULL, '成', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'senpai', '1', '先輩太', '1008JK1008', '4.0', '成', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'kouhai2', '2', '後輩 次郎', '13JK333', '4.0', NULL, NULL, NULL, NULL, NULL, 'webプログラミングに興味がある。', '1'),
(11, 'gakusei', '2', '学 生', 'gakusei', '4.0', '', NULL, NULL, NULL, NULL, 'スマホゲームを作りたい', '1');
