<?php
	require 'conexion.php';
    $sql = "SELECT * FROM pokémon";

    $resultado = $mysqli->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Participante</title>
</head>
<body>
    <form action="registrar2.php" method="post">
    <p>Introduce el nombre del participante:<input type="text" name="nombre" required></p>
    <p>Selecciona el pokémon:
    <?php 
        echo "<select name='pokemon'>";
        while($fila = $resultado->fetch_assoc()){
            echo "<option value='$fila[id_pokemon]'>$fila[Nombre_poke]</option>";
        }
        echo "</select>";
    ?>
    </p>
    <p>Introduce el nivel del pokémon: <input type="number" name="nivel" min=1 max=100 required></p>
    <p><input type="submit" value="Registrar" name="submit"></p>
    </form>
</body>
</html>