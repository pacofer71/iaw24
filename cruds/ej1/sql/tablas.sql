create table articulos(
    id int auto_increment primary key,
    nombre varchar(50) unique not null,
    descripcion varchar(150),
    precio numeric(6,2),
    stock int
);