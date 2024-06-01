<?php 
require ("conexion.php");
session_start();

// Verificar si el ID del usuario está presente en la URL
if (!isset($_GET['id'])) {
    echo "ID de usuario no especificado.";
}

$id = $_GET['id'];

// Obtener la información del usuario activo
$sql1 = "SELECT * FROM participantes WHERE id_participante='$id'";
$resultado1 = $mysqli->query($sql1);

if ($resultado1->num_rows > 0) {
    $fila1 = $resultado1->fetch_assoc();

    $id_poke1 = $fila1['individuo_pokemon'];
    $sqlPK1 = "SELECT * FROM pokémon WHERE id_pokemon='$id_poke1'";
    $resultadoPK1 = $mysqli->query($sqlPK1);

    if ($resultadoPK1->num_rows > 0) {
        $filaPK1 = $resultadoPK1->fetch_assoc();
        $poke1 = $filaPK1['Nombre'];
        $tipos1 = $filaPK1['Tipo'];
    } else {
        echo "Pokémon no encontrado para el usuario.";
    }
} else {
    echo "Usuario no encontrado.";
}

// Obtengo un usuario aleatorio para el combate
$sql2 = "SELECT * FROM participantes WHERE rol NOT LIKE 'admin' AND id_participante NOT LIKE '$id' ORDER BY RAND() LIMIT 1";
$resultado2 = $mysqli->query($sql2);

if ($resultado2->num_rows > 0) {
    $fila2 = $resultado2->fetch_assoc();

    $id_poke2 = $fila2['individuo_pokemon'];
    $sqlPK2 = "SELECT * FROM pokémon WHERE id_pokemon='$id_poke2'";
    $resultadoPK2 = $mysqli->query($sqlPK2);

    if ($resultadoPK2->num_rows > 0) {
        $filaPK2 = $resultadoPK2->fetch_assoc();
        $poke2 = $filaPK2['Nombre'];
        $tipos2 = $filaPK2['Tipo'];
    } else {
        echo "Pokémon no encontrado para el oponente.";
    }
} else {
    echo "No se pudo seleccionar un oponente aleatorio.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Combate Pokémon</title>
</head>
<body>
    <div class="contenedor">
    <h1 class="titulo">Torneo Pokémon La Campiña</h1>
    <div class="batalla-container">
    <div class="pokemon">
            <img src="pokemon gif/<?php echo $filaPK1['Modelo']; ?>" class="vuelta">
        <div class="pokemon-carta">
       <p><?php echo "$fila1[Nombre]: ";  echo $poke1; ?> (<?php echo $tipos1; ?>)</p>
        </div>
        </div>
        <img src="imagenes/vs.png" class="vs">
    <div class="pokemon">
            <img src="pokemon gif/<?php echo $filaPK2['Modelo']; ?>">
            <div class="pokemon-carta">
            <p><?php echo "$fila2[Nombre]: "  ;  echo $poke2; ?> (<?php echo $tipos2; ?>)</p>
            </div>
        </div>
        </div>
    <form action="combate-usuario2.php" method="POST">
        <input type="hidden" name="id_participante1" value="<?php echo $fila1['id_participante']; ?>">
        <input type="hidden" name="id_participante2" value="<?php echo $fila2['id_participante']; ?>">
        <p class="boton"><button class="btn btn-primary"><input type="submit" class="submit"></button></p>
    </form>
    </div>
</body>
</html>
