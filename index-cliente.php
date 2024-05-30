<?php 
    session_start();
    $usuario = $_SESSION['username'];

    if(!isset($usuario)){
        header("location:login.php");
    }else{
        echo "<h1>Bienvenido $usuario</h1>";
?>
        <a href="salir.php"> Cerrar Sesión</a>
<?php
    }

?>