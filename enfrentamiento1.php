<?php 
require 'conexion.php';

$sql1 = "SELECT * FROM participantes ORDER BY Ganadas DESC";

$resultado1 = $mysqli->query($sql1);

$sql2 = "SELECT * FROM participantes ORDER BY Ganadas DESC";

$resultado2 = $mysqli->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Torneo Pokémon La Campiña</H1>
    <h2>Selecciona a los 2 participantes que se van a enfrentar</h2>
    <?php
        echo "<select name='participante1'>";
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<option value='$fila1[id_participante]'>$fila1[Nombre]</option>";
        }
        echo "</select>";
        echo "<select name='participante2'>";
        while($fila2 = $resultado2->fetch_assoc()){
            echo "<option value='$fila2[id_participante]'>$fila2[Nombre]</option>";
        }
        echo "</select>";
    ?>

    
</body>
</html>