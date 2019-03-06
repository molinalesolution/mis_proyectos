/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 80013
Source Host           : localhost:3306
Source Database       : concesionarios

Target Server Type    : MYSQL
Target Server Version : 80013
File Encoding         : 65001

Date: 2019-03-05 22:27:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NACIONALIDAD_CLIENTE` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CEDULA_CLIENTE` int(11) DEFAULT NULL,
  `NOMBRES_CLIENTE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `APELLIDOS_CLIENTE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `DIRECCION_CLIENTE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `TELEFONO_CLIENTE` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ID_CONCESIONARIO` int(11) DEFAULT NULL,
  `ESTATUS_CLIENTE` int(1) DEFAULT '1' COMMENT 'ESTATUS_CLIENTE\r\n1-ACTIVO\r\n0-BLOQUEADO',
  `UPDATED_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `CREATED_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `FK_ID_CONCESIONARIO` (`ID_CONCESIONARIO`),
  CONSTRAINT `FK_ID_CONCESIONARIO` FOREIGN KEY (`ID_CONCESIONARIO`) REFERENCES `concesionario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('1', 'V', '11111111', 'LUIS ALBERTO', 'MOLINA', 'CCS', '2510000', '1', '1', '2019-03-04 13:07:26', '2019-03-04 13:07:26');
INSERT INTO `cliente` VALUES ('2', 'V', '22222222', 'CARLOS ALBERTO', 'PEREZ', 'VALENCIA', '3234455', '10', '1', '2019-03-05 21:58:22', '2019-03-05 21:58:22');
INSERT INTO `cliente` VALUES ('7', 'V', '14559889', 'CARLOS ALBERTO', 'PEREZ', 'dddd', '324242', '10', '1', '2019-03-05 21:58:48', '2019-03-05 21:58:48');
INSERT INTO `cliente` VALUES ('11', 'V', '12453951', 'PEDRO', 'PEREZ', 'Palo Verde', '00000000', '4', '1', null, null);
INSERT INTO `cliente` VALUES ('12', 'V', '55555', 'LUIS A', 'MOLINA A', 'Palo Verde', '2323', '1', '1', null, null);
INSERT INTO `cliente` VALUES ('13', 'V', '111122', 'LUIS A', 'MOLINA A', 'Palo Verde', '2323', '9', '1', '2019-03-05 18:22:56', '2019-03-05 18:22:56');

-- ----------------------------
-- Table structure for concesionario
-- ----------------------------
DROP TABLE IF EXISTS `concesionario`;
CREATE TABLE `concesionario` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_CONCESIONARIO` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `ID_ESTADO` int(50) DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `CREATED_AT` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `FK_ID_ESTADO` (`ID_ESTADO`),
  CONSTRAINT `FK_ID_ESTADO` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of concesionario
-- ----------------------------
INSERT INTO `concesionario` VALUES ('1', 'CONCESIONARIO_CCS', '1', null, null);
INSERT INTO `concesionario` VALUES ('2', 'CONCESIONARIO_CCS_2', '1', null, null);
INSERT INTO `concesionario` VALUES ('3', 'CONCESIONARIO_ANZ', '2', null, null);
INSERT INTO `concesionario` VALUES ('4', 'CONCESIONARIO_AP', '3', null, null);
INSERT INTO `concesionario` VALUES ('5', 'CONCESIONARIO_AR', '4', null, null);
INSERT INTO `concesionario` VALUES ('6', 'CONCESIONARIO_BA', '5', null, null);
INSERT INTO `concesionario` VALUES ('7', 'CONCESIONARIO_BO', '6', null, null);
INSERT INTO `concesionario` VALUES ('8', 'CONCESIONARIO_CA', '7', null, null);
INSERT INTO `concesionario` VALUES ('9', 'CONCESIONARIO_CO', '8', null, null);
INSERT INTO `concesionario` VALUES ('10', 'CONCESIONARIO_FA', '9', null, null);
INSERT INTO `concesionario` VALUES ('11', 'CONCESIONARIO_GU', '10', null, null);
INSERT INTO `concesionario` VALUES ('12', 'CONCESIONARIO_LA', '11', null, null);
INSERT INTO `concesionario` VALUES ('13', 'CONCESIONARIO_ME', '12', null, null);
INSERT INTO `concesionario` VALUES ('14', 'CONCESIONARIO_MI', '13', null, null);
INSERT INTO `concesionario` VALUES ('15', 'CONCESIONARIO_MO', '13', '2019-03-04 13:08:08', '2019-03-04 13:08:08');

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `ID` int(11) NOT NULL DEFAULT '0',
  `TX_ESTADO` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `UPDATED_AT` timestamp NULL DEFAULT NULL,
  `CREATED_AT` timestamp NULL DEFAULT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `estado` VALUES ('1', 'DISTRITO CAPITAL', null, null);
INSERT INTO `estado` VALUES ('2', 'ANZOATEGUI', null, null);
INSERT INTO `estado` VALUES ('3', 'APURE', null, null);
INSERT INTO `estado` VALUES ('4', 'ARAGUA', null, null);
INSERT INTO `estado` VALUES ('5', 'BARINAS', null, null);
INSERT INTO `estado` VALUES ('6', 'BOLIVAR', null, null);
INSERT INTO `estado` VALUES ('7', 'CARABOBO', null, null);
INSERT INTO `estado` VALUES ('8', 'COJEDES', null, null);
INSERT INTO `estado` VALUES ('9', 'FALCON', null, null);
INSERT INTO `estado` VALUES ('10', 'GUARICO', null, null);
INSERT INTO `estado` VALUES ('11', 'LARA', null, null);
INSERT INTO `estado` VALUES ('12', 'MERIDA', null, null);
INSERT INTO `estado` VALUES ('13', 'MIRANDA', null, null);
INSERT INTO `estado` VALUES ('14', 'MONAGAS', null, null);
INSERT INTO `estado` VALUES ('15', 'NUEVA ESPARTA', null, null);
INSERT INTO `estado` VALUES ('16', 'PORTUGUESA', null, null);
INSERT INTO `estado` VALUES ('17', 'SUCRE', null, null);
INSERT INTO `estado` VALUES ('18', 'TACHIRA', null, null);
INSERT INTO `estado` VALUES ('19', 'TRUJILLO', null, null);
INSERT INTO `estado` VALUES ('20', 'YARACUY', null, null);
INSERT INTO `estado` VALUES ('21', 'ZULIA', null, null);
INSERT INTO `estado` VALUES ('22', 'AMAZONAS', null, null);
INSERT INTO `estado` VALUES ('23', 'DELTA AMACURO', null, null);
INSERT INTO `estado` VALUES ('24', 'VARGAS', null, null);
INSERT INTO `estado` VALUES ('25', 'GENERAL', null, null);
