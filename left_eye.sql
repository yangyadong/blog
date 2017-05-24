# Host: localhost  (Version 5.7.9)
# Date: 2017-05-24 08:53:13
# Generator: MySQL-Front 5.4  (Build 4.6)
# Internet: http://www.mysqlfront.de/

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` char(20) DEFAULT NULL COMMENT '账号',
  `name` varchar(6) DEFAULT NULL COMMENT '用户昵称',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '管理员信息id',
  `photo` varchar(30) NOT NULL DEFAULT '/image/default.jpg' COMMENT '头像',
  `on_line` tinyint(1) DEFAULT '1' COMMENT '是否在线0（在线），1（不在）',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 0（启用），1（禁用）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='后台用户';

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','超级管理员','e10adc3949ba59abbe56e057f20f883e',0,'/image/default.jpg',1,0),(2,'1601372293@qq.com','高傲的左眼','e10adc3949ba59abbe56e057f20f883e',1,'/image/default.jpg',1,0);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "article"
#

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '标题',
  `admin_id` int(11) DEFAULT NULL COMMENT '发布者id',
  `image` varchar(30) DEFAULT NULL COMMENT '封面',
  `content` text COMMENT '内容',
  `type` tinyint(3) DEFAULT '1' COMMENT '文章类型id',
  `praise` int(11) DEFAULT '0' COMMENT '点赞数量',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `set_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态0（公开），1（私阅）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='文章';

#
# Data for table "article"
#

