<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener los datos del formulario
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $rol = $_POST["rol"];
    $nroinv = $_POST["nroinv"];
    $fecha = $_POST["fecha"];

    // Verificar si el usuario existe en la base de datos
    $select_query = "SELECT * FROM personas1 WHERE cedula='$cedula'";
    $result = $conexion->query($select_query);

    if ($result->num_rows == 0) {
        // Si el usuario no se encuentra, mostrar un mensaje de error
        echo "Error: El usuario con la cédula '$cedula' no se encuentra en la base de datos.";
    } else {
        // Preparar y ejecutar la consulta SQL de actualización
        $sql = "UPDATE personas1 SET nombre='$nombre', apellido='$apellido', correo='$correo', rol='$rol', nroinv='$nroinv', fecha='$fecha' WHERE cedula='$cedula'";

        if(mysqli_query($conexion, $sql)) {
            echo "Usuario actualizado exitosamente";
        } else {
            echo "Error al actualizar el usuario: " . mysqli_error($conexion);
        }
    }
}
 
// Realizar la consulta SQL para obtener los usuarios
$select_query = "SELECT * FROM personas1";
$result = $conexion->query($select_query);

// Iniciar la tabla HTML
echo "<table>";
echo "<tr>";
echo "<th>Número de Cédula</th>";
echo "<th>Nombre</th>";
echo "<th>Apellido</th>";
echo "<th>Correo</th>";
echo "<th>Rol</th>";
echo "<th>Número de Invitados</th>";
echo "<th>Fecha de Registro</th>";
echo "</tr>";

// Mostrar los usuarios en la tabla
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["cedula"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["correo"] . "</td>";
        echo "<td>" . $row["rol"] . "</td>";
        echo "<td>" . $row["nroinv"] . "</td>";
        echo "<td>" . $row["fecha"] . "</td>";
        echo "</tr>";
    }
} else {
    // Mostrar un mensaje si no hay usuarios registrados
    echo "<tr><td colspan='7'>No hay usuarios registrados</td></tr>";
}

// Cerrar la tabla HTML
echo "</table>";

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
