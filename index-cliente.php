<?php
require 'conexion.php';
session_start();
$id = $_SESSION['id'];

if (!isset($id)) {
    header("location:login.php");
}else{
    // Obtener los datos del usuario activo
$sql = "SELECT * FROM participantes WHERE id_participante = '$id'";
$resultado = $mysqli->query($sql);
$fila = $resultado->fetch_assoc();
//$id = $fila['id_participante'];
$nombre_activo = $fila['Nombre'];

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
                        <a href='registro-jugador.php?id=<?php echo $id; ?>' class='text-white nav-link'>Registro de Combates</a>
                    </li>
                    <li class="nav-item">
                        <a href='combate-usuario.php?id=<?php echo $id; ?>' class='text-white nav-link'>Simulador de Combate</a>
                    </li>
                    <li class="nav-item">
                        <a href='datos.php?id=<?php echo $id; ?>' class='text-white nav-link'>Tus datos</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <span class="navbar-text text-white">Hola <?php echo $nombre_activo; ?> - </span>
                        <a href="salir.php" class="nav-link d-inline">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <main>
    <div class="portada">
       <img src="imagenes/pokemon.png">
    </div>
        <div class="video">
            <video width="1000" height="500" autoplay loop muted>
                <source src="video/pokemon.mp4" type="video/mp4">
            </video>
        </div>
        <?php
        echo "<h2>Participantes</h2>";

        echo "<div class='scroll'>";
        echo "<table id='tabla'>";
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<tr>";
                echo "<td><button class='btn btn-warning'><a href='jugadores-usu.php?id=$fila1[id_participante]' class='text-white'>$fila1[Nombre]</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    echo "</main>";
        
        $mysqli->close();
    
    ?>
    </main>
    <footer class="pie">
        <div class="pie-img"><img src="imagenes/pokemon.png"></div> 
        <div class="juegos">
            <ul>
                <h3>¡¡¡Los mejores juegos!!!</h3>
                <li>Pokémon Blanco</li>
                <li>Pokémon Rojo Fuego</li>
                <li>Pokémon Zafiro Alfa</li>
            </ul>
        </div>
        <div class="social">
            <ul>
                <h3>Síguenos<h3>
                <li>
                    <i><a href="https://www.instagram.com/pokemon/" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png"></a>
                    </i>
                    <i>
                    <a href="https://www.facebook.com/PokemonOficialES/?locale=es_LA" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg"></a>
                    </i>
                    <i>
                        <a href="https://x.com/pokemon_es_esp" target="_blank">
                            <img src="imagenes/twitter.png">
                        </a>
                    </i>
                </li>
            </ul>
        </div>
    </footer>
</div>
</body>
</html>

<?php
}
?>

