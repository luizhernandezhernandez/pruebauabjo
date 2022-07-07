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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO asignaciones VALUES("1","enfoque a poo","7","9","2","1","1","1","1");
INSERT INTO asignaciones VALUES("2","psicología a niños","8","11","3","1","2","1","2");
INSERT INTO asignaciones VALUES("3","administración de información ","9","10","3","1","3","1","3");
INSERT INTO asignaciones VALUES("4","despeje de x","10","12","4","2","4","1","4");
INSERT INTO asignaciones VALUES("5","enfoque a  terapia familiar","4","13","5","1","5","1","5");


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO asignaturas VALUES("9","Programación ","1","1","1");
INSERT INTO asignaturas VALUES("10","Administración de empresas ","2","3","2");
INSERT INTO asignaturas VALUES("11","psicología ","3","1","3");
INSERT INTO asignaturas VALUES("12","calculo diferencial ","4","5","4");
INSERT INTO asignaturas VALUES("13","psicología 2","5","1","5");


DROP TABLE IF EXISTS año_academico;

CREATE TABLE `año_academico` (
  `idAñoAcademico` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAño` varchar(50) NOT NULL,
  PRIMARY KEY (`idAñoAcademico`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO año_academico VALUES("1","2021-2022");
INSERT INTO año_academico VALUES("2","2022-2023");
INSERT INTO año_academico VALUES("3","2023-2024");
INSERT INTO año_academico VALUES("4","2024-2025");
INSERT INTO año_academico VALUES("5","2025-2026");


DROP TABLE IF EXISTS carreras;

CREATE TABLE `carreras` (
  `idCarrera` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCarrera` varchar(50) NOT NULL,
  PRIMARY KEY (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO carreras VALUES("1","Informática ");
INSERT INTO carreras VALUES("2","Administración ");
INSERT INTO carreras VALUES("3","Maestría en ciencias de la educación");
INSERT INTO carreras VALUES("4","Bachillerato general ");
INSERT INTO carreras VALUES("5","doctorado en educación ");


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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

INSERT INTO docentes VALUES("4","docente1","apellidod1","1234","docente01","docente1@gmail.com","00001","00001","direcciond1","1","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("7","Rodrigo ","Pérez Hernández","1234","rodri","rodri@gmail.com","954123456","954123456","centro Oaxaca","1","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("8","José ","Hernández","12345","jos","jos@gmail.com","95212345678","95212345678","Santa Rosa","1","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("9","Joel ","Hernández Sánchez","123456","joelsito","joel@gmail.com","94112345678","94112345678","Santa Lucia","1","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("10","adrián ","Martínez Martínez","123456","adri","adri@gmail.com","95412345678","95412345678","el tule Oaxaca","1","images/fotos_perfil/perfil.jpg");
INSERT INTO docentes VALUES("11","Fernando","Gonzales rodrigues","1234567","fer","fer@gmail.com","95512345678","95512345678","Mixcoac México ","1","images/fotos_perfil/perfil.jpg");


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO entrega_tareas VALUES("1","4","5","9","esta es  una descripción de prueba ","697641","Grupo Bimbo.pdf","2021-12-14");
INSERT INTO entrega_tareas VALUES("2","4","5","9","w","878257","Grupo Bimbo-bueno2.pdf","2021-12-14");
INSERT INTO entrega_tareas VALUES("3","4","5","9","esta es mi tarea numero 3","607560","BIMBO.docx","2021-12-14");
INSERT INTO entrega_tareas VALUES("4","4","5","9","esta es mi tarea 4","797128","A1-U2-16920360.docx","2021-12-14");
INSERT INTO entrega_tareas VALUES("5","4","5","13","HOLA","199546","DESARROLLO.pdf","2021-12-18");


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO estudiantes VALUES("5","16920370","Germain","Agudo Juárez","1234","Germa","germain@gmail.com","9512345678","9512345678","Xoxocotlán Oaxaca","1","1","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("6","12345","neftali","López Antonio","12345","nefta","neftali@gmail.com","951333235","951333235","Zaachila Oaxaca","1","2","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("7","745390","Néstor Uziel","García López","123456","neto","neto@gmail.com","9514356745","9514356745","Independencia N.403","1","3","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("8","984928","Rafael","Caballero Bolaños","1234567","chino","rafael@gmail.com","9514776439","9514776439","Las Culturas N.264","1","4","images/fotos_perfil/perfil.jpg");
INSERT INTO estudiantes VALUES("9","16920355","Reyna ","López Antonio","12345678","yu","reyna@gmail.com","951612345678","951612345678","Benito Juárez N8","1","5","images/fotos_perfil/perfil.jpg");


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO evaluaciones VALUES("1","esta es una observación de prueba ","5","13","tarea2","tarea1","4","5","2021-12-21");
INSERT INTO evaluaciones VALUES("2","rtttt","9","13","unidad2","prueab","4","10","2021-12-21");


DROP TABLE IF EXISTS grupos;

CREATE TABLE `grupos` (
  `idGrupo` int(11) NOT NULL AUTO_INCREMENT,
  `NumeroGrupo` varchar(50) NOT NULL,
  `NombreGrupo` varchar(50) NOT NULL,
  PRIMARY KEY (`idGrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO grupos VALUES("1","1","grupo 1");
INSERT INTO grupos VALUES("2","2","grupo A");
INSERT INTO grupos VALUES("3","3","Grupo B");
INSERT INTO grupos VALUES("4","4","Grupo C");
INSERT INTO grupos VALUES("5","5","Grupo D");


DROP TABLE IF EXISTS horarios;

CREATE TABLE `horarios` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreHorario` varchar(50) NOT NULL,
  PRIMARY KEY (`idHorario`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO horarios VALUES("1","07 am a 09 am");
INSERT INTO horarios VALUES("2","90 am a 11 am");
INSERT INTO horarios VALUES("3","11 am a 01 pm");
INSERT INTO horarios VALUES("4","01 pm a 03 pm ");
INSERT INTO horarios VALUES("5","08 am a 10 am");


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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

INSERT INTO inscripciones_asignaturas VALUES("1","1","9","5","2021-12-14","esta asignatura es de programación ");
INSERT INTO inscripciones_asignaturas VALUES("2","2","10","6","2021-12-14","aquí podrá aprender sobre empresas");
INSERT INTO inscripciones_asignaturas VALUES("3","3","11","7","2021-12-14","esta asignatura es para aprender psicología");
INSERT INTO inscripciones_asignaturas VALUES("4","4","12","8","2021-12-14","aprenderá a calcular funciones y más ");
INSERT INTO inscripciones_asignaturas VALUES("5","5","13","9","2021-12-14","continuación de psicología 1");
INSERT INTO inscripciones_asignaturas VALUES("8","1","9","5","2021-12-14","nuevo");
INSERT INTO inscripciones_asignaturas VALUES("9","1","13","5","2021-12-14","nuevo");


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO material_didactico VALUES("1","w","paulofreire5.pdf","267409","2021-12-10","1","4");
INSERT INTO material_didactico VALUES("2","","Aplicacion-1.pdf","896490","2021-12-14","1","4");
INSERT INTO material_didactico VALUES("3","","U4T11_Hernandez_hernandez _Luis.pdf","804675","2021-12-14","1","4");
INSERT INTO material_didactico VALUES("4","","aplicaciones moviles,web,nagivas.pdf","24594","2021-12-14","1","4");
INSERT INTO material_didactico VALUES("5","DESCRIPCIÓN","BIMBO.docx","524042","2021-12-15","1","4");


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

INSERT INTO numeros_asignaciones VALUES("1","1002","4");
INSERT INTO numeros_asignaciones VALUES("2","2","7");
INSERT INTO numeros_asignaciones VALUES("3","3","8");
INSERT INTO numeros_asignaciones VALUES("4","4","9");
INSERT INTO numeros_asignaciones VALUES("5","5","10");
INSERT INTO numeros_asignaciones VALUES("6","6","11");


DROP TABLE IF EXISTS plan_estudio;

CREATE TABLE `plan_estudio` (
  `idPlan` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  `idCarrera` int(11) NOT NULL,
  `CantidadAsignaturas` int(11) NOT NULL,
  PRIMARY KEY (`idPlan`),
  KEY `idCarrera` (`idCarrera`),
  CONSTRAINT `plan_estudio_ibfk_1` FOREIGN KEY (`idCarrera`) REFERENCES `carreras` (`idCarrera`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO plan_estudio VALUES("1","plan 2021-2022","1","1");
INSERT INTO plan_estudio VALUES("2","2021-2022","2","2");
INSERT INTO plan_estudio VALUES("3","enfoque a 2020 2021","3","3");
INSERT INTO plan_estudio VALUES("4","plan de estudio cbtis","4","4");
INSERT INTO plan_estudio VALUES("5","plan 2021-2022","5","5");


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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO planificacion_tareas VALUES("1","4","1","13","Unidad I","esta es la primera unidad ","tarea1","esta es la tarea 1","2021-12-14","2021-12-14","3");
INSERT INTO planificacion_tareas VALUES("2","4","1","13","Unidad I","planificación de la unidad 2","tarea2","esta es la tarea 2","2021-12-15","2021-12-14","1");
INSERT INTO planificacion_tareas VALUES("3","4","1","13","Unidad III","planificación de la unidad 3","tarea3","esta es la tarea 2\n","2021-12-16","2021-12-14","2");
INSERT INTO planificacion_tareas VALUES("4","4","1","13","Unidad IV","planificación de la unidad 4","tarea4","esta es la tarea 4\n","2021-12-14","2021-12-14","4");
INSERT INTO planificacion_tareas VALUES("5","4","1","13","Unidad V","planificación de la unidad 5","tarea5","esta es la tarea 2","2021-12-14","2021-12-14","5");


DROP TABLE IF EXISTS semestres;

CREATE TABLE `semestres` (
  `idSemestre` int(11) NOT NULL AUTO_INCREMENT,
  `NombreSemestre` varchar(50) NOT NULL,
  PRIMARY KEY (`idSemestre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

INSERT INTO semestres VALUES("1","primer semestre");
INSERT INTO semestres VALUES("2","segundo semestre");
INSERT INTO semestres VALUES("3","tercer semestre");
INSERT INTO semestres VALUES("4","cuarto semestre");
INSERT INTO semestres VALUES("5","quinto semestre");


DROP TABLE IF EXISTS turnos;

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL AUTO_INCREMENT,
  `NombreTurno` varchar(50) NOT NULL,
  PRIMARY KEY (`idTurno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO turnos VALUES("1","matutino");
INSERT INTO turnos VALUES("2","vespertino ");


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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;

INSERT INTO usuarios VALUES("1","admin","123456","admin","1","1","images/fotos_perfil/images.jpg");
INSERT INTO usuarios VALUES("4","docente1@gmail.com","1234","docente01","2","4","");
INSERT INTO usuarios VALUES("11","germain@gmail.com","1234","Germa","3","5","");
INSERT INTO usuarios VALUES("12","neftali@gmail.com","12345","nefta","3","6","");
INSERT INTO usuarios VALUES("13","rodri@gmail.com","1234","rodri","2","7","");
INSERT INTO usuarios VALUES("14","jos@gmail.com","12345","jos","2","8","");
INSERT INTO usuarios VALUES("15","joel@gmail.com","123456","joelsito","2","9","");
INSERT INTO usuarios VALUES("16","adri@gmail.com","123456","adri","2","10","");
INSERT INTO usuarios VALUES("17","fer@gmail.com","1234567","fer","2","11","");
INSERT INTO usuarios VALUES("18","neto@gmail.com","123456","neto","3","7","");
INSERT INTO usuarios VALUES("19","rafael@gmail.com","1234567","chino","3","8","");
INSERT INTO usuarios VALUES("20","reyna@gmail.com","12345678","yu","3","9","");


