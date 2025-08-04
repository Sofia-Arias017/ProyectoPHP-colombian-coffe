DROP DATABASE IF EXISTS Cafe;
CREATE DATABASE Cafe;
USE Cafe;

-- Tabla Usuarios 
CREATE TABLE `usuarios`(
    `id`     int          NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    `email`  varchar(100) NOT NULL,
    `password`  varchar(255) NOT NULL,
    `rol`  enum('admin', 'user') NOT NULL DEFAULT 'user',
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`)
);

-- 1. Tabla Productos

DROP TABLE IF EXISTS productos;
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    categoria VARCHAR(50),
    sku VARCHAR(20)
);

-- 2. Tabla Pedidos 
CREATE TABLE pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT  NULL,
    fecha_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10,2) NOT NULL,
    estado ENUM('pendiente', 'procesando', 'completado', 'cancelado') DEFAULT 'pendiente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- 3. Tabla Detalles_Pedido
CREATE TABLE detalles_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    precio_unitario DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- 4. Tabla Categorias
DROP TABLE IF EXISTS categorias;
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    descripcion TEXT
);

-- 5. Tabla Proveedores
CREATE TABLE proveedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contacto VARCHAR(100),
    telefono VARCHAR(20),
    email VARCHAR(100)
);

-- 6. Tabla Inventario
CREATE TABLE inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    ubicacion VARCHAR(50),
    fecha_actualizacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- 7. Tabla Facturas
CREATE TABLE facturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    fecha_emision DATE NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    impuestos DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    estado_pago ENUM('pendiente', 'pagado', 'vencido') DEFAULT 'pendiente',
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Insertar datos 


-- Productos 
INSERT INTO productos (nombre, precio, stock, categoria, sku) VALUES
('Café en Grano Premium 500g', 12.99, 40, 'Café', 'CF-GR-001'),
('Café Molido Orgánico 250g', 8.50, 50, 'Café', 'CF-ML-002'),
('Cafetera Italiana 6 Tazas', 29.99, 25, 'Accesorios', 'CF-IT-003'),
('Prensa Francesa de Vidrio', 22.00, 30, 'Accesorios', 'CF-PF-004'),
('Filtro de Papel Reutilizable', 6.99, 60, 'Accesorios', 'CF-FR-005'),
('Taza de Cerámica 300ml', 5.50, 100, 'Vajilla', 'CF-TZ-006'),
('Espumador de Leche Eléctrico', 19.99, 15, 'Accesorios', 'CF-EL-007'),
('Kit Barista Profesional', 89.00, 10, 'Equipos', 'CF-KT-008'),
('Café Descafeinado 500g', 10.00, 35, 'Café', 'CF-DC-009'),
('Jarabe de Vainilla para Café 250ml', 7.50, 20, 'Complementos', 'CF-JV-010');


-- PEDIDOS
INSERT INTO pedidos (usuario_id, fecha_pedido, total, estado) VALUES
(NULL, '2023-10-01 09:15:00', 1449.98, 'completado'),
(NULL, '2023-10-02 11:30:00', 175.98, 'procesando'),
(NULL, '2023-10-03 14:45:00', 329.98, 'pendiente'),
(NULL, '2023-10-04 10:20:00', 89.99, 'completado'),
(NULL, '2023-10-05 16:10:00', 515.49, 'completado'),
(NULL, '2023-10-06 13:25:00', 199.99, 'procesando'),
(NULL, '2023-10-07 15:30:00', 65.00, 'pendiente'),
(NULL, '2023-10-08 12:00:00', 249.99, 'completado'),
(NULL, '2023-10-09 17:45:00', 45.50, 'cancelado'),
(NULL, '2023-10-10 09:30:00', 79.99, 'procesando');

-- Detalles_Pedido
INSERT INTO detalles_pedido (pedido_id, producto_id, cantidad, precio_unitario) VALUES
(1, 1, 2, 18.99),
(1, 4, 1, 49.99),
(2, 2, 1, 22.50),
(2, 3, 1, 35.00),
(3, 5, 3, 8.50),
(3, 9, 2, 39.99),
(4, 3, 2, 35.00),
(5, 4, 1, 49.99),
(5, 7, 1, 5.99),
(5, 8, 1, 9.99),
(5, 10, 1, 12.99),
(6, 4, 2, 49.99),
(7, 9, 1, 39.99),
(8, 10, 2, 12.99),
(9, 8, 1, 9.99),
(10, 5, 2, 8.50);


-- Categorias
INSERT INTO categorias (nombre, descripcion) VALUES
('Café en grano', 'Variedades de café en grano para moler y preparar'),
('Café molido', 'Café previamente molido listo para preparar'),
('Bebidas especiales', 'Cafés fríos, lattes, capuccinos y más'),
('Accesorios de café', 'Filtros, prensas, molinillos y otros utensilios'),
('Postres', 'Acompañamientos como pasteles, galletas y brownies'),
('Tés e infusiones', 'Bebidas alternativas como tés y hierbas'),
('Café orgánico', 'Café cultivado sin pesticidas ni químicos'),
('Regalos y kits', 'Cajas de regalo, kits de barista y combos'),
('Vasos y termos', 'Vasos reutilizables, termos y tazas especiales'),
('Merchandising', 'Camisas, bolsas y artículos con temática cafetera');


-- Proveedores
INSERT INTO proveedores (nombre, contacto, telefono, email) VALUES
('Café Andino', 'Roberto Mendoza', '555-1111', 'ventas@cafeandino.com'),
('Granos Selectos', 'Laura Jiménez', '555-2222', 'contacto@granosselectos.com'),
('Tostadores del Sur', 'Carlos Ríos', '555-3333', 'info@tostadoresdelsur.net'),
('Distribuidora Aroma', 'Ana Sánchez', '555-4444', 'ventas@distribuidoraroma.mx'),
('ImportCafé', 'Miguel Ángel', '555-5555', 'miguel@importcafe.com'),
('Sabores de Altura', 'Patricia López', '555-6666', 'pedidos@saboresdealtura.com'),
('CaféTech', 'Fernando Castro', '555-7777', 'contacto@cafetech.mx'),
('ProCafé Express', 'Sofía Ramírez', '555-8888', 'sofia@procafe.com'),
('Red de Baristas', 'Jorge Morales', '555-9999', 'jorge@redbaristas.net'),
('Global Beans', 'Elena Díaz', '555-0000', 'elena@globalbeans.com');


-- Inventario
INSERT INTO inventario (producto_id, cantidad, ubicacion) VALUES
(1, 100, 'Depósito Central'),
(2, 250, 'Bodega Norte'),
(3, 150, 'Depósito Central'),
(4, 80, 'Almacén Cápsulas'),
(5, 200, 'Bodega Norte'),
(6, 60, 'Depósito Central'),
(7, 120, 'Almacén Cápsulas'),
(8, 170, 'Bodega Norte'),
(9, 90, 'Depósito Central'),
(10, 45, 'Almacén Cápsulas');


-- Facturas
INSERT INTO facturas (pedido_id, fecha_emision, subtotal, impuestos, total, estado_pago) VALUES
(1, '2023-10-01', 13400.00, 640.00, 14040.00, 'pagado'),
(2, '2023-10-02', 21000.00, 840.00, 21840.00, 'pagado'),
(3, '2023-10-03', 42800.00, 1712.00, 44512.00, 'pendiente'),
(4, '2023-10-04', 8950.00, 358.00, 9308.00, 'pagado'),
(5, '2023-10-05', 18400.00, 736.00, 19136.00, 'pagado'),
(6, '2023-10-06', 7950.00, 318.00, 8268.00, 'pendiente'),
(7, '2023-10-07', 7400.00, 296.00, 7696.00, 'pendiente'),
(8, '2023-10-08', 21450.00, 858.00, 22308.00, 'pagado'),
(9, '2023-10-09', 6500.00, 260.00, 6760.00, 'vencido'),
(10, '2023-10-10', 15400.00, 616.00, 16016.00, 'pendiente');
