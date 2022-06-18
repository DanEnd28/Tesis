/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - tesis
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tesis` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;

USE `tesis`;

/*Table structure for table `compañia` */

DROP TABLE IF EXISTS `compañia`;

CREATE TABLE `compañia` (
  `Rif` char(11) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Telefono` char(12) COLLATE utf8_spanish_ci NOT NULL,
  `Divisa` decimal(12,2) NOT NULL,
  PRIMARY KEY (`Rif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `compañia` */

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `Codigo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(252) COLLATE utf8_spanish_ci NOT NULL,
  `Precio` decimal(12,2) NOT NULL,
  `Estatus` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `producto` */

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