/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (13,'thinkPHP重写URL',2,'/uploads/image/n2Kjz0Y89G.jpg','<p style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"><span style=\"font-size: 18px;\">本文只在Apache环境下有效</span><br></p><ol style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"></ol><p style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"><span style=\"font-size: 18px;\">(1)httpd.conf配置文件中加载了mod_rewrite.so模块</span></p><blockquote dir=\"ltr\" style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"><p><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">即在Apache的配置文件httpd.conf中的</span></p><p><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">#LoadModule rewrite_module modules/mod_rewrite.so</span></p><p><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">前面的‘#’号去掉使其起作用</span></p></blockquote><p style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"><span style=\"font-size: 18px;\">(2)将httpd.conf配置文件中所有的‘AllowOverride None’&nbsp;的None改为 All</span></p><p style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"><span style=\"font-size: 18px;\">(3)把下面的内容<span style=\"color: rgb(255, 0, 0);\">保存为.htaccess文件<span style=\"color: rgb(0, 0, 0);\">放到</span>应用入口文件(index.php)的同级目录下</span></span></p><ol style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px;\"><li class=\"L0\"><code><span style=\"font-size: 18px;\"><span class=\"tag\">&lt;IfModule</span><span class=\"pln\">&nbsp;</span><span class=\"atn\">mod_rewrite</span><span class=\"pln\">.</span><span class=\"atn\">c</span><span class=\"tag\">&gt;</span></span></code></li><li class=\"L1\"><code><span class=\"pln\"><span style=\"font-size: 18px;\">RewriteEngine on</span></span></code></li><li class=\"L2\"><code><span class=\"pln\"><span style=\"font-size: 18px;\">RewriteCond %{REQUEST_FILENAME} !-d</span></span></code></li><li class=\"L3\"><code><span class=\"pln\"><span style=\"font-size: 18px;\">RewriteCond %{REQUEST_FILENAME} !-f</span></span></code></li><li class=\"L4\"><code><span class=\"pln\"><span style=\"font-size: 18px;\">RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]</span></span></code></li><li class=\"L5\"><code><span class=\"tag\"><span style=\"font-size: 18px;\">&lt;/IfModule&gt;</span></span></code></li></ol><div style=\"color: rgb(51, 51, 51); font-family: Arial; font-size: 14px; line-height: 26px; top: 0px;\"><span style=\"font-size: 18px;\">(4)一定要重启Apache﻿﻿</span></div>',3,5,1474598431,1474592921,0),(14,'永远走不到的画境',2,'/uploads/image/DWBih9g2Nc.jpg','\n                                        \n                                        \n                                        \n                                        \n                                        <span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\">　　</span><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\">尘世山水，对我们有太多诱惑。喜爱诗词，则是为了在尘嚣中寻得一丝宁静，在山水中，寻得一丝逍遥。</span><br style=\"border: 0px; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\"><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\">　　雪</span><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\">中漫步，寻一世浮游，留一曲佳话。既然选择了远方，就只顾风雨兼程。既然注定孤独一人，又何必放不下那份情，而苦苦等待。流年苍茫，对错又何妨？</span><br style=\"border: 0px; margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\"><div><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\">　　雪落衣裳，随我漫步山中，所到之处，早已是白雪皑皑。画面悠然，不知不觉中，便沉醉于梅花散发出的淡淡清香。耳听雪花飘落的声音，猛然间，惊扰了飘忽的思绪。伴随着雪潜入到古寺中，轻轻触摸凭栏，古朴的气息充斥着感官，细细品味断壁残垣，那散发出的禅意，不禁想起王维“摩诘”这个称号来。也许，他早已达到了熄生灭死的境界了吧！穿过洁白无尘的古道，品味古寺内月光漂洗的往事，飘忽的思绪，在错乱的时空里暗暗回转</span><span style=\"font-size: medium; line-height: 1.42857;\">......</span><br></div><div><span style=\"line-height: 18.5714px;\"><font size=\"3\"><br></font></span></div><div><span style=\"color: rgb(51, 51, 51); font-family: 宋体; font-size: 14px; line-height: 27px;\">　　</span><span style=\"line-height: 18.5714px;\"><font size=\"3\">美美的意境，生活的骨感，让我感受到诗人的唯美话境，那只是理想的、是一个理想的憧憬。</font></span></div>\n                                        \n                                    \n                                    \n                                    \n                                    \n                                    \n                                    ',2,8,1474637050,1474635764,0),(15,'mysql表类型分析',2,'/uploads/image/NH5ulBCq6n.png','<p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">MySQL为我们提供了很多表类型供选择，有MyISAM、ISAM、HEAP、BerkeleyDB、InnoDB，MERGE表类型，每一种表类型都有其自己的属性和优点。真正选择何种表类型还是要看业务需要</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">MyISAM表类型：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">MyISAM表(TYPE=MYISAM)是ISAM类型的一种延伸，具有很多优化和增强的特性。&nbsp;<br>是MySQL的默认表类型。&nbsp;<br>MyISAM优化了压缩比例和速度，并且可以很方便的在不同的操作系统和平台之间进行移植。&nbsp;<br>MyISAM支持大表文件(大于4G)&nbsp;<br>允许对BLOB和TEXT列进行索引&nbsp;<br>支持使用键前缀和使用完整的键搜索记录&nbsp;<br>表数据和表索引文件可以依存在不同的位置，甚至是不同的文件系统中。&nbsp;<br>即使是具有相当多的插入、更新和删除操作的表，智能防碎片逻辑也能保证其高性能的协作性。&nbsp;<br>ISAM表类型：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">ISAM表(TYPE=ISAM)和MyISAM表相似，但是其没有MyISAM格式的很多增强性能，因而不能像MyISAM类型那样提供很好的优化和执行效率。因为ISAM索引不能被压缩，它比在MyISAM中的相同索引战胜较少的系统资源。ISAM索引需要较多的磁盘空间</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">和MyISAM一样，ISAM表可以是固定长度的，也可以是可变长度的，但是其格式的最大键长度比较小，ISAM格式处理的表不能大于4G，而且表不能在不同的平台间移植。另外，ISAM表容易分裂，这会降低查询速度，对数据／索引的压缩产生限制。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">HELP表类型：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">HEAP表(TYPE=HEAP)是内存中的表，它使用能够比较快速的散列索引(当运行INSERT查询时，独立评价指出HEAP表最少比MyISAM表快30％)，因此，对于临时表可以优化。经和MyISAM或ISAM表的访问规则和使用方式一样。存储在里面的数据只在MySQL服务器的生命期内存在，如果MySQL服务器崩溃或者被关掉，都会使其中的数据消失不见。虽然HEAP表具有性能方面的好处，但是由于它的临时性和一些其他功能限制，在实际中不可能经常使用。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">HEAP表的大小只受到系统上可用内存的限制，MySQL是很聪明的，其具有内建保护来阻止无意识地使用所有可用内存。所以我们不用担心内存会被HEAP表用尽。HEAP表不支持BLOB或TEXT列，不能超过max_heap_table_size变量指定的大小。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">BerkeleyDB表类型：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">BerkeleyDB表(TYPE=BDB)是为了满足MySQL开发者对事务安全表日益增长的需求而发展起来的。BerkeleyDB表具有很多有趣的鹅，包括提交和回滚操作、多用户并发访问、检查点、次要索引、通过日志恢复崩溃、连续地和键控地访问数据等，这便利复杂的、基于事务的SQL有了可行的选择。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">不过BerkeleyDB表也有一些限制，让我们简单的了解一下：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">它的移动比较困难(在创建时，表路径硬编码在表文件中)&nbsp;<br>不能压缩表索引，而且其表通常比MyISAM相应的表要大&nbsp;<br>有点鸡肋的感觉，因为现在InnoDB格式很大程度上可以取代BerkeleyDB格式&nbsp;<br>InnoDB表类型：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">InnoDB表(TYPE=INNODB)，是一个完全兼容ACID(事务的原子性、一致性、独立性及持久性)的、高效率的表完全支持MySQL的事务处理并且不会btwagkyaakftntce。精细的(行级和表级)锁提高了MySQL事务处理的带走度，同时其也支持无锁定读操作(以前只在Oracle中包含)和多版本的特性。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">异步输入／输出和一系列的读缓冲将提高数据检索速度，同时可以进行文件的优化和内存的管理。需要的基础上支持自动在内存上创建散列索引来提高性能，使用缓冲来提高可靠性和数据库操作的速度。InnoDB表的恨不能可以和MyISAM相媲美，甚至已经超过了MyISAM。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">在不同的操作系统和体系结构上是完全可移植的。由于一直处于一致的状态(MySQL通过在启动时检查错误并修复错误来使它们更加健壮)。对外键、提交、回滚和前滚的操作的支持，使其成为MySQL中最完善的表格式。</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">MERGE表类型：</p><p style=\"margin-bottom: 1.1em; color: rgb(51, 51, 51); font-family: &quot;microsoft yahei&quot;; font-size: 14px; line-height: 26px;\">MERGE表(TYPE=MERGE)是通过把多个MyISAM表组合到一个单独的表来创建的一种虚拟表。&nbsp;<br>只有涉及到的表具有完全相同的表结构时才能对表进行组合。字段类型或者索引的任何不同都不能进行成功的结合。&nbsp;<br>MERGE表使用组成表的索引，并且不能维持它本身的索引，在某种情况下可以提高速度。&nbsp;<br>允许SELECT，DELETE，UPDATE操作&nbsp;<br>在需要把不同表的数据放到一起提高连接的性能或者在一系列表中进行搜索时，这种表很实用。&nbsp;<br>处理大的MyISAM表时，我们可以通过压纹或者使用MySQL发布中包含的myisampack实用工具进行“打包”来减少这些表战胜的空间。myisampack创建比较小的只读表，而不会在使用智能压缩时导致任何大的性能开销。</p>\n                                        \n                                    ',1,1,1474770768,1474770768,0);
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

