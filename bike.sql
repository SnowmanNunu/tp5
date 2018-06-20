/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bike

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-20 18:14:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bk_admin
-- ----------------------------
DROP TABLE IF EXISTS `bk_admin`;
CREATE TABLE `bk_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(30) NOT NULL COMMENT '管理员名称',
  `password` char(32) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_admin
-- ----------------------------
INSERT INTO `bk_admin` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70');
INSERT INTO `bk_admin` VALUES ('28', 'admin000', '202cb962ac59075b964b07152d234b70');
INSERT INTO `bk_admin` VALUES ('29', 'admin123', '202cb962ac59075b964b07152d234b70');

-- ----------------------------
-- Table structure for bk_article
-- ----------------------------
DROP TABLE IF EXISTS `bk_article`;
CREATE TABLE `bk_article` (
  `id` mediumint(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `thumb` varchar(160) NOT NULL COMMENT '缩略图',
  `content` text NOT NULL,
  `click` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点击数',
  `zan` mediumint(9) NOT NULL DEFAULT '0' COMMENT '点赞数',
  `rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `time` int(10) NOT NULL DEFAULT '0' COMMENT '0:不推荐 1：推荐',
  `cateid` mediumint(11) NOT NULL COMMENT '所属栏目',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_article
-- ----------------------------
INSERT INTO `bk_article` VALUES ('1', 'test1', '1111', '1111', '111111', 'http://www.tp5.com/\\uploads/20180522\\ff6bc5de5555414704f5513e013ab2ae.jpg', '<p>111111111</p>', '0', '0', '0', '0', '10');
INSERT INTO `bk_article` VALUES ('2', '队列测试', '123', '123', '123', 'http://www.tp5.com/\\uploads/20180522\\191a55c95ad588850eb78397a4bb643c.jpg', '<p>123</p>', '0', '0', '0', '0', '2');
INSERT INTO `bk_article` VALUES ('3', '厦门分站', '13223', '23123', '13213', '\\uploads/20180522\\992fea1c2d862548a2978d9e0c54ddd4.jpg', '<p>123123</p>', '0', '0', '0', '0', '16');
INSERT INTO `bk_article` VALUES ('9', '律法网', '', '', '', '\\uploads/20180619\\78eeced18589723d6f49cdaeb26d20c0.png', '<p>123</p>', '0', '0', '0', '0', '10');

-- ----------------------------
-- Table structure for bk_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `bk_auth_group`;
CREATE TABLE `bk_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_auth_group
-- ----------------------------
INSERT INTO `bk_auth_group` VALUES ('1', '超级管理员', '1', '15,16,19,18,17,1,9,11,14,13,12,2,3,20,10,4');
INSERT INTO `bk_auth_group` VALUES ('3', '链接专员', '1', '2,3,20,10,4');
INSERT INTO `bk_auth_group` VALUES ('4', '配置管理员', '1', '1,9,11,14,13,12');

-- ----------------------------
-- Table structure for bk_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `bk_auth_group_access`;
CREATE TABLE `bk_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_auth_group_access
-- ----------------------------
INSERT INTO `bk_auth_group_access` VALUES ('1', '1');
INSERT INTO `bk_auth_group_access` VALUES ('28', '3');
INSERT INTO `bk_auth_group_access` VALUES ('29', '4');

-- ----------------------------
-- Table structure for bk_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `bk_auth_rule`;
CREATE TABLE `bk_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int(5) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_auth_rule
-- ----------------------------
INSERT INTO `bk_auth_rule` VALUES ('1', 'system', '系统设置', '1', '1', '', '0', '0', '2');
INSERT INTO `bk_auth_rule` VALUES ('2', 'link', '友情链接', '1', '1', '', '0', '0', '3');
INSERT INTO `bk_auth_rule` VALUES ('3', 'link/add', '添加链接', '1', '1', '', '2', '1', '50');
INSERT INTO `bk_auth_rule` VALUES ('6', 'admin', '管理员', '1', '1', '', '0', '0', '1');
INSERT INTO `bk_auth_rule` VALUES ('7', 'admin/lst', '管理员列表', '1', '1', '', '6', '1', '50');

-- ----------------------------
-- Table structure for bk_cate
-- ----------------------------
DROP TABLE IF EXISTS `bk_cate`;
CREATE TABLE `bk_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  `type` tinyint(2) NOT NULL COMMENT '栏目类型：1:文章列表栏目 2:单页栏目3：图片列表',
  `keywords` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级栏目id',
  `sort` mediumint(9) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_cate
