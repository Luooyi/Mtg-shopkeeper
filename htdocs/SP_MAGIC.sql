use mtg_shopkeeper;

Delimiter //
CREATE PROCEDURE  REGISTRO (IN SPnombre VARCHAR(15), IN SPapellidos VARCHAR(15), IN SPTelefono bigint, IN SPnombre_usuario VARCHAR(20),
IN SPcorreo VARCHAR(255), IN SPpass VARCHAR(120), IN SPcalle1 varchar(30), IN SPcalle2 varchar(30),IN SPpais varchar(30), IN SPestado varchar(30),
IN SPciudad varchar(30), IN SPcodigo_postal int(8), IN avatar mediumblob )
BEGIN
INSERT INTO USUARIO (nombre, apellidos, Telefono, nombre_usuario, correo, pass, tipo_usuario, imagen_avatar) value (SPnombre, SPapellidos, SPTelefono, SPnombre_usuario, 
SPcorreo, sha2(SPpass,256),1,avatar);
INSERT INTO DIRECCION(id_usuario, calle1,calle2,pais, estado, ciudad, codigo_postal) value 
((select id_usuario from usuario where Telefono=spTelefono),
spcalle1,spcalle2,sppais, spestado, spciudad, spcodigo_postal);

END //

-- SE AGREGÓ VALOR 1 EN EL INSERT DE USUARIO DEL SP DE REGISTRO
-- SE MODIFICÓ EL SP DE LOGIN PARA TRAER EL ID DEL USUARIO
-- SE AGREGÓ SP PARA DETALLES DEL USUARIO
-- SE AGREGÓ SP PARA EDITAR DATOS DE USAURIO
-- SE MODIFICÓ EL CAMPO VIDEO EN LAS TABLAS ARTICULO Y BORRADOR PARA PONERLO COMO TEXTO
-- SE MODIFICÓ EL SP DE PUBLICAR, PARA QUE CUADRE CON LAS TABLAS 



Delimiter //
CREATE PROCEDURE  EDITAR_USUARIO (id int, SPnombre VARCHAR(15),  SPapellidos VARCHAR(15),
 SPcorreo VARCHAR(20),   SPcalle1 varchar(30),  SPcalle2 varchar(30), SPpais varchar(30),  SPestado varchar(30),
 SPciudad varchar(30),  SPcodigo_postal int(8) )
BEGIN
UPDATE USUARIO  SET nombre = SPnombre, apellidos = SPapellidos, correo = SPcorreo
WHERE id_usuario =  id;

UPDATE direccion SET calle1= spcalle1, calle2 = spcalle2, pais = sppais, estado = spestado,  ciudad = spciudad, codigo_postal = spcodigo_postal 
WHERE id_usuario =  id;
END //



Delimiter %%
CREATE PROCEDURE DETALLES_USUARIO(id INT)
BEGIN
	SELECT U.id_usuario, U.nombre, U.apellidos, U.correo, D.calle1, D.calle2, D.codigo_postal, D.ciudad, D.pais, D.estado, U.nombre_usuario
    FROM usuario U
    JOIN direccion D ON U.id_usuario = D.id_USUARIO
    WHERE U.id_usuario = id
    LIMIT 1;
END
%%



Delimiter //
CREATE PROCEDURE LOGIN( IN SELECCION INT(30) , IN SPnombre_usuario VARCHAR(20), IN SPPASS VARCHAR(120))
BEGIN

CASE
WHEN SELECCION =0 THEN
SELECT id_usuario, imagen_portada, imagen_avatar, nombre, apellidos, correo, nombre_usuario, pass from USUARIO
WHERE nombre_usuario = SPnombre_usuario or correo = SPnombre_usuario  and pass= sha2(SPPASS, 256);
END CASE;

END//

