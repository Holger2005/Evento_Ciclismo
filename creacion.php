
<?php
include 'conexion.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $fecha = $_POST["fecha"];
    $nroinv = $_POST["nroinv"];
    $rol = $_POST["rol"];

    // Prepare and execute the query
    $sql = "INSERT INTO personas (cedula, nombre, apellido, correo, fecha, nroinv, rol) VALUES ('$cedula', '$nombre', '$apellido', '$correo', '$fecha', '$nroinv', '$rol')";

    if(mysqli_query($conexion,$sql)) {
        echo "Persona creada";
    }
    else {
        echo "Error". mysqli_connect_error();
    }
    
    mysqli_close($conexion);
    
}

?>