-- ----------------------------
INSERT INTO `bk_cate` VALUES ('2', '美国', '1', '', '', '', '0', '2');
INSERT INTO `bk_cate` VALUES ('7', '纽约', '1', '', '', '', '2', '5');
INSERT INTO `bk_cate` VALUES ('8', '曼哈顿', '1', '', '', '', '7', '4');
INSERT INTO `bk_cate` VALUES ('10', '中国', '1', '', '', '', '0', '1');
INSERT INTO `bk_cate` VALUES ('11', '福建', '1', '', '', '', '10', '50');
INSERT INTO `bk_cate` VALUES ('12', '厦门', '1', '', '', '', '11', '2');
INSERT INTO `bk_cate` VALUES ('14', '福州', '1', '', '', '', '11', '3');
INSERT INTO `bk_cate` VALUES ('15', '泉州', '2', '', '', '', '11', '1');
INSERT INTO `bk_cate` VALUES ('16', '澳洲', '1', '', '', '', '0', '3');
INSERT INTO `bk_cate` VALUES ('17', '墨尔本', '1', '', '', '', '16', '50');
INSERT INTO `bk_cate` VALUES ('18', '华盛顿', '1', '', '', '', '2', '1');
INSERT INTO `bk_cate` VALUES ('23', '悉尼', '3', '', '', '', '16', '50');
INSERT INTO `bk_cate` VALUES ('24', '布里斯班 Brisbane', '1', '', '', '', '16', '50');
INSERT INTO `bk_cate` VALUES ('25', '漳州', '2', 'ThinkPHP 5', '<p>范德萨发的爽肤水</p>\"', '<p>个梵蒂冈电饭锅地方</p>', '11', '50');

-- ----------------------------
-- Table structure for bk_conf
-- ----------------------------
DROP TABLE IF EXISTS `bk_conf`;
CREATE TABLE `bk_conf` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `cnname` varchar(50) NOT NULL,
  `enname` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `value` varchar(255) NOT NULL COMMENT '配置值',
  `values` varchar(255) NOT NULL COMMENT '配置可选值',
  `sort` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_conf
-- ----------------------------
INSERT INTO `bk_conf` VALUES ('5', '站点名称', 'sitename', '1', 'Snowman个人站点', '', '0');
INSERT INTO `bk_conf` VALUES ('6', '站点关键词', 'keywords', '1', 'ThinkPHP 5', '', '0');
INSERT INTO `bk_conf` VALUES ('7', '站点描述', 'desc', '2', 'ThinkPHP 5                                                                                                                                                                              ', '', '0');
INSERT INTO `bk_conf` VALUES ('8', '是否关闭网站', 'close', '3', '是', '是,否', '0');
INSERT INTO `bk_conf` VALUES ('9', '启动验证码', 'code', '4', '', '是', '0');
INSERT INTO `bk_conf` VALUES ('10', '自动清空缓存', 'cache', '5', '3个小时', '1个小时,2个小时,3个小时', '0');
INSERT INTO `bk_conf` VALUES ('11', '允许评论', 'comment', '4', '', '允许', '0');

-- ----------------------------
-- Table structure for bk_link
-- ----------------------------
DROP TABLE IF EXISTS `bk_link`;
CREATE TABLE `bk_link` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `url` varchar(160) NOT NULL,
  `sort` mediumint(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_link
-- ----------------------------
INSERT INTO `bk_link` VALUES ('1', '律法网', '律法网', 'http://www.wulonglszyc.com', '3');
INSERT INTO `bk_link` VALUES ('2', '厦门分站111', '厦门分站111', 'http://www.wulonglszyc.com111', '1');
INSERT INTO `bk_link` VALUES ('3', '队列测试22', '队列测试22', 'http://www.wulonglszyc.com22', '5');
INSERT INTO `bk_link` VALUES ('12', '厦门分站1', 'ewqe', 'http://www.wulonglszyc.com11', '0');
