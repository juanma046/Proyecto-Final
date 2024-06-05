<?php 
require 'conexion.php';

$sql1 = "SELECT * FROM participantes  WHERE Rol NOT LIKE 'admin' ORDER BY Ganadas DESC";

$resultado1 = $mysqli->query($sql1);

$sql2 = "SELECT * FROM participantes WHERE Rol NOT LIKE 'admin' ORDER BY Ganadas DESC";

$resultado2 = $mysqli->query($sql2);
?>
<script>
    function validarFormulario() {
        var participante1 = document.getElementById("select1").value;
        var participante2 = document.getElementById("select2").value;

        if (participante1 === "disable" || participante2 === "disable") {
            alert("Por favor, seleccione a dos participantes antes de enviar el formulario.");
            return false; // Evita que el formulario se envíe si no se han seleccionado ambos participantes
        }

        return true; // Permite que el formulario se envíe si se han seleccionado ambos participantes
    }

    function actualizarSelect(valor, idSelect) {
        var select = document.getElementById(idSelect);
        var opciones = select.options;

        for (var i = 0; i < opciones.length; i++) {
            if (opciones[i].value === valor || opciones[i].value === 'disable') {
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
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="contenedor">
    <h1>Torneo Pokémon La Campiña</h1>
    <h2>Selecciona a los 2 participantes que se van a enfrentar</h2>
    <form action="enfrentamiento2.php" method="POST" class="combate" onsubmit="return validarFormulario()">
        <div class="select">
            <select id="select1" name="participante1" onchange="actualizarSelect(this.value, 'select2')">
                <option value="disable" selected disabled>Selecciona un participante</option>
                <?php
                while($fila1 = $resultado1->fetch_assoc()){
                    echo "<option value='$fila1[id_participante]'>$fila1[Nombre]</option>";
                }
                ?>
            </select>
            <br>
            <select id="select2" name="participante2" onchange="actualizarSelect(this.value, 'select1')">
                <option value="disable" selected disabled>Selecciona un participante</option>
                <?php
                $resultado2->data_seek(0);
                while($fila2 = $resultado2->fetch_assoc()){
                    echo "<option value='$fila2[id_participante]'>$fila2[Nombre]</option>";
                }
                ?>
            </select>
        </div>
        <br>
        <br>
        <p class="boton"><button type="submit" class="btn btn-primary" name="submit">Comenzar la batalla</button></p>
        <br>
        <br>
        <p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index.php">Volver</a></button></p>
    </form>
</div>
</body>
</html>