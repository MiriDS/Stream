/*
 Navicat Premium Data Transfer

 Source Server         : Stream
 Source Server Type    : MySQL
 Source Server Version : 100802
 Source Host           : 127.0.0.1:3306
 Source Schema         : stream

 Target Server Type    : MySQL
 Target Server Version : 100802
 File Encoding         : 65001

 Date: 24/07/2022 16:31:48
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) CHARACTER SET utf8mb3 DEFAULT NULL,
  `password` varchar(120) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admins
-- ----------------------------
BEGIN;
INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `name`) VALUES (2, 'miri', 'ec64688bbb80cb0efc6bacb510fad32d', 'wsdl', 'MiriDS');
INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `name`) VALUES (3, 'admin', '2fc460e0e4982ad5c7ec9b395fac24ac', NULL, 'Administrator');
INSERT INTO `admins` (`id`, `username`, `password`, `salt`, `name`) VALUES (6, 'test', '72049e41229ae553b0326187182503b5', NULL, 'Amazon');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

-- ----------------------------
-- Table structure for servers
-- ----------------------------
DROP TABLE IF EXISTS servers;
CREATE TABLE servers (
                         id int(11) NOT NULL AUTO_INCREMENT,
                         ip_address varchar(15) DEFAULT NULL,
                         created_at timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
                         is_deleted smallint(6) DEFAULT 0,
                         PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
