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
CREATE TABLE productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT DEFAULT 0,
    categoria VARCHAR(50),
    sku VARCHAR(20) UNIQUE
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
('Laptop HP EliteBook', 1200.00, 15, 'Electrónica', 'LP-HP-011'),
('Mouse Inalámbrico', 25.99, 50, 'Accesorios', 'MS-WL-022'),
('Teclado Mecánico', 89.99, 30, 'Accesorios', 'KB-MC-033'),
('Monitor 24"', 199.99, 20, 'Electrónica', 'MN-24-044'),
('Disco SSD 500GB', 79.99, 40, 'Componentes', 'SS-500-055'),
('Impresora Multifuncional', 149.99, 10, 'Oficina', 'PR-MF-066'),
('Router WiFi', 59.99, 25, 'Redes', 'RT-WF-077'),
('Webcam HD', 45.50, 35, 'Accesorios', 'WC-HD-088'),
('Altavoces Bluetooth', 65.00, 18, 'Audio', 'SP-BT-099'),
('Tablet 10"', 249.99, 12, 'Electrónica', 'TB-10-101');

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
(1, 1, 1, 1200.00),
(1, 4, 1, 199.99),
(2, 2, 2, 25.99),
(2, 3, 1, 89.99),
(3, 5, 2, 79.99),
(3, 9, 2, 65.00),
(4, 3, 1, 89.99),
(5, 4, 1, 199.99),
(5, 7, 1, 59.99),
(5, 8, 1, 45.50),
(5, 10, 1, 249.99),
(6, 4, 1, 199.99),
(7, 9, 1, 65.00),
(8, 10, 1, 249.99),
(9, 8, 1, 45.50),
(10, 5, 1, 79.99);

-- Categorias
INSERT INTO categorias (nombre, descripcion) VALUES
('Electrónica', 'Dispositivos electrónicos y computadoras'),
('Accesorios', 'Accesorios para computadoras'),
('Componentes', 'Partes internas para computadoras'),
('Oficina', 'Equipos de oficina'),
('Redes', 'Dispositivos de red y conectividad'),
('Audio', 'Equipos y accesorios de audio'),
('Impresión', 'Impresoras y suministros'),
('Almacenamiento', 'Discos duros y unidades de estado sólido'),
('Seguridad', 'Equipos de seguridad informática'),
('Software', 'Programas y licencias');

-- Proveedores
INSERT INTO proveedores (nombre, contacto, telefono, email) VALUES
('TecnoSuministros', 'Roberto Mendoza', '555-1111', 'ventas@tecnosuministros.com'),
('ElectroParts', 'Laura Jiménez', '555-2222', 'contacto@electroparts.com'),
('CompuGlobal', 'Carlos Ríos', '555-3333', 'info@compuglobal.net'),
('DistriTec', 'Ana Sánchez', '555-4444', 'ventas@distritec.mx'),
('TecnoImport', 'Miguel Ángel', '555-5555', 'miguel@tecnoimport.com'),
('DigitalWare', 'Patricia López', '555-6666', 'pedidos@digitalware.com'),
('HardTech', 'Fernando Castro', '555-7777', 'contacto@hardtech.mx'),
('CompuProveedores', 'Sofía Ramírez', '555-8888', 'sofia@compuproveedores.com'),
('TecnoRed', 'Jorge Morales', '555-9999', 'jorge@tecnored.net'),
('GlobalElectronics', 'Elena Díaz', '555-0000', 'elena@globalelectronics.com');

-- Inventario
INSERT INTO inventario (producto_id, cantidad, ubicacion) VALUES
(1, 15, 'Almacén A'),
(2, 50, 'Almacén B'),
(3, 30, 'Almacén A'),
(4, 20, 'Almacén C'),
(5, 40, 'Almacén B'),
(6, 10, 'Almacén A'),
(7, 25, 'Almacén C'),
(8, 35, 'Almacén B'),
(9, 18, 'Almacén A'),
(10, 12, 'Almacén C');

-- Facturas
INSERT INTO facturas (pedido_id, fecha_emision, subtotal, impuestos, total, estado_pago) VALUES
(1, '2023-10-01', 1399.99, 50.00, 1449.99, 'pagado'),
(2, '2023-10-02', 165.98, 10.00, 175.98, 'pagado'),
(3, '2023-10-03', 319.98, 10.00, 329.98, 'pendiente'),
(4, '2023-10-04', 89.99, 0.00, 89.99, 'pagado'),
(5, '2023-10-05', 505.49, 10.00, 515.49, 'pagado'),
(6, '2023-10-06', 199.99, 0.00, 199.99, 'pendiente'),
(7, '2023-10-07', 65.00, 0.00, 65.00, 'pendiente'),
(8, '2023-10-08', 249.99, 0.00, 249.99, 'pagado'),
(9, '2023-10-09', 45.50, 0.00, 45.50, 'vencido'),
(10, '2023-10-10', 79.99, 0.00, 79.99, 'pendiente');