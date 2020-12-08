CREATE DATABASE  IF NOT EXISTS `mtg_shopkeeper` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mtg_shopkeeper`;
-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: mtg_shopkeeper
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `amigos`
--

DROP TABLE IF EXISTS `amigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `amigos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_amigo` int NOT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `articulo` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `borrador`
--

DROP TABLE IF EXISTS `borrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `borrador` (
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chat` (
  `id_chat` int NOT NULL AUTO_INCREMENT,
  `id_amigo` int NOT NULL,
  `id_usuario` int NOT NULL,
  `CHAT` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `id_amigo` (`id_amigo`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_amigo`) REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `direccion`
--

DROP TABLE IF EXISTS `direccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `direccion` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `valoracion`
--

DROP TABLE IF EXISTS `valoracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `valoracion` (
  `id_valoracion` int NOT NULL AUTO_INCREMENT,
  `id_articulo` int NOT NULL,
  `valoracion` int NOT NULL,
  PRIMARY KEY (`id_valoracion`),
  KEY `id_articulo` (`id_articulo`),
  CONSTRAINT `valoracion_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `articulo` (`id_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping routines for database 'mtg_shopkeeper'
--
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_ARTICULO_BORRADOR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_ARTICULO_BORRADOR`(IN CASES INT, IN SELECCION INT, IN SPid_identificador INT,  IN SPombre_articulo VARCHAR(80), 
IN SPdescripcion VARCHAR(300), IN SPVIDEO BLOB, IN SPimg1 BLOB, IN SPimg2 BLOB,IN SPimg3 BLOB)
BEGIN
CASE 
WHEN CASES=0 THEN
UPDATE borrador
set 
nombre_articulo = SPombre_articulo,
descripcion =SPdescripcion,
video= SPvideo,
img1= SPimg1,
img2= SPimg2,
img3= SPimg3,
coste_articulo= SPcoste_articulo
WHERE id_usuario= SPid_identificador and id_borrador=SELECCION;

WHEN CASES=1 THEN
UPDATE articulo
set 
nombre_articulo = SPombre_articulo,
descripcion =SPdescripcion,
video= SPvideo,
img1= SPimg1,
img2= SPimg2,
img3= SPimg3,
coste_articulo= SPcoste_articulo
WHERE id_articulo= SPid_identificador and id_borrador=SELECCION;
END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AGREGAR_AMIGO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AGREGAR_AMIGO`(idUsuario INT, idAmigo INT)
BEGIN
	DECLARE amigo INT;
    DECLARE amigo2 INT;
    SELECT COUNT(*) INTO amigo FROM amigos WHERE id_usuario = idUsuario AND id_amigo = idAmigo;
     SELECT COUNT(*) INTO amigo2 FROM amigos WHERE id_usuario = idAmigo AND id_amigo = idUsuario ;
    IF amigo < 1 AND amigo2 < 1 THEN
		INSERT INTO amigos (id_amigo, id_usuario) VALUES (idAmigo, idUsuario);
        INSERT INTO amigos (id_amigo, id_usuario) VALUES (idUsuario, idAmigo);
        SELECT 'ok' AS response;
    ELSE
		SELECT 'no' AS response;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BORRAR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BORRAR`(IN ESTE INT, IN IDENTIFICADOR INT )
BEGIN
CASE
WHEN ESTE=0 THEN
DELETE FROM BORRADOR WHERE id_borrador= IDENTIFICADOR;
WHEN ESTE=1 THEN
DELETE FROM ARTICULO WHERE id_articulo= IDENTIFICADOR;
END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSQUEDA_ARTICULOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSQUEDA_ARTICULOS`(IN SELECCION INT,IN SPid_cuestionamiento varchar(300))
BEGIN
CASE

WHEN SELECCION =0 THEN
SELECT id_articulo, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM ARTICULO
order by fecha;

WHEN SELECCION =1 THEN
SELECT id_articulo, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM ARTICULO
WHERE nombre_articulo LIKE CONCAT ('%',SPid_cuestionamiento,'%') order by fecha;


END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `COMENTARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `COMENTARIO`(IN SPid_articulo INT, IN SPid_usuario INT, IN SPopinion VARCHAR(100),valoracion int)
BEGIN



INSERT INTO COMENTARIO (id_articulo, id_usuario, fecha, valoracion, opinion) VALUE (SPid_articulo, SPid_usuario, NOW(), valoracion, SPopinion);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DETALLES_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DETALLES_USUARIO`(id INT)
BEGIN
	SELECT U.id_usuario, U.nombre, U.apellidos, U.correo, D.calle1, D.calle2, D.codigo_postal, D.ciudad, D.pais, D.estado, U.nombre_usuario
    FROM usuario U
    JOIN direccion D ON U.id_usuario = D.id_USUARIO
    WHERE U.id_usuario = id
    LIMIT 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `EDITAR_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `EDITAR_USUARIO`(id int, SPnombre VARCHAR(15),  SPapellidos VARCHAR(15),
 SPcorreo VARCHAR(20),   SPcalle1 varchar(30),  SPcalle2 varchar(30), SPpais varchar(30),  SPestado varchar(30),
 SPciudad varchar(30),  SPcodigo_postal int(8) )
BEGIN
UPDATE USUARIO  SET nombre = SPnombre, apellidos = SPapellidos, correo = SPcorreo
WHERE id_usuario =  id;

UPDATE direccion SET calle1= spcalle1, calle2 = spcalle2, pais = sppais, estado = spestado,  ciudad = spciudad, codigo_postal = spcodigo_postal 
WHERE id_usuario =  id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ELIMINAR_AMIGO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_AMIGO`(idUsuario INT, idAmigo INT)
BEGIN
	DECLARE idDelete1 INT;
    DECLARE idDelete2 INT;
	SELECT id INTO idDelete1 FROM amigos WHERE id_usuario = idUsuario AND id_amigo=idAmigo;
    SELECT id INTO idDelete2  FROM amigos WHERE id_usuario = idAmigo AND id_amigo= idUsuario;
    
    DELETE FROM amigos WHERE id=idDelete1;
      DELETE FROM amigos WHERE id=idDelete2;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `LOGIN` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `LOGIN`( IN SELECCION INT(30) , IN SPnombre_usuario VARCHAR(20), IN SPPASS VARCHAR(120))
BEGIN

CASE
WHEN SELECCION =0 THEN
SELECT id_usuario, imagen_portada, imagen_avatar, nombre, apellidos, correo, nombre_usuario, pass from USUARIO
WHERE nombre_usuario = SPnombre_usuario or correo = SPnombre_usuario  and pass= sha2(SPPASS, 256);
END CASE;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MOSTRAR_BORRADOR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MOSTRAR_BORRADOR`(IN SPid_usuario INT)
BEGIN
SELECT id_borrador, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM BORRADOR
WHERE id_usuario=SPid_usuario AND publicado = 0 order by fecha desc;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `MOSTRAR_COMENTARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `MOSTRAR_COMENTARIO`(IN SPid_articulo INT)
BEGIN
-- SELECT USUARIO.imagen_avatar, USUARIO.nombre_usuario, Comentario.opinion,COMENTARIO.fecha from Comentario 
-- INNER JOIN Articulo ON Comentario.id_comentario= Articulo.id_comentario
-- INNER JOIN USUARIO ON Articulo.id_usuario = USUARIO.id_usuario
-- where ARTICULO.id_articulo= SPid_usuario order by COMENTARIO.Fecha DESC;
SELECT C.fecha, C.opinion, U.nombre_usuario, U.id_usuario, C.valoracion	
FROM comentario C 
JOIN usuario U ON C.id_usuario = U.id_usuario
WHERE C.id_articulo = SPid_articulo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `NUEVO_AMIGO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NUEVO_AMIGO`( IN SELECCION INT, IN SPid_usuario INT)
BEGIN
CASE 
WHEN SELECCION= 0 THEN
INSERT INTO Amigos (id_usuario) VALUE (SPid_usuario);

WHEN SELECCION= 1 THEN
SELECT USUARIO.imagen_avatar, USUARIO.nombre_usuario from Amigos 
INNER JOIN USUARIO ON Amigos.id_usuario= Usuario._id_usuario where id_usuario=SPid_usuario order by USUARIO.nombre_usuario;

WHEN SELECCION= 2 THEN
SELECT USUARIO.imagen_avatar, USUARIO.nombre_usuario, CHAT.CHAT from CHAT 
INNER JOIN Amigos ON CHAT.id_amigo= Amigos.id_amigo
INNER JOIN USUARIO ON Amigos.id_usuario= USUARIO.id_usuario
where Chat.id_usuario=SPid_usuario and Amigos.id_usuario= SPid_usuario order by CHAT.Fecha DESC;
END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `NUEVO_MENSAJE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `NUEVO_MENSAJE`(IN SPid_amigo INT, IN SPid_usuario INT,  IN SPCHAT VARCHAR (100))
BEGIN
INSERT INTO CHAT (id_amigo, id_usuario, CHAT) VALUE (SPid_amigo, id_usuario, SPCHAT);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `PUBLICAR` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `PUBLICAR`(IN SELECCION INT, IN SPid_identificador INT,  IN SPombre_articulo VARCHAR(80), IN SPdescripcion VARCHAR(300),
  IN SPVIDEO varchar(300), IN SPimg1 mediumblob,
IN SPimg2 mediumblob,IN SPimg3 mediumblob  )
BEGIN
CASE
WHEN SELECCION = 0 THEN
INSERT INTO borrador (id_usuario, nombre_articulo, descripcion,  video, img1, img2, img3, fecha) 
VALUE (SPid_identificador,SPombre_articulo,SPdescripcion,SPvideo, SPimg1, SPimg2, SPimg3, NOW());

WHEN SELECCION = 1 THEN
INSERT INTO articulo (id_usuario, nombre_articulo, descripcion,  video, img1, img2, img3, fecha) 
VALUE (SPid_identificador,SPombre_articulo,SPdescripcion,SPvideo, SPimg1, SPimg2, SPimg3, NOW());
SELECT last_insert_id() AS idArticulo;

WHEN SELECCION = 2 THEN
UPDATE borrador SET publicado = 1 WHERE id_borrador = SPid_identificador;
INSERT INTO articulo(id_usuario, nombre_articulo, descripcion,  video, img1, img2, img3, fecha)
SELECT id_usuario, nombre_articulo, descripcion,  video, img1, img2, img3, fecha FROM borrador WHERE id_borrador = SPid_identificador;
SELECT last_insert_id() AS idArticulo;
END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRO`(IN SPnombre VARCHAR(15), IN SPapellidos VARCHAR(15), IN SPTelefono bigint, IN SPnombre_usuario VARCHAR(20),
IN SPcorreo VARCHAR(255), IN SPpass VARCHAR(120), IN SPcalle1 varchar(30), IN SPcalle2 varchar(30),IN SPpais varchar(30), IN SPestado varchar(30),
IN SPciudad varchar(30), IN SPcodigo_postal int(8), IN avatar mediumblob )
BEGIN
INSERT INTO USUARIO (nombre, apellidos, Telefono, nombre_usuario, correo, pass, tipo_usuario, imagen_avatar) value (SPnombre, SPapellidos, SPTelefono, SPnombre_usuario, 
SPcorreo, sha2(SPpass,256),1,avatar);
INSERT INTO DIRECCION(id_usuario, calle1,calle2,pais, estado, ciudad, codigo_postal) value 
((select id_usuario from usuario where Telefono=spTelefono),
spcalle1,spcalle2,sppais, spestado, spciudad, spcodigo_postal);

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `SON_AMIGOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `SON_AMIGOS`(idUsuario INT, idAmigo INT)
BEGIN
	SELECT COUNT(*) AS amigor FROM amigos WHERE id_amigo = idUsuario AND id_usuario = idAmigo;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VALORACION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `VALORACION`(IN SPid_articulo INT, IN SPid_usuario INT, IN SPvaloracion INT(3))
BEGIN
UPDATE COMENTARIO 
SET valoracion = (valoracion+SPvaloracion)
WHERE id_articulo=SPid_articulo and id_usuario=SPid_usuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VER_AMIGOS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `VER_AMIGOS`(idUsuario INT)
BEGIN
	SELECT amigos.id_amigo, usuario.nombre_usuario FROM amigos JOIN usuario ON usuario.id_usuario = amigos.id_amigo WHERE amigos.id_usuario=idUsuario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `VER_IMAGEN` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `VER_IMAGEN`(tipo int, id int)
BEGIN
	CASE
		WHEN tipo = 1 THEN
			SELECT imagen_avatar FROM usuario WHERE id_usuario = id;
        WHEN tipo = 2 THEN
			SELECT imagen_portada FROM usuario WHERE id_usuario = id;
    END CASE;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-05 19:27:56
