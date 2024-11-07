create table users(
    id int auto_increment primary key,
    username varchar(80) unique not null,
    email varchar(100) unique not null,
    perfil enum("Admin", "Guest", "User", "Root") default "Guest"
);