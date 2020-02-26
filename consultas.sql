use ingsof;
DROP PROCEDURE insertar_academicos;
drop procedure remplazar_decano;
DROP PROCEDURE insertar_departamento;
DROP PROCEDURE insertar_institucion;
DROP PROCEDURE insertar_facultad;
DROP PROCEDURE insertar_sede;
DROP PROCEDURE insertar_decano;
DROP PROCEDURE insertar_comision;

DELIMITER //
CREATE PROCEDURE insertar_academicos(
   IN Id_Departamento int(11),
   IN Id_Institucion int(11),
   IN Rut int(11),
   IN Nombre1 varchar(45),
   IN Nombre2 varchar(45),
   IN Apellido1 varchar(45),
   IN Apellido2 varchar(45),
   IN Titulo_Profesional varchar(45),
   IN Grado_Academico varchar(45),
   IN Categoria varchar(45),
   IN Horas_Contrato varchar(45),
   IN Tipo_Planta varchar(45),
   IN Estado varchar(45))
BEGIN
   INSERT INTO academico(id_departamento, id_institucion, rut, nombre1, nombre2, apellido1, apellido2, titulo_profesional, grado_academico, categoria, horas_contrato, tipo_planta, estado)
   VALUES (id_departamento, id_institucion, rut, nombre1, nombre2, apellido1, apellido2, titulo_profesional, grado_academico, categoria, horas_contrato, tipo_planta, estado);
   COMMIT;
END //

DELIMITER //
CREATE PROCEDURE insertar_departamento(
   IN Id_Institucion int(11),
   IN nombre_departamento varchar(45),
   IN estado varchar(45))
BEGIN
   INSERT INTO departamento(Id_Institucion, nombre_departamento, estado) VALUES (Id_Institucion, nombre_departamento, estado);
   COMMIT;
END //

DELIMITER //
CREATE PROCEDURE insertar_institucion(
   IN Id_sede int(11),
   IN Id_facultad int(11))
BEGIN
   INSERT INTO institucion(Id_sede, Id_facultad) VALUES (Id_sede, Id_facultad);
   COMMIT;
END //

DELIMITER //
CREATE PROCEDURE insertar_sede(
   IN nombre_sede varchar(45))
BEGIN
   INSERT INTO sede(nombre_sede) VALUES (nombre_sede);
   COMMIT;
END //

DELIMITER //
CREATE PROCEDURE insertar_facultad(
   IN Rut_decano varchar(45),
   IN nombre_facultad varchar(45),
   IN estado varchar(45))
BEGIN
   INSERT INTO facultad(Rut_decano, nombre_facultad, estado) VALUES (Rut_decano, nombre_facultad, estado);
   COMMIT;
END //

DROP PROCEDURE borrar_facultad;
DELIMITER //
CREATE PROCEDURE borrar_facultad(
	IN nombre_facultad_1 varchar(45))
BEGIN
	DELETE FROM facultad WHERE nombre_facultad = nombre_facultad_1;
	COMMIT;
END //

DELIMITER //
CREATE PROCEDURE insertar_decano(
	IN Rut_decano int(11),
    IN nombre1 varchar(45),
    IN nombre2 varchar(45),
    IN apellido1 varchar(45),
    IN apellido2 varchar(45))
BEGIN
	INSERT INTO decano VALUES(Rut_decano, nombre1, nombre2, apellido1, apellido2);
    COMMIT;
END //

DROP PROCEDURE insertar_secretaria;
DELIMITER //
CREATE PROCEDURE insertar_secretaria(
	IN Rut int(11),
    IN id_institucion int(11),
    IN nombre1 varchar(45),
    IN nombre2 varchar(45),
    IN apellido1 varchar(45),
    IN apellido2 varchar(45),
    IN contrasenia varchar(45),
    IN estado varchar(45),
    IN correo varchar(45),
    IN Es_De_Facultad varchar(45))
BEGIN
	insert into secretaria(Rut, id_institucion, nombre1, nombre2, apellido1, apellido2, contrasenia, estado, correo, Es_De_Facultad)
    values(Rut, id_institucion, nombre1, nombre2, apellido1, apellido2, contrasenia, estado, correo, Es_De_Facultad);
    commit;
END//

DROP PROCEDURE borrar_secretaria;
DELIMITER //
CREATE PROCEDURE borrar_secretaria(
	IN rut_1 int(11))
BEGIN
	DELETE FROM secretaria WHERE rut = rut_1;
	COMMIT;
END //
	

