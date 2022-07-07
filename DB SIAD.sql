create database PAULO_FREIRE;
use PAULO_FREIRE;

create table if not exists año_academico(
idAñoAcademico int primary key auto_increment,
NombreAño varchar (50) not null
)Engine=InnoDB;

create table if not exists semestres(
idSemestre int primary key auto_increment,
NombreSemestre varchar (50) not null
)Engine=InnoDB;

create table if not exists carreras(
idCarrera int primary key auto_increment,
NombreCarrera varchar (50) not null
)Engine=InnoDB;

create table if not exists grupos(
idGrupo int primary key auto_increment,
NumeroGrupo varchar (50) not null,
NombreGrupo varchar (50) not null
)Engine=InnoDB;

create table if not exists horarios(
idHorario int primary key auto_increment,
NombreHorario varchar (50) not null
)Engine=InnoDB;

create table if not exists turnos(
idTurno int primary key auto_increment,
NombreTurno varchar (50) not null
)Engine=InnoDB;

create table if not exists niveles(
idNivel int primary key auto_increment,
NombreNivel varchar (50) not null
)Engine=InnoDB;

create table if not exists estudiantes(
idEstudiante int primary key auto_increment,
CarnetEstudiante varchar (10) not null,
NombresEstudiante varchar (50) not null,
ApellidosEstudiante varchar (50) not null,
CedulaEstudiante varchar (16) not null,
CorreoEstudiante varchar (50) not null,
CelularEstudiante varchar (8) not null,
TelefonoEstudiante varchar (8) not null,
DireccionEstudiante varchar (250) not null,
Estado int (1) not null,
idGrupo int null,
Foto varchar (100) null,
foreign key (idGrupo) references grupos (idGrupo)
)Engine=InnoDB;

create table if not exists docentes(
idDocente int primary key auto_increment,
NombresDocente varchar (50) not null,
ApellidosDocente varchar (50) not null,
CedulaDocente varchar (16) not null,
CorreoDocente varchar (50) not null,
CelularDocente varchar (8) not null,
TelefonoDocente varchar (8) not null,
DireccionDocente varchar (250) not null,
Estado int (1) not null,
Foto varchar (100) null
)Engine=InnoDB;

create table if not exists usuarios(
idUsuario smallint primary key auto_increment,
NombreUsuario varchar (50) not null,
PassUsuario varchar (150) not null,
NivelUsuario int not null,
Codigo int not null,
Foto varchar (100) null,
foreign key (NivelUsuario) references niveles (idNivel)
)Engine=InnoDB;

create table if not exists asignaturas(
idAsignatura int primary key auto_increment,
NombreAsignatura varchar (50) not null,
idCarrera int not null,
idGrupo int not null,
idSemestre int not null,
foreign key (idCarrera) references carreras (idCarrera),
foreign key (idGrupo) references grupos (idGrupo),
foreign key (idSemestre) references semestres (idSemestre))Engine=InnoDB;

create table if not exists entrega_tareas(
idEntregaTareas int primary key auto_increment,
CodigoTareaDocente int not null,
idEstudiante int not null,
idAsignatura int not null,
Descripcion varchar (200) not null,
CodigoEnvioTarea int not null,
Archivo varchar (200) not null,
FechaEntrega Date null,
foreign key (idEstudiante) references estudiantes (idEstudiante),
foreign key (idAsignatura) references asignaturas (idAsignatura)
)Engine=InnoDB;

create table if not exists numeros_asignaciones(
idNumeroAsignacion int primary key auto_increment,
numeroAsignado int not null,
idDocente int not null,
foreign key (idDocente) references docentes (idDocente)
)Engine=InnoDB;

	create table if not exists material_didactico(
idMaterialDidactico int primary key auto_increment,
Descripcion varchar (200) not null,
Archivo varchar (200) not null,
CodigoMaterial int not null,
Fecha_subida date null,
idNumeroAsignacion int not null,
idDocente int not null,
foreign key (idNumeroAsignacion) references numeros_asignaciones (idNumeroAsignacion),
foreign key (idDocente) references docentes (idDocente)
)Engine=InnoDB;


create table if not exists inscripciones_Asignaturas(
idInscripcion int primary key auto_increment,
idCarrera int not null, 
idAsignatura int not null,
idEstudiante int not null, 
fechaInscripcion date not null,
observaciones varchar (250),
foreign key (idCarrera) references carreras (idCarrera),
foreign key (idAsignatura) references asignaturas (idAsignatura),
foreign key (idEstudiante) references estudiantes (idEstudiante)
)Engine=InnoDB;

create table if not exists planificacion_tareas(
idPlanificacion int primary key auto_increment,
idDocente int not null, 
idNumeroAsignacion int not null, 
idAsignatura int not null, 
Unidad varchar (50) not null, 
DescripcionUnidad varchar (200) not null,
Tarea varchar (50) not null, 
DescripcionTarea varchar (200) not null,
FechaPublicacion date not null,
FechaPresentacion date not null,
CodigoTarea int not null,
foreign key (idDocente) references docentes(idDocente),
foreign key (idNumeroAsignacion) references numeros_asignaciones (idNumeroAsignacion),
foreign key (idAsignatura) references asignaturas (idAsignatura)
)Engine=InnoDB;

create table if not exists evaluaciones(
idEvaluacion int primary key auto_increment,
Descripcion varchar (100) not null,
idEstudiante int not null, 
idAsignatura int not null, 
Unidad varchar (50) not null, 
Tarea varchar (50) not null, 
idDocente int not null,
Puntaje int not null,
FechaEvaluacion date not null,
foreign key (idDocente) references docentes(idDocente),
foreign key (idEstudiante) references estudiantes(idEstudiante),
foreign key (idAsignatura) references asignaturas(idAsignatura)
)Engine=InnoDB;

create table if not exists asignaciones(
idAsignacion int primary key auto_increment,
Descripcion varchar (100) not null,
idDocente int not null, 
idAsignatura int not null,
idGrupo int not null, 
idTurno int not null, 
idHorario int not null,
Estado varchar (11) not null,
NumeroAsignacion int not null,
foreign key (idDocente) references docentes (idDocente),
foreign key (idAsignatura) references asignaturas (idAsignatura),
foreign key (idGrupo) references grupos (idGrupo),
foreign key (idTurno) references turnos (idTurno),
foreign key (idHorario) references horarios (idHorario)
)Engine=InnoDB;

create table if not exists plan_estudio(
idPlan int primary key auto_increment,
Descripcion varchar (100) not null,
idCarrera int not null, 
CantidadAsignaturas int not null,
foreign key (idCarrera) references carreras (idCarrera)
)Engine=InnoDB;

create table if not exists mensajes(
idMensaje int primary key auto_increment,
Remitente varchar (100) not null,
correo varchar (100) not null,
Mensaje varchar (500) not null,
FechaEnvio date null
)Engine=InnoDB;

