/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - luncheria
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`luncheria` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `luncheria`;

/*Table structure for table `detalle_pedido` */

DROP TABLE IF EXISTS `detalle_pedido`;

CREATE TABLE `detalle_pedido` (
  `Nro_Movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `Numero` int(11) NOT NULL,
  `Producto` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `TotalDls` decimal(12,2) NOT NULL,
  `TotalBs` decimal(12,2) NOT NULL,
  PRIMARY KEY (`Nro_Movimiento`),
  KEY `Nro_Movimiento` (`Nro_Movimiento`),
  KEY `Numero` (`Numero`),
  KEY `Producto` (`Producto`),
  CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`Numero`) REFERENCES `pedido` (`Numero`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`Producto`) REFERENCES `producto` (`Codigo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `detalle_pedido` */

/*Table structure for table `divisa` */

DROP TABLE IF EXISTS `divisa`;

CREATE TABLE `divisa` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `divisa` */

/*Table structure for table `historico_divisa` */

DROP TABLE IF EXISTS `historico_divisa`;

CREATE TABLE `historico_divisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `valor` decimal(12,2) NOT NULL,
  `cod` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cod` (`cod`),
  CONSTRAINT `historico_divisa_ibfk_1` FOREIGN KEY (`cod`) REFERENCES `divisa` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `historico_divisa` */

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Repartidor` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Total` decimal(12,2) NOT NULL,
  `Divisa` int(11) NOT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Cliente` (`Cliente`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Cliente`) REFERENCES `usuario` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `pedido` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `Codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(12,2) NOT NULL,
  `Estatus` int(1) NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto` */

insert  into `producto`(`Codigo`,`Descripcion`,`Precio`,`Estatus`) values ('EMP001','Empanada de Queso',0.30,1),('EMP002','Empanada de Jamón con Queso',0.30,1),('REF001','CocaCola',0.80,1),('REF002','Malta',0.60,1);

/*Table structure for table `rol` */

DROP TABLE IF EXISTS `rol`;

CREATE TABLE `rol` (
  `Rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `Desc_rol` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Rol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `rol` */

insert  into `rol`(`Rol_id`,`Desc_rol`) values (1,'Administrador'),(2,'Cliente'),(3,'Empleado'),(4,'Admin');

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `Cedula` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `Usuario` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Contraseña` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `Nombres` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Apellidos` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `Estatus` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario` */

/*Table structure for table `usuario_rol` */

DROP TABLE IF EXISTS `usuario_rol`;

CREATE TABLE `usuario_rol` (
  `Id_Rol` int(11) NOT NULL AUTO_INCREMENT,
  `Rol_id` int(11) DEFAULT NULL,
  `Cedula` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`Id_Rol`),
  KEY `Rol_id` (`Rol_id`),
  KEY `Cedula` (`Cedula`),
  CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`Rol_id`) REFERENCES `rol` (`Rol_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`Cedula`) REFERENCES `usuario` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuario_rol` */

/*Table structure for table `valor_divisa` */

DROP TABLE IF EXISTS `valor_divisa`;

CREATE TABLE `valor_divisa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `historico` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `historico` (`historico`),
  KEY `valor_divisa_ibfk_1` (`cliente`),
  CONSTRAINT `valor_divisa_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `pedido` (`Cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `valor_divisa_ibfk_2` FOREIGN KEY (`historico`) REFERENCES `historico_divisa` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `valor_divisa` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
