<?php
    require 'conexion.php';
    session_start();

    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $sql = "SELECT rol FROM participantes where Nombre = '$usuario' and Contraseña = '$clave'";
    $resultado = $mysqli->query($sql);
    //$array = mysqli_fetch_array($resultado);

    if ($resultado > 0){
        $fila = $resultado->fetch_assoc();
        $rol = $fila['rol'];
        if ($rol == "admin"){
            $_SESSION['username'] = $usuario;
            $mysqli->close();
            header("Location:index.php");
        }else{
            $_SESSION['username'] = $usuario;
            $mysqli->close();
            header("Location:usuario/index-cliente.php");
        }

        // Si no se ha guardado los registros mostramos un mensaje de error
    } else {
        $mysqli->close();
        echo "<div class='alert alert-danger' role='alert'>Datos Incorrectos</div>";
        header("Location:login.php");
    }
?>