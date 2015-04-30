/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : zerogrey

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-04-29 19:04:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `account_user`
-- ----------------------------
DROP TABLE IF EXISTS `account_user`;
CREATE TABLE `account_user` (
`id`  int(5) NOT NULL AUTO_INCREMENT ,
`name`  varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`lastname`  varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`user`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`password`  varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=3

;

-- ----------------------------
-- Records of account_user
-- ----------------------------
BEGIN;
INSERT INTO `account_user` VALUES ('1', 'oscar', 'mesa', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997'), ('2', 'luis', 'Sánchez', 'luis', 'faea5242a00c52da62a0f00df168c199b7ab748d');
COMMIT;

-- ----------------------------
-- Table structure for `accounts_twitter`
-- ----------------------------
DROP TABLE IF EXISTS `accounts_twitter`;
CREATE TABLE `accounts_twitter` (
`id`  int(5) NOT NULL AUTO_INCREMENT ,
`name_account`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
PRIMARY KEY (`id`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=4

;

-- ----------------------------
-- Records of accounts_twitter
-- ----------------------------
BEGIN;
INSERT INTO `accounts_twitter` VALUES ('1', 'elespectador'), ('2', 'elcolombiano'), ('3', 'elmundomedellin');
COMMIT;

-- ----------------------------
-- Auto increment value for `account_user`
-- ----------------------------
ALTER TABLE `account_user` AUTO_INCREMENT=3;

-- ----------------------------
-- Auto increment value for `accounts_twitter`
-- ----------------------------
ALTER TABLE `accounts_twitter` AUTO_INCREMENT=4;
