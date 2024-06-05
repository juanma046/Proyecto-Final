<?php
require 'conexion.php';
session_start();

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Consulta SQL simple
    $sql = "SELECT * FROM participantes WHERE Nombre = '$usuario' AND Contraseña = '$clave'";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) { // Verificamos si hay al menos una fila devuelta
        $fila = $resultado->fetch_assoc();
        $_SESSION['id'] = $fila['id_participante'];
        $_SESSION['rol'] = $fila['rol'];

        if ($fila['rol'] == "admin") {
            header("Location: index.php");
            exit();
        } else {
            header("Location: index-cliente.php");
            exit();
        }
    } else {
        // Credenciales incorrectas
        header("Location: login.php?error=Usuario no encontrado o contraseña incorrecta.");
        exit();
    }
} else {
    // Petición no válida
    header("Location: login.php?error=Por favor, introduce un usuario y una contraseña válidos.");
    exit();
}
?>
