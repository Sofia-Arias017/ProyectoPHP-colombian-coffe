<?php
$productos = [
  ["nombre" => "Café en Grano Premium 500g", "precio" => "12.99", "categoria" => "Café"],
  ["nombre" => "Café Molido Orgánico 250g", "precio" => "8.50", "categoria" => "Café"],
  ["nombre" => "Cafetera Italiana 6 Tazas", "precio" => "29.99", "categoria" => "Accesorios"],
  ["nombre" => "Prensa Francesa de Vidrio", "precio" => "22.00", "categoria" => "Accesorios"],
  ["nombre" => "Filtro de Papel Reutilizable", "precio" => "6.99", "categoria" => "Accesorios"],
  ["nombre" => "Taza de Cerámica 300ml", "precio" => "5.50", "categoria" => "Vajilla"],
  ["nombre" => "Espumador de Leche Eléctrico", "precio" => "19.99", "categoria" => "Accesorios"],
  ["nombre" => "Kit Barista Profesional", "precio" => "89.00", "categoria" => "Equipos"],
  ["nombre" => "Café Descafeinado 500g", "precio" => "10.00", "categoria" => "Café"],
  ["nombre" => "Jarabe de Vainilla para Café 250ml", "precio" => "7.50", "categoria" => "Complementos"]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mapa de Productos - Colombian Coffee</title>
  <link rel="stylesheet" href="./style/style_categorias.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <style>
    #map {
      height: 600px;
      width: 90%;
      margin: 20px auto;
      border: 2px solid #ccc;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<header class="main-header">
  <h1>Café Colombiano</h1>
  <nav>
    <a href="./productos.php">Productos</a>
    <a href="./pedidos.php">Pedidos</a>
    <a href="./detalles_pedido.php">Detalles Pedido</a>
    <a href="./categorias.php">Categorías</a>
    <a href="./proveedores.php">Proveedores</a>
    <a href="./inventario.php">Inventario</a>
    <a href="./facturas.php">Facturas</a>
    <a href="./mapa.php">Mapa</a>
  </nav>
</header>

<main>
  <h2 style="text-align:center; margin-top: 20px;">Mapa Interactivo de Productos</h2>
  <div id="map"></div>
</main>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
// Datos desde PHP
const productos = <?= json_encode($productos); ?>;

// Ubicaciones fijas en Colombia
const ubicaciones = [
  { lat: 5.0713, lng: -75.5138 }, // Caldas
  { lat: 6.2442, lng: -75.5812 }, // Antioquia
  { lat: 4.6097, lng: -74.0817 }, // Bogotá
  { lat: 3.4516, lng: -76.5320 }, // Valle del Cauca
  { lat: 7.1254, lng: -73.1198 }, // Santander
  { lat: 4.142, lng: -73.6266 },  // Meta
  { lat: 10.391, lng: -75.4794 }, // Bolívar
  { lat: 1.2136, lng: -77.2811 }, // Nariño
  { lat: 8.755, lng: -75.8814 },  // Córdoba
  { lat: 6.5569, lng: -73.1316 }  // Boyacá
];

// Inicializar el mapa
const map = L.map('map').setView([5.0, -73.0], 6);

// Capa base
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; OpenStreetMap contributors'
}).addTo(map);

// Usamos el ícono por defecto de Leaflet (flechita azul)
productos.forEach((producto, index) => {
  const { nombre, precio } = producto;
  const coords = ubicaciones[index % ubicaciones.length];

  L.marker([coords.lat, coords.lng]) // sin icono personalizado
    .addTo(map)
    .bindPopup(`<strong>${nombre}</strong><br>Precio: $${precio}`);
});
</script>

</body>
</html>