Delimiter //
CREATE PROCEDURE PUBLICAR(IN SELECCION INT, IN SPid_identificador INT,  IN SPombre_articulo VARCHAR(80), IN SPdescripcion VARCHAR(300),
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
END //

Delimiter //
CREATE PROCEDURE ACTUALIZAR_ARTICULO_BORRADOR (IN CASES INT, IN SELECCION INT, IN SPid_identificador INT,  IN SPombre_articulo VARCHAR(80), 
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
END //

Delimiter //
CREATE PROCEDURE BORRAR (IN ESTE INT, IN IDENTIFICADOR INT )
BEGIN
CASE
WHEN ESTE=0 THEN
DELETE FROM BORRADOR WHERE id_borrador= IDENTIFICADOR;
WHEN ESTE=1 THEN
DELETE FROM ARTICULO WHERE id_articulo= IDENTIFICADOR;
END CASE;
END //

DELIMITER //
CREATE PROCEDURE COMENTARIO (IN SPid_articulo INT, IN SPid_usuario INT, IN SPopinion VARCHAR(100),valoracion int)
BEGIN



INSERT INTO COMENTARIO (id_articulo, id_usuario, fecha, valoracion, opinion) VALUE (SPid_articulo, SPid_usuario, NOW(), valoracion, SPopinion);

END//


DELIMITER //
CREATE PROCEDURE VALORACION  (IN SPid_articulo INT, IN SPid_usuario INT, IN SPvaloracion INT(3))
BEGIN
UPDATE COMENTARIO 
SET valoracion = (valoracion+SPvaloracion)
WHERE id_articulo=SPid_articulo and id_usuario=SPid_usuario;
END//

DELIMITER //
CREATE TRIGGER LIMITE_VALORACION
BEFORE  UPDATE ON VALORACION
FOR EACH ROW 
BEGIN
IF (OLD.valoracion+NEW.valoracion>=100)
THEN
SET New.valoracion=100;
ELSE
SET NEW.valoracion= (OLD.valoracion+ New.valoracion);
END IF;

IF (OLD.valoracion+NEW.valoracion<0)
THEN 
SET New.valoracion=0;
ELSE
SET NEW.valoracion= (OLD.valoracion+ New.valoracion);
END IF;

END //




DELIMITER //
CREATE PROCEDURE NUEVO_MENSAJE(IN SPid_amigo INT, IN SPid_usuario INT,  IN SPCHAT VARCHAR (100))
BEGIN
INSERT INTO CHAT (id_amigo, id_usuario, CHAT, fecha) VALUE (SPid_amigo, SPid_usuario, SPCHAT, DATE(NOW()));
END //


DELIMITER $$
CREATE PROCEDURE VER_MENSAJES(idUsuario INT, idAmigo INT)
BEGIN
	SELECT id_amigo, id_usuario, CHAT, fecha FROM chat WHERE (id_amigo = idAmigo AND id_usuario = idUsuario) OR (id_amigo = idUsuario AND id_usuario = idAmigo);
END;
$$

/* lISTAS DE BUSQUEDA */ 
DELIMITER //
CREATE PROCEDURE NUEVO_AMIGO( IN SELECCION INT, IN SPid_usuario INT)
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
END //


/* NUEVO SP PARA AGREGAR A AMIGOS */

DELIMITER %%
CREATE PROCEDURE AGREGAR_AMIGO(idUsuario INT, idAmigo INT)
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
END;
%%

DELIMITER %%
CREATE PROCEDURE SON_AMIGOS(idUsuario INT, idAmigo INT)
BEGIN
	SELECT COUNT(*) AS amigor FROM amigos WHERE id_amigo = idUsuario AND id_usuario = idAmigo;
END;
%%


DELIMITER %%
CREATE PROCEDURE VER_AMIGOS(idUsuario INT)
BEGIN
	SELECT amigos.id_amigo, usuario.nombre_usuario FROM amigos JOIN usuario ON usuario.id_usuario = amigos.id_amigo WHERE amigos.id_usuario=idUsuario;
END;
%%

DELIMITER %%
CREATE PROCEDURE ELIMINAR_AMIGO(idUsuario INT, idAmigo INT)
BEGIN
	DECLARE idDelete1 INT;
    DECLARE idDelete2 INT;
	SELECT id INTO idDelete1 FROM amigos WHERE id_usuario = idUsuario AND id_amigo=idAmigo;
    SELECT id INTO idDelete2  FROM amigos WHERE id_usuario = idAmigo AND id_amigo= idUsuario;
    
    DELETE FROM amigos WHERE id=idDelete1;
      DELETE FROM amigos WHERE id=idDelete2;
END;
%%



DELIMITER //
CREATE PROCEDURE MOSTRAR_BORRADOR (IN SPid_usuario INT)
BEGIN
SELECT id_borrador, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM BORRADOR
WHERE id_usuario=SPid_usuario AND publicado = 0 order by fecha desc;
END //

DELIMITER //
CREATE PROCEDURE BUSQUEDA_ARTICULOS (IN SELECCION INT,IN SPid_cuestionamiento varchar(300))
BEGIN
CASE

WHEN SELECCION =0 THEN
SELECT id_articulo, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM ARTICULO
order by fecha;

WHEN SELECCION =1 THEN
SELECT id_articulo, nombre_articulo, descripcion, fecha,video, img1, img2,img3 FROM ARTICULO
WHERE nombre_articulo LIKE CONCAT ('%',SPid_cuestionamiento,'%') order by fecha;


END CASE;
END //

Delimiter //
CREATE PROCEDURE MOSTRAR_COMENTARIO (IN SPid_articulo INT)
BEGIN
-- SELECT USUARIO.imagen_avatar, USUARIO.nombre_usuario, Comentario.opinion,COMENTARIO.fecha from Comentario 
-- INNER JOIN Articulo ON Comentario.id_comentario= Articulo.id_comentario
-- INNER JOIN USUARIO ON Articulo.id_usuario = USUARIO.id_usuario
-- where ARTICULO.id_articulo= SPid_usuario order by COMENTARIO.Fecha DESC;
SELECT C.fecha, C.opinion, U.nombre_usuario, U.id_usuario, C.valoracion	
FROM comentario C 
JOIN usuario U ON C.id_usuario = U.id_usuario
WHERE C.id_articulo = SPid_articulo;

END//


DELIMITER !!
CREATE PROCEDURE VER_IMAGEN(tipo int, id int)
BEGIN
	CASE
		WHEN tipo = 1 THEN
			SELECT imagen_avatar FROM usuario WHERE id_usuario = id;
        WHEN tipo = 2 THEN
			SELECT imagen_portada FROM usuario WHERE id_usuario = id;
    END CASE;
END
!!

Call registro ("Nombre","apellido", "123", "usuario", "correo", "234", "calle1", "calle2", "pais", "estado", "ciudad", "68348");
call LOGIN (0, "correo", "234");
select*from DIRECCION WHERE codigo_postal like CONCAT ('%', 8,'%');

/*

nombre_articulo VARCHAR(80) NOT NULL,
descripcion VARCHAR(300) NOT NULL,
fecha DATE NOT NULL,
video BLOB NOT NULL,
img1 BLOB NOT NULL,
img2 BLOB NOT NULL,
img3 BLOB NOT NULL,
*/ 
