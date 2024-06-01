<?php
    require 'conexion.php';
    session_start();
    $usuario = $_SESSION['username'];

    if(!isset($usuario)){
        header("location:login.php");
    }else{
    
    $sql = "SELECT * FROM participantes WHERE Nombre LIKE '$usuario'";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();
    $id = $fila['id_participante'];
    
    $sql1 = "SELECT * FROM participantes WHERE id_participante <> $id ORDER BY Ganadas DESC";
    $resultado1 = $mysqli->query($sql1);
    $fila1 = $resultado1->fetch_assoc();
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
<div class='contenedor'> <!-- Le damos un tamaño medio de 4 a cada columna --> 
<header>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"><!-- Boton para el menu movil -->
            <div class="container-fluid"> <!-- Determina el width y el height como 100% -->
                <img src="imagenes/escudo.svg" class="escudo">
    
                
    
                
                <div class="navbar-collapse" id="menu"><!--navbar-collapse es para agrupar el contenido de la barra de navegación pora breakpoint determinado.-->
                     <!--  navbar permite anclar la barra de navegación a la parte superior o inferior de la pantalla y que siempre sea visible -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"><!--me-auto es para centrar horizontalmente contenido de nivel de bloque de ancho fijo, es decir, contenido que tiene display: block y un conjunto width , configurando los márgenes horizontales en auto -->
                        <li class="nav-item"><a href="pokemon.php" class="nav-link">Lista de Pokemons</a></li>
                        <li class="nav-item"><a href="enfrentamiento1.php" class="nav-link">Simulador de Combate</a></li>
                        <li class="nav-item"><a href="registros.php" class="nav-link">Registro de Enfrentamientos</a></li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar sesión</a></li>
                    </ul>
                </nav>
        </header>
    <main>

    <div class="portada">
       <img src="imagenes/pokemon.png">
    </div>

    <div class="video">
        <video width="1000" height="500" autoplay loop muted>
            <source src=video/pokemon.mp4 type="video/mp4">
        </video>
    </div>
    <?php
        echo "<h2>Participantes</h2>";

        echo "<div class='scroll'>";
        echo "<table id='tabla'>";
        while($fila1 = $resultado1->fetch_assoc()){
            echo "<tr>";
                echo "<td><button class='btn btn-warning'><a href='jugadores.php?id=$fila1[id_participante]' class='text-white'>$fila1[Nombre]</a></button></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
    echo "</main>";
        
        $mysqli->close();
    
    ?>
    <p><button class='btn btn-primary'><a href="registrar1.php">Registrar nuevo participante</a></button></p>
    
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
