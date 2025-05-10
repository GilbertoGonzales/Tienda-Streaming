<?php
include("base_datos.php");

// Verificar si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Obtener los datos del producto desde la base de datos
    $consulta = "SELECT * FROM productos WHERE id = $id_producto";
    $resultado = $conexion->query($consulta);

    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
    } else {
        echo "Producto no encontrado.";
        exit();
    }
}

// Verificar si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    // Actualizar el producto en la base de datos
    $consulta = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio' WHERE id = $id_producto";
    
    if ($conexion->query($consulta) === TRUE) {
        echo "Producto actualizado correctamente.";
        // Redirigir a la página de productos después de actualizar
        header("Location: productos.php");
        exit();
    } else {
        echo "Error al actualizar el producto: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Producto</title>
</head>
<body>
  <h1>Editar Producto</h1>
  <form action="editar_producto.php?id=<?php echo $producto['id']; ?>" method="POST">
    <label for="nombre">Nombre del producto:</label>
    <input type="text" name="nombre" id="nombre" value="<?php echo $producto['nombre']; ?>" required>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" id="descripcion" required><?php echo $producto['descripcion']; ?></textarea>

    <label for="precio">Precio (S/):</label>
    <input type="number" name="precio" id="precio" step="0.01" value="<?php echo $producto['precio']; ?>" required>

    <button type="submit">Actualizar Producto</button>
  </form>
</body>
</html>
