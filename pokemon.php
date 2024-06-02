<?php
   require 'conexion.php';
   session_start();
   $usuario = $_SESSION['username'];
   echo "$usuario";

   if(!isset($usuario)){
       header("location:login.php");
   }else{
   
   $sql = "SELECT * FROM participantes WHERE Nombre LIKE '$usuario'";
   $resultado = $mysqli->query($sql);
   $fila = $resultado->fetch_assoc();
   $id = $fila['id_participante'];
   $rol = $fila['Rol'];

   $sql2 = "SELECT * FROM pokémon";
   $resultado2 = $mysqli->query($sql2);
   $fila2 = $resultado2->fetch_assoc();
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
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"><!-- Boton para el menu movil -->
            <div class="container-fluid"> <!-- Determina el width y el height como 100% -->
                <img src="imagenes/escudo.svg" class="escudo">
            <div class="navbar-collapse" id="menu"><!--navbar-collapse es para agrupar el contenido de la barra de navegación pora breakpoint determinado.-->
                     <!--  navbar permite anclar la barra de navegación a la parte superior o inferior de la pantalla y que siempre sea visible -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"><!--me-auto es para centrar horizontalmente contenido de nivel de bloque de ancho fijo, es decir, contenido que tiene display: block y un conjunto width , configurando los márgenes horizontales en auto -->
                        <li class="nav-item"><a href="pokemon.php" class="nav-link">Lista de Pokemons</a></li>
                        <li class="nav-item">
                            <a href='combate-usuario.php?id=<?php echo $id; ?>' class='text-white nav-link'>Simulador de Combate</a>
                        </li>
                        <li class="nav-item">
                            <a href='datos.php?id=<?php echo $id; ?>' class='text-white nav-link'>Tus datos</a>
                        </li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar sesión</a></li>
                    </ul>
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
    if ($ganadas == 0) {
        $media = 0;
        echo "<td>$media %</td>";
    } else {
        $media = ($ganadas / $jugadas) * 100;
        $redondeo = round($media);
        echo "<td>$redondeo %</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</main>";
echo "</div>";

$mysqli->close();
?>
<p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index-cliente.php">Volver</a></button></p>

    <?php
   }else{
    ?>
    <header>  
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"><!-- Boton para el menu movil -->
            <div class="container-fluid"> <!-- Determina el width y el height como 100% -->
                <img src="imagenes/escudo.svg" class="escudo">
                <div class="navbar-collapse" id="menu"><!--navbar-collapse es para agrupar el contenido de la barra de navegación pora breakpoint determinado.-->
                     <!--  navbar permite anclar la barra de navegación a la parte superior o inferior de la pantalla y que siempre sea visible -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0"><!--me-auto es para centrar horizontalmente contenido de nivel de bloque de ancho fijo, es decir, contenido que tiene display: block y un conjunto width , configurando los márgenes horizontales en auto -->
                        <li class="nav-item"><a href="registros.php" class="nav-link">Registro de Combates</a></li>
                        <li class="nav-item"><a href="enfrentamiento1.php" class="nav-link">Simulador de Combate</a></li>
                        <li class="nav-item"><a href="salir.php" class="nav-link">Cerrar sesión</a></li>
                    </ul>
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
    if ($ganadas == 0) {
        $media = 0;
        echo "<td>$media %</td>";
    } else {
        $media = ($ganadas / $jugadas) * 100;
        $redondeo = round($media);
        echo "<td>$redondeo %</td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "</main>";
echo "</div>";

$mysqli->close();
?>
<p class="boton"><button type="submit" class="btn btn-primary" name="submit"><a href="index.php">Volver</a></button></p>
    <?php
   }
}
    ?>
</body>
</html>
