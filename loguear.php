<?php
require 'conexion.php';
session_start();

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Consulta SQL simple
    $sql = "SELECT Nombre, Contraseña, rol FROM participantes WHERE Nombre = '$usuario' AND Contraseña = '$clave'";
    $resultado = $mysqli->query($sql);

    if ($resultado > 0) {
        $fila = $resultado->fetch_assoc();
        $_SESSION['username'] = $fila['Nombre'];
        $_SESSION['rol'] = $fila['rol'];

        if ($fila['rol'] == "admin") {
            header("Location: index.php");
        } else {
            header("Location: index-cliente.php");
        }
        exit();
    } else {
        // Credenciales incorrectas
        header("Location: login.php?error=Datos%20Incorrectos");
        exit();
    }
} else {
    // Petición no válida
    header("Location: login.php");
    exit();
}
?>
