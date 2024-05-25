<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se envió un formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el número de cédula a eliminar del formulario
    $cedula = $_POST['cedula'];

    // Preparar y ejecutar la consulta de eliminación
    $sql = "DELETE FROM personas WHERE cedula='$cedula'";

    // Verificar si la consulta se ejecutó correctamente
    if ($conexion->query($sql) === TRUE) {
        echo "Usuario eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conexion->error;
    }
}

// Cerrar la conexión a la base de datos (incluido en el archivo 'conexion.php')
?>
