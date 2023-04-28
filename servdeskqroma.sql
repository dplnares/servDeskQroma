/*
 Navicat Premium Data Transfer

 Source Server         : aidingenieros
 Source Server Type    : MySQL
 Source Server Version : 100410
 Source Host           : localhost:3306
 Source Schema         : servdeskqroma

 Target Server Type    : MySQL
 Target Server Version : 100410
 File Encoding         : 65001

 Date: 27/04/2023 21:57:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tba_perfilusuario
-- ----------------------------
DROP TABLE IF EXISTS `tba_perfilusuario`;
CREATE TABLE `tba_perfilusuario`  (
  `CodPerfil` int NOT NULL,
  `Nombreperfil` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CodPerfil`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_perfilusuario
-- ----------------------------
INSERT INTO `tba_perfilusuario` VALUES (1, 'Administrador');
INSERT INTO `tba_perfilusuario` VALUES (2, 'Solicitante');
INSERT INTO `tba_perfilusuario` VALUES (3, 'Asistente');

-- ----------------------------
-- Table structure for tba_usuario
-- ----------------------------
DROP TABLE IF EXISTS `tba_usuario`;
CREATE TABLE `tba_usuario`  (
  `CodUsuario` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `AreaUsuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CorreoUsuario` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CodPerfil` int NOT NULL,
  `PasswordUsuario` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `UltimaConexion` datetime NOT NULL,
  PRIMARY KEY (`CodUsuario`) USING BTREE,
  INDEX `CodPerfil`(`CodPerfil`) USING BTREE,
  CONSTRAINT `CodPerfil` FOREIGN KEY (`CodPerfil`) REFERENCES `tba_perfilusuario` (`CodPerfil`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_usuario
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
