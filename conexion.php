<?php
    //Nueva conexion de la clase mysqli
    //Parámetros: ubicación el servidor, nombre de usuario, contraseña, base de datos
    $mysqli = new mysqli("localhost", "root", "", "torneo pokemon");
    if($mysqli->connect_errno){
        echo "Fallo al conectar a MYSQL: (", $mysqli->connect_errno, ")" , $mysqli->connect_error;
    }
?>