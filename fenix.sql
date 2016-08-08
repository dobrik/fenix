/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50541
Source Host           : localhost:3306
Source Database       : fenix

Target Server Type    : MYSQL
Target Server Version : 50541
File Encoding         : 65001

Date: 2016-08-07 20:14:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `shortname` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` longtext,
  `description` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT '0',
  `text` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'link1', 'short1', 'full', 'title', 'keyword', 'description', 'header', '0', 'TEXT');
INSERT INTO `pages` VALUES ('2', 'link2', 'short2', '3', '4', '5', '6', '7', '0', 'Введите текст страницы');
INSERT INTO `pages` VALUES ('4', 'link3', 'Short description3', 'Full description', 'Title tag', 'Keywords tag', 'Description tag', 'Header of page', '1', 'Страница с родительским элементом');
INSERT INTO `pages` VALUES ('11', '3123', '123123', '123123', '12312', '123123', '12312', '31231', '7', 'Введите текст страницы');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '67614aacd469da7f9d611c9be60462f1');