#
# Structure for table "article_type"
#

DROP TABLE IF EXISTS `article_type`;
CREATE TABLE `article_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL COMMENT '文章类型名',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:学习方面，1：生活情感',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `set_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态0（启用中），1（禁用）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='文章类别';

#
# Data for table "article_type"
#

/*!40000 ALTER TABLE `article_type` DISABLE KEYS */;
INSERT INTO `article_type` VALUES (1,'技术博客',0,1461319789,1461319789,0),(2,'情感随笔',1,1461319789,1461319789,0),(3,'PHP',0,NULL,NULL,0);
/*!40000 ALTER TABLE `article_type` ENABLE KEYS */;

#
# Structure for table "history"
#

DROP TABLE IF EXISTS `history`;
CREATE TABLE `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '操作人id',
  `operation` varchar(20) DEFAULT NULL COMMENT '操作',
  `time` int(11) DEFAULT NULL COMMENT '操作时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '操作类别 0（登陆），1（更改）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='操作历史';

#
# Data for table "history"
#


#
# Structure for table "message"
#

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) DEFAULT NULL COMMENT '留言内容',
  `rely_text` varchar(255) DEFAULT NULL COMMENT '回复内容',
  `email` varchar(20) DEFAULT NULL COMMENT '访客邮箱',
  `set_time` int(11) DEFAULT NULL COMMENT '留言时间',
  `rely_time` int(11) DEFAULT NULL COMMENT '回复时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态0（已回复），1（未回复）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='访客留言';

#
# Data for table "message"
#


#
# Structure for table "resource"
#

DROP TABLE IF EXISTS `resource`;
CREATE TABLE `resource` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL COMMENT '资源名',
  `admin_id` int(11) DEFAULT NULL COMMENT '发布者id',
  `site` varchar(30) DEFAULT NULL COMMENT '存储位置',
  `type` tinyint(3) DEFAULT '1' COMMENT '资源类型id',
  `number` int(11) NOT NULL DEFAULT '0' COMMENT '下载量',
  `praise` int(11) DEFAULT '0' COMMENT '点赞数量',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `set_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态0（启用中），1（禁用）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资源';

