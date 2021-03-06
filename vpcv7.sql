/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : jianbing

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-12-17 15:57:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for g_article_article
-- ----------------------------
DROP TABLE IF EXISTS `g_article_article`;
CREATE TABLE `g_article_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `catarr` varchar(100) DEFAULT NULL,
  `moduleid` char(50) NOT NULL DEFAULT 'article',
  `brandid` int(4) unsigned DEFAULT '0',
  `classid` char(50) DEFAULT NULL,
  `title` varchar(120) NOT NULL DEFAULT '',
  `titlecolor` char(20) DEFAULT NULL,
  `content` text,
  `cutstr` varchar(100) DEFAULT NULL,
  `articlepic` varchar(255) DEFAULT NULL,
  `articlethumb` varchar(255) DEFAULT NULL,
  `attachlist` text,
  `fileurl` varchar(255) DEFAULT NULL,
  `tagword` varchar(100) DEFAULT NULL,
  `seotitle` varchar(100) DEFAULT NULL,
  `keywords` char(100) DEFAULT NULL,
  `description` mediumtext,
  `sort` tinyint(3) unsigned DEFAULT '0',
  `istop` tinyint(2) unsigned DEFAULT '0',
  `isspecial` tinyint(2) unsigned DEFAULT '0',
  `isindex` tinyint(2) unsigned DEFAULT '0',
  `useable` tinyint(2) unsigned DEFAULT '1',
  `uid` int(10) unsigned DEFAULT '0',
  `realname` char(20) DEFAULT NULL,
  `comefrom` varchar(100) DEFAULT NULL,
  `addtime` int(10) unsigned DEFAULT '0',
  `updatetime` int(10) unsigned DEFAULT '0',
  `shownum` int(10) unsigned DEFAULT '0',
  `feednum` int(6) unsigned DEFAULT '0',
  `bestnum` int(6) unsigned DEFAULT '0',
  `stownum` int(6) unsigned DEFAULT '0',
  `isview` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `status` (`useable`,`sort`,`id`),
  KEY `sort` (`catid`,`useable`,`sort`,`id`),
  KEY `catid` (`catid`,`useable`,`id`),
  KEY `addtime` (`addtime`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_article_article
-- ----------------------------
INSERT INTO `g_article_article` VALUES ('1', '6', '6,3', 'shop', '0', null, '测试产品一', '', '<p>产品一介绍</p>', ' 产品一介绍 ', '/uploadfile/image/20170924/1506261183.jpg', '/thumbfile/image/20170924/1506261183.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506261228', '1506261228', '1', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('2', '7', '7,3', 'shop', '0', null, '测试产品二', '', '测试产品二详细介绍', '测试产品二详细介绍', '/uploadfile/image/20170924/1506261482.jpg', '/thumbfile/image/20170924/1506261482.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506261499', '1506261499', '2', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('3', '8', '8,3', 'shop', '0', null, '测试产品三', '', '测试产品三详细介绍', '测试产品三详细介绍', '/uploadfile/image/20170924/1506261509.jpg', '/thumbfile/image/20170924/1506261509.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506261531', '1506261531', '11', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('4', '6', '6,3', 'shop', '0', null, '测试产品四', '', '测试产品四详细介绍', '测试产品四详细介绍', '/uploadfile/image/20170924/1506261544.jpg', '/thumbfile/image/20170924/1506261544.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506261555', '1506261555', '5', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('5', '2', '2,0', 'article', '0', null, 'Chrome OS支持所有安卓应用', '', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">“Google Play商店马上就要登陆Chrome OS了”谷歌公司在今天的开发者大会上宣布。然后大家就可以在自己的Chromebook跟Chromebox上安装几乎所有安卓应用了。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">谷歌让Play商店登陆Chrome OS的计划其实也不是什么秘密。之前大家就可以在Chrome OS上运行部分安卓应用。现在Chrome OS采用了一种全新的技术。“早其的版本用的是”ARC（The Android Runtime for Chrome）“跟”本地客户端（Native Client）”，Kan Liu说到，她是谷歌Chrome OS的主产品经理 。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">“但是这样的话，不是还有一个“本地化”的过程要搞吗，这得要应用开发者们多干点活呀“。他说到，”很多开发估计不会这样干呀“。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255); text-align: center;\"><img class=\"\" height=\"200\" data-original=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073139802112.png\" title=\"1464073139802112.png\" alt=\"573edc73c8485.png\" src=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073139802112.png\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; display: inline;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">所以他们团队开始另辟蹊径。现在“Android on Chrome OS”（字面意思“安卓在Chrome系统上”）是在一个Linux容器（LXC）上运行的，所以安卓应用直接在Chrome OS上面运行了。有了这项技术，现在我们也不需要什么模拟了，应用运行的速度也不会打折扣了。现在在支持Chrome OS的电脑上，Chrome OS跟安卓都将用同样的操作系统内核跟硬件资源。应用将在一个保护模式下运行，就算有恶意软件逃出了这个沙箱，Chrome OS的其他所有安全功能还能起作用。&nbsp;</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">虽然谷歌已经公布了这项新技术，但是它不会马上推送给消费者们。它的首个公测将在今年6月份的Chrome OS dev（开发者版）上，到时候跟N53一起放出来。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255); text-align: center;\"><img class=\"\" height=\"200\" data-original=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073171218171.png\" title=\"1464073171218171.png\" alt=\"573edc72dc2c7.png\" src=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073171218171.png\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; display: inline;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">一开始，这项功能也只能在一些指定的设备上运行，这些设备基本上都是带触屏的（比如谷歌自己的Chromebook Pixel、华硕的Chromebook Flip还有宏碁的R11）。这样的安排是为了让安卓开发者们有时间去提升对实体键盘的支持（他们不一定要这样做，不过这样用户体验更好）。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">对于安卓应用来说，到时候Chromebook就跟其他安卓平板跟手机一样。它们将获得所有Chrome OS系统文件的访问权限，以及Wi-fi跟蓝牙的堆栈。Chrome OS届时将支持所有的标注通知功能、在线回复功能，甚至还有Facebook Messenger式的聊天气泡功能。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Liu还提到，这些应用的离线功能都能保留。比方说，你可以用谷歌相册看离线保存好的图片。Google Play Music、Spotify、Adobe Creative Cloud应用（比如Photoshop Express）、微软的Office应用等等，它们的离线功能正常使用（但是支持Chrome OS的设备一般储存空间很小，如果你想下载你Spofity上的所有音乐，可能有点困难）。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">对于企业用户，Android on Chrome OS支持Android at Work（工作安卓），它可以让管理员限制用户能装那些应用不能装那些应用，甚至可以将这项功能完全关掉。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Android on Chrome OS支持ARM跟x86架构的CPU，但是这用处也不大。毕竟移动设备用的几乎都是ARM的，很多安卓应用已经为ARM平台做了优化，但是安卓还是带了一个原生的x86转换层，所以它支持x86的技术难度也不大。另外，几乎所有安卓应用都是用跨平台的Java写的。Liu还提到，安卓上的游戏跟那些对设备图像处理能要求较高的应用基上是用C语言跟C++加上安卓NDK写的，他们基本上支持x86。&nbsp;</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">现在的Android on Chome OS用的安卓版本是”棉花糖（Marshmallow）”，这不过是因为安卓N还没准备好发布而已。安卓开发团队的副总Dave Burke告诉我们说，他们的团队将一些出现在安卓N上才有的多窗口支持功能放到了Android on Chrome OS上。事实上就想Liu强调的那样，安卓N的多窗口支持功能主要是Chrome OS团队做的。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; line-height: 1.42857;\">Liu说，Android on Chrome OS的更新频率大概是6周一次，跟Chrome OS差不多。安卓N系统现在采用A/B升级系统，这让他们的工作更容易（安卓团队又从Chrome OS团队那强了一件活干）。Liu还说，90%以上的Chrome OS都会在几周内更新一次系统。&nbsp;</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Chrome OS跟安卓系统能共存在一个设备上了，大家关于谷歌对Chrome OS未来的计划的疑问相信又会成为热点。比如，安卓有了多窗口的支持的功能后长得越来越像桌面系统了，为什么要折腾这样一个既支持Chrome OS这样的桌面式系统又支持安卓系统的东西呢？</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Liu回应道，Chrome OS会继续更新下去， 虽然“我们的确放了放Chrome OS“他说道”我们现在想要做的是让Chrome OS保留所有他原有的有点的同时将安卓的优势引进来。“</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Burke在另外一个采访中表示，让Chrome OS跟安卓合体，他说”是一个非常实际的共享资源的方法。”他强调，谷歌想保留Chrome OS的特性。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Liu和Burke强调谷歌的Chromebooks是成功的，谷歌公司不想毁掉任何一件好产品。</p>', ' “Google Play商店马上就要登陆Chrome OS了”谷歌公司在今天的开发者大会上宣布。然后大家就可以在自己的Chromebook跟Chromebox上安装几乎所有安卓应用了。 谷歌让Pla', '/uploadfile/image/20170924/1506262346.png', '/thumbfile/image/20170924/1506262346.png', 'http://show.metinfo.cn/muban/res013/323/upload/201605/1464073139802112.png,http://show.metinfo.cn/muban/res013/323/upload/201605/1464073171218171.png', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506262368', '1506262368', '14', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('6', '2', '2,0', 'article', '0', null, 'Chrome OS支持所有安卓应用', '', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">“Google Play商店马上就要登陆Chrome OS了”谷歌公司在今天的开发者大会上宣布。然后大家就可以在自己的Chromebook跟Chromebox上安装几乎所有安卓应用了。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">谷歌让Play商店登陆Chrome OS的计划其实也不是什么秘密。之前大家就可以在Chrome OS上运行部分安卓应用。现在Chrome OS采用了一种全新的技术。“早其的版本用的是”ARC（The Android Runtime for Chrome）“跟”本地客户端（Native Client）”，Kan Liu说到，她是谷歌Chrome OS的主产品经理 。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">“但是这样的话，不是还有一个“本地化”的过程要搞吗，这得要应用开发者们多干点活呀“。他说到，”很多开发估计不会这样干呀“。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255); text-align: center;\"><img class=\"\" height=\"200\" data-original=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073139802112.png\" title=\"1464073139802112.png\" alt=\"573edc73c8485.png\" src=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073139802112.png\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; display: inline;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">所以他们团队开始另辟蹊径。现在“Android on Chrome OS”（字面意思“安卓在Chrome系统上”）是在一个Linux容器（LXC）上运行的，所以安卓应用直接在Chrome OS上面运行了。有了这项技术，现在我们也不需要什么模拟了，应用运行的速度也不会打折扣了。现在在支持Chrome OS的电脑上，Chrome OS跟安卓都将用同样的操作系统内核跟硬件资源。应用将在一个保护模式下运行，就算有恶意软件逃出了这个沙箱，Chrome OS的其他所有安全功能还能起作用。&nbsp;</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">虽然谷歌已经公布了这项新技术，但是它不会马上推送给消费者们。它的首个公测将在今年6月份的Chrome OS dev（开发者版）上，到时候跟N53一起放出来。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255); text-align: center;\"><img class=\"\" height=\"200\" data-original=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073171218171.png\" title=\"1464073171218171.png\" alt=\"573edc72dc2c7.png\" src=\"http://show.metinfo.cn/muban/res013/323/upload/201605/1464073171218171.png\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto !important; display: inline;\"/></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">一开始，这项功能也只能在一些指定的设备上运行，这些设备基本上都是带触屏的（比如谷歌自己的Chromebook Pixel、华硕的Chromebook Flip还有宏碁的R11）。这样的安排是为了让安卓开发者们有时间去提升对实体键盘的支持（他们不一定要这样做，不过这样用户体验更好）。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">对于安卓应用来说，到时候Chromebook就跟其他安卓平板跟手机一样。它们将获得所有Chrome OS系统文件的访问权限，以及Wi-fi跟蓝牙的堆栈。Chrome OS届时将支持所有的标注通知功能、在线回复功能，甚至还有Facebook Messenger式的聊天气泡功能。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Liu还提到，这些应用的离线功能都能保留。比方说，你可以用谷歌相册看离线保存好的图片。Google Play Music、Spotify、Adobe Creative Cloud应用（比如Photoshop Express）、微软的Office应用等等，它们的离线功能正常使用（但是支持Chrome OS的设备一般储存空间很小，如果你想下载你Spofity上的所有音乐，可能有点困难）。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">对于企业用户，Android on Chrome OS支持Android at Work（工作安卓），它可以让管理员限制用户能装那些应用不能装那些应用，甚至可以将这项功能完全关掉。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Android on Chrome OS支持ARM跟x86架构的CPU，但是这用处也不大。毕竟移动设备用的几乎都是ARM的，很多安卓应用已经为ARM平台做了优化，但是安卓还是带了一个原生的x86转换层，所以它支持x86的技术难度也不大。另外，几乎所有安卓应用都是用跨平台的Java写的。Liu还提到，安卓上的游戏跟那些对设备图像处理能要求较高的应用基上是用C语言跟C++加上安卓NDK写的，他们基本上支持x86。&nbsp;</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">现在的Android on Chome OS用的安卓版本是”棉花糖（Marshmallow）”，这不过是因为安卓N还没准备好发布而已。安卓开发团队的副总Dave Burke告诉我们说，他们的团队将一些出现在安卓N上才有的多窗口支持功能放到了Android on Chrome OS上。事实上就想Liu强调的那样，安卓N的多窗口支持功能主要是Chrome OS团队做的。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; line-height: 1.42857;\">Liu说，Android on Chrome OS的更新频率大概是6周一次，跟Chrome OS差不多。安卓N系统现在采用A/B升级系统，这让他们的工作更容易（安卓团队又从Chrome OS团队那强了一件活干）。Liu还说，90%以上的Chrome OS都会在几周内更新一次系统。&nbsp;</span></p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Chrome OS跟安卓系统能共存在一个设备上了，大家关于谷歌对Chrome OS未来的计划的疑问相信又会成为热点。比如，安卓有了多窗口的支持的功能后长得越来越像桌面系统了，为什么要折腾这样一个既支持Chrome OS这样的桌面式系统又支持安卓系统的东西呢？</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Liu回应道，Chrome OS会继续更新下去， 虽然“我们的确放了放Chrome OS“他说道”我们现在想要做的是让Chrome OS保留所有他原有的有点的同时将安卓的优势引进来。“</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Burke在另外一个采访中表示，让Chrome OS跟安卓合体，他说”是一个非常实际的共享资源的方法。”他强调，谷歌想保留Chrome OS的特性。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);\">Liu和Burke强调谷歌的Chromebooks是成功的，谷歌公司不想毁掉任何一件好产品。</p>', ' “Google Play商店马上就要登陆Chrome OS了”谷歌公司在今天的开发者大会上宣布。然后大家就可以在自己的Chromebook跟Chromebox上安装几乎所有安卓应用了。 谷歌让Pla', '/uploadfile/image/20170924/1506262346.png', '/thumbfile/image/20170924/1506262346.png', 'http://show.metinfo.cn/muban/res013/323/upload/201605/1464073139802112.png,http://show.metinfo.cn/muban/res013/323/upload/201605/1464073171218171.png', '', '', '', '', '', '0', '0', '1', '1', '1', '1', '', 'vpcvcms', '1506262369', '1506262369', '56', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('7', '4', '4,0', 'case', '0', null, '酷码教育', '', '<p><span style=\"font-family: 微软雅黑;\">公司介绍：广州酷码教育咨询有限公司少儿编程培训体系，源自MIT(麻省理工学院) Mitch Resnick教授带领的“终身幼儿园团队”(Lifelong Kindergarten Group)关于少儿编程平台的设计思路，借鉴其scratch少儿编程平台功能设计。酷码教育团队具有丰富IT技术培训经验，结合国际最前沿的编程应用技术，历时1年多的200多名 学员实战检验，创建适合中国少年儿童的编程教学方法，致力于少儿视野开拓，思维能力提升.</span></p>', ' 公司介绍：广州酷码教育咨询有限公司少儿编程培训体系，源自MIT(麻省理工学院) Mitch Resnick教授带领的“终身幼儿园团队”(Lifelong Kindergarten Group)关于少', '/uploadfile/image/20170924/1506263028.jpg', '/thumbfile/image/20170924/1506263028.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506262885', '1506263029', '1', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('9', '4', '4,0', 'case', '0', null, '海壹粟', '', '<span style=\"font-family: 微软雅黑;\">公司介绍：广州海壹粟食品贸易有限公司是由一群热爱健康品质生活人士精诚发起成立。海壹粟立足于广州，主营欧洲进口食品、饮品，具备全球优质产区原产地采购优势，发展之初我们就致力于优选欧洲顶级品质的食品和饮品，倡导健康时尚的饮食文化。</span>', ' 公司介绍：广州海壹粟食品贸易有限公司是由一群热爱健康品质生活人士精诚发起成立。海壹粟立足于广州，主营欧洲进口食品、饮品，具备全球优质产区原产地采购优势，发展之初我们就致力于优选欧洲顶级品质的食品和饮', '/uploadfile/image/20170924/1506263064.jpg', '/thumbfile/image/20170924/1506263064.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506263078', '1506263078', '1', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('10', '4', '4,0', 'case', '0', null, '海林电子', '', '<p><span style=\"font-family: 微软雅黑;\">广州市海林电子科技发展有限公司于2000年注册成立，致力于提供最专业和最优质的半导体封测产品、高效驱动电源、LED室内和户外照明产品的设计、研发、生产与销售服务。</span></p>', ' 广州市海林电子科技发展有限公司于2000年注册成立，致力于提供最专业和最优质的半导体封测产品、高效驱动电源、LED室内和户外照明产品的设计、研发、生产与销售服务。 ', '/uploadfile/image/20170924/1506263228.jpg', '/thumbfile/image/20170924/1506263228.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506263111', '1506263230', '1', '0', '0', '0', '0');
INSERT INTO `g_article_article` VALUES ('12', '4', '4,0', 'case', '0', '5', 'M+design', '', '<p><span style=\"font-family: 微软雅黑;\">经过多年在中国市场与著名化妆品及日化国际品牌集团的成功作何，M+度国内外的行业发展及市场需求具备了独特的认识并积累了丰富的设计经验。与此同时，M+也开始不断扩展在其他行业及领域的设计项目经验，包括：时装、珠宝、鞋类、3C产品、沙岭、SPA和医疗健康行业。1</span></p>', ' 经过多年在中国市场与著名化妆品及日化国际品牌集团的成功作何，M+度国内外的行业发展及市场需求具备了独特的认识并积累了丰富的设计经验。与此同时，M+也开始不断扩展在其他行业及领域的设计项目经验，包括：', '/uploadfile/image/20181107/154157850260915.jpg', '/thumbfile/image/20181107/154157850260915.jpg', '', '', '', '', '', '', '0', '0', '0', '1', '1', '1', '', 'vpcvcms', '1506263145', '1541602337', '1', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for g_article_leaving
-- ----------------------------
DROP TABLE IF EXISTS `g_article_leaving`;
CREATE TABLE `g_article_leaving` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `realname` char(50) NOT NULL,
  `telephone` char(50) NOT NULL,
  `email` char(50) NOT NULL,
  `qq` char(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_article_leaving
-- ----------------------------

-- ----------------------------
-- Table structure for g_base_ad
-- ----------------------------
DROP TABLE IF EXISTS `g_base_ad`;
CREATE TABLE `g_base_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `typeid` int(4) unsigned DEFAULT '0',
  `tagname` char(50) NOT NULL,
  `adname` varchar(100) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `bigurl` varchar(255) DEFAULT NULL,
  `starttime` int(10) unsigned DEFAULT '0',
  `endtime` int(10) unsigned DEFAULT '0',
  `addtime` int(10) unsigned DEFAULT '0',
  `outurl` varchar(255) DEFAULT NULL,
  `sort` tinyint(4) unsigned DEFAULT '0',
  `shownum` int(6) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_ad
-- ----------------------------
INSERT INTO `g_base_ad` VALUES ('1', '0', 'pcindexFocus', '首页轮播一', '#', '/uploadfile/image/20170924/1506258891.jpg', '', '0', '0', '1506258893', '', '0', '0');
INSERT INTO `g_base_ad` VALUES ('2', '0', 'pcindexFocus', '首页轮播图二', '#', '/uploadfile/image/20170924/1506265390.jpg', '', '0', '0', '1541475762', '', '0', '0');

-- ----------------------------
-- Table structure for g_base_ad_type
-- ----------------------------
DROP TABLE IF EXISTS `g_base_ad_type`;
CREATE TABLE `g_base_ad_type` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT '',
  `tag` char(50) DEFAULT '',
  `isslide` tinyint(2) unsigned DEFAULT '0',
  `useable` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_ad_type
-- ----------------------------
INSERT INTO `g_base_ad_type` VALUES ('1', 'pc首页轮播图', 'pcindexFocus', '1', '1');
INSERT INTO `g_base_ad_type` VALUES ('2', 'wap首页轮播图', 'wapindexFocus', '0', '1');

-- ----------------------------
-- Table structure for g_base_cart
-- ----------------------------
DROP TABLE IF EXISTS `g_base_cart`;
CREATE TABLE `g_base_cart` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `sessionid` varchar(100) NOT NULL,
  `type` tinyint(2) unsigned NOT NULL COMMENT '1礼服',
  `goodsid` int(10) unsigned NOT NULL,
  `goodsname` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `attr` char(100) NOT NULL,
  `color` char(100) NOT NULL,
  `size` char(100) NOT NULL,
  `num` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_cart
-- ----------------------------

-- ----------------------------
-- Table structure for g_base_category
-- ----------------------------
DROP TABLE IF EXISTS `g_base_category`;
CREATE TABLE `g_base_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT '0',
  `itemid` int(4) unsigned DEFAULT '1' COMMENT '1文章，2产品,3地区',
  `catname` char(50) DEFAULT NULL,
  `sort` tinyint(4) unsigned DEFAULT '0',
  `useable` tinyint(2) unsigned DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_category
-- ----------------------------
INSERT INTO `g_base_category` VALUES ('1', '0', '1', '联动一', '0', '0');
INSERT INTO `g_base_category` VALUES ('2', '1', '1', '联动1', '0', '1');
INSERT INTO `g_base_category` VALUES ('4', '0', '1', '联动二', '0', '1');
INSERT INTO `g_base_category` VALUES ('5', '4', '1', '联动3', '0', '1');
INSERT INTO `g_base_category` VALUES ('8', '1', '1', '联动2', '0', '1');
INSERT INTO `g_base_category` VALUES ('9', '4', '1', '联动4', '0', '1');

-- ----------------------------
-- Table structure for g_base_config
-- ----------------------------
DROP TABLE IF EXISTS `g_base_config`;
CREATE TABLE `g_base_config` (
  `group` varchar(50) NOT NULL,
  `cfgname` varchar(100) NOT NULL,
  `config` text NOT NULL,
  `title` text NOT NULL,
  `tips` text NOT NULL,
  UNIQUE KEY `cfgname` (`cfgname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_config
-- ----------------------------
INSERT INTO `g_base_config` VALUES ('site', 'site_name', '2222', '网站名称', '将显示在浏览器窗口标题等位置');
INSERT INTO `g_base_config` VALUES ('site', 'index_name', '主页', '网站主页名称', '');
INSERT INTO `g_base_config` VALUES ('site', 'site_email', '', '管理员 Email', '作为邮件发送的邮箱');
INSERT INTO `g_base_config` VALUES ('site', 'site_telephone', '', '联系电话', '本站的联系电话');
INSERT INTO `g_base_config` VALUES ('site', 'site_powerby', '11 <a href=\"http://www.vpcv.com\" target=\"_blank\">致茂网络</a>技术支持', '版权信息', '版权信息(请勿随便更改)');
INSERT INTO `g_base_config` VALUES ('site', 'site_beian', '<a href=\"http://www.miitbeian.gov.cn\" target=\"_blank\">22</a>', '网站备案号', '请填写 ICP 备案号');
INSERT INTO `g_base_config` VALUES ('site', 'site_cache', '0', '站点缓存', '站点缓存的设置');
INSERT INTO `g_base_config` VALUES ('site', 'site_closed', '0', '站点关闭', '站点关闭之后，只有管理员才可以登录和访问');
INSERT INTO `g_base_config` VALUES ('site', 'site_close_prompt', '系统维护中，请稍候......', '站点关闭原因', '请填写站点关闭原因，在网站关闭时，用于给普通用户显示');
INSERT INTO `g_base_config` VALUES ('site', 'site_tj', '', '网站第三方统计代码', '请填写第三方统计的 js 代码');
INSERT INTO `g_base_config` VALUES ('site', 'index_seotitle', '致茂网络演示站', '首页 META TITLE', '');
INSERT INTO `g_base_config` VALUES ('site', 'index_keywords', '演示站', '首页 META KEYWORDS', '');
INSERT INTO `g_base_config` VALUES ('site', 'index_description', '演示站', '首页 META DESCRIPTION', '');
INSERT INTO `g_base_config` VALUES ('basic', 'thumb_width', '240', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'thumb_height', '180', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'page_size', '100', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'cookiepre', 't_', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'cookiedomain', '', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'cookietime', '30', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'timezone', '8', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'timemodify', '0', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'logprefix', '___', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'stat', '0', '', '');
INSERT INTO `g_base_config` VALUES ('basic', 'rundebug', '1', '', '');
INSERT INTO `g_base_config` VALUES ('third', 'sinaappid', '', '', '');
INSERT INTO `g_base_config` VALUES ('third', 'sinaappkey', '', '', '');
INSERT INTO `g_base_config` VALUES ('third', 'smsuser', '', '', '');
INSERT INTO `g_base_config` VALUES ('third', 'smspwd', '', '', '');
INSERT INTO `g_base_config` VALUES ('third', 'qqappid', '', '', '');
INSERT INTO `g_base_config` VALUES ('third', 'qqappkey', '', '', '');
INSERT INTO `g_base_config` VALUES ('template', 'template', 'default', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'open', '0', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'type', 'mail', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'smtp_server', '', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'smtp_port', '', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'sender', '', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'auth', '0', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'smtp_user', '', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'smtp_pwd', '', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'sendmail_path', '', '', '');
INSERT INTO `g_base_config` VALUES ('mail', 'sendmail_args', '', '', '');
INSERT INTO `g_base_config` VALUES ('sec', 'code_on_reg', '0', '', '');
INSERT INTO `g_base_config` VALUES ('sec', 'code_on_login', '0', '', '');
INSERT INTO `g_base_config` VALUES ('wap', 'wap_on', '1', '', '');
INSERT INTO `g_base_config` VALUES ('site', 'site_logo', '', '', '');
INSERT INTO `g_base_config` VALUES ('site', 'site_weixin', '/vpcvcms_basic/uploadfile/image/20170721/1500635130.jpg', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'enable', '1', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'marktype', 'text', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'markimg', 'resource/images/water.png', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'marktext', 'ZM', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'fontsize', '12', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'diaphaneity', '90', '', '');
INSERT INTO `g_base_config` VALUES ('water', 'markpos', '0', '', '');

-- ----------------------------
-- Table structure for g_base_credit_log
-- ----------------------------
DROP TABLE IF EXISTS `g_base_credit_log`;
CREATE TABLE `g_base_credit_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `postid` int(10) unsigned NOT NULL,
  `type` char(20) NOT NULL,
  `typename` char(20) NOT NULL,
  `credit` int(4) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_credit_log
-- ----------------------------

-- ----------------------------
-- Table structure for g_base_link
-- ----------------------------
DROP TABLE IF EXISTS `g_base_link`;
CREATE TABLE `g_base_link` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `linkpic` varchar(255) DEFAULT NULL,
  `useable` tinyint(2) unsigned DEFAULT '1',
  `addtime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_link
-- ----------------------------
INSERT INTO `g_base_link` VALUES ('1', '致茂网络', 'http://www.vpcv.com/', '', '1', '1506263804');

-- ----------------------------
-- Table structure for g_base_menu
-- ----------------------------
DROP TABLE IF EXISTS `g_base_menu`;
CREATE TABLE `g_base_menu` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(6) unsigned NOT NULL,
  `mid` int(6) unsigned NOT NULL,
  `type` char(10) NOT NULL,
  `name` char(20) NOT NULL,
  `url` char(100) NOT NULL,
  `icon` char(50) NOT NULL,
  `isresize` tinyint(1) unsigned NOT NULL,
  `width` int(4) unsigned NOT NULL,
  `height` int(4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_menu
-- ----------------------------
INSERT INTO `g_base_menu` VALUES ('1', '0', '1', 'folder', '分类管理', '/admin/category/index/item/1', 'resource/admin/images/icon/category.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('2', '0', '1', 'folder', '内容管理', '/admin/article/index', 'resource/admin/images/icon/article.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('3', '0', '1', 'folder', '用户管理', '/admin/user/search', 'resource/admin/images/icon/user.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('4', '0', '1', 'folder', '论坛管理', '/admin/forum/index', 'resource/admin/images/icon/forum.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('5', '0', '1', 'folder', '界面管理', '/admin/nav/index', 'resource/admin/images/icon/nav.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('6', '0', '1', 'folder', '实用工具', '/admin/db/backup', 'resource/admin/images/icon/tool.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('7', '0', '1', 'folder', '网站设置', '/admin/config/site', 'resource/admin/images/icon/setting.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('8', '1', '1', 'menu', '文章分类', 'admin/category/index/item/1', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('9', '1', '1', 'menu', '商品分类', 'admin/category/index/item/2', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('10', '1', '1', 'menu', '地区分类', 'admin/category/index/item/3', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('11', '2', '1', 'menu', '文章管理', 'admin/article/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('12', '3', '1', 'menu', '用户列表', 'admin/user/search', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('13', '3', '1', 'menu', '管理组', 'admin/group/manage/type/0', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('14', '3', '1', 'menu', '用户组', 'admin/group/manage/type/1', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('15', '3', '1', 'menu', '勋章列表', 'admin/medal/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('16', '3', '1', 'menu', '禁止IP', 'admin/banned/manage', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('17', '3', '1', 'menu', '用户评论', 'admin/feed/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('18', '3', '1', 'menu', '用户收藏', 'admin/stow/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('19', '3', '1', 'menu', '用户心情', 'admin/mind/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('20', '3', '1', 'menu', '消息列表', 'admin/message/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('21', '3', '1', 'menu', '积分管理', 'admin/cost/score', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('22', '4', '1', 'menu', '板块管理', 'admin/forum/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('23', '4', '1', 'menu', '主题管理', 'admin/forum/thread', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('24', '4', '1', 'menu', '帖子管理', 'admin/forum/post', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('25', '5', '1', 'menu', '导航管理', 'admin/nav/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('26', '5', '1', 'menu', '广告管理', 'admin/ad/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('27', '6', '1', 'menu', '数据备份', 'admin/db/backup', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('28', '6', '1', 'menu', '数据恢复', 'admin/db/restore', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('29', '6', '1', 'menu', '更新缓存', 'admin/tool/updatecache', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('30', '6', '1', 'menu', 'UC管理', 'admin/uc/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('31', '6', '1', 'menu', '友情链接', 'admin/link/index', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('32', '7', '1', 'menu', '站点设置', 'admin/config/site', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('33', '7', '1', 'menu', '基本设置', 'admin/config/basic', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('34', '7', '1', 'menu', '手机设置', 'admin/config/wap', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('35', '7', '1', 'menu', '防灌水设置', 'admin/config/sec', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('36', '7', '1', 'menu', '邮件设置', 'admin/config/mail', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('37', '7', '1', 'menu', '水印设置', 'admin/config/water', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');
INSERT INTO `g_base_menu` VALUES ('41', '1', '1', 'menu', '旅游分类', '/admin/category/index/item/4', 'resource/admin/images/icon/vpcv.png', '1', '1000', '600');

-- ----------------------------
-- Table structure for g_base_module
-- ----------------------------
DROP TABLE IF EXISTS `g_base_module`;
CREATE TABLE `g_base_module` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(50) DEFAULT NULL,
  `mark` char(50) DEFAULT NULL,
  `comment` char(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='模型表';

-- ----------------------------
-- Records of g_base_module
-- ----------------------------
INSERT INTO `g_base_module` VALUES ('3', '文章模型', 'article', '普通文章模型');
INSERT INTO `g_base_module` VALUES ('4', '商品模型', 'shop', '商品模型');
INSERT INTO `g_base_module` VALUES ('5', '案例模型', 'case', '测试模型');

-- ----------------------------
-- Table structure for g_base_module_article
-- ----------------------------
DROP TABLE IF EXISTS `g_base_module_article`;
CREATE TABLE `g_base_module_article` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(6) unsigned NOT NULL,
  `brief` text COMMENT '简介',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_module_article
-- ----------------------------
INSERT INTO `g_base_module_article` VALUES ('1', '5', '');
INSERT INTO `g_base_module_article` VALUES ('2', '6', '');

-- ----------------------------
-- Table structure for g_base_module_case
-- ----------------------------
DROP TABLE IF EXISTS `g_base_module_case`;
CREATE TABLE `g_base_module_case` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_module_case
-- ----------------------------
INSERT INTO `g_base_module_case` VALUES ('1', '7');
INSERT INTO `g_base_module_case` VALUES ('3', '9');
INSERT INTO `g_base_module_case` VALUES ('4', '10');
INSERT INTO `g_base_module_case` VALUES ('6', '12');

-- ----------------------------
-- Table structure for g_base_module_shop
-- ----------------------------
DROP TABLE IF EXISTS `g_base_module_shop`;
CREATE TABLE `g_base_module_shop` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(6) unsigned NOT NULL,
  `price` int(10) unsigned NOT NULL COMMENT '销售价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_module_shop
-- ----------------------------
INSERT INTO `g_base_module_shop` VALUES ('1', '1', '129');
INSERT INTO `g_base_module_shop` VALUES ('2', '2', '139');
INSERT INTO `g_base_module_shop` VALUES ('3', '3', '219');
INSERT INTO `g_base_module_shop` VALUES ('4', '4', '189');

-- ----------------------------
-- Table structure for g_base_nav
-- ----------------------------
DROP TABLE IF EXISTS `g_base_nav`;
CREATE TABLE `g_base_nav` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentid` int(10) unsigned DEFAULT '0' COMMENT '上级菜单',
  `name` varchar(255) DEFAULT NULL COMMENT '导航名称',
  `ename` char(100) DEFAULT NULL COMMENT '英文名称',
  `icon` varchar(255) DEFAULT NULL,
  `moduleid` char(50) DEFAULT 'article',
  `style` tinyint(2) unsigned DEFAULT '1',
  `tempindex` char(100) DEFAULT NULL,
  `templist` char(100) DEFAULT NULL,
  `temparticle` char(100) DEFAULT NULL,
  `perpage` tinyint(3) unsigned DEFAULT '10',
  `head` char(50) DEFAULT NULL,
  `pinyin` varchar(255) DEFAULT NULL,
  `system` tinyint(1) unsigned DEFAULT '0' COMMENT '是否内置导航',
  `type` tinyint(4) DEFAULT '0' COMMENT '导航类别 0:顶部导航 1:头部导航',
  `displayorder` tinyint(3) unsigned DEFAULT '0' COMMENT '显示顺序',
  `newwindow` tinyint(4) unsigned DEFAULT '0' COMMENT '是否新窗口打开',
  `useable` tinyint(1) unsigned DEFAULT '1' COMMENT '是否启用',
  `body` text,
  `seotitle` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `isview` tinyint(2) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_nav
-- ----------------------------
INSERT INTO `g_base_nav` VALUES ('1', '0', '关于我们', '', '', 'article', '2', 'about.tpl', '', '', '0', '', 'gywm', '0', '0', '0', '0', '1', '<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; white-space: normal;\">某科技公司是一个诞生于2013年机器人浪潮来袭前际，总部位于“硬件之都”中国深圳。</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; white-space: normal;\">我们是一群热衷于智能机器人的极客、设计师和发烧友，对未来充满无限创想、野心和激情。“在最好的时光里，撒野去”是我们所倡导的品牌文化，号召属于这个时代的年轻人，不羁束缚、随心逐梦！</p><p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 16px; color: rgb(34, 34, 34); font-family: &quot;Segoe UI&quot;, &quot;Lucida Grande&quot;, Helvetica, Arial, &quot;Microsoft YaHei&quot;, FreeSans, Arimo, &quot;Droid Sans&quot;, &quot;wenquanyi micro hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;Hiragino Sans GB W3&quot;, Roboto, Arial, sans-serif; font-size: 18px; white-space: normal;\">比普通创客幸运一些的是，我们成立之初，就在语义技术、图数据管理和供应链方面拥有比较丰富的经验和积累，并且、汇聚整合了完善的生产链条和多元的渠道资源，我们愿意拥抱大胆有趣的产品理念，为用户创造更多的惊喜！</p><p><br/></p>', '', '', '致茂网络是以互联网研发和运营为核心的新型高科技企业 ', '0');
INSERT INTO `g_base_nav` VALUES ('2', '0', '新闻资讯', null, '', 'article', '1', '', '', '', '0', '', 'xwzx', '0', '0', '0', '0', '1', '', '', '', '', '0');
INSERT INTO `g_base_nav` VALUES ('3', '0', '产品列表', null, '', 'shop', '1', '', '', '', '0', '', 'cplb', '0', '0', '0', '0', '1', '', '', '', '首页显示的产品列表', '0');
INSERT INTO `g_base_nav` VALUES ('4', '0', '案例展示', null, '', 'case', '1', '', '', '', '10', '', 'alzs', '0', '0', '0', '0', '1', '', '', '', '', '0');
INSERT INTO `g_base_nav` VALUES ('5', '0', '联系我们', null, '', 'article', '2', 'contact.tpl', '', '', '0', '', 'lxwm', '0', '0', '0', '0', '1', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: 微软雅黑; white-space: normal; font-size: 18px;\"><strong>广州致茂网络科技有限公司</strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: 微软雅黑; white-space: normal; font-size: 18px; line-height: 1.8;\">地址：广州市天河区岗顶百脑汇写字楼C座2504</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: 微软雅黑; white-space: normal; font-size: 18px; line-height: 1.8;\">（3号线岗顶地铁站D出口，靠近桥这边大厦的侧边入口）</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; font-family: 微软雅黑; white-space: normal; font-size: 18px; line-height: 1.8;\"><img width=\"530\" height=\"340\" src=\"http://api.map.baidu.com/staticimage?center=113.338157,23.136064&zoom=15&width=530&height=340&markers=113.338157,23.136064\"/></p><p><br/></p>', '', '', '', '0');
INSERT INTO `g_base_nav` VALUES ('6', '3', '产品分类一', null, '', 'shop', '1', '', '', '', '0', '', 'cpfly', '0', '0', '0', '0', '1', '', '', '', '', '0');
INSERT INTO `g_base_nav` VALUES ('7', '3', '产品分类二', null, '', 'shop', '1', '', '', '', '0', '', 'cpfle', '0', '0', '0', '0', '1', '', '', '', '', '0');
INSERT INTO `g_base_nav` VALUES ('8', '3', '产品分类三', null, '', 'shop', '1', '', '', '', '0', '', 'cpfls', '0', '0', '0', '0', '1', '', '', '', '', '0');
INSERT INTO `g_base_nav` VALUES ('9', '0', '测试列表', null, '', 'article', '1', '', '', '', '20', '', 'cslb', '0', '0', '0', '0', '1', '', '', '', '', '0');

-- ----------------------------
-- Table structure for g_base_region
-- ----------------------------
DROP TABLE IF EXISTS `g_base_region`;
CREATE TABLE `g_base_region` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `regionname` varchar(120) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=3411 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_region
-- ----------------------------
INSERT INTO `g_base_region` VALUES ('1', '0', '中国');
INSERT INTO `g_base_region` VALUES ('2', '1', '北京');
INSERT INTO `g_base_region` VALUES ('3', '1', '安徽');
INSERT INTO `g_base_region` VALUES ('4', '1', '福建');
INSERT INTO `g_base_region` VALUES ('5', '1', '甘肃');
INSERT INTO `g_base_region` VALUES ('6', '1', '广东');
INSERT INTO `g_base_region` VALUES ('7', '1', '广西');
INSERT INTO `g_base_region` VALUES ('8', '1', '贵州');
INSERT INTO `g_base_region` VALUES ('9', '1', '海南');
INSERT INTO `g_base_region` VALUES ('10', '1', '河北');
INSERT INTO `g_base_region` VALUES ('11', '1', '河南');
INSERT INTO `g_base_region` VALUES ('12', '1', '黑龙江');
INSERT INTO `g_base_region` VALUES ('13', '1', '湖北');
INSERT INTO `g_base_region` VALUES ('14', '1', '湖南');
INSERT INTO `g_base_region` VALUES ('15', '1', '吉林');
INSERT INTO `g_base_region` VALUES ('16', '1', '江苏');
INSERT INTO `g_base_region` VALUES ('17', '1', '江西');
INSERT INTO `g_base_region` VALUES ('18', '1', '辽宁');
INSERT INTO `g_base_region` VALUES ('19', '1', '内蒙古');
INSERT INTO `g_base_region` VALUES ('20', '1', '宁夏');
INSERT INTO `g_base_region` VALUES ('21', '1', '青海');
INSERT INTO `g_base_region` VALUES ('22', '1', '山东');
INSERT INTO `g_base_region` VALUES ('23', '1', '山西');
INSERT INTO `g_base_region` VALUES ('24', '1', '陕西');
INSERT INTO `g_base_region` VALUES ('25', '1', '上海');
INSERT INTO `g_base_region` VALUES ('26', '1', '四川');
INSERT INTO `g_base_region` VALUES ('27', '1', '天津');
INSERT INTO `g_base_region` VALUES ('28', '1', '西藏');
INSERT INTO `g_base_region` VALUES ('29', '1', '新疆');
INSERT INTO `g_base_region` VALUES ('30', '1', '云南');
INSERT INTO `g_base_region` VALUES ('31', '1', '浙江');
INSERT INTO `g_base_region` VALUES ('32', '1', '重庆');
INSERT INTO `g_base_region` VALUES ('33', '1', '香港');
INSERT INTO `g_base_region` VALUES ('34', '1', '澳门');
INSERT INTO `g_base_region` VALUES ('35', '1', '台湾');
INSERT INTO `g_base_region` VALUES ('36', '3', '安庆');
INSERT INTO `g_base_region` VALUES ('37', '3', '蚌埠');
INSERT INTO `g_base_region` VALUES ('38', '3', '巢湖');
INSERT INTO `g_base_region` VALUES ('39', '3', '池州');
INSERT INTO `g_base_region` VALUES ('40', '3', '滁州');
INSERT INTO `g_base_region` VALUES ('41', '3', '阜阳');
INSERT INTO `g_base_region` VALUES ('42', '3', '淮北');
INSERT INTO `g_base_region` VALUES ('43', '3', '淮南');
INSERT INTO `g_base_region` VALUES ('44', '3', '黄山');
INSERT INTO `g_base_region` VALUES ('45', '3', '六安');
INSERT INTO `g_base_region` VALUES ('46', '3', '马鞍山');
INSERT INTO `g_base_region` VALUES ('47', '3', '宿州');
INSERT INTO `g_base_region` VALUES ('48', '3', '铜陵');
INSERT INTO `g_base_region` VALUES ('49', '3', '芜湖');
INSERT INTO `g_base_region` VALUES ('50', '3', '宣城');
INSERT INTO `g_base_region` VALUES ('51', '3', '亳州');
INSERT INTO `g_base_region` VALUES ('52', '2', '北京');
INSERT INTO `g_base_region` VALUES ('53', '4', '福州');
INSERT INTO `g_base_region` VALUES ('54', '4', '龙岩');
INSERT INTO `g_base_region` VALUES ('55', '4', '南平');
INSERT INTO `g_base_region` VALUES ('56', '4', '宁德');
INSERT INTO `g_base_region` VALUES ('57', '4', '莆田');
INSERT INTO `g_base_region` VALUES ('58', '4', '泉州');
INSERT INTO `g_base_region` VALUES ('59', '4', '三明');
INSERT INTO `g_base_region` VALUES ('60', '4', '厦门');
INSERT INTO `g_base_region` VALUES ('61', '4', '漳州');
INSERT INTO `g_base_region` VALUES ('62', '5', '兰州');
INSERT INTO `g_base_region` VALUES ('63', '5', '白银');
INSERT INTO `g_base_region` VALUES ('64', '5', '定西');
INSERT INTO `g_base_region` VALUES ('65', '5', '甘南');
INSERT INTO `g_base_region` VALUES ('66', '5', '嘉峪关');
INSERT INTO `g_base_region` VALUES ('67', '5', '金昌');
INSERT INTO `g_base_region` VALUES ('68', '5', '酒泉');
INSERT INTO `g_base_region` VALUES ('69', '5', '临夏');
INSERT INTO `g_base_region` VALUES ('70', '5', '陇南');
INSERT INTO `g_base_region` VALUES ('71', '5', '平凉');
INSERT INTO `g_base_region` VALUES ('72', '5', '庆阳');
INSERT INTO `g_base_region` VALUES ('73', '5', '天水');
INSERT INTO `g_base_region` VALUES ('74', '5', '武威');
INSERT INTO `g_base_region` VALUES ('75', '5', '张掖');
INSERT INTO `g_base_region` VALUES ('76', '6', '广州');
INSERT INTO `g_base_region` VALUES ('77', '6', '深圳');
INSERT INTO `g_base_region` VALUES ('78', '6', '潮州');
INSERT INTO `g_base_region` VALUES ('79', '6', '东莞');
INSERT INTO `g_base_region` VALUES ('80', '6', '佛山');
INSERT INTO `g_base_region` VALUES ('81', '6', '河源');
INSERT INTO `g_base_region` VALUES ('82', '6', '惠州');
INSERT INTO `g_base_region` VALUES ('83', '6', '江门');
INSERT INTO `g_base_region` VALUES ('84', '6', '揭阳');
INSERT INTO `g_base_region` VALUES ('85', '6', '茂名');
INSERT INTO `g_base_region` VALUES ('86', '6', '梅州');
INSERT INTO `g_base_region` VALUES ('87', '6', '清远');
INSERT INTO `g_base_region` VALUES ('88', '6', '汕头');
INSERT INTO `g_base_region` VALUES ('89', '6', '汕尾');
INSERT INTO `g_base_region` VALUES ('90', '6', '韶关');
INSERT INTO `g_base_region` VALUES ('91', '6', '阳江');
INSERT INTO `g_base_region` VALUES ('92', '6', '云浮');
INSERT INTO `g_base_region` VALUES ('93', '6', '湛江');
INSERT INTO `g_base_region` VALUES ('94', '6', '肇庆');
INSERT INTO `g_base_region` VALUES ('95', '6', '中山');
INSERT INTO `g_base_region` VALUES ('96', '6', '珠海');
INSERT INTO `g_base_region` VALUES ('97', '7', '南宁');
INSERT INTO `g_base_region` VALUES ('98', '7', '桂林');
INSERT INTO `g_base_region` VALUES ('99', '7', '百色');
INSERT INTO `g_base_region` VALUES ('100', '7', '北海');
INSERT INTO `g_base_region` VALUES ('101', '7', '崇左');
INSERT INTO `g_base_region` VALUES ('102', '7', '防城港');
INSERT INTO `g_base_region` VALUES ('103', '7', '贵港');
INSERT INTO `g_base_region` VALUES ('104', '7', '河池');
INSERT INTO `g_base_region` VALUES ('105', '7', '贺州');
INSERT INTO `g_base_region` VALUES ('106', '7', '来宾');
INSERT INTO `g_base_region` VALUES ('107', '7', '柳州');
INSERT INTO `g_base_region` VALUES ('108', '7', '钦州');
INSERT INTO `g_base_region` VALUES ('109', '7', '梧州');
INSERT INTO `g_base_region` VALUES ('110', '7', '玉林');
INSERT INTO `g_base_region` VALUES ('111', '8', '贵阳');
INSERT INTO `g_base_region` VALUES ('112', '8', '安顺');
INSERT INTO `g_base_region` VALUES ('113', '8', '毕节');
INSERT INTO `g_base_region` VALUES ('114', '8', '六盘水');
INSERT INTO `g_base_region` VALUES ('115', '8', '黔东南');
INSERT INTO `g_base_region` VALUES ('116', '8', '黔南');
INSERT INTO `g_base_region` VALUES ('117', '8', '黔西南');
INSERT INTO `g_base_region` VALUES ('118', '8', '铜仁');
INSERT INTO `g_base_region` VALUES ('119', '8', '遵义');
INSERT INTO `g_base_region` VALUES ('120', '9', '海口');
INSERT INTO `g_base_region` VALUES ('121', '9', '三亚');
INSERT INTO `g_base_region` VALUES ('122', '9', '白沙');
INSERT INTO `g_base_region` VALUES ('123', '9', '保亭');
INSERT INTO `g_base_region` VALUES ('124', '9', '昌江');
INSERT INTO `g_base_region` VALUES ('125', '9', '澄迈县');
INSERT INTO `g_base_region` VALUES ('126', '9', '定安县');
INSERT INTO `g_base_region` VALUES ('127', '9', '东方');
INSERT INTO `g_base_region` VALUES ('128', '9', '乐东');
INSERT INTO `g_base_region` VALUES ('129', '9', '临高县');
INSERT INTO `g_base_region` VALUES ('130', '9', '陵水');
INSERT INTO `g_base_region` VALUES ('131', '9', '琼海');
INSERT INTO `g_base_region` VALUES ('132', '9', '琼中');
INSERT INTO `g_base_region` VALUES ('133', '9', '屯昌县');
INSERT INTO `g_base_region` VALUES ('134', '9', '万宁');
INSERT INTO `g_base_region` VALUES ('135', '9', '文昌');
INSERT INTO `g_base_region` VALUES ('136', '9', '五指山');
INSERT INTO `g_base_region` VALUES ('137', '9', '儋州');
INSERT INTO `g_base_region` VALUES ('138', '10', '石家庄');
INSERT INTO `g_base_region` VALUES ('139', '10', '保定');
INSERT INTO `g_base_region` VALUES ('140', '10', '沧州');
INSERT INTO `g_base_region` VALUES ('141', '10', '承德');
INSERT INTO `g_base_region` VALUES ('142', '10', '邯郸');
INSERT INTO `g_base_region` VALUES ('143', '10', '衡水');
INSERT INTO `g_base_region` VALUES ('144', '10', '廊坊');
INSERT INTO `g_base_region` VALUES ('145', '10', '秦皇岛');
INSERT INTO `g_base_region` VALUES ('146', '10', '唐山');
INSERT INTO `g_base_region` VALUES ('147', '10', '邢台');
INSERT INTO `g_base_region` VALUES ('148', '10', '张家口');
INSERT INTO `g_base_region` VALUES ('149', '11', '郑州');
INSERT INTO `g_base_region` VALUES ('150', '11', '洛阳');
INSERT INTO `g_base_region` VALUES ('151', '11', '开封');
INSERT INTO `g_base_region` VALUES ('152', '11', '安阳');
INSERT INTO `g_base_region` VALUES ('153', '11', '鹤壁');
INSERT INTO `g_base_region` VALUES ('154', '11', '济源');
INSERT INTO `g_base_region` VALUES ('155', '11', '焦作');
INSERT INTO `g_base_region` VALUES ('156', '11', '南阳');
INSERT INTO `g_base_region` VALUES ('157', '11', '平顶山');
INSERT INTO `g_base_region` VALUES ('158', '11', '三门峡');
INSERT INTO `g_base_region` VALUES ('159', '11', '商丘');
INSERT INTO `g_base_region` VALUES ('160', '11', '新乡');
INSERT INTO `g_base_region` VALUES ('161', '11', '信阳');
INSERT INTO `g_base_region` VALUES ('162', '11', '许昌');
INSERT INTO `g_base_region` VALUES ('163', '11', '周口');
INSERT INTO `g_base_region` VALUES ('164', '11', '驻马店');
INSERT INTO `g_base_region` VALUES ('165', '11', '漯河');
INSERT INTO `g_base_region` VALUES ('166', '11', '濮阳');
INSERT INTO `g_base_region` VALUES ('167', '12', '哈尔滨');
INSERT INTO `g_base_region` VALUES ('168', '12', '大庆');
INSERT INTO `g_base_region` VALUES ('169', '12', '大兴安岭');
INSERT INTO `g_base_region` VALUES ('170', '12', '鹤岗');
INSERT INTO `g_base_region` VALUES ('171', '12', '黑河');
INSERT INTO `g_base_region` VALUES ('172', '12', '鸡西');
INSERT INTO `g_base_region` VALUES ('173', '12', '佳木斯');
INSERT INTO `g_base_region` VALUES ('174', '12', '牡丹江');
INSERT INTO `g_base_region` VALUES ('175', '12', '七台河');
INSERT INTO `g_base_region` VALUES ('176', '12', '齐齐哈尔');
INSERT INTO `g_base_region` VALUES ('177', '12', '双鸭山');
INSERT INTO `g_base_region` VALUES ('178', '12', '绥化');
INSERT INTO `g_base_region` VALUES ('179', '12', '伊春');
INSERT INTO `g_base_region` VALUES ('180', '13', '武汉');
INSERT INTO `g_base_region` VALUES ('181', '13', '仙桃');
INSERT INTO `g_base_region` VALUES ('182', '13', '鄂州');
INSERT INTO `g_base_region` VALUES ('183', '13', '黄冈');
INSERT INTO `g_base_region` VALUES ('184', '13', '黄石');
INSERT INTO `g_base_region` VALUES ('185', '13', '荆门');
INSERT INTO `g_base_region` VALUES ('186', '13', '荆州');
INSERT INTO `g_base_region` VALUES ('187', '13', '潜江');
INSERT INTO `g_base_region` VALUES ('188', '13', '神农架林区');
INSERT INTO `g_base_region` VALUES ('189', '13', '十堰');
INSERT INTO `g_base_region` VALUES ('190', '13', '随州');
INSERT INTO `g_base_region` VALUES ('191', '13', '天门');
INSERT INTO `g_base_region` VALUES ('192', '13', '咸宁');
INSERT INTO `g_base_region` VALUES ('193', '13', '襄樊');
INSERT INTO `g_base_region` VALUES ('194', '13', '孝感');
INSERT INTO `g_base_region` VALUES ('195', '13', '宜昌');
INSERT INTO `g_base_region` VALUES ('196', '13', '恩施');
INSERT INTO `g_base_region` VALUES ('197', '14', '长沙');
INSERT INTO `g_base_region` VALUES ('198', '14', '张家界');
INSERT INTO `g_base_region` VALUES ('199', '14', '常德');
INSERT INTO `g_base_region` VALUES ('200', '14', '郴州');
INSERT INTO `g_base_region` VALUES ('201', '14', '衡阳');
INSERT INTO `g_base_region` VALUES ('202', '14', '怀化');
INSERT INTO `g_base_region` VALUES ('203', '14', '娄底');
INSERT INTO `g_base_region` VALUES ('204', '14', '邵阳');
INSERT INTO `g_base_region` VALUES ('205', '14', '湘潭');
INSERT INTO `g_base_region` VALUES ('206', '14', '湘西');
INSERT INTO `g_base_region` VALUES ('207', '14', '益阳');
INSERT INTO `g_base_region` VALUES ('208', '14', '永州');
INSERT INTO `g_base_region` VALUES ('209', '14', '岳阳');
INSERT INTO `g_base_region` VALUES ('210', '14', '株洲');
INSERT INTO `g_base_region` VALUES ('211', '15', '长春');
INSERT INTO `g_base_region` VALUES ('212', '15', '吉林');
INSERT INTO `g_base_region` VALUES ('213', '15', '白城');
INSERT INTO `g_base_region` VALUES ('214', '15', '白山');
INSERT INTO `g_base_region` VALUES ('215', '15', '辽源');
INSERT INTO `g_base_region` VALUES ('216', '15', '四平');
INSERT INTO `g_base_region` VALUES ('217', '15', '松原');
INSERT INTO `g_base_region` VALUES ('218', '15', '通化');
INSERT INTO `g_base_region` VALUES ('219', '15', '延边');
INSERT INTO `g_base_region` VALUES ('220', '16', '南京');
INSERT INTO `g_base_region` VALUES ('221', '16', '苏州');
INSERT INTO `g_base_region` VALUES ('222', '16', '无锡');
INSERT INTO `g_base_region` VALUES ('223', '16', '常州');
INSERT INTO `g_base_region` VALUES ('224', '16', '淮安');
INSERT INTO `g_base_region` VALUES ('225', '16', '连云港');
INSERT INTO `g_base_region` VALUES ('226', '16', '南通');
INSERT INTO `g_base_region` VALUES ('227', '16', '宿迁');
INSERT INTO `g_base_region` VALUES ('228', '16', '泰州');
INSERT INTO `g_base_region` VALUES ('229', '16', '徐州');
INSERT INTO `g_base_region` VALUES ('230', '16', '盐城');
INSERT INTO `g_base_region` VALUES ('231', '16', '扬州');
INSERT INTO `g_base_region` VALUES ('232', '16', '镇江');
INSERT INTO `g_base_region` VALUES ('233', '17', '南昌');
INSERT INTO `g_base_region` VALUES ('234', '17', '抚州');
INSERT INTO `g_base_region` VALUES ('235', '17', '赣州');
INSERT INTO `g_base_region` VALUES ('236', '17', '吉安');
INSERT INTO `g_base_region` VALUES ('237', '17', '景德镇');
INSERT INTO `g_base_region` VALUES ('238', '17', '九江');
INSERT INTO `g_base_region` VALUES ('239', '17', '萍乡');
INSERT INTO `g_base_region` VALUES ('240', '17', '上饶');
INSERT INTO `g_base_region` VALUES ('241', '17', '新余');
INSERT INTO `g_base_region` VALUES ('242', '17', '宜春');
INSERT INTO `g_base_region` VALUES ('243', '17', '鹰潭');
INSERT INTO `g_base_region` VALUES ('244', '18', '沈阳');
INSERT INTO `g_base_region` VALUES ('245', '18', '大连');
INSERT INTO `g_base_region` VALUES ('246', '18', '鞍山');
INSERT INTO `g_base_region` VALUES ('247', '18', '本溪');
INSERT INTO `g_base_region` VALUES ('248', '18', '朝阳');
INSERT INTO `g_base_region` VALUES ('249', '18', '丹东');
INSERT INTO `g_base_region` VALUES ('250', '18', '抚顺');
INSERT INTO `g_base_region` VALUES ('251', '18', '阜新');
INSERT INTO `g_base_region` VALUES ('252', '18', '葫芦岛');
INSERT INTO `g_base_region` VALUES ('253', '18', '锦州');
INSERT INTO `g_base_region` VALUES ('254', '18', '辽阳');
INSERT INTO `g_base_region` VALUES ('255', '18', '盘锦');
INSERT INTO `g_base_region` VALUES ('256', '18', '铁岭');
INSERT INTO `g_base_region` VALUES ('257', '18', '营口');
INSERT INTO `g_base_region` VALUES ('258', '19', '呼和浩特');
INSERT INTO `g_base_region` VALUES ('259', '19', '阿拉善盟');
INSERT INTO `g_base_region` VALUES ('260', '19', '巴彦淖尔盟');
INSERT INTO `g_base_region` VALUES ('261', '19', '包头');
INSERT INTO `g_base_region` VALUES ('262', '19', '赤峰');
INSERT INTO `g_base_region` VALUES ('263', '19', '鄂尔多斯');
INSERT INTO `g_base_region` VALUES ('264', '19', '呼伦贝尔');
INSERT INTO `g_base_region` VALUES ('265', '19', '通辽');
INSERT INTO `g_base_region` VALUES ('266', '19', '乌海');
INSERT INTO `g_base_region` VALUES ('267', '19', '乌兰察布市');
INSERT INTO `g_base_region` VALUES ('268', '19', '锡林郭勒盟');
INSERT INTO `g_base_region` VALUES ('269', '19', '兴安盟');
INSERT INTO `g_base_region` VALUES ('270', '20', '银川');
INSERT INTO `g_base_region` VALUES ('271', '20', '固原');
INSERT INTO `g_base_region` VALUES ('272', '20', '石嘴山');
INSERT INTO `g_base_region` VALUES ('273', '20', '吴忠');
INSERT INTO `g_base_region` VALUES ('274', '20', '中卫');
INSERT INTO `g_base_region` VALUES ('275', '21', '西宁');
INSERT INTO `g_base_region` VALUES ('276', '21', '果洛');
INSERT INTO `g_base_region` VALUES ('277', '21', '海北');
INSERT INTO `g_base_region` VALUES ('278', '21', '海东');
INSERT INTO `g_base_region` VALUES ('279', '21', '海南');
INSERT INTO `g_base_region` VALUES ('280', '21', '海西');
INSERT INTO `g_base_region` VALUES ('281', '21', '黄南');
INSERT INTO `g_base_region` VALUES ('282', '21', '玉树');
INSERT INTO `g_base_region` VALUES ('283', '22', '济南');
INSERT INTO `g_base_region` VALUES ('284', '22', '青岛');
INSERT INTO `g_base_region` VALUES ('285', '22', '滨州');
INSERT INTO `g_base_region` VALUES ('286', '22', '德州');
INSERT INTO `g_base_region` VALUES ('287', '22', '东营');
INSERT INTO `g_base_region` VALUES ('288', '22', '菏泽');
INSERT INTO `g_base_region` VALUES ('289', '22', '济宁');
INSERT INTO `g_base_region` VALUES ('290', '22', '莱芜');
INSERT INTO `g_base_region` VALUES ('291', '22', '聊城');
INSERT INTO `g_base_region` VALUES ('292', '22', '临沂');
INSERT INTO `g_base_region` VALUES ('293', '22', '日照');
INSERT INTO `g_base_region` VALUES ('294', '22', '泰安');
INSERT INTO `g_base_region` VALUES ('295', '22', '威海');
INSERT INTO `g_base_region` VALUES ('296', '22', '潍坊');
INSERT INTO `g_base_region` VALUES ('297', '22', '烟台');
INSERT INTO `g_base_region` VALUES ('298', '22', '枣庄');
INSERT INTO `g_base_region` VALUES ('299', '22', '淄博');
INSERT INTO `g_base_region` VALUES ('300', '23', '太原');
INSERT INTO `g_base_region` VALUES ('301', '23', '长治');
INSERT INTO `g_base_region` VALUES ('302', '23', '大同');
INSERT INTO `g_base_region` VALUES ('303', '23', '晋城');
INSERT INTO `g_base_region` VALUES ('304', '23', '晋中');
INSERT INTO `g_base_region` VALUES ('305', '23', '临汾');
INSERT INTO `g_base_region` VALUES ('306', '23', '吕梁');
INSERT INTO `g_base_region` VALUES ('307', '23', '朔州');
INSERT INTO `g_base_region` VALUES ('308', '23', '忻州');
INSERT INTO `g_base_region` VALUES ('309', '23', '阳泉');
INSERT INTO `g_base_region` VALUES ('310', '23', '运城');
INSERT INTO `g_base_region` VALUES ('311', '24', '西安');
INSERT INTO `g_base_region` VALUES ('312', '24', '安康');
INSERT INTO `g_base_region` VALUES ('313', '24', '宝鸡');
INSERT INTO `g_base_region` VALUES ('314', '24', '汉中');
INSERT INTO `g_base_region` VALUES ('315', '24', '商洛');
INSERT INTO `g_base_region` VALUES ('316', '24', '铜川');
INSERT INTO `g_base_region` VALUES ('317', '24', '渭南');
INSERT INTO `g_base_region` VALUES ('318', '24', '咸阳');
INSERT INTO `g_base_region` VALUES ('319', '24', '延安');
INSERT INTO `g_base_region` VALUES ('320', '24', '榆林');
INSERT INTO `g_base_region` VALUES ('321', '25', '上海');
INSERT INTO `g_base_region` VALUES ('322', '26', '成都');
INSERT INTO `g_base_region` VALUES ('323', '26', '绵阳');
INSERT INTO `g_base_region` VALUES ('324', '26', '阿坝');
INSERT INTO `g_base_region` VALUES ('325', '26', '巴中');
INSERT INTO `g_base_region` VALUES ('326', '26', '达州');
INSERT INTO `g_base_region` VALUES ('327', '26', '德阳');
INSERT INTO `g_base_region` VALUES ('328', '26', '甘孜');
INSERT INTO `g_base_region` VALUES ('329', '26', '广安');
INSERT INTO `g_base_region` VALUES ('330', '26', '广元');
INSERT INTO `g_base_region` VALUES ('331', '26', '乐山');
INSERT INTO `g_base_region` VALUES ('332', '26', '凉山');
INSERT INTO `g_base_region` VALUES ('333', '26', '眉山');
INSERT INTO `g_base_region` VALUES ('334', '26', '南充');
INSERT INTO `g_base_region` VALUES ('335', '26', '内江');
INSERT INTO `g_base_region` VALUES ('336', '26', '攀枝花');
INSERT INTO `g_base_region` VALUES ('337', '26', '遂宁');
INSERT INTO `g_base_region` VALUES ('338', '26', '雅安');
INSERT INTO `g_base_region` VALUES ('339', '26', '宜宾');
INSERT INTO `g_base_region` VALUES ('340', '26', '资阳');
INSERT INTO `g_base_region` VALUES ('341', '26', '自贡');
INSERT INTO `g_base_region` VALUES ('342', '26', '泸州');
INSERT INTO `g_base_region` VALUES ('343', '27', '天津');
INSERT INTO `g_base_region` VALUES ('344', '28', '拉萨');
INSERT INTO `g_base_region` VALUES ('345', '28', '阿里');
INSERT INTO `g_base_region` VALUES ('346', '28', '昌都');
INSERT INTO `g_base_region` VALUES ('347', '28', '林芝');
INSERT INTO `g_base_region` VALUES ('348', '28', '那曲');
INSERT INTO `g_base_region` VALUES ('349', '28', '日喀则');
INSERT INTO `g_base_region` VALUES ('350', '28', '山南');
INSERT INTO `g_base_region` VALUES ('351', '29', '乌鲁木齐');
INSERT INTO `g_base_region` VALUES ('352', '29', '阿克苏');
INSERT INTO `g_base_region` VALUES ('353', '29', '阿拉尔');
INSERT INTO `g_base_region` VALUES ('354', '29', '巴音郭楞');
INSERT INTO `g_base_region` VALUES ('355', '29', '博尔塔拉');
INSERT INTO `g_base_region` VALUES ('356', '29', '昌吉');
INSERT INTO `g_base_region` VALUES ('357', '29', '哈密');
INSERT INTO `g_base_region` VALUES ('358', '29', '和田');
INSERT INTO `g_base_region` VALUES ('359', '29', '喀什');
INSERT INTO `g_base_region` VALUES ('360', '29', '克拉玛依');
INSERT INTO `g_base_region` VALUES ('361', '29', '克孜勒苏');
INSERT INTO `g_base_region` VALUES ('362', '29', '石河子');
INSERT INTO `g_base_region` VALUES ('363', '29', '图木舒克');
INSERT INTO `g_base_region` VALUES ('364', '29', '吐鲁番');
INSERT INTO `g_base_region` VALUES ('365', '29', '五家渠');
INSERT INTO `g_base_region` VALUES ('366', '29', '伊犁');
INSERT INTO `g_base_region` VALUES ('367', '30', '昆明');
INSERT INTO `g_base_region` VALUES ('368', '30', '怒江');
INSERT INTO `g_base_region` VALUES ('369', '30', '普洱');
INSERT INTO `g_base_region` VALUES ('370', '30', '丽江');
INSERT INTO `g_base_region` VALUES ('371', '30', '保山');
INSERT INTO `g_base_region` VALUES ('372', '30', '楚雄');
INSERT INTO `g_base_region` VALUES ('373', '30', '大理');
INSERT INTO `g_base_region` VALUES ('374', '30', '德宏');
INSERT INTO `g_base_region` VALUES ('375', '30', '迪庆');
INSERT INTO `g_base_region` VALUES ('376', '30', '红河');
INSERT INTO `g_base_region` VALUES ('377', '30', '临沧');
INSERT INTO `g_base_region` VALUES ('378', '30', '曲靖');
INSERT INTO `g_base_region` VALUES ('379', '30', '文山');
INSERT INTO `g_base_region` VALUES ('380', '30', '西双版纳');
INSERT INTO `g_base_region` VALUES ('381', '30', '玉溪');
INSERT INTO `g_base_region` VALUES ('382', '30', '昭通');
INSERT INTO `g_base_region` VALUES ('383', '31', '杭州');
INSERT INTO `g_base_region` VALUES ('384', '31', '湖州');
INSERT INTO `g_base_region` VALUES ('385', '31', '嘉兴');
INSERT INTO `g_base_region` VALUES ('386', '31', '金华');
INSERT INTO `g_base_region` VALUES ('387', '31', '丽水');
INSERT INTO `g_base_region` VALUES ('388', '31', '宁波');
INSERT INTO `g_base_region` VALUES ('389', '31', '绍兴');
INSERT INTO `g_base_region` VALUES ('390', '31', '台州');
INSERT INTO `g_base_region` VALUES ('391', '31', '温州');
INSERT INTO `g_base_region` VALUES ('392', '31', '舟山');
INSERT INTO `g_base_region` VALUES ('393', '31', '衢州');
INSERT INTO `g_base_region` VALUES ('394', '32', '重庆');
INSERT INTO `g_base_region` VALUES ('395', '33', '香港');
INSERT INTO `g_base_region` VALUES ('396', '34', '澳门');
INSERT INTO `g_base_region` VALUES ('397', '35', '台湾');
INSERT INTO `g_base_region` VALUES ('398', '36', '迎江区');
INSERT INTO `g_base_region` VALUES ('399', '36', '大观区');
INSERT INTO `g_base_region` VALUES ('400', '36', '宜秀区');
INSERT INTO `g_base_region` VALUES ('401', '36', '桐城市');
INSERT INTO `g_base_region` VALUES ('402', '36', '怀宁县');
INSERT INTO `g_base_region` VALUES ('403', '36', '枞阳县');
INSERT INTO `g_base_region` VALUES ('404', '36', '潜山县');
INSERT INTO `g_base_region` VALUES ('405', '36', '太湖县');
INSERT INTO `g_base_region` VALUES ('406', '36', '宿松县');
INSERT INTO `g_base_region` VALUES ('407', '36', '望江县');
INSERT INTO `g_base_region` VALUES ('408', '36', '岳西县');
INSERT INTO `g_base_region` VALUES ('409', '37', '中市区');
INSERT INTO `g_base_region` VALUES ('410', '37', '东市区');
INSERT INTO `g_base_region` VALUES ('411', '37', '西市区');
INSERT INTO `g_base_region` VALUES ('412', '37', '郊区');
INSERT INTO `g_base_region` VALUES ('413', '37', '怀远县');
INSERT INTO `g_base_region` VALUES ('414', '37', '五河县');
INSERT INTO `g_base_region` VALUES ('415', '37', '固镇县');
INSERT INTO `g_base_region` VALUES ('416', '38', '居巢区');
INSERT INTO `g_base_region` VALUES ('417', '38', '庐江县');
INSERT INTO `g_base_region` VALUES ('418', '38', '无为县');
INSERT INTO `g_base_region` VALUES ('419', '38', '含山县');
INSERT INTO `g_base_region` VALUES ('420', '38', '和县');
INSERT INTO `g_base_region` VALUES ('421', '39', '贵池区');
INSERT INTO `g_base_region` VALUES ('422', '39', '东至县');
INSERT INTO `g_base_region` VALUES ('423', '39', '石台县');
INSERT INTO `g_base_region` VALUES ('424', '39', '青阳县');
INSERT INTO `g_base_region` VALUES ('425', '40', '琅琊区');
INSERT INTO `g_base_region` VALUES ('426', '40', '南谯区');
INSERT INTO `g_base_region` VALUES ('427', '40', '天长市');
INSERT INTO `g_base_region` VALUES ('428', '40', '明光市');
INSERT INTO `g_base_region` VALUES ('429', '40', '来安县');
INSERT INTO `g_base_region` VALUES ('430', '40', '全椒县');
INSERT INTO `g_base_region` VALUES ('431', '40', '定远县');
INSERT INTO `g_base_region` VALUES ('432', '40', '凤阳县');
INSERT INTO `g_base_region` VALUES ('433', '41', '蚌山区');
INSERT INTO `g_base_region` VALUES ('434', '41', '龙子湖区');
INSERT INTO `g_base_region` VALUES ('435', '41', '禹会区');
INSERT INTO `g_base_region` VALUES ('436', '41', '淮上区');
INSERT INTO `g_base_region` VALUES ('437', '41', '颍州区');
INSERT INTO `g_base_region` VALUES ('438', '41', '颍东区');
INSERT INTO `g_base_region` VALUES ('439', '41', '颍泉区');
INSERT INTO `g_base_region` VALUES ('440', '41', '界首市');
INSERT INTO `g_base_region` VALUES ('441', '41', '临泉县');
INSERT INTO `g_base_region` VALUES ('442', '41', '太和县');
INSERT INTO `g_base_region` VALUES ('443', '41', '阜南县');
INSERT INTO `g_base_region` VALUES ('444', '41', '颖上县');
INSERT INTO `g_base_region` VALUES ('445', '42', '相山区');
INSERT INTO `g_base_region` VALUES ('446', '42', '杜集区');
INSERT INTO `g_base_region` VALUES ('447', '42', '烈山区');
INSERT INTO `g_base_region` VALUES ('448', '42', '濉溪县');
INSERT INTO `g_base_region` VALUES ('449', '43', '田家庵区');
INSERT INTO `g_base_region` VALUES ('450', '43', '大通区');
INSERT INTO `g_base_region` VALUES ('451', '43', '谢家集区');
INSERT INTO `g_base_region` VALUES ('452', '43', '八公山区');
INSERT INTO `g_base_region` VALUES ('453', '43', '潘集区');
INSERT INTO `g_base_region` VALUES ('454', '43', '凤台县');
INSERT INTO `g_base_region` VALUES ('455', '44', '屯溪区');
INSERT INTO `g_base_region` VALUES ('456', '44', '黄山区');
INSERT INTO `g_base_region` VALUES ('457', '44', '徽州区');
INSERT INTO `g_base_region` VALUES ('458', '44', '歙县');
INSERT INTO `g_base_region` VALUES ('459', '44', '休宁县');
INSERT INTO `g_base_region` VALUES ('460', '44', '黟县');
INSERT INTO `g_base_region` VALUES ('461', '44', '祁门县');
INSERT INTO `g_base_region` VALUES ('462', '45', '金安区');
INSERT INTO `g_base_region` VALUES ('463', '45', '裕安区');
INSERT INTO `g_base_region` VALUES ('464', '45', '寿县');
INSERT INTO `g_base_region` VALUES ('465', '45', '霍邱县');
INSERT INTO `g_base_region` VALUES ('466', '45', '舒城县');
INSERT INTO `g_base_region` VALUES ('467', '45', '金寨县');
INSERT INTO `g_base_region` VALUES ('468', '45', '霍山县');
INSERT INTO `g_base_region` VALUES ('469', '46', '雨山区');
INSERT INTO `g_base_region` VALUES ('470', '46', '花山区');
INSERT INTO `g_base_region` VALUES ('471', '46', '金家庄区');
INSERT INTO `g_base_region` VALUES ('472', '46', '当涂县');
INSERT INTO `g_base_region` VALUES ('473', '47', '埇桥区');
INSERT INTO `g_base_region` VALUES ('474', '47', '砀山县');
INSERT INTO `g_base_region` VALUES ('475', '47', '萧县');
INSERT INTO `g_base_region` VALUES ('476', '47', '灵璧县');
INSERT INTO `g_base_region` VALUES ('477', '47', '泗县');
INSERT INTO `g_base_region` VALUES ('478', '48', '铜官山区');
INSERT INTO `g_base_region` VALUES ('479', '48', '狮子山区');
INSERT INTO `g_base_region` VALUES ('480', '48', '郊区');
INSERT INTO `g_base_region` VALUES ('481', '48', '铜陵县');
INSERT INTO `g_base_region` VALUES ('482', '49', '镜湖区');
INSERT INTO `g_base_region` VALUES ('483', '49', '弋江区');
INSERT INTO `g_base_region` VALUES ('484', '49', '鸠江区');
INSERT INTO `g_base_region` VALUES ('485', '49', '三山区');
INSERT INTO `g_base_region` VALUES ('486', '49', '芜湖县');
INSERT INTO `g_base_region` VALUES ('487', '49', '繁昌县');
INSERT INTO `g_base_region` VALUES ('488', '49', '南陵县');
INSERT INTO `g_base_region` VALUES ('489', '50', '宣州区');
INSERT INTO `g_base_region` VALUES ('490', '50', '宁国市');
INSERT INTO `g_base_region` VALUES ('491', '50', '郎溪县');
INSERT INTO `g_base_region` VALUES ('492', '50', '广德县');
INSERT INTO `g_base_region` VALUES ('493', '50', '泾县');
INSERT INTO `g_base_region` VALUES ('494', '50', '绩溪县');
INSERT INTO `g_base_region` VALUES ('495', '50', '旌德县');
INSERT INTO `g_base_region` VALUES ('496', '51', '涡阳县');
INSERT INTO `g_base_region` VALUES ('497', '51', '蒙城县');
INSERT INTO `g_base_region` VALUES ('498', '51', '利辛县');
INSERT INTO `g_base_region` VALUES ('499', '51', '谯城区');
INSERT INTO `g_base_region` VALUES ('500', '52', '东城区');
INSERT INTO `g_base_region` VALUES ('501', '52', '西城区');
INSERT INTO `g_base_region` VALUES ('502', '52', '海淀区');
INSERT INTO `g_base_region` VALUES ('503', '52', '朝阳区');
INSERT INTO `g_base_region` VALUES ('504', '52', '崇文区');
INSERT INTO `g_base_region` VALUES ('505', '52', '宣武区');
INSERT INTO `g_base_region` VALUES ('506', '52', '丰台区');
INSERT INTO `g_base_region` VALUES ('507', '52', '石景山区');
INSERT INTO `g_base_region` VALUES ('508', '52', '房山区');
INSERT INTO `g_base_region` VALUES ('509', '52', '门头沟区');
INSERT INTO `g_base_region` VALUES ('510', '52', '通州区');
INSERT INTO `g_base_region` VALUES ('511', '52', '顺义区');
INSERT INTO `g_base_region` VALUES ('512', '52', '昌平区');
INSERT INTO `g_base_region` VALUES ('513', '52', '怀柔区');
INSERT INTO `g_base_region` VALUES ('514', '52', '平谷区');
INSERT INTO `g_base_region` VALUES ('515', '52', '大兴区');
INSERT INTO `g_base_region` VALUES ('516', '52', '密云县');
INSERT INTO `g_base_region` VALUES ('517', '52', '延庆县');
INSERT INTO `g_base_region` VALUES ('518', '53', '鼓楼区');
INSERT INTO `g_base_region` VALUES ('519', '53', '台江区');
INSERT INTO `g_base_region` VALUES ('520', '53', '仓山区');
INSERT INTO `g_base_region` VALUES ('521', '53', '马尾区');
INSERT INTO `g_base_region` VALUES ('522', '53', '晋安区');
INSERT INTO `g_base_region` VALUES ('523', '53', '福清市');
INSERT INTO `g_base_region` VALUES ('524', '53', '长乐市');
INSERT INTO `g_base_region` VALUES ('525', '53', '闽侯县');
INSERT INTO `g_base_region` VALUES ('526', '53', '连江县');
INSERT INTO `g_base_region` VALUES ('527', '53', '罗源县');
INSERT INTO `g_base_region` VALUES ('528', '53', '闽清县');
INSERT INTO `g_base_region` VALUES ('529', '53', '永泰县');
INSERT INTO `g_base_region` VALUES ('530', '53', '平潭县');
INSERT INTO `g_base_region` VALUES ('531', '54', '新罗区');
INSERT INTO `g_base_region` VALUES ('532', '54', '漳平市');
INSERT INTO `g_base_region` VALUES ('533', '54', '长汀县');
INSERT INTO `g_base_region` VALUES ('534', '54', '永定县');
INSERT INTO `g_base_region` VALUES ('535', '54', '上杭县');
INSERT INTO `g_base_region` VALUES ('536', '54', '武平县');
INSERT INTO `g_base_region` VALUES ('537', '54', '连城县');
INSERT INTO `g_base_region` VALUES ('538', '55', '延平区');
INSERT INTO `g_base_region` VALUES ('539', '55', '邵武市');
INSERT INTO `g_base_region` VALUES ('540', '55', '武夷山市');
INSERT INTO `g_base_region` VALUES ('541', '55', '建瓯市');
INSERT INTO `g_base_region` VALUES ('542', '55', '建阳市');
INSERT INTO `g_base_region` VALUES ('543', '55', '顺昌县');
INSERT INTO `g_base_region` VALUES ('544', '55', '浦城县');
INSERT INTO `g_base_region` VALUES ('545', '55', '光泽县');
INSERT INTO `g_base_region` VALUES ('546', '55', '松溪县');
INSERT INTO `g_base_region` VALUES ('547', '55', '政和县');
INSERT INTO `g_base_region` VALUES ('548', '56', '蕉城区');
INSERT INTO `g_base_region` VALUES ('549', '56', '福安市');
INSERT INTO `g_base_region` VALUES ('550', '56', '福鼎市');
INSERT INTO `g_base_region` VALUES ('551', '56', '霞浦县');
INSERT INTO `g_base_region` VALUES ('552', '56', '古田县');
INSERT INTO `g_base_region` VALUES ('553', '56', '屏南县');
INSERT INTO `g_base_region` VALUES ('554', '56', '寿宁县');
INSERT INTO `g_base_region` VALUES ('555', '56', '周宁县');
INSERT INTO `g_base_region` VALUES ('556', '56', '柘荣县');
INSERT INTO `g_base_region` VALUES ('557', '57', '城厢区');
INSERT INTO `g_base_region` VALUES ('558', '57', '涵江区');
INSERT INTO `g_base_region` VALUES ('559', '57', '荔城区');
INSERT INTO `g_base_region` VALUES ('560', '57', '秀屿区');
INSERT INTO `g_base_region` VALUES ('561', '57', '仙游县');
INSERT INTO `g_base_region` VALUES ('562', '58', '鲤城区');
INSERT INTO `g_base_region` VALUES ('563', '58', '丰泽区');
INSERT INTO `g_base_region` VALUES ('564', '58', '洛江区');
INSERT INTO `g_base_region` VALUES ('565', '58', '清濛开发区');
INSERT INTO `g_base_region` VALUES ('566', '58', '泉港区');
INSERT INTO `g_base_region` VALUES ('567', '58', '石狮市');
INSERT INTO `g_base_region` VALUES ('568', '58', '晋江市');
INSERT INTO `g_base_region` VALUES ('569', '58', '南安市');
INSERT INTO `g_base_region` VALUES ('570', '58', '惠安县');
INSERT INTO `g_base_region` VALUES ('571', '58', '安溪县');
INSERT INTO `g_base_region` VALUES ('572', '58', '永春县');
INSERT INTO `g_base_region` VALUES ('573', '58', '德化县');
INSERT INTO `g_base_region` VALUES ('574', '58', '金门县');
INSERT INTO `g_base_region` VALUES ('575', '59', '梅列区');
INSERT INTO `g_base_region` VALUES ('576', '59', '三元区');
INSERT INTO `g_base_region` VALUES ('577', '59', '永安市');
INSERT INTO `g_base_region` VALUES ('578', '59', '明溪县');
INSERT INTO `g_base_region` VALUES ('579', '59', '清流县');
INSERT INTO `g_base_region` VALUES ('580', '59', '宁化县');
INSERT INTO `g_base_region` VALUES ('581', '59', '大田县');
INSERT INTO `g_base_region` VALUES ('582', '59', '尤溪县');
INSERT INTO `g_base_region` VALUES ('583', '59', '沙县');
INSERT INTO `g_base_region` VALUES ('584', '59', '将乐县');
INSERT INTO `g_base_region` VALUES ('585', '59', '泰宁县');
INSERT INTO `g_base_region` VALUES ('586', '59', '建宁县');
INSERT INTO `g_base_region` VALUES ('587', '60', '思明区');
INSERT INTO `g_base_region` VALUES ('588', '60', '海沧区');
INSERT INTO `g_base_region` VALUES ('589', '60', '湖里区');
INSERT INTO `g_base_region` VALUES ('590', '60', '集美区');
INSERT INTO `g_base_region` VALUES ('591', '60', '同安区');
INSERT INTO `g_base_region` VALUES ('592', '60', '翔安区');
INSERT INTO `g_base_region` VALUES ('593', '61', '芗城区');
INSERT INTO `g_base_region` VALUES ('594', '61', '龙文区');
INSERT INTO `g_base_region` VALUES ('595', '61', '龙海市');
INSERT INTO `g_base_region` VALUES ('596', '61', '云霄县');
INSERT INTO `g_base_region` VALUES ('597', '61', '漳浦县');
INSERT INTO `g_base_region` VALUES ('598', '61', '诏安县');
INSERT INTO `g_base_region` VALUES ('599', '61', '长泰县');
INSERT INTO `g_base_region` VALUES ('600', '61', '东山县');
INSERT INTO `g_base_region` VALUES ('601', '61', '南靖县');
INSERT INTO `g_base_region` VALUES ('602', '61', '平和县');
INSERT INTO `g_base_region` VALUES ('603', '61', '华安县');
INSERT INTO `g_base_region` VALUES ('604', '62', '皋兰县');
INSERT INTO `g_base_region` VALUES ('605', '62', '城关区');
INSERT INTO `g_base_region` VALUES ('606', '62', '七里河区');
INSERT INTO `g_base_region` VALUES ('607', '62', '西固区');
INSERT INTO `g_base_region` VALUES ('608', '62', '安宁区');
INSERT INTO `g_base_region` VALUES ('609', '62', '红古区');
INSERT INTO `g_base_region` VALUES ('610', '62', '永登县');
INSERT INTO `g_base_region` VALUES ('611', '62', '榆中县');
INSERT INTO `g_base_region` VALUES ('612', '63', '白银区');
INSERT INTO `g_base_region` VALUES ('613', '63', '平川区');
INSERT INTO `g_base_region` VALUES ('614', '63', '会宁县');
INSERT INTO `g_base_region` VALUES ('615', '63', '景泰县');
INSERT INTO `g_base_region` VALUES ('616', '63', '靖远县');
INSERT INTO `g_base_region` VALUES ('617', '64', '临洮县');
INSERT INTO `g_base_region` VALUES ('618', '64', '陇西县');
INSERT INTO `g_base_region` VALUES ('619', '64', '通渭县');
INSERT INTO `g_base_region` VALUES ('620', '64', '渭源县');
INSERT INTO `g_base_region` VALUES ('621', '64', '漳县');
INSERT INTO `g_base_region` VALUES ('622', '64', '岷县');
INSERT INTO `g_base_region` VALUES ('623', '64', '安定区');
INSERT INTO `g_base_region` VALUES ('624', '64', '安定区');
INSERT INTO `g_base_region` VALUES ('625', '65', '合作市');
INSERT INTO `g_base_region` VALUES ('626', '65', '临潭县');
INSERT INTO `g_base_region` VALUES ('627', '65', '卓尼县');
INSERT INTO `g_base_region` VALUES ('628', '65', '舟曲县');
INSERT INTO `g_base_region` VALUES ('629', '65', '迭部县');
INSERT INTO `g_base_region` VALUES ('630', '65', '玛曲县');
INSERT INTO `g_base_region` VALUES ('631', '65', '碌曲县');
INSERT INTO `g_base_region` VALUES ('632', '65', '夏河县');
INSERT INTO `g_base_region` VALUES ('633', '66', '嘉峪关市');
INSERT INTO `g_base_region` VALUES ('634', '67', '金川区');
INSERT INTO `g_base_region` VALUES ('635', '67', '永昌县');
INSERT INTO `g_base_region` VALUES ('636', '68', '肃州区');
INSERT INTO `g_base_region` VALUES ('637', '68', '玉门市');
INSERT INTO `g_base_region` VALUES ('638', '68', '敦煌市');
INSERT INTO `g_base_region` VALUES ('639', '68', '金塔县');
INSERT INTO `g_base_region` VALUES ('640', '68', '瓜州县');
INSERT INTO `g_base_region` VALUES ('641', '68', '肃北');
INSERT INTO `g_base_region` VALUES ('642', '68', '阿克塞');
INSERT INTO `g_base_region` VALUES ('643', '69', '临夏市');
INSERT INTO `g_base_region` VALUES ('644', '69', '临夏县');
INSERT INTO `g_base_region` VALUES ('645', '69', '康乐县');
INSERT INTO `g_base_region` VALUES ('646', '69', '永靖县');
INSERT INTO `g_base_region` VALUES ('647', '69', '广河县');
INSERT INTO `g_base_region` VALUES ('648', '69', '和政县');
INSERT INTO `g_base_region` VALUES ('649', '69', '东乡族自治县');
INSERT INTO `g_base_region` VALUES ('650', '69', '积石山');
INSERT INTO `g_base_region` VALUES ('651', '70', '成县');
INSERT INTO `g_base_region` VALUES ('652', '70', '徽县');
INSERT INTO `g_base_region` VALUES ('653', '70', '康县');
INSERT INTO `g_base_region` VALUES ('654', '70', '礼县');
INSERT INTO `g_base_region` VALUES ('655', '70', '两当县');
INSERT INTO `g_base_region` VALUES ('656', '70', '文县');
INSERT INTO `g_base_region` VALUES ('657', '70', '西和县');
INSERT INTO `g_base_region` VALUES ('658', '70', '宕昌县');
INSERT INTO `g_base_region` VALUES ('659', '70', '武都区');
INSERT INTO `g_base_region` VALUES ('660', '71', '崇信县');
INSERT INTO `g_base_region` VALUES ('661', '71', '华亭县');
INSERT INTO `g_base_region` VALUES ('662', '71', '静宁县');
INSERT INTO `g_base_region` VALUES ('663', '71', '灵台县');
INSERT INTO `g_base_region` VALUES ('664', '71', '崆峒区');
INSERT INTO `g_base_region` VALUES ('665', '71', '庄浪县');
INSERT INTO `g_base_region` VALUES ('666', '71', '泾川县');
INSERT INTO `g_base_region` VALUES ('667', '72', '合水县');
INSERT INTO `g_base_region` VALUES ('668', '72', '华池县');
INSERT INTO `g_base_region` VALUES ('669', '72', '环县');
INSERT INTO `g_base_region` VALUES ('670', '72', '宁县');
INSERT INTO `g_base_region` VALUES ('671', '72', '庆城县');
INSERT INTO `g_base_region` VALUES ('672', '72', '西峰区');
INSERT INTO `g_base_region` VALUES ('673', '72', '镇原县');
INSERT INTO `g_base_region` VALUES ('674', '72', '正宁县');
INSERT INTO `g_base_region` VALUES ('675', '73', '甘谷县');
INSERT INTO `g_base_region` VALUES ('676', '73', '秦安县');
INSERT INTO `g_base_region` VALUES ('677', '73', '清水县');
INSERT INTO `g_base_region` VALUES ('678', '73', '秦州区');
INSERT INTO `g_base_region` VALUES ('679', '73', '麦积区');
INSERT INTO `g_base_region` VALUES ('680', '73', '武山县');
INSERT INTO `g_base_region` VALUES ('681', '73', '张家川');
INSERT INTO `g_base_region` VALUES ('682', '74', '古浪县');
INSERT INTO `g_base_region` VALUES ('683', '74', '民勤县');
INSERT INTO `g_base_region` VALUES ('684', '74', '天祝');
INSERT INTO `g_base_region` VALUES ('685', '74', '凉州区');
INSERT INTO `g_base_region` VALUES ('686', '75', '高台县');
INSERT INTO `g_base_region` VALUES ('687', '75', '临泽县');
INSERT INTO `g_base_region` VALUES ('688', '75', '民乐县');
INSERT INTO `g_base_region` VALUES ('689', '75', '山丹县');
INSERT INTO `g_base_region` VALUES ('690', '75', '肃南');
INSERT INTO `g_base_region` VALUES ('691', '75', '甘州区');
INSERT INTO `g_base_region` VALUES ('692', '76', '从化市');
INSERT INTO `g_base_region` VALUES ('693', '76', '天河区');
INSERT INTO `g_base_region` VALUES ('694', '76', '东山区');
INSERT INTO `g_base_region` VALUES ('695', '76', '白云区');
INSERT INTO `g_base_region` VALUES ('696', '76', '海珠区');
INSERT INTO `g_base_region` VALUES ('697', '76', '荔湾区');
INSERT INTO `g_base_region` VALUES ('698', '76', '越秀区');
INSERT INTO `g_base_region` VALUES ('699', '76', '黄埔区');
INSERT INTO `g_base_region` VALUES ('700', '76', '番禺区');
INSERT INTO `g_base_region` VALUES ('701', '76', '花都区');
INSERT INTO `g_base_region` VALUES ('702', '76', '增城区');
INSERT INTO `g_base_region` VALUES ('703', '76', '从化区');
INSERT INTO `g_base_region` VALUES ('704', '76', '市郊');
INSERT INTO `g_base_region` VALUES ('705', '77', '福田区');
INSERT INTO `g_base_region` VALUES ('706', '77', '罗湖区');
INSERT INTO `g_base_region` VALUES ('707', '77', '南山区');
INSERT INTO `g_base_region` VALUES ('708', '77', '宝安区');
INSERT INTO `g_base_region` VALUES ('709', '77', '龙岗区');
INSERT INTO `g_base_region` VALUES ('710', '77', '盐田区');
INSERT INTO `g_base_region` VALUES ('711', '78', '湘桥区');
INSERT INTO `g_base_region` VALUES ('712', '78', '潮安县');
INSERT INTO `g_base_region` VALUES ('713', '78', '饶平县');
INSERT INTO `g_base_region` VALUES ('714', '79', '南城区');
INSERT INTO `g_base_region` VALUES ('715', '79', '东城区');
INSERT INTO `g_base_region` VALUES ('716', '79', '万江区');
INSERT INTO `g_base_region` VALUES ('717', '79', '莞城区');
INSERT INTO `g_base_region` VALUES ('718', '79', '石龙镇');
INSERT INTO `g_base_region` VALUES ('719', '79', '虎门镇');
INSERT INTO `g_base_region` VALUES ('720', '79', '麻涌镇');
INSERT INTO `g_base_region` VALUES ('721', '79', '道滘镇');
INSERT INTO `g_base_region` VALUES ('722', '79', '石碣镇');
INSERT INTO `g_base_region` VALUES ('723', '79', '沙田镇');
INSERT INTO `g_base_region` VALUES ('724', '79', '望牛墩镇');
INSERT INTO `g_base_region` VALUES ('725', '79', '洪梅镇');
INSERT INTO `g_base_region` VALUES ('726', '79', '茶山镇');
INSERT INTO `g_base_region` VALUES ('727', '79', '寮步镇');
INSERT INTO `g_base_region` VALUES ('728', '79', '大岭山镇');
INSERT INTO `g_base_region` VALUES ('729', '79', '大朗镇');
INSERT INTO `g_base_region` VALUES ('730', '79', '黄江镇');
INSERT INTO `g_base_region` VALUES ('731', '79', '樟木头');
INSERT INTO `g_base_region` VALUES ('732', '79', '凤岗镇');
INSERT INTO `g_base_region` VALUES ('733', '79', '塘厦镇');
INSERT INTO `g_base_region` VALUES ('734', '79', '谢岗镇');
INSERT INTO `g_base_region` VALUES ('735', '79', '厚街镇');
INSERT INTO `g_base_region` VALUES ('736', '79', '清溪镇');
INSERT INTO `g_base_region` VALUES ('737', '79', '常平镇');
INSERT INTO `g_base_region` VALUES ('738', '79', '桥头镇');
INSERT INTO `g_base_region` VALUES ('739', '79', '横沥镇');
INSERT INTO `g_base_region` VALUES ('740', '79', '东坑镇');
INSERT INTO `g_base_region` VALUES ('741', '79', '企石镇');
INSERT INTO `g_base_region` VALUES ('742', '79', '石排镇');
INSERT INTO `g_base_region` VALUES ('743', '79', '长安镇');
INSERT INTO `g_base_region` VALUES ('744', '79', '中堂镇');
INSERT INTO `g_base_region` VALUES ('745', '79', '高埗镇');
INSERT INTO `g_base_region` VALUES ('746', '80', '禅城区');
INSERT INTO `g_base_region` VALUES ('747', '80', '南海区');
INSERT INTO `g_base_region` VALUES ('748', '80', '顺德区');
INSERT INTO `g_base_region` VALUES ('749', '80', '三水区');
INSERT INTO `g_base_region` VALUES ('750', '80', '高明区');
INSERT INTO `g_base_region` VALUES ('751', '81', '东源县');
INSERT INTO `g_base_region` VALUES ('752', '81', '和平县');
INSERT INTO `g_base_region` VALUES ('753', '81', '源城区');
INSERT INTO `g_base_region` VALUES ('754', '81', '连平县');
INSERT INTO `g_base_region` VALUES ('755', '81', '龙川县');
INSERT INTO `g_base_region` VALUES ('756', '81', '紫金县');
INSERT INTO `g_base_region` VALUES ('757', '82', '惠阳区');
INSERT INTO `g_base_region` VALUES ('758', '82', '惠城区');
INSERT INTO `g_base_region` VALUES ('759', '82', '大亚湾');
INSERT INTO `g_base_region` VALUES ('760', '82', '博罗县');
INSERT INTO `g_base_region` VALUES ('761', '82', '惠东县');
INSERT INTO `g_base_region` VALUES ('762', '82', '龙门县');
INSERT INTO `g_base_region` VALUES ('763', '83', '江海区');
INSERT INTO `g_base_region` VALUES ('764', '83', '蓬江区');
INSERT INTO `g_base_region` VALUES ('765', '83', '新会区');
INSERT INTO `g_base_region` VALUES ('766', '83', '台山市');
INSERT INTO `g_base_region` VALUES ('767', '83', '开平市');
INSERT INTO `g_base_region` VALUES ('768', '83', '鹤山市');
INSERT INTO `g_base_region` VALUES ('769', '83', '恩平市');
INSERT INTO `g_base_region` VALUES ('770', '84', '榕城区');
INSERT INTO `g_base_region` VALUES ('771', '84', '普宁市');
INSERT INTO `g_base_region` VALUES ('772', '84', '揭东县');
INSERT INTO `g_base_region` VALUES ('773', '84', '揭西县');
INSERT INTO `g_base_region` VALUES ('774', '84', '惠来县');
INSERT INTO `g_base_region` VALUES ('775', '85', '茂南区');
INSERT INTO `g_base_region` VALUES ('776', '85', '茂港区');
INSERT INTO `g_base_region` VALUES ('777', '85', '高州市');
INSERT INTO `g_base_region` VALUES ('778', '85', '化州市');
INSERT INTO `g_base_region` VALUES ('779', '85', '信宜市');
INSERT INTO `g_base_region` VALUES ('780', '85', '电白县');
INSERT INTO `g_base_region` VALUES ('781', '86', '梅县');
INSERT INTO `g_base_region` VALUES ('782', '86', '梅江区');
INSERT INTO `g_base_region` VALUES ('783', '86', '兴宁市');
INSERT INTO `g_base_region` VALUES ('784', '86', '大埔县');
INSERT INTO `g_base_region` VALUES ('785', '86', '丰顺县');
INSERT INTO `g_base_region` VALUES ('786', '86', '五华县');
INSERT INTO `g_base_region` VALUES ('787', '86', '平远县');
INSERT INTO `g_base_region` VALUES ('788', '86', '蕉岭县');
INSERT INTO `g_base_region` VALUES ('789', '87', '清城区');
INSERT INTO `g_base_region` VALUES ('790', '87', '英德市');
INSERT INTO `g_base_region` VALUES ('791', '87', '连州市');
INSERT INTO `g_base_region` VALUES ('792', '87', '佛冈县');
INSERT INTO `g_base_region` VALUES ('793', '87', '阳山县');
INSERT INTO `g_base_region` VALUES ('794', '87', '清新县');
INSERT INTO `g_base_region` VALUES ('795', '87', '连山');
INSERT INTO `g_base_region` VALUES ('796', '87', '连南');
INSERT INTO `g_base_region` VALUES ('797', '88', '南澳县');
INSERT INTO `g_base_region` VALUES ('798', '88', '潮阳区');
INSERT INTO `g_base_region` VALUES ('799', '88', '澄海区');
INSERT INTO `g_base_region` VALUES ('800', '88', '龙湖区');
INSERT INTO `g_base_region` VALUES ('801', '88', '金平区');
INSERT INTO `g_base_region` VALUES ('802', '88', '濠江区');
INSERT INTO `g_base_region` VALUES ('803', '88', '潮南区');
INSERT INTO `g_base_region` VALUES ('804', '89', '城区');
INSERT INTO `g_base_region` VALUES ('805', '89', '陆丰市');
INSERT INTO `g_base_region` VALUES ('806', '89', '海丰县');
INSERT INTO `g_base_region` VALUES ('807', '89', '陆河县');
INSERT INTO `g_base_region` VALUES ('808', '90', '曲江县');
INSERT INTO `g_base_region` VALUES ('809', '90', '浈江区');
INSERT INTO `g_base_region` VALUES ('810', '90', '武江区');
INSERT INTO `g_base_region` VALUES ('811', '90', '曲江区');
INSERT INTO `g_base_region` VALUES ('812', '90', '乐昌市');
INSERT INTO `g_base_region` VALUES ('813', '90', '南雄市');
INSERT INTO `g_base_region` VALUES ('814', '90', '始兴县');
INSERT INTO `g_base_region` VALUES ('815', '90', '仁化县');
INSERT INTO `g_base_region` VALUES ('816', '90', '翁源县');
INSERT INTO `g_base_region` VALUES ('817', '90', '新丰县');
INSERT INTO `g_base_region` VALUES ('818', '90', '乳源');
INSERT INTO `g_base_region` VALUES ('819', '91', '江城区');
INSERT INTO `g_base_region` VALUES ('820', '91', '阳春市');
INSERT INTO `g_base_region` VALUES ('821', '91', '阳西县');
INSERT INTO `g_base_region` VALUES ('822', '91', '阳东县');
INSERT INTO `g_base_region` VALUES ('823', '92', '云城区');
INSERT INTO `g_base_region` VALUES ('824', '92', '罗定市');
INSERT INTO `g_base_region` VALUES ('825', '92', '新兴县');
INSERT INTO `g_base_region` VALUES ('826', '92', '郁南县');
INSERT INTO `g_base_region` VALUES ('827', '92', '云安县');
INSERT INTO `g_base_region` VALUES ('828', '93', '赤坎区');
INSERT INTO `g_base_region` VALUES ('829', '93', '霞山区');
INSERT INTO `g_base_region` VALUES ('830', '93', '坡头区');
INSERT INTO `g_base_region` VALUES ('831', '93', '麻章区');
INSERT INTO `g_base_region` VALUES ('832', '93', '廉江市');
INSERT INTO `g_base_region` VALUES ('833', '93', '雷州市');
INSERT INTO `g_base_region` VALUES ('834', '93', '吴川市');
INSERT INTO `g_base_region` VALUES ('835', '93', '遂溪县');
INSERT INTO `g_base_region` VALUES ('836', '93', '徐闻县');
INSERT INTO `g_base_region` VALUES ('837', '94', '肇庆市');
INSERT INTO `g_base_region` VALUES ('838', '94', '高要市');
INSERT INTO `g_base_region` VALUES ('839', '94', '四会市');
INSERT INTO `g_base_region` VALUES ('840', '94', '广宁县');
INSERT INTO `g_base_region` VALUES ('841', '94', '怀集县');
INSERT INTO `g_base_region` VALUES ('842', '94', '封开县');
INSERT INTO `g_base_region` VALUES ('843', '94', '德庆县');
INSERT INTO `g_base_region` VALUES ('844', '95', '石岐街道');
INSERT INTO `g_base_region` VALUES ('845', '95', '东区街道');
INSERT INTO `g_base_region` VALUES ('846', '95', '西区街道');
INSERT INTO `g_base_region` VALUES ('847', '95', '环城街道');
INSERT INTO `g_base_region` VALUES ('848', '95', '中山港街道');
INSERT INTO `g_base_region` VALUES ('849', '95', '五桂山街道');
INSERT INTO `g_base_region` VALUES ('850', '96', '香洲区');
INSERT INTO `g_base_region` VALUES ('851', '96', '斗门区');
INSERT INTO `g_base_region` VALUES ('852', '96', '金湾区');
INSERT INTO `g_base_region` VALUES ('853', '97', '邕宁区');
INSERT INTO `g_base_region` VALUES ('854', '97', '青秀区');
INSERT INTO `g_base_region` VALUES ('855', '97', '兴宁区');
INSERT INTO `g_base_region` VALUES ('856', '97', '良庆区');
INSERT INTO `g_base_region` VALUES ('857', '97', '西乡塘区');
INSERT INTO `g_base_region` VALUES ('858', '97', '江南区');
INSERT INTO `g_base_region` VALUES ('859', '97', '武鸣县');
INSERT INTO `g_base_region` VALUES ('860', '97', '隆安县');
INSERT INTO `g_base_region` VALUES ('861', '97', '马山县');
INSERT INTO `g_base_region` VALUES ('862', '97', '上林县');
INSERT INTO `g_base_region` VALUES ('863', '97', '宾阳县');
INSERT INTO `g_base_region` VALUES ('864', '97', '横县');
INSERT INTO `g_base_region` VALUES ('865', '98', '秀峰区');
INSERT INTO `g_base_region` VALUES ('866', '98', '叠彩区');
INSERT INTO `g_base_region` VALUES ('867', '98', '象山区');
INSERT INTO `g_base_region` VALUES ('868', '98', '七星区');
INSERT INTO `g_base_region` VALUES ('869', '98', '雁山区');
INSERT INTO `g_base_region` VALUES ('870', '98', '阳朔县');
INSERT INTO `g_base_region` VALUES ('871', '98', '临桂县');
INSERT INTO `g_base_region` VALUES ('872', '98', '灵川县');
INSERT INTO `g_base_region` VALUES ('873', '98', '全州县');
INSERT INTO `g_base_region` VALUES ('874', '98', '平乐县');
INSERT INTO `g_base_region` VALUES ('875', '98', '兴安县');
INSERT INTO `g_base_region` VALUES ('876', '98', '灌阳县');
INSERT INTO `g_base_region` VALUES ('877', '98', '荔浦县');
INSERT INTO `g_base_region` VALUES ('878', '98', '资源县');
INSERT INTO `g_base_region` VALUES ('879', '98', '永福县');
INSERT INTO `g_base_region` VALUES ('880', '98', '龙胜');
INSERT INTO `g_base_region` VALUES ('881', '98', '恭城');
INSERT INTO `g_base_region` VALUES ('882', '99', '右江区');
INSERT INTO `g_base_region` VALUES ('883', '99', '凌云县');
INSERT INTO `g_base_region` VALUES ('884', '99', '平果县');
INSERT INTO `g_base_region` VALUES ('885', '99', '西林县');
INSERT INTO `g_base_region` VALUES ('886', '99', '乐业县');
INSERT INTO `g_base_region` VALUES ('887', '99', '德保县');
INSERT INTO `g_base_region` VALUES ('888', '99', '田林县');
INSERT INTO `g_base_region` VALUES ('889', '99', '田阳县');
INSERT INTO `g_base_region` VALUES ('890', '99', '靖西县');
INSERT INTO `g_base_region` VALUES ('891', '99', '田东县');
INSERT INTO `g_base_region` VALUES ('892', '99', '那坡县');
INSERT INTO `g_base_region` VALUES ('893', '99', '隆林');
INSERT INTO `g_base_region` VALUES ('894', '100', '海城区');
INSERT INTO `g_base_region` VALUES ('895', '100', '银海区');
INSERT INTO `g_base_region` VALUES ('896', '100', '铁山港区');
INSERT INTO `g_base_region` VALUES ('897', '100', '合浦县');
INSERT INTO `g_base_region` VALUES ('898', '101', '江州区');
INSERT INTO `g_base_region` VALUES ('899', '101', '凭祥市');
INSERT INTO `g_base_region` VALUES ('900', '101', '宁明县');
INSERT INTO `g_base_region` VALUES ('901', '101', '扶绥县');
INSERT INTO `g_base_region` VALUES ('902', '101', '龙州县');
INSERT INTO `g_base_region` VALUES ('903', '101', '大新县');
INSERT INTO `g_base_region` VALUES ('904', '101', '天等县');
INSERT INTO `g_base_region` VALUES ('905', '102', '港口区');
INSERT INTO `g_base_region` VALUES ('906', '102', '防城区');
INSERT INTO `g_base_region` VALUES ('907', '102', '东兴市');
INSERT INTO `g_base_region` VALUES ('908', '102', '上思县');
INSERT INTO `g_base_region` VALUES ('909', '103', '港北区');
INSERT INTO `g_base_region` VALUES ('910', '103', '港南区');
INSERT INTO `g_base_region` VALUES ('911', '103', '覃塘区');
INSERT INTO `g_base_region` VALUES ('912', '103', '桂平市');
INSERT INTO `g_base_region` VALUES ('913', '103', '平南县');
INSERT INTO `g_base_region` VALUES ('914', '104', '金城江区');
INSERT INTO `g_base_region` VALUES ('915', '104', '宜州市');
INSERT INTO `g_base_region` VALUES ('916', '104', '天峨县');
INSERT INTO `g_base_region` VALUES ('917', '104', '凤山县');
INSERT INTO `g_base_region` VALUES ('918', '104', '南丹县');
INSERT INTO `g_base_region` VALUES ('919', '104', '东兰县');
INSERT INTO `g_base_region` VALUES ('920', '104', '都安');
INSERT INTO `g_base_region` VALUES ('921', '104', '罗城');
INSERT INTO `g_base_region` VALUES ('922', '104', '巴马');
INSERT INTO `g_base_region` VALUES ('923', '104', '环江');
INSERT INTO `g_base_region` VALUES ('924', '104', '大化');
INSERT INTO `g_base_region` VALUES ('925', '105', '八步区');
INSERT INTO `g_base_region` VALUES ('926', '105', '钟山县');
INSERT INTO `g_base_region` VALUES ('927', '105', '昭平县');
INSERT INTO `g_base_region` VALUES ('928', '105', '富川');
INSERT INTO `g_base_region` VALUES ('929', '106', '兴宾区');
INSERT INTO `g_base_region` VALUES ('930', '106', '合山市');
INSERT INTO `g_base_region` VALUES ('931', '106', '象州县');
INSERT INTO `g_base_region` VALUES ('932', '106', '武宣县');
INSERT INTO `g_base_region` VALUES ('933', '106', '忻城县');
INSERT INTO `g_base_region` VALUES ('934', '106', '金秀');
INSERT INTO `g_base_region` VALUES ('935', '107', '城中区');
INSERT INTO `g_base_region` VALUES ('936', '107', '鱼峰区');
INSERT INTO `g_base_region` VALUES ('937', '107', '柳北区');
INSERT INTO `g_base_region` VALUES ('938', '107', '柳南区');
INSERT INTO `g_base_region` VALUES ('939', '107', '柳江县');
INSERT INTO `g_base_region` VALUES ('940', '107', '柳城县');
INSERT INTO `g_base_region` VALUES ('941', '107', '鹿寨县');
INSERT INTO `g_base_region` VALUES ('942', '107', '融安县');
INSERT INTO `g_base_region` VALUES ('943', '107', '融水');
INSERT INTO `g_base_region` VALUES ('944', '107', '三江');
INSERT INTO `g_base_region` VALUES ('945', '108', '钦南区');
INSERT INTO `g_base_region` VALUES ('946', '108', '钦北区');
INSERT INTO `g_base_region` VALUES ('947', '108', '灵山县');
INSERT INTO `g_base_region` VALUES ('948', '108', '浦北县');
INSERT INTO `g_base_region` VALUES ('949', '109', '万秀区');
INSERT INTO `g_base_region` VALUES ('950', '109', '蝶山区');
INSERT INTO `g_base_region` VALUES ('951', '109', '长洲区');
INSERT INTO `g_base_region` VALUES ('952', '109', '岑溪市');
INSERT INTO `g_base_region` VALUES ('953', '109', '苍梧县');
INSERT INTO `g_base_region` VALUES ('954', '109', '藤县');
INSERT INTO `g_base_region` VALUES ('955', '109', '蒙山县');
INSERT INTO `g_base_region` VALUES ('956', '110', '玉州区');
INSERT INTO `g_base_region` VALUES ('957', '110', '北流市');
INSERT INTO `g_base_region` VALUES ('958', '110', '容县');
INSERT INTO `g_base_region` VALUES ('959', '110', '陆川县');
INSERT INTO `g_base_region` VALUES ('960', '110', '博白县');
INSERT INTO `g_base_region` VALUES ('961', '110', '兴业县');
INSERT INTO `g_base_region` VALUES ('962', '111', '南明区');
INSERT INTO `g_base_region` VALUES ('963', '111', '云岩区');
INSERT INTO `g_base_region` VALUES ('964', '111', '花溪区');
INSERT INTO `g_base_region` VALUES ('965', '111', '乌当区');
INSERT INTO `g_base_region` VALUES ('966', '111', '白云区');
INSERT INTO `g_base_region` VALUES ('967', '111', '小河区');
INSERT INTO `g_base_region` VALUES ('968', '111', '金阳新区');
INSERT INTO `g_base_region` VALUES ('969', '111', '新天园区');
INSERT INTO `g_base_region` VALUES ('970', '111', '清镇市');
INSERT INTO `g_base_region` VALUES ('971', '111', '开阳县');
INSERT INTO `g_base_region` VALUES ('972', '111', '修文县');
INSERT INTO `g_base_region` VALUES ('973', '111', '息烽县');
INSERT INTO `g_base_region` VALUES ('974', '112', '西秀区');
INSERT INTO `g_base_region` VALUES ('975', '112', '关岭');
INSERT INTO `g_base_region` VALUES ('976', '112', '镇宁');
INSERT INTO `g_base_region` VALUES ('977', '112', '紫云');
INSERT INTO `g_base_region` VALUES ('978', '112', '平坝县');
INSERT INTO `g_base_region` VALUES ('979', '112', '普定县');
INSERT INTO `g_base_region` VALUES ('980', '113', '毕节市');
INSERT INTO `g_base_region` VALUES ('981', '113', '大方县');
INSERT INTO `g_base_region` VALUES ('982', '113', '黔西县');
INSERT INTO `g_base_region` VALUES ('983', '113', '金沙县');
INSERT INTO `g_base_region` VALUES ('984', '113', '织金县');
INSERT INTO `g_base_region` VALUES ('985', '113', '纳雍县');
INSERT INTO `g_base_region` VALUES ('986', '113', '赫章县');
INSERT INTO `g_base_region` VALUES ('987', '113', '威宁');
INSERT INTO `g_base_region` VALUES ('988', '114', '钟山区');
INSERT INTO `g_base_region` VALUES ('989', '114', '六枝特区');
INSERT INTO `g_base_region` VALUES ('990', '114', '水城县');
INSERT INTO `g_base_region` VALUES ('991', '114', '盘县');
INSERT INTO `g_base_region` VALUES ('992', '115', '凯里市');
INSERT INTO `g_base_region` VALUES ('993', '115', '黄平县');
INSERT INTO `g_base_region` VALUES ('994', '115', '施秉县');
INSERT INTO `g_base_region` VALUES ('995', '115', '三穗县');
INSERT INTO `g_base_region` VALUES ('996', '115', '镇远县');
INSERT INTO `g_base_region` VALUES ('997', '115', '岑巩县');
INSERT INTO `g_base_region` VALUES ('998', '115', '天柱县');
INSERT INTO `g_base_region` VALUES ('999', '115', '锦屏县');
INSERT INTO `g_base_region` VALUES ('1000', '115', '剑河县');
INSERT INTO `g_base_region` VALUES ('1001', '115', '台江县');
INSERT INTO `g_base_region` VALUES ('1002', '115', '黎平县');
INSERT INTO `g_base_region` VALUES ('1003', '115', '榕江县');
INSERT INTO `g_base_region` VALUES ('1004', '115', '从江县');
INSERT INTO `g_base_region` VALUES ('1005', '115', '雷山县');
INSERT INTO `g_base_region` VALUES ('1006', '115', '麻江县');
INSERT INTO `g_base_region` VALUES ('1007', '115', '丹寨县');
INSERT INTO `g_base_region` VALUES ('1008', '116', '都匀市');
INSERT INTO `g_base_region` VALUES ('1009', '116', '福泉市');
INSERT INTO `g_base_region` VALUES ('1010', '116', '荔波县');
INSERT INTO `g_base_region` VALUES ('1011', '116', '贵定县');
INSERT INTO `g_base_region` VALUES ('1012', '116', '瓮安县');
INSERT INTO `g_base_region` VALUES ('1013', '116', '独山县');
INSERT INTO `g_base_region` VALUES ('1014', '116', '平塘县');
INSERT INTO `g_base_region` VALUES ('1015', '116', '罗甸县');
INSERT INTO `g_base_region` VALUES ('1016', '116', '长顺县');
INSERT INTO `g_base_region` VALUES ('1017', '116', '龙里县');
INSERT INTO `g_base_region` VALUES ('1018', '116', '惠水县');
INSERT INTO `g_base_region` VALUES ('1019', '116', '三都');
INSERT INTO `g_base_region` VALUES ('1020', '117', '兴义市');
INSERT INTO `g_base_region` VALUES ('1021', '117', '兴仁县');
INSERT INTO `g_base_region` VALUES ('1022', '117', '普安县');
INSERT INTO `g_base_region` VALUES ('1023', '117', '晴隆县');
INSERT INTO `g_base_region` VALUES ('1024', '117', '贞丰县');
INSERT INTO `g_base_region` VALUES ('1025', '117', '望谟县');
INSERT INTO `g_base_region` VALUES ('1026', '117', '册亨县');
INSERT INTO `g_base_region` VALUES ('1027', '117', '安龙县');
INSERT INTO `g_base_region` VALUES ('1028', '118', '铜仁市');
INSERT INTO `g_base_region` VALUES ('1029', '118', '江口县');
INSERT INTO `g_base_region` VALUES ('1030', '118', '石阡县');
INSERT INTO `g_base_region` VALUES ('1031', '118', '思南县');
INSERT INTO `g_base_region` VALUES ('1032', '118', '德江县');
INSERT INTO `g_base_region` VALUES ('1033', '118', '玉屏');
INSERT INTO `g_base_region` VALUES ('1034', '118', '印江');
INSERT INTO `g_base_region` VALUES ('1035', '118', '沿河');
INSERT INTO `g_base_region` VALUES ('1036', '118', '松桃');
INSERT INTO `g_base_region` VALUES ('1037', '118', '万山特区');
INSERT INTO `g_base_region` VALUES ('1038', '119', '红花岗区');
INSERT INTO `g_base_region` VALUES ('1039', '119', '务川县');
INSERT INTO `g_base_region` VALUES ('1040', '119', '道真县');
INSERT INTO `g_base_region` VALUES ('1041', '119', '汇川区');
INSERT INTO `g_base_region` VALUES ('1042', '119', '赤水市');
INSERT INTO `g_base_region` VALUES ('1043', '119', '仁怀市');
INSERT INTO `g_base_region` VALUES ('1044', '119', '遵义县');
INSERT INTO `g_base_region` VALUES ('1045', '119', '桐梓县');
INSERT INTO `g_base_region` VALUES ('1046', '119', '绥阳县');
INSERT INTO `g_base_region` VALUES ('1047', '119', '正安县');
INSERT INTO `g_base_region` VALUES ('1048', '119', '凤冈县');
INSERT INTO `g_base_region` VALUES ('1049', '119', '湄潭县');
INSERT INTO `g_base_region` VALUES ('1050', '119', '余庆县');
INSERT INTO `g_base_region` VALUES ('1051', '119', '习水县');
INSERT INTO `g_base_region` VALUES ('1052', '119', '道真');
INSERT INTO `g_base_region` VALUES ('1053', '119', '务川');
INSERT INTO `g_base_region` VALUES ('1054', '120', '秀英区');
INSERT INTO `g_base_region` VALUES ('1055', '120', '龙华区');
INSERT INTO `g_base_region` VALUES ('1056', '120', '琼山区');
INSERT INTO `g_base_region` VALUES ('1057', '120', '美兰区');
INSERT INTO `g_base_region` VALUES ('1058', '137', '市区');
INSERT INTO `g_base_region` VALUES ('1059', '137', '洋浦开发区');
INSERT INTO `g_base_region` VALUES ('1060', '137', '那大镇');
INSERT INTO `g_base_region` VALUES ('1061', '137', '王五镇');
INSERT INTO `g_base_region` VALUES ('1062', '137', '雅星镇');
INSERT INTO `g_base_region` VALUES ('1063', '137', '大成镇');
INSERT INTO `g_base_region` VALUES ('1064', '137', '中和镇');
INSERT INTO `g_base_region` VALUES ('1065', '137', '峨蔓镇');
INSERT INTO `g_base_region` VALUES ('1066', '137', '南丰镇');
INSERT INTO `g_base_region` VALUES ('1067', '137', '白马井镇');
INSERT INTO `g_base_region` VALUES ('1068', '137', '兰洋镇');
INSERT INTO `g_base_region` VALUES ('1069', '137', '和庆镇');
INSERT INTO `g_base_region` VALUES ('1070', '137', '海头镇');
INSERT INTO `g_base_region` VALUES ('1071', '137', '排浦镇');
INSERT INTO `g_base_region` VALUES ('1072', '137', '东成镇');
INSERT INTO `g_base_region` VALUES ('1073', '137', '光村镇');
INSERT INTO `g_base_region` VALUES ('1074', '137', '木棠镇');
INSERT INTO `g_base_region` VALUES ('1075', '137', '新州镇');
INSERT INTO `g_base_region` VALUES ('1076', '137', '三都镇');
INSERT INTO `g_base_region` VALUES ('1077', '137', '其他');
INSERT INTO `g_base_region` VALUES ('1078', '138', '长安区');
INSERT INTO `g_base_region` VALUES ('1079', '138', '桥东区');
INSERT INTO `g_base_region` VALUES ('1080', '138', '桥西区');
INSERT INTO `g_base_region` VALUES ('1081', '138', '新华区');
INSERT INTO `g_base_region` VALUES ('1082', '138', '裕华区');
INSERT INTO `g_base_region` VALUES ('1083', '138', '井陉矿区');
INSERT INTO `g_base_region` VALUES ('1084', '138', '高新区');
INSERT INTO `g_base_region` VALUES ('1085', '138', '辛集市');
INSERT INTO `g_base_region` VALUES ('1086', '138', '藁城市');
INSERT INTO `g_base_region` VALUES ('1087', '138', '晋州市');
INSERT INTO `g_base_region` VALUES ('1088', '138', '新乐市');
INSERT INTO `g_base_region` VALUES ('1089', '138', '鹿泉市');
INSERT INTO `g_base_region` VALUES ('1090', '138', '井陉县');
INSERT INTO `g_base_region` VALUES ('1091', '138', '正定县');
INSERT INTO `g_base_region` VALUES ('1092', '138', '栾城县');
INSERT INTO `g_base_region` VALUES ('1093', '138', '行唐县');
INSERT INTO `g_base_region` VALUES ('1094', '138', '灵寿县');
INSERT INTO `g_base_region` VALUES ('1095', '138', '高邑县');
INSERT INTO `g_base_region` VALUES ('1096', '138', '深泽县');
INSERT INTO `g_base_region` VALUES ('1097', '138', '赞皇县');
INSERT INTO `g_base_region` VALUES ('1098', '138', '无极县');
INSERT INTO `g_base_region` VALUES ('1099', '138', '平山县');
INSERT INTO `g_base_region` VALUES ('1100', '138', '元氏县');
INSERT INTO `g_base_region` VALUES ('1101', '138', '赵县');
INSERT INTO `g_base_region` VALUES ('1102', '139', '新市区');
INSERT INTO `g_base_region` VALUES ('1103', '139', '南市区');
INSERT INTO `g_base_region` VALUES ('1104', '139', '北市区');
INSERT INTO `g_base_region` VALUES ('1105', '139', '涿州市');
INSERT INTO `g_base_region` VALUES ('1106', '139', '定州市');
INSERT INTO `g_base_region` VALUES ('1107', '139', '安国市');
INSERT INTO `g_base_region` VALUES ('1108', '139', '高碑店市');
INSERT INTO `g_base_region` VALUES ('1109', '139', '满城县');
INSERT INTO `g_base_region` VALUES ('1110', '139', '清苑县');
INSERT INTO `g_base_region` VALUES ('1111', '139', '涞水县');
INSERT INTO `g_base_region` VALUES ('1112', '139', '阜平县');
INSERT INTO `g_base_region` VALUES ('1113', '139', '徐水县');
INSERT INTO `g_base_region` VALUES ('1114', '139', '定兴县');
INSERT INTO `g_base_region` VALUES ('1115', '139', '唐县');
INSERT INTO `g_base_region` VALUES ('1116', '139', '高阳县');
INSERT INTO `g_base_region` VALUES ('1117', '139', '容城县');
INSERT INTO `g_base_region` VALUES ('1118', '139', '涞源县');
INSERT INTO `g_base_region` VALUES ('1119', '139', '望都县');
INSERT INTO `g_base_region` VALUES ('1120', '139', '安新县');
INSERT INTO `g_base_region` VALUES ('1121', '139', '易县');
INSERT INTO `g_base_region` VALUES ('1122', '139', '曲阳县');
INSERT INTO `g_base_region` VALUES ('1123', '139', '蠡县');
INSERT INTO `g_base_region` VALUES ('1124', '139', '顺平县');
INSERT INTO `g_base_region` VALUES ('1125', '139', '博野县');
INSERT INTO `g_base_region` VALUES ('1126', '139', '雄县');
INSERT INTO `g_base_region` VALUES ('1127', '140', '运河区');
INSERT INTO `g_base_region` VALUES ('1128', '140', '新华区');
INSERT INTO `g_base_region` VALUES ('1129', '140', '泊头市');
INSERT INTO `g_base_region` VALUES ('1130', '140', '任丘市');
INSERT INTO `g_base_region` VALUES ('1131', '140', '黄骅市');
INSERT INTO `g_base_region` VALUES ('1132', '140', '河间市');
INSERT INTO `g_base_region` VALUES ('1133', '140', '沧县');
INSERT INTO `g_base_region` VALUES ('1134', '140', '青县');
INSERT INTO `g_base_region` VALUES ('1135', '140', '东光县');
INSERT INTO `g_base_region` VALUES ('1136', '140', '海兴县');
INSERT INTO `g_base_region` VALUES ('1137', '140', '盐山县');
INSERT INTO `g_base_region` VALUES ('1138', '140', '肃宁县');
INSERT INTO `g_base_region` VALUES ('1139', '140', '南皮县');
INSERT INTO `g_base_region` VALUES ('1140', '140', '吴桥县');
INSERT INTO `g_base_region` VALUES ('1141', '140', '献县');
INSERT INTO `g_base_region` VALUES ('1142', '140', '孟村');
INSERT INTO `g_base_region` VALUES ('1143', '141', '双桥区');
INSERT INTO `g_base_region` VALUES ('1144', '141', '双滦区');
INSERT INTO `g_base_region` VALUES ('1145', '141', '鹰手营子矿区');
INSERT INTO `g_base_region` VALUES ('1146', '141', '承德县');
INSERT INTO `g_base_region` VALUES ('1147', '141', '兴隆县');
INSERT INTO `g_base_region` VALUES ('1148', '141', '平泉县');
INSERT INTO `g_base_region` VALUES ('1149', '141', '滦平县');
INSERT INTO `g_base_region` VALUES ('1150', '141', '隆化县');
INSERT INTO `g_base_region` VALUES ('1151', '141', '丰宁');
INSERT INTO `g_base_region` VALUES ('1152', '141', '宽城');
INSERT INTO `g_base_region` VALUES ('1153', '141', '围场');
INSERT INTO `g_base_region` VALUES ('1154', '142', '从台区');
INSERT INTO `g_base_region` VALUES ('1155', '142', '复兴区');
INSERT INTO `g_base_region` VALUES ('1156', '142', '邯山区');
INSERT INTO `g_base_region` VALUES ('1157', '142', '峰峰矿区');
INSERT INTO `g_base_region` VALUES ('1158', '142', '武安市');
INSERT INTO `g_base_region` VALUES ('1159', '142', '邯郸县');
INSERT INTO `g_base_region` VALUES ('1160', '142', '临漳县');
INSERT INTO `g_base_region` VALUES ('1161', '142', '成安县');
INSERT INTO `g_base_region` VALUES ('1162', '142', '大名县');
INSERT INTO `g_base_region` VALUES ('1163', '142', '涉县');
INSERT INTO `g_base_region` VALUES ('1164', '142', '磁县');
INSERT INTO `g_base_region` VALUES ('1165', '142', '肥乡县');
INSERT INTO `g_base_region` VALUES ('1166', '142', '永年县');
INSERT INTO `g_base_region` VALUES ('1167', '142', '邱县');
INSERT INTO `g_base_region` VALUES ('1168', '142', '鸡泽县');
INSERT INTO `g_base_region` VALUES ('1169', '142', '广平县');
INSERT INTO `g_base_region` VALUES ('1170', '142', '馆陶县');
INSERT INTO `g_base_region` VALUES ('1171', '142', '魏县');
INSERT INTO `g_base_region` VALUES ('1172', '142', '曲周县');
INSERT INTO `g_base_region` VALUES ('1173', '143', '桃城区');
INSERT INTO `g_base_region` VALUES ('1174', '143', '冀州市');
INSERT INTO `g_base_region` VALUES ('1175', '143', '深州市');
INSERT INTO `g_base_region` VALUES ('1176', '143', '枣强县');
INSERT INTO `g_base_region` VALUES ('1177', '143', '武邑县');
INSERT INTO `g_base_region` VALUES ('1178', '143', '武强县');
INSERT INTO `g_base_region` VALUES ('1179', '143', '饶阳县');
INSERT INTO `g_base_region` VALUES ('1180', '143', '安平县');
INSERT INTO `g_base_region` VALUES ('1181', '143', '故城县');
INSERT INTO `g_base_region` VALUES ('1182', '143', '景县');
INSERT INTO `g_base_region` VALUES ('1183', '143', '阜城县');
INSERT INTO `g_base_region` VALUES ('1184', '144', '安次区');
INSERT INTO `g_base_region` VALUES ('1185', '144', '广阳区');
INSERT INTO `g_base_region` VALUES ('1186', '144', '霸州市');
INSERT INTO `g_base_region` VALUES ('1187', '144', '三河市');
INSERT INTO `g_base_region` VALUES ('1188', '144', '固安县');
INSERT INTO `g_base_region` VALUES ('1189', '144', '永清县');
INSERT INTO `g_base_region` VALUES ('1190', '144', '香河县');
INSERT INTO `g_base_region` VALUES ('1191', '144', '大城县');
INSERT INTO `g_base_region` VALUES ('1192', '144', '文安县');
INSERT INTO `g_base_region` VALUES ('1193', '144', '大厂');
INSERT INTO `g_base_region` VALUES ('1194', '145', '海港区');
INSERT INTO `g_base_region` VALUES ('1195', '145', '山海关区');
INSERT INTO `g_base_region` VALUES ('1196', '145', '北戴河区');
INSERT INTO `g_base_region` VALUES ('1197', '145', '昌黎县');
INSERT INTO `g_base_region` VALUES ('1198', '145', '抚宁县');
INSERT INTO `g_base_region` VALUES ('1199', '145', '卢龙县');
INSERT INTO `g_base_region` VALUES ('1200', '145', '青龙');
INSERT INTO `g_base_region` VALUES ('1201', '146', '路北区');
INSERT INTO `g_base_region` VALUES ('1202', '146', '路南区');
INSERT INTO `g_base_region` VALUES ('1203', '146', '古冶区');
INSERT INTO `g_base_region` VALUES ('1204', '146', '开平区');
INSERT INTO `g_base_region` VALUES ('1205', '146', '丰南区');
INSERT INTO `g_base_region` VALUES ('1206', '146', '丰润区');
INSERT INTO `g_base_region` VALUES ('1207', '146', '遵化市');
INSERT INTO `g_base_region` VALUES ('1208', '146', '迁安市');
INSERT INTO `g_base_region` VALUES ('1209', '146', '滦县');
INSERT INTO `g_base_region` VALUES ('1210', '146', '滦南县');
INSERT INTO `g_base_region` VALUES ('1211', '146', '乐亭县');
INSERT INTO `g_base_region` VALUES ('1212', '146', '迁西县');
INSERT INTO `g_base_region` VALUES ('1213', '146', '玉田县');
INSERT INTO `g_base_region` VALUES ('1214', '146', '唐海县');
INSERT INTO `g_base_region` VALUES ('1215', '147', '桥东区');
INSERT INTO `g_base_region` VALUES ('1216', '147', '桥西区');
INSERT INTO `g_base_region` VALUES ('1217', '147', '南宫市');
INSERT INTO `g_base_region` VALUES ('1218', '147', '沙河市');
INSERT INTO `g_base_region` VALUES ('1219', '147', '邢台县');
INSERT INTO `g_base_region` VALUES ('1220', '147', '临城县');
INSERT INTO `g_base_region` VALUES ('1221', '147', '内丘县');
INSERT INTO `g_base_region` VALUES ('1222', '147', '柏乡县');
INSERT INTO `g_base_region` VALUES ('1223', '147', '隆尧县');
INSERT INTO `g_base_region` VALUES ('1224', '147', '任县');
INSERT INTO `g_base_region` VALUES ('1225', '147', '南和县');
INSERT INTO `g_base_region` VALUES ('1226', '147', '宁晋县');
INSERT INTO `g_base_region` VALUES ('1227', '147', '巨鹿县');
INSERT INTO `g_base_region` VALUES ('1228', '147', '新河县');
INSERT INTO `g_base_region` VALUES ('1229', '147', '广宗县');
INSERT INTO `g_base_region` VALUES ('1230', '147', '平乡县');
INSERT INTO `g_base_region` VALUES ('1231', '147', '威县');
INSERT INTO `g_base_region` VALUES ('1232', '147', '清河县');
INSERT INTO `g_base_region` VALUES ('1233', '147', '临西县');
INSERT INTO `g_base_region` VALUES ('1234', '148', '桥西区');
INSERT INTO `g_base_region` VALUES ('1235', '148', '桥东区');
INSERT INTO `g_base_region` VALUES ('1236', '148', '宣化区');
INSERT INTO `g_base_region` VALUES ('1237', '148', '下花园区');
INSERT INTO `g_base_region` VALUES ('1238', '148', '宣化县');
INSERT INTO `g_base_region` VALUES ('1239', '148', '张北县');
INSERT INTO `g_base_region` VALUES ('1240', '148', '康保县');
INSERT INTO `g_base_region` VALUES ('1241', '148', '沽源县');
INSERT INTO `g_base_region` VALUES ('1242', '148', '尚义县');
INSERT INTO `g_base_region` VALUES ('1243', '148', '蔚县');
INSERT INTO `g_base_region` VALUES ('1244', '148', '阳原县');
INSERT INTO `g_base_region` VALUES ('1245', '148', '怀安县');
INSERT INTO `g_base_region` VALUES ('1246', '148', '万全县');
INSERT INTO `g_base_region` VALUES ('1247', '148', '怀来县');
INSERT INTO `g_base_region` VALUES ('1248', '148', '涿鹿县');
INSERT INTO `g_base_region` VALUES ('1249', '148', '赤城县');
INSERT INTO `g_base_region` VALUES ('1250', '148', '崇礼县');
INSERT INTO `g_base_region` VALUES ('1251', '149', '金水区');
INSERT INTO `g_base_region` VALUES ('1252', '149', '邙山区');
INSERT INTO `g_base_region` VALUES ('1253', '149', '二七区');
INSERT INTO `g_base_region` VALUES ('1254', '149', '管城区');
INSERT INTO `g_base_region` VALUES ('1255', '149', '中原区');
INSERT INTO `g_base_region` VALUES ('1256', '149', '上街区');
INSERT INTO `g_base_region` VALUES ('1257', '149', '惠济区');
INSERT INTO `g_base_region` VALUES ('1258', '149', '郑东新区');
INSERT INTO `g_base_region` VALUES ('1259', '149', '经济技术开发区');
INSERT INTO `g_base_region` VALUES ('1260', '149', '高新开发区');
INSERT INTO `g_base_region` VALUES ('1261', '149', '出口加工区');
INSERT INTO `g_base_region` VALUES ('1262', '149', '巩义市');
INSERT INTO `g_base_region` VALUES ('1263', '149', '荥阳市');
INSERT INTO `g_base_region` VALUES ('1264', '149', '新密市');
INSERT INTO `g_base_region` VALUES ('1265', '149', '新郑市');
INSERT INTO `g_base_region` VALUES ('1266', '149', '登封市');
INSERT INTO `g_base_region` VALUES ('1267', '149', '中牟县');
INSERT INTO `g_base_region` VALUES ('1268', '150', '西工区');
INSERT INTO `g_base_region` VALUES ('1269', '150', '老城区');
INSERT INTO `g_base_region` VALUES ('1270', '150', '涧西区');
INSERT INTO `g_base_region` VALUES ('1271', '150', '瀍河回族区');
INSERT INTO `g_base_region` VALUES ('1272', '150', '洛龙区');
INSERT INTO `g_base_region` VALUES ('1273', '150', '吉利区');
INSERT INTO `g_base_region` VALUES ('1274', '150', '偃师市');
INSERT INTO `g_base_region` VALUES ('1275', '150', '孟津县');
INSERT INTO `g_base_region` VALUES ('1276', '150', '新安县');
INSERT INTO `g_base_region` VALUES ('1277', '150', '栾川县');
INSERT INTO `g_base_region` VALUES ('1278', '150', '嵩县');
INSERT INTO `g_base_region` VALUES ('1279', '150', '汝阳县');
INSERT INTO `g_base_region` VALUES ('1280', '150', '宜阳县');
INSERT INTO `g_base_region` VALUES ('1281', '150', '洛宁县');
INSERT INTO `g_base_region` VALUES ('1282', '150', '伊川县');
INSERT INTO `g_base_region` VALUES ('1283', '151', '鼓楼区');
INSERT INTO `g_base_region` VALUES ('1284', '151', '龙亭区');
INSERT INTO `g_base_region` VALUES ('1285', '151', '顺河回族区');
INSERT INTO `g_base_region` VALUES ('1286', '151', '金明区');
INSERT INTO `g_base_region` VALUES ('1287', '151', '禹王台区');
INSERT INTO `g_base_region` VALUES ('1288', '151', '杞县');
INSERT INTO `g_base_region` VALUES ('1289', '151', '通许县');
INSERT INTO `g_base_region` VALUES ('1290', '151', '尉氏县');
INSERT INTO `g_base_region` VALUES ('1291', '151', '开封县');
INSERT INTO `g_base_region` VALUES ('1292', '151', '兰考县');
INSERT INTO `g_base_region` VALUES ('1293', '152', '北关区');
INSERT INTO `g_base_region` VALUES ('1294', '152', '文峰区');
INSERT INTO `g_base_region` VALUES ('1295', '152', '殷都区');
INSERT INTO `g_base_region` VALUES ('1296', '152', '龙安区');
INSERT INTO `g_base_region` VALUES ('1297', '152', '林州市');
INSERT INTO `g_base_region` VALUES ('1298', '152', '安阳县');
INSERT INTO `g_base_region` VALUES ('1299', '152', '汤阴县');
INSERT INTO `g_base_region` VALUES ('1300', '152', '滑县');
INSERT INTO `g_base_region` VALUES ('1301', '152', '内黄县');
INSERT INTO `g_base_region` VALUES ('1302', '153', '淇滨区');
INSERT INTO `g_base_region` VALUES ('1303', '153', '山城区');
INSERT INTO `g_base_region` VALUES ('1304', '153', '鹤山区');
INSERT INTO `g_base_region` VALUES ('1305', '153', '浚县');
INSERT INTO `g_base_region` VALUES ('1306', '153', '淇县');
INSERT INTO `g_base_region` VALUES ('1307', '154', '济源市');
INSERT INTO `g_base_region` VALUES ('1308', '155', '解放区');
INSERT INTO `g_base_region` VALUES ('1309', '155', '中站区');
INSERT INTO `g_base_region` VALUES ('1310', '155', '马村区');
INSERT INTO `g_base_region` VALUES ('1311', '155', '山阳区');
INSERT INTO `g_base_region` VALUES ('1312', '155', '沁阳市');
INSERT INTO `g_base_region` VALUES ('1313', '155', '孟州市');
INSERT INTO `g_base_region` VALUES ('1314', '155', '修武县');
INSERT INTO `g_base_region` VALUES ('1315', '155', '博爱县');
INSERT INTO `g_base_region` VALUES ('1316', '155', '武陟县');
INSERT INTO `g_base_region` VALUES ('1317', '155', '温县');
INSERT INTO `g_base_region` VALUES ('1318', '156', '卧龙区');
INSERT INTO `g_base_region` VALUES ('1319', '156', '宛城区');
INSERT INTO `g_base_region` VALUES ('1320', '156', '邓州市');
INSERT INTO `g_base_region` VALUES ('1321', '156', '南召县');
INSERT INTO `g_base_region` VALUES ('1322', '156', '方城县');
INSERT INTO `g_base_region` VALUES ('1323', '156', '西峡县');
INSERT INTO `g_base_region` VALUES ('1324', '156', '镇平县');
INSERT INTO `g_base_region` VALUES ('1325', '156', '内乡县');
INSERT INTO `g_base_region` VALUES ('1326', '156', '淅川县');
INSERT INTO `g_base_region` VALUES ('1327', '156', '社旗县');
INSERT INTO `g_base_region` VALUES ('1328', '156', '唐河县');
INSERT INTO `g_base_region` VALUES ('1329', '156', '新野县');
INSERT INTO `g_base_region` VALUES ('1330', '156', '桐柏县');
INSERT INTO `g_base_region` VALUES ('1331', '157', '新华区');
INSERT INTO `g_base_region` VALUES ('1332', '157', '卫东区');
INSERT INTO `g_base_region` VALUES ('1333', '157', '湛河区');
INSERT INTO `g_base_region` VALUES ('1334', '157', '石龙区');
INSERT INTO `g_base_region` VALUES ('1335', '157', '舞钢市');
INSERT INTO `g_base_region` VALUES ('1336', '157', '汝州市');
INSERT INTO `g_base_region` VALUES ('1337', '157', '宝丰县');
INSERT INTO `g_base_region` VALUES ('1338', '157', '叶县');
INSERT INTO `g_base_region` VALUES ('1339', '157', '鲁山县');
INSERT INTO `g_base_region` VALUES ('1340', '157', '郏县');
INSERT INTO `g_base_region` VALUES ('1341', '158', '湖滨区');
INSERT INTO `g_base_region` VALUES ('1342', '158', '义马市');
INSERT INTO `g_base_region` VALUES ('1343', '158', '灵宝市');
INSERT INTO `g_base_region` VALUES ('1344', '158', '渑池县');
INSERT INTO `g_base_region` VALUES ('1345', '158', '陕县');
INSERT INTO `g_base_region` VALUES ('1346', '158', '卢氏县');
INSERT INTO `g_base_region` VALUES ('1347', '159', '梁园区');
INSERT INTO `g_base_region` VALUES ('1348', '159', '睢阳区');
INSERT INTO `g_base_region` VALUES ('1349', '159', '永城市');
INSERT INTO `g_base_region` VALUES ('1350', '159', '民权县');
INSERT INTO `g_base_region` VALUES ('1351', '159', '睢县');
INSERT INTO `g_base_region` VALUES ('1352', '159', '宁陵县');
INSERT INTO `g_base_region` VALUES ('1353', '159', '虞城县');
INSERT INTO `g_base_region` VALUES ('1354', '159', '柘城县');
INSERT INTO `g_base_region` VALUES ('1355', '159', '夏邑县');
INSERT INTO `g_base_region` VALUES ('1356', '160', '卫滨区');
INSERT INTO `g_base_region` VALUES ('1357', '160', '红旗区');
INSERT INTO `g_base_region` VALUES ('1358', '160', '凤泉区');
INSERT INTO `g_base_region` VALUES ('1359', '160', '牧野区');
INSERT INTO `g_base_region` VALUES ('1360', '160', '卫辉市');
INSERT INTO `g_base_region` VALUES ('1361', '160', '辉县市');
INSERT INTO `g_base_region` VALUES ('1362', '160', '新乡县');
INSERT INTO `g_base_region` VALUES ('1363', '160', '获嘉县');
INSERT INTO `g_base_region` VALUES ('1364', '160', '原阳县');
INSERT INTO `g_base_region` VALUES ('1365', '160', '延津县');
INSERT INTO `g_base_region` VALUES ('1366', '160', '封丘县');
INSERT INTO `g_base_region` VALUES ('1367', '160', '长垣县');
INSERT INTO `g_base_region` VALUES ('1368', '161', '浉河区');
INSERT INTO `g_base_region` VALUES ('1369', '161', '平桥区');
INSERT INTO `g_base_region` VALUES ('1370', '161', '罗山县');
INSERT INTO `g_base_region` VALUES ('1371', '161', '光山县');
INSERT INTO `g_base_region` VALUES ('1372', '161', '新县');
INSERT INTO `g_base_region` VALUES ('1373', '161', '商城县');
INSERT INTO `g_base_region` VALUES ('1374', '161', '固始县');
INSERT INTO `g_base_region` VALUES ('1375', '161', '潢川县');
INSERT INTO `g_base_region` VALUES ('1376', '161', '淮滨县');
INSERT INTO `g_base_region` VALUES ('1377', '161', '息县');
INSERT INTO `g_base_region` VALUES ('1378', '162', '魏都区');
INSERT INTO `g_base_region` VALUES ('1379', '162', '禹州市');
INSERT INTO `g_base_region` VALUES ('1380', '162', '长葛市');
INSERT INTO `g_base_region` VALUES ('1381', '162', '许昌县');
INSERT INTO `g_base_region` VALUES ('1382', '162', '鄢陵县');
INSERT INTO `g_base_region` VALUES ('1383', '162', '襄城县');
INSERT INTO `g_base_region` VALUES ('1384', '163', '川汇区');
INSERT INTO `g_base_region` VALUES ('1385', '163', '项城市');
INSERT INTO `g_base_region` VALUES ('1386', '163', '扶沟县');
INSERT INTO `g_base_region` VALUES ('1387', '163', '西华县');
INSERT INTO `g_base_region` VALUES ('1388', '163', '商水县');
INSERT INTO `g_base_region` VALUES ('1389', '163', '沈丘县');
INSERT INTO `g_base_region` VALUES ('1390', '163', '郸城县');
INSERT INTO `g_base_region` VALUES ('1391', '163', '淮阳县');
INSERT INTO `g_base_region` VALUES ('1392', '163', '太康县');
INSERT INTO `g_base_region` VALUES ('1393', '163', '鹿邑县');
INSERT INTO `g_base_region` VALUES ('1394', '164', '驿城区');
INSERT INTO `g_base_region` VALUES ('1395', '164', '西平县');
INSERT INTO `g_base_region` VALUES ('1396', '164', '上蔡县');
INSERT INTO `g_base_region` VALUES ('1397', '164', '平舆县');
INSERT INTO `g_base_region` VALUES ('1398', '164', '正阳县');
INSERT INTO `g_base_region` VALUES ('1399', '164', '确山县');
INSERT INTO `g_base_region` VALUES ('1400', '164', '泌阳县');
INSERT INTO `g_base_region` VALUES ('1401', '164', '汝南县');
INSERT INTO `g_base_region` VALUES ('1402', '164', '遂平县');
INSERT INTO `g_base_region` VALUES ('1403', '164', '新蔡县');
INSERT INTO `g_base_region` VALUES ('1404', '165', '郾城区');
INSERT INTO `g_base_region` VALUES ('1405', '165', '源汇区');
INSERT INTO `g_base_region` VALUES ('1406', '165', '召陵区');
INSERT INTO `g_base_region` VALUES ('1407', '165', '舞阳县');
INSERT INTO `g_base_region` VALUES ('1408', '165', '临颍县');
INSERT INTO `g_base_region` VALUES ('1409', '166', '华龙区');
INSERT INTO `g_base_region` VALUES ('1410', '166', '清丰县');
INSERT INTO `g_base_region` VALUES ('1411', '166', '南乐县');
INSERT INTO `g_base_region` VALUES ('1412', '166', '范县');
INSERT INTO `g_base_region` VALUES ('1413', '166', '台前县');
INSERT INTO `g_base_region` VALUES ('1414', '166', '濮阳县');
INSERT INTO `g_base_region` VALUES ('1415', '167', '道里区');
INSERT INTO `g_base_region` VALUES ('1416', '167', '南岗区');
INSERT INTO `g_base_region` VALUES ('1417', '167', '动力区');
INSERT INTO `g_base_region` VALUES ('1418', '167', '平房区');
INSERT INTO `g_base_region` VALUES ('1419', '167', '香坊区');
INSERT INTO `g_base_region` VALUES ('1420', '167', '太平区');
INSERT INTO `g_base_region` VALUES ('1421', '167', '道外区');
INSERT INTO `g_base_region` VALUES ('1422', '167', '阿城区');
INSERT INTO `g_base_region` VALUES ('1423', '167', '呼兰区');
INSERT INTO `g_base_region` VALUES ('1424', '167', '松北区');
INSERT INTO `g_base_region` VALUES ('1425', '167', '尚志市');
INSERT INTO `g_base_region` VALUES ('1426', '167', '双城市');
INSERT INTO `g_base_region` VALUES ('1427', '167', '五常市');
INSERT INTO `g_base_region` VALUES ('1428', '167', '方正县');
INSERT INTO `g_base_region` VALUES ('1429', '167', '宾县');
INSERT INTO `g_base_region` VALUES ('1430', '167', '依兰县');
INSERT INTO `g_base_region` VALUES ('1431', '167', '巴彦县');
INSERT INTO `g_base_region` VALUES ('1432', '167', '通河县');
INSERT INTO `g_base_region` VALUES ('1433', '167', '木兰县');
INSERT INTO `g_base_region` VALUES ('1434', '167', '延寿县');
INSERT INTO `g_base_region` VALUES ('1435', '168', '萨尔图区');
INSERT INTO `g_base_region` VALUES ('1436', '168', '红岗区');
INSERT INTO `g_base_region` VALUES ('1437', '168', '龙凤区');
INSERT INTO `g_base_region` VALUES ('1438', '168', '让胡路区');
INSERT INTO `g_base_region` VALUES ('1439', '168', '大同区');
INSERT INTO `g_base_region` VALUES ('1440', '168', '肇州县');
INSERT INTO `g_base_region` VALUES ('1441', '168', '肇源县');
INSERT INTO `g_base_region` VALUES ('1442', '168', '林甸县');
INSERT INTO `g_base_region` VALUES ('1443', '168', '杜尔伯特');
INSERT INTO `g_base_region` VALUES ('1444', '169', '呼玛县');
INSERT INTO `g_base_region` VALUES ('1445', '169', '漠河县');
INSERT INTO `g_base_region` VALUES ('1446', '169', '塔河县');
INSERT INTO `g_base_region` VALUES ('1447', '170', '兴山区');
INSERT INTO `g_base_region` VALUES ('1448', '170', '工农区');
INSERT INTO `g_base_region` VALUES ('1449', '170', '南山区');
INSERT INTO `g_base_region` VALUES ('1450', '170', '兴安区');
INSERT INTO `g_base_region` VALUES ('1451', '170', '向阳区');
INSERT INTO `g_base_region` VALUES ('1452', '170', '东山区');
INSERT INTO `g_base_region` VALUES ('1453', '170', '萝北县');
INSERT INTO `g_base_region` VALUES ('1454', '170', '绥滨县');
INSERT INTO `g_base_region` VALUES ('1455', '171', '爱辉区');
INSERT INTO `g_base_region` VALUES ('1456', '171', '五大连池市');
INSERT INTO `g_base_region` VALUES ('1457', '171', '北安市');
INSERT INTO `g_base_region` VALUES ('1458', '171', '嫩江县');
INSERT INTO `g_base_region` VALUES ('1459', '171', '逊克县');
INSERT INTO `g_base_region` VALUES ('1460', '171', '孙吴县');
INSERT INTO `g_base_region` VALUES ('1461', '172', '鸡冠区');
INSERT INTO `g_base_region` VALUES ('1462', '172', '恒山区');
INSERT INTO `g_base_region` VALUES ('1463', '172', '城子河区');
INSERT INTO `g_base_region` VALUES ('1464', '172', '滴道区');
INSERT INTO `g_base_region` VALUES ('1465', '172', '梨树区');
INSERT INTO `g_base_region` VALUES ('1466', '172', '虎林市');
INSERT INTO `g_base_region` VALUES ('1467', '172', '密山市');
INSERT INTO `g_base_region` VALUES ('1468', '172', '鸡东县');
INSERT INTO `g_base_region` VALUES ('1469', '173', '前进区');
INSERT INTO `g_base_region` VALUES ('1470', '173', '郊区');
INSERT INTO `g_base_region` VALUES ('1471', '173', '向阳区');
INSERT INTO `g_base_region` VALUES ('1472', '173', '东风区');
INSERT INTO `g_base_region` VALUES ('1473', '173', '同江市');
INSERT INTO `g_base_region` VALUES ('1474', '173', '富锦市');
INSERT INTO `g_base_region` VALUES ('1475', '173', '桦南县');
INSERT INTO `g_base_region` VALUES ('1476', '173', '桦川县');
INSERT INTO `g_base_region` VALUES ('1477', '173', '汤原县');
INSERT INTO `g_base_region` VALUES ('1478', '173', '抚远县');
INSERT INTO `g_base_region` VALUES ('1479', '174', '爱民区');
INSERT INTO `g_base_region` VALUES ('1480', '174', '东安区');
INSERT INTO `g_base_region` VALUES ('1481', '174', '阳明区');
INSERT INTO `g_base_region` VALUES ('1482', '174', '西安区');
INSERT INTO `g_base_region` VALUES ('1483', '174', '绥芬河市');
INSERT INTO `g_base_region` VALUES ('1484', '174', '海林市');
INSERT INTO `g_base_region` VALUES ('1485', '174', '宁安市');
INSERT INTO `g_base_region` VALUES ('1486', '174', '穆棱市');
INSERT INTO `g_base_region` VALUES ('1487', '174', '东宁县');
INSERT INTO `g_base_region` VALUES ('1488', '174', '林口县');
INSERT INTO `g_base_region` VALUES ('1489', '175', '桃山区');
INSERT INTO `g_base_region` VALUES ('1490', '175', '新兴区');
INSERT INTO `g_base_region` VALUES ('1491', '175', '茄子河区');
INSERT INTO `g_base_region` VALUES ('1492', '175', '勃利县');
INSERT INTO `g_base_region` VALUES ('1493', '176', '龙沙区');
INSERT INTO `g_base_region` VALUES ('1494', '176', '昂昂溪区');
INSERT INTO `g_base_region` VALUES ('1495', '176', '铁峰区');
INSERT INTO `g_base_region` VALUES ('1496', '176', '建华区');
INSERT INTO `g_base_region` VALUES ('1497', '176', '富拉尔基区');
INSERT INTO `g_base_region` VALUES ('1498', '176', '碾子山区');
INSERT INTO `g_base_region` VALUES ('1499', '176', '梅里斯达斡尔区');
INSERT INTO `g_base_region` VALUES ('1500', '176', '讷河市');
INSERT INTO `g_base_region` VALUES ('1501', '176', '龙江县');
INSERT INTO `g_base_region` VALUES ('1502', '176', '依安县');
INSERT INTO `g_base_region` VALUES ('1503', '176', '泰来县');
INSERT INTO `g_base_region` VALUES ('1504', '176', '甘南县');
INSERT INTO `g_base_region` VALUES ('1505', '176', '富裕县');
INSERT INTO `g_base_region` VALUES ('1506', '176', '克山县');
INSERT INTO `g_base_region` VALUES ('1507', '176', '克东县');
INSERT INTO `g_base_region` VALUES ('1508', '176', '拜泉县');
INSERT INTO `g_base_region` VALUES ('1509', '177', '尖山区');
INSERT INTO `g_base_region` VALUES ('1510', '177', '岭东区');
INSERT INTO `g_base_region` VALUES ('1511', '177', '四方台区');
INSERT INTO `g_base_region` VALUES ('1512', '177', '宝山区');
INSERT INTO `g_base_region` VALUES ('1513', '177', '集贤县');
INSERT INTO `g_base_region` VALUES ('1514', '177', '友谊县');
INSERT INTO `g_base_region` VALUES ('1515', '177', '宝清县');
INSERT INTO `g_base_region` VALUES ('1516', '177', '饶河县');
INSERT INTO `g_base_region` VALUES ('1517', '178', '北林区');
INSERT INTO `g_base_region` VALUES ('1518', '178', '安达市');
INSERT INTO `g_base_region` VALUES ('1519', '178', '肇东市');
INSERT INTO `g_base_region` VALUES ('1520', '178', '海伦市');
INSERT INTO `g_base_region` VALUES ('1521', '178', '望奎县');
INSERT INTO `g_base_region` VALUES ('1522', '178', '兰西县');
INSERT INTO `g_base_region` VALUES ('1523', '178', '青冈县');
INSERT INTO `g_base_region` VALUES ('1524', '178', '庆安县');
INSERT INTO `g_base_region` VALUES ('1525', '178', '明水县');
INSERT INTO `g_base_region` VALUES ('1526', '178', '绥棱县');
INSERT INTO `g_base_region` VALUES ('1527', '179', '伊春区');
INSERT INTO `g_base_region` VALUES ('1528', '179', '带岭区');
INSERT INTO `g_base_region` VALUES ('1529', '179', '南岔区');
INSERT INTO `g_base_region` VALUES ('1530', '179', '金山屯区');
INSERT INTO `g_base_region` VALUES ('1531', '179', '西林区');
INSERT INTO `g_base_region` VALUES ('1532', '179', '美溪区');
INSERT INTO `g_base_region` VALUES ('1533', '179', '乌马河区');
INSERT INTO `g_base_region` VALUES ('1534', '179', '翠峦区');
INSERT INTO `g_base_region` VALUES ('1535', '179', '友好区');
INSERT INTO `g_base_region` VALUES ('1536', '179', '上甘岭区');
INSERT INTO `g_base_region` VALUES ('1537', '179', '五营区');
INSERT INTO `g_base_region` VALUES ('1538', '179', '红星区');
INSERT INTO `g_base_region` VALUES ('1539', '179', '新青区');
INSERT INTO `g_base_region` VALUES ('1540', '179', '汤旺河区');
INSERT INTO `g_base_region` VALUES ('1541', '179', '乌伊岭区');
INSERT INTO `g_base_region` VALUES ('1542', '179', '铁力市');
INSERT INTO `g_base_region` VALUES ('1543', '179', '嘉荫县');
INSERT INTO `g_base_region` VALUES ('1544', '180', '江岸区');
INSERT INTO `g_base_region` VALUES ('1545', '180', '武昌区');
INSERT INTO `g_base_region` VALUES ('1546', '180', '江汉区');
INSERT INTO `g_base_region` VALUES ('1547', '180', '硚口区');
INSERT INTO `g_base_region` VALUES ('1548', '180', '汉阳区');
INSERT INTO `g_base_region` VALUES ('1549', '180', '青山区');
INSERT INTO `g_base_region` VALUES ('1550', '180', '洪山区');
INSERT INTO `g_base_region` VALUES ('1551', '180', '东西湖区');
INSERT INTO `g_base_region` VALUES ('1552', '180', '汉南区');
INSERT INTO `g_base_region` VALUES ('1553', '180', '蔡甸区');
INSERT INTO `g_base_region` VALUES ('1554', '180', '江夏区');
INSERT INTO `g_base_region` VALUES ('1555', '180', '黄陂区');
INSERT INTO `g_base_region` VALUES ('1556', '180', '新洲区');
INSERT INTO `g_base_region` VALUES ('1557', '180', '经济开发区');
INSERT INTO `g_base_region` VALUES ('1558', '181', '仙桃市');
INSERT INTO `g_base_region` VALUES ('1559', '182', '鄂城区');
INSERT INTO `g_base_region` VALUES ('1560', '182', '华容区');
INSERT INTO `g_base_region` VALUES ('1561', '182', '梁子湖区');
INSERT INTO `g_base_region` VALUES ('1562', '183', '黄州区');
INSERT INTO `g_base_region` VALUES ('1563', '183', '麻城市');
INSERT INTO `g_base_region` VALUES ('1564', '183', '武穴市');
INSERT INTO `g_base_region` VALUES ('1565', '183', '团风县');
INSERT INTO `g_base_region` VALUES ('1566', '183', '红安县');
INSERT INTO `g_base_region` VALUES ('1567', '183', '罗田县');
INSERT INTO `g_base_region` VALUES ('1568', '183', '英山县');
INSERT INTO `g_base_region` VALUES ('1569', '183', '浠水县');
INSERT INTO `g_base_region` VALUES ('1570', '183', '蕲春县');
INSERT INTO `g_base_region` VALUES ('1571', '183', '黄梅县');
INSERT INTO `g_base_region` VALUES ('1572', '184', '黄石港区');
INSERT INTO `g_base_region` VALUES ('1573', '184', '西塞山区');
INSERT INTO `g_base_region` VALUES ('1574', '184', '下陆区');
INSERT INTO `g_base_region` VALUES ('1575', '184', '铁山区');
INSERT INTO `g_base_region` VALUES ('1576', '184', '大冶市');
INSERT INTO `g_base_region` VALUES ('1577', '184', '阳新县');
INSERT INTO `g_base_region` VALUES ('1578', '185', '东宝区');
INSERT INTO `g_base_region` VALUES ('1579', '185', '掇刀区');
INSERT INTO `g_base_region` VALUES ('1580', '185', '钟祥市');
INSERT INTO `g_base_region` VALUES ('1581', '185', '京山县');
INSERT INTO `g_base_region` VALUES ('1582', '185', '沙洋县');
INSERT INTO `g_base_region` VALUES ('1583', '186', '沙市区');
INSERT INTO `g_base_region` VALUES ('1584', '186', '荆州区');
INSERT INTO `g_base_region` VALUES ('1585', '186', '石首市');
INSERT INTO `g_base_region` VALUES ('1586', '186', '洪湖市');
INSERT INTO `g_base_region` VALUES ('1587', '186', '松滋市');
INSERT INTO `g_base_region` VALUES ('1588', '186', '公安县');
INSERT INTO `g_base_region` VALUES ('1589', '186', '监利县');
INSERT INTO `g_base_region` VALUES ('1590', '186', '江陵县');
INSERT INTO `g_base_region` VALUES ('1591', '187', '潜江市');
INSERT INTO `g_base_region` VALUES ('1592', '188', '神农架林区');
INSERT INTO `g_base_region` VALUES ('1593', '189', '张湾区');
INSERT INTO `g_base_region` VALUES ('1594', '189', '茅箭区');
INSERT INTO `g_base_region` VALUES ('1595', '189', '丹江口市');
INSERT INTO `g_base_region` VALUES ('1596', '189', '郧县');
INSERT INTO `g_base_region` VALUES ('1597', '189', '郧西县');
INSERT INTO `g_base_region` VALUES ('1598', '189', '竹山县');
INSERT INTO `g_base_region` VALUES ('1599', '189', '竹溪县');
INSERT INTO `g_base_region` VALUES ('1600', '189', '房县');
INSERT INTO `g_base_region` VALUES ('1601', '190', '曾都区');
INSERT INTO `g_base_region` VALUES ('1602', '190', '广水市');
INSERT INTO `g_base_region` VALUES ('1603', '191', '天门市');
INSERT INTO `g_base_region` VALUES ('1604', '192', '咸安区');
INSERT INTO `g_base_region` VALUES ('1605', '192', '赤壁市');
INSERT INTO `g_base_region` VALUES ('1606', '192', '嘉鱼县');
INSERT INTO `g_base_region` VALUES ('1607', '192', '通城县');
INSERT INTO `g_base_region` VALUES ('1608', '192', '崇阳县');
INSERT INTO `g_base_region` VALUES ('1609', '192', '通山县');
INSERT INTO `g_base_region` VALUES ('1610', '193', '襄城区');
INSERT INTO `g_base_region` VALUES ('1611', '193', '樊城区');
INSERT INTO `g_base_region` VALUES ('1612', '193', '襄阳区');
INSERT INTO `g_base_region` VALUES ('1613', '193', '老河口市');
INSERT INTO `g_base_region` VALUES ('1614', '193', '枣阳市');
INSERT INTO `g_base_region` VALUES ('1615', '193', '宜城市');
INSERT INTO `g_base_region` VALUES ('1616', '193', '南漳县');
INSERT INTO `g_base_region` VALUES ('1617', '193', '谷城县');
INSERT INTO `g_base_region` VALUES ('1618', '193', '保康县');
INSERT INTO `g_base_region` VALUES ('1619', '194', '孝南区');
INSERT INTO `g_base_region` VALUES ('1620', '194', '应城市');
INSERT INTO `g_base_region` VALUES ('1621', '194', '安陆市');
INSERT INTO `g_base_region` VALUES ('1622', '194', '汉川市');
INSERT INTO `g_base_region` VALUES ('1623', '194', '孝昌县');
INSERT INTO `g_base_region` VALUES ('1624', '194', '大悟县');
INSERT INTO `g_base_region` VALUES ('1625', '194', '云梦县');
INSERT INTO `g_base_region` VALUES ('1626', '195', '长阳');
INSERT INTO `g_base_region` VALUES ('1627', '195', '五峰');
INSERT INTO `g_base_region` VALUES ('1628', '195', '西陵区');
INSERT INTO `g_base_region` VALUES ('1629', '195', '伍家岗区');
INSERT INTO `g_base_region` VALUES ('1630', '195', '点军区');
INSERT INTO `g_base_region` VALUES ('1631', '195', '猇亭区');
INSERT INTO `g_base_region` VALUES ('1632', '195', '夷陵区');
INSERT INTO `g_base_region` VALUES ('1633', '195', '宜都市');
INSERT INTO `g_base_region` VALUES ('1634', '195', '当阳市');
INSERT INTO `g_base_region` VALUES ('1635', '195', '枝江市');
INSERT INTO `g_base_region` VALUES ('1636', '195', '远安县');
INSERT INTO `g_base_region` VALUES ('1637', '195', '兴山县');
INSERT INTO `g_base_region` VALUES ('1638', '195', '秭归县');
INSERT INTO `g_base_region` VALUES ('1639', '196', '恩施市');
INSERT INTO `g_base_region` VALUES ('1640', '196', '利川市');
INSERT INTO `g_base_region` VALUES ('1641', '196', '建始县');
INSERT INTO `g_base_region` VALUES ('1642', '196', '巴东县');
INSERT INTO `g_base_region` VALUES ('1643', '196', '宣恩县');
INSERT INTO `g_base_region` VALUES ('1644', '196', '咸丰县');
INSERT INTO `g_base_region` VALUES ('1645', '196', '来凤县');
INSERT INTO `g_base_region` VALUES ('1646', '196', '鹤峰县');
INSERT INTO `g_base_region` VALUES ('1647', '197', '岳麓区');
INSERT INTO `g_base_region` VALUES ('1648', '197', '芙蓉区');
INSERT INTO `g_base_region` VALUES ('1649', '197', '天心区');
INSERT INTO `g_base_region` VALUES ('1650', '197', '开福区');
INSERT INTO `g_base_region` VALUES ('1651', '197', '雨花区');
INSERT INTO `g_base_region` VALUES ('1652', '197', '开发区');
INSERT INTO `g_base_region` VALUES ('1653', '197', '浏阳市');
INSERT INTO `g_base_region` VALUES ('1654', '197', '长沙县');
INSERT INTO `g_base_region` VALUES ('1655', '197', '望城县');
INSERT INTO `g_base_region` VALUES ('1656', '197', '宁乡县');
INSERT INTO `g_base_region` VALUES ('1657', '198', '永定区');
INSERT INTO `g_base_region` VALUES ('1658', '198', '武陵源区');
INSERT INTO `g_base_region` VALUES ('1659', '198', '慈利县');
INSERT INTO `g_base_region` VALUES ('1660', '198', '桑植县');
INSERT INTO `g_base_region` VALUES ('1661', '199', '武陵区');
INSERT INTO `g_base_region` VALUES ('1662', '199', '鼎城区');
INSERT INTO `g_base_region` VALUES ('1663', '199', '津市市');
INSERT INTO `g_base_region` VALUES ('1664', '199', '安乡县');
INSERT INTO `g_base_region` VALUES ('1665', '199', '汉寿县');
INSERT INTO `g_base_region` VALUES ('1666', '199', '澧县');
INSERT INTO `g_base_region` VALUES ('1667', '199', '临澧县');
INSERT INTO `g_base_region` VALUES ('1668', '199', '桃源县');
INSERT INTO `g_base_region` VALUES ('1669', '199', '石门县');
INSERT INTO `g_base_region` VALUES ('1670', '200', '北湖区');
INSERT INTO `g_base_region` VALUES ('1671', '200', '苏仙区');
INSERT INTO `g_base_region` VALUES ('1672', '200', '资兴市');
INSERT INTO `g_base_region` VALUES ('1673', '200', '桂阳县');
INSERT INTO `g_base_region` VALUES ('1674', '200', '宜章县');
INSERT INTO `g_base_region` VALUES ('1675', '200', '永兴县');
INSERT INTO `g_base_region` VALUES ('1676', '200', '嘉禾县');
INSERT INTO `g_base_region` VALUES ('1677', '200', '临武县');
INSERT INTO `g_base_region` VALUES ('1678', '200', '汝城县');
INSERT INTO `g_base_region` VALUES ('1679', '200', '桂东县');
INSERT INTO `g_base_region` VALUES ('1680', '200', '安仁县');
INSERT INTO `g_base_region` VALUES ('1681', '201', '雁峰区');
INSERT INTO `g_base_region` VALUES ('1682', '201', '珠晖区');
INSERT INTO `g_base_region` VALUES ('1683', '201', '石鼓区');
INSERT INTO `g_base_region` VALUES ('1684', '201', '蒸湘区');
INSERT INTO `g_base_region` VALUES ('1685', '201', '南岳区');
INSERT INTO `g_base_region` VALUES ('1686', '201', '耒阳市');
INSERT INTO `g_base_region` VALUES ('1687', '201', '常宁市');
INSERT INTO `g_base_region` VALUES ('1688', '201', '衡阳县');
INSERT INTO `g_base_region` VALUES ('1689', '201', '衡南县');
INSERT INTO `g_base_region` VALUES ('1690', '201', '衡山县');
INSERT INTO `g_base_region` VALUES ('1691', '201', '衡东县');
INSERT INTO `g_base_region` VALUES ('1692', '201', '祁东县');
INSERT INTO `g_base_region` VALUES ('1693', '202', '鹤城区');
INSERT INTO `g_base_region` VALUES ('1694', '202', '靖州');
INSERT INTO `g_base_region` VALUES ('1695', '202', '麻阳');
INSERT INTO `g_base_region` VALUES ('1696', '202', '通道');
INSERT INTO `g_base_region` VALUES ('1697', '202', '新晃');
INSERT INTO `g_base_region` VALUES ('1698', '202', '芷江');
INSERT INTO `g_base_region` VALUES ('1699', '202', '沅陵县');
INSERT INTO `g_base_region` VALUES ('1700', '202', '辰溪县');
INSERT INTO `g_base_region` VALUES ('1701', '202', '溆浦县');
INSERT INTO `g_base_region` VALUES ('1702', '202', '中方县');
INSERT INTO `g_base_region` VALUES ('1703', '202', '会同县');
INSERT INTO `g_base_region` VALUES ('1704', '202', '洪江市');
INSERT INTO `g_base_region` VALUES ('1705', '203', '娄星区');
INSERT INTO `g_base_region` VALUES ('1706', '203', '冷水江市');
INSERT INTO `g_base_region` VALUES ('1707', '203', '涟源市');
INSERT INTO `g_base_region` VALUES ('1708', '203', '双峰县');
INSERT INTO `g_base_region` VALUES ('1709', '203', '新化县');
INSERT INTO `g_base_region` VALUES ('1710', '204', '城步');
INSERT INTO `g_base_region` VALUES ('1711', '204', '双清区');
INSERT INTO `g_base_region` VALUES ('1712', '204', '大祥区');
INSERT INTO `g_base_region` VALUES ('1713', '204', '北塔区');
INSERT INTO `g_base_region` VALUES ('1714', '204', '武冈市');
INSERT INTO `g_base_region` VALUES ('1715', '204', '邵东县');
INSERT INTO `g_base_region` VALUES ('1716', '204', '新邵县');
INSERT INTO `g_base_region` VALUES ('1717', '204', '邵阳县');
INSERT INTO `g_base_region` VALUES ('1718', '204', '隆回县');
INSERT INTO `g_base_region` VALUES ('1719', '204', '洞口县');
INSERT INTO `g_base_region` VALUES ('1720', '204', '绥宁县');
INSERT INTO `g_base_region` VALUES ('1721', '204', '新宁县');
INSERT INTO `g_base_region` VALUES ('1722', '205', '岳塘区');
INSERT INTO `g_base_region` VALUES ('1723', '205', '雨湖区');
INSERT INTO `g_base_region` VALUES ('1724', '205', '湘乡市');
INSERT INTO `g_base_region` VALUES ('1725', '205', '韶山市');
INSERT INTO `g_base_region` VALUES ('1726', '205', '湘潭县');
INSERT INTO `g_base_region` VALUES ('1727', '206', '吉首市');
INSERT INTO `g_base_region` VALUES ('1728', '206', '泸溪县');
INSERT INTO `g_base_region` VALUES ('1729', '206', '凤凰县');
INSERT INTO `g_base_region` VALUES ('1730', '206', '花垣县');
INSERT INTO `g_base_region` VALUES ('1731', '206', '保靖县');
INSERT INTO `g_base_region` VALUES ('1732', '206', '古丈县');
INSERT INTO `g_base_region` VALUES ('1733', '206', '永顺县');
INSERT INTO `g_base_region` VALUES ('1734', '206', '龙山县');
INSERT INTO `g_base_region` VALUES ('1735', '207', '赫山区');
INSERT INTO `g_base_region` VALUES ('1736', '207', '资阳区');
INSERT INTO `g_base_region` VALUES ('1737', '207', '沅江市');
INSERT INTO `g_base_region` VALUES ('1738', '207', '南县');
INSERT INTO `g_base_region` VALUES ('1739', '207', '桃江县');
INSERT INTO `g_base_region` VALUES ('1740', '207', '安化县');
INSERT INTO `g_base_region` VALUES ('1741', '208', '江华');
INSERT INTO `g_base_region` VALUES ('1742', '208', '冷水滩区');
INSERT INTO `g_base_region` VALUES ('1743', '208', '零陵区');
INSERT INTO `g_base_region` VALUES ('1744', '208', '祁阳县');
INSERT INTO `g_base_region` VALUES ('1745', '208', '东安县');
INSERT INTO `g_base_region` VALUES ('1746', '208', '双牌县');
INSERT INTO `g_base_region` VALUES ('1747', '208', '道县');
INSERT INTO `g_base_region` VALUES ('1748', '208', '江永县');
INSERT INTO `g_base_region` VALUES ('1749', '208', '宁远县');
INSERT INTO `g_base_region` VALUES ('1750', '208', '蓝山县');
INSERT INTO `g_base_region` VALUES ('1751', '208', '新田县');
INSERT INTO `g_base_region` VALUES ('1752', '209', '岳阳楼区');
INSERT INTO `g_base_region` VALUES ('1753', '209', '君山区');
INSERT INTO `g_base_region` VALUES ('1754', '209', '云溪区');
INSERT INTO `g_base_region` VALUES ('1755', '209', '汨罗市');
INSERT INTO `g_base_region` VALUES ('1756', '209', '临湘市');
INSERT INTO `g_base_region` VALUES ('1757', '209', '岳阳县');
INSERT INTO `g_base_region` VALUES ('1758', '209', '华容县');
INSERT INTO `g_base_region` VALUES ('1759', '209', '湘阴县');
INSERT INTO `g_base_region` VALUES ('1760', '209', '平江县');
INSERT INTO `g_base_region` VALUES ('1761', '210', '天元区');
INSERT INTO `g_base_region` VALUES ('1762', '210', '荷塘区');
INSERT INTO `g_base_region` VALUES ('1763', '210', '芦淞区');
INSERT INTO `g_base_region` VALUES ('1764', '210', '石峰区');
INSERT INTO `g_base_region` VALUES ('1765', '210', '醴陵市');
INSERT INTO `g_base_region` VALUES ('1766', '210', '株洲县');
INSERT INTO `g_base_region` VALUES ('1767', '210', '攸县');
INSERT INTO `g_base_region` VALUES ('1768', '210', '茶陵县');
INSERT INTO `g_base_region` VALUES ('1769', '210', '炎陵县');
INSERT INTO `g_base_region` VALUES ('1770', '211', '朝阳区');
INSERT INTO `g_base_region` VALUES ('1771', '211', '宽城区');
INSERT INTO `g_base_region` VALUES ('1772', '211', '二道区');
INSERT INTO `g_base_region` VALUES ('1773', '211', '南关区');
INSERT INTO `g_base_region` VALUES ('1774', '211', '绿园区');
INSERT INTO `g_base_region` VALUES ('1775', '211', '双阳区');
INSERT INTO `g_base_region` VALUES ('1776', '211', '净月潭开发区');
INSERT INTO `g_base_region` VALUES ('1777', '211', '高新技术开发区');
INSERT INTO `g_base_region` VALUES ('1778', '211', '经济技术开发区');
INSERT INTO `g_base_region` VALUES ('1779', '211', '汽车产业开发区');
INSERT INTO `g_base_region` VALUES ('1780', '211', '德惠市');
INSERT INTO `g_base_region` VALUES ('1781', '211', '九台市');
INSERT INTO `g_base_region` VALUES ('1782', '211', '榆树市');
INSERT INTO `g_base_region` VALUES ('1783', '211', '农安县');
INSERT INTO `g_base_region` VALUES ('1784', '212', '船营区');
INSERT INTO `g_base_region` VALUES ('1785', '212', '昌邑区');
INSERT INTO `g_base_region` VALUES ('1786', '212', '龙潭区');
INSERT INTO `g_base_region` VALUES ('1787', '212', '丰满区');
INSERT INTO `g_base_region` VALUES ('1788', '212', '蛟河市');
INSERT INTO `g_base_region` VALUES ('1789', '212', '桦甸市');
INSERT INTO `g_base_region` VALUES ('1790', '212', '舒兰市');
INSERT INTO `g_base_region` VALUES ('1791', '212', '磐石市');
INSERT INTO `g_base_region` VALUES ('1792', '212', '永吉县');
INSERT INTO `g_base_region` VALUES ('1793', '213', '洮北区');
INSERT INTO `g_base_region` VALUES ('1794', '213', '洮南市');
INSERT INTO `g_base_region` VALUES ('1795', '213', '大安市');
INSERT INTO `g_base_region` VALUES ('1796', '213', '镇赉县');
INSERT INTO `g_base_region` VALUES ('1797', '213', '通榆县');
INSERT INTO `g_base_region` VALUES ('1798', '214', '江源区');
INSERT INTO `g_base_region` VALUES ('1799', '214', '八道江区');
INSERT INTO `g_base_region` VALUES ('1800', '214', '长白');
INSERT INTO `g_base_region` VALUES ('1801', '214', '临江市');
INSERT INTO `g_base_region` VALUES ('1802', '214', '抚松县');
INSERT INTO `g_base_region` VALUES ('1803', '214', '靖宇县');
INSERT INTO `g_base_region` VALUES ('1804', '215', '龙山区');
INSERT INTO `g_base_region` VALUES ('1805', '215', '西安区');
INSERT INTO `g_base_region` VALUES ('1806', '215', '东丰县');
INSERT INTO `g_base_region` VALUES ('1807', '215', '东辽县');
INSERT INTO `g_base_region` VALUES ('1808', '216', '铁西区');
INSERT INTO `g_base_region` VALUES ('1809', '216', '铁东区');
INSERT INTO `g_base_region` VALUES ('1810', '216', '伊通');
INSERT INTO `g_base_region` VALUES ('1811', '216', '公主岭市');
INSERT INTO `g_base_region` VALUES ('1812', '216', '双辽市');
INSERT INTO `g_base_region` VALUES ('1813', '216', '梨树县');
INSERT INTO `g_base_region` VALUES ('1814', '217', '前郭尔罗斯');
INSERT INTO `g_base_region` VALUES ('1815', '217', '宁江区');
INSERT INTO `g_base_region` VALUES ('1816', '217', '长岭县');
INSERT INTO `g_base_region` VALUES ('1817', '217', '乾安县');
INSERT INTO `g_base_region` VALUES ('1818', '217', '扶余县');
INSERT INTO `g_base_region` VALUES ('1819', '218', '东昌区');
INSERT INTO `g_base_region` VALUES ('1820', '218', '二道江区');
INSERT INTO `g_base_region` VALUES ('1821', '218', '梅河口市');
INSERT INTO `g_base_region` VALUES ('1822', '218', '集安市');
INSERT INTO `g_base_region` VALUES ('1823', '218', '通化县');
INSERT INTO `g_base_region` VALUES ('1824', '218', '辉南县');
INSERT INTO `g_base_region` VALUES ('1825', '218', '柳河县');
INSERT INTO `g_base_region` VALUES ('1826', '219', '延吉市');
INSERT INTO `g_base_region` VALUES ('1827', '219', '图们市');
INSERT INTO `g_base_region` VALUES ('1828', '219', '敦化市');
INSERT INTO `g_base_region` VALUES ('1829', '219', '珲春市');
INSERT INTO `g_base_region` VALUES ('1830', '219', '龙井市');
INSERT INTO `g_base_region` VALUES ('1831', '219', '和龙市');
INSERT INTO `g_base_region` VALUES ('1832', '219', '安图县');
INSERT INTO `g_base_region` VALUES ('1833', '219', '汪清县');
INSERT INTO `g_base_region` VALUES ('1834', '220', '玄武区');
INSERT INTO `g_base_region` VALUES ('1835', '220', '鼓楼区');
INSERT INTO `g_base_region` VALUES ('1836', '220', '白下区');
INSERT INTO `g_base_region` VALUES ('1837', '220', '建邺区');
INSERT INTO `g_base_region` VALUES ('1838', '220', '秦淮区');
INSERT INTO `g_base_region` VALUES ('1839', '220', '雨花台区');
INSERT INTO `g_base_region` VALUES ('1840', '220', '下关区');
INSERT INTO `g_base_region` VALUES ('1841', '220', '栖霞区');
INSERT INTO `g_base_region` VALUES ('1842', '220', '浦口区');
INSERT INTO `g_base_region` VALUES ('1843', '220', '江宁区');
INSERT INTO `g_base_region` VALUES ('1844', '220', '六合区');
INSERT INTO `g_base_region` VALUES ('1845', '220', '溧水县');
INSERT INTO `g_base_region` VALUES ('1846', '220', '高淳县');
INSERT INTO `g_base_region` VALUES ('1847', '221', '沧浪区');
INSERT INTO `g_base_region` VALUES ('1848', '221', '金阊区');
INSERT INTO `g_base_region` VALUES ('1849', '221', '平江区');
INSERT INTO `g_base_region` VALUES ('1850', '221', '虎丘区');
INSERT INTO `g_base_region` VALUES ('1851', '221', '吴中区');
INSERT INTO `g_base_region` VALUES ('1852', '221', '相城区');
INSERT INTO `g_base_region` VALUES ('1853', '221', '园区');
INSERT INTO `g_base_region` VALUES ('1854', '221', '新区');
INSERT INTO `g_base_region` VALUES ('1855', '221', '常熟市');
INSERT INTO `g_base_region` VALUES ('1856', '221', '张家港市');
INSERT INTO `g_base_region` VALUES ('1857', '221', '玉山镇');
INSERT INTO `g_base_region` VALUES ('1858', '221', '巴城镇');
INSERT INTO `g_base_region` VALUES ('1859', '221', '周市镇');
INSERT INTO `g_base_region` VALUES ('1860', '221', '陆家镇');
INSERT INTO `g_base_region` VALUES ('1861', '221', '花桥镇');
INSERT INTO `g_base_region` VALUES ('1862', '221', '淀山湖镇');
INSERT INTO `g_base_region` VALUES ('1863', '221', '张浦镇');
INSERT INTO `g_base_region` VALUES ('1864', '221', '周庄镇');
INSERT INTO `g_base_region` VALUES ('1865', '221', '千灯镇');
INSERT INTO `g_base_region` VALUES ('1866', '221', '锦溪镇');
INSERT INTO `g_base_region` VALUES ('1867', '221', '开发区');
INSERT INTO `g_base_region` VALUES ('1868', '221', '吴江市');
INSERT INTO `g_base_region` VALUES ('1869', '221', '太仓市');
INSERT INTO `g_base_region` VALUES ('1870', '222', '崇安区');
INSERT INTO `g_base_region` VALUES ('1871', '222', '北塘区');
INSERT INTO `g_base_region` VALUES ('1872', '222', '南长区');
INSERT INTO `g_base_region` VALUES ('1873', '222', '锡山区');
INSERT INTO `g_base_region` VALUES ('1874', '222', '惠山区');
INSERT INTO `g_base_region` VALUES ('1875', '222', '滨湖区');
INSERT INTO `g_base_region` VALUES ('1876', '222', '新区');
INSERT INTO `g_base_region` VALUES ('1877', '222', '江阴市');
INSERT INTO `g_base_region` VALUES ('1878', '222', '宜兴市');
INSERT INTO `g_base_region` VALUES ('1879', '223', '天宁区');
INSERT INTO `g_base_region` VALUES ('1880', '223', '钟楼区');
INSERT INTO `g_base_region` VALUES ('1881', '223', '戚墅堰区');
INSERT INTO `g_base_region` VALUES ('1882', '223', '郊区');
INSERT INTO `g_base_region` VALUES ('1883', '223', '新北区');
INSERT INTO `g_base_region` VALUES ('1884', '223', '武进区');
INSERT INTO `g_base_region` VALUES ('1885', '223', '溧阳市');
INSERT INTO `g_base_region` VALUES ('1886', '223', '金坛市');
INSERT INTO `g_base_region` VALUES ('1887', '224', '清河区');
INSERT INTO `g_base_region` VALUES ('1888', '224', '清浦区');
INSERT INTO `g_base_region` VALUES ('1889', '224', '楚州区');
INSERT INTO `g_base_region` VALUES ('1890', '224', '淮阴区');
INSERT INTO `g_base_region` VALUES ('1891', '224', '涟水县');
INSERT INTO `g_base_region` VALUES ('1892', '224', '洪泽县');
INSERT INTO `g_base_region` VALUES ('1893', '224', '盱眙县');
INSERT INTO `g_base_region` VALUES ('1894', '224', '金湖县');
INSERT INTO `g_base_region` VALUES ('1895', '225', '新浦区');
INSERT INTO `g_base_region` VALUES ('1896', '225', '连云区');
INSERT INTO `g_base_region` VALUES ('1897', '225', '海州区');
INSERT INTO `g_base_region` VALUES ('1898', '225', '赣榆县');
INSERT INTO `g_base_region` VALUES ('1899', '225', '东海县');
INSERT INTO `g_base_region` VALUES ('1900', '225', '灌云县');
INSERT INTO `g_base_region` VALUES ('1901', '225', '灌南县');
INSERT INTO `g_base_region` VALUES ('1902', '226', '崇川区');
INSERT INTO `g_base_region` VALUES ('1903', '226', '港闸区');
INSERT INTO `g_base_region` VALUES ('1904', '226', '经济开发区');
INSERT INTO `g_base_region` VALUES ('1905', '226', '启东市');
INSERT INTO `g_base_region` VALUES ('1906', '226', '如皋市');
INSERT INTO `g_base_region` VALUES ('1907', '226', '通州市');
INSERT INTO `g_base_region` VALUES ('1908', '226', '海门市');
INSERT INTO `g_base_region` VALUES ('1909', '226', '海安县');
INSERT INTO `g_base_region` VALUES ('1910', '226', '如东县');
INSERT INTO `g_base_region` VALUES ('1911', '227', '宿城区');
INSERT INTO `g_base_region` VALUES ('1912', '227', '宿豫区');
INSERT INTO `g_base_region` VALUES ('1913', '227', '宿豫县');
INSERT INTO `g_base_region` VALUES ('1914', '227', '沭阳县');
INSERT INTO `g_base_region` VALUES ('1915', '227', '泗阳县');
INSERT INTO `g_base_region` VALUES ('1916', '227', '泗洪县');
INSERT INTO `g_base_region` VALUES ('1917', '228', '海陵区');
INSERT INTO `g_base_region` VALUES ('1918', '228', '高港区');
INSERT INTO `g_base_region` VALUES ('1919', '228', '兴化市');
INSERT INTO `g_base_region` VALUES ('1920', '228', '靖江市');
INSERT INTO `g_base_region` VALUES ('1921', '228', '泰兴市');
INSERT INTO `g_base_region` VALUES ('1922', '228', '姜堰市');
INSERT INTO `g_base_region` VALUES ('1923', '229', '云龙区');
INSERT INTO `g_base_region` VALUES ('1924', '229', '鼓楼区');
INSERT INTO `g_base_region` VALUES ('1925', '229', '九里区');
INSERT INTO `g_base_region` VALUES ('1926', '229', '贾汪区');
INSERT INTO `g_base_region` VALUES ('1927', '229', '泉山区');
INSERT INTO `g_base_region` VALUES ('1928', '229', '新沂市');
INSERT INTO `g_base_region` VALUES ('1929', '229', '邳州市');
INSERT INTO `g_base_region` VALUES ('1930', '229', '丰县');
INSERT INTO `g_base_region` VALUES ('1931', '229', '沛县');
INSERT INTO `g_base_region` VALUES ('1932', '229', '铜山县');
INSERT INTO `g_base_region` VALUES ('1933', '229', '睢宁县');
INSERT INTO `g_base_region` VALUES ('1934', '230', '城区');
INSERT INTO `g_base_region` VALUES ('1935', '230', '亭湖区');
INSERT INTO `g_base_region` VALUES ('1936', '230', '盐都区');
INSERT INTO `g_base_region` VALUES ('1937', '230', '盐都县');
INSERT INTO `g_base_region` VALUES ('1938', '230', '东台市');
INSERT INTO `g_base_region` VALUES ('1939', '230', '大丰市');
INSERT INTO `g_base_region` VALUES ('1940', '230', '响水县');
INSERT INTO `g_base_region` VALUES ('1941', '230', '滨海县');
INSERT INTO `g_base_region` VALUES ('1942', '230', '阜宁县');
INSERT INTO `g_base_region` VALUES ('1943', '230', '射阳县');
INSERT INTO `g_base_region` VALUES ('1944', '230', '建湖县');
INSERT INTO `g_base_region` VALUES ('1945', '231', '广陵区');
INSERT INTO `g_base_region` VALUES ('1946', '231', '维扬区');
INSERT INTO `g_base_region` VALUES ('1947', '231', '邗江区');
INSERT INTO `g_base_region` VALUES ('1948', '231', '仪征市');
INSERT INTO `g_base_region` VALUES ('1949', '231', '高邮市');
INSERT INTO `g_base_region` VALUES ('1950', '231', '江都市');
INSERT INTO `g_base_region` VALUES ('1951', '231', '宝应县');
INSERT INTO `g_base_region` VALUES ('1952', '232', '京口区');
INSERT INTO `g_base_region` VALUES ('1953', '232', '润州区');
INSERT INTO `g_base_region` VALUES ('1954', '232', '丹徒区');
INSERT INTO `g_base_region` VALUES ('1955', '232', '丹阳市');
INSERT INTO `g_base_region` VALUES ('1956', '232', '扬中市');
INSERT INTO `g_base_region` VALUES ('1957', '232', '句容市');
INSERT INTO `g_base_region` VALUES ('1958', '233', '东湖区');
INSERT INTO `g_base_region` VALUES ('1959', '233', '西湖区');
INSERT INTO `g_base_region` VALUES ('1960', '233', '青云谱区');
INSERT INTO `g_base_region` VALUES ('1961', '233', '湾里区');
INSERT INTO `g_base_region` VALUES ('1962', '233', '青山湖区');
INSERT INTO `g_base_region` VALUES ('1963', '233', '红谷滩新区');
INSERT INTO `g_base_region` VALUES ('1964', '233', '昌北区');
INSERT INTO `g_base_region` VALUES ('1965', '233', '高新区');
INSERT INTO `g_base_region` VALUES ('1966', '233', '南昌县');
INSERT INTO `g_base_region` VALUES ('1967', '233', '新建县');
INSERT INTO `g_base_region` VALUES ('1968', '233', '安义县');
INSERT INTO `g_base_region` VALUES ('1969', '233', '进贤县');
INSERT INTO `g_base_region` VALUES ('1970', '234', '临川区');
INSERT INTO `g_base_region` VALUES ('1971', '234', '南城县');
INSERT INTO `g_base_region` VALUES ('1972', '234', '黎川县');
INSERT INTO `g_base_region` VALUES ('1973', '234', '南丰县');
INSERT INTO `g_base_region` VALUES ('1974', '234', '崇仁县');
INSERT INTO `g_base_region` VALUES ('1975', '234', '乐安县');
INSERT INTO `g_base_region` VALUES ('1976', '234', '宜黄县');
INSERT INTO `g_base_region` VALUES ('1977', '234', '金溪县');
INSERT INTO `g_base_region` VALUES ('1978', '234', '资溪县');
INSERT INTO `g_base_region` VALUES ('1979', '234', '东乡县');
INSERT INTO `g_base_region` VALUES ('1980', '234', '广昌县');
INSERT INTO `g_base_region` VALUES ('1981', '235', '章贡区');
INSERT INTO `g_base_region` VALUES ('1982', '235', '于都县');
INSERT INTO `g_base_region` VALUES ('1983', '235', '瑞金市');
INSERT INTO `g_base_region` VALUES ('1984', '235', '南康市');
INSERT INTO `g_base_region` VALUES ('1985', '235', '赣县');
INSERT INTO `g_base_region` VALUES ('1986', '235', '信丰县');
INSERT INTO `g_base_region` VALUES ('1987', '235', '大余县');
INSERT INTO `g_base_region` VALUES ('1988', '235', '上犹县');
INSERT INTO `g_base_region` VALUES ('1989', '235', '崇义县');
INSERT INTO `g_base_region` VALUES ('1990', '235', '安远县');
INSERT INTO `g_base_region` VALUES ('1991', '235', '龙南县');
INSERT INTO `g_base_region` VALUES ('1992', '235', '定南县');
INSERT INTO `g_base_region` VALUES ('1993', '235', '全南县');
INSERT INTO `g_base_region` VALUES ('1994', '235', '宁都县');
INSERT INTO `g_base_region` VALUES ('1995', '235', '兴国县');
INSERT INTO `g_base_region` VALUES ('1996', '235', '会昌县');
INSERT INTO `g_base_region` VALUES ('1997', '235', '寻乌县');
INSERT INTO `g_base_region` VALUES ('1998', '235', '石城县');
INSERT INTO `g_base_region` VALUES ('1999', '236', '安福县');
INSERT INTO `g_base_region` VALUES ('2000', '236', '吉州区');
INSERT INTO `g_base_region` VALUES ('2001', '236', '青原区');
INSERT INTO `g_base_region` VALUES ('2002', '236', '井冈山市');
INSERT INTO `g_base_region` VALUES ('2003', '236', '吉安县');
INSERT INTO `g_base_region` VALUES ('2004', '236', '吉水县');
INSERT INTO `g_base_region` VALUES ('2005', '236', '峡江县');
INSERT INTO `g_base_region` VALUES ('2006', '236', '新干县');
INSERT INTO `g_base_region` VALUES ('2007', '236', '永丰县');
INSERT INTO `g_base_region` VALUES ('2008', '236', '泰和县');
INSERT INTO `g_base_region` VALUES ('2009', '236', '遂川县');
INSERT INTO `g_base_region` VALUES ('2010', '236', '万安县');
INSERT INTO `g_base_region` VALUES ('2011', '236', '永新县');
INSERT INTO `g_base_region` VALUES ('2012', '237', '珠山区');
INSERT INTO `g_base_region` VALUES ('2013', '237', '昌江区');
INSERT INTO `g_base_region` VALUES ('2014', '237', '乐平市');
INSERT INTO `g_base_region` VALUES ('2015', '237', '浮梁县');
INSERT INTO `g_base_region` VALUES ('2016', '238', '浔阳区');
INSERT INTO `g_base_region` VALUES ('2017', '238', '庐山区');
INSERT INTO `g_base_region` VALUES ('2018', '238', '瑞昌市');
INSERT INTO `g_base_region` VALUES ('2019', '238', '九江县');
INSERT INTO `g_base_region` VALUES ('2020', '238', '武宁县');
INSERT INTO `g_base_region` VALUES ('2021', '238', '修水县');
INSERT INTO `g_base_region` VALUES ('2022', '238', '永修县');
INSERT INTO `g_base_region` VALUES ('2023', '238', '德安县');
INSERT INTO `g_base_region` VALUES ('2024', '238', '星子县');
INSERT INTO `g_base_region` VALUES ('2025', '238', '都昌县');
INSERT INTO `g_base_region` VALUES ('2026', '238', '湖口县');
INSERT INTO `g_base_region` VALUES ('2027', '238', '彭泽县');
INSERT INTO `g_base_region` VALUES ('2028', '239', '安源区');
INSERT INTO `g_base_region` VALUES ('2029', '239', '湘东区');
INSERT INTO `g_base_region` VALUES ('2030', '239', '莲花县');
INSERT INTO `g_base_region` VALUES ('2031', '239', '芦溪县');
INSERT INTO `g_base_region` VALUES ('2032', '239', '上栗县');
INSERT INTO `g_base_region` VALUES ('2033', '240', '信州区');
INSERT INTO `g_base_region` VALUES ('2034', '240', '德兴市');
INSERT INTO `g_base_region` VALUES ('2035', '240', '上饶县');
INSERT INTO `g_base_region` VALUES ('2036', '240', '广丰县');
INSERT INTO `g_base_region` VALUES ('2037', '240', '玉山县');
INSERT INTO `g_base_region` VALUES ('2038', '240', '铅山县');
INSERT INTO `g_base_region` VALUES ('2039', '240', '横峰县');
INSERT INTO `g_base_region` VALUES ('2040', '240', '弋阳县');
INSERT INTO `g_base_region` VALUES ('2041', '240', '余干县');
INSERT INTO `g_base_region` VALUES ('2042', '240', '波阳县');
INSERT INTO `g_base_region` VALUES ('2043', '240', '万年县');
INSERT INTO `g_base_region` VALUES ('2044', '240', '婺源县');
INSERT INTO `g_base_region` VALUES ('2045', '241', '渝水区');
INSERT INTO `g_base_region` VALUES ('2046', '241', '分宜县');
INSERT INTO `g_base_region` VALUES ('2047', '242', '袁州区');
INSERT INTO `g_base_region` VALUES ('2048', '242', '丰城市');
INSERT INTO `g_base_region` VALUES ('2049', '242', '樟树市');
INSERT INTO `g_base_region` VALUES ('2050', '242', '高安市');
INSERT INTO `g_base_region` VALUES ('2051', '242', '奉新县');
INSERT INTO `g_base_region` VALUES ('2052', '242', '万载县');
INSERT INTO `g_base_region` VALUES ('2053', '242', '上高县');
INSERT INTO `g_base_region` VALUES ('2054', '242', '宜丰县');
INSERT INTO `g_base_region` VALUES ('2055', '242', '靖安县');
INSERT INTO `g_base_region` VALUES ('2056', '242', '铜鼓县');
INSERT INTO `g_base_region` VALUES ('2057', '243', '月湖区');
INSERT INTO `g_base_region` VALUES ('2058', '243', '贵溪市');
INSERT INTO `g_base_region` VALUES ('2059', '243', '余江县');
INSERT INTO `g_base_region` VALUES ('2060', '244', '沈河区');
INSERT INTO `g_base_region` VALUES ('2061', '244', '皇姑区');
INSERT INTO `g_base_region` VALUES ('2062', '244', '和平区');
INSERT INTO `g_base_region` VALUES ('2063', '244', '大东区');
INSERT INTO `g_base_region` VALUES ('2064', '244', '铁西区');
INSERT INTO `g_base_region` VALUES ('2065', '244', '苏家屯区');
INSERT INTO `g_base_region` VALUES ('2066', '244', '东陵区');
INSERT INTO `g_base_region` VALUES ('2067', '244', '沈北新区');
INSERT INTO `g_base_region` VALUES ('2068', '244', '于洪区');
INSERT INTO `g_base_region` VALUES ('2069', '244', '浑南新区');
INSERT INTO `g_base_region` VALUES ('2070', '244', '新民市');
INSERT INTO `g_base_region` VALUES ('2071', '244', '辽中县');
INSERT INTO `g_base_region` VALUES ('2072', '244', '康平县');
INSERT INTO `g_base_region` VALUES ('2073', '244', '法库县');
INSERT INTO `g_base_region` VALUES ('2074', '245', '西岗区');
INSERT INTO `g_base_region` VALUES ('2075', '245', '中山区');
INSERT INTO `g_base_region` VALUES ('2076', '245', '沙河口区');
INSERT INTO `g_base_region` VALUES ('2077', '245', '甘井子区');
INSERT INTO `g_base_region` VALUES ('2078', '245', '旅顺口区');
INSERT INTO `g_base_region` VALUES ('2079', '245', '金州区');
INSERT INTO `g_base_region` VALUES ('2080', '245', '开发区');
INSERT INTO `g_base_region` VALUES ('2081', '245', '瓦房店市');
INSERT INTO `g_base_region` VALUES ('2082', '245', '普兰店市');
INSERT INTO `g_base_region` VALUES ('2083', '245', '庄河市');
INSERT INTO `g_base_region` VALUES ('2084', '245', '长海县');
INSERT INTO `g_base_region` VALUES ('2085', '246', '铁东区');
INSERT INTO `g_base_region` VALUES ('2086', '246', '铁西区');
INSERT INTO `g_base_region` VALUES ('2087', '246', '立山区');
INSERT INTO `g_base_region` VALUES ('2088', '246', '千山区');
INSERT INTO `g_base_region` VALUES ('2089', '246', '岫岩');
INSERT INTO `g_base_region` VALUES ('2090', '246', '海城市');
INSERT INTO `g_base_region` VALUES ('2091', '246', '台安县');
INSERT INTO `g_base_region` VALUES ('2092', '247', '本溪');
INSERT INTO `g_base_region` VALUES ('2093', '247', '平山区');
INSERT INTO `g_base_region` VALUES ('2094', '247', '明山区');
INSERT INTO `g_base_region` VALUES ('2095', '247', '溪湖区');
INSERT INTO `g_base_region` VALUES ('2096', '247', '南芬区');
INSERT INTO `g_base_region` VALUES ('2097', '247', '桓仁');
INSERT INTO `g_base_region` VALUES ('2098', '248', '双塔区');
INSERT INTO `g_base_region` VALUES ('2099', '248', '龙城区');
INSERT INTO `g_base_region` VALUES ('2100', '248', '喀喇沁左翼蒙古族自治县');
INSERT INTO `g_base_region` VALUES ('2101', '248', '北票市');
INSERT INTO `g_base_region` VALUES ('2102', '248', '凌源市');
INSERT INTO `g_base_region` VALUES ('2103', '248', '朝阳县');
INSERT INTO `g_base_region` VALUES ('2104', '248', '建平县');
INSERT INTO `g_base_region` VALUES ('2105', '249', '振兴区');
INSERT INTO `g_base_region` VALUES ('2106', '249', '元宝区');
INSERT INTO `g_base_region` VALUES ('2107', '249', '振安区');
INSERT INTO `g_base_region` VALUES ('2108', '249', '宽甸');
INSERT INTO `g_base_region` VALUES ('2109', '249', '东港市');
INSERT INTO `g_base_region` VALUES ('2110', '249', '凤城市');
INSERT INTO `g_base_region` VALUES ('2111', '250', '顺城区');
INSERT INTO `g_base_region` VALUES ('2112', '250', '新抚区');
INSERT INTO `g_base_region` VALUES ('2113', '250', '东洲区');
INSERT INTO `g_base_region` VALUES ('2114', '250', '望花区');
INSERT INTO `g_base_region` VALUES ('2115', '250', '清原');
INSERT INTO `g_base_region` VALUES ('2116', '250', '新宾');
INSERT INTO `g_base_region` VALUES ('2117', '250', '抚顺县');
INSERT INTO `g_base_region` VALUES ('2118', '251', '阜新');
INSERT INTO `g_base_region` VALUES ('2119', '251', '海州区');
INSERT INTO `g_base_region` VALUES ('2120', '251', '新邱区');
INSERT INTO `g_base_region` VALUES ('2121', '251', '太平区');
INSERT INTO `g_base_region` VALUES ('2122', '251', '清河门区');
INSERT INTO `g_base_region` VALUES ('2123', '251', '细河区');
INSERT INTO `g_base_region` VALUES ('2124', '251', '彰武县');
INSERT INTO `g_base_region` VALUES ('2125', '252', '龙港区');
INSERT INTO `g_base_region` VALUES ('2126', '252', '南票区');
INSERT INTO `g_base_region` VALUES ('2127', '252', '连山区');
INSERT INTO `g_base_region` VALUES ('2128', '252', '兴城市');
INSERT INTO `g_base_region` VALUES ('2129', '252', '绥中县');
INSERT INTO `g_base_region` VALUES ('2130', '252', '建昌县');
INSERT INTO `g_base_region` VALUES ('2131', '253', '太和区');
INSERT INTO `g_base_region` VALUES ('2132', '253', '古塔区');
INSERT INTO `g_base_region` VALUES ('2133', '253', '凌河区');
INSERT INTO `g_base_region` VALUES ('2134', '253', '凌海市');
INSERT INTO `g_base_region` VALUES ('2135', '253', '北镇市');
INSERT INTO `g_base_region` VALUES ('2136', '253', '黑山县');
INSERT INTO `g_base_region` VALUES ('2137', '253', '义县');
INSERT INTO `g_base_region` VALUES ('2138', '254', '白塔区');
INSERT INTO `g_base_region` VALUES ('2139', '254', '文圣区');
INSERT INTO `g_base_region` VALUES ('2140', '254', '宏伟区');
INSERT INTO `g_base_region` VALUES ('2141', '254', '太子河区');
INSERT INTO `g_base_region` VALUES ('2142', '254', '弓长岭区');
INSERT INTO `g_base_region` VALUES ('2143', '254', '灯塔市');
INSERT INTO `g_base_region` VALUES ('2144', '254', '辽阳县');
INSERT INTO `g_base_region` VALUES ('2145', '255', '双台子区');
INSERT INTO `g_base_region` VALUES ('2146', '255', '兴隆台区');
INSERT INTO `g_base_region` VALUES ('2147', '255', '大洼县');
INSERT INTO `g_base_region` VALUES ('2148', '255', '盘山县');
INSERT INTO `g_base_region` VALUES ('2149', '256', '银州区');
INSERT INTO `g_base_region` VALUES ('2150', '256', '清河区');
INSERT INTO `g_base_region` VALUES ('2151', '256', '调兵山市');
INSERT INTO `g_base_region` VALUES ('2152', '256', '开原市');
INSERT INTO `g_base_region` VALUES ('2153', '256', '铁岭县');
INSERT INTO `g_base_region` VALUES ('2154', '256', '西丰县');
INSERT INTO `g_base_region` VALUES ('2155', '256', '昌图县');
INSERT INTO `g_base_region` VALUES ('2156', '257', '站前区');
INSERT INTO `g_base_region` VALUES ('2157', '257', '西市区');
INSERT INTO `g_base_region` VALUES ('2158', '257', '鲅鱼圈区');
INSERT INTO `g_base_region` VALUES ('2159', '257', '老边区');
INSERT INTO `g_base_region` VALUES ('2160', '257', '盖州市');
INSERT INTO `g_base_region` VALUES ('2161', '257', '大石桥市');
INSERT INTO `g_base_region` VALUES ('2162', '258', '回民区');
INSERT INTO `g_base_region` VALUES ('2163', '258', '玉泉区');
INSERT INTO `g_base_region` VALUES ('2164', '258', '新城区');
INSERT INTO `g_base_region` VALUES ('2165', '258', '赛罕区');
INSERT INTO `g_base_region` VALUES ('2166', '258', '清水河县');
INSERT INTO `g_base_region` VALUES ('2167', '258', '土默特左旗');
INSERT INTO `g_base_region` VALUES ('2168', '258', '托克托县');
INSERT INTO `g_base_region` VALUES ('2169', '258', '和林格尔县');
INSERT INTO `g_base_region` VALUES ('2170', '258', '武川县');
INSERT INTO `g_base_region` VALUES ('2171', '259', '阿拉善左旗');
INSERT INTO `g_base_region` VALUES ('2172', '259', '阿拉善右旗');
INSERT INTO `g_base_region` VALUES ('2173', '259', '额济纳旗');
INSERT INTO `g_base_region` VALUES ('2174', '260', '临河区');
INSERT INTO `g_base_region` VALUES ('2175', '260', '五原县');
INSERT INTO `g_base_region` VALUES ('2176', '260', '磴口县');
INSERT INTO `g_base_region` VALUES ('2177', '260', '乌拉特前旗');
INSERT INTO `g_base_region` VALUES ('2178', '260', '乌拉特中旗');
INSERT INTO `g_base_region` VALUES ('2179', '260', '乌拉特后旗');
INSERT INTO `g_base_region` VALUES ('2180', '260', '杭锦后旗');
INSERT INTO `g_base_region` VALUES ('2181', '261', '昆都仑区');
INSERT INTO `g_base_region` VALUES ('2182', '261', '青山区');
INSERT INTO `g_base_region` VALUES ('2183', '261', '东河区');
INSERT INTO `g_base_region` VALUES ('2184', '261', '九原区');
INSERT INTO `g_base_region` VALUES ('2185', '261', '石拐区');
INSERT INTO `g_base_region` VALUES ('2186', '261', '白云矿区');
INSERT INTO `g_base_region` VALUES ('2187', '261', '土默特右旗');
INSERT INTO `g_base_region` VALUES ('2188', '261', '固阳县');
INSERT INTO `g_base_region` VALUES ('2189', '261', '达尔罕茂明安联合旗');
INSERT INTO `g_base_region` VALUES ('2190', '262', '红山区');
INSERT INTO `g_base_region` VALUES ('2191', '262', '元宝山区');
INSERT INTO `g_base_region` VALUES ('2192', '262', '松山区');
INSERT INTO `g_base_region` VALUES ('2193', '262', '阿鲁科尔沁旗');
INSERT INTO `g_base_region` VALUES ('2194', '262', '巴林左旗');
INSERT INTO `g_base_region` VALUES ('2195', '262', '巴林右旗');
INSERT INTO `g_base_region` VALUES ('2196', '262', '林西县');
INSERT INTO `g_base_region` VALUES ('2197', '262', '克什克腾旗');
INSERT INTO `g_base_region` VALUES ('2198', '262', '翁牛特旗');
INSERT INTO `g_base_region` VALUES ('2199', '262', '喀喇沁旗');
INSERT INTO `g_base_region` VALUES ('2200', '262', '宁城县');
INSERT INTO `g_base_region` VALUES ('2201', '262', '敖汉旗');
INSERT INTO `g_base_region` VALUES ('2202', '263', '东胜区');
INSERT INTO `g_base_region` VALUES ('2203', '263', '达拉特旗');
INSERT INTO `g_base_region` VALUES ('2204', '263', '准格尔旗');
INSERT INTO `g_base_region` VALUES ('2205', '263', '鄂托克前旗');
INSERT INTO `g_base_region` VALUES ('2206', '263', '鄂托克旗');
INSERT INTO `g_base_region` VALUES ('2207', '263', '杭锦旗');
INSERT INTO `g_base_region` VALUES ('2208', '263', '乌审旗');
INSERT INTO `g_base_region` VALUES ('2209', '263', '伊金霍洛旗');
INSERT INTO `g_base_region` VALUES ('2210', '264', '海拉尔区');
INSERT INTO `g_base_region` VALUES ('2211', '264', '莫力达瓦');
INSERT INTO `g_base_region` VALUES ('2212', '264', '满洲里市');
INSERT INTO `g_base_region` VALUES ('2213', '264', '牙克石市');
INSERT INTO `g_base_region` VALUES ('2214', '264', '扎兰屯市');
INSERT INTO `g_base_region` VALUES ('2215', '264', '额尔古纳市');
INSERT INTO `g_base_region` VALUES ('2216', '264', '根河市');
INSERT INTO `g_base_region` VALUES ('2217', '264', '阿荣旗');
INSERT INTO `g_base_region` VALUES ('2218', '264', '鄂伦春自治旗');
INSERT INTO `g_base_region` VALUES ('2219', '264', '鄂温克族自治旗');
INSERT INTO `g_base_region` VALUES ('2220', '264', '陈巴尔虎旗');
INSERT INTO `g_base_region` VALUES ('2221', '264', '新巴尔虎左旗');
INSERT INTO `g_base_region` VALUES ('2222', '264', '新巴尔虎右旗');
INSERT INTO `g_base_region` VALUES ('2223', '265', '科尔沁区');
INSERT INTO `g_base_region` VALUES ('2224', '265', '霍林郭勒市');
INSERT INTO `g_base_region` VALUES ('2225', '265', '科尔沁左翼中旗');
INSERT INTO `g_base_region` VALUES ('2226', '265', '科尔沁左翼后旗');
INSERT INTO `g_base_region` VALUES ('2227', '265', '开鲁县');
INSERT INTO `g_base_region` VALUES ('2228', '265', '库伦旗');
INSERT INTO `g_base_region` VALUES ('2229', '265', '奈曼旗');
INSERT INTO `g_base_region` VALUES ('2230', '265', '扎鲁特旗');
INSERT INTO `g_base_region` VALUES ('2231', '266', '海勃湾区');
INSERT INTO `g_base_region` VALUES ('2232', '266', '乌达区');
INSERT INTO `g_base_region` VALUES ('2233', '266', '海南区');
INSERT INTO `g_base_region` VALUES ('2234', '267', '化德县');
INSERT INTO `g_base_region` VALUES ('2235', '267', '集宁区');
INSERT INTO `g_base_region` VALUES ('2236', '267', '丰镇市');
INSERT INTO `g_base_region` VALUES ('2237', '267', '卓资县');
INSERT INTO `g_base_region` VALUES ('2238', '267', '商都县');
INSERT INTO `g_base_region` VALUES ('2239', '267', '兴和县');
INSERT INTO `g_base_region` VALUES ('2240', '267', '凉城县');
INSERT INTO `g_base_region` VALUES ('2241', '267', '察哈尔右翼前旗');
INSERT INTO `g_base_region` VALUES ('2242', '267', '察哈尔右翼中旗');
INSERT INTO `g_base_region` VALUES ('2243', '267', '察哈尔右翼后旗');
INSERT INTO `g_base_region` VALUES ('2244', '267', '四子王旗');
INSERT INTO `g_base_region` VALUES ('2245', '268', '二连浩特市');
INSERT INTO `g_base_region` VALUES ('2246', '268', '锡林浩特市');
INSERT INTO `g_base_region` VALUES ('2247', '268', '阿巴嘎旗');
INSERT INTO `g_base_region` VALUES ('2248', '268', '苏尼特左旗');
INSERT INTO `g_base_region` VALUES ('2249', '268', '苏尼特右旗');
INSERT INTO `g_base_region` VALUES ('2250', '268', '东乌珠穆沁旗');
INSERT INTO `g_base_region` VALUES ('2251', '268', '西乌珠穆沁旗');
INSERT INTO `g_base_region` VALUES ('2252', '268', '太仆寺旗');
INSERT INTO `g_base_region` VALUES ('2253', '268', '镶黄旗');
INSERT INTO `g_base_region` VALUES ('2254', '268', '正镶白旗');
INSERT INTO `g_base_region` VALUES ('2255', '268', '正蓝旗');
INSERT INTO `g_base_region` VALUES ('2256', '268', '多伦县');
INSERT INTO `g_base_region` VALUES ('2257', '269', '乌兰浩特市');
INSERT INTO `g_base_region` VALUES ('2258', '269', '阿尔山市');
INSERT INTO `g_base_region` VALUES ('2259', '269', '科尔沁右翼前旗');
INSERT INTO `g_base_region` VALUES ('2260', '269', '科尔沁右翼中旗');
INSERT INTO `g_base_region` VALUES ('2261', '269', '扎赉特旗');
INSERT INTO `g_base_region` VALUES ('2262', '269', '突泉县');
INSERT INTO `g_base_region` VALUES ('2263', '270', '西夏区');
INSERT INTO `g_base_region` VALUES ('2264', '270', '金凤区');
INSERT INTO `g_base_region` VALUES ('2265', '270', '兴庆区');
INSERT INTO `g_base_region` VALUES ('2266', '270', '灵武市');
INSERT INTO `g_base_region` VALUES ('2267', '270', '永宁县');
INSERT INTO `g_base_region` VALUES ('2268', '270', '贺兰县');
INSERT INTO `g_base_region` VALUES ('2269', '271', '原州区');
INSERT INTO `g_base_region` VALUES ('2270', '271', '海原县');
INSERT INTO `g_base_region` VALUES ('2271', '271', '西吉县');
INSERT INTO `g_base_region` VALUES ('2272', '271', '隆德县');
INSERT INTO `g_base_region` VALUES ('2273', '271', '泾源县');
INSERT INTO `g_base_region` VALUES ('2274', '271', '彭阳县');
INSERT INTO `g_base_region` VALUES ('2275', '272', '惠农县');
INSERT INTO `g_base_region` VALUES ('2276', '272', '大武口区');
INSERT INTO `g_base_region` VALUES ('2277', '272', '惠农区');
INSERT INTO `g_base_region` VALUES ('2278', '272', '陶乐县');
INSERT INTO `g_base_region` VALUES ('2279', '272', '平罗县');
INSERT INTO `g_base_region` VALUES ('2280', '273', '利通区');
INSERT INTO `g_base_region` VALUES ('2281', '273', '中卫县');
INSERT INTO `g_base_region` VALUES ('2282', '273', '青铜峡市');
INSERT INTO `g_base_region` VALUES ('2283', '273', '中宁县');
INSERT INTO `g_base_region` VALUES ('2284', '273', '盐池县');
INSERT INTO `g_base_region` VALUES ('2285', '273', '同心县');
INSERT INTO `g_base_region` VALUES ('2286', '274', '沙坡头区');
INSERT INTO `g_base_region` VALUES ('2287', '274', '海原县');
INSERT INTO `g_base_region` VALUES ('2288', '274', '中宁县');
INSERT INTO `g_base_region` VALUES ('2289', '275', '城中区');
INSERT INTO `g_base_region` VALUES ('2290', '275', '城东区');
INSERT INTO `g_base_region` VALUES ('2291', '275', '城西区');
INSERT INTO `g_base_region` VALUES ('2292', '275', '城北区');
INSERT INTO `g_base_region` VALUES ('2293', '275', '湟中县');
INSERT INTO `g_base_region` VALUES ('2294', '275', '湟源县');
INSERT INTO `g_base_region` VALUES ('2295', '275', '大通');
INSERT INTO `g_base_region` VALUES ('2296', '276', '玛沁县');
INSERT INTO `g_base_region` VALUES ('2297', '276', '班玛县');
INSERT INTO `g_base_region` VALUES ('2298', '276', '甘德县');
INSERT INTO `g_base_region` VALUES ('2299', '276', '达日县');
INSERT INTO `g_base_region` VALUES ('2300', '276', '久治县');
INSERT INTO `g_base_region` VALUES ('2301', '276', '玛多县');
INSERT INTO `g_base_region` VALUES ('2302', '277', '海晏县');
INSERT INTO `g_base_region` VALUES ('2303', '277', '祁连县');
INSERT INTO `g_base_region` VALUES ('2304', '277', '刚察县');
INSERT INTO `g_base_region` VALUES ('2305', '277', '门源');
INSERT INTO `g_base_region` VALUES ('2306', '278', '平安县');
INSERT INTO `g_base_region` VALUES ('2307', '278', '乐都县');
INSERT INTO `g_base_region` VALUES ('2308', '278', '民和');
INSERT INTO `g_base_region` VALUES ('2309', '278', '互助');
INSERT INTO `g_base_region` VALUES ('2310', '278', '化隆');
INSERT INTO `g_base_region` VALUES ('2311', '278', '循化');
INSERT INTO `g_base_region` VALUES ('2312', '279', '共和县');
INSERT INTO `g_base_region` VALUES ('2313', '279', '同德县');
INSERT INTO `g_base_region` VALUES ('2314', '279', '贵德县');
INSERT INTO `g_base_region` VALUES ('2315', '279', '兴海县');
INSERT INTO `g_base_region` VALUES ('2316', '279', '贵南县');
INSERT INTO `g_base_region` VALUES ('2317', '280', '德令哈市');
INSERT INTO `g_base_region` VALUES ('2318', '280', '格尔木市');
INSERT INTO `g_base_region` VALUES ('2319', '280', '乌兰县');
INSERT INTO `g_base_region` VALUES ('2320', '280', '都兰县');
INSERT INTO `g_base_region` VALUES ('2321', '280', '天峻县');
INSERT INTO `g_base_region` VALUES ('2322', '281', '同仁县');
INSERT INTO `g_base_region` VALUES ('2323', '281', '尖扎县');
INSERT INTO `g_base_region` VALUES ('2324', '281', '泽库县');
INSERT INTO `g_base_region` VALUES ('2325', '281', '河南蒙古族自治县');
INSERT INTO `g_base_region` VALUES ('2326', '282', '玉树县');
INSERT INTO `g_base_region` VALUES ('2327', '282', '杂多县');
INSERT INTO `g_base_region` VALUES ('2328', '282', '称多县');
INSERT INTO `g_base_region` VALUES ('2329', '282', '治多县');
INSERT INTO `g_base_region` VALUES ('2330', '282', '囊谦县');
INSERT INTO `g_base_region` VALUES ('2331', '282', '曲麻莱县');
INSERT INTO `g_base_region` VALUES ('2332', '283', '市中区');
INSERT INTO `g_base_region` VALUES ('2333', '283', '历下区');
INSERT INTO `g_base_region` VALUES ('2334', '283', '天桥区');
INSERT INTO `g_base_region` VALUES ('2335', '283', '槐荫区');
INSERT INTO `g_base_region` VALUES ('2336', '283', '历城区');
INSERT INTO `g_base_region` VALUES ('2337', '283', '长清区');
INSERT INTO `g_base_region` VALUES ('2338', '283', '章丘市');
INSERT INTO `g_base_region` VALUES ('2339', '283', '平阴县');
INSERT INTO `g_base_region` VALUES ('2340', '283', '济阳县');
INSERT INTO `g_base_region` VALUES ('2341', '283', '商河县');
INSERT INTO `g_base_region` VALUES ('2342', '284', '市南区');
INSERT INTO `g_base_region` VALUES ('2343', '284', '市北区');
INSERT INTO `g_base_region` VALUES ('2344', '284', '城阳区');
INSERT INTO `g_base_region` VALUES ('2345', '284', '四方区');
INSERT INTO `g_base_region` VALUES ('2346', '284', '李沧区');
INSERT INTO `g_base_region` VALUES ('2347', '284', '黄岛区');
INSERT INTO `g_base_region` VALUES ('2348', '284', '崂山区');
INSERT INTO `g_base_region` VALUES ('2349', '284', '胶州市');
INSERT INTO `g_base_region` VALUES ('2350', '284', '即墨市');
INSERT INTO `g_base_region` VALUES ('2351', '284', '平度市');
INSERT INTO `g_base_region` VALUES ('2352', '284', '胶南市');
INSERT INTO `g_base_region` VALUES ('2353', '284', '莱西市');
INSERT INTO `g_base_region` VALUES ('2354', '285', '滨城区');
INSERT INTO `g_base_region` VALUES ('2355', '285', '惠民县');
INSERT INTO `g_base_region` VALUES ('2356', '285', '阳信县');
INSERT INTO `g_base_region` VALUES ('2357', '285', '无棣县');
INSERT INTO `g_base_region` VALUES ('2358', '285', '沾化县');
INSERT INTO `g_base_region` VALUES ('2359', '285', '博兴县');
INSERT INTO `g_base_region` VALUES ('2360', '285', '邹平县');
INSERT INTO `g_base_region` VALUES ('2361', '286', '德城区');
INSERT INTO `g_base_region` VALUES ('2362', '286', '陵县');
INSERT INTO `g_base_region` VALUES ('2363', '286', '乐陵市');
INSERT INTO `g_base_region` VALUES ('2364', '286', '禹城市');
INSERT INTO `g_base_region` VALUES ('2365', '286', '宁津县');
INSERT INTO `g_base_region` VALUES ('2366', '286', '庆云县');
INSERT INTO `g_base_region` VALUES ('2367', '286', '临邑县');
INSERT INTO `g_base_region` VALUES ('2368', '286', '齐河县');
INSERT INTO `g_base_region` VALUES ('2369', '286', '平原县');
INSERT INTO `g_base_region` VALUES ('2370', '286', '夏津县');
INSERT INTO `g_base_region` VALUES ('2371', '286', '武城县');
INSERT INTO `g_base_region` VALUES ('2372', '287', '东营区');
INSERT INTO `g_base_region` VALUES ('2373', '287', '河口区');
INSERT INTO `g_base_region` VALUES ('2374', '287', '垦利县');
INSERT INTO `g_base_region` VALUES ('2375', '287', '利津县');
INSERT INTO `g_base_region` VALUES ('2376', '287', '广饶县');
INSERT INTO `g_base_region` VALUES ('2377', '288', '牡丹区');
INSERT INTO `g_base_region` VALUES ('2378', '288', '曹县');
INSERT INTO `g_base_region` VALUES ('2379', '288', '单县');
INSERT INTO `g_base_region` VALUES ('2380', '288', '成武县');
INSERT INTO `g_base_region` VALUES ('2381', '288', '巨野县');
INSERT INTO `g_base_region` VALUES ('2382', '288', '郓城县');
INSERT INTO `g_base_region` VALUES ('2383', '288', '鄄城县');
INSERT INTO `g_base_region` VALUES ('2384', '288', '定陶县');
INSERT INTO `g_base_region` VALUES ('2385', '288', '东明县');
INSERT INTO `g_base_region` VALUES ('2386', '289', '市中区');
INSERT INTO `g_base_region` VALUES ('2387', '289', '任城区');
INSERT INTO `g_base_region` VALUES ('2388', '289', '曲阜市');
INSERT INTO `g_base_region` VALUES ('2389', '289', '兖州市');
INSERT INTO `g_base_region` VALUES ('2390', '289', '邹城市');
INSERT INTO `g_base_region` VALUES ('2391', '289', '微山县');
INSERT INTO `g_base_region` VALUES ('2392', '289', '鱼台县');
INSERT INTO `g_base_region` VALUES ('2393', '289', '金乡县');
INSERT INTO `g_base_region` VALUES ('2394', '289', '嘉祥县');
INSERT INTO `g_base_region` VALUES ('2395', '289', '汶上县');
INSERT INTO `g_base_region` VALUES ('2396', '289', '泗水县');
INSERT INTO `g_base_region` VALUES ('2397', '289', '梁山县');
INSERT INTO `g_base_region` VALUES ('2398', '290', '莱城区');
INSERT INTO `g_base_region` VALUES ('2399', '290', '钢城区');
INSERT INTO `g_base_region` VALUES ('2400', '291', '东昌府区');
INSERT INTO `g_base_region` VALUES ('2401', '291', '临清市');
INSERT INTO `g_base_region` VALUES ('2402', '291', '阳谷县');
INSERT INTO `g_base_region` VALUES ('2403', '291', '莘县');
INSERT INTO `g_base_region` VALUES ('2404', '291', '茌平县');
INSERT INTO `g_base_region` VALUES ('2405', '291', '东阿县');
INSERT INTO `g_base_region` VALUES ('2406', '291', '冠县');
INSERT INTO `g_base_region` VALUES ('2407', '291', '高唐县');
INSERT INTO `g_base_region` VALUES ('2408', '292', '兰山区');
INSERT INTO `g_base_region` VALUES ('2409', '292', '罗庄区');
INSERT INTO `g_base_region` VALUES ('2410', '292', '河东区');
INSERT INTO `g_base_region` VALUES ('2411', '292', '沂南县');
INSERT INTO `g_base_region` VALUES ('2412', '292', '郯城县');
INSERT INTO `g_base_region` VALUES ('2413', '292', '沂水县');
INSERT INTO `g_base_region` VALUES ('2414', '292', '苍山县');
INSERT INTO `g_base_region` VALUES ('2415', '292', '费县');
INSERT INTO `g_base_region` VALUES ('2416', '292', '平邑县');
INSERT INTO `g_base_region` VALUES ('2417', '292', '莒南县');
INSERT INTO `g_base_region` VALUES ('2418', '292', '蒙阴县');
INSERT INTO `g_base_region` VALUES ('2419', '292', '临沭县');
INSERT INTO `g_base_region` VALUES ('2420', '293', '东港区');
INSERT INTO `g_base_region` VALUES ('2421', '293', '岚山区');
INSERT INTO `g_base_region` VALUES ('2422', '293', '五莲县');
INSERT INTO `g_base_region` VALUES ('2423', '293', '莒县');
INSERT INTO `g_base_region` VALUES ('2424', '294', '泰山区');
INSERT INTO `g_base_region` VALUES ('2425', '294', '岱岳区');
INSERT INTO `g_base_region` VALUES ('2426', '294', '新泰市');
INSERT INTO `g_base_region` VALUES ('2427', '294', '肥城市');
INSERT INTO `g_base_region` VALUES ('2428', '294', '宁阳县');
INSERT INTO `g_base_region` VALUES ('2429', '294', '东平县');
INSERT INTO `g_base_region` VALUES ('2430', '295', '荣成市');
INSERT INTO `g_base_region` VALUES ('2431', '295', '乳山市');
INSERT INTO `g_base_region` VALUES ('2432', '295', '环翠区');
INSERT INTO `g_base_region` VALUES ('2433', '295', '文登市');
INSERT INTO `g_base_region` VALUES ('2434', '296', '潍城区');
INSERT INTO `g_base_region` VALUES ('2435', '296', '寒亭区');
INSERT INTO `g_base_region` VALUES ('2436', '296', '坊子区');
INSERT INTO `g_base_region` VALUES ('2437', '296', '奎文区');
INSERT INTO `g_base_region` VALUES ('2438', '296', '青州市');
INSERT INTO `g_base_region` VALUES ('2439', '296', '诸城市');
INSERT INTO `g_base_region` VALUES ('2440', '296', '寿光市');
INSERT INTO `g_base_region` VALUES ('2441', '296', '安丘市');
INSERT INTO `g_base_region` VALUES ('2442', '296', '高密市');
INSERT INTO `g_base_region` VALUES ('2443', '296', '昌邑市');
INSERT INTO `g_base_region` VALUES ('2444', '296', '临朐县');
INSERT INTO `g_base_region` VALUES ('2445', '296', '昌乐县');
INSERT INTO `g_base_region` VALUES ('2446', '297', '芝罘区');
INSERT INTO `g_base_region` VALUES ('2447', '297', '福山区');
INSERT INTO `g_base_region` VALUES ('2448', '297', '牟平区');
INSERT INTO `g_base_region` VALUES ('2449', '297', '莱山区');
INSERT INTO `g_base_region` VALUES ('2450', '297', '开发区');
INSERT INTO `g_base_region` VALUES ('2451', '297', '龙口市');
INSERT INTO `g_base_region` VALUES ('2452', '297', '莱阳市');
INSERT INTO `g_base_region` VALUES ('2453', '297', '莱州市');
INSERT INTO `g_base_region` VALUES ('2454', '297', '蓬莱市');
INSERT INTO `g_base_region` VALUES ('2455', '297', '招远市');
INSERT INTO `g_base_region` VALUES ('2456', '297', '栖霞市');
INSERT INTO `g_base_region` VALUES ('2457', '297', '海阳市');
INSERT INTO `g_base_region` VALUES ('2458', '297', '长岛县');
INSERT INTO `g_base_region` VALUES ('2459', '298', '市中区');
INSERT INTO `g_base_region` VALUES ('2460', '298', '山亭区');
INSERT INTO `g_base_region` VALUES ('2461', '298', '峄城区');
INSERT INTO `g_base_region` VALUES ('2462', '298', '台儿庄区');
INSERT INTO `g_base_region` VALUES ('2463', '298', '薛城区');
INSERT INTO `g_base_region` VALUES ('2464', '298', '滕州市');
INSERT INTO `g_base_region` VALUES ('2465', '299', '张店区');
INSERT INTO `g_base_region` VALUES ('2466', '299', '临淄区');
INSERT INTO `g_base_region` VALUES ('2467', '299', '淄川区');
INSERT INTO `g_base_region` VALUES ('2468', '299', '博山区');
INSERT INTO `g_base_region` VALUES ('2469', '299', '周村区');
INSERT INTO `g_base_region` VALUES ('2470', '299', '桓台县');
INSERT INTO `g_base_region` VALUES ('2471', '299', '高青县');
INSERT INTO `g_base_region` VALUES ('2472', '299', '沂源县');
INSERT INTO `g_base_region` VALUES ('2473', '300', '杏花岭区');
INSERT INTO `g_base_region` VALUES ('2474', '300', '小店区');
INSERT INTO `g_base_region` VALUES ('2475', '300', '迎泽区');
INSERT INTO `g_base_region` VALUES ('2476', '300', '尖草坪区');
INSERT INTO `g_base_region` VALUES ('2477', '300', '万柏林区');
INSERT INTO `g_base_region` VALUES ('2478', '300', '晋源区');
INSERT INTO `g_base_region` VALUES ('2479', '300', '高新开发区');
INSERT INTO `g_base_region` VALUES ('2480', '300', '民营经济开发区');
INSERT INTO `g_base_region` VALUES ('2481', '300', '经济技术开发区');
INSERT INTO `g_base_region` VALUES ('2482', '300', '清徐县');
INSERT INTO `g_base_region` VALUES ('2483', '300', '阳曲县');
INSERT INTO `g_base_region` VALUES ('2484', '300', '娄烦县');
INSERT INTO `g_base_region` VALUES ('2485', '300', '古交市');
INSERT INTO `g_base_region` VALUES ('2486', '301', '城区');
INSERT INTO `g_base_region` VALUES ('2487', '301', '郊区');
INSERT INTO `g_base_region` VALUES ('2488', '301', '沁县');
INSERT INTO `g_base_region` VALUES ('2489', '301', '潞城市');
INSERT INTO `g_base_region` VALUES ('2490', '301', '长治县');
INSERT INTO `g_base_region` VALUES ('2491', '301', '襄垣县');
INSERT INTO `g_base_region` VALUES ('2492', '301', '屯留县');
INSERT INTO `g_base_region` VALUES ('2493', '301', '平顺县');
INSERT INTO `g_base_region` VALUES ('2494', '301', '黎城县');
INSERT INTO `g_base_region` VALUES ('2495', '301', '壶关县');
INSERT INTO `g_base_region` VALUES ('2496', '301', '长子县');
INSERT INTO `g_base_region` VALUES ('2497', '301', '武乡县');
INSERT INTO `g_base_region` VALUES ('2498', '301', '沁源县');
INSERT INTO `g_base_region` VALUES ('2499', '302', '城区');
INSERT INTO `g_base_region` VALUES ('2500', '302', '矿区');
INSERT INTO `g_base_region` VALUES ('2501', '302', '南郊区');
INSERT INTO `g_base_region` VALUES ('2502', '302', '新荣区');
INSERT INTO `g_base_region` VALUES ('2503', '302', '阳高县');
INSERT INTO `g_base_region` VALUES ('2504', '302', '天镇县');
INSERT INTO `g_base_region` VALUES ('2505', '302', '广灵县');
INSERT INTO `g_base_region` VALUES ('2506', '302', '灵丘县');
INSERT INTO `g_base_region` VALUES ('2507', '302', '浑源县');
INSERT INTO `g_base_region` VALUES ('2508', '302', '左云县');
INSERT INTO `g_base_region` VALUES ('2509', '302', '大同县');
INSERT INTO `g_base_region` VALUES ('2510', '303', '城区');
INSERT INTO `g_base_region` VALUES ('2511', '303', '高平市');
INSERT INTO `g_base_region` VALUES ('2512', '303', '沁水县');
INSERT INTO `g_base_region` VALUES ('2513', '303', '阳城县');
INSERT INTO `g_base_region` VALUES ('2514', '303', '陵川县');
INSERT INTO `g_base_region` VALUES ('2515', '303', '泽州县');
INSERT INTO `g_base_region` VALUES ('2516', '304', '榆次区');
INSERT INTO `g_base_region` VALUES ('2517', '304', '介休市');
INSERT INTO `g_base_region` VALUES ('2518', '304', '榆社县');
INSERT INTO `g_base_region` VALUES ('2519', '304', '左权县');
INSERT INTO `g_base_region` VALUES ('2520', '304', '和顺县');
INSERT INTO `g_base_region` VALUES ('2521', '304', '昔阳县');
INSERT INTO `g_base_region` VALUES ('2522', '304', '寿阳县');
INSERT INTO `g_base_region` VALUES ('2523', '304', '太谷县');
INSERT INTO `g_base_region` VALUES ('2524', '304', '祁县');
INSERT INTO `g_base_region` VALUES ('2525', '304', '平遥县');
INSERT INTO `g_base_region` VALUES ('2526', '304', '灵石县');
INSERT INTO `g_base_region` VALUES ('2527', '305', '尧都区');
INSERT INTO `g_base_region` VALUES ('2528', '305', '侯马市');
INSERT INTO `g_base_region` VALUES ('2529', '305', '霍州市');
INSERT INTO `g_base_region` VALUES ('2530', '305', '曲沃县');
INSERT INTO `g_base_region` VALUES ('2531', '305', '翼城县');
INSERT INTO `g_base_region` VALUES ('2532', '305', '襄汾县');
INSERT INTO `g_base_region` VALUES ('2533', '305', '洪洞县');
INSERT INTO `g_base_region` VALUES ('2534', '305', '吉县');
INSERT INTO `g_base_region` VALUES ('2535', '305', '安泽县');
INSERT INTO `g_base_region` VALUES ('2536', '305', '浮山县');
INSERT INTO `g_base_region` VALUES ('2537', '305', '古县');
INSERT INTO `g_base_region` VALUES ('2538', '305', '乡宁县');
INSERT INTO `g_base_region` VALUES ('2539', '305', '大宁县');
INSERT INTO `g_base_region` VALUES ('2540', '305', '隰县');
INSERT INTO `g_base_region` VALUES ('2541', '305', '永和县');
INSERT INTO `g_base_region` VALUES ('2542', '305', '蒲县');
INSERT INTO `g_base_region` VALUES ('2543', '305', '汾西县');
INSERT INTO `g_base_region` VALUES ('2544', '306', '离石市');
INSERT INTO `g_base_region` VALUES ('2545', '306', '离石区');
INSERT INTO `g_base_region` VALUES ('2546', '306', '孝义市');
INSERT INTO `g_base_region` VALUES ('2547', '306', '汾阳市');
INSERT INTO `g_base_region` VALUES ('2548', '306', '文水县');
INSERT INTO `g_base_region` VALUES ('2549', '306', '交城县');
INSERT INTO `g_base_region` VALUES ('2550', '306', '兴县');
INSERT INTO `g_base_region` VALUES ('2551', '306', '临县');
INSERT INTO `g_base_region` VALUES ('2552', '306', '柳林县');
INSERT INTO `g_base_region` VALUES ('2553', '306', '石楼县');
INSERT INTO `g_base_region` VALUES ('2554', '306', '岚县');
INSERT INTO `g_base_region` VALUES ('2555', '306', '方山县');
INSERT INTO `g_base_region` VALUES ('2556', '306', '中阳县');
INSERT INTO `g_base_region` VALUES ('2557', '306', '交口县');
INSERT INTO `g_base_region` VALUES ('2558', '307', '朔城区');
INSERT INTO `g_base_region` VALUES ('2559', '307', '平鲁区');
INSERT INTO `g_base_region` VALUES ('2560', '307', '山阴县');
INSERT INTO `g_base_region` VALUES ('2561', '307', '应县');
INSERT INTO `g_base_region` VALUES ('2562', '307', '右玉县');
INSERT INTO `g_base_region` VALUES ('2563', '307', '怀仁县');
INSERT INTO `g_base_region` VALUES ('2564', '308', '忻府区');
INSERT INTO `g_base_region` VALUES ('2565', '308', '原平市');
INSERT INTO `g_base_region` VALUES ('2566', '308', '定襄县');
INSERT INTO `g_base_region` VALUES ('2567', '308', '五台县');
INSERT INTO `g_base_region` VALUES ('2568', '308', '代县');
INSERT INTO `g_base_region` VALUES ('2569', '308', '繁峙县');
INSERT INTO `g_base_region` VALUES ('2570', '308', '宁武县');
INSERT INTO `g_base_region` VALUES ('2571', '308', '静乐县');
INSERT INTO `g_base_region` VALUES ('2572', '308', '神池县');
INSERT INTO `g_base_region` VALUES ('2573', '308', '五寨县');
INSERT INTO `g_base_region` VALUES ('2574', '308', '岢岚县');
INSERT INTO `g_base_region` VALUES ('2575', '308', '河曲县');
INSERT INTO `g_base_region` VALUES ('2576', '308', '保德县');
INSERT INTO `g_base_region` VALUES ('2577', '308', '偏关县');
INSERT INTO `g_base_region` VALUES ('2578', '309', '城区');
INSERT INTO `g_base_region` VALUES ('2579', '309', '矿区');
INSERT INTO `g_base_region` VALUES ('2580', '309', '郊区');
INSERT INTO `g_base_region` VALUES ('2581', '309', '平定县');
INSERT INTO `g_base_region` VALUES ('2582', '309', '盂县');
INSERT INTO `g_base_region` VALUES ('2583', '310', '盐湖区');
INSERT INTO `g_base_region` VALUES ('2584', '310', '永济市');
INSERT INTO `g_base_region` VALUES ('2585', '310', '河津市');
INSERT INTO `g_base_region` VALUES ('2586', '310', '临猗县');
INSERT INTO `g_base_region` VALUES ('2587', '310', '万荣县');
INSERT INTO `g_base_region` VALUES ('2588', '310', '闻喜县');
INSERT INTO `g_base_region` VALUES ('2589', '310', '稷山县');
INSERT INTO `g_base_region` VALUES ('2590', '310', '新绛县');
INSERT INTO `g_base_region` VALUES ('2591', '310', '绛县');
INSERT INTO `g_base_region` VALUES ('2592', '310', '垣曲县');
INSERT INTO `g_base_region` VALUES ('2593', '310', '夏县');
INSERT INTO `g_base_region` VALUES ('2594', '310', '平陆县');
INSERT INTO `g_base_region` VALUES ('2595', '310', '芮城县');
INSERT INTO `g_base_region` VALUES ('2596', '311', '莲湖区');
INSERT INTO `g_base_region` VALUES ('2597', '311', '新城区');
INSERT INTO `g_base_region` VALUES ('2598', '311', '碑林区');
INSERT INTO `g_base_region` VALUES ('2599', '311', '雁塔区');
INSERT INTO `g_base_region` VALUES ('2600', '311', '灞桥区');
INSERT INTO `g_base_region` VALUES ('2601', '311', '未央区');
INSERT INTO `g_base_region` VALUES ('2602', '311', '阎良区');
INSERT INTO `g_base_region` VALUES ('2603', '311', '临潼区');
INSERT INTO `g_base_region` VALUES ('2604', '311', '长安区');
INSERT INTO `g_base_region` VALUES ('2605', '311', '蓝田县');
INSERT INTO `g_base_region` VALUES ('2606', '311', '周至县');
INSERT INTO `g_base_region` VALUES ('2607', '311', '户县');
INSERT INTO `g_base_region` VALUES ('2608', '311', '高陵县');
INSERT INTO `g_base_region` VALUES ('2609', '312', '汉滨区');
INSERT INTO `g_base_region` VALUES ('2610', '312', '汉阴县');
INSERT INTO `g_base_region` VALUES ('2611', '312', '石泉县');
INSERT INTO `g_base_region` VALUES ('2612', '312', '宁陕县');
INSERT INTO `g_base_region` VALUES ('2613', '312', '紫阳县');
INSERT INTO `g_base_region` VALUES ('2614', '312', '岚皋县');
INSERT INTO `g_base_region` VALUES ('2615', '312', '平利县');
INSERT INTO `g_base_region` VALUES ('2616', '312', '镇坪县');
INSERT INTO `g_base_region` VALUES ('2617', '312', '旬阳县');
INSERT INTO `g_base_region` VALUES ('2618', '312', '白河县');
INSERT INTO `g_base_region` VALUES ('2619', '313', '陈仓区');
INSERT INTO `g_base_region` VALUES ('2620', '313', '渭滨区');
INSERT INTO `g_base_region` VALUES ('2621', '313', '金台区');
INSERT INTO `g_base_region` VALUES ('2622', '313', '凤翔县');
INSERT INTO `g_base_region` VALUES ('2623', '313', '岐山县');
INSERT INTO `g_base_region` VALUES ('2624', '313', '扶风县');
INSERT INTO `g_base_region` VALUES ('2625', '313', '眉县');
INSERT INTO `g_base_region` VALUES ('2626', '313', '陇县');
INSERT INTO `g_base_region` VALUES ('2627', '313', '千阳县');
INSERT INTO `g_base_region` VALUES ('2628', '313', '麟游县');
INSERT INTO `g_base_region` VALUES ('2629', '313', '凤县');
INSERT INTO `g_base_region` VALUES ('2630', '313', '太白县');
INSERT INTO `g_base_region` VALUES ('2631', '314', '汉台区');
INSERT INTO `g_base_region` VALUES ('2632', '314', '南郑县');
INSERT INTO `g_base_region` VALUES ('2633', '314', '城固县');
INSERT INTO `g_base_region` VALUES ('2634', '314', '洋县');
INSERT INTO `g_base_region` VALUES ('2635', '314', '西乡县');
INSERT INTO `g_base_region` VALUES ('2636', '314', '勉县');
INSERT INTO `g_base_region` VALUES ('2637', '314', '宁强县');
INSERT INTO `g_base_region` VALUES ('2638', '314', '略阳县');
INSERT INTO `g_base_region` VALUES ('2639', '314', '镇巴县');
INSERT INTO `g_base_region` VALUES ('2640', '314', '留坝县');
INSERT INTO `g_base_region` VALUES ('2641', '314', '佛坪县');
INSERT INTO `g_base_region` VALUES ('2642', '315', '商州区');
INSERT INTO `g_base_region` VALUES ('2643', '315', '洛南县');
INSERT INTO `g_base_region` VALUES ('2644', '315', '丹凤县');
INSERT INTO `g_base_region` VALUES ('2645', '315', '商南县');
INSERT INTO `g_base_region` VALUES ('2646', '315', '山阳县');
INSERT INTO `g_base_region` VALUES ('2647', '315', '镇安县');
INSERT INTO `g_base_region` VALUES ('2648', '315', '柞水县');
INSERT INTO `g_base_region` VALUES ('2649', '316', '耀州区');
INSERT INTO `g_base_region` VALUES ('2650', '316', '王益区');
INSERT INTO `g_base_region` VALUES ('2651', '316', '印台区');
INSERT INTO `g_base_region` VALUES ('2652', '316', '宜君县');
INSERT INTO `g_base_region` VALUES ('2653', '317', '临渭区');
INSERT INTO `g_base_region` VALUES ('2654', '317', '韩城市');
INSERT INTO `g_base_region` VALUES ('2655', '317', '华阴市');
INSERT INTO `g_base_region` VALUES ('2656', '317', '华县');
INSERT INTO `g_base_region` VALUES ('2657', '317', '潼关县');
INSERT INTO `g_base_region` VALUES ('2658', '317', '大荔县');
INSERT INTO `g_base_region` VALUES ('2659', '317', '合阳县');
INSERT INTO `g_base_region` VALUES ('2660', '317', '澄城县');
INSERT INTO `g_base_region` VALUES ('2661', '317', '蒲城县');
INSERT INTO `g_base_region` VALUES ('2662', '317', '白水县');
INSERT INTO `g_base_region` VALUES ('2663', '317', '富平县');
INSERT INTO `g_base_region` VALUES ('2664', '318', '秦都区');
INSERT INTO `g_base_region` VALUES ('2665', '318', '渭城区');
INSERT INTO `g_base_region` VALUES ('2666', '318', '杨陵区');
INSERT INTO `g_base_region` VALUES ('2667', '318', '兴平市');
INSERT INTO `g_base_region` VALUES ('2668', '318', '三原县');
INSERT INTO `g_base_region` VALUES ('2669', '318', '泾阳县');
INSERT INTO `g_base_region` VALUES ('2670', '318', '乾县');
INSERT INTO `g_base_region` VALUES ('2671', '318', '礼泉县');
INSERT INTO `g_base_region` VALUES ('2672', '318', '永寿县');
INSERT INTO `g_base_region` VALUES ('2673', '318', '彬县');
INSERT INTO `g_base_region` VALUES ('2674', '318', '长武县');
INSERT INTO `g_base_region` VALUES ('2675', '318', '旬邑县');
INSERT INTO `g_base_region` VALUES ('2676', '318', '淳化县');
INSERT INTO `g_base_region` VALUES ('2677', '318', '武功县');
INSERT INTO `g_base_region` VALUES ('2678', '319', '吴起县');
INSERT INTO `g_base_region` VALUES ('2679', '319', '宝塔区');
INSERT INTO `g_base_region` VALUES ('2680', '319', '延长县');
INSERT INTO `g_base_region` VALUES ('2681', '319', '延川县');
INSERT INTO `g_base_region` VALUES ('2682', '319', '子长县');
INSERT INTO `g_base_region` VALUES ('2683', '319', '安塞县');
INSERT INTO `g_base_region` VALUES ('2684', '319', '志丹县');
INSERT INTO `g_base_region` VALUES ('2685', '319', '甘泉县');
INSERT INTO `g_base_region` VALUES ('2686', '319', '富县');
INSERT INTO `g_base_region` VALUES ('2687', '319', '洛川县');
INSERT INTO `g_base_region` VALUES ('2688', '319', '宜川县');
INSERT INTO `g_base_region` VALUES ('2689', '319', '黄龙县');
INSERT INTO `g_base_region` VALUES ('2690', '319', '黄陵县');
INSERT INTO `g_base_region` VALUES ('2691', '320', '榆阳区');
INSERT INTO `g_base_region` VALUES ('2692', '320', '神木县');
INSERT INTO `g_base_region` VALUES ('2693', '320', '府谷县');
INSERT INTO `g_base_region` VALUES ('2694', '320', '横山县');
INSERT INTO `g_base_region` VALUES ('2695', '320', '靖边县');
INSERT INTO `g_base_region` VALUES ('2696', '320', '定边县');
INSERT INTO `g_base_region` VALUES ('2697', '320', '绥德县');
INSERT INTO `g_base_region` VALUES ('2698', '320', '米脂县');
INSERT INTO `g_base_region` VALUES ('2699', '320', '佳县');
INSERT INTO `g_base_region` VALUES ('2700', '320', '吴堡县');
INSERT INTO `g_base_region` VALUES ('2701', '320', '清涧县');
INSERT INTO `g_base_region` VALUES ('2702', '320', '子洲县');
INSERT INTO `g_base_region` VALUES ('2703', '321', '长宁区');
INSERT INTO `g_base_region` VALUES ('2704', '321', '闸北区');
INSERT INTO `g_base_region` VALUES ('2705', '321', '闵行区');
INSERT INTO `g_base_region` VALUES ('2706', '321', '徐汇区');
INSERT INTO `g_base_region` VALUES ('2707', '321', '浦东新区');
INSERT INTO `g_base_region` VALUES ('2708', '321', '杨浦区');
INSERT INTO `g_base_region` VALUES ('2709', '321', '普陀区');
INSERT INTO `g_base_region` VALUES ('2710', '321', '静安区');
INSERT INTO `g_base_region` VALUES ('2711', '321', '卢湾区');
INSERT INTO `g_base_region` VALUES ('2712', '321', '虹口区');
INSERT INTO `g_base_region` VALUES ('2713', '321', '黄浦区');
INSERT INTO `g_base_region` VALUES ('2714', '321', '南汇区');
INSERT INTO `g_base_region` VALUES ('2715', '321', '松江区');
INSERT INTO `g_base_region` VALUES ('2716', '321', '嘉定区');
INSERT INTO `g_base_region` VALUES ('2717', '321', '宝山区');
INSERT INTO `g_base_region` VALUES ('2718', '321', '青浦区');
INSERT INTO `g_base_region` VALUES ('2719', '321', '金山区');
INSERT INTO `g_base_region` VALUES ('2720', '321', '奉贤区');
INSERT INTO `g_base_region` VALUES ('2721', '321', '崇明县');
INSERT INTO `g_base_region` VALUES ('2722', '322', '青羊区');
INSERT INTO `g_base_region` VALUES ('2723', '322', '锦江区');
INSERT INTO `g_base_region` VALUES ('2724', '322', '金牛区');
INSERT INTO `g_base_region` VALUES ('2725', '322', '武侯区');
INSERT INTO `g_base_region` VALUES ('2726', '322', '成华区');
INSERT INTO `g_base_region` VALUES ('2727', '322', '龙泉驿区');
INSERT INTO `g_base_region` VALUES ('2728', '322', '青白江区');
INSERT INTO `g_base_region` VALUES ('2729', '322', '新都区');
INSERT INTO `g_base_region` VALUES ('2730', '322', '温江区');
INSERT INTO `g_base_region` VALUES ('2731', '322', '高新区');
INSERT INTO `g_base_region` VALUES ('2732', '322', '高新西区');
INSERT INTO `g_base_region` VALUES ('2733', '322', '都江堰市');
INSERT INTO `g_base_region` VALUES ('2734', '322', '彭州市');
INSERT INTO `g_base_region` VALUES ('2735', '322', '邛崃市');
INSERT INTO `g_base_region` VALUES ('2736', '322', '崇州市');
INSERT INTO `g_base_region` VALUES ('2737', '322', '金堂县');
INSERT INTO `g_base_region` VALUES ('2738', '322', '双流县');
INSERT INTO `g_base_region` VALUES ('2739', '322', '郫县');
INSERT INTO `g_base_region` VALUES ('2740', '322', '大邑县');
INSERT INTO `g_base_region` VALUES ('2741', '322', '蒲江县');
INSERT INTO `g_base_region` VALUES ('2742', '322', '新津县');
INSERT INTO `g_base_region` VALUES ('2743', '322', '都江堰市');
INSERT INTO `g_base_region` VALUES ('2744', '322', '彭州市');
INSERT INTO `g_base_region` VALUES ('2745', '322', '邛崃市');
INSERT INTO `g_base_region` VALUES ('2746', '322', '崇州市');
INSERT INTO `g_base_region` VALUES ('2747', '322', '金堂县');
INSERT INTO `g_base_region` VALUES ('2748', '322', '双流县');
INSERT INTO `g_base_region` VALUES ('2749', '322', '郫县');
INSERT INTO `g_base_region` VALUES ('2750', '322', '大邑县');
INSERT INTO `g_base_region` VALUES ('2751', '322', '蒲江县');
INSERT INTO `g_base_region` VALUES ('2752', '322', '新津县');
INSERT INTO `g_base_region` VALUES ('2753', '323', '涪城区');
INSERT INTO `g_base_region` VALUES ('2754', '323', '游仙区');
INSERT INTO `g_base_region` VALUES ('2755', '323', '江油市');
INSERT INTO `g_base_region` VALUES ('2756', '323', '盐亭县');
INSERT INTO `g_base_region` VALUES ('2757', '323', '三台县');
INSERT INTO `g_base_region` VALUES ('2758', '323', '平武县');
INSERT INTO `g_base_region` VALUES ('2759', '323', '安县');
INSERT INTO `g_base_region` VALUES ('2760', '323', '梓潼县');
INSERT INTO `g_base_region` VALUES ('2761', '323', '北川县');
INSERT INTO `g_base_region` VALUES ('2762', '324', '马尔康县');
INSERT INTO `g_base_region` VALUES ('2763', '324', '汶川县');
INSERT INTO `g_base_region` VALUES ('2764', '324', '理县');
INSERT INTO `g_base_region` VALUES ('2765', '324', '茂县');
INSERT INTO `g_base_region` VALUES ('2766', '324', '松潘县');
INSERT INTO `g_base_region` VALUES ('2767', '324', '九寨沟县');
INSERT INTO `g_base_region` VALUES ('2768', '324', '金川县');
INSERT INTO `g_base_region` VALUES ('2769', '324', '小金县');
INSERT INTO `g_base_region` VALUES ('2770', '324', '黑水县');
INSERT INTO `g_base_region` VALUES ('2771', '324', '壤塘县');
INSERT INTO `g_base_region` VALUES ('2772', '324', '阿坝县');
INSERT INTO `g_base_region` VALUES ('2773', '324', '若尔盖县');
INSERT INTO `g_base_region` VALUES ('2774', '324', '红原县');
INSERT INTO `g_base_region` VALUES ('2775', '325', '巴州区');
INSERT INTO `g_base_region` VALUES ('2776', '325', '通江县');
INSERT INTO `g_base_region` VALUES ('2777', '325', '南江县');
INSERT INTO `g_base_region` VALUES ('2778', '325', '平昌县');
INSERT INTO `g_base_region` VALUES ('2779', '326', '通川区');
INSERT INTO `g_base_region` VALUES ('2780', '326', '万源市');
INSERT INTO `g_base_region` VALUES ('2781', '326', '达县');
INSERT INTO `g_base_region` VALUES ('2782', '326', '宣汉县');
INSERT INTO `g_base_region` VALUES ('2783', '326', '开江县');
INSERT INTO `g_base_region` VALUES ('2784', '326', '大竹县');
INSERT INTO `g_base_region` VALUES ('2785', '326', '渠县');
INSERT INTO `g_base_region` VALUES ('2786', '327', '旌阳区');
INSERT INTO `g_base_region` VALUES ('2787', '327', '广汉市');
INSERT INTO `g_base_region` VALUES ('2788', '327', '什邡市');
INSERT INTO `g_base_region` VALUES ('2789', '327', '绵竹市');
INSERT INTO `g_base_region` VALUES ('2790', '327', '罗江县');
INSERT INTO `g_base_region` VALUES ('2791', '327', '中江县');
INSERT INTO `g_base_region` VALUES ('2792', '328', '康定县');
INSERT INTO `g_base_region` VALUES ('2793', '328', '丹巴县');
INSERT INTO `g_base_region` VALUES ('2794', '328', '泸定县');
INSERT INTO `g_base_region` VALUES ('2795', '328', '炉霍县');
INSERT INTO `g_base_region` VALUES ('2796', '328', '九龙县');
INSERT INTO `g_base_region` VALUES ('2797', '328', '甘孜县');
INSERT INTO `g_base_region` VALUES ('2798', '328', '雅江县');
INSERT INTO `g_base_region` VALUES ('2799', '328', '新龙县');
INSERT INTO `g_base_region` VALUES ('2800', '328', '道孚县');
INSERT INTO `g_base_region` VALUES ('2801', '328', '白玉县');
INSERT INTO `g_base_region` VALUES ('2802', '328', '理塘县');
INSERT INTO `g_base_region` VALUES ('2803', '328', '德格县');
INSERT INTO `g_base_region` VALUES ('2804', '328', '乡城县');
INSERT INTO `g_base_region` VALUES ('2805', '328', '石渠县');
INSERT INTO `g_base_region` VALUES ('2806', '328', '稻城县');
INSERT INTO `g_base_region` VALUES ('2807', '328', '色达县');
INSERT INTO `g_base_region` VALUES ('2808', '328', '巴塘县');
INSERT INTO `g_base_region` VALUES ('2809', '328', '得荣县');
INSERT INTO `g_base_region` VALUES ('2810', '329', '广安区');
INSERT INTO `g_base_region` VALUES ('2811', '329', '华蓥市');
INSERT INTO `g_base_region` VALUES ('2812', '329', '岳池县');
INSERT INTO `g_base_region` VALUES ('2813', '329', '武胜县');
INSERT INTO `g_base_region` VALUES ('2814', '329', '邻水县');
INSERT INTO `g_base_region` VALUES ('2815', '330', '利州区');
INSERT INTO `g_base_region` VALUES ('2816', '330', '元坝区');
INSERT INTO `g_base_region` VALUES ('2817', '330', '朝天区');
INSERT INTO `g_base_region` VALUES ('2818', '330', '旺苍县');
INSERT INTO `g_base_region` VALUES ('2819', '330', '青川县');
INSERT INTO `g_base_region` VALUES ('2820', '330', '剑阁县');
INSERT INTO `g_base_region` VALUES ('2821', '330', '苍溪县');
INSERT INTO `g_base_region` VALUES ('2822', '331', '峨眉山市');
INSERT INTO `g_base_region` VALUES ('2823', '331', '乐山市');
INSERT INTO `g_base_region` VALUES ('2824', '331', '犍为县');
INSERT INTO `g_base_region` VALUES ('2825', '331', '井研县');
INSERT INTO `g_base_region` VALUES ('2826', '331', '夹江县');
INSERT INTO `g_base_region` VALUES ('2827', '331', '沐川县');
INSERT INTO `g_base_region` VALUES ('2828', '331', '峨边');
INSERT INTO `g_base_region` VALUES ('2829', '331', '马边');
INSERT INTO `g_base_region` VALUES ('2830', '332', '西昌市');
INSERT INTO `g_base_region` VALUES ('2831', '332', '盐源县');
INSERT INTO `g_base_region` VALUES ('2832', '332', '德昌县');
INSERT INTO `g_base_region` VALUES ('2833', '332', '会理县');
INSERT INTO `g_base_region` VALUES ('2834', '332', '会东县');
INSERT INTO `g_base_region` VALUES ('2835', '332', '宁南县');
INSERT INTO `g_base_region` VALUES ('2836', '332', '普格县');
INSERT INTO `g_base_region` VALUES ('2837', '332', '布拖县');
INSERT INTO `g_base_region` VALUES ('2838', '332', '金阳县');
INSERT INTO `g_base_region` VALUES ('2839', '332', '昭觉县');
INSERT INTO `g_base_region` VALUES ('2840', '332', '喜德县');
INSERT INTO `g_base_region` VALUES ('2841', '332', '冕宁县');
INSERT INTO `g_base_region` VALUES ('2842', '332', '越西县');
INSERT INTO `g_base_region` VALUES ('2843', '332', '甘洛县');
INSERT INTO `g_base_region` VALUES ('2844', '332', '美姑县');
INSERT INTO `g_base_region` VALUES ('2845', '332', '雷波县');
INSERT INTO `g_base_region` VALUES ('2846', '332', '木里');
INSERT INTO `g_base_region` VALUES ('2847', '333', '东坡区');
INSERT INTO `g_base_region` VALUES ('2848', '333', '仁寿县');
INSERT INTO `g_base_region` VALUES ('2849', '333', '彭山县');
INSERT INTO `g_base_region` VALUES ('2850', '333', '洪雅县');
INSERT INTO `g_base_region` VALUES ('2851', '333', '丹棱县');
INSERT INTO `g_base_region` VALUES ('2852', '333', '青神县');
INSERT INTO `g_base_region` VALUES ('2853', '334', '阆中市');
INSERT INTO `g_base_region` VALUES ('2854', '334', '南部县');
INSERT INTO `g_base_region` VALUES ('2855', '334', '营山县');
INSERT INTO `g_base_region` VALUES ('2856', '334', '蓬安县');
INSERT INTO `g_base_region` VALUES ('2857', '334', '仪陇县');
INSERT INTO `g_base_region` VALUES ('2858', '334', '顺庆区');
INSERT INTO `g_base_region` VALUES ('2859', '334', '高坪区');
INSERT INTO `g_base_region` VALUES ('2860', '334', '嘉陵区');
INSERT INTO `g_base_region` VALUES ('2861', '334', '西充县');
INSERT INTO `g_base_region` VALUES ('2862', '335', '市中区');
INSERT INTO `g_base_region` VALUES ('2863', '335', '东兴区');
INSERT INTO `g_base_region` VALUES ('2864', '335', '威远县');
INSERT INTO `g_base_region` VALUES ('2865', '335', '资中县');
INSERT INTO `g_base_region` VALUES ('2866', '335', '隆昌县');
INSERT INTO `g_base_region` VALUES ('2867', '336', '东  区');
INSERT INTO `g_base_region` VALUES ('2868', '336', '西  区');
INSERT INTO `g_base_region` VALUES ('2869', '336', '仁和区');
INSERT INTO `g_base_region` VALUES ('2870', '336', '米易县');
INSERT INTO `g_base_region` VALUES ('2871', '336', '盐边县');
INSERT INTO `g_base_region` VALUES ('2872', '337', '船山区');
INSERT INTO `g_base_region` VALUES ('2873', '337', '安居区');
INSERT INTO `g_base_region` VALUES ('2874', '337', '蓬溪县');
INSERT INTO `g_base_region` VALUES ('2875', '337', '射洪县');
INSERT INTO `g_base_region` VALUES ('2876', '337', '大英县');
INSERT INTO `g_base_region` VALUES ('2877', '338', '雨城区');
INSERT INTO `g_base_region` VALUES ('2878', '338', '名山县');
INSERT INTO `g_base_region` VALUES ('2879', '338', '荥经县');
INSERT INTO `g_base_region` VALUES ('2880', '338', '汉源县');
INSERT INTO `g_base_region` VALUES ('2881', '338', '石棉县');
INSERT INTO `g_base_region` VALUES ('2882', '338', '天全县');
INSERT INTO `g_base_region` VALUES ('2883', '338', '芦山县');
INSERT INTO `g_base_region` VALUES ('2884', '338', '宝兴县');
INSERT INTO `g_base_region` VALUES ('2885', '339', '翠屏区');
INSERT INTO `g_base_region` VALUES ('2886', '339', '宜宾县');
INSERT INTO `g_base_region` VALUES ('2887', '339', '南溪县');
INSERT INTO `g_base_region` VALUES ('2888', '339', '江安县');
INSERT INTO `g_base_region` VALUES ('2889', '339', '长宁县');
INSERT INTO `g_base_region` VALUES ('2890', '339', '高县');
INSERT INTO `g_base_region` VALUES ('2891', '339', '珙县');
INSERT INTO `g_base_region` VALUES ('2892', '339', '筠连县');
INSERT INTO `g_base_region` VALUES ('2893', '339', '兴文县');
INSERT INTO `g_base_region` VALUES ('2894', '339', '屏山县');
INSERT INTO `g_base_region` VALUES ('2895', '340', '雁江区');
INSERT INTO `g_base_region` VALUES ('2896', '340', '简阳市');
INSERT INTO `g_base_region` VALUES ('2897', '340', '安岳县');
INSERT INTO `g_base_region` VALUES ('2898', '340', '乐至县');
INSERT INTO `g_base_region` VALUES ('2899', '341', '大安区');
INSERT INTO `g_base_region` VALUES ('2900', '341', '自流井区');
INSERT INTO `g_base_region` VALUES ('2901', '341', '贡井区');
INSERT INTO `g_base_region` VALUES ('2902', '341', '沿滩区');
INSERT INTO `g_base_region` VALUES ('2903', '341', '荣县');
INSERT INTO `g_base_region` VALUES ('2904', '341', '富顺县');
INSERT INTO `g_base_region` VALUES ('2905', '342', '江阳区');
INSERT INTO `g_base_region` VALUES ('2906', '342', '纳溪区');
INSERT INTO `g_base_region` VALUES ('2907', '342', '龙马潭区');
INSERT INTO `g_base_region` VALUES ('2908', '342', '泸县');
INSERT INTO `g_base_region` VALUES ('2909', '342', '合江县');
INSERT INTO `g_base_region` VALUES ('2910', '342', '叙永县');
INSERT INTO `g_base_region` VALUES ('2911', '342', '古蔺县');
INSERT INTO `g_base_region` VALUES ('2912', '343', '和平区');
INSERT INTO `g_base_region` VALUES ('2913', '343', '河西区');
INSERT INTO `g_base_region` VALUES ('2914', '343', '南开区');
INSERT INTO `g_base_region` VALUES ('2915', '343', '河北区');
INSERT INTO `g_base_region` VALUES ('2916', '343', '河东区');
INSERT INTO `g_base_region` VALUES ('2917', '343', '红桥区');
INSERT INTO `g_base_region` VALUES ('2918', '343', '东丽区');
INSERT INTO `g_base_region` VALUES ('2919', '343', '津南区');
INSERT INTO `g_base_region` VALUES ('2920', '343', '西青区');
INSERT INTO `g_base_region` VALUES ('2921', '343', '北辰区');
INSERT INTO `g_base_region` VALUES ('2922', '343', '塘沽区');
INSERT INTO `g_base_region` VALUES ('2923', '343', '汉沽区');
INSERT INTO `g_base_region` VALUES ('2924', '343', '大港区');
INSERT INTO `g_base_region` VALUES ('2925', '343', '武清区');
INSERT INTO `g_base_region` VALUES ('2926', '343', '宝坻区');
INSERT INTO `g_base_region` VALUES ('2927', '343', '经济开发区');
INSERT INTO `g_base_region` VALUES ('2928', '343', '宁河县');
INSERT INTO `g_base_region` VALUES ('2929', '343', '静海县');
INSERT INTO `g_base_region` VALUES ('2930', '343', '蓟县');
INSERT INTO `g_base_region` VALUES ('2931', '344', '城关区');
INSERT INTO `g_base_region` VALUES ('2932', '344', '林周县');
INSERT INTO `g_base_region` VALUES ('2933', '344', '当雄县');
INSERT INTO `g_base_region` VALUES ('2934', '344', '尼木县');
INSERT INTO `g_base_region` VALUES ('2935', '344', '曲水县');
INSERT INTO `g_base_region` VALUES ('2936', '344', '堆龙德庆县');
INSERT INTO `g_base_region` VALUES ('2937', '344', '达孜县');
INSERT INTO `g_base_region` VALUES ('2938', '344', '墨竹工卡县');
INSERT INTO `g_base_region` VALUES ('2939', '345', '噶尔县');
INSERT INTO `g_base_region` VALUES ('2940', '345', '普兰县');
INSERT INTO `g_base_region` VALUES ('2941', '345', '札达县');
INSERT INTO `g_base_region` VALUES ('2942', '345', '日土县');
INSERT INTO `g_base_region` VALUES ('2943', '345', '革吉县');
INSERT INTO `g_base_region` VALUES ('2944', '345', '改则县');
INSERT INTO `g_base_region` VALUES ('2945', '345', '措勤县');
INSERT INTO `g_base_region` VALUES ('2946', '346', '昌都县');
INSERT INTO `g_base_region` VALUES ('2947', '346', '江达县');
INSERT INTO `g_base_region` VALUES ('2948', '346', '贡觉县');
INSERT INTO `g_base_region` VALUES ('2949', '346', '类乌齐县');
INSERT INTO `g_base_region` VALUES ('2950', '346', '丁青县');
INSERT INTO `g_base_region` VALUES ('2951', '346', '察雅县');
INSERT INTO `g_base_region` VALUES ('2952', '346', '八宿县');
INSERT INTO `g_base_region` VALUES ('2953', '346', '左贡县');
INSERT INTO `g_base_region` VALUES ('2954', '346', '芒康县');
INSERT INTO `g_base_region` VALUES ('2955', '346', '洛隆县');
INSERT INTO `g_base_region` VALUES ('2956', '346', '边坝县');
INSERT INTO `g_base_region` VALUES ('2957', '347', '林芝县');
INSERT INTO `g_base_region` VALUES ('2958', '347', '工布江达县');
INSERT INTO `g_base_region` VALUES ('2959', '347', '米林县');
INSERT INTO `g_base_region` VALUES ('2960', '347', '墨脱县');
INSERT INTO `g_base_region` VALUES ('2961', '347', '波密县');
INSERT INTO `g_base_region` VALUES ('2962', '347', '察隅县');
INSERT INTO `g_base_region` VALUES ('2963', '347', '朗县');
INSERT INTO `g_base_region` VALUES ('2964', '348', '那曲县');
INSERT INTO `g_base_region` VALUES ('2965', '348', '嘉黎县');
INSERT INTO `g_base_region` VALUES ('2966', '348', '比如县');
INSERT INTO `g_base_region` VALUES ('2967', '348', '聂荣县');
INSERT INTO `g_base_region` VALUES ('2968', '348', '安多县');
INSERT INTO `g_base_region` VALUES ('2969', '348', '申扎县');
INSERT INTO `g_base_region` VALUES ('2970', '348', '索县');
INSERT INTO `g_base_region` VALUES ('2971', '348', '班戈县');
INSERT INTO `g_base_region` VALUES ('2972', '348', '巴青县');
INSERT INTO `g_base_region` VALUES ('2973', '348', '尼玛县');
INSERT INTO `g_base_region` VALUES ('2974', '349', '日喀则市');
INSERT INTO `g_base_region` VALUES ('2975', '349', '南木林县');
INSERT INTO `g_base_region` VALUES ('2976', '349', '江孜县');
INSERT INTO `g_base_region` VALUES ('2977', '349', '定日县');
INSERT INTO `g_base_region` VALUES ('2978', '349', '萨迦县');
INSERT INTO `g_base_region` VALUES ('2979', '349', '拉孜县');
INSERT INTO `g_base_region` VALUES ('2980', '349', '昂仁县');
INSERT INTO `g_base_region` VALUES ('2981', '349', '谢通门县');
INSERT INTO `g_base_region` VALUES ('2982', '349', '白朗县');
INSERT INTO `g_base_region` VALUES ('2983', '349', '仁布县');
INSERT INTO `g_base_region` VALUES ('2984', '349', '康马县');
INSERT INTO `g_base_region` VALUES ('2985', '349', '定结县');
INSERT INTO `g_base_region` VALUES ('2986', '349', '仲巴县');
INSERT INTO `g_base_region` VALUES ('2987', '349', '亚东县');
INSERT INTO `g_base_region` VALUES ('2988', '349', '吉隆县');
INSERT INTO `g_base_region` VALUES ('2989', '349', '聂拉木县');
INSERT INTO `g_base_region` VALUES ('2990', '349', '萨嘎县');
INSERT INTO `g_base_region` VALUES ('2991', '349', '岗巴县');
INSERT INTO `g_base_region` VALUES ('2992', '350', '乃东县');
INSERT INTO `g_base_region` VALUES ('2993', '350', '扎囊县');
INSERT INTO `g_base_region` VALUES ('2994', '350', '贡嘎县');
INSERT INTO `g_base_region` VALUES ('2995', '350', '桑日县');
INSERT INTO `g_base_region` VALUES ('2996', '350', '琼结县');
INSERT INTO `g_base_region` VALUES ('2997', '350', '曲松县');
INSERT INTO `g_base_region` VALUES ('2998', '350', '措美县');
INSERT INTO `g_base_region` VALUES ('2999', '350', '洛扎县');
INSERT INTO `g_base_region` VALUES ('3000', '350', '加查县');
INSERT INTO `g_base_region` VALUES ('3001', '350', '隆子县');
INSERT INTO `g_base_region` VALUES ('3002', '350', '错那县');
INSERT INTO `g_base_region` VALUES ('3003', '350', '浪卡子县');
INSERT INTO `g_base_region` VALUES ('3004', '351', '天山区');
INSERT INTO `g_base_region` VALUES ('3005', '351', '沙依巴克区');
INSERT INTO `g_base_region` VALUES ('3006', '351', '新市区');
INSERT INTO `g_base_region` VALUES ('3007', '351', '水磨沟区');
INSERT INTO `g_base_region` VALUES ('3008', '351', '头屯河区');
INSERT INTO `g_base_region` VALUES ('3009', '351', '达坂城区');
INSERT INTO `g_base_region` VALUES ('3010', '351', '米东区');
INSERT INTO `g_base_region` VALUES ('3011', '351', '乌鲁木齐县');
INSERT INTO `g_base_region` VALUES ('3012', '352', '阿克苏市');
INSERT INTO `g_base_region` VALUES ('3013', '352', '温宿县');
INSERT INTO `g_base_region` VALUES ('3014', '352', '库车县');
INSERT INTO `g_base_region` VALUES ('3015', '352', '沙雅县');
INSERT INTO `g_base_region` VALUES ('3016', '352', '新和县');
INSERT INTO `g_base_region` VALUES ('3017', '352', '拜城县');
INSERT INTO `g_base_region` VALUES ('3018', '352', '乌什县');
INSERT INTO `g_base_region` VALUES ('3019', '352', '阿瓦提县');
INSERT INTO `g_base_region` VALUES ('3020', '352', '柯坪县');
INSERT INTO `g_base_region` VALUES ('3021', '353', '阿拉尔市');
INSERT INTO `g_base_region` VALUES ('3022', '354', '库尔勒市');
INSERT INTO `g_base_region` VALUES ('3023', '354', '轮台县');
INSERT INTO `g_base_region` VALUES ('3024', '354', '尉犁县');
INSERT INTO `g_base_region` VALUES ('3025', '354', '若羌县');
INSERT INTO `g_base_region` VALUES ('3026', '354', '且末县');
INSERT INTO `g_base_region` VALUES ('3027', '354', '焉耆');
INSERT INTO `g_base_region` VALUES ('3028', '354', '和静县');
INSERT INTO `g_base_region` VALUES ('3029', '354', '和硕县');
INSERT INTO `g_base_region` VALUES ('3030', '354', '博湖县');
INSERT INTO `g_base_region` VALUES ('3031', '355', '博乐市');
INSERT INTO `g_base_region` VALUES ('3032', '355', '精河县');
INSERT INTO `g_base_region` VALUES ('3033', '355', '温泉县');
INSERT INTO `g_base_region` VALUES ('3034', '356', '呼图壁县');
INSERT INTO `g_base_region` VALUES ('3035', '356', '米泉市');
INSERT INTO `g_base_region` VALUES ('3036', '356', '昌吉市');
INSERT INTO `g_base_region` VALUES ('3037', '356', '阜康市');
INSERT INTO `g_base_region` VALUES ('3038', '356', '玛纳斯县');
INSERT INTO `g_base_region` VALUES ('3039', '356', '奇台县');
INSERT INTO `g_base_region` VALUES ('3040', '356', '吉木萨尔县');
INSERT INTO `g_base_region` VALUES ('3041', '356', '木垒');
INSERT INTO `g_base_region` VALUES ('3042', '357', '哈密市');
INSERT INTO `g_base_region` VALUES ('3043', '357', '伊吾县');
INSERT INTO `g_base_region` VALUES ('3044', '357', '巴里坤');
INSERT INTO `g_base_region` VALUES ('3045', '358', '和田市');
INSERT INTO `g_base_region` VALUES ('3046', '358', '和田县');
INSERT INTO `g_base_region` VALUES ('3047', '358', '墨玉县');
INSERT INTO `g_base_region` VALUES ('3048', '358', '皮山县');
INSERT INTO `g_base_region` VALUES ('3049', '358', '洛浦县');
INSERT INTO `g_base_region` VALUES ('3050', '358', '策勒县');
INSERT INTO `g_base_region` VALUES ('3051', '358', '于田县');
INSERT INTO `g_base_region` VALUES ('3052', '358', '民丰县');
INSERT INTO `g_base_region` VALUES ('3053', '359', '喀什市');
INSERT INTO `g_base_region` VALUES ('3054', '359', '疏附县');
INSERT INTO `g_base_region` VALUES ('3055', '359', '疏勒县');
INSERT INTO `g_base_region` VALUES ('3056', '359', '英吉沙县');
INSERT INTO `g_base_region` VALUES ('3057', '359', '泽普县');
INSERT INTO `g_base_region` VALUES ('3058', '359', '莎车县');
INSERT INTO `g_base_region` VALUES ('3059', '359', '叶城县');
INSERT INTO `g_base_region` VALUES ('3060', '359', '麦盖提县');
INSERT INTO `g_base_region` VALUES ('3061', '359', '岳普湖县');
INSERT INTO `g_base_region` VALUES ('3062', '359', '伽师县');
INSERT INTO `g_base_region` VALUES ('3063', '359', '巴楚县');
INSERT INTO `g_base_region` VALUES ('3064', '359', '塔什库尔干');
INSERT INTO `g_base_region` VALUES ('3065', '360', '克拉玛依市');
INSERT INTO `g_base_region` VALUES ('3066', '361', '阿图什市');
INSERT INTO `g_base_region` VALUES ('3067', '361', '阿克陶县');
INSERT INTO `g_base_region` VALUES ('3068', '361', '阿合奇县');
INSERT INTO `g_base_region` VALUES ('3069', '361', '乌恰县');
INSERT INTO `g_base_region` VALUES ('3070', '362', '石河子市');
INSERT INTO `g_base_region` VALUES ('3071', '363', '图木舒克市');
INSERT INTO `g_base_region` VALUES ('3072', '364', '吐鲁番市');
INSERT INTO `g_base_region` VALUES ('3073', '364', '鄯善县');
INSERT INTO `g_base_region` VALUES ('3074', '364', '托克逊县');
INSERT INTO `g_base_region` VALUES ('3075', '365', '五家渠市');
INSERT INTO `g_base_region` VALUES ('3076', '366', '阿勒泰市');
INSERT INTO `g_base_region` VALUES ('3077', '366', '布克赛尔');
INSERT INTO `g_base_region` VALUES ('3078', '366', '伊宁市');
INSERT INTO `g_base_region` VALUES ('3079', '366', '布尔津县');
INSERT INTO `g_base_region` VALUES ('3080', '366', '奎屯市');
INSERT INTO `g_base_region` VALUES ('3081', '366', '乌苏市');
INSERT INTO `g_base_region` VALUES ('3082', '366', '额敏县');
INSERT INTO `g_base_region` VALUES ('3083', '366', '富蕴县');
INSERT INTO `g_base_region` VALUES ('3084', '366', '伊宁县');
INSERT INTO `g_base_region` VALUES ('3085', '366', '福海县');
INSERT INTO `g_base_region` VALUES ('3086', '366', '霍城县');
INSERT INTO `g_base_region` VALUES ('3087', '366', '沙湾县');
INSERT INTO `g_base_region` VALUES ('3088', '366', '巩留县');
INSERT INTO `g_base_region` VALUES ('3089', '366', '哈巴河县');
INSERT INTO `g_base_region` VALUES ('3090', '366', '托里县');
INSERT INTO `g_base_region` VALUES ('3091', '366', '青河县');
INSERT INTO `g_base_region` VALUES ('3092', '366', '新源县');
INSERT INTO `g_base_region` VALUES ('3093', '366', '裕民县');
INSERT INTO `g_base_region` VALUES ('3094', '366', '和布克赛尔');
INSERT INTO `g_base_region` VALUES ('3095', '366', '吉木乃县');
INSERT INTO `g_base_region` VALUES ('3096', '366', '昭苏县');
INSERT INTO `g_base_region` VALUES ('3097', '366', '特克斯县');
INSERT INTO `g_base_region` VALUES ('3098', '366', '尼勒克县');
INSERT INTO `g_base_region` VALUES ('3099', '366', '察布查尔');
INSERT INTO `g_base_region` VALUES ('3100', '367', '盘龙区');
INSERT INTO `g_base_region` VALUES ('3101', '367', '五华区');
INSERT INTO `g_base_region` VALUES ('3102', '367', '官渡区');
INSERT INTO `g_base_region` VALUES ('3103', '367', '西山区');
INSERT INTO `g_base_region` VALUES ('3104', '367', '东川区');
INSERT INTO `g_base_region` VALUES ('3105', '367', '安宁市');
INSERT INTO `g_base_region` VALUES ('3106', '367', '呈贡县');
INSERT INTO `g_base_region` VALUES ('3107', '367', '晋宁县');
INSERT INTO `g_base_region` VALUES ('3108', '367', '富民县');
INSERT INTO `g_base_region` VALUES ('3109', '367', '宜良县');
INSERT INTO `g_base_region` VALUES ('3110', '367', '嵩明县');
INSERT INTO `g_base_region` VALUES ('3111', '367', '石林县');
INSERT INTO `g_base_region` VALUES ('3112', '367', '禄劝');
INSERT INTO `g_base_region` VALUES ('3113', '367', '寻甸');
INSERT INTO `g_base_region` VALUES ('3114', '368', '兰坪');
INSERT INTO `g_base_region` VALUES ('3115', '368', '泸水县');
INSERT INTO `g_base_region` VALUES ('3116', '368', '福贡县');
INSERT INTO `g_base_region` VALUES ('3117', '368', '贡山');
INSERT INTO `g_base_region` VALUES ('3118', '369', '宁洱');
INSERT INTO `g_base_region` VALUES ('3119', '369', '思茅区');
INSERT INTO `g_base_region` VALUES ('3120', '369', '墨江');
INSERT INTO `g_base_region` VALUES ('3121', '369', '景东');
INSERT INTO `g_base_region` VALUES ('3122', '369', '景谷');
INSERT INTO `g_base_region` VALUES ('3123', '369', '镇沅');
INSERT INTO `g_base_region` VALUES ('3124', '369', '江城');
INSERT INTO `g_base_region` VALUES ('3125', '369', '孟连');
INSERT INTO `g_base_region` VALUES ('3126', '369', '澜沧');
INSERT INTO `g_base_region` VALUES ('3127', '369', '西盟');
INSERT INTO `g_base_region` VALUES ('3128', '370', '古城区');
INSERT INTO `g_base_region` VALUES ('3129', '370', '宁蒗');
INSERT INTO `g_base_region` VALUES ('3130', '370', '玉龙');
INSERT INTO `g_base_region` VALUES ('3131', '370', '永胜县');
INSERT INTO `g_base_region` VALUES ('3132', '370', '华坪县');
INSERT INTO `g_base_region` VALUES ('3133', '371', '隆阳区');
INSERT INTO `g_base_region` VALUES ('3134', '371', '施甸县');
INSERT INTO `g_base_region` VALUES ('3135', '371', '腾冲县');
INSERT INTO `g_base_region` VALUES ('3136', '371', '龙陵县');
INSERT INTO `g_base_region` VALUES ('3137', '371', '昌宁县');
INSERT INTO `g_base_region` VALUES ('3138', '372', '楚雄市');
INSERT INTO `g_base_region` VALUES ('3139', '372', '双柏县');
INSERT INTO `g_base_region` VALUES ('3140', '372', '牟定县');
INSERT INTO `g_base_region` VALUES ('3141', '372', '南华县');
INSERT INTO `g_base_region` VALUES ('3142', '372', '姚安县');
INSERT INTO `g_base_region` VALUES ('3143', '372', '大姚县');
INSERT INTO `g_base_region` VALUES ('3144', '372', '永仁县');
INSERT INTO `g_base_region` VALUES ('3145', '372', '元谋县');
INSERT INTO `g_base_region` VALUES ('3146', '372', '武定县');
INSERT INTO `g_base_region` VALUES ('3147', '372', '禄丰县');
INSERT INTO `g_base_region` VALUES ('3148', '373', '大理市');
INSERT INTO `g_base_region` VALUES ('3149', '373', '祥云县');
INSERT INTO `g_base_region` VALUES ('3150', '373', '宾川县');
INSERT INTO `g_base_region` VALUES ('3151', '373', '弥渡县');
INSERT INTO `g_base_region` VALUES ('3152', '373', '永平县');
INSERT INTO `g_base_region` VALUES ('3153', '373', '云龙县');
INSERT INTO `g_base_region` VALUES ('3154', '373', '洱源县');
INSERT INTO `g_base_region` VALUES ('3155', '373', '剑川县');
INSERT INTO `g_base_region` VALUES ('3156', '373', '鹤庆县');
INSERT INTO `g_base_region` VALUES ('3157', '373', '漾濞');
INSERT INTO `g_base_region` VALUES ('3158', '373', '南涧');
INSERT INTO `g_base_region` VALUES ('3159', '373', '巍山');
INSERT INTO `g_base_region` VALUES ('3160', '374', '潞西市');
INSERT INTO `g_base_region` VALUES ('3161', '374', '瑞丽市');
INSERT INTO `g_base_region` VALUES ('3162', '374', '梁河县');
INSERT INTO `g_base_region` VALUES ('3163', '374', '盈江县');
INSERT INTO `g_base_region` VALUES ('3164', '374', '陇川县');
INSERT INTO `g_base_region` VALUES ('3165', '375', '香格里拉县');
INSERT INTO `g_base_region` VALUES ('3166', '375', '德钦县');
INSERT INTO `g_base_region` VALUES ('3167', '375', '维西');
INSERT INTO `g_base_region` VALUES ('3168', '376', '泸西县');
INSERT INTO `g_base_region` VALUES ('3169', '376', '蒙自县');
INSERT INTO `g_base_region` VALUES ('3170', '376', '个旧市');
INSERT INTO `g_base_region` VALUES ('3171', '376', '开远市');
INSERT INTO `g_base_region` VALUES ('3172', '376', '绿春县');
INSERT INTO `g_base_region` VALUES ('3173', '376', '建水县');
INSERT INTO `g_base_region` VALUES ('3174', '376', '石屏县');
INSERT INTO `g_base_region` VALUES ('3175', '376', '弥勒县');
INSERT INTO `g_base_region` VALUES ('3176', '376', '元阳县');
INSERT INTO `g_base_region` VALUES ('3177', '376', '红河县');
INSERT INTO `g_base_region` VALUES ('3178', '376', '金平');
INSERT INTO `g_base_region` VALUES ('3179', '376', '河口');
INSERT INTO `g_base_region` VALUES ('3180', '376', '屏边');
INSERT INTO `g_base_region` VALUES ('3181', '377', '临翔区');
INSERT INTO `g_base_region` VALUES ('3182', '377', '凤庆县');
INSERT INTO `g_base_region` VALUES ('3183', '377', '云县');
INSERT INTO `g_base_region` VALUES ('3184', '377', '永德县');
INSERT INTO `g_base_region` VALUES ('3185', '377', '镇康县');
INSERT INTO `g_base_region` VALUES ('3186', '377', '双江');
INSERT INTO `g_base_region` VALUES ('3187', '377', '耿马');
INSERT INTO `g_base_region` VALUES ('3188', '377', '沧源');
INSERT INTO `g_base_region` VALUES ('3189', '378', '麒麟区');
INSERT INTO `g_base_region` VALUES ('3190', '378', '宣威市');
INSERT INTO `g_base_region` VALUES ('3191', '378', '马龙县');
INSERT INTO `g_base_region` VALUES ('3192', '378', '陆良县');
INSERT INTO `g_base_region` VALUES ('3193', '378', '师宗县');
INSERT INTO `g_base_region` VALUES ('3194', '378', '罗平县');
INSERT INTO `g_base_region` VALUES ('3195', '378', '富源县');
INSERT INTO `g_base_region` VALUES ('3196', '378', '会泽县');
INSERT INTO `g_base_region` VALUES ('3197', '378', '沾益县');
INSERT INTO `g_base_region` VALUES ('3198', '379', '文山县');
INSERT INTO `g_base_region` VALUES ('3199', '379', '砚山县');
INSERT INTO `g_base_region` VALUES ('3200', '379', '西畴县');
INSERT INTO `g_base_region` VALUES ('3201', '379', '麻栗坡县');
INSERT INTO `g_base_region` VALUES ('3202', '379', '马关县');
INSERT INTO `g_base_region` VALUES ('3203', '379', '丘北县');
INSERT INTO `g_base_region` VALUES ('3204', '379', '广南县');
INSERT INTO `g_base_region` VALUES ('3205', '379', '富宁县');
INSERT INTO `g_base_region` VALUES ('3206', '380', '景洪市');
INSERT INTO `g_base_region` VALUES ('3207', '380', '勐海县');
INSERT INTO `g_base_region` VALUES ('3208', '380', '勐腊县');
INSERT INTO `g_base_region` VALUES ('3209', '381', '红塔区');
INSERT INTO `g_base_region` VALUES ('3210', '381', '江川县');
INSERT INTO `g_base_region` VALUES ('3211', '381', '澄江县');
INSERT INTO `g_base_region` VALUES ('3212', '381', '通海县');
INSERT INTO `g_base_region` VALUES ('3213', '381', '华宁县');
INSERT INTO `g_base_region` VALUES ('3214', '381', '易门县');
INSERT INTO `g_base_region` VALUES ('3215', '381', '峨山');
INSERT INTO `g_base_region` VALUES ('3216', '381', '新平');
INSERT INTO `g_base_region` VALUES ('3217', '381', '元江');
INSERT INTO `g_base_region` VALUES ('3218', '382', '昭阳区');
INSERT INTO `g_base_region` VALUES ('3219', '382', '鲁甸县');
INSERT INTO `g_base_region` VALUES ('3220', '382', '巧家县');
INSERT INTO `g_base_region` VALUES ('3221', '382', '盐津县');
INSERT INTO `g_base_region` VALUES ('3222', '382', '大关县');
INSERT INTO `g_base_region` VALUES ('3223', '382', '永善县');
INSERT INTO `g_base_region` VALUES ('3224', '382', '绥江县');
INSERT INTO `g_base_region` VALUES ('3225', '382', '镇雄县');
INSERT INTO `g_base_region` VALUES ('3226', '382', '彝良县');
INSERT INTO `g_base_region` VALUES ('3227', '382', '威信县');
INSERT INTO `g_base_region` VALUES ('3228', '382', '水富县');
INSERT INTO `g_base_region` VALUES ('3229', '383', '西湖区');
INSERT INTO `g_base_region` VALUES ('3230', '383', '上城区');
INSERT INTO `g_base_region` VALUES ('3231', '383', '下城区');
INSERT INTO `g_base_region` VALUES ('3232', '383', '拱墅区');
INSERT INTO `g_base_region` VALUES ('3233', '383', '滨江区');
INSERT INTO `g_base_region` VALUES ('3234', '383', '江干区');
INSERT INTO `g_base_region` VALUES ('3235', '383', '萧山区');
INSERT INTO `g_base_region` VALUES ('3236', '383', '余杭区');
INSERT INTO `g_base_region` VALUES ('3237', '383', '市郊');
INSERT INTO `g_base_region` VALUES ('3238', '383', '建德市');
INSERT INTO `g_base_region` VALUES ('3239', '383', '富阳市');
INSERT INTO `g_base_region` VALUES ('3240', '383', '临安市');
INSERT INTO `g_base_region` VALUES ('3241', '383', '桐庐县');
INSERT INTO `g_base_region` VALUES ('3242', '383', '淳安县');
INSERT INTO `g_base_region` VALUES ('3243', '384', '吴兴区');
INSERT INTO `g_base_region` VALUES ('3244', '384', '南浔区');
INSERT INTO `g_base_region` VALUES ('3245', '384', '德清县');
INSERT INTO `g_base_region` VALUES ('3246', '384', '长兴县');
INSERT INTO `g_base_region` VALUES ('3247', '384', '安吉县');
INSERT INTO `g_base_region` VALUES ('3248', '385', '南湖区');
INSERT INTO `g_base_region` VALUES ('3249', '385', '秀洲区');
INSERT INTO `g_base_region` VALUES ('3250', '385', '海宁市');
INSERT INTO `g_base_region` VALUES ('3251', '385', '嘉善县');
INSERT INTO `g_base_region` VALUES ('3252', '385', '平湖市');
INSERT INTO `g_base_region` VALUES ('3253', '385', '桐乡市');
INSERT INTO `g_base_region` VALUES ('3254', '385', '海盐县');
INSERT INTO `g_base_region` VALUES ('3255', '386', '婺城区');
INSERT INTO `g_base_region` VALUES ('3256', '386', '金东区');
INSERT INTO `g_base_region` VALUES ('3257', '386', '兰溪市');
INSERT INTO `g_base_region` VALUES ('3258', '386', '市区');
INSERT INTO `g_base_region` VALUES ('3259', '386', '佛堂镇');
INSERT INTO `g_base_region` VALUES ('3260', '386', '上溪镇');
INSERT INTO `g_base_region` VALUES ('3261', '386', '义亭镇');
INSERT INTO `g_base_region` VALUES ('3262', '386', '大陈镇');
INSERT INTO `g_base_region` VALUES ('3263', '386', '苏溪镇');
INSERT INTO `g_base_region` VALUES ('3264', '386', '赤岸镇');
INSERT INTO `g_base_region` VALUES ('3265', '386', '东阳市');
INSERT INTO `g_base_region` VALUES ('3266', '386', '永康市');
INSERT INTO `g_base_region` VALUES ('3267', '386', '武义县');
INSERT INTO `g_base_region` VALUES ('3268', '386', '浦江县');
INSERT INTO `g_base_region` VALUES ('3269', '386', '磐安县');
INSERT INTO `g_base_region` VALUES ('3270', '387', '莲都区');
INSERT INTO `g_base_region` VALUES ('3271', '387', '龙泉市');
INSERT INTO `g_base_region` VALUES ('3272', '387', '青田县');
INSERT INTO `g_base_region` VALUES ('3273', '387', '缙云县');
INSERT INTO `g_base_region` VALUES ('3274', '387', '遂昌县');
INSERT INTO `g_base_region` VALUES ('3275', '387', '松阳县');
INSERT INTO `g_base_region` VALUES ('3276', '387', '云和县');
INSERT INTO `g_base_region` VALUES ('3277', '387', '庆元县');
INSERT INTO `g_base_region` VALUES ('3278', '387', '景宁');
INSERT INTO `g_base_region` VALUES ('3279', '388', '海曙区');
INSERT INTO `g_base_region` VALUES ('3280', '388', '江东区');
INSERT INTO `g_base_region` VALUES ('3281', '388', '江北区');
INSERT INTO `g_base_region` VALUES ('3282', '388', '镇海区');
INSERT INTO `g_base_region` VALUES ('3283', '388', '北仑区');
INSERT INTO `g_base_region` VALUES ('3284', '388', '鄞州区');
INSERT INTO `g_base_region` VALUES ('3285', '388', '余姚市');
INSERT INTO `g_base_region` VALUES ('3286', '388', '慈溪市');
INSERT INTO `g_base_region` VALUES ('3287', '388', '奉化市');
INSERT INTO `g_base_region` VALUES ('3288', '388', '象山县');
INSERT INTO `g_base_region` VALUES ('3289', '388', '宁海县');
INSERT INTO `g_base_region` VALUES ('3290', '389', '越城区');
INSERT INTO `g_base_region` VALUES ('3291', '389', '上虞市');
INSERT INTO `g_base_region` VALUES ('3292', '389', '嵊州市');
INSERT INTO `g_base_region` VALUES ('3293', '389', '绍兴县');
INSERT INTO `g_base_region` VALUES ('3294', '389', '新昌县');
INSERT INTO `g_base_region` VALUES ('3295', '389', '诸暨市');
INSERT INTO `g_base_region` VALUES ('3296', '390', '椒江区');
INSERT INTO `g_base_region` VALUES ('3297', '390', '黄岩区');
INSERT INTO `g_base_region` VALUES ('3298', '390', '路桥区');
INSERT INTO `g_base_region` VALUES ('3299', '390', '温岭市');
INSERT INTO `g_base_region` VALUES ('3300', '390', '临海市');
INSERT INTO `g_base_region` VALUES ('3301', '390', '玉环县');
INSERT INTO `g_base_region` VALUES ('3302', '390', '三门县');
INSERT INTO `g_base_region` VALUES ('3303', '390', '天台县');
INSERT INTO `g_base_region` VALUES ('3304', '390', '仙居县');
INSERT INTO `g_base_region` VALUES ('3305', '391', '鹿城区');
INSERT INTO `g_base_region` VALUES ('3306', '391', '龙湾区');
INSERT INTO `g_base_region` VALUES ('3307', '391', '瓯海区');
INSERT INTO `g_base_region` VALUES ('3308', '391', '瑞安市');
INSERT INTO `g_base_region` VALUES ('3309', '391', '乐清市');
INSERT INTO `g_base_region` VALUES ('3310', '391', '洞头县');
INSERT INTO `g_base_region` VALUES ('3311', '391', '永嘉县');
INSERT INTO `g_base_region` VALUES ('3312', '391', '平阳县');
INSERT INTO `g_base_region` VALUES ('3313', '391', '苍南县');
INSERT INTO `g_base_region` VALUES ('3314', '391', '文成县');
INSERT INTO `g_base_region` VALUES ('3315', '391', '泰顺县');
INSERT INTO `g_base_region` VALUES ('3316', '392', '定海区');
INSERT INTO `g_base_region` VALUES ('3317', '392', '普陀区');
INSERT INTO `g_base_region` VALUES ('3318', '392', '岱山县');
INSERT INTO `g_base_region` VALUES ('3319', '392', '嵊泗县');
INSERT INTO `g_base_region` VALUES ('3320', '393', '衢州市');
INSERT INTO `g_base_region` VALUES ('3321', '393', '江山市');
INSERT INTO `g_base_region` VALUES ('3322', '393', '常山县');
INSERT INTO `g_base_region` VALUES ('3323', '393', '开化县');
INSERT INTO `g_base_region` VALUES ('3324', '393', '龙游县');
INSERT INTO `g_base_region` VALUES ('3325', '394', '合川区');
INSERT INTO `g_base_region` VALUES ('3326', '394', '江津区');
INSERT INTO `g_base_region` VALUES ('3327', '394', '南川区');
INSERT INTO `g_base_region` VALUES ('3328', '394', '永川区');
INSERT INTO `g_base_region` VALUES ('3329', '394', '南岸区');
INSERT INTO `g_base_region` VALUES ('3330', '394', '渝北区');
INSERT INTO `g_base_region` VALUES ('3331', '394', '万盛区');
INSERT INTO `g_base_region` VALUES ('3332', '394', '大渡口区');
INSERT INTO `g_base_region` VALUES ('3333', '394', '万州区');
INSERT INTO `g_base_region` VALUES ('3334', '394', '北碚区');
INSERT INTO `g_base_region` VALUES ('3335', '394', '沙坪坝区');
INSERT INTO `g_base_region` VALUES ('3336', '394', '巴南区');
INSERT INTO `g_base_region` VALUES ('3337', '394', '涪陵区');
INSERT INTO `g_base_region` VALUES ('3338', '394', '江北区');
INSERT INTO `g_base_region` VALUES ('3339', '394', '九龙坡区');
INSERT INTO `g_base_region` VALUES ('3340', '394', '渝中区');
INSERT INTO `g_base_region` VALUES ('3341', '394', '黔江开发区');
INSERT INTO `g_base_region` VALUES ('3342', '394', '长寿区');
INSERT INTO `g_base_region` VALUES ('3343', '394', '双桥区');
INSERT INTO `g_base_region` VALUES ('3344', '394', '綦江县');
INSERT INTO `g_base_region` VALUES ('3345', '394', '潼南县');
INSERT INTO `g_base_region` VALUES ('3346', '394', '铜梁县');
INSERT INTO `g_base_region` VALUES ('3347', '394', '大足县');
INSERT INTO `g_base_region` VALUES ('3348', '394', '荣昌县');
INSERT INTO `g_base_region` VALUES ('3349', '394', '璧山县');
INSERT INTO `g_base_region` VALUES ('3350', '394', '垫江县');
INSERT INTO `g_base_region` VALUES ('3351', '394', '武隆县');
INSERT INTO `g_base_region` VALUES ('3352', '394', '丰都县');
INSERT INTO `g_base_region` VALUES ('3353', '394', '城口县');
INSERT INTO `g_base_region` VALUES ('3354', '394', '梁平县');
INSERT INTO `g_base_region` VALUES ('3355', '394', '开县');
INSERT INTO `g_base_region` VALUES ('3356', '394', '巫溪县');
INSERT INTO `g_base_region` VALUES ('3357', '394', '巫山县');
INSERT INTO `g_base_region` VALUES ('3358', '394', '奉节县');
INSERT INTO `g_base_region` VALUES ('3359', '394', '云阳县');
INSERT INTO `g_base_region` VALUES ('3360', '394', '忠县');
INSERT INTO `g_base_region` VALUES ('3361', '394', '石柱');
INSERT INTO `g_base_region` VALUES ('3362', '394', '彭水');
INSERT INTO `g_base_region` VALUES ('3363', '394', '酉阳');
INSERT INTO `g_base_region` VALUES ('3364', '394', '秀山');
INSERT INTO `g_base_region` VALUES ('3365', '395', '沙田区');
INSERT INTO `g_base_region` VALUES ('3366', '395', '东区');
INSERT INTO `g_base_region` VALUES ('3367', '395', '观塘区');
INSERT INTO `g_base_region` VALUES ('3368', '395', '黄大仙区');
INSERT INTO `g_base_region` VALUES ('3369', '395', '九龙城区');
INSERT INTO `g_base_region` VALUES ('3370', '395', '屯门区');
INSERT INTO `g_base_region` VALUES ('3371', '395', '葵青区');
INSERT INTO `g_base_region` VALUES ('3372', '395', '元朗区');
INSERT INTO `g_base_region` VALUES ('3373', '395', '深水埗区');
INSERT INTO `g_base_region` VALUES ('3374', '395', '西贡区');
INSERT INTO `g_base_region` VALUES ('3375', '395', '大埔区');
INSERT INTO `g_base_region` VALUES ('3376', '395', '湾仔区');
INSERT INTO `g_base_region` VALUES ('3377', '395', '油尖旺区');
INSERT INTO `g_base_region` VALUES ('3378', '395', '北区');
INSERT INTO `g_base_region` VALUES ('3379', '395', '南区');
INSERT INTO `g_base_region` VALUES ('3380', '395', '荃湾区');
INSERT INTO `g_base_region` VALUES ('3381', '395', '中西区');
INSERT INTO `g_base_region` VALUES ('3382', '395', '离岛区');
INSERT INTO `g_base_region` VALUES ('3383', '396', '澳门');
INSERT INTO `g_base_region` VALUES ('3384', '397', '台北');
INSERT INTO `g_base_region` VALUES ('3385', '397', '高雄');
INSERT INTO `g_base_region` VALUES ('3386', '397', '基隆');
INSERT INTO `g_base_region` VALUES ('3387', '397', '台中');
INSERT INTO `g_base_region` VALUES ('3388', '397', '台南');
INSERT INTO `g_base_region` VALUES ('3389', '397', '新竹');
INSERT INTO `g_base_region` VALUES ('3390', '397', '嘉义');
INSERT INTO `g_base_region` VALUES ('3391', '397', '宜兰县');
INSERT INTO `g_base_region` VALUES ('3392', '397', '桃园县');
INSERT INTO `g_base_region` VALUES ('3393', '397', '苗栗县');
INSERT INTO `g_base_region` VALUES ('3394', '397', '彰化县');
INSERT INTO `g_base_region` VALUES ('3395', '397', '南投县');
INSERT INTO `g_base_region` VALUES ('3396', '397', '云林县');
INSERT INTO `g_base_region` VALUES ('3397', '397', '屏东县');
INSERT INTO `g_base_region` VALUES ('3398', '397', '台东县');
INSERT INTO `g_base_region` VALUES ('3399', '397', '花莲县');
INSERT INTO `g_base_region` VALUES ('3400', '397', '澎湖县');
INSERT INTO `g_base_region` VALUES ('3401', '3', '合肥');
INSERT INTO `g_base_region` VALUES ('3402', '3401', '庐阳区');
INSERT INTO `g_base_region` VALUES ('3403', '3401', '瑶海区');
INSERT INTO `g_base_region` VALUES ('3404', '3401', '蜀山区');
INSERT INTO `g_base_region` VALUES ('3405', '3401', '包河区');
INSERT INTO `g_base_region` VALUES ('3406', '3401', '长丰县');
INSERT INTO `g_base_region` VALUES ('3407', '3401', '肥东县');
INSERT INTO `g_base_region` VALUES ('3408', '3401', '肥西县');
INSERT INTO `g_base_region` VALUES ('3409', '502', '五道口');
INSERT INTO `g_base_region` VALUES ('3410', '502', '永定路');

-- ----------------------------
-- Table structure for g_base_session
-- ----------------------------
DROP TABLE IF EXISTS `g_base_session`;
CREATE TABLE `g_base_session` (
  `skey` char(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `uid` int(10) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` int(10) unsigned NOT NULL DEFAULT '0',
  `expire` int(10) unsigned NOT NULL DEFAULT '0',
  `sdata` text NOT NULL,
  PRIMARY KEY (`skey`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_session
-- ----------------------------
INSERT INTO `g_base_session` VALUES ('94fughlafpk6s4gd4aqjv14kc1', '0', '1541645817', '2130706433', '1541647617', 'lastupdate|i:1541645817;isadmin|s:1:\"1\";adminname|s:5:\"admin\";adminrealname|s:0:\"\";admingid|s:1:\"1\";');

-- ----------------------------
-- Table structure for g_base_stats
-- ----------------------------
DROP TABLE IF EXISTS `g_base_stats`;
CREATE TABLE `g_base_stats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accesstime` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `visits` smallint(5) unsigned NOT NULL DEFAULT '1',
  `browser` varchar(60) NOT NULL DEFAULT '',
  `system` varchar(20) NOT NULL DEFAULT '',
  `language` varchar(20) NOT NULL DEFAULT '',
  `area` varchar(30) NOT NULL DEFAULT '',
  `refererdomain` varchar(100) NOT NULL DEFAULT '',
  `refererpath` varchar(200) NOT NULL DEFAULT '',
  `accessurl` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `accesstime` (`accesstime`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_stats
-- ----------------------------

-- ----------------------------
-- Table structure for g_base_token
-- ----------------------------
DROP TABLE IF EXISTS `g_base_token`;
CREATE TABLE `g_base_token` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `sign` char(64) NOT NULL COMMENT '标识',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_token
-- ----------------------------
INSERT INTO `g_base_token` VALUES ('4', '191', '76F2WcN0r6o6A982A1GbwbEfMbhfQ34aKddbRcM9u3o0M9l65coeq5K651ZcS4l8', '2016-09-02 22:56:15');

-- ----------------------------
-- Table structure for g_base_valid
-- ----------------------------
DROP TABLE IF EXISTS `g_base_valid`;
CREATE TABLE `g_base_valid` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telephone` char(20) NOT NULL,
  `type` char(20) NOT NULL,
  `sign` char(20) NOT NULL COMMENT '标识',
  `isvalid` tinyint(2) unsigned NOT NULL,
  `created` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_base_valid
-- ----------------------------

-- ----------------------------
-- Table structure for g_bbs_forum
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum`;
CREATE TABLE `g_bbs_forum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `type` char(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  `sort` tinyint(4) unsigned NOT NULL,
  `threads` int(10) unsigned NOT NULL,
  `posts` int(10) unsigned NOT NULL,
  `forumpic` varchar(255) NOT NULL,
  `forumsummary` mediumtext NOT NULL,
  `lastpost` int(10) unsigned NOT NULL,
  `allowview` tinyint(4) unsigned NOT NULL,
  `allowpost` tinyint(4) unsigned NOT NULL,
  `allowreply` tinyint(4) unsigned NOT NULL,
  `istop` tinyint(2) unsigned NOT NULL,
  `isbest` tinyint(2) unsigned NOT NULL,
  `prize` int(6) unsigned NOT NULL,
  `template` char(50) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum
-- ----------------------------
INSERT INTO `g_bbs_forum` VALUES ('1', '0', 'group', '户外活动', '1', '0', '0', '0', '', '', '0', '0', '0', '0', '0', '0', '0', '', '1470400828');
INSERT INTO `g_bbs_forum` VALUES ('2', '1', 'forum', '攀岩', '1', '0', '3', '4', '', '', '1473606039', '1', '1', '1', '0', '1', '0', '', '1470400849');

-- ----------------------------
-- Table structure for g_bbs_forum_post
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum_post`;
CREATE TABLE `g_bbs_forum_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `threadid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `isfirst` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL,
  `realname` char(50) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `useable` tinyint(1) NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  `reply` mediumtext NOT NULL,
  `replycredit` int(4) unsigned NOT NULL,
  `isrush` tinyint(2) unsigned NOT NULL,
  `postip` varchar(15) NOT NULL DEFAULT '',
  `special` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forumid` (`forumid`),
  KEY `uid` (`uid`),
  KEY `addtime` (`addtime`),
  KEY `useable` (`useable`),
  KEY `isfirst` (`threadid`,`isfirst`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum_post
-- ----------------------------
INSERT INTO `g_bbs_forum_post` VALUES ('3', '2', '2', '0', '1640797264@qq.c', '', '191', '', '1', '1470579223', '一起去攀岩', '1640797264@qq.c 发表于 2016-08-07 22:08:43<br /><p>国际攀联主办的最高规格的赛事有两项，一项是两年一届的世界锦标赛，另一项是每年在世界各地进行的世界杯赛。世界杯攀岩赛是国际攀联的重要赛事，比赛分阶段在世界各地举行。运动员通过分站比赛，依据名次计算积分，进行年度总排名。</p><p>1988年6月国际竞技攀登比赛在美国举行。1989年首届世界杯分阶段在法国、英国、西班牙、意大利、<a target=\"_blank\" href=\"http://baike.baidu.com/view/21781.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">保加利亚</a>和<a target=\"_blank\" href=\"http://baike.baidu.com/view/261966.htm\" style=\"color: rgb(19, 110, 194); text-decoration: none;\">前苏联</a>举行。运动员参加各地比赛，最后累计总成绩，进行排名。世界杯攀登比赛每年举行一次。随着攀岩运动的蓬勃发展，国际攀联在各大洲成立委员会，组织洲内地区性大赛。&quot;亚洲攀委会&quot;1991年1月2日在香港成立，第一届亚锦赛91年12月在香港举行。1993年12月在中国长春举行了第一届亚锦赛。1987年中国登协主办了第一届全国攀岩比赛列入全国比赛项目。</p>', '0', '0', '127.0.0.1', '0');

-- ----------------------------
-- Table structure for g_bbs_forum_replycredit
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum_replycredit`;
CREATE TABLE `g_bbs_forum_replycredit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `credit` int(4) unsigned NOT NULL,
  `times` tinyint(4) unsigned NOT NULL,
  `usertimes` tinyint(4) unsigned NOT NULL,
  `random` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum_replycredit
-- ----------------------------

-- ----------------------------
-- Table structure for g_bbs_forum_rush
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum_rush`;
CREATE TABLE `g_bbs_forum_rush` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `starttime` int(10) unsigned NOT NULL,
  `endtime` int(10) unsigned NOT NULL,
  `stopfloor` int(2) unsigned NOT NULL,
  `usertimes` int(2) NOT NULL,
  `rewardfloor` char(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum_rush
-- ----------------------------

-- ----------------------------
-- Table structure for g_bbs_forum_thread
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum_thread`;
CREATE TABLE `g_bbs_forum_thread` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `forumid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL,
  `realname` char(50) NOT NULL,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `title` char(80) NOT NULL DEFAULT '',
  `titlecolor` char(20) NOT NULL,
  `stamp` char(20) NOT NULL COMMENT '图章',
  `attach` varchar(255) NOT NULL,
  `addtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpostuid` int(10) unsigned NOT NULL,
  `lastposter` char(15) NOT NULL DEFAULT '',
  `views` int(10) unsigned NOT NULL DEFAULT '0',
  `replies` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `stows` int(6) unsigned NOT NULL,
  `special` tinyint(2) unsigned NOT NULL,
  `replycredit` int(4) unsigned NOT NULL,
  `isrush` tinyint(2) unsigned NOT NULL,
  `sort` tinyint(1) NOT NULL DEFAULT '0',
  `istop` tinyint(1) NOT NULL DEFAULT '0',
  `isbest` tinyint(1) NOT NULL DEFAULT '0',
  `ishot` tinyint(2) unsigned NOT NULL COMMENT '热帖',
  `ispic` tinyint(2) unsigned NOT NULL COMMENT '美图',
  `isgood` tinyint(2) unsigned NOT NULL COMMENT '优秀',
  `isrec` tinyint(2) unsigned NOT NULL COMMENT '推荐',
  `iscreate` tinyint(2) unsigned NOT NULL COMMENT '原创',
  `isbao` tinyint(2) unsigned NOT NULL COMMENT '爆料',
  `isprize` tinyint(2) unsigned NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `isbest` (`isbest`),
  KEY `sort` (`forumid`,`sort`,`lastpost`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum_thread
-- ----------------------------
INSERT INTO `g_bbs_forum_thread` VALUES ('2', '2', '1640797264@qq.c', '', '191', '极限挑战', '', 'istop', '', '1470578816', '1470579223', '191', '1640797264@qq.c', '21', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for g_bbs_forum_vote
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum_vote`;
CREATE TABLE `g_bbs_forum_vote` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `votes` int(6) unsigned NOT NULL,
  `sort` int(4) unsigned NOT NULL,
  `votename` varchar(100) NOT NULL,
  `voteuids` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum_vote
-- ----------------------------

-- ----------------------------
-- Table structure for g_bbs_forum_voter
-- ----------------------------
DROP TABLE IF EXISTS `g_bbs_forum_voter`;
CREATE TABLE `g_bbs_forum_voter` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `threadid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `username` char(50) NOT NULL,
  `voteid` int(10) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_bbs_forum_voter
-- ----------------------------

-- ----------------------------
-- Table structure for g_goods_goods
-- ----------------------------
DROP TABLE IF EXISTS `g_goods_goods`;
CREATE TABLE `g_goods_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(6) unsigned NOT NULL,
  `catid` int(6) unsigned NOT NULL,
  `catarr` varchar(100) NOT NULL,
  `kind` tinyint(2) unsigned NOT NULL,
  `goodsname` varchar(100) NOT NULL,
  `goodsbrief` varchar(100) NOT NULL,
  `goodsthumb` varchar(255) NOT NULL,
  `goodspic` varchar(255) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `marketprice` decimal(10,0) NOT NULL,
  `attr` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `ml` char(50) NOT NULL,
  `sellnum` int(5) unsigned NOT NULL,
  `feednum` int(5) unsigned NOT NULL,
  `bestnum` int(5) unsigned NOT NULL,
  `stownum` int(5) unsigned NOT NULL,
  `tags` varchar(102) NOT NULL,
  `service` text NOT NULL,
  `content` text NOT NULL,
  `ishot` tinyint(2) unsigned NOT NULL,
  `isnew` tinyint(2) unsigned NOT NULL,
  `isspecial` tinyint(2) unsigned NOT NULL,
  `isonsale` tinyint(2) unsigned NOT NULL,
  `sort` int(4) unsigned NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_goods_goods
-- ----------------------------
INSERT INTO `g_goods_goods` VALUES ('1', '191', '11', '11,7', '1', '2016夏新款一子肩韩式齐地结婚婚纱礼服新娘蕾丝大码瘦双肩婚纱', '简介', '', '/vpcvcms_xgj/uploadfile/goods/day_160717/201607172305452200.jpg', '318', '400', '', '白色,红色,黑色', 'S,M,L,XL', '', '0', '1', '0', '0', '', '<ul id=\"zs\" style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>1、在您与鬼鬼进行初步沟通并且认可后，进行沟通并签署立项合同收取摄影定金;</p></li><li><p>2、收取摄影定金后15日内完全部摄影方案;</p></li><li><p>3、摄影方案确定无误后，签署摄影合同，鬼鬼为您提供全程的摄影服务;</p></li><li><p>4、为了给您提供最优质的修图服务以保证您得到满意的成像。</p></li><', '<ul class=\"bao-detial list-paddingleft-2\" style=\"list-style-type: none;\"><li><p>品牌：BORUIDIA/波瑞蒂亚</p></li><li><p>货号：bk001</p></li><li><p>摆型：蓬蓬裙</p></li><li><p>领型：一字肩</p></li><li><p>颜色：齐地款 拖尾款</p></li><li><p>尺码：S M L XL</p></li><li><p>上市年份/季节：2015年冬季</p></li><li><p>风格：韩版</p></li><li><p>服装款式细节：珍珠</p></li><li><p>面料：蕾丝</p></li><li><p>袖长：有袖披肩</p></li><li><p>适用年龄：18-25周岁</p></li><li><p>适用场景：酒店室内</p></li><li><p>流行元素：绑带</p></li><li><p>适用对象：大码</p></li><li><p>腰型：中腰</p></li></ul><p><br/></p>', '0', '0', '0', '0', '0', '1', '1468767945');
INSERT INTO `g_goods_goods` VALUES ('2', '191', '13', '13,9', '3', '2016夏新款喜酒', '从事摄影这个行业一路走来 带着激情和感恩游走在商业圈 感受着时代的国际化文化掌镜过名人、明星 感受着高度和时尚的华彩 缩影过婚纱照 体验着爱的幸福与美好到今天其实发现不管镜头前面的那个人和物是什', '', '/vpcvcms_xgj/uploadfile/goods/day_160717/201607172307363340.jpg', '588', '1688', '一品坊珍藏一号 1.5L+500ML 60%Vol,一品坊3窖藏 500ml*6 52%Vol.', '', '', '1000ml', '0', '0', '0', '0', '', '<ul id=\"zs\" style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>1、在您与鬼鬼进行初步沟通并且认可后，进行沟通并签署立项合同收取摄影定金;</p></li><li><p>2、收取摄影定金后15日内完全部摄影方案;</p></li><li><p>3、摄影方案确定无误后，签署摄影合同，鬼鬼为您提供全程的摄影服务;</p></li><li><p>4、为了给您提供最优质的修图服务以保证您得到满意的成像。</p></li><', '<ul class=\"bao-detial list-paddingleft-2\" style=\"list-style-type: none;\"><li><p>生产许可证编号：QS5100 1501 0375</p></li><li><p>厂名：泸州老窖股份有限公司</p></li><li><p>厂址：1.四川省泸州市国窖广场</p></li><li><p>厂家联系方式：4008881573</p></li><li><p>配料表：水、高粱、小麦</p></li><li><p>储藏方法：常温密封</p></li><li><p>保质期：18250 天</p></li><li><p>食品添加剂：无</p></li><li><p>产品名称：泸州老窖 一品坊6窖藏品鉴...</p></li><li><p>体积(ml)：2000</p></li><li><p>品牌：泸州老窖</p></li><li><p>品名：一品坊6窖藏品鉴</p></li><li><p>产地：中国大陆地区</p></li><li><p>省份：四川省</p></li><li><p>酒精纯度：高度白酒(50%以上)</p></li><li><p>适用场景：团员小酌区</p></li><li><p>包装方式：包装</p></li><li><p>包装种类：瓶装净含量：500mlx4.</p></li></ul><p><br/></p>', '0', '0', '0', '0', '0', '1', '1468768056');
INSERT INTO `g_goods_goods` VALUES ('3', '193', '12', '12,8', '2', '2016夏新款妆容', '从事摄影这个行业一路走来 带着激情和感恩游走在商业圈 感受着时代的国际化文化掌镜过名人、明星 感受着高度和时尚的华彩 缩影过婚纱照 体验着爱的幸福与美好到今天其实发现不管镜头前面的那个人和物是什么状态', '', '/vpcvcms_xgj/uploadfile/goods/day_160718/201607181247237371.jpg', '88', '268', '', '', '', '', '0', '0', '0', '0', '', '<ul id=\"zs\" style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p>1、在您与鬼鬼进行初步沟通并且认可后，进行沟通并签署立项合同收取摄影定金;</p></li><li><p>2、收取摄影定金后15日内完全部摄影方案;</p></li><li><p>3、摄影方案确定无误后，签署摄影合同，鬼鬼为您提供全程的摄影服务;</p></li><li><p>4、为了给您提供最优质的修图服务以保证您得到满意的成像。</p></li><', '<ul class=\"bao-detial list-paddingleft-2\" style=\"list-style-type: none;\"><li><p>品牌：BORUIDIA/波瑞蒂亚</p></li><li><p>货号：bk001</p></li><li><p>摆型：蓬蓬裙</p></li><li><p>领型：一字肩</p></li><li><p>颜色：齐地款 拖尾款</p></li><li><p>尺码：S M L XL</p></li><li><p>上市年份/季节：2015年冬季</p></li><li><p>风格：韩版</p></li><li><p>服装款式细节：珍珠</p></li><li><p>面料：蕾丝</p></li><li><p>袖长：有袖披肩</p></li><li><p>适用年龄：18-25周岁</p></li><li><p>适用场景：酒店室内</p></li><li><p>流行元素：绑带</p></li><li><p>适用对象：大码</p></li><li><p>腰型：中腰</p></li></ul><p><br/></p>', '0', '0', '0', '0', '0', '1', '1468817243');

-- ----------------------------
-- Table structure for g_order_goods
-- ----------------------------
DROP TABLE IF EXISTS `g_order_goods`;
CREATE TABLE `g_order_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orderid` int(10) unsigned NOT NULL,
  `goodsid` int(10) unsigned NOT NULL,
  `goodsname` char(50) NOT NULL,
  `marketprice` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `attr` char(100) NOT NULL,
  `color` char(100) NOT NULL,
  `size` char(100) NOT NULL,
  `num` tinyint(4) unsigned NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `isfeed` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_order_goods
-- ----------------------------
INSERT INTO `g_order_goods` VALUES ('1', '1', '2', '2016夏新款喜酒', '1688.00', '588.00', '一品坊珍藏一号 1.5L+500ML 60%Vol', '', '', '1', '588.00', '0', '1468940834');
INSERT INTO `g_order_goods` VALUES ('2', '2', '2', '2016夏新款喜酒', '1688.00', '588.00', '一品坊3窖藏 500ml*6 52%Vol.', '', '', '3', '1764.00', '0', '1468941318');
INSERT INTO `g_order_goods` VALUES ('3', '3', '2', '2016夏新款喜酒', '1688.00', '588.00', '一品坊珍藏一号 1.5L+500ML 60%Vol', '', '', '2', '1176.00', '0', '1469092843');

-- ----------------------------
-- Table structure for g_order_order
-- ----------------------------
DROP TABLE IF EXISTS `g_order_order`;
CREATE TABLE `g_order_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ordersn` varchar(100) NOT NULL,
  `goodsid` char(50) NOT NULL,
  `goodsname` varchar(255) NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `type` tinyint(2) unsigned NOT NULL,
  `num` char(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '-1订单取消,1等待买家付款,2买家已付款,3卖家已发货,4交易成功,5买家已收货,6退款订单',
  `payment` char(50) NOT NULL,
  `isfeed` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_order_order
-- ----------------------------
INSERT INTO `g_order_order` VALUES ('1', '201607195100', '2', '2016夏新款喜酒', '191', '3', '1', '588.00', '-1', '', '0', '1468940834');
INSERT INTO `g_order_order` VALUES ('2', '201607199734', '2', '2016夏新款喜酒', '191', '3', '3', '1764.00', '1', '', '0', '1468941318');
INSERT INTO `g_order_order` VALUES ('3', '201607219511', '2', '2016夏新款喜酒', '191', '3', '2', '1176.00', '1', '', '0', '1469092843');

-- ----------------------------
-- Table structure for g_product_gallery
-- ----------------------------
DROP TABLE IF EXISTS `g_product_gallery`;
CREATE TABLE `g_product_gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int(10) unsigned NOT NULL,
  `belong` tinyint(2) unsigned NOT NULL,
  `kindid` int(10) unsigned NOT NULL DEFAULT '0',
  `imgurl` varchar(255) NOT NULL,
  `thumburl` varchar(255) NOT NULL,
  `imginfo` char(100) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_product_gallery
-- ----------------------------
INSERT INTO `g_product_gallery` VALUES ('8', '7', '1', '0', '/vpcvcms_basic/uploadfile/article/image/20170817/1502979939.jpg', '/vpcvcms_basic/thumbfile/article/image/20170817/1502979939.jpg', '1502979939.jpg', '1502979939');

-- ----------------------------
-- Table structure for g_user_access
-- ----------------------------
DROP TABLE IF EXISTS `g_user_access`;
CREATE TABLE `g_user_access` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(6) unsigned NOT NULL,
  `access` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_access
-- ----------------------------
INSERT INTO `g_user_access` VALUES ('1', '198', 'index_index,index_home,login_index,login_login,login_logout,nav_edit,ad_index,ad_add,ad_edit,article_index,article_add,article_edit,article_more,article_delete,leaving_index,leaving_delete,user_search,user_edit,user_add,user_priv,user_delete,group_manage,group_access,banned_manage,db_backup,db_restore,tool_updatecache,link_index,link_more,link_delete,link_edit,stats_index,config_site,config_basic,config_wap,config_sec,config_mail,config_water,config_template,config_third,config_add,config_delete,swfupload_upload,ajax_pic,swfupload_drop,swfupload_setindex,article_autosave,article_module,article_softupload,ajax_locked');
INSERT INTO `g_user_access` VALUES ('2', '199', '');

-- ----------------------------
-- Table structure for g_user_banned
-- ----------------------------
DROP TABLE IF EXISTS `g_user_banned`;
CREATE TABLE `g_user_banned` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` char(15) NOT NULL COMMENT 'IP',
  `username` char(32) NOT NULL COMMENT '创建者',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_banned
-- ----------------------------

-- ----------------------------
-- Table structure for g_user_booking
-- ----------------------------
DROP TABLE IF EXISTS `g_user_booking`;
CREATE TABLE `g_user_booking` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kind` tinyint(2) unsigned NOT NULL,
  `destination` varchar(100) NOT NULL,
  `starttime` varchar(100) NOT NULL,
  `day` char(50) NOT NULL,
  `people` char(50) NOT NULL,
  `money` char(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `realname` char(50) NOT NULL,
  `telephone` char(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `qq` char(50) NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_booking
-- ----------------------------
INSERT INTO `g_user_booking` VALUES ('1', '1', '湖南小东江', '10月1日至10月3日', '2天', '10人', '500元', '包吃包住', 'gg', '18680277701', '黄氏', '111@qq.com', '1470583425', '0');

-- ----------------------------
-- Table structure for g_user_detail
-- ----------------------------
DROP TABLE IF EXISTS `g_user_detail`;
CREATE TABLE `g_user_detail` (
  `uid` int(10) unsigned NOT NULL,
  `gender` tinyint(2) unsigned NOT NULL,
  `birthday` int(10) unsigned NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `marry` tinyint(2) unsigned NOT NULL,
  `knowsource` char(50) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `province` int(4) unsigned NOT NULL,
  `city` int(4) unsigned NOT NULL,
  `signature` varchar(255) NOT NULL,
  UNIQUE KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_detail
-- ----------------------------
INSERT INTO `g_user_detail` VALUES ('187', '0', '0', '0', '0', '', '', '', '0', '0', '');
INSERT INTO `g_user_detail` VALUES ('188', '0', '0', '0', '0', '', '', '', '0', '0', '');
INSERT INTO `g_user_detail` VALUES ('191', '0', '943891200', '0', '0', '', '', '广州天河区五山路华师科技大楼111号', '9', '123', '签名');
INSERT INTO `g_user_detail` VALUES ('192', '0', '943891200', '0', '0', '', '', '', '0', '0', '');
INSERT INTO `g_user_detail` VALUES ('199', '0', '943891200', '0', '0', '', '', '', '0', '0', '');

-- ----------------------------
-- Table structure for g_user_feedback
-- ----------------------------
DROP TABLE IF EXISTS `g_user_feedback`;
CREATE TABLE `g_user_feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `postid` int(10) unsigned NOT NULL,
  `posttitle` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL COMMENT 'course课程,event活动',
  `score` tinyint(4) unsigned NOT NULL,
  `content` mediumtext NOT NULL,
  `reply` varchar(255) NOT NULL,
  `replytime` int(10) unsigned NOT NULL,
  `status` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_feedback
-- ----------------------------
INSERT INTO `g_user_feedback` VALUES ('1', '191', '1', '骑行训练是否能帮助非骑行运动员提升运动效果?', 'article', '0', '评论', '', '0', '1', '1470627451');

-- ----------------------------
-- Table structure for g_user_gdsession
-- ----------------------------
DROP TABLE IF EXISTS `g_user_gdsession`;
CREATE TABLE `g_user_gdsession` (
  `id` varchar(8) NOT NULL,
  `number` varchar(12) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_gdsession
-- ----------------------------
INSERT INTO `g_user_gdsession` VALUES ('1fcf36', 'hgfq', '1531389783');
INSERT INTO `g_user_gdsession` VALUES ('42efe564', 'fehp', '1539754240');
INSERT INTO `g_user_gdsession` VALUES ('7a2d4a2', 'fffk', '1531449259');
INSERT INTO `g_user_gdsession` VALUES ('7a83f', 'jmbq', '1533544339');
INSERT INTO `g_user_gdsession` VALUES ('8752d09f', 'qppx', '1541645817');
INSERT INTO `g_user_gdsession` VALUES ('dac08c6', 'mkff', '1535008409');
INSERT INTO `g_user_gdsession` VALUES ('dcbb4b', 'mtry', '1531376979');
INSERT INTO `g_user_gdsession` VALUES ('e44f0763', 'xhxj', '1531223326');
INSERT INTO `g_user_gdsession` VALUES ('f00c83', 'mrjt', '1541476201');

-- ----------------------------
-- Table structure for g_user_group
-- ----------------------------
DROP TABLE IF EXISTS `g_user_group`;
CREATE TABLE `g_user_group` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '组编号',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '组类型,0管理组，1用户组',
  `kind` tinyint(2) unsigned NOT NULL COMMENT '0内置，1自定义',
  `title` char(32) NOT NULL DEFAULT '' COMMENT '组名称',
  `starnum` tinyint(4) unsigned NOT NULL,
  `color` char(20) NOT NULL,
  `min` int(6) unsigned NOT NULL,
  `max` int(6) unsigned NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_group
-- ----------------------------
INSERT INTO `g_user_group` VALUES ('1', '0', '0', '管理员', '65', '', '0', '0');
INSERT INTO `g_user_group` VALUES ('14', '0', '0', '个人', '0', '', '0', '0');

-- ----------------------------
-- Table structure for g_user_log
-- ----------------------------
DROP TABLE IF EXISTS `g_user_log`;
CREATE TABLE `g_user_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `logtime` int(11) unsigned NOT NULL,
  `uid` int(6) unsigned NOT NULL,
  `username` char(50) NOT NULL,
  `type` char(20) NOT NULL,
  `score` int(4) unsigned NOT NULL,
  `honor` int(6) unsigned NOT NULL,
  `loginfo` varchar(100) NOT NULL,
  `logip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_log
-- ----------------------------
INSERT INTO `g_user_log` VALUES ('1', '1418181723', '187', 'zhuyan2014', '开通', '0', '10778', '会员开通，有效期至：2016-12-11', '127.0.0.1');
INSERT INTO `g_user_log` VALUES ('2', '1418651433', '188', 'snake', '开通', '0', '60', '会员开通，有效期至：2015-03-16', '127.0.0.1');
INSERT INTO `g_user_log` VALUES ('4', '1423235141', '188', 'snake', '开通SVIP', '0', '10', '会员开通，有效期至：', '127.0.0.1');

-- ----------------------------
-- Table structure for g_user_medal
-- ----------------------------
DROP TABLE IF EXISTS `g_user_medal`;
CREATE TABLE `g_user_medal` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `useable` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `sort` tinyint(3) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL,
  `expiration` smallint(6) unsigned NOT NULL DEFAULT '0',
  `permission` mediumtext NOT NULL,
  `credit` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `price` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `displayorder` (`sort`),
  KEY `available` (`useable`,`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_medal
-- ----------------------------

-- ----------------------------
-- Table structure for g_user_member
-- ----------------------------
DROP TABLE IF EXISTS `g_user_member`;
CREATE TABLE `g_user_member` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '编号',
  `gid` int(10) unsigned NOT NULL DEFAULT '14' COMMENT '组编号',
  `roleid` tinyint(2) unsigned NOT NULL DEFAULT '1',
  `username` char(100) NOT NULL COMMENT '用户名',
  `realname` char(50) NOT NULL,
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` char(50) NOT NULL,
  `isemail` tinyint(2) unsigned NOT NULL,
  `qq` char(50) NOT NULL,
  `telephone` char(20) NOT NULL,
  `istelephone` tinyint(2) unsigned NOT NULL,
  `headpic` varchar(255) NOT NULL,
  `headpic30` varchar(255) NOT NULL,
  `headpic50` varchar(255) NOT NULL,
  `headpic150` varchar(255) NOT NULL,
  `salt` char(6) NOT NULL DEFAULT '',
  `islocked` tinyint(2) unsigned NOT NULL,
  `exp` int(10) unsigned NOT NULL,
  `score` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT '喵咪币',
  `honor` decimal(10,1) NOT NULL DEFAULT '0.0' COMMENT 'money',
  `medals` varchar(255) NOT NULL,
  `regtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `regip` char(15) NOT NULL DEFAULT '' COMMENT '注册IP',
  `lastvisit` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后访问时间',
  `lastip` char(15) NOT NULL DEFAULT '' COMMENT '最后访问IP',
  `connectid` varchar(100) NOT NULL,
  `wbname` char(50) NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_member
-- ----------------------------
INSERT INTO `g_user_member` VALUES ('1', '1', '0', 'admin', '', '35dc8f03cdc2516a70ed5ec699cd9e23', '', '0', '', '', '0', '', '', '', '', 'e6e57c', '0', '0', '5.0', '0.0', 'a:14:{i:0;s:6:\"medal1\";i:1;s:6:\"medal2\";i:2;s:6:\"medal3\";i:3;s:6:\"medal4\";i:4;s:6:\"medal4\";i:5;s:6:\"medal5\";i:6;s:6:\"medal6\";i:7;s:6:\"medal7\";i:8;s:6:\"medal8\";i:9;s:6:\"medal9\";i:10;s:7:\"medal10\";i:11;s:7:\"medal11\";i:12;s:7:\"medal12\";i:13;s:7:\"medal13\";}', '1359388800', '', '1471701734', '127.0.0.1', '', '');
INSERT INTO `g_user_member` VALUES ('191', '14', '2', '1640797264@qq.com', '王东', 'd549d272b593056d02d7db338adf8576', '1640797264@qq.com', '1', '14543677', '13838383838', '0', '/vpcvcms_xgj/uploadfile/head/191/avatar_ori_99221468504292.jpg', '/vpcvcms_xgj/uploadfile/head/191/avatar_30_99221468504292.jpg', '/vpcvcms_xgj/uploadfile/head/191/avatar_50_99221468504292.jpg', '/vpcvcms_xgj/uploadfile/head/191/avatar_150_99221468504292.jpg', 'bf3ae4', '0', '0', '15.0', '0.0', '', '1433281987', '127.0.0.1', '1473338472', '127.0.0.1', '', 'snake');
INSERT INTO `g_user_member` VALUES ('192', '14', '1', '13838383838', '李四', 'dd7f8bd8f54c8f7153c3a8bafb84dc1f', '', '0', '', '13838383838', '0', '/vpcvcms_yx/uploadfile/headpic/day_160321/201603211524342059.png', '/vpcvcms_yx/thumbfile/headpic/image/20160321/201603211524342059.png', '/vpcvcms_yx/thumbfile/headpic/image/20160321/201603211524342059.png', '/vpcvcms_yx/thumbfile/headpic/image/20160321/201603211524342059.png', '875812', '0', '0', '5.0', '0.0', '', '1455860456', '127.0.0.1', '1469196108', '127.0.0.1', '', '');
INSERT INTO `g_user_member` VALUES ('198', '1', '1', 'test', 'test', 'c8b9468d411106ad444d351297cdeb23', '111@qq.com', '0', '', '', '0', '', '', '', '', '131a3e', '0', '0', '0.0', '0.0', '', '1501327185', '127.0.0.1', '1501327185', '127.0.0.1', '', '');
INSERT INTO `g_user_member` VALUES ('199', '1', '1', 'test1', '1', '7e7628f167c979d18dda197d5f219a59', '1', '0', '', '', '0', '', '', '', '', 'a5e2de', '0', '0', '0.0', '0.0', '', '1501329226', '127.0.0.1', '1501329226', '127.0.0.1', '', '');

-- ----------------------------
-- Table structure for g_user_message
-- ----------------------------
DROP TABLE IF EXISTS `g_user_message`;
CREATE TABLE `g_user_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fid` varchar(20) NOT NULL DEFAULT '',
  `type` char(20) NOT NULL,
  `status` tinyint(2) unsigned NOT NULL,
  `fromuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fromrealname` varchar(100) NOT NULL,
  `touid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `folder` char(50) DEFAULT NULL,
  `title` varchar(60) NOT NULL,
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0',
  `writetime` int(10) unsigned NOT NULL DEFAULT '0',
  `hasview` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isadmin` tinyint(1) NOT NULL DEFAULT '0',
  `message` text,
  `useable` tinyint(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sendtime` (`sendtime`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_message
-- ----------------------------
INSERT INTO `g_user_message` VALUES ('2', '', 'system', '0', '1', '', '191', 'admin', '系统', '1433538234', '1433538234', '1', '1', '测试系统消息', '1');
INSERT INTO `g_user_message` VALUES ('3', '', 'system', '0', '191', '', '191', 'bbs', '帖子回复', '1472652583', '1472652583', '0', '0', '你的主题【升金版本武将技能分析及阵容走势预测】收到回复', '1');

-- ----------------------------
-- Table structure for g_user_sign
-- ----------------------------
DROP TABLE IF EXISTS `g_user_sign`;
CREATE TABLE `g_user_sign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `score` tinyint(2) unsigned NOT NULL,
  `year` int(4) unsigned NOT NULL,
  `month` int(4) unsigned NOT NULL,
  `day` int(4) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_sign
-- ----------------------------
INSERT INTO `g_user_sign` VALUES ('1', '191', '5', '2016', '1', '31', '1454251182');
INSERT INTO `g_user_sign` VALUES ('2', '191', '5', '2016', '2', '15', '1455508072');
INSERT INTO `g_user_sign` VALUES ('3', '191', '5', '2016', '2', '29', '1456736904');
INSERT INTO `g_user_sign` VALUES ('4', '192', '5', '2016', '3', '16', '1458130243');

-- ----------------------------
-- Table structure for g_user_stow
-- ----------------------------
DROP TABLE IF EXISTS `g_user_stow`;
CREATE TABLE `g_user_stow` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `stowid` int(6) unsigned NOT NULL,
  `stowtitle` varchar(255) NOT NULL,
  `stowtype` char(50) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `useable` tinyint(2) unsigned NOT NULL,
  `addtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user_stow
-- ----------------------------
INSERT INTO `g_user_stow` VALUES ('1', '191', '1', '私立马场', 'product', '127.0.0.1', '1', '1468760846');
INSERT INTO `g_user_stow` VALUES ('4', '193', '3', '测试案例', 'case', '127.0.0.1', '1', '1468823874');
INSERT INTO `g_user_stow` VALUES ('6', '191', '1', '4根1.6mm大力马把45号钢挂钩拉变形了。。。。', 'thread', '127.0.0.1', '1', '1473073418');
