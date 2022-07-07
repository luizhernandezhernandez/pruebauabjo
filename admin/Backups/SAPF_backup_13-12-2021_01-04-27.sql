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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS año_academico;

CREATE TABLE `año_academico` (
  `idAñoAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAño` varchar(50) NOT NULL,
  PRIMARY KEY (`idAñoAcademico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS carreras;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(50) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO docentes VALUES("4","docente1","apellidod1","1234","docente01","docente1@gmail.com","00001","00001","direcciond1","1","images/fotos_perfil/perfil.jpg");


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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

INSERT INTO estudiantes VALUES("1","01","estudiante1","apellidoe1","12345","estudiante01","estudiante1@gmail.com","00001","00001","direccione1","1","1","images/fotos_perfil/perfil.jpg");


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO grupos VALUES("1","1","grupo 1");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreHorario` varchar(50) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO material_didactico VALUES("1","w","paulofreire5.pdf","267409","2021-12-10","1","4");


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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

INSERT INTO numeros_asignaciones VALUES("1","1","4");


DROP TABLE IF EXISTS plan_estudio;

CREATE TABLE `plan_estudio` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `CantidadAsignaturas` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `idCarrera` (`idCarrera`),
  CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS semestres;

CREATE TABLE `semestres` (
  `idSemestre` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSemestre` varchar(50) NOT NULL,
  PRIMARY KEY (`idSemestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



DROP TABLE IF EXISTS turnos;

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTurno` varchar(50) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios VALUES("1","admin","123456","admin","1","1","images/fotos_perfil/perfil.jpg");
INSERT INTO usuarios VALUES("4","docente1@gmail.com","1234","docente01","2","4","");
INSERT INTO usuarios VALUES("5","estudiante1@gmail.com","12345","estudiante01","3","1","");


