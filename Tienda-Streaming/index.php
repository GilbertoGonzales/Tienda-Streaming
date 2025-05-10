<?php include("base_datos.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mi Tienda de Streaming</title>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <header>
    <h1>Bienvenido a Mi Tienda de Streaming</h1>
    <nav>
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="productos.php">Productos</a></li>
        <li><a href="contacto.php">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <section class="productos">
    <h2>Productos Disponibles</h2>
    <div class="contenedor-productos">
      <?php
        // Consulta para obtener los productos desde la base de datos
        $consulta = "SELECT * FROM productos";
        $resultado = $conexion->query($consulta);

        // Mostrar cada producto
        while ($producto = $resultado->fetch_assoc()) {
          echo "<div class='producto'>";
          echo "<img src='img/{$producto['imagen']}' alt='{$producto['nombre']}'>";
          echo "<h3>{$producto['nombre']}</h3>";
          echo "<p>{$producto['descripcion']}</p>";
          echo "<p><strong>S/ {$producto['precio']}</strong></p>";
          echo "<a href='#' class='btn-comprar'>Comprar</a>"; // Enlace para comprar
          echo "</div>";
        }
      ?>
    </div>
  </section>

  <footer>
    <p>&copy; 2025 Mi Tienda de Streaming</p>
  </footer>
</body>
</html>
