<?php
require 'conexion.php';
session_start();
$usuario = $_SESSION['username'];

if (!isset($usuario)) {
    header("location:login.php");
    exit();
}

// Obtener los datos del usuario activo
$sql = "SELECT * FROM participantes WHERE Nombre = '$usuario'";
$resultado = $mysqli->query($sql);
$fila = $resultado->fetch_assoc();
$id = $fila['id_participante'];


$id_usuario = $fila['id_participante']; // Obtener el ID del usuario activo

// Obtener los participantes ordenados por ganadas
$sql1 = "SELECT * FROM participantes WHERE id_participante <> $id AND rol NOT LIKE 'admin' ORDER BY Ganadas DESC";
$resultado1 = $mysqli->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Torneo de Pokémon</title>
</head>
<body>
<div class='contenedor'>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <img src="imagenes/escudo.svg" class="escudo">
                <div class="navbar-collapse" id="menu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="pokemon.php" class="nav-link">Lista de Pokemons</a></li>
                        <li class="nav-item">
                            <a href='combate-usuario.php?id=<?php echo $id_usuario; ?>' class='text-white nav-link'>Simulador de Combate</a>
                        </li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar Sesión</a></li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-menu">Items</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown-menu">
                                <li><a href="https://darksouls.fandom.com/es/wiki/Armas_de_Dark_Souls" class="dropdown-item"><img src="imagenes/espada.jpg" width="50px">Armas</a></li>
                                <li><a href="https://darksouls.fandom.com/es/wiki/Escudos_de_Dark_Souls" class="dropdown-item"><img src="imagenes/escudo.jpg" width="50px">Escudos</a></li>
                                <li><a href="https://darksouls.fandom.com/es/wiki/Armaduras_de_Dark_Souls" class="dropdown-item"><img src="imagenes/armadura.jpg" width="50px">Armaduras</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="video">
            <video width="1000" height="500" autoplay loop muted>
                <source src="video/pokemon.mp4" type="video/mp4">
            </video>
        </div>
        <h2>Participantes</h2>
        <div>
            <table id='tabla'>
                <tr>
                </tr>
                <?php while ($fila1 = $resultado1->fetch_assoc()): ?>
                    <tr>
                        <td><button class='btn btn-warning'><a href='jugadores-usu.php?id=<?php echo $fila1['id_participante']; ?>' class='text-white'><?php echo $fila1['Nombre']; ?></a></button></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </main>
    <footer class="pie">
        <div class="nombre">Creado por Juan Manuel Sánchez Gamboa</div>
        <div class="social">
            <a href="https://www.instagram.com/pokemon/" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram">
            </a>
            <a href="https://www.facebook.com/PokemonOficialES/?locale=es_LA" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
            </a>
        </div>
    </footer>
</div>
</body>
</html>

<?php
$mysqli->close();
?>
