/*
Navicat MySQL Data Transfer

Source Server         : hsz
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : zestcms

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-02-26 17:36:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zest_message`
-- ----------------------------
DROP TABLE IF EXISTS `zest_message`;
CREATE TABLE `zest_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `add_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zest_message
-- ----------------------------
INSERT INTO `zest_message` VALUES ('1', 'aaa', '123', '1');
INSERT INTO `zest_message` VALUES ('2', 'bbb', '123', '1');
INSERT INTO `zest_message` VALUES ('3', 'ccc', '123', '1');

-- ----------------------------
-- Table structure for `zest_tmp`
-- ----------------------------
DROP TABLE IF EXISTS `zest_tmp`;
CREATE TABLE `zest_tmp` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zest_tmp
-- ----------------------------
INSERT INTO `zest_tmp` VALUES ('5', 'aaa');
INSERT INTO `zest_tmp` VALUES ('6', 'bbb');
INSERT INTO `zest_tmp` VALUES ('10', 'ccc');
INSERT INTO `zest_tmp` VALUES ('13', 'arangda');

-- ----------------------------
-- Table structure for `zest_user`
-- ----------------------------
DROP TABLE IF EXISTS `zest_user`;
CREATE TABLE `zest_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zest_user
-- ----------------------------
