-- DROP DATABASE MTG_Shopkeeper2;
CREATE DATABASE IF NOT EXISTS  MTG_Shopkeeper;

Use MTG_Shopkeeper;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `imagen_portada` mediumblob,
  `imagen_avatar` mediumblob,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(15) NOT NULL,
  `Telefono` bigint NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `pass` varchar(120) NOT NULL,
  `tipo_usuario` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `Telefono` (`Telefono`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  UNIQUE KEY `correo` (`correo`)
);

CREATE TABLE IF NOT EXISTS `direccion` (
  `id_direccion` int NOT NULL AUTO_INCREMENT,
  `id_USUARIO` int NOT NULL,
  `calle1` varchar(30) NOT NULL,
  `calle2` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `codigo_postal` int NOT NULL,
  PRIMARY KEY (`id_direccion`),
  KEY `id_USUARIO` (`id_USUARIO`),
  CONSTRAINT `direccion_ibfk_1` FOREIGN KEY (`id_USUARIO`) REFERENCES `usuario` (`id_usuario`)
);

CREATE TABLE IF NOT EXISTS `borrador` (
  `id_borrador` int NOT NULL AUTO_INCREMENT,
  `id_usuario` int NOT NULL,
  `nombre_articulo` varchar(80) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `video` varchar(300) NOT NULL,
  `img1` mediumblob NOT NULL,
  `img2` mediumblob NOT NULL,
  `img3` mediumblob NOT NULL,
  `coste_articulo` int DEFAULT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_borrador`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `borrador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
);


CREATE TABLE IF NOT EXISTS `articulo` (
  `id_articulo` int NOT NULL AUTO_INCREMENT,
  `nombre_articulo` varchar(80) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int NOT NULL,
  `video` varchar(300) NOT NULL,
  `img1` mediumblob NOT NULL,
  `img2` mediumblob NOT NULL,
  `img3` mediumblob NOT NULL,
  PRIMARY KEY (`id_articulo`)
);


CREATE TABLE IF NOT EXISTS `comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `id_articulo` int NOT NULL,
  `id_usuario` int NOT NULL,
  `fecha` date NOT NULL,
  `valoracion` int NOT NULL DEFAULT '0',
  `opinion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_articulo` (`id_articulo`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`)
);


CREATE TABLE IF NOT EXISTS `valoracion` (
  `id_valoracion` int NOT NULL AUTO_INCREMENT,
  `id_articulo` int NOT NULL,
  `valoracion` int NOT NULL,
  PRIMARY KEY (`id_valoracion`),
  KEY `id_articulo` (`id_articulo`),
  CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`)
);


CREATE TABLE IF NOT EXISTS `amigos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_amigo` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`)
);



CREATE TABLE IF NOT EXISTS `chat` (
  `id_chat` int NOT NULL AUTO_INCREMENT,
  `id_amigo` int NOT NULL,
  `id_usuario` int NOT NULL,
  `CHAT` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_chat`)
);







