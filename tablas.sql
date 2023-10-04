create database escrito_programacion;
use escrito_programacion;
create table tarea(
	id serial primary key,
    titulo varchar(50) not null,
    contenido varchar(255) not null,
    estado enum("En proceso", "Hecha") not null default "En proceso",
    autor varchar(50) not null,
    created_at datetime not null,
    updated_at datetime not null,
    deleted_at datetime
);