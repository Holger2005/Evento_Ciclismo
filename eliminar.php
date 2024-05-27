<?php
// Incluir el archivo de conexión a la base de datos
include 'conexion.php';

// Verificar si se envió un formulario mediante el método POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el número de cédula a eliminar del formulario
    $cedula = $_POST['cedula'];

        // Verificar si el usuario existe en la base de datos
        $select_query = "SELECT * FROM personas1 WHERE cedula='$cedula'";
        $result = $conexion->query($select_query);
      
        if ($result->num_rows == 0) {
            // Si el usuario no se encuentra, mostrar un mensaje de error
            echo "Error: El usuario con la cédula '$cedula' no se encuentra en la base de datos.";
        } else {
            // Preparar y ejecutar la consulta de eliminación
             $sql = "DELETE FROM personas1 WHERE cedula='$cedula'";

                // Verificar si la consulta se ejecutó correctamente
            if ($conexion->query($sql) === TRUE) {
                echo "Usuario eliminado exitosamente";
            } else {
                echo "Error: " . $sql . "<br>" . $conexion->error;
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


mysqli_close($conexion);

?>
