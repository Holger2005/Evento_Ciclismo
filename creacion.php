
<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] = "POST") {
    // Retrieve form data
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $fecha = $_POST["fecha"];
    $nroinv = $_POST["nroinv"];
    $rol = $_POST["rol"];

    $sql = "INSERT INTO personas1 (cedula, nombre, apellido, correo, fecha, nroinv, rol) VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$fecha', '$nroinv', '$rol')";

    if(mysqli_query($conexion,$sql)) {
        echo "Persona creada";
    }
    else {
        echo "Error". mysqli_connect_error();
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
mysqli_close($conexion);

?>