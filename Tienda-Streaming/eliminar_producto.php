<?php
include("base_datos.php");

// Verificar si el parámetro 'id' está presente en la URL
if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];

    // Eliminar el producto de la base de datos
    $consulta = "DELETE FROM productos WHERE id = $id_producto";
    
    if ($conexion->query($consulta) === TRUE) {
        echo "Producto eliminado correctamente.";
        // Redirigir a la página de productos después de eliminar
        header("Location: productos.php");
        exit();
    } else {
        echo "Error al eliminar el producto: " . $conexion->error;
    }
} else {
    echo "ID de producto no proporcionado.";
}
?>
