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
    <p>Introduce el nombre del participante<input type="text" name="nombre"></p>
    <p><label for="formControlInput" class="form-label">Selecciona su pokemon</label>
							<select class="form-control" id="formControlInput" name="id_pokemon">
								<option value="1">Bloodborne</option>
								<option value="2">Fortnite</option>
                                <option value="3">Persona 3 Reload</option>
								<option value="4">F1 2024</option>
							</select></p>
    <p>Introduce el nivel del pokémon: <input type="number" name="nivel" min=1 max=100></p>
</body>
</html>