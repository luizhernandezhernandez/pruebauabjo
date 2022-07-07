DROP TABLE IF EXISTS asignaciones;

CREATE TABLE `asignaciones` (
  `idAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idTurno` int(11) NOT NULL,
  `idHorario` int(11) NOT NULL,
  `Estado` varchar(11) NOT NULL,
  `NumeroAsignacion` int(11) NOT NULL,
  PRIMARY KEY (`idAsignacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idAsignatura` (`idAsignatura`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idTurno` (`idTurno`),
  KEY `idHorario` (`idHorario`),
  CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`),
  CONSTRAINT `asignaciones_ibfk_4` FOREIGN KEY (`idTurno`) REFERENCES `turnos` (`idTurno`),
  CONSTRAINT `asignaciones_ibfk_5` FOREIGN KEY (`idHorario`) REFERENCES `horarios` (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO asignaciones VALUES("1","asignación 1","1","1","2","1","1","1","1");
INSERT INTO asignaciones VALUES("2","asignación 2 con eñe","2","2","3","2","2","1","2");


DROP TABLE IF EXISTS asignaturas;

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAsignatura` varchar(50) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `idGrupo` int(11) NOT NULL,
  `idSemestre` int(11) NOT NULL,
  PRIMARY KEY (`idAsignatura`),
  KEY `idCarrera` (`idCarrera`),
  KEY `idGrupo` (`idGrupo`),
  KEY `idSemestre` (`idSemestre`),
  CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`),
  CONSTRAINT `asignaturas_ibfk_2` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`),
  CONSTRAINT `asignaturas_ibfk_3` FOREIGN KEY (`idSemestre`) REFERENCES `semestres` (`idSemestre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO asignaturas VALUES("1","asignatura 1","1","2","1");
INSERT INTO asignaturas VALUES("2","asignatura 2 con eñe","2","3","2");


DROP TABLE IF EXISTS año_academico;

CREATE TABLE `año_academico` (
  `idAñoAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAño` varchar(50) NOT NULL,
  PRIMARY KEY (`idAñoAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO año_academico VALUES("1","año 1");
INSERT INTO año_academico VALUES("4","año 2 con eñe");


DROP TABLE IF EXISTS carreras;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(50) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO carreras VALUES("1","carrera 1");
INSERT INTO carreras VALUES("2","carrera 2 con eñe");
INSERT INTO carreras VALUES("3","prueba1o");


DROP TABLE IF EXISTS docentes;

CREATE TABLE `docentes` (
  `idDocente` int(11) NOT NULL AUTO_INCREMENT,
  `NombresDocente` varchar(50) NOT NULL,
  `ApellidosDocente` varchar(50) NOT NULL,
  `CedulaDocente` varchar(16) NOT NULL,
  `Alias` varchar(50) NOT NULL,
  `CorreoDocente` varchar(50) NOT NULL,
  `CelularDocente` varchar(12) NOT NULL,
  `TelefonoDocente` varchar(12) NOT NULL,
  `DireccionDocente` varchar(250) NOT NULL,
  `Estado` int(1) NOT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO docentes VALUES("1","docente 1","apellido docente ña","1234","prueba1","docente1@gmail.com","12345678910","12345678910","direccion ña del valle","1","images/fotos_perfil/dragon-kmstools.jpg");
INSERT INTO docentes VALUES("2","docente 2","apellido docente ña2","12345678910","","docnete2@gmail.com","00002","00002","carretera a Diaz Ordaz numero 20 Tlacolula de Matamoros\nseccion septima","1","images/fotos_perfil/perfil.jpg");


DROP TABLE IF EXISTS entrega_tareas;

CREATE TABLE `entrega_tareas` (
  `idEntregaTareas` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoTareaDocente` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `CodigoEnvioTarea` int(11) NOT NULL,
  `Archivo` varchar(200) NOT NULL,
  `FechaEntrega` date DEFAULT NULL,
  PRIMARY KEY (`idEntregaTareas`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `entrega_tareas_ibfk_1` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`),
  CONSTRAINT `entrega_tareas_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO entrega_tareas VALUES("1","1","1","1","descripccion de mi tarea","368972","Grupo Bimbo.pdf","2021-11-17");
INSERT INTO entrega_tareas VALUES("2","1","1","1","s","187808","NORMAS-DE-PRESENTACION-TRAB-PROF2011-1.pdf","2021-11-20");


DROP TABLE IF EXISTS estudiantes;

CREATE TABLE `estudiantes` (
  `idEstudiante` int(11) NOT NULL AUTO_INCREMENT,
  `CarnetEstudiante` varchar(10) NOT NULL,
  `NombresEstudiante` varchar(50) NOT NULL,
  `ApellidosEstudiante` varchar(50) NOT NULL,
  `CedulaEstudiante` varchar(16) NOT NULL,
  `Alias` varchar(50) NOT NULL,
  `CorreoEstudiante` varchar(50) NOT NULL,
  `CelularEstudiante` varchar(12) NOT NULL,
  `TelefonoEstudiante` varchar(12) NOT NULL,
  `DireccionEstudiante` varchar(250) NOT NULL,
  `Estado` int(1) NOT NULL,
  `idGrupo` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`),
  KEY `idGrupo` (`idGrupo`),
  CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`idGrupo`) REFERENCES `grupos` (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO estudiantes VALUES("1","16920360","estudiante 1 estudiantñ 1","apellido estudiantñ1","12345678","prueba","estudiante1@gmail.com","0000001","0000001","direccion estudiantñ 1 numero 1","1","2","images/fotos_perfil/login-square-arrow-button-outline_icon-icons.com_73220 (1).png");
INSERT INTO estudiantes VALUES("2","2","estudiante2","apellido estudiante2","1234","","estudiante2@gmail.com","00002","00002","direccion 2","1","3","images/fotos_perfil/perfil.jpg");


DROP TABLE IF EXISTS evaluaciones;

CREATE TABLE `evaluaciones` (
  `idEvaluacion` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `Puntaje` int(11) NOT NULL,
  `FechaEvaluacion` date NOT NULL,
  PRIMARY KEY (`idEvaluacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idEstudiante` (`idEstudiante`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `evaluaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `evaluaciones_ibfk_2` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`),
  CONSTRAINT `evaluaciones_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

INSERT INTO evaluaciones VALUES("1","descripcion de evaluacion 1","1","1","22","tarea1","1","100","2021-11-17");
INSERT INTO evaluaciones VALUES("7","ovservacion de evaluacion 2 con eñe","1","1","unidad2","tarea2","1","100","2021-11-17");
INSERT INTO evaluaciones VALUES("8","{","1","1","1","n","1","7","2021-11-20");


DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO grupos VALUES("2","1","grupo 1");
INSERT INTO grupos VALUES("3","2","grupo 2");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreHorario` varchar(50) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO horarios VALUES("1","horario 1");
INSERT INTO horarios VALUES("2","horario 2 con eñe");


DROP TABLE IF EXISTS inscripciones_asignaturas;

CREATE TABLE `inscripciones_asignaturas` (
  `idInscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `idCarrera` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `idEstudiante` int(11) NOT NULL,
  `fechaInscripcion` date NOT NULL,
  `observaciones` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`idInscripcion`),
  KEY `idCarrera` (`idCarrera`),
  KEY `idAsignatura` (`idAsignatura`),
  KEY `idEstudiante` (`idEstudiante`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_2` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`),
  CONSTRAINT `inscripciones_asignaturas_ibfk_3` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiantes` (`idEstudiante`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO inscripciones_asignaturas VALUES("4","1","1","1","2021-11-17","observacion de inscripcion de asignatura1");
INSERT INTO inscripciones_asignaturas VALUES("5","2","2","1","2021-11-17","observacion de inscripcion de asignatura 2 con eñe");
INSERT INTO inscripciones_asignaturas VALUES("11","1","1","2","2021-11-19","uio");
INSERT INTO inscripciones_asignaturas VALUES("12","1","1","1","2021-11-19","X");
INSERT INTO inscripciones_asignaturas VALUES("13","1","1","1","2021-11-19","RGTHY");


DROP TABLE IF EXISTS material_didactico;

CREATE TABLE `material_didactico` (
  `idMaterialDidactico` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(200) NOT NULL,
  `Archivo` varchar(200) NOT NULL,
  `CodigoMaterial` int(11) NOT NULL,
  `Fecha_subida` date DEFAULT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  PRIMARY KEY (`idMaterialDidactico`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idDocente` (`idDocente`),
  CONSTRAINT `material_didactico_ibfk_1` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`),
  CONSTRAINT `material_didactico_ibfk_2` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO material_didactico VALUES("1","descripccion materia didactico 1","Aplicacion-1.pdf","548760","2021-11-17","3","1");
INSERT INTO material_didactico VALUES("2","ropa","Estructura-Reporte-Preliminar.pdf","265376","2021-11-19","2","1");
INSERT INTO material_didactico VALUES("3","9","Estructura-Reporte-Preliminar.pdf","461788","2021-11-19","3","1");


DROP TABLE IF EXISTS niveles;

CREATE TABLE `niveles` (
  `idNivel` int(11) NOT NULL AUTO_INCREMENT,
  `NombreNivel` varchar(50) NOT NULL,
  PRIMARY KEY (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO niveles VALUES("1","Administrador");
INSERT INTO niveles VALUES("2","Docente");
INSERT INTO niveles VALUES("3","Estudiante");


DROP TABLE IF EXISTS numeros_asignaciones;

CREATE TABLE `numeros_asignaciones` (
  `idNumeroAsignacion` int(11) NOT NULL AUTO_INCREMENT,
  `numeroAsignado` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  PRIMARY KEY (`idNumeroAsignacion`),
  KEY `idDocente` (`idDocente`),
  CONSTRAINT `numeros_asignaciones_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO numeros_asignaciones VALUES("2","2","2");
INSERT INTO numeros_asignaciones VALUES("3","1","1");


DROP TABLE IF EXISTS plan_estudio;

CREATE TABLE `plan_estudio` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `CantidadAsignaturas` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `idCarrera` (`idCarrera`),
  CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO plan_estudio VALUES("1","plan de estudio 1","1","1");
INSERT INTO plan_estudio VALUES("3","plan de estudio 2 con eñe","2","22");


DROP TABLE IF EXISTS planificacion_tareas;

CREATE TABLE `planificacion_tareas` (
  `idPlanificacion` int(11) NOT NULL AUTO_INCREMENT,
  `idDocente` int(11) NOT NULL,
  `idNumeroAsignacion` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `Unidad` varchar(50) NOT NULL,
  `DescripcionUnidad` varchar(200) NOT NULL,
  `Tarea` varchar(50) NOT NULL,
  `DescripcionTarea` varchar(200) NOT NULL,
  `FechaPublicacion` date NOT NULL,
  `FechaPresentacion` date NOT NULL,
  `CodigoTarea` int(11) NOT NULL,
  PRIMARY KEY (`idPlanificacion`),
  KEY `idDocente` (`idDocente`),
  KEY `idNumeroAsignacion` (`idNumeroAsignacion`),
  KEY `idAsignatura` (`idAsignatura`),
  CONSTRAINT `planificacion_tareas_ibfk_1` FOREIGN KEY (`idDocente`) REFERENCES `docentes` (`idDocente`),
  CONSTRAINT `planificacion_tareas_ibfk_2` FOREIGN KEY (`idNumeroAsignacion`) REFERENCES `numeros_asignaciones` (`idNumeroAsignacion`),
  CONSTRAINT `planificacion_tareas_ibfk_3` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

INSERT INTO planificacion_tareas VALUES("1","1","3","1","Unidad I","descripccion unidad 1","planificacion tarea1","descripccion tarea 1","2021-11-17","2021-11-17","1");
INSERT INTO planificacion_tareas VALUES("2","1","2","1","Unidad II","descripccion undad2","planificacion tarea2","descripccion tarea 2","2021-11-17","2021-11-17","2");
INSERT INTO planificacion_tareas VALUES("3","1","2","1","Unidad I","4","4","44","2021-11-19","2021-11-20","245");


DROP TABLE IF EXISTS semestres;

CREATE TABLE `semestres` (
  `idSemestre` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSemestre` varchar(50) NOT NULL,
  PRIMARY KEY (`idSemestre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO semestres VALUES("1","semestre 1");
INSERT INTO semestres VALUES("2","semestre 2 con eñe");


DROP TABLE IF EXISTS turnos;

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTurno` varchar(50) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO turnos VALUES("1","turno 1");
INSERT INTO turnos VALUES("2","turno 2 con eñe");


DROP TABLE IF EXISTS usuarios;

CREATE TABLE `usuarios` (
  `idUsuario` smallint(6) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(50) NOT NULL,
  `PassUsuario` varchar(150) NOT NULL,
  `Alias` varchar(50) NOT NULL,
  `NivelUsuario` int(11) NOT NULL,
  `Codigo` int(11) DEFAULT NULL,
  `Foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `NivelUsuario` (`NivelUsuario`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`NivelUsuario`) REFERENCES `niveles` (`idNivel`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios VALUES("1","admin","123456","admin","1","1","images/fotos_perfil/INSTRUCTIVO DVD.jpg");
INSERT INTO usuarios VALUES("2","estudiante1@gmail.com","12345678","prueba","3","1","images/fotos_perfil/INSTRUCTIVO DVD.jpg");
INSERT INTO usuarios VALUES("3","estudiante2@gmail.com","1234","","3","2","");
INSERT INTO usuarios VALUES("4","docente1@gmail.com","1234","prueba1","2","1","images/fotos_perfil/INSTRUCTIVO DVD.jpg");
INSERT INTO usuarios VALUES("5","docnete2@gmail.com","12345678910","","2","2","");


