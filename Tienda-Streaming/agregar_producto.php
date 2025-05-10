<?php
// Definir la clave secreta
$clave_secreta = "aereoi";

// Verificar si la clave secreta está en la URL
if (!isset($_GET['clave']) || $_GET['clave'] !== $clave_secreta) {
    echo "Acceso denegado. No tienes permisos para acceder a esta página.";
    exit;
}

include("base_datos.php");

// Comprobar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_FILES['imagen']['name'];

    // Subir la imagen
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file);

    // Insertar el producto en la base de datos
    $consulta = "INSERT INTO productos (nombre, descripcion, precio, imagen) 
                 VALUES ('$nombre', '$descripcion', '$precio', '$imagen')";
    
    if ($conexion->query($consulta) === TRUE) {
        echo "Producto agregado correctamente";
    } else {
        echo "Error: " . $consulta . "<br>" . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Agregar Producto</h1>
    <form action="agregar_producto.php?clave=aereoi" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre del producto:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion" required></textarea>

        <label for="precio">Precio (S/):</label>
        <input type="number" name="precio" id="precio" step="0.01" required>

        <label for="imagen">Imagen del producto:</label>
        <input type="file" name="imagen" id="imagen" required>

        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
