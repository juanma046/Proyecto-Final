<?php 
require 'conexion.php';

$sql1 = "SELECT * FROM participantes ORDER BY Ganadas DESC";

$resultado1 = $mysqli->query($sql1);

$sql2 = "SELECT * FROM participantes ORDER BY Ganadas DESC";

$resultado2 = $mysqli->query($sql2);
?>
<script>
function actualizarSelect(valor, idSelect) {
    var select = document.getElementById(idSelect);
    var opciones = select.options;
    
    for (var i = 0; i < opciones.length; i++) {
        if (opciones[i].value === valor) {
            opciones[i].disabled = true;
        } else {
            opciones[i].disabled = false;
        }
    }
}
</script>
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

        <select id="select1" name="participante1" onchange="actualizarSelect(this.value, 'select2')">
        <?php
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<option value='$fila1[id_participante]'>$fila1[Nombre]</option>";
        }
        ?>
        </select>
        <select id="select2" name="participante2" onchange="actualizarSelect(this.value, 'select1')">
        <?php
        while($fila2 = $resultado2->fetch_assoc()){
            echo "<option value='$fila2[id_participante]'>$fila2[Nombre]</option>";
        }
        ?>
        </select>
</body>
</html>