<?php
    require 'conexion.php';

    $sql = "SELECT * FROM pokémon ORDER BY Ganadas DESC";
    $resultado = $mysqli->query($sql);
    $fila = $resultado->fetch_assoc();
    $nombre = $fila["Nombre"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pokemon.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <main>
    <div class="container">
    <h1>Lista de los Pokémons</h1>
                <div class="row">
                    <div class="col">
                        <div class="carousel slide" id="mi-carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                <div class="card" style="width: 18 rem">
                                            <img class="card-img-top" src="imagenes/fuerza.jpg"> <!-- Agregamos una imagen superior usando img-top -->
                                        <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                                            <h4 class="card-title">Fuerza</h4> <!-- Le ponemos un título -->
                                <!-- Completamos el resto con un texto -->
                                            <p class="card-text">Las builds de fuerza son para los jugadores que sean amantes del daño masivo y que les guste llevar armaduras pesadas para aguantar todo tipo de daños. Por lo general solo se necesita subir las stats de fuerza y aguante.</p>
                                <!-- Agregamos un botón con la clase btn-outline-secondary para que sea transparente y tenga un determinado color de borde -->
                                        <button type="button" class="btn btn-outline-secondary"><a href="https://www.youtube.com/watch?v=9V1OY9d6La8&ab_channel=Crozyn">Gameplay</a></button>
                                        </div>
                                        </div>
                                </div>
                                <div class="carousel-item" data-bs-interval="5000">
                                        <div class="card" style="width: 18 rem">
                                            <img class="card-img-top" src="imagenes/fuerza.jpg"> <!-- Agregamos una imagen superior usando img-top -->
                                        <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                                            <h4 class="card-title">Fuerza</h4> <!-- Le ponemos un título -->
                                <!-- Completamos el resto con un texto -->
                                            <p class="card-text">Las builds de fuerza son para los jugadores que sean amantes del daño masivo y que les guste llevar armaduras pesadas para aguantar todo tipo de daños. Por lo general solo se necesita subir las stats de fuerza y aguante.</p>
                                <!-- Agregamos un botón con la clase btn-outline-secondary para que sea transparente y tenga un determinado color de borde -->
                                        <button type="button" class="btn btn-outline-secondary"><a href="https://www.youtube.com/watch?v=9V1OY9d6La8&ab_channel=Crozyn">Gameplay</a></button>
                                        </div>
                                        </div>
                                </div>
                                <div class="carousel-item">
                                <div class="card" style="width: 18 rem">
                                            <img class="card-img-top" src="imagenes/fuerza.jpg"> <!-- Agregamos una imagen superior usando img-top -->
                                        <div class="card-body"> <!-- Rellenamos la card con la clase body -->
                                            <h4 class="card-title">Fuerza</h4> <!-- Le ponemos un título -->
                                <!-- Completamos el resto con un texto -->
                                            <p class="card-text">Las builds de fuerza son para los jugadores que sean amantes del daño masivo y que les guste llevar armaduras pesadas para aguantar todo tipo de daños. Por lo general solo se necesita subir las stats de fuerza y aguante.</p>
                                <!-- Agregamos un botón con la clase btn-outline-secondary para que sea transparente y tenga un determinado color de borde -->
                                        <button type="button" class="btn btn-outline-secondary"><a href="https://www.youtube.com/watch?v=9V1OY9d6La8&ab_channel=Crozyn">Gameplay</a></button>
                                        </div>
                                        </div>
                                </div>
                            </div>
        
                            <!-- Botones -->
                            <button 
                                class="carousel-control-prev"
                                type="button"
                                data-bs-target="#mi-carousel"
                                data-bs-slide="prev"
                            >
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Anterior</span>
                            </button>
        
                            <button 
                                class="carousel-control-next"
                                type="button"
                                data-bs-target="#mi-carousel"
                                data-bs-slide="next"
                            >
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Siguiente</span>
                            </button>
        
                            <!-- Indicadores -->
                            <div class="carousel-indicators">
                                <button 
                                    type="button"
                                    class="active"
                                    data-bs-target="#mi-carousel"
                                    data-bs-slide-to="0"
                                    
                                ></button>
                                <button 
                                    type="button"
                                    class=""
                                    data-bs-target="#mi-carousel"
                                    data-bs-slide-to="1"
                                    
                                ></button>
                                <button 
                                    type="button"
                                    class=""
                                    data-bs-target="#mi-carousel"
                                    data-bs-slide-to="2"
                                    
                                ></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
                <script src="bootstrap.bundle.min.js"></script>
    </main>
    <?php
//
    //    while($fila1 = $resultado1->fetch_assoc()){
    //        echo "<div>";
    //            echo "Nombre: $fila1[Nombre]";
    //            echo "Tipo: $fila1[Tipo]";
    //            $jugadas=$fila1['Jugadas'];
    //            $ganadas=$fila1['Ganadas'];
    //            if($ganadas==0){
    //                $media=0;
    //                echo " Win-Rate: $media%";
    //            }else{
    //                $media = ($ganadas / $jugadas) * 100;
    //                echo " Win-Rate: $media%";
    //            }
    //?>
                <img src="pokemon gif/<?php echo $fila1['Modelo']; ?>" />
    <?php
    //        echo "</div>";
    //    }
    //    
    //    $mysqli->close();
    //?>
    <a href="index.php">Volver</a>
    </div>
</body>
</html>