/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : order_db

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 10/07/2024 21:53:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (2, 'JOSE', 'POLLO', 2, 'NUEVO', '2024-07-10 20:34:47');
INSERT INTO `orders` VALUES (4, 'MANUEL', 'ZANAHORIA', 2, 'NUEVO', '2024-07-10 21:01:07');
INSERT INTO `orders` VALUES (7, 'PEDRO VP', 'LAPTO', 5, 'NUEVO', '2024-07-10 21:43:50');
INSERT INTO `orders` VALUES (10, 'ARIANA PAZ', 'SCANNNER', 5, 'NUEVO', '2024-07-10 21:48:21');
INSERT INTO `orders` VALUES (11, 'JAZMIN PAZ', 'IMPRESORA', 6, 'NUEVO', '2024-07-10 21:48:50');

SET FOREIGN_KEY_CHECKS = 1;
