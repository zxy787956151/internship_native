-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 04 月 27 日 13:29
-- 服务器版本: 5.5.53
-- PHP 版本: 5.4.45

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `internship_native`
--

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `classify` int(33) DEFAULT NULL,
  `photourl` varchar(225) DEFAULT NULL,
  `photoname` varchar(225) DEFAULT NULL,
  `recommend` int(11) DEFAULT '1',
  `content` varchar(225) DEFAULT NULL,
  `browse` int(11) DEFAULT '5231',
  `discuss` int(11) DEFAULT '5360',
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=77 ;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `title`, `classify`, `photourl`, `photoname`, `recommend`, `content`, `browse`, `discuss`, `time`) VALUES
(64, '犯错了怎么办？', 10, '2017_04_19', '1492598069995.jpg', 0, '看到昔日好友发了一篇日志《咎由自取》他说他是一个悲观者，感觉社会抛弃了他，脾气、性格在6年的时间里变化很大，很难适应这个社会。人生其实就是不断犯错的过程，在这个过程中不断的犯错，不断的吸取教训，不断的成长...', 5245, 5360, '2017-04-19 18:34:29'),
(65, '两只蜗牛艰难又浪漫的一吻', 10, '2017_04_19', '1492598098322.jpg', 0, '这是国外一摄影师拍摄到的，看到这一幕，还真有爱！关于两只蜗牛相遇，该这般解释：两个蜗牛相遇的时候，互相用触角接触，然后头和头相对，身体并连，彼此生殖腔的位置相接...&nbsp;', 5232, 5360, '2017-04-19 18:34:58'),
(63, '某一人似曾相识、某一刻似曾经历', 11, '2017_04_19', '1492598037799.jpg', 0, '有时候会有这样的错觉：“某一人似曾相识、某一刻似曾经历”，这样奇特的感受大概你也有过。心理学称之为“即视现象”，是记忆中太多杂乱信息制造出的一种潜意识矛盾冲突。', 5231, 5360, '2017-04-19 18:33:57'),
(61, '程序员那些琐碎的负面情绪', 20, '2017_04_19', '149259798093.jpg', 0, '在客户眼里做个页面，很简单，实现一个功能也是很轻松的事儿。作为技术员，真的很无奈，如果真的那么简单的话，我们还用成天抱怨自己是码农吗？销售的角色其实也蛮重要的，网站的成否，都跟客户沟通离不开，没沟通好，做无用功的就是程序员了...', 5231, 5360, '2017-04-19 18:33:00'),
(59, '个人博客从简不繁', 10, '2017_04_19', '1492597506336.jpg', 0, '十一月中旬开始，排名突然下降了，网站“个人博客”关键词排名从第一页第二名滑落到100页以后了，个人博客这个关键词百度已经搜不到了，仅有google、搜狗...&nbsp;', 5231, 5360, '2017-04-19 18:25:06'),
(60, '再看4年前某婚恋网站我的十条征婚条件', 10, '2017_04_19', '1492597905866.jpg', 0, '意外的是这个当地的婚恋网站到目前还存在，更意外的是，我的个人帐号还保存在他们网站上。好奇心迫使我打开个人资料看看到底当年写了什么样的征婚条件。原来这些年这些标准一直都没有变过，因为习惯，所以喜欢！', 5231, 5360, '2017-04-19 18:31:45'),
(66, '抄袭门过后——丢掉心结，重拾自己', 10, '2017_04_19', '1492598126942.jpg', 0, '那仅有的一次抄袭被识破后，虽然我后来不断的努力写好的文章，在教育报刊杂志投稿并发表，但总被盖上了可能是抄袭的帽子。我怨老师的毫不留情，更多的是怨自己至今还放不下。如果我本身作文水平就一般，不会经常被当范文...', 5232, 5360, '2017-04-19 18:35:26'),
(67, '程序员应该如何高效的工作学习', 10, '2017_04_19', '1492598149990.jpg', 0, '对于一个程序员来说，如果正在写代码，写得正high的时候，突然被叫去开会，或者是有客户来了，有了新的想法，要沟通，这时候不得不把写到一半的代码搁在那儿，等客户一走，会一开完，又得花很长的时候来缕清..', 5231, 5360, '2017-04-19 18:35:49'),
(68, '个人博客模板（2014草根寻梦）', 22, '2017_04_19', '1492598464799.jpg', 1, '2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设计。模板采用html5+css3设计，nav导航实现鼠标悬停渐变显示英文标题的效果。banner部分，选择大图作为背景，利用css3中animation属性结合文字图片实现文字从左到右的渐变效果', 5233, 5360, '2017-04-19 18:41:04'),
(69, '我的个人博客之——阿里云空间选择', 25, '2017_04_19', '1492598487513.png', 1, '之前服务器放在电信机房， 联通用户访问速度很不稳定，经常出现访问速度慢的问题，换到阿里云解决了之前的问题。很多人都问我的博客选得什么空间，一年的费用得多少钱，今天我列个表出来，供大家参考。', 5232, 5360, '2017-04-19 18:41:27'),
(70, '从摄影作品中获取网页颜色搭配技巧', 26, '2017_04_19', '1492598508148.jpg', 1, '作为一个优秀、专业的网页设计师，首先要了解各种颜色的象征，以及不同类型网站常用的色彩搭配。色彩搭配看似复杂,但并不神秘。一般来说,网页的背景色应该柔和一些、素一些、淡一些,再配上深色的文字,使人看起来自然、舒畅。色彩是人的视觉最敏感的东西。主页的色彩处理得好，可以锦上添花，达到事半功倍的效果。', 5231, 5360, '2017-04-19 18:41:48'),
(71, 'css3制作的一个魔方', 16, '2017_04_19', '1492598538484.png', 1, '本应用由CSS3代码实现，无图片和flash，请使用Chrome等webkit内核浏览器或Firefox打开。破解攻略和大家分享下：首先，破解魔方，我们就要先了解它的结构，魔方共6色6面，每面又分为中央块（最中间的块6个）、角块（4角的块8个）和边块（4条边中间的块12个）...', 5231, 5360, '2017-04-19 18:42:18'),
(72, '测试特别长的contetn Css3', 16, '2017_04_20', '1492691010720.jpg', 1, '特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长特别长', 5233, 5360, '2017-04-20 20:23:30');

-- --------------------------------------------------------

--
-- 表的结构 `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `alias` varchar(50) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `module`
--

INSERT INTO `module` (`id`, `title`, `alias`, `parentid`) VALUES
(8, '慢生活', 'Article', -1),
(9, '作品分享', 'Production', -1),
(10, '日记', 'diary', 8),
(11, '经典语录', 'classic', 8),
(25, '网站建设', 'website', 9),
(22, '个人博客模板', 'template', 9),
(20, '程序人生', 'program', 8),
(16, 'Css3', 'css3', 8),
(26, '心得笔记', 'notes', 9),
(29, 'test', 'test', 8);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'zxy', '2762be8fee1bf6f319878fecb4363f7f'),
(2, 'zzw', 'fdea199d71b110a3533e55b6f25dee46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