#
# Data for table "resource"
#


#
# Structure for table "resource_type"
#

DROP TABLE IF EXISTS `resource_type`;
CREATE TABLE `resource_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL COMMENT '资源类型名',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `set_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态0（启用中），1（禁用）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资源类型';

#
# Data for table "resource_type"
#


#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(4) DEFAULT NULL COMMENT '用户真名',
  `birthplace` varchar(50) DEFAULT NULL COMMENT '出生地',
  `location` varchar(50) DEFAULT NULL COMMENT '所在地',
  `birthday` int(11) DEFAULT NULL COMMENT '生日',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `diplomas` varchar(10) DEFAULT NULL COMMENT '学历',
  `school` varchar(10) DEFAULT NULL COMMENT '学校',
  `phone` char(11) DEFAULT NULL COMMENT '电话',
  `signature` varchar(50) DEFAULT NULL COMMENT '个性签名',
  `explain` text COMMENT '个性说明',
  `sex` tinyint(1) DEFAULT '2' COMMENT '性别0（男），1（女），2（保密）',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'杨亚东','西华','新乡',789609600,'1601372293@qq.com','本科','河南科技学院','15237373599','像“草根”一样，紧贴着地面，低调的存在，冬去春来，枯荣无恙。','<div class=\"para\" label-module=\"para\" style=\"font-size: 14px; word-wrap: break-word; color: rgb(51, 51, 51); margin-bottom: 15px; text-indent: 2em; line-height: 24px; zoom: 1; font-family: arial, 宋体, sans-serif;\"><div class=\"para\" label-module=\"para\" style=\"word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\"><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">见</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">惊艳</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">目流连</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">再难思迁</div></div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">踌躇欲向前</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">只恐天上人间</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">悲欢喜怒一线牵</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">循环往复恨此心坚</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">花开花落转眼已三年</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">天人合一处垂首对漪涟</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">思或淡情未移口三缄</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">燕去燕归沧海桑田</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">倘注定有分无缘</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">亦感蒙赐初面</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">纵此生不见</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">平安惟愿</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">若得闲</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">仍念</div><div class=\"para\" label-module=\"para\" style=\"text-align: center; word-wrap: break-word; margin-bottom: 15px; text-indent: 2em; zoom: 1;\">歉</div></div>',0,1474621761);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
