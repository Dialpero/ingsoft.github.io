DROP database ingsof;
CREATE database ingsof;
use ingsof;

CREATE TABLE `academico` (
  `Id_Academico` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Departamento` int(11) NOT NULL,
  `Id_Institucion` int(11) NOT NULL,
  `Rut` int(11) NOT NULL,
  `Nombre1` varchar(45) NOT NULL,
  `Nombre2` varchar(45) DEFAULT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  `Titulo_Profesional` varchar(45) NOT NULL,
  `Grado_Academico` varchar(45) NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  `Horas_Contrato` varchar(45) NOT NULL,
  `Tipo_Planta` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Academico`)
);

CREATE TABLE `actividades` (
  `Id_Actividades` int(11) NOT NULL AUTO_INCREMENT,
  `Actividad` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Actividades`)
);

CREATE TABLE `administrador` (
  `Id_Administrador` int(11) NOT NULL AUTO_INCREMENT,
  `Rut` int(11) NOT NULL,
  `Nombre1` varchar(45) NOT NULL,
  `Nombre2` varchar(45) DEFAULT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Administrador`)
);

CREATE TABLE `comision` (
  `Id_Comision` int(11) NOT NULL AUTO_INCREMENT,
  `Rut_decano` int(11) NOT NULL,
  `Int_1_Nom1` varchar(45) NOT NULL,
  `Int_1_Nom2` varchar(45) DEFAULT NULL,
  `Int_1_Ap1` varchar(45) NOT NULL,
  `Int_1_Ap2` varchar(45) DEFAULT NULL,
  `Int_2_Nom1` varchar(45) NOT NULL,
  `Int_2_Nom2` varchar(45) DEFAULT NULL,
  `Int_2_Ap1` varchar(45) NOT NULL,
  `Int_2_Ap2` varchar(45) DEFAULT NULL,
  `Anio` int(11) NOT NULL,
  `Fecha` int(11) NOT NULL,
  PRIMARY KEY (`Id_Comision`)
);

CREATE TABLE `decano` (
  `Rut_decano` int(11) NOT NULL,
  `Nombre1` varchar(45) NOT NULL,
  `Nombre2` varchar(45) DEFAULT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Rut_decano`)
);

CREATE TABLE `departamento` (
  `Id_Departamento` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Institucion` int(11) NOT NULL,
  `Nombre_Departamento` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Departamento`)
);

CREATE TABLE `facultad` (
  `Id_Facultad` int(11) NOT NULL AUTO_INCREMENT,
  `Rut_decano` int(11) NOT NULL,
  `Nombre_Facultad` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Facultad`)
);

CREATE TABLE `institucion` (
  `Id_Institucion` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Sede` int(11) NOT NULL,
  `Id_Facultad` int(11) NOT NULL,
  PRIMARY KEY (`Id_Institucion`,`Id_Sede`,`Id_Facultad`)
);

CREATE TABLE `pauta_academico` (
  `Id_Pauta` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Academico` int(11) NOT NULL,
  `Calificacion_Final` int(11) NOT NULL,
  `Fecha_Evaluacion` int(11) NOT NULL,
  `Id_Institucion` int(11) NOT NULL,
  `Id_Secretaria` int(11) NOT NULL,
  `Id_Comision` int(11) NOT NULL,
  `Observacion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id_Pauta`)
);

CREATE TABLE `pauta_evaluacion` (
  `Id_Pauta` int(11) NOT NULL,
  `Id_Actividades` int(11) NOT NULL,
  `Calificacion` int(11) NOT NULL,
  `Tiempo_Asignado` int(11) NOT NULL,
  `Ponderacion` int(11) NOT NULL,
  PRIMARY KEY (`Id_Pauta`,`Id_Actividades`)
);

CREATE TABLE `pauta_firma` (
  `Id_Pauta` int(11) NOT NULL,
  `Id_Firma` int(11) NOT NULL,
  `Direccion_Firma` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Pauta`,`Id_Firma`)
);

CREATE TABLE `secretaria` (
  `Id_Secretaria` int(11) NOT NULL AUTO_INCREMENT,
  `Rut` int(11) NOT NULL,
  `Id_Institucion` int(11) NOT NULL,
  `Nombre1` varchar(45) NOT NULL,
  `Nombre2` varchar(45) DEFAULT NULL,
  `Apellido1` varchar(45) NOT NULL,
  `Apellido2` varchar(45) DEFAULT NULL,
  `Contrasenia` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Correo` varchar(45) NOT NULL,
  `Es_De_Facultad` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Secretaria`)
);

CREATE TABLE `sede` (
  `Id_Sede` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Sede` varchar(45) NOT NULL,
  PRIMARY KEY (`Id_Sede`)
);

Alter table pauta_evaluacion add constraint FK1_pauta_evaluacion foreign key(Id_Pauta) references pauta_academico(Id_Pauta);
Alter table pauta_evaluacion add constraint FK2_pauta_evaluacion foreign key(Id_Actividades) references actividades(Id_Actividades);

Alter table pauta_academico add constraint FK1_pauta_academico foreign key(Id_Academico) references academico(Id_Academico);
Alter table pauta_academico add constraint FK2_pauta_academico foreign key(Id_Institucion) references institucion(Id_Institucion);
Alter table pauta_academico add constraint FK3_pauta_academico foreign key(Id_Secretaria) references secretaria(Id_Secretaria);
Alter table pauta_academico add constraint FK4_pauta_academico foreign key(Id_Comision) references comision(Id_Comision);

Alter table pauta_firma add constraint FK1_pauta_firma foreign key(Id_Pauta) references pauta_academico(Id_Pauta);

Alter table academico add constraint FK1_academico foreign key(Id_Departamento) references departamento(Id_Departamento);
Alter table academico add constraint FK2_academico foreign key(Id_Institucion) references institucion(Id_Institucion);

Alter table secretaria add constraint FK1_secretaria foreign key(Id_institucion) references institucion(Id_institucion);

Alter table comision add constraint FK1_comision foreign key(Rut_decano) references decano(Rut_decano);

Alter table facultad add constraint FK1_facultad foreign key(Rut_decano) references decano(Rut_decano);

Alter table institucion add constraint FK1_institucion foreign key(Id_Sede) references sede(Id_Sede);
Alter table institucion add constraint FK2_institucion foreign key(Id_Facultad) references facultad(Id_Facultad);

Alter table departamento add constraint FK1_departamento foreign key(Id_Institucion) references institucion(Id_Institucion);







