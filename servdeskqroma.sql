/*
 Navicat Premium Data Transfer

 Source Server         : mysqlDB
 Source Server Type    : MySQL
 Source Server Version : 100428
 Source Host           : localhost:3306
 Source Schema         : servdeskqroma

 Target Server Type    : MySQL
 Target Server Version : 100428
 File Encoding         : 65001

 Date: 07/05/2023 00:55:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tba_areausuario
-- ----------------------------
DROP TABLE IF EXISTS `tba_areausuario`;
CREATE TABLE `tba_areausuario`  (
  `CodArea` int NOT NULL AUTO_INCREMENT,
  `NombreArea` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`CodArea`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_areausuario
-- ----------------------------
INSERT INTO `tba_areausuario` VALUES (1, 'TI');
INSERT INTO `tba_areausuario` VALUES (2, 'Compras');
INSERT INTO `tba_areausuario` VALUES (3, 'Ventas');
INSERT INTO `tba_areausuario` VALUES (4, 'Recursos Humanos');
INSERT INTO `tba_areausuario` VALUES (5, 'Contabilidad');
INSERT INTO `tba_areausuario` VALUES (6, 'Presupuestos');

-- ----------------------------
-- Table structure for tba_perfilusuario
-- ----------------------------
DROP TABLE IF EXISTS `tba_perfilusuario`;
CREATE TABLE `tba_perfilusuario`  (
  `CodPerfil` int NOT NULL AUTO_INCREMENT,
  `NombrePerfil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`CodPerfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_perfilusuario
-- ----------------------------
INSERT INTO `tba_perfilusuario` VALUES (1, 'Administrador');
INSERT INTO `tba_perfilusuario` VALUES (2, 'Solicitante');
INSERT INTO `tba_perfilusuario` VALUES (3, 'Asistente');

-- ----------------------------
-- Table structure for tba_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tba_usuarios`;
CREATE TABLE `tba_usuarios`  (
  `CodUsuario` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CodArea` int NOT NULL,
  `CorreoUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CodPerfil` int NOT NULL,
  `PasswordUsuario` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UltimaConexion` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CodUsuario`) USING BTREE,
  INDEX `CodPerfil`(`CodPerfil`) USING BTREE,
  INDEX `tba_usuarios_ibfk_2`(`CodArea`) USING BTREE,
  CONSTRAINT `tba_usuarios_ibfk_1` FOREIGN KEY (`CodPerfil`) REFERENCES `tba_perfilusuario` (`CodPerfil`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tba_usuarios_ibfk_2` FOREIGN KEY (`CodArea`) REFERENCES `tba_areausuario` (`CodArea`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_usuarios
-- ----------------------------
INSERT INTO `tba_usuarios` VALUES (3, 'David Poblette', 1, 'david@gmail.com', 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-07 00:33:55');
INSERT INTO `tba_usuarios` VALUES (4, 'Andre', 6, 'andre@gmail.com', 3, '$2a$07$usesomesillystringforeGsJAIIu7nhlxWq.cvdNluLcR1KdMYnq', '2023-05-07 00:36:24');
INSERT INTO `tba_usuarios` VALUES (5, 'Jose', 6, 'jose@gmail.com', 3, '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', '2023-05-06 19:42:08');
INSERT INTO `tba_usuarios` VALUES (6, 'Karla', 1, 'karla@gmail.com', 2, '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', '2023-05-06 19:45:42');
INSERT INTO `tba_usuarios` VALUES (7, 'Ana', 1, 'ana@gmail.com', 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-07 00:33:07');
INSERT INTO `tba_usuarios` VALUES (8, 'Ana', 3, 'ana@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:04:26');
INSERT INTO `tba_usuarios` VALUES (9, 'Ana', 5, 'ana@gmail.com', 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-07 00:33:37');
INSERT INTO `tba_usuarios` VALUES (10, 'Ana', 3, 'ana@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:04:31');
INSERT INTO `tba_usuarios` VALUES (11, 'Ana', 3, 'ana@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:05:12');
INSERT INTO `tba_usuarios` VALUES (12, 'Layla', 4, 'layla@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:05:41');
INSERT INTO `tba_usuarios` VALUES (13, 'Ruflen', 5, 'rulfen@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:12:29');
INSERT INTO `tba_usuarios` VALUES (14, 'Ruflen', 5, 'rulfen@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:12:55');
INSERT INTO `tba_usuarios` VALUES (15, 'Ruflen', 5, 'rulfen@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:14:03');
INSERT INTO `tba_usuarios` VALUES (16, 'Ruflen', 5, 'rulfen@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:15:02');
INSERT INTO `tba_usuarios` VALUES (17, 'Ruflen', 5, 'rulfen@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:15:37');
INSERT INTO `tba_usuarios` VALUES (18, 'Ruflen', 5, 'rulfen@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:15:58');
INSERT INTO `tba_usuarios` VALUES (19, 'Daniel', 3, 'daniel@gmail.com', 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:21:32');
INSERT INTO `tba_usuarios` VALUES (20, 'Andre', 4, 'andre@gmail.com', 2, '$2a$07$usesomesillystringfore1Vq2ue5LXhMMnkvcTjboDi7Oexd8oGm', '2023-05-06 20:26:34');
INSERT INTO `tba_usuarios` VALUES (21, 'Andre', 4, 'andre@gmail.com', 2, '$2a$07$usesomesillystringfore1Vq2ue5LXhMMnkvcTjboDi7Oexd8oGm', '2023-05-06 20:30:18');
INSERT INTO `tba_usuarios` VALUES (22, 'Andre', 3, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:30:29');
INSERT INTO `tba_usuarios` VALUES (23, 'Karla', 3, 'karla@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:31:20');
INSERT INTO `tba_usuarios` VALUES (24, 'Karla', 3, 'karla@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:31:31');
INSERT INTO `tba_usuarios` VALUES (25, 'Karla', 3, 'karla@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:34:57');
INSERT INTO `tba_usuarios` VALUES (26, 'Andre', 3, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:35:09');
INSERT INTO `tba_usuarios` VALUES (27, 'Andre', 3, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:35:52');
INSERT INTO `tba_usuarios` VALUES (28, 'Andre', 4, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:36:05');
INSERT INTO `tba_usuarios` VALUES (29, 'Andre', 4, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:36:14');
INSERT INTO `tba_usuarios` VALUES (30, 'Andre', 4, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:37:46');
INSERT INTO `tba_usuarios` VALUES (31, 'Andre', 4, 'andre@gmail.com', 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-05-06 20:39:25');
INSERT INTO `tba_usuarios` VALUES (32, 'Karla', 4, 'karla@gmail.com', 3, '$2a$07$usesomesillystringforeH2Pe6zSdgCYJ9ERvH.ooHGj1OENd3MG', '2023-05-06 20:39:43');
INSERT INTO `tba_usuarios` VALUES (33, 'Karla1231231', 3, 'karla@gmail.com', 2, '$2a$07$usesomesillystringforeEwRvWqh2pJUUigS0hsMkRTuNEKT3DDO', '2023-05-06 21:09:37');

SET FOREIGN_KEY_CHECKS = 1;
