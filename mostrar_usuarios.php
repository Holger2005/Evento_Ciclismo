<?php
include 'conexion.php';

$select_query = "SELECT * FROM personas1";
$result = $conexion->query($select_query);

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
    echo "<tr><td colspan='7'>No hay usuarios registrados</td></tr>";
}

mysqli_close($conexion);
?>
