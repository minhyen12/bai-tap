/*
 Navicat Premium Data Transfer

 Source Server         : sql
 Source Server Type    : MySQL
 Source Server Version : 100604
 Source Host           : 127.0.0.1:3306
 Source Schema         : yenptm

 Target Server Type    : MySQL
 Target Server Version : 100604
 File Encoding         : 65001

 Date: 08/09/2021 14:09:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  `updated_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'SC', 'Sample Category', '2021-09-08 06:49:25', '2021-09-08 06:49:25');
INSERT INTO `categories` VALUES (2, 'OSC', 'Other Sample Category', '2021-09-08 06:49:25', '2021-09-08 06:49:25');

-- ----------------------------
-- Table structure for items
-- ----------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE `items`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) NOT NULL,
  `category_id` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of items
-- ----------------------------
INSERT INTO `items` VALUES (1, 'Item 1', 10, 1);
INSERT INTO `items` VALUES (2, 'Item 2', 20, 1);
INSERT INTO `items` VALUES (3, 'Item 3', 30, 2);
INSERT INTO `items` VALUES (4, 'Item 4', 40, 2);

SET FOREIGN_KEY_CHECKS = 1;
