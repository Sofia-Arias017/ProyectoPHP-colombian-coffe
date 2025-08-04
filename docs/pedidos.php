<?php
// URL de la API
$apiUrl = "http://127.0.0.1:8082/pedidos";

// Inicializar cURL
$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

// Manejo de errores
$caracteristicas = [];
$error = null;

if (curl_errno($ch)) {
    $error = "Error al obtener datos: " . curl_error($ch);
} elseif ($response === false || empty($response)) {
    $error = "No se recibió respuesta de la API.";
} else {
    $caracteristicas = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        $error = "Error al decodificar JSON: " . json_last_error_msg();
    }
}

curl_close($ch);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Características del Café</title>
    <link rel="stylesheet" href="./style/style_categorias.css">
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
    <?php if ($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
    <?php elseif (empty($caracteristicas)): ?>
        <p class="vacio">No se encontraron características.</p>
    <?php else: ?>
        <div class="carrusel-wrapper">
            <button class="btn-carrusel prev">&#10094;</button>
            <div class="carrusel" id="contenedor-caracteristicas">
                <!-- JS insertará las tarjetas aquí -->
            </div>
            <button class="btn-carrusel next">&#10095;</button>
        </div>

        <script>
            const caracteristicas = <?php echo json_encode($caracteristicas); ?>;
            const contenedor = document.getElementById('contenedor-caracteristicas');

            caracteristicas.forEach(item => {
                const card = document.createElement('div');
                card.className = 'tarjeta';
                card.innerHTML = `
                    <h2>${item.fecha_pedido}</h2>
                    <p><strong>Total:</strong> $${item.total}</p>
                    <p><strong>Estado:</strong> ${item.estado}</p>
                `;
                contenedor.appendChild(card);
            });

            const carrusel = document.querySelector('.carrusel');
            const btnPrev = document.querySelector('.btn-carrusel.prev');
            const btnNext = document.querySelector('.btn-carrusel.next');
            const scrollAmount = 320;

            btnPrev.addEventListener('click', () => {
                carrusel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
            });

            btnNext.addEventListener('click', () => {
                carrusel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            });
        </script>
    <?php endif; ?>
    </main>
    <div class="imagen-abuelo">
        <img src="./style/pedidos.png" alt="niño con café diciendo pedidos">
    </div>

</body>
</html>