DELIMITER //
CREATE PROCEDURE insertar_comision(
	IN Rut_decano int(11),
    IN Int_1_Nom1 varchar(45),
    IN Int_1_Nom2 varchar(45),
    IN Int_1_ap1 varchar(45),
    IN Int_1_ap2 varchar(45),
    IN Int_2_Nom1 varchar(45),
    IN Int_2_Nom2 varchar(45),
    IN Int_2_ap1 varchar(45),
	IN Int_2_ap2 varchar(45),
    IN anio int(11),
    IN fecha int(11)
)BEGIN
	IF(anio>2018) then
		insert into comision(Rut_decano, Int_1_Nom1, Int_1_Nom2,Int_1_ap1, Int_1_ap2, Int_2_Nom1, Int_2_Nom2, Int_2_ap1, Int_2_ap2, anio,fecha) 
		values(Rut_decano, Int_1_Nom1, Int_1_Nom2,Int_1_ap1, Int_1_ap2, Int_2_Nom1, Int_2_Nom2, Int_2_ap1, Int_2_ap2, anio,fecha );
		commit;
	Else
		signal SQLSTATE '42000' set MESSAGE_text= ' Te equivocaste!';
        Rollback;
	END if;
END//

DELIMITER //
CREATE PROCEDURE insertar_activades( IN actividad varchar(45))
Begin
	insert into actividades(actividad) values (actividad);
    commit;
END //

DELIMITER //
CREATE PROCEDURE insertar_pautas_firmas( 
	IN Id_Pauta int(11),
    IN Id_Firma int(11),
    IN Direccion_firma varchar(40))
Begin
	insert into pauta_firma values (Id_Pauta,Id_Firma, Direccion_firma);
    commit;
END //

DELIMITER //
CREATE PROCEDURE insertar_pautas_evaluacion( 
	IN Id_Pauta int(11),
    IN Id_actividades int(11),
    IN calificacion int(11),
    IN Tiempo_asignado int(11),
    IN ponderacion int(11),
    IN observacion varchar(40))
Begin
	insert into pauta_evaluacion values (Id_Pauta,Id_actividades, Direccion_firma, calificacion,Tiempo_asignado, ponderacion, observacion);
    commit;
END //

DELIMITER //
CREATE PROCEDURE insertar_pautas_academicos( 
	IN Id_Pauta int(11),
    IN Id_academico int(11),
    IN id_institucion int(11),
    IN Id_secretaria int(11),
    IN calificacion_final int(11),
    IN fecha_evaluacion int(11),
    IN Id_comision int(11),
    IN observacion varchar(40))
Begin
	insert into pauta_evaluacion values (Id_Pauta,Id_academico, Direccion_firma, id_institucion,Id_secretaria, calificacion_final, fecha_evaluacion, Id_comision, observacion);
    commit;
END //

DELIMITER //
CREATE PROCEDURE remplazar_decano(
	IN Rut_decano1 int(11),
    IN Rut_decano_nuevo int(11),
    IN nombre1n varchar(45),
    IN nombre2n varchar(45),
    IN apellido1n varchar(45),
    IN apellido2n varchar(45))
BEGIN
	CALL insertar_decano(Rut_decano_nuevo, nombre1n, nombre2n, apellido1n, apellido2n);
    UPDATE facultad SET Rut_decano = Rut_decano_nuevo where Rut_decano = Rut_decano1;
	DELETE FROM Decano WHERE Rut_decano= Rut_decano1;
    COMMIT;
END //


CALL insertar_comision(15000123,'a','a','a','a','a','a','a','a',2020,12);
CALL insertar_decano(15000123, 'WEON1','WEON1','WEON1','WEON1');
CALL insertar_decano(12345678, 'WEON2','WEON2','WEON1','WEON1');
call remplazar_decano(15000123,999999,'weon4','weon4','weon4','weon4');
CALL insertar_sede('Talca');
CALL insertar_facultad(999999, 'ingenieria', 'buenardo');
CALL insertar_institucion(1,1);
CALL insertar_departamento(1, 'oka2', 'buenardo');
CALL insertar_academicos(1, 1, 20123123, 'oka', 'oka','oka','oka', 'ingenierio','licenciado','inteligente', '44', 'de los pies', 'promovido a cliente');
CALL insertar_secretaria(183441119, 1, 'ella', 'es', 'una', 'secretaria', 'nosebro', 'estado', 'correo', 'ingenieria');
CALL insertar_secretaria(203452219, 1, 'ella1', 'es1', 'una1', 'secretaria1', 'nosebro1', 'estado1', 'correo1', 'ingenieria');
CALL borrar_secretaria(183441119);
CALL borrar_facultad('ingenieria');

select * From comision; 
select * from decano;
select * from sede;
select * from facultad;
select * from institucion;
select * from departamento;
select * from academico;
/*select * from secretaria;*/
