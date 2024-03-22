<?php
    require 'conexion.php';

    $sql1 = "SELECT * FROM participantes";

    $resultado1 = $mysqli->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneo de Pokémon</title>
</head>
<body>
    <?php 
        echo "<h1>Participantes</h1>";

        echo "<table id='tabla'>";
        echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Jugadas</th>";
            echo "<th>Ganadas</th>";
        echo "</tr>";
        
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<tr>";
                echo "<td>$fila1[Nombre]</td>";
                echo "<td>$fila1[Jugadas]</td>";
                echo "<td>$fila1[Ganadas]</td>";
                echo "<td><button class='btn btn-warning'><a href='modificar.php?id=$fila1[id_participante]' class='text-white'>Editar</a></button></td>";
                echo "<td><button class='btn btn-danger'><a href='eliminar.php?id=$fila1[id_participante]' class='text-white'>Eliminar</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
        
            $mysqli->close();
    ?>
    <p><a href="registrar1.php">Registrar nuevo participante</a></p>
</body>
</html>