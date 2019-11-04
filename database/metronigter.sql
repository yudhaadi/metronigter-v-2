/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50638
 Source Host           : localhost:3306
 Source Schema         : metronigter

 Target Server Type    : MySQL
 Target Server Version : 50638
 File Encoding         : 65001

 Date: 04/11/2019 10:55:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _sys_group
-- ----------------------------
DROP TABLE IF EXISTS `_sys_group`;
CREATE TABLE `_sys_group`  (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_label` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`group_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of _sys_group
-- ----------------------------
INSERT INTO `_sys_group` VALUES (1, 'Administrator');
INSERT INTO `_sys_group` VALUES (2, 'Pengguna');

-- ----------------------------
-- Table structure for _sys_navbar
-- ----------------------------
DROP TABLE IF EXISTS `_sys_navbar`;
CREATE TABLE `_sys_navbar`  (
  `navbar_id` int(11) NOT NULL AUTO_INCREMENT,
  `navbar_parent` int(11) NULL DEFAULT 0,
  `navbar_label` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `navbar_controller` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `navbar_function` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `navbar_href` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `navbar_icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'fa fa-angle-right',
  `navbar_index` int(5) NULL DEFAULT NULL,
  `navbar_status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`navbar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for _sys_setting
-- ----------------------------
DROP TABLE IF EXISTS `_sys_setting`;
CREATE TABLE `_sys_setting`  (
  `setting_web_name` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `setting_web_credit` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `setting_web_credit_href` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `setting_web_logo` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `setting_web_icon` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of _sys_setting
-- ----------------------------
INSERT INTO `_sys_setting` VALUES ('Metronigter', 'rdkbayui', 'http://riandk.tk', 'assets/media/logos/logo-6.png', 'assets/media/logos/favicon.ico');

-- ----------------------------
-- Table structure for _sys_sidebar
-- ----------------------------
DROP TABLE IF EXISTS `_sys_sidebar`;
CREATE TABLE `_sys_sidebar`  (
  `sidebar_id` int(11) NOT NULL AUTO_INCREMENT,
  `sidebar_parent` int(11) NULL DEFAULT 0,
  `sidebar_label` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sidebar_controller` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sidebar_function` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sidebar_href` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sidebar_icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'fa fa-angle-right',
  `sidebar_index` int(5) NULL DEFAULT NULL,
  `sidebar_status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '1',
  PRIMARY KEY (`sidebar_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of _sys_sidebar
-- ----------------------------
INSERT INTO `_sys_sidebar` VALUES (1, 0, 'Dashboard', 'dashboard', 'index', 'administrator/dashboard', 'fa fa-home', 1, '1');
INSERT INTO `_sys_sidebar` VALUES (2, 0, 'System', '#', '#', '#', 'fa fa-cogs', 3, '1');
INSERT INTO `_sys_sidebar` VALUES (15, 2, 'Sidebars', 'system', 'sidebars', 'administrator/system/sidebars', 'fa fa-layer-group', 3, '1');
INSERT INTO `_sys_sidebar` VALUES (16, 2, 'Navbars', 'system', 'navbars', 'administrator/system/navbars', 'fa fa-bars', 4, '1');
INSERT INTO `_sys_sidebar` VALUES (17, 2, 'Users', 'system', 'users', 'administrator/system/users', 'fa fa-user', 1, '1');
INSERT INTO `_sys_sidebar` VALUES (18, 2, 'Groups', 'system', 'groups', 'administrator/system/groups', 'fa fa-users-cog', 2, '1');
INSERT INTO `_sys_sidebar` VALUES (19, 2, 'Settings', 'system', 'settings', 'administrator/system/settings', 'fa fa-cog', 5, '1');
INSERT INTO `_sys_sidebar` VALUES (23, 2, 'Data Master User', 'datamaster', 'user', 'administrator/datamaster/user', 'fa fa-users', 8, '1');
INSERT INTO `_sys_sidebar` VALUES (24, 0, 'Data Master', 'datamaster', 'index', 'administrator/datamaster', 'fa fa-cube', 1, '1');

-- ----------------------------
-- Table structure for _sys_sidebar_access
-- ----------------------------
DROP TABLE IF EXISTS `_sys_sidebar_access`;
CREATE TABLE `_sys_sidebar_access`  (
  `sidebar_access_group_id` int(11) NULL DEFAULT NULL,
  `sidebar_access_sidebar_id` int(11) NULL DEFAULT NULL,
  `sidebar_access_create` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `sidebar_access_read` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `sidebar_access_update` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  `sidebar_access_delete` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0',
  INDEX `access_sidebar_id`(`sidebar_access_sidebar_id`) USING BTREE,
  INDEX `access_group_id`(`sidebar_access_group_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of _sys_sidebar_access
-- ----------------------------
INSERT INTO `_sys_sidebar_access` VALUES (1, 1, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (1, 2, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (1, 15, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (1, 16, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (1, 17, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (1, 18, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (1, 19, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (2, 1, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (2, 2, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (2, 15, '1', '1', '1', '1');
INSERT INTO `_sys_sidebar_access` VALUES (2, 16, '0', '0', '0', '0');
INSERT INTO `_sys_sidebar_access` VALUES (2, 17, '0', '0', '0', '0');
INSERT INTO `_sys_sidebar_access` VALUES (2, 18, '0', '0', '0', '0');
INSERT INTO `_sys_sidebar_access` VALUES (2, 19, '1', '1', '1', '1');

-- ----------------------------
-- Table structure for _sys_status
-- ----------------------------
DROP TABLE IF EXISTS `_sys_status`;
CREATE TABLE `_sys_status`  (
  `status_id` int(2) NOT NULL,
  `status_label` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`status_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of _sys_status
-- ----------------------------
INSERT INTO `_sys_status` VALUES (0, 'Non-Aktif');
INSERT INTO `_sys_status` VALUES (1, 'Aktif');

-- ----------------------------
-- Table structure for _sys_user
-- ----------------------------
DROP TABLE IF EXISTS `_sys_user`;
CREATE TABLE `_sys_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_birth` date NULL DEFAULT NULL,
  `user_phone` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `user_username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_group_id` int(11) NULL DEFAULT NULL,
  `user_status_id` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  INDEX `group_id`(`user_group_id`) USING BTREE,
  CONSTRAINT `group_id` FOREIGN KEY (`user_group_id`) REFERENCES `_sys_group` (`group_id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of _sys_user
-- ----------------------------
INSERT INTO `_sys_user` VALUES (1, 'Admin', 'Metronic', '1996-03-21', '085655209270', 'admin@admin.com', 'Sumberdiren, Garum, Blitar', 'admin', '', 1, '1');
INSERT INTO `_sys_user` VALUES (2, 'Pengguna', 'Metronic', '1996-03-21', '0857478858585', 'user@user.com', 'Minggirsari, Kanigoro, Blitar', 'user', '', 2, '1');

-- ----------------------------
-- View structure for _v_search_menu
-- ----------------------------
DROP VIEW IF EXISTS `_v_search_menu`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `_v_search_menu` AS select `_sys_sidebar`.`sidebar_label` AS `label`,`_sys_sidebar`.`sidebar_href` AS `href`,`_sys_sidebar`.`sidebar_icon` AS `icon` from `_sys_sidebar` where ((`_sys_sidebar`.`sidebar_status` = 1) and (`_sys_sidebar`.`sidebar_href` <> '#')) union select `_sys_navbar`.`navbar_label` AS `label`,`_sys_navbar`.`navbar_href` AS `href`,`_sys_navbar`.`navbar_icon` AS `icon` from `_sys_navbar` where ((`_sys_navbar`.`navbar_status` = 1) and (`_sys_navbar`.`navbar_href` <> '#'));

-- ----------------------------
-- View structure for _v_sys_navbar
-- ----------------------------
DROP VIEW IF EXISTS `_v_sys_navbar`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `_v_sys_navbar` AS select `_sys_navbar`.`navbar_id` AS `navbar_id`,`_sys_navbar`.`navbar_parent` AS `navbar_parent`,(select if((`_sys_navbar`.`navbar_parent` = 0),'Parent',(select `nvbar`.`navbar_label` from `_sys_navbar` `nvbar` where (`nvbar`.`navbar_id` = `_sys_navbar`.`navbar_parent`)))) AS `navbar_parent_label`,`_sys_navbar`.`navbar_label` AS `navbar_label`,`_sys_navbar`.`navbar_controller` AS `navbar_controller`,`_sys_navbar`.`navbar_function` AS `navbar_function`,`_sys_navbar`.`navbar_href` AS `navbar_href`,`_sys_navbar`.`navbar_icon` AS `navbar_icon`,`_sys_navbar`.`navbar_index` AS `navbar_index`,`_sys_navbar`.`navbar_status` AS `navbar_status`,`_sys_status`.`status_id` AS `status_id`,`_sys_status`.`status_label` AS `status_label` from (`_sys_navbar` join `_sys_status` on((`_sys_status`.`status_id` = `_sys_navbar`.`navbar_status`)));

-- ----------------------------
-- View structure for _v_sys_sidebar
-- ----------------------------
DROP VIEW IF EXISTS `_v_sys_sidebar`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `_v_sys_sidebar` AS select `_sys_sidebar`.`sidebar_id` AS `sidebar_id`,`_sys_sidebar`.`sidebar_parent` AS `sidebar_parent`,(select if((`_sys_sidebar`.`sidebar_parent` = 0),'Parent',(select `sdbar`.`sidebar_label` from `_sys_sidebar` `sdbar` where (`sdbar`.`sidebar_id` = `_sys_sidebar`.`sidebar_parent`)))) AS `sidebar_parent_label`,(select `sdbar`.`sidebar_label` from `_sys_sidebar` `sdbar` where (`sdbar`.`sidebar_id` = `_sys_sidebar`.`sidebar_parent`)) AS `sidebar_controller_parent_label`,`_sys_sidebar`.`sidebar_label` AS `sidebar_label`,`_sys_sidebar`.`sidebar_controller` AS `sidebar_controller`,`_sys_sidebar`.`sidebar_function` AS `sidebar_function`,`_sys_sidebar`.`sidebar_href` AS `sidebar_href`,`_sys_sidebar`.`sidebar_icon` AS `sidebar_icon`,`_sys_sidebar`.`sidebar_index` AS `sidebar_index`,`_sys_sidebar`.`sidebar_status` AS `sidebar_status`,`_sys_status`.`status_id` AS `status_id`,`_sys_status`.`status_label` AS `status_label` from (`_sys_sidebar` join `_sys_status` on((`_sys_status`.`status_id` = `_sys_sidebar`.`sidebar_status`)));

-- ----------------------------
-- View structure for _v_sys_user
-- ----------------------------
DROP VIEW IF EXISTS `_v_sys_user`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `_v_sys_user` AS select `_sys_user`.`user_id` AS `user_id`,`_sys_user`.`user_firstname` AS `user_firstname`,`_sys_user`.`user_lastname` AS `user_lastname`,`_sys_user`.`user_birth` AS `user_birth`,`_sys_user`.`user_phone` AS `user_phone`,`_sys_user`.`user_email` AS `user_email`,`_sys_user`.`user_address` AS `user_address`,`_sys_user`.`user_username` AS `user_username`,`_sys_user`.`user_password` AS `user_password`,`_sys_user`.`user_group_id` AS `user_group_id`,`_sys_user`.`user_status_id` AS `user_status_id`,`_sys_group`.`group_id` AS `group_id`,`_sys_group`.`group_label` AS `group_label`,`_sys_status`.`status_id` AS `status_id`,`_sys_status`.`status_label` AS `status_label` from ((`_sys_user` join `_sys_group` on((`_sys_group`.`group_id` = `_sys_user`.`user_group_id`))) join `_sys_status` on((`_sys_status`.`status_id` = `_sys_user`.`user_status_id`)));

SET FOREIGN_KEY_CHECKS = 1;
