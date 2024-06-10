<?php
   require 'conexion.php';
   session_start();
   $id = $_SESSION['id'];
   echo "$id";

   if(!isset($id)){
       header("location:login.php");
   }else{
   
   $sql = "SELECT * FROM participantes WHERE id_participante LIKE '$id'";
   $resultado = $mysqli->query($sql);
   $fila = $resultado->fetch_assoc();
   //$id = $fila['id_participante'];
   $rol = $fila['Rol'];
   $nombre_activo = $fila['Nombre'];


   $sql2 = "SELECT *, (Jugadas + Ganadas) / 2 AS media FROM pokémon ORDER BY media DESC;";
   $resultado2 = $mysqli->query($sql2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <title>Document</title>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        });
    </script>
</head>
<body>
<?php
   if ($rol == 'usu'){
    ?>
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
<?php
echo "<div class='contenedor-tabla'>";
echo "<main>";
echo "<table id='lista' class='display' style='width:100%'>";
echo "<tr>";
    echo "<th>Sprite</th>";
    echo "<th>Nombre</th>";
    echo "<th>Tipo</th>";
    echo "<th>Jugadas</th>";
    echo "<th>Ganadas</th>";
    echo "<th>Win-Rate</th>";
echo "</tr>";

while ($fila2 = $resultado2->fetch_assoc()) {
    $jugadas = $fila2['Jugadas'];
    $ganadas = $fila2['Ganadas'];
    $media = $fila2['media'];
    echo "<tr>";
    echo "<td>";
    ?>
    <img src="pokemon sprite/<?php echo $fila2['sprite']; ?>" />
<?php
    echo "</td>";      
    echo "<td>$fila2[Nombre]</td>";
    echo "<td>$fila2[Tipo]</td>";
    echo "<td>$jugadas</td>";
    echo "<td>$ganadas</td>";
    echo "<td>$media %</td>";
    echo "</tr>";
}
echo "</table>";
echo "</main>";
echo "</div>";

$mysqli->close();
?>
<br>
<p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index-cliente.php">Volver</a></button></p>

    <?php
   }else{
    ?>
    <header>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container-fluid">
                <img src="imagenes/escudo.svg" class="escudo" alt="Escudo">
                <div class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a href="index.php" class="nav-link">Menú principal</a></li>
                    <li class="nav-item"><a href="enfrentamiento1.php" class="nav-link">Simulador de Combate</a></li>
                    <li class="nav-item"><a href="registros.php" class="nav-link">Registro de Enfrentamientos</a></li>
                    <li class="nav-item"><a href="registrar1.php" class="nav-link">Registrar nuevo usuario</a></li>
                </div>
                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item" style="margin-right: 20px;"><a href="salir.php" class="nav-link" style="font-weight: bold;">Cerrar sesión</a></li>
                </div>
            </div>
        </nav>
    </header>               
<?php
echo "<div class='contenedor-tabla'>";
echo "<main>";
echo "<table id='lista' class='display' style='width:100%'>";
echo "<tr>";
    echo "<th>Sprite</th>";
    echo "<th>Nombre</th>";
    echo "<th>Tipo</th>";
    echo "<th>Jugadas</th>";
    echo "<th>Ganadas</th>";
    echo "<th>Win-Rate</th>";
echo "</tr>";

while ($fila2 = $resultado2->fetch_assoc()) {
    $jugadas = $fila2['Jugadas'];
    $ganadas = $fila2['Ganadas'];
    $media = $fila2['media'];
    echo "<tr>";
    echo "<td>";
    ?>
    <img src="pokemon sprite/<?php echo $fila2['sprite']; ?>" />
<?php
    echo "</td>";      
    echo "<td>$fila2[Nombre]</td>";
    echo "<td>$fila2[Tipo]</td>";
    echo "<td>$jugadas</td>";
    echo "<td>$ganadas</td>";
    echo "<td>$media %</td>";
    echo "</tr>";
}
echo "</table>";
echo "</main>";
echo "</div>";

$mysqli->close();
?>
<br>
<p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index.php">Volver</a></button></p>
    <?php
   }
}
    ?>
</body>
</html>
