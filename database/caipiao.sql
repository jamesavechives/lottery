-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?10 �?30 �?11:46
-- 服务器版本: 5.5.40
-- PHP 版本: 5.5.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `caipiao`
--

-- --------------------------------------------------------

--
-- 表的结构 `3d`
--

CREATE TABLE IF NOT EXISTS `3d` (
  `ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(11) DEFAULT NULL,
  `KBAI` varchar(11) DEFAULT NULL,
  `KSHI` varchar(11) DEFAULT NULL,
  `KGE` varchar(11) DEFAULT NULL,
  `SBAI` varchar(11) DEFAULT NULL,
  `SSHI` varchar(11) DEFAULT NULL,
  `SGE` varchar(11) DEFAULT NULL,
  `radio` varchar(10) DEFAULT NULL,
  `one` varchar(2) DEFAULT NULL,
  `two` varchar(2) DEFAULT NULL,
  `three` varchar(2) DEFAULT NULL,
  `four` varchar(2) DEFAULT NULL,
  `five` varchar(2) DEFAULT NULL,
  `six` varchar(2) DEFAULT NULL,
  `seven` varchar(2) DEFAULT NULL,
  `eight` varchar(2) DEFAULT NULL,
  `nine` varchar(2) DEFAULT NULL,
  `ten` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5341 ;

-- --------------------------------------------------------

--
-- 表的结构 `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- 表的结构 `assigned_roles`
--

CREATE TABLE IF NOT EXISTS `assigned_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `chaik`
--

CREATE TABLE IF NOT EXISTS `chaik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(11) DEFAULT NULL,
  `st1` varchar(11) NOT NULL,
  `nd2` varchar(11) NOT NULL,
  `rd3` varchar(11) NOT NULL,
  `th4` varchar(11) NOT NULL,
  `th5` varchar(11) NOT NULL,
  `th6` varchar(11) NOT NULL,
  `th7` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2134 ;

-- --------------------------------------------------------

--
-- 表的结构 `cqssc`
--

CREATE TABLE IF NOT EXISTS `cqssc` (
  `EID` bigint(20) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(255) DEFAULT NULL,
  `WAN` varchar(255) DEFAULT NULL,
  `QIAN` varchar(255) DEFAULT NULL,
  `BAI` varchar(255) DEFAULT NULL,
  `SHI` varchar(255) DEFAULT NULL,
  `GE` varchar(255) DEFAULT NULL,
  `CQSSCNUM` varchar(10) DEFAULT NULL,
  `fiveduibi` varchar(255) DEFAULT NULL,
  `threeduibi` varchar(255) DEFAULT NULL,
  `firstnmh` longtext,
  `last4nmhh` longtext,
  `last4kdh` longtext,
  `last4jdjh` longtext,
  `last4jxjh` longtext,
  `last4xth` longtext,
  `last4lxh` longtext,
  `last4jx` longtext,
  `last5jx` longtext,
  `last200` longtext,
  `last4200` longtext,
  `last11new8` longtext,
  `lastshuzhu444a` longtext,
  `lastshuzhu442a` longtext,
  `lastshuzhu498012` longtext,
  `lastshuzhu301` longtext,
  `lastshuzhu302` longtext,
  `lastshuzhu303` longtext,
  `lastshuzhu304` longtext,
  `lastshuzhu305` longtext,
  `lastshuzhu306` longtext,
  `lastshuzhu307` longtext,
  `lastshuzhu308` longtext,
  `lastshuzhu309` longtext,
  `lastshuzhu310` longtext,
  `lastshuzhu311` longtext,
  `lastshuzhu312` longtext,
  `lastshuzhu313` longtext,
  `lastshuzhu314` longtext,
  `lastshuzhu315` longtext,
  `lastshuzhu316` longtext,
  `lastshuzhu317` longtext,
  `lastshuzhu318` longtext,
  `lastshuzhu319` longtext,
  `lastshuzhu320` longtext,
  `lastshuzhu321` longtext,
  `lastshuzhu322` longtext,
  `lastshuzhu323` longtext,
  `lastshuzhu324` longtext,
  `lastshuzhu325` longtext,
  `lastshuzhu326` longtext,
  `lastshuzhu327` longtext,
  `lastshuzhu328` longtext,
  `lastshuzhu329` longtext,
  `lastshuzhu330` longtext,
  `lastshuzhu331` longtext,
  `lastshuzhu332` longtext,
  `lastshuzhu333` longtext,
  `lastshuzhu334` longtext,
  `lastshuzhu335` longtext,
  `lastshuzhu336` longtext,
  `lastshuzhu337` longtext,
  `lastshuzhu338` longtext,
  `lastshuzhu339` longtext,
  `lastshuzhu340` longtext,
  `lastshuzhu341` longtext,
  `lastshuzhu342` longtext,
  `lastshuzhu343` longtext,
  `lastshuzhu344` longtext,
  `lastsho` longtext,
  `lastcount` longtext,
  `lastshuzhu4480a` longtext,
  PRIMARY KEY (`EID`),
  KEY `QIHAO` (`QIHAO`),
  KEY `QIHAO_2` (`QIHAO`),
  KEY `QIHAO_3` (`QIHAO`),
  KEY `QIHAO_4` (`QIHAO`),
  KEY `QIHAO_5` (`QIHAO`),
  KEY `QIHAO_6` (`QIHAO`),
  KEY `QIHAO_7` (`QIHAO`),
  KEY `QIHAO_8` (`QIHAO`),
  KEY `QIHAO_9` (`QIHAO`),
  KEY `QIHAO_10` (`QIHAO`),
  KEY `QIHAO_11` (`QIHAO`),
  KEY `QIHAO_12` (`QIHAO`),
  KEY `QIHAO_13` (`QIHAO`),
  KEY `QIHAO_14` (`QIHAO`),
  KEY `QIHAO_15` (`QIHAO`),
  KEY `QIHAO_16` (`QIHAO`),
  KEY `QIHAO_17` (`QIHAO`),
  KEY `QIHAO_18` (`QIHAO`),
  KEY `QIHAO_19` (`QIHAO`),
  KEY `QIHAO_20` (`QIHAO`),
  KEY `QIHAO_21` (`QIHAO`),
  KEY `QIHAO_22` (`QIHAO`),
  KEY `QIHAO_23` (`QIHAO`),
  KEY `QIHAO_24` (`QIHAO`),
  KEY `QIHAO_25` (`QIHAO`),
  KEY `QIHAO_26` (`QIHAO`),
  KEY `QIHAO_27` (`QIHAO`),
  KEY `QIHAO_28` (`QIHAO`),
  KEY `QIHAO_29` (`QIHAO`),
  KEY `QIHAO_30` (`QIHAO`),
  KEY `QIHAO_31` (`QIHAO`),
  KEY `QIHAO_32` (`QIHAO`),
  KEY `QIHAO_33` (`QIHAO`),
  KEY `QIHAO_34` (`QIHAO`),
  KEY `QIHAO_35` (`QIHAO`),
  KEY `QIHAO_36` (`QIHAO`),
  KEY `QIHAO_37` (`QIHAO`),
  KEY `QIHAO_38` (`QIHAO`),
  KEY `QIHAO_39` (`QIHAO`),
  KEY `QIHAO_40` (`QIHAO`),
  KEY `QIHAO_41` (`QIHAO`),
  KEY `QIHAO_42` (`QIHAO`),
  KEY `QIHAO_43` (`QIHAO`),
  KEY `QIHAO_44` (`QIHAO`),
  KEY `QIHAO_45` (`QIHAO`),
  KEY `QIHAO_46` (`QIHAO`),
  KEY `QIHAO_47` (`QIHAO`),
  KEY `QIHAO_48` (`QIHAO`),
  KEY `QIHAO_49` (`QIHAO`),
  KEY `QIHAO_50` (`QIHAO`),
  KEY `QIHAO_51` (`QIHAO`),
  KEY `QIHAO_52` (`QIHAO`),
  KEY `QIHAO_53` (`QIHAO`),
  KEY `QIHAO_54` (`QIHAO`),
  KEY `QIHAO_55` (`QIHAO`),
  KEY `QIHAO_56` (`QIHAO`),
  KEY `QIHAO_57` (`QIHAO`),
  KEY `QIHAO_58` (`QIHAO`),
  KEY `QIHAO_59` (`QIHAO`),
  KEY `QIHAO_60` (`QIHAO`),
  KEY `QIHAO_61` (`QIHAO`),
  KEY `QIHAO_62` (`QIHAO`),
  KEY `QIHAO_63` (`QIHAO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=74260 ;

-- --------------------------------------------------------

--
-- 表的结构 `eleventakefive`
--

CREATE TABLE IF NOT EXISTS `eleventakefive` (
  `EID` bigint(20) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(20) DEFAULT NULL,
  `WAN` varchar(10) DEFAULT NULL,
  `QIAN` varchar(10) DEFAULT NULL,
  `BAI` varchar(10) DEFAULT NULL,
  `SHI` varchar(10) DEFAULT NULL,
  `GE` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48670 ;

-- --------------------------------------------------------

--
-- 表的结构 `gd`
--

CREATE TABLE IF NOT EXISTS `gd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st1` varchar(11) NOT NULL,
  `nd2` varchar(11) NOT NULL,
  `rd3` varchar(11) NOT NULL,
  `th4` varchar(11) NOT NULL,
  `th5` varchar(11) NOT NULL,
  `th6` varchar(11) NOT NULL,
  `th7` varchar(11) NOT NULL,
  `QIHAO` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=3335 ;

-- --------------------------------------------------------

--
-- 表的结构 `gdklsf`
--

CREATE TABLE IF NOT EXISTS `gdklsf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st1` varchar(11) NOT NULL,
  `nd2` varchar(11) NOT NULL,
  `rd3` varchar(11) NOT NULL,
  `th4` varchar(11) NOT NULL,
  `th5` varchar(11) NOT NULL,
  `th6` varchar(11) NOT NULL,
  `th7` varchar(11) NOT NULL,
  `th8` varchar(11) NOT NULL,
  `QIHAO` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=14004 ;

-- --------------------------------------------------------

--
-- 表的结构 `live_array`
--

CREATE TABLE IF NOT EXISTS `live_array` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `lottery`
--

CREATE TABLE IF NOT EXISTS `lottery` (
  `LID` bigint(20) NOT NULL AUTO_INCREMENT,
  `Issue` int(11) DEFAULT NULL,
  `LotteryNumbers` varchar(255) DEFAULT NULL,
  `shijihao` varchar(255) DEFAULT NULL,
  `ID` bigint(20) NOT NULL,
  `KBAI` varchar(11) DEFAULT NULL,
  `KGE` varchar(11) DEFAULT NULL,
  `KSHI` varchar(11) DEFAULT NULL,
  `QIHAO` varchar(11) DEFAULT NULL,
  `SBAI` varchar(11) DEFAULT NULL,
  `SGE` varchar(11) DEFAULT NULL,
  `SSHI` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`LID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9180 ;

-- --------------------------------------------------------

--
-- 表的结构 `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `p5`
--

CREATE TABLE IF NOT EXISTS `p5` (
  `EID` bigint(20) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(255) DEFAULT NULL,
  `WAN` varchar(255) DEFAULT NULL,
  `QIAN` varchar(255) DEFAULT NULL,
  `BAI` varchar(255) DEFAULT NULL,
  `SHI` varchar(255) DEFAULT NULL,
  `GE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40311 ;

-- --------------------------------------------------------

--
-- 表的结构 `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

-- --------------------------------------------------------

--
-- 表的结构 `permission_dependencies`
--

CREATE TABLE IF NOT EXISTS `permission_dependencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `dependency_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `permission_dependencies_permission_id_foreign` (`permission_id`),
  KEY `permission_dependencies_dependency_id_foreign` (`dependency_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=58 ;

-- --------------------------------------------------------

--
-- 表的结构 `permission_groups`
--

CREATE TABLE IF NOT EXISTS `permission_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- 表的结构 `permission_user`
--

CREATE TABLE IF NOT EXISTS `permission_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_user_permission_id_foreign` (`permission_id`),
  KEY `permission_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `resource`
--

CREATE TABLE IF NOT EXISTS `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qihao` varchar(255) DEFAULT NULL,
  `shuzu1` longtext,
  `shuzu2` longtext,
  `shuzu3` longtext,
  `shuzu4` longtext,
  `shuzu5` longtext,
  `shuzu6` longtext,
  `shuzu7` longtext,
  `shuzu8` longtext,
  `shuzu9` longtext,
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `all` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- 表的结构 `ssc`
--

CREATE TABLE IF NOT EXISTS `ssc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `st1` varchar(11) NOT NULL,
  `nd2` varchar(11) NOT NULL,
  `rd3` varchar(11) NOT NULL,
  `th4` varchar(11) NOT NULL,
  `th5` varchar(11) NOT NULL,
  `th6` varchar(11) NOT NULL,
  `th7` varchar(11) NOT NULL,
  `QIHAO` varchar(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=2027 ;

-- --------------------------------------------------------

--
-- 表的结构 `ssq`
--

CREATE TABLE IF NOT EXISTS `ssq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `expect` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `openCode` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `timestamp` bigint(20) DEFAULT NULL,
  `one` varchar(10) DEFAULT NULL,
  `two` varchar(10) DEFAULT NULL,
  `three` varchar(10) DEFAULT NULL,
  `four` varchar(10) DEFAULT NULL,
  `five` varchar(10) DEFAULT NULL,
  `six` varchar(10) DEFAULT NULL,
  `seven` varchar(10) DEFAULT NULL,
  `eight` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=384 ;

-- --------------------------------------------------------

--
-- 表的结构 `static_array`
--

CREATE TABLE IF NOT EXISTS `static_array` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zone_nums` tinyint(4) NOT NULL DEFAULT '0',
  `begin_nums` tinyint(4) NOT NULL DEFAULT '0',
  `desc` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- 表的结构 `tjssc`
--

CREATE TABLE IF NOT EXISTS `tjssc` (
  `EID` bigint(20) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(255) DEFAULT NULL,
  `WAN` varchar(255) DEFAULT NULL,
  `QIAN` varchar(255) DEFAULT NULL,
  `BAI` varchar(255) DEFAULT NULL,
  `SHI` varchar(255) DEFAULT NULL,
  `GE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55566 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usericon` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `userpsd` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `truename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(4) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `watch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gold` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_logout_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gold_begin_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `gold_end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `confirmed` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- 表的结构 `user_providers`
--

CREATE TABLE IF NOT EXISTS `user_providers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_providers_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wishes`
--

CREATE TABLE IF NOT EXISTS `wishes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `begin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- 表的结构 `xjssc`
--

CREATE TABLE IF NOT EXISTS `xjssc` (
  `EID` bigint(20) NOT NULL AUTO_INCREMENT,
  `QIHAO` varchar(255) DEFAULT NULL,
  `WAN` varchar(255) DEFAULT NULL,
  `QIAN` varchar(255) DEFAULT NULL,
  `BAI` varchar(255) DEFAULT NULL,
  `SHI` varchar(255) DEFAULT NULL,
  `GE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`EID`),
  KEY `QIHAO` (`QIHAO`),
  KEY `QIHAO_2` (`QIHAO`),
  KEY `QIHAO_3` (`QIHAO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61034 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
