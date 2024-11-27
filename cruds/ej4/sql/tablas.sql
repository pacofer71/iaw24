create table categorias(
    id int auto_increment primary key,
    nombre varchar(60) unique not null,
    color varchar(100) not null
);
create table articulos(
    id int auto_increment primary key,
    nombre varchar(60) unique not null,
    descripcion varchar(150),
    precio numeric(6,2),
    categoria_id int not null,
    constraint fk_art_cat foreign key(categoria_id) references categorias(id) on delete cascade
);

-- Datos
-- Datos para la tabla 'categorias'
INSERT INTO categorias (nombre, color) VALUES
('Electrónica', '#0074D9'),
('Hogar', '#2ECC40'),
('Ropa', '#FF851B'),
('Deportes', '#B10DC9'),
('Libros', '#FF4136');

-- Datos para la tabla 'articulos'
INSERT INTO articulos (nombre, descripcion, precio, categoria_id) VALUES
('Smartphone', 'Teléfono inteligente con pantalla AMOLED', 799.99, 1),
('Laptop', 'Portátil de última generación con 16GB RAM', 1199.99, 1),
('Auriculares Bluetooth', 'Auriculares inalámbricos con cancelación de ruido', 199.99, 1),
('Cargador USB-C', 'Cargador rápido para dispositivos compatibles', 25.99, 1),
('Smartwatch', 'Reloj inteligente con monitor de ritmo cardíaco', 299.99, 1),

('Sofá 3 plazas', 'Sofá cómodo de tela para sala de estar', 499.99, 2),
('Lámpara LED', 'Lámpara de escritorio ajustable con luz cálida', 39.99, 2),
('Juego de sartenes', 'Set de 3 sartenes antiadherentes', 59.99, 2),
('Aspiradora', 'Aspiradora sin bolsa para hogar', 129.99, 2),
('Estantería', 'Estantería de madera con 5 niveles', 89.99, 2),

('Camiseta deportiva', 'Camiseta de algodón unisex', 19.99, 3),
('Pantalón vaquero', 'Pantalón de mezclilla azul clásico', 49.99, 3),
('Chaqueta impermeable', 'Chaqueta ligera resistente al agua', 79.99, 3),
('Zapatos deportivos', 'Calzado cómodo para correr', 69.99, 3),
('Gorra de béisbol', 'Gorra ajustable con logo bordado', 15.99, 3),

('Bicicleta de montaña', 'Bicicleta con suspensión delantera', 349.99, 4),
('Balón de fútbol', 'Balón oficial para partidos', 29.99, 4),
('Raqueta de tenis', 'Raqueta de grafito de alta calidad', 119.99, 4),
('Pesas ajustables', 'Set de pesas ajustables hasta 20kg', 149.99, 4),
('Mochila deportiva', 'Mochila resistente al agua para deportes', 39.99, 4),

('Novela de ficción', 'Libro de aventuras épicas', 14.99, 5),
('Guía de programación', 'Libro para aprender Python', 34.99, 5),
('Enciclopedia ilustrada', 'Libro con contenido educativo para niños', 49.99, 5),
('Poesía clásica', 'Colección de poemas de grandes autores', 12.99, 5),
('Manual de cocina', 'Recetas fáciles y rápidas', 19.99, 5);
