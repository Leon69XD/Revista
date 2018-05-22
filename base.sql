create table Usuario(
Matricula int unique primary key not null, 
Nombre varchar(50) not null, 
Pass varchar (500) not null,
Nivel varchar(5),
ApellidoP varchar(50),
ApellidoM varchar(50),
Rol varchar(20) not null,
Carrera varchar(50) null,
Cuatriemstre int null,
Correo varchar(100) unique not null,
Activo boolean
);


create table Articulo(
Codigo int unique auto_increment primary key,
AutorC int not null,
Titulo varchar(50) not null,
Seccion int not null,
FechaP date null,
AutorN varchar(50),
Publicado date,
Autorizado boolean default false, 
URL varchar(100),
constraint
foreign key (AutorC) references Usuario(Matricula)
)