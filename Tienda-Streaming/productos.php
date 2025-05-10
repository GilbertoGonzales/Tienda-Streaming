<?php
include("base_datos.php"); // Conexión a la base de datos

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="stylesheet" href="css/estilo.css"> <!-- Aquí se incluiría tu CSS -->
</head>
<body>
  <h1>Productos disponibles</h1>
  <div class="contenedor">
    <?php
      $consulta = "SELECT * FROM productos";  // Consultar los productos
      $resultado = $conexion->query($consulta);

      if ($resultado->num_rows > 0) {  // Si hay productos en la base de datos
        while ($producto = $resultado->fetch_assoc()) {  // Recorrer los productos
          echo "<div class='producto'>";
          echo "<img src='img/{$producto['imagen']}' width='150'>"; // Imagen del producto
          echo "<h2>{$producto['nombre']}</h2>"; // Nombre del producto
          echo "<p>{$producto['descripcion']}</p>"; // Descripción del producto
          echo "<p><strong>S/ {$producto['precio']}</strong></p>"; // Precio del producto
          echo "</div>"; // Cierre de div de producto
        }
      } else {
        echo "<p>No hay productos disponibles.</p>";  // Mensaje si no hay productos
      }
    ?>
  </div>
</body>
</html>
