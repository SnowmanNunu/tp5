/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bike

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-16 18:10:26
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bk_admin
-- ----------------------------
INSERT INTO `bk_admin` VALUES ('1', 'test', '123');
INSERT INTO `bk_admin` VALUES ('2', 'admin', '123');
INSERT INTO `bk_admin` VALUES ('3', 'Nunu', '123');
INSERT INTO `bk_admin` VALUES ('4', 'Coco', '123');
INSERT INTO `bk_admin` VALUES ('5', 'Coco', '123');
INSERT INTO `bk_admin` VALUES ('6', 'Miumiu', '202cb962ac59075b964b07152d234b70');
INSERT INTO `bk_admin` VALUES ('7', 'Mumu', '4297f44b13955235245b2497399d7a93');
INSERT INTO `bk_admin` VALUES ('8', 'Lucy', '202cb962ac59075b964b07152d234b70');
INSERT INTO `bk_admin` VALUES ('9', 'a', '202cb962ac59075b964b07152d234b70');
