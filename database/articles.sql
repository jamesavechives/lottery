-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?10 �?30 �?11:48
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

--
-- 转存表中的数据 `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `content`, `tag`, `desc`, `banner`, `created_at`, `updated_at`) VALUES
(1, 1, '静敬澹一', '<p><span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"></span><b><span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"> </span></b></p><p><b><i><u><span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"></span></u></i></b><b><span style="font-size: 24px;">“畏则不敢肆而德以成，无畏则从其所欲而及于祸。”</span></b></p><p><b><span style="font-size: 24px;"><br></span></b></p><p><span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><b>礼是规规矩矩的态度，义是正正当当的行为，廉是清清白白的辨别，耻是切切实实的觉悟。</b></span></p><p><span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">礼是规规矩矩的态度，义是正正当当的行为，廉是清清白白的辨别，耻是切切实实的觉悟。 </span></p><p>“畏则不敢肆而德以成，无畏则从其所欲而及于祸。”<span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;"><br></span><span style="color: rgb(0, 0, 0); font-family: Helvetica, ''Hiragino Sans GB'', 微软雅黑, ''Microsoft YaHei UI'', SimSun, SimHei, arial, sans-serif; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;">礼是规规矩矩的态度，义是正正当当的行为，廉是清清白白的辨别，耻是切切实实的觉悟。 </span></p><p>“畏则不敢肆而德以成，无畏则从其所欲而及于祸。”</p>', '', '礼是规规矩矩的态度，义是正正当当的行为', '', '2016-08-16 22:41:11', '2016-08-30 11:57:00'),
(2, 3, '彩票种类的文章', '<p><strong>中东部高温天气还将持续一周</strong>\r\n<br></p><p>　　8月中旬开始，随着副热带高压的强势回归，中东部再现大范围高温天气。15日，西安、合肥、武汉、南京、杭州、南昌、重庆等7个省会级城市出现\r\n高温，其中重庆、合肥的高温天气已经持续7天。黄淮、江淮、江南北部一带，四川盆地东部，以及陕西南部，和甘肃东南部，普遍出现35度到37度的高温，局\r\n部地区将达到37到39度。</p><p>\r\n<br></p><p>　　中央气象台预计，未来10天，黄淮西部、江汉、江淮、江南大部、四川盆地东部、陕西关中等地将出现7~9天的高温天气，部分地区日最高气温可达37~40℃。省会级城市中，合肥、南昌、重庆高温可能贯穿整个8月中旬。</p><p>\r\n<br></p><p>　　总体来看，此轮高温面积、强度虽不及7月下旬到8月初的高温过程，但由于空气湿度较高，体感仍闷热，虽已立秋，暑热难消。</p><p><strong>天热睡不好 5招解烦忧</strong>\r\n<br></p><p>　　秋老虎徘徊不去，很多人的睡眠质量也明显下降。如何调整才能有好的睡眠呢？</p><p>\r\n<br></p><p>　　调饮食</p><p>\r\n<br></p><p>　　首先要增加钙和镁的摄入量。钙的缺乏可能会导致深睡眠的不足或缺失。另一项研究还发现，高镁膳食能让睡眠障碍的成年女性得到深睡眠，而且不易中途醒来。</p><p>\r\n　　此外，还要增加B族维生素的摄入量。精白米食物和甜食中维生素B族含量极低，而全谷杂粮中B族的含量是精白米的几倍<br></p><p><br></p>', '', '8月中旬开始，随着副热带高压的强势回归，中东部再现大范围高温天气 。', '', '2016-08-17 09:15:05', '2016-08-17 11:58:54'),
(3, 1, '110亿1000万！！！', '<p><b>110亿1000万！！！</b></p><p>融信在100亿后突然进入，然后以强势姿态成功抢下该地块！创造了上海的最新纪录！据统计，现场竞价超过四百轮！\r\n<br></p><p><span style="background-color: rgb(231, 156, 156);">8月17日，备受瞩目的上海内环内商住地块中兴社区N070202单元地块落槌开拍。</span></p><p><span style="background-color: rgb(231, 156, 156);">这是自2004年土地招拍挂以来上海内环内首次出让的住宅地块，不但地块面积大，而且地段优越，该地块距离上海火车站、外滩直线距离均约两公里左右。</span></p><p><span style="background-color: rgb(231, 156, 156);">菲律宾新总统罗德里戈-杜特尔特6月30日走马上任。中国人最关心的，大概是他是否真的像很多媒体所说的“亲华”或“反美”，中菲关系会不会因为他而好转？<br></span></p><p><br></p>', '', '融信在100亿后突然进入，然后以强势姿态成功抢下该地块！', '', '2016-08-17 09:15:47', '2016-08-30 11:57:13'),
(4, 1, '测试文章', '<p>宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复宝宝部分反反复复</p>', '', '宝宝部分反反复复', '', '2016-10-03 13:53:32', '2016-10-03 13:53:32');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
