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

 Date: 03/07/2023 00:36:51
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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

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
-- Table structure for tba_atenciones
-- ----------------------------
DROP TABLE IF EXISTS `tba_atenciones`;
CREATE TABLE `tba_atenciones`  (
  `CodAtencion` int NOT NULL,
  `TituloAtencion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DescripcionAtencion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `FechaCreacion` datetime NOT NULL,
  `FechaActualizacion` datetime NOT NULL,
  PRIMARY KEY (`CodAtencion`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_atenciones
-- ----------------------------

-- ----------------------------
-- Table structure for tba_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tba_categoria`;
CREATE TABLE `tba_categoria`  (
  `CodCategoria` int NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CodCategoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tba_categoria
-- ----------------------------
INSERT INTO `tba_categoria` VALUES (1, 'Recursos Humanos');
INSERT INTO `tba_categoria` VALUES (2, 'Contabilidad');
INSERT INTO `tba_categoria` VALUES (3, 'Presupuestos');
INSERT INTO `tba_categoria` VALUES (4, 'Compras');
INSERT INTO `tba_categoria` VALUES (5, 'Ventas');
INSERT INTO `tba_categoria` VALUES (6, 'Logística');
INSERT INTO `tba_categoria` VALUES (7, 'Almacén');
INSERT INTO `tba_categoria` VALUES (8, 'TI');

-- ----------------------------
-- Table structure for tba_detalleticket
-- ----------------------------
DROP TABLE IF EXISTS `tba_detalleticket`;
CREATE TABLE `tba_detalleticket`  (
  `CodDetalleTicket` int NOT NULL AUTO_INCREMENT,
  `CodTicket` int NOT NULL,
  `DescripcionTicket` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaActualizacion` date NOT NULL,
  PRIMARY KEY (`CodDetalleTicket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tba_detalleticket
-- ----------------------------
INSERT INTO `tba_detalleticket` VALUES (1, 5, 'asdasd', '0000-00-00', '2023-06-14');
INSERT INTO `tba_detalleticket` VALUES (2, 6, 'Hay daño en el cableado', '0000-00-00', '0000-00-00');

-- ----------------------------
-- Table structure for tba_estado
-- ----------------------------
DROP TABLE IF EXISTS `tba_estado`;
CREATE TABLE `tba_estado`  (
  `CodEstado` int NOT NULL AUTO_INCREMENT,
  `NombreEstado` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CodEstado`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tba_estado
-- ----------------------------
INSERT INTO `tba_estado` VALUES (1, 'Registrado');
INSERT INTO `tba_estado` VALUES (2, 'Asignado');
INSERT INTO `tba_estado` VALUES (3, 'En Revision');
INSERT INTO `tba_estado` VALUES (4, 'Finalizado');

-- ----------------------------
-- Table structure for tba_perfilusuario
-- ----------------------------
DROP TABLE IF EXISTS `tba_perfilusuario`;
CREATE TABLE `tba_perfilusuario`  (
  `CodPerfil` int NOT NULL AUTO_INCREMENT,
  `NombrePerfil` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`CodPerfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tba_perfilusuario
-- ----------------------------
INSERT INTO `tba_perfilusuario` VALUES (1, 'Administrador');
INSERT INTO `tba_perfilusuario` VALUES (2, 'Solicitante');
INSERT INTO `tba_perfilusuario` VALUES (3, 'Asesor');

-- ----------------------------
-- Table structure for tba_sede
-- ----------------------------
DROP TABLE IF EXISTS `tba_sede`;
CREATE TABLE `tba_sede`  (
  `CodSede` int NOT NULL AUTO_INCREMENT,
  `NombreSede` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`CodSede`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tba_sede
-- ----------------------------
INSERT INTO `tba_sede` VALUES (1, 'Arequipa');
INSERT INTO `tba_sede` VALUES (2, 'Lima');
INSERT INTO `tba_sede` VALUES (3, 'Piura');
INSERT INTO `tba_sede` VALUES (4, 'Tacna');

-- ----------------------------
-- Table structure for tba_ticket
-- ----------------------------
DROP TABLE IF EXISTS `tba_ticket`;
CREATE TABLE `tba_ticket`  (
  `CodTicket` int NOT NULL AUTO_INCREMENT,
  `TituloTicket` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CodUsuario` int NOT NULL,
  `CodCategoria` int NOT NULL,
  `CodEstado` int NOT NULL,
  `CodAsignacion` int NULL DEFAULT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaActualizacion` date NOT NULL,
  PRIMARY KEY (`CodTicket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tba_ticket
-- ----------------------------
INSERT INTO `tba_ticket` VALUES (1, 'Daño en las redes', 3, 3, 2, 19, '2023-06-21', '2023-06-21');
INSERT INTO `tba_ticket` VALUES (2, 'Daño en las redes', 3, 7, 1, NULL, '2023-06-21', '0000-00-00');
INSERT INTO `tba_ticket` VALUES (3, 'Daño en las redes', 3, 2, 1, 3, '2023-06-15', '0000-00-00');
INSERT INTO `tba_ticket` VALUES (5, 'Daño en la central', 3, 1, 2, 3, '2023-06-15', '2023-06-15');
INSERT INTO `tba_ticket` VALUES (7, 'Daño x en la sede x', 2, 2, 1, 3, '2023-06-15', '2023-06-15');

-- ----------------------------
-- Table structure for tba_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tba_usuarios`;
CREATE TABLE `tba_usuarios`  (
  `CodUsuario` int NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ApellidoUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `CelularUsuario` int NULL DEFAULT NULL,
  `CodArea` int NOT NULL,
  `CorreoUsuario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CodPerfil` int NOT NULL,
  `CodSede` int NULL DEFAULT NULL,
  `PasswordUsuario` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UltimaConexion` timestamp NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  `FechaCreacion` date NOT NULL,
  `FechaActualizacion` date NOT NULL,
  PRIMARY KEY (`CodUsuario`) USING BTREE,
  INDEX `CodPerfil`(`CodPerfil`) USING BTREE,
  INDEX `tba_usuarios_ibfk_2`(`CodArea`) USING BTREE,
  CONSTRAINT `tba_usuarios_ibfk_1` FOREIGN KEY (`CodPerfil`) REFERENCES `tba_perfilusuario` (`CodPerfil`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tba_usuarios_ibfk_2` FOREIGN KEY (`CodArea`) REFERENCES `tba_areausuario` (`CodArea`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tba_usuarios
-- ----------------------------
INSERT INTO `tba_usuarios` VALUES (3, 'David Ruben', 'Poblette Linares', 987654321, 1, 'david@gmail.com', 3, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-07-02 23:15:24', '0000-00-00', '2023-06-22');
INSERT INTO `tba_usuarios` VALUES (4, 'Andre', 'Vargas', 998877655, 6, 'andre@gmail.com', 3, 1, '$2a$07$usesomesillystringforeGsJAIIu7nhlxWq.cvdNluLcR1KdMYnq', '2023-06-21 15:01:05', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (5, 'Jose', NULL, NULL, 6, 'jose@gmail.com', 3, 2, '$2a$07$usesomesillystringforeN7/2NBfGxbAuv02IPrTFBImFJd5PJ1m', '2023-06-21 15:01:06', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (6, 'Karla', NULL, NULL, 1, 'karla@gmail.com', 2, 2, '$2a$07$usesomesillystringforeh13SwIG2YuGjH7WNZPTqAnpzOR7aksC', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (7, 'Ana', NULL, NULL, 1, 'ana@gmail.com', 3, 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (8, 'Ana', NULL, NULL, 3, 'ana@gmail.com', 2, 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (9, 'Ana', NULL, NULL, 5, 'ana@gmail.com', 3, 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (10, 'Ana', NULL, NULL, 3, 'ana@gmail.com', 2, 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (12, 'Layla', NULL, NULL, 4, 'layla@gmail.com', 2, 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (13, 'Ruflen', NULL, NULL, 5, 'rulfen@gmail.com', 2, 2, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:10', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (14, 'Ruflen', NULL, NULL, 5, 'rulfen@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:12', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (15, 'Ruflen', NULL, NULL, 5, 'rulfen@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (16, 'Ruflen', NULL, NULL, 5, 'rulfen@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (17, 'Ruflen', NULL, NULL, 5, 'rulfen@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (18, 'Ruflen', NULL, NULL, 5, 'rulfen@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (19, 'Daniel', NULL, NULL, 3, 'daniel@gmail.com', 3, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (20, 'Andre', NULL, NULL, 4, 'andre@gmail.com', 2, 1, '$2a$07$usesomesillystringfore1Vq2ue5LXhMMnkvcTjboDi7Oexd8oGm', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (21, 'Andre', NULL, NULL, 4, 'andre@gmail.com', 2, 1, '$2a$07$usesomesillystringfore1Vq2ue5LXhMMnkvcTjboDi7Oexd8oGm', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (22, 'Andre', NULL, NULL, 3, 'andre@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (23, 'Karla', NULL, NULL, 3, 'karla@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (24, 'Karla', NULL, NULL, 3, 'karla@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (25, 'Karla', NULL, NULL, 3, 'karla@gmail.com', 2, 1, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:14', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (26, 'Andre', NULL, NULL, 3, 'andre@gmail.com', 2, 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:15', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (27, 'Andre', NULL, NULL, 3, 'andre@gmail.com', 2, 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (28, 'Andre', NULL, NULL, 4, 'andre@gmail.com', 2, 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (29, 'Andre', NULL, NULL, 4, 'andre@gmail.com', 2, 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (30, 'Andre', NULL, NULL, 4, 'andre@gmail.com', 2, 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (31, 'Andre', NULL, NULL, 4, 'andre@gmail.com', 2, 3, '$2a$07$usesomesillystringforeh6tvwDNOAiEn9PYXfY79K3vDiKj6Ib6', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (32, 'Karla', NULL, NULL, 4, 'karla@gmail.com', 3, 3, '$2a$07$usesomesillystringforeH2Pe6zSdgCYJ9ERvH.ooHGj1OENd3MG', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');
INSERT INTO `tba_usuarios` VALUES (33, 'Karla1231231', NULL, NULL, 3, 'karla@gmail.com', 2, 3, '$2a$07$usesomesillystringforeEwRvWqh2pJUUigS0hsMkRTuNEKT3DDO', '2023-06-21 15:01:17', '0000-00-00', '0000-00-00');

SET FOREIGN_KEY_CHECKS = 1;